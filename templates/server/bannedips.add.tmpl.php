<div class="edit_form" style="width: 700px">
    <div class="edit_form_header">Add Banned IP</div>
    <div class="edit_form_content">
        <form name="bannedip_add" method="post" action="index.php?editor=server&action=52">
            <table style="width: 100%;">
                <tr>
                    <th><label for="ip_address">IP</label></th>
                </tr>
                <tr>
                    <td style="padding-bottom: 20px;"><input type="text" size="20" id="ip_address" name="ip_address" value=""></td>
                </tr>
                <tr>
                    <th><label for="notes">Notes</label></th>
                </tr>
                <tr>
                    <td><input type="text" size="75" id="notes" name="notes" value=""></td>
                </tr>
            </table>
            <br><br>
            <div class="center"><input type="submit" value="Submit Changes"></div>
        </form>
    </div>
</div>
