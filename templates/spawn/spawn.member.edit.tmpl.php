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
            <input class="indented" type="text" size="5" id="chance" name="chance"
                   value="<?= $chance ?? "" ?>">%<br/><br/>
            <div class="center">
                <input type="hidden" name="sgnpcid" value="<?= $sgnpcid ?? "" ?>">
                <input type="hidden" name="spawngroupID" value="<?= $spawngroupID ?? "" ?>">
                <input type="submit" name="submit" value="Submit Changes">
            </div>
        </form>
    </div>
</div>
