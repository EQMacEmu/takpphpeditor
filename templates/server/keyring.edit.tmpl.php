<div class="edit_form" style="width: 400px">
    <div class="edit_form_header">Edit Keyring: <?= $key_item ?></div>
    <div class="edit_form_content">
        <form name="keyring_edit" method="post" action="index.php?editor=server&action=61">
            <table style="width: 100%;">
                <tr>
                    <th><label for="key_name">Name</label></th>
                    <th><label for="zoneid">ZoneID</label></th>
                    <th><label for="stage">Stage</label></th>
                </tr>
                <tr>
                    <td><input type="text" size="30" id="key_name" name="key_name" value="<?= $key_name ?? "" ?>"></td>
                    <td><input type="text" size="5" id="zoneid" name="zoneid" value="<?= $zoneid ?>"></td>
                    <td><input type="text" size="5" id="stage" name="stage" value="<?= $stage ?? "" ?>"></td>
                </tr>
            </table>
            <br><br>
            <div class="center">
                <input type="hidden" name="key_item" value="<?= $key_item ?>">
                <input type="submit" value="Submit Changes">
            </div>
        </form>
    </div>
</div>
