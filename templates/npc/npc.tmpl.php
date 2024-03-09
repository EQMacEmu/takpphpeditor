<?php $export_sql_array = export_sql(); ?>
<div id="sql_block" style="display:none;">
    <div class="center">
        <label for="insert_sql"></label>
        <textarea id="insert_sql" name="insert_sql" rows="3"
                  cols="90"><?= $export_sql_array['insert'] ?></textarea><br/><br/>
        <label for="update_sql"></label>
        <textarea id="update_sql" name="update_sql" rows="3"
                  cols="90"><?= $export_sql_array['update'] ?></textarea><br/><br/>
        <button type="button" id="copy_insert" onClick="clipboardData.setData('Text', insert_sql.value);">Copy INSERT to
            Clipboard
        </button>&nbsp;
        <button type="button" id="copy_update" onClick="clipboardData.setData('Text', update_sql.value);">Copy UPDATE to
            Clipboard
        </button>&nbsp;
        <button type="button" id="hide_sql"
                onClick="document.getElementById('sql_block').style.display='none';document.getElementById('sql_image').style.display='inline';">
            Hide SQL
        </button>
    </div>
    <br/>
</div>
<form name="npc" method="post"
      action="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=28">
    <div class="table_container">
        <div class="table_header">
            <div style="float:right">
                <a onClick="document.getElementById('sql_block').style.display='block';document.getElementById('sql_image').style.display='none';"><img
                            id="sql_image" src="images/sql.gif" style="border: 0;" alt="SQL Icon" title="Show SQL"></a>

                <a href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=42"><img
                            src="images/add.gif" style="border: 0;" alt="Add Icon" title="Add an NPC"></a>
                <a href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=1"><img
                            src="images/c_table.gif" style="border: 0;" alt="Edit Icon" title="Edit this NPC"></a>
                <a href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=43"><img
                            src="images/upgrade.gif" style="border: 0;" alt="Upgrade Icon"
                            title="Change NPC's Level"></a>
                <a href="index.php?editor=npcmultiedit&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>"><img
                            src="images/edit.gif" style="border: 0;" alt="Multi-Edit Icon" title="Multi-Edit NPCs"></a>
                <a href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=85"><img
                            src="images/create.gif" style="border: 0;" alt="Mass Edit Icon" title="Mass Edit Stats"></a>
                <a href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=40"><img
                            src="images/zone.gif" style="border: 0;" alt="Zone Icon" title="Get next npcid for a zone"></a>
                <a onClick="return confirm('Really delete npcid <?= $npcid ?>?');"
                   href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=24"><img
                            src="images/table.gif" style="border: 0;" alt="Delete Icon" title="Delete this NPC"></a>
            </div>
            <?= $id ?>
            - <?= $name ?? "" ?> <?php echo(!empty($lastname) ? "($lastname)" : ''); ?><?php echo isset($notfound) ? '(NPC with this ID does not exist)' : '' ?>
        </div>
        <div class="table_content">
            <table style="border-collapse: collapse; border-spacing: 0; border: 0; width: 100%;">
                <tr>
                    <td>
                        <div class="center">
                            <h1><?= $name ?? "" ?><br/>(<?php echo(!empty($lastname) ? "$lastname" : 'no title'); ?>)
                            </h1><br/>
                            <table style="font-size: 12px; margin-bottom: 80px;">
                                <tr>
                                    <td>
                                        <?php if (isset($isquest) && $isquest == 1) { ?>
                                            <a href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=71">
                                                <div class="center"><strong>Is Quest NPC</strong></div>
                                                <br/> </a>
                                        <?php } ?>
                                        <strong>Race:</strong> <?php $race = $race ?? ""; echo "<a title='Race: " . $race . "'>" . $races[$race] . "</a>"; ?>
                                        <br/>
                                        <strong>Class:</strong> <?php $class = $class ?? ""; echo "<a title='Class: " . $class . "'>" . $classes[$class] . "</a>"; ?>
                                        <br/>
                                        <strong>Level:</strong> <?= $level ?><br/>
                                        <strong>Max Level:</strong> <?= $maxlevel ?? "" ?><br/>
                                        <strong>Body
                                            Type:</strong> <?php $bodytype = $bodytype ?? ""; echo "<a title='Body Type: " . $bodytype . "'>" . $bodytypes[$bodytype] . "</a>"; ?>
                                        <br/>
                                        <strong>Vendor:</strong> <a
                                                href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=22"
                                                title="View/Change"><?php echo(isset($merchant_id) && $merchant_id != 0 ? $merchant_id : "no"); ?></a><br/>
                                        <?php if (isset($armortint_id) && $armortint_id > 0) { ?>
                                            <strong>Tint:</strong> <a
                                                    href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&tint_id=<?= $armortint_id ?>&action=33"><?= $armortint_id ?></a>
                                            <br>
                                        <?php } else { ?>
                                            <strong>Tint:</strong> <a
                                                    href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=35"
                                                    title="View/Change"><?php echo "no"; ?></a><br>
                                        <?php } ?>
                                        <?php if ($pet == 1) { ?>
                                            <strong>Pet:</strong> <a
                                                    href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=56"
                                                    title="View/Change"><?php echo "yes"; ?></a><br>
                                        <?php } else { ?>
                                            <strong>Pet:</strong> <a
                                                    href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=54"
                                                    title="View/Change"><?php echo "no"; ?></a><br>
                                        <?php } ?>
                                        <?php if ($emoteid > 0) { ?>
                                            <strong>EmoteID:</strong> <a
                                                    href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&emoteid=<?= $emoteid ?>&action=72"><?= $emoteid ?></a>
                                        <?php } else { ?>
                                            <strong>EmoteID:</strong> <a
                                                    href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&emoteid=<?= $emoteid ?>&action=76">none</a>
                                        <?php } ?>

                                    </td>
                                </tr>
                            </table>
                            <div style="padding: 10px; border: 1px solid grey; margin-right: 10px;">
                                <b>NPC Faction ID</b>: <?= $npc_faction_id ?? "" ?> [<a
                                        href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=3">edit</a>]
                                [<a href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&npcfid=<?= $npc_faction_id ?? "" ?>&action=47">update</a>]<br/>
                                <?php if (isset($npc_faction_id) && $npc_faction_id > 0) { ?>
                                    "
                                    <a href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=10"><?= $factionname ?? "" ?></a>"
                                    <br/><br/>
                                <?php } ?>
                                <b>Primary Faction</b>: [<a
                                        href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=12">edit</a>]<br/>
                                <?php echo (!empty($primaryfactionname)) ? "<a title='Faction: " . ($primaryfaction ?? "") . "'>" . $primaryfactionname . "</a>" : "None"; ?>
                                <br/><br/>
                                <b>Faction Hits:</b> <a
                                        href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=15"><img
                                            src="images/add.gif" style="border: 0;" alt="Add Icon"
                                            title="Add Faction Hit"></a><br/>
                                <?php if (!empty($faction_hits)) { ?>
                                    <table style="width: 100%;">
                                        <?php $temp_ = 0; ?>
                                        <?php foreach ($faction_hits as $hit): extract($hit); ?>
                                            <tr>
                                                <td>(<?= $sort_order ?>)</td>
                                                <td><?php echo "<a title='Faction ID: " . $faction_id . "'>" . $factions[$faction_id] . "</a>"; ?></td>
                                                <td><?= $value ?></td>
                                                <td><?= $faction_values[$npc_value] ?></td>
                                                <td>(<?= $tmpfacshort[$temp] ?>)</td>
                                                <td style="text-align: right;">
                                                    <a href="index.php?editor=npc&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcid ?>&npc_faction_id=<?= $npc_faction_id ?>&faction_id=<?= $faction_id ?>&action=19">
                                                        <img src="images/edit2.gif" style="border: 0;" alt="Edit Icon"
                                                             title="Edit this Faction Hit"></a>
                                                    <a href="index.php?editor=npc&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcid ?>&npc_faction_id=<?= $npc_faction_id ?>&faction_id=<?= $faction_id ?>&action=21"
                                                       onClick="return confirm('Are you sure you want to remove this faction hit?');"><img
                                                                src="images/remove.gif" alt="Remove Icon"></a>
                                                    <?php if ($temp_ != 0) { ?>
                                                        <a href="index.php?editor=npc&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcid ?>&npc_faction_id=<?= $npc_faction_id ?>&faction_id=<?= $faction_id ?>&action=83">
                                                            <img src="images/upgrade.gif" style="border: 0;"
                                                                 alt="Upgrade Icon" title="Change order"></a>
                                                    <?php } else { ?>
                                                        <a><img src="images/blank.png" alt="Blank Icon"
                                                                style="border: 0;"></a>
                                                        <?php $temp_ = 1; ?>
                                                    <?php } ?>
                                                    <a href="index.php?editor=npc&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcid ?>&npc_faction_id=<?= $npc_faction_id ?>&faction_id=<?= $faction_id ?>&action=84"><img
                                                                src="images/downgrade.gif" alt="Downgrade Icon" style="border: 0;"
                                                                title="Change order"></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>
                                <?php } else { ?>
                                    None<br/>
                                <?php } ?>
                            </div>
                        </div>
                    </td>
                    <td>
                        <fieldset>
                            <legend><strong>Vitals</strong></legend>
                            <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
                                <tr>
                                    <td style="padding: 3px; text-align: left; width: 33%">AC: <?= $AC ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 33%">HP: <?= $hp ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 34%">Mana: <?= $mana ?? "" ?></td>
                                </tr>
                                <tr>
                                    <td style="padding: 3px; text-align: left; width: 33%">Run: <?= $runspeed ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 33%">Walk: <?= $walkspeed ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 34%">Exp%: <?= $exp_pct ?? "" ?>%</td>
                                </tr>
                                <tr>
                                    <td style="padding: 3px; text-align: left; width: 34%">+ATK: <?= $ATK ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 33%">See
                                        Invis: <?= $see_invis_text ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 34%">See
                                        ITU: <?= $see_invis_undead_text ?? "" ?></td>
                                </tr>
                                <tr>
                                    <td style="padding: 3px; text-align: left; width: 33%">See
                                        Sneak: <?= $see_sneak_text ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 33%">See Imp
                                        Hide: <?= $see_improved_hide_text ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 34%">Scalerate: <?= $scalerate ?? "" ?></td>
                                </tr>
                                <tr>
                                    <td style="padding: 3px; text-align: left; width: 34%">+Accuracy: <?= $Accuracy ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 33%">+Avoidance: <?= $avoidance ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 33%">&nbsp;</td>
                                </tr>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend><strong>Stats</strong></legend>
                            <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
                                <tr>
                                    <td style="padding: 3px; text-align: left; width: 33%">STR: <?= $STR ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 33%">STA: <?= $STA ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 34%">DEX: <?= $DEX ?? "" ?></td>
                                </tr>
                                <tr>
                                    <td style="padding: 3px; text-align: left; width: 33%">AGI: <?= $AGI ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 33%">INT: <?= $_INT ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 34%">WIS: <?= $WIS ?? "" ?></td>
                                </tr>
                                <tr>
                                    <td style="padding: 3px; text-align: left; width: 33%">CHA: <?= $CHA ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 33%">&nbsp;</td>
                                    <td style="padding: 3px; text-align: left; width: 34%">&nbsp;</td>
                                </tr>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend><strong>Resists</strong></legend>
                            <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
                                <?php ($mrper = ($MR ?? 0) * 0.5); ?>
                                <?php ($crper = ($CR ?? 0) * 0.5); ?>
                                <?php ($frper = ($FR ?? 0) * 0.5); ?>
                                <?php ($prper = ($PR ?? 0) * 0.5); ?>
                                <?php ($drper = ($DR ?? 0) * 0.5); ?>
                                <tr>
                                    <td style="padding: 3px; text-align: left; width: 33%">MR: <?= $MR ?? 0 ?> (<?= $mrper ?>%)</td>
                                    <td style="padding: 3px; text-align: left; width: 33%">CR: <?= $CR ?? 0 ?> (<?= $crper ?>%)</td>
                                    <td style="padding: 3px; text-align: left; width: 34%">FR: <?= $FR ?? 0 ?> (<?= $frper ?>%)</td>
                                </tr>
                                <tr>
                                    <td style="padding: 3px; text-align: left; width: 33%">PR: <?= $PR ?? 0 ?> (<?= $prper ?>%)</td>
                                    <td style="padding: 3px; text-align: left; width: 33%">DR: <?= $DR ?? 0 ?> (<?= $drper ?>%)</td>
                                    <td style="padding: 3px; text-align: left; width: 34%">&nbsp;</td>
                                </tr>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend><strong>Combat</strong></legend>
                            <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
                                <tr>
                                    <td style="padding: 3px; text-align: left; width: 33%">MinDmg: <?= $mindmg ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 33%">MaxDmg: <?= $maxdmg ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 34%">Attack
                                        Count: <?= $attack_count ?? "" ?></td>
                                </tr>
                                <tr>
                                    <td style="padding: 3px; text-align: left; width: 33%">Loottable
                                        ID: <?= $loottable_id ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 33%">Aggro: <?= $aggroradius ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 33%">Atk Delay: <?= $attack_delay ?? "" ?></td>
                                </tr>
                                <tr>
                                    <td style="padding: 3px; text-align: left; width: 33%">HP Regen: <?= $hp_regen_rate ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 34%">MP
                                        Regen: <?= $mana_regen_rate ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 34%">NPC Spells
                                        ID: <?= $npc_spells_id ?? "" ?></td>
                                </tr>
                                <tr>
                                    <td style="padding: 3px; text-align: left; width: 33%">Combat HP
                                        Regen: <?= $combat_hp_regen ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 34%">Combat MP
                                        Regen: <?= $combat_mana_regen ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 33%">Assist: <?= $assistradius ?? "" ?></td>
                                </tr>
                                <tr>
                                    <td style="padding: 3px; text-align: left; width: 33%">Spell Scale: <?= $spellscale ?? "" ?>%</td>
                                    <td style="padding: 3px; text-align: left; width: 33%">Slow Mit: <?= $slow_mitigation ?? "" ?>%
                                    </td>
                                    <td style="padding: 3px; text-align: left; width: 33%">Heal Scale: <?= $healscale ?? "" ?>%</td>
                                </tr>
                                <tr>
                                    <td style="padding: 3px; text-align: left; width: 34%">NPC Aggro: <?= $npc_aggro ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 34%">Always Aggro
                                        PCs: <?= $aggro_pc ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 33%">Ignore
                                        Distance: <?= $ignore_distance ?? "" ?></td>
                                </tr>
                                <tr>
                                    <td style="padding: 3px; text-align: left; width: 34%">Spells Effects
                                        ID: <?= $npc_spells_effects_id ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 34%">Skip Global Loot: <?=$yesno[$skip_global_loot]?></td>
                                    <td style="padding: 3px; text-align: left; width: 34%">Rare Spawn: <?=$yesno[$rare_spawn]?></td>
                                </tr>
                                <?php
                                $new_special_abilities = '';
                                for ($i = 1; $i <= $max_special_ability; $i++) {
                                    if (preg_match("/^$i,/", $special_abilities ?? "", $match) == 1 || preg_match("/\^$i,/", $special_abilities ?? "", $match) == 1) {
                                        $match[0] = ltrim($match[0], "^");        // ability number with comma
                                        $ability = rtrim($match[0], ",");        // remove comma

                                        if (isset($specialattacks) && $specialattacks[$ability]) {
                                            $new_special_abilities .= " " . $specialattacks[$ability] . ",";
                                        } else {
                                            $new_special_abilities .= " " . $match[0];
                                        }
                                    }
                                }
                                $new_special_abilities = rtrim($new_special_abilities, ",");
                                ?>
                                <tr>
                                    <td style="padding: 3px;" colspan="3">
                                        <div style="max-width:400px;">Special
                                            Abilities: <?php echo ($new_special_abilities) ?: "None"; ?>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend><strong>Appearance</strong></legend>
                            <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
                                <tr>
                                    <td style="padding: 3px; text-align: left; width: 33%">
                                        Gender: <?php $gender = $gender ?? ""; echo "<a title='Gender: " . $gender . "'>" . $genders[$gender] . "</a>"; ?></td>
                                    <td style="padding: 3px; text-align: left; width: 33%">Size: <?= $size ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 34%">Face: <?= $face ?? "" ?></td>
                                </tr>
                                <tr>
                                    <td style="padding: 3px; text-align: left; width: 33%">Hair
                                        Style: <?= $luclin_hairstyle ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 33%">Hair
                                        Color: <?= $luclin_haircolor ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 34%">Eye
                                        Color: <?= $luclin_eyecolor ?? "" ?></td>
                                </tr>
                                <tr>
                                    <td style="padding: 3px; text-align: left; width: 33%">Eye Color
                                        2: <?= $luclin_eyecolor2 ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 33%">Beard: <?= $luclin_beard ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 34%">Beard
                                        Color: <?= $luclin_beardcolor ?? "" ?></td>
                                </tr>
                                <tr>
                                    <td style="padding: 3px; text-align: left; width: 33%">Armor Red: <?= $armortint_red ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 33%">Armor
                                        Green: <?= $armortint_green ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 34%">Armor
                                        Blue: <?= $armortint_blue ?? "" ?></td>
                                </tr>
                                <tr>
                                    <td style="padding: 3px; text-align: left; width: 33%">Melee1: <?= $d_melee_texture1 ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 33%">Melee2: <?= $d_melee_texture2 ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 34%">Light Source: <?= $light ?? "" ?></td>
                                </tr>
                                <tr>
                                    <td style="padding: 3px; text-align: left; width: 33%">Texture: <?= $texture ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 33%">Helm: <?= $helmtexture ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 34%">Arms: <?= $armtexture ?? "" ?></td>
                                </tr>
                                <tr>
                                    <td style="padding: 3px; text-align: left; width: 33%">Bracer: <?= $bracertexture ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 33%">Hands: <?= $handtexture ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 34%">Legs: <?= $legtexture ?? "" ?></td>
                                </tr>
                                <tr>
                                    <td style="padding: 3px; text-align: left; width: 33%">Feet: <?= $feettexture ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 33%">Chest: <?= $chesttexture ?? "" ?></td>
                                    <td style="padding: 3px; text-align: left; width: 34%">&nbsp;</td>
                                </tr>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend><strong>Misc</strong></legend>
                            <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
                                <tr>
                                    <td style="padding: 3px; text-align: left; width: 50%">Qglobal: <?= $yesno[$qglobal] ?></td>
                                    <td style="padding: 3px; text-align: left; width: 50%">Pet: <?= $yesno[$pet] ?></td>
                                </tr>
                                <tr>
                                    <td style="padding: 3px; text-align: left; width: 33%">Spawn
                                        Limit: <?php echo (isset($spawn_limit) && $spawn_limit > 0) ? $spawn_limit : "None"; ?></td>
                                    <td style="padding: 3px; text-align: left; width: 33%">Unique
                                        Spawn: <?= isset($unique_spawn_by_name) ? $yesno[$unique_spawn_by_name] : "no"; ?></td>
                                    <td style="padding: 3px; text-align: left; width: 34%">Underwater: <?= isset($underwater) ? $yesno[$underwater] : "no"; ?></td>
                                </tr>
                                <tr>
                                    <td style="padding: 3px; text-align: left; width: 33%">Ignore
                                        Despawn: <?= isset($ignore_despawn) ? $yesno[$ignore_despawn] : "no"; ?></td>
                                    <td style="padding: 3px; text-align: left; width: 33%">Raid
                                        Target: <?= isset($raid_target) ? $yesno[$raid_target] : "no"; ?></td>
                                    <td style="padding: 3px; text-align: left; width: 34%">Private
                                        Corpse: <?= isset($private_corpse) ? $yesno[$private_corpse] : "no"; ?></td>
                                </tr>
                            </table>
                        </fieldset>
                    </td>
                </tr>
            </table>
            <br/><br/>
            <input type="hidden" name="name" value="<?= $name ?? "" ?>">
            <input type="hidden" name="lastname" value="<?= $lastname ?? "" ?>">
            <input type="hidden" name="level" value="<?= $level ?>">
            <input type="hidden" name="race" value="<?= $race ?>">
            <input type="hidden" name="class" value="<?= $class ?>">
            <input type="hidden" name="bodytype" value="<?= $bodytype ?>">
            <input type="hidden" name="hp" value="<?= $hp ?? "" ?>">
            <input type="hidden" name="mana" value="<?= $mana ?? "" ?>">
            <input type="hidden" name="gender" value="<?= $gender ?>">
            <input type="hidden" name="texture" value="<?= $texture ?? "" ?>">
            <input type="hidden" name="helmtexture" value="<?= $helmtexture ?? "" ?>">
            <input type="hidden" name="armtexture" value="<?= $armtexture ?? "" ?>">
            <input type="hidden" name="bracertexture" value="<?= $bracertexture ?? "" ?>">
            <input type="hidden" name="handtexture" value="<?= $handtexture ?? "" ?>">
            <input type="hidden" name="legtexture" value="<?= $legtexture ?? "" ?>">
            <input type="hidden" name="feettexture" value="<?= $feettexture ?? "" ?>">
            <input type="hidden" name="chesttexture" value="<?= $feettexture ?? "" ?>">
            <input type="hidden" name="size" value="<?= $size ?? "" ?>">
            <input type="hidden" name="hp_regen_rate" value="<?= $hp_regen_rate ?? "" ?>">
            <input type="hidden" name="mana_regen_rate" value="<?= $mana_regen_rate ?? "" ?>">
            <input type="hidden" name="loottable_id" value="<?= $loottable_id ?? "" ?>">
            <input type="hidden" name="merchant_id" value="<?= $merchant_id ?? "" ?>">
            <input type="hidden" name="npc_spells_id" value="<?= $npc_spells_id ?? "" ?>">
            <input type="hidden" name="npc_spells_effects_id" value="<?= $npc_spells_effects_id ?? "" ?>">
            <input type="hidden" name="npc_faction_id" value="<?= $npc_faction_id ?? "" ?>">
            <input type="hidden" name="mindmg" value="<?= $mindmg ?? "" ?>">
            <input type="hidden" name="maxdmg" value="<?= $maxdmg ?? "" ?>">
            <input type="hidden" name="attack_count" value="<?= $attack_count ?? "" ?>">
            <input type="hidden" name="special_abilities" value="<?= $special_abilities ?? "" ?>">
            <input type="hidden" name="aggroradius" value="<?= $aggroradius ?? "" ?>">
            <input type="hidden" name="assistradius" value="<?= $assistradius ?? "" ?>">
            <input type="hidden" name="face" value="<?= $face ?? "" ?>">
            <input type="hidden" name="luclin_hairstyle" value="<?= $luclin_hairstyle ?? "" ?>">
            <input type="hidden" name="luclin_haircolor" value="<?= $luclin_haircolor ?? "" ?>">
            <input type="hidden" name="luclin_eyecolor" value="<?= $luclin_eyecolor ?? "" ?>">
            <input type="hidden" name="luclin_eyecolor2" value="<?= $luclin_eyecolor2 ?? "" ?>">
            <input type="hidden" name="luclin_beardcolor" value="<?= $luclin_beardcolor ?? "" ?>">
            <input type="hidden" name="luclin_beard" value="<?= $luclin_beard ?? "" ?>">
            <input type="hidden" name="armortint_id" value="<?= $armortint_id ?? "" ?>">
            <input type="hidden" name="armortint_red" value="<?= $armortint_red ?? "" ?>">
            <input type="hidden" name="armortint_green" value="<?= $armortint_green ?? "" ?>">
            <input type="hidden" name="armortint_blue" value="<?= $armortint_blue ?? "" ?>">
            <input type="hidden" name="d_melee_texture1" value="<?= $d_melee_texture1 ?? "" ?>">
            <input type="hidden" name="d_melee_texture2" value="<?= $d_melee_texture2 ?? "" ?>">
            <input type="hidden" name="prim_melee_type" value="<?= $prim_melee_type ?? "" ?>">
            <input type="hidden" name="sec_melee_type" value="<?= $sec_melee_type ?? "" ?>">
            <input type="hidden" name="ranged_type" value="<?= $ranged_type ?? "" ?>">
            <input type="hidden" name="runspeed" value="<?= $runspeed ?? "" ?>">
            <input type="hidden" name="walkspeed" value="<?= $walkspeed ?? "" ?>">
            <input type="hidden" name="MR" value="<?= $MR ?? 0 ?>">
            <input type="hidden" name="CR" value="<?= $CR ?? 0 ?>">
            <input type="hidden" name="DR" value="<?= $DR ?? 0 ?>">
            <input type="hidden" name="FR" value="<?= $FR ?? 0 ?>">
            <input type="hidden" name="PR" value="<?= $PR ?? 0 ?>">
            <input type="hidden" name="see_invis" value="<?= $see_invis ?? "" ?>">
            <input type="hidden" name="see_invis_undead" value="<?= $see_invis_undead ?? "" ?>">
            <input type="hidden" name="qglobal" value="<?= $qglobal ?>">
            <input type="hidden" name="AC" value="<?= $AC ?? "" ?>">
            <input type="hidden" name="npc_aggro" value="<?= $npc_aggro ?? "" ?>">
            <input type="hidden" name="spawn_limit" value="<?= $spawn_limit ?? "" ?>">
            <input type="hidden" name="attack_delay" value="<?= $attack_delay ?? "" ?>">
            <input type="hidden" name="STR" value="<?= $STR ?? "" ?>">
            <input type="hidden" name="STA" value="<?= $STA ?? "" ?>">
            <input type="hidden" name="DEX" value="<?= $DEX ?? "" ?>">
            <input type="hidden" name="AGI" value="<?= $AGI ?? "" ?>">
            <input type="hidden" name="_INT" value="<?= $_INT ?? "" ?>">
            <input type="hidden" name="WIS" value="<?= $WIS ?? "" ?>">
            <input type="hidden" name="CHA" value="<?= $CHA ?? "" ?>">
            <input type="hidden" name="see_sneak" value="<?= $see_sneak ?? "" ?>">
            <input type="hidden" name="see_improved_hide" value="<?= $see_improved_hide ?? "" ?>">
            <input type="hidden" name="ATK" value="<?= $ATK ?? "" ?>">
            <input type="hidden" name="Accuracy" value="<?= $Accuracy ?? "" ?>">
            <input type="hidden" name="slow_mitigation" value="<?= $slow_mitigation ?? "" ?>">
            <input type="hidden" name="maxlevel" value="<?= $maxlevel ?? "" ?>">
            <input type="hidden" name="scalerate" value="<?= $scalerate ?? "" ?>">
            <input type="hidden" name="private_corpse" value="<?= $private_corpse ?? "" ?>">
            <input type="hidden" name="unique_spawn_by_name" value="<?= $unique_spawn_by_name ?? "" ?>">
            <input type="hidden" name="underwater" value="<?= $underwater ?? "" ?>">
            <input type="hidden" name="isquest" value="<?= $isquest ?? "" ?>">
            <input type="hidden" name="emoteid" value="<?= $emoteid ?>">
            <input type="hidden" name="spellscale" value="<?= $spellscale ?? "" ?>">
            <input type="hidden" name="healscale" value="<?= $healscale ?? "" ?>">
            <input type="hidden" name="raid_target" value="<?= $raid_target ?? "" ?>">
            <input type="hidden" name="light" value="<?= $light ?? "" ?>">
            <input type="hidden" name="combat_hp_regen" value="<?= $combat_hp_regen ?? "" ?>">
            <input type="hidden" name="combat_mana_regen" value="<?= $combat_mana_regen ?? "" ?>">
            <input type="hidden" name="ignore_distance" value="<?= $ignore_distance ?? "" ?>">
            <input type="hidden" name="ignore_despawn" value="<?= $ignore_despawn ?? "" ?>">
            <input type="hidden" name="aggro_pc" value="<?= $aggro_pc ?? "" ?>">
            <input type="hidden" name="avoidance" value="<?= $avoidance ?? "" ?>">
            <input type="hidden" name="exp_pct" value="<?= $exp_pct ?? "" ?>">
            <input type="hidden" name="greed" value="<?= $greed ?? "" ?>">
			<input type="hidden" name="skip_global_loot" value="<?=$skip_global_loot?>">
			<input type="hidden" name="rare_spawn" value="<?=$rare_spawn?>">
            <div class="center">
                <label for="id">NEW ID:</label>
                <input type="text" id="id" name="id" size="10" value="<?= $suggestedid ?? "" ?>">
                <input type="submit" value="Copy NPC">
            </div>
        </div>
    </div>
</form>
