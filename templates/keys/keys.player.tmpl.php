<div class="table_container" style="width: 350px;">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0; text-align: left; width: 33%;">Player Keys - <a
                            href="index.php?editor=player&playerid=<?= $playerid ?>"><?= getPlayerName($playerid) ?></a>
                </td>
                <td style="padding: 0; text-align: right; width: 5%;"><a
                            href="index.php?editor=keys&playerid=<?= $playerid ?>&action=4"><img src="images/add.gif"
                                                                                                 style="border: 0;"
                                                                                                 alt="Yellow Plus Icon"
                                                                                                 title="Create a new entry"/></a>
            </tr>
        </table>
    </div>
    <table class="table_content2" style="width: 100%;">
        <?php
        $x = 0;
        if (!empty($keys)):
            ?>
            <tr>
                <td style="text-align: center;"><strong>Item</strong></td>
                <td style="width: 10%;">&nbsp;</td>
            </tr>
            <?php
            foreach ($keys as $key):
                extract($key);
                ?>
                <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA"; ?>">
                    <td style="text-align: center;"><?php echo item_isNoRent($key['item_id']) ? "<img src='images/caution.gif' style='border: 0;' width='13' alt='Caution' title='This is a No Rent (Temporary) item'>&nbsp;&nbsp;" : "" ?><?= get_item_name($key['item_id']) ?>
                        (<?= $key['item_id'] ?>) - [<a
                                href="https://lucy.allakhazam.com/item.html?id=<?= $key['item_id'] ?>" target="_blank">Lucy</a>]
                    </td>
                    <td style="text-align: right;"><a
                                href="index.php?editor=keys&playerid=<?= $key['id'] ?>&item_id=<?= $key['item_id'] ?>&action=6"><img
                                    src="images/edit2.gif" width="13" height="13" style="border: 0;" alt="Edit Table"
                                    title="View/Edit Entry"></a>&nbsp;<a
                                onClick="return confirm('Really delete this entry?');"
                                href="index.php?editor=keys&playerid=<?= $key['id'] ?>&item_id=<?= $key['item_id'] ?>&action=8"><img
                                    src="images/remove3.gif" style="border: 0;" alt="Red X Icon" title="Delete Entry"></a></td>
                </tr>
                <?php
                $x++;
            endforeach;
        endif;
        if ($x == 0):
            ?>
            <tr>
                <td colspan="3" style="padding: 10px; text-align: left; width: 100%;">No Keys</td>
            </tr>
        <?php endif; ?>
    </table>
</div>
