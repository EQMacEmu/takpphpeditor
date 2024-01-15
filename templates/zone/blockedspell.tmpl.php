      <div class="table_container" style="width: 750px;">
      <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
          <tr>
           <td style="padding: 0;">Blocked Spells</a></td>
           <td style="padding: 0; text-align: right;">
          <a href="index.php?editor=zone&z=<?=$currzone ?? ""?>&zoneid=<?=$currzoneid ?? ""?>&action=22"><img src="images/add.gif" style="border: 0;" alt="Add Icon" title="Edit Blocked Spell"></a>
            </td>
           </tr>        
         </table>
      </div>

       <table class="table_content2" style="width: 100%;">
           <?php if (isset($blockedspell)):?>
         <tr>
          <td style="text-align: center; width: 5%"><strong>ID</strong></td>
          <td style="text-align: center; width: 12%"><strong>Spell</strong></td>
          <td style="text-align: center; width: 8%"><strong>Type</strong></td>
          <td style="text-align: center; width: 5%"><strong>X</strong></td>
          <td style="text-align: center; width: 5%"><strong>Y</strong></td>
          <td style="text-align: center; width: 5%"><strong>Z</strong></td>
          <td style="text-align: center; width: 6%"><strong>X Diff</strong></td>
          <td style="text-align: center; width: 6%"><strong>Y Diff</strong></td>
          <td style="text-align: center; width: 6%"><strong>Z Diff</strong></td>
          <td style="text-align: center; width: 25%"><strong>Message</strong></td>
          <td style="text-align: center; width: 10%"><strong>Description</strong></td>
          <th style="width: 5%;"></th>
         </tr>
           <?php $x=0; foreach($blockedspell as $key => $v):?>
        <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA";?>">
          <td style="text-align: center; width: 5%"><?=$v['bsid']?></td>
          <td style="text-align: center; width: 12%"><?=getSpellName($v['spellid'])?> <span>[<a href="https://lucy.allakhazam.com/spell.html?id=<?=$v['spellid']?>">lucy</a>]</span></td>
          <td style="text-align: center; width: 5%"><?=$blockedtype[$v['type']]?></td>
          <td style="text-align: center; width: 5%"><?=$v['x_coord']?></td>
          <td style="text-align: center; width: 5%"><?=$v['y_coord']?></td>
          <td style="text-align: center; width: 5%"><?=$v['z_coord']?></td>
          <td style="text-align: center; width: 6%"><?=$v['x_diff']?></td>
          <td style="text-align: center; width: 6%"><?=$v['y_diff']?></td>
          <td style="text-align: center; width: 6%"><?=$v['z_diff']?></td>
          <td style="text-align: center; width: 25%"><?=$v['message']?></td>
          <td style="text-align: center; width: 10%"><?=$v['description']?></td>
          <td style="text-align: right;">
            <a href="index.php?editor=zone&z=<?=$currzone ?? ""?>&zoneid=<?=$currzoneid ?? ""?>&bsid=<?=$v['bsid']?>&action=19"><img src="images/edit2.gif" style="border: 0;" alt="Edit Icon" title="Edit Entry"></a>
            <a onClick="return confirm('Really Delete Spell <?=$v['bsid']?>?');" href="index.php?editor=zone&z=<?=$currzone ?? ""?>&zoneid=<?=$currzoneid ?? ""?>&bsid=<?=$v['bsid']?>&action=21"><img src="images/remove3.gif" style="border: 0;" alt="Remove Icon" title="Delete this entry"></a>
          </td>
        </tr>
               <?php $x++; endforeach;?>
        </table>
          <?php endif;?>
          <?php if (!isset($blockedspell)):?>
        <tr>
          <td style="text-align: left; width: 100px; padding: 10px;">No blocked spells found</td>
        </tr>
      <?php endif;?>