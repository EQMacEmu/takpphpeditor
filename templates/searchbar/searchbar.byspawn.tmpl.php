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
                &nbsp; and &nbsp;
                <label for="npc_select"></label>
                <select id="npc_select" OnChange="gotosite(this.options[this.selectedIndex].value)">
                    <option value="">Select an NPC</option>
                    <?php foreach ($npcs as $npc): ?>
                        <option value="index.php?editor=<?= $curreditor ?? "" ?>&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npc['id'] ?>"<?php if (isset($currnpc) && $currnpc == $npc['id']): ?> selected<?php endif; ?>><?= $npc['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td style="text-align: right;"> or <strong>&nbsp;2.</strong>
                <form action="index.php" method="GET">
                    <input type="hidden" name="editor" value="spawn">
                    <input type="hidden" name="action" value="49">
                     <input type="text" id="npc_id" name="npc_id" size="5" value="ID"
                           onFocus="clearField(document.forms[0].npc_id);document.forms[0].search.value='Enter a NPC';">
                    or <label for="search"></label><input type="text" id="search" name="search" size="12"
                                                          value="Enter a NPC"
                                                          onFocus="clearField(document.forms[0].search);document.forms[0].npc_id.value='ID';">
                    <input type="submit" value=" GO ">
                </form>
            </td>
        </tr>
    </table>
</div>
