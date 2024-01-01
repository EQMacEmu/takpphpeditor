    <div class="edit_form" id="filter_box" style="width: 350px; display: <?php echo (!empty($filter) && $filter['status'] == 'on') ? 'block' : 'none'?>">
      <div class="edit_form_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
          <tr>
            <td style="padding: 0; text-align: left;">Filters</td>
            <td style="padding: 0; text-align: right;"><a onClick="document.getElementById('filter_box').style.display='none';"><img src="images/downgrade.gif" alt="Downgrade" title="Hide filter" style="border: 0;"></a></td>
          </tr>
        </table>
      </div>
      <div class="edit_form_content">
        <form name="filter" id="filter" method="get" action="index.php">
          <input type="hidden" name="editor" value="faction"/>
          <input type="hidden" name="action" value="9"/>
            <?php echo (!empty($sort) ? '<input type="hidden" name="sort" value="' . $sort . '"/>' : '')?>
          <input type="hidden" name="filter" id="filter_status" value="on"/>
          <table class="table_content" style="width: 100%;">
            <tr>
              <td style="width: 50%;">
                  <label for="filter1">Character Name:</label><br/>
                  <input type="text" name="filter1" id="filter1" value="<?=$filter['filter1'] ?? ""?>"/>
              </td>
              <td style="width: 50%;">
                  <label for="filter2">Faction ID:</label><br/>
                  <input type="text" name="filter2" id="filter2" value="<?=$filter['filter2'] ?? ""?>"/>
              </td>
            </tr>
            <tr>
              <td colspan="2" style="text-align: center;"><br/><input type="submit" value="Apply Filters"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Remove Filters" onClick="document.getElementById('filter1').value='';document.getElementById('filter2').value='';document.getElementById('filter_status').value='';"/></td>
            </tr>
          </table>
        </form>
      </div>
    </div><br/>
        <div class="table_container" style="width: 500px;">
          <div class="table_header">
            <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
              <tr>
                <td style="padding: 0; text-align: left; width: 33%">Player Faction Entries</td>
                <td style="padding: 0; text-align: center; width: 33%;">
                    <?php global $page; echo ($page > 1) ? "<a href='index.php?editor=faction&action=9&page=1" . ((!empty($sort)) ? "&sort=" . $sort : "") . ((!empty($filter) && $filter['status'] == "on") ? $filter['url'] : "") . "'><img src='images/first.gif' style='border: 0;' width='12' height='12' alt='Double Left Yellow Arrows' title='First'/></a>" : "<img src='images/first.gif' alt='Double Left Yellow Arrows' style='border: 0;' width='12' height='12'/>";?>
                    <?php echo ($page > 1) ? "<a href='index.php?editor=faction&action=9&page=" . ($page - 1) . ((!empty($sort)) ? "&sort=" . $sort : "") . ((!empty($filter) && $filter['status'] == "on") ? $filter['url'] : "") . "'><img src='images/prev.gif' style='border: 0;' width='12' height='12' alt='Red Left Arrow' title='Previous'/></a>" : "<img src='images/prev.gif' alt='Red Left Arrow' style='border: 0;' width='12' height='12'/>";?>
                    <?php global $pages; echo $page . " of " . $pages;?>
                    <?php echo ($page < $pages) ? "<a href='index.php?editor=faction&action=9&page=" . ($page + 1) . ((!empty($sort)) ? "&sort=" . $sort : "") . ((!empty($filter) && $filter['status'] == "on") ? $filter['url'] : "") . "'><img src='images/next.gif' style='border: 0;' width='12' height='12' alt='Red Right Arrow' title='Next'/></a>" : "<img src='images/next.gif' alt='Red Right Arrow' style='border: 0;' width='12' height='12'/>";?>
                    <?php echo ($page < $pages) ? "<a href='index.php?editor=faction&action=9&page=" . $pages . ((!empty($sort)) ? "&sort=" . $sort : "") . ((!empty($filter) && $filter['status'] == "on") ? $filter['url'] : "") . "'><img src='images/last.gif' style='border: 0;' width='12' height='12' alt='Double Right Yellow Arrows' title='Last'/></a>" : "<img src='images/last.gif' alt='Double Right Yellow Arrows' style='border: 0;' width='12' height='12'/>";?>
                </td>
                <td style="padding: 0; text-align: right; width: 33%;"><a onClick="document.getElementById('filter_box').style.display='block';"><img src="images/filter.jpg" alt="Filter Icon" style="border: 0;" height="13" width="13" title="Show filter"></a>&nbsp;<a href="index.php?editor=faction&action=12"><img src="images/add.gif" style="border: 0;" alt="Yellow Plus Icon" title="Add a faction entry"></a></td>
              </tr>
            </table>
          </div>
          <table class="table_content2" style="width: 100%;">
              <?php if (isset($player_factions)):?>
            <tr>
              <td style="text-align: center; width: 20%;"><strong><?php echo (!empty($sort) && $sort == 1) ? "Character <img src='images/sort_red.bmp' alt='Red Sort Icon' style='border: 0;' width='8' height='8'/>" : "<a href='index.php?editor=faction&action=9&sort=1" . ((!empty($filter) && $filter['status'] == "on") ? $filter['url'] : "") . "'>Character <img src='images/sort_green.bmp' alt='Green Sort Icon' style='border: 0;' width='8' height='8' title='Sort by Character'/></a>";?></strong></td>
              <td style="text-align: center; width: 20%;"><strong><?php echo (!empty($sort) && $sort == 2) ? "Faction <img src='images/sort_red.bmp' alt='Red Sort Icon' style='border: 0;' width='8' height='8'/>" : "<a href='index.php?editor=faction&action=9&sort=2" . ((!empty($filter) && $filter['status'] == "on") ? $filter['url'] : "") . "'>Faction <img src='images/sort_green.bmp' alt='Green Sort Icon' style='border: 0;' width='8' height='8' title='Sort by Faction'/></a>";?></strong></td>
              <td style="text-align: center; width: 20%;"><strong>Value</strong></td>
              <td style="width: 10%;">&nbsp;</td>
            </tr>
                  <?php $x=0; foreach($player_factions as $player_faction):?>
            <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA";?>">
              <td style="text-align: center; width: 20%;"><a title="Character ID: <?=$player_faction['id']?>"><?=getPlayerName($player_faction['id']);?></a></td>
              <td style="text-align: center; width: 20%;"><a title="Faction: <?=getFactionName($player_faction['faction_id'])?>"><?=$player_faction['faction_id']?></a></td>
              <td style="text-align: center; width: 20%;"><?=$player_faction['current_value']?></td>
              <td style="text-align: right;"><a href="index.php?editor=faction&id=<?=$player_faction['id']?>&faction_id=<?=$player_faction['faction_id']?>&action=10"><img src="images/edit2.gif" style="border: 0;" alt="Edit Table Icon" title="Edit Faction Entry"></a>&nbsp;<a onClick="return confirm('Really Delete this Faction Entry?');" href="index.php?editor=faction&id=<?=$player_faction['id']?>&faction_id=<?=$player_faction['faction_id']?>&action=14"><img src="images/remove3.gif" style="border: 0;" alt="Red X Icon" title="Delete this faction entry"></a></td>
            </tr>
                      <?php $x++; endforeach;?>
              <?php endif;?>
              <?php if (!isset($player_factions)):?>
            <tr>
              <td style="text-align: left; width: 100%; padding: 10px;">No faction entries</td>
            </tr>
              <?php endif;?>
          </table>
        </div>
