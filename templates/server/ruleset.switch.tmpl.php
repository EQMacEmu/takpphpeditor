<div class="table_container" style="width: 200px;">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0;">Select Ruleset</td>
                <td style="padding: 0; text-align: right;"><a href="index.php?editor=server&action=30"><img
                                src="images/add.gif"
                                style="border: 0;"
                                alt="Add Icon"
                                title="Add a Ruleset"></a>
                </td>
            </tr>
        </table>
    </div>
    <table class="table_content2" style="width: 100%;">
        <?php if (isset($ruleset)): ?>
            <tr>
                <td style="text-align: center; width: 5%"><strong>id</strong></td>
                <td style="text-align: center; width: 5%"><strong>name</strong></td>
                <td style="width: 5%;">&nbsp;</td>
            </tr>
            <?php $x = 0;
            foreach ($ruleset as $key => $v): ?>
                <tr style="background-color: #<?php echo ($x % 2 == 0) ? "AAAAAA" : "BBBBBB"; ?>">
                    <td style="text-align: center; width: 5%"><?= $v['ruleset_id'] ?></td>
                    <td style="text-align: center; width: 5%"><a
                                href="index.php?editor=server&ruleset_id=<?= $v['ruleset_id'] ?>&action=28"><?= $v['name'] ?>
                    </td>
                    <td style="text-align: right;">
                        <a href="index.php?editor=server&ruleset_id=<?= $v['ruleset_id'] ?>&action=22"><img
                                    src="images/edit2.gif" style="border: 0;" alt="Edit Ruleset Icon"
                                    title="Edit Ruleset"></a>
                        <a href="index.php?editor=server&name=<?= $v['name'] ?>&action=25"><img src="images/last.gif"
                                                                                                style="border: 0;"
                                                                                                alt="Copy Ruleset Icon"
                                                                                                title="Copy this ruleset"></a>
                        <a onClick="return confirm('WARNING: This will delete ruleset <?= $v['ruleset_id'] ?> and all associated rules! Do you wish to continue?');"
                           href="index.php?editor=server&ruleset_id=<?= $v['ruleset_id'] ?>&action=29"><img
                                    src="images/remove3.gif" style="border: 0;" alt="Delete Ruleset Icon"
                                    title="Delete ruleset and all associated rules"></a>
                    </td>
                </tr>
                <?php $x++; endforeach; ?>
        <?php endif; ?>
        <?php if (!isset($ruleset)): ?>
            <tr>
                <td style="text-align: left; width: 100px; padding: 10px;">No rulesets</td>
            </tr>
        <?php endif; ?>
    </table>
</div>
