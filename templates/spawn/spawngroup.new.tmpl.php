<div class="table_container" style="width:200px;">
    <div class="edit_form_header">
        <div class="center">Add a Spawngroup to <?= $currzone ?? "" ?></div>
    </div>
    <div class="edit_form_content">
        <form method="post"
              action="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=17">
            <div class="center">
                <label for="id">Suggested ID:</label>
                <label for="spawn_limit">spawn_limit:</label>
                <input type="text" id="id" name="id" size="6" value="<?= $suggestedid ?? "" ?>">
                <input class="indented" type="text" id="spawn_limit" name="spawn_limit" size="5" value="0"><br><br>
                <label for="name">Spawngroup Name:</label>
                <input type="text" id="name" name="name" size="25"
                       value="<?= $currzone ?? "" ?>_<?= $suggestedid ?? "" ?>"><br><br>
                <label for="npcID">First NPCID:</label>
                <label for="chance">Chance:</label><br>
                <input type="text" id="npcID" name="npcID" size="5" value="<?= $npcid ?>">
                <input type="text" id="chance" name="chance" size="2" value="100">%<br><br>
                <label for="wp_spawns">Waypoint Spawning:</label>
                <select id="wp_spawns" name="wp_spawns" style="width: 70px;">
                    <option value="0" selected>Off</option>
                    <option value="1">Enabled</option>
                </select><br><br>
                <label for="mindelay">mindelay:</label>&nbsp;
                <label for="delay">delay:</label><br>
                <input type="text" id="mindelay" name="mindelay" size="5" value="0">
                <input type="text" id="delay" name="delay" size="5" value="0"><br><br>
                <label for="max_x">max_x:</label>&nbsp;&nbsp;
                <label for="min_x">min_x:</label><br>
                <input type="text" id="max_x" name="max_x" size="5" value="0">
                <input type="text" id="min_x" name="min_x" size="5" value="0"><br><br>
                <label for="max_y">max_y:</label>&nbsp;&nbsp;
                <label for="min_y">min_y:</label><br>
                <input type="text" id="max_y" name="max_y" size="5" value="0">
                <input type="text" id="min_y" name="min_y" size="5" value="0"><br><br>
                <label for="despawn">despawn:</label><br>
                <select id="despawn" name="despawn" style="width: 160px;">
                    <?php foreach ($despawntype as $key => $value): ?>
                        <option value="<?= $key ?>"<?php echo (isset($despawn) && $key == $despawn) ? " selected" : ""; ?>><?= $key ?>
                            : <?= $value ?></option>
                    <?php endforeach; ?></select><br><br>
                <label for="despawn_timer">despawn timer:</label><br>
                <input type="text" id="despawn_timer" name="despawn_timer" size="5" value="0"><br><br>
                <Label for="rand_spawns">rand_spawns:</Label><br>
                <input type="text" id="rand_spawns" name="rand_spawns" size="5" value="0"><br><br>
                <label for="rand_respawntime">rand_respawntime:</label><br>
                <input type="text" id="rand_respawntime" name="rand_respawntime" size="5" value="1200"><br><br>
                <label for="rand_variance">rand_variance:</label><br>
                <input type="text" id="rand_variance" name="rand_variance" size="5" value="0"><br><br>
                <label for="rand_condition_">rand_condition:</label><br>
                <input type="text" id="rand_condition_" name="rand_condition_" size="5" value="0"><br><br>
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</div>
