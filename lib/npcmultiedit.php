<?php
check_authorization();

$stringStats = array(
	1 => true,		// Summon
	2 => true,		// Enrage
	3 => true,		// Rampage
	4 => true,		// AE Rampage
	5 => true,		// Flurry
	11 => true,		// Ranged Attack
	29 => true,		// Tunnel Vision
	32 => true,		// Leashed
	33 => true,		// Tethered
	37 => true,		// Flee Percent
	40 => true,		// Chase Distance
	49 => true,		// Corpse Camper
);

$statsArr = array(
	1 => array(
		"label" => "Level",
		"field" => "level",
		"type" => "int",
		"size" => 10,
		"min" => "1",
		"max" => "99"
	),
	2 => array(
		"label" => "Max Level",
		"field" => "maxlevel",
		"type" => "int",
		"size" => 10,
		"min" => "0",
		"max" => "99"
	),
	3 => array(
		"label" => "Max Hitpoints",
		"field" => "hp",
		"type" => "int",
		"size" => 10,
		"min" => 0
	),
	4 => array(
		"label" => "Mana",
		"field" => "mana",
		"type" => "int",
		"size" => 10,
		"min" => 0
	),
	5 => array(
		"label" => "Armor Class",
		"field" => "AC",
		"type" => "int",
		"size" => 10,
		"min" => 0
	),
	6 => array(
		"label" => "Scalerate",
		"field" => "scalerate",
		"type" => "int",
		"size" => 10
	),
	7 => array(
		"label" => "Run Speed",
		"field" => "runspeed",
		"type" => "float",
		"size" => 10
	),
	8 => array(
		"label" => "Walk Speed",
		"field" => "walkspeed",
		"type" => "float",
		"size" => 10
	),
	9 => array(
		"label" => "Exp%",
		"field" => "exp_pct",
		"type" => "int",
		"size" => 10
	),
	10 => array(
		"label" => "ATK",
		"field" => "ATK",
		"type" => "int",
		"size" => 10
	),
	11 => array(
		"label" => "Accuracy",
		"field" => "Accuracy",
		"type" => "int",
		"size" => 10
	),
	12 => array(
		"label" => "Avoidance",
		"field" => "avoidance",
		"type" => "int",
		"size" => 10
	),
	13 => array(
		"label" => "See Invisible",
		"field" => "see_invis",
		"type" => "int",
		"size" => 10,
		"min" => 0,
		"max" => 100
	),
	14 => array(
		"label" => "See Invisible to Undead",
		"field" => "see_invis_undead",
		"type" => "int",
		"size" => 10,
		"min" => 0,
		"max" => 100
	),
	15 => array(
		"label" => "See Sneak",
		"field" => "see_sneak",
		"type" => "int",
		"size" => 10,
		"min" => 0,
		"max" => 100
	),
	16 => array(
		"label" => "See Improved Hide",
		"field" => "see_improved_hide",
		"type" => "int",
		"size" => 10,
		"min" => 0,
		"max" => 100
	),
	17 => array(
		"label" => "STR",
		"field" => "STR",
		"type" => "int",
		"size" => 5,
		"min" => 0
	),
	18 => array(
		"label" => "STA",
		"field" => "STA",
		"type" => "int",
		"size" => 5,
		"min" => 0
	),
	19 => array(
		"label" => "DEX",
		"field" => "DEX",
		"type" => "int",
		"size" => 5,
		"min" => 0
	),
	20 => array(
		"label" => "AGI",
		"field" => "AGI",
		"type" => "int",
		"size" => 5,
		"min" => 0
	),
	21 => array(
		"label" => "INT",
		"field" => "_INT",
		"type" => "int",
		"size" => 5,
		"min" => 0
	),
	22 => array(
		"label" => "WIS",
		"field" => "WIS",
		"type" => "int",
		"size" => 5,
		"min" => 0
	),
	23 => array(
		"label" => "CHA",
		"field" => "CHA",
		"type" => "int",
		"size" => 5,
		"min" => 0
	),
	24 => array(
		"label" => "Magic Resist",
		"field" => "MR",
		"type" => "int",
		"size" => 5
	),
	25 => array(
		"label" => "Cold Resist",
		"field" => "CR",
		"type" => "int",
		"size" => 5
	),
	26 => array(
		"label" => "Fire Resist",
		"field" => "FR",
		"type" => "int",
		"size" => 5
	),
	27 => array(
		"label" => "Poison Resist",
		"field" => "PR",
		"type" => "int",
		"size" => 5
	),
	28 => array(
		"label" => "Disease Resist",
		"field" => "DR",
		"type" => "int",
		"size" => 5
	),
	29 => array(
		"label" => "Min Damage",
		"field" => "mindmg",
		"type" => "int",
		"size" => 5,
		"min" => 0
	),
	30 => array(
		"label" => "Max Damage",
		"field" => "maxdmg",
		"type" => "int",
		"size" => 5,
		"min" => 0
	),
	31 => array(
		"label" => "Out-of-combat HP Regen",
		"field" => "hp_regen_rate",
		"type" => "int",
		"size" => 5
	),
	32 => array(
		"label" => "In-combat HP Regen",
		"field" => "combat_hp_regen",
		"type" => "int",
		"size" => 5
	),
	33 => array(
		"label" => "Out-of-combat Mana Regen",
		"field" => "mana_regen_rate",
		"type" => "int",
		"size" => 5
	),
	34 => array(
		"label" => "In-combat Mana Regen",
		"field" => "combat_mana_regen",
		"type" => "int",
		"size" => 5
	),
	35 => array(
		"label" => "Aggro Radius",
		"field" => "aggroradius",
		"type" => "int",
		"size" => 5,
		"min" => 0
	),
	36 => array(
		"label" => "Assist Radius",
		"field" => "assistradius",
		"type" => "int",
		"size" => 5,
		"min" => 0
	),
	37 => array(
		"label" => "Attack Count",
		"field" => "attack_count",
		"type" => "int",
		"size" => 5
	),
	38 => array(
		"label" => "Atk Delay",
		"field" => "attack_delay",
		"type" => "int",
		"size" => 5,
		"min" => 0
	),
	39 => array(
		"label" => "Loot Table ID",
		"field" => "loottable_id",
		"type" => "int",
		"size" => 5,
		"min" => 0
	),
	40 => array(
		"label" => "Spells ID",
		"field" => "npc_spells_id",
		"type" => "int",
		"size" => 5,
		"min" => 0
	),
	41 => array(
		"label" => "Heal Scale",
		"field" => "healscale",
		"type" => "float",
		"size" => 5
	),
	42 => array(
		"label" => "Spell Scale",
		"field" => "spellscale",
		"type" => "float",
		"size" => 5
	),
	43 => array(
		"label" => "Slow Mitigation",
		"field" => "slow_mitigation",
		"type" => "int",
		"size" => 5,
		"min" => 0,
		"max" => 99
	),
	44 => array(
		"label" => "Ignore Distance",
		"field" => "ignore_distance",
		"type" => "float",
		"size" => 5,
		"min" => 0
	),
	45 => array(
		"label" => "Emote ID",
		"field" => "emoteid",
		"type" => "int",
		"size" => 5,
		"min" => 0
	),
	46 => array(
		"label" => "Faction ID",
		"field" => "npc_faction_id",
		"type" => "int",
		"size" => 5,
		"min" => 0
	),
	47 => array(
		"label" => "Greed",
		"field" => "greed",
		"type" => "int",
		"size" => 3,
		"min" => 0,
		"max" => 255
	)
);

