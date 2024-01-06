        <div class="table_container" style="width: 700px;">
          <div class="table_header">
            <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
              <tr>
                <td style="padding: 0;">Edit Quest Global</td>
              </tr>
            </table>
          </div>
          <div class="table_content">
            <form name="qglobal" method="post" action="index.php?editor=qglobal&action=5">
              <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
                <tr>
                  <td style="width: 33%; padding: 0;">
                      <label for="name">Name:</label><br>
                    <input type="text" id="name" name="name" value="<?=$name ?? ""?>">
                  </td>
                  <td style="width: 33%; padding: 0;">
                      <label for="charid">Player:</label><br>
                    <input type="text" id="charid" name="charid" value="<?=$charid ?? ""?>">
                  </td>
                  <td style="width: 33%; padding: 0;">
                      <label for="npcid">NPC:</label><br>
                    <input type="text" id="npcid" name="npcid" value="<?=$npcid?>">
                  </td>
                </tr>
                <tr>
                  <td style="width: 34%; padding: 0;">
                      <label for="zoneid">Zone:</label><br>
                    <input type="text" id="zoneid" name="zoneid" value="<?=$zoneid?>">
                  </td>
                  <td style="width: 33%; padding: 0;">
                      <label for="expdate">Expires:</label><br>
                    <input type="text" id="expdate" name="expdate" value="<?=$expdate ?? ""?>">
                  </td>
                  <td style="width: 34%; padding: 0;">
                      <label for="value">Value:</label><br>
                    <input type="text" id="value" name="value" value="<?=$value ?? ""?>">
                  </td>
                </tr>
                <tr>
                  <td style="padding: 0;" colspan="3">&nbsp;</td>
                </tr>
              </table>
              <div class="center">
                <input type="hidden" name="old_name" value="<?=$name ?? ""?>">
                <input type="hidden" name="old_charid" value="<?=$charid ?? ""?>">
                <input type="hidden" name="old_npcid" value="<?=$npcid?>">
                <input type="hidden" name="old_zoneid" value="<?=$zoneid?>">
                <input type="hidden" name="referer" value="<?php echo $_SERVER["HTTP_REFERER"];?>">
                <input type="submit" value="Update Quest Global">
                <input type="button" value="Cancel Changes" onClick="history.back()">
              </div>
            </form>
          </div>
        </div>
