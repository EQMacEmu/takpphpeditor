<div class="center">
    <table style="border: 1px solid black; background-color: #CCC;">
        <tr>
            <td colspan=2><b>Reminder:</b></td>
        </tr>

        <tr>
            <td style="text-align: center;">Any unused boxes will be ignored, both in the SET and WHERE statements.</td>
        </tr>

    </table>
    <br><br>
</div>
<div class="edit_form" style="width: 750px">
    <div class="edit_form_header">
        Change NPC Stats
    </div>
    <div class="edit_form_content">
        <form method="post"
              action="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=87">
            <div class="center"><B>SET:<B><br><br></div>
            <table style="width: 100%;">
                <tr>
                    <td style="text-align: center;">
                        <label for="npctype_selected1">Stat1:</label><br>
                        <select id="npctype_selected1" name="npctype_selected1">
                            <?php foreach ($npcfields as $key => $value): ?>
                                <option value="<?= $key ?>"<?php echo (isset($npctype_selected1) && $key == $npctype_selected1) ? " selected" : ""; ?>><?= $value ?></option>
                            <?php endforeach; ?>
                        </select><br><br>
                    </td>
                    <td style="text-align: center;">
                        <label for="npcvalue1">Value1:</label><br>
                        <input type="text" size="5" id="npcvalue1" name="npcvalue1" value=""></td>

                    <td style="text-align: center;">
                        <label for="npctype_selected2">Stat2:</label><br>
                        <select id="npctype_selected2" name="npctype_selected2">
                            <?php foreach ($npcfields as $key => $value): ?>
                                <option value="<?= $key ?>"<?php echo (isset($npctype_selected2) && $key == $npctype_selected2) ? " selected" : ""; ?>><?= $value ?></option>
                            <?php endforeach; ?>
                        </select><br><br>
                    </td>
                    <td style="text-align: center;">
                        <label for="npcvalue2">Value2:</label><br>
                        <input type="text" size="5" id="npcvalue2" name="npcvalue2" value=""></td>


                    <td style="text-align: center;">
                        <label for="npctype_selected3">Stat3:</label><br>
                        <select id="npctype_selected3" name="npctype_selected3">
                            <?php foreach ($npcfields as $key => $value): ?>
                                <option value="<?= $key ?>"<?php echo (isset($npctype_selected3) && $key == $npctype_selected3) ? " selected" : ""; ?>><?= $value ?></option>
                            <?php endforeach; ?>
                        </select><br><br>
                    </td>
                    <td style="text-align: center;">
                        <label for="npcvalue3">Value3:</label><br>
                        <input type="text" size="5" id="npcvalue3" name="npcvalue3" value=""></td>
                </tr>

                <tr>
                    <td style="text-align: center;">
                        <label for="npctype_selected4">Stat4:</label><br>
                        <select id="npctype_selected4" name="npctype_selected4">
                            <?php foreach ($npcfields as $key => $value): ?>
                                <option value="<?= $key ?>"<?php echo (isset($npctype_selected4) && $key == $npctype_selected4) ? " selected" : ""; ?>><?= $value ?></option>
                            <?php endforeach; ?>
                        </select><br><br>
                    </td>
                    <td style="text-align: center;">
                        <label for="npcvalue4">Value4:</label><br>
                        <input type="text" size="5" id="npcvalue4" name="npcvalue4" value=""></td>

                    <td style="text-align: center;">
                        <label for="npctype_selected5">Stat5:</label><br>
                        <select id="npctype_selected5" name="npctype_selected5">
                            <?php foreach ($npcfields as $key => $value): ?>
                                <option value="<?= $key ?>"<?php echo (isset($npctype_selected5) && $key == $npctype_selected5) ? " selected" : ""; ?>><?= $value ?></option>
                            <?php endforeach; ?>
                        </select><br><br>
                    </td>
                    <td style="text-align: center;">
                        <label for="npcvalue5">Value5:</label><br>
                        <input type="text" size="5" id="npcvalue5" name="npcvalue5" value=""></td>


                    <td style="text-align: center;">
                        <label for="npctype_selected6">Stat6:</label><br>
                        <select id="npctype_selected6" name="npctype_selected6">
                            <?php foreach ($npcfields as $key => $value): ?>
                                <option value="<?= $key ?>"<?php echo (isset($npctype_selected6) && $key == $npctype_selected6) ? " selected" : ""; ?>><?= $value ?></option>
                            <?php endforeach; ?>
                        </select><br><br>
                    </td>
                    <td style="text-align: center;">
                        <label for="npcvalue6">Value6:</label><br>
                        <input type="text" size="5" id="npcvalue6" name="npcvalue6" value=""></td>
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
            <br>

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
                        <input type="text" size="10" id="npclevel" name="npclevel" value=""></td>

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
  