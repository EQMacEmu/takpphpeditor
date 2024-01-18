<div class="table_container" style="width: 650px;">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0;">Reports</td>
                <td style="padding: 0; text-align: right;">&nbsp;</td>
            </tr>
        </table>
    </div>
    <table class="table_content2" style="width: 100%;">
        <?php if (isset($reports)) : ?>
            <tr>
                <td style="text-align: center; width: 5%"><strong>ID</strong></td>
                <td style="text-align: center; width: 15%"><strong>Name</strong></td>
                <td style="text-align: center; width: 70%"><strong>Reported</strong></td>
                <td style="width: 5%;">&nbsp;</td>
            </tr>
            <?php $x = 0;
            foreach ($reports as $key => $v): ?>
                <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA"; ?>">
                    <td style="text-align: center; width: 5%"><?= $v['rid'] ?></td>
                    <td style="text-align: center; width: 15%"><?= $v['name'] ?></td>
                    <td style="text-align: center; width: 70%"><?= $v['reported'] ?></td>
                    <td style="text-align: right;"><a href="index.php?editor=server&rid=<?= $v['rid'] ?>&action=11"><img
                                    src="images/edit2.gif" style="border: 0;" alt="View Icon" title="View Report"></a>&nbsp;<a
                                onClick="return confirm('Really Delete Entry <?= $v['rid'] ?>?');"
                                href="index.php?editor=server&rid=<?= $v['rid'] ?>&action=10"><img
                                    src="images/remove3.gif" style="border: 0;" alt="Delete Icon"
                                    title="Delete this entry"></a></td>
                </tr>
                <?php $x++; endforeach; ?>
        <?php endif; ?>
        <?php if (!isset($reports)): ?>
            <tr>
                <td style="text-align: left; width: 100px; padding: 10px;">No reported players</td>
            </tr>
        <?php endif; ?>
    </table>
</div>
