<?php if ($errors != ''): ?>
    <?php foreach ($errors as $error): ?>
        <div class="error">
            <table style="width: 100%;">
                <tr>
                    <td style="vertical-align: middle; width: 30px;"><img src="images/caution.gif" alt="Caution"></td>
                    <td style="padding:0 5px;"><?= $error ?></td>
                </tr>
            </table>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
<?php $export_sql = export_recipe_sql(); ?>
<div id="sql_block" style="display:none;">
    <div class="center">
        <label for="sql_text"></label>
        <textarea id="sql_text" name="sql_text" rows="3" cols="90"><?= $export_sql ?></textarea><br/><br/>
        <button type="button" id="copy_sql" onClick="clipboardData.setData('Text', sql_text.value);">Copy SQL to
            Clipboard
        </button>&nbsp;
        <button type="button" id="hide_sql"
                onClick="document.getElementById('sql_block').style.display='none';document.getElementById('sql_image').style.display='inline';">
            Hide SQL
        </button>
    </div>
    <br/>
</div>
<div class="table_container" style="width:350px;">
    <div class="table_header">
        <div style="float: right">
            <a onClick="document.getElementById('sql_block').style.display='block';document.getElementById('sql_image').style.display='none';"><img
                        id="sql_image" src="images/sql.gif" style="border: 0;" alt="SQL Icon" title="Show SQL"></a>
            <a href="index.php?editor=tradeskill&ts=<?= $ts ?>&rec=<?= $rec ?>&action=1"><img src="images/c_table.gif"
                                                                                              style="border: 0;"
                                                                                              alt="Edit Icon"
                                                                                              title="Edit Recipe"></a>
            <a onClick="return confirm('Really Copy Recipe <?= $id ?>?');"
               href="index.php?editor=tradeskill&ts=<?= $ts ?>&rec=<?= $rec ?>&action=12"><img src="images/last.gif"
                                                                                               style="border: 0;"
                                                                                               alt="Copy Icon"
                                                                                               title="Copy Recipe"></a>
            <a onClick="return confirm('Really Delete Recipe <?= $id ?>?');"
               href="index.php?editor=tradeskill&ts=<?= $ts ?>&rec=<?= $rec ?>&action=3"><img src="images/remove3.gif"
                                                                                              style="border: 0;"
                                                                                              alt="Delete Icon"
                                                                                              title="Delete Recipe"></a>
        </div>
        Recipe <?= $id ?>: "<?= $name ?? "" ?>"
    </div>
    <div class="table_content">
        <strong>Tradeskill:</strong> <?php echo isset($tradeskill) ? $tradeskills[$tradeskill] : "Undefined"; ?><br/>
        <strong>Min Skill:</strong> <?= $skillneeded ?? "N/A" ?><br/>
        <strong>Trivial</strong>: <?= $trivial ?? "N/A" ?><br/>
        <?php $nofail = $nofail ?? 0; // False if not defined ?>
        <strong>No Fail:</strong> <?= $yesno[$nofail] ?><br/>
        <?php $replace_container = $replace_container ?? 0; // False if not defined ?>
        <strong>Replace Container:</strong> <?= $yesno[$replace_container] ?><br/>
        <?php $quest = $quest ?? 0; // False if not defined  ?>
        <strong>Quest Controlled:</strong> <?= $yesno[$quest] ?><br/>
        <?php $enabled = $enabled ?? 0; // Not enabled if not defined ?>
        <strong>Enabled:</strong> <?= $yesno[$enabled] ?><br/>
        <strong>Notes:</strong> <?= $notes ?? "N/A" ?>
    </div>
