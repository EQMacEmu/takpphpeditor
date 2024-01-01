<table class="edit_form">
    <tr>
        <td class="edit_form_header">
            Search for NPCs by:
        </td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <form name="searchmethod" method="get" action="index.php">
                <input type="hidden" name="editor" value="faction">
                <input type="hidden" name="fid" value="<?= $fid ?? "" ?>">
                <input type="radio" id="npcs_on_faction" name="action" value="15">
                <label for="npcs_on_faction">NPCs on this factions</label><br>
                <input type="radio" id="npcs_increase_faction" name="action" value="17">
                <label for="npcs_increase_faction">NPCs that increase this faction</label><br>
                <input type="radio" id="npcs_decrease_faction" name="action" value="18">
                <label for="npcs_decrease_faction">NPCs that decrease this faction</label><br>
                <input type="radio" id="npcs_no_faction_change" name="action" value="19">
                <label for="npcs_no_faction_change">NPCs with no faction change</label><br><br>
                <div class="center">
                    <input type="submit" value="Continue">
                </div>
            </form>
        </td>
    </tr>
</table>
