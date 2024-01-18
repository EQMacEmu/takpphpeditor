<div class="edit_form" style="width: 200px">
    <div class="edit_form_header">Edit launcher: <?= $name ?? "" ?></div>
    <div class="edit_form_content">
        <form name="launcher_edit" method="post" action="index.php?editor=server&action=39">
            <table style="width: 100%;">
                <tr>
                    <th><label for="name1">Launcher</label></th>
                    <th><label for="dynamics">Number</label></th>
                </tr>
                <tr>
                    <td><input type="text" size="10" id="name1" name="name1" value="<?= $name ?? "" ?>"></td>
                    <td><input type="text" size="4" id="dynamics" name="dynamics" value="<?= $dynamics ?? "" ?>"></td>
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