</div>
<br/>
<div class="table_container">
    <div class="table_header">
        <div style="float:right;">
            <a href="index.php?editor=tradeskill&ts=<?= $ts ?>&rec=<?= $rec ?>&action=7"><img src="images/add.gif"
                                                                                              style="border: 0;"
                                                                                              alt="Add Icon"
                                                                                              title="Add item to recipe"></a>
        </div>
        Recipe Details
    </div>
    <div class="table_content">
        <fieldset>
            <legend><strong>Containers</strong></legend>
            <?php if (!isset($containers) || $containers == ''): ?>
                No combine containers specified
            <?php endif; ?>
            <?php if (isset($containers) && $containers != ''): ?>
                <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
                    <?php foreach ($containers as $container): extract($container); ?>
                        <tr>
                            <td style="padding: 0; width: 40%;">
                                <?php if ($item_id < 1001): ?>
                                    <?= $name ?> (<?= $item_id ?>)
                                <?php endif; ?>
                                <?php if ($item_id > 1000): ?>
                                    <?= $name ?> (<a
                                            href="index.php?editor=items&ts=<?= $ts ?>&rec=<?= $rec ?>&tsid=<?= $id ?>&id=<?= $item_id ?>&action=2"><?= $item_id ?></a>)
                                <?php endif; ?>
                            </td>
                            <td style="padding: 0; width: 15%;">
                                [<a href="https://lucy.allakhazam.com/item.html?id=<?= $item_id ?>">Lucy</a>]
                            </td>
                            <td style="padding: 0; width: 15%; text-align: center;">
                                &nbsp;
                            </td>
                            <td style="padding: 0; text-align: center; width: 15%;">
                                &nbsp;
                            </td>
                            <td style="padding: 0; text-align: right; width: 15%;">
                                <a href="index.php?editor=tradeskill&ts=<?= $ts ?>&rec=<?= $rec ?>&id=<?= $id ?>&action=5"><img
                                            src="images/edit2.gif" style="border: 0;" alt="Edit Icon"
                                            title="Edit this container"></a>&nbsp;
                                <a href="index.php?editor=tradeskill&ts=<?= $ts ?>&rec=<?= $rec ?>&id=<?= $id ?>&action=4"
                                   onClick="return confirm('Really delete this container?');"><img
                                            src="images/remove.gif" style="border: 0;" alt="Remove Icon"
                                            title="Delete this container"></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
        </fieldset>
        <br/><br/>
        <fieldset>
            <legend><strong>Components</strong></legend>
            <?php if (!isset($components) || $components == ''): ?>
                No components specified
            <?php endif; ?>
            <?php if (isset($components) && $components != ''): ?>
                <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
                    <?php foreach ($components as $component): extract($component); ?>
                        <tr>
                            <td style="padding: 0; width: 40%;">
                                <?= $name ?> (<a
                                        href="index.php?editor=items&ts=<?= $ts ?>&rec=<?= $rec ?>&tsid=<?= $id ?>&id=<?= $item_id ?>&action=2"><?= $item_id ?></a>)
                            </td>
                            <td style="padding: 0; width: 15%;">
                                [<a href="https://lucy.allakhazam.com/item.html?id=<?= $item_id ?>">Lucy</a>]
                            </td>
                            <td style="padding: 0; text-align: center; width: 10%;">
                                Qty: <?= $componentcount ?>
                            </td>
                            <td style="padding: 0; text-align: center; width: 10%;">
                                Returned: <?= $failcount ?>
                            </td>
                            <td style="padding: 0; text-align: right; width: 15%;">
                                <a href="index.php?editor=tradeskill&ts=<?= $ts ?>&rec=<?= $rec ?>&id=<?= $id ?>&action=5"><img
                                            src="images/edit2.gif" style="border: 0;" alt="Edit Icon"
                                            title="Edit this component"></a>&nbsp;
                                <a href="index.php?editor=tradeskill&ts=<?= $ts ?>&rec=<?= $rec ?>&id=<?= $id ?>&action=4"
                                   onClick="return confirm('Really delete this component?');"><img
                                            src="images/remove.gif" style="border: 0;" alt="Remove Icon"
                                            title="Delete this component"></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
        </fieldset>
        <br/><br/>
        <fieldset>
            <legend><strong>Products</strong></legend>
            <?php if (!isset($products) || $products == ''): ?>
                No products specified
            <?php endif; ?>
            <?php if (isset($products) && $products != ''): ?>
                <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
                    <?php foreach ($products as $product): extract($product); ?>
                        <tr>
                            <td style="padding: 0; width: 40%;">
                                <?= $name ?> (<a
                                        href="index.php?editor=items&ts=<?= $ts ?>&rec=<?= $rec ?>&tsid=<?= $id ?>&id=<?= $item_id ?>&action=2"><?= $item_id ?></a>)
                            </td>
                            <td style="padding: 0; width: 15%;">
                                [<a href="https://lucy.allakhazam.com/item.html?id=<?= $item_id ?>">Lucy</a>]
                            </td>
                            <td style="padding: 0; text-align: center; width: 15%;">
                                Qty: <?= $successcount ?>
                            </td>
                            <td style="padding: 0; text-align: center; width: 15%;">
                                &nbsp;
                            </td>
                            <td style="padding: 0; text-align: right; width: 15%;">
                                <a href="index.php?editor=tradeskill&ts=<?= $ts ?>&rec=<?= $rec ?>&id=<?= $id ?>&action=5"><img
                                            src="images/edit2.gif" style="border: 0;" alt="Edit Icon"
                                            title="Edit this product"></a>&nbsp;
                                <a href="index.php?editor=tradeskill&ts=<?= $ts ?>&rec=<?= $rec ?>&id=<?= $id ?>&action=4"
                                   onClick="return confirm('Really delete this product?');"><img src="images/remove.gif"
                                                                                                 style="border: 0;"
                                                                                                 alt="Remove Icon"
                                                                                                 title="Delete this product"></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
        </fieldset>
    </div>
</div>
