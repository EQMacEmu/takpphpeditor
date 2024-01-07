      <table class="edit_form">
        <tr>
          <td class="edit_form_header">
            <?=$ltname ?? ""?>
          </td>
        </tr>
        <tr>
          <td class="edit_form_content">
            <strong>LootTable:</strong> <?=$ltid ?? ""?><br>
            <strong>LootDrop:</strong> <?=$ldid ?? ""?><br><br>
            <form name="loottable" id="loottable" method="post" action="index.php?editor=loot&z=<?=$currzone ?? ""?>&zoneid=<?=$currzoneid ?? ""?>&action=8&npcid=<?=$npcid?>&ltid=<?=$ltid ?? ""?>&ldid=<?=$ldid ?? ""?>">
                <strong><label for="mindrop">Mindrop:</label></strong><br>
              <input class="indented" type="text" size="5" id="mindrop" name="mindrop" value="<?=$mindrop ?? ""?>"><br><br>
                <strong><label for="droplimit">Droplimit:</label></strong><br>
              <input class="indented" type="text" size="5" id="droplimit" name="droplimit" value="<?=$droplimit ?? ""?>"><br><br>
                <strong><label for="multiplier">Multiplier:</label></strong><br>
              <input class="indented" type="text" size="5" id="multiplier" name="multiplier" value="<?=$multiplier ?? ""?>"><br><br>
                <strong><label for="multiplier_min">Multiplier Min:</label></strong><br>
              <input class="indented" type="text" size="5" id="multiplier_min" name="multiplier_min" value="<?=$multiplier_min ?? ""?>"><br><br>
                <strong><label for="probability">Probability:</label></strong><br>
              <input class="indented" type="text" size="5" id="probability" name="probability" value="<?=$probability ?? ""?>"><br><br>
              <div class="center">
                <input type="submit" name="submit" value="Submit Changes">
              </div>
            </form>
          </td>
        </tr>
      </table>
