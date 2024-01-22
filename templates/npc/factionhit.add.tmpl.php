<table class="edit_form">
    <tr>
        <td class="edit_form_header">
            Add faction hit:
        </td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <strong><?= $name ?? "" ?></strong><br><br>

            <form id="addhit" name="addhit" method="post"
                  action="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&fid=<?= $fid ?>&action=18">
                <label for="value">Adjustment:</label> <br>
                <input type="text" id="value" name="value" value=0><br><br>

                <input type="radio" id="passive" name="npc_value" value="0" checked> <label
                        for="passive">Passive</label><br>
                <input type="radio" id="assist" name="npc_value" value="1"> <label for="assist">Assist</label><br>
                <input type="radio" id="aggressive" name="npc_value" value="-1"> <label
                        for="aggressive">Aggressive</label><br><br>
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
