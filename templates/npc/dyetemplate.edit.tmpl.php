<div class="edit_form" style="width: 300px">
    <div class="edit_form_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 0;">Edit Armor tint ID <?= $id ?></td>
                <td style="padding: 0; text-align: right;">
                    <a onClick="return confirm('Really Delete Tint <?= $id ?>?');"
                       href="index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&tint_id=<?= $id ?>&action=37"><img
                                src="images/remove3.gif" style="border: 0;" alt="Delete Entry Icon" title="Delete this entry"></a>
                </td>
            </tr>
        </table>
    </div>

    <div class="edit_form_content">
        <form name="Armor tint" method="post"
              action=index.php?editor=npc&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=34">
            <table style="width: 100%;">
                <tr>
                    <td style="text-align: left; width: 33%;">&nbsp;</td>
                    <td style="text-align: left; width: 33%;">&nbsp;</td>
                    <td style="text-align: left; width: 34%;">&nbsp;</td>
                </tr>
                <tr>
                    <th><label for="red1h">Red Helm</label></th>
                    <th><label for="grn1h">Green Helm</label></th>
                    <th><label for="blu1h">Blue Helm</label></th>
                </tr>
                <tr>
                    <td><input type="text" size="5" id="red1h" name="red1h" value="<?= $red1h ?? "" ?>"></td>
                    <td><input type="text" size="5" id="grn1h" name="grn1h" value="<?= $grn1h ?? "" ?>"></td>
                    <td><input type="text" size="5" id="blu1h" name="blu1h" value="<?= $blu1h ?? "" ?>"></td>
                </tr>
                <tr>
                    <th><label for="red2c">Red Chest</label></th>
                    <th><label for="grn2c">Green Chest</label></th>
                    <th><label for="blu2c">Blue Chest</label></th>
                </tr>
                <tr>
                    <td><input type="text" size="5" id="red2c" name="red2c" value="<?= $red2c ?? "" ?>"></td>
                    <td><input type="text" size="5" id="grn2c" name="grn2c" value="<?= $grn2c ?? "" ?>"></td>
                    <td><input type="text" size="5" id="blu2c" name="blu2c" value="<?= $blu2c ?? "" ?>"></td>
                </tr>
                <tr>
                    <th><label for="red3a">Red Arms</label></th>
                    <th><label for="grn3a">Green Arms</label></th>
                    <th><label for="blu3a">Blue Arms</label></th>
                </tr>
                <tr>
                    <td><input type="text" size="5" id="red3a" name="red3a" value="<?= $red3a ?? "" ?>"></td>
                    <td><input type="text" size="5" id="grn3a" name="grn3a" value="<?= $grn3a ?? "" ?>"></td>
                    <td><input type="text" size="5" id="blu3a" name="blu3a" value="<?= $blu3a ?? "" ?>"></td>
                </tr>
                <tr>
                    <th><label for="red4b">Red Bracers</label></th>
                    <th><label for="grn4b">Green Bracers</label></th>
                    <th><label for="blu4b">Blue Bracers</label></th>
                </tr>
                <tr>
                    <td><input type="text" size="5" id="red4b" name="red4b" value="<?= $red4b ?? "" ?>"></td>
                    <td><input type="text" size="5" id="grn4b" name="grn4b" value="<?= $grn4b ?? "" ?>"></td>
                    <td><input type="text" size="5" id="blu4b" name="blu4b" value="<?= $blu4b ?? "" ?>"></td>
                </tr>
                <tr>
                    <th><label for="red5g">Red Gloves</label></th>
                    <th><label for="grn5g">Green Gloves</label></th>
                    <th><label for="blu5g">Blue Gloves</label></th>
                </tr>
                <tr>
                    <td><input type="text" size="5" id="red5g" name="red5g" value="<?= $red5g ?? "" ?>"></td>
                    <td><input type="text" size="5" id="grn5g" name="grn5g" value="<?= $grn5g ?? "" ?>"></td>
                    <td><input type="text" size="5" id="blu5g" name="blu5g" value="<?= $blu5g ?? "" ?>"></td>
                </tr>
                <tr>
                    <th><label for="red6l">Red Legs</label></th>
                    <th><label for="grn6l">Green Legs</label></th>
                    <th><label for="blu6l">Blue Legs</label></th>
                </tr>
                <tr>

                    <td><input type="text" size="5" id="red6l" name="red6l" value="<?= $red6l ?? "" ?>"></td>
                    <td><input type="text" size="5" id="grn6l" name="grn6l" value="<?= $grn6l ?? "" ?>"></td>
                    <td><input type="text" size="5" id="blu6l" name="blu6l" value="<?= $blu6l ?? "" ?>"></td>
                </tr>
                <tr>
                    <th><label for="red7f">Red Feet</label></th>
                    <th><label for="grn7f">Green Feet</label></th>
                    <th><label for="blu7f">Blue Feet</label></th>
                </tr>
                <tr>
                    <td><input type="text" size="5" id="red7f" name="red7f" value="<?= $red7f ?? "" ?>"></td>
                    <td><input type="text" size="5" id="grn7f" name="grn7f" value="<?= $grn7f ?? "" ?>"></td>
                    <td><input type="text" size="5" id="blu7f" name="blu7f" value="<?= $blu7f ?? "" ?>"></td>
                </tr>
                <tr>
                    <th><label for="red8x">Red Pri</label></th>
                    <th><label for="grn8x">Green Pri</label></th>
                    <th><label for="blu8x">Blue Pri</label></th>
                </tr>
                <tr>
                    <td><input type="text" size="5" id="red8x" name="red8x" value="<?= $red8x ?? "" ?>"></td>
                    <td><input type="text" size="5" id="grn8x" name="grn8x" value="<?= $grn8x ?? "" ?>"></td>
                    <td><input type="text" size="5" id="blu8x" name="blu8x" value="<?= $blu8x ?? "" ?>"></td>
                </tr>
                <tr>
                    <th><label for="red9x">Red Sec</label></th>
                    <th><label for="grn9x">Green Sec</label></th>
                    <th><label for="blu9x">Blue Sec</label></th>
                </tr>
                <tr>
                    <td><input type="text" size="5" id="red9x" name="red9x" value="<?= $red9x ?? "" ?>"></td>
                    <td><input type="text" size="5" id="grn9x" name="grn9x" value="<?= $grn9x ?? "" ?>"></td>
                    <td><input type="text" size="5" id="blu9x" name="blu9x" value="<?= $blu9x ?? "" ?>"></td>
                </tr>
            </table>
            <br><br>
            <div class="center">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="hidden" name="npcid" value="<?= $npcid ?>">
                <input type="submit" value="Submit Changes">
            </div>
        </form>
    </div>
</div>
