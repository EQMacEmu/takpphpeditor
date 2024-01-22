<div class="table_container" style="width:200px;">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0;">Result:</td>
                <td style="padding: 0; text-align: right;"><a
                            href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>">Go
                        Back</a></td>
            </tr>
        </table>
    </div>
    <form method="POST"
          action="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>">
        <div class="table_content">
            <div class="center">
                Next available ID: <?= $next_npcid ?? "" ?><br/><br/>
                <input type="hidden" name="selected_id" value="<?= $next_npcid ?? "" ?>">
                <input type="submit" value="Use this ID">
            </div>
        </div>
    </form>
</div>
