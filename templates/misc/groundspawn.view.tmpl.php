<div class="table_container" style="width: 600px;">
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
        <tr>
            <td style="text-align: center; width: 5%"><strong>id</strong></td>
            <td style="text-align: center; width: 10%"><strong>zone</strong></td>
            <td style="text-align: center; width: 10%"><strong>item</strong></td>
            <td style="text-align: center; width: 5%"><strong>max</strong></td>
            <td style="text-align: center; width: 5%"><strong>max x</strong></td>
            <td style="text-align: center; width: 5%"><strong>max y</strong></td>
            <td style="text-align: center; width: 5%"><strong>max z</strong></td>
            <td style="text-align: center; width: 5%"><strong>min x</strong></td>
            <td style="text-align: center; width: 5%"><strong>min y</strong></td>
            <td style="text-align: center; width: 5%"><strong>respawn</strong></td>
            <th style="width: 5%;"></th>
        </tr>
        <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA"; ?>">
            <td style="text-align: center; width: 5%"><?= $gsid ?? "" ?></td>
            <?php if ($zoneid == 0): ?>
                <td style="text-align: center; width: 10%">All</td>
            <?php endif; ?>
            <?php if ($zoneid != 0): ?>
                <td style="text-align: center; width: 10%"><?= getZoneName($zoneid) ?></td>
            <?php endif; ?>
            <td style="text-align: center; width: 10%"><?= get_item_name($giid ?? "") ?> <span>[<a
                            href="https://lucy.allakhazam.com/item.html?id=<?= $giid ?? "" ?>">lucy</a>]</span></td>
            <td style="text-align: center; width: 5%"><?= $max_allowed ?? "" ?></td>
            <td style="text-align: center; width: 5%"><?= $max_x ?? "" ?></td>
            <td style="text-align: center; width: 5%"><?= $max_y ?? "" ?></td>
            <td style="text-align: center; width: 5%"><?= $max_z ?? "" ?></td>
            <td style="text-align: center; width: 5%"><?= $min_x ?? "" ?></td>
            <td style="text-align: center; width: 5%"><?= $min_y ?? "" ?></td>
            <td style="text-align: center; width: 5%"><?= $respawn_timer ?? "" ?></td>
            <td style="text-align: right;">
                <a href="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&gsid=<?= $gsid ?? "" ?>&action=14"><img
                            src="images/edit2.gif" style="border: 0;" alt="Edit Icon" title="Edit Entry"></a>
                <a href="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&gsid=<?= $gsid ?? "" ?>&action=16"><img
                            src="images/remove3.gif" style="border: 0;" alt="Remove Icon" title="Delete this entry"></a>
            </td>
        </tr>
    </table>