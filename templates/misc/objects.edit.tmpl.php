<div class="edit_form" style="width: 550px">
    <div class="edit_form_header">
        Edit Object: <?= $id ?>
    </div>
    <div class="edit_form_content">
        <form name="door" method="post"
              action=index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=43">
            <div style="padding-bottom: 20px;">
                <fieldset>
                    <legend>Object Identity</legend>
                    <table style="width: 100%;">
                        <tr>
                            <th><label for="objectname">name</label></th>
                        </tr>
                        <tr>
                            <td><input type="text" size="20" id="objectname" name="objectname"
                                       value="<?= $objectname ?? "" ?>">
                            </td>
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
                            <td><input type="text" size="7" id="xpos" name="xpos" value="<?= $xpos ?? "" ?>"></td>
                            <td><input type="text" size="7" id="ypos" name="ypos" value="<?= $ypos ?? "" ?>"></td>
                            <td><input type="text" size="7" id="zpos" name="zpos" value="<?= $zpos ?? "" ?>"></td>
                            <td><input type="text" size="7" id="heading" name="heading" value="<?= $heading ?? "" ?>">
                            </td>
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
                            <td><input type="text" size="7" id="itemid" name="itemid" value="<?= $itemid ?? "" ?>"></td>
                            <td><input type="text" size="7" id="charges" name="charges" value="<?= $charges ?? "" ?>"></td>
                            <td><input type="text" size="7" id="icon" name="icon" value="<?= $icon ?? "" ?>"></td>
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
                <input type="hidden" name="objid" value="<?= $id ?>">
                <input type="submit" value="Submit Changes">
            </div>
        </form>
    </div>
</div>