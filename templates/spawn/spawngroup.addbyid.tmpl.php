<table class="edit_form">
    <tr>
        <td class="edit_form_header">
            Add NPC to Spawngroup
        </td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <form name="addspawngroup" method="post"
                  action="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&new_sid=<?= $new_sid ?? "" ?>&action=58">
                <input type="hidden" name="npc" value=<?= $npcid ?>>
                <label for="new_sid">Enter Spawngroup ID:</label><br>
                <input type="text" id="new_sid" name="new_sid"><br><br>
                <table>
                    <tr>
                        <td colspan="3" style="text-align: center;" class="edit_form_content">
                            <input type="submit" name="submit" value=" Submit ">
                        </td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>
