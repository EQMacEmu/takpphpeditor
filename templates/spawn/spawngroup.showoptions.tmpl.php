<div class="edit_form" style="width: 750px">
    <div class="edit_form_header">
        Search for Spawngroups
    </div>
    <div class="edit_form_content">
        <form name="addspawngroup" method="post"
              action="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=68">
            <table style="width: 100%;">
                <tr>
                    <th><label for="minx">Min X:</label></th>
                    <th><label for="maxx">Max X:</label></th>
                    <th><label for="miny">Min Y:</label></th>
                    <th><label for="maxy">Max Y:</label></th>
                    <th><label for="limit">Limit</label></th>
                    <th><label for="npcname">NPC Name:</label></th>
                </tr>
                <tr>
                    <td><input type="text" id="minx" name="minx" size="8" value="-25000"></td>
                    <td><input type="text" id="maxx" name="maxx" size="8" value="11000"></td>
                    <td><input type="text" id="miny" name="miny" size="8" value="-25000"></td>
                    <td><input type="text" id="maxy" name="maxy" size="8" value="11000"></td>
                    <td><input type="text" id="limit" name="limit" size="8" value="20"></td>
                    <td><input type="text" id="npcname" name="npcname" size="26" value=""></td>
                </tr>
            </table>
            <br><br>
            <div class="center">
                <input type="submit" name="submit" value=" Search ">
            </div>
        </form>
    </div>
</div>
