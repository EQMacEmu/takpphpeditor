<table class="edit_form">
    <tr>
        <td class="edit_form_header">
            Add New Loottable
        </td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <form name="loottable" method="post"
                  action="index.php?editor=loot&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=10&npcid=<?= $npcid ?>">
                <label for="id">Suggested ID:</label><br>
                <input type="text" id="id" name="id" size="25" value="<?= $id ?>"><br><br>
                <label for="name">Suggested Name:</label><br>
                <input type="text" id="name" name="name" size="25" value="<?= $name ?? "" ?>"><br><br>
                <label for="mincash">Min. Cash:</label> <br>
                <input type="text" id="mincash" name="mincash" size="25" value="0"><br><br>
                <label for="maxcash">Max. Cash:</label> <br>
                <input type="text" id="maxcash" name="maxcash" size="25" value="0"><br><br>
                <div class="center">
                    <input type="hidden" name="avgcoin" value="0">
                    <input type="submit" name="submit" value="Submit Changes">
                </div>
            </form>
        </td>
    </tr>
</table>
