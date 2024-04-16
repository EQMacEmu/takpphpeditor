      <table class="edit_form">
        <tr>
          <td class="edit_form_header">
            <?=$ldname ?? "" ?>
          </td>
        </tr>
        <tr>
          <td class="edit_form_content">
          <form name="item" method="post" action="index.php?editor=loot&z=<?=$currzone ?? ""?>&zoneid=<?=$currzoneid ?? ""?>&action=6&npcid=<?=$npcid?>&ldid=<?=$ldid ?? ""?>&itemid=<?=$itemid ?? ""?>">
            <strong>Lootdrop:</strong> <?=$ldid ?? ""?><br>
            <strong>Item:</strong> <?=$itemid ?? ""?><br><br>
            <strong>Equipped:</strong><br>
              <input type="radio" id="equip_item_no" name="equip_item" value="0"<?php echo (isset($equip_item) && $equip_item == 0) ? " checked" : ""?>><label for="equip_item_no">no</label><br>
              <input type="radio" id="equip_item_yes" name="equip_item" value="1"<?php echo (isset($equip_item) && $equip_item == 1) ? " checked" : ""?>><label for="equip_item_yes">yes</label><br>
              <input type="radio" id="equip_item_force" name="equip_item" value="2"<?php echo (isset($equip_item) && $equip_item == 2) ? " checked" : ""?>><label for="equip_item_force">force</label><br><br>
              <strong><label for="charges">Item Charges:</label></strong> <br>
            <input class="indented" type="text" size="5" id="charges" name="charges" value="<?=$item_charges ?? ""?>"><br><br>
              <strong><label for="minlevel">Min Level:</label></strong> <br>
            <input class="indented" type="text" size="5" id="minlevel" name="minlevel" value="<?=$minlevel ?? ""?>"><br><br>
              <strong><label for="maxlevel">Max Level:</label></strong> <br>
            <input class="indented" type="text" size="5" id="maxlevel" name="maxlevel" value="<?=$maxlevel ?? ""?>"><br><br>
              <strong><label for="multiplier">Multiplier:</label></strong> <br>
            <input class="indented" type="text" size="5" id="multiplier" name="multiplier" value="<?=$multiplier ?? ""?>"><br><br>
              <strong><label for="chance">Chance:</label></strong> <br>
            <input class="indented" type="text" size="5" id="chance" name="chance" value="<?=$chance ?? ""?>">%<br><br>
              <strong><label for="min_expansion">Min Expansion:</label></strong> <br>
            <input class="indented" type="text" size="5" id="min_expansion" name="min_expansion" value="<?=$min_expansion ?? ""?>"><br><br>
              <strong><label for="max_expansion">Max Expansion:</label></strong> <br>
            <input class="indented" type="text" size="5" id="max_expansion" name="max_expansion" value="<?=$max_expansion ?? ""?>"><br><br>
              <strong><label for="content_flags">Content Flags:</label></strong> <br>
            <input class="indented" type="text" size="25" id="content_flags" name="content_flags" value="<?=$content_flags ?? ""?>"><br><br>
              <strong><label for="content_flags_disabled">Content Flags Disabled:</label></strong> <br>
            <input class="indented" type="text" size="25" id="content_flags_disabled" name="content_flags_disabled" value="<?=$content_flags_disabled ?? ""?>"><br><br>



            <div class="center">
              <input type="submit" name="submit" value="Submit Changes">
            </div>
          </form>
          </td>
        </tr>
      </table>
