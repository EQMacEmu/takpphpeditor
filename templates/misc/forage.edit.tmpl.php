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
            <strong><label for="level">Level</label></strong><br>
            <input class="indented" id="level" type="text" name="level" size="7" value="<?= $level ?? "" ?>"><br><br>
            <strong><label for="chance">Chance</label></strong><br>
            <input class="indented" id="chance" type="text" name="chance" size="7"
                   value="<?= $chance ?? "" ?>">%<br><br>
			<strong><label for="min_expansion">Min Expansion</strong><br>
			<input class="indented" id="min_expansion" type="text" name="min_expansion" size="7" value="<?=$min_expansion ?? "" ?>"><br><br>
			<strong><label for="max_expansion">Max Expansion</strong><br>
			<input class="indented" id="max_expansion" type="text" name="max_expansion" size="7" value="<?=$max_expansion ?? "" ?>"><br><br>	
			<strong><label for="content_flags">Content Flags</strong><br>
			<input class="indented" id="content_flags" type="text" name="content_flags" size="25" value="<?=$content_flags ?? "" ?>"><br><br>
			<strong><label for="content_flags_disabled">Content Flags Disabled</strong><br>
			<input class="indented" id="content_flags_disabled" type="text" name="content_flags_disabled" size="25" value="<?=$content_flags_disabled ?? "" ?>"><br><br>
		<div class="fgid">
			<input type="hidden" name="fgid" value="<?= $fgid ?? "" ?>">
			<input type="hidden" name="zoneid" value="<?=$zoneid?>">
			<input type="submit" value="Submit Changes">&nbsp;&nbsp;
			<input type="button" value="Cancel" onClick="history.back();">
		</div>
</form>