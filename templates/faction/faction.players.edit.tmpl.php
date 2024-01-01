  <div class="edit_form" style="width: 500px">
    <div class="edit_form_header">Edit Faction Entry</div>
      <div class="edit_form_content">
        <form name="player_factions" method="post" action="index.php?editor=faction&action=11">
          <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0;"><b><label for="id">Character ID:</label></b></td>
                <td style="padding: 0;"><b><label for="faction_id">Faction:</label></b></td>
                <td style="padding: 0;"><b><label for="current_value">Current Value:</label></b></td>
            </tr>
            <tr>
              <td style="padding: 0;"><input type="text" size="9" id="id" name="id" value="<?=$id ?? ""?>"></td>
              <td style="padding: 0;">
                <select id="faction_id" name="faction_id">
                  <option value="">Select a Faction</option>
                    <?php if(!empty($factions)) {
                        foreach ($factions as $faction) {?>
                          <option value="<?=$faction['id']?>"<?php if (!empty($faction_id) && $faction_id == $faction['id']): ?> selected<?php endif;?>><?=$faction['name']?></option>
                    <?php }
                    }?>
                </select>
              </td>
              <td style="padding: 0;"><input type="text" size="10" id="current_value" name="current_value" value="<?=$current_value ?? ""?>"></td>
            </tr>
          </table><br/><br/>
          <div class="center">
            <input type="hidden" name="o_cid" value="<?=$id ?? ""?>">
            <input type="hidden" name="o_fid" value="<?=$faction_id ?? ""?>">
            <input type="submit" value="Submit Changes">&nbsp;<input type="button" value="Cancel" onClick="history.back();">
          </div>
        </form>
      </div>
    </div>
