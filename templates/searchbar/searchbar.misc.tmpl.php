<div id="searchbar">
    <table style="width: 100%;">
        <tr>
            <td>
                <strong>1.</strong>
                <label for="zone_select"></label>
                <select id="zone_select" OnChange="gotosite(this.options[this.selectedIndex].value)">
                    <option value="">Select a Zone</option>
                    <?php foreach ($zonelist as $zone): ?>
                        <?php if ($zone['expansion'] <= $expansion_limit): ?>
                            <option value="index.php?editor=<?= $curreditor ?? "" ?>&z=<?= $zone['short_name'] ?>&zoneid=<?= $zone['id'] ?>"<?php if (isset($currzoneid) && $currzoneid == $zone['id']): ?> selected<?php endif; ?>><?= $zone['short_name'] ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </td>
            <td style="text-align: right;"> or <strong>&nbsp;2.</strong> By ItemID:
                <form action="index.php" method="GET">
                    <input type="hidden" name="editor" value="misc">
                    <input type="hidden" name="action" value="25">
                    <label for="fishid"></label>
                    <input type="text" id="fishid" name="fishid" size="12" value="Fishing"
                           onFocus="clearField(document.forms[0].fishid);document.forms[0].forageid.value='Forage';document.forms[0].gspawnid.value='GroundSpawn';">
                    or <label for="forageid"></label><input type="text" id="forageid" name="forageid" size="12" value="Forage"
                              onFocus="clearField(document.forms[0].forageid);document.forms[0].fishid.value='Fishing';document.forms[0].gspawnid.value='GroundSpawn';">
                    or <label for="gspawnid"></label><input type="text" id="gspawnid" name="gspawnid" size="12" value="GroundSpawn"
                              onFocus="clearField(document.forms[0].gspawnid);document.forms[0].fishid.value='Fishing';document.forms[0].forageid.value='Forage';">
                    <input type="submit" value=" GO ">
                </form>
            </td>
        </tr>
    </table>
</div>
