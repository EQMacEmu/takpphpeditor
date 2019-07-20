<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
		<title>Torven's NPC stats checker</title>
	</head>
	<body>

<?php
	$PoPMinDamage = Array(
		41 => 18,
		42 => 18,
		43 => 19,
		44 => 20,
		45 => 20,
		46 => 24,
		47 => 26,
		48 => 30,
		49 => 32,
		50 => 37,
		51 => 47,
		52 => 51,
		53 => 56,
		54 => 61,
		55 => 67,
		56 => 74,
		57 => 81,
		58 => 88,
		59 => 94,
		60 => 104,
		61 => 115,
		62 => 124,
		63 => 135,
		64 => 145,
		65 => 154,
		66 => 165,
		67 => 175,
		68 => 185,
		69 => 195,
	);
	
	$PoPMaxDamage = Array(
		41 => 98,
		42 => 105,	// rough estimate; only affects a few mobs in PoJ anyway
		43 => 114,	// rough estimate; only affects a few mobs in PoJ anyway
		44 => 124,	// rough estimate; only affects a few mobs in PoJ anyway
		45 => 136,
		46 => 149,
		47 => 159,
		48 => 173,	// close estimate if not exact
		49 => 190,	// close estimate if not exact
		50 => 200,
		51 => 248,
		52 => 266,
		53 => 286,
		54 => 304,
		55 => 329,
		56 => 355,
		57 => 383,
		58 => 409,
		59 => 434,
		60 => 471,
		61 => 508,
		62 => 544,
		63 => 583,
		64 => 622,
		65 => 656,
		66 => 695,
		67 => 733,
		68 => 770,
		69 => 807,
	);
	
	// few Warrior PoP mobs have below this many hitpoints.  Some mobs will get higher than they should have but it's a lot better than PEQ's numbers
	$PoPHitpoints = Array(
		41 => 4000,
		42 => 4600,
		43 => 5200,
		44 => 5800,
		45 => 6500,
		46 => 7200,
		47 => 7600,
		48 => 8600,
		49 => 9600,
		50 => 10600,
		51 => 11500,
		52 => 12600,
		53 => 13600,
		54 => 14700,
		55 => 15800,
		56 => 17000,
		57 => 18000,
		58 => 19000,
		59 => 20800,
		60 => 22200,
		61 => 23600,
		62 => 25200,
		63 => 26000,
		64 => 28000,
		65 => 30000,
		66 => 32000,
		67 => 34000,
		68 => 37000,
		69 => 40000,
	);

	$elementalPlanes = Array(
		215 => True,
		216 => True,
		217 => True,
		218 => True,
		222 => True,
	);

	require_once("config.php");
	if ($mysql_class == "mysqli")
		require_once("classes/mysqli.php");
	else 
		require_once("classes/mysql.php");
	require_once("lib/common.php");
	require_once("lib/data.php");

	function hasSpecialAbility($specialStr, $x)
	{
		if ( strlen($specialStr) > 1 && (strrpos($specialStr, "^".$x.",") !== False || substr($specialStr, 0, 2) === $x.",") )
		{
			return true;
		}
		
		return false;
	}
	
	function processMob($npcRow, $zoneid, $expac)
	{
		global $mysql, $elementalPlanes, $PoPHitpoints, $PoPMaxDamage, $PoPMinDamage;
		
		$name = $npcRow['name'];
		$minLevel = $npcRow['level'];
		if ( $npcRow['maxlevel'] < $minLevel )
		{
			$maxLevel = $minLevel;
		}
		else
		{
			$maxLevel = $npcRow['maxlevel'];
		}
		
		$hp = $npcRow['hp'];
		$mana = $npcRow['mana'];
		$class = $npcRow['class'];
		$race = $npcRow['race'];
		$bodyType = $npcRow['bodytype'];
		$attackDelay = $npcRow['attack_delay'];
		$minHit = $npcRow['mindmg'];
		$maxHit = $npcRow['maxdmg'];
		$hpRegen = $npcRow['hp_regen_rate'];
		$scaleRate = $npcRow['scalerate'];
		$aggroRadius = $npcRow['aggroradius'];
		$ac = $npcRow['AC'];
		$specialAbilities = $npcRow['special_abilities'];		// 2,1 == enrage; 10,1 == magic hit
		
		$baselineMinHit = round(($minLevel + 1) / 10);		// level 1-13 mobs == 1, level 14-23 mobs == 2, level 24-33 mobs == 3 etc
		if ( $baselineMinHit < 1 )
			$baselineMinHit = 1;
		$baselineMaxHit = ($minLevel + 1) * 2;
		
		$estMinHit = $baselineMinHit;
		$estMaxHit = $baselineMaxHit;
		$estHp = $hp;
		$estMinMana = 150 / 5 + 2 * $minLevel;
		$estAttackDelay = 30;
		$estHpRegenRate = 0;
		
		if ( $minLevel < 15 )
		{
			$mitigation = $minLevel * 3;

			if ( $minLevel < 3 )
			{
				$mitigation += 2;
			}
		}
		else
		{
			if ( $expac == 4 )
			{
				$mitigation = 200;
			}
			else
			{
				$mitigation = floor($minLevel * 41 / 10) - 15;
			}
		}
		if ($mitigation > 200)
			$mitigation = 200;
			
		$shouldEnrage = false;
		$shouldNotEnrage = false;
		$shouldMagicAtk = false;
		$isRaidNPC = false;
		$explessNPC = false;
		$merchant = false;		// or banker
		$invisMan = false;		// the unattackable kind
		$hasImmuneNonMagicMelee = false;
		$hasProximityAggro = false;
		$shouldTriple = false;
		$shouldNotTriple = false;

		if ( $class > 35 || $class == 17 || $class == 18 || $class == 19 )
		{
			$explessNPC = true;
			$merchant = true;
		}
		if ( $bodyType == 11 || ($race == 127 && ($bodyType == 67 || hasSpecialAbility($specialAbilities, "24"))) )
		{
			$explessNPC = true;
			$invisMan = true;
		}
		
		if ( hasSpecialAbility($specialAbilities, "23") )
		{
			$hasImmuneNonMagicMelee = true;
		}
		if ( hasSpecialAbility($specialAbilities, "42") )
		{
			$hasProximityAggro = true;
		}
		if ( $minLevel >= 60 
			&& ($class == 1 || $class == 7 || $class == 20 || $class == 26)
			&& !hasSpecialAbility($specialAbilities, "6"))
		{
			$shouldTriple = true;
		}
		if ( hasSpecialAbility($specialAbilities, "6") && $minLevel < 60
			|| ($class != 1 && $class != 7 && $class != 20 && $class != 26))
		{
			$shouldNotTriple = true;
		}
		
		echo $npcRow['id'].")";
		
		if ( $explessNPC )
		{
			echo "<FONT COLOR=\blue\">";
		}
		
		if ( $minLevel == $maxLevel )
			 echo " $name; level: $minLevel";
		else
			echo " $name; level: $minLevel-$maxLevel";
			
		if ( $explessNPC )
		{
			echo "</FONT>";
		}
			
		if ( ($maxLevel - $minLevel) > 4 )
		{
			echo '<FONT COLOR="red">; level range too large</FONT>';
		}
		
		// ==================== Planes of Power NPCs ================================
		if ( $expac == 4 )
		{
			if ( $maxLevel > $minLevel )
			{
				$actualLevel = floor(($maxLevel - $minLevel) / 2) + $minLevel;		// base the damage of mob on its median level
			}
			else
			{
				$actualLevel = $minLevel;
			}
			
			if ( $minLevel > 69 )
				$isRaidNPC = true;

			// -------------------- Damage est ------------------------------
			if ( isset($PoPMinDamage[$actualLevel]) )
			{
				$estMinHit = $PoPMinDamage[$actualLevel];
				
				if ( isset($elementalPlanes[$zoneid]) )
					$estMinHit *= 1.1;
				elseif ( $zoneid == 210 )		// PoStorms mobs are tougher for some reason
					$estMinHit *= 1.2;
				
				$estMinHit = floor($estMinHit);
			}
			
			if ( isset($PoPMaxDamage[$actualLevel]) )
			{
				$estMaxHit = $PoPMaxDamage[$actualLevel];
				
				if ( isset($elementalPlanes[$zoneid]) )
					$estMaxHit *= 1.1;
				elseif ( $zoneid == 210 )		// PoStorms mobs are tougher for some reason
					$estMaxHit *= 1.2;
					
				$estMaxHit = floor($estMaxHit);
				
				if ( $actualLevel > $minLevel )
				{
					$estMaxHit -= ($actualLevel - $minLevel) * 2;
				}
			}

			if ( isset($PoPHitpoints[$actualLevel]) )
			{
				$estHp = $PoPHitpoints[$actualLevel];
				
				if ( $class == 3 || $class == 4 || $class == 5 || $class == 2 )
				{
					$estHp = floor($estHp * 0.9);
				}
				elseif ( $class == 6 || $class == 10 || $class == 11 || $class == 12 || $class == 13 || $class == 14 )
				{
					$estHp = floor($estHp * 0.8);
				}
			}

			// -------------------- Attack Delay est ------------------------------
			if ( $minLevel < 50 )
				$estAttackDelay = 30 - floor(($minLevel - 25) / 2.5);
			else
				$estAttackDelay = 20;
		}
		
		// ================= Classic =========================
		elseif ( $expac == 0 )
		{
			if ( $minLevel > 47 )
				$isRaidNPC = true;
				
			// Classic
			if ( $minLevel < 48 )
				$estAttackDelay = 30;
			else
				$estAttackDelay = 20;
		}
		
		// ================= Kunark, Velious, Luclin =========================
		else
		{
			if ( $minLevel > 59 )
				$isRaidNPC = true;
				
			// dmg
			if ( $minLevel > 25 )
			{
				if ( $minLevel >= 40 )
				{
					$db = $minLevel - 20;
				}
				else
				{
					$db = $minLevel - 25;
				}

				$estMinHit = $baselineMinHit + $db;
				$estMaxHit = $baselineMaxHit + $db;
				if ( stripos($name, "frost_giant") !== False || stripos($name, "griffin") !== False || $zoneid == 91 )		// skyfire
				{
					$estMinHit = floor($estMinHit * 1.15);
					$estMaxHit = floor($estMaxHit * 1.15);
				}
				elseif ( $zoneid == 163 )		// grieg's end
				{
					// yes grieg's was this bad
					$estMinHit = floor($estMinHit * 1.5);
					$estMaxHit = floor($estMaxHit * 1.5);
				}
			}

			// atk delay
			$estAttackDelay = 30 - floor(($minLevel - 25) / 2.5);
			if ( $estAttackDelay < 16 )
				$estAttackDelay = 16;
			elseif ( $estAttackDelay > 30 )
				$estAttackDelay = 30;
		}
		
		$estHpRegen = $estHp / 35;
		
		// ===================================================================


		if ( $invisMan )
		{
			echo "<BR>\n";
			return;
		}
		
		if ( hasSpecialAbility($specialAbilities, "2") )
		{
			if ( $minLevel <= 55 )
			{
				$shouldNotEnrage = true;
			}
			else
			{
				if ( $class != 1 && $class != 7 && $class != 9 && $class != 20 && $class != 26 && $class != 28 )	// war, monk, rog
				{
					$shouldNotEnrage = true;
				}
			}
		}
		else
		{
			if ( $minLevel > 55 )
			{
				if ( $class == 1 || $class == 7 || $class == 9 || $class == 20 || $class == 26 || $class == 28 )	// war, monk, rog
				{
					$shouldEnrage = true;
				}
			}
		}
		
		if ( $minLevel > 9 )
		{
			if ( !hasSpecialAbility($specialAbilities, "10") )
			{
				$shouldMagicAtk = true;
			}
		}
		
		if ( !$isRaidNPC && $estMinHit != $minHit )
		{
			if ( $minHit < $baselineMinHit )
			{
				echo "; <FONT COLOR=\"red\">min hit below baseline; minHit = $minHit</FONT> (est: $estMinHit)";
			}
//			elseif ( $minHit != $estMinHit )
			elseif ( $minHit < $estMinHit )
			{
				if ( !$isRaidNPC && $minHit > ($estMinHit * 1.5) )
				{
					echo "; <FONT COLOR=\"red\">minHit = $minHit</FONT> (est: $estMinHit)";
				}
				else
					echo "; <FONT COLOR=\"orange\">minHit = $minHit</FONT> (est: $estMinHit)";
				
			}


			if ( $maxHit < $baselineMaxHit )
			{
				echo "; <FONT COLOR=\"red\">max hit below baseline; maxHit = $maxHit</FONT> (est: $estMaxHit)";
			}
//			elseif ( $maxHit != $estMaxHit )
			elseif ( $maxHit < $estMaxHit )
			{
				if ( !$isRaidNPC && $maxHit > ($estMaxHit * 1.5) )
				{
					echo "; <FONT COLOR=\"red\">maxHit = $maxHit</FONT> (est: $estMaxHit)";
				}
				else
					echo "; <FONT COLOR=\"orange\">maxHit = $maxHit</FONT> (est: $estMaxHit)";
			}
		}
		
		if ( $hp == 0 )
			echo '; <FONT COLOR="red">HP is zero</FONT>';
		
		if ( $attackDelay > 30 )
			echo '; <FONT COLOR="red">attack delay too high</FONT>';
		elseif ( $attackDelay < 6 )
			echo '; <FONT COLOR="red">attack delay too low</FONT>';
		elseif ( $minLevel < 25 && $attackDelay != 30 )
			echo '; <FONT COLOR="red">attack delay at this level should be 30</FONT>';

		if ( $attackDelay != $estAttackDelay )
			echo "; <FONT COLOR=\"orange\">atk dly = $attackDelay</FONT> (est: $estAttackDelay)";

		if ( (($class >= 2 && $class <= 6) || ($class >= 10 && $class <= 15)) && $mana < $estMinMana )
		{
			echo '; <FONT COLOR="red">mana too low</FONT>';
		}

		if ( $aggroRadius == 0 )
		{
			echo '; <FONT COLOR="red">aggro radius is 0</FONT>';
		}

		if ( $hpRegen == 0 )
		{
			echo '; <FONT COLOR="red">hp regen is 0</FONT>';
		}
		elseif ( $hpRegen < $estHpRegen )
		{
			echo " <FONT COLOR=\"orange\">low hp regen</FONT> ($hpRegen)";
		}
		
		if ( $ac == 0 )
		{
			echo '; <FONT COLOR="red">AC is zero</FONT>';
		}
		elseif ( $mitigation < 200 && $ac != $mitigation )
		{
			echo "; <FONT COLOR=\"red\">AC is $ac, should be $mitigation</FONT>";
		}
		else
		{
			if ( $expac < 2 )
			{
				if ( $hp > 30000)
				{
					if ( $ac < 300 )
						echo "; <FONT COLOR=\"orange\">AC possibly too low ($ac)</FONT>";
					//if ( $ac > 500 )
					//	echo "; <FONT COLOR=\"orange\">AC possibly too high ($ac)</FONT>";
				}
				else
				{
					//if ( $ac != $mitigation )
					//{
					//	echo "; <FONT COLOR=\"orange\">AC is $ac, should probably be $mitigation</FONT>";
					//}
				}
			}
			elseif ( $expac == 3 )
			{
				if ( $hp > 100000 )
				{
					if ( $ac < 550 )
						echo "; <FONT COLOR=\"orange\">AC too low ($ac) should probably be around 600-900</FONT>";
					if ( $ac > 1200 )
						echo "; <FONT COLOR=\"orange\">AC too high ($ac) should probably be 600-900</FONT>";
				}
				else
				{
					if ( $ac != $mitigation )
					{
						echo "; <FONT COLOR=\"orange\">AC is $ac, should probably be $mitigation</FONT>";
					}
				}
			}
			else
			{
				if ( $hp > 100000)
				{
					if ( $ac > 700 )
						echo "; <FONT COLOR=\"orange\">AC possibly too high ($ac)</FONT>";
				}
				else
				{
					if ( $ac != $mitigation )
					{
						echo "; <FONT COLOR=\"orange\">AC is $ac, should probably be $mitigation</FONT>";
					}
				}
			}
		}
		
		if ( $scaleRate > 0 && $minLevel != $maxLevel )
		{
			echo '; <FONT COLOR="red">scale rate is not zero</FONT>';
		}
		
		/*
		if ( $shouldTriple )
		{
			echo '; <FONT COLOR="red">should triple</FONT>';
		}
		if ( $shouldNotTriple )
		{
			echo '; <FONT COLOR="red">should NOT triple</FONT>';
		}
		*/
		
		if ( $shouldEnrage )
		{
			echo '; <FONT COLOR="red">should enrage</FONT>';
		}
		if ( $shouldNotEnrage )
		{
			echo '; <FONT COLOR="red">should NOT enrage</FONT>';
		}
		
		//if ( $shouldMagicAtk )
		//{
		//	echo '; <FONT COLOR="red">should magic attack</FONT>';
		//}
		
		if ( $bodyType == 3 )
		{
			if ( !$hasImmuneNonMagicMelee )
			{
				echo '; <FONT COLOR="orange">undead and not flagged immune non-magic melee</FONT>';
			}
			if ( !$hasProximityAggro )
			{
				echo '; <FONT COLOR="orange">undead and not flagged proximity aggro</FONT>';
			}
		}
		
		echo "<BR>\n";
	}

	
	$expac = 0;
	
	if ( isset($_GET['expac']) && is_numeric($_GET['expac'] ) )
	{
		$expac = (int)$_GET['expac'];
		
		if ( $expac < 0 || $expac > 4 )
		{
			$expac = 0;
		}
	}

	echo "<B>Color codes:</B><P>";
	echo "Orange indicates value differs from computed estimate.  This does not mean an erroneous value, merely a possiblity. ";
	echo "NPCs around level 50 and above have less predicatable stats.  'Special' NPCs like giants will hit harder than estimated.</BR>";
	echo "Red indicates a high chance of error, but not certain.<P>";
	echo "Note that raid trash NPCs (and some bosses) will be colored even with correct stats.  High level raid bosses are ignored for some stats.<BR>";
	echo "<P>";
	
	echo "<P><A HREF=\"abnormalities.php?expac=0\">Check stats for mobs in Classic</A><BR>\n";
	echo "<A HREF=\"abnormalities.php?expac=1\">Check stats for mobs in Kunark</A><BR>\n";
	echo "<A HREF=\"abnormalities.php?expac=2\">Check stats for mobs in Velious</A><BR>\n";
	echo "<A HREF=\"abnormalities.php?expac=3\">Check stats for mobs in Luclin</A><BR>\n";
	echo "<A HREF=\"abnormalities.php?expac=4\">Check stats for mobs in Planes of Power</A></P>\n";


	switch ( $expac )
	{
		case 0:
			echo "<H2>Classic</H2>";
			break;
		case 1:
			echo "<H2>Kunark</H2>";
			break;
		case 2:
			echo "<H2>Velious</H2>";
			break;
		case 3:
			echo "<H2>Luclin</H2>";
			break;
		case 4:
			echo "<H2>Planes of Power</H2>";
			break;
	}
	
	
	$query = "SELECT short_name, zoneidnumber FROM zone WHERE expansion=\"".($expac+1)."\"";
	$zoneArr = $mysql->query_mult_assoc($query);

	foreach($zoneArr as $zoneRow)
	{
		$startId = $zoneRow['zoneidnumber'] * 1000;
		$endId = $startId + 1000 - 1;
		
		echo("<P>listing all NPCs for zone ".$zoneRow['short_name']."; zone ID# ".$zoneRow['zoneidnumber']."; NPC IDs: ".$startId."-".$endId."<BR>\n");
	
		$query = "SELECT * FROM npc_types WHERE id>=$startId AND id<$endId GROUP BY id ORDER BY name ASC";
		$npcArr = $mysql->query_mult_assoc($query);
		
		if ( $npcArr )
		{
			foreach($npcArr as $npcRow)
			{
				processMob($npcRow, $zoneRow['zoneidnumber'], $expac);
			}
		}
		else
		{
			echo "no NPCs for zone ".$zoneRow['short_name'];
		}
	}
?>

	</body>
</html>
