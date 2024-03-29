<?php
function getExpansionName($expid): string
{
    global $eqexpansions;
    if (!isset($expid)) return "";
    if ($expid < 0) return "$expid"; // Avoid hitting the 'None Selected'
    if (isset($eqexpansions[$expid + 1])) return $eqexpansions[$expid + 1];
    return "$expid";
}

function getClasses($classes): string
{
    if ($classes == 0) {
        return "None";
    }
    if ($classes == 65534)
        return "ALL";
    else {
        $res = '';
        if ($classes & 256) $res .= "BRD ";
        if ($classes & 32768) $res .= "BST ";
        if ($classes & 4) $res .= "CLR ";
        if ($classes & 64) $res .= "DRU ";
        if ($classes & 16384) $res .= "ENC ";
        if ($classes & 8192) $res .= "MAG ";
        if ($classes & 128) $res .= "MNK ";
        if ($classes & 2048) $res .= "NEC ";
        if ($classes & 8) $res .= "PAL ";
        if ($classes & 16) $res .= "RNG ";
        if ($classes & 512) $res .= "ROG ";
        if ($classes & 32) $res .= "SHD ";
        if ($classes & 1024) $res .= "SHM ";
        if ($classes & 2) $res .= "WAR ";
        if ($classes & 4096) $res .= "WIZ ";
        return rtrim($res, " ");
    }
}

?>
<script>
    function showSearch() {
        document.getElementById("searchframe").style.display = "block";
        document.getElementById("button").style.display = "block";
    }

    function hideSearch() {
        document.getElementById("searchframe").style.display = "none";
        document.getElementById("button").style.display = "none";
    }
</script>
<div class="center">
    <iframe id="searchframe" src="templates/iframes/aasearch.php"></iframe>
    <input id="button" type="button" value="Hide AA Search" onclick="hideSearch();"
           style="display:none; margin-bottom:20px;">
