<div class="table_container" style="width: 700px;">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0;">NPC Emotes</td>
                <td style="padding: 0; text-align: right;">
                    <a href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=78"><img
                                src="images/c_table.gif" style="border: 0;" alt="View Emotes Icon"
                                title="View all emotes"></a>
                    <a href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&emoteid=<?= $emoteid ?>&action=79"><img
                                src="images/view_all.gif" style="border: 0;" width="15" alt="View NPCs Icon"
                                title="View NPCs using this emote set"></a>
                    <a href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&emoteid=<?= $emoteid ?>&action=90"><img
                                src="images/add.gif" style="border: 0;" alt="Add Icon"
                                title="Add an entry to this emote set"></a>
                    <?php
                    $currzone = $currzone ?? "";
                    $currzoneid = $currzoneid ?? "";
                    echo ($npcid > 0) ? "<a href='index.php?editor=npc&z=$currzone&zoneid=$currzoneid&npcid=$npcid&emoteid=$emoteid&npcid=$npcid&action=82'><img src='images/minus2.gif' style='border: 0;' alt='Minus Icon' title='Drop emote set from this NPC'></a>" : ""; ?>
                </td>
            </tr>
        </table>
    </div>
    <table class="table_content2" style="width: 100%;">
        <?php if (isset($emotes)): ?>
            <tr>
                <td style="text-align: center; width: 10%"><strong>EmoteID</strong></td>
                <td style="text-align: center; width: 10%"><strong>Event</strong></td>
                <td style="text-align: center; width: 10%"><strong>Type</strong></td>
                <td style="text-align: center; width: 65%"><strong>Text</strong></td>
                <th style="width: 5%;"></th>
            </tr>
            <?php $x = 0;
            foreach ($emotes as $key => $v): ?>
                <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA"; ?>">
                    <td style="text-align: center; width: 10%"><?= $v['emoteid'] ?></td>
                    <td style="text-align: center; width: 10%"><?= $eventtype[$v['event_']] ?></td>
                    <td style="text-align: center; width: 10%"><?= $emotetype[$v['type']] ?></td>
                    <td style="text-align: center; width: 65%"><?= html_replace($v['text']) ?></td>
                    <td style="text-align: right;">
                        <a href="index.php?editor=npc&id=<?= $v['id'] ?>&emoteid=<?= $v['emoteid'] ?>&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=74"><img
                                    src="images/edit2.gif" style="border: 0;" alt="Edit Icon"
                                    title="Edit this entry"></a>
                        <a onClick="return confirm('Really Delete Entry <?= $v['id'] ?>?');"
                           href="index.php?editor=npc&emoteid=<?= $v['emoteid'] ?>&id=<?= $v['id'] ?>&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=73"><img
                                    src="images/remove3.gif" style="border: 0;" alt="Delete Icon"
                                    title="Delete this entry"></a>
                    </td>
                </tr>
                <?php $x++; endforeach; ?>
        <?php endif; ?>
        <?php if (!isset($emotes)): ?>
            <tr>
                <td style="text-align: left; width: 100px; padding: 10px;">No NPC Emotes</td>
            </tr>
        <?php endif; ?>
    </table>
</div>
