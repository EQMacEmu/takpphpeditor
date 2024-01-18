<div class="table_container" style="width: 700px;">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0; text-align: left; width: 33%;">Bugs</td>
                <td style="padding: 0; text-align: center; width: 33%">
                    <?php echo ($page > 1) ? "<a href='index.php?editor=server&action=1&page=1" . (($sort != "") ? "&sort=" . $sort : "") . "'><img src='images/first.gif' alt='First Icon' style='border: 0;' width='12' height='12' title='First'/></a>" : "<img src='images/first.gif' alt='First Icon' style='border: 0;' width='12' height='12'/>"; ?>
                    <?php echo ($page > 1) ? "<a href='index.php?editor=server&action=1&page=" . ($page - 1) . (($sort != "") ? "&sort=" . $sort : "") . "'><img src='images/prev.gif' alt='Previous Icon' style='border: 0;' width='12' height='12' title='Previous'/></a>" : "<img src='images/prev.gif' alt='Previous Icon' style='border: 0;' width='12' height='12'/>"; ?>
                    <?php echo $page . " of " . $pages; ?>
                    <?php echo ($page < $pages) ? "<a href='index.php?editor=server&action=1&page=" . ($page + 1) . (($sort != "") ? "&sort=" . $sort : "") . "'><img src='images/next.gif' alt='Next Icon' style='border: 0;' width='12' height='12' title='Next'/></a>" : "<img src='images/next.gif' alt='Next Icon' style='border: 0;' width='12' height='12'/>"; ?>
                    <?php echo ($page < $pages) ? "<a href='index.php?editor=server&action=1&page=" . $pages . (($sort != "") ? "&sort=" . $sort : "") . "'><img src='images/last.gif' alt='Last Icon' style='border: 0;' width='12' height='12' title='Last'/></a>" : "<img src='images/last.gif' alt='Last Icon' style='border: 0;' width='12' height='12'/>"; ?>
                </td>
                <td style="padding: 0; text-align: right; width: 33%;"><a href="index.php?editor=server&action=4">View
                        Resolved Bugs</a></td>
            </tr>
        </table>
    </div>
    <table class="table_content2" style="width: 100%;">
        <?php if (isset($bugs)) : ?>
            <tr>
                <td style="text-align: center; width: 5%">
                    <strong><?php echo ($sort == 1) ? "ID <img src='images/sort_red.bmp' alt='Red Sort Icon' style='border: 0;' width='8' height='8'/>" : "<a href='index.php?editor=server&action=1&sort=1'>ID <img src='images/sort_green.bmp' style='border: 0;' width='8' height='8' alt='Green Sort Icon' title='Sort by ID'/></a>"; ?></strong>
                </td>
                <td style="text-align: center; width: 15%">
                    <strong><?php echo ($sort == 2) ? "Zone <img src='images/sort_red.bmp' alt='Red Sort Icon' style='border: 0;' width='8' height='8'/>" : "<a href='index.php?editor=server&action=1&sort=2'>Zone <img src='images/sort_green.bmp' style='border: 0;' width='8' height='8' alt='Green Sort Icon' title='Sort by Zone'/></a>"; ?></strong>
                </td>
                <td style="text-align: center; width: 15%">
                    <strong><?php echo ($sort == 3) ? "Toon <img src='images/sort_red.bmp' alt='Red Sort Icon' style='border: 0;' width='8' height='8'/>" : "<a href='index.php?editor=server&action=1&sort=3'>Toon <img src='images/sort_green.bmp' style='border: 0;' width='8' height='8' alt='Green Sort Icon' title='Sort by Toon'/></a>"; ?></strong>
                </td>
                <td style="text-align: center; width: 15%">
                    <strong><?php echo ($sort == 4) ? "Type <img src='images/sort_red.bmp' alt='Red Sort Icon' style='border: 0;' width='8' height='8'/>" : "<a href='index.php?editor=server&action=1&sort=4'>Type <img src='images/sort_green.bmp' style='border: 0;' width='8' height='8' alt='Green Sort Icon' title='Sort by Type'/></a>"; ?></strong>
                </td>
                <td style="text-align: center; width: 15%">
                    <strong><?php echo ($sort == 5) ? "Target <img src='images/sort_red.bmp' alt='Red Sort Icon' style='border: 0;' width='8' height='8'/>" : "<a href='index.php?editor=server&action=1&sort=5'>Target <img src='images/sort_green.bmp' style='border: 0;' width='8' height='8' alt='Green Sort Icon' title='Sort by Target'/></a>"; ?></strong>
                </td>
                <td style="text-align: center; width: 15%">
                    <strong><?php echo ($sort == 6) ? "Date <img src='images/sort_red.bmp' alt='Red Sort Icon' style='border: 0;' width='8' height='8'/>" : "<a href='index.php?editor=server&action=1&sort=6'>Date <img src='images/sort_green.bmp' style='border: 0;' width='8' height='8' alt='Green Sort Icon' title='Sort by Date'/></a>"; ?></strong>
                </td>
                <td style="text-align: center; width: 15%">
                    <strong><?php echo ($sort == 7) ? "Status <img src='images/sort_red.bmp' alt='Red Sort Icon' style='border: 0;' width='8' height='8'/>" : "<a href='index.php?editor=server&action=1&sort=7'>Status <img src='images/sort_green.bmp' style='border: 0;' width='8' height='8' alt='Green Sort Icon' title='Sort by Status'/></a>"; ?></strong>
                </td>
                <td style="width: 5%;">&nbsp;</td>
            </tr>
            <?php $x = 0;
            foreach ($bugs as $key => $v): ?>
                <?php if ($v['status'] == 0): ?>
                    <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA"; ?>">
                        <td style="text-align: center; width: 5%"><?= $v['bid'] ?></td>
                        <td style="text-align: center; width: 15%"><?= $v['zone'] ?></td>
                        <td style="text-align: center; width: 15%"><?= $v['name'] ?></td>
                        <td style="text-align: center; width: 15%"><?= $v['type'] ?></td>
                        <td style="text-align: center; width: 15%"><?= $v['target'] ?></td>
                        <td style="text-align: center; width: 15%"><?= $v['date'] ?></td>
                        <td style="text-align: center; width: 15%"><?= $bugstatus[$v['status']] ?></td>
                        <td style="text-align: right;"><a
                                    href="index.php?editor=server&bid=<?= $v['bid'] ?>&action=2"><img
                                        src="images/edit2.gif" style="border: 0;" alt="View Icon" title="View Bug"></a>
                        </td>
                    </tr>
                <?php endif; ?>
                <?php $x++; endforeach; ?>
        <?php endif; ?>
        <?php if (!isset($bugs)): ?>
            <tr>
                <td style="text-align: left; width: 100px; padding: 10px;">No open bugs</td>
            </tr>
        <?php endif; ?>
    </table>
</div>
