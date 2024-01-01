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
  <div style="width: 550px; margin: auto;">
    <form id="form" name="faction" method="post" action="index.php?editor=faction&fid=<?=$mod['faction_id'] ?? ""?>&fmid=<?=$mod['id'] ?? ""?>&action=23">
      <div style="border: 1px solid black;">
        <div class="edit_form_header">
          Edit Faction Mod:
        </div>
        <div class="edit_form_content">
          <fieldset>
            <legend><strong>Faction Mod Info</strong></legend>
            <table style="width: 100%;">
              <tr>
                  <td style="width: 25%;"><label for="new_id">ID:</label><br/><input size="8" type="text"  id="new_id" name="new_id" value="<?=$mod['id'] ?? ""?>"></td>
                <td style="width: 50%;">
                  Type:<br/>
                    <?php $category = $category ?? ''; ?>
                    <input type="radio" id="mod_race" name="mod_select" value="Race" onchange="toggleModType();"<?php echo ($category == 'r') ? ' checked' : '';?>><label for="mod_race">Race</label>
                    <input type="radio" id="mod_class" name="mod_select" value="Class" onchange="toggleModType();"<?php echo ($category == 'c') ? ' checked' : '';?>><label for="mod_class">Class</label>
                    <input type="radio" id="mod_deity" name="mod_select" value="Deity" onchange="toggleModType();"<?php echo ($category == 'd') ? ' checked' : '';?>><label for="mod_deity">Deity</label><br/>
                    <label for="select_race"></label>
                  <select id="select_race" style="display: <?php echo ($category == 'r') ? 'inline' : 'none';?>;">
                    <option>Select a Race</option>
                      <?php if(!empty($races)) { foreach ($races as $race_id => $race_name):?>
                    <option value="<?=$race_id?>"<?php echo (($category == 'r') && (!empty($cat_index) && $cat_index == $race_id)) ? ' selected' : '';?>><?=$race_id?>: <?=$race_name?></option>
                      <?php endforeach;}?>
                  </select>
                    <label for="select_class"></label>
                  <select id="select_class" style="display: <?php echo ($category == 'c') ? 'inline' : 'none';?>;">
                    <option>Select a Class</option>
                      <?php $classes = $classes ?? array(); ?>
                      <?php foreach ($classes as $class_id => $class_name):?>
                    <option value="<?=$class_id?>"<?php echo (($category == 'c') && (!empty($cat_index) && $cat_index == $class_id)) ? ' selected' : '';?>><?=$class_id?>: <?=$class_name?></option>
                      <?php endforeach;?>
                  </select>
                    <label for="select_deity"></label>
                  <select id="select_deity" style="display: <?php echo ($category == 'd') ? 'inline' : 'none';?>;">
                    <option>Select a Deity</option>
                      <?php $deities = $deities ?? array(); ?>
                      <?php foreach ($deities as $deity_id => $deity_name):?>
                    <option value="<?=$deity_id?>"<?php echo (($category == 'd') && (!empty($cat_index) && $cat_index == $deity_id)) ? ' selected' : '';?>><?=$deity_id?>: <?=$deity_name?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <?php if($category == 'r' && (!empty($cat_index) && ($cat_index == 75 || $cat_index == 42))){?>
                <input type="hidden" name="old_model" value=<?=$model ?? ""?>>
                      <td style="width: 25%;"><label for="new_model">Model: (-1 is ALL)</label><br/><input size="8" type="text" id="new_model" name="new_model" value="<?=$model ?? ""?>"></td>
                  <?php } else {?>
                <input type="hidden" name="new_model" value="0">
                  <?php }?>
                  <td style="width: 25%;"><label for="new_mod">Mod:</label><br/><input size="8" type="text" id="new_mod" name="new_mod" value="<?=$mod['mod'] ?? ""?>"></td>
              </tr>
            </table>
          </fieldset><br/>
          <div class="center">
            <input type="hidden" name="old_id" value="<?=$mod['id'] ?? ""?>">
            <input type="hidden" name="old_mod_name" value="<?=$mod['mod_name'] ?? ""?>">
            <input type="hidden" name="old_mod" value="<?=$mod['mod'] ?? ""?>">
            <input type="hidden" id="mod_name" name="new_mod_name" value="">
            <input type="button" value="Submit" onclick="validateModType();">&nbsp;<input type="button" value="Cancel" onclick="history.back();">
          </div>
        </div>
      </div>
    </form>
  </div>
