<?php if(!empty($results)):?>
      <div class="center"><div class="table_container" style="display: inline-block">
        <div class="table_header">
			<b>NPCs That Drop <?=$results[0]["itemname"]?></b> (count: <?=count($results)?>)
        </div>
		<table class="table_content2">
			<tr><td><b>NPC Name</b></td><td><b>Zone</b></td><td><b>Level</b></td><td><b>Drop %</b></td><td><b>Lootdrop</b></td></tr>
            <?php $x=1; foreach($results as $result): extract($result);?>
				<tr<?php echo($x % 2 == 1) ? " style=\"background-color: #BBBBBB\"" : "";?>>
					<td><a href="index.php?editor=loot&z=<?=get_zone_by_npcid($id)?>&zoneid=<?=get_zoneid_by_npcid($id)?>&npcid=<?=$id?>"><?=$name?></a>&nbsp;</td>
					<td><?=get_zone_by_npcid($id)?>&nbsp;</td>
					<td><?=$level?></td>
					<td><?=($chance*$probability/100)?>%</td>
					<td><?=$lootdropname?></td>
				</tr>
                <?php $x++; endforeach;?>
		</table>
      </div></div>
<?php endif;?>
<?php if(empty($results)):?>
          <div class="center">Your search produced no results!</div>
<?php endif;?>
