<div class="center">
    <iframe id='searchframe' src='templates/iframes/itemsearch.php'></iframe>
    <input id="button" type="button" value='Hide Item Search' onclick='hideSearch();'
           style='display:none; margin-bottom: 20px;'>
</div>

<form method="post" action="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=18">
    <div class="edit_form" style="width: 200px;">
        <div class="edit_form_header">
            Add Ground Spawn
        </div>
        <div class="edit_form_content">
            <strong><label for="giid">Item ID</label></strong> (<a href="javascript:showSearch();">search</a>)<br>
            <input class="indented" id="giid" type="text" name="giid" size="7" value=""><br><br>
            <strong><label for="gsid">ID</label></strong><br>
            <input class="indented" id="gsid" type="text" name="gsid" size="7"
                   value="<?= $suggestgsid ?? "" ?>"><br><br>
            <strong><label for="zoneid">Zone</label></strong><br>
            <input class="indented" id="zoneid" type="text" name="zoneid" size="7" value="<?= $zid ?? "" ?>"><br><br>
            <strong><label for="max_x">Max X</label></strong><br>
            <input class="indented" id="max_x" type="text" name="max_x" size="7" value="0"><br><br>
            <strong><label for="max_y">Max Y</label></strong><br>
            <input class="indented" id="max_y" type="text" name="max_y" size="7" value="0"><br><br>
            <strong><label for="max_z">Max Z</label></strong><br>
            <input class="indented" id="max_z" type="text" name="max_z" size="7" value="0"><br><br>
            <strong><label for="min_x">Min X</label></strong><br>
            <input class="indented" id="min_x" type="text" name="min_x" size="7" value="0"><br><br>
            <strong><label for="min_y">Min Y</label></strong><br>
            <input class="indented" id="min_y" type="text" name="min_y" size="7" value="0"><br><br>
            <strong><label for="heading">Heading</label></strong><br>
            <input class="indented" id="heading" type="text" name="heading" size="7" value="0"><br><br>
            <strong><label for="max_allowed">Max</label></strong><br>
            <input class="indented" id="max_allowed" type="text" name="max_allowed" size="7" value="1"><br><br>
            <strong><label for="respawn_timer">Respawn</label></strong><br>
            <input class="indented" id="respawn_timer" type="text" name="respawn_timer" size="7" value="300000"><br><br>
            <strong><label for="name">Name</label></strong><br>
            <input class="indented" id="name" type="text" name="name" size="20" value="IT"><br><br>
            <strong><label for="comment">Comment</label></strong><br>
            <input class="indented" id="comment" type="text" name="comment" size="20" value="Default comment"><br><br>
            <strong><label for="min_expansion">Min Expansion</label></strong><br>
            <input class="indented" id="min_expansion" type="text" name="min_expansion" size="7" value="-1"><br><br>
            <strong><label for="max_expansion">Max Expansion</label></strong><br>
            <input class="indented" id="max_expansion" type="text" name="max_expansion" size="7" value="-1"><br><br>
            <strong><label for="content_flags">Content Flags</label></strong><br>
            <input class="indented" id="content_flags" type="text" name="content_flags" size="25" value=""><br><br>
            <strong><label for="content_flags_disabled">Content Flags Disabled</label></strong><br>
            <input class="indented" id="content_flags_disabled" type="text" name="content_flags_disabled" size="25" value=""><br><br>
            <div class="center">
				<input type="submit" value="Add Groundspawn">&nbsp;&nbsp;
				<input type="button" value="Cancel" onClick="history.back();">
            </div>
</form>