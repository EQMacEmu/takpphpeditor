<?php $id = $_GET['npc']; ?>
<form name="addnpc" method="post"
      action="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&sid=<?= $sid ?>&action=9">
    <table class="edit_form">
        <tr>
            <td class="edit_form_header" colspan=3>
                Add an NPC to Spawngroup <?= $name ?? "" ?> (<?= $sid ?>)
            </td>
        </tr>
        <tr>
            <td class="edit_form_content">
                <label for="search">Search NPC Names for:</label> <br>
                <input type="text" id="search" name="search">
            </td>
            <td style="vertical-align: bottom;" class="edit_form_content"><b>or</b></td>
            <td class="edit_form_content">
                <label for="npc">Enter an NPC's ID:</label> <br>
                <input type="text" id="npc" name="npc" value=<?= $id ?>>
            </td>
        </tr>
        <tr>
            <td class="edit_form_content" colspan="3">
                <div class="center"><label for="chance">Spawn Chance:</label><br/><input type="checkbox" name="balance"
                                                                                         id="balance"
                                                                                         onclick="if(this.checked){document.getElementById('chance').disabled='disabled';} else {document.getElementById('chance').disabled='';}">
                    <label for="balance">Balance spawn</label> <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;or&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                    <input type="text" name="chance" id="chance" value="0" size="3"> %&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
