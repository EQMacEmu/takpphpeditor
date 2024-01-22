<table class="edit_form">
    <tr>
        <td class="edit_form_header">
            Add NPC by Level
        </td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <form name="npc_level" method="post"
                  action="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=25">
                <Label for="npc_level">NPC Level:</Label> <br>
                <input type="text" id="npc_level" name="npc_level" value=""><br><br>
                <div class="center">
                    <input type="submit" value="Submit">
                </div>
            </form>
        </td>
    </tr>
</table>
