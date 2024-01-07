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
                <label for="prob">Probability:</label> <br><input type="text" id="prob" name="prob" value="<?=$probability ?? ""?>"><br><br>
                <label for="mult">Multiplier:</label> <br><input type="text" id="mult" name="mult" value="<?=$multiplier ?? ""?>"><br><br>
              <div class="center">
                <input type="submit" name="submit" value="Submit Changes">
              </div>
            </form>
          </td>
        </tr>
      </table>
