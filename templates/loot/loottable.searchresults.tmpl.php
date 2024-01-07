<table class="edit_form">
    <tr>
        <td class="edit_form_header">
            Search Results
        </td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <?php if (!empty($results)): ?>
                <?php foreach ($results as $result): ?>
                    <a href="index.php?editor=loot&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=13&id=<?= $result['id'] ?>"><?= $result['name'] ?></a>
                    <br>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php if (empty($results)): ?>
                <div class="center">
                    Your search produced no results!<br><br>
                    <a href="index.php?editor=loot&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=14">Try
                        again</a>
                </div>
            <?php endif; ?>
        </td>
    </tr>
</table>