foreach($specialattacks as $specialID => $specialName)
{
	array_push($statsArr, array(
		"label" => $specialName,
		"field" => "special_abilities",
		"type" => isset($stringStats[$specialID]) ? "specialString" : "specialBox",
		"specialID" => $specialID
	));
}

function hasSpecial($special_abilities, $specialID)
{
	if (preg_match("/^$specialID,/", $special_abilities) == 1 || preg_match("/\^$specialID,/", $special_abilities) == 1)
	{
		return true;
	}
	else
	{
		return false;
	}
}

function getSpecialStr($special_abilities, $specialID)
{
	if (preg_match("/^$specialID,/", $special_abilities) == 1)
	{
		// Leading special ability
		if (preg_match("/^$specialID,.+?\^/", $special_abilities, $match) == 1)
		{
			$str = $match[0];
			$str = rtrim($str, "^");
		}
		// Only special ability
		else
		{
			preg_match("/^$specialID,.+?\$/", $special_abilities, $match);
			$str = $match[0];
		}
		return $str;
	}
	elseif (preg_match("/\^$specialID,/", $special_abilities) == 1)
	{
		// Middle special ability
		if (preg_match("/\^$specialID,.+?\^/", $special_abilities, $match) == 1)
		{
			$str = $match[0];
			$str = trim($str, "^");
		}
		// Trailing special ability
		else
		{
			preg_match("/\^$specialID,.+?\$/", $special_abilities, $match);
			$str = $match[0];
			$str = ltrim($str, "^");
		}
		return $str;
	}
	return '';
}

