<div class="center">
    <iframe id='searchframe' src='templates/iframes/itemsearch.php'></iframe>
    <input id="button" type="button" value='Hide Item Search' onclick='hideSearch();'
           style='display:none; margin-bottom: 20px;'>
</div>

<form name="gspawn" method="post"
      action=index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=15">
    <div class="edit_form" style="width: 200px;">
        <div class="edit_form_header">
            Edit Ground Spawn <?= $gsid ?? "" ?>
        </div>
        <div class="edit_form_content">
            <strong><label for="giid">Item ID</label></strong> (<a href="javascript:showSearch();">search</a>)<br>
            <input class="indented" id="giid" type="text" name="giid" size="7" value="<?= $giid ?? "" ?>"><br><br>
            <strong><label for="max_x">Max X</label></strong><br>
            <input class="indented" id="max_x" type="text" name="max_x" size="7" value="<?= $max_x ?? "" ?>"><br><br>
            <strong><label for="max_y">Max Y</label></strong><br>
            <input class="indented" id="max_y" type="text" name="max_y" size="7" value="<?= $max_y ?? "" ?>"><br><br>
            <strong><label for="max_z">Max Z</label></strong><br>
            <input class="indented" id="max_z" type="text" name="max_z" size="7" value="<?= $max_z ?? "" ?>"><br><br>
            <strong><label for="min_x">Min X</label></strong><br>
            <input class="indented" id="min_x" type="text" name="min_x" size="7" value="<?= $min_x ?? "" ?>"><br><br>
            <strong><label for="min_y">Min Y</label></strong><br>
            <input class="indented" id="min_y" type="text" name="min_y" size="7" value="<?= $min_y ?? "" ?>"><br><br>
            <strong><label for="heading">Heading</label></strong><br>
            <input class="indented" id="heading" type="text" name="heading" size="7"
                   value="<?= $heading ?? "" ?>"><br><br>
            <strong><label for="max_allowed">Max</label></strong><br>
            <input class="indented" id="max_allowed" type="text" name="max_allowed" size="7"
                   value="<?= $max_allowed ?? "" ?>"><br><br>
            <strong><label for="respawn_timer">Respawn</label></strong><br>
            <input class="indented" id="respawn_timer" type="text" name="respawn_timer" size="7"
                   value="<?= $respawn_timer ?? "" ?>"><br><br>
            <strong><label for="name">Name</label></strong><br>
            <input class="indented" id="name" type="text" name="name" size="20" value="<?= $name ?? "" ?>"><br><br>
            <strong><label for="comment">Comment</label></strong><br>
            <input class="indented" id="comment" type="text" name="comment" size="20" value="<?= $comment ?? "" ?>"><br><br>
            <strong><label for="min_expansion">Min Expansion</label></strong><br>
            <input class="indented" id="min_expansion" type="text" name="min_expansion" size="7" value="<?= $min_expansion ?? "" ?>"><br><br>
            <strong><label for="max_expansion">Max Expansion</label></strong><br>
            <input class="indented" id="max_expansion" type="text" name="max_expansion" size="7" value="<?= $max_expansion ?? "" ?>"><br><br>
            <strong><label for="content_flags">Content Flags</label></strong><br>
            <input class="indented" id="content_flags" type="text" name="content_flags" size="25" value="<?= $content_flags ?? "" ?>"><br><br>
            <strong><label for="content_flags_disabled">Content Flags Disabled</label></strong><br>
            <input class="indented" id="content_flags_disabled" type="text" name="content_flags_disabled" size="25" value="<?= $content_flags_disabled ?? "" ?>"><br><br>

            <div class="center">
                <input type="hidden" name="gsid" value="<?= $gsid ?? "" ?>">
				<input type="hidden" name="zoneid" value="<?=$zoneid?>">
				<input type="submit" value="Submit Changes">&nbsp;&nbsp;
				<input type="button" value="Cancel" onClick="history.back();">
            </div>
</form>