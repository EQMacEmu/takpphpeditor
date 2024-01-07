<div class="table_container" style="width: 500px">
    <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0;">Loottables using Lootdrop <?= $ldid ?? "" ?></td>
                <td style="padding: 0; text-align: right;">
                </td>
            </tr>
        </table>
    </div>

    <table class="table_content2" style="width: 100%;">
        <?php if (!empty($ldrop)): ?>
            <tr>
                <td style="text-align: center; width: 5%;"><strong>ID</strong></td>
                <td style="text-align: center; width: 45%;"><strong>Table Name</strong></td>
                <td style="text-align: center; width: 45%;"><strong>NPC Name</strong></td>
                <th style="width: 5%;"></th>
            </tr>
            <?php foreach ($ldrop as $loot_drop): ?>
                <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA"; ?>">
                    <td style="text-align: center; width: 5%;"><a
                                href="index.php?editor=loot&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $loot_drop['npcid'] ?>"> <?= $loot_drop['loottid'] ?>
                    </td>
                    <td style="text-align: center; width: 45%;"><?= $loot_drop['loottname'] ?></td>
                    <td style="text-align: center; width: 50%;"><?= $loot_drop['npcname'] ?>(level <?= $loot_drop['npclevel'] ?>
                        )
                    </td>
                    <?php $x++; ?>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if (empty($ldrop)): ?>
            <tr>
                <td style="text-align: left; width: 100%; padding: 10px;">Lootdrop is not assigned to any Loottables.</td>
            </tr>
        <?php endif; ?>
    </table>

 