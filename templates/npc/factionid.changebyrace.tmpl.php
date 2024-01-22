<div class="edit_form" style="width: 350px">
    <div class="edit_form_header">
        Change Faction
    </div>
    <div class="edit_form_content">
        <form method="post"
              action="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&npcfid=<?= $npcfid ?? "" ?>&action=51">
            <table style="width: 100%;">
                <tr>
                    <th><label for="npcrace">npc race</label></th>
                    <th><label for="updateall">update all</label></th>
                </tr>
                <tr>
                    <td><select id="npcrace" name="npcrace" style="width: 265px;">
                            <?php foreach ($races as $key => $value): ?>
                                <option value="<?= $key ?>"<?php echo (isset($race) && $key == $race) ? " selected" : ""; ?>><?= $key ?>
                                    : <?= $value ?></option>
                            <?php endforeach; ?>
                        </select></td>
                    <td>
                        <select id="updateall" name="updateall">
                            <option value="0"<?php echo (isset($updateall) && $updateall == 0) ? " selected" : "" ?>>
                                No
                            </option>
                            <option value="1"<?php echo (isset($updateall) && $updateall == 1) ? " selected" : "" ?>>
                                Yes
                            </option>
                        </select>
                    </td>
                </tr>
            </table>
            <br><br>
            <div class="center">
                <input type="submit">
            </div>
        </form>
    </div>
</div>
  