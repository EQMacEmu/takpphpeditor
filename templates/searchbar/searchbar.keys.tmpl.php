<div id="searchbar">
    <table style="width: 100%;">
        <tr>
            <td><strong>&nbsp;1.</strong> Search by
                <form action="index.php" method="GET">
                    <input type="hidden" name="editor" value="keys">
                    <input type="hidden" name="action" value="2">
                    <label for="playerid"></label>
                    <input type="text" id="playerid" name="playerid" size="5" value="Player ID"
                           onFocus="clearField(document.forms[0].playerid);document.forms[0].player_name.value='Player Name';document.forms[1].item_id.value='Item ID';">
                    or <label for="player_name"></label><input type="text" id="player_name" name="player_name" size="13"
                                                               value="Player Name"
                                                               onFocus="clearField(document.forms[0].player_name);document.forms[0].playerid.value='Player ID';document.forms[1].item_id.value='Item ID';">
                    <input type="submit" value=" GO ">
                </form>
            </td>
            <td> or <strong>&nbsp;2.</strong> Search by
                <form action="index.php" method="GET">
                    <input type="hidden" name="editor" value="keys">
                    <input type="hidden" name="action" value="3">
                    <label for="item_id"></label>
                    <input type="text" id="item_id" name="item_id" size="5" value="Item ID"
                           onFocus="clearField(document.forms[1].item_id);document.forms[0].playerid.value='Player ID';document.forms[0].player_name.value='Player Name';">
                    <input type="submit" value=" GO ">
                </form>
            </td>
        </tr>
    </table>
</div>
