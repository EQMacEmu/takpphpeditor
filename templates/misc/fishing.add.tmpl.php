<div class="center">
    <iframe id='searchframe' src='templates/iframes/itemsearch.php'></iframe>
    <input id="button" type="button" value='Hide Item Search' onclick='hideSearch();'
           style='display:none; margin-bottom: 20px;'>
</div>

<form method="post" action="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=6">
    <div class="edit_form" style="width: 200px;">
        <div class="edit_form_header">
            Add Fishing Entry
        </div>
        <div class="edit_form_content">
            <strong><label for="fiid">Item ID</label></strong> (<a href="javascript:showSearch();">search</a>)<br>
            <input class="indented" id="fiid" type="text" name="fiid" size="7" value=""><br><br>
            <strong><label for="fsid">ID</label></strong><br>
            <input class="indented" id="fsid" type="text" name="fsid" size="7"
                   value="<?= $suggestfsid ?? "" ?>"><br><br>
            <strong><label for="zoneid">Zone</label></strong><br>
            <input class="indented" id="zoneid" type="text" name="zoneid" size="7" value="<?= $zid ?? "" ?>"><br><br>
            <strong><label for="skill_level">Skill Level</label></strong><br>
            <input class="indented" id="skill_level" type="text" name="skill_level" size="7" value="0"><br><br>
            <strong><label for="chance">Chance</label></strong><br>
            <input class="indented" id="chance" type="text" name="chance" size="7" value="0">%<br><br>

            <div class="center">
                <input type="submit" value="Submit Changes">
            </div>
</form>
