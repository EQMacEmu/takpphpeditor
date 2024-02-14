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
        Add Trap
    </div>

    <div class="edit_form_content">
        <form name="traps" method="post"
              action=index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=24">
            <div style="padding-bottom: 20px;">
                <fieldset>
                    <legend>General Information</legend>
                    <table style="width: 100%;">
                        <tr>
                            <th><label for="tid">id</label></th>
                            <th><label for="skill">skill</label></th>
                            <th><label for="level">level</label></th>
                        </tr>
                        <tr>
                            <td style="padding-bottom: 10px;"><input type="text" size="7" id="tid" name="tid"
                                                                     value="<?= $suggesttid ?? "" ?>"></td>
                            <td style="padding-bottom: 10px;"><input type="text" size="7" id="skill" name="skill"
                                                                     value="1"></td>
                            <td style="padding-bottom: 10px;"><input type="text" size="7" id="level" name="level"
                                                                     value="1"></td>
                        </tr>
                    </table>
                </fieldset>
            </div>
            <div style="padding-bottom: 20px;">
                <fieldset>
                    <legend>Trap Placement</legend>
                    <table style="width: 100%;">
                        <tr>
                            <th><label for="zone">zone</label></th>
                            <th><label for="x_coord">x</label></th>
                            <th><label for="y_coord">y</label></th>
                            <th><label for="z_coord">z</label></th>
                        </tr>
                        <tr>
                            <td style="padding-bottom: 10px;"><input type="text" size="10" id="zone" name="zone"
                                                                     value="<?= $currzone ?? "" ?>"></td>
                            <td style="padding-bottom: 10px;"><input type="text" size="7" id="x_coord" name="x_coord"
                                                                     value="0"></td>
                            <td style="padding-bottom: 10px;"><input type="text" size="7" id="y_coord" name="y_coord"
                                                                     value="0"></td>
                            <td style="padding-bottom: 10px;"><input type="text" size="7" id="z_coord" name="z_coord"
                                                                     value="0"></td>
                        </tr>
                        <tr>
                            <th><label for="maxzdiff">maxzdiff</label></th>
                            <th><label for="radius">radius</label></th>
                            <th><label for="triggered_number">triggered num</label></th>
                            <th><label for="group">group</label></th>
                        </tr>
                        <tr>
                            <td style="padding-bottom: 10px;"><input type="text" size="7" id="maxzdiff" name="maxzdiff"
                                                                     value="10"></td>
                            <td style="padding-bottom: 10px;"><input type="text" size="7" id="radius" name="radius"
                                                                     value="25"></td>
                            <td style="padding-bottom: 10px;"><input type="text" size="7" id="triggered_number"
                                                                     name="triggered_number" value="0">
                            </td>
                            <td style="padding-bottom: 10px;"><input type="text" size="7" id="group" name="group"
                                                                     value="0"></td>
                        </tr>
                    </table>
                </fieldset>
            </div>
            <div style="padding-bottom: 20px;">
                <fieldset>
                    <legend>Effects</legend>
                    <table style="width: 100%;">
                        <tr>

                            <th><label for="effect">effect</label></th>
                            <th><label for="effectvalue">effectvalue</label></th>
                            <th><label for="effectvalue2">effectvalue2</label></th>
                            <th colspan="2"><label for="undetectable">undetectable</label></th>
                        </tr>
                        <tr>
                            <td style="padding-bottom: 10px;"><select class="left" id="effect" name="effect">
                                    <?php foreach ($traptype as $k => $v): ?>
                                        <option value="<?= $k ?>"<?php echo (isset($effect) && $k == $effect) ? " selected" : "" ?>><?= $v ?></option>
                                        <?php $x++; endforeach; ?>
                            </td>
                            <td style="padding-bottom: 10px;"><input type="text" size="7" id="effectvalue"
                                                                     name="effectvalue" value="0"></td>
                            <td style="padding-bottom: 10px;"><input type="text" size="10" id="effectvalue2"
                                                                     name="effectvalue2" value="0"></td>
                            <td style="padding-bottom: 10px;" colspan="2"><select class="left" id="undetectable"
                                                                                  name="undetectable">
                                    <?php foreach ($yesno as $k => $v): ?>
                                        <option value="<?= $k ?>"<?php echo (isset($undetectable) && $k == $undetectable) ? " selected" : "" ?>><?= $v ?></option>
                                        <?php $x++; endforeach; ?>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </div>
            <div style="padding-bottom: 20px;">
                <fieldset>
                    <legend>Spawn Information</legend>
                    <table style="width: 100%;">
                        <tr>
                            <th><label for="chance">chance</label></th>
                            <th><label for="respawn_var">variance</label></th>
                            <th><label for="respawn_time">respawn</label></th>
                            <th colspan="2"><label for="despawn_when_triggered">despawn when triggered</label></th>
                        </tr>
                        <tr>
                            <td style="padding-bottom: 10px;"><input type="text" size="7" id="chance" name="chance"
                                                                     value="100"></td>
                            <td style="padding-bottom: 10px;"><input type="text" size="7" id="respawn_var"
                                                                     name="respawn_var" value="0"></td>
                            <td style="padding-bottom: 10px;"><input type="text" size="7" id="respawn_time"
                                                                     name="respawn_time" value="600"></td>
                            <td style="padding-bottom: 10px;" colspan="2"><select class="left"
                                                                                  id="despawn_when_triggered"
                                                                                  name="despawn_when_triggered">
                                    <?php foreach ($yesno as $k => $v): ?>
                                        <option value="<?= $k ?>"<?php echo (isset($despawn_when_triggered) && $k == $despawn_when_triggered) ? " selected" : "" ?>><?= $v ?></option>
                                        <?php $x++; endforeach; ?>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </div>
			            <div style="padding-bottom: 20px;">
                <fieldset>
                    <legend>Trap Expansion and Content Flags</legend>
                    <table style="width: 100%;">
                        <tr>
                            <th><label for="min_expansion">Min Expansion</label></th>
                            <th><label for="max_expansion">Max Expansion</label></th>
                            <th><label for="content_flags">Content Flags</label></th>
                           <th><label for="content_flags_disabled">Content Flags Disabled</label></th>
                        </tr>
                        <tr>
                            <td style="padding-bottom: 10px;"><input type="text" size="7" id="min_expansion" name="min_expansion" value="-1"></td>
                            <td style="padding-bottom: 10px;"><input type="text" size="7" id="max_expansion" name="max_expansion" value="-1"></td>
                            <td style="padding-bottom: 10px;"><input type="text" size="15" id="content_flags" name="content_flags" value=""></td>
                            <td style="padding-bottom: 10px;"><input type="text" size="15" id="content_flags_disabled" name="content_flags_disabled" value=""></td>
                        </tr>
                    </table>
                </fieldset>
            </div>
            <div style="padding-bottom: 20px;">
                <fieldset>
                    <legend>Trap Message</legend>
                    <table style="width: 100%;">
                        <tr>
                            <th><label for="message">message</label></th>
                        </tr>
                        <tr>
                            <td style="padding: 10px;"><input type="text" size="80" id="message" name="message"
                                                              value=""></td>
                        </tr>
                    </table>
                </fieldset>
            </div>
            <div class="center">
                <input type="submit" value="Submit Changes">
            </div>
        </form>
    </div>
</div>