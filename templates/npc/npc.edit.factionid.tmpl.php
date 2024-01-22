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
                <input type="hidden" name="npcid" value="<?= $npcid ?>">
                <input type="radio" id="search_by_name" name="action" value="14">
                <label for="search_by_name">Search for an NPC Faction ID by name</label><br>
                <input type="radio" id="enter_npc_faction_id" name="action" value="12">
                <label for="enter_npc_faction_id">Enter an NPC Faction ID</label><br>
                <input type="radio" id="create_new_npc_faction_id" name="action" value="9">
                <label for="create_new_npc_faction_id">Create a new NPC Faction ID</label><br><br>
                <div class="center">
                    <input type="submit" value="Continue">
                </div>
            </form>
        </td>
    </tr>
</table>
