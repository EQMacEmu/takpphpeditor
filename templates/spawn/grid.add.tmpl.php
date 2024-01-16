<div class="edit_form" style="margin-bottom: 15px;">
    <div class="edit_form_header">
        <table style="width: 100%;">
            <tr>
                <td>
                    Add a grid
                </td>
            </tr>
        </table>
    </div>

    <div class="edit_form_content">
        <form name="grid" method="post"
              action="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&spid=<?= $spid ?>&sid=<?= $sid ?>&action=19">
            <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
                <tr>
                    <td style="width: 33%;">
                        <label for="id">Suggested ID:</label><br>
                        <input type="text" id="id" name="id" value="<?= $suggestedid ?? "" ?>">
                    </td>
                    <td style="width: 33%;">
                        <label for="type">Wander Type:</label><br>
                        <select class="indented" id="type" name="type">
                            <?php foreach ($wandertype as $k => $v): ?>
                                <option value="<?= $k ?>"<?php echo (isset($type) && $k == $type) ? " selected" : "" ?>><?= $v ?></option>
                            <?php endforeach; ?>
                        </select><br><br>
                    </td>
                    <td style="width: 34%;">
                        <label for="type2">Pause Type:</label><br>
                        <select class="indented" id="type2" name="type2">
                            <?php foreach ($pausetype as $k => $v): ?>
                                <option value="<?= $k ?>"<?php echo (isset($type2) && $k == $type2) ? " selected" : "" ?>><?= $v ?></option>
                            <?php endforeach; ?>
                        </select><br><br>
                    </td>
                </tr>
            </table>
            <br><br>

            <div class="center">
                <input type="hidden" name="zoneid" value="<?= $zid ?? "" ?>">
                <input type="hidden" name="spid" value="<?= $spid ?>">
                <input type="hidden" name="npcid" value="<?= $npcid ?>">
                <input type="hidden" name="sid" value="<?= $sid ?>">
                <input type="submit" value="Submit Changes">
            </div>
        </form>
    </div>
