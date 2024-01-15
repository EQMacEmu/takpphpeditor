<table class="edit_form">
    <tr>
        <td class="edit_form_header">Options for <?= $currzone ?? "" ?></td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <div class="center"><a
                        href="index.php?editor=zone&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=1">Zone
                    Data for <?= $currzone ?? "" ?></a><br></div>
            <div class="center"><a
                        href="index.php?editor=zone&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=12">View
                    Zone Points for <?= $currzone ?? "" ?></a><br></div>
            <div class="center"><a
                        href="index.php?editor=zone&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=10">View
                    Graveyard List</a><br></div>
            <div class="center"><a
                        href="index.php?editor=zone&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=18">View
                    Blocked Spells for <?= $currzone ?? "" ?></a><br></div>
        </td>
    </tr>
</table>
