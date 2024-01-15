<div class="edit_form" style="width: 450px">
    <div class="edit_form_header">Add Graveyard</div>
    <div class="edit_form_content">
        <form name="graveyard" method="post"
              action="index.php?editor=zone&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&graveyard_id=<?= $id ?>&action=9">
            <div style="margin-bottom: 20px;">
                <fieldset><legend>General</legend>
                    <table style="width: 100%;">
                        <tr>
                            <th><label for="graveyard_id">ID</label></th>
                            <th><label for="zone_id">Zone</label></th>
                        </tr>
                        <tr>
                            <td><input type="text" size="7" id="graveyard_id" name="graveyard_id"
                                       value="<?= $suggestgid ?? "" ?>"></td>
                            <td><input type="text" size="7" id="zone_id" name="zone_id" value="<?= $zid ?? "" ?>"></td>
                        </tr>
                    </table>
                </fieldset>
            </div>
            <div style="margin-bottom: 20px;">
                <fieldset><legend>Location</legend>
                <table style="width: 100%;">
                    <tr>
                        <th><label for="x">X</label></th>
                        <th><label for="y">Y</label></th>
                        <th><label for="z_coord">Z</label></th>
                        <th><label for="heading">Heading</label></th>
                    </tr>
                    <tr>
                        <td><input type="text" size="7" id="x" name="x" value="0"></td>
                        <td><input type="text" size="7" id="y" name="y" value="0"></td>
                        <td><input type="text" size="7" id="z_coord" name="z_coord" value="0"></td>
                        <td><input type="text" size="7" id="heading" name="heading" value="0"></td>
                    </tr>
                </table></fieldset>
            </div>
            <div class="center"><input type="submit" value="Submit Changes"></div>
        </form>
    </div>
</div>
