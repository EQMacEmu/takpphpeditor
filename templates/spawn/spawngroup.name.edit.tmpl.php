<div class="edit_form" style="width:200px">
    <div class="edit_form_header">
        <div class="center">
            Spawngroup <?= $sid ?>
        </div>
    </div>
    <div class="edit_form_content">
        <form method="post"
              action="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&sid=<?= $sid ?>&action=5">
            <div class="center">
                <label for="name">Spawngroup Name:</label><br>
                <input type="text" id="name" name="name" size="25" value="<?= $name ?? "" ?>"><br><br>
                <label for="spawn_limit">spawn_limit:</label>&nbsp;
                <label for="wp_spawns">WP Spawns:</label><br>
                <input type="text" id="spawn_limit" name="spawn_limit" size="6" value="<?= $spawn_limit ?? "" ?>">&nbsp;
                <select id="wp_spawns" name="wp_spawns" style="width: 70px;">
                    <option value="0"<?php echo empty($wp_spawns) ? " selected" : "" ?>>Off</option>
                    <option value="1"<?php echo !empty($wp_spawns) ? " selected" : "" ?>>Enabled</option>
                </select><br><br>

                <label for="mindelay">mindelay:</label>&nbsp;
                <label for="delay">delay:</label>&nbsp;&nbsp;&nbsp;&nbsp;<br>
                <input type="text" id="mindelay" name="mindelay" size="5" value="<?= $mindelay ?? "" ?>">
                <input type="text" id="delay" name="delay" size="5" value="<?= $delay ?? "" ?>"><br><br>
                <label for="max_x">max_x:</label>&nbsp;&nbsp;
                <label for="min_x">min_x:</label><br>
                <input type="text" id="max_x" name="max_x" size="5" value="<?= $max_x ?? "" ?>">
                <input type="text" id="min_x" name="min_x" size="5" value="<?= $min_x ?? "" ?>"><br><br>
                <label for="max_y">max_y:</label>&nbsp;&nbsp;
                <label for="min_y">min_y:</label><br>
                <input type="text" id="max_y" name="max_y" size="5" value="<?= $max_y ?? "" ?>">
                <input type="text" id="min_y" name="min_y" size="5" value="<?= $min_y ?? "" ?>"><br><br>
                <label for="despawn">despawn:</label><br>
                <select id="despawn" name="despawn" style="width: 160px;">
                    <?php foreach ($despawntype as $key => $value): ?>
                        <option value="<?= $key ?>"<?php echo (isset($despawn) && $key == $despawn) ? " selected" : ""; ?>><?= $key ?>
                            : <?= $value ?></option>
                    <?php endforeach; ?></select><br><br>
                <label for="despawn_timer">despawn timer:</label><br>
                <input type="text" id="despawn_timer" name="despawn_timer" size="5" value="<?= $despawn_timer ?? "" ?>"><br><br>
                <label for="rand_spawns">rand_spawns:</label><br>
                <input type="text" id="rand_spawns" name="rand_spawns" size="5"
                       value="<?= $rand_spawns ?? "" ?>"><br><br>
                <label for="rand_respawntime">rand_respawntime:</label><br>
                <input type="text" id="rand_respawntime" name="rand_respawntime" size="5"
                       value="<?= $rand_respawntime ?? "" ?>"><br><br>
                <label for="rand_variance">rand_variance:</label><br>
                <input type="text" id="rand_variance" name="rand_variance" size="5" value="<?= $rand_variance ?? "" ?>"><br><br>
                <label for="rand_condition_">rand_condition:</label><br>
                <input type="text" id="rand_condition_" name="rand_condition_" size="5"
                       value="<?= $rand_condition_ ?? "" ?>"><br><br>
                <input type="submit" name="submit" value="Submit Changes">
            </div>
        </form>
    </div>
</div>
