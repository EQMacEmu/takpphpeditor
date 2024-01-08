<div id="searchbar">
    <table style="width: 100%;">
        <tr>
            <td>
                <strong>1.</strong>
                <label for="tradeskill_select"></label>
                <select id="tradeskill_select" OnChange="gotosite(this.options[this.selectedIndex].value)">
                    <option value="">Select a Tradeskill</option>
                    <?php foreach ($tradeskills as $k => $v): ?>
                        <option value="index.php?editor=tradeskill&ts=<?= $k ?>"<?php echo (isset($currts) && $currts == $k) ? " selected" : ""; ?>><?= $v ?></option>
                    <?php endforeach; ?>
                </select>
                &nbsp; and &nbsp;
                <label for="recipe_select"></label>
                <select id="recipe_select" OnChange="gotosite(this.options[this.selectedIndex].value)">
                    <option value="">Select a Recipe</option>
                    <?php foreach ($recipes as $k => $v): ?>
                        <option value="index.php?editor=tradeskill&ts=<?= $currts ?? "" ?>&rec=<?= $v['id'] ?>"<?php echo (isset($currrec) && $currrec == $v['id']) ? " selected" : ""; ?>><?= $v['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td style="text-align: right;"> or <strong>&nbsp;2.</strong> Search by
                <form action="index.php" method="GET">
                    <input type="hidden" name="editor" value="tradeskill">
                    <input type="hidden" name="action" value="9">
                    <label for="itemid"></label>
                    <input type="text" id="itemid" name="itemid" size="5" value="Item ID"
                           onFocus="clearField(document.forms[0].itemid);document.forms[0].search.value='Recipe Name';">
                    or <label for="search"></label><input type="text" id="search" name="search" size="12" value="Recipe Name"
                              onFocus="clearField(document.forms[0].search);document.forms[0].itemid.value='Item ID';">
                    <input type="submit" value=" GO ">
                </form>
            </td>
        </tr>
    </table>
</div>