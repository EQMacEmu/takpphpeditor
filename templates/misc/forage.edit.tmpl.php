<div class="center">
    <iframe id='searchframe' src='templates/iframes/itemsearch.php'></iframe>
    <input id="button" type="button" value='Hide Item Search' onclick='hideSearch();'
           style='display:none; margin-bottom: 20px;'>
</div>

<form name="forage" method="post"
      action=index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=9">
    <div class="edit_form" style="width: 200px;">
        <div class="edit_form_header">
            Edit Forage Entry <?= $fgid ?? "" ?>
        </div>
        <div class="edit_form_content">
            <strong><label for="fgiid">Item ID</label></strong> (<a href="javascript:showSearch();">search</a>)<br>
            <input class="indented" id="fgiid" type="text" name="fgiid" size="7" value="<?= $fgiid ?? "" ?>"><br><br>
            <strong><label for="zoneid">Zone</label></strong><br>
            <input class="indented" id="zoneid" type="text" name="zoneid" size="7" value="<?= $zoneid ?? "" ?>"><br><br>
            <strong><label for="level">Level</label></strong><br>
            <input class="indented" id="level" type="text" name="level" size="7" value="<?= $level ?? "" ?>"><br><br>
            <strong><label for="chance">Chance</label></strong><br>
            <input class="indented" id="chance" type="text" name="chance" size="7"
                   value="<?= $chance ?? "" ?>">%<br><br>

            <div class="fgid">
                <input type="hidden" name="fgid" value="<?= $fgid ?? "" ?>">
                <input type="submit" value="Submit Changes">
            </div>
</form>