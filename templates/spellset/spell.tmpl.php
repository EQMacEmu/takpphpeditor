<?php if(isset($id) && ($id != 0)):?>
      <div class="table_container" style="width: 350px;">
        <div class="table_header">
          <div style="float:right">
            <a href="index.php?editor=spellset&z=<?=$currzone ?? ""?>&zoneid=<?=$currzoneid ?? ""?>&npcid=<?=$npcid?>&spellset=<?=$spellset?>&action=1">
              <img src="images/c_table.gif" style="border: 0;" alt="Edit Icon" title="Edit Spellset">
            </a>
              <?php if(!$spellset):?>
            <a href="index.php?editor=spellset&z=<?=$currzone ?? ""?>&zoneid=<?=$currzoneid ?? ""?>&npcid=<?=$npcid?>&action=9">
              <img src="images/create.gif" style="border: 0;" alt="Change Icon" title="Change Spellset">
            </a>
           <a onClick="return confirm('Really Copy Spellset <?=$id?>?');" href="index.php?editor=spellset&z=<?=$currzone ?? ""?>&zoneid=<?=$currzoneid ?? ""?>&npcid=<?=$npcid?>&spellsetid=<?=$id?>&action=16"><img src="images/last.gif" style="border: 0;" alt="Copy Icon" title="Copy Spellset"></a>&nbsp;
            <a href="index.php?editor=spellset&z=<?=$currzone ?? ""?>&zoneid=<?=$currzoneid ?? ""?>&npcid=<?=$npcid?>&action=14" onClick="return confirm('Really unassign this NPC\'s spellset?')">
              <img src="images/minus2.gif" style="border: 0;" alt="Minus Icon" title="Unassign Spellset">
            <a href="index.php?editor=spellset&z=<?=$currzone ?? ""?>&zoneid=<?=$currzoneid ?? ""?>&npcid=<?=$npcid?>&id=<?=$id?>&action=17"><img src="images/upgrade.gif" style="border: 0;" alt="Upgrade Icon" title="Apply Spellset to Multiple NPCs"></a>&nbsp;
            </a>
              <?php endif;?>
            <a href="index.php?editor=spellset&z=<?=$currzone ?? ""?>&zoneid=<?=$currzoneid ?? ""?>&npcid=<?=$npcid?>&id=<?=$id?>&action=7" onClick="return confirm('Really delete this spellset? This will affect all NPCs that share this list!')">
              <img src="images/table.gif" style="border: 0;" alt="Delete Icon" title="Delete Spellset">
            </a>
          </div>
          Spellset: <?=$name ?? ""?> (<?=$id?>)
        </div>
        <div class="table_content">
          <strong>Attack Proc:</strong> <?php echo (isset($attack_proc) && isset($proc_name) && $attack_proc != -1) ? "$proc_name ($attack_proc) [<a href=\"https://lucy.allakhazam.com/spell.html?source=Live&id=$attack_proc\">Lucy</a>]" : "none";?><br>
            <?php if(isset($attack_proc) && $attack_proc != -1):?>
          <strong>Proc Chance:</strong> <?=$proc_chance ?? ""?>%<br>
            <?php endif;?>
          <br><strong>Parent List:</strong> <?php echo (isset($parent_list) && isset($parent['name']) && $parent_list != 0) ? "{$parent['name']} ({$parent['id']})" : "none";?><br>
        </div>
      </div>
<?php endif;?>

