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
  <div style="width: 550px; margin: auto;">
    <form id="form" name="faction" method="post" action="index.php?editor=faction&fid=<?=$faction_id ?? ""?>&action=21">
      <div style="border: 1px solid black;">
        <div class="edit_form_header">
          Add Faction Mod:
        </div>
        <div class="edit_form_content">
          <fieldset>
            <legend><strong>Faction Mod Info</strong></legend>
            <table style="width: 100%;">
              <tr>
                  <td style="width: 25%;"><label for="id">ID:</label><br/><input size="8" type="text" id="id" name="id" value="<?=$suggested_id ?? ""?>"></td>
                <td style="width: 50%;">
                  Type:<br/>
                    <input type="radio" id="mod_race" name="mod_select" value="Race" onchange="toggleModType();" checked><label for="mod_race">Race</label>
                    <input type="radio" id="mod_class" name="mod_select" value="Class" onchange="toggleModType();"><label for="mod_class">Class</label>
                    <input type="radio" id="mod_deity" name="mod_select" value="Deity" onchange="toggleModType();"><label for="mod_deity">Deity</label><br/>
                    <label for="select_race"></label>
                  <select id="select_race" style="display: inline;">
                    <option>Select a Race</option>
                      <?php $races = $races ?? array(); ?>
                      <?php foreach ($races as $race_id=> $race_name):?>
                    <option value="<?=$race_id?>"><?=$race_id?>: <?=$race_name?></option>
                      <?php endforeach;?>
                  </select>
                    <label for="select_class"></label>
                  <select id="select_class" style="display: none;">
                    <option>Select a Class</option>
                      <?php $classes = $classes ?? array(); ?>
                      <?php foreach ($classes as $class_id=> $class_name):?>
                    <option value="<?=$class_id?>"><?=$class_id?>: <?=$class_name?></option>
                      <?php endforeach;?>
                  </select>
                    <label for="select_deity"></label>
                  <select id="select_deity" style="display: none;">
                    <option>Select a Deity</option>
                      <?php $deities = $deities ?? array(); ?>
                      <?php foreach ($deities as $deity_id=> $deity_name):?>
                    <option value="<?=$deity_id?>"><?=$deity_id?>: <?=$deity_name?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td style="width: 25%;"><label for="mod">Mod:</label><br/><input size="8" type="text" id="mod" name="mod" value="0"></td>
              </tr>
            </table>
          </fieldset><br/>
          <div class="center">
            <input type="hidden" name="faction_id" value="<?=$faction_id ?? ""?>">
            <input type="hidden" id="mod_name" name="mod_name" value="">
            <input type="button" value="Submit" onclick="validateModType();">&nbsp;<input type="button" value="Cancel" onclick="history.back();">
          </div>
        </div>
      </div>
    </form>
  </div>
