<div class="table_container" style="width: 700px;">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0;">Create Quest Global</td>
            </tr>
        </table>
    </div>
    <div class="table_content">
        <form name="qglobal" method="post" action="index.php?editor=qglobal&action=3">
            <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
                <tr>
                    <td style="width: 33%; padding: 0;">
                        <label for="name">Name:</label><br>
                        <input type="text" id="name" name="name" value="">
                    </td>
                    <td style="width: 33%; padding: 0;">
                        <label for="charid">Player:</label><br>
                        <input type="text" id="charid" name="charid" value="0">
                    </td>
                    <td style="width: 33%; padding: 0;">
                        <label for="npcid">NPC:</label><br>
                        <input type="text" id="npcid" name="npcid" value="0">
                    </td>
                </tr>
                <tr>
                    <td style="width: 34%; padding: 0;">
                        <label for="zoneid">Zone:</label><br>
                        <input type="text" id="zoneid" name="zoneid" value="0">
                    </td>
                    <td style="width: 33%; padding: 0;">
                        <label for="expdate">Expires:</label><br>
                        <input type="text" id="expdate" name="expdate" value="">
                    </td>
                    <td style="width: 34%; padding: 0;">
                        <label for="value">Value:</label><br>
                        <input type="text" id="value" name="value" value="">
                    </td>
                </tr>
                <tr>
                    <td style="padding: 0;" colspan="3">&nbsp;</td>
                </tr>
            </table>
            <div class="center">
                <input type="submit" value="Insert Quest Global">
                <input type="button" value="Cancel Insert" onClick="history.back()">
            </div>
        </form>
    </div>
</div>
