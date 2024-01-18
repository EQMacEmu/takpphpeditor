<div class="edit_form" style="width: 500px">
    <div class="edit_form_header">Edit notes for: <?= $ip_address ?? "Undefined" ?></div>
    <div class="edit_form_content">
        <form name="ipaddress_edit" method="post" action="index.php?editor=server&action=55">
            <table style="width: 100%;">
                <tr>
                    <th><label for="notes">Notes</label></th>
                </tr>
                <tr>
                    <td><input type="text" size="75" id="notes" name="notes" value="<?= $notes ?? "" ?>"></td>
                </tr>
            </table>
            <br><br>
            <div class="center">
                <input type="hidden" name="ip_address" value="<?= $ip_address ?? "" ?>">
                <input type="submit" value="Submit Changes">
            </div>
        </form>
    </div>
</div>
