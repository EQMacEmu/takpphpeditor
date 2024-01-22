<form method="post"
      action="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=77">
    <div class="edit_form" style="width: 550px;">
        <div class="edit_form_header">
            Add emote to set <?= $emoteid ?>
        </div>
        <div class="edit_form_content">
            <table style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <tr>
                    <td style="padding: 5px;">
                        <label for="id">EmoteID:</label><br/>
                        <input id="id" type="text" name="emoteid" size="7" value="<?= $emoteid ?>">
                    </td>
                    <td style="padding: 5px;">
                        <label for="event_">Event:</label><br/>
                        <select id="event_" name="event_">
                            <?php foreach ($eventtype as $key => $value): ?>
                                <option value="<?= $key ?>"><?= $key ?>: <?= $value ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td style="padding: 5px;">
                        <label for="type">Type:</label><br/>
                        <select id="type" name="type">
                            <?php foreach ($emotetype as $key => $value): ?>
                                <option value="<?= $key ?>"><?= $key ?>: <?= $value ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 5px;" colspan="3">
                        <label for="text">Emote:</label><br/>
                        <textarea id="text" name="text" rows="6" cols="62"></textarea>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 5px; text-align: center;" colspan="3"><input type="submit" value="Add Emote">&nbsp;<input type="button"
                                                                                                       value="Cancel"
                                                                                                       onClick="history.back();"
                    </td>
                </tr>
            </table>
        </div>
    </div>
</form>
