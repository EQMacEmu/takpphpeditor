  <div class="center">
    <table style="border: 1px solid black; background-color: #CCC;">
      <tr><td colspan="3"><b>Legend:</b></td></tr>
      <tr><td style="text-align: right;">1100 to 2000</td><td>&nbsp;</td><td style="text-align: left;">Ally</td></tr>
      <tr><td style="text-align: right;">750 to 1099</td><td>&nbsp;</td><td style="text-align: left;">Warmly</td></tr>
      <tr><td style="text-align: right;">500 to 749</td><td>&nbsp;</td><td style="text-align: left;">Kindly</td></tr>
      <tr><td style="text-align: right;">100 to 499</td><td>&nbsp;</td><td style="text-align: left;">Amiably</td></tr>
      <tr><td style="text-align: right;">0 to 99</td><td>&nbsp;</td><td style="text-align: left;">Indifferently</td></tr>
      <tr><td style="text-align: right;">-100 to -1</td><td>&nbsp;</td><td style="text-align: left;">Apprehensively</td></tr>
      <tr><td style="text-align: right;">-500 to -101</td><td>&nbsp;</td><td style="text-align: left;">Dubiously</td></tr>
      <tr><td style="text-align: right;">-750 to -501</td><td>&nbsp;</td><td style="text-align: left;">Threateningly</td></tr>
      <tr><td style="text-align: right;">-751 to -2000</td><td>&nbsp;</td><td style="text-align: left;">Ready to attack</td></tr>
    </table><br/><br/>
  </div>
  <div style="width: 650px; margin: auto;">
    <form name="faction" method="post" action="index.php?editor=faction&action=5">
      <div style="border: 1px solid black;">
        <div class="edit_form_header">
          Add Faction:
        </div>
        <div class="edit_form_content">
          <fieldset>
            <legend><strong>Faction Info</strong></legend>
            <table style="width: 100%">
              <tr>
                  <td style="width: 25%"><label for="id">ID:</label><br/><input size="8" type="text" id="id" name="id" value="<?=$suggested_id ?? ""?>"></td>
                  <td style="width: 50%"><label for="name">Name:</label><br/><input size="30" type="text" id="name" name="name" value=""></td>
                  <td style="width: 25%"><label for="base">Base:</label><br/><input size="8" type="text" id="base" name="base" value="0"></td>
                  <td style="width: 35%"><label for="illusion">SeeIllusion:</label><br/>
                <select id="illusion" name="illusion">
                  <option value="0">No</option>
                  <option value="1">Yes</option>
                </select>
                </td>
                  <td style="width: 25%"><label for="min_cap">MinCap:</label><br/><input size="8" type="text" id="min_cap" name="min_cap" value="-2000"></td>
                  <td style="width: 25%"><label for="max_cap">MaxCap:</label><br/><input size="8" type="text" id="max_cap" name="max_cap" value="2000"></td>
              </tr>
            </table>
          </fieldset><br/>
          <div class="center">
            <input type="submit" value="Submit">&nbsp;<input type="button" value="Cancel" onclick="history.back()">
          </div>
        </div>
      </div>
    </form>
  </div>
