<div class="edit_form" id="filter_box"
     style="width: 700px; display: <?php echo (isset($filter['status']) && $filter['status'] == 'on') ? 'block' : 'none;' ?>">
    <div class="edit_form_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0; text-align: left;">Filters</td>
                <td style="padding: 0; text-align: right;"><a
                            onClick="document.getElementById('filter_box').style.display='none';document.getElementById('filter_image').style.display='inline';"><img
                                src="images/downgrade.gif" alt="Hide Filter Icon" title="Hide filter"
                                style="border: 0;"></a></td>
            </tr>
        </table>
    </div>
    <div class="edit_form_content">
        <form name="filter" id="filter" method="get" action="index.php">
            <input type="hidden" name="editor" value="server"/>
            <input type="hidden" name="action" value="6"/>
            <?php echo(($sort != '') ? '<input type="hidden" name="sort" value="' . $sort . '"/>' : '') ?>
            <input type="hidden" name="filter" id="filter_status" value="on"/>
            <table class="table_content" style="width: 100%;">
                <tr>
                    <td style="width: 25%;">
                        <label for="filter1">Account:</label><br/>
                        <input type="text" name="filter1" id="filter1" size="15"
                               value="<?= $filter['filter1'] ?? "" ?>"/>
                    </td>
                    <td style="width: 25%;">
                        <label for="filter2">Name:</label><br/>
                        <input type="text" name="filter2" id="filter2" size="15"
                               value="<?= $filter['filter2'] ?? "" ?>"/>
                    </td>
                    <td style="width: 25%;">
                        <label for="filter3">Zone:</label><br/>
                        <input type="text" name="filter3" id="filter3" value="<?= $filter['filter3'] ?? "" ?>"/>
                    </td>
                    <td style="width: 25%;">
                        <label for="filter4">Hack:</label><br/>
                        <input type="text" name="filter4" id="filter4" value="<?= $filter['filter4'] ?? "" ?>"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: center;"><br/><input type="submit" value="Apply Filters"/>&nbsp;&nbsp;&nbsp;&nbsp;<input
                                type="submit" value="Remove Filters"
                                onClick="document.getElementById('filter1').value='';document.getElementById('filter2').value='';document.getElementById('filter3').value='';document.getElementById('filter4').value='';document.getElementById('filter_status').value='';"/>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div><br/>
