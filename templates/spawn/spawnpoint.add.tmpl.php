<div class="edit_form" style="margin-bottom: 15px;">
    <div class="edit_form_header">
        Add a Spawnpoint:
    </div>
    <div class="edit_form_content">
        <form name="spawnpoint" method="post"
              action="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=15">
            <label for="id">Suggested ID:</label><br/>
            <input type="text" id="id" name="id" value="<?= $suggestedid ?? "" ?>"><br/><br/>
            <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
                <tr>
                    <td style="width: 33%">
                        <label for="x">x:</label><br/>
                        <input type="text" id="x" name="x" value="">
                    </td>
                    <td style="width: 33%">
                        <label for="y">y:</label><br/>
                        <input type="text" id="y" name="y" value="">
                    </td>
                    <td style="width: 34%">
                        <label for="z">z:</label><br/>
                        <input type="text" id="z" name="z" value="">
                    </td>
                </tr>
                <tr>
                    <td style="width: 33%">
                        <label for="heading">heading:</label><br/>
                        <input type="text" id="heading" name="heading" value="0">
                    </td>
                    <td style="width: 33%">
                        <label for="respawntime">respawn:</label><br/>
                        <input type="text" id="respawntime" name="respawntime" value="1200">
                    </td>
                    <td style="width: 34%">
                        <label for="variance">variance:</label><br/>
                        <input type="text" id="variance" name="variance" value="0">
                    </td>
                </tr>
                <tr>
                    <td style="width: 33%">
                        <label for="pathgrid">pathgrid:</label><br/>
                        <input type="text" id="pathgrid" name="pathgrid" value="0">
                    </td>
                    <td style="width: 33%">
                        <label for="_condition">condition:</label><br/>
                        <input type="text" id="_condition" name="_condition" value="0">
                    </td>
                    <td style="width: 34%">
                        <label for="cond_value">cond_value:</label><br/>
                        <input type="text" id="cond_value" name="cond_value" value="1">
                    </td>
                </tr>
                <tr>
                    <td style="width: 33%">
                        <label for="enabled">enabled:</label><br/>
                        <input type="text" id="enabled" name="enabled" value="1">
                    </td>
                    <td style="text-align: left; width: 33%">
                        <label for="animation">animation:</label><br/>
                        <select id="animation" name="animation">
                            <?php foreach ($animations as $k => $v): ?>
                                <option value="<?= $k ?>"><?= $v ?>&nbsp;&nbsp;</option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td style="width: 34%">&nbsp;</td>
                </tr>
                <tr>
                    <td style="width: 33%">
                        <label for="boot_respawntime">boot respawn:</label><br/>
                        <input type="text" id="boot_respawntime" name="boot_respawntime" value="0">
                    </td>
                    <td style="width: 33%">
                        <label for="boot_variance">boot variance:</label><br/>
                        <input type="text" id="boot_variance" name="boot_variance" value="0">
                    </td>
                    <td style="width: 34%">
                        <label for="clear_timer_onboot">clear on boot:</label><br/>
                        <input type="text" id="clear_timer_onboot" name="clear_timer_onboot" value="0">
                </tr>
                <tr>
                    <td style="text-align: left; width: 33%">
                        <label for="force_z">force_z:</label><br/>
                        <select id="force_z" name="force_z">
                            <?php foreach ($yesno as $k => $v): ?>
                                <option value="<?= $k ?>"><?= $v ?>&nbsp;&nbsp;</option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td style="width: 33%">&nbsp;</td>
                    <td style="width: 34%">&nbsp;</td>
                </tr>
            </table>
            <br/><br/>
            <div class="center">
                <input type="hidden" name="zone" value="<?= $zone ?>">
                <input type="hidden" name="spawngroupID" value="<?= $spawngroupID ?? "" ?>">
                <input type="submit" value="Submit Changes">
            </div>
        </form>
    </div>
</div>
