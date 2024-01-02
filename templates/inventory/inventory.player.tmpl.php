<div class="table_container" style="width: 500px;">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding:0 ; text-align: left; width: 33%;">Player Inventory - <a
                            href="index.php?editor=player&playerid=<?= $playerid ?? "" ?>"><?= getPlayerName($playerid ?? '') ?? "Unknown" ?></a>
                </td>
                <td style="padding: 0; text-align: right; width: 5%;">
                    <a href="index.php?editor=inv&playerid=<?= $playerid ?? "" ?>&action=4"><img src="images/add.gif" style="border: 0;" alt="Yellow Plus Icon" title="Create a new entry"/></a>
            </tr>
        </table>
    </div>
    <table class="table_content2" style="width: 100%;">
        <?php
        $x = 0;
        if (!empty($inventory)):
            ?>
            <tr>
                <td style="text-align: center;"><strong>Slot</strong></td>
                <td style="text-align: center;"><strong>Item</strong></td>
                <td style="width: 10%;">&nbsp;</td>
            </tr>
        <?php
        endif;
        if (!empty($inventory)):
            foreach ($inventory as $inv):
                extract($inv);
                ?>
                <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA"; ?>">
                    <td>&nbsp;&nbsp;&nbsp;<?= $inv['slotid'] ?> - <?= $slots[$inv['slotid']] ?></td>
                    <td style="text-align: center;"><?= get_item_name($inv['itemid']) ?> (<?= $inv['itemid'] ?>) - [<a
                                href="https://lucy.allakhazam.com/item.html?id=<?= $inv['itemid'] ?>" target="_blank">Lucy</a>]
                    </td>
                    <td style="text-align: right;"><a
                                href="index.php?editor=inv&playerid=<?= $playerid ?>&slotid=<?= $inv['slotid'] ?>&action=6"><img
                                    src="images/edit2.gif" width="13" height="13" style="border: 0;" alt="Edit Entry Icon"
                                    title="View/Edit Entry"></a>&nbsp;<a
                                onClick="return confirm('Really delete this entry?');"
                                href="index.php?editor=inv&playerid=<?= $playerid ?>&slotid=<?= $inv['slotid'] ?>&action=8"><img
                                    src="images/remove3.gif" style="border: 0;" alt="Red X Icon" title="Delete Entry"></a></td>
                </tr>
                <?php
                $x++;
            endforeach;
        endif;
        if ($x == 0):
            ?>
            <tr>
                <td colspan="3" style="text-align: left; width: 100%; padding: 10px;">No Inventory</td>
            </tr>
        <?php endif; ?>
    </table>
</div>
