<div class="edit_form" style="width: 320px">
    <div class="edit_form_header">Add a zone</div>
    <div class="edit_form_content">
        <form name="zone_add" method="post" action="index.php?editor=server&action=37">
            <table style="width: 100%;">
                <tr>
                    <th><label for="launcher">Launcher</label></th>
                    <th><label for="zone">Zone</label></th>
                    <th><label for="port">Port</label></th>
                </tr>
                <tr>
                    <td><input type="text" size="10" id="launcher" name="launcher"
                               value="<?= $suggestlauncher ?? "" ?>"></td>
                    <td><input type="text" size="15" id="zone" name="zone" value=""></td>
                    <td><input type="text" size="4" id="port" name="port" value="0"></td>
                </tr>
            </table>
            <br><br>
            <span class="center"><input type="submit" value="Submit Changes"></span>
        </form>
    </div>
</div>
