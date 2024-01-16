<div class="edit_form" style="width: 530px">
    <div class="edit_form_header">
        Add a Grid Entry <?= $pathgrid ?>
    </div>
    <div class="edit_form_content">
        <form name="gridentry" method="post"
              action="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&spid=<?= $spid ?>&pathgrid=<?= $pathgrid ?>&action=28">
            <div style="margin-bottom: 20px;">
                <fieldset>
                    <legend>General Settings</legend>
                    <table style="width: 100%;">
                        <tr>
                            <th><label for="number">Number:</label></th>
                            <th><label for="pause">Pause:</label></th>
                            <th><label for="centerpoint">Centerpoint:</label></th>
                        </tr>
                        <tr>
                            <td style="padding-bottom: 20px;"><input type="text" size="7" id="number" name="number"
                                                                     value="<?= $suggestednum ?? "" ?>"></td>
                            <td style="padding-bottom: 20px;"><input type="text" size="7" id="pause" name="pause"
                                                                     value="<?php echo $pause ?? 0; ?>"></td>
                            <td style="padding-bottom: 20px; text-align: left; width: 33%;">
                                <select id="centerpoint" name="centerpoint">
                                    <?php foreach ($yesno as $k => $v): ?>
                                        <option value="<?= $k ?>"<?php echo (isset($centerpoint) && $k == $centerpoint) ? " selected" : "" ?>><?= $v ?>
                                            &nbsp;&nbsp;
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </div>
            <div style="margin-bottom: 20px;">
                <fieldset>
                    <legend>Coordinates</legend>
                    <table style="width: 100%;">
                        <tr>
                            <th><label for="x_coord">X:</label></th>
                            <th><label for="y_coord">Y:</label></th>
                            <th><label for="z_coord">Z:</label></th>
                            <th><label for="heading">Heading:</label></th>
                        </tr>
                        <tr>
                            <td><input type="text" size="7" id="x_coord" name="x_coord"
                                       value="<?php echo $x_coord ?? 0; ?>">
                            </td>
                            <td><input type="text" size="7" id="y_coord" name="y_coord"
                                       value="<?php echo $y_coord ?? 0; ?>">
                            </td>
                            <td><input type="text" size="7" id="z_coord" name="z_coord"
                                       value="<?php echo $z_coord ?? 0; ?>">
                            </td>
                            <td><input type="text" size="7" id="heading" name="heading"
                                       value="<?php echo $heading ?? -1; ?>">
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </div>
            <div class="center">
                <input type="hidden" name="pathgrid" value="<?= $pathgrid ?>">
                <input type="hidden" name="zoneid" value="<?= $zid ?? "" ?>">
                <input type="submit" value="Submit Changes">
            </div>
        </form>
    </div>
</div>
