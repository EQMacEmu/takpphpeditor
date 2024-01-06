    <div class="table_container" style="width: 700px;">
      <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
          <tr>
            <td style="padding: 0; text-align: left; width: 33%;">Players</td>
              <?php
                  $filter = $filter ?? array();
                  $filter['status'] = $filter['status'] ?? "off";
              ?>
                <td style="padding: 0; text-align: center; width: 33%">
                <?php echo ($page > 1) ? "<a href='index.php?editor=player&page=1" . (($sort != "") ? "&sort=" . $sort : "") . (($filter['status'] == "on") ? $filter['url'] : "") . "'><img src='images/first.gif' style='border: 0;' width='12' height='12' alt='First' title='First'/></a>" : "<img src='images/first.gif' alt='First' style='border: 0;' width='12' height='12'/>";?>
                <?php echo ($page > 1) ? "<a href='index.php?editor=player&page=" . ($page - 1) . (($sort != "") ? "&sort=" . $sort : "") . (($filter['status'] == "on") ? $filter['url'] : "") . "'><img src='images/prev.gif' style='border: 0;' width='12' height='12' alt='Previous' title='Previous'/></a>" : "<img src='images/prev.gif' alt='Previous' style='border: 0;' width='12' height='12'/>";?>
                <?php echo $page . " of " . $pages;?>
                <?php echo ($page < $pages) ? "<a href='index.php?editor=player&page=" . ($page + 1) . (($sort != "") ? "&sort=" . $sort : "") . (($filter['status'] == "on") ? $filter['url'] : "") . "'><img src='images/next.gif' style='border: 0;' width='12' height='12' alt='Next' title='Next'/></a>" : "<img src='images/next.gif' alt='Next' style='border: 0;' width='12' height='12'/>";?>
                <?php echo ($page < $pages) ? "<a href='index.php?editor=player&page=" . $pages . (($sort != "") ? "&sort=" . $sort : "") . (($filter['status'] == "on") ? $filter['url'] : "") . "'><img src='images/last.gif' style='border: 0;' width='12' height='12' alt='Last' title='Last'/></a>" : "<img src='images/last.gif' alt='Last' style='border: 0;' width='12' height='12'/>";?>
            </td>
            <td style="padding: 0; text-align: right; width: 33%;">
              &nbsp;
            </td>
          </tr>
        </table>
      </div>
      <table class="table_content2" style="width: 100%;">
          <?php if (isset($players)):?>
        <tr>
          <td style="text-align: center;"><strong><?php echo ($sort == 1) ? "ID <img src='images/sort_red.bmp' style='border: 0;' alt='Sort Red' width='8' height='8'/>" : "<a href='index.php?editor=player&sort=1" . (($filter['status'] == "on") ? $filter['url'] : "") . "'>ID <img src='images/sort_green.bmp' style='border: 0;' width='8' height='8' alt='Sort Green' title='Sort by ID'/></a>";?></strong></td>
          <td style="text-align: center;"><strong><?php echo ($sort == 2) ? "Name <img src='images/sort_red.bmp' style='border: 0;' alt='Sort Red' width='8' height='8'/>" : "<a href='index.php?editor=player&sort=2" . (($filter['status'] == "on") ? $filter['url'] : "") . "'>Name <img src='images/sort_green.bmp' style='border: 0;' width='8' height='8' alt='Sort Green' title='Sort by Name'/></a>";?></strong></td>
          <td style="text-align: center;"><strong><?php echo ($sort == 3) ? "Account <img src='images/sort_red.bmp' style='border: 0;' alt='Sort Red' width='8' height='8'/>" : "<a href='index.php?editor=player&sort=3" . (($filter['status'] == "on") ? $filter['url'] : "") . "'>Account <img src='images/sort_green.bmp' style='border: 0;' width='8' height='8' alt='Sort Green' title='Sort by Account'/></a>";?></strong></td>
          <td style="text-align: center;"><strong><?php echo ($sort == 4) ? "Class <img src='images/sort_red.bmp' style='border: 0;' alt='Sort Red' width='8' height='8'/>" : "<a href='index.php?editor=player&sort=4" . (($filter['status'] == "on") ? $filter['url'] : "") . "'>Class <img src='images/sort_green.bmp' style='border: 0;' width='8' height='8' alt='Sort Green' title='Sort by Class'/></a>";?></strong></td>
          <td style="text-align: center;"><strong><?php echo ($sort == 5) ? "Level <img src='images/sort_red.bmp' style='border: 0;' alt='Sort Red' width='8' height='8'/>" : "<a href='index.php?editor=player&sort=5" . (($filter['status'] == "on") ? $filter['url'] : "") . "'>Level <img src='images/sort_green.bmp' style='border: 0;' width='8' height='8' alt='Sort Green' title='Sort by Level'/></a>";?></strong></td>
          <td style="width: 5%">&nbsp;</td>
        </tr>
              <?php $x=0;
foreach($players as $player):?>
        <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA";?>">
          <td style="text-align: center;"><?=$player['id']?></td>
          <td style="text-align: center;"><a href="index.php?editor=player&playerid=<?php echo getPlayerID($player['name'])?>"><?=$player['name']?></a></td>
          <td style="text-align: center;"><a href="index.php?editor=account&acctid=<?=$player['account_id']?>"><?php echo getAccountName($player['account_id'])?></a></td>
          <td style="text-align: center;"><?=$classes[$player['class']]?></td>
          <td style="text-align: center;"><?=$player['level']?></td>
          <td style="right"><a href="index.php?editor=player&playerid=<?=$player['id']?>"><img src="images/view_all.gif" width="13" height="13" style="border: 0;" alt="View All" title="View Player"></a></td>
        </tr>
    <?php $x++;
endforeach;
else:?>
        <tr>
          <td style="text-align: left; width: 100%; padding: 10px;">No Players</td>
        </tr>
<?php endif;?>
      </table>
    </div>
