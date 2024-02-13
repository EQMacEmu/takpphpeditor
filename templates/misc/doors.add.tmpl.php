<div class="edit_form" style="width: 750px">
    <div class="edit_form_header">
        Add Door
    </div>
    <div class="edit_form_content">
        <form name="door" method="post"
              action=index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=40">
            <div style="padding-bottom:20px;">
                <fieldset>
                    <legend>Identity</legend>
                    <table style="width: 100%; border-spacing: 20px;">
                        <tr>
                            <th colspan="2"><label for="name">Door Name</label></th>
                            <th colspan="2"><label for="drid">suggested id</label></th>
                            <th colspan="2"><label for="doorid">suggested doorid</label></th>
                            <th colspan="2"><label for="client_version_mask">client version mask</label></th>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding-top: 5px;"><input type="text" size="15" id="name" name="name" value=""></td>
                            <td colspan="2" style="padding-top: 5px;"><input type="text" size="7" id="drid" name="drid" value="<?= $suggestdrid ?? "" ?>"></td>
                            <td colspan="2" style="padding-top: 5px;"><input type="text" size="7" id="doorid" name="doorid" value="<?= $suggestdoorid ?? "" ?>"></td>
                            <td colspan="2" style="padding-top: 5px;"><input type="text" size="10" id="client_version_mask" name="client_version_mask" value="4294967295"></td>
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
                            <td colspan="2" style="padding-top: 5px;"><input type="text" size="15" id="curr_zone" name="curr_zone" disabled value="<?= $currzone ?? "" ?>"></td>
                            <td colspan="2" style="padding-top: 5px;"><input type="text" size="7" id="pos_x" name="pos_x" value="0"></td>
                            <td colspan="2" style="padding-top: 5px;"><input type="text" size="7" id="pos_y" name="pos_y" value="0"></td>
                            <td colspan="2" style="padding-top: 5px;"><input type="text" size="7" id="pos_z" name="pos_z" value="0"></td>
                            <td colspan="2" style="padding-top: 5px;"><input type="text" size="7" id="heading" name="heading" value="0"></td>
                        </tr>
                        <tr>
                            <th colspan="2"><label for="dest_zone">dest zone (shortname)</label></th>
                            <th colspan="2"><label for="dest_x">dest x</label></th>
                            <th colspan="2"><label for="dest_y">dest y</label></th>
                            <th colspan="2"><label for="dest_z">dest z</label></th>
                            <th colspan="2"><label for="dest_heading">dest heading</label></th>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="text" size="15" id="dest_zone" name="dest_zone" value="NONE"></td>
                            <td colspan="2"><input type="text" size="7" id="dest_x" name="dest_x" value="0"></td>
                            <td colspan="2"><input type="text" size="7" id="dest_y" name="dest_y" value="0"></td>
                            <td colspan="2"><input type="text" size="7" id="dest_z" name="dest_z" value="0"></td>
                            <td><input type="text" size="7" id="dest_heading" name="dest_heading" value="0"></td>
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
                            <td colspan="2" style="padding-top: 5px;"><input type="text" size="7" id="opentype" name="opentype" value="0"></td>
                            <td colspan="2"><input type="text" size="7" id="doorisopen" name="doorisopen" value="0"></td>
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
                            <td colspan="2"><input type="text" size="7" id="triggerdoor" name="triggerdoor" value="0"></td>
                            <td colspan="2"><input type="text" size="7" id="triggertype" name="triggertype" value="0"></td>
                            <td colspan="2"><input type="text" size="7" id="door_param" name="door_param" value="0"></td>
                            <td colspan="2"><input type="text" size="7" id="invert_state" name="invert_state" value="0"></td>
                            <td colspan="2"><input type="text" size="7" id="incline" name="incline" value="0"></td>
                        </tr>
                        <tr>
                            <th colspan="2"><label for="close_time">close_time</label></th>
                            <th colspan="2"><label for="size">size</label></th>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="text" size="7" id="close_time" name="close_time" value="5"></td>
                            <td colspan="2" style="padding-top: 5px;"><input type="text" size="7" id="size" name="size" value="100"></td>
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
                            <td colspan="2" style="padding-top: 5px;"><input type="text" size="7" id="lockpick" name="lockpick" value="0"></td>
                            <td colspan="2"><input type="text" size="7" id="keyitem" name="keyitem" value="0"></td>
                            <td colspan="2"><input type="text" size="7" id="altkeyitem" name="altkeyitem" value="0"></td>
                        </tr>
						
                    </table>
                </fieldset>
            </div>
           <div style="padding-bottom:20px;">
				<fieldset>
					<legend>Expansion and Content Flags</legend>
					<table style="width: 100%; border-spacing: 20px;">
						<td>
							<strong>Min Expansion</strong><br>
							<input type="text" size="7" name="min_expansion" value="-1">
						</td>
						<td>
							<strong>Max Expansion</strong><br>
							<input type="text" size="7" name="max_expansion" value="-1">
						</td>
						<td colspan="2">
							<strong>Content Flags</strong><br>
							<input type="text" size="25" name="content_flags" value="">
						</td>
						<td colspan="2">
							<strong>Content Flags Disabled</strong><br>
							<input type="text" size="25" name="content_flags_disabled" value="">
						</td>
					 </table>
				</fieldset>
		   </div>
            <div class="center">
                <input type="submit" value="Submit Changes">
            </div>
        </form>
    </div>
</div>