        <div class="edit_form" style="width: 400px">
          <div class="edit_form_header">Edit Keyring: <?=$key_item?></div>
          <div class="edit_form_content">
            <form name="keyring_edit" method="post" action="index.php?editor=server&action=61">
              <table width="100%">
                <tr>
                  <th>Name</th>
                  <th>ZoneID</th>
                  <th>Stage</th>
                </tr>
                <tr>
                  <td><input type="text" size="30" name="key_name" value="<?=$key_name?>"></td>
                  <td><input type="text" size="5" name="zoneid" value="<?=$zoneid?>"></td>
                  <td><input type="text" size="5" name="stage" value="<?=$stage?>"></td>
                </tr>
              </table><br><br>
              <center>
                <input type="hidden" name="key_item" value="<?=$key_item?>">
                <input type="submit" value="Submit Changes">
              </center>
            </form>
          </div>
        </div>
