<div class="edit_form" style="width: 200px">
    <div class="edit_form_header">Add Ruleset</div>
    <div class="edit_form_content">
        <form name="ruleset_add" method="post" action="index.php?editor=server&action=31">
            <table style="width: 100%;">
                <tr>
                    <th><label for="ruleset_id">id</label></th>
                    <th><label for="name">name</label></th>
                </tr>
                <tr>
                    <td><input type="text" size="2" id="ruleset_id" name="ruleset_id"
                               value="<?= $suggestruleid ?? "" ?>"></td>
                    <td><input type="text" size="10" id="name" name="name" value=""></td>
                </tr>
            </table>
            <br><br>
            <span class="center"><input type="submit" value="Submit Changes"></span>
        </form>
    </div>
</div>
