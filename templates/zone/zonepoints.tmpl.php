<div class="table_container" style="width: 750px;">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0;">Zone Points</td>
                <td style="padding: 0; text-align: right;">
                    <a href="index.php?editor=zone&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=16"><img
                                src="images/add.gif" style="border: 0;" alt="Add Icon" title="Add a zone point"></a>
                </td>
            </tr>
        </table>
    </div>

    <table class="table_content2" style="width: 100%;">
        <?php if (isset($zonepoints)): ?>
        <tr>
            <td style="text-align: center; width: 5%"><strong>id</strong></td>
            <td style="text-align: center; width: 5%"><strong>zone</strong></td>
            <td style="text-align: center; width: 5%"><strong>number</strong></td>
            <td style="text-align: center; width: 5%"><strong>x</strong></td>
            <td style="text-align: center; width: 5%"><strong>y</strong></td>
            <td style="text-align: center; width: 5%"><strong>z</strong></td>
            <td style="text-align: center; width: 5%"><strong>heading</strong></td>
            <td style="text-align: center; width: 5%"><strong>target x</strong></td>
            <td style="text-align: center; width: 5%"><strong>target y</strong></td>
            <td style="text-align: center; width: 5%"><strong>target z</strong></td>
            <td style="text-align: center; width: 5%"><strong>target heading</strong></td>
            <td style="text-align: center; width: 5%"><strong>target zone</strong></td>
            <th style="width: 5%;"></th>
        </tr>
        <?php $x = 0;
        foreach ($zonepoints as $key => $v): ?>
            <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA"; ?>">
                <td style="text-align: center; width: 5%"><?= $v['zpid'] ?></td>
                <td style="text-align: center; width: 5%"><?= $v['zone'] ?></td>
                <td style="text-align: center; width: 5%"><?= $v['number'] ?></td>
                <td style="text-align: center; width: 5%"><?= $v['x_coord'] ?></td>
                <td style="text-align: center; width: 5%"><?= $v['y_coord'] ?></td>
                <td style="text-align: center; width: 5%"><?= $v['z_coord'] ?></td>
                <td style="text-align: center; width: 5%"><?= $v['heading'] ?></td>
                <td style="text-align: center; width: 5%"><?= $v['target_x'] ?></td>
                <td style="text-align: center; width: 5%"><?= $v['target_y'] ?></td>
                <td style="text-align: center; width: 5%"><?= $v['target_z'] ?></td>
                <td style="text-align: center; width: 5%"><?= $v['target_heading'] ?></td>
                <td style="text-align: center; width: 5%"><?= getZoneName($v['target_zone_id']) ?></td>
                <td style="text-align: right;">
                    <a href="index.php?editor=zone&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&zpid=<?= $v['zpid'] ?>&action=13"><img
                                src="images/edit2.gif" style="border: 0;" alt="Edit Icon" title="Edit Entry"></a>
                    <a onClick="return confirm('Really Delete Point <?= $v['zpid'] ?>?');"
                       href="index.php?editor=zone&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&zpid=<?= $v['zpid'] ?>&action=15"><img
                                src="images/remove3.gif" style="border: 0;" alt="Remove Icon" title="Delete this entry"></a>
                </td>
            </tr>
            <?php $x++; endforeach; ?>
    </table>
    <?php endif; ?>
    <?php if (!isset($zonepoints)): ?>
    <tr>
        <td style="text-align: left; width: 100px; padding: 10px;">No zone points found</td>
    </tr>
<?php endif; ?>