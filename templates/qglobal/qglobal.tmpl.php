<div class="edit_form" id="filter_box"
     style="width: 700px; display: <?php echo (isset($filter) && $filter['status'] == 'on') ? 'block' : 'none' ?>">
    <div class="edit_form_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0; text-align: left;">Filters</td>
                <td style="padding: 0;text-align: right;"><a
                            onClick="document.getElementById('filter_box').style.display='none';document.getElementById('filter_image').style.display='inline';"><img
                                src="images/downgrade.gif" alt="Downgrade" title="Hide filter" style="border: 0;"></a>
                </td>
            </tr>
        </table>
    </div>
    <div class="edit_form_content">
        <form name="filter" id="filter" method="get" action="index.php">
            <input type="hidden" name="editor" value="qglobal"/>
            <?php echo((!empty($sort)) ? '<input type="hidden" name="sort" value="' . $sort . '"/>' : '') ?>
            <input type="hidden" name="filter" id="filter_status" value="on"/>
            <table class="table_content" style="width: 100%;">
                <tr>
                    <td style="width: 25%;">
                        <label for="filter1">Name:</label><br/>
                        <input type="text" name="filter1" id="filter1" value="<?= $filter['filter1'] ?? "" ?>"/>
                    </td>
                    <td style="width: 25%;">
                        <label for="filter2">Character:</label><br/>
                        <input type="text" name="filter2" id="filter2" value="<?= $filter['filter2'] ?? "" ?>"/>
                    </td>
                    <td style="width: 25%;">
                        <label for="filter3">NPC:</label><br/>
                        <input type="text" name="filter3" id="filter3" value="<?= $filter['filter3'] ?? "" ?>"/>
                    </td>
                    <td style="width: 25%;">
                        <label for="filter4">Zone:</label><br/>
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
<div class="table_container" style="width: 700px;">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="text-align: left; width: 33%; padding: 0;">Quest Globals</td>
                <td style="text-align: center; width: 33%; padding: 0;">
                    <?php $pages = $pages ?? 1; $filter = $filter ?? array(); ?>
                    <?php echo ($page > 1) ? "<a href='index.php?editor=qglobal&page=1" . ((!empty($sort)) ? "&sort=" . $sort : "") . (($filter['status'] == "on") ? $filter['url'] : "") . "'><img src='images/first.gif' style='border: 0;' width='12' height='12' alt='First' title='First'/></a>" : "<img src='images/first.gif' alt='First' style='border: 0;' width='12' height='12'/>"; ?>
                    <?php echo ($page > 1) ? "<a href='index.php?editor=qglobal&page=" . ($page - 1) . ((!empty($sort)) ? "&sort=" . $sort : "") . (($filter['status'] == "on") ? $filter['url'] : "") . "'><img src='images/prev.gif' style='border: 0;' width='12' height='12' alt='Previous' title='Previous'/></a>" : "<img src='images/prev.gif' alt='Previous' style='border: 0;' width='12' height='12'/>"; ?>
                    <?php echo $page . " of " . $pages; ?>
                    <?php echo ($page < $pages) ? "<a href='index.php?editor=qglobal&page=" . ($page + 1) . ((!empty($sort)) ? "&sort=" . $sort : "") . (($filter['status'] == "on") ? $filter['url'] : "") . "'><img src='images/next.gif' style='border: 0;' width='12' height='12' alt='Next' title='Next'/></a>" : "<img src='images/next.gif' alt='Next' style='border: 0;' width='12' height='12'/>"; ?>
                    <?php echo ($page < $pages) ? "<a href='index.php?editor=qglobal&page=" . $pages . ((!empty($sort)) ? "&sort=" . $sort : "") . (($filter['status'] == "on") ? $filter['url'] : "") . "'><img src='images/last.gif' style='border: 0;' width='12' height='12' alt='Last' title='Last'/></a>" : "<img src='images/last.gif' alt='Last' style='border: 0;' width='12' height='12'/>"; ?>
                </td>
                <td style="text-align: right; width: 33%; padding: 0;">
                    <a onClick="document.getElementById('filter_box').style.display='block';document.getElementById('filter_image').style.display='none';">
                        <img id="filter_image" src="images/filter.jpg" style="border: 0;" height="13" width="13"
                             alt="Filter" title="Show filter"<?php echo (!empty($filter['status']) && $filter['status'] == 'on') ? ' style="display:none;"' : ''; ?>></a>&nbsp;
                    <a href="index.php?editor=qglobal&action=2"><img src="images/add.gif" style="border: 0;" alt="Add"
                                                                     title="Create New Quest Global"/></a>
                </td>
            </tr>
        </table>
    </div>
    <table class="table_content2" style="width: 100%;">
        <?php if (isset($qglobals)): ?>
            <tr>
                <td style="text-align: center;">
                    <strong><?php echo (isset($sort) && $sort == 1) ? "Name <img src='images/sort_red.bmp' alt='Sort Red' style='border: 0;' width='8' height='8'/>" : "<a href='index.php?editor=qglobal&sort=1" . (($filter['status'] == "on") ? $filter['url'] : "") . "'>Name <img src='images/sort_green.bmp' style='border: 0;' width='8' height='8' alt='Sort Green' title='Sort by Name'/></a>"; ?></strong>
                </td>
                <td style="text-align: center;"><strong>Value</strong></td>
                <td style="text-align: center;">
                    <strong><?php echo (isset($sort) && $sort == 2) ? "Character <img src='images/sort_red.bmp' alt='Sort Red' style='border: 0;' width='8' height='8'/>" : "<a href='index.php?editor=qglobal&sort=2" . (($filter['status'] == "on") ? $filter['url'] : "") . "'>Character <img src='images/sort_green.bmp' style='border: 0;' width='8' height='8' alt='Sort Green' title='Sort by Character'/></a>"; ?></strong>
                </td>
                <td style="text-align: center;">
                    <strong><?php echo (isset($sort) && $sort == 3) ? "NPC <img src='images/sort_red.bmp' alt='Sort Red' style='border: 0;' width='8' height='8'/>" : "<a href='index.php?editor=qglobal&sort=3" . (($filter['status'] == "on") ? $filter['url'] : "") . "'>NPC <img src='images/sort_green.bmp' style='border: 0;' width='8' height='8' alt='Sort Green' title='Sort by NPC'/></a>"; ?></strong>
                </td>
                <td style="text-align: center;">
                    <strong><?php echo (isset($sort) && $sort == 4) ? "Zone <img src='images/sort_red.bmp' alt='Sort Red' style='border: 0;' width='8' height='8'/>" : "<a href='index.php?editor=qglobal&sort=4" . (($filter['status'] == "on") ? $filter['url'] : "") . "'>Zone <img src='images/sort_green.bmp' style='border: 0;' width='8' height='8' alt='Sort Green' title='Sort by Zone'/></a>"; ?></strong>
                </td>
                <td style="text-align: center;"><strong>Expires</strong></td>
                <td style="width: 5%;">&nbsp;</td>
            </tr>
            <?php $x = 0;
            foreach ($qglobals as $qglobal):?>
                <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA"; ?>">
                    <td style="text-align: center;"><?= $qglobal['name'] ?></td>
                    <td style="text-align: center;"><?= $qglobal['value'] ?></td>
                    <td style="text-align: center;"><?php echo ($qglobal['charid'] > 0) ? '<a href="index.php?editor=player&playerid=' . $qglobal['charid'] . '">' . getPlayerName($qglobal['charid']) . '</a>' : "ANY"; ?></td>
                    <td style="text-align: center;"><?php echo ($qglobal['npcid'] > 0) ? '<a href="index.php?editor=npc&npcid=' . $qglobal['npcid'] . '">' . getNPCName($qglobal['npcid']) . '</a>' : "ANY"; ?></td>
                    <td style="text-align: center;"><?php echo ($qglobal['zoneid'] > 0) ? getZoneName($qglobal['zoneid']) : "ANY"; ?></td>
                    <td style="text-align: center;"><?php echo ($qglobal['expdate'] != '') ? get_real_time($qglobal['expdate']) : "NEVER"; ?></td>
                    <td style="text-align: right;"><a href="index.php?editor=qglobal&name=<?= $qglobal['name'] ?>&charid=<?= $qglobal['charid'] ?>&npcid=<?= $qglobal['npcid'] ?>&zoneid=<?= $qglobal['zoneid'] ?>&action=4"><img src="images/edit2.gif" width="13" height="13" style="border: 0;" alt="Edit Table" title="Edit Quest Global"></a>
                        &nbsp;<a onClick="return confirm('Really delete quest global?');" href="index.php?editor=qglobal&name=<?= $qglobal['name'] ?>&charid=<?= $qglobal['charid'] ?>&npcid=<?= $qglobal['npcid'] ?>&zoneid=<?= $qglobal['zoneid'] ?>&action=6"><img src="images/remove3.gif" style="border: 0;" alt="Red X" title="Delete Quest Global"></a></td>
                </tr>
                <?php $x++;
            endforeach;
        else:?>
            <tr>
                <td style="text-align: left; width: 100%; padding: 10px;">No Quest Globals</td>
            </tr>
        <?php endif; ?>
    </table>
</div>
