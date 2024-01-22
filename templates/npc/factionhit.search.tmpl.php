<table class="edit_form">
    <tr>
        <td class="edit_form_header">
            Add a Faction Hit
        </td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <form name="search" method="post"
                  action="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=16">
                <label for="search">Search Factions For:</label><br><br>
                <input type="text" id="search" name="search"><br><br>
                <div class="center">
                    <input type="submit" value=" Search ">
                </div>
            </form>
        </td>
    </tr>
</table>
