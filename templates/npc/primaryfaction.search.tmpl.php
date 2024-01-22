<table class="edit_form">
    <tr>
        <td class="edit_form_header">
            Search Factions
        </td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <form name="search" method="post"
                  action="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=13">
                <label for="search">Search Factions For:</label><br><br>
                <input type="text" id="search" name="search"><br><br>
                <div class="center">
                    <input type="submit" value=" Search "><br><br>

                    or:<br><br>

                    <a href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&fid=0&action=14">Set
                        Primary Faction to 0</a>
                </div>
            </form>
        </td>
    </tr>
</table>
