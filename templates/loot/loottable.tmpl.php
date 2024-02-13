<?php if (!isset($loottable_id) || !isset($loottable_name)) { ?>
    <div class="table_container" style="width: 350px">
    <div class="table_header">
        <div style="float: right">
            <a href="index.php?editor=loot&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=11"><img
                        src="images/create.gif" style="border: 0;" alt="Create" title="Change LootTable"></a>
        </div>
        No Assigned or Valid Loottable
    </div>
    <div class="table_content">
        <div class="center">
            No Valid Loottable currently assigned.<br/><br/>
            <a href="index.php?editor=loot&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=11">Click
                here to change</a><br/>
            <a href="index.php?editor=loot&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=46">Click
                here to import loot from Magelo</a>
        </div>
    </div>
<?php } else { ?>
    <div class="table_container" style="width: 350px">
        <div class="table_header">
            <div style="float: right">
                <a href="index.php?editor=loot&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=11"><img
                            src="images/create.gif" style="border: 0;" alt="Gears Icon" title="Change LootTable"></a>&nbsp;
                <a href="index.php?editor=loot&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&ltid=<?= $loottable_id ?>&action=36"><img
                            src="images/last.gif" style="border: 0;" alt="Double Yellow Arrow Icon"
                            title="Apply LootTable to Multiple NPCs"></a>&nbsp;
                <a href="index.php?editor=loot&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=34"
                   onClick="return confirm('Really remove this loottable from the selected NPC?');"><img
                            src="images/minus2.gif" style="border: 0;" alt="Double Red Arrow Icon"
                            title="Drop this loottable"></a>
                <a onClick="return confirm('Really Delete LootTable <?= $loottable_id ?>?');"
                   href="index.php?editor=loot&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=16&ltid=<?= $loottable_id ?>"><img
                            src="images/remove3.gif" style="border: 0;" alt="Red X Icon" title="Delete LootTable"></a>
            </div>
            <?php
            $new_loottable_name = substr($loottable_name, 0, 18);
            if ($new_loottable_name != $loottable_name)
                $new_loottable_name = "$new_loottable_name...";
            ?>
            LootTable <?= $loottable_id ?>: "<a
                    href="index.php?editor=loot&action=1&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>"<?php echo ($new_loottable_name != $loottable_name) ? " title=\"$loottable_name\"" : "" ?>><?= $new_loottable_name ?></a>"
        </div>
        <div class="table_content">
            Cash loot [<a
                    href="index.php?editor=loot&action=1&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>">edit</a>]:<br/>
            <div style="padding: 5px 0 0 20px;">
                Min Cash: <?= $mincash ?? "" ?><br/>
                Max Cash: <?= $maxcash ?? "" ?><br/>
            </div>
            Content Control:
            <div style="padding: 5px 0 0 20px;">
                Min Expansion: <?= $min_expansion ?><br>
                Max Expansion: <?= $max_expansion ?><br>
                Content Flags: <?= ($content_flags != "") ? $content_flags : "N/A"; ?><br>
                Content Flags Disabled: <?php echo ($content_flags_disabled != "") ? $content_flags_disabled : "N/A"; ?>
                <br>
            </div>
            <div style="padding: 10px 0 0 0;">
                NPCs using this loottable: <?= $usage['count'] ?? "Undefined" ?>
                <?php if (!isset($_GET['display_usage'])) { ?>
                    [
                    <a href="index.php?editor=loot&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&display_usage">show</a>]
                <?php } else { ?>
                    [
                    <a href="index.php?editor=loot&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>">hide</a>]
                    <?php $usage = $usage ?? array();
                    foreach ($usage['mobs'] as $mob): ?>
                        <br/>&nbsp;&nbsp;&nbsp;<?= $mob['id'] ?>: <?= $mob['name'] ?>
                    <?php endforeach; ?>
                <?php } ?>
            </div>
            <div style="padding: 5px 0 0 0;">
                LootDrops associated with this LootTable: <?= $lootdrop_count ?? "Undefined" ?> <a
                        href="index.php?editor=loot&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=22&ltid=<?= $loottable_id ?>"><img
                            src="images/add.gif" style="border: 0;" alt="Yellow Plus Icon"
                            title="Add a LootDrop to this LootTable"></a>
            </div>
            <div style="padding: 10px 0 0 0;">
                <div class="center">
                    <a href="index.php?editor=loot&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=46">Click
                        here to import loot from Magelo</a>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (!empty($lootdrops)):
        foreach ($lootdrops as $lootdrop):
            ?>
            <br/>
            <div class="table_container">
                <div class="table_header">
                    <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
                        <tr>
                            <td style="padding: 0;">Lootdrop: <a
                                        href="index.php?editor=loot&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&ldid=<?= $lootdrop['id'] ?>&action=33"><?= $lootdrop['id'] ?></a>
                            </td>
                            <?php
                            $newname = substr($lootdrop['name'], 0, 22);
                            if ($newname != $lootdrop['name'])
                                $newname = "$newname...";
                            ?>
                            <td style="padding: 0;">"<a
                                        href="index.php?editor=loot&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&ldid=<?= $lootdrop['id'] ?>&action=3"<?php echo ($newname != $lootdrop['name']) ? " title=\"{$lootdrop['name']}\"" : "" ?>><?= $newname ?></a>"
                            </td>
                            <td style="padding: 0;">Mindrop: <a
                                        href="index.php?editor=loot&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&ltid=<?= $loottable_id ?>&ldid=<?= $lootdrop['id'] ?>&action=7"><?= $lootdrop['mindrop'] ?></a>
                            </td>
                            <td style="padding: 0;">Droplimit: <a
                                        href="index.php?editor=loot&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&ltid=<?= $loottable_id ?>&ldid=<?= $lootdrop['id'] ?>&action=7"><?= $lootdrop['droplimit'] ?></a>
                            </td>
                            <td style="padding: 0;">Multiplier: <a
                                        href="index.php?editor=loot&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&ltid=<?= $loottable_id ?>&ldid=<?= $lootdrop['id'] ?>&action=7"><?= $lootdrop['multiplier'] ?></a>
                            </td>
                            <td style="padding: 0;">Min:<a
                                        href="index.php?editor=loot&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&ltid=<?= $loottable_id ?>&ldid=<?= $lootdrop['id'] ?>&action=7"><?= $lootdrop['multiplier_min'] ?></a>
                            </td>
                            <td style="padding: 0;">Probability: <a
                                        href="index.php?editor=loot&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&ltid=<?= $loottable_id ?>&ldid=<?= $lootdrop['id'] ?>&action=7"><?= $lootdrop['probability'] ?></a>
                            </td>
                            <td style="padding: 0; text-align: right;">
                                <a href="index.php?editor=loot&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=20&ldid=<?= $lootdrop['id'] ?>">
                                    <img src="images/add.gif" style="border: 0;" alt="Yellow Plus Icon"
                                         title="Add an Item to this LootDrop Table">
                                </a>
                                <a href="index.php?editor=loot&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=41&ldid=<?= $lootdrop['id'] ?>">
                                    <img src="images/resetpw.gif" style="border: 0;" alt="ResetPW Icon"
                                         title="Merge this LootDrop">
                                </a>
                                <a href="index.php?editor=loot&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=35&ldid=<?= $lootdrop['id'] ?>&name=<?= $lootdrop['name'] ?>">
                                    <img src="images/last.gif" style="border: 0;" alt="Double Yellow Arrow Icon"
                                         title="Copy lootdrop">
                                </a>
                                <a onClick="return confirm('Really move multiplier to the items in lootdrop: <?= $lootdrop['id'] ?>?  The table multiplier will be set to 1.');"
                                   href="index.php?editor=loot&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=43&ldid=<?= $lootdrop['id'] ?>&multiplier=<?= $lootdrop['multiplier'] ?>">
                                    <img src="images/sort.gif" style="border: 0;" alt="Sort Icon"
                                         title="Move mutliplier to items">
                                </a>
                                <a onClick="return confirm('Really remove LootDrop <?= $lootdrop['id'] ?> from LootTable <?= $loottable_id ?>?  All <?= $usage['count'] ?> NPCs that use LootTable <?= $loottable_id ?> will be affected.');"
                                   href="index.php?editor=loot&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=19&ltid=<?= $loottable_id ?>&ldid=<?= $lootdrop['id'] ?>">
                                    <img src="images/minus2.gif" style="border: 0;" alt="Double Red Down Arrow Icon"
                                         title="Remove this LootDrop from LootTable <?= $loottable_id ?>">
                                </a>
                                <a onClick="return confirm('Really delete LootDrop <?= $lootdrop['id'] ?>?  All LootTables that use this LootDrop will be affected.');"
                                   href="index.php?editor=loot&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=26&ldid=<?= $lootdrop['id'] ?>">
                                    <img src="images/remove2.gif" style="border: 0;" alt="Red X Icon"
                                         title="Permanently delete this LootDrop">
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
                <table class="table_content2" style="width: 100%;">
                    <?php if (isset($lootdrop['items']) && $lootdrop['items']): $x = 0; ?>
                        <tr>
                            <th style="text-align: center; width: 8%;">Item ID</th>
                            <th style="text-align: center; width: 36%;">Item Name</th>
                            <th style="text-align: center; width: 7%;">Equipped?</th>
                            <th style="text-align: center; width: 7%;">Charges</th>
                            <th style="text-align: center; width: 7%;">MinLevel</th>
                            <th style="text-align: center; width: 7%;">MaxLevel</th>
                            <th style="text-align: center; width: 8%;">Multiplier</th>
                            <th style="text-align: center; width: 8%;">Chance</th>
                            <th style="width: 13%;"></th>
                        </tr>
                        <?php
                        $chance_total = $chance_total ?? 0.0;
                        foreach ($lootdrop['items'] as $item):
                            extract($item);
                            $total = (($chance / 100) * ($lootdrop['probability'] / 100)) * 100;
                            $chance_total += $chance;
                            if ($lootdrop['multiplier_min'] == 0) {
                                if ($lootdrop['probability'] == 0) {
                                    $chance = 0;
                                }
                                if ($lootdrop['probability'] > 0 && $lootdrop['probability'] < 100) {
                                    $chance = $total;
                                }
                                /* if ($lootdrop['probability'] >= 100) {
                                    $chance = $chance; // <--TRUE...
                                }*/
                            }
                            ?>
                            <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA"; ?>">
                                <td style="text-align: center"><a
                                            href="index.php?editor=items&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcid ?>&id=<?= $item_id ?>&action=2"><?= $item_id ?>
                                </td>
                                <td style="text-align: center"><?php echo (get_item_name($item_id) != "") ? get_item_name($item_id) : "<a title='Item not in database!'>UNKNOWN</a>"; ?>
                                    <span>[<a href="https://lucy.allakhazam.com/item.html?id=<?= $item_id ?>"
                                              target="_blank">lucy</a>]</span></td>

                                <td style="text-align: center; width: 100px;"><?= $equiptit[$equip_item] ?></td>
                                <td style="text-align: center"><?= $item_charges ?></td>
                                <td style="text-align: center"><?= $minlevel ?></td>
                                <td style="text-align: center"><?= $maxlevel ?></td>
                                <td style="text-align: center"><?= $multiplier ?></td>
                                <td style="text-align: center"><?= $chance ?>%</td>
                                <td style="text-align: right;">
                                    <a href="index.php?editor=loot&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcid ?>&ldid=<?= $lootdrop['id'] ?>&itemid=<?= $item_id ?>&action=47">
                                        <img src="images/minus.gif" style="border: 0;" alt="Red Minus Icon"
                                             title="Move Lootdrop Item">
                                    </a>
                                    <a href="index.php?editor=loot&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcid ?>&ldid=<?= $lootdrop['id'] ?>&itemid=<?= $item_id ?>&action=5">
                                        <img src="images/edit2.gif" style="border: 0;" alt="Edit Table Icon"
                                             title="Edit Lootdrop Item">
                                    </a>
                                    <?php if ($disabled_chance == 0 && $chance > 0): ?>
                                        <a href="index.php?editor=loot&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcid ?>&ldid=<?= $lootdrop['id'] ?>&itemid=<?= $item_id ?>&chance=<?= $chance ?>&action=44">
                                            <img src="images/downgrade.gif" style="border: 0;" alt="Downgrade Icon"
                                                 title="Disable Item">
                                        </a>
                                    <?php endif; ?>
                                    <?php if ($disabled_chance > 0): ?>
                                        <a href="index.php?editor=loot&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcid ?>&ldid=<?= $lootdrop['id'] ?>&itemid=<?= $item_id ?>&dchance=<?= $disabled_chance ?>&action=45">
                                            <img src="images/upgrade.gif" style="border: 0;" alt="Upgrade Icon"
                                                 title="Enable Item">
                                        </a>
                                    <?php endif; ?>
                                    <a onClick="return confirm('Really remove item <?= $item_id ?> from LootDrop <?= $lootdrop['id'] ?>?');"
                                       href="index.php?editor=loot&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcid ?>&ldid=<?= $lootdrop['id'] ?>&itemid=<?= $item_id ?>&action=17">
                                        <img src="images/remove3.gif" style="border: 0;" alt="Red X Icon"
                                             title="Remove Item">
                                    </a>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            <?php
                            $x++;
                        endforeach;
                    endif;
                    ?>
                    <tr style="background-color: #000;">
                        <td colspan="2">
                            <a href="index.php?editor=loot&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcid ?>&ltid=<?= $loottable_id ?>&ldid=<?= $lootdrop['id'] ?>&action=7"
                               style="color:yellow;">Expansion
                                Flags: <?php echo ($lootdrop['min_expansion'] > 0 || $lootdrop['max_expansion'] > 0) ? "Yes" : "No"; ?></a>
                        </td>
                        <td colspan="4">
                            <a href="index.php?editor=loot&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcid ?>&ltid=<?= $loottable_id ?>&ldid=<?= $lootdrop['id'] ?>&action=7"
                               style="color:yellow;">Content
                                Flags: <?php echo ($lootdrop['content_flags'] != "" && $lootdrop['content_flags_disabled'] != "") ? "Yes" : "No"; ?></a>
                        </td>
                        <td colspan="4" style="text-align: right;">
                            <a title="Set chance for all items on this table to <?= $normalize_amount ?>"
                               href="index.php?editor=loot&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcid ?>&ldid=<?= $lootdrop['id'] ?>&action=18"
                               style="color:yellow;">Normalize Drops</a>
                        </td>
                    </tr>
                </table>
            </div><br>
            <table>
            <?php if (!isset($lootdrop['items'])): ?>
            <tr>
                <td style="text-align: left; width: 100%; padding: 10px;">No items currently assigned to this
                    lootdrop
                </td>
            </tr>
        <?php endif; ?>
            </table>
            </div>
        <?php endforeach; ?>
        </div>
    <?php endif; ?>
<?php } /*endelse*/ ?>
