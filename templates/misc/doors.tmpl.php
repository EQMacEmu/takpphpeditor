<div class="table_container" style="width: 750px;">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0;">Doors</td>
                <td style="padding: 0; text-align: right;">
                    <a href="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=47"><img
                                src="images/contents.png" style="border: 0;" alt="Contents Icon"
                                title="View door objects"></a>
                    <a href="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=39"><img
                                src="images/add.gif" style="border: 0;" alt="Add Icon"
                                title="Add an entry to this zone"></a>
                </td>
            </tr>
        </table>
    </div>
    <table class="table_content2" style="width: 100%;">
        <?php if (isset($doors)): ?>
            <tr>
                <td style="text-align: center; width: 7%;"><strong>ID</strong></td>
                <td style="text-align: center; width: 5%;"><strong>Door ID</strong></td>
                <td style="text-align: center; width: 10%;"><strong>Name</strong></td>
                <td style="text-align: center; width: 8%;"><strong>X</strong></td>
                <td style="text-align: center; width: 8%;"><strong>Y</strong></td>
                <td style="text-align: center; width: 7%;"><strong>Z</strong></td>
                <td style="text-align: center; width: 3%;"><strong>LckPck</strong></td>
                <td style="text-align: center; width: 3%;"><strong>Key</strong></td>
                <td style="text-align: center; width: 3%;"><strong>AltKey</strong></td>
                <td style="text-align: center; width: 3%;"><strong>Type</strong></td>
                <td style="text-align: center; width: 7%;"><strong>Dest Zone</strong></td>
                <td style="text-align: center; width: 7%;"><strong>Dest X</strong></td>
                <td style="text-align: center; width: 7%;"><strong>Dest Y</strong></td>
                <td style="text-align: center; width: 7%;"><strong>Dest Z</strong></td>
            </tr>
            <?php $x = 0;
            foreach ($doors as $door => $v): ?>
                <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA"; ?>">
                    <td style="text-align: center; width: 7%;"><?= $v['drid'] ?></td>
                    <td style="text-align: center; width: 5%;"><?= $v['doorid'] ?></td>
                    <td style="text-align: center; width: 10%;"><?= $v['name'] ?></td>
                    <td style="text-align: center; width: 8%;"><?= $v['pos_x'] ?></td>
                    <td style="text-align: center; width: 8%;"><?= $v['pos_y'] ?></td>
                    <td style="text-align: center; width: 7%;"><?= $v['pos_z'] ?></td>
                    <td style="text-align: center; width: 3%;"><?= $v['lockpick'] ?></td>
                    <?php if ($v['keyitem'] > 1000): ?>
                        <td style="text-align: center; width: 3%;"><?= get_item_name($v['keyitem']) ?> <span>[<a
                                        href="https://lucy.allakhazam.com/item.html?id=<?= $v['keyitem'] ?>">lucy</a>]</span>
                        </td>
                    <?php else: ?>
                        <td style="text-align: center; width: 3%;"><?= $v['keyitem'] ?></td>
                    <?php endif; ?>
                    <?php if ($v['altkeyitem'] > 1000): ?>
                        <td style="text-align: center; width: 3%;"><?= get_item_name($v['altkeyitem']) ?> <span>[<a
                                        href="https://lucy.allakhazam.com/item.html?id=<?= $v['altkeyitem'] ?>">lucy</a>]</span>
                        </td>
                    <?php else: ?>
                        <td style="text-align: center; width: 3%;"><?= $v['altkeyitem'] ?></td>
                    <?php endif; ?>
                    <td style="text-align: center; width: 3%;"><?= $v['opentype'] ?></td>
                    <td style="text-align: center; width: 7%;"><?= $v['dest_zone'] ?></td>
                    <td style="text-align: center; width: 7%;"><?= $v['dest_x'] ?></td>
                    <td style="text-align: center; width: 7%;"><?= $v['dest_y'] ?></td>
                    <td style="text-align: center; width: 7%;"><?= $v['dest_z'] ?></td>
                    <td style="text-align: right;">
                        <a href="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&drid=<?= $v['drid'] ?>&action=36"><img
                                    src="images/edit2.gif" style="border: 0;" alt="Edit Icon" title="Edit Entry"></a>
                        <a onClick="return confirm('Really Delete Door <?= $v['drid'] ?>?');"
                           href="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&drid=<?= $v['drid'] ?>&action=38"><img
                                    src="images/remove3.gif" style="border: 0;" alt="Remove Icon"
                                    title="Delete this entry"></a>
                    </td>
                </tr>
                <?php $x++; endforeach; ?>
        <?php endif; ?>
        <?php if (!isset($doors)): ?>
            <tr>
                <td style="text-align: left; width: 100px; padding: 10px;">No doors</td>
            </tr>
        <?php endif; ?>
    </table>
</div>
