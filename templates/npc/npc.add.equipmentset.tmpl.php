<div class="edit_form" style="width: 350px">
    <div class="edit_form_header">
        Add Pet Equipmentset for <?= getNPCName($npcid) ?> (<?= $npcid ?>)
    </div>
    <div class="edit_form_content">
        <form name="addpet" method="post"
              action="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=61">
            <table style="width: 100%;">
                <tr>
                    <th><label for="set_id">id</label></th>
                    <th><label for="setname">name</label></th>
                    <th><label for="nested_set">nested set</label></th>
                </tr>
                <tr>
                    <td><input type="text" id="set_id" name="set_id" size="5" value="<?= $suggested_id ?? "" ?>"></td>
                    <td><input type="text" id="setname" name="setname" size="26" value="<?= getNPCName($npcid) ?>"></td>
                    <td><input type="text" id="nested_set" name="nested_set" size="5" value="-1"></td>
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