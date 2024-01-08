<div id="searchbar">
    <form action="index.php?editor=player&action=2" method="POST">
        <table style="width: 100%;">
            <tr>
                <td>
                    <strong>1.</strong>
                    Search by
                    <label for="playerid"></label>
                    <input type="text" id="playerid" name="playerid" size="8" value="Player ID"
                           onFocus="clearField(document.forms[0].playerid);document.forms[0].playername.value='Player Name';">
                    or <label for="playername"></label><input type="text" id="playername" name="playername" size="12" value="Player Name"
                              onFocus="clearField(document.forms[0].playername);document.forms[0].playerid.value='Player ID';">
                    <input type="submit" value=" GO ">
                </td>
            </tr>
        </table>
    </form>
</div>
