<div class="table_container" style="width: 600px;">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0;">Fishing</td>
                <td style="padding: 0; text-align: right;">
                    <a href="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=5"><img
                                src="images/add.gif" style="border: 0;" alt="Add Icon"
                                title="Add an entry to this zone"></a>
                </td>
            </tr>
        </table>
    </div>

    <table class="table_content2" style="width: 100%;">
        <tr>
            <td style="text-align: center; width: 5%"><strong>ID</strong></td>
            <td style="text-align: center; width: 12%"><strong>Item</strong></td>
            <td style="text-align: center; width: 12%"><strong>Zone</strong></td>
            <td style="text-align: center; width: 8%"><strong>Skill Level</strong></td>
            <td style="text-align: center; width: 8%"><strong>Chance</strong></td>
            <th style="width: 5%;"></th>
        </tr>
        <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA"; ?>">
            <td style="text-align: center; width: 5%"><?= $fsid ?? "" ?></td>
            <td style="text-align: center; width: 12%"><?= get_item_name($fiid ?? "") ?> <span>[<a
                            href="https://lucy.allakhazam.com/item.html?id=<?= $fiid ?? "" ?>">lucy</a>]</span></td>
            <?php if ($zoneid == 0): ?>
                <td style="text-align: center; width: 12%">All</td>
            <?php endif; ?>
            <?php if ($zoneid != 0): ?>
                <td style="text-align: center; width: 12%"><?= getZoneName($zoneid) ?></td>
            <?php endif; ?>
            <td style="text-align: center; width: 8%"><?= $skill_level ?? "" ?></td>
            <td style="text-align: center; width: 8%"><?= $chance ?? "" ?>%</td>
            <td style="text-align: right;">
                <a href="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&fsid=<?= $fsid ?? "" ?>&action=2"><img
                            src="images/edit2.gif" style="border: 0;" alt="Edit Icon" title="Edit Entry"></a>
                <a href="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&fsid=<?= $fsid ?? "" ?>&action=4"><img
                            src="images/remove3.gif" style="border: 0;" alt="Remove Icon" title="Delete this entry"></a>
            </td>
        </tr>
    </table>