<div class="table_container" style="width:250px;">
    <div class="table_header">
        Recipe Search Results
    </div>
    <div class="table_content">
        <?php if ($results != ''): ?>
            <?php foreach ($results as $result): extract($result); ?>
                <a href="index.php?editor=tradeskill&rec=<?= $id ?>"><?= $name ?></a><br>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if ($results == ''): ?>
            Your search produced no results!
        <?php endif; ?>
    </div>
</div>