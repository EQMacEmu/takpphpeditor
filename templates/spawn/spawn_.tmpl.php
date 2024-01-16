<?php if (empty($spawngroups)): ?>
    <div class="center">
        <table style="border: 1px solid black; background-color: #CCC; width: 32%">
            <tr>
                <td style="text-align: left; width: 100px; padding: 10px;">No spawngroups found for that search.</td>
            </tr>
        </table>
    </div>
<?php endif; ?>
<?php if (!empty($spawngroups)): ?>
    <table class="edit_form">
        <tr>
            <td class="edit_form_header">
                Spawngroup options
            </td>
        </tr>
        <tr>
            <td class="edit_form_content">
                <ul style="padding-left: 25px;">
                    <li>
                        <a href="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&minx=<?= $minx ?? "" ?>&miny=<?= $miny ?? "" ?>&maxx=<?= $maxx ?? "" ?>&maxy=<?= $maxy ?? "" ?>&limit=<?= $limit ?? "" ?>&npcname=<?= $npcname ?? "" ?>&action=69">Click
                            here to add a NPC to all listed spawngroups</a></li>
                    <br>
                    <?php
                    if (empty($spawngroup_limit)) {
                        $spawngroup_limit = 150;
                    }
                    ?>
                    <div class="center">Spawngroup entries will be limited to <?= $spawngroup_limit ?> displayed
                        results.
                    </div>
                </ul>
        </tr>
    </table>
    <br/>
    <?php foreach ($spawngroups as $sg): extract($sg); ?>
        <div style="border: 1px solid black; margin-bottom: 15px;">
            <div class="table_header">
                <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
                    <tr>
                        <td style="padding: 0; ">
                            Spawngroup <a
                                    href="index.php?editor=spawn&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcID ?>&sid=<?= $spawngroupID ?>&action=4"><?= $spawngroupID ?></a>
                            - <?= $name ?>            </td>
                        <td style="padding: 0; ">
                            spawn_limit: <a
                                    href="index.php?editor=spawn&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcid ?>&sid=<?= $spawngroupID ?>&action=4"><?= $spawn_limit ?></a>
                        </td>
                        <td style="padding: 0;">
                            <a href="index.php?editor=spawn&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcid ?>&sid=<?= $spawngroupID ?>&action=10">View
                                Spawnpoints (<?= $count ?>) for this Spawngroup</a>
                        </td>
                        <td style="padding: 0; text-align: right;">
                            <a href="index.php?editor=spawn&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcID ?>&sid=<?= $spawngroupID ?>&action=72"><img
                                        src="images/add.gif" style="border: 0;" alt="Add Icon"
                                        title="Add an NPC to this Spawngroup"></a>&nbsp;
                            <a onClick="return confirm('Really delete this spawngroup?\n  THIS WILL DELETE ALL OF THIS SPAWNGROUP\'S SPAWNPOINTS, AS WELL!');"
                               href="index.php?editor=spawn&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcID ?>&sid=<?= $spawngroupID ?>&action=6"><img
                                        src="images/remove2.gif" style="border: 0;" alt="Delete Spawngroup Icon"
                                        title="Delete this Spawngroup"></a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="table_header">
                <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
                    <tr>
                        <td style="padding: 0; width: 20%">
                            WP Spawns: <a
                                    href="index.php?editor=spawn&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcID ?>&sid=<?= $spawngroupID ?>&action=4"><?php echo ($wp_spawns) ? "Enabled" : "Off"; ?></a>
                        </td>
                        <td style="padding: 0; width: 20%">
                            min_x: <a
                                    href="index.php?editor=spawn&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcID ?>&sid=<?= $spawngroupID ?>&action=4"><?= $min_x ?></a>
                        </td>
                        <td style="padding: 0; width: 20%">
                            max_x: <a
                                    href="index.php?editor=spawn&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcID ?>&sid=<?= $spawngroupID ?>&action=4"><?= $max_x ?></a>
                        </td>
                        <td style="padding: 0; width: 20%">
                            min_y: <a
                                    href="index.php?editor=spawn&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcID ?>&sid=<?= $spawngroupID ?>&action=4"><?= $min_y ?></a>
                        </td>
                        <td style="padding: 0; width: 20%">
                            max_y: <a
                                    href="index.php?editor=spawn&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcID ?>&sid=<?= $spawngroupID ?>&action=4"><?= $max_y ?></a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="table_header">
                <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
                    <tr>
                        <td style="padding: 0; width: 25%">
                            mindelay: <a
                                    href="index.php?editor=spawn&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcID ?>&sid=<?= $spawngroupID ?>&action=4"><?= $mindelay ?></a>
                        </td>
                        <td style="padding: 0; width: 25%">
                            delay: <a
                                    href="index.php?editor=spawn&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcID ?>&sid=<?= $spawngroupID ?>&action=4"><?= $delay ?></a>
                        </td>
                        <td style="padding: 0; width: 25%">
                            despawn: <a
                                    href="index.php?editor=spawn&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcID ?>&sid=<?= $spawngroupID ?>&action=4"><?= $despawntype[$despawn] ?? "None"; ?></a>
                        </td>
                        <td style="padding: 0; width: 25%">
                            despawn timer: <a
                                    href="index.php?editor=spawn&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcID ?>&sid=<?= $spawngroupID ?>&action=4"><?= $despawn_timer ?></a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="table_header">
                <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
                    <tr>
                        <td style="padding: 0; width: 25%">
                            rand_spawns: <a
                                    href="index.php?editor=spawn&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcID ?>&sid=<?= $spawngroupID ?>&action=4"><?= $rand_spawns ?></a>
                        </td>
                        <td style="padding: 0; width: 25%">
                            rand_respawntime: <a
                                    href="index.php?editor=spawn&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcID ?>&sid=<?= $spawngroupID ?>&action=4"><?= $rand_respawntime ?></a>
                        </td>
                        <td style="padding: 0; width: 25%">
                            rand_variance: <a
                                    href="index.php?editor=spawn&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcID ?>&sid=<?= $spawngroupID ?>&action=4"><?= $rand_variance ?></a>
                        </td>
                        <td style="padding: 0; width: 25%">
                            rand_condition: <a
                                    href="index.php?editor=spawn&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcID ?>&sid=<?= $spawngroupID ?>&action=4"><?= $rand_condition_ ?></a>
                        </td>
                    </tr>
                </table>
            </div>
            <?php if ($npcs != ''): ?>
                <div class="table_content2" style="padding: 0;">
                    <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
                        <tr style="background-color: #AAAAAA">
                            <th style="width: 50%">NPC</th>
                            <th style="width: 25%; text-align: center;">Chance</th>
                            <th style="width: 25%; text-align: center;">&nbsp;</th>
                        </tr>
                        <?php $x = 0; $chance_total = $chance_total ?? 0;
                        foreach ($npcs as $npc): extract($npc);
                            $chance_total += $chance; ?>
                            <tr style="background-color: #<?php echo ($x % 2 == 1) ? "AAAAAA" : "BBBBBB"; ?>">
                                <td>
                                    <a href="index.php?editor=npc&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcID ?>"><?= $name ?></a>
                                    (<?= $npcID ?>)
                                </td>
                                <td style="text-align: center;"><?= $chance ?></a></td>
                                <td style="text-align: right;">
                                    <a href="index.php?editor=spawn&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcid ?>&sid=<?= $spawngroupID ?>&sgnpcid=<?= $npcID ?>&action=1"><img
                                                src="images/edit2.gif" alt="Edit Spawngroup Icon"
                                                title="Edit this Spawngroup Member" style="border: 0;"></a>&nbsp;
                                    <a onClick="return confirm('Really delete this NPC from the spawngroup?');"
                                       href="index.php?editor=spawn&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcid ?>&sid=<?= $spawngroupID ?>&sgnpcid=<?= $npcID ?>&action=71"><img
                                                src="images/table.gif" alt="Remove Icon"
                                                title="Remove this Spawngroup Member and Balance Group"
                                                style="border: 0;"></a>
                                    <a onClick="return confirm('Really delete this NPC from the spawngroup?');"
                                       href="index.php?editor=spawn&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcid ?>&sid=<?= $spawngroupID ?>&sgnpcid=<?= $npcID ?>&action=7"><img
                                                src="images/remove.gif" alt="Remove Icon"
                                                title="Remove this Spawngroup Member" style="border: 0;"></a>
                                </td>
                            </tr>
                            <?php $x++;endforeach; ?>
                        <tr style="background-color: #AAAAAA">
                            <td colspan="3" style="text-align: right;">
                                <a href="index.php?editor=spawn&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcid ?>&sid=<?= $spawngroupID ?>&action=3">Balance
                                    Spawn Rates</a> (<?php if ($chance_total != 100) {
                                    echo "<strong><span style='color: red'>";
                                } else {
                                    echo "<span style='color: green'>";
                                } ?>Currently: <?= $chance_total ?>
                                %</span><?php if ($chance_total != 100) echo "</strong>"; ?>)<?php $chance_total = 0; ?>
                            </td>
                        </tr>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>