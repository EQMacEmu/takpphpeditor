<?php $id = $_GET['npc'] ?? 0; ?>
<form name="addnpc" method="post"
      action="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&minx=<?= $minx ?? "" ?>&miny=<?= $miny ?? "" ?>&maxx=<?= $maxx ?? "" ?>&maxy=<?= $maxy ?? "" ?>&limit=<?= $limit ?? "" ?>&npcname=<?= $npcname ?? "" ?>&action=70">
    <table class="edit_form" style="width: 750px;">
        <tr>
            <th class="edit_form_header" colspan="3">
                Add an NPC to multiple Spawngroups
            </th>
        </tr>
        <tr>
            <td class="edit_form_content" style="text-align: center;">
                <label for="search">Search NPC Names for:</label> <br>
                <input type="text" id="search" name="search">
            </td>
            <td style="background-color: #CCC; font-size: 12px; font-weight: bold;">or</td>
            <td class="edit_form_content" style="text-align: center;">
                <label for="npc">Enter an NPC's ID:</label> <br>
                <input type="text" id="npc" name="npc" value=<?= $id ?>>
            </td>
        </tr>
        <tr>
            <td class="edit_form_content" colspan="3">
                <div class="center">
                    <fieldset><legend>Spawn Chance</legend>
                        <input type="checkbox" name="balance" id="balance"
                               onclick="if(this.checked){document.getElementById('chance').disabled='disabled';} else {document.getElementById('chance').disabled='';}">
                        <span style="margin-left: 5px; margin-right: 15px;"><label
                                    for="balance">Balance spawn</label></span><span
                                style="font-weight: bold; margin-left: 15px; margin-right: 30px;">or</span>
                        <input type="text" name="chance" id="chance" value="0" size="3"> <label for="chance">% chance</label>
                    </fieldset>
                </div>
            </td>
        </tr>
		<tr>
			<td class="edit_form_content">
				<strong>Min Expansion:</strong><br>
				<input type="text" name="min_expansion" value="-1">
			</td>
			<td class="edit_form_content">&nbsp;</td>
			<td class="edit_form_content">
				<strong>Max Expansion:</strong><br>
				<input type="text" name="max_expansion" value="-1">
			</td>
		</tr>
		<tr>
			<td class="edit_form_content">
				<strong>Content Flags:</strong><br>
				<input type="text" name="content_flags" value="">
			</td>
			<td class="edit_form_content">&nbsp;</td>
			<td class="edit_form_content">
				<strong>Content Flags Disabled:</strong><br>
				<input type="text" name="content_flags_disabled" value="">
			</td>
		</tr>
        <tr>
            <td colspan=3 style="text-align: center;" class="edit_form_content">
                <input type="submit" name="submit" value=" Submit ">
            </td>
        </tr>
    </table>
</form>
