<div class="table_container" style="width:200px;">
    <div class="edit_form_header">
        <div class="center">Magelo coords import for <?= $npcid ?></div>
    </div>
    <div class="edit_form_content">
        <form method="post"
              action="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=81">
            <div class="center">
                <label for="spawngroupinsert">Use spawngroup:</label><br>
                <select id="spawngroupinsert" name="spawngroupinsert">
                    <option selected="selected" value="1">Yes</option>
                    <option value="0">No</option>
                </select><br><br>
                <label for="limit">Limit:</label><br>
                <input type="text" id="limit" name="limit" size="6" value="150"><br><br>
                <label for="heading">Heading:</label><br>
                <input type="text" id="heading" name="heading" size="6" value="0"><br><br>
                <label for="respawntime">Respawntime:</label><br>
                <input type="text" id="respawntime" name="respawntime" size="6" value="1200"><br><br>
                <label for="spawnlimit">Spawn Limit:</label><br>
                <input type="text" id="spawnlimit" name="spawnlimit" size="6" value="0"><br><br>
                <label for="mincoord">MinCoord:</label><br>
                <input type="text" id="mincoord" name="mincoord" size="6" value="-20000"><br><br>
                <label for="maxcoord">MaxCoord:</label><br>
                <input type="text" id="maxcoord" name="maxcoord" size="6" value="20000"><br><br>
                <label for="forcedz">Forced Z:</label><br>
                <input type="text" id="forcedz" name="forcedz" size="6" value="0"><br><br>
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</div>