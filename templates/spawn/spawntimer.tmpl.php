<div class="table_container" style="width: 350px">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0;">Spawn Status</td>
                <td style="padding: 0; text-align: right;">
                </td>
            </tr>
        </table>
    </div>

    <table class="table_content2" style="width: 100%;">
        <tr>
            <?php if (isset($spawned)): ?>
                <td style="width: 80%;">This spawnpoint is waiting to spawn in-game</td>
                <td style="text-align: right;">
                    <a href="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&sid=<?= $sid ?>&spid=<?= $spid ?>&action=47"><img
                                src="images/edit2.gif" style="border: 0;" alt="Edit Icon"
                                title="Edit directly (Not recommended)"></a>
                    <a href="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&sid=<?= $sid ?>&spid=<?= $spid ?>&action=30"><img
                                src="images/remove3.gif" style="border: 0;" alt="Forced Respawn Icon"
                                title="Force respawn"></a>
                </td>
            <?php endif; ?>
            <?php if (!isset($spawned)): ?>
                <td style="width: 25%;">This spawnpoint is currently spawned in-game</td>
            <?php endif; ?>
        </tr>
    </table>
</div>
 