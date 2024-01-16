<div class="table_container" style="width:350px;">
    <div class="table_header">
        Spawngroups for <?= $currzone ?? "" ?>
    </div>
    <div class="table_content">
        <?php if ($results != ''): ?>
            <?php foreach ($results as $result): extract($result) ?>
                <a href="index.php?editor=spawn&npcid=<?= $npcID ?>&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>"><?= $name ?>
                    - (<?= $spawngroupID ?>)</a><br>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if ($results == ''): ?>
            Your search produced no results!
        <?php endif; ?>
    </div>
</div>
