      <table class="edit_form" style="width: 300px;">
        <tr>
          <td class="edit_form_header">
            Inventory item for <?=getPlayerName($playerid ?? '') ?? 'Unknown Player'?>
          </td>
        </tr>
        <tr>
          <td class="edit_form_content">
            <form name="inventory" id="inventory" method="POST" action="index.php?editor=inv&action=5">
              <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
                <tr>
                  <td style="padding: 3px;">
                      <label for="charid">Player ID:</label><br/>
                    <input type="text" size="5" id="charid" name="charid" value="<?=$playerid ?? ""?>" readonly="readonly">
                  </td>
                  <td style="padding: 3px;">
                      <a title="22-29: Main Inventory Slots"><label for="slotid">Slot ID:</label></a><br/>
                    <input type="text" size="3" id="slotid" name="slotid" value="">
                  </td>
                  <td style="padding: 3px;">
                      <label for="itemid">Item ID:</label>
                    <input type="text" size="5" id="itemid" name="itemid" value="">
                  </td>
                </tr>
                <tr>
                  <td style="padding: 3px;">
                      <label for="charges">Charges:</label><br/>
                    <input type="text" size="3" id="charges" name="charges" value="0">
                  </td>
                  <td colspan="2" style="padding: 3px;">
                      <label for="color">Color:</label><br/>
                    <input type="text" size="10" id="color" name="color" value="4278190080">
                  </td>
                </tr>
                <tr>
                  <td style="padding: 3px;">
                      <label for="instnodrop">Inst NoDrop:</label><br/>
                    <input type="checkbox" id="instnodrop" name="instnodrop">
                  </td>
                </tr>
                <tr>
                  <td colspan="3" style="padding: 3px;">
                      <label for="custom_data">Custom Data:</label><br/>
                    <input type="text" size="37" id="custom_data" name="custom_data" value="">
                  </td>
                </tr>
                <tr><td style="padding: 3px;">&nbsp;</td></tr>
                <tr>
                  <td colspan="3" style="padding: 3px;">
                    <div class="center">
                      <input type="submit" name="submit" value="Submit Changes">&nbsp;<input type="button" name="cancel" value="Cancel" onClick="history.back();">
                    </div>
                  </td>
                </tr>
              </table>
            </form>
          </td>
        </tr>
      </table>
      <script>alert("WARNING!\n\nManually adding an item incorrectly may cause the character to not be able to load into the game.");</script>
