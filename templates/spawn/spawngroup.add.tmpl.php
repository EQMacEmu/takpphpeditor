<table class="edit_form">
    <tr>
        <td class="edit_form_header">
            Add Spawngroup:
        </td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <form name="searchmethod" method="get" action="index.php">
                <input type="hidden" name="editor" value="spawn">
                <input type="hidden" name="z" value="<?= $currzone ?? "" ?>">
                <input type="hidden" name="npcid" value="<?= $npcid ?>">
                <input type="hidden" name="zoneid" value="<?= $currzoneid ?? "" ?>">
                <input type="radio" id="search_by_name" name="action" value="55"><label for="search_by_name">Search for
                    an existing spawngroup by name</label><br>
                <input type="radio" id="enter_id" name="action" value="56"><label for="enter_id">Enter an existing
                    spawngroup ID</label><br><br>
                <div class="center">
                    <input type="submit" value="Continue">
                </div>
            </form>
        </td>
    </tr>
</table>
