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
			<strong><label for="min_expansion">Min Expansion</strong><br>
            <input class="indented" id="min_expansion" type="text" name="min_expansion" size="7" value="-1"><br><br>
			<strong><label for="max_expansion">Max Expansion</strong><br>
            <input class="indented" id="max_expansion" type="text" name="max_expansion" size="7" value="-1"><br><br>
			<strong><label for="content_flags">Content Flags</strong><br>
            <input class="indented" id="content_flags" type="text" name="content_flags" size="18" value=""><br><br>
			<strong><label for="content_flags_disabled">Content Flags Disabled</strong><br>
            <input class="indented" id="content_flags_disabled" type="text" name="content_flags_disabled" size="18" value=""><br><br>
         <div class="center">
			<input type="submit" value="Add Entry">&nbsp;&nbsp;
			<input type="button" value="Cancel" onClick="history.back();">
         </div>
</form>
