<table class="edit_form">
    <tr>
        <td class="edit_form_header">
            Search NPC Faction IDs
        </td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <form name="search" method="post"
                  action="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=7">
                <label for="search">Search NPC Faction IDs For:</label><br><br>
                <input type="text" id="search" name="search"><br><br>
                <div class="center">
                    <input type="submit" value=" Search ">
                </div>
            </form>
        </td>
    </tr>
</table>
