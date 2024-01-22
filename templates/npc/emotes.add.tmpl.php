<form name="emoteadd" method="post"
      action="index.php?editor=npc&z=<?= $currzone ?? "" ?>&npcid=<?= $npcid ?>&zoneid=<?= $currzoneid ?? "" ?>&action=80">
    <table class="edit_form">
        <tr>
            <td class="edit_form_header">Add Emote:</td>
        </tr>
        <tr>
            <td class="edit_form_content">
                <input type="radio" id="create_new_emote_set" name="method" value="1">
                <label for="create_new_emote_set">Create new emote set</label><br/>
                <input type="radio" id="enter_existing_emote_id" name="method" value="2">
                <label for="enter_existing_emote_id">Enter an existing emote ID:</label>
                <label for="emoteid"></label>
                <input type="text" id="emoteid" name="emoteid" size="5" value="0"><br/><br/>
                <div class="center"><input type="submit" value="Continue">&nbsp;<input type="button" value="Cancel"
                                                                                       onClick="history.back();">
                </div>
            </td>
        </tr>
    </table>
</form>
