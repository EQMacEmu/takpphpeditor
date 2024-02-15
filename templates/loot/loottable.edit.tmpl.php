<table class="edit_form">
    <tr>
        <td class="edit_form_header">
            Loottable <?= $loottable_id ?? "Undefined" ?>
        </td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <form method="post"
                  action="index.php?editor=loot&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=2&npcid=<?= $npcid ?>">
                <strong><label for="name">LootTable Name:</label></strong><br>
                <input class="indented" type="text" id="name" name="name" size="25"
                       value="<?= $loottable_name ?? "" ?>"><br><br>
                <strong><label for="mincash">Min. Cash:</label></strong><br>
                <input class="indented" type="text" id="mincash" name="mincash" size="5"
                       value="<?= $mincash ?? "" ?>"><br><br>
                <strong><label for="maxcash">Max. Cash:</label></strong><br>
                <input class="indented" type="text" id="maxcash" name="maxcash" size="5"
                       value="<?= $maxcash ?? "" ?>"><br><br>
               <strong><label for="min_expansion">Min Expansion:</label></strong><br>
                <input class="indented" type="text" id="min_expansion" name="min_expansion" size="5"
                       value="<?= $min_expansion ?? "" ?>"><br><br>
               <strong><label for="max_expansion">Max Expansion:</label></strong><br>
                <input class="indented" type="text" id="max_expansion" name="max_expansion" size="5"
                       value="<?= $max_expansion ?? "" ?>"><br><br>
               <strong><label for="content_flags">Content Flags:</label></strong><br>
                <input class="indented" type="text" id="content_flags" name="content_flags" size="5"
                       value="<?= $content_flags ?? "" ?>"><br><br>
                <strong><label for="content_flags_disabled">Content Flags Disabled:</label></strong><br>
                <input class="indented" type="text" id="content_flags_disabled" name="content_flags_disabled" size="5"
                       value="<?= $content_flags_disabled ?? "" ?>"><br><br>
				<div class="center">
                    <input type="hidden" name="loottable_id" value="<?= $loottable_id ?? "" ?>">
                    <input type="hidden" name="avgcoin" value="0">
                    <input type="submit" name="submit" value="Submit Changes">
                </div>
            </form>
        </td>
    </tr>
</table>
