    <div class="table_container" style="width: 450px;">
      <div class="table_header">
        <table width="100%" cellpadding="0" cellspacing="0">
          <tr>
           <td>Doors</td>
           <td align="right">
          <a href="index.php?editor=misc&z=<?=$currzone?>&zoneid=<?=$currzoneid?>&action=35"><img src="images/contents.png" border="0" title="View normal doors"></a>
          <a href="index.php?editor=misc&z=<?=$currzone?>&zoneid=<?=$currzoneid?>&action=47"><img src="images/last.gif" border="0" title="Copy doors by version"></a>
          <a href="index.php?editor=misc&z=<?=$currzone?>&zoneid=<?=$currzoneid?>&action=39"><img src="images/add.gif" border="0" title="Add an entry to this zone"></a>
          <a href="index.php?editor=misc&z=<?=$currzone?>&zoneid=<?=$currzoneid?>&action=55"><img src="images/remove3.gif" border="0" title="Delete doors by version"></a>
            </td>
           </tr>
         </table>
      </div>
      <table class="table_content2" width="100%">
<?if (isset($doors)):?>
        <tr>
          <td align="center" width="10%"><strong>ID</strong></td>
          <td align="center" width="7%"><strong>Door ID</strong></td>
          <td align="center" width="25%"><strong>Name</strong></td>
          <td align="center" width="15%"><strong>X</strong></td>
          <td align="center" width="15%"><strong>Y</strong></td>
          <td align="center" width="15%"><strong>Z</strong></td>
        </tr>
<?$x=0; foreach($doors as $door=>$v):?>
        <tr bgcolor="#<? echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA";?>">
          <td align="center" width="10%"><?=$v['drid']?></td>
          <td align="center" width="7%"><?=$v['doorid']?></td>
          <td align="center" width="25%"><?=$v['name']?></td>
          <td align="center" width="15%"><?=$v['pos_x']?></td>
          <td align="center" width="15%"><?=$v['pos_y']?></td>
          <td align="center" width="15%"><?=$v['pos_z']?></td>
          <td align="right">
            <a href="index.php?editor=misc&z=<?=$currzone?>&zoneid=<?=$currzoneid?>&drid=<?=$v['drid']?>&action=36"><img src="images/edit2.gif" border="0" title="Edit Entry"></a>
            <a onClick="return confirm('Really Delete Door <?=$v['drid']?>?');" href="index.php?editor=misc&z=<?=$currzone?>&zoneid=<?=$currzoneid?>&drid=<?=$v['drid']?>&action=38"><img src="images/remove3.gif" border="0" title="Delete this entry"></a>
          </td>
        </tr>
<?$x++; endforeach;?>
<?endif;?>
<?if (!isset($doors)):?>
        <tr>
          <td align="left" width="100" style="padding: 10px;">No doors</td>
        </tr>
<?endif;?>
      </table>
    </div>
