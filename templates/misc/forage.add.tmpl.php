<div class="center">
    <iframe id='searchframe' src='templates/iframes/itemsearch.php'></iframe>
    <input id="button" type="button" value='Hide Item Search' onclick='hideSearch();'
           style='display:none; margin-bottom: 20px;'>
</div>

<form method="post" action="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=12">
    <div class="edit_form" style="width: 200px;">
        <div class="edit_form_header">
            Add Forage Entry
        </div>
        <div class="edit_form_content">
            <strong><label for="fgiid">Item ID</label></strong> (<a href="javascript:showSearch();">search</a>)<br>
            <input class="indented" id="fgiid" type="text" name="fgiid" size="7" value=""><br><br>
            <strong><label for="fgid">ID</label></strong><br>
            <input class="indented" id="fgid" type="text" name="fgid" size="7"
                   value="<?= $suggestfgid ?? "" ?>"><br><br>
            <strong><label for="zoneid">Zone</label></strong><br>
            <input class="indented" id="zoneid" type="text" name="zoneid" size="7" value="<?= $zid ?? "" ?>"><br><br>
            <strong><label for="level">Level</label></strong><br>
            <input class="indented" id="level" type="text" name="level" size="7" value="0"><br><br>
            <strong><label for="chance">Chance</label></strong><br>
            <input class="indented" id="chance" type="text" name="chance" size="7" value="0">%<br><br>

            <div class="center">
                <input type="submit" value="Submit Changes">
            </div>
</form>