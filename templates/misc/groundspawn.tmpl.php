<div class="table_container" style="width: 750px;">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0;">Ground Spawns</td>
                <td style="padding: 0; text-align: right;">
                    <a href="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=17"><img
                                src="images/add.gif" style="border: 0;" alt="Add Icon"
                                title="Add an entry to this zone"></a>
                </td>
            </tr>
        </table>
    </div>

    <table class="table_content2" style="width: 100%;">
        <?php if (isset($gspawn)): ?>
        <tr>
            <td style="text-align: center; width: 5%"><strong>id</strong></td>
            <td style="text-align: center; width: 20%"><strong>item</strong></td>
            <td style="text-align: center; width: 5%"><strong>max</strong></td>
            <td style="text-align: center; width: 5%"><strong>max x</strong></td>
            <td style="text-align: center; width: 5%"><strong>max y</strong></td>
            <td style="text-align: center; width: 5%"><strong>max z</strong></td>
            <td style="text-align: center; width: 5%"><strong>min x</strong></td>
            <td style="text-align: center; width: 5%"><strong>min y</strong></td>
            <td style="text-align: center; width: 5%"><strong>respawn</strong></td>
            <th style="width: 5%;"></th>
        </tr>
        <?php $x = 0;
        foreach ($gspawn as $key => $v): ?>
            <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA"; ?>">
                <td style="text-align: center; width: 5%"><?= $v['gsid'] ?></td>
                <td style="text-align: center; width: 20%"><a
                            href="index.php?editor=items&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&id=<?= $v['giid'] ?>&action=2"><?= $v['iname'] ?></a>
                    <span>[<a href="https://lucy.allakhazam.com/item.html?id=<?= $v['giid'] ?>">lucy</a>]</span></td>
                <td style="text-align: center; width: 5%"><?= $v['max_allowed'] ?></td>
                <td style="text-align: center; width: 5%"><?= $v['max_x'] ?></td>
                <td style="text-align: center; width: 5%"><?= $v['max_y'] ?></td>
                <td style="text-align: center; width: 5%"><?= $v['max_z'] ?></td>
                <td style="text-align: center; width: 5%"><?= $v['min_x'] ?></td>
                <td style="text-align: center; width: 5%"><?= $v['min_y'] ?></td>
                <td style="text-align: center; width: 5%"><?= $v['respawn_timer'] ?></td>
                <td style="text-align: right;">
                    <a href="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&gsid=<?= $v['gsid'] ?>&action=14"><img
                                src="images/edit2.gif" style="border: 0;" alt="Edit Icon" title="Edit Entry"></a>
                    <a onClick="return confirm('Really Delete Entry <?= $v['gsid'] ?>?');"
                       href="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&gsid=<?= $v['gsid'] ?>&action=16"><img
                                src="images/remove3.gif" style="border: 0;" alt="Remove Icon" title="Delete this entry"></a>
                </td>
            </tr>
            <?php $x++; endforeach; ?>
    </table>
    <?php endif; ?>
    <?php if (!isset($gspawn)): ?>
    <tr>
        <td style="text-align: left; width: 100px; padding: 10px;">No ground spawns</td>
    </tr>
<?php endif; ?>