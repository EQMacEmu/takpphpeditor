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
			    <strong><label for="min_expansion">Min Expansion:</label></strong><br>
              <input class="indented" type="text" size="5" id="min_expansion" name="min_expansion" value="<?=$min_expansion ?? ""?>"><br><br>
			    <strong><label for="max_expansion">Max Expansion:</label></strong><br>
              <input class="indented" type="text" size="5" id="max_expansion" name="max_expansion" value="<?=$max_expansion ?? ""?>"><br><br>
			    <strong><label for="content_flags">Content Flags:</label></strong><br>
              <input class="indented" type="text" size="5" id="content_flags" name="content_flags" value="<?=$content_flags ?? ""?>"><br><br>
			    <strong><label for="content_flags_disabled">Content Flags Disabled:</label></strong><br>
              <input class="indented" type="text" size="5" id="content_flags_disabled" name="content_flags_disabled" value="<?=$content_flags_disabled ?? ""?>"><br><br>
              <div class="center">
                <input type="submit" name="submit" value="Submit Changes">
              </div>
            </form>
          </td>
        </tr>
      </table>
