<div class="edit_form" style="width: 750px">
    <div class="edit_form_header">
        Add Pet Entry for <?= getNPCName($npcid) ?> (<?= $npcid ?>)
    </div>
    <div class="edit_form_content">
        <form name="addpet" method="post"
              action="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=55">
            <table style="width: 100%;">
                <tr>
                    <th><label for="type">type</label></th>
                    <th><label for="petpower">petpower</label></th>
                    <th><label for="equipmentset">equipment</label></th>
                    <th><label for="petcontrol">petcontrol</label></th>
                    <th><label for="petnaming">petnaming</label></th>
                    <th><label for="monsterflag">monsterflag</label></th>
                    <th><label for="temp">temp</label></th>
                </tr>
                <tr>
                    <td><input type="text" id="type" name="type" size="26" value="<?= getNPCName($npcid) ?>"></td>
                    <td><input type="text" id="petpower" name="petpower" size="5" value="-1"></td>
                    <td><input type="text" id="equipmentset" name="equipmentset" size="5" value="-1"></td>
                    <td><select class="left" id="petcontrol" name="petcontrol">
                            <?php foreach ($pet_control as $k => $v): ?>
                                <option value="<?= $k ?>"<?php echo ($k == 2) ? " selected" : "" ?>><?= $v ?></option>
                            <?php endforeach; ?>
                        </select></td>
                    <td><select class="left" id="petnaming" name="petnaming">
                            <?php foreach ($pet_naming as $k => $v): ?>
                                <option value="<?= $k ?>"<?php echo ($k == 3) ? " selected" : "" ?>><?= $v ?></option>
                            <?php endforeach; ?>
                        </select></td>
                    <td><select id="monsterflag" name="monsterflag">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select></td>
                    <td><select id="temp" name="temp">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select></td>
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