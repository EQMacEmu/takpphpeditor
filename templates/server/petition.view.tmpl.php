<form name="bug_edit" method="post" action="index.php?editor=server&action=14">
    <div class="table_container" style="width: 700px;">
        <div class="table_header">
            <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
                <tr>
                    <td style="padding: 0;">View Petition <?= $petid ?? "" ?></td>
                </tr>
            </table>
        </div>
        <div class="edit_form_content">
            <div class="center">
                <fieldset style="text-align: left;">
                    <table style="width: 100%;">
                        <tr>
                            <td style="text-align: center; width: 5%"><strong>ID</strong></td>
                            <td style="text-align: center; width: 19%"><strong>PetID</strong></td>
                            <td style="text-align: center; width: 19%"><strong>Character</strong></td>
                            <td style="text-align: center; width: 19%"><strong>Account</strong></td>
                            <td style="text-align: center; width: 19%"><strong>Race</strong></td>
                            <td style="text-align: center; width: 19%"><strong>Class</strong></td>
                            <td style="text-align: center; width: 19%"><strong>Level</strong></td>
                        </tr>
                        <tr>
                            <td style="text-align: center; width: 5%"><?= $dib ?? "" ?></td>
                            <td style="text-align: center; width: 19%"><?= $petid ?? "" ?></td>
                            <td style="text-align: center; width: 19%"><?= $charname ?? "" ?></td>
                            <td style="text-align: center; width: 19%"><?= $accountname ?? "" ?></td>
                            <td style="text-align: center; width: 19%"><?= isset($charrace) ? $races[$charrace] : "" ?></td>
                            <td style="text-align: center; width: 19%"><?= isset($charclass) ? $classes[$charclass] : "" ?></td>
                            <td style="text-align: center; width: 19%"><?= $charlevel ?? "" ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center; width: 5%">&nbsp;</td>
                            <td style="text-align: center; width: 19%">&nbsp;</td>
                            <td style="text-align: center; width: 19%"><strong>Zone</strong></td>
                            <td style="text-align: center; width: 19%"><strong>Urgency</strong></td>
                            <td style="text-align: center; width: 19%"><strong>Checkouts</strong></td>
                            <td style="text-align: center; width: 19%"><strong>Unavailables</strong></td>
                            <td style="text-align: center; width: 19%"><strong>Date</strong></td>
                        </tr>
                        <tr>
                            <td style="text-align: center; width: 5%">&nbsp;</td>
                            <td style="text-align: center; width: 19%">&nbsp;</td>
                            <td style="text-align: center; width: 19%"><?= getZoneName($zone) ?></td>
                            <td style="text-align: center; width: 19%"><?= $urgency ?? "" ?></td>
                            <td style="text-align: center; width: 19%"><?= $checkouts ?? "" ?></td>
                            <td style="text-align: center; width: 19%"><?= $unavailables ?? "" ?></td>
                            <td style="text-align: center; width: 19%"><?php echo isset($senttime) ? date("Y-m-d H:i:s", $senttime) : "00:00:00 0:0:0" ?></td>
                        </tr>
                    </table>
                </fieldset>
                <br>
                <fieldset>
                    <legend><strong>Petition</strong></legend>
                    <table style="width: 100%;">
                        <tr>
                            <td style="text-align: center; width: 90%"><?= $petitiontext ?? "" ?></td>
                        </tr>
                    </table>
                </fieldset>
                <br>
                <fieldset>
                    <table style="width: 100%;">
                        <tr>
                            <td style="text-align: center; width: 1%"><strong><label for="ischeckedout">Checked
                                        Out</label></strong></td>
                            <td style="text-align: center; width: 1%"><strong><label for="lastgm">GM</label></strong>
                            </td>
                            <td style="text-align: center; width: 4%"><strong><label for="gmtext">GM
                                        Text</label></strong></td>
                        </tr>
                        <tr>
                            <td><select id="ischeckedout" name="ischeckedout">
                                    <?php foreach ($yesno as $key => $value): ?>
                                        <option value="<?= $key ?>"<?php echo (isset($ischeckedout) && $key == $ischeckedout) ? " selected" : ""; ?>><?= $value ?></option>
                                    <?php endforeach; ?>
                                </select></td>
                            <td><input type="text" size="15" id="lastgm" name="lastgm" value="<?= $lastgm ?? "" ?>">
                            </td>
                            <td><textarea id="gmtext" name="gmtext" rows=4 cols=54><?= $gmtext ?? "" ?></textarea></td>
                        </tr>
                    </table>
                </fieldset>
                <br>
                <input type="hidden" name="dib" value="<?= $dib ?? "" ?>">
                <input type="submit" value="Submit Changes">
            </div>
        </div>
    </div>
</form>
