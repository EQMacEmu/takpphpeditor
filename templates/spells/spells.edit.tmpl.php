<form name="spell_edit" method="post" action="index.php?editor=spells&id=<?= $id ?? ""; ?>&action=6">
    <div class="edit_form">
        <div class="edit_form_header">
            Edit Spell <?= $id ?? ""; ?> - <?= $spellname ?? ""; ?> (<a
                    href="https://lucy.allakhazam.com/spell.html?id=<?= $id ?? ""; ?>" target="_blank">Lucy</a>)
            <div style="float:right;">
                <a href="index.php?editor=spells&id=<?= $id ?? ""; ?>&action=7"
                   onClick="return confirm('Really Copy Spell <?= $id ?? ""; ?>?');"><img src="images/last.gif"
                                                                                          style="border:0;"
                                                                                          title="Copy this Spell"
                                                                                          alt="copy spell"></a>
                <a href="index.php?editor=spells&id=<?= $id ?? ""; ?>&action=5"
                   onClick="return confirm('Really Delete Spell <?= $id ?? ""; ?>?');"><img src="images/table.gif"
                                                                                            style="border:0;"
                                                                                            title="Delete this Spell"
                                                                                            alt="delete spell"></a>
            </div>
        </div>
        <div class="edit_form_content">
            <div class="center">
                <fieldset style="text-align: left;">
                    <legend style="font-weight: bold; font-size: large">General</legend>
                    <input type="hidden" name="id" value="<?= $id ?? ""; ?>">
                    <table style="width: 100%; border: 0;" cellpadding="3" cellspacing="0">
                        <tr>
                            <td style="width:50%;padding:3px;border-spacing:0;">
                                <label for="name">Name:</label><br/>
                                <input type="text" name="name" id="name" size="40" value="<?= $spellname ?? ""; ?>">
                            </td>
                            <td>
                                <label for="teleport_zone">Teleport Zone / Pet Type:</label><br/>
                                <input type="text" name="teleport_zone" id="teleport_zone" size="40" value="<?= $teleport_zone ?? ""; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td style="width:50%;padding:3px;border-spacing:0;">
                                <label for="you_cast">You Cast Message:</label><br/>
                                <input type="text" name="you_cast" id="you_cast" size="40" value="<?= $you_cast ?? ""; ?>">
                            </td>
                            <td><label for="other_casts">Other Casts Message:</label><br/>
                                <input type="text" name="other_casts" id="other_casts" size="40" value="<?= $other_casts ?? ""; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td style="width:50%"><label for="cast_on_you">Cast on You Message:</label><br/><input
                                        type="text" name="cast_on_you" id="cast_on_you" size="40"
                                        value="<?= $cast_on_you ?? ""; ?>"></td>
                            <td><label for="cast_on_other">Cast on Other Message:<br/><input type="text"
                                                                                             name="cast_on_other"
                                                                                             size="40"
                                                                                             value="<?= $cast_on_other ?? ""; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td style="width:50%"><label for="spell_fades">Spell Fades Message:</label><br/><input type="text"
                                                                                                             name="spell_fades"
                                                                                                             id="spell_fades"
                                                                                                             size="40"
                                                                                                             value="<?= $spell_fades ?? ""; ?>">
                            </td>
                            <td><label for="spell_category">Spell Category:</label><br/>
                                <select name="spell_category" id="spell_category" style="width:220px;">
                                    <?php if (isset($spellgroups)) {
                                        foreach ($spellgroups as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($spell_category) && $k == $spell_category) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select><label for="spcat"></label><input type="text" name="spcat" id="spcat" size="3"
                                                                           value="<?= $spell_category ?? ""; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><label for="skill">Skill:</label><br/>
                                <select name="skill" id="skill" style="width:265px;">
                                    <?php if (isset($skills)) {
                                        foreach ($skills as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($skill) && $k == $skill) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select>
                            </td>
                            <td><label for="targettype">Target:</label><br/>
                                <select name="targettype" id="targettype" style="width:265px;">
                                    <?php if (isset($targets)) {
                                        foreach ($targets as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($targettype) && $k == $targettype) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="zonetype">Zone Type:</label><br/>
                                <select name="zonetype" id="zonetype" style="width:265px;">
                                    <?php if (isset($zonetypes)) {
                                        foreach ($zonetypes as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($zonetype) && $k == $zonetype) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select>
                            </td>
                            <td><label for="EnvironmentType">Environment Type:</label><br/>
                                <select name="EnvironmentType" id="EnvironmentType" style="width:265px;">
                                    <?php if (isset($envtypes)) {
                                        foreach ($envtypes as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($EnvironmentType) && $k == $EnvironmentType) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="LightType">Light Type:</label><br/>
                                <select name="LightType" id="LightType" style="width:265px;">
                                    <?php if (isset($lighttypes)) {
                                        foreach ($lighttypes as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($LightType) && $k == $LightType) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select>
                            </td>
                            <td><label for="resisttype">Resist Type:</label><br/>
                                <select name="resisttype" id="resisttype" style="width:265px;">
                                    <?php if (isset($resisttypes)) {
                                        foreach ($resisttypes as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($resisttype) && $k == $resisttype) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="goodEffect">Effect Type:</label><br/>
                                <select name="goodEffect" id="goodEffect" style="width:265px;">
                                    <?php if (isset($effecttypes)) {
                                        foreach ($effecttypes as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($goodEffect) && $k == $goodEffect) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select>
                            </td>
                            <td><label for="Activated">Activated:</label><br/>
                                <select name="Activated" id="Activated" style="width:265px;">
                                    <?php if (isset($acttypes)) {
                                        foreach ($acttypes as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($Activated) && $k == $Activated) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="TimeOfDay">Time of Day:</label><br/>
                                <select name="TimeOfDay" id="TimeOfDay" style="width:100px;">
                                    <?php if (isset($daytimes)) {
                                        foreach ($daytimes as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($TimeOfDay) && $k == $TimeOfDay) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select>
                            </td>
                            <td><label for="TravelType">Travel Type:</label><br/>
                                <select name="TravelType" id="TravelType" style="width:265px;">
                                    <?php if (isset($traveltypes)) {
                                        foreach ($traveltypes as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($TravelType) && $k == $TravelType) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="buffduration">Buff Duration:<br/><input type="text" name="buffduration"
                                                                                    size="10"
                                                                                    value="<?= $buffduration ?? ""; ?>">
                            </td>
                            <td><label for="buffdurationformula">Buff Duration Formula:</label><br/>
                                <select name="buffdurationformula" id="buffdurationformula" style="width:265px;">
                                    <?php if (isset($buffformulas)) {
                                        foreach ($buffformulas as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($buffdurationformula) && $k == $buffdurationformula) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table style="border:0; width: 100%">
                                    <tr>
                                        <td style="border-spacing:0;padding:2px;">
                                            <input type="checkbox" name="dot_stacking_exempt"
                                                   id="dot_stacking_exempt" <?php echo (isset($dot_stacking_exempt) && $dot_stacking_exempt) ? "checked" : "" ?>>
                                            <label for="dot_stacking_exempt"> DoT Stacking Exempt</label>
                                        </td>
                                        <td style="border-spacing:0;padding:2px;">
                                            <input type="checkbox" name="deleteable"
                                                   id="deleteable" <?php echo (isset($deleteable) && $deleteable) ? "checked" : "" ?>>
                                            <label for="deleteable"> Deleteable</label>
                                        </td>
                                        <td style="border-spacing:0;padding:2px;">
                                            <input type="checkbox" name="uninterruptable"
                                                   id="uninterruptable" <?php echo (isset($uninterruptable) && $uninterruptable) ? "checked" : "" ?>>
                                            <label for="uninterruptable"> Uninterruptable</label>
                                        </td>
                                        <td style="border-spacing:0;padding:2px;">
                                            <input type="checkbox" name="nodispell"
                                                   id="nodispell" <?php echo (isset($nodispell) && $nodispell) ? "checked" : "" ?>>
                                            <label for="nodispell"> No Dispell</label>
                                        </td>
                                        <td style="border-spacing:0;padding:2px;">
                                            <input type="checkbox" name="can_mgb"
                                                   id="can_mgb" <?php echo (isset($can_mgb) && $can_mgb) ? "checked" : "" ?>>
                                            <label for="can_mgb"> Can MGB</label>
                                        </td>
                                        <td style="border-spacing:0;padding:2px;">
                                            <input type="checkbox" name="short_buff_box"
                                                   id="short_buff_box" <?php echo (isset($short_buff_box) && $short_buff_box) ? "checked" : "" ?>>
                                            <label for="short_buff_box"> Short Buff Box</label>
                                        </td>
                                        <td style="border-spacing:0;padding:2px;">
                                            <input type="checkbox" name="disabled"
                                                   id="disabled" <?php echo (isset($disabled) && $disabled) ? "checked" : "" ?>><label
                                                    for="disabled"> Disabled</label>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table style="border:0; width:100%;">
                                    <tr>
                                        <td style="width:16%;border-spacing:0;padding:2px;"><label for="icon">Old
                                                Icon:</label><br/><input type="text" name="icon" id="icon"
                                                                         value="<?= $icon ?? ""; ?>" size="6"></td>
                                        <td style="width:17%;border-spacing:0;padding:2px;"><label for="new_icon">New
                                                Icon:</label><br/><input type="text" name="new_icon" id="new_icon"
                                                                         value="<?= $new_icon ?? ""; ?>" size="6"></td>
                                        <td style="width:17%;border-spacing:0;padding:2px;"><label for="memicon">Mem
                                                Icon:</label><br/><input type="text" name="memicon" id="memicon"
                                                                         value="<?= $memicon ?? ""; ?>" size="6"></td>
                                        <td style="width:16%;border-spacing:0;padding:2px;"><label for="spellanim">Spell
                                                Anim:</label><br/><input type="text" name="spellanim" id="spellanim"
                                                                         value="<?= $spellanim ?? ""; ?>" size="6"></td>
                                        <td style="width:17%;border-spacing:0;padding:2px;"><label for="CastingAnim">Casting
                                                Anim:</label><br/><input type="text" name="CastingAnim" id="CastingAnim"
                                                                         value="<?= $CastingAnim ?? ""; ?>" size="6">
                                        </td>
                                        <td style="width:17%;border-spacing:0;padding:2px;"><label for="TargetAnim">Target
                                                Anim:</label><br/><input type="text" name="TargetAnim" id="TargetAnim"
                                                                         value="<?= $TargetAnim ?? ""; ?>" size="6">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:17%;border-spacing:0;padding:2px;"><label
                                                    for="SpellAffectIndex">Spell Affect Index:</label><br/><input
                                                    type="text" name="SpellAffectIndex" id="SpellAffectIndex"
                                                    value="<?= $SpellAffectIndex ?? ""; ?>" size="6"></td>
                                        <td style="width:16%;border-spacing:0;padding:2px;"><label
                                                    for="use_persistent_particles">Persistent
                                                Particles:</label><br/><input type="text"
                                                                              name="use_persistent_particles"
                                                                              id="use_persistent_particles"
                                                                              value="<?= $use_persistent_particles ?? ""; ?>"
                                                                              size="6"></td>
                                        <td style="width:16%;border-spacing:0;padding:2px;"><label for="RecourseLink">Recourse
                                                Link:</label><br/><input type="text" name="RecourseLink"
                                                                         id="RecourseLink"
                                                                         value="<?= $RecourseLink ?? ""; ?>" size="6">
                                        </td>
                                        <td style="width:16%;border-spacing:0;padding:2px;"><label
                                                    for="small_targets_only">Small Targets:</label><br/><input
                                                    type="text" name="small_targets_only" id="small_targets_only"
                                                    value="<?= $small_targets_only ?? ""; ?>" size="6"></td>
                                        <td style="width:17%;border-spacing:0;padding:2px;"><label for="npc_no_cast">NPC
                                                No Cast:</label><br/><input type="text" name="npc_no_cast"
                                                                            id="npc_no_cast"
                                                                            value="<?= $npc_no_cast ?? ""; ?>" size="6">
                                        </td>
                                        <td style="width:17%;border-spacing:0;padding:2px;">&nbsp;</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table style="border:0; width:100%;">
                                    <tr>
                                        <td style="width:25%;border-spacing:0;padding:2px;"><label for="descnum">Desc
                                                Num:</label><br/><input type="text" name="descnum" id="descnum"
                                                                        value="<?= $descnum ?? ""; ?>" size="6"></td>
                                        <td style="width:25%;border-spacing:0;padding:2px;"><label for="typedescnum">Type
                                                Desc Num:</label><br/><input type="text" name="typedescnum"
                                                                             id="typedescnum"
                                                                             value="<?= $typedescnum ?? ""; ?>"
                                                                             size="6"></td>
                                        <td style="width:25%;border-spacing:0;padding:2px;"><label for="effectdescnum">Effect
                                                Desc Num:</label><br/><input type="text" name="effectdescnum"
                                                                             id="effectdescnum"
                                                                             value="<?= $effectdescnum ?? ""; ?>"
                                                                             size="6"></td>
                                        <td style="width:25%;border-spacing:0;padding:2px;"><label for="effectdescnum2">Effect
                                                Desc Num2:</label><br/><input type="text" name="effectdescnum2"
                                                                              id="effectdescnum2"
                                                                              value="<?= $effectdescnum2 ?? ""; ?>"
                                                                              size="6"></td>
                                    </tr>
                                </table>
                                <br>
                            </td>
                        </tr>
                    </table>
                    <table style="border:0; width: 100%;">
                        <tr>
                            <td style="border-spacing:0;padding:2px;" colspan="3">
                                <label for="npc_category">NPC Category:</label><br/>
                                <select name="npc_category" id="npc_category" style="width:265px;">
                                    <?php if (isset($npccats)) {
                                        foreach ($npccats as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($npc_category) && $k == $npc_category) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select>
                            </td>
                            <td style="border-spacing:0;padding:2px;">
                                <label for="npc_usefulness">NPC Usefulness:</label><br/>
                                <input type="text"
                                       name="npc_usefulness"
                                       id="npc_usefulness"
                                       value="<?= $npc_usefulness ?? ""; ?>"
                                       size="6">
                            </td>
                        </tr>
                    </table>
                    <br>
                    <table style="border:0; width: 100%;">
                        <tr>
                            <td style="padding:2px;border-spacing:0;">
                                <label for="no_partial_resist">No Partial Resist:</label><br/>
                                <select name="no_partial_resist" id="no_partial_resist" style="width:80px;">
                                    <option value="-1"<?php echo (isset($no_partial_resist) && $no_partial_resist == -1) ? " selected" : ""; ?>>
                                        -1
                                    </option>
                                    <option value="0"<?php echo (isset($no_partial_resist) && $no_partial_resist == 0) ? " selected" : ""; ?>>
                                        0
                                    </option>
                                    <option value="1"<?php echo (isset($no_partial_resist) && $no_partial_resist == 1) ? " selected" : ""; ?>>
                                        1
                                    </option>
                                </select>
                            </td>
                            <td style="padding:2px;border-spacing:0;">
                                <label for="npc_no_los">NPC No LoS:</label><br/>
                                <select name="npc_no_los" id="npc_no_los" style="width:80px;">
                                    <option value="-1"<?php echo (isset($npc_no_los) && $npc_no_los == -1) ? " selected" : ""; ?>>
                                        -1
                                    </option>
                                    <option value="0"<?php echo (isset($npc_no_los) && $npc_no_los == 0) ? " selected" : ""; ?>>
                                        0
                                    </option>
                                    <option value="1"<?php echo (isset($npc_no_los) && $npc_no_los == 1) ? " selected" : ""; ?>>
                                        1
                                    </option>
                                </select>
                            </td>
                            <td style="padding:2px;border-spacing:0;">
                                <label for="IsDiscipline">Is Discipline:</label><br/>
                                <select name="IsDiscipline" id="IsDiscipline" style="width:80px;">
                                    <option value="-1"<?php echo (isset($IsDiscipline) && $IsDiscipline == -1) ? " selected" : ""; ?>>
                                        -1
                                    </option>
                                    <option value="0"<?php echo (isset($IsDiscipline) && $IsDiscipline == 0) ? " selected" : ""; ?>>
                                        0
                                    </option>
                                    <option value="1"<?php echo (isset($IsDiscipline) && $IsDiscipline == 1) ? " selected" : ""; ?>>
                                        1
                                    </option>
                                </select>
                            </td>
                            <td style="padding:2px;border-spacing:0;">
                                <label for="suspendable">Suspendable:</label><br/>
                                <select name="suspendable" id="suspendable" style="width:80px;">
                                    <option value="-1"<?php echo (isset($suspendable) && $suspendable == -1) ? " selected" : ""; ?>>
                                        -1
                                    </option>
                                    <option value="0"<?php echo (isset($suspendable) && $suspendable == 0) ? " selected" : ""; ?>>
                                        0
                                    </option>
                                    <option value="1"<?php echo (isset($suspendable) && $suspendable == 1) ? " selected" : ""; ?>>
                                        1
                                    </option>
                                </select>
                            </td>
                            <td style="padding:2px;border-spacing:0;">
                                <label for="allow_spellscribe">Allow Scribe:</label><br/>
                                <select name="allow_spellscribe" id="allow_spellscribe" style="width:80px;">
                                    <option value="0"<?php echo (isset($allow_spellscribe) && $allow_spellscribe == 0) ? " selected" : ""; ?>>
                                        No
                                    </option>
                                    <option value="1"<?php echo (isset($allow_spellscribe) && $allow_spellscribe == 1) ? " selected" : ""; ?>>
                                        Yes
                                    </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:2px;border-spacing:0;">
                                <label for="reflectable">Reflectable:</label><br/>
                                <select name="reflectable" id="reflectable" style="width:80px;">
                                    <option value="-1"<?php echo (isset($reflectable) && $reflectable == -1) ? " selected" : ""; ?>>
                                        -1
                                    </option>
                                    <option value="0"<?php echo (isset($reflectable) && $reflectable == 0) ? " selected" : ""; ?>>
                                        0
                                    </option>
                                    <option value="1"<?php echo (isset($reflectable) && $reflectable == 1) ? " selected" : ""; ?>>
                                        1
                                    </option>
                                </select>
                            </td>
                            <td style="padding:2px;border-spacing:0;">
                                <label for="cast_not_standing">Not Standing:</label><br/>
                                <select name="cast_not_standing" id="cast_not_standing" style="width:80px;">
                                    <option value="-1"<?php echo (isset($cast_not_standing) && $cast_not_standing == -1) ? " selected" : ""; ?>>
                                        -1
                                    </option>
                                    <option value="0"<?php echo (isset($cast_not_standing) && $cast_not_standing == 0) ? " selected" : ""; ?>>
                                        0
                                    </option>
                                    <option value="1"<?php echo (isset($cast_not_standing) && $cast_not_standing == 1) ? " selected" : ""; ?>>
                                        1
                                    </option>
                                </select>
                            </td>
                            <td style="padding:2px;border-spacing:0;">
                                <label for="disallow_sit">Disallow Sit:</label><br/>
                                <select name="disallow_sit" id="disallow_sit" style="width:80px;">
                                    <option value="0"<?php echo (isset($disallow_sit) && $disallow_sit == 0) ? " selected" : ""; ?>>
                                        No
                                    </option>
                                    <option value="1"<?php echo (isset($disallow_sit) && $disallow_sit == 1) ? " selected" : ""; ?>>
                                        Yes
                                    </option>
                                </select>
                            </td>
                            <td style="padding:2px;border-spacing:0;">
                                <label for="allowrest">Allow Rest:</label><br/>
                                <select name="allowrest" id="allowrest" style="width:80px;">
                                    <option value="-1"<?php echo (isset($allowrest) && $allowrest == -1) ? " selected" : ""; ?>>
                                        -1
                                    </option>
                                    <option value="0"<?php echo (isset($allowrest) && $allowrest == 0) ? " selected" : ""; ?>>
                                        0
                                    </option>
                                    <option value="1"<?php echo (isset($allowrest) && $allowrest == 1) ? " selected" : ""; ?>>
                                        1
                                    </option>
                                </select>
                            </td>
                            <td style="padding:2px;border-spacing:0;">
                                <label for="wear_off_message">Wear-Off Message:</label><br/>
                                <select name="wear_off_message" id="wear_off_message" style="width:80px;">
                                    <option value="0"<?php echo (isset($wear_off_message) && $wear_off_message == 0) ? " selected" : ""; ?>>
                                        No
                                    </option>
                                    <option value="1"<?php echo (isset($wear_off_message) && $wear_off_message == 1) ? " selected" : ""; ?>>
                                        Yes
                                    </option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </fieldset>
                <br/>
                <fieldset style="text-align:left;">
                    <legend style="font-weight:bold; font-size:large;">Stats</legend>
                    <table style="width:100%; border:0;">
                        <tr>
                            <td style="padding:3px;border-spacing:0;"><label for="range">Range:</label><br/><input
                                        type="text" name="range" id="range" size="5" value="<?= $range ?? ""; ?>"></td>
                            <td style="padding:3px;border-spacing:0;"><label for="aoerange">AoE
                                    Range:</label><br/><input type="text" name="aoerange" id="aoerange" size="5"
                                                              value="<?= $aoerange ?? ""; ?>"></td>
                            <td style="padding:3px;border-spacing:0;"><label for="cast_time">Cast Time
                                    (ms):</label><br/><input type="text" name="cast_time" id="cast_time" size="5"
                                                             value="<?= $cast_time ?? ""; ?>"></td>
                            <td style="padding:3px;border-spacing:0;"><label for="recast_time">Recast Time (ms):</label><br/><input
                                        type="text" name="recast_time" id="recast_time" size="5"
                                        value="<?= $recast_time ?? ""; ?>"></td>
                            <td style="padding:3px;border-spacing:0;"><label for="recovery_time">Recovery Time
                                    (ms):</label><br/><input type="text" name="recovery_time" id="recovery_time"
                                                             size="5" value="<?= $recovery_time ?? ""; ?>"></td>
                            <td style="padding:3px;border-spacing:0;"><label for="AEDuration">AE Duration
                                    (ms):</label><br/><input type="text" name="AEDuration" id="AEDuration" size="5"
                                                             value="<?= $AEDuration ?? ""; ?>"></td>
                        </tr>
                        <tr>
                            <td style="padding:3px;border-spacing:0;"><label for="mana">Mana:</label><br/><input
                                        type="text" name="mana" id="mana" size="5" value="<?= $mana ?? ""; ?>"></td>
                            <td style="padding:3px;border-spacing:0;"><label for="pushback">Push
                                    Back:</label><br/><input type="text" name="pushback" id="pushback" size="5"
                                                             value="<?= $pushback ?? ""; ?>"></td>
                            <td style="padding:3px;border-spacing:0;"><label for="pushup">Push Up:</label><br/><input
                                        type="text" name="pushup" id="pushup" size="5" value="<?= $pushup ?? ""; ?>">
                            </td>
                            <td style="padding:3px;border-spacing:0;"><label for="basediff">Base
                                    Difficulty:</label><br/><input type="text" name="basediff" id="basediff" size="5"
                                                                   value="<?= $basediff ?? ""; ?>"></td>
                            <td style="padding:3px;border-spacing:0;"><label for="ResistDiff">Resist Difficulty:</label><br/><input
                                        type="text" name="ResistDiff" id="ResistDiff" size="5"
                                        value="<?= $ResistDiff ?? ""; ?>"></td>
                            <td style="padding:3px;border-spacing:0;"><label for="HateAdded">Hate
                                    Added:</label><br/><input type="text" name="HateAdded" id="HateAdded"
                                                              value="<?= $HateAdded ?? ""; ?>" size="5"></td>
                        </tr>
                        <tr>
                            <td style="padding:3px;border-spacing:0;width:16%"><label for="EndurCost">Endurance
                                    Cost:</label><br/><input type="text" name="EndurCost" id="EndurCost" size="5"
                                                             value="<?= $EndurCost ?? ""; ?>"></td>
                            <td style="padding:3px;border-spacing:0;width:17%"><label for="EndurUpkeep">Endurance
                                    Upkeep:</label><br/><input type="text" name="EndurUpkeep" id="EndurUpkeep"
                                                               value="<?= $EndurUpkeep ?? ""; ?>" size="5"></td>
                            <td style="padding:3px;border-spacing:0;width:17%"><label for="EndurTimerIndex">Endurance
                                    Timer:</label><br/><input type="text" name="EndurTimerIndex" id="EndurTimerIndex"
                                                              value="<?= $EndurTimerIndex ?? ""; ?>" size="5"></td>
                            <td style="padding:3px;border-spacing:0;width:17%"><label for="ai_pt_bonus">AI Point
                                    Bonus:</label><br/><input type="text" name="ai_pt_bonus" id="ai_pt_bonus"
                                                              value="<?= $ai_pt_bonus ?? ""; ?>" size="5"></td>
                            <td style="padding:3px;border-spacing:0;width:16%"><label for="resist_per_level">Resist Per
                                    Level:</label><br/><input type="text" name="resist_per_level" id="resist_per_level"
                                                              value="<?= $resist_per_level ?? ""; ?>" size="5"></td>
                            <td style="padding:3px;border-spacing:0;width:16%"><label for="resist_cap">Resist
                                    Cap:</label><br/><input type="text" name="resist_cap" id="resist_cap"
                                                            value="<?= $resist_cap ?? ""; ?>" size="5"></td>
                        </tr>
                        <tr>
                            <td style="padding:3px;border-spacing:0;width:17%"><label for="pvpresistbase">PVP Resist
                                    Base:</label><br/><input type="text" name="pvpresistbase" id="pvpresistbase"
                                                             value="<?= $pvpresistbase ?? ""; ?>" size="5"></td>
                            <td style="padding:3px;border-spacing:0;width:17%"><label for="pvpresistcalc">PVP Resist
                                    Calc:</label><br/><input type="text" name="pvpresistcalc" id="pvpresistcalc"
                                                             value="<?= $pvpresistcalc ?? ""; ?>" size="5"></td>
                            <td style="padding:3px;border-spacing:0;width:16%"><label for="pvpresistcap">PVP Resist
                                    Cap:</label><br/><input type="text" name="pvpresistcap" id="pvpresistcap"
                                                            value="<?= $pvpresistcap ?? ""; ?>" size="5"></td>
                            <td style="padding:3px;border-spacing:0;width:17%"><label for="pvp_duration">PVP
                                    Duration:</label><br/><input type="text" name="pvp_duration" id="pvp_duration"
                                                                 value="<?= $pvp_duration ?? ""; ?>" size="5"></td>
                            <td style="padding:3px;border-spacing:0;width:16%"><label for="pvp_duration_cap">PVP
                                    Duration Cap:</label><br/><input type="text" name="pvp_duration_cap"
                                                                     id="pvp_duration_cap"
                                                                     value="<?= $pvp_duration_cap ?? ""; ?>" size="5">
                            </td>
                            <td style="padding:3px;border-spacing:0;width:17%">&nbsp;</td>
                        </tr>
                    </table>
                </fieldset>
                <br/>
                <fieldset style="text-align:left;">
                    <legend style="font-weight:bold; font-size: large">Spell Effects</legend>
                    <table style="width:100%; border:0;">
                        <tr>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="effectid1">Spell Effect 1:</label><br/>
                                <select name="effectid1" id="effectid1" style="width:150px;">
                                    <?php if (isset($effects)) {
                                        foreach ($effects as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($effectid1) && $k == $effectid1) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select>
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="effect_base_value1">Base Value 1:</label><br/>
                                <input type="text" size="4" name="effect_base_value1" id="effect_base_value1" value="<?= $effect_base_value1 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="max1">Max Value 1:</label><br/>
                                <input type="text" size="4" name="max1" id="max1" value="<?= $max1 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="effect_limit_value1">Limit Value 1:</label><br/>
                                <input type="text" size="4" name="effect_limit_value1" id="effect_limit_value1" value="<?= $effect_limit_value1 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="formula1">Formula 1:</label><br/>
                                <select name="formula1" id="formula1" style="width:175px;">
                                    <?php if (isset($formulas)) {
                                        foreach ($formulas as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($formula1) && $k == $formula1) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select>
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="fmm1">Mult(1-99):</label><br/>
                                <input type="text" size="2" name="fmm1" id="fmm1" value="<?php if (isset($formula1)) {
                                    echo (intval($formula1) > 0 and intval($formula1) < 100) ? "$formula1" : "";
                                } ?>"></td>
                        </tr>
                        <tr>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="effectid2">Spell Effect 2:</label><br/>
                                <select name="effectid2" id="effectid2" style="width:150px;">
                                    <?php if (isset($effects)) {
                                        foreach ($effects as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($effectid2) && $k == $effectid2) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select>
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="effect_base_value2">Base Value 2:</label><br/>
                                <input type="text" size="4" name="effect_base_value2" id="effect_base_value2" value="<?= $effect_base_value2 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="max2">Max Value 2:</label><br/>
                                <input type="text" size="4" name="max2" id="max2" value="<?= $max2 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="effect_limit_value2">Limit Value 2:</label><br/>
                                <input type="text" size="4" name="effect_limit_value2" id="effect_limit_value2" value="<?= $effect_limit_value2 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="formula2">Formula 2:</label><br/>
                                <select name="formula2" id="formula2" style="width:175px;">
                                    <?php if (isset($formulas)) {
                                        foreach ($formulas as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($formula2) && $k == $formula2) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select>
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="fmm2">Mult(1-99):</label><br/>
                                <input type="text" size="2" name="fmm2" id="fmm2" value="<?php if (isset($formula2)) {
                                    echo (intval($formula2) > 0 and intval($formula2) < 100) ? "$formula2" : "";
                                } ?>"></td>
                        </tr>
                        <tr>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="effectid3">Spell Effect 3:</label><br/>
                                <select name="effectid3" id="effectid3" style="width:150px;">
                                    <?php if (isset($effects)) {
                                        foreach ($effects as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($effectid3) && $k == $effectid3) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select>
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="effect_base_value3">Base Value 3:</label><br/>
                                <input type="text" size="4" name="effect_base_value3" id="effect_base_value3" value="<?= $effect_base_value3 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="max3">Max Value 3:</label><br/>
                                <input type="text" size="4" name="max3" id="max3" value="<?= $max3 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="effect_limit_value3">Limit Value 3:</label><br/>
                                <input type="text" size="4" name="effect_limit_value3" id="effect_limit_value3" value="<?= $effect_limit_value3 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="formula3">Formula 3:</label><br/>
                                <select name="formula3" id="formula3" style="width:175px;">
                                    <?php if (isset($formulas)) {
                                        foreach ($formulas as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($formula3) && $k == $formula3) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select>
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="fmm3">Mult(1-99):</label><br/>
                                <input type="text" size="2" name="fmm3" id="fmm3" value="<?php if (isset($formula3)) {
                                    echo (intval($formula3) > 0 and intval($formula3) < 100) ? "$formula3" : "";
                                } ?>">
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="effectid4">Spell Effect 4:</label><br/>
                                <select name="effectid4" id="effectid4" style="width:150px;">
                                    <?php if (isset($effects)) {
                                        foreach ($effects as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($effectid4) && $k == $effectid4) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select>
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="effect_base_value4">Base Value 4:</label><br/>
                                <input type="text" size="4" name="effect_base_value4" id="effect_base_value4" value="<?= $effect_base_value4 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="max4">Max Value 4:</label><br/>
                                <input type="text" size="4" name="max4" id="max4" value="<?= $max4 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="effect_limit_value4">Limit Value 4:</label><br/>
                                <input type="text" size="4" name="effect_limit_value4" id="effect_limit_value4" value="<?= $effect_limit_value4 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="formula4">Formula 4:</label><br/>
                                <select name="formula4" id="formula4" style="width:175px;">
                                    <?php if (isset($formulas)) {
                                        foreach ($formulas as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($formula4) && $k == $formula4) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select>
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="fmm4">Mult(1-99):</label><br/>
                                <input type="text" size="2" name="fmm4" id="fmm4" value="<?php if (isset($formula4)) {
                                    echo (intval($formula4) > 0 and intval($formula4) < 100) ? "$formula4" : "";
                                } ?>">
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="effectid5">Spell Effect 5:</label><br/>
                                <select name="effectid5" id="effectid5" style="width:150px;">
                                    <?php if (isset($effects)) {
                                        foreach ($effects as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($effectid5) && $k == $effectid5) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select>
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="effect_base_value5">Base Value 5:</label><br/>
                                <input type="text" size="4" name="effect_base_value5" id="effect_base_value5" value="<?= $effect_base_value5 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="max5">Max Value 5:</label><br/>
                                <input type="text" size="4" name="max5" id="max5" value="<?= $max5 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="effect_limit_value5">Limit Value 5:</label><br/>
                                <input type="text" size="4" name="effect_limit_value5" id="effect_limit_value5" value="<?= $effect_limit_value5 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="formula5">Formula 5:</label><br/>
                                <select name="formula5" id="formula5" style="width:175px;">
                                    <?php if (isset($formulas)) {
                                        foreach ($formulas as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($formula5) && $k == $formula5) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select>
                            </td>
                            <td>
                                <label for="fmm5">Mult(1-99):</label><br/>
                                <input type="text" size="2" name="fmm5" id="fmm5" value="<?php if (isset($formula5)) {
                                    echo (intval($formula5) > 0 and intval($formula5) < 100) ? "$formula5" : "";
                                } ?>">
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="effectid6">Spell Effect 6:</label><br/>
                                <select name="effectid6" id="effectid6" style="width:150px;">
                                    <?php if (isset($effects)) {
                                        foreach ($effects as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($effectid6) && $k == $effectid6) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select>
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="effect_base_value6">Base Value 6:</label><br/>
                                <input type="text" size="4" name="effect_base_value6" id="effect_base_value6" value="<?= $effect_base_value6 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="max6">Max Value 6:</label><br/>
                                <input type="text" size="4" name="max6" id="max6" value="<?= $max6 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="effect_limit_value6">Limit Value 6:</label><br/>
                                <input type="text" size="4" name="effect_limit_value6" id="effect_limit_value6" value="<?= $effect_limit_value6 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="formula6">Formula 6:</label><br/>
                                <select name="formula6" id="formula6" style="width:175px;">
                                    <?php if (isset($formulas)) {
                                        foreach ($formulas as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($formula6) && $k == $formula6) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select>
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="fmm6">Mult(1-99):</label><br/>
                                <input type="text" size="2" name="fmm6" id="fmm6"
                                       value="<?php if (isset($formula6)) {
                                           echo (intval($formula6) > 0 and intval($formula6) < 100) ? "$formula6" : "";
                                       } ?>">
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="effectid7">Spell Effect 7:</label><br/>
                                <select name="effectid7" id="effectid7" style="width:150px;">
                                    <?php if (isset($effects)) {
                                        foreach ($effects as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($effectid7) && $k == $effectid7) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select>
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="effect_base_value7">Base Value 7:</label><br/>
                                <input type="text" size="4" name="effect_base_value7" id="effect_base_value7" value="<?= $effect_base_value7 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="max7">Max Value 7:</label><br/>
                                <input type="text" size="4" name="max7" id="max7" value="<?= $max7 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="effect_limit_value7">Limit Value 7:</label><br/>
                                <input type="text" size="4" name="effect_limit_value7" id="effect_limit_value7" value="<?= $effect_limit_value7 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="formula7">Formula 7:</label><br/>
                                <select name="formula7" id="formula7" style="width:175px;">
                                    <?php if (isset($formulas)) {
                                        foreach ($formulas as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($formula7) && $k == $formula7) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select>
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="fmm7">Mult(1-99):</label><br/>
                                <input type="text" size="2" name="fmm7" id="fmm7" value="<?php if (isset($formula7)) {
                                    echo (intval($formula7) > 0 and intval($formula7) < 100) ? "$formula7" : "";
                                } ?>">
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="effectid8">Spell Effect 8:</label><br/>
                                <select name="effectid8" id="effectid8" style="width:150px;">
                                    <?php if (isset($effects)) {
                                        foreach ($effects as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($effectid8) && $k == $effectid8) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select>
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="effect_base_value8">Base Value 8:</label><br/>
                                <input type="text" size="4" name="effect_base_value8" id="effect_base_value8" value="<?= $effect_base_value8 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="max8">Max Value 8:</label><br/>
                                <input type="text" size="4" name="max8" id="max8" value="<?= $max8 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="effect_limit_value8">Limit Value 8:</label><br/>
                                <input type="text" size="4" name="effect_limit_value8" id="effect_limit_value8" value="<?= $effect_limit_value8 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="formula8">Formula 8:</label><br/>
                                <select name="formula8" id="formula8" style="width:175px;">
                                    <?php if (isset($formulas)) {
                                        foreach ($formulas as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($formula8) && $k == $formula8) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select>
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="fmm8">Mult(1-99):</label><br/>
                                <input type="text" size="2" name="fmm8" id="fmm8" value="<?php if (isset($formula8)) {
                                    echo (intval($formula8) > 0 and intval($formula8) < 100) ? "$formula8" : "";
                                } ?>"></td>
                        </tr>
                        <tr>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="effectid9">Spell Effect 9:</label><br/>
                                <select name="effectid9" id="effectid9" style="width:150px;">
                                    <?php if (isset($effects)) {
                                        foreach ($effects as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($effectid9) && $k == $effectid9) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select>
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="effect_base_value9">Base Value 9:</label><br/>
                                <input type="text" size="4" name="effect_base_value9" id="effect_base_value9" value="<?= $effect_base_value9 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="max9">Max Value 9:</label><br/>
                                <input type="text" size="4" name="max9" id="max9" value="<?= $max9 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="effect_limit_value9">Limit Value 9:</label><br/>
                                <input type="text" size="4" name="effect_limit_value9" id="effect_limit_value9" value="<?= $effect_limit_value9 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="formula9">Formula 9:</label><br/>
                                <select name="formula9" id="formula9" style="width:175px;">
                                    <?php if (isset($formulas)) {
                                        foreach ($formulas as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($formula9) && $k == $formula9) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select>
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="fmm9">Mult(1-99):</label><br/>
                                <input type="text" size="2" name="fmm9" id="fmm9" value="<?php if (isset($formula9)) {
                                    echo (intval($formula9) > 0 and intval($formula9) < 100) ? "$formula9" : "";
                                } ?>">
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="effectid10">Spell Effect 10:</label><br/>
                                <select name="effectid10" id="effectid10" style="width:150px;">
                                    <?php if (isset($effects)) {
                                        foreach ($effects as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($effectid10) && $k == $effectid10) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select>
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="effect_base_value10">Base Value 10:</label><br/>
                                <input type="text" size="4" name="effect_base_value10" id="effect_base_value10" value="<?= $effect_base_value10 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="max10">Max Value 10:</label><br/>
                                <input type="text" size="4" name="max10" id="max10" value="<?= $max10 ?? ""; ?>"></td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="effect_limit_value10">Limit Value 10:</label><br/>
                                <input type="text" size="4" name="effect_limit_value10" id="effect_limit_value10" value="<?= $effect_limit_value10 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="formula10">Formula 10:</label><br/>
                                <select name="formula10" id="formula10" style="width:175px;">
                                    <?php if (isset($formulas)) {
                                        foreach ($formulas as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($formula10) && $k == $formula10) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select>
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="fmm10">Mult(1-99):</label><br/>
                                <input type="text" size="2" name="fmm10" id="fmm10" value="<?php if (isset($formula10)) {
                                    echo (intval($formula10) > 0 and intval($formula10) < 100) ? "$formula10" : "";
                                } ?>"></td>
                        </tr>
                        <tr>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="effectid11">Spell Effect 11:</label><br/>
                                <select name="effectid11" id="effectid11" style="width:150px;">
                                    <?php if (isset($effects)) {
                                        foreach ($effects as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($effectid11) && $k == $effectid11) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select>
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="effect_base_value11">Base Value 11:</label><br/>
                                <input type="text" size="4" name="effect_base_value11" id="effect_base_value11" value="<?= $effect_base_value11 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="max11">Max Value 11:</label><br/>
                                <input type="text" size="4" name="max11" id="max11" value="<?= $max11 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="effect_limit_value11">Limit Value 11:</label><br/>
                                <input type="text" size="4" name="effect_limit_value11" id="effect_limit_value11" value="<?= $effect_limit_value11 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="formula11">Formula 11:</label><br/>
                                <select name="formula11" id="formula11" style="width:175px;">
                                    <?php if (isset($formulas)) {
                                        foreach ($formulas as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($formula11) && $k == $formula11) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select>
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="fmm11">Mult(1-99):</label><br/>
                                <input type="text" size="2" name="fmm11" id="fmm11"
                                       value="<?php if (isset($formula11)) {
                                           echo (intval($formula11) > 0 and intval($formula11) < 100) ? "$formula11" : "";
                                       } ?>">
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="effectid12">Spell Effect 12:</label><br/>
                                <select name="effectid12" id="effectid12" style="width:150px;">
                                    <?php if (isset($effects)) {
                                        foreach ($effects as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($effectid12) && $k == $effectid12) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select>
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="effect_base_value12">Base Value 12:</label><br/>
                                <input type="text" size="4" name="effect_base_value12" id="effect_base_value12" value="<?= $effect_base_value12 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="max12">Max Value 12:</label><br/>
                                <input type="text" size="4" name="max12" id="max12" value="<?= $max12 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="effect_limit_value12">Limit Value 12:</label><br/>
                                <input type="text" size="4" name="effect_limit_value12" id="effect_limit_value12" value="<?= $effect_limit_value12 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="formula12">Formula 12:</label><br/>
                                <select name="formula12" id="formula12" style="width:175px;">
                                    <?php if (isset($formulas)) {
                                        foreach ($formulas as $k => $v): ?>
                                            <option value="<?= $k ?>"<?php echo (isset($formula12) && $k == $formula12) ? " selected" : "" ?>><?= $k ?>
                                                : <?= $v ?></option>
                                        <?php endforeach;
                                    } ?>
                                </select>
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="fmm12">Mult(1-99):</label><br/>
                                <input type="text" size="2" name="fmm12" id="fmm12"
                                       value="<?php if (isset($formula12)) {
                                           echo (intval($formula12) > 0 and intval($formula12) < 100) ? "$formula12" : "";
                                       } ?>">
                            </td>
                        </tr>
                    </table>
                </fieldset>
                <br/>
                <fieldset style="text-align:left;">
                    <legend style="font-weight: bold; font-size: large;">Reagents</legend>
                    <table style="width:100%; border:0;">
                        <tr>
                            <td style="padding:3px;border-spacing:0;">
                                <label for="components1">Components 1:</label><br/>
                                <input type="text" name="components1" id="components1" value="<?= $components1 ?? ""; ?>">
                            </td>
                            <td style="padding:3px;border-spacing:0;">
                                <label for="component_counts1">Component Count 1:</label><br/>
                                <input type="text" name="component_counts1" id="component_counts1" value="<?= $component_counts1 ?? ""; ?>">
                            </td>
                            <td style="padding:3px;border-spacing:0;">
                                <label for="NoexpendReagent1">No Expend Reagent 1:</label><br/>
                                <input type="text" name="NoexpendReagent1" id="NoexpendReagent1" value="<?= $NoexpendReagent1 ?? ""; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:3px;border-spacing:0;">
                                <label for="components2">Components 2:</label><br/>
                                <input type="text" name="components2" id="components2" value="<?= $components2 ?? ""; ?>">
                            </td>
                            <td style="padding:3px;border-spacing:0;">
                                <label for="component_counts2">Component Count 2:</label><br/>
                                <input type="text" name="component_counts2" id="component_counts2" value="<?= $component_counts2 ?? ""; ?>">
                            </td>
                            <td style="padding:3px;border-spacing:0;">
                                <label for="NoexpendReagent2">No Expend Reagent 2:</label><br/>
                                <input type="text" name="NoexpendReagent2" id="NoexpendReagent2" value="<?= $NoexpendReagent2 ?? ""; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:3px;border-spacing:0;">
                                <label for="components3">Components 3:</label><br/>
                                <input type="text" name="components3" id="components3" value="<?= $components3 ?? ""; ?>">
                            </td>
                            <td style="padding:3px;border-spacing:0;">
                                <label for="component_counts3">Component Count 3:</label><br/>
                                <input type="text" name="component_counts3" id="component_counts3" value="<?= $component_counts3 ?? ""; ?>">
                            </td>
                            <td style="padding:3px;border-spacing:0;">
                                <label for="NoexpendReagent3">No Expend Reagent 3:</label><br/>
                                <input type="text" name="NoexpendReagent3" id="NoexpendReagent3" value="<?= $NoexpendReagent3 ?? ""; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:3px;border-spacing:0;">
                                <label for="components4">Components 4:</label><br/>
                                <input type="text" name="components4" id="components4" value="<?= $components4 ?? ""; ?>">
                            </td>
                            <td style="padding:3px;border-spacing:0;">
                                <label for="component_counts4">Component Count 4:</label><br/>
                                <input type="text" name="component_counts4" id="component_counts4" value="<?= $component_counts4 ?? ""; ?>">
                            </td>
                            <td style="padding:3px;border-spacing:0;">
                                <label for="NoexpendReagent4">No Expend Reagent 4:</label><br/>
                                <input type="text" name="NoexpendReagent4" id="NoexpendReagent4" value="<?= $NoexpendReagent4 ?? ""; ?>">
                            </td>
                        </tr>
                    </table>
                </fieldset>
                <br/>
                <fieldset style="text-align:left;">
                    <legend style="font-weight:bold; font-size: large;">Class Levels</legend>
                    <table style="width:100%; border:0;">
                        <tr>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="classes1">Warrior:</label><br/>
                                <input type="text" name="classes1" id="classes1" size="3" value="<?= $classes1 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="classes2">Cleric:</label><br/>
                                <input type="text" name="classes2" id="classes2" size="3" value="<?= $classes2 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="classes3">Paladin:</label><br/>
                                <input type="text" name="classes3" id="classes3" size="3" value="<?= $classes3 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="classes4">Ranger:</label><br/>
                                <input type="text" name="classes4" id="classes4" size="3" value="<?= $classes4 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="classes5">Shadowknight:</label><br/>
                                <input type="text" name="classes5" id="classes5" size="3" value="<?= $classes5 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="classes6">Druid:</label><br/>
                                <input type="text" name="classes6" id="classes6" size="3" value="<?= $classes6 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="classes7">Monk:</label><br/>
                                <input type="text" name="classes7" id="classes7" size="3" value="<?= $classes7 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="classes8">Bard:</label><br/>
                                <input type="text" name="classes8" id="classes8" size="3" value="<?= $classes8 ?? ""; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="classes9">Rogue:</label><br/>
                                <input type="text" name="classes9" id="classes9" size="3" value="<?= $classes9 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="classes10">Shaman:</label><br/>
                                <input type="text" name="classes10" id="classes10" size="3" value="<?= $classes10 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="classes11">Necromancer:</label><br/>
                                <input type="text" name="classes11" id="classes11" size="3" value="<?= $classes11 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;"><label for="classes12">Wizard:</label><br/>
                                <input type="text" name="classes12" id="classes12" size="3" value="<?= $classes12 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="classes13">Magician:</label><br/>
                                <input type="text" name="classes13" id="classes13" size="3" value="<?= $classes13 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="classes14">Enchanter:</label><br/>
                                <input type="text" name="classes14" id="classes14" size="3" value="<?= $classes14 ?? ""; ?>">
                            </td>
                            <td style="padding:3px; border-spacing:0;">
                                <label for="classes15">Beastlord:</label><br/>
                                <input type="text" name="classes15" id="classes15" size="3" value="<?= $classes15 ?? ""; ?>">
                            </td>
                        </tr>
                    </table>
                </fieldset>
                <br/>
                <fieldset style="text-align:left;">
                    <legend style="font-weight:bold; font-size:large;">Deities</legend>
                    <table style="width: 100%; border: 0;">
                        <tr>
                            <td style="width:25%; padding:3px; border-spacing:0;">
                                <input type="checkbox" name="deities1"
                                       id="deities1" <?php echo (isset($deities1) && $deities1) ? "checked" : "" ?>>
                                <label for="deities1">Bertoxxulous</label><br/>
                                <input type="checkbox" name="deities2"
                                       id="deities2" <?php echo (isset($deities2) && $deities2) ? "checked" : "" ?>>
                                <label for="deities2">Brell Serilis</label><br/>
                                <input type="checkbox" name="deities3"
                                       id="deities3" <?php echo (isset($deities3) && $deities3) ? "checked" : "" ?>>
                                <label for="deities3">Cazic Thule</label><br/>
                                <input type="checkbox" name="deities4"
                                       id="deities4" <?php echo (isset($deities4) && $deities4) ? "checked" : "" ?>>
                                <label for="deities4">Erollisi Marr</label><br/>
                            </td>
                            <td style="width:25%; padding:3px; border-spacing:0;">
                                <input type="checkbox" name="deities5"
                                       id="deities5" <?php echo (isset($deities5) && $deities5) ? "checked" : "" ?>>
                                <label for="deities5">Bristlebane</label><br/>
                                <input type="checkbox" name="deities6"
                                       id="deities6" <?php echo (isset($deities6) && $deities6) ? "checked" : "" ?>>
                                <label for="deities6">Innoruuk</label><br/>
                                <input type="checkbox" name="deities7"
                                       id="deities7" <?php echo (isset($deities7) && $deities7) ? "checked" : "" ?>>
                                <label for="deities7">Karana</label><br/>
                                <input type="checkbox" name="deities8"
                                       id="deities8" <?php echo (isset($deities8) && $deities8) ? "checked" : "" ?>>
                                <label for="deities8">Mithaniel Marr</label><br/>
                            </td>
                            <td style="width:25%; padding:3px; border-spacing:0;">
                                <input type="checkbox" name="deities9"
                                       id="deities9" <?php echo (isset($deities9) && $deities9) ? "checked" : "" ?>>
                                <label for="deities9">Prexus</label><br/>
                                <input type="checkbox" name="deities10"
                                       id="deities10" <?php echo (isset($deities10) && $deities10) ? "checked" : "" ?>>
                                <label for="deities10">Quellious</label><br/>
                                <input type="checkbox" name="deities11"
                                       id="deities11" <?php echo (isset($deities11) && $deities11) ? "checked" : "" ?>>
                                <label for="deities11">Rallos Zek</label><br/>
                                <input type="checkbox" name="deities12"
                                       id="deities12" <?php echo (isset($deities12) && $deities12) ? "checked" : "" ?>>
                                <label for="deities12">Rodcet Nife</label><br/>
                            </td>
                            <td style="width:25%; padding:3px; border-spacing:0;">
                                <input type="checkbox" name="deities13"
                                       id="deities13" <?php echo (isset($deities13) && $deities13) ? "checked" : "" ?>>
                                <label for="deities13">Solusek Ro</label><br/>
                                <input type="checkbox" name="deities14"
                                       id="deities14" <?php echo (isset($deities14) && $deities14) ? "checked" : "" ?>>
                                <label for="deities14">The Tribunal</label><br/>
                                <input type="checkbox" name="deities15"
                                       id="deities15" <?php echo (isset($deities15) && $deities15) ? "checked" : "" ?>>
                                <label for="deities15">Tunare</label><br/>
                                <input type="checkbox" name="deities16"
                                       id="deities16" <?php echo (isset($deities16) && $deities16) ? "checked" : "" ?>>
                                <label for="deities16">Veeshan</label><br/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" style="text-align:center; padding:3px; border-spacing:0;">
                                <input type="checkbox" name="deities0"
                                       id="deities0" <?php echo (isset($deities0) && $deities0) ? "checked" : "" ?>>
                                <label for="deities0">Agnostic</label>
                            </td>
                        </tr>
                    </table>
                </fieldset>
                <br/>
                <fieldset style="text-align:left;">
                    <legend style="font-weight:bold; font-size:large;">Spell Guide</legend>
                    <table style="width: 100%; border: 0;">
                        <tr>
                            <td style="padding: 3px; border-spacing: 0;"><label for="custom_icon">Custom
                                    Icon:</label><br/><input type="text" name="custom_icon" id="custom_icon" size="3"
                                                             value="<?= $custom_icon ?? ""; ?>"></td>
                            <td style="padding: 3px; border-spacing: 0; text-align: left; width: 50%;"><label
                                        for="not_player_spell">Don't Display:</label><br/>
                                <select name="not_player_spell" id="not_player_spell">
                                    <option value="0"<?php echo (isset($not_player_spell) && $not_player_spell == 0) ? " selected" : "" ?>>
                                        No
                                    </option>
                                    <option value="1"<?php echo (isset($not_player_spell) && $not_player_spell == 1) ? " selected" : "" ?>>
                                        Yes
                                    </option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </fieldset>
                <br/>
                <div class="center">
                    <input type="submit" value="Submit Changes">
                </div>
            </div>
        </div>
    </div>
</form>
