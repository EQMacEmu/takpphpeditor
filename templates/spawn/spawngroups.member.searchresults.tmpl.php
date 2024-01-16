<table class="edit_form">
    <tr>
        <td class="edit_form_header">
            Search Results
        </td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <?php if ($results != ''): ?>
                <ul>
                    <?php foreach ($results as $result): extract($result); ?>
                        <li>
                            <a href="index.php?editor=spawn&z=<?= $currzone ?>&zoneid=<?= $currzoneid ?>&npcid=<?= $npcid ?>&minx=<?= $minx ?>&miny=<?= $miny ?>&maxx=<?= $maxx ?>&maxy=<?= $maxy ?>&limit=<?= $limit ?>&npcname=<?= $npcname ?>&npc=<?= $id ?>&action=69"><?= $name ?>
                                (<?= $id ?>) (<?= get_zone_by_npcid($id) ?>) - Level <?= $level ?></a></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <?php if ($results == ''): ?>
                <div class="center">
                    Your search produced no results!<br><br>
                    <a href="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&minx=<?= $minx ?? "" ?>&miny=<?= $miny ?? "" ?>&maxx=<?= $maxx ?? "" ?>&maxy=<?= $maxy ?? "" ?>&limit=<?= $limit ?? "" ?>&npcname=<?= $npcname ?? "" ?>&action=69">Try
                        again</a>
                </div>
            <?php endif; ?>
        </td>
    </tr>
</table>
