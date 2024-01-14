<div class="table_container" style="width:350px;">
    <div class="table_header">
        Spell Search Results
    </div>
    <div class="table_content">
        <?php if (!empty($results)): ?>
            <?php foreach ($results as $result): extract($result); ?>
                <a href="index.php?editor=spellset&spellset=<?= $npc_spells_id ?>"><?= $spellname ?>
                    - <?= $setname ?></a><br>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if (empty($results)): ?>
            Your search produced no results!
        <?php endif; ?>
    </div>
</div>