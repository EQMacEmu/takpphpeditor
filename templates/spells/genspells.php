<?php

$spellfile = "spells_en.txt";
global $mysql;

$spellquery = "SELECT 
  `id`,
  `name`,
  `player_1`,
  `teleport_zone`,
  `you_cast`,
  `other_casts`,
  `cast_on_you`,
  `cast_on_other`,
  `spell_fades`,
  `range`,
  `aoerange`,
  TRIM(`pushback`)+0,
  TRIM(`pushup`)+0,
  `cast_time`,
  `recovery_time`,
  `recast_time`,
  `buffdurationformula`,
  `buffduration`,
  `AEDuration`,
  `mana`,
  `effect_base_value1`,
  `effect_base_value2`,
  `effect_base_value3`,
  `effect_base_value4`,
  `effect_base_value5`,
  `effect_base_value6`,
  `effect_base_value7`,
  `effect_base_value8`,
  `effect_base_value9`,
  `effect_base_value10`,
  `effect_base_value11`,
  `effect_base_value12`,
  `effect_limit_value1`,
  `effect_limit_value2`,
  `effect_limit_value3`,
  `effect_limit_value4`,
  `effect_limit_value5`,
  `effect_limit_value6`,
  `effect_limit_value7`,
  `effect_limit_value8`,
  `effect_limit_value9`,
  `effect_limit_value10`,
  `effect_limit_value11`,
  `effect_limit_value12`,
  `icon`,
  `memicon`,
  `components1`,
  `components2`,
  `components3`,
  `components4`,
  `component_counts1`,
  `component_counts2`,
  `component_counts3`,
  `component_counts4`,
  `NoexpendReagent1`,
  `NoexpendReagent2`,
  `NoexpendReagent3`,
  `NoexpendReagent4`,
  `formula1`,
  `formula2`,
  `formula3`,
  `formula4`,
  `formula5`,
  `formula6`,
  `formula7`,
  `formula8`,
  `formula9`,
  `formula10`,
  `formula11`,
  `formula12`,
  `LightType`,
  `goodEffect`,
  `Activated`,
  `resisttype`,
  `effectid1`,
  `effectid2`,
  `effectid3`,
  `effectid4`,
  `effectid5`,
  `effectid6`,
  `effectid7`,
  `effectid8`,
  `effectid9`,
  `effectid10`,
  `effectid11`,
  `effectid12`,
  `targettype`,
  `basediff`,
  `skill`,
  `zonetype`,
  `EnvironmentType`,
  `TimeOfDay`,
  `classes1`,
  `classes2`,
  `classes3`,
  `classes4`,
  `classes5`,
  `classes6`,
  `classes7`,
  `classes8`,
  `classes9`,
  `classes10`,
  `classes11`,
  `classes12`,
  `classes13`,
  `classes14`,
  `classes15`,
  `CastingAnim`,
  `TargetAnim`,
  `TravelType`,
  `SpellAffectIndex`,
  `disallow_sit`,
  `deities0`,
  `deities1`,
  `deities2`,
  `deities3`,
  `deities4`,
  `deities5`,
  `deities6`,
  `deities7`,
  `deities8`,
  `deities9`,
  `deities10`,
  `deities11`,
  `deities12`,
  `deities13`,
  `deities14`,
  `deities15`,
  `deities16`,
  `npc_no_cast`,
  `ai_pt_bonus`,
  `new_icon`,
  `spellanim`,
  `uninterruptable`,
  `ResistDiff`,
  `dot_stacking_exempt`,
  `deleteable`,
  `RecourseLink`,
  `no_partial_resist`,
  `small_targets_only`,
  `use_persistent_particles`,
  `short_buff_box`,
  `descnum`,
  `typedescnum`,
  `effectdescnum`,
  `effectdescnum2`,
  `npc_no_los`
   FROM spells_new WHERE id < 3999 ORDER BY id";
$res = $mysql->query($spellquery);

$fh = fopen($spellfile, 'w');
if (!$fh) {
    die("Error opening $spellfile for writing.  Make sure the path is writable.");
}

$cnt = 0;
$lastid = 0;

//Based on export_spells.pl bundled with eqemu, the spells_us.txt file is just a ^ delemited copy of the spell table.
while ($row = $res->fetch_assoc()) {
    $cnt++;
    if ($row['id'] > $lastid) {
        $lastid = $row['id'];
    }
    fwrite($fh, implode("^", $row) . "\n");
}

fclose($fh);

?>
<table class="edit_form">
    <tr>
        <td class="edit_form_header">Generate Spell File</td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <div class="center">
                <?php echo $cnt; ?> spells written.<br><?php echo $lastid; ?> is the highest ID<br><b><a
                            href="spells_en.txt">Right click and choose 'Save Link As' or 'Save Target As' to download
                        spell file</a></b>
            </div>
        </td>
    </tr>
</table>
