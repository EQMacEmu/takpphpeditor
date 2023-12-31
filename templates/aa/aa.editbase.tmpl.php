<script type="text/javascript">
    function Toggle() {
        document.aa_edit.class_brd.checked = document.aa_edit.all_none.checked;
        document.aa_edit.class_bst.checked = document.aa_edit.all_none.checked;
        document.aa_edit.class_clr.checked = document.aa_edit.all_none.checked;
        document.aa_edit.class_dru.checked = document.aa_edit.all_none.checked;
        document.aa_edit.class_enc.checked = document.aa_edit.all_none.checked;
        document.aa_edit.class_mag.checked = document.aa_edit.all_none.checked;
        document.aa_edit.class_mnk.checked = document.aa_edit.all_none.checked;
        document.aa_edit.class_nec.checked = document.aa_edit.all_none.checked;
        document.aa_edit.class_pal.checked = document.aa_edit.all_none.checked;
        document.aa_edit.class_rng.checked = document.aa_edit.all_none.checked;
        document.aa_edit.class_rog.checked = document.aa_edit.all_none.checked;
        document.aa_edit.class_shd.checked = document.aa_edit.all_none.checked;
        document.aa_edit.class_shm.checked = document.aa_edit.all_none.checked;
        document.aa_edit.class_war.checked = document.aa_edit.all_none.checked;
        document.aa_edit.class_wiz.checked = document.aa_edit.all_none.checked;
    }

    function fill8F(elem) {
        elem.value = 4294967295;
    }

    function updateRawCat(val) {
        if (val === "useraw") {
            document.aa_edit.raw_special_category.disabled = false;
        } else {
            document.aa_edit.raw_special_category.value = val;
            document.aa_edit.raw_special_category.disabled = true;
        }
    }

    function updateRawExpansion(val) {
        if (val === "useraw") {
            document.aa_edit.raw_aa_expansion.disabled = false;
        } else {
            document.aa_edit.raw_aa_expansion.value = val;
            document.aa_edit.raw_aa_expansion.disabled = true;
        }
    }

    function rankCheck(oldmax) {
        //?
    }

    function showSearch() {
        document.getElementById("searchframe").style.display = "block";
        document.getElementById("button").style.display = "block";
    }

    function hideSearch() {
        document.getElementById("searchframe").style.display = "none";
        document.getElementById("button").style.display = "none";
    }
</script>
<?php if (!empty($errors)): ?>
    <?php foreach ($errors as $error): ?>
        <div class="error">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 30px; vertical-align: middle;">
                        <img src="images/caution.gif" alt="caution">
                    </td>
                    <td style="padding:0 5px;">
                        <?= $error ?>
                    </td>
                </tr>
            </table>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
<div class="center">
    <iframe id="searchframe" src="templates/iframes/aasearch.php"></iframe>
    <input id="button" type="button" value="Hide AA Search" onclick="hideSearch();"
           style="display:none; margin-bottom:20px;">
