<table class="edit_form">
    <tr>
        <td class="edit_form_header">
            Change LootTable:
        </td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <form name="searchmethod" method="get" action="index.php">
                <input type="hidden" name="editor" value="loot">
                <input type="hidden" name="z" value="<?= $currzone ?? "" ?>">
                <input type="hidden" name="zoneid" value="<?= $currzoneid ?? "" ?>">
                <input type="hidden" name="npcid" value="<?= $npcid ?>">
                <input type="radio" id="search_loottable_by_name" name="action" value="14"><label for="search_loottable_by_name">Search for a LootTable by name</label><br>
                <input type="radio" id="enter_a_loottable_id" name="action" value="12"><label for="enter_a_loottable_id">Enter a LootTable ID</label><br>
                <input type="radio" id="create_a_new_loottable" name="action" value="9"><label for="create_a_new_loottable">Create a new LootTable</label><br><br>
                <div class="center">
                    <input type="submit" value="Continue">
                </div>
            </form>
        </td>
    </tr>
</table>
