<div class="table_container" style="width: 700px;">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0;">Keyring Data</td>
                <td style="padding: 0; text-align: right;"><a href="index.php?editor=server&action=58"><img
                                src="images/add.gif" style="border: 0;" alt="Add Icon" title="Add a Key"></a></td>
            </tr>
        </table>
    </div>
    <table class="table_content2" style="width: 100%;">
        <?php if (isset($keyring)) : ?>
            <tr>
                <th style="text-align: center;"><strong>KeyItem</strong></th>
                <th>&nbsp;</th>
                <th style="text-align: center;"><strong>Name</strong></th>
                <th style="text-align: center;"><strong>Zoneid</strong></th>
                <th style="text-align: center;"><strong>Stage</strong></th>
                <th>&nbsp;</th>
            </tr>
            <?php $x = 0;
            foreach ($keyring as $key => $v): ?>
                <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA"; ?>">
                    <td style="text-align: center;"><a
                                href="index.php?editor=items&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&id=<?= $v['key_item'] ?>&action=2"><?= $v['key_item'] ?></a>
                    </td>
                    <td><a href="https://lucy.allakhazam.com/item.html?id=<?= $v['key_item'] ?>">Lucy</a></td>
                    <td style="text-align: center;"><?= $v['key_name'] ?></td>
                    <td style="text-align: center;"><?= getZoneName($v['zoneid']) ?></td>
                    <td style="text-align: center;"><?= $v['stage'] ?></td>
                    <td style="text-align: right;"><a
                                href="index.php?editor=server&key_item=<?= $v['key_item'] ?>&action=60"><img
                                    src="images/edit2.gif" style="border: 0;" alt="Edit Icon" title="Edit Key"></a>&nbsp;
                        <a onClick="return confirm('Really Delete Entry <?= $v['key_item'] ?>?');"
                           href="index.php?editor=server&key_item=<?= $v['key_item'] ?>&action=62"><img
                                    src="images/remove3.gif" style="border: 0;" alt="Delete Icon"
                                    title="Delete this entry"></a>
                    </td>
                </tr>
                <?php $x++; endforeach; ?>
        <?php endif; ?>
        <?php if (!isset($keyring)): ?>
            <tr>
                <td style="text-align: left; width: 100px; padding: 10px;">No Keyring Data</td>
            </tr>
        <?php endif; ?>
    </table>
</div>
