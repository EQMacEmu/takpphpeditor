<div class="edit_form" style="width: 750px">
    <div class="edit_form_header">
        Edit Horse <?= $filename ?? "" ?>
    </div>

    <div class="edit_form_content">
        <form name="horses" method="post"
              action=index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=31">
            <table style="width: 100%;">
                <tr>
                    <th><label for="filename">Filename</label></th>
                    <th><label for="texture">Texture</label></th>
                    <th><label for="mountspeed">Speed</label></th>
                </tr>

                <tr>
                    <td><input type="text" size="33" id="filename" name="filename" value="<?= $filename ?? "" ?>"></td>
                    <td><input type="text" size="7" id="texture" name="texture" value="<?= $texture ?? "" ?>"></td>
                    <td><input type="text" size="15" id="mountspeed" name="mountspeed" value="<?= $mountspeed ?? "" ?>">
                    </td>
                </tr>
                <tr>
                    <th><label for="race">Race</label></th>
                    <th><label for="gender">Gender</label></th>
                    <th><label for="notes">Notes</label></th>
                </tr>
                <tr>
                    <td><select id="race" name="race"">
                        <?php foreach ($races as $key => $value): ?>
                            <option value="<?= $key ?>"<?php echo (isset($race) && $key == $race) ? " selected" : ""; ?>><?= $key ?>
                                : <?= $value ?></option>
                        <?php endforeach; ?>
                        </select></td>
                    <td><select id="gender" name="gender">
                            <?php foreach ($genders as $key => $value): ?>
                                <option value="<?= $key ?>"<?php echo (isset($gender) && $key == $gender) ? " selected" : ""; ?>><?= $value ?></option>
                            <?php endforeach; ?>
                        </select></td>
                    <td><input type="text" size="15" id="notes" name="notes" value="<?= $notes ?? "" ?>"></td>
                </tr>
            </table>
            <br><br>
            <div class="center">
                <input type="hidden" name="filename" value="<?= $filename ?? "" ?>">
                <input type="submit" value="Submit Changes">
            </div>
        </form>
    </div>
</div>