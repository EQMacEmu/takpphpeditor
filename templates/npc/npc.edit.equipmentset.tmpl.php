<div class="edit_form" style="width: 350px">
    <div class="edit_form_header">
        Edit Pet Equipmentset <?= $set_id ?? "" ?> for <?= getNPCName($npcid) ?> (<?= $npcid ?>)
    </div>
    <div class="edit_form_content">
        <form name="addpet" method="post"
              action="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=65">
            <table style="width: 100%;">
                <tr>
                    <th><label for="set_id">id</label></th>
                    <th><label for="setname">name</label></th>
                    <th><label for="nested_set">nested set</label></th>
                </tr>
                <tr>
                    <td><input type="text" id="set_id" name="set_id" size="5" value="<?= $set_id ?? "" ?>"></td>
                    <td><input type="text" id="setname" name="setname" size="26" value="<?= $setname ?? "" ?>"></td>
                    <td><input type="text" id="nested_set" name="nested_set" size="5" value="<?= $nested_set ?? "" ?>">
                    </td>
                </tr>
            </table>
            <br><br>
            <div class="center">
                <input type="submit" name="submit" value=" Submit ">
                <input type="hidden" name="id" value="<?= $npcid ?>">
            </div>
        </form>
    </div>
</div>