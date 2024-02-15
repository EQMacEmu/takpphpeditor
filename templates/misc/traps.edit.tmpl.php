<div class="center">
    <table style="border: 1px solid black; background-color: #CCC;">
        <tr>
            <td colspan="3"><b>Legend:</b></td>
        </tr>
        <tr>
            <td style="text-align: right;"><b>Casting:</b></td>
            <td>&nbsp;</td>
            <td><i>Value1:</i> SpellID</td>
            <td style="text-align: left;"><i>Value2:</i> Not Used</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td style="text-align: right;"><b>Alarm:</b></td>
            <td>&nbsp;</td>
            <td><i>Value1:</i> Range</td>
            <td style="text-align: left;"><i>Value2:</i> 0: Aggro All 1: Aggro KOS only</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td style="text-align: right;"><b>Mystics:</b></td>
            <td>&nbsp;</td>
            <td><i>Value1:</i> NPCID</td>
            <td style="text-align: left;"><i>Value2:</i> Number of NPCs</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td style="text-align: right;"><b>Bandits:</b></td>
            <td>&nbsp;</td>
            <td><i>Value1:</i> NPCID</td>
            <td style="text-align: left;"><i>Value2:</i> Number of NPCs</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td style="text-align: right;"><b>Damage:</b></td>
            <td>&nbsp;</td>
            <td><i>Value1:</i> MinDmg</td>
            <td style="text-align: left;"><i>Value2:</i> MaxDmg</td>
            <td>&nbsp;</td>
        </tr>
    </table>
    <br/><br/>
</div>
<div class="edit_form" style="width: 750px">
    <div class="edit_form_header">
        Edit Trap: <?= $id ?>
    </div>
    <div class="edit_form_content">
        <form name="traps" method="post"
              action=index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=21">
            <table style="width: 100%;">
                <tr>
                    <th><label for="x_coord">x</label></th>
                    <th><label for="y_coord">y</label></th>
                    <th><label for="z_coord">z</label></th>
                    <th><label for="maxzdiff">maxzdiff</label></th>
                    <th><label for="radius">radius</label></th>
                    <th><label for="chance">chance</label></th>
                    <th><label for="triggered_number">triggered num</label></th>
                    <th><label for="group">group</label></th>
                </tr>
                <tr>
                    <td><input type="text" size="7" id="x_coord" name="x_coord" value="<?= $x ?? "" ?>"></td>
                    <td><input type="text" size="7" id="y_coord" name="y_coord" value="<?= $y ?? "" ?>"></td>
                    <td><input type="text" size="7" id="z_coord" name="z_coord" value="<?= $z ?? "" ?>"></td>
                    <td><input type="text" size="7" id="maxzdiff" name="maxzdiff" value="<?= $maxzdiff ?? "" ?>"></td>
                    <td><input type="text" size="7" id="radius" name="radius" value="<?= $radius ?? "" ?>"></td>
                    <td><input type="text" size="7" id="chance" name="chance" value="<?= $chance ?? "" ?>"></td>
                    <td><input type="text" size="7" id="triggered_number" name="triggered_number"
                               value="<?= $triggered_number ?? "" ?>"></td>
                    <td><input type="text" size="7" id="group" name="group" value="<?= $group ?? "" ?>"></td>
                </tr>
                <tr>
                    <th><label for="effectvalue">effectvalue</label></th>
                    <th><label for="effectvalue2">effectvalue2</label></th>
                    <th><label for="skill">skill</label></th>
                    <th><label for="level">level</label></th>
                    <th><label for="respawn_time">respawn</label></th>
                    <th><label for="respawn_var">variance</label></th>
                    <th><label for="effect">effect</label></th>
                </tr>
                <tr>
                    <td><input type="text" size="7" id="effectvalue" name="effectvalue"
                               value="<?= $effectvalue ?? "" ?>"></td>
                    <td><input type="text" size="7" id="effectvalue2" name="effectvalue2"
                               value="<?= $effectvalue2 ?? "" ?>"></td>
                    <td><input type="text" size="7" id="skill" name="skill" value="<?= $skill ?? "" ?>"></td>
                    <td><input type="text" size="7" id="level" name="level" value="<?= $level ?>"></td>
                    <td><input type="text" size="7" id="respawn_time" name="respawn_time"
                               value="<?= $respawn_time ?? "" ?>"></td>
                    <td><input type="text" size="7" id="respawn_var" name="respawn_var"
                               value="<?= $respawn_var ?? "" ?>"></td>
                    <td><select class="left" id="effect" name="effect">
                            <?php foreach ($traptype as $k => $v): ?>
                                <option value="<?= $k ?>"<?php echo (isset($effect) && $k == $effect) ? " selected" : "" ?>><?= $v ?></option>
                            <?php endforeach; ?>
                        </select></td>
                </tr>
				                <tr>
                    <th><label for="min_expansion">Min Expansion</label></th>
                    <th><label for="max_expansion">Max Expansion</label></th>
                    <th><label for="content_flags">Content Flags</label></th>
                    <th><label for="content_flags_disabled">Content Flags Disabled</label></th>
                </tr>
                <tr>
                    <td><input type="text" size="7" id="min_expansion" name="min_expansion" value="<?= $min_expansion ?? "" ?>"></td>
                    <td><input type="text" size="7" id="max_expansion" name="max_expansion" value="<?= $max_expansion ?? "" ?>"></td>
                    <td><input type="text" size="18" id="content_flags" name="content_flags" value="<?= $content_flags ?? "" ?>"></td>
                    <td><input type="text" size="18" id="content_flags_disabled" name="content_flags_disabled" value="<?= $content_flags_disabled ?>"></td>
                 </tr>
            </table>
            <table style="width: 100%;">
                <tr>
                    <th><label for="message">message</label></th>
                    <th><label for="despawn_when_triggered">despawn when triggered</label></th>
                    <th><label for="undetectable">undetectable</label></th>
                </tr>
                <tr>
                    <td><input type="text" size="75" id="message" name="message" value="<?= $message ?? "" ?>"></td>
                    <td><select class="left" id="despawn_when_triggered" name="despawn_when_triggered">
                            <?php foreach ($yesno as $k => $v): ?>
                                <option value="<?= $k ?>"<?php echo (isset($despawn_when_triggered) && $k == $despawn_when_triggered) ? " selected" : "" ?>><?= $v ?></option>
                                <?php $x++; endforeach; ?>
                    </td>
                    <td><select class="left" id="undetectable" name="undetectable">
                            <?php foreach ($yesno as $k => $v): ?>
                                <option value="<?= $k ?>"<?php echo (isset($undetectable) && $k == $undetectable) ? " selected" : "" ?>><?= $v ?></option>
                                <?php $x++; endforeach; ?>
                    </td>
                </tr>
            </table>
            <br><br>
            <div class="center">
                <input type="hidden" name="tid" value="<?= $id ?>">
                <input type="hidden" name="zone" value="<?= $currzone ?? "" ?>">
                <input type="submit" value="Submit Changes">
            </div>
        </form>
    </div>
</div>