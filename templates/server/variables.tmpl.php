<div class="table_container" style="width: 500px;">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0;">Server Variables</td>
                <td style="padding: 0; text-align: right;">
                    <a href="index.php?editor=server&action=46">
                        <img src="images/add.gif" style="border: 0;" alt="Add Icon" title="Add a variable">
                    </a>
                </td>
            </tr>
        </table>
    </div>
    <table class="table_content2" style="width: 100%;">
        <?php if (isset($variables)): ?>
            <tr>
                <td style="text-align: center; width: 20%"><strong>Name</strong></td>
                <td style="text-align: center; width: 15%"><strong>Value</strong></td>
                <td style="width: 5%;">&nbsp;</td>
            </tr>
            <?php $x = 0;
            foreach ($variables as $key => $v): ?>
                <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA"; ?>">
                    <td style="text-align: center; width: 20%"><?= $v['varname'] ?></td>
                    <td style="text-align: center; width: 15%"><?= $v['value'] ?></td>
                    <td style="text-align: right;"><a
                                href="index.php?editor=server&varname=<?= $v['varname'] ?>&action=44"><img
                                    src="images/edit2.gif" style="border: 0;" alt="Edit Icon" title="Edit Variable"></a>&nbsp;<a
                                onClick="return confirm('Really Delete this Variable?');"
                                href="index.php?editor=server&varname=<?= $v['varname'] ?>&action=48"><img
                                    src="images/remove3.gif" style="border: 0;" alt="Delete Icon"
                                    title="Delete this variable"></a></td>
                </tr>
                <?php $x++; endforeach; ?>
        <?php endif; ?>
        <?php if (!isset($variables)): ?>
            <tr>
                <td style="text-align: left; width: 100px; padding: 10px;">No variables</td>
            </tr>
        <?php endif; ?>
    </table>
</div>
