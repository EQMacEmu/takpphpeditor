  <div class="edit_form" style="width: 1000px">
    <div class="edit_form_header">
      Edit Merchant List: <?=$id?>
    </div>
    <div class="edit_form_content">
      <form name="merchantlist" method="post" action="index.php?editor=merchant&z=<?=$currzone ?? ""?>&zoneid=<?=$currzoneid ?? ""?>&npcid=<?=$npcid?>&action=2">
        <table style="width: 100%;">
          <tr>
            <th>Curr<br/>Slot</th>
            <th>New<br/>Slot</th>
            <th>Item ID</th>
            <th>Item Name</th>
            <th>Fact<br/>Req</th>
            <th>Lvl<br/>Req</th>
             <th>Class<br/>Req</th>
            <th>Qty</th>
			<th>Min<br/>Expan</th>
			<th>Max<br/>Expan</th>
			
			<th>Content<br/>Flags</th>
			<th>Content<br/>Disabled</th>
			
          </tr>
            <?php $x=1; foreach ($slots as $slot => $v):?>
          <tr>
            <td style="text-align: center;"><?=$slot?></td>
            <td style="text-align: center;"><label for="newslot<?=$x?>"></label><input type="text" size="3" id="newslot<?=$x?>" name="newslot<?=$x?>" value="<?=$slot?>"></td>
            <td style="text-align: center;"><label for="item<?=$x?>"></label><input type="text" size="7" id="item<?=$x?>" name="item<?=$x?>" value="<?=$v['item']?>"></td>
            <td><?=$v['item_name']?></td>
            <td style="text-align: center;"><label for="faction_required<?=$x?>"></label><input type="text" size="3" id="faction_required<?=$x?>" name="faction_required<?=$x?>" value="<?=$v['faction_required']?>"</td>
            <td style="text-align: center;"><label for="level_required<?=$x?>"></label><input type="text" size="3" id="level_required<?=$x?>" name="level_required<?=$x?>" value="<?=$v['level_required']?>"</td>
            <td style="text-align: center;"><label for="classes_required<?=$x?>"></label><input type="text" size="3" id="classes_required<?=$x?>" name="classes_required<?=$x?>" value="<?=$v['classes_required']?>"</td>
            <td style="text-align: center;"><label for="quantity<?=$x?>"></label><input type="text" size="3" id="quantity<?=$x?>" name="quantity<?=$x?>" value="<?=$v['quantity']?>"</td>

             <td style="text-align: center;"><label for="min_expansion<?=$x?>"></label><input type="text" size="3" id="min_expansion<?=$x?>" name="min_expansion<?=$x?>" value="<?=$v['min_expansion']?>"</td>
            <td style="text-align: center;"><label for="max_expansion<?=$x?>"></label><input type="text" size="3" id="max_expansion<?=$x?>" name="max_expansion<?=$x?>" value="<?=$v['max_expansion']?>"</td>

             <td style="text-align: center;"><label for="content_flags<?=$x?>"></label><input type="text" size="7" id="content_flags<?=$x?>" name="content_flags<?=$x?>" value="<?=$v['content_flags']?>"</td>
            <td style="text-align: center;"><label for="content_flags_disabled<?=$x?>"></label><input type="text" size="7" id="content_flags_disabled<?=$x?>" name="content_flags_disabled<?=$x?>" value="<?=$v['content_flags_disabled']?>"</td>

			</tr>
                <input type="hidden" name="slot<?=$x?>" value="<?=$slot?>">
                <?php $x++; endforeach?>
        </table><br/><br/>
        <div class="center">
          <input type="hidden" name="mid" value="<?=$id?>">
          <input type="hidden" name="count" value="<?=($x - 1)?>">
         <input type="submit" name="submit" value="Update Item">&nbsp;&nbsp;
            <input type="button" value="Cancel" onClick="history.back();">
        </div>
      </form>
    </div>
  </div>
