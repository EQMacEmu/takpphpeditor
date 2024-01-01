<div class="table_container" style="width:400px;">
    <div class="table_header">
        NPC Search Results
    </div>
    <div class="table_content">
        <?php if (!empty($npcpri)): ?>
            <?php foreach ($npcpri as $npc_primary_faction): extract($npc_primary_faction); ?>
                <a href="index.php?editor=npc&npcid=<?= $npcid ?>&z=<?= get_zone_by_npcid($npcid) ?>&zoneid=<?= get_zoneid_by_npcid($npcid) ?>"><?= $npcname ?>
                    - (<?= get_zone_by_npcid($npcid) ?>) -- ((<?= $faction_value[$factionvalue] ?>))</a><br>
            <?php endforeach; ?>
        <?php endif; ?>

        <?php if (empty($npcpri)): ?>
            No NPCs are assigned to this faction.
        <?php endif; ?>
    </div>
</div>