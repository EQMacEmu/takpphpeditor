<div class="table_container" style="width: 400px;">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0;">Forage</td>
                <td style="padding: 0; text-align: right;">
                    <a href="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=11"><img
                                src="images/add.gif" style="border: 0;" alt="Add Icon"
                                title="Add an entry to this zone"></a>
                </td>
            </tr>
        </table>
    </div>

    <table class="table_content2" style="width: 100%;">
        <tr>
            <td style="text-align: center; width: 5%"><strong>ID</strong></td>
            <td style="text-align: center; width: 10%"><strong>Zone</strong></td>
            <td style="text-align: center; width: 20%"><strong>Item</strong></td>
            <td style="text-align: center; width: 5%"><strong>Level</strong></td>
            <td style="text-align: center; width: 5%"><strong>Chance</strong></td>
            <th style="width: 5%;"></th>
        </tr>
        <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA"; ?>">
            <td style="text-align: center; width: 5%"><?= $fgid ?? "" ?></td>
            <?php if ($zoneid == 0): ?>
                <td style="text-align: center; width: 10%">All</td>
            <?php endif; ?>
            <?php if ($zoneid != 0): ?>
                <td style="text-align: center; width: 10%"><?= getZoneName($zoneid) ?></td>
            <?php endif; ?>
            <td style="text-align: center; width: 20%"><?= get_item_name($fgiid ?? "") ?> <span>[<a
                            href="https://lucy.allakhazam.com/item.html?id=<?= $fgiid ?? "" ?>">lucy</a>]</span></td>
            <td style="text-align: center; width: 5%"><?= $level ?></td>
            <td style="text-align: center; width: 5%"><?= $chance ?? "" ?>%</td>
            <td style="text-align: right;">
                <a href="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&fgid=<?= $fgid ?? "" ?>&action=8"><img
                            src="images/edit2.gif" style="border: 0;" alt="Edit Icon" title="Edit Entry"></a>
                <a href="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&fgid=<?= $fgid ?? "" ?>&action=10"><img
                            src="images/remove3.gif" style="border: 0;" alt="Remove Icon" title="Delete this entry"></a>
            </td>
        </tr>
    </table>