</div>
<div class="edit_form" style="width:500px;">
    <div class="edit_form_header">
        <?php global $aa_vars;
        global $aaid;
        if (!empty($editmode) && $editmode == 2) echo "Create a new AA"; else echo "Edit AA: {$aa_vars['name']} ({$aa_vars['eqmacid']}:$aaid)"; ?>
    </div>
    <div class="edit_form_content">
        <form name="aa_edit" method="post"
              action="index.php?editor=aa<?php if (!empty($editmode) && $editmode == 1) echo "&aaid=$aaid"; ?>&action=<?php if (!empty($editmode) && $editmode == 1) echo "15"; else echo "16"; ?>">
            <table>
                <tr>
                    <td>
                        <label for="eqmacid">EQMacID:<br/></label>
                        <input type="text" id="eqmacid" name="eqmacid" size="6"
                               value="<?php echo "{$aa_vars['eqmacid']}"; ?>"><br/>
                    </td>
                    <td>
                        <label for="skill_id">EmuAAID:<br/></label>
                        <input type="text" id="skill_id" name="skill_id" size="6"
                               value="<?php echo "{$aa_vars['skill_id']}"; ?>"><br/>
                    </td>
                    <td>
                        <label for="aaname">Name:<br/></label>
                        <input type="text" id="aaname" name="aaname" size="50"
                               value="<?php echo "{$aa_vars['name']}"; ?>"><br/>
                    </td>
                </tr>
            </table>
            <br/>
            <table>
                <tr>
                    <td style="width:228px;">
                        <fieldset>
                            <legend><b>Level and Cost</b></legend>
                            <table>
                                <tr>
                                    <td>
                                        <label for="max_level">Ranks:</label><br/>
                                        <input type="text" id="max_level" name="max_level" size="5"
                                               value="<?php echo "{$aa_vars['max_level']}"; ?>"><br/>
                                    </td>
                                    <td>
                                        <label for="class_type">Req Level:</label><br/>
                                        <input type="text" id="class_type" name="class_type" size="5"
                                               value="<?php echo "{$aa_vars['class_type']}"; ?>"><br/>
                                    </td>
                                    <td>
                                        <label for="level_inc">Level Inc:</label><br/>
                                        <input type="text" id="level_inc" name="level_inc" size="5"
                                               value="<?php echo "{$aa_vars['level_inc']}"; ?>"><br/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="cost">Cost:</label><br/>
                                        <input type="text" id="cost" name="cost" size="5"
                                               value="<?php echo "{$aa_vars['cost']}"; ?>"><br/>
                                    </td>
                                    <td>
                                        <label for="cost_inc">Cost Inc:</label><br/>
                                        <input type="text" id="cost_inc" name="cost_inc" size="5"
                                               value="<?php echo "{$aa_vars['cost_inc']}"; ?>"><br/>
                                    </td>
                                </tr>
                                <tr>
                                </tr>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend><b>Categories</b></legend>
                            <table>
                                <tr>
                                    <td>
                                        <label for="type">Display Tab:</label><br/>
                                        <select class="left" id="type" name="type" style="width:125px;">
                                            <?php global $aa_type;
                                            foreach ($aa_type as $key => $val) { ?>
                                                <option value="<?= $key ?>"<?php if ($aa_vars['type'] == $key) echo " selected" ?>><?= $val ?></option>
                                            <?php } ?>
                                        </select><br/>
                                    </td>
                                </tr>
                            </table>
                            <br/>
                            <table>
                                <tr>
                                    <td>
                                        <label for="aa_expansion">Expansion:</label><br/>
                                        <select class="left" id="aa_expansion" name="aa_expansion" style="width:150px;"
                                                onchange="updateRawExpansion(this.value);">
                                            <?php for ($i = 0; isset($eqexpansions[$i + 1]); $i++) { ?>
                                                <option value="<?= $i ?>"<?php if ($aa_vars['aa_expansion'] == $i) echo " selected" ?>><?php echo "$i: {$eqexpansions[$i+1]}"; ?></option>
                                            <?php } ?>
                                            <?php global $aa_sof_expansion;
                                            foreach ($aa_sof_expansion as $key => $val) { ?>
                                                <option value="<?= $key ?>"<?php if ($aa_vars['aa_expansion'] == $key) echo " selected" ?>><?php echo "$val" ?></option>
                                            <?php } ?>
                                            <option value="useraw"<?php global $eqexpansions;
                                            if (!(($eqexpansions[$aa_vars['aa_expansion'] + 1]) || ($aa_sof_expansion[$aa_vars['aa_expansion']]))) echo " selected"; ?>>
                                                Use Raw
                                            </option>
                                        </select><br/>
                                    </td>
                                    <td>
                                        <label for="raw_aa_expansion">Raw:</label><br/>
                                        <input type="text" id="raw_aa_expansion" name="raw_aa_expansion" size="5"
                                               value="<?php echo "{$aa_vars['aa_expansion']}"; ?>"<?php echo (($eqexpansions[$aa_vars['aa_expansion'] + 1]) || ($aa_sof_expansion[$aa_vars['aa_expansion']])) ? " disabled" : ""; ?>><br/>
                                    </td>
                                </tr>
                            </table>
                            <br/>
                            <table>
                                <tr>
                                    <td>
                                        <label for="special_category">Special Category:</label><br/>
                                        <select class="left" id="special_category" name="special_category"
                                                style="width:150px;"
                                                onchange="updateRawCat(this.value);">
                                            <?php global $aa_special_category;
                                            foreach ($aa_special_category as $key => $val) { ?>
                                                <option value="<?= $key ?>"<?php if ($aa_vars['special_category'] == $key) echo " selected"; ?>><?= $val ?></option>
                                            <?php } ?>
                                            <option value="useraw"<?php if (!isset($aa_special_category[$aa_vars['special_category']])) echo " selected"; ?>>
                                                Use Raw
                                            </option>
                                        </select><br/>
                                    </td>
                                    <td>
                                        <label for="raw_special_category">Raw:</label><br/>
                                        <input type="text" id="raw_special_category" name="raw_special_category"
                                               size="5"
                                               value="<?php echo "{$aa_vars['special_category']}"; ?>"<?php echo (isset($aa_special_category[$aa_vars['special_category']])) ? " disabled" : ""; ?>><br/>
                                    </td>
                                </tr>
                            </table>
                            <br/>
                        </fieldset>
                    </td>
                    <td style="width:240px;">
                        <fieldset>
                            <legend><b>Prerequisite</b></legend>
                            <table>
                                <tr>
                                    <td style="width: 50%;">
                                        <label for="searchtarget">AA: (<a href="javascript:showSearch();"
                                                                          title="Show the AA search frame">Search</a>)</label><br/>
                                        <input id="searchtarget" type="text" name="prereq_skill" size="10"
                                               value="<?php echo "{$aa_vars['prereq_skill']}"; ?>">
                                    </td>
                                    <td style="width: 50%;">
                                        <label for="prereq_minpoints">Points:</label><br/>
                                        <input type="text" id="prereq_minpoints" name="prereq_minpoints" size="6"
                                               value="<?php echo "{$aa_vars['prereq_minpoints']}"; ?>">
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                        <div style="margin-top:2px;">
                            <fieldset>
                                <legend><b>Classes</b></legend>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="class_brd" name="class_brd"
                                                   value="256"<?php echo ($aa_vars['classes'] & 256) ? " checked" : ""; ?>>
                                            <label for="class_brd">BRD</label><br/>
                                            <input type="checkbox" id="class_bst" name="class_bst"
                                                   value="32768"<?php echo ($aa_vars['classes'] & 32768) ? " checked" : ""; ?>>
                                            <label for="class_bst">BST</label><br/>
                                            <input type="checkbox" id="class_clr" name="class_clr"
                                                   value="4"<?php echo ($aa_vars['classes'] & 4) ? " checked" : ""; ?>><label
                                                    for="class_clr"> CLR</label><br/>
                                        </td>
                                        <td>
                                            <input type="checkbox" id="class_dru" name="class_dru"
                                                   value="64"<?php echo ($aa_vars['classes'] & 64) ? " checked" : ""; ?>>
                                            <label for="class_dru">DRU</label><br/>
                                            <input type="checkbox" id="class_enc" name="class_enc"
                                                   value="16384"<?php echo ($aa_vars['classes'] & 16384) ? " checked" : ""; ?>>
                                            <label for="class_enc">ENC</label><br/>
                                            <input type="checkbox" id="class_mag" name="class_mag"
                                                   value="8192"<?php echo ($aa_vars['classes'] & 8192) ? " checked" : ""; ?>>
                                            <label for="class_mag">MAG</label><br/>
                                            <input type="checkbox" id="class_mnk" name="class_mnk"
                                                   value="128"<?php echo ($aa_vars['classes'] & 128) ? " checked" : ""; ?>>
                                            <label for="class_mnk">MNK</label><br/>
                                        </td>
                                        <td>
                                            <input type="checkbox" id="class_nec" name="class_nec"
                                                   value="2048"<?php echo ($aa_vars['classes'] & 2048) ? " checked" : ""; ?>>
                                            <label for="class_nec">NEC</label><br/>
                                            <input type="checkbox" id="class_pal" name="class_pal"
                                                   value="8"<?php echo ($aa_vars['classes'] & 8) ? " checked" : ""; ?>>
                                            <label for="class_pal">PAL</label><br/>
                                            <input type="checkbox" id="class_rng" name="class_rng"
                                                   value="16"<?php echo ($aa_vars['classes'] & 16) ? " checked" : ""; ?>>
                                            <label for="class_rng">RNG</label><br/>
                                            <input type="checkbox" id="class_rog" name="class_rog"
                                                   value="512"<?php echo ($aa_vars['classes'] & 512) ? " checked" : ""; ?>>
                                            <label for="class_rog">ROG</label><br/>
                                        </td>
                                        <td>
                                            <input type="checkbox" id="class_shd" name="class_shd"
                                                   value="32"<?php echo ($aa_vars['classes'] & 32) ? " checked" : ""; ?>>
                                            <label for="class_shd">SHD</label><br/>
                                            <input type="checkbox" id="class_shm" name="class_shm"
                                                   value="1024"<?php echo ($aa_vars['classes'] & 1024) ? " checked" : ""; ?>>
                                            <label for="class_shm">SHM</label><br/>
                                            <input type="checkbox" id="class_war" name="class_war"
                                                   value="2"<?php echo ($aa_vars['classes'] & 2) ? " checked" : ""; ?>><label
                                                    for="class_war"> WAR</label><br/>
                                            <input type="checkbox" id="class_wiz" name="class_wiz"
                                                   value="4096"<?php echo ($aa_vars['classes'] & 4096) ? " checked" : ""; ?>>
                                            <label for="class_wiz">WIZ</label><br/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <input type="checkbox" id="all_none" name="all_none" value="yes"
                                                   onClick="Toggle();"<?php if ($aa_vars['classes'] == 65534) echo " checked"; ?>><b><label
                                                        for="all_none">All/None</label></b><br/>
                                        </td>
                                    </tr>
                                </table>
                            </fieldset>
                        </div>
                    </td>
                </tr>
            </table>
            <table>
                <tr>
                    <td>
                        <fieldset>
                            <legend><b>Spell</b></legend>
                            <table>
                                <tr>
                                    <td style="padding: 0; width:110px;">
                                        <label for="spellid">Spell ID:</label><br/>
                                        <input type="text" id="spellid" name="spellid" size="10"
                                               value="<?php echo "{$aa_vars['spellid']}"; ?>"><img
                                                src="images/minus.gif"
                                                style="border: 0;"
                                                title="Fill in the Not Used value for this field"
                                                alt="Red Minus Icon"
                                                onclick="fill8F(document.aa_edit.spellid);"><br/>
                                    </td>
                                    <td style="padding: 0; width:95px;">
                                        <label for="spell_type">Spell Type:</label><br/>
                                        <input type="text" id="spell_type" name="spell_type" size="10"
                                               value="<?php echo "{$aa_vars['spell_type']}"; ?>"><br/>
                                    </td>
                                    <td style="padding: 0; width:95px;">
                                        <label for="spell_refresh">Spell Refresh:</label><br/>
                                        <input type="text" id="spell_refresh" name="spell_refresh" size="10"
                                               value="<?php echo "{$aa_vars['spell_refresh']}"; ?>"><br/>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                    </td>
                    <td style="width:157px;">
                        <fieldset>
                            <legend><b>Other</b></legend>
                            <label for="account_time_required">Account Time Required:</label><br/>
                            <input type="text" id="account_time_required" name="account_time_required" size="10"
                                   value="<?php echo "{$aa_vars['account_time_required']}"; ?>"><br/>
                        </fieldset>
                    </td>
                </tr>
            </table>
            <br/>
            <div class="center">
                <input type="submit" name="submit"
                       value="<?php if (!empty($editmode) && $editmode == 1) echo "Submit Changes"; else echo "Create AA"; ?>"<?php if (!empty($editmode) && $editmode == 1) echo " onclick=\"return rankCheck({$aa_vars['max_level']});\""; ?>>
            </div>
        </form>
    </div>
</div>
