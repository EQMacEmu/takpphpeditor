<table class="edit_form">
    <tr>
        <td class="edit_form_header">
            Update Spellset:
        </td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <form name="searchmethod" method="get" action="index.php">
                <input type="hidden" name="editor" value="spellset">
                <input type="hidden" name="z" value="<?= $currzone ?? "" ?>">
                <input type="hidden" name="zoneid" value="<?= $currzoneid ?? "" ?>">
                <input type="hidden" name="npcid" value="<?= $npcid ?>">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="radio" id="apply_to_npc_by_class" name="action" value="19"><label
                        for="apply_to_npc_by_class">Apply to NPC by Class</label><br/>
                <input type="radio" id="apply_to_npc_by_name" name="action" value="18"><label
                        for="apply_to_npc_by_name">Apply to NPC by Name</label><br/><br/>
                <div class="center">
                    <input type="submit" value="Continue">
                </div>
            </form>
        </td>
    </tr>
</table>