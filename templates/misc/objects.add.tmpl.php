<div class="edit_form" style="width: 650px">
    <div class="edit_form_header">
        Add Object
    </div>
    <div class="edit_form_content">
        <form name="door" method="post"
              action=index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=46">
            <div style="padding-bottom: 20px;">
                <fieldset>
                    <legend>Object Identity</legend>
                    <table style="width: 100%; border-spacing: 20px;">
                        <tr>
                            <th colspan="2"><label for="objid">ID</label></th>
                            <th colspan="2"><label for="objectname">name</label></th>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="text" size="7" id="objid" name="objid"
                                                   value="<?= $suggestobjid ?? "" ?>"></td>
                            <td colspan="2"><input type="text" size="20" id="objectname" name="objectname"
                                                   value="ITxxxxx_ACTORDEF"></td>
                        </tr>
                    </table>
                </fieldset>
            </div>
            <div style="padding-bottom: 20px;">
                <fieldset>
                    <legend>Object Location</legend>
                    <table style="width: 100%;">
                        <tr>
                            <th><label for="xpos">x</label></th>
                            <th><label for="ypos">y</label></th>
                            <th><label for="zpos">z</label></th>
                            <th><label for="heading">heading</label></th>
                        </tr>
                        <tr>
                            <td><input type="text" size="7" id="xpos" name="xpos" value="0"></td>
                            <td><input type="text" size="7" id="ypos" name="ypos" value="0"></td>
                            <td><input type="text" size="7" id="zpos" name="zpos" value="0"></td>
                            <td><input type="text" size="7" id="heading" name="heading" value="0"></td>
                        </tr>
                    </table>
                </fieldset>
            </div>
            <div style="padding-bottom: 20px;">
                <fieldset>
                    <legend>Object Details</legend>
                    <table style="width: 100%;">
                        <tr>
                            <th><label for="itemid">item</label></th>
                            <th><label for="charges">charges</label></th>
                            <th><label for="icon">icon</label></th>
                            <th><label for="type">type</label></th>
                        </tr>
                        <tr>
                            <td><input type="text" size="7" id="itemid" name="itemid" value="0"></td>
                            <td><input type="text" size="7" id="charges" name="charges" value="0"></td>
                            <td><input type="text" size="7" id="icon" name="icon" value="0"></td>
                            <td><select class="left" id="type" name="type">
                                    <?php foreach ($world_containers as $k => $v): ?>
                                        <option value="<?= $k ?>"<?php echo (isset($type) && $k == $type) ? " selected" : "" ?>><?= $v ?></option>
                                    <?php endforeach; ?>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </div>
            <div class="center">
                <input type="submit" value="Submit Changes">
            </div>
        </form>
    </div>
</div>