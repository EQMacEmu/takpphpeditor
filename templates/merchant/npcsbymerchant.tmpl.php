<div class="table_container" style="width: 250px">
    <div class="table_header">
        <span>NPCs using Merchantlist <?= $merid ?? "" ?></span>
    </div>
    <div class="table_content">
        <?php if (!empty($merlist)): ?>
            <?php foreach ($merlist as $merchant_list): ?>
                <td style="text-align: center; width: 5%;"><a
                            href="index.php?editor=npc&z=<?= get_zone_by_npcid($merchant_list['npcid']) ?>&npcid=<?= $merchant_list['npcid'] ?>"> <?= $merchant_list['name'] ?>
                        - (<?= get_zone_by_npcid($merchant_list['npcid']) ?>)</td><br>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if (empty($merlist)): ?>
        <tr>
            <td style="padding: 10px; text-align: left; width: 100%;">Merchantlist is not assigned to any NPCs.</td>
            <?php endif; ?>
    </div>
</div>
            