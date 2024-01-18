<div class="edit_form" style="width: 200px">
    <div class="edit_form_header">Copy default ruleset</div>
    <div class="edit_form_content">
        <form name="ruleset" method="post" action="index.php?editor=server&action=26">
            <table style="width: 100%;">
                <tr>
                    <th><label for="ruleset_id">new id</label></th>
                    <th><label for="name1">new name</label></th>
                </tr>
                <tr>
                    <td><input type="text" size="2" id="ruleset_id" name="ruleset_id"
                               value="<?= $suggestruleid ?? "" ?>"></td>
                    <td><input type="text" size="10" id="name1" name="name1" value=""></td>
                </tr>
            </table>
            <br><br>
            <div class="center">
                <input type="hidden" name="name" value="<?= $name ?? "" ?>">
                <input type="submit" value="Submit Changes">
            </div>
        </form>
    </div>
</div>