<form name="deleteHacks" id="deleteHacks" method="post" action="index.php?editor=server&action=49">
    <div id="action_buttons_top" style="display:none;">
        <div class="center"><input onClick="return confirm('Really delete these entries?');" type="submit"
                                   value="Delete Marked">&nbsp;<input
                    type="button" value="Cancel" onClick="location.reload();"></div>
        <br/>
    </div>
    <div class="table_container" style="width: 750px;">
        <div class="table_header">
            <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
                <tr>
                    <td style="padding: 0; text-align: left; width: 33%;">Hackers</td>
                    <td style="padding: 0; text-align: center; width: 33%">
                        <?php echo ($page > 1) ? "<a href='index.php?editor=server&action=6&page=1" . (($sort != "") ? "&sort=" . $sort : "") . (($filter['status'] == "on") ? $filter['url'] : "") . "'><img src='images/first.gif' style='border: 0;' width='12' height='12' alt='First Icon' title='First'/></a>" : "<img src='images/first.gif' alt='First Icon' style='border: 0;' width='12' height='12'/>"; ?>
                        <?php echo ($page > 1) ? "<a href='index.php?editor=server&action=6&page=" . ($page - 1) . (($sort != "") ? "&sort=" . $sort : "") . (($filter['status'] == "on") ? $filter['url'] : "") . "'><img src='images/prev.gif' style='border: 0;' width='12' height='12' alt='Previous Icon' title='Previous'/></a>" : "<img src='images/prev.gif' alt='Previous Icon' style='border: 0;' width='12' height='12'/>"; ?>
                        <?php echo $page . " of " . $pages; ?>
                        <?php echo ($page < $pages) ? "<a href='index.php?editor=server&action=6&page=" . ($page + 1) . (($sort != "") ? "&sort=" . $sort : "") . (($filter['status'] == "on") ? $filter['url'] : "") . "'><img src='images/next.gif' style='border: 0;' width='12' height='12' alt='Next Icon' title='Next'/></a>" : "<img src='images/next.gif' alt='Next Icon' style='border: 0;' width='12' height='12'/>"; ?>
                        <?php echo ($page < $pages) ? "<a href='index.php?editor=server&action=6&page=" . $pages . (($sort != "") ? "&sort=" . $sort : "") . (($filter['status'] == "on") ? $filter['url'] : "") . "'><img src='images/last.gif' style='border: 0;' width='12' height='12' alt='Last Icon' title='Last'/></a>" : "<img src='images/last.gif' alt='Last Icon' style='border: 0;' width='12' height='12'/>"; ?>
                    </td>
                    <td style="padding: 0; text-align: right; width: 33%;">
                        <a onClick="document.getElementById('filter_box').style.display='block';document.getElementById('filter_image').style.display='none';"><img
                                    id="filter_image" src="images/filter.jpg" style="border: 0;" height="13" width="13"
                                    alt="Filter Icon"
                                    title="Show filter"<?php echo (isset($filter['status']) && $filter['status'] == 'on') ? ' style="display:none;"' : ''; ?>></a>&nbsp;<a
                                onClick="toggleMultiDelete();"><img id="multiD" src="images/remove3.gif"
                                                                    style="border: 0;"
                                                                    height="13" width="13" alt="Delete Multiple Icon"
                                                                    title="Delete multiple"></a><a id="select_all"
                                                                                                   onClick="toggleSelectAll();"
                                                                                                   style="display:none;">Select
                            All</a>
                    </td>
                </tr>
            </table>
        </div>
        <table class="table_content2" style="width: 100%;">
            <?php if (isset($hackers)) : ?>
                <tr>
                    <?php $filter['status'] = $filter['status'] ?? "off"; ?>
                    <td style="text-align: center;">
                        <strong><?php echo ($sort == 1) ? "ID <img src='images/sort_red.bmp' alt='Red Sort Icon' style='border: 0;' width='8' height='8'/>" : "<a href='index.php?editor=server&action=6&sort=1" . (($filter['status'] == 'on') ? $filter['url'] : '') . "'>ID <img src='images/sort_green.bmp' style='border: 0;' width='8' height='8' alt='Green Sort Icon' title='Sort by ID'/></a>"; ?></strong>
                    </td>
                    <td style="text-align: center;">
                        <strong><?php echo ($sort == 2) ? "Account <img src='images/sort_red.bmp' alt='Red Sort Icon' style='border: 0;' width='8' height='8'/>" : "<a href='index.php?editor=server&action=6&sort=2" . (($filter['status'] == 'on') ? $filter['url'] : '') . "'>Account <img src='images/sort_green.bmp' style='border: 0;' width='8' height='8' alt='Green Sort Icon' title='Sort by Account'/></a>"; ?></strong>
                    </td>
                    <td style="text-align: center;">
                        <strong><?php echo ($sort == 3) ? "Name <img src='images/sort_red.bmp' alt='Red Sort Icon' style='border: 0;' width='8' height='8'/>" : "<a href='index.php?editor=server&action=6&sort=3" . (($filter['status'] == 'on') ? $filter['url'] : '') . "'>Name <img src='images/sort_green.bmp' style='border: 0;' width='8' height='8' alt='Green Sort Icon' title='Sort by Name'/></a>"; ?></strong>
                    </td>
                    <td style="text-align: center;">
                        <strong><?php echo ($sort == 4) ? "Zone <img src='images/sort_red.bmp' alt='Red Sort Icon' style='border: 0;' width='8' height='8'/>" : "<a href='index.php?editor=server&action=6&sort=4" . (($filter['status'] == 'on') ? $filter['url'] : '') . "'>Zone <img src='images/sort_green.bmp' style='border: 0;' width='8' height='8' alt='Green Sort Icon' title='Sort by Zone'/></a>"; ?></strong>
                    </td>
                    <td style="text-align: center;">
                        <strong><?php echo ($sort == 5) ? "Date <img src='images/sort_red.bmp' alt='Red Sort Icon' style='border: 0;' width='8' height='8'/>" : "<a href='index.php?editor=server&action=6&sort=5" . (($filter['status'] == 'on') ? $filter['url'] : '') . "'>Date <img src='images/sort_green.bmp' style='border: 0;' width='8' height='8' alt='Green Sort Icon' title='Sort by Date'/></a>"; ?></strong>
                    </td>
                    <td style="text-align: center;">
                        <strong><?php echo ($sort == 6) ? "Hack <img src='images/sort_red.bmp' alt='Red Sort Icon' style='border: 0;' width='8' height='8'/>" : "<a href='index.php?editor=server&action=6&sort=6" . (($filter['status'] == 'on') ? $filter['url'] : '') . "'>Hack <img src='images/sort_green.bmp' style='border: 0;' width='8' height='8' alt='Green Sort Icon' title='Sort by Hack'/></a>"; ?></strong>
                    </td>
                    <td style="width: 10%;">&nbsp;</td>
                </tr>
                <?php $x = 0;
                foreach ($hackers as $key => $v): ?>
                    <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA"; ?>">
                        <td style="text-align: center; width: 5%"><?= $v['hid'] ?></td>
                        <td style="text-align: center; width: 10%"><a
                                    href="index.php?editor=account&acctid=<?php echo getAccountID($v['account']) ?>"><?= $v['account'] ?></a>
                        </td>
                        <td style="text-align: center; width: 15%"><a
                                    href="index.php?editor=player&playerid=<?php echo getPlayerID($v['name']) ?>"><?= $v['name'] ?></a>
                        </td>
                        <td style="text-align: center; width: 15%"><?php echo ($v['zone']) ?? "N/A"; ?></td>
                        <td style="text-align: center; width: 20%"><?= $v['date'] ?></td>
                        <td style="text-align: center; width: 25%"><?= substr($v['hacked'], 0, 23) ?></td>
                        <td style="text-align: right;">
                            <a href="index.php?editor=server&hid=<?= $v['hid'] ?>&action=8">
                                <img src="images/edit2.gif" style="border: 0;" alt="View Icon" title="View Hacker">
                            </a>&nbsp
                            <a onClick="return confirm('Really Delete Entry <?= $v['hid'] ?>?');"
                               href="index.php?editor=server&hid=<?= $v['hid'] ?>&action=7">
                                <img id="delete_entry" src="images/remove3.gif" style="border: 0;"
                                     alt="Delete Entry Icon"
                                     title="Delete this entry">
                            </a><label for="cb_delete[]"></label><input id="cb_delete[]" name="cb_delete[]"
                                                                        type="checkbox"
                                                                        value="<?= $v['hid'] ?>"
                                                                        style="display:none;">
                        </td>
                    </tr>
                    <?php $x++; endforeach; ?>
            <?php endif; ?>
            <?php if (!isset($hackers)): ?>
                <tr>
                    <td style="text-align: left; width: 100px; padding: 10px;">No hackers</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
    <div id="action_buttons_bottom" style="display:none;">
        <br/>
        <div class="center"><input onClick="return confirm('Really delete these entries?');" type="submit"
                                   value="Delete Marked">&nbsp;<input type="button" value="Cancel"
                                                                      onClick="location.reload();"></div>
    </div>
</form>
