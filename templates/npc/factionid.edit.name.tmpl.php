<table class="edit_form">
    <tr>
        <td class="edit_form_header">
            Edit NPC Faction
        </td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <label for="name">Name:</label> <br>
            <form name="name" method="post"
                  action="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=11">
                <input type="text" id="name" name="name" value="<?= $name ?? "" ?>"><br><br>
                <label for="ipa">Ignore Primary Assist:</label> <br>
                <select id="ipa" name="ipa">
                    <option value="0"<?php echo (isset($ignore_primary_assist) && $ignore_primary_assist == 0) ? " selected" : "" ?>>
                        False
                    </option>
                    <option value="1"<?php echo (isset($ignore_primary_assist) && $ignore_primary_assist == 1) ? " selected" : "" ?>>
                        True
                    </option>
                </select><br><br>
                <div class="center">
                    <input type="submit" name="submit" value="Submit Changes">
                </div>
            </form>
        </td>
    </tr>
</table>
