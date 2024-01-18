<div class="table_container" style="width: 500px;">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0;">Skills</td>
                <td style="padding: 0; text-align: right;"></td>
            </tr>
        </table>
    </div>

    <table class="table_content2" style="width: 100%;">
        <?php if (isset($skills)): ?>
        <tr>
            <td style="text-align: center; width: 25%"><strong>SkillID</strong></td>
            <td style="text-align: center; width: 50%"><strong>Name</strong></td>
            <td style="text-align: center; width: 25%"><strong>Difficulty</strong></td>
            <th style="width: 5%;"></th>
        </tr>
        <?php $x = 0;
        foreach ($skills as $key => $v): ?>
            <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA"; ?>">
                <td style="text-align: center; width: 25%"><?= $v['skillid'] ?></td>
                <td style="text-align: center; width: 50%"><?= $v['name'] ?></td>
                <td style="text-align: center; width: 25%"><?= $v['difficulty'] ?></td>
                <td style="text-align: right;">
                    <a href="index.php?editor=server&skillid=<?= $v['skillid'] ?>&action=64"><img src="images/edit2.gif"
                                                                                                  style="border: 0;"
                                                                                                  alt="Edit Icon"
                                                                                                  title="Edit Entry"></a>
                </td>
            </tr>
            <?php $x++; endforeach; ?>
    </table>
    <?php endif; ?>
    <?php if (!isset($skills)): ?>
    <tr>
        <td style="text-align: left; width: 100px; padding: 10px;">No skills</td>
    </tr>
<?php endif; ?>