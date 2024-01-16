  <form name="spawnpoint" method="post" action="index.php?editor=spawn&z=<?=$currzone ?? ""?>&zoneid=<?=$currzoneid ?? ""?>&npcid=<?=$npcid?>&action=53">
    <div class="edit_form" style="width: 200px;">
      <div class="edit_form_header">
        Move Spawnpoint ID: <?=$id?>
      </div>
      <div class="edit_form_content">
	    <div class="center">
            <span style="text-align: left; width: 17%;"><label for="sgid">Spawngroup ID:</label><input type="text" id="sgid" name="sgid" size="7" value=""></span><br><br>
          <input type="submit" value="Move Spawn">
          <input type="hidden" name="id" value="<?=$id?>">
        </div>
      </div>
      </div>
  </form>
