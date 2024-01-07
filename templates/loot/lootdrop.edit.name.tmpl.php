<table class="edit_form">
    <tr>
        <td class="edit_form_header">
            LootDrop <?= $ldid ?? "" ?>
        </td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <form method="post"
                  action="index.php?editor=loot&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&ldid=<?= $ldid ?? "" ?>&action=4">
                <strong><label for="ldname">LootDrop Name:</label></strong><br>
                <input type="text" id="ldname" name="ldname" size="35" value="<?= $ldname ?? "" ?>"><br><br>
                <div class="center">
                    <input type="submit" name="submit" value="Submit Changes">
                </div>
            </form>
        </td>
    </tr>
</table>
