<div class="edit_form" style="width: 700px">
    <div class="edit_form_header">
        Add Zone Point
    </div>

    <div class="edit_form_content">
        <form name="zonepoints" method="post"
              action=index.php?editor=zone&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=17">
            <div style="margin-bottom: 20px;">
                <fieldset>
                    <legend>General Information</legend>
                    <table style="width: 100%;">
                        <tr>
                            <th><label for="zpid">ID</label></th>
                            <th><label for="zone">Zone</label></th>
                            <th><label for="number">Number</label></th>
                            <th><label for="client_version_mask">Client</label></th>
                        </tr>
                        <tr>
                            <td><input type="text" size="7" id="zpid" name="zpid" value="<?= $suggestzpid ?? "" ?>">
                            </td>
                            <td><input type="text" size="10" id="zone" name="zone" value="<?= $currzone?>" disabled></td>
                            <td><input type="text" size="7" id="number" name="number" value="<?= $suggestnum ?? "" ?>">
                            </td>
                            <td><input type="text" size="10" id="client_version_mask" name="client_version_mask"
                                       value="4294967295"></td>
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
                            <td style="padding-bottom: 20px;"><input type="text" size="7" id="x" name="x" value="0"></td>
                            <td style="padding-bottom: 20px;"><input type="text" size="7" id="y" name="y" value="0"></td>
                            <td style="padding-bottom: 20px;"><input type="text" size="7" id="z" name="z" value="0"></td>
                            <td style="padding-bottom: 20px;"><input type="text" size="7" id="heading" name="heading" value="0"></td>
                        </tr>
                        <tr>
                            <th><label for="target_x">Target X</label></th>
                            <th><label for="target_y">Target Y</label></th>
                            <th><label for="target_z">Target Z</label></th>
                            <th><label for="target_heading">Tar Heading</label></th>
                            <th><label for="target_zone_id">Target Zone</label></th>
                        </tr>
                        <tr>
                            <td><input type="text" size="7" id="target_x" name="target_x" value="0"></td>
                            <td><input type="text" size="7" id="target_y" name="target_y" value="0"></td>
                            <td><input type="text" size="7" id="target_z" name="target_z" value="0"></td>
                            <td><input type="text" size="7" id="target_heading" name="target_heading" value="0"></td>
                            <td><input type="text" size="7" id="target_zone_id" name="target_zone_id"
                                       value="<?= $zid ?? "" ?>">
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </div>
			
			 <div style="margin-bottom: 20px;">
                <fieldset>
                    <legend>Expansion and Content Flagging</legend>
                    <table style="width: 100%;">
                        <tr>
                            <th><label for="min_expansion">Min Expansion</label></th>
                            <th><label for="max_expansion">Max Expansion</label></th>
                            <th><label for="content_flags">Content Flags</label></th>
                            <th><label for="content_flags_disabled">Content Flags Disabled</label></th>
                        </tr>
						<tr>
                            <td style="padding-bottom: 20px;"><input type="text" size="7" id="min_expansion" name="min_expansion" value="-1"></td>
                            <td style="padding-bottom: 20px;"><input type="text" size="7" id="max_expansion" name="max_expansion" value="-1"></td>
                            <td style="padding-bottom: 20px;"><input type="text" size="18" id="content_flags" name="content_flags" value=""></td>
                            <td style="padding-bottom: 20px;"><input type="text" size="18" id="content_flags_disabled" name="content_flags_disabled" value=""></td>
						
						</tr>
                    </table>
                </fieldset>
            </div>

			
            <div class="center">
                <input type="hidden" name="zone" value="<?=$currzone?>">
				<input type="submit" value="Add Zonepoint">&nbsp;&nbsp;
				<input type="button" value="Cancel" onClick="history.back();">
            </div>
        </form>
    </div>
</div>