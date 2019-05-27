<?if($results != ''):?>
      <div class="table_container" style="width:375px;">
        <div class="table_header">
			<b>NPCs That Drop <?=$results[0]["itemname"]?></b> (count: <?=count($results)?>)
        </div>
        <div class="table_content">
			<center><table><tr><td><b>NPC Name</b></td><td><b>Zone</b></td><td><b>Level</b></td><td><b>Drop %</b></td></tr>
<?$x=0; foreach($results as $result): extract($result);?>
				<tr<?echo($x % 2 == 1) ? " bgcolor=\"#BBBBBB\"" : "";?>>
					<td><a href="index.php?editor=loot&z=<?=get_zone_by_npcid($id)?>&zoneid=<?=get_zoneid_by_npcid($id)?>&npcid=<?=$id?>"><?=$name?></a></td>
					<td><?=get_zone_by_npcid($id)?></td>
					<td><?=$level?></td>
					<td><?=($chance*$probability/100)?>%</td>
				</tr>
<?$x++; endforeach;?>
			</table></center>
        </div>
      </div>
<?endif;?>
<?if($results == ''):?>
          <center>Your search produced no results!</center>
<?endif;?>
