  <div class="table_container" style="width: 500px;">
    <div class="table_header">
      <table style="border-collapse: collapse; border-spacing: 0; width:100%;">
        <tr>
          <td style="text-align: left; width: 33%; padding: 0;">Accounts</td>
          <td style="text-align: center; width: 33%; padding: 0;">
              <?php
              $page = $page ?? 1;
              if ($page > 1) {
                  echo "<a href='index.php?editor=account&page=1" . ((!empty($sort)) ? "&sort=" . $sort : "") . ((isset($filter) && $filter['status'] == "on") ? $filter['url'] : "") . "'><img src='images/first.gif' style='border: 0;' width='12' height='12' alt='First Page Arrow' title='First'/></a>";
              }
              else {
                  echo "<img src='images/first.gif' style='border: 0;' width='12' height='12' alt='First Page Arrow'/>";
              }?>
              <?php echo (isset($page) && ($page > 1)) ? "<a href='index.php?editor=account&page=" . ($page - 1) . ((isset($sort) && $sort != "") ? "&sort=" . $sort : "") . ((isset($filter) && $filter['status'] == "on") ? $filter['url'] : "") . "'><img src='images/prev.gif' style='border: 0;' width='12' height='12' alt='Previous Page Arrow' title='Previous'/></a>" : "<img src='images/prev.gif' style='border: 0;' width='12' height='12' alt='Previous Page Arrow'/>";?>
              <?php echo ($page ?? "") . " of " . ($pages ?? "");?>
              <?php $page = $page ?? 1; $pages = $pages ?? 1; echo ($page < $pages) ? "<a href='index.php?editor=account&page=" . ($page + 1) . ((isset($sort) && $sort != "") ? "&sort=" . $sort : "") . ((isset($filter) && $filter['status'] == "on") ? $filter['url'] : "") . "'><img src='images/next.gif' style='border: 0;' width='12' height='12' alt='Next Page Arrow' title='Next'/></a>" : "<img src='images/next.gif' style='border: 0;' width='12' height='12' alt='Next Page Arrow'/>";?>
              <?php echo (($page ?? "") < ($pages ?? "")) ? "<a href='index.php?editor=account&page=" . $pages . ((isset($sort) && $sort != "") ? "&sort=" . $sort : "") . ((isset($filter) && $filter['status'] == "on") ? $filter['url'] : "") . "'><img src='images/last.gif' style='border: 0;' width='12' height='12' alt='Last Page Arrow' title='Last'/></a>" : "<img src='images/last.gif' style='border: 0;' width='12' height='12' alt='Last Page Arrow'/>";?>
          </td>
          <td style="text-align: right; width: 33%; padding: 0;">&nbsp;</td>
        </tr>
      </table>
    </div>
    <table class="table_content2" style="width: 100%;">
        <?php if (isset($accounts)):?>
      <tr>
        <td style="text-align: center;"><strong><?php echo (isset($sort) && $sort == 1) ? "ID <img src='images/sort_red.bmp' alt='Red Sorting Arrow' style='border: 0;' width='8' height='8'/>" : "<a href='index.php?editor=account&sort=1" . ((isset($filter) && $filter['status'] == "on") ? $filter['url'] : "") . "'>ID <img src='images/sort_green.bmp' style='border: 0;' width='8' height='8' alt='Green Sorting Arrow' title='Sort by ID'/></a>";?></strong></td>
        <td style="text-align: center;"><strong><?php echo (isset($sort) && $sort == 2) ? "LS ID <img src='images/sort_red.bmp' alt='Red Sorting Arrow' style='border: 0;' width='8' height='8'/>" : "<a href='index.php?editor=account&sort=2" . ((isset($filter) && $filter['status'] == "on") ? $filter['url'] : "") . "'>LS ID <img src='images/sort_green.bmp' style='border: 0;' width='8' height='8' alt='Green Sorting Arrow' title='Sort by LS ID'/></a>";?></strong></td>
        <td style="text-align: center;"><strong><?php echo (isset($sort) && $sort == 3) ? "LS Name <img src='images/sort_red.bmp' alt='Red Sorting Arrow' style='border: 0;' width='8' height='8'/>" : "<a href='index.php?editor=account&sort=3" . ((isset($filter) && $filter['status'] == "on") ? $filter['url'] : "") . "'>LS Name <img src='images/sort_green.bmp' style='border: 0;' width='8' height='8' alt='Green Sorting Arrow' title='Sort by LS Name'/></a>";?></strong></td>
        <td style="text-align: center;"><strong><?php echo (isset($sort) && $sort == 4) ? "Status <img src='images/sort_red.bmp' alt='Red Sorting Arrow' style='border: 0;' width='8' height='8'/>" : "<a href='index.php?editor=account&sort=4" . ((isset($filter) && $filter['status'] == "on") ? $filter['url'] : "") . "'>Status <img src='images/sort_green.bmp' style='border: 0;' width='8' height='8' alt='Green Sorting Arrow' title='Sort by Status'/></a>";?></strong></td>
        <td style="width: 5%">&nbsp;</td>
      </tr>
            <?php
    $x=0;
    foreach($accounts as $account):?>
      <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA";?>">
        <td style="text-align: center;"><?=$account['id']?></td>
        <td style="text-align: center;"><?=$account['lsaccount_id']?></td>
        <td style="text-align: center;"><a href="index.php?editor=account&acctid=<?=$account['id']?>"><?=$account['name']?></a></td>
        <td style="text-align: center;"><?=$account['status']?></td>
        <td style="text-align: right;"><a href="index.php?editor=account&acctid=<?=$account['id']?>"><img src="images/edit2.gif" width="13" height="13" style="border: 0;" alt="Table Icon" title="View Account"></a></td>
      </tr>
        <?php
      $x++;
    endforeach;
  else:
?>
      <tr>
        <td style="text-align: left; width: 100px; padding: 10px;">No Accounts</td>
      </tr>
  <?php endif;?>
    </table>
  </div>
