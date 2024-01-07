<table class="edit_form">
    <tr>
        <td class="edit_form_header">
            Loottable Search
        </td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <form name="search" method="post"
                  action="index.php?editor=loot&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=15">
                <label for="search">Search Loottables For:</label><br><br>
                <input type="text" id="search" name="search"><br><br>
                <div class="center">
                    <input type="submit" value=" Search ">
                </div>
            </form>
        </td>
    </tr>
</table>
