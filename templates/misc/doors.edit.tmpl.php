<div class="edit_form" style="width: 750px">
    <div class="edit_form_header">
        Edit Door: <?= $id ?>
    </div>
    <div class="edit_form_content">
        <form name="door" method="post"
              action=index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=37">
            <div style="padding-bottom:20px;">
                <fieldset>
                    <legend>Identity</legend>
                    <table style="width: 100%; border-spacing: 20px;">
                        <tr>
                            <th colspan="2"><label for="name">Door Name</label></th>
                            <th colspan="2"><label for="doorid">doorid</label></th>
                            <th colspan="2"><label for="client_version_mask">client version mask</label></th>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="text" size="15" id="name" name="name"
                                                   value="<?= $name ?? "" ?>"></td>
                            <td colspan="2"><input type="text" size="7" id="doorid" name="doorid"
                                                   value="<?= $doorid ?? "" ?>"></td>
                            <td colspan="2"><input type="text" size="10" id="client_version_mask"
                                                   name="client_version_mask" value="<?= $client_version_mask ?? "" ?>">
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </div>
            <div style="padding-bottom:20px;">
                <fieldset>
                    <legend>Location Data</legend>
                    <table style="width: 100%; border-spacing: 20px;">
                        <tr>
                            <th colspan="2"><label for="curr_zone">curr zone (shortname)</label></th>
                            <th colspan="2"><label for="pos_x">x</label></th>
                            <th colspan="2"><label for="pos_y">y</label></th>
                            <th colspan="2"><label for="pos_z">z</label></th>
                            <th colspan="2"><label for="heading">heading</label></th>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding-top: 5px;"><input type="text" size="15" id="curr_zone"
                                                                             name="curr_zone" disabled
                                                                             value="<?= $currzone ?? "" ?>"></td>
                            <td colspan="2" style="padding-top: 5px"><input type="text" size="7" id="pos_x" name="pos_x"
                                                                            value="<?= $pos_x ?? "" ?>"></td>
                            <td colspan="2" style="padding-top: 5px;"><input type="text" size="7" id="pos_y"
                                                                             name="pos_y" value="<?= $pos_y ?? "" ?>">
                            </td>
                            <td colspan="2" style="padding-top: 5px;"><input type="text" size="7" id="pos_z"
                                                                             name="pos_z" value="<?= $pos_z ?? "" ?>">
                            </td>
                            <td colspan="2" style="padding-top: 5px;"><input type="text" size="7" id="heading"
                                                                             name="heading"
                                                                             value="<?= $heading ?? "" ?>"></td>
                        </tr>
                        <tr>
                            <th colspan="2"><label for="dest_zone">dest zone (shortname)</label></th>
                            <th colspan="2"><label for="dest_x">dest x</label></th>
                            <th colspan="2"><label for="dest_y">dest y</label></th>
                            <th colspan="2"><label for="dest_z">dest z</label></th>
                            <th colspan="2"><label for="dest_heading">dest heading</label></th>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="text" size="15" id="dest_zone" name="dest_zone"
                                                   value="<?= $dest_zone ?? "" ?>"></td>
                            <td colspan="2"><input type="text" size="7" id="dest_x" name="dest_x"
                                                   value="<?= $dest_x ?? "" ?>"></td>
                            <td colspan="2"><input type="text" size="7" id="dest_y" name="dest_y"
                                                   value="<?= $dest_y ?? "" ?>"></td>
                            <td colspan="2"><input type="text" size="7" id="dest_z" name="dest_z"
                                                   value="<?= $dest_z ?? "" ?>"></td>
                            <td colspan="2"><input type="text" size="7" id="dest_heading" name="dest_heading"
                                                   value="<?= $dest_heading ?? "" ?>"></td>
                        </tr>
                    </table>
                </fieldset>
            </div>
            <div style="padding-bottom:20px;">
                <fieldset>
                    <legend>Door Characteristics</legend>
                    <table style="width: 100%; border-spacing: 20px;">
                        <tr>
                            <th colspan="2"><label for="opentype">opentype</label></th>
                            <th colspan="2"><label for="doorisopen">doorisopen</label></th>
                            <th colspan="2"><label for="can_open">can_open</label></th>
                            <th colspan="2"><label for="islift">islift</label></th>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="text" size="7" id="opentype" name="opentype"
                                                   value="<?= $opentype ?? "" ?>"></td>
                            <td colspan="2"><input type="text" size="7" id="doorisopen" name="doorisopen"
                                                   value="<?= $doorisopen ?? "" ?>"></td>
                            <td colspan="2"><select class="left" id="can_open" name="can_open">
                                    <?php foreach ($yesno as $k => $v): ?>
                                        <option value="<?= $k ?>"<?php echo (isset($can_open) && $k == $can_open) ? " selected" : "" ?>><?= $v ?></option>
                                        <?php $x++; endforeach; ?>
                            </td>
                            <td colspan="2"><select class="left" id="islift" name="islift">
                                    <?php foreach ($yesno as $k => $v): ?>
                                        <option value="<?= $k ?>"<?php echo (isset($islift) && $k == $islift) ? " selected" : "" ?>><?= $v ?></option>
                                        <?php $x++; endforeach; ?>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2"><label for="triggerdoor">triggerdoor</label></th>
                            <th colspan="2"><label for="triggertype">triggertype</label></th>
                            <th colspan="2"><label for="door_param">param</label></th>
                            <th colspan="2"><label for="invert_state">invert</label></th>
                            <th colspan="2"><label for="incline">incline</label></th>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="text" size="7" id="triggerdoor" name="triggerdoor"
                                                   value="<?= $triggerdoor ?? "" ?>"></td>
                            <td colspan="2"><input type="text" size="7" id="triggertype" name="triggertype"
                                                   value="<?= $triggertype ?? "" ?>"></td>
                            <td colspan="2"><input type="text" size="7" id="door_param" name="door_param"
                                                   value="<?= $door_param ?? "" ?>"></td>
                            <td colspan="2"><input type="text" size="7" id="invert_state" name="invert_state"
                                                   value="<?= $invert_state ?? "" ?>"></td>
                            <td colspan="2"><input type="text" size="7" id="incline" name="incline"
                                                   value="<?= $incline ?? "" ?>"></td>
                        </tr>
                        <tr>
                            <th colspan="2"><label for="close_time">close_time</label></th>
                            <th colspan="2"><label for="size">size</label></th>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="text" size="7" id="close_time" name="close_time"
                                                   value="<?= $close_time ?? "" ?>"></td>
                            <td colspan="2"><input type="text" size="7" id="size" name="size"
                                                   value="<?= $size ?? "" ?>"></td>
                        </tr>
                    </table>
                </fieldset>
            </div>
            <div style="padding-bottom:20px;">
                <fieldset>
                    <legend>Access Control</legend>
                    <table style="width: 100%; border-spacing: 20px;">
                        <tr>
                            <th colspan="2"><label for="nokeyring">nokeyring</label></th>
                            <th colspan="2"><label for="lockpick">lockpick</label></th>
                            <th colspan="2"><label for="keyitem">key item id</label></th>
                            <th colspan="2"><label for="altkeyitem">alt key item id</label></th>
                        </tr>
                        <tr>
                            <td colspan="2"><select class="left" id="nokeyring" name="nokeyring">
                                    <?php foreach ($yesno as $k => $v): ?>
                                        <option value="<?= $k ?>"<?php echo (isset($nokeyring) && $k == $nokeyring) ? " selected" : "" ?>><?= $v ?></option>
                                        <?php $x++; endforeach; ?>
                            </td>
                            <td colspan="2"><input type="text" size="7" id="lockpick" name="lockpick"
                                                   value="<?= $lockpick ?? "" ?>"></td>
                            <td colspan="2"><input type="text" size="7" id="keyitem" name="keyitem"
                                                   value="<?= $keyitem ?? "" ?>">
                            </td>
                            <td colspan="2"><input type="text" size="7" id="altkeyitem" name="altkeyitem"
                                                   value="<?= $altkeyitem ?? "" ?>"></td>
                        </tr>
                    </table>
                </fieldset>
            </div>
            <div class="center">
                <input type="hidden" name="drid" value="<?= $id ?>">
                <input type="submit" value="Submit Changes">
            </div>
        </form>
    </div>
</div>