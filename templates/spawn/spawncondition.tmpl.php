<div class="table_container" style="width: 550px;">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0;">Spawn Conditions</td>
                <td style="padding: 0; text-align: right;">
                    <a href="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&spid=<?= $spid ?>&scid=<?= $v['scid'] ?? "" ?>&action=45"><img
                                src="images/add.gif" style="border: 0;" alt="Add Icon"
                                title="Add an entry to this zone"></a>
                </td>
            </tr>
        </table>
    </div>

    <table class="table_content2" style="width: 100%;">
        <?php if (isset($spawnc)): ?>
            <tr>
                <td style="text-align: center; width: 5%"><strong>id</strong></td>
                <td style="text-align: center; width: 10%"><strong>value</strong></td>
                <td style="text-align: center; width: 10%"><strong>onchange</strong></td>
                <td style="text-align: center; width: 10%"><strong>name</strong></td>
                <th style="width: 5%;"></th>
            </tr>
            <?php $x = 0;
            foreach ($spawnc as $key => $v): ?>
                <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA"; ?>">
                    <td style="text-align: center; width: 5%"><?= $v['scid'] ?></td>
                    <td style="text-align: center; width: 10%"><?= $v['value'] ?></td>
                    <td style="text-align: center; width: 10%"><?= $ochangetype[$v['onchange']] ?></td>
                    <td style="text-align: center; width: 10%"><?= $v['name'] ?></td>
                    <td style="text-align: right;">
                        <a href="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&spid=<?= $spid ?>&scid=<?= $v['scid'] ?>&action=42"><img
                                    src="images/edit2.gif" style="border: 0;" alt="Edit Icon" title="Edit Entry"></a>
                        <a href="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&spid=<?= $spid ?>&scid=<?= $v['scid'] ?>&action=60"><img
                                    src="images/config.gif" style="border: 0;" alt="View Icon" title="View entries"></a>
                        <a onClick="return confirm('Really Delete Condition <?= $v['scid'] ?>?');"
                           href="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&spid=<?= $spid ?>&scid=<?= $v['scid'] ?>&action=44"><img
                                    src="images/remove3.gif" style="border: 0;" alt="Delete Icon"
                                    title="Delete this entry"></a>
                    </td>
                </tr>
                <?php $x++; endforeach; ?>

        <?php endif; ?>
        <?php if (!isset($spawnc)): ?>
            <tr>
                <td style="text-align: left; width: 100px; padding: 10px;">No spawn conditions</td>
            </tr>
        <?php endif; ?>
    </table>
</div>

<br><br>

<div class="table_container" style="width: 750px;">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0;">Spawn Events</td>
                <td style="padding: 0; text-align: right;">
                    <a href="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&spid=<?= $spid ?>&seid=<?= $v['seid'] ?>&action=40"><img
                                src="images/add.gif" style="border: 0;" alt="Add Icon" title="Add a spawn event"></a>
                </td>
            </tr>
        </table>
    </div>

    <table class="table_content2" style="width: 100%;">
        <?php if (isset($spawne)): ?>
            <tr>
                <td style="text-align: center; width: 5%"><strong>id</strong></td>
                <td style="text-align: center; width: 5%"><strong>cond id</strong></td>
                <td style="text-align: center; width: 10%"><strong>name</strong></td>
                <td style="text-align: center; width: 5%"><strong>period</strong></td>
                <td style="text-align: center; width: 5%"><strong>min</strong></td>
                <td style="text-align: center; width: 5%"><strong>hour</strong></td>
                <td style="text-align: center; width: 5%"><strong>day</strong></td>
                <td style="text-align: center; width: 5%"><strong>month</strong></td>
                <td style="text-align: center; width: 5%"><strong>year</strong></td>
                <td style="text-align: center; width: 5%"><strong>enabled</strong></td>
                <td style="text-align: center; width: 5%"><strong>action</strong></td>
                <td style="text-align: center; width: 5%"><strong>argument</strong></td>
                <td style="text-align: center; width: 5%"><strong>strict</strong></td>
                <th style="width: 5%;"></th>
            </tr>
            <?php $x = 0;
            foreach ($spawne as $key => $v): ?>
                <tr style="background-color: #<?php echo ($x % 2 == 0) ? "AAAAAA" : "BBBBBB"; ?>">
                    <td style="text-align: center; width: 5%"><?= $v['seid'] ?></td>
                    <td style="text-align: center; width: 5%"><?= $v['cond_id'] ?></td>
                    <td style="text-align: center; width: 10%"><?= $v['sename'] ?></td>
                    <td style="text-align: center; width: 5%"><?= $v['period'] ?></td>
                    <td style="text-align: center; width: 5%"><?= $v['next_minute'] ?></td>
                    <td style="text-align: center; width: 5%"><?= $v['next_hour'] ?></td>
                    <td style="text-align: center; width: 5%"><?= $v['next_day'] ?></td>
                    <td style="text-align: center; width: 5%"><?= $v['next_month'] ?></td>
                    <td style="text-align: center; width: 5%"><?= $v['next_year'] ?></td>
                    <td style="text-align: center; width: 5%"><?= $yesno[$v['enabled']] ?></td>
                    <td style="text-align: center; width: 5%"><?= $actiontype[$v['action']] ?></td>
                    <td style="text-align: center; width: 5%"><?= $v['argument'] ?></td>
                    <td style="text-align: center; width: 5%"><?= $yesno[$v['strict']] ?></td>
                    <td style="text-align: right;">
                        <a href="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&spid=<?= $spid ?>&seid=<?= $v['seid'] ?>&action=37"><img
                                    src="images/edit2.gif" style="border: 0;" alt="Edit Icon" title="Edit Entry"></a>
                        <a onClick="return confirm('Really Delete Condition <?= $v['seid'] ?>?');"
                           href="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&spid=<?= $spid ?>&seid=<?= $v['seid'] ?>&action=39"><img
                                    src="images/remove3.gif" style="border: 0;" alt="Remove Icon"
                                    title="Delete this entry"></a>
                    </td>
                </tr>
                <?php $x++; endforeach; ?>

        <?php endif; ?>
        <?php if (!isset($spawne)): ?>
            <tr>
                <td style="text-align: left; width: 100px; padding: 10px;">No spawn events</td>
            </tr>
        <?php endif; ?>
    </table>
</div>