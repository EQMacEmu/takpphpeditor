<div class="table_container" style="width: 250px;">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0; text-align: left;">NPCs using Emote Set <?= $emoteid ?></td>
                <td style="padding: 0; text-align: right;">
                    <a href="index.php?editor=npc&action=78">
                        <img src="images/c_table.gif" style="border: 0;" alt="View Icon" title="View all emotes">
                    </a>
                    <a href="index.php?editor=npc&emoteid=<?= $emoteid ?>&action=72">
                        <img src="images/edit2.gif" width="13" height="13" style="border: 0;" alt="Edit Icon"
                             title="Back to Emote Set <?= $emoteid ?>">
                    </a>
                </td>
            </tr>
        </table>
    </div>
    <table class="table_content2" style="width: 100%;">
        <?php if (isset($npclist)): ?>
            <tr>
                <td style="text-align: center;"><strong>ID</strong></td>
                <td style="text-align: center;"><strong>Name</strong></td>
            </tr>
            <?php $x = 0;
            foreach ($npclist as $npc): extract($npc) ?>
                <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA"; ?>">
                    <td style="text-align: center; width: 20%;"><a
                                href="index.php?editor=npc&npcid=<?= $npc['id'] ?>"><?= $npc['id'] ?></a></td>
                    <td style="text-align: center; width: 80%;"><a
                                href="index.php?editor=npc&npcid=<?= $npc['id'] ?>"><?= $npc['name'] ?></a></td>
                </tr>
                <?php $x++;
            endforeach;
        else:?>
            <tr>
                <td style="text-align: left; width: 100px; padding: 10px;">No NPCs using this Emote Set</td>
            </tr>
        <?php endif; ?>
    </table>
</div>
