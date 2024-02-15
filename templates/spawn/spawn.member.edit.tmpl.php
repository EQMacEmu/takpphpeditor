<div class="edit_form" style="width: 200px">
    <div class="edit_form_header">
        Edit Spawngroup Member
    </div>
    <div class="edit_form_content">
        <strong>Spawngroup:</strong> <?= $spawngroupID ?? "" ?><br>
        <strong>NPC:</strong> <?= $npcname ?? "" ?><br><br>
        <form method="post"
              action="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=2">
            <strong><label for="mintime">MinTime:</label></strong><br>
            <input class="indented" type="text" size="5" id="mintime" name="mintime" value="<?= $mintime ?? "" ?>"><br/><br/>
            <strong><label for="maxtime">MaxTime:</label></strong><br>
            <input class="indented" type="text" size="5" id="maxtime" name="maxtime" value="<?= $maxtime ?? "" ?>"><br/><br/>
            <strong><label for="chance">Chance:</label></strong><br>
            <input class="indented" type="text" size="5" id="chance" name="chance" value="<?= $chance ?? "" ?>">%<br/><br/>
			<strong><label for="min_expansion">Min Expansion:</label></strong><br>
            <input class="indented" type="text" size="5" id="min_expansion" name="min_expansion" value="<?= $min_expansion ?? "" ?>"><br/><br/>
            <strong><label for="max_expansion">Max Expansion:</label></strong><br>
            <input class="indented" type="text" size="5" id="max_expansion" name="max_expansion" value="<?= $max_expansion ?? "" ?>"><br/><br/>
			<strong><label for="content_flags">Content Flags:</label></strong><br>
            <input class="indented" type="text" size="5" id="content_flags" name="content_flags" value="<?= $content_flags ?? "" ?>"><br/><br/>
            <strong><label for="content_flags_disabled">Content Flags Disabled:</label></strong><br>
            <input class="indented" type="text" size="5" id="content_flags_disabled" name="content_flags_disabled" value="<?= $content_flags_disabled ?? "" ?>"><br/><br/>
            <div class="center">
                <input type="hidden" name="sgnpcid" value="<?= $sgnpcid ?? "" ?>">
                <input type="hidden" name="spawngroupID" value="<?= $spawngroupID ?? "" ?>">
                <input type="submit" name="submit" value="Submit Changes">
            </div>
        </form>
    </div>
</div>
