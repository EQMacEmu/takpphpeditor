<div class="table_container" style="width: 700px;">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0; text-align: left; width: 33%;">Character Creation Combos</td>
            </tr>
        </table>
    </div>
    <table class="table_content2" style="width: 100%;">
        <?php if (isset($charcreatecombolist)) : ?>
            <tr>
                <td style="text-align: center; width: 8%"><strong>Alloc. ID</strong></td>
                <td style="text-align: center; width: 10%"><strong>Race</strong</td>
                <td style="text-align: center; width: 15%"><strong>Class</strong></td>
                <td style="text-align: center; width: 20%"><strong>Deity</strong></td>
                <td style="text-align: center; width: 22%"><strong>Start Zone</strong></td>
                <td style="text-align: center; width: 20%"><strong>Expansions</strong></td>
            </tr>
            <?php $x = 0;
            foreach ($charcreatecombolist as $combo => $v): ?>
                <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA"; ?>">
                    <td style="text-align: center; width: 8%"><?= $v['allocation_id'] ?></td>
                    <td style="text-align: center; width: 10%"><?= $races[$v['race']] ?> (<?= $v['race'] ?>)</td>
                    <td style="text-align: center; width: 15%"><?= $classes[$v['class']] ?> (<?= $v['class'] ?>)</td>
                    <td style="text-align: center; width: 20%"><?= $deities[$v['deity']] ?> (<?= $v['deity'] ?>)</td>
                    <td style="text-align: center; width: 22%"><?= $zoneids[$v['start_zone']] ?>
                        (<?= $v['start_zone'] ?>)
                    </td>
                    <td style="text-align: center; width: 20%"><?= $v['expansions_req'] ?></td>
                </tr>
                <?php $x++; endforeach; ?>
        <?php endif; ?>
        <?php if (!isset($charcreatecombolist)): ?>
            <tr>
                <td style="text-align: left; width: 100px; padding: 10px;">No Character Creation Combos</td>
            </tr>
        <?php endif; ?>
    </table>
</div>
