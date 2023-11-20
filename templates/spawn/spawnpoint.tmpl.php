<center>
    <table>
        <tr>
            <td style="background-color: #CCC; border: 1px solid black; padding: 5px;">
                <a href="/index.php?editor=spawn&z=<?= $currzone ?? ""; ?>&zoneid=<?= $currzoneid ?? ""; ?>&npcid=<?= $npcid ?? ""; ?>&sid=<?= $sid ?? ""; ?>&action=14">Add
                    a spawnpoint to this Spawngroup</a>
            </td>
        </tr>
    </table>
</center><br><br>
<?php if (isset($spawnpoints)): ?>
    <?php foreach ($spawnpoints as $sp): extract($sp); ?>
        <div style="border: 1px solid black; margin-bottom: 15px;">
            <div class="table_header">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>
                            Spawnpoint ID: <?= $id ?> <a
                                    href="/index.php?editor=spawn&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcid ?>&sid=<?= $sid ?>&spid=<?= $id ?>&action=35">spawn
                                status</a></td>
                        </td>
                        <td align="right">
                            <a href="index.php?editor=spawn&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcid ?>">View
                                Spawngroups for this spawnpoint</a>&nbsp;
                            <a href="/index.php?editor=spawn&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcid ?>&spid=<?= $id ?>&sid=<?= $sid ?>&action=18"><img
                                        src="/images/add.gif" border="0" title="Add a grid to this Spawnpoint"
                                        alt="Add symbol"></a>&nbsp;
                            <a href="/index.php?editor=spawn&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcid ?>&id=<?= $id ?>&action=11"><img
                                        src="/images/c_table.gif" border="0" title="Edit this Spawnpoint"
                                        alt="Edit symbol"></a>&nbsp;
                            <a href="/index.php?editor=spawn&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcid ?>&id=<?= $id ?>&action=50"><img
                                        src="/images/last.gif" border="0" title="Copy this Spawnpoint"
                                        alt="Copy symbol"></a>&nbsp;
                            <a href="/index.php?editor=spawn&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcid ?>&id=<?= $id ?>&action=52"><img
                                        src="/images/next.gif" border="0" title="Move this Spawnpoint"
                                        alt="Move symbol"></a>&nbsp;
                            <a onClick="return confirm('Really delete this spawnpoint?');"
                               href="/index.php?editor=spawn&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcid ?>&sid=<?= $sid ?>&id=<?= $id ?>&action=13"><img
                                        src="/images/table.gif" border="0" title="Delete this Spawnpoint"></a>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="edit_form_content">
                <table width="100%">
                    <tr>
                        <td width="33%">x: <?= $x ?></td>
                        <td width="33%">y: <?= $y ?></td>
                        <td width="34%">z: <?= $z ?></td>
                    </tr>
                    <tr>
                        <td width="33%">heading: <?= $heading ?></td>
                        <td width="33%">respawn: <?= timer_text($respawntime) ?></td>
                        <td width="34%">variance: <?= timer_text($variance) ?></td>
                    </tr>
                    <tr>
                        <?php if ($pathgrid > 0): ?>
                            <td width="33%">pathgrid: <a
                                        href="/index.php?editor=spawn&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcid ?>&spid=<?= $id ?>&pathgrid=<?= $pathgrid ?>&action=20"><?= $pathgrid ?>
                            </td>
                        <?php endif; ?>
                        <?php if ($pathgrid < 1): ?>
                            <td width="33%">pathgrid: <?= $pathgrid ?></td>
                        <?php endif; ?>
                        <?php if ($_condition > 0): ?>
                            <td width="33%">condition: <a
                                        href="/index.php?editor=spawn&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcid ?>&spid=<?= $id ?>&action=36"><?= $_condition ?>
                            </td>
                        <?php endif; ?>
                        <?php if ($_condition < 1): ?>
                            <td width="33%">condition: <?= $_condition ?></td>
                        <?php endif; ?>
                        <td width="34%">cond_value: <?= $cond_value ?></td>
                    </tr>
                    <tr>
                        <td width="33%">enabled: <?= $yesno[$enabled] ?></td>
                        <td width="33%">animation: <?= $animations[$animation] ?></td>
                        <td width="33%">force_z: <?= $yesno[$force_z] ?></td>
                    </tr>
                    <tr>
                        <td width="33%">boot respawn: <?= timer_text($boot_respawntime) ?></td>
                        <td width="33%">boot variance: <?= timer_text($boot_variance) ?></td>
                        <td width="33%">clear on boot: <?= $clear_timer_onboot ?></td>
                    </tr>
                    <tr>
                        <td width="33%">zone: <?= $zone ?></td>
                        <td width="33%">min_expansion: <?= $min_expansion ?></td>
                        <td width="34%">max_expansion: <?= $max_expansion ?></td>
                    </tr>
                </table>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
<?php if (!isset($spawnpoints)): ?>
    <div class="table_container">
        <div class="edit_form_header">
            Spawnpoints
        </div>
        <div class="table_content">
            No Spawnpoints assigned to this spawngroup
        </div>
    </div>
<?php endif; ?>
    