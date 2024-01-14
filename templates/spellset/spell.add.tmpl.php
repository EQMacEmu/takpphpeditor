      <div class="center">
        <iframe id='searchframe' src='templates/iframes/spellsearch.php'></iframe>
        <input id="button" type="button" value='Hide Spell Search' onclick='hideSearch();' style='display:none; margin-bottom: 20px;'>
      </div>

      <div class="table_container" style="width: 150px">
        <div class="edit_form_header">
            Add a Spell
        </div>
        <div class="edit_form_content">
          <form method="post" action="index.php?editor=spellset&z=<?=$currzone ?? ""?>&zoneid=<?=$currzoneid ?? ""?>&npcid=<?=$npcid?>&spellset=<?=$spellset?>&action=4">
              <strong><label for="id">Spell ID:</label></strong> (<a href="javascript:showSearch();">search</a>)<br>
            <input class="indented" id="id" type="text" name="spellid" size="10" value="0"><br><br>

              <strong><label for="type">Type:</label></strong> <br>
            <select class = "indented" id="type" name="type">
                <?php foreach($spelltypes as $k => $v):?>
              <option value="<?=$k?>"><?=$v?></option>
                <?php endforeach;?>
            </select><br><br>

            <strong>Minlevel:</strong><br>
            <input class="indented" id="id" type="text" name="minlevel" size="10" value="1"><br><br>

            <strong>Maxlevel:</strong><br>
            <input class="indented" id="id" type="text" name="maxlevel" size="10" value="255"><br><br>

            <strong>Mana Cost:</strong><br>
            <input class="indented" id="id" type="text" name="manacost" size="10" value="-1"><br>
            (-1 = Default)<br><br>

            <strong>Recast Delay:</strong><br>
            <input class="indented" id="id" type="text" name="recast_delay" size="10" value="-1"><br>
            (-1 = Default)<br><br>

            <strong>Priority:</strong><br>
            <input class="indented" id="id" type="text" name="priority" size="10" value="0"><br><br>

            <strong>Resist Adj:</strong><br>
            <input class="indented" id="id" type="text" name="resist_adjust" size="10" value=""><br><br>

            <div class="center">
              <input type="hidden" name="npc_spells_id" value="<?=$npc_spells_id ?? ""?>">
              <input type="submit" name="submit" value="Submit">
            </div>
          </form>
        </div>
      </div>