<?php if((isset($spells)) && ($spells != 0)):?>
      <br>
      <div class="table_container">
        <div class="table_header">
          <div style="float:right">
            <a href="index.php?editor=spellset&z=<?=$currzone ?? ""?>&zoneid=<?=$currzoneid ?? ""?>&npcid=<?=$npcid?>&spellset=<?=$spellset?>&id=<?=$id?>&action=3">
              <img src="images/add.gif" style="border: 0;" alt="Add Icon" title="Add a Spell">
            </a>
          </div>
          Spellset: <?=$name ?? ""?> (<?=$id?>)
        </div>
        <div class="table_content">
          <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr style="background-color: #BBBBBB">
              <th style="padding: 0; width: 28%;">Spell</th>
			  <th style="padding: 0; width: 5%; text-align: center;">Flag</th>
              <th style="padding: 0; width: 7%; text-align: center;">Type</th>
              <th style="padding: 0; width: 7%; text-align: center;">minlevel</th>
              <th style="padding: 0; width: 7%; text-align: center;">maxlevel</th>
              <th style="padding: 0; width: 8%; text-align: center;">manacost</th>
              <th style="padding: 0; width: 10%; text-align: center;">recast delay</th>
              <th style="padding: 0; width: 8%; text-align: center;">priority</th>
              <th style="padding: 0; width: 8%; text-align: center;">resist adj</th>
              <th style="padding: 0; width: 8%; text-align: center;"></th>
            </tr>
              <?php $x=0; foreach($spells as $spell): extract($spell);?>
            <tr<?php echo($x % 2 == 1) ? " bgcolor=\"#BBBBBB\"" : "";?>>
              <td style="padding: 0;"><?=$name?> (<?=$spellid?>) [<a href="https://lucy.allakhazam.com/spell.html?source=Live&id=<?=$spellid?>">Lucy</a>]</td>
			  <td style="padding: 0; text-align: center;"><?echo ($min_expansion > -1 || $max_expansion > -1 || $content_flags != "" || $content_flags_disabled != "") ? "Yes" : "No";?></td>
              <td style="padding: 0; text-align: center;"><?=$spelltypes[$type]?></td>
              <td style="padding: 0; text-align: center;"><?=$minlevel?></td>
              <td style="padding: 0; text-align: center;"><?=$maxlevel?></td>
              <td style="padding: 0; text-align: center;"><?php echo ($manacost != -1) ? $manacost : "Default";?></td>
              <td style="padding: 0; text-align: center;"><?php echo ($recast_delay != -1) ? $recast_delay : "Default";?></td>
              <td style="padding: 0; text-align: center;"><?=$priority?></td>
              <td style="padding: 0; text-align: center;"><?=$resist_adjust?></td>
              <td style="padding: 0; text-align: right;">
                <a href="index.php?editor=spellset&z=<?=$currzone?>&zoneid=<?=$currzoneid?>&npcid=<?=$npcid?>&spellset=<?=$spellset?>&id=<?=$id?>&action=6">
                  <img src="images/edit2.gif" style="border: 0;" alt="Edit Icon" title="Edit Spell">
                </a>&nbsp;
                <a href="index.php?editor=spellset&z=<?=$currzone?>&zoneid=<?=$currzoneid?>&npcid=<?=$npcid?>&spellset=<?=$spellset?>&id=<?=$id?>&action=5" onClick="return confirm('Really remove this spell from the spellset?');">
                  <img src="images/remove3.gif" style="border: 0;" alt="Remove Icon" title="Remove Spell from Spellset">
                </a>
              </td>
            </tr>
                  <?php $x++; endforeach;?>
          </table>
        </div>
      </div>
<?php endif;?>

<?php if((isset($id)) &&  (!isset($spells) || ($spells == 0))):?>
      <br>
      <div class="table_container">
        <div class="table_header">
          <div style="float:right">
            <a href="index.php?editor=spellset&z=<?=$currzone ?? ""?>&zoneid=<?=$currzoneid ?? ""?>&npcid=<?=$npcid?>&id=<?=$id?>&action=3">
              <img src="images/add.gif" style="border: 0;" alt="Add Icon" title="Add a Spell">
            </a>
          </div>
          Spellset: <?=$name ?? ""?> (<?=$id?>)
        </div>
        <div class="table_content">
          No spells currently assigned
        </div>
      </div>
<?php endif;?>

