<div class="table_container" style="width: 200px;">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0;">Launchers</td>
                <td style="padding: 0; text-align: right;"><a href="index.php?editor=server&action=41"><img
                                src="images/add.gif"
                                style="border: 0;"
                                alt="Add Icon"
                                title="Add a launcher"></a>
                </td>
            </tr>
        </table>
    </div>
    <table class="table_content2" style="width: 100%;">
        <?php if (isset($launchers)): ?>
            <tr>
                <td style="text-align: center; width: 10%"><strong>name</strong></td>
                <td style="text-align: center; width: 4%"><strong>number</strong></td>
                <td style="width: 5%;">&nbsp;</td>
            </tr>
            <?php $x = 0;
            foreach ($launchers as $key => $v): ?>
                <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA"; ?>">
                    <td style="text-align: center; width: 10%"><?= $v['name'] ?></td>
                    <td style="text-align: center; width: 4%"><?= $v['dynamics'] ?></td>
                    <td style="text-align: right;"><a
                                href="index.php?editor=server&name=<?= $v['name'] ?>&action=38"><img
                                    src="images/edit2.gif" style="border: 0;" alt="Edit Launcher Icon"
                                    title="Edit launcher"></a>&nbsp;<a
                                onClick="return confirm('Really delete <?= $v['name'] ?>?');"
                                href="index.php?editor=server&name=<?= $v['name'] ?>&action=40"><img
                                    src="images/remove3.gif" style="border: 0;" alt="Delete Launcher Icon"
                                    title="Delete this launcher"></a></td>
                </tr>
                <?php $x++; endforeach; ?>
        <?php endif; ?>
        <?php if (!isset($launchers)): ?>
            <tr>
                <td style="text-align: left; width: 100px; padding: 10px;">No launchers</td>
            </tr>
        <?php endif; ?>
    </table>
</div><br><br>
<div class="table_container" style="width: 300px;">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0;">Zones</td>
                <td style="padding: 0; text-align: right;"><a href="index.php?editor=server&action=36"><img
                                src="images/add.gif"
                                style="border: 0;"
                                alt="Add Zone Icon"
                                title="Add a zone"></a>
                </td>
            </tr>
        </table>
    </div>
    <table class="table_content2" style="width: 100%;">
        <?php if (isset($zones)): ?>
            <tr>
                <td style="text-align: center; width: 5%"><strong>Launcher</strong></td>
                <td style="text-align: center; width: 10%"><strong>Zone</strong></td>
                <td style="text-align: center; width: 10%"><strong>Port</strong></td>
                <td style="width: 5%;">&nbsp;</td>
            </tr>
            <?php $x = 0;
            foreach ($zones as $key => $v): ?>
                <tr style="background-color: #<?php echo ($x % 2 == 0) ? "AAAAAA" : "BBBBBB"; ?>">
                    <td style="text-align: center; width: 5%"><?= $v['launcher'] ?></td>
                    <td style="text-align: center; width: 10%"><?= $v['zone'] ?></td>
                    <td style="text-align: center; width: 10%"><?= $v['port'] ?></td>
                    <td style="text-align: right;"><a
                                href="index.php?editor=server&launcher=<?= $v['launcher'] ?>&zone=<?= $v['zone'] ?>&action=33"><img
                                    src="images/edit2.gif" style="border: 0;" alt="Edit Zone Icon"
                                    title="Edit Zone"></a>&nbsp;<a
                                onClick="return confirm('Really delete <?= $v['zone'] ?>?');"
                                href="index.php?editor=server&launcher=<?= $v['launcher'] ?>&zone=<?= $v['zone'] ?>&action=35"><img
                                    src="images/remove3.gif" style="border: 0;" alt="Delete Zone Icon"
                                    title="Delete this zone"></a></td>
                </tr>
                <?php $x++; endforeach; ?>
        <?php endif; ?>
        <?php if (!isset($zones)): ?>
            <tr>
                <td style="text-align: left; width: 100px; padding: 10px;">No static zones</td>
            </tr>
        <?php endif; ?>
    </table>
</div>
