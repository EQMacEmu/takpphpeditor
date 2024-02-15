<div class="center">
    <iframe id='searchframe' src='templates/iframes/itemsearch.php'></iframe>
    <input id="button" type="button" value='Hide Item Search' onclick='hideSearch("searchframe");'
           style='display:none; margin-bottom: 20px;'>
</div>
<form method="post"
      action="index.php?editor=merchant&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=5">
    <div class="edit_form" style="width: 200px">
        <div class="edit_form_header">
            Add an Item to Merchant <?= $mid ?? "" ?>
        </div>
        <div class="edit_form_content">
            <strong><label for="id">Enter an Item ID:</label></strong> (<a href="javascript:showSearch('searchframe');">search</a>)<br/>
            <input class="indented" id="id" type="text" name="itemid"><br/><br/>
            <strong><label for="faction_required">Faction Required:</label></strong>
            <input class="indented" id="faction_required" type="text" name="faction_required" value="-100"/><br/><br/>
            <strong><label for="level_required">Level Required:</label></strong>
            <input class="indented" id="level_required" type="text" name="level_required" value="0"/><br/><br/>
            <strong><label for="classes_required">Classes Required:</label></strong>
            <input class="indented" id="classes_required" type="text" name="classes_required" value="65535"/><br/><br/>
            <strong><label for="quantity">Quantity:</label></strong>
            <input class="indented" id="quantity" type="text" name="quantity" value="0"/><br/><br/>
			
             <strong><label for="min_expansion">Min Expansion:</label></strong>
            <input class="indented" id="min_expansion" type="text" name="min_expansion" value="-1"/><br/><br/>
            <strong><label for="max_expansion">Max Expansion:</label></strong>
            <input class="indented" id="max_expansion" type="text" name="max_expansion" value="-1"/><br/><br/>
            <strong><label for="content_flags">Content Flags:</label></strong>
            <input class="indented" id="content_flags" type="text" name="content_flags" value=""/><br/><br/>
            <strong><label for="content_flags_disabled">Content Flags Disabled:</label></strong>
            <input class="indented" id="content_flags_disabled" type="text" name="content_flags_disabled" value=""/><br/><br/>

           <div class="center">
                <input type="hidden" name="mid" value="<?= $mid ?? "" ?>"/>
				<input type="submit" name="submit" value="Add Item">&nbsp;&nbsp;
				<input type="button" value="Cancel" onClick="history.back();">
            </div>
        </div>
    </div>
</form>
