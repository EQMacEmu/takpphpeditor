<div class="center">
    <div class="table_container" style="display: inline-block">
        <div class="table_header">
            NPCs assigned to grid <?= $pathgrid ?>
        </div>
        <table class="table_content">
            <?php if ($grid_npcs != ''): ?>
                <tr>
                    <td style="padding: 2px;"><b>NPC Name</b></td>
                    <td style="padding: 2px;"><b>Spawngroup</b></td>
                    <td style="padding: 2px;"><b>Spawnpoint ID</b></td>
                </tr>
                <?php foreach ($grid_npcs as $grid_npc): extract($grid_npc); ?>
                    <tr>
                        <td style="padding: 2px;">
                            <a href="index.php?editor=spawn&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcid ?>"><?= getNPCName($npcid) ?></a>
                        </td>
                        <td style="padding: 2px;">
                            <?= $name ?> (<?= $spawngroupid ?>)
                        </td>
                        <td style="padding: 2px;">
                            <?= $spawn2id ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php if ($grid_npcs == ''): ?>
                <tr>
                    <td style="padding: 2px;">Your search produced no results!</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</div>