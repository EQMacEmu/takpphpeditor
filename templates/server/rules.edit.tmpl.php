<div class="edit_form" style="width: 750px">
    <div class="edit_form_header">Edit Rule</div>
    <div class="edit_form_content">
        <form name="rules" method="post" action="index.php?editor=server&action=18">
            <table style="width: 100%;">
                <tr>
                    <th><label for="ruleset_id1">Ruleset</label></th>
                    <th><label for="rule_name1">Name</label></th>
                    <th><label for="rule_value">Value</label></th>
                </tr>
                <tr>
                    <td style="padding-left: 10px; padding-bottom: 20px;"><input type="text" size="4" id="ruleset_id1" name="ruleset_id1" value="<?= $ruleset_id ?>"></td>
                    <td style="padding-left: 10px; padding-bottom: 20px;"><input type="text" size="47" id="rule_name1" name="rule_name1" value="<?= $rule_name ?? "" ?>"></td>
                    <td style="padding-left: 10px; padding-bottom: 20px;"><input type="text" size="8" id="rule_value" name="rule_value" value="<?= $rule_value ?? "" ?>"></td>
                </tr>
                <tr>
                    <th colspan="3"><label for="notes">Notes</label></th>
                </tr>
                <tr>
                    <td style="padding-left: 10px;" colspan="3"><input type="text" size="80" id="notes" name="notes" value="<?= $notes ?? "" ?>"></td>
                </tr>
            </table>
            <br><br>
            <div class="center">
                <input type="hidden" name="rule_name" value="<?= $rule_name ?? "" ?>">
                <input type="hidden" name="ruleset_id" value="<?= $ruleset_id ?>">
                <input type="submit" value="Submit Changes">
            </div>
        </form>
    </div>
</div>