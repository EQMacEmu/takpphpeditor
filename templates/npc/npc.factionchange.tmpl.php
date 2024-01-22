<table class="edit_form">
    <tr>
        <td class="edit_form_header">
            Update Faction:
        </td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <form name="searchmethod" method="get" action="index.php">
                <input type="hidden" name="editor" value="npc">
                <input type="hidden" name="z" value="<?= $currzone ?? "" ?>">
                <input type="hidden" name="zoneid" value="<?= $currzoneid ?? "" ?>">
                <input type="hidden" name="npcid" value="<?= $npcid ?>">
                <input type="hidden" name="npcfid" value="<?= $npcfid ?? "" ?>">
                <input type="radio" id="apply_to_npc_by_race" name="action" value="49">
                <label for="apply_to_npc_by_race">Apply to NPC by Race</label><br>
                <input type="radio" id="apply_to_npc_by_name" name="action" value="48">
                <label for="apply_to_npc_by_name">Apply to NPC by Name</label><br><br>
                <div class="center">
                    <input type="submit" value="Continue">
                </div>
            </form>
        </td>
    </tr>
</table>