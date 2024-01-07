<table class="edit_form">
    <tr>
        <td class="edit_form_header">
            Add New Lootdrop
        </td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <form name="loottable" method="post"
                  action="index.php?editor=loot&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=31">
                <input type="hidden" name="ltid" value="<?= $ltid ?? "" ?>">
                <label for="ldid">Suggested ID:</label><br>
                <input type="text" id="ldid" name="ldid" size="25" value="<?= $id ?>"><br><br>
                <label for="name">Suggested Name:</label><br>
                <input type="text" id="name" name="name" size="25" value="<?= $name ?? "" ?>"><br><br>
                <label for="mindrop">Mindrop:</label> <br>
                <input type="text" id="mindrop" name="mindrop" size="25" value="0"><br><br>
                <label for="droplimit">Droplimit:</label> <br>
                <input type="text" id="droplimit" name="droplimit" size="25" value="0"><br><br>
                <label for="multiplier">Multiplier:</label> <br>
                <input type="text" id="multiplier" name="multiplier" size="25" value="1"><br><br>
                <label for="multiplier_min">Multiplier Min:</label> <br>
                <input type="text" id="multiplier_min" name="multiplier_min" size="25" value="0"><br><br>
                <label for="probability">Probability:</label> <br>
                <input type="text" id="probability" name="probability" size="25" value="100"><br><br>
                <div class="center">
                    <input type="submit" name="submit" value="Submit Changes">
                </div>
            </form>
        </td>
    </tr>
</table>
