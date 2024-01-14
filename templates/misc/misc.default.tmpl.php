<table class="edit_form">
    <tr>
        <td class="edit_form_header">
            Options for <?= $currzone ?? "" ?>
        </td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <div class="center"><a
                        href="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=1">Fishing
                    for <?= $currzone ?? "" ?></a><br></div>
            <div class="center"><a
                        href="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=7">Forage
                    for <?= $currzone ?? "" ?></a><br></div>
            <div class="center"><a
                        href="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=13">Ground
                    Spawns in <?= $currzone ?? "" ?></a><br></div>
            <div class="center"><a
                        href="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=19">Traps
                    in <?= $currzone ?? "" ?></a><br></div>
            <div class="center"><a
                        href="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=35">View
                    Doors in <?= $currzone ?? "" ?></a><br></div>
            <div class="center"><a
                        href="index.php?editor=misc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=41">View
                    Objects in <?= $currzone ?? "" ?></a><br></div>
        </td>
    </tr>
</table>