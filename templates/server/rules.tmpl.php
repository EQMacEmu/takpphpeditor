<div class="table_container" style="width: 500px;">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0;">Server Rules</td>
                <td style="padding: 0; text-align: right;"><a href="index.php?editor=server&action=27">Switch
                        ruleset</a>&nbsp;<a
                            href="index.php?editor=server&ruleset_id=<?= $ruleset_id ?>&action=19"><img
                                src="images/add.gif" style="border: 0;" alt="Add Icon" title="Add a rule"></a></td>
            </tr>
        </table>
    </div>
    <table class="table_content2" style="width: 100%;">
        <?php if (isset($rules)): ?>
            <tr>
                <td style="text-align: center; width: 5%"><strong>Ruleset</strong></td>
                <td style="text-align: center; width: 20%"><strong>Name</strong></td>
                <td style="text-align: center; width: 15%"><strong>Value</strong></td>
                <td style="width: 5%;">&nbsp;</td>
            </tr>
            <?php $x = 0;
            foreach ($rules as $key => $v): ?>
                <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA"; ?>">
                    <td style="text-align: center; width: 5%"><?= $v['ruleset_id'] ?></td>
                    <td style="text-align: center; width: 20%"><?= $v['rule_name'] ?></td>
                    <td style="text-align: center; width: 15%"><?= $v['rule_value'] ?></td>
                    <td style="text-align: right; width: 10%;">
                        <a href="index.php?editor=server&rule_name=<?= $v['rule_name'] ?>&ruleset_id=<?= $v['ruleset_id'] ?>&action=17">
                            <img src="images/edit2.gif" style="border: 0;" alt="Edit Icon" title="Edit Rule">
                        </a>&nbsp;
                        <a onClick="return confirm('Really Delete this Rule?');"
                           href="index.php?editor=server&rule_name=<?= $v['rule_name'] ?>&ruleset_id=<?= $v['ruleset_id'] ?>&action=21">
                            <img src="images/remove3.gif" style="border: 0;" alt="Delete Icon" title="Delete this rule"></a>
                    </td>
                </tr>
                <?php $x++; endforeach; ?>
        <?php endif; ?>
        <?php if (!isset($rules)): ?>
            <tr>
                <td style="text-align: left; width: 100px; padding: 10px;">No rules</td>
            </tr>
        <?php endif; ?>
    </table>
</div>
