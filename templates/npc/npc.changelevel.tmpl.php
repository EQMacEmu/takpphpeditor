<table class="edit_form">
    <tr>
        <td class="edit_form_header">Change NPC Level</td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <form name="npc_level" method="post"
                  action="index.php?editor=npc&npcid=<?= $npcid ?>&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=44">
                <label for="npc_level">NPC Level:</label><br/>
                <input type="text" id="npc_level" name="npc_level" value=""><br/><br/>
                <div class="center">
                    <input type="submit" value="Submit"><br/><br/>
                </div>
            </form>
        </td>
    </tr>
</table>
