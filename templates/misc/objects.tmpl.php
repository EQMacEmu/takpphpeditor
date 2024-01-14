<div class="table_container" style="width: 750px;">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0;">Objects</td>
                <td style="padding: 0; text-align: right;">
                    <a href="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=45"><img
                                src="images/add.gif" style="border: 0;" alt="Add Icon"
                                title="Add an entry to this zone"></a>
                </td>
            </tr>
        </table>
    </div>

    <table class="table_content2" style="width: 100%;">
        <?php if (isset($objects)): ?>
        <tr>
            <td style="text-align: center; width: 2%"><strong>ID</strong></td>
            <td style="text-align: center; width: 2%"><strong>X</strong></td>
            <td style="text-align: center; width: 2%"><strong>Y</strong></td>
            <td style="text-align: center; width: 2%"><strong>Z</strong></td>
            <td style="text-align: center; width: 2%"><strong>Heading</strong></td>
            <td style="text-align: center; width: 2%"><strong>Item</strong></td>
            <td style="text-align: center; width: 2%"><strong>Charges</strong></td>
            <td style="text-align: center; width: 2%"><strong>Name</strong></td>
            <td style="text-align: center; width: 2%"><strong>Type</strong></td>
            <td style="text-align: center; width: 2%"><strong>Icon</strong></td>
            <th style="width: 5%;"></th>
        </tr>
        <?php $x = 0;
        foreach ($objects as $key => $v): ?>
            <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA"; ?>">
                <td style="text-align: center; width: 2%"><?= $v['objid'] ?></td>
                <td style="text-align: center; width: 2%"><?= $v['xpos'] ?></td>
                <td style="text-align: center; width: 2%"><?= $v['ypos'] ?></td>
                <td style="text-align: center; width: 2%"><?= $v['zpos'] ?></td>
                <td style="text-align: center; width: 2%"><?= $v['heading'] ?></td>
                <?php if ($v['itemid'] < 1): ?>
                    <td style="text-align: center; width: 2%"><?= $v['itemid'] ?></td>
                <?php endif; ?>
                <?php if ($v['itemid'] > 0): ?>
                    <td style="text-align: center; width: 2%"><?= get_item_name($v['itemid']) ?> <span>[<a
                                    href="https://lucy.allakhazam.com/item.html?id=<?= $v['itemid'] ?>">lucy</a>]</span>
                    </td>
                <?php endif; ?>
                <td style="text-align: center; width: 2%"><?= $v['charges'] ?></td>
                <td style="text-align: center; width: 2%"><?= $v['objectname'] ?></td>
                <td style="text-align: center; width: 2%"><?= $world_containers[$v['type']] ?></td>
                <td style="text-align: center; width: 2%"><?= $v['icon'] ?></td>
                <td style="text-align: right;">
                    <a href="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&objid=<?= $v['objid'] ?>&action=42"><img
                                src="images/edit2.gif" style="border: 0;" alt="Edit Icon" title="Edit Entry"></a>
                    <a onClick="return confirm('Really Delete Object <?= $v['objid'] ?>?');"
                       href="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&objid=<?= $v['objid'] ?>&action=44"><img
                                src="images/remove3.gif" style="border: 0;" alt="Remove Icon" title="Delete this entry"></a>
                </td>
            </tr>
            <?php $x++; endforeach; ?>
    </table>
    <?php endif; ?>
    <?php if (!isset($objects)): ?>
    <tr>
        <td style="text-align: left; width: 100px; padding: 10px;">No objects</td>
    </tr>
<?php endif; ?>