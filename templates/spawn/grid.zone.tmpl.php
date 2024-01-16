<div class="table_container" style="width: 375px;">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0;">Grids:</td>
                <td style="padding: 0; text-align: right;">
                    <a href="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&spid=<?= $spid ?>&pathgrid=<?= $pathgrid ?>&action=33">
                        <img src="images/add.gif" style="border: 0;" alt="Add Grid Icon"
                             title="Add a Grid to this zone">
                    </a>
                </td>
            </tr>
        </table>
    </div>

    <table class="table_content2" style="width: 100%;">
        <?php if (isset($grids)): ?>
        <tr>
            <td style="text-align: center; width: 10%"><strong>ID</strong></td>
            <td style="text-align: center; width: 25%"><strong>Wander</strong></td>
            <td style="text-align: center; width: 20%"><strong>Pause</strong></td>
            <td style="width: 20%;"></td>
        </tr>
        <?php $x = 0;
        foreach ($grids as $grid => $v): ?>
            <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA"; ?>">
                <td style="text-align: center; width: 5%"><?= $v['pathgrid'] ?></td>
                <td style="text-align: center; width: 20%"><?= $wandertype[$v['type']] ?></td>
                <td style="text-align: center; width: 20%"><?= $pausetype[$v['type2']] ?></td>
                <td style="text-align: right;">
                    <a href="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&pathgrid=<?= $v['pathgrid'] ?>&action=66"><img
                                src="images/view_all.gif" height="15" width="15" style="border: 0;"
                                alt="View Grid NPCs Icon" title="View npcs on this grid"></a>&nbsp;
                    <a href="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&pathgrid=<?= $v['pathgrid'] ?>&action=20"><img
                                src="images/edit2.gif" style="border: 0;" alt="View Grid Icon" title="View Grid Entry"></a>&nbsp;
                    <a onClick="return confirm('Really delete Grid <?= $v['pathgrid'] ?>?');"
                       href="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&pathgrid=<?= $v['pathgrid'] ?>&action=32">
                        <img src="images/remove3.gif" style="border: 0;" alt="Delete Grid Entry Icon"
                             title="Permanently delete this Grid Entry set"></a>&nbsp;
                </td>
            </tr>
            <?php $x++; endforeach; ?>
    </table>
    <?php endif; ?>
    <?php if (!isset($grids)): ?>
    <tr>
        <td style="text-align: left; width: 100px; padding: 10px;">No grid entries currently assigned</td>
    </tr>
<?php endif; ?>