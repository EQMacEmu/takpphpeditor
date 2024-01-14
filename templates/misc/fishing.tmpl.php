<div class="table_container" style="width: 700px;">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0;">Fishing</td>
                <td style="padding: 0; text-align: right;">
                    <a href="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=5"><img
                                src="images/add.gif" style="border: 0;" alt="Add Icon" title="Add an entry to this zone"></a>
                </td>
            </tr>
        </table>
    </div>

    <table class="table_content2" style="width: 100%;">
        <?php if (isset($fishing)): ?>
        <tr>
            <td style="text-align: center; width: 5%"><strong>ID</strong></td>
            <td style="text-align: center; width: 12%"><strong>Item</strong></td>
            <td style="text-align: center; width: 8%"><strong>Skill Level</strong></td>
            <td style="text-align: center; width: 8%"><strong>Chance</strong></td>
            <th style="width: 5%;"></th>
        </tr>
        <?php $x = 0;
        foreach ($fishing as $key => $v): ?>
            <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA"; ?>">
                <td style="text-align: center; width: 5%"><?= $v['fsid'] ?></td>
                <td style="text-align: center; width: 12%"><a
                            href="index.php?editor=items&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&id=<?= $v['fiid'] ?>&action=2"><?= $v['name'] ?></a>
                    <span>[<a href="https://lucy.allakhazam.com/item.html?id=<?= $v['fiid'] ?>">lucy</a>]</span></td>
                <td style="text-align: center; width: 8%"><?= $v['skill_level'] ?></td>
                <td style="text-align: center; width: 8%"><?= $v['chance'] ?>%</td>
                <td style="text-align: right;">
                    <a href="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&fsid=<?= $v['fsid'] ?>&action=2"><img
                                src="images/edit2.gif" style="border: 0;" alt="Edit Icon" title="Edit Entry"></a>
                    <a onClick="return confirm('Really Delete Entry <?= $v['fsid'] ?>?');"
                       href="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&fsid=<?= $v['fsid'] ?>&action=4"><img
                                src="images/remove3.gif" style="border: 0;" alt="Remove Icon" title="Delete this entry"></a>
                </td>
            </tr>
            <?php $x++; endforeach; ?>
    </table>
    <?php endif; ?>
    <?php if (!isset($fishing)): ?>
    <tr>
        <td style="text-align: left; width: 100px; padding: 10px;">No fishing data</td>
    </tr>
<?php endif; ?>