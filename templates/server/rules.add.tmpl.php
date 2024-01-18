<div class="edit_form" style="width: 750px">
    <div class="edit_form_header">Add Rule</div>
    <div class="edit_form_content">
        <form name="rules" method="post" action="index.php?editor=server&action=20">
            <table style="width: 100%;">
                <tr>
                    <th><label for="ruleset_id">Ruleset</label></th>
                    <th><label for="rule_name">Name</label></th>
                    <th><label for="rule_value">Value</label></th>
                    <th><label for="notes">Notes</label></th>
                </tr>
                <tr>
                    <td><input type="text" size="4" id="ruleset_id" name="ruleset_id"
                               value="<?= $suggestruleset ?? "" ?>"></td>
                    <td><input type="text" size="47" id="rule_name" name="rule_name" value=""></td>
                    <td><input type="text" size="8" id="rule_value" name="rule_value" value=""></td>
                    <td><input type="text" size="42" id="notes" name="notes" value=""></td>
                </tr>
            </table>
            <br><br>
            <span class="center"><input type="submit" value="Submit Changes"></span>
        </form>
    </div>
</div>
