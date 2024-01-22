<div class="table_container" style="width: 350px">
    <div class="table_header">
        <div style="float: right">
            <a href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=58"><img
                        src="images/edit2.gif" style="border: 0;" alt="Edit Pet Icon" title="Edit pet entry"></a>
            <a onClick="return confirm('Really Delete Pet entry for <?= getNPCName($npcid) ?>?');"
               href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=57"><img
                        src="images/remove3.gif" style="border: 0;" alt="Delete Pet Icon" title="Delete Pet entry"></a>
        </div>
        Pet data for <?= getNPCName($npcid) ?> (<?= $npcid ?>)
    </div>
    <div class="table_content">
        <div style="padding: 5px 0 0 20px;">
            Type: <?= $type ?? "" ?><br>
            Petpower: <?= $petpower ?? "" ?><br>
            Petcontrol: <?= isset($petcontrol) ? $pet_control[$petcontrol] : ""; ?><br>
            Petnaming: <?= isset($petnaming) ? $pet_naming[$petnaming] : ""; ?><br>
            Monsterflag: <?= isset($monsterflag) ? $yesno[$monsterflag] : "no"; ?><br>
            Temp: <?= isset($temp) ? $yesno[$temp] : "no"; ?><br>
        </div>
    </div>
</div><br><br>

<div class="table_container" style="width: 350px">
    <div class="table_header">
        <div style="float:right">
            <?php if (isset($set_id) && $set_id > 0): ?>
                <a href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&set_id=<?= $set_id ?>&action=66"><img
                            src="images/add.gif" style="border: 0;" alt="Add Icon" title="Add equipementset entry"></a>
                <a onClick="return confirm('Really Remove Equipmentset <?= $set_id ?> from Pet <?= $type ?? "" ?>?');"
                   href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&set_id=<?= $set_id ?>&action=63"><img
                            src="images/minus2.gif" style="border: 0;" alt="Minus Icon"
                            title="Remove Equipmentset from this pet"></a>
                <a onClick="return confirm('Really Delete Equipmentset <?= $set_id ?> and all associated item entries?');"
                   href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&set_id=<?= $set_id ?>&action=62"><img
                            src="images/remove3.gif" style="border: 0;" alt="Remove Icon"
                            title="Delete Equipmentset and all entries"></a>
            <?php endif; ?>
        </div>
        <?php if (isset($set_id) && $set_id > 0): ?>
            <td>Equipmentset: <?= $setname ?? "" ?>
            <td style="text-align: center; width: 5%"><a
                        href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=64">(<?= $set_id ?>
                    )</a></td>
        <?php endif; ?>
        <?php if (isset($set_id) && $set_id < 1): ?>
            <td>Equipmentset:
            <td style="text-align: center; width: 5%"><a
                        href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=60">()</a>
            </td>
        <?php endif; ?>
    </div>

    <table class="table_content2" style="width: 100%;">
        <?php if (isset($equipment)): ?>
        <tr>
            <td style="text-align: center; width: 5%"><strong>Slot</strong></td>
            <td style="text-align: center; width: 20%"><strong>Item</strong></td>
            <th style="width: 5%;"></th>
        </tr>
        <?php $x = 0;
        foreach ($equipment as $key => $v): ?>
            <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA"; ?>">
                <td style="text-align: center; width: 5%"><?= $v['slot'] ?></td>
                <td style="text-align: center; width: 20%"><a
                            href="index.php?editor=items&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&id=<?= $v['item_id'] ?>&action=2"><?= get_item_name($v['item_id']) ?></a>
                    <span>[<a href="https://lucy.allakhazam.com/item.html?id=<?= $v['item_id'] ?>">lucy</a>]</span></td>
                <td style="text-align: right;">
                    <a href=index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&set_id=<?= $set_id ?? "" ?>&slot=<?= $v['slot'] ?>&action=69"><img
                                src="images/edit2.gif" style="border: 0;" alt="Edit Icon" title="Edit Entry"></a>
                    <a onClick="return confirm('Really Remove the Equipmentset Entry in slot <?= $v['slot'] ?>?');"
                       href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&set_id=<?= $set_id ?? "" ?>&slot=<?= $v['slot'] ?>&action=68"><img
                                src="images/remove3.gif" style="border: 0;" alt="Remove Icon"
                                title="Remove Equipmentset entry"></a>
                </td>
            </tr>
            <?php $x++; endforeach; ?>
    </table>
    <?php endif; ?>
    <?php if (!isset($equipment)): ?>
        <tr>
            <td style="text-align: left; width: 100px; padding: 10px;">No item entries.</td>
        </tr>
    <?php endif; ?>
</div>