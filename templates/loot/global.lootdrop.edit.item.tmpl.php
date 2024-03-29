	<form name="lootdrop_item" method="POST" action="index.php?editor=loot&z=<?=$currzone?>&zoneid=<?=$currzoneid?>&action=68&npcid=<?=$npcid?>&ldid=<?=$ldid?>&itemid=<?=$itemid?>">
		<div class="edit_form" style="width: 400px;">
			<div class="edit_form_header">Edit Global Lootdrop Item</div>
			<div class="edit_form_content">
				<table width="100%" cellpadding="3" cellspacing="3">
					<tr>
						<td>
							<strong>Lootdrop ID:</strong><br>
							<input type="text" size="7" value="<?=$ldid?>" disabled>
						</td>
						<td>
							<strong>Item ID:</strong><br>
							<input id="id" type="text" size="7" value="<?=$itemid?>" disabled>
						</td>
						<td>
							<strong>&nbsp;<br>Item Charges:</strong> <br>
							<input type="text" size="5" name="charges" value="<?=$item_charges?>">
						</td>
					</tr>
				</table><br>
				<table width="100%" cellpadding="3" cellspacing="3">
					<tr>
						<td>
							<strong>&nbsp;<br>Equipped:</strong><br>
							<select name="equip_item">
								<option value="0"<?echo ($equip_item == 0) ? " selected" : ""?>>no</option>
								<option value="1"<?echo ($equip_item == 1) ? " selected" : ""?>>yes</option>
								<option value="2"<?echo ($equip_item == 2) ? " selected" : ""?>>force</option>
							</select>
						</td>
						<td>
							<strong>&nbsp;<br>Chance:</strong><br>
							<input type="text" size="5" name="chance" value="<?=$chance?>">
						</td>
						<td>
							<strong>&nbsp;<br>Multiplier:</strong><br>
							<input type="text" size="5" name="multiplier" value="<?=$multiplier?>">
						</td>
					</tr>
					<tr><td colspan="4">&nbsp;</td></tr>
					<tr>
						<td>
							<strong>Min Level:</strong> <br>
							<input type="text" size="5" name="minlevel" value="<?=$minlevel?>">
						</td>
						<td>
							<strong>Max Level:</strong> <br>
							<input type="text" size="5" name="maxlevel" value="<?=$maxlevel?>">
						</td>
					</tr>
				</table><br><br>
				<center>
					<input type="hidden" name="global_loot" value="<?=$global_loot?>">
					<input type="hidden" name="ldid" value="<?=$ldid?>">
					<input type="hidden" name="itemid" value="<?=$itemid?>">
					<input type="submit" name="submit" value="Submit Changes">&nbsp;&nbsp;
					<input type="button" value="Cancel" onClick="history.back();">
				</center>
			</div>
		</div>
	</form>
