    <form name="spell_edit" method="post" action="index.php?editor=spells&id=<?=$id?>&action=6">
    <div class="edit_form">
      <div class="edit_form_header">
        Edit Spell <?=$id?> - <?=$spellname ?? ""?> (<a href="https://lucy.allakhazam.com/spell.html?id=<?=$id?>" target="_blank">Lucy</a>)
        <div style="float:right;">
          <a href="index.php?editor=spells&id=<?=$id?>&action=7" onClick="return confirm('Really Copy Spell <?=$id?>?');"><img src="images/last.gif" style="border: 0;" alt="Copy Icon" title="Copy this Spell"></a>
          <a href="index.php?editor=spells&id=<?=$id?>&action=5" onClick="return confirm('Really Delete Spell <?=$id?>?');"><img src="images/table.gif" style="border: 0;" alt="Delete Icon" title="Delete this Spell"></a>
        </div>
      </div>
      <div class="edit_form_content">
        <div class="center">
          <fieldset style="text-align: left;">
            <legend><strong><span style="font-size: 18px">General</span></strong></legend>
            <input type="hidden" name="id" value="<?=$id?>">
            <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
              <tr>
                  <td style="padding: 3px; width: 50%"><label for="name">Name:</label><br/><input type="text" id="name" name="name" size="40" value="<?=$spellname ?? ""?>"></td>
                  <td style="padding: 3px;"><label for="teleport_zone">Teleport Zone / Pet Type:</label><br/><input type="text" id="teleport_zone" name="teleport_zone" size="40" value="<?=$teleport_zone ?? ""?>"></td>
              </tr>
              <tr>
                  <td style="padding: 3px; width: 50%"><label for="you_cast">You Cast Message:</label><br/><input type="text" id="you_cast" name="you_cast" size="40" value="<?=$you_cast ?? ""?>"></td>
                  <td style="padding: 3px;"><label for="other_casts">Other Casts Message:</label><br/><input type="text" id="other_casts" name="other_casts" size="40" value="<?=$other_casts ?? ""?>"></td>
              </tr>
              <tr>
                  <td style="padding: 3px; width: 50%"><Label for="cast_on_you">Cast on You Message:</Label><br/><input type="text" id="cast_on_you" name="cast_on_you" size="40" value="<?=$cast_on_you ?? ""?>"></td>
                  <td style="padding: 3px;"><label for="cast_on_other">Cast on Other Message:</label><br/><input type="text" id="cast_on_other" name="cast_on_other" size="40" value="<?=$cast_on_other ?? ""?>"></td>
              </tr>
              <tr>
                  <td style="padding: 3px; width: 50%"><label for="spell_fades">Spell Fades Message:</label><br/><input type="text" id="spell_fades" name="spell_fades" size="40" value="<?=$spell_fades ?? ""?>"></td>
                  <td style="padding: 3px;"><label for="spell_category">Spell Category:</label><br/>
                  <select id="spell_category" name="spell_category" style="width:220px;">
                      <?php
                      $spellgroups = $spellgroups ?? array();
                      foreach($spellgroups as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($spell_category) && $k == $spell_category) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                  <label for="spcat"></label>
                  <input type="text" id="spcat" name="spcat" size="3" value="<?=$spell_category ?? ""?>">
                </td>
              </tr>
              <tr>
                  <td style="padding: 3px;"><label for="skill">Skill:</label><br/>
                  <select id="skill" name="skill" style="width:265px;">
                      <?php foreach($skills as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($skill) && $k == $skill) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td style="padding: 3px;"><label for="targettype">Target:</label><br/>
                  <select id="targettype" name="targettype" style="width:265px;">
                      <?php
                      $targets = $targets ?? array();
                      foreach($targets as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($targettype) && $k == $targettype) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
              </tr>
              <tr>
                  <td style="padding: 3px;"><label for="zonetype">Zone Type:</label><br/>
                  <select id="zonetype" name="zonetype" style="width:265px;">
                      <?php
                      $zonetypes = $zonetypes ?? array();
                      foreach($zonetypes as $k => $v):?>
                    <option value="<?=$k?>"<?php echo ($k == $zonetype) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td style="padding: 3px;"><label for="EnvironmentType">Environment Type:</label><br/>
                  <select id="EnvironmentType" name="EnvironmentType" style="width:265px;">
                      <?php
                      $envtypes = $envtypes ?? array();
                      foreach($envtypes as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($EnvironmentType) && $k == $EnvironmentType) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
              </tr>
              <tr>
                  <td style="padding: 3px;"><label for="LightType">Light Type:</label><br/>
                  <select id="LightType" name="LightType" style="width:265px;">
                      <?php
                      $lighttypes = $lighttypes ?? array();
                      foreach($lighttypes as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($LightType) && $k == $LightType) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td style="padding: 3px;"><label for="resisttype">Resist Type:</label><br/>
                  <select id="resisttype" name="resisttype" style="width:265px;">
                      <?php
                      $resisttypes = $resisttypes ?? array();
                      foreach($resisttypes as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($resisttype) && $k == $resisttype) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
              </tr>
              <tr>
                  <td style="padding: 3px;"><label for="goodEffect">Effect Type:</label><br/>
                  <select id="goodEffect" name="goodEffect" style="width:265px;">
                      <?php
                      $effecttypes = $effecttypes ?? array();
                      foreach($effecttypes as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($goodEffect) && $k == $goodEffect) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td style="padding: 3px;"><label for="Activated">Activated:</label><br/>
                  <select id="Activated" name="Activated" style="width:265px;">
                      <?php
                      $acttypes = $acttypes ?? array();
                      foreach($acttypes as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($Activated) && $k == $Activated) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
              </tr>
              <tr>
                  <td style="padding: 3px;"><label for="TimeOfDay">Time of Day:</label><br/>
                  <select id="TimeOfDay" name="TimeOfDay" style="width:100px;">
                      <?php
                      $daytimes = $daytimes ?? array();
                      foreach($daytimes as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($TimeOfDay) && $k == $TimeOfDay) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td style="padding: 3px;"><label for="TravelType">Travel Type:</label><br/>
                  <select id="TravelType" name="TravelType" style="width:265px;">
                      <?php
                      $traveltypes = $traveltypes ?? array();
                      foreach($traveltypes as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($TravelType) && $k == $TravelType) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
              </tr>
              <tr>
                  <td style="padding: 3px;"><label for="buffduration">Buff Duration:</label><br/><input type="text" id="buffduration" name="buffduration" size="10" value="<?=$buffduration ?? ""?>"></td>
                  <td style="padding: 3px;"><label for="buffdurationformula">Buff Duration Formula:</label><br/>
                  <select id="buffdurationformula" name="buffdurationformula" style="width:265px;">
                      <?php
                      $buffformulas = $buffformulas ?? array();
                      foreach($buffformulas as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($buffdurationformula) && $k == $buffdurationformula) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
              </tr>
              <tr>
                <td style="padding: 3px;" colspan="2">
                  <table style="border: 0; border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <tr>
                        <td style="padding: 2px;"><input type="checkbox" id="dot_stacking_exempt" name="dot_stacking_exempt" <?php echo (isset($dot_stacking_exempt) && $dot_stacking_exempt) ? "checked" : "" ?>> <label for="dot_stacking_exempt">DoT Stacking Exempt</label></td>
                        <td style="padding: 2px;"><input type="checkbox" id="deleteable" name="deleteable" <?php echo (isset($deleteable) && $deleteable) ? "checked" : "" ?>> <label for="deleteable">Deleteable</label></td>
                        <td style="padding: 2px;"><input type="checkbox" id="uninterruptable" name="uninterruptable" <?php echo (isset($uninterruptable) && $uninterruptable) ? "checked" : "" ?>> <label for="uninterruptable">Uninterruptable</label></td>
                        <td style="padding: 2px;"><input type="checkbox" id="nodispell" name="nodispell" <?php echo (isset($nodispell) && $nodispell) ? "checked" : "" ?>> <label for="nodispell">No Dispell</label></td>
                        <td style="padding: 2px;"><input type="checkbox" id="can_mgb" name="can_mgb" <?php echo (isset($can_mgb) && $can_mgb) ? "checked" : "" ?>> <label for="can_mgb">Can MGB</label></td>
                        <td style="padding: 2px;"><input type="checkbox" id="short_buff_box" name="short_buff_box" <?php echo (isset($short_buff_box) && $short_buff_box) ? "checked" : "" ?>> <label for="short_buff_box">Short Buff Box</label></td>
                        <td style="padding: 2px;"><input type="checkbox" id="disabled" name="disabled" <?php echo (isset($disabled) && $disabled) ? "checked" : "" ?>> <label for="disabled">Disabled</label></td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td style="padding: 3px;" colspan="2">
                  <table style="border: 0; border-collapse: collapse; border-spacing: 0; width: 100%">
                    <tr>
                        <td style="padding: 2px; width: 16%"><label for="icon">Old Icon:</label><br/><input type="text" id="icon" name="icon" value="<?=$icon ?? ""?>" size="6"></td>
                        <td style="padding: 2px; width: 17%"><label for="new_icon">New Icon:</label><br/><input type="text" id="new_icon" name="new_icon" value="<?=$new_icon ?? ""?>" size="6"></td>
                        <td style="padding: 2px; width: 17%"><label for="memicon">Mem Icon:</label><br/><input type="text" id="memicon" name="memicon" value="<?=$memicon ?? ""?>" size="6"></td>
                        <td style="padding: 2px; width: 16%"><label for="spellanim">Spell Anim:</label><br/><input type="text" id="spellanim" name="spellanim" value="<?=$spellanim ?? ""?>" size="6"></td>
                        <td style="padding: 2px; width: 17%"><label for="CastingAnim">Casting Anim:</label><br/><input type="text" id="CastingAnim" name="CastingAnim" value="<?=$CastingAnim ?? ""?>" size="6"></td>
                        <td style="padding: 2px; width: 17%"><label for="TargetAnim">Target Anim:</label><br/><input type="text" id="TargetAnim" name="TargetAnim" value="<?=$TargetAnim ?? ""?>" size="6"></td>
                    </tr>
                    <tr>
                        <td style="padding: 2px; width: 17%"><label for="SpellAffectIndex">Spell Affect Index:</label><br/><input type="text" id="SpellAffectIndex" name="SpellAffectIndex" value="<?=$SpellAffectIndex ?? ""?>" size="6"></td>
                        <td style="padding: 2px; width: 16%"><label for="use_persistent_particles">Persistent Particles:</label><br/><input type="text" id="use_persistent_particles" name="use_persistent_particles" value="<?=$use_persistent_particles ?? ""?>" size="6"></td>
                        <td style="padding: 2px; width: 16%"><label for="RecourseLink">Recourse Link:</label><br/><input type="text" id="RecourseLink" name="RecourseLink" value="<?=$RecourseLink ?? ""?>" size="6"></td>
                        <td style="padding: 2px; width: 16%"><label for="small_targets_only">Small Targets:</label><br/><input type="text" id="small_targets_only" name="small_targets_only" value="<?=$small_targets_only ?? ""?>" size="6"></td>
                        <td style="padding: 2px; width: 17%"><label for="npc_no_cast">NPC No Cast:</label><br/><input type="text" id="npc_no_cast" name="npc_no_cast" value="<?=$npc_no_cast ?? ""?>" size="6"></td>
                      <td style="padding: 2px; width: 17%">&nbsp;</td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td style="padding: 3px;" colspan="2">
                  <table style="border: 0; border-collapse: collapse; border-spacing: 0; width: 100%">
                    <tr>
                        <td style="padding: 2px; width: 25%"><label for="descnum">Desc Num:</label><br/><input type="text" id="descnum" name="descnum" value="<?=$descnum ?? ""?>" size="6"></td>
                        <td style="padding: 2px; width: 25%"><label for="typedescnum">Type Desc Num:</label><br/><input type="text" id="typedescnum" name="typedescnum" value="<?=$typedescnum ?? ""?>" size="6"></td>
                        <td style="padding: 2px; width: 25%"><label for="effectdescnum">Effect Desc Num:</label><br/><input type="text" id="effectdescnum" name="effectdescnum" value="<?=$effectdescnum ?? ""?>" size="6"></td>
                        <td style="padding: 2px; width: 25%"><label for="effectdescnum2">Effect Desc Num2:</label><br/><input type="text" id="effectdescnum2" name="effectdescnum2" value="<?=$effectdescnum2 ?? ""?>" size="6"></td>
                    </tr>
                  </table><br>
                </td>
              </tr>
            </table>
              <table style="border: 0; border-collapse: collapse; border-spacing: 0; width: 100%;">
                  <tr>
                      <td style="padding: 2px;" colspan="3"><label for="npc_category">NPC Category:</label><br/>
                          <select id="npc_category" name="npc_category" style="width:265px;">
                              <?php
                              $npccats = $npccats ?? array();
                              foreach ($npccats as $k => $v):?>
                                  <option value="<?= $k ?>"<?php echo (isset($npc_category) && $k == $npc_category) ? " selected" : "" ?>><?= $k ?>
                                      : <?= $v ?></option>
                              <?php endforeach; ?>
                          </select>
                      </td>
                      <td style="padding: 2px;"><label for="npc_usefulness">NPC Usefulness:</label><br/><input type="text" id="npc_usefulness" name="npc_usefulness" value="<?= $npc_usefulness ?? "" ?>" size="6"></td>
                  </tr>
              </table>
              <br>
                <table style="border: 0; border-collapse: collapse; border-spacing: 0; width: 100%">
                <tr>
                <td style="padding: 2px;">
                    <label for="no_partial_resist">No Partial Resist:</label><br/>
                  <select id="no_partial_resist" name="no_partial_resist" style="width:80px;">
                    <option value="-1"<?php echo (isset($no_partial_resist) && $no_partial_resist == -1) ? " selected" : "";?>>-1</option>
                    <option value="0"<?php echo (isset($no_partial_resist) && $no_partial_resist == 0) ? " selected" : "";?>>0</option>
                    <option value="1"<?php echo (isset($no_partial_resist) && $no_partial_resist == 1) ? " selected" : "";?>>1</option>
                  </select>
                </td>
                <td style="padding: 2px;">
                    <label for="npc_no_los">NPC No LoS:</label><br/>
                  <select id="npc_no_los" name="npc_no_los" style="width:80px;">
                    <option value="-1"<?php echo (isset($npc_no_los) && $npc_no_los == -1) ? " selected" : "";?>>-1</option>
                    <option value="0"<?php echo (isset($npc_no_los) && $npc_no_los == 0) ? " selected" : "";?>>0</option>
                    <option value="1"<?php echo (isset($npc_no_los) && $npc_no_los == 1) ? " selected" : "";?>>1</option>
                  </select>
                </td>
                <td style="padding: 2px;">
                    <label for="IsDiscipline">Is Discipline:</label><br/>
                  <select id="IsDiscipline" name="IsDiscipline" style="width:80px;">
                    <option value="-1"<?php echo (isset($IsDiscipline) && $IsDiscipline == -1) ? " selected" : "";?>>-1</option>
                    <option value="0"<?php echo (isset($IsDiscipline) && $IsDiscipline == 0) ? " selected" : "";?>>0</option>
                    <option value="1"<?php echo (isset($IsDiscipline) && $IsDiscipline == 1) ? " selected" : "";?>>1</option>
                  </select>
                </td>
                <td style="padding: 2px;">
                    <label for="suspendable">Suspendable:</label><br/>
                  <select id="suspendable" name="suspendable" style="width:80px;">
                    <option value="-1"<?php echo (isset($suspendable) && $suspendable == -1) ? " selected" : "";?>>-1</option>
                    <option value="0"<?php echo (isset($suspendable) && $suspendable == 0) ? " selected" : "";?>>0</option>
                    <option value="1"<?php echo (isset($suspendable) && $suspendable == 1) ? " selected" : "";?>>1</option>
                  </select>
                </td>
                 <td style="padding: 2px;">
                     <label for="allow_spellscribe">Allow Scribe:</label><br/>
                  <select id="allow_spellscribe" name="allow_spellscribe" style="width:80px;">
                    <option value="0"<?php echo (isset($allow_spellscribe) && $allow_spellscribe == 0) ? " selected" : "";?>>No</option>
                    <option value="1"<?php echo (isset($allow_spellscribe) && $allow_spellscribe == 1) ? " selected" : "";?>>Yes</option>
                  </select>
                </td>
                </tr>
                <tr>
                 <td style="padding: 2px;">
                     <label for="reflectable">Reflectable:</label><br/>
                  <select id="reflectable" name="reflectable" style="width:80px;">
                    <option value="-1"<?php echo (isset($reflectable) && $reflectable == -1) ? " selected" : "";?>>-1</option>
                    <option value="0"<?php echo (isset($reflectable) && $reflectable == 0) ? " selected" : "";?>>0</option>
                    <option value="1"<?php echo (isset($reflectable) && $reflectable == 1) ? " selected" : "";?>>1</option>
                  </select>
                </td>
                <td style="padding: 2px;">
                    <label for="cast_not_standing">Not Standing:</label><br/>
                  <select id="cast_not_standing" name="cast_not_standing" style="width:80px;">
                    <option value="-1"<?php echo (isset($cast_not_standing) && $cast_not_standing == -1) ? " selected" : "";?>>-1</option>
                    <option value="0"<?php echo (isset($cast_not_standing) && $cast_not_standing == 0) ? " selected" : "";?>>0</option>
                    <option value="1"<?php echo (isset($cast_not_standing) && $cast_not_standing == 1) ? " selected" : "";?>>1</option>
                  </select>
                </td>
                 <td style="padding: 2px;">
                     <label for="disallow_sit">Disallow Sit:</label><br/>
                  <select id="disallow_sit" name="disallow_sit" style="width:80px;">
                    <option value="0"<?php echo (isset($disallow_sit) && $disallow_sit == 0) ? " selected" : "";?>>No</option>
                    <option value="1"<?php echo (isset($disallow_sit) && $disallow_sit == 1) ? " selected" : "";?>>Yes</option>
                  </select>
                </td>
                <td style="padding: 2px;">
                    <label for="allowrest">Allow Rest:</label><br/>
                  <select id="allowrest" name="allowrest" style="width:80px;">
                    <option value="-1"<?php echo (isset($allowrest) && $allowrest == -1) ? " selected" : "";?>>-1</option>
                    <option value="0"<?php echo (isset($allowrest) && $allowrest == 0) ? " selected" : "";?>>0</option>
                    <option value="1"<?php echo (isset($allowrest) && $allowrest == 1) ? " selected" : "";?>>1</option>
                  </select>
                </td>
                 <td style="padding: 2px;">
                     <label for="wear_off_message">Wear-Off Message:</label><br/>
                  <select id="wear_off_message" name="wear_off_message" style="width:80px;">
                    <option value="0"<?php echo (isset($wear_off_message) && $wear_off_message == 0) ? " selected" : "";?>>No</option>
                    <option value="1"<?php echo (isset($wear_off_message) && $wear_off_message == 1) ? " selected" : "";?>>Yes</option>
                  </select>
                </td>
              </tr>
            </table>
          </fieldset><br/>
          <fieldset style="text-align:left;">
            <legend><strong><span style="font-size: 18px;">Stats</span></strong></legend>
            <table style="border: 0; border-collapse: collapse; border-spacing: 0; width: 100%">
              <tr>
                  <td style="padding: 3px;"><label for="range">Range:</label><br/><input type="text" id="range" name="range" size="5" value="<?=$range ?? ""?>"></td>
                  <td style="padding: 3px;"><label for="aoerange">AoE Range:</label><br/><input type="text" id="aoerange" name="aoerange" size="5" value="<?=$aoerange ?? ""?>"></td>
                  <td style="padding: 3px;"><label for="cast_time">Cast Time (ms):</label><br/><input type="text" id="cast_time" name="cast_time" size="5" value="<?=$cast_time ?? ""?>"></td>
                  <td style="padding: 3px;"><label for="recast_time">Recast Time (ms):</label><br/><input type="text" id="recast_time" name="recast_time" size="5" value="<?=$recast_time ?? ""?>"></td>
                  <td style="padding: 3px;"><label for="recovery_time">Recovery Time (ms):</label><br/><input type="text" id="recovery_time" name="recovery_time" size="5" value="<?=$recovery_time ?? ""?>"></td>
                  <td style="padding: 3px;"><label for="AEDuration">AE Duration (ms):</label><br/><input type="text" id="AEDuration" name="AEDuration" size="5" value="<?=$AEDuration ?? ""?>"></td>
              </tr>
              <tr>
                  <td style="padding: 3px;"><label for="mana">Mana:</label><br/><input type="text" id="mana" name="mana" size="5" value="<?=$mana ?? ""?>"></td>
                  <td style="padding: 3px;"><label for="pushback">Push Back:</label><br/><input type="text" id="pushback" name="pushback" size="5" value="<?=$pushback ?? ""?>"></td>
                  <td style="padding: 3px;"><label for="pushup">Push Up:</label><br/><input type="text" id="pushup" name="pushup" size="5" value="<?=$pushup ?? ""?>"></td>
                  <td style="padding: 3px;"><label for="basediff">Base Difficulty:</label><br/><input type="text" id="basediff" name="basediff" size="5" value="<?=$basediff ?? ""?>"></td>
                  <td style="padding: 3px;"><label for="ResistDiff">Resist Difficulty:</label><br/><input type="text" id="ResistDiff" name="ResistDiff" size="5" value="<?=$ResistDiff ?? ""?>"></td>
                  <td style="padding: 3px;"><label for="HateAdded">Hate Added:</label><br/><input type="text" id="HateAdded" name="HateAdded" value="<?=$HateAdded ?? ""?>" size="5"></td>
              </tr>
              <tr>
                  <td style="padding: 3px; width: 16%"><label for="EndurCost">Endurance Cost:</label><br/><input type="text" id="EndurCost" name="EndurCost" size="5" value="<?=$EndurCost ?? ""?>"></td>
                  <td style="padding: 3px; width: 17%"><label for="EndurUpkeep">Endurance Upkeep:</label><br/><input type="text" id="EndurUpkeep" name="EndurUpkeep" value="<?=$EndurUpkeep ?? ""?>" size="5"></td>
                  <td style="padding: 3px; width: 17%"><label for="EndurTimerIndex">Endurance Timer:</label><br/><input type="text" id="EndurTimerIndex" name="EndurTimerIndex" value="<?=$EndurTimerIndex ?? ""?>" size="5"></td>
                  <td style="padding: 3px; width: 17%"><label for="ai_pt_bonus">AI Point Bonus:</label><br/><input type="text" id="ai_pt_bonus" name="ai_pt_bonus" value="<?=$ai_pt_bonus ?? ""?>" size="5"></td>
                  <td style="padding: 3px; width: 16%"><label for="resist_per_level">Resist Per Level:</label><br/><input type="text" id="resist_per_level" name="resist_per_level" value="<?=$resist_per_level ?? ""?>" size="5"></td>
                  <td style="padding: 3px; width: 16%"><label for="resist_cap">Resist Cap:</label><br/><input type="text" id="resist_cap" name="resist_cap" value="<?=$resist_cap ?? ""?>" size="5"></td>
              </tr>
              <tr>
                  <td style="padding: 3px; width: 17%"><label for="pvpresistbase">PVP Resist Base:</label><br/><input type="text" id="pvpresistbase" name="pvpresistbase" value="<?=$pvpresistbase ?? ""?>" size="5"></td>
                  <td style="padding: 3px; width: 17%"><label for="pvpresistcalc">PVP Resist Calc:</label><br/><input type="text" id="pvpresistcalc" name="pvpresistcalc" value="<?=$pvpresistcalc ?? ""?>" size="5"></td>
                  <td style="padding: 3px; width: 16%"><label for="pvpresistcap">PVP Resist Cap:</label><br/><input type="text" id="pvpresistcap" name="pvpresistcap" value="<?=$pvpresistcap ?? ""?>" size="5"></td>
                  <td style="padding: 3px; width: 17%"><label for="pvp_duration">PVP Duration:</label><br/><input type="text" id="pvp_duration" name="pvp_duration" value="<?=$pvp_duration ?? ""?>" size="5"></td>
                  <td style="padding: 3px; width: 16%"><label for="pvp_duration_cap">PVP Duration Cap:</label><br/><input type="text" id="pvp_duration_cap" name="pvp_duration_cap" value="<?=$pvp_duration_cap ?? ""?>" size="5"></td>
                <td style="padding: 3px; width: 17%">&nbsp;</td>
              </tr>
            </table>
          </fieldset><br/>
          <fieldset style="text-align:left;">
            <legend><strong><span style="font-size: 18px;">Spell Effects</span></strong></legend>
            <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;" cellpadding="3">
              <tr>
                  <td><label for="effectid1">Spell Effect 1:</label><br/>
                  <select id="effectid1" name="effectid1" style="width:150px;">
                      <?php
                      $effects = $effects ?? array();
                      foreach($effects as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($effectid1) && $k == $effectid1) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td><label for="effect_base_value1">Base Value 1:</label><br/><input type="text" size="4" id="effect_base_value1" name="effect_base_value1" value="<?=$effect_base_value1 ?? ""?>"></td>
                  <td><label for="max1">Max Value 1:</label><br/><input type="text" size="4" id="max1" name="max1" value="<?=$max1 ?? ""?>"></td>
                  <td><label for="effect_limit_value1">Limit Value 1:</label><br/><input type="text" size="4" id="effect_limit_value1" name="effect_limit_value1" value="<?=$effect_limit_value1 ?? ""?>"></td>
                  <td><label for="formula1">Formula 1:</label><br/>
                  <select id="formula1" name="formula1" style="width:175px;">
                      <?php
                      $formulas = $formulas ?? array();
                      foreach($formulas as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($formula1) && $k == $formula1) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td><label for="fmm1">Mult(1-99):</label><br/><input type="text" size="2" id="fmm1" name="fmm1" value="<?php echo (isset($formula1) && intval($formula1) > 0 and intval($formula1) < 100) ? "$formula1" : "" ?>"></td>
              </tr>
              <tr>
                  <td><label for="effectid2">Spell Effect 2:</label><br/>
                  <select id="effectid2" name="effectid2" style="width:150px;">
                      <?php foreach($effects as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($effectid2) && $k == $effectid2) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td><label for="effect_base_value1">Base Value 2:</label><br/><input type="text" size="4" id="effect_base_value1" name="effect_base_value2" value="<?=$effect_base_value2 ?? ""?>"></td>
                  <td><label for="max2">Max Value 2:</label><br/><input type="text" size="4" id="max2" name="max2" value="<?=$max2 ?? ""?>"></td>
                  <td><label for="effect_limit_value2">Limit Value 2:</label><br/><input type="text" size="4" id="effect_limit_value2" name="effect_limit_value2" value="<?=$effect_limit_value2 ?? ""?>"></td>
                  <td><label for="formula2">Formula 2:</label><br/>
                  <select id="formula2" name="formula2" style="width:175px;">
                      <?php foreach($formulas as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($formula2) && $k == $formula2) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td><label for="fmm2">Mult(1-99):</label><br/><input type="text" size="2" id="fmm2" name="fmm2" value="<?php echo (isset($formula2) && intval($formula2) > 0 and intval($formula2) < 100) ? "$formula2" : "" ?>"></td>
              </tr>
              <tr>
                  <td><label for="effectid3">Spell Effect 3:</label><br/>
                  <select id="effectid3" name="effectid3" style="width:150px;">
                      <?php foreach($effects as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($effectid3) && $k == $effectid3) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td><label for="effect_base_value3">Base Value 3:</label><br/><input type="text" size="4" id="effect_base_value3" name="effect_base_value3" value="<?=$effect_base_value3 ?? ""?>"></td>
                  <td><label for="max3">Max Value 3:</label><br/><input type="text" size="4" id="max3" name="max3" value="<?=$max3 ?? ""?>"></td>
                  <td><label for="effect_limit_value3">Limit Value 3:</label><br/><input type="text" size="4" id="effect_limit_value3" name="effect_limit_value3" value="<?=$effect_limit_value3 ?? ""?>"></td>
                  <td><label for="formula3">Formula 3:</label><br/>
                  <select id="formula3" name="formula3" style="width:175px;">
                      <?php foreach($formulas as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($formula3) && $k == $formula3) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td><label for="fmm3">Mult(1-99):</label><br/><input type="text" size="2" id="fmm3" name="fmm3" value="<?php echo (isset($formula3) && intval($formula3) > 0 and intval($formula3) < 100) ? "$formula3" : "" ?>"></td>
              </tr>
              <tr>
                  <td><label for="effectid4">Spell Effect 4:</label><br/>
                  <select id="effectid4" name="effectid4" style="width:150px;">
                      <?php foreach($effects as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($effectid4) && $k == $effectid4) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td><label for="effect_base_value4">Base Value 4:</label><br/><input type="text" size="4" id="effect_base_value4" name="effect_base_value4" value="<?=$effect_base_value4 ?? ""?>"></td>
                  <td><label for="max4">Max Value 4:</label><br/><input type="text" size="4" id="max4" name="max4" value="<?=$max4 ?? ""?>"></td>
                  <td><label for="effect_limit_value4">Limit Value 4:</label><br/><input type="text" size="4" id="effect_limit_value4" name="effect_limit_value4" value="<?=$effect_limit_value4 ?? ""?>"></td>
                  <td><label for="formula4">Formula 4:</label><br/>
                  <select id="formula4" name="formula4" style="width:175px;">
                      <?php foreach($formulas as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($formula4) && $k == $formula4) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td><label for="fmm4">Mult(1-99):</label><br/><input type="text" size="2" id="fmm4" name="fmm4" value="<?php echo (isset($formula4) && intval($formula4) > 0 and intval($formula4) < 100) ? "$formula4" : "" ?>"></td>
              </tr>
              <tr>
                  <td><label for="effectid5">Spell Effect 5:</label><br/>
                  <select id="effectid5" name="effectid5" style="width:150px;">
                      <?php foreach($effects as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($effectid5) && $k == $effectid5) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td><label for="effect_base_value5">Base Value 5:</label><br/><input type="text" size="4" id="effect_base_value5" name="effect_base_value5" value="<?=$effect_base_value5 ?? ""?>"></td>
                  <td><label for="max5">Max Value 5:</label><br/><input type="text" size="4" id="max5" name="max5" value="<?=$max5 ?? ""?>"></td>
                  <td><label for="effect_limit_value5">Limit Value 5:</label><br/><input type="text" size="4" id="effect_limit_value5" name="effect_limit_value5" value="<?=$effect_limit_value5 ?? ""?>"></td>
                  <td><label for="formula5">Formula 5:</label><br/>
                  <select id="formula5" name="formula5" style="width:175px;">
                      <?php foreach($formulas as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($formula5) && $k == $formula5) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td><label for="fmm5">Mult(1-99):</label><br/><input type="text" size="2" id="fmm5" name="fmm5" value="<?php echo (isset($formula5) && intval($formula5) > 0 and intval($formula5) < 100) ? "$formula5" : "" ?>"></td>
              </tr>
              <tr>
                  <td><label for="effectid6">Spell Effect 6:</label><br/>
                  <select id="effectid6" name="effectid6" style="width:150px;">
                      <?php foreach($effects as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($effectid6) && $k == $effectid6) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td><label for="effect_base_value6">Base Value 6:</label><br/><input type="text" size="4" id="effect_base_value6" name="effect_base_value6" value="<?=$effect_base_value6 ?? ""?>"></td>
                  <td><label for="max6">Max Value 6:</label><br/><input type="text" size="4" id="max6" name="max6" value="<?=$max6 ?? ""?>"></td>
                  <td><label for="effect_limit_value6">Limit Value 6:</label><br/><input type="text" size="4" id="effect_limit_value6" name="effect_limit_value6" value="<?=$effect_limit_value6 ?? ""?>"></td>
                  <td><label for="formula6">Formula 6:</label><br/>
                  <select id="formula6" name="formula6" style="width:175px;">
                      <?php foreach($formulas as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($formula6) && $k == $formula6) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td><label for="fmm6">Mult(1-99):</label><br/><input type="text" size="2" id="fmm6" name="fmm6" value="<?php echo (isset($formula6) && intval($formula6) > 0 and intval($formula6) < 100) ? "$formula6" : "" ?>"></td>
              </tr>
              <tr>
                  <td><label for="effectid7">Spell Effect 7:</label><br/>
                  <select id="effectid7" name="effectid7" style="width:150px;">
                      <?php foreach($effects as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($effectid7) && $k == $effectid7) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td><label for="effect_base_value7">Base Value 7:</label><br/><input type="text" size="4" id="effect_base_value7" name="effect_base_value7" value="<?=$effect_base_value7 ?? ""?>"></td>
                  <td><label for="max7">Max Value 7:</label><br/><input type="text" size="4" id="max7" name="max7" value="<?=$max7 ?? ""?>"></td>
                  <td><label for="effect_limit_value7">Limit Value 7:</label><br/><input type="text" size="4" id="effect_limit_value7" name="effect_limit_value7" value="<?=$effect_limit_value7 ?? ""?>"></td>
                  <td><label for="formula7">Formula 7:</label><br/>
                  <select id="formula7" name="formula7" style="width:175px;">
                      <?php foreach($formulas as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($formula7) && $k == $formula7) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td><label for="fmm7">Mult(1-99):</label><br/><input type="text" size="2" id="fmm7" name="fmm7" value="<?php echo (isset($formula7) && intval($formula7) > 0 and intval($formula7) < 100) ? "$formula7" : "" ?>"></td>
              </tr>
              <tr>
                  <td><label for="effectid8">Spell Effect 8:</label><br/>
                  <select id="effectid8" name="effectid8" style="width:150px;">
                      <?php foreach($effects as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($effectid8) && $k == $effectid8) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td><label for="effect_base_value8">Base Value 8:</label><br/><input type="text" size="4" id="effect_base_value8" name="effect_base_value8" value="<?=$effect_base_value8 ?? ""?>"></td>
                  <td><label for="max8">Max Value 8:</label><br/><input type="text" size="4" id="max8" name="max8" value="<?=$max8 ?? ""?>"></td>
                  <td><label for="effect_limit_value8">Limit Value 8:</label><br/><input type="text" size="4" id="effect_limit_value8" name="effect_limit_value8" value="<?=$effect_limit_value8 ?? ""?>"></td>
                  <td><label for="formula8">Formula 8:</label><br/>
                  <select id="formula8" name="formula8" style="width:175px;">
                      <?php foreach($formulas as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($formula8) && $k == $formula8) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td><label for="fmm8">Mult(1-99):</label><br/><input type="text" size="2" id="fmm8" name="fmm8" value="<?php echo (isset($formula8) && intval($formula8) > 0 and intval($formula8) < 100) ? "$formula8" : "" ?>"></td>
              </tr>
              <tr>
                  <td><label for="effectid9">Spell Effect 9:</label><br/>
                  <select id="effectid9" name="effectid9" style="width:150px;">
                      <?php foreach($effects as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($effectid9) && $k == $effectid9) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td><label for="effect_base_value9">Base Value 9:</label><br/><input type="text" size="4" id="effect_base_value9" name="effect_base_value9" value="<?=$effect_base_value9 ?? ""?>"></td>
                  <td><label for="max9">Max Value 9:</label><br/><input type="text" size="4" id="max9" name="max9" value="<?=$max9 ?? ""?>"></td>
                  <td><label for="effect_limit_value9">Limit Value 9:</label><br/><input type="text" size="4" id="effect_limit_value9" name="effect_limit_value9" value="<?=$effect_limit_value9 ?? ""?>"></td>
                  <td><label for="formula9">Formula 9:</label><br/>
                  <select id="formula9" name="formula9" style="width:175px;">
                      <?php foreach($formulas as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($formula9) && $k == $formula9) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td><label for="fmm9">Mult(1-99):</label><br/><input type="text" size="2" id="fmm9" name="fmm9" value="<?php echo (isset($formula9) && intval($formula9) > 0 and intval($formula9) < 100) ? "$formula9" : "" ?>"></td>
              </tr>
              <tr>
                  <td><label for="effectid10">Spell Effect 10:</label><br/>
                  <select id="effectid10" name="effectid10" style="width:150px;">
                      <?php foreach($effects as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($effectid10) && $k == $effectid10) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td><label for="effect_base_value10">Base Value 10:</label><br/><input type="text" size="4" id="effect_base_value10" name="effect_base_value10" value="<?=$effect_base_value10 ?? ""?>"></td>
                  <td><label for="max10">Max Value 10:</label><br/><input type="text" size="4" id="max10" name="max10" value="<?=$max10 ?? ""?>"></td>
                  <td><label for="effect_limit_value10">Limit Value 10:</label><br/><input type="text" size="4" id="effect_limit_value10" name="effect_limit_value10" value="<?=$effect_limit_value10 ?? ""?>"></td>
                  <td><label for="formula10">Formula 10:</label><br/>
                  <select id="formula10" name="formula10" style="width:175px;">
                      <?php foreach($formulas as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($formula10) && $k == $formula10) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td><label for="fmm10">Mult(1-99):</label><br/><input type="text" size="2" id="fmm10" name="fmm10" value="<?php echo (isset($formula10) && intval($formula10) > 0 and intval($formula10) < 100) ? "$formula10" : "" ?>"></td>
              </tr>
              <tr>
                  <td><label for="effectid11">Spell Effect 11:</label><br/>
                  <select id="effectid11" name="effectid11" style="width:150px;">
                      <?php foreach($effects as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($effectid11) && $k == $effectid11) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td><label for="effect_base_value11">Base Value 11:</label><br/><input type="text" size="4" id="effect_base_value11" name="effect_base_value11" value="<?=$effect_base_value11 ?? ""?>"></td>
                  <td><label for="max11">Max Value 11:</label><br/><input type="text" size="4" id="max11" name="max11" value="<?=$max11 ?? ""?>"></td>
                  <td><label for="effect_limit_value11">Limit Value 11:</label><br/><input type="text" size="4" id="effect_limit_value11" name="effect_limit_value11" value="<?=$effect_limit_value11 ?? ""?>"></td>
                  <td><label for="formula11">Formula 11:</label><br/>
                  <select id="formula11" name="formula11" style="width:175px;">
                      <?php foreach($formulas as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($formula11) && $k == $formula11) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td><label for="fmm11">Mult(1-99):</label><br/><input type="text" size="2" id="fmm11" name="fmm11" value="<?php echo (isset($formula11) && intval($formula11) > 0 and intval($formula11) < 100) ? "$formula11" : "" ?>"></td>
              </tr>
              <tr>
                  <td><label for="effectid12">Spell Effect 12:</label><br/>
                  <select id="effectid12" name="effectid12" style="width:150px;">
                      <?php foreach($effects as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($effectid12) && $k == $effectid12) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td><label for="effect_base_value12">Base Value 12:</label><br/><input type="text" size="4" id="effect_base_value12" name="effect_base_value12" value="<?=$effect_base_value12 ?? ""?>"></td>
                  <td><label for="max12">Max Value 12:</label><br/><input type="text" size="4" id="max12" name="max12" value="<?=$max12 ?? ""?>"></td>
                  <td><label for="effect_limit_value12">Limit Value 12:</label><br/><input type="text" size="4" id="effect_limit_value12" name="effect_limit_value12" value="<?=$effect_limit_value12 ?? ""?>"></td>
                  <td><label for="formula12">Formula 12:</label><br/>
                  <select id="formula12" name="formula12" style="width:175px;">
                      <?php foreach($formulas as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($formula12) && $k == $formula12) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td><label for="fmm12">Mult(1-99):</label><br/><input type="text" size="2" id="fmm12" name="fmm12" value="<?php echo (isset($formula12) && intval($formula12) > 0 and intval($formula12) < 100) ? "$formula12" : "" ?>"></td>
              </tr>
            </table>
          </fieldset><br/>
          <fieldset style="text-align:left;">
            <legend><strong><span style="font-size: 18px;">Reagents</span></strong></legend>
            <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
              <tr>
                  <td style="padding: 3px;"><label for="components1">Components 1:</label><br/><input type="text" id="components1" name="components1" value="<?=$components1 ?? ""?>"></td>
                  <td style="padding: 3px;"><label for="component_counts1">Component Count 1:</label><br/><input type="text" id="component_counts1" name="component_counts1" value="<?=$component_counts1 ?? ""?>"></td>
                  <td style="padding: 3px;"><label for="NoexpendReagent1">No Expend Reagent 1:</label><br/><input type="text" id="NoexpendReagent1" name="NoexpendReagent1" value="<?=$NoexpendReagent1 ?? ""?>"></td>
              </tr>
              <tr>
                  <td style="padding: 3px;"><label for="components2">Components 2:</label><br/><input type="text" id="components2" name="components2" value="<?=$components2 ?? ""?>"></td>
                  <td style="padding: 3px;"><label for="component_counts2">Component Count 2:</label><br/><input type="text" id="component_counts2" name="component_counts2" value="<?=$component_counts2 ?? ""?>"></td>
                  <td style="padding: 3px;"><label for="NoexpendReagent2">No Expend Reagent 2:</label><br/><input type="text" id="NoexpendReagent2" name="NoexpendReagent2" value="<?=$NoexpendReagent2 ?? ""?>"></td>
              </tr>
              <tr>
                  <td style="padding: 3px;"><label for="components3">Components 3:</label><br/><input type="text" id="components3" name="components3" value="<?=$components3 ?? ""?>"></td>
                  <td style="padding: 3px;"><label for="component_counts3">Component Count 3:</label><br/><input type="text" id="component_counts3" name="component_counts3" value="<?=$component_counts3 ?? ""?>"></td>
                  <td style="padding: 3px;"><label for="NoexpendReagent3">No Expend Reagent 3:</label><br/><input type="text" id="NoexpendReagent3" name="NoexpendReagent3" value="<?=$NoexpendReagent3 ?? ""?>"></td>
              </tr>
              <tr>
                  <td style="padding: 3px;"><label for="components4">Components 4:</label><br/><input type="text" id="components4" name="components4" value="<?=$components4 ?? ""?>"></td>
                  <td style="padding: 3px;"><label for="component_counts4">Component Count 4:</label><br/><input type="text" id="component_counts4" name="component_counts4" value="<?=$component_counts4 ?? ""?>"></td>
                  <td style="padding: 3px;"><label for="NoexpendReagent4">No Expend Reagent 4:</label><br/><input type="text" id="NoexpendReagent4" name="NoexpendReagent4" value="<?=$NoexpendReagent4 ?? ""?>"></td>
              </tr>
            </table>
          </fieldset><br/>
          <fieldset style="text-align:left;">
            <legend><strong><span style="font-size: 18px;">Class Levels</span></strong></legend>
            <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
              <tr>
                  <td style="padding: 3px;"><label for="classes1">Warrior:</label><br/><input type="text" id="classes1" name="classes1" size="3" value="<?=$classes1 ?? ""?>"></td>
                  <td style="padding: 3px;"><label for="classes2">Cleric:</label><br/><input type="text" id="classes2" name="classes2" size="3" value="<?=$classes2 ?? ""?>"></td>
                  <td style="padding: 3px;"><label for="classes3">Paladin:</label><br/><input type="text" id="classes3" name="classes3" size="3" value="<?=$classes3 ?? ""?>"></td>
                  <td style="padding: 3px;"><label for="classes4">Ranger:</label><br/><input type="text" id="classes4" name="classes4" size="3" value="<?=$classes4 ?? ""?>"></td>
                  <td style="padding: 3px;"><label for="classes5">Shadowknight:</label><br/><input type="text" id="classes5" name="classes5" size="3" value="<?=$classes5 ?? ""?>"></td>
                  <td style="padding: 3px;"><label for="classes6">Druid:</label><br/><input type="text" id="classes6" name="classes6" size="3" value="<?=$classes6 ?? ""?>"></td>
                  <td style="padding: 3px;"><label for="classes7">Monk:</label><br/><input type="text" id="classes7" name="classes7" size="3" value="<?=$classes7 ?? ""?>"></td>
                  <td style="padding: 3px;"><label for="classes8">Bard:</label><br/><input type="text" id="classes8" name="classes8" size="3" value="<?=$classes8 ?? ""?>"></td>
              </tr>
              <tr>
                  <td style="padding: 3px;"><label for="classes9">Rogue:</label><br/><input type="text" id="classes9" name="classes9" size="3" value="<?=$classes9 ?? ""?>"></td>
                  <td style="padding: 3px;"><label for="classes10">Shaman:</label><br/><input type="text" id="classes10" name="classes10" size="3" value="<?=$classes10 ?? ""?>"></td>
                  <td style="padding: 3px;"><label for="classes11">Necromancer:</label><br/><input type="text" id="classes11" name="classes11" size="3" value="<?=$classes11 ?? ""?>"></td>
                  <td style="padding: 3px;"><label for="classes12">Wizard:</label><br/><input type="text" id="classes12" name="classes12" size="3" value="<?=$classes12 ?? ""?>"></td>
                  <td style="padding: 3px;"><label for="classes13">Magician:</label><br/><input type="text" id="classes13" name="classes13" size="3" value="<?=$classes13 ?? ""?>"></td>
                  <td style="padding: 3px;"><label for="classes14">Enchanter:</label><br/><input type="text" id="classes14" name="classes14" size="3" value="<?=$classes14 ?? ""?>"></td>
                  <td style="padding: 3px;"><label for="classes15">Beastlord:</label><br/><input type="text" id="classes15" name="classes15" size="3" value="<?=$classes15 ?? ""?>"></td>
              </tr>
            </table>
          </fieldset><br/>
          <fieldset style="text-align:left;">
            <legend><strong><span style="font-size: 18px;">Deities</span></strong></legend>
            <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
              <tr>
                <td style="padding: 3px; width: 25%">
                    <input type="checkbox" id="deities1" name="deities1" <?php echo !empty($deities1) ? "checked" : "" ?>> <label for="deities1">Bertoxxulous</label><br/>
                    <input type="checkbox" id="deities2" name="deities2" <?php echo !empty($deities2) ? "checked" : "" ?>> <label for="deities2">Brell Serilis</label><br/>
                    <input type="checkbox" id="deities3" name="deities3" <?php echo !empty($deities3) ? "checked" : "" ?>> <label for="deities3">Cazic Thule</label><br/>
                    <input type="checkbox" id="deities4" name="deities4" <?php echo !empty($deities4) ? "checked" : "" ?>> <label for="deities4">Erollisi Marr</label><br/>
                </td>
                <td style="padding: 3px; width: 25%">
                    <input type="checkbox" id="deities5" name="deities5" <?php echo !empty($deities5) ? "checked" : "" ?>> <label for="deities5">Bristlebane</label><br/>
                    <input type="checkbox" id="deities6" name="deities6" <?php echo !empty($deities6) ? "checked" : "" ?>> <label for="deities6">Innoruuk</label><br/>
                    <input type="checkbox" id="deities7" name="deities7" <?php echo !empty($deities7) ? "checked" : "" ?>> <label for="deities7">Karana</label><br/>
                    <input type="checkbox" id="deities8" name="deities8" <?php echo !empty($deities8) ? "checked" : "" ?>> <label for="deities8">Mithaniel Marr</label><br/>
                </td>
                <td style="padding: 3px; width: 25%">
                    <input type="checkbox" id="deities9" name="deities9" <?php echo !empty($deities9) ? "checked" : "" ?>> <label for="deities9">Prexus</label><br/>
                    <input type="checkbox" id="deities10" name="deities10" <?php echo !empty($deities10) ? "checked" : "" ?>> <label for="deities10">Quellious</label><br/>
                    <input type="checkbox" id="deities11" name="deities11" <?php echo !empty($deities11) ? "checked" : "" ?>> <label for="deities11">Rallos Zek</label><br/>
                    <input type="checkbox" id="deities12" name="deities12" <?php echo !empty($deities12) ? "checked" : "" ?>> <label for="deities12">Rodcet Nife</label><br/>
                </td>
                <td style="padding: 3px; width: 25%">
                    <input type="checkbox" id="deities13" name="deities13" <?php echo !empty($deities13) ? "checked" : "" ?>> <label for="deities13">Solusek Ro</label><br/>
                    <input type="checkbox" id="deities14" name="deities14" <?php echo !empty($deities14) ? "checked" : "" ?>> <label for="deities14">The Tribunal</label><br/>
                    <input type="checkbox" id="deities15" name="deities15" <?php echo !empty($deities15) ? "checked" : "" ?>> <label for="deities15">Tunare</label><br/>
                    <input type="checkbox" id="deities16" name="deities16" <?php echo !empty($deities16) ? "checked" : "" ?>> <label for="deities16">Veeshan</label><br/>
                </td>
              </tr>
              <tr>
                  <td colspan="4" style="padding: 3px; text-align: center;"><input type="checkbox" id="deities0" name="deities0" <?php echo !empty($deities0) ? "checked" : "" ?>> <label for="deities0">Agnostic</label></td>
              </tr>
            </table>
          </fieldset><br/>
          <fieldset style="text-align:left;">
            <legend><strong><span style="font-size: 18px;">Spell Guide</span></strong></legend>
            <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
             <tr>
                 <td style="padding: 3px;"><label for="custom_icon">Custom Icon:</label><br/><input type="text" id="custom_icon" name="custom_icon" size="3" value="<?=$custom_icon ?? ""?>"></td>
                 <td style="padding: 3px; text-align: left; width: 50%"><label for="not_player_spell">Don't Display:</label><br/>
                <select id="not_player_spell" name="not_player_spell">
                  <option value="0"<?php echo (isset($not_player_spell) && $not_player_spell == 0) ? " selected" : ""?>>No</option>
                  <option value="1"<?php echo (isset($not_player_spell) &&  $not_player_spell == 1) ? " selected" : ""?>>Yes</option>
                </select>
              </td>
             </tr>
          </table>
          </fieldset><br/>
          <div class="center">
            <input type="submit" value="Submit Changes">
          </div>
        </div>
      </div>
    </div>
  </form>