function enableSpecial($special_abilities, $specialID)
{
	global $specialattacks;
	
	if ( hasSpecial($special_abilities, $specialID) )
	{
		return $special_abilities;
	}
	else
	{
		$specialsArr = splitSpecialAbilities($special_abilities);
		$specialsArr[$specialID] = "$specialID,1";
		$str = "";
		
		for ($i = 1; $i <= sizeof($specialattacks); $i++) 
		{
			if(isset($specialsArr[$i]) && $specialsArr[$i] != '')
			{
				$str .= "$specialsArr[$i]^";
			}
		}
		$str = rtrim($str, "^");
		return $str;
	}	
}

function disableSpecial($special_abilities, $specialID)
{
	global $specialattacks;
	
	if ( hasSpecial($special_abilities, $specialID) )
	{
		$specialsArr = splitSpecialAbilities($special_abilities);
		$specialsArr[$specialID] = null;
		$str = "";
		
		for ($i = 1; $i <= sizeof($specialattacks); $i++) 
		{
			if(isset($specialsArr[$i]) && $specialsArr[$i] != '')
			{
				$str .= "$specialsArr[$i]^";
			}
		}
		$str = rtrim($str, "^");
		return $str;
	}
	else
	{
		return $special_abilities;
	}	
}

function addSpecialString($special_abilities, $specialID, $specialStr)
{
	global $specialattacks;
	
	$specialsArr = splitSpecialAbilities($special_abilities);
	$specialsArr[$specialID] = $specialStr;
	$str = "";
	
	for ($i = 1; $i <= sizeof($specialattacks); $i++) 
	{
		if(isset($specialsArr[$i]) && $specialsArr[$i] != '')
		{
			$str .= "$specialsArr[$i]^";
		}
	}
	$str = rtrim($str, "^");
	return $str;	
}

function splitSpecialAbilities($special_abilities)
{
	global $specialattacks;
	
	$specabil = array();
	$specabilcont = array();

	for ($i = 1; $i <= sizeof($specialattacks); $i++)
	{
		if (preg_match("/^$i,/", $special_abilities) == 1)
		{
			$specabil[$i] = 1;
			// Leading special ability
			if (preg_match("/^$i,.+?\^/", $special_abilities, $match) == 1)
			{
				$specabilcont[$i] = $match[0];
				$specabilcont[$i] = rtrim($specabilcont[$i], "^");
			}
			// Only special ability
			else
			{
				preg_match("/^$i,.+?\$/", $special_abilities, $match);
				$specabilcont[$i] = $match[0];
			}
		}
		elseif (preg_match("/\^$i,/", $special_abilities) == 1)
		{
			$specabil[$i] = 1;
			// Middle special ability
			if (preg_match("/\^$i,.+?\^/", $special_abilities, $match) == 1)
			{
				$specabilcont[$i] = $match[0];
				$specabilcont[$i] = trim($specabilcont[$i], "^");
			}
			// Trailing special ability
			else
			{
				preg_match("/\^$i,.+?\$/", $special_abilities, $match);
				$specabilcont[$i] = $match[0];
				$specabilcont[$i] = ltrim($specabilcont[$i], "^");
			}
		}
		else
		{
			$specabil[$i] = 0;
		}
	}
	return $specabilcont;
}

