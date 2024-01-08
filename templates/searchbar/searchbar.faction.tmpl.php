<div id="searchbar">
    <table style="width: 100%;">
        <tr>
            <td style="text-align: left;">
                <strong>1.</strong>
                <label for="faction_select"></label>
                &nbsp;<select id="faction_select" OnChange="gotosite(this.options[this.selectedIndex].value)">
                    <option value="">Select a Faction</option>
                    <?php foreach ($factions as $faction): extract($faction); ?>
                        <option value="index.php?editor=<?= $curreditor ?>&fid=<?= $id ?>"<?php if ($currfaction == $id): ?> selected<?php endif; ?>><?= $name ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td style="text-align: right;"> or <strong>&nbsp;2.</strong> Search by
                <form action="index.php?editor=faction&action=3" method="POST">
                    <label for="faction_name"></label>
                    <input type="text" id="faction_name" name="faction_name" size="20" value="Faction Name"
                           onFocus="clearField(document.forms[0].faction_name); document.forms[0].faction_id.value = 'ID';">
                    or by
                    <label for="faction_id"></label>
                    <input type="text" id="faction_id" name="faction_id" size="3" value="ID"
                           onFocus="clearField(document.forms[0].faction_id); document.forms[0].faction_name.value = 'Faction Name';">
                    <input type="submit" value=" GO ">
                </form>
            </td>
        </tr>
    </table>
</div>
