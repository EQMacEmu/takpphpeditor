<?php $export_sql = export_grid_sql(); ?>
<div id="sql_block" style="display:none">
    <div class="center">
        <label for="sql_text"></label>
        <textarea id="sql_text" name="sql_text" rows="3" cols="90"><?= $export_sql ?></textarea><br><br>
        <button type="button" id="copy_sql" onClick="clipboardData.setData('Text', sql_text.value);">Copy SQL to
            Clipboard
        </button>&nbsp;
        <button type="button" id="hide_sql" onClick="document.getElementById('sql_block').style.display='none';">Hide
            SQL
        </button>
    </div>
    <br/>
</div>
<?php $import_text = get_import_text(); ?>
<div id="import_text_div" style="display:none">
    <div class="center">
        <form name="import" method="post"
              action="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&pathgrid=<?= $pathgrid ?>&action=74">
            <label for="import_text"></label>
            <textarea id="import_text" name="import_text" rows="10" cols="50"><?= $import_text ?></textarea><br><br>
            <input type="submit" value="Replace Grid">
        </form>
        <button type="button" id="hide_import_text"
                onClick="document.getElementById('import_text_div').style.display='none';">Hide Import
        </button>
    </div>
    <br/>
</div>
<div>
    <table class="edit_form">
        <tr>
            <td class="edit_form_content"><a
                        href="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=31">View
                    Grids
                    for <?= $currzone ?? "" ?></a></td>
        </tr>
    </table>
    <br/>
</div>
<div class="table_container" style="width: 300px">
    <div class="table_header">
        <div style="float: right">
            <a onClick="document.getElementById('import_text_div').style.display='block';"><img src="images/edit.gif"
                                                                                                style="border: 0;"
                                                                                                alt="Edit Icon"
                                                                                                title="Import grid from text box data"></a>
            <a onClick="document.getElementById('sql_block').style.display='block';"><img src="images/sql.gif"
                                                                                          style="border: 0;"
                                                                                          alt="SQL Icon"
                                                                                          title="Show SQL"></a>
            <a href="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&pathgrid=<?= $pathgrid ?>&action=65"><img
                        src="images/last.gif" style="border: 0;" alt="Copy Grid Icon"
                        title="Copy Grid <?= $pathgrid ?> to next available id"></a>
            <a onClick="return confirm('Really Delete Grid <?= $pathgrid ?>?');"
               href="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&spid=<?= $spid ?>&pathgrid=<?= $pathgrid ?>&action=29"><img
                        src="images/remove3.gif" style="border: 0;" alt="Remove Icon" title="Delete Grid"></a>
        </div>
        Grid: <?= $pathgrid ?>
    </div>
    <div class="table_content">
        Grid [<a
                href="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&spid=<?= $spid ?>&pathgrid=<?= $pathgrid ?>&action=21">edit</a>]:<br>
        <div style="padding: 5px 0 0 20px;">
            Wander Type: <?= isset($type) ? $wandertype[$type] : "N/A" ?><br>
            Pause Type: <?= isset($type2) ? $pausetype[$type2] : "N/A" ?><br>
        </div>
    </div>
</div>
<br>
<div class="table_container" style="width: 550px">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0;">Grid Entries:</td>
                <td style="padding: 0; text-align: right;">
                    <a href="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&spid=<?= $spid ?>&pathgrid=<?= $pathgrid ?>&action=64"><img
                                src="images/sort.gif" style="border: 0;" alt="Sort Icon" title="Sort grid numbers"></a>&nbsp;
                    <a href="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&spid=<?= $spid ?>&pathgrid=<?= $pathgrid ?>&action=27"><img
                                src="images/add.gif" alt="Add Icon" style="border: 0;"
                                title="Add an item to this Grid Entry Table"></a>
                    <a onClick="return confirm('Really delete these Grid Entries from Grid <?= $pathgrid ?>?');"
                       href="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&spid=<?= $spid ?>&pathgrid=<?= $pathgrid ?>&action=26"><img
                                src="images/table.gif" style="border: 0;" alt="Delete Icon"
                                title="Permanently delete this Grid Entry set"></a>
                </td>
            </tr>
        </table>
    </div>
    <table class="table_content2" style="width: 100%;">
        <?php if (isset($grids)): ?>
            <tr>
                <td style="text-align: center; width: 5%"><strong>Number</strong></td>
                <td style="text-align: center; width: 10%"><strong>X</strong></td>
                <td style="text-align: center; width: 10%"><strong>Y</strong></td>
                <td style="text-align: center; width: 10%"><strong>Z</strong></td>
                <td style="text-align: center; width: 10%"><strong>Heading</strong></td>
                <td style="text-align: center; width: 10%"><strong>Pause</strong></td>
                <td style="text-align: center; width: 10%"><strong>Centerpoint</strong></td>
                <th style="width: 8%;"></th>
            </tr>
            <?php $x = 0;
            foreach ($grids as $number => $v): ?>
                <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA"; ?>">
                    <td style="text-align: center; width: 5%"><?= $number ?></td>
                    <td style="text-align: center; width: 10%"><?= $v['x_coord'] ?></td>
                    <td style="text-align: center; width: 10%"><?= $v['y_coord'] ?></td>
                    <td style="text-align: center; width: 10%"><?= $v['z_coord'] ?></td>
                    <td style="text-align: center; width: 10%"><?= $v['heading'] ?></td>
                    <td style="text-align: center; width: 10%"><?= $v['pause'] ?></td>
                    <td style="text-align: center; width: 10%"><?= $yesno[$v['centerpoint']] ?></td>
                    <td style="text-align: right;">
                        <a href="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&spid=<?= $spid ?>&pathgrid=<?= $pathgrid ?>&number=<?= $number ?>&action=24"><img
                                    src="images/edit2.gif" style="border: 0;" alt="Edit Icon"
                                    title="Edit Grid Entry"></a>
                        <?php $copy_string = "&x_coord=" . $v['x_coord'] . "&y_coord=" . $v['y_coord'] . "&z_coord=" . $v['z_coord'] . "&heading=" . $v['heading'] . "&pause=" . $v['pause']; ?>
                        <a href="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&spid=<?= $spid ?>&pathgrid=<?= $pathgrid ?>&number=<?= $number ?>&action=63<?php echo $copy_string ?>"><img
                                    src="images/movefile.gif" style="border: 0;" alt="Copy Icon"
                                    title="Copy Grid Entry"></a>
                        <a href="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&spid=<?= $spid ?>&pathgrid=<?= $pathgrid ?>&number=<?= $number ?>&action=23"><img
                                    src="images/remove3.gif" style="border: 0;" alt="Remove Icon"
                                    title="Remove Grid Entry"></a>
                    </td>
                </tr>
                <?php $x++; endforeach; ?>
        <?php endif; ?>
        <?php if (!isset($grids)): ?>
            <tr>
                <td style="text-align: left; width: 100px; padding: 10px;">No grid entries currently assigned</td>
            </tr>
        <?php endif; ?>
    </table>
</div>
