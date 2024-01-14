<div class="table_container" style="width:250px;">
    <div class="table_header">
        Misc Search Results
    </div>
    <div class="table_content">
        <?php if (!empty($fishing)): ?>
            <?php foreach ($fishing as $fishing_row): extract($fishing_row); ?>
                <a href="index.php?editor=misc&fsid=<?= $fsid ?>&action=26"><?= get_item_name($fiid) ?></a><br>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if (!empty($forage)): ?>
            <?php foreach ($forage as $forage_row): extract($forage_row); ?>
                <a href="index.php?editor=misc&fgid=<?= $fgid ?>&action=27"><?= get_item_name($fgiid) ?></a><br>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if (!empty($gspawn)): ?>
            <?php foreach ($gspawn as $gspawn_row): extract($gspawn_row); ?>
                <a href="index.php?editor=misc&gsid=<?= $gsid ?>&action=28"><?= get_item_name($giid) ?></a><br>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if (empty($fishing) && empty($forage) && empty($gspawn)): ?>
            Your search produced no results!
        <?php endif; ?>
    </div>
</div>