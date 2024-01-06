  <div class="table_container" style="width: 500px;">
    <div class="table_header">
      <div style="float:right;">
        <a href="index.php?editor=merchant&z=<?=$currzone ?? ""?>&zoneid=<?=$currzoneid ?? ""?>&npcid=<?=$npcid?>">Standard List</a>&nbsp;
        <a href="index.php?editor=merchant&z=<?=$currzone ?? ""?>&zoneid=<?=$currzoneid ?? ""?>&npcid=<?=$npcid?>&action=12"><img src="images/add.gif" style="border: 0;" alt="Yellow Plus Icon" title="Add an Item"></a>&nbsp;
        <div style="display:<?php echo (isset($slots)) ? "inline" : "none";?>">
          <a href="index.php?editor=merchant&z=<?=$currzone ?? ""?>&zoneid=<?=$currzoneid ?? ""?>&npcid=<?=$npcid?>&action=9"><img src="images/c_table.gif" style="border: 0;" alt="Edit Table Icon" title="Edit this Merchant"></a>&nbsp;
        </div>
        <a href="index.php?editor=merchant&z=<?=$currzone ?? ""?>&zoneid=<?=$currzoneid ?? ""?>&npcid=<?=$npcid?>&action=14" onClick="return confirm('Really delete this merchantlist?');"><img src="images/table.gif" style="border: 0;" alt="Red X'd Table Icon" title="Delete this Merchantlist"></a>
      </div>
      Temp Merchant list for NPC <?=$npcid?>
    </div>
    <div class="table_content" style="padding: 0;">
        <?php if (isset($slots)):?>
      <table style="width: 100%;">
        <tr style="background-color: #BBBBBB;">
          <th style="text-align: center;">Slot</th>
          <th style="text-align: center;">Item ID</th>
          <th>Item Name</th>
          <th>&nbsp;</th>
          <th>Charges</th>
          <th>Quantity</th>
          <th>Buy Price</th>
          <th>Sell Price</th>
          <th>&nbsp;</th>
        </tr>
          <?php
$x=0;
foreach($slots as $slot=>$v):
  if ($v['price'] > 999) {
    $cost = $v['price']/1000;
  }
  if ($v['price']*$v['sellrate'] > 999) {
    $sells = ($v['price']*$v['sellrate'])/1000;
  }
  if ($v['price'] < 999 && $v['price'] > 99) {
    $cost = $v['price']/100;
  }
  if ($v['price']*$v['sellrate'] < 999 && $v['price']*$v['sellrate'] > 99) {
    $sells = ($v['price']*$v['sellrate'])/100;
  }
  if ($v['price'] < 99 && $v['price'] > 9) {
    $cost = $v['price']/10;
  }
  if ($v['price']*$v['sellrate'] < 99 && $v['price']*$v['sellrate'] > 9) {
    $sells = ($v['price']*$v['sellrate'])/10;
  }
  if ($v['price'] < 10) {
    $cost = $v['price'];
  }
  if ($v['price']*$v['sellrate'] < 10) {
    $sells = ($v['price']*$v['sellrate']);
  }
?>
        <tr<?php echo ($x % 2 == 1) ? " bgcolor=\"#BBBBBB\"" : "";?>>
          <td style="text-align: center;"><?=$slot?></td>
          <td style="text-align: center;"><?=$v['itemid']?></td>
          <td><?=$v['item_name']?></td>
          <td><a href="https://lucy.allakhazam.com/item.html?id=<?=$v['itemid']?>">Lucy</a></td>
          <td style="text-align: center;"><?=$v['charges']?></td>
          <td style="text-align: center;"><?=$v['quantity']?></td>
          <td style="text-align: center;"><?=$cost?>
              <?php if ($v['price'] > 999):?>
            pp
              <?php endif;?>
              <?php if ($v['price'] < 999 && $v['price'] > 99):?>
            gp
              <?php endif;?>
              <?php if ($v['price'] < 99 && $v['price'] > 9):?>
            sp
              <?php endif;?>
              <?php if ($v['price'] < 10):?>
            cp
              <?php endif;?>
          </td>
          <td style="text-align: center;"><?=$sells?>
              <?php if ($v['price']*$v['sellrate'] > 999):?>
            pp
              <?php endif;?>
              <?php if ($v['price']*$v['sellrate'] < 999 && $v['price']*$v['sellrate'] > 99):?>
            gp
              <?php endif;?>
              <?php if ($v['price']*$v['sellrate'] < 99 && $v['price']*$v['sellrate'] > 9):?>
            sp
              <?php endif;?>
              <?php if ($v['price']*$v['sellrate'] < 10):?>
            cp
              <?php endif;?>
          </td>
          <td style="padding-right: 10px; text-align: right;">
            <a href="index.php?editor=merchant&z=<?=$currzone ?? ""?>&zoneid=<?=$currzoneid ?? ""?>&npcid=<?=$npcid?>&slot=<?=$slot?>&itemid=<?=$v['itemid']?>&action=11" onClick="return confirm('Really remove this item from the merchant?');"><img src="images/remove.gif" style="border: 0;" alt="Red X Icon" title="Delete item from Merchantlist"></a>
          </td>
        </tr>
    <?php $x++;endforeach;?>
      </table>
        <?php endif;?>
        <?php if (!isset($slots)):?>
      No Wares currently assigned
        <?php endif;?>
    </div>
  </div>
