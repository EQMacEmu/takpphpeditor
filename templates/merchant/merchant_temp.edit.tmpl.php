  <div class="edit_form" style="width: 600px">
    <div class="edit_form_header">
      Edit Temp Merchant List for NPC: <?=$npcid?>
    </div>
    <div class="edit_form_content">
      <form name="merchantlist" method="post" action="index.php?editor=merchant&z=<?=$currzone ?? ""?>&zoneid=<?=$currzoneid ?? ""?>&npcid=<?=$npcid?>&action=10">
        <table style="width: 100%;">
          <tr>
            <th>Old<br/>Slot</th>
            <th>New<br/>Slot</th>
            <th>Item ID</th>
            <th>Item Name</th>
            <th>Charges</th>
            <th>Quantity</th>
          </tr>
            <?php $x=1; foreach ($slots as $slot => $v):?>
          <tr>
            <td style="text-align: center;"><?=$slot?></td>
            <td style="text-align: center;"><label for="newslot<?=$x?>"></label><input type="text" size="3" id="newslot<?=$x?>" name="newslot<?=$x?>" value="<?=$slot?>"/></td>
            <td style="text-align: center;"><label for="itemid<?=$x?>"></label><input type="text" size="7" id="itemid<?=$x?>" name="itemid<?=$x?>" value="<?=$v['itemid']?>"/></td>
            <td><?=$v['item_name']?></td>
            <td style="text-align: center;"><label for="charges<?=$x?>"></label><input type="text" size="3" id="charges<?=$x?>" name="charges<?=$x?>" value="<?=$v['charges']?>"/></td>
            <td style="text-align: center;"><label for="quantity<?=$x?>"></label><input type="text" size="3" id="quantity<?=$x?>" name="quantity<?=$x?>" value="<?=$v['quantity']?>"/></td>
          </tr>
                <input type="hidden" name="slot<?=$x?>" value="<?=$slot?>">
                <?php $x++; endforeach?>
        </table><br/><br/>
        <div class="center">
          <input type="hidden" name="count" value="<?=($x - 1)?>">
          <input type="submit" value="Submit Changes">
        </div>
      </form>
    </div>
  </div>
