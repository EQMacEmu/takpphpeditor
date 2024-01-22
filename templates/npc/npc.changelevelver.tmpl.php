<table class="edit_form">
    <tr>
        <td class="edit_form_header">Change NPC Levels</td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <form name="npc_level" method="post"
                  action="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=46">
                <table style="width: 100%;">
                    <tr>
                        <th><label for="npc_level">Level Diff:</label></th>
                    </tr>
                    <tr>
                        <td><input type="text" size="7" id="npc_level" name="npc_level" value="0"></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="center">
                                <input type="submit" value="Submit"><br/><br/>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>
