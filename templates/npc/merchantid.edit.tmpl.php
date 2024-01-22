<table class="edit_form">
    <tr>
        <td class="edit_form_header">
            Change Merchant ID
        </td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <form name="merchant_id" method="post"
                  action="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=23">
                <label for="merchant_id">New Merchant ID:</label> <br>
                <?php if (isset($merchant_id) && $merchant_id > 0) { ?>
                    <input type="text" id="merchant_id" name="merchant_id" value="<?= $merchant_id ?>"><br><br>
                <?php } else { ?>
                    <input type="text" id="merchant_id" name="merchant_id" value="<?= $npcid ?>"><br><br>
                <?php } ?>
                <div class="center">
                    <input type="submit" value="Submit">
                    <br><br>

                    or<br><br>

                    <a href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&merchant_id=<?= $suggested_id ?? "" ?>&action=23">Assign
                        next available ID</a>
                </div>
            </form>
        </td>
    </tr>
</table>
