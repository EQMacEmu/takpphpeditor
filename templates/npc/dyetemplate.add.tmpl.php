<table class="edit_form">
    <tr>
        <td class="edit_form_header">
            Change Dye Template
        </td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <form name="armortint_id" method="post"
                  action="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=36">
                <label for="armortint_id">New Dye Template:</label> <br>
                <input type="text" id="armortint_id" name="armortint_id" value="<?= $armortint_id ?? "" ?>"><br><br>
                <div class="center">
                    <input type="submit" value="Submit">
                </div>
            </form>
            <br><br>
            or<br><br>
            <div class="center">
                <a href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&armortint_id=<?= $suggested_id ?? "" ?>&action=36">Assign
                    next available ID</a>
            </div>
        </td>
    </tr>
</table>