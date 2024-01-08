<div id="searchbar">
    <table style="width: 100%;">
        <tr>
            <td>
                <strong>1.</strong>
                <form action="index.php" method="GET">
                    <input type="hidden" name="editor" value="spells">
                    <input type="hidden" name="action" value="1">
                    <label for="id"></label>
                    <input type="text" id="id" name="id" size="7" value="ID"
                           onFocus="clearField(document.forms[0].id);document.forms[0].search.value='Spell Name';"> or
                    <label for="search"></label>
                    <input type="text" id="search" name="search" size="22" value="Spell Name"
                           onFocus="clearField(document.forms[0].search);document.forms[0].id.value='ID';">
                    <input type="submit" value=" GO ">
                </form>
            </td>
        </tr>
    </table>
</div>
