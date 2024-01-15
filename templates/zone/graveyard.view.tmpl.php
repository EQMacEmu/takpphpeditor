<div class="table_container" style="width: 500px;">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0;">Graveyard List</a></td>
            </tr>
        </table>
    </div>

    <table class="table_content2" style="width: 100%;">
        <tr>
            <td style="text-align: center; width: 5%"><strong>ID</strong></td>
            <td style="text-align: center; width: 12%"><strong>Zone</strong></td>
            <td style="text-align: center; width: 8%"><strong>X</strong></td>
            <td style="text-align: center; width: 8%"><strong>Y</strong></td>
            <td style="text-align: center; width: 10%"><strong>Z</strong></td>
            <td style="text-align: center; width: 8%"><strong>Heading</strong></td>
            <th style="width: 5%;"></th>
        </tr>
        <?php $x = 0;
        foreach ($graveyard as $key => $v): ?>
            <tr style="background-color: #<?php echo ($x % 2 == 0) ? "AAAAAA" : "BBBBBB"; ?>">
                <td style="text-align: center; width: 5%"><?= $v['graveyard_id'] ?></td>
                <td style="text-align: center; width: 12%"><?= getZoneName($v['zone_id']) ?></td>
                <td style="text-align: center; width: 8%"><?= $v['x'] ?></td>
                <td style="text-align: center; width: 8%"><?= $v['y'] ?></td>
                <td style="text-align: center; width: 8%"><?= $v['z_coord'] ?></td>
                <td style="text-align: center; width: 8%"><?= $v['heading'] ?></td>
                <td style="text-align: right;">
                    <a href="index.php?editor=zone&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&graveyard_id=<?= $v['graveyard_id'] ?>&action=5"><img
                                src="images/edit2.gif" style="border: 0;" alt="Edit Icon" title="Edit Graveyard"></a>
                    <a onClick="return confirm('Really Delete Graveyard <?= $v['graveyard_id'] ?>?');"
                       href="index.php?editor=zone&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&graveyard_id=<?= $v['graveyard_id'] ?>&action=11"><img
                                src="images/remove3.gif" style="border: 0;" alt="Edit Icon" title="Delete this Graveyard"></a>
                </td>
            </tr>
            <?php $x++; endforeach; ?>
        