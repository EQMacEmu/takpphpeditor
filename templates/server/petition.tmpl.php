<div class="table_container" style="width: 650px;">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0;">Petitions</td>
                <td style="padding: 0; text-align: right;">&nbsp;</td>
            </tr>
        </table>
    </div>
    <table class="table_content2" style="width: 100%;">
        <?php if (isset($petitions)) : ?>
            <tr>
                <td style="text-align: center; width: 5%"><strong>ID</strong></td>
                <td style="text-align: center; width: 5%"><strong>Account</strong></td>
                <td style="text-align: center; width: 5%"><strong>Name</strong></td>
                <td style="text-align: center; width: 5%"><strong>Zone</strong></td>
                <td style="text-align: center; width: 10%"><strong>Date</strong></td>
                <th style="width: 5%;"></th>
            </tr>
            <?php $x = 0;
            foreach ($petitions as $key => $v): ?>
                <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA"; ?>">
                    <td style="text-align: center; width: 5%"><?= $v['dib'] ?> - <?= $v['petid'] ?></td>
                    <td style="text-align: center; width: 5%"><?= $v['accountname'] ?></td>
                    <td style="text-align: center; width: 5%"><?= $v['charname'] ?></td>
                    <td style="text-align: center; width: 5%"><?= getZoneName($v['zone']) ?></td>
                    <td style="text-align: center; width: 10%"><?php echo date("Y-m-d H:i:s", $v['senttime']) ?></td>
                    <td style="text-align: right;"><a href="index.php?editor=server&dib=<?= $v['dib'] ?>&action=13"><img
                                    src="images/edit2.gif" style="border: 0;" alt="View Icon" title="View Petition"></a>&nbsp;<a
                                onClick="return confirm('Really Delete Petition <?= $v['dib'] ?>?');"
                                href="index.php?editor=server&dib=<?= $v['dib'] ?>&action=15"><img
                                    src="images/remove3.gif" style="border: 0;" alt="Delete Icon"
                                    title="Delete this petition"></a></td>
                </tr>
                <?php $x++; endforeach; ?>
        <?php endif; ?>
        <?php if (!isset($petitions)): ?>
            <tr>
                <td style="text-align: left; width: 100px; padding: 10px;">No petitions</td>
            </tr>
        <?php endif; ?>
    </table>
</div>
