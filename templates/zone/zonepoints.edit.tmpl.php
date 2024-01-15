<div class="edit_form" style="width: 600px">
    <div class="edit_form_header">
        Edit Zone Point: <?= $id ?>
    </div>
    <div class="edit_form_content">
        <form name="graveyard" method="post"
              action=index.php?editor=zone&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&zpid=<?= $id ?>&action=14">
            <div style="margin-bottom: 20px;">
                <fieldset>
                    <legend>General Information</legend>
                    <table style="width: 100%;">
                        <tr>
                            <th><label for="zone">Zone</label></th>
                            <th><label for="number">Number</label></th>
                            <th><label for="client_version_mask">Client</label></th>
                        </tr>
                        <tr>
                            <td><input type="text" size="10" id="zone" name="zone" value="<?= $zone ?>"></td>
                            <td><input type="text" size="7" id="number" name="number" value="<?= $number ?? "" ?>"></td>
                            <td><input type="text" size="10" id="client_version_mask" name="client_version_mask"
                                       value="<?= $client_version_mask ?? "" ?>"></td>
                        </tr>
                    </table>
                </fieldset>
            </div>
            <div style="margin-bottom: 20px;">
                <fieldset>
                    <legend>Location</legend>
                    <table style="width: 100%;">
                        <tr>
                            <th><label for="x">X</label></th>
                            <th><label for="y">Y</label></th>
                            <th><label for="z_coord">Z</label></th>
                            <th><label for="heading">Heading</label></th>
                        </tr>
                        <tr>
                            <td style="padding-bottom: 20px;"><input type="text" size="7" id="x" name="x"
                                                                     value="<?= $x ?>"></td>
                            <td style="padding-bottom: 20px;"><input type="text" size="7" id="y" name="y"
                                                                     value="<?= $y ?? "" ?>"></td>
                            <td style="padding-bottom: 20px;"><input type="text" size="7" id="z_coord" name="z_coord"
                                                                     value="<?= $z ?>"></td>
                            <td style="padding-bottom: 20px;"><input type="text" size="7" id="heading" name="heading"
                                                                     value="<?= $heading ?? "" ?>"></td>
                        </tr>
                        <tr>
                            <th><label for="target_x">Target X</label></th>
                            <th><label for="target_y">Target Y</label></th>
                            <th><label for="target_z">Target Z</label></th>
                            <th><label for="target_heading">Tar Heading</label></th>
                            <th><label for="target_zone_id">Target Zone</label></th>
                        </tr>
                        <tr>
                            <td><input type="text" size="10" id="target_x" name="target_x"
                                       value="<?= $target_x ?? "" ?>">
                            </td>
                            <td><input type="text" size="7" id="target_y" name="target_y"
                                       value="<?= $target_y ?? "" ?>">
                            </td>
                            <td><input type="text" size="7" id="target_z" name="target_z"
                                       value="<?= $target_z ?? "" ?>">
                            </td>
                            <td><input type="text" size="7" id="target_heading" name="target_heading"
                                       value="<?= $target_heading ?? "" ?>"></td>
                            <td><input type="text" size="7" id="target_zone_id" name="target_zone_id"
                                       value="<?= $target_zone_id ?? "" ?>"></td>
                        </tr>
                    </table>
                </fieldset>
            </div>
            <div class="center">
                <input type="hidden" name="zpid" value="<?= $id ?>">
                <input type="submit" value="Submit Changes">
            </div>
        </form>
    </div>
</div>