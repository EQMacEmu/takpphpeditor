<div class="edit_form" style="width:200px;">
    <div class="edit_form_header">
        Find next available NPCID in
    </div>
    <div class="edit_form_content">
        <form name="npc_id" method="post"
              action="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?? "" ?>&action=41">
            <table style="width: 100%;">
                <tr>
                    <td style="text-align: left; width: 30%;"><label for="npczoneid">Zone:</label><br/>
                        <select id="npczoneid" name="npczoneid" style="width:180px;">
                            <?php foreach ($zoneids as $key => $value): ?>
                                <option value="<?= $key ?>"<?php echo ($key == $zoneid) ? " selected" : ""; ?>><?= $key ?>
                                    : <?= $value ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
            </table>
            <br/><br/>
            <div class="center"><input type="submit" value="GO"></div>
        </form>
    </div>
</div>
