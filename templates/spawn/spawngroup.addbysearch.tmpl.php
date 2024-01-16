<table class="edit_form">
    <tr>
        <td class="edit_form_header">
            Add NPC to Spawngroup
        </td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <form name="addspawngroup" method="post"
                  action="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&sid=<?= $sid ?>&action=9">
                <input type="hidden" name="npc" value=<?= $npcid ?>>
                <label for="sid">Spawngroup ID:</label><br>
                <input type="text" id="sid" name="sid" value="<?= $sid ?>">
                <table>
                    <tr>
                        <td class="edit_form_content" colspan="3">
                            <div class="center"><label for="chance">Spawn Chance:</label><br/><input type="checkbox"
                                                                                                     name="balance"
                                                                                                     id="balance"
                                                                                                     onclick="if(this.checked){document.getElementById('chance').disabled='disabled';} else {document.getElementById('chance').disabled='';}">
                                <label for="balance">Balance spawn</label> <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;or&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                                <input type="text" name="chance" id="chance" value="0" size="3"> %&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </div>
                        </td>
                    </tr>
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