</div>
<div class="table_container">
    <div class="table_header">
        <?php if (!empty($aa_vars)) { echo $aa_vars['eqmacid']; ?> - <?= $aa_vars['name']; ?> (<?= $aa_vars['skill_id']; }?>)
        <div style="float:right;">
            <a href="index.php?editor=aa&action=3"><img src="images/add.gif" style="border: 0;" alt="Yellow Plus Icon" title="Create a new AA"></a>
            <a href="index.php?editor=aa&aaid=<?= $aa_vars['skill_id'] ?? "" ?>&action=2"><img src="images/edit.gif"
                                                                                         style="border: 0;"
                                                                                         alt="Edit Table Icon"
                                                                                         title="Edit this AA"></a>
            <a href="index.php?editor=aa&aaid=<?= $aa_vars['skill_id'] ?? "" ?>&action=22"
               onclick="return confirm('Really delete <?= addslashes($aa_vars['name']) ?? "" ?>?');"><img
                        src="images/remove.gif" style="border: 0;" alt="Red X Icon" title="Remove the AA completely"></a>
        </div>
    </div>
    <div class="table_content">
        <table style="border-collapse: collapse; border-spacing: 0; border: 0; width: 100%;">
            <tr>
                <td style="width: 100%;">
                    <table style="border-collapse: collapse; border-spacing: 0; border: 0; width: 100%;">
                        <tr>
                            <td>
                                <fieldset>
                                    <legend><b>AA Variables</b></legend>
                                    <?php if (!empty($aaref)) { ?>
                                        <div style="text-align:right;">
                                            Reference: <a href="index.php?editor=aa&aaid=<?= $aaref ?>"
                                                          target="_blank"><?php global $aarefname; echo "$aaref - $aarefname"; ?></a>
                                            <img src="images/minus2.gif"
                                                 onclick="document.aa_list_insert.aa_add.value=<?= $aaref ?>;"
                                                 alt="Red double down arrow"
                                                 title="Set as what to be inserted"><br/>
                                        </div>
                                    <?php } ?>
                                    Prerequisite
                                    AA: <?php if (!empty($aa_vars) && $aa_vars['prereq_skill'] != 0 && $aa_vars['prereq_skill'] != 4294967295) { echo "{$aa_vars['prereq_skill']} - (<a href=\"index.php?editor=aa&aaid={$aa_vars['prereq_skill']}\">" . ((isset($prereq_name) && $prereq_name != null) ? $prereq_name['name'] : "<span style=\"color:red;\"><b>Not Found</b></span>") . "</a>) at Rank: {$aa_vars['prereq_minpoints']}<br/>"; } else { echo "None<br/>"; } ?>
                                    Classes: <?= getClasses($aa_vars['classes'] ?? 0) ?>
                                    <?php global $prereq_name;
                                    if (!empty($aa_vars) && $aa_vars['prereq_skill'] != 0 && $aa_vars['prereq_skill'] != 0xffffffff && $prereq_name != null) {
                                        $rankcheck = $aa_vars['prereq_minpoints'] > $prereq_name['max_level'];
                                        $classcheck = (((int)$aa_vars['classes'] & (int)$prereq_name['classes']) == 0);
                                        if ($rankcheck || $classcheck) {
                                            ?>
                                            <br/>
                                            <span style="color: red"><b>Prerequisite Mismatch:</b><br/>
                                                <?php if ($classcheck) { ?>
                                                    Classes: <?= getClasses($prereq_name['classes']) ?>
                                                <?php } if ($classcheck && $rankcheck) { ?>                    -
                                                <?php } if ($rankcheck) { ?>
                                                    Max Rank: <?= $prereq_name['max_level'] ?><br/>
                                                <?php } ?>                  </span>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <br/><br/>
                                    <table>
                                        <tr>
                                            <td>
                                                <fieldset>
                                                    <legend><b>Costs</b></legend>
                                                    <table>
                                                        <tr>
                                                            <td style="padding: 0; width:140px;">
                                                                <table>
                                                                    <tr>
                                                                        <td style="text-align: right; padding: 0;">Cost:</td>
                                                                        <td style="padding: 0;">&nbsp;<?= $aa_vars['cost'] ?? "" ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="text-align: right; padding: 0;">Cost Increment:</td>
                                                                        <td style="padding: 0;">&nbsp;<?= $aa_vars['cost_inc'] ?? ""?></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td style="padding: 0; width:100px;">
                                                                <table>
                                                                    <tr>
                                                                        <td style="padding: 0; text-align: right;">Level Req:</td>
                                                                        <td style="padding: 0;">&nbsp;<?= $aa_vars['class_type'] ?? "" ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="padding: 0; text-align: right">Level Inc:</td>
                                                                        <td style="padding: 0;">&nbsp;<?= $aa_vars['level_inc'] ?? "" ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="padding: 0; text-align: right">Ranks:</td>
                                                                        <td style="padding: 0;">&nbsp;<?= $aa_vars['max_level'] ?? "" ?></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td style="padding: 0; width:140px;">
                                                                <table>
                                                                    <tr>
                                                                        <td style="padding: 0;text-align: right;">&nbsp;</td>
                                                                        <td style="padding: 0;">&nbsp;</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </fieldset>
                                            </td>
                                            <td>
                                                <fieldset>
                                                    <legend><b>Spell Action</b></legend>
                                                    <table style="width:310px;">
                                                        <tr>
                                                            <td style="padding: 0; text-align: right; width:70px;">Spell ID:</td>
                                                            <td rowspan="2" style="padding: 0; vertical-align: top;">
                                                                <?php
                                                                if (!empty($aa_vars) && $aa_vars['spellid'] == '0' || !empty($aa_vars) && $aa_vars['spellid'] == 0xffffffff) {
                                                                    ?>
                                                                    &nbsp;<?= $aa_vars['spellid'] ?>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <a href="index.php?editor=spells&id=<?= $aa_vars['spellid'] ?>&action=2"
                                                                       target="_blank"><?= $aa_vars['spellid'] ?>
                                                                        - <?= getSpellName($aa_vars['spellid']) ?></a> [
                                                                    <a href='https://lucy.allakhazam.com/spell.html?id=<?= $aa_vars["spellid"] ?>'
                                                                       target='_blank'>Lucy</a>]<br/>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding: 0;">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding: 0;" colspan="2">
                                                                <table>
                                                                    <tr>
                                                                        <td style="padding: 0; text-align: right; width:70px;">Spell
                                                                            Type:
                                                                        </td>
                                                                        <td style="padding: 0; width:40px;">
                                                                            &nbsp;<?= $aa_vars['spell_type']; ?>
                                                                        </td>
                                                                        <td style="padding: 0; text-align: right; width:80px;">Spell
                                                                            Refresh:
                                                                        </td>
                                                                        <td style="padding: 0; width:70px;">
                                                                            &nbsp;<?= $aa_vars['spell_refresh'] ?>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </fieldset>
                                            </td>
                                        </tr>
                                    </table>
                                    <table>
                                        <tr>
                                            <td style="width:300px;">
                                                <fieldset>
                                                    <legend><b>Categories</b></legend>
                                                    <table>
                                                        <tr>
                                                            <td style="padding: 0; text-align: right;">Display Tab:</td>
                                                            <td style="padding: 0;">&nbsp;<?php global $aa_type; echo $aa_type[$aa_vars['type']] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding: 0; text-align: right;">Expansion:</td>
                                                            <td style="padding: 0;">&nbsp;<?= getExpansionName($aa_vars['aa_expansion']) ?>
                                                                (<?= $aa_vars['aa_expansion'] ?>)
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding: 0; text-align: right;">Special Category:</td>
                                                            <td style="padding: 0;">
                                                                &nbsp;<?php echo (isset($aa_special_category[$aa_vars['special_category']])) ? "{$aa_special_category[$aa_vars['special_category']]}" : "{$aa_vars['special_category']}"; ?>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </fieldset>
                                            </td>
                                            <td style="vertical-align:top; width:216px;">
                                                <fieldset>
                                                    <legend><b>Other</b></legend>
                                                    Account Time Required: <?= $aa_vars['account_time_required'] ?>
                                                </fieldset>
                                            </td>
                                        </tr>
                                    </table>
                                </fieldset>

                                <?php
                                $aa_ranks = $aa_vars['max_level'];
                                for ($i = 0;
                                $i < $aa_ranks;
                                $i++) {
                                $aarank = $i + 1;
                                echo "<a id=\"rank$aarank\"></a><fieldset>";
                                echo "<legend><b>Rank $aarank</b></legend>";
                                ?>
                                <div style="float:left; width:200px;">
                                    <fieldset>
                                        <legend>Calculated</legend>
                                        Level required: <?= $aa_vars['class_type'] + ($aa_vars['level_inc'] * $i) ?>
                                        <br/>
                                        Cost: <?= $aa_vars['cost'] + ($aa_vars['cost_inc'] * $i) ?><br/>
                                    </fieldset>
                                </div>
                                <div style="float:left; width:200px;">
                                    <fieldset>
                                        <legend>Specific</legend>
                                        <?php global $aaid;
                                        $found = 0;
                                        if (!empty($aa_cost)) {
                                            foreach ($aa_cost as $aac) {
                                                if ($aac['skill_id'] == $aaid + $i) {
                                                    echo "Level required: " . $aac['level'] . "<br/>";
                                                    echo "Cost: " . $aac['cost'] . "<br/>";
                                                    $found = 1;
                                                }
                                            }
                                        }
                                        if (!$found) {
                                            echo "Not set<br/><br/>";
                                        }
                                        ?>
                                    </fieldset>
                                </div>
                                <div style="float:left; width:270px; height:40px; padding-top:10px;">
                                    <?php
                                    echo "<a href=\"index.php?editor=aa&aaid=$aaid&rank=$aarank&action=19\"><button type=\"button\">Edit Specific</button></a>";
                                    if ($found) {
                                        echo "<a href=\"index.php?editor=aa&aaid=$aaid&rank=$aarank&action=21\"><button type=\"button\">Delete Specific</button></a>";
                                    }
                                    echo "<br/>";
                                    ?>
                                </div>
                                <div style="clear:both;"></div>
                                <?php
                                $found = 0;
                                if (!empty($aa_actions)) {
                                    foreach ($aa_actions as $aa_action) {
                                        if ($aa_action['rank'] == $i) {
                                            ?>
                                            <br/>
                                            <div class="table_container">
                                                <div class="table_header">
                                                    <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
                                                        <tr>
                                                            <td style="padding: 0;">AA Action</td>
                                                            <td style="padding: 0;"></td>
                                                            <td style="padding: 0; text-align: right;">
                                                                <a href="index.php?editor=aa&aaid=<?= $aaid ?>&rank=<?= $aarank ?>&action=4"><img
                                                                            src="images/edit2.gif" style="border: 0;"
                                                                            alt="Edit Table Icon"
                                                                            title="Edit AA Action"></a>
                                                                <a href="index.php?editor=aa&aaid=<?= $aaid ?>&rank=<?= $aarank ?>&action=10"
                                                                   onclick="return confirm('Really delete the AA Action for this rank?');"><img
                                                                            alt="Red X Icon"
                                                                            src="images/remove.gif" style="border: 0;"
                                                                            title="Remove the AA Action for this Rank"></a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <table class="table_content2" style="width: 100%;">
                                                    <tr>
                                                        <td>
                                                            Spell ID: <a
                                                                    href="index.php?editor=spells&id=<?= $aa_action['spell_id'] ?>&action=2"
                                                                    target="_blank"><?= $aa_action['spell_id'] ?>
                                                                - <?= getSpellName($aa_action['spell_id']) ?></a> [<a
                                                                    href='https://lucy.allakhazam.com/spell.html?id=<?= $aa_action['spell_id'] ?>'
                                                                    target='_blank'>Lucy</a>]<br/>
                                                            Target
                                                            Override: <?php echo(isset($aa_action_target[$aa_action['target']]) ? "{$aa_action_target[$aa_action['target']]} - " : ""); ?>
                                                            (raw:<?= $aa_action['target'] ?>)<br/>
                                                            Reuse Time: <?= $aa_action['reuse_time'] ?>
                                                        </td>
                                                        <td>
                                                            Non-Spell Action: <?= $aa_action['nonspell_action'] ?><br/>
                                                            Non-Spell Mana: <?= $aa_action['nonspell_mana'] ?><br/>
                                                            Non-Spell Duration: <?= $aa_action['nonspell_duration'] ?>
                                                        </td>
                                                        <td>
                                                            Redux AA 1: <?= $aa_action['redux_aa'] ?><br/>
                                                            Redux Rate 1: <?= $aa_action['redux_rate'] ?><br/>
                                                            Redux AA 2: <?= $aa_action['redux_aa2'] ?><br/>
                                                            Redux Rate 2: <?= $aa_action['redux_rate2'] ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <?php
                                            $found = 1;
                                            break;
                                        }
                                    }
                                }
                                if ($found == 0) {
                                    ?>
                                    <br/><b>AA Action</b> - None<br/>
                                    <a href="index.php?editor=aa&aaid=<?= $aaid ?>&rank=<?= $aarank ?>&action=5">
                                        <button type="button">Add Action</button>
                                    </a><br/>
                                    <?php
                                }
                                $showcopy = 1;
                                if (!empty($aa_effects)) {
                                $found = 0;
                                $x = 0;
                                foreach ($aa_effects as $aa_effect) {
                                    if ($aa_effect['aaid'] == ($aaid + $i)) {
                                        if ($found == 0) {
                                            // Only show the table head if we actually have data
                                    ?>
                                <br/>
                                <div class="table_container">
                                    <div class="table_header">
                                        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
                                            <tr>
                                                <td style="padding: 0;">AA Effects</td>
                                                <td style="padding: 0;"></td>
                                                <td style="padding: 0; text-align: right;">
                                                    <a href="index.php?editor=aa&aaid=<?= $aaid ?>&rank=<?= $aarank ?>&action=7"><img
                                                                src="images/add.gif" style="border: 0;"
                                                                alt="Yellow Plus Icon"
                                                                title="Add AA Effect Slot"></a>
                                                    <a href="index.php?editor=aa&aaid=<?= $aaid ?>&rank=<?= $aarank ?>&action=9"
                                                       onclick="return confirm('Really delete all AA Effects from this rank?');"><img
                                                                src="images/table.gif" style="border: 0;"
                                                                alt="Red X over Table Icon"
                                                                title="Remove all AA Effect Slots for this Rank"></a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <table class="table_content2" style="width: 100%;">
                                        <tr>
                                            <th style="text-align: center; width: 8%;">Slot</th>
                                            <th style="text-align: center; width: 54%;">Effect</th>
                                            <th style="text-align: center; width: 15%;">Base1</th>
                                            <th style="text-align: center; width: 15%;">Base2</th>
                                            <th style="width: 8%;">&nbsp;</th>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                        <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA"; ?>">
                                            <?php
                                            echo "<td style=\"text-align: center;\">" . $aa_effect['slot'] . "</td>";
                                            echo "<td style=\"text-align: center;\">" . $aa_effect['effectid'] . " - ";
                                            if (isset($sp_effects[$aa_effect['effectid']]))
                                                echo $sp_effects[$aa_effect['effectid']];
                                            else
                                                echo "Unknown";
                                            echo "</td>";
                                            echo "<td style=\"text-align: center;\">" . $aa_effect['base1'] . "</td>";
                                            echo "<td style=\"text-align: center;\">" . $aa_effect['base2'] . "</td>";
                                            ?>
                                            <td style="text-align: right;">
                                                <a href="index.php?editor=aa&aaid=<?= $aaid ?>&rank=<?= $aarank ?>&aaeffectid=<?= $aa_effect['id'] ?>&action=6"><img
                                                            src="images/edit2.gif" style="border: 0;" alt="Edit Table Icon" title="Edit Slot"></a>
                                                <a href="index.php?editor=aa&aaid=<?= $aaid ?>&rank=<?= $aarank ?>&aaeffectid=<?= $aa_effect['id'] ?>&action=8"
                                                   onclick="return confirm('Really delete this AA Effect?');"><img
                                                            src="images/remove.gif" style="border: 0;" alt="Red X Icon" title="Remove Slot"></a>
                                            </td>
                                            <?php
                                            echo "</tr>";
                                            $found = 1;
                                            $showcopy = 0;
                                            $x++;
                                            }
                                            }
                                            if ($found) {
                                                echo "</table></div>";
                                            }
                                            }
                                            if ($showcopy) {
                                                ?>
                                                <br/>
                                                <b>AA Effect</b><br/>
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <a href="index.php?editor=aa&aaid=<?= $aaid ?>&rank=<?= $aarank ?>&slot=1&action=7">
                                                                <button type="button">Add Effect</button>
                                                            </a>
                                                            or&nbsp;
                                                        </td>
                                                        <td style="text-align: right;">
                                                            <form method="post"
                                                                  action="index.php?editor=aa&aaid=<?= $aaid ?>&rank=<?= $aarank ?>&action=23">
                                                                <input name="aaid" type="text" size="5" value="AA ID"
                                                                       onfocus="if (this.value==='AA ID') this.value='';"
                                                                       onblur="if (this.value==='') this.value='AA ID';"
                                                                       title="Optional AAID from which to copy">
                                                                <input name="rank" type="text" size="5" value="Rank"
                                                                       onfocus="if (this.value==='Rank') this.value='';"
                                                                       onblur="if (this.value==='') this.value='Rank';"
                                                                       title="The rank to copy from. Uses the current AA if AA ID is not set.">
                                                                <input type="submit" value="Copy Slots From">
                                                            </form>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <?php
                                            }
                                            echo "</fieldset>";
                                            }

                                            ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</div>
