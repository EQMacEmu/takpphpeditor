  <div class="edit_form" style="width: 500px">
    <div class="edit_form_header">Add Faction Entry</div>
      <div class="edit_form_content">
        <form name="player_factions" method="post" action="index.php?editor=faction&action=13">
          <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0;"><b><label for="char_id">Character ID:</label></b></td>
                <td style="padding: 0;"><b><label for="faction_id">Faction:</label></b></td>
                <td style="padding: 0;"><b><label for="current_value">Current Value:</label></b></td>
            </tr>
            <tr>
              <td style="padding: 0;"><input type="text" size="9" id="char_id" name="char_id" value=""></td>
              <td style="padding: 0;">
                <select id="faction_id" name="faction_id">
                  <option value="">Select a Faction</option>
                    <?php
                    if(!empty($factions)) {
                        foreach ($factions as $faction) {
                    ?>
                            <option value="<?=$faction['id']?>"><?=$faction['name']?></option>
                    <?php }
                    }?>
                </select>
              </td>
              <td style="padding: 0;"><input type="text" size="10" id="current_value" name="current_value" value="0"></td>
            </tr>
          </table><br/><br/>
          <div class="center">
            <input type="submit" value="Submit Changes">&nbsp;<input type="button" value="Cancel" onClick="history.back();">
          </div>
        </form>
      </div>
    </div>
