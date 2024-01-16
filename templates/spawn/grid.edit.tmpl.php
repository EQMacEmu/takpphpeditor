<table class="edit_form">
    <tr>
        <td class="edit_form_header">
            Grid: <?= $pathgrid ?>
        </td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <form name="grid" id="grid" method="post"
                  action="index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&spid=<?= $spid ?>&pathgrid=<?= $pathgrid ?>&action=22">
                <strong><label for="type">Wander Type:</label></strong><br>
                <select class="indented" id="type" name="type">
                    <?php foreach ($wandertype as $k => $v): ?>
                        <option value="<?= $k ?>"<?php echo (isset($type) && $k == $type) ? " selected" : "" ?>><?= $v ?></option>
                    <?php endforeach; ?>
                </select><br><br>
                <strong><label for="type2">Pause Type:</label></strong><br>
                <select class="indented" id="type2" name="type2">
                    <?php foreach ($pausetype as $k => $v): ?>
                        <option value="<?= $k ?>"<?php echo (isset($type2) && $k == $type2) ? " selected" : "" ?>><?= $v ?></option>
                    <?php endforeach; ?>
                </select><br><br>
                <div class="center">
                    <input type="hidden" name="pathgrid" value="<?= $pathgrid ?>">
                    <input type="submit" name="submit" value="Submit Changes">
                </div>
            </form>
        </td>
    </tr>
</table>