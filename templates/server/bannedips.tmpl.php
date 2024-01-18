<div class="table_container" style="width: 650px;">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0;">Banned IPs</td>
                <td style="padding: 0; text-align: right;"><a href="index.php?editor=server&action=51"><img
                                src="images/add.gif"
                                style="border: 0;"
                                alt="Add Spanking Icon"
                                title="Add a Spanking"></a>
                </td>
            </tr>
        </table>
    </div>
    <table class="table_content2" style="width: 100%;">
        <?php if (isset($banned)) : ?>
            <tr>
                <td style="text-align: center; width: 15%"><strong>IP</strong></td>
                <td style="text-align: center; width: 70%"><strong>Notes</strong></td>
                <td style="width: 5%;">&nbsp;</td>
            </tr>
            <?php $x = 0;
            foreach ($banned as $key => $v): ?>
                <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA"; ?>">
                    <td style="text-align: center; width: 15%"><?= $v['ip_address'] ?></td>
                    <td style="text-align: center; width: 70%"><?= $v['notes'] ?></td>
                    <td style="text-align: right;"><a
                                href="index.php?editor=server&ip=<?= $v['ip_address'] ?>&action=53"><img
                                    src="images/edit2.gif" style="border: 0;" alt="Change Note Icon"
                                    title="Change Note"></a>&nbsp;<a
                                onClick="return confirm('Really Delete Entry <?= $v['ip_address'] ?>?');"
                                href="index.php?editor=server&ip=<?= $v['ip_address'] ?>&action=54"><img
                                    src="images/remove3.gif" style="border: 0;" alt="Delete Icon"
                                    title="Delete this entry"></a></td>
                </tr>
                <?php $x++; endforeach; ?>
        <?php endif; ?>
        <?php if (!isset($banned)): ?>
            <tr>
                <td style="text-align: left; width: 100px; padding: 10px;">No Banned IPs</td>
            </tr>
        <?php endif; ?>
    </table>
</div>
