<div class="edit_form">
    <div class="edit_form_header">
        Spawnpoint ID: <?= $id ?>
    </div>
    <div class="edit_form_content">
        <form name="spawnpoint" method="post"
              action="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=12">
            <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
                <tr>
                    <td style="width: 33%">
                        <label for="x">x:</label><br/>
                        <input type="text" id="x" name="x" value="<?= $x ?? "" ?>">
                    </td>
                    <td style="width: 33%">
                        <label for="y">y:</label><br/>
                        <input type="text" id="y" name="y" value="<?= $y ?? "" ?>">
                    </td>
                    <td style="width: 34%">
                        <label for="z">z:</label><br/>
                        <input type="text" id="z" name="z" value="<?= $z ?? "" ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 33%">
                        <label for="heading">heading:</label><br/>
                        <input type="text" id="heading" name="heading" value="<?= $heading ?? "" ?>">
                    </td>
                    <td style="width: 33%">
                        <label for="respawntime">respawn:</label><br/>
                        <input type="text" id="respawntime" name="respawntime" value="<?= $respawntime ?? "" ?>">
                    </td>
                    <td style="width: 34%">
                        <label for="variance">variance:</label><br/>
                        <input type="text" id="variance" name="variance" value="<?= $variance ?? "" ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 33%">
                        <label for="pathgrid">pathgrid:</label><br/>
                        <input type="text" id="pathgrid" name="pathgrid" value="<?= $pathgrid ?>">
                    </td>
                    <td style="width: 33%">
                        <label for="_condition">condition:</label><br/>
                        <input type="text" id="_condition" name="_condition" value="<?= $_condition ?? "" ?>">
                    </td>
                    <td style="width: 34%">
                        <label for="cond_value">cond_value:</label><br/>
                        <input type="text" id="cond_value" name="cond_value" value="<?= $cond_value ?? "" ?>">
                    </td>
                </tr>
                <tr>
                    <td style="text-align: left; width: 33%">
                        <label for="enabled">enabled:</label><br/>
                        <select id="enabled" name="enabled">
                            <?php foreach ($yesno as $k => $v): ?>
                                <option value="<?= $k ?>"<?php echo ($k == $enabled) ? " selected" : "" ?>><?= $v ?>
                                    &nbsp;&nbsp;
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td style="text-align: left; width: 33%">
                        <label for="animation">animation:</label><br/>
                        <select id="animation" name="animation">
                            <?php foreach ($animations as $k => $v): ?>
                                <option value="<?= $k ?>"<?php echo (isset($animation) && $k == $animation) ? " selected" : "" ?>><?= $v ?>
                                    &nbsp;&nbsp;
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td style="text-align: left; width: 33%">
                        <label for="force_z">force_z:</label><br/>
                        <select id="force_z" name="force_z">
                            <?php foreach ($yesno as $k => $v): ?>
                                <option value="<?= $k ?>"<?php echo (isset($force_z) && $k == $force_z) ? " selected" : "" ?>><?= $v ?>
                                    &nbsp;&nbsp;
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="width: 33%">
                        <label for="boot_respawntime">boot respawn:</label><br/>
                        <input type="text" id="boot_respawntime" name="boot_respawntime"
                               value="<?= $boot_respawntime ?? "" ?>">
                    </td>
                    <td style="width: 33%">
                        <label for="boot_variance">boot variance:</label><br/>
                        <input type="text" id="boot_variance" name="boot_variance" value="<?= $boot_variance ?? "" ?>">
                    </td>
                    <td style="width: 34%">
                        <label for="clear_timer_onboot">clear on boot:</label><br/>
                        <input type="text" id="clear_timer_onboot" name="clear_timer_onboot"
                               value="<?= $clear_timer_onboot ?? "" ?>">
                    </td>
                </tr>
            </table>
            <br/><br/>
            <div class="center">
                <input type="hidden" name="zone" value="<?= $zone ?>">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="hidden" name="spawngroupID" value="<?= $spawngroupID ?? "" ?>">
                <input type="submit" value="Submit Changes">
            </div>
        </form>
    </div>
</div>