/*
function formSelectZone()
{
	global $mysql, $body, $z, $zonelist, $expansion_limit;
	
	$query = "SELECT short_name, zoneidnumber FROM zone";
	$zoneArr = $mysql->query_mult_assoc($query);

	$body .= "<form action=\"./index.php\">\n";
	$body .= "<input type=\"hidden\" name=\"editor\" value=\"npcmultiedit\">\n";
	$body .= "<select name=\"z\" onchange=\"if(this.value != 0) { this.form.submit(); }\">\n";
	$body .= "<option value=\"select\">Select a zone</option>\n";

	foreach ($zonelist as $zone)
	{
		if ($zone['expansion'] <= $expansion_limit)
		{
			$body .= "<option value=\"{$zone['short_name']}\"";
			if ( $zone['short_name'] == $z )
			{
				$body .= " selected";
			}
			$body .= ">{$zone['short_name']}</option>\n";
		}
	}
	
	$body .= "</select></form><p/>\n";
}
*/

function getSelectedNpcs()
{
	global $mysql, $body, $z, $zoneid, $zoneid2, $_POST;

	$startId = $zoneid2 * 1000;
	$endId = $startId + 1000 - 1;
	
	$query = "SELECT * FROM npc_types WHERE id>=$startId AND id<$endId GROUP BY id ORDER BY name ASC";
	$npcArr = $mysql->query_mult_assoc($query);

	$npcs = array();
	
	for ($i = 1; $i <= sizeof($npcArr); $i++)
	{
		$npckey = 'npc'.$i;

		if ( isset($_POST[$npckey]) && is_numeric($_POST[$npckey]) )
		{
			$npcid = (int)$_POST[$npckey];
			
			if ( $npcid > 0 || $npcid < 224000 )
			{
				array_push($npcs, $npcid);
			}
		}
	}
	
	return $npcs;
}

function formSelectNPCs()
{
	global $mysql, $body, $z, $zoneid, $zoneid2, $bodytypes, $races, $classes, $statsArr;

	$startId = $zoneid2 * 1000;
	$endId = $startId + 1000 - 1;
	
	$query = "SELECT * FROM npc_types WHERE id>=$startId AND id<$endId GROUP BY id ORDER BY name ASC";
	$npcArr = $mysql->query_mult_assoc($query);
	
	if ( $npcArr )
	{
		$selectedNpcs = array();
		$i = 1;
		$key = "editid$i";
		while (isset($_POST[$key]))
		{

			$npcid = (int)$_POST[$key];
			
			if ( $npcid > 0 || $npcid < 224000 )
			{
				$selectedNpcs[$npcid] = true;
			}			
			
			$i++;
			$key = "editid$i";
		}
		
		$body .= "<script>function checkAll() {
			var cbs = document.getElementsByTagName('input');
			for(var i=0; i < cbs.length; i++) {
				if(cbs[i].type == 'checkbox') {
					cbs[i].checked = 1;
				}
			}
		}</script>\n";
		
		$body .= "<div class=\"edit_form_header\">Select NPCs and Statistic to Edit</div>\n";
		$body .= "<div class=\"edit_form_content\">\n";
		$body .= "<table><tr><td valign=\"top\">";
		
		$body .= "<form action=\"./index.php?editor=npcmultiedit&z=$z&zoneid=$zoneid\" method=\"post\">\n";
		$body .= "<input type=\"hidden\" name=\"state\" value=\"input\">\n";
		
		$i = 1;
		
		foreach($npcArr as $npcRow)
		{
			$body .= "<input type=\"checkbox\" name=\"npc$i\" value=\"{$npcRow['id']}\"";
			$body .= isset($selectedNpcs[$npcRow['id']]) ? " checked" : "";
			$body .= ">{$npcRow['name']} <small>{$npcRow['level']}";
			if ( $npcRow['maxlevel'] > 0 )
			{
				$body .= "-".$npcRow['maxlevel'];
			}
			$body .= " {$races[$npcRow['race']]} {$classes[$npcRow['class']]}</small><br/>\n";

			$i++;
		}
		
		$body .= "</td><td valign=\"top\">\n";
		
		foreach($statsArr as $statId => $stat)
		{
			$body .= "<input type=\"radio\" name=\"stat\" value=\"$statId\">{$stat['label']}<br>\n";
			if ( $statId == 47 || $statId == 16 || $statId == 23 || $statId == 28 )
			{
				$body .= "<br/>";
			}
		}
		
		$body .= "</tr><tr>\n";
		$body .= "<td><button type=\"button\" onclick=\"checkAll()\">Select All</button></td>\n";
		$body .= "<td><input type=\"submit\" value=\"Continue\"></td>\n";
		$body .= "</tr></table><p/>\n";
		$body .= "</form>\n";
	}
	else
	{
		$body .= "no NPCs found<p/>\n";
	}
	$body .= "</div>\n";
}

