<table class="edit_form">
    <tr>
        <td class="edit_form_header">
            Change LootDrop:
        </td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <form name="searchmethod" method="get" action="index.php">
                <input type="hidden" name="editor" value="loot">
                <input type="hidden" name="z" value="<?= $currzone ?? "" ?>">
                <input type="hidden" name="zoneid" value="<?= $currzoneid ?? "" ?>">
                <input type="hidden" name="npcid" value="<?= $npcid ?>">
                <input type="hidden" name="ltid" value="<?= $ltid ?? "" ?>">
                <input type="radio" id="search_by_name" name="action" value="25"><label for="search_by_name">Search for a LootDrop by name</label><br/>
                <input type="radio" id="enter_a_lootdrop_id" name="action" value="23"><label for="enter_a_lootdrop_id">Enter a LootDrop ID</label><br/>
                <input type="radio" id="create_a_new_lootdrop" name="action" value="30"><label for="create_a_new_lootdrop">Create a new LootDrop</label><br/><br/>
                <div class="center">
                    <input type="submit" value="Continue">
                </div>
            </form>
        </td>
    </tr>
</table>
