        <div class="table_container" style="width: 700px;">
          <div class="table_header">
            <table width="100%" cellpadding="0" cellspacing="0">
              <tr>
                <td>Keyring Data</td>
		            <td align="right"><a href="index.php?editor=server&action=58"><img src="images/add.gif" border="0" title="Add a Key"></a></td>
              </tr>
            </table>
          </div>
          <table class="table_content2" width="100%">
<?if (isset($keyring)) :?>
            <tr>
              <th align="center"><strong>KeyItem</strong></th>
              <th>&nbsp;</th>
              <th align="center"><strong>Name</strong></th>
              <th align="center"><strong>Zoneid</strong></th>
              <th align="center"><strong>Stage</strong></th>
              <th>&nbsp;</th>
            </tr>
<?$x=0; foreach($keyring as $keyring=>$v):?>
            <tr bgcolor="#<? echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA";?>">
              <td align="center"><a href="index.php?editor=items&z=<?=$currzone?>&zoneid=<?=$currzoneid?>&npcid=<?=$npcid?>&id=<?=$v['key_item']?>&action=2"><?=$v['key_item']?></a></td>
              <td><a href="http://lucy.allakhazam.com/item.html?id=<?=$v['key_item']?>">Lucy</a></td>
              <td align="center"><?=$v['key_name']?></td>  
              <td align="center"><?=getZoneName($v['zoneid'])?></td>  
              <td align="center"><?=$v['stage']?></td>  
              <td align="right"><a href="index.php?editor=server&key_item=<?=$v['key_item']?>&action=60"><img src="images/edit2.gif" border="0" title="Edit Key"></a>&nbsp;
              <a onClick="return confirm('Really Delete Entry <?=$v['key_item']?>?');" href="index.php?editor=server&key_item=<?=$v['key_item']?>&action=62"><img src="images/remove3.gif" border="0" title="Delete this entry"></a></td>
            </tr>
<?$x++; endforeach;?>
<?endif;?>
<?if (!isset($keyring)):?>
            <tr>
              <td align="left" width="100" style="padding: 10px;">No Keyring Data</td>
            </tr>
<?endif;?>
          </table>
        </div>