function formEditStat($stat)
{	
	global $mysql, $body, $z, $zoneid, $zoneid2, $_POST, $statsArr, $races, $classes;

	if ( $stat == 0 )
	{
		$body .= "No statistic selected<p/>\n";
		return;
	}
	
	$npcs = getSelectedNpcs();
	
	if ( sizeof($npcs) == 0 )
	{
		$body .= "No NPCs selected<p/>\n";
		return;
	}
	
	$body .= "<script>
	function setAllText() {
		var elements = document.getElementsByTagName('input');
		for(var i=0; i < elements.length; i++) {
			if(elements[i].type == 'text') {
				elements[i].value = document.getElementsByName('editfield1')[0].value;
			}
		}
	}
	function setAllBoxes() {
		var cbs = document.getElementsByTagName('input');
		for(var i=0; i < cbs.length; i++) {
			if(cbs[i].type == 'checkbox') {
				cbs[i].checked = document.getElementsByName('editfield1')[0].checked;
			}
		}
	}	
	</script>\n";

	$body .= "<div class=\"edit_form_header\">Set Values</div>\n";
	$body .= "<div class=\"edit_form_content\">\n";
	$body .= "<form action=\"./index.php?editor=npcmultiedit&z=$z&zoneid=$zoneid\" method=\"post\">\n";
	$body .= "<table><tr><td><b>NPC Name</b></td><td><b>{$statsArr[$stat]['label']}";
	$body .= isset($statsArr[$stat]['specialID']) ? " ({$statsArr[$stat]['specialID']})" : "";
	$body .= "</b></td></tr>\n";
	$body .= "<input type=\"hidden\" name=\"state\" value=\"update\">\n";
	$body .= "<input type=\"hidden\" name=\"stat\" value=\"$stat\">\n";

	$i = 1;
	foreach($npcs as $npc)
	{
		$query = "SELECT name, level, maxlevel, race, class, {$statsArr[$stat]['field']} FROM npc_types WHERE id=$npc";
		$npcRow = $mysql->query_assoc($query);
		
		$body .= "<tr><td>\n";
		$body .= "{$npcRow['name']} <small>{$npcRow['level']}";
		if ( $npcRow['maxlevel'] > 0 )
		{
			$body .= "-".$npcRow['maxlevel'];
		}
		$body .= " {$races[$npcRow['race']]} {$classes[$npcRow['class']]}</small>\n";

		$body .= "</td><td>";
		
		$body .= "<input type=\"hidden\" name=\"editid$i\" value=\"$npc\">\n";
		
		if ( $statsArr[$stat]['type'] == "int" || $statsArr[$stat]['type'] == "float" )
		{
			$body .= "<input type=\"text\" name=\"editfield$i\" size=\"{$statsArr[$stat]['size']}\" ";
			if ( isset($statsArr[$stat]['min']) )
			{
				$body .= "min={$statsArr[$stat]['min']} ";
			}
			if ( isset($statsArr[$stat]['max']) )
			{
				$body .= "max={$statsArr[$stat]['max']} ";
			}
			$body .= "value=\"{$npcRow[$statsArr[$stat]['field']]}\">\n";
			
			if ( $i === 1 )
			{
				$body .= "</td><td><button type=\"button\" onclick=\"setAllText()\">Set All To This</button>";
			}
		}
		elseif ( $statsArr[$stat]['type'] == "specialBox" )
		{
			$body .= "<input type=\"checkbox\" name=\"editfield$i\" value=\"{$statsArr[$stat]['specialID']},1^\"";
			$body .= hasSpecial($npcRow['special_abilities'], $statsArr[$stat]['specialID']) ? " checked" : "";
			$body .= ">\n";
			
			if ( $i === 1 )
			{
				$body .= "</td><td><button type=\"button\" onclick=\"setAllBoxes()\">Set All To This</button>";
			}
		}
		elseif ( $statsArr[$stat]['type'] == "specialString" )
		{
			$body .= "<input type=\"text\" name=\"editfield$i\" size=\"10\" value=\"";
			$body .= getSpecialStr($npcRow['special_abilities'], $statsArr[$stat]['specialID']);
			$body .= "\">\n";
			
			if ( $i === 1 )
			{
				$body .= "</td><td><button type=\"button\" onclick=\"setAllText()\">Set All To This</button>";
			}
		}
		
		$body .= "</td></tr>\n";
		
		$i++;
	}
	$body .= "<tr><td><p><input type=\"submit\" value=\"Modify\"></form>\n";
	$body .= "</td></tr></table><p/>\n";
	$body .= "</div>\n";
}

