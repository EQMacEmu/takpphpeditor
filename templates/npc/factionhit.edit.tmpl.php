<table class="edit_form">
    <tr>
        <td class="edit_form_header">
            Edit faction hit:
        </td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <strong><?= $name ?? "" ?></strong><br><br>

            <form name="edithit" method="post"
                  action="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&npc_faction_id=<?= $npc_faction_id ?? "" ?>&faction_id=<?= $faction_id ?? "" ?>&action=20">
                <label for="value">Adjustment:</label> <br>
                <input type="text" id="value" name="value" value=<?= $value ?? "" ?>><br><br>

                <input type="radio" id="passive" name="npc_value"
                       value="0"<?php echo((isset($npc_value) && $npc_value == 0) ? " checked" : ""); ?>>
                <label for="passive">Passive</label><br>
                <input type="radio" id="assist" name="npc_value"
                       value="1"<?php echo((isset($npc_value) && $npc_value == 1) ? " checked" : ""); ?>>
                <label for="assist">Assist</label><br>
                <input type="radio" id="aggressive" name="npc_value"
                       value="-1"<?php echo((isset($npc_value) && $npc_value == -1) ? " checked" : ""); ?>>
                <label for="aggressive">Aggressive</label><br><br>

                <label for="temp">Temp:</label><br>
                <select id="temp" name="temp" style="width: 130px;">
                    <?php foreach ($tmpfaction as $key => $value): ?>
                        <option value="<?= $key ?>"<?php echo (isset($temp) && $key == $temp) ? " selected" : ""; ?>><?= $key ?>
                            : <?= $value ?></option>
                    <?php endforeach; ?></select><br><br>
                <div class="center">
                    <input type="submit" name="submit" value="Submit Changes">
                </div>
            </form>
        </td>
    </tr>
</table>
