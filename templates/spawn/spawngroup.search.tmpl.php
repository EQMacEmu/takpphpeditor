<table class="edit_form">
    <tr>
        <td class="edit_form_header">
            Spawngroup Search
        </td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <form name="search" method="post"
                  action="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&sid=<?= $sid ?>&action=57">
                <label for="search">Search Spawngroups For:</label><br><br>
                <input type="text" id="search" name="search"><br><br>
                <div class="center">
                    <input type="submit" value=" Search ">
                </div>
            </form>
        </td>
    </tr>
</table>
