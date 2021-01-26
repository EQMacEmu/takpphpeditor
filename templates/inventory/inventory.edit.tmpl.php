      <table class="edit_form" width="300px">
        <tr>
          <td class="edit_form_header">
            Inventory item located at <?=getPlayerName($inv_item['id'])?>'s <?=$slots[$inv_item['slotid']]?>
          </td>
        </tr>
        <tr>
          <td class="edit_form_content">
            <form name="inventory" id="inventory" method="POST" action="index.php?editor=inv&playerid=<?=$inv_item['id']?>&slotid=<?=$inv_item['slotid']?>&action=7">
              <table width="100%" cellpadding="3" cellspacing="0">
                <tr>
                  <td>
                    Player ID:<br>
                    <input type="text" size="5" name="charid" value="<?=$inv_item['id']?>" readonly="true">
                  </td>
                  <td>
                    <a title="22-29: Main Inventory Slots">Slot ID:</a><br>
                    <input type="text" size="3" name="slotid" value="<?=$inv_item['slotid']?>" readonly="true">
                  </td>
                  <td>
                    Item ID:<br>
                    <input type="text" size="5" name="itemid" value="<?=$inv_item['itemid']?>">
                  </td>
                </tr>
                <tr>
                  <td>
                    Charges:<br>
                    <input type="text" size="3" name="charges" value="<?=$inv_item['charges']?>">
                  </td>
                  <td colspan="2">
                    Color:<br>
                    <input type="text" size="10" name="color" value="<?=$inv_item['color']?>">
                  </td>
                </tr>
                <tr>
                  <td>
                    Inst NoDrop:<br>
                    <input type="checkbox" name="instnodrop"<?echo ($inv_item['instnodrop'] == 1) ? " checked" : "";?>>
                  </td>
                </tr>
                <tr>
                  <td colspan="3">
                    Custom Data:<br>
                    <input type="text" size="37" name="custom_data" value="<?=$inv_item['custom_data']?>">
                  </td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                <tr>
                  <td colspan="3">
                    <center>
                      <input type="submit" name="submit" value="Submit Changes">&nbsp;<input type="button" name="cancel" value="Cancel" onClick="history.back();">
                    </center>
                  </td>
                </tr>
              </table>
            </form>
          </td>
        </tr>
      </table>
