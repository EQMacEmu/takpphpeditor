      <table class="edit_form">
        <tr>
          <td class="edit_form_header">
            Lootdrop: <?=$ldid ?? ""?>
          </td>
        </tr>
        <tr>
          <td class="edit_form_content">
          <form name="item" method="post" action="index.php?editor=loot&z=<?=$currzone ?? ""?>&zoneid=<?=$currzoneid ?? ""?>&action=42&npcid=<?=$npcid?>&ldid=<?=$ldid ?? ""?>">
              <strong><label for="lootdropid">Merge with:</label></strong> <br>
            <input class="indented" type="text" size="10" id="lootdropid" name="lootdropid" value=""><br><br>
            <div class="center">
              <input type="submit" name="submit" value="Submit Changes">
            </div>
          </form>
          </td>
        </tr>
      </table>
