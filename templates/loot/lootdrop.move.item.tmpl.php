      <table class="edit_form">
        <tr>
          <td class="edit_form_header">
            <?=$ldname ?? ""?>
          </td>
        </tr>
        <tr>
          <td class="edit_form_content">
          <form name="item" method="post" action="index.php?editor=loot&z=<?=$currzone ?? ""?>&zoneid=<?=$currzoneid ?? ""?>&action=48&npcid=<?=$npcid?>&ldid=<?=$ldid ?? ""?>&itemid=<?=$itemid ?? ""?>">
            <strong>Lootdrop:</strong> <?=$ldid ?? ""?><br>
            <strong>Item:</strong> <?=$itemid ?? ""?><br><br>
            <strong>Move to Lootdrop:</strong><br/>
              <input type="radio" id="copy_item" name="move_copy_item" value="1" checked><label for="copy_item">Copy Item</label><br>
              <input type="radio" id="move_item" name="move_copy_item" value="0"><label for="move_item">Move Item</label><br>
              <input class="indented" type="text" size="5" id="movetolootdrop" name="movetolootdrop" value="<?=$new_ldid ?? ""?>"><label for="movetolootdrop">&nbsp;(new lootdrop id)</label><br><br>
            <strong>Equipped:</strong><br>
              <input type="radio" id="equip_item_no" name="equip_item" value="0"<?php echo (!empty($equip_item) && $equip_item == 0) ? " checked" : ""?>><label for="equip_item_no">no</label><br>
              <input type="radio" id="equip_item_yes" name="equip_item" value="1"<?php echo (!empty($equip_item) && $equip_item == 1) ? " checked" : ""?>><label for="equip_item_yes">yes</label><br><br>
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
            <div class="center">
              <input type="submit" name="submit" value="Submit Changes">
            </div>
          </form>
          </td>
        </tr>
      </table>
