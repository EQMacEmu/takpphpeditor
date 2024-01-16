<div class="edit_form" style="width: 300px">
    <div class="edit_form_header">
        Edit Spawn Condition: <?= $id ?>
    </div>

    <div class="edit_form_content">
        <form name="spawncondition" method="post"
              action="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&spid=<?= $spid ?>&action=43">
            <table style="width: 100%;">
                <tr>
                    <th><label for="value">Value:</label></th>
                    <th><label for="name">Name:</label></th>
                    <th><label for="onchange">Onchange:</label></th>
                </tr>
                <tr>
                    <td><input type="text" size="7" id="value" name="value" value="<?= $value ?? "" ?>"></td>
                    <td><input type="text" size="15" id="name" name="name" value="<?= $name ?? "" ?>"></td>
                    <td>
                        <select id="onchange" name="onchange">
                            <option value="0"<?php echo (isset($onchange) && $onchange == 0) ? " selected" : "" ?>>
                                Nothing
                            </option>
                            <option value="1"<?php echo (isset($onchange) && $onchange == 1) ? " selected" : "" ?>>
                                Depop
                            </option>
                            <option value="2"<?php echo (isset($onchange) && $onchange == 2) ? " selected" : "" ?>>
                                Repop
                            </option>
                            <option value="3"<?php echo (isset($onchange) && $onchange == 3) ? " selected" : "" ?>>
                                RepopIfReady
                            </option>
                        </select>
                    </td>
                </tr>
            </table>
            <br><br>

            <div class="center">
                <input type="hidden" name="scid" value="<?= $id ?>">
                <input type="submit" value="Submit Changes">
            </div>
        </form>
    </div>
</div>