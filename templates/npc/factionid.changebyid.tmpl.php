<table class="edit_form">
    <tr>
        <td class="edit_form_header">
            Change NPC Faction ID:
        </td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <form name="faction_id" method="post"
                  action="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=5">
                <label for="npc_faction_id">New Faction ID:</label> <br>
                <input type="text" id="npc_faction_id" name="npc_faction_id"
                       value="<?= $npc_faction_id ?? "" ?>"><br><br>
                <div class="center">
                    <input type="submit" value="Submit">
                </div>
            </form>
        </td>
    </tr>
</table>
