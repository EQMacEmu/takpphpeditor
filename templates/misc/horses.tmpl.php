<div class="table_container" style="width: 700px;">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0;">Horses</td>
                <td style="padding: 0; text-align: right;">
                    <a href="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=33"><img
                                src="images/add.gif" style="border: 0;" alt="Add Icon"
                                title="Add an entry to this zone"></a>
                </td>
            </tr>
        </table>
    </div>

    <table class="table_content2" style="width: 100%;">
        <?php if (isset($horses)): ?>
        <tr>
            <td style="text-align: center; width: 12%"><strong>Filename</strong></td>
            <td style="text-align: center; width: 8%"><strong>Race</strong></td>
            <td style="text-align: center; width: 8%"><strong>Gender</strong></td>
            <td style="text-align: center; width: 8%"><strong>Texture</strong></td>
            <td style="text-align: center; width: 8%"><strong>Speed</strong></td>
            <td style="text-align: center; width: 12%"><strong>Notes</strong></td>
            <th style="width: 5%;"></th>
        </tr>
        <?php $x = 0;
        foreach ($horses as $key => $v): ?>
            <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA"; ?>">
                <td style="text-align: center; width: 12%"><?= $v['filename'] ?></td>
                <td style="text-align: center; width: 8%"><?= $races[$v['race']] ?></td>
                <td style="text-align: center; width: 8%"><?= $genders[$v['gender']] ?></td>
                <td style="text-align: center; width: 8%"><?= $v['texture'] ?></td>
                <td style="text-align: center; width: 8%"><?= $v['mountspeed'] ?></td>
                <td style="text-align: center; width: 12%"><?= $v['notes'] ?></td>
                <td style="text-align: right;">
                    <a href="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&filename=<?= $v['filename'] ?>&action=30"><img
                                src="images/edit2.gif" style="border: 0;" alt="Edit Icon" title="Edit Entry"></a>
                    <a onClick="return confirm('Really Delete Horse <?= $v['filename'] ?>?');"
                       href="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&filename=<?= $v['filename'] ?>&action=32"><img
                                src="images/remove3.gif" style="border: 0;" alt="Remove Icon" title="Delete this entry"></a>
                </td>
            </tr>
            <?php $x++; endforeach; ?>
    </table>
    <?php endif; ?>
    <?php if (!isset($horses)): ?>
    <tr>
        <td style="text-align: left; width: 100px; padding: 10px;">No horse data</td>
    </tr>
<?php endif; ?>