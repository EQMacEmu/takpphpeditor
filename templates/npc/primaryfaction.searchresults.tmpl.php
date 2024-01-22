<table class="edit_form">
    <tr>
        <td class="edit_form_header">
            Search Results
        </td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <?php if (!empty($results)): ?>
                <ul style="padding-left: 20px;">
                    <?php foreach ($results as $result): ?>
                        <li>
                            <a href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&fid=<?= $result['id'] ?>&action=14"><?= $result['name'] ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <?php if (empty($results)): ?>
                <div class="center">
                    Your search produced no results!<br><br>
                    <a href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=6">Try
                        again</a>
                </div>
            <?php endif; ?>
        </td>
    </tr>
</table>
