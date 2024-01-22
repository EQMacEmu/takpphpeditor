<div class="center">
    <iframe id='searchframe' src='templates/iframes/itemsearch.php'></iframe>
    <input id="button" type="button" value='Hide Item Search' onclick='hideSearch();'
           style='display:none; margin-bottom: 20px;'>
</div>

<form name="addpet" method="post"
      action="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=67">
    <div class="edit_form" style="width: 250px;">
        <div class="edit_form_header">
            Add Pet Equipmentset Entry for ID <?= $set_id ?? "" ?>
        </div>
        <div class="edit_form_content">
            <strong><label for="item_id">Item ID</label></strong> (<a href="javascript:showSearch();">search</a>)<br>
            <input class="indented" id="item_id" type="text" name="item_id" size="7"
                   value="<?= $item_id ?? "" ?>"><br><br>
            <strong><label for="set_id">ID</label></strong><br>
            <input class="indented" id="set_id" type="text" name="set_id" size="7" value="<?= $set_id ?? "" ?>"><br><br>
            <strong><label for="slot">Slot</label></strong><br>
            <input class="indented" id="slot" type="text" name="slot" size="7"
                   value="<?= $suggested_id ?? "" ?>"><br><br>
            <div class="center">
                <input type="submit" value="Submit Changes">
            </div>
</form>