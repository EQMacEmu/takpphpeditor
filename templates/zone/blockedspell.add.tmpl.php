<div class="center">
    <iframe id='searchframe' src='templates/iframes/spellsearch.php'></iframe>
    <input id="button" type="button" value='Hide Spell Search' onclick='hideSearch();'
           style='display:none; margin-bottom: 20px;'>
</div>
<form name="blockedspell" method="post"
      action="index.php?editor=zone&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=23">
    <div class="edit_form" style="width: 225px;">
        <div class="edit_form_header">Add Blocked Spell</div>
        <div class="edit_form_content">
            <strong><label for="spellid">Spell ID</label></strong> (<a href="javascript:showSearch();">search</a>)<br>
            <input class="indented" id="spellid" type="text" name="spellid" size="7" value="0"><br><br>
            <strong><label for="bsid">ID</label></strong><br>
            <input class="indented" id="bsid" type="text" name="bsid" size="7"
                   value="<?= $suggestbsid ?? "" ?>"><br><br>
            <strong><label for="zoneid">Zone</label></strong><br>
            <input class="indented" id="zoneid" type="text" name="zoneid" size="7" value="<?= $zid ?? "" ?>"><br><br>
            <strong><label for="type">Type</label></strong><br>
            <select id="type" name="type" style="margin-left: 10px; margin-top: 10px;">
                <option value="0"<?php echo (isset($type) && $type == 0) ? " selected" : "" ?>>Not Blocked</option>
                <option value="1"<?php echo (isset($type) && $type == 1) ? " selected" : "" ?>>Zone Wide</option>
                <option value="2"<?php echo (isset($type) && $type == 2) ? " selected" : "" ?>>Coords</option>
            </select><br/><br/>
            <strong><label for="x_coord">X</label></strong><br>
            <input class="indented" id="x_coord" type="text" name="x_coord" size="7" value="0"><br><br>
            <strong><label for="y_coord">Y</label></strong><br>
            <input class="indented" id="y_coord" type="text" name="y_coord" size="7" value="0"><br><br>
            <strong><label for="z_coord">Z</label></strong><br>
            <input class="indented" id="z_coord" type="text" name="z_coord" size="7" value="0"><br><br>
            <strong><label for="x_diff">X Diff</label></strong><br>
            <input class="indented" id="x_diff" type="text" name="x_diff" size="7" value="0"><br><br>
            <strong><label for="y_diff">Y Diff</label></strong><br>
            <input class="indented" id="y_diff" type="text" name="y_diff" size="7" value="0"><br><br>
            <strong><label for="z_diff">Z Diff</label></strong><br>
            <input class="indented" id="z_diff" type="text" name="z_diff" size="7" value="0"><br><br>
            <strong><label for="message">Message</label></strong><br>
            <input class="indented" id="message" type="text" name="message" size="27" value=""><br><br>
            <strong><label for="description">Description</label></strong><br>
            <input class="indented" id="description" type="text" name="description" size="27" value=""><br><br>
            <div class="center"><input type="submit" value="Submit Changes"></div>
        </div>
    </div>
</form>
