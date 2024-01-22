<div class="center">
    <table style="border: 1px solid black; background-color: #CCC;">
        <tr>
            <td colspan=2><b>Reminder:</b></td>
        </tr>

        <tr>
            <td style="text-align: right;">If you wish to use the WHERE options you must select Custom for NPC to
                Change.
            </td>
        </tr>

    </table>
    <br><br>
</div>

<div class="edit_form" style="width: 750px">
    <div class="edit_form_header">
        Change NPC Stats (AC and Resists)
    </div>
    <div class="edit_form_content">
        <form method="post"
              action="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=53">
            <table style="width: 100%;">
                <tr>
                    <td style="vertical-align: top;">
                        <label for="npctype_selected">NPC Type:</label><br>
                        <select id="npctype_selected" name="npctype_selected">
                            <?php foreach ($npctype as $key => $value): ?>
                                <option value="<?= $key ?>"<?php echo (isset($npctype_selected) && $key == $npctype_selected) ? " selected" : ""; ?>><?= $value ?></option>
                            <?php endforeach; ?>
                        </select><br><br>
                    </td>
                    <td style="vertical-align: top;">
                        <label for="npctier_selected">NPC Tier:</label><br>
                        <select id="npctier_selected" name="npctier_selected">
                            <?php foreach ($npctier as $key => $value): ?>
                                <option value="<?= $key ?>"<?php echo (isset($npctier_selected) && $key == $npctier_selected) ? " selected" : ""; ?>> <?= $value ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td style="vertical-align: top;">
                        <label for="npcclass_selected">NPC Class:</label><br>
                        <select id="npcclass_selected" name="npcclass_selected">
                            <?php foreach ($npcclass as $key => $value): ?>
                                <option value="<?= $key ?>"<?php echo (isset($npcclass_selected) && $key == $npcclass_selected) ? " selected" : ""; ?>> <?= $value ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td style="vertical-align: top;">
                        <label for="npcchange_selected">NPC to Change:</label><br>
                        <select id="npcchange_selected" name="npcchange_selected">
                            <?php foreach ($npcchange as $key => $value): ?>
                                <option value="<?= $key ?>"<?php echo (isset($npcchange_selected) && $key == $npcchange_selected) ? " selected" : ""; ?>> <?= $value ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td style="vertical-align: top;">
                        <label for="npcstatchange_selected">Stat to Change:</label><br>
                        <select id="npcstatchange_selected" name="npcstatchange_selected">
                            <?php foreach ($npcstatchange as $key => $value): ?>
                                <option value="<?= $key ?>"<?php echo (isset($npcstatchange_selected) && $key == $npcstatchange_selected) ? " selected" : ""; ?>> <?= $value ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>

                </tr>
            </table>
            <div class="center"><B>WHERE:<B><br></div>
            <table style="width: 100%;">
                <tr>
                    <td style="vertical-align: top;">
                        <label for="npcname">Name:</label><br>
                        <input type="text" size="25" id="npcname" name="npcname" value=""></td>
                    <td style="vertical-align: top;">
                        <label for="npclevel">Level:</label><br>
                        <input type="text" size="5" id="npclevel" name="npclevel" value=""></td>
                    <td style="vertical-align: top;">
                        <label for="race_selected">Race:</label><br>
                        <select id="race_selected" name="race_selected">
                            <?php foreach ($races as $key => $value): ?>
                                <option value="<?= $key ?>"<?php echo (isset($race_selected) && $key == $race_selected) ? " selected" : ""; ?>><?= $key ?>
                                    : <?= $value ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td style="vertical-align: top;">
                        <label for="class_selected">Class:</label><br>
                        <select id="class_selected" name="class_selected">
                            <?php foreach ($classes as $key => $value): ?>
                                <option value="<?= $key ?>"<?php echo (isset($class_selected) && $key == $class_selected) ? " selected" : ""; ?>><?= $key ?>
                                    : <?= $value ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>

                </tr>
            </table>
            <br><br>
            <div class="center">
                <input type="submit">
            </div>
        </form>
    </div>
</div>
  