<?php if(isset($parent_list) && ($parent_list != 0)):?>
      <br>
      <div class="table_container">
        <div class="table_header">
          <div style="float:right">
            <a href="index.php?editor=spellset&z=<?=$currzone ?? ""?>&zoneid=<?=$currzoneid ?? ""?>&npcid=<?=$npcid?>&spellset=<?=$spellset?>&id=<?=$parent['id'] ?? ""?>&action=3">
              <img src="images/add.gif" style="border: 0;" alt="Add Icon" title="Add a Spell">
            </a>
          </div>
          Parent List: <?=$parent['name'] ?? ""?> (<?=$parent['id'] ?? ""?>)
        </div>
        <div class="table_content">
          <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
              <?php if ($parent['spells'] ?? ""):?>
            <tr style="background-color: #BBBBBB">
              <th style="padding: 0; width: 30%;">Spell</th>
			  <th style="padding: 0; width: 5%; text-align: center;">Flag</th> 
				<th style="padding: 0; width: 9%; text-align: center;">Type</th>
              <th style="padding: 0; width: 9%; text-align: center;">minlevel</th>
              <th style="padding: 0; width: 9%; text-align: center;">maxlevel</th>
              <th style="padding: 0; width: 9%; text-align: center;">manacost</th>
              <th style="padding: 0; width: 10%; text-align: center;">recast delay</th>
              <th style="padding: 0; width: 9%; text-align: center;">priority</th>
              <th style="padding: 0; width: 9%; text-align: center;">resist adj</th>
              <th style="padding: 0; width: 10%; text-align: center;"></th>
            </tr>
                  <?php if(isset($parent['spells'])) { $x=0; foreach($parent['spells'] as $spell): extract($spell);?>
            <tr<?php echo($x % 2 == 1) ? " bgcolor=\"#BBBBBB\"" : "";?>>
              <td style="padding: 0;"><?=$name?> (<?=$spellid?>) [<a href="https://lucy.allakhazam.com/spell.html?source=Live&id=<?=$spellid?>">Lucy</a>]</td>
			  <td style="padding: 0; text-align: center;"><?echo ($min_expansion > -1 || $max_expansion > -1 || $content_flags != "" || $content_flags_disabled != "") ? "Yes" : "No";?></td>
			  <td style="padding: 0; text-align: center;"><?=$spelltypes[$type]?></td>
              <td style="padding: 0; text-align: center;"><?=$minlevel?></td>
              <td style="padding: 0; text-align: center;"><?=$maxlevel?></td>
              <td style="padding: 0; text-align: center;"><?php echo ($manacost != -1) ? $manacost : "Default";?></td>
              <td style="padding: 0; text-align: center;"><?php echo ($recast_delay != -1) ? $recast_delay : "Default";?></td>
              <td style="padding: 0; text-align: center;"><?=$priority?></td>
              <td style="padding: 0; text-align: center;"><?=$resist_adjust?></td>
              <td style="padding: 0; text-align: right;">
                <a href="index.php?editor=spellset&z=<?=$currzone?>&zoneid=<?=$currzoneid?>&npcid=<?=$npcid?>&spellset=<?=$spellset?>&id=<?=$id?>&action=6">
                  <img src="images/edit2.gif" style="border: 0;" alt="Edit Icon" title="Edit Spell">
                </a>&nbsp;
                <a href="index.php?editor=spellset&z=<?=$currzone?>&zoneid=<?=$currzoneid?>&npcid=<?=$npcid?>&spellset=<?=$spellset?>&id=<?=$id?>&action=5" onClick="return confirm('Really remove this spell from the spellset?');">
                  <img src="images/remove3.gif" style="border: 0;" alt="Remove Icon" title="Remove Spell from Spellset">
                </a>
              </td>
            </tr>
                      <?php $x++; endforeach;}?>
              <?php endif;?>
              <?php if (!isset($parent['spells'])):?>
            <tr>
              <td style="padding: 0;" colspan="8">
                No spells currently assigned
              </td>
            </tr>
              <?php endif;?>
          </table>
        </div>
      </div>
<?php endif;?>
<?php if(!isset($id)):?>
      <div class="table_container" style="width: 350px;">
        <div class="table_header">
          No assigned spellset
        </div>
        <div class="table_content">
          <div class="center">
            No spellset currently assigned.<br><br>
            <a href="index.php?editor=spellset&z=<?=$currzone ?? ""?>&zoneid=<?=$currzoneid ?? ""?>&npcid=<?=$npcid?>&action=9">Click to change</a>
          </div>
        </div>
      </div>
<?php endif;?>
