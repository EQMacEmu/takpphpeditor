<div class="table_container" style="width: 500px;">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse: border-spacing: 0;">
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
        <?php if (isset($forage)): ?>
        <tr>
            <td style="text-align: center; width: 5%"><strong>ID</strong></td>
            <td style="text-align: center; width: 20%"><strong>Item</strong></td>
            <td style="text-align: center; width: 15%"><strong>Level</strong></td>
            <td style="text-align: center; width: 15%"><strong>Chance</strong></td>
            <th style="width: 5%;"></th>
        </tr>
        <?php $x = 0;
        foreach ($forage as $key => $v): ?>
            <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA"; ?>">
                <td style="text-align: center; width: 5%"><?= $v['fgid'] ?></td>
                <td style="text-align: center; width: 20%"><a
                            href="index.php?editor=items&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&id=<?= $v['fgiid'] ?>&action=2"><?= $v['name'] ?></a>
                    <span>[<a href="https://lucy.allakhazam.com/item.html?id=<?= $v['fgiid'] ?>">lucy</a>]</span></td>
                <td style="text-align: center; width: 15%"><?= $v['level'] ?></td>
                <td style="text-align: center; width: 15%"><?= $v['chance'] ?>%</td>
                <td style="text-align: right;">
                    <a href="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&fgid=<?= $v['fgid'] ?>&action=8"><img
                                src="images/edit2.gif" style="border: 0;" alt="Edit Icon" title="Edit Entry"></a>
                    <a onClick="return confirm('Really Delete Entry <?= $v['fgid'] ?>?');"
                       href="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&fgid=<?= $v['fgid'] ?>&action=10"><img
                                src="images/remove3.gif" style="border: 0;" alt="Remove Icon" title="Delete this entry"></a>
                </td>
            </tr>
            <?php $x++; endforeach; ?>
    </table>
    <?php endif; ?>
    <?php if (!isset($forage)): ?>
    <tr>
        <td style="text-align: left; width: 100px; padding: 10px;">No forage data</td>
    </tr>
<?php endif; ?>