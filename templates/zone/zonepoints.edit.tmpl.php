<div class="edit_form" style="width: 700px">
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
                            <td><input type="text" size="10" id="zone" name="zone" value="<?= $zone ?>" disabled></td>
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
                            <th><label for="z">Z</label></th>
                            <th><label for="heading">Heading</label></th>
                        </tr>
                        <tr>
                            <td style="padding-bottom: 20px;"><input type="text" size="7" id="x" name="x"
                                                                     value="<?= $x ?>"></td>
                            <td style="padding-bottom: 20px;"><input type="text" size="7" id="y" name="y"
                                                                     value="<?= $y ?? "" ?>"></td>
                            <td style="padding-bottom: 20px;"><input type="text" size="7" id="z" name="z"
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
			
			<div style="margin-bottom: 20px;">
                <fieldset>
                    <legend>Expansion and Content Flags</legend>
                    <table style="width: 100%;">
                        <tr>
                            <th><label for="min_expansion">Min Expansion</label></th>
                            <th><label for="max_expansion">Max Expansion</label></th>
                            <th><label for="content_flags">Content Flags</label></th>
                            <th><label for="content_flags_disabed">Content Flags Disabled</label></th>
                        </tr>
                        <tr>
                            <td><input type="text" size="7" id="min_expansion" name="min_expansion" value="<?= $min_expansion ?? "" ?>"></td>
                            <td><input type="text" size="7" id="max_expansion" name="max_expansion" value="<?= $max_expansion ?? "" ?>"></td>
                            <td><input type="text" size="20" id="content_flags" name="content_flags" value="<?= $content_flags ?? "" ?>"></td>
                            <td><input type="text" size="20" id="content_flags_disabed" name="content_flags_disabed" value="<?= $content_flags_disabed ?? "" ?>"></td>
                        </tr>					
                    </table>
                </fieldset>
            </div>

			 <div style="margin-bottom: 20px;">
                <fieldset>
                    <legend>Virtual Zonepoint</legend>
                    <table style="width: 100%;">
                        <tr>
                            <th><label for="is_virtual">Is Virtual</label></th>
                            <th><label for="height">Height</label></th>
                            <th><label for="width">Width</label></th>
                        </tr>
						<tr>
                            <td><select name="is_virtual"><option value="0"<?echo ($is_virtual == 0) ? " selected" : "";?>>No</option><option value="1"<?echo ($is_virtual == 1) ? " selected" : "";?>>Yes</option></select></td>
                            <td><input type="text" size="7" id="height" name="height" value="<?=$height?>">"></td>
                            <td><input type="text" size="7" id="width" name="width" value="<?=$width?>"></td>
						</tr>
                    </table>
                </fieldset>
            </div>					
					
            <div class="center">
                <input type="hidden" name="zpid" value="<?= $id ?>">
				<input type="hidden" name="zone" value="<?=$zone?>">
				<input type="submit" value="Update Zonepoint">&nbsp;&nbsp;
				<input type="button" value="Cancel" onClick="history.back();">
            </div>
        </form>
    </div>
</div>