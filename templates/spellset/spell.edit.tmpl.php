      <div class="center">
        <iframe id='searchframe' src='templates/iframes/spellsetsearch.php'></iframe>
        <input id="button" type="button" value='Hide Spellset Search' onclick='hideSearch();' style='display:none; margin-bottom: 20px;'>
      </div>

      <div class="table_container" style="width: 150px">
        <div class="edit_form_header">
            Edit a Spell
        </div>
        <div class="edit_form_content">
          <form method="post" action="index.php?editor=spellset&z=<?=$currzone ?? ""?>&zoneid=<?=$currzoneid ?? ""?>&npcid=<?=$npcid?>&spellset=<?=$spellset?>&action=8">
              <strong><label for="id">Spell ID:</label></strong> (<a href="javascript:showSearch();">search</a>)<br>
            <input class="indented" id="id" type="text" name="spellid" size="10" value="<?=$spellid ?? ""?>"><br><br>

              <strong><label for="type">Type:</label></strong> <br>
            <select class="indented" id="type" name="type">
                <?php foreach($spelltypes as $k => $v):?>
              <option value="<?=$k?>"<?php echo (isset($type) && $k == $type) ? " selected" : ""?>><?=$v?></option>
                <?php endforeach;?>
            </select><br><br>

              <strong><label for="minlevel">Minlevel:</label></strong><br>
            <input class="indented" type="text" id="minlevel" name="minlevel" size="10" value="<?=$minlevel ?? ""?>"><br><br>

              <strong><label for="maxlevel">Maxlevel:</label></strong><br>
            <input class="indented" type="text" id="maxlevel" name="maxlevel" size="10" value="<?=$maxlevel ?? ""?>"><br><br>

              <strong><label for="manacost">Mana Cost:</label></strong><br>
            <input class="indented" type="text" id="manacost" name="manacost" size="10" value="<?=$manacost ?? ""?>"><br>
            (-1 = Default)<br><br>

              <strong><label for="recast_delay">Recast Delay:</label></strong><br>
            <input class="indented" type="text" id="recast_delay" name="recast_delay" size="10" value="<?=$recast_delay ?? ""?>"><br>
            (-1 = Default)<br><br>

              <strong><label for="priority">Priority:</label></strong><br>
            <input class="indented" type="text" id="priority" name="priority" size="10" value="<?=$priority ?? ""?>"><br><br>

              <strong><label for="resist_adjust">Resist Adj:</label></strong><br>
            <input class="indented" type="text" id="resist_adjust" name="resist_adjust" size="10" value="<?=$resist_adjust ?? ""?>"><br><br>

            <div class="center">
              <input type="hidden" name="id" value="<?=$id?>">
              <input type="submit" name="submit" value="Submit">
            </div>
          </form>
        </div>
      </div>