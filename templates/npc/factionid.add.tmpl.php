<table class="edit_form">
    <tr>
        <td class="edit_form_header">
            Create a New NPC Faction
        </td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <form name="npcfaction" method="post"
                  action="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=9">
                <label for="id">Suggested ID:</label><br>
                <input type="text" id="id" name="id" size="25" value="<?= $id ?>"><br><br>
                <label for="name">Suggested Name:</label><br>
                <input type="text" id="name" name="name" size="25" value="<?= $npc_name ?? "" ?>"><br><br>
                <label for="ipa">Ignore Primary Assist:</label> <br>
                <select id="ipa" name="ipa">
                    <option value="0"<?php echo (isset($ipa) && $ipa == 0) ? " selected" : "" ?>>False</option>
                    <option value="1"<?php echo (isset($ipa) && $ipa == 1) ? " selected" : "" ?>>True</option>
                </select><br><br>
                <div class="center">
                    <input type="submit" name="submit" value="Submit Changes">
                </div>
            </form>
        </td>
    </tr>
</table>
