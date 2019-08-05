  <center>
  <div class="table_container" style="display: inline-block">
  <div class="table_header">
      NPCs assigned to grid <?=$pathgrid?>
  </div>
  <table class="table_content" cellpadding="2">
<?if($grid_npcs != ''):?>
    <tr><td><b>NPC Name</b></td><td><b>Spawngroup</b></td><td><b>Spawnpoint ID</b></td></tr>
<?foreach($grid_npcs as $grid_npc): extract($grid_npc);?>
	<tr>
		<td>
			<a href="index.php?editor=spawn&z=<?=$currzone?>&zoneid=<?=$currzoneid?>&npcid=<?=$npcid?>"><?=getNPCName($npcid)?></a>
		</td>
		<td>
			<?=$name?> (<?=$spawngroupid?>)
		</td>
		<td>
			<?=$spawn2id?>
		</td>
	</tr>
<?endforeach;?>
<?endif;?>
<?if($grid_npcs == ''):?>
    <tr><td>Your search produced no results!</td></tr>
<?endif;?>
  </table>
  </div>
  </div>
  </center>