<div class="edit_form" style="width: 250px">
    <div class="edit_form_header">
        Respawn Time: <?= $id ?>
    </div>

    <div class="edit_form_content">
        <form name="respawntimes" method="post"
              action=index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&sid=<?= $sid ?>&spid=<?= $spid ?>&action=48">
            <table style="width: 100%;">
                <tr>
                    <th><label for="start">Start:</label></th>
                    <th><label for="duration">Duration:</label></th>
                </tr>
                <tr>
                    <td><input type="text" size="10" id="start" name="start" value="<?= $start ?? "" ?>"></td>
                    <td><input type="text" size="10" id="duration" name="duration" value="<?= $duration ?? "" ?>"></td>
                </tr>
            </table>
            <br><br>

            <div class="center">
                <input type="hidden" name="rid" value="<?= $id ?>">
                <input type="submit" name="submit" value="Submit Changes">
            </div>
        </form>
    </div>
</div>