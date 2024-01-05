<table class="edit_form" style="width: 250px;">
    <tr>
        <td class="edit_form_header">
            Key Item for <?= getPlayerName($playerid) ?>
        </td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <form name="keys" id="keys" method="POST" action="index.php?editor=keys&action=5">
                <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
                    <tr>
                        <td style="padding: 3px;">
                            <label for="id">Player ID:</label><br/>
                            <input type="text" size="5" id="id" name="id" value="<?= $playerid ?>" readonly="readonly">
                        </td>
                        <td style="padding: 3px;">
                            <label for="item_id">Item ID:</label><br/>
                            <input type="text" size="5" id="item_id" name="item_id" value="">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 3px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding: 3px;">
                            <div class="center">
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
