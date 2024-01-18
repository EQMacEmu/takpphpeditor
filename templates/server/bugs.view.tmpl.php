<form name="bug_edit" method="post" action="index.php?editor=server&action=3">
    <div class="table_container" style="width: 600px;">
        <div class="table_header">
            <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
                <tr>
                    <td style="padding: 0; text-align: left;">View Bug <?= $bid ?? "" ?></td>
                    <td style="padding: 0; text-align: right;"><a href="index.php?editor=server&action=1">View Open
                            Bugs</a></td>
                </tr>
            </table>
        </div>
        <div class="edit_form_content">
            <div class="center">
                <fieldset style="text-align: left;">
                    <table style="width: 100%;">
                        <tr>
                            <td style="text-align: center; width: 5%"><strong>ID</strong></td>
                            <td style="text-align: center; width: 19%"><strong>Zone</strong></td>
                            <td style="text-align: center; width: 19%"><strong>Character</strong></td>
                            <td style="text-align: center; width: 19%"><strong>Type</strong></td>
                            <td style="text-align: center; width: 19%"><strong>Target</strong></td>
                            <td style="text-align: center; width: 19%"><strong>Date</strong></td>
                        </tr>
                        <tr>
                            <td style="text-align: center; width: 5%"><?= $bid ?? "" ?></td>
                            <td style="text-align: center; width: 19%"><?= $zone ?></td>
                            <td style="text-align: center; width: 19%"><?= $name ?? "" ?></td>
                            <td style="text-align: center; width: 19%"><?= $type ?? "" ?></td>
                            <td style="text-align: center; width: 19%"><?= $target ?? "" ?></td>
                            <td style="text-align: center; width: 19%"><?= $date ?? "" ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center; width: 5%">&nbsp;</td>
                            <td style="text-align: center; width: 19%"><strong>UI</strong></td>
                            <td style="text-align: center; width: 19%"><strong>X</strong></td>
                            <td style="text-align: center; width: 19%"><strong>Y</strong></td>
                            <td style="text-align: center; width: 19%"><strong>Z</strong></td>
                            <td style="text-align: center; width: 19%"><strong>Flag</strong></td>
                        </tr>
                        <tr>
                            <td style="text-align: center; width: 5%">&nbsp;</td>
                            <td style="text-align: center; width: 19%"><?= $ui ?? "" ?></td>
                            <td style="text-align: center; width: 19%"><?= $x ?? "" ?></td>
                            <td style="text-align: center; width: 19%"><?= $y ?? "" ?></td>
                            <td style="text-align: center; width: 19%"><?= $z ?? "" ?></td>
                            <td style="text-align: center; width: 19%"><?= isset($flag) ? $flags[$flag] : "None" ?></td>
                        </tr>
                    </table>
                </fieldset>
                <br>
                <fieldset>
                    <legend><strong>Bug</strong></legend>
                    <table style="width: 100%;">
                        <tr>
                            <td style="text-align: center; width: 10%">
                                <label for="status"></label><select id="status" name="status"
                                                                    onChange="toggleNotify();">
                                    <?php foreach ($bugstatus as $key => $value): ?>
                                        <option value="<?= $key ?>"<?php echo (isset($status) && $key == $status) ? " selected" : ""; ?>><?= $value ?></option>
                                    <?php endforeach; ?>
                                </select></td>
                            <td style="text-align: center; width: 90%"><?= $bug ?? "" ?></td>
                        </tr>
                    </table>
                </fieldset>
                <br/>
            </div>
            <fieldset id="notify" style="display:none">
                <legend><strong>Player Notification</strong></legend>
                <br/><input type="checkbox" id="notify" name="notify" value="notify" onChange="toggleNote();"/><label
                        for="notify">Notify player of
                    status change</label><br/><br/>
                <label for="note">Note to Player: (Optional)</label><br/>
                <textarea name="optional_note" id="note" cols="68" rows="5" disabled="disabled"></textarea>
            </fieldset>
            <br/><br/>
            <div class="center">
                <input type="hidden" name="bid" value="<?= $bid ?? "" ?>">
                <input type="hidden" name="bug_date" value="<?= $date ?? "" ?>">
                <input type="hidden" name="name" value="<?= $name ?? "" ?>">
                <input type="hidden" name="bug" value="<?= $bug ?? "" ?>">
                <input type="submit" value="Submit Changes">
            </div>
        </div>
    </div>
</form>
