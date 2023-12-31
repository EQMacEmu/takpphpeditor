<script>
    function showSearch() {
        document.getElementById("searchframe").style.display = "block";
        document.getElementById("button").style.display = "block";
    }

    function hideSearch() {
        document.getElementById("searchframe").style.display = "none";
        document.getElementById("button").style.display = "none";
    }

    function updateRawTarget(val) {
        if (val === "useraw") {
            document.aa_action.raw_target.disabled = false;
        } else {
            document.aa_action.raw_target.value = val;
            document.aa_action.raw_target.disabled = true;
        }
    }
</script>
<div class="center">
    <iframe id="searchframe" src="templates/iframes/spellsearch.php"></iframe>
    <input id="button" type="button" value="Hide AA Search" onclick="hideSearch();"
           style="display:none; margin-bottom:20px;">
</div>
<div class="edit_form" style="width:400px;">
    <div class="edit_form_header">
        <?php
        if (!empty($editmode) && $editmode == 1)
            echo "Edit AA Action";
        else
            echo "Add New AA Action";
        ?>
        <br/>
    </div>
    <div class="edit_form_content">
        <form name="aa_action" method="post"
              action="index.php?editor=aa&aaid=<?= ($aaid ?? "") ?>&rank=<?= $rank ?? "" ?>&action=<?php if (!empty($editmode) && $editmode == 1) echo "14"; else echo "18"; ?>">
            <fieldset>
                <legend><b>Spell</b></legend>
                <table style="width: 100%;">
                    <tr>
                        <td style="width:80px;">
                            <a href="javascript:showSearch();" title="Click to show spell search"><label for="spell_id">Spell
                                    ID:</label></a><br/>
                            <input id="spell_id" type="text" name="spell_id" size="5"
                                   value="<?= $spell_id ?? "" ?>"><br/>
                        </td>
                        <td>
                            <label for="target">Target Override:</label><br/>
                            <select id="target" name="target" onchange="updateRawTarget(this.value)">
                                <?php global $aa_action_target;
                                foreach ($aa_action_target as $k => $v) : ?>
                                    <option value="<?= $k ?>"<?php global $target;
                                    if ($k == $target) echo "selected=\"selected\""; ?>><?= $v ?></option>
                                <?php endforeach; ?>
                                <option value="useraw">Use Raw</option>
                            </select>
                            <label for="raw_target"></label>
                            <input type="text" id="raw_target" name="raw_target" size="5"
                                   value="<?= $target ?? "" ?>"<?php global $target;
                            if (isset($aa_action_target[$target])) echo "disabled"; ?>><br/>
                        </td>
                        <td>
                            <label for="reuse_time">Reuse Time:</label><br/>
                            <input type="text" id="reuse_time" name="reuse_time" size="7"
                                   value="<?= $reuse_time ?? "" ?>"><br/>
                        </td>
                    </tr>
                </table>
            </fieldset>
            <fieldset>
                <legend><b>Non-spell</b></legend>
                <table style="width: 100%;">
                    <tr>
                        <td>
                            <label for="nonspell_action">Action:</label><br/>
                            <input type="text" id="nonspell_action" name="nonspell_action" size="5"
                                   value="<?= $nonspell_action ?? "" ?>"><br/>
                        </td>
                        <td>
                            <label for="nonspell_mana">Mana:</label><br/>
                            <input type="text" id="nonspell_mana" name="nonspell_mana" size="5"
                                   value="<?= $nonspell_mana ?? "" ?>"><br/>
                        </td>
                        <td>
                            <label for="nonspell_duration">Duration:</label><br/>
                            <input type="text" id="nonspell_duration" name="nonspell_duration" size="5"
                                   value="<?= $nonspell_duration ?? "" ?>"><br/>
                        </td>
                    </tr>
                </table>
            </fieldset>
            <fieldset>
                <legend><b>Reuse Reduction</b></legend>
                <table style="width: 100%;">
                    <tr>
                        <td>
                            <label for="redux_aa">Redux AA:</label><br/>
                            <input type="text" id="redux_aa" name="redux_aa" size="5"
                                   value="<?= $redux_aa ?? "" ?>"><br/>
                        </td>
                        <td>
                            <label for="redux_rate">Redux Rate:</label><br/>
                            <input type="text" id="redux_rate" name="redux_rate" size="5"
                                   value="<?= $redux_rate ?? "" ?>"><br/>
                        </td>
                        <td>
                            <label for="redux_aa2">Redux AA 2:</label><br/>
                            <input type="text" id="redux_aa2" name="redux_aa2" size="5" value="<?= $redux_aa2 ?? "" ?>"><br/>
                        </td>
                        <td>
                            <label for="redux_rate2">Redux Rate 2:</label><br/>
                            <input type="text" id="redux_rate2" name="redux_rate2" size="5"
                                   value="<?= $redux_rate2 ?? "" ?>"><br/>
                        </td>
                    </tr>
                </table>
            </fieldset>
            <br/>
            <div class="center"><input type="submit" value="Submit Changes"></div>
        </form>
    </div>
</div>
