<table class="edit_form" style="width: 250px;">
    <tr>
        <td class="edit_form_header">
            Key on <?= getPlayerName($key_item['id']) ?>'s Keyring
        </td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <form name="keys" id="keys" method="POST"
                  action="index.php?editor=keys&playerid=<?= $key_item['id'] ?>&action=7">
                <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
                    <tr>
                        <td style="padding: 3px;">
                            <label for="id">Player ID:</label><br/>
                            <input type="text" size="5" id="id" name="id" value="<?= $key_item['id'] ?>"
                                   readonly="readonly">
                        </td>
                        <td style="padding: 3px;">
                            <label for="item_id">Item ID:</label><br/>
                            <input type="text" size="5" id="item_id" name="item_id" value="<?= $key_item['item_id'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 3px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding: 3px;">
                            <div class="center">
                                <input type="hidden" name="old_item" value="<?= $key_item['item_id'] ?>">
                                <input type="submit" name="submit" value="Submit Changes">&nbsp;
                                <input type="button" name="cancel" value="Cancel" onClick="history.back();">
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>
