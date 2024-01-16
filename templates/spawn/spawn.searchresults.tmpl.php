<div class="table_container" style="width:250px;">
    <div class="table_header">
        Spawn Search Results
    </div>
    <div class="table_content">
        <?php if (!empty($results)): ?>
            <?php foreach ($results as $result): extract($result); ?>
                <a href="index.php?editor=spawn&npcid=<?= $id ?>&z=<?= get_zone_by_npcid($id) ?>"><?= $name ?> -
                    (<?= get_zone_by_npcid($id) ?>)</a><br>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if (empty($results)): ?>
            Your search produced no results!
        <?php endif; ?>
    </div>
</div>