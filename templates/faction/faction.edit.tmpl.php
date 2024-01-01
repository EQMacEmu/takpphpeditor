  <div class="center">
    <table style="border: 1px solid black; background-color: #CCC;">
      <tr><td colspan="3"><b>Legend:</b></td></tr>
      <tr><td style="text-align: right;">1100 to 2000</td><td>&nbsp;</td><td style="text-align: left">Ally</td></tr>
      <tr><td style="text-align: right;">750 to 1099</td><td>&nbsp;</td><td style="text-align: left">Warmly</td></tr>
      <tr><td style="text-align: right;">500 to 749</td><td>&nbsp;</td><td style="text-align: left">Kindly</td></tr>
      <tr><td style="text-align: right;">100 to 499</td><td>&nbsp;</td><td style="text-align: left">Amiably</td></tr>
      <tr><td style="text-align: right;">0 to 99</td><td>&nbsp;</td><td style="text-align: left">Indifferently</td></tr>
      <tr><td style="text-align: right;">-100 to -1</td><td>&nbsp;</td><td style="text-align: left">Apprehensively</td></tr>
      <tr><td style="text-align: right;">-500 to -101</td><td>&nbsp;</td><td style="text-align: left">Dubiously</td></tr>
      <tr><td style="text-align: right;">-750 to -501</td><td>&nbsp;</td><td style="text-align: left">Threateningly</td></tr>
      <tr><td style="text-align: right;">-751 to -2000</td><td>&nbsp;</td><td style="text-align: left">Ready to attack</td></tr>
    </table><br/><br/>
  </div>
  <div style="width: 750px; margin: auto;">
    <form name="faction" method="post" action="index.php?editor=faction&fid=<?=$faction_info['id'] ?? ""?>&action=2">
      <div style="border: 1px solid black;">
        <div class="edit_form_header">
          Edit Faction:
        </div>
        <div class="edit_form_content">
          <fieldset>
            <legend><strong>Faction Info</strong></legend>
            <table style="width: 100%">
              <tr>
                  <td style="width: 25%"><label for="new_id">ID:</label><br/><input size="8" type="text" id="new_id" name="new_id" value="<?=$faction_info['id'] ?? ""?>"></td>
                  <td style="width: 50%"><label for="new_name">Name:</label><br/><input size="30" type="text" id="new_name" name="new_name" value="<?=$faction_info['name'] ?? ""?>"></td>
                  <td style="width: 25%"><label for="new_base">Base:</label><br/><input size="8" type="text" id="new_base" name="new_base" value="<?=$faction_info['base'] ?? ""?>"></td>
                  <td style="width: 35%"><label for="new_illusion">SeeIllusion:</label><br/>
                <select id="new_illusion" name="new_illusion">
                  <option value="0"<?php echo (!empty($faction_info) && $faction_info['see_illusion'] == 0) ? " selected" : ""?>>No</option>
                  <option value="1"<?php echo (!empty($faction_info) && $faction_info['see_illusion'] == 1) ? " selected" : ""?>>Yes</option>
                </select>
                </td>
                  <td style="width: 25%"><label for="new_min_cap">MinCap:</label><br/><input size="8" type="text" id="new_min_cap" name="new_min_cap" value="<?=$faction_info['min_cap'] ?? ""?>"></td>
                  <td style="width: 25%"><label for="new_max_cap">MaxCap:</label><br/><input size="8" type="text" id="new_max_cap" name="new_max_cap" value="<?=$faction_info['max_cap'] ?? ""?>"></td>
              </tr>
            </table>
          </fieldset><br/>
          <div class="center">
            <input type="hidden" name="old_id" value="<?=$faction_info['id'] ?? ""?>">
            <input type="hidden" name="old_name" value="<?=$faction_info['name'] ?? ""?>">
            <input type="hidden" name="old_base" value="<?=$faction_info['base'] ?? ""?>">
            <input type="hidden" name="old_illusion" value="<?=$faction_info['see_illusion'] ?? ""?>">
            <input type="hidden" name="old_min_cap" value="<?=$faction_info['min_cap'] ?? ""?>">
            <input type="hidden" name="old_max_cap" value="<?=$faction_info['max_cap'] ?? ""?>">
            <input type="submit" value="Submit Changes">&nbsp;<input type="button" value="Cancel Changes" onclick="history.back()">
          </div>
        </div>
      </div>
    </form>
  </div>
