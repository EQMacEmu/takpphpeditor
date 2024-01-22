<div class="edit_form" id="filter_box"
     style="width: 750px; display: <?php echo (isset($filter['status']) && $filter['status'] == 'on') ? 'block' : 'none' ?>">
    <div class="edit_form_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0; text-align: left;">Filters</td>
                <td style="padding: 0; text-align: right;"><a
                            onClick="document.getElementById('filter_box').style.display='none';"><img
                                src="images/downgrade.gif" alt="Downgrade Icon" title="Hide filter" style="border: 0;"></a>
                </td>
            </tr>
        </table>
    </div>
    <div class="edit_form_content">
        <form name="filter" id="filter" method="get" action="index.php">
            <input type="hidden" name="editor" value="npc"/>
            <input type="hidden" name="z" value="<?= $currzone ?? "" ?>"/>
            <input type="hidden" name="zoneid" value="<?= $currzoneid ?? "" ?>"/>
            <input type="hidden" name="npcid" value="<?= $npcid ?>"/>
            <input type="hidden" name="action" value="78"/>
            <?php echo(($sort != '') ? '<input type="hidden" name="sort" value="' . $sort . '"/>' : '') ?>
            <input type="hidden" name="filter" id="filter_status" value="on"/>
            <table class="table_content" style="width: 100%;">
                <tr>
                    <td style="width: 10%;">
                        <label for="filter1">EmoteID:</label><br/>
                        <input type="text" name="filter1" id="filter1" size="5"
                               value="<?= $filter['filter1'] ?? "" ?>"/>
                    </td>
                    <td style="width: 10%;">
                        <label for="filter2">Type:</label><br/>
                        <input type="text" name="filter2" id="filter2" size="5"
                               value="<?= $filter['filter2'] ?? "" ?>"/>
                    </td>
                    <td style="width: 10%;">
                        <label for="filter3">Event:</label><br/>
                        <input type="text" name="filter3" id="filter3" size="5"
                               value="<?= $filter['filter3'] ?? "" ?>"/>
                    </td>
                    <td style="width: 65%;">
                        <label for="filter4">Text:</label><br/>
                        <input type="text" name="filter4" id="filter4" size="50"
                               value="<?= $filter['filter4'] ?? "" ?>"/>
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
<div class="table_container" style="width: 750px;">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0; text-align: left; width: 33%;">NPC Emotes</td>
                <td style="padding: 0; text-align: center; width: 33%;">
                    <?php echo ($page > 1) ? "<a href='index.php?editor=npc&z=$currzone&zoneid=$currzoneid&npcid=$npcid&action=78&page=1" . (($sort != "") ? "&sort=" . $sort : "") . (($filter['status'] == "on") ? $filter['url'] : "") . "'><img src='images/first.gif' style='border: 0;' width='12' height='12' alt='First Icon' title='First'/></a>" : "<img src='images/first.gif' alt='First Icon' style='border: 0;' width='12' height='12'/>"; ?>
                    <?php echo ($page > 1) ? "<a href='index.php?editor=npc&z=$currzone&zoneid=$currzoneid&npcid=$npcid&action=78&page=" . ($page - 1) . (($sort != "") ? "&sort=" . $sort : "") . (($filter['status'] == "on") ? $filter['url'] : "") . "'><img src='images/prev.gif' style='border: 0;' width='12' height='12' alt='Previous Icon' title='Previous'/></a>" : "<img src='images/prev.gif' alt='Previous Icon' style='border: 0;' width='12' height='12'/>"; ?>
                    <?php echo $page . " of " . $pages; ?>
                    <?php echo ($page < $pages) ? "<a href='index.php?editor=npc&z=$currzone&zoneid=$currzoneid&npcid=$npcid&action=78&page=" . ($page + 1) . (($sort != "") ? "&sort=" . $sort : "") . (isset($filter['status']) && ($filter['status'] == "on") ? $filter['url'] : "") . "'><img src='images/next.gif' style='border: 0;' width='12' height='12' alt='Next Icon' title='Next'/></a>" : "<img src='images/next.gif' alt='Next Icon' style='border: 0;' width='12' height='12'/>"; ?>
                    <?php echo ($page < $pages) ? "<a href='index.php?editor=npc&z=$currzone&zoneid=$currzoneid&npcid=$npcid&action=78&page=" . $pages . (($sort != "") ? "&sort=" . $sort : "") . (isset($filter['status']) && ($filter['status'] == "on") ? $filter['url'] : "") . "'><img src='images/last.gif' style='border: 0;' width='12' height='12' alt='Last Icon' title='Last'/></a>" : "<img src='images/last.gif' alt='Last Icon' style='border: 0;' width='12' height='12'/>"; ?>
                </td>
                <td style="padding: 0; text-align: right; width: 33%;">
                    <a onClick="document.getElementById('filter_box').style.display='block';">
                        <img src="images/filter.jpg" style="border: 0;" height="13" width="13" alt="Filter Icon"
                             title="Show filter">
                    </a>&nbsp;<a href="index.php?editor=npc&action=76"><img src="images/add.gif" style="border: 0;"
                                                                            alt="Add Icon"
                                                                            title="Add new emote set"></a>
                </td>
            </tr>
        </table>
    </div>
    <table class="table_content2" style="width: 100%;">
        <?php if (isset($emotes)): ?>
            <tr>
                <td style="text-align: center;">
                    <strong><?php echo ($sort == 1) ? "EmoteID <img src='images/sort_red.bmp' alt='Red Sort Icon' style='border: 0;' width='8' height='8'/>" : "<a href='index.php?editor=npc&action=78&sort=1" . (isset($filter['status']) && ($filter['status'] == "on") ? $filter['url'] : "") . "'>EmoteID <img src='images/sort_green.bmp' style='border: 0;' width='8' height='8' alt='Green Sort Icon' title='Sort by EmoteID'/></a>"; ?></strong>
                </td>
                <td style="text-align: center;">
                    <strong><?php echo ($sort == 2) ? "Type <img src='images/sort_red.bmp' alt='Red Sort Icon' style='border: 0;' width='8' height='8'/>" : "<a href='index.php?editor=npc&action=78&sort=2" . (isset($filter['status']) && ($filter['status'] == "on") ? $filter['url'] : "") . "'>Type <img src='images/sort_green.bmp' style='border: 0;' width='8' height='8' alt='Green Sort Icon' title='Sort by Type'/></a>"; ?></strong>
                </td>
                <td style="text-align: center;">
                    <strong><?php echo ($sort == 3) ? "Event <img src='images/sort_red.bmp' alt='Red Sort Icon' style='border: 0;' width='8' height='8'/>" : "<a href='index.php?editor=npc&action=78&sort=3" . (isset($filter['status']) && ($filter['status'] == "on") ? $filter['url'] : "") . "'>Event <img src='images/sort_green.bmp' style='border: 0;' width='8' height='8' alt='Green Sort Icon' title='Sort by Event'/></a>"; ?></strong>
                </td>
                <td style="text-align: center;">
                    <strong><?php echo ($sort == 4) ? "Text <img src='images/sort_red.bmp' alt='Red Sort Icon' style='border: 0;' width='8' height='8'/>" : "<a href='index.php?editor=npc&action=78&sort=4" . (isset($filter['status']) && ($filter['status'] == "on") ? $filter['url'] : "") . "'>Text <img src='images/sort_green.bmp' style='border: 0;' width='8' height='8' alt='Green Sort Icon' title='Sort by Text'/></a>"; ?></strong>
                </td>
                <td style="width: 5%;">&nbsp;</td>
            </tr>
            <?php $x = 0;
            foreach ($emotes as $key => $v):?>
                <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA"; ?>">
                    <td style="text-align: center; width: 10%;"><?= $v['emoteid'] ?></td>
                    <td style="text-align: center; width: 10%;"><?= $emotetype[$v['type']] ?></td>
                    <td style="text-align: center; width: 10%;"><?= $eventtype[$v['event_']] ?></td>
                    <td style="text-align: center; width: 65%;"><?= html_replace($v['text']) ?></td>
                    <?php
                    if ($v['emoteid'] > 999) {
                        $npcid = $v['emoteid'];
                    } else {
                        $npcid = get_npcid_by_emoteid($v['emoteid']);
                    }
                    $currzone = get_zone_by_npcid($npcid);
                    $currzoneid = get_zoneid_by_npcid($npcid);
                    ?>
                    <td style="text-align: right;">
                        <a href="index.php?editor=npc&emoteid=<?= $v['emoteid'] ?>&action=72">
                            <img src="images/edit2.gif" width="13" height="13" style="border: 0;" alt="Edit Icon"
                                 title="View Emote Set">
                        </a>
                    </td>
                </tr>
                <?php $x++;
            endforeach;
        else:?>
            <tr>
                <td style="text-align: left; width: 100px; padding: 10px;">No NPC Emotes</td>
            </tr>
        <?php endif; ?>
    </table>
</div>
