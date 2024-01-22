<div class="center">
    <table style="border: 1px solid black; background-color: #CCC;">
        <tr>
            <td colspan=2><b>Reminders:</b></td>
        </tr>

        <tr>
            <td style="text-align: center;">Abilities 1,2,3,4,5,11,29,32,33,37,40,49 accept parameters. For multiple
                parameters, please
                separate with commas. <br>
                The special ability number should not be put in the parameter box.<br>
                If no WHERE values are filled out, the current NPC will be the only one affected.<br>
                CUSTOM will allow you to edit the raw database column. It does not provide any error checking!<br></td>
        </tr>

    </table>
    <br><br>
</div>
<div class="edit_form" style="width: 750px">
    <div class="edit_form_header">
        Change NPC Special Abilities
    </div>
    <div class="edit_form_content">
        <form method="post"
              action="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=89">
            <div class="center"><B>SET:<B><br><br></div>
            <table style="width: 100%;">
                <tr>
                    <td style="text-align: center;">
                        <label for="sa_type">Type:</label><br>
                        <select id="sa_type" name="sa_type">
                            <?php foreach ($satype as $key => $value): ?>
                                <option value="<?= $key ?>"<?php echo (isset($sa_type) && $key == $sa_type) ? " selected" : ""; ?>><?= $value ?></option>
                            <?php endforeach; ?>
                        </select><br><br>
                    </td>

                    <td style="text-align: center;">
                        <label for="special_ability">Special Ability:</label><br>
                        <select id="special_ability" name="special_ability">
                            <?php foreach ($specialattacks as $key => $value): ?>
                                <option value="<?= $key ?>"<?php echo (isset($special_ability) && $key == $special_ability) ? " selected" : ""; ?>><?= $key ?>
                                    : <?= $value ?></option>
                            <?php endforeach; ?>
                        </select><br><br>
                    </td>

                    <td style="text-align: center;">
                        <label for="parameter">Parameter:</label><br>
                        <input type="text" size="5" id="parameter" name="parameter" value="1"></td>
                </tr>
            </table>
            <table style="width: 100%;">
                <tr>
                    <td style="text-align: center;">
                        <label for="custom">Custom:</label><br>
                        <input type="text" size="75" id="custom" name="custom" value=<?= $custom ?? "" ?>></td>
                </tr>
            </table>
            <br/>

            <div class="center"><B>WHERE:<B><br><br></div>

            <table style="width: 100%;">
                <tr>
                    <td style="text-align: center;">
                        <label for="npcname">Name:</label><br>
                        <input type="text" size="25" id="npcname" name="npcname" value=""></td>
                    <td style="text-align: center;">
                        <label for="race_selected">Race:</label><br>
                        <select id="race_selected" name="race_selected">
                            <?php foreach ($races as $key => $value): ?>
                                <option value="<?= $key ?>"<?php echo (isset($race_selected) && $key == $race_selected) ? " selected" : ""; ?>><?= $key ?>
                                    : <?= $value ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td style="text-align: center;">
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
            <br>

            <table style="width: 100%;">
                <tr>
                    <td style="text-align: center;">
                        <label for="body_selected">Bodytype:</label><br>
                        <select id="body_selected" name="body_selected">
                            <?php foreach ($bodytypes as $key => $value): ?>
                                <option value="<?= $key ?>"<?php echo (isset($body_selected) && $key == $body_selected) ? " selected" : ""; ?>><?= $key ?>
                                    : <?= $value ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
            </table>
            <br><br>

            <table style="width: 100%;">
                <tr>
                    <td style="text-align: center;">
                        <label for="level_value">Level:</label><br>
                        <select id="level_value" name="level_value">
                            <?php foreach ($valueadjust as $key => $value): ?>
                                <option value="<?= $key ?>"<?php echo (isset($level_value) && $key == $level_value) ? " selected" : ""; ?>><?= $value ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td style="text-align: center;">
                        <label for="npclevel"></label>
                        <input type="text" size="10" id="npclevel" name="npclevel" value="">
                    </td>
                    <td style="text-align: center;">
                        <label for="hp_value">HP:</label><br>
                        <select id="hp_value" name="hp_value">
                            <?php foreach ($valueadjust as $key => $value): ?>
                                <option value="<?= $key ?>"<?php echo (isset($hp_value) && $key == $hp_value) ? " selected" : ""; ?>><?= $value ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td style="text-align: center;">
                        <label for="npchp"></label>
                        <input type="text" size="10" id="npchp" name="npchp" value="">
                    </td>
                </tr>
            </table>
            <br><br>

            <div class="center"><B>OR:<B><br><br></div>

            <table style="width: 100%;">
                <tr>
                    <td style="text-align: center;">
                        <label for="change_all">Change ALL in zone:</label><br>
                        <input type="checkbox" id="change_all" name="change_all"
                               value="1"<?php echo (isset($change_all) && $change_all == 1) ? " checked" : ""; ?>><br/>
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
  