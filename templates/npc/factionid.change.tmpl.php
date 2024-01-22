<table class="edit_form">
    <tr>
        <td class="edit_form_header">
            Change NPC Faction ID:
        </td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <form name="searchmethod" method="get" action="index.php">
                <input type="hidden" name="editor" value="npc">
                <input type="hidden" name="z" value="<?= $currzone ?? "" ?>">
                <input type="hidden" name="zoneid" value="<?= $currzoneid ?? "" ?>">
                <input type="hidden" name="npcid" value="<?= $npcid ?>">
                <input type="radio" id="search_by_name" name="action" value="6">
                <label for="search_by_name">Search for an NPC Faction ID by name</label><br>
                <input type="radio" id="search_by_primary_name" name="action" value="38">
                <label for="search_by_primary_name">Search for an NPC Faction ID by primary name</label><br>
                <input type="radio" id="enter_existing_id" name="action" value="4">
                <label for="enter_existing_id">Enter an existing NPC Faction ID</label><br>
                <input type="radio" id="create_new_id" name="action" value="8">
                <label for="create_new_id">Create a new NPC Faction ID</label><br><br>
                <div class="center">
                    <input type="submit" value="Continue">
                </div>
            </form>
        </td>
    </tr>
</table>
