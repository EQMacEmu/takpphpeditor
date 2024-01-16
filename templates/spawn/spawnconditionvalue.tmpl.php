<div class="table_container" style="width: 225px;">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0;">Spawn Condition Values for ID <?= $scid ?></td>
                <td style="padding: 0; text-align: right;">
                    <a href="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&spid=<?= $spid ?>&scid=<?= $scid ?>&action=61"><img
                                src="images/add.gif" style="border: 0;" alt="Add Icon" title="Add an instance"></a>
                </td>
            </tr>
        </table>
    </div>

    <table class="table_content2" style="width: 100%;">
        <?php if (isset($spawncv)): ?>
            <tr>
                <td style="text-align: center; width: 10%;"><strong>value</strong></td>
                <th style="width: 5%;"></th>
            </tr>
            <?php $x = 0;
            foreach ($spawncv as $spawn => $v): ?>
                <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA"; ?>">
                    <td style="text-align: center; width: 10%;"><?= $v['value'] ?></td>
                    <td style="text-align: right;">
                    </td>
                </tr>
                <?php $x++; endforeach; ?>

        <?php endif; ?>
        <?php if (!isset($spawncv)): ?>
            <tr>
                <td style="text-align: left; width: 100px; padding: 10px;">No spawn condition values</td>
            </tr>
        <?php endif; ?>
    </table>
</div>