function processEdit($stat)
{
	global $mysql, $body, $z, $zoneid, $zoneid2, $_POST, $statsArr, $races, $classes;

	$startId = $zoneid2 * 1000;
	$endId = $startId + 1000 - 1;
	
	$query = "SELECT * FROM npc_types WHERE id>=$startId AND id<$endId GROUP BY id ORDER BY name ASC";
	$npcArr = $mysql->query_mult_assoc($query);
	
	$field = $statsArr[$stat]['field'];
	$type = $statsArr[$stat]['type'];
	$i = 1;
	$key = 'editid1';

	$body .= "<div class=\"edit_form_header\">Results</div>\n";
	$body .= "<div class=\"edit_form_content\">\n";
	$body .= "<table><tr><td><b>NPC Name</b></td><td><b>{$statsArr[$stat]['label']}";
	$body .= isset($statsArr[$stat]['specialID']) ? " ({$statsArr[$stat]['specialID']})" : "";
	$body .= "</b></td></tr>\n";
	
	while (isset($_POST[$key]))
	{
		$npcid = (int)$_POST[$key];
		$data = isset($_POST["editfield$i"]) ? $_POST["editfield$i"] : null;
		
		$query = "SELECT name, level, maxlevel, race, class, $field FROM npc_types WHERE id=$npcid";
		$npcRow = $mysql->query_assoc($query);
		
		$body .= "<tr><td>\n";
		$body .= "{$npcRow['name']} <small>{$npcRow['level']}";
		if ( $npcRow['maxlevel'] > 0 )
		{
			$body .= "-".$npcRow['maxlevel'];
		}
		$body .= " {$races[$npcRow['race']]} {$classes[$npcRow['class']]}</small>\n";
		$body .= "</td><td>";
		
		if ( isset($data) && ($type == "int" || $type == "float") )
		{
			if ( $data === '' )
			{
				$body .= "<font color='red'>unchanged; missing value</font>\n";
			}
			else
			{
				if ($type == "int")
					$data = str_replace(",", "", $data);
				
				if ( !is_numeric($data) )
				{
					$body .= "<font color='red'>unchanged; value not numeric ($data)</font>\n";
				}
				elseif ( $npcRow[$field] != $data )
				{
					$body .= "<font color='green'><b>old value: {$npcRow[$field]} new value: $data</b></font>\n";
					
					$query = "UPDATE npc_types SET $field=$data WHERE id=$npcid";
					$mysql->query_no_result($query);
				}
				else
				{
					$body .= "unchanged\n";
				}
			}
		}
		elseif ( $type == "specialBox" )
		{
			if ( isset($data) )
			{
				if ( hasSpecial($npcRow['special_abilities'], $statsArr[$stat]['specialID']) )
				{
					$body .= "unchanged\n";
				}
				else
				{
					$specialStr = enableSpecial($npcRow['special_abilities'], $statsArr[$stat]['specialID']);
					
					$query = "UPDATE npc_types SET special_abilities = \"$specialStr\" WHERE id=$npcid";
					$mysql->query_no_result_no_log($query);
					
					$body .= "<font color='green'><b>ability enabled</b></font>\n";
				}
			}
			else
			{
				if ( hasSpecial($npcRow['special_abilities'], $statsArr[$stat]['specialID']) )
				{
					$specialStr = disableSpecial($npcRow['special_abilities'], $statsArr[$stat]['specialID']);
					
					$query = "UPDATE npc_types SET special_abilities = \"$specialStr\" WHERE id=$npcid";
					$mysql->query_no_result_no_log($query);
					
					$body .= "<font color='red'><b>ability disabled</b></font>\n";
				}
				else
				{
					$body .= "unchanged\n";
				}
			}			
		}
		elseif ( $type == "specialString" )
		{
			if ( !isset($data) || $data === '' )
			{
				if ( hasSpecial($npcRow['special_abilities'], $statsArr[$stat]['specialID']) )
				{
					$specialStr = disableSpecial($npcRow['special_abilities'], $statsArr[$stat]['specialID']);
					
					$query = "UPDATE npc_types SET special_abilities = \"$specialStr\" WHERE id=$npcid";
					$mysql->query_no_result_no_log($query);
					
					$body .= "<font color='red'><b>removed</b></font>\n";
				}
				else
				{
					$body .= "unchanged";
				}
			}
			else
			{
				if ( strpos($data, (string)$statsArr[$stat]['specialID']) !== 0 )
				{
					$body .= "<font color='red'><b>INPUT ERROR</b></font>";
				}
				else
				{
					$current = getSpecialStr($npcRow['special_abilities'], $statsArr[$stat]['specialID']);
					
					if ( $current == $data )
					{
						$body .= "unchanged";
					}
					else
					{
						$specialStr = addSpecialString($npcRow['special_abilities'], $statsArr[$stat]['specialID'], $data);
							
						$query = "UPDATE npc_types SET special_abilities = \"$specialStr\" WHERE id=$npcid";
						$mysql->query_no_result_no_log($query);
						
						$body .= "<font color='green'><b>old: $current  new: $data</b></font>\n";
					}
				}
			}
		}
		
		$body .= "</td></tr>\n";
		$i++;
		$key = "editid$i";
	}
	
	$body .= "</td></tr></table><p/>\n";
	$body .= "</div>\n";

	$key = 'editid1';
	$i = 1;
	if ( isset($_POST[$key]) )
	{
		$body .= "<div class=\"edit_form_content\">\n";
		$body .= "<form action=\"./index.php?editor=npcmultiedit&z=$z&zoneid=$zoneid\" method=\"post\">\n";
		
		while (isset($_POST[$key]))
		{
			$npcid = (int)$_POST[$key];
			$body .= "<input type=\"hidden\" name=\"editid$i\" value=\"$npcid\">\n";
			$i++;
			$key = "editid$i";
		}		
		
		$body .= "<input type=\"submit\" value=\"Edit Another Stat\"></form></div>\n";
	}
}

// ----------------------------------------------------------------------------------------------

if ( !isset($zonelist) )
{
	$zonelist = zones();
}

// zoneid = 'id' from zone table; used in URLs
// zoneid2 = 'zoneidnumber' from zone table; used to get NPC type IDs
if ( isset($_GET['z']) )
{
	$z = $_GET['z'];
	
	if ( $z == "" )
	{
		$zoneid = 0;
		$zoneid2 = 0;
	}
	else
	{
		$zoneid2 = getZoneID($z);
	}
}
else
{
	$zoneid = 0;
	$zoneid2 = 0;
}

if ( isset($_POST['state']) )
{
	$state = $_POST['state'];

	if ( $zoneid == 0 || ($state !== "update" && $state !== "input" && $state !== "select") )
	{
		$state = "zone";
	}
}
else
{
	if ( $zoneid != 0 )
	{
		$state = "select";
	}
	else
	{
		$state = "zone";
	}
}


if ( isset($_POST['stat']) && is_numeric($_POST['stat'] ) )
{
	$stat = (int)$_POST['stat'];
	
	if ( $stat < 1 || $stat > sizeof($statsArr) )
	{
		$stat = 0;
	}
}
else
{
	$stat = 0;
}

$body = "<center>\n";

if ( $state == "select" )
{
	formSelectNPCs();
}
elseif ( $state == "input" )
{
	formEditStat($stat);
}
elseif ( $state == "update" )
{
	processEdit($stat);
}
$body .= "</center>\n";

?>
