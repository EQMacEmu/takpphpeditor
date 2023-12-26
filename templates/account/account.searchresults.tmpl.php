<div class="table_container" style="width:250px;">
    <div class="table_header">Account Search Results</div>
    <div class="table_content">
        <?php if (!empty($results)): ?>
            <?php foreach ($results as $result): extract($result); ?>
                <a href="index.php?editor=account&acctid=<?= $id ?>"><?= $id ?> - <?= $name ?> (<?= $lsaccount_id ?>)</a><br/>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if (empty($results)): ?>
            Your search produced no results!
        <?php endif; ?>
    </div>
</div>
