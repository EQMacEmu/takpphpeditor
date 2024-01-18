<div class="edit_form" style="width: 320px">
    <div class="edit_form_header">Edit zone: <?= $zone ?></div>
    <div class="edit_form_content">
        <form name="zones" method="post" action="index.php?editor=server&action=34">
            <table style="width: 100%;">
                <tr>
                    <th><label for="launcher1">Launcher</label></th>
                    <th><label for="zone1">Zone</label></th>
                    <th><label for="port">Port</label></th>
                </tr>
                <tr>
                    <td><input type="text" size="10" id="launcher1" name="launcher1" value="<?= $launcher ?? "" ?>">
                    </td>
                    <td><input type="text" size="15" id="zone1" name="zone1" value="<?= $zone ?>"></td>
                    <td><input type="text" size="4" id="port" name="port" value="<?= $port ?? "" ?>"></td>
                </tr>
            </table>
            <br><br>
            <div class="center">
                <input type="hidden" name="launcher" value="<?= $launcher ?? "" ?>">
                <input type="hidden" name="zone" value="<?= $zone ?>">
                <input type="submit" value="Submit Changes">
            </div>
        </form>
    </div>
</div>
