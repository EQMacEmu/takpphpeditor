<table class="edit_form">
    <tr>
        <td class="edit_form_header">
            Change Spellset:
        </td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <form name="searchmethod" method="get" action="index.php">
                <input type="hidden" name="editor" value="spellset">
                <input type="hidden" name="z" value="<?= $currzone ?? "" ?>">
                <input type="hidden" name="zoneid" value="<?= $currzoneid ?? "" ?>">
                <input type="hidden" name="npcid" value="<?= $npcid ?>">
                <input type="radio" id="create_a_new_spellset" name="action" value="10"><label
                        for="create_a_new_spellset">Create a new Spellset</label><br>
                <input type="radio" id="choose_an_existing_spellset" name="action" value="12"><label
                        for="choose_an_existing_spellset">Choose an existing Spellset</label><br><br>
                <div class="center">
                    <input type="submit" value="Continue">
                </div>
            </form>
        </td>
    </tr>
</table>
