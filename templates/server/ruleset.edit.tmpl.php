<div class="edit_form" style="width: 200px">
    <div class="edit_form_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0;">Ruleset: <?= $ruleset_id ?></td>
                <td style="padding: 0; text-align: right;"><a onClick="return confirm('Really Delete Ruleset <?= $ruleset_id ?>?');"
                                                  href="index.php?editor=server&ruleset_id=<?= $ruleset_id ?>&action=24"><img
                                src="images/remove3.gif" style="border: 0;" alt="Delete Icon" title="Delete this rule"></a>
                </td>
            </tr>
        </table>
    </div>
    <div class="edit_form_content">
        <form name="ruleset" method="post" action="index.php?editor=server&action=23">
            <table style="width: 100%;">
                <tr>
                    <th><label for="ruleset_id1">id</label></th>
                    <th><label for="name">name</label></th>
                </tr>
                <tr>
                    <td><input type="text" size="2" id="ruleset_id1" name="ruleset_id1" value="<?= $ruleset_id ?>"></td>
                    <td><input type="text" size="10" id="name" name="name" value="<?= $name ?? ""; ?>"></td>
                </tr>
            </table>
            <br><br>
            <div class="center">
                <input type="hidden" name="ruleset_id" value="<?= $ruleset_id ?>">
                <input type="submit" value="Submit Changes">
            </div>
        </form>
    </div>
</div>
