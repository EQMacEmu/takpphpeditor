<div class="table_container" style="width: 750px;">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0;">Traps</td>
                <td style="padding: 0; text-align: right;">
                    <a href="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=23"><img
                                src="images/add.gif" style="border: 0;" alt="Add Icon"
                                title="Add an entry to this zone"></a>
                </td>
            </tr>
        </table>
    </div>

    <table class="table_content2" style="width: 100%;">
        <?php if (isset($traps)): ?>
            <tr>
                <td style="text-align: center; width: 5%"><strong>id</strong></td>
                <td style="text-align: center; width: 5%"><strong>x</strong></td>
                <td style="text-align: center; width: 5%"><strong>y</strong></td>
                <td style="text-align: center; width: 5%"><strong>z</strong></td>
                <td style="text-align: center; width: 5%"><strong>maxzdiff</strong></td>
                <td style="text-align: center; width: 5%"><strong>radius</strong></td>
                <td style="text-align: center; width: 5%"><strong>chance</strong></td>
                <td style="text-align: center; width: 10%"><strong>effect</strong></td>
                <td style="text-align: center; width: 10%"><strong>value</strong></td>
                <td style="text-align: center; width: 10%"><strong>value2</strong></td>
                <td style="text-align: center; width: 5%"><strong>skill</strong></td>
                <td style="text-align: center; width: 5%"><strong>level</strong></td>
                <td style="text-align: center; width: 5%"><strong>respawn</strong></td>
                <td style="text-align: center; width: 5%"><strong>variance</strong></td>
                <td style="text-align: center; width: 5%"><strong>group</strong></td>
                <th style="width: 5%;"></th>
            </tr>
            <?php $x = 0;
            foreach ($traps as $key => $v): ?>
                <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA"; ?>">
                    <td style="text-align: center; width: 5%"><?= $v['tid'] ?></td>
                    <td style="text-align: center; width: 5%"><?= $v['x_coord'] ?></td>
                    <td style="text-align: center; width: 5%"><?= $v['y_coord'] ?></td>
                    <td style="text-align: center; width: 5%"><?= $v['z_coord'] ?></td>
                    <td style="text-align: center; width: 5%"><?= $v['maxzdiff'] ?></td>
                    <td style="text-align: center; width: 5%"><?= $v['radius'] ?></td>
                    <td style="text-align: center; width: 5%"><?= $v['chance'] ?>%</td>
                    <td style="text-align: center; width: 10%"><?= $traptype[$v['effect']] ?></td>
                    <?php if ($v['effect'] == 2 || $v['effect'] == 3): ?>
                        <td style="text-align: center; width: 10%"><a
                                    href="index.php?editor=npc&z=<?= get_zone_by_npcid($v['effectvalue']) ?>&zoneid=<?= get_zoneid_by_npcid($v['effectvalue']) ?>&npcid=<?= $v['effectvalue'] ?>"><?= getNPCName($v['effectvalue']) ?>
                        </td>
                    <?php endif; ?>
                    <?php if ($v['effect'] == 1 || $v['effect'] == 4): ?>
                        <td style="text-align: center; width: 10%"><?= $v['effectvalue'] ?></td>
                    <?php endif; ?>
                    <?php if ($v['effect'] == 0): ?>
                    <td style="text-align: center; width: 10%"><?= getSpellName($v['effectvalue']) ?> <span>[<a
                                    href="https://lucy.allakhazam.com/spell.html?id=<?= $v['effectvalue'] ?>">lucy</a>]</span>
                        <?php endif; ?>
                        <?php if ($v['effect'] == 1): ?>
                    <td style="text-align: center; width: 10%"><?= $alarmtype[$v['effectvalue2']] ?></td>
                <?php endif; ?>
                    <?php if ($v['effect'] < 1 || $v['effect'] > 1): ?>
                        <td style="text-align: center; width: 10%"><?= $v['effectvalue2'] ?></td>
                    <?php endif; ?>
                    <td style="text-align: center; width: 5%"><?= $v['skill'] ?></td>
                    <td style="text-align: center; width: 5%"><?= $v['level'] ?></td>
                    <td style="text-align: center; width: 5%"><?= $v['respawn_time'] ?></td>
                    <td style="text-align: center; width: 5%"><?= $v['respawn_var'] ?></td>
                    <td style="text-align: center; width: 5%"><?= $v['group'] ?></td>
                    <td style="text-align: right;">
                        <a href="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&tid=<?= $v['tid'] ?>&action=20"><img
                                    src="images/edit2.gif" style="border: 0;" alt="Edit Icon" title="Edit Entry"></a>
                        <a onClick="return confirm('Really Delete Trap <?= $v['tid'] ?>?');"
                           href="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&tid=<?= $v['tid'] ?>&action=22"><img
                                    src="images/remove3.gif" style="border: 0;" alt="Remove Icon"
                                    title="Delete this entry"></a>
                    </td>
                </tr>
                <?php $x++; endforeach; ?>
        <?php endif; ?>
        <?php if (!isset($traps)): ?>
            <tr>
                <td style="text-align: left; width: 100px; padding: 10px;">Walk confidently, there are no traps here
                </td>
            </tr>
        <?php endif; ?>
    </table>
</div>
