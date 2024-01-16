<div class="edit_form" style="width: 500px">
    <div class="edit_form_header">
        Add Spawn Event
    </div>

    <div class="edit_form_content">
        <form name="spawnevent" method="post"
              action=index.php?editor=spawn&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&spid=<?= $spid ?>&action=41">
            <table style="width: 100%;">
                <tr>
                    <th><label for="sename">Name:</label></th>
                    <th><label for="cond_id">Cond ID:</label></th>
                    <th><label for="period">Period:</label></th>
                    <th><label for="next_minute">Next Min:</label></th>
                    <th><label for="next_hour">Next Hour:</label></th>
                    <th><label for="next_day">Next Day:</label></th>
                </tr>
                <tr>
                    <td><input type="text" size="15" id="sename" name="sename" value=""></td>
                    <td><input type="text" size="7" id="cond_id" name="cond_id" value="0"></td>
                    <td><input type="text" size="7" id="period" name="period" value="0"></td>
                    <td><input type="text" size="7" id="next_minute" name="next_minute" value="0"></td>
                    <td><input type="text" size="7" id="next_hour" name="next_hour" value="1"></td>
                    <td><input type="text" size="7" id="next_day" name="next_day" value="1"></td>
                </tr>
                <tr>
                    <th><label for="next_month">Next Month:</label></th>
                    <th><label for="next_year">Next Year:</label></th>
                    <th><label for="argument">Argument:</label></th>
                    <th><label for="action">Action:</label></th>
                    <th><label for="enabled">Enabled:</label></th>
                    <th><label for="strict">Strict:</label></th>

                </tr>
                <tr>
                    <td><input type="text" size="15" id="next_month" name="next_month" value="1"></td>
                    <td><input type="text" size="7" id="next_year" name="next_year" value="3100"></td>
                    <td><input type="text" size="7" id="argument" name="argument" value="0"></td>
                    <td>
                        <select id="action" name="action">
                            <option value="0"<?php echo ($action == 0) ? " selected" : "" ?>>Set</option>
                            <option value="1"<?php echo ($action == 1) ? " selected" : "" ?>>Add</option>
                            <option value="2"<?php echo ($action == 0) ? " selected" : "" ?>>Subtract</option>
                            <option value="3"<?php echo ($action == 1) ? " selected" : "" ?>>Multiply</option>
                            <option value="4"<?php echo ($action == 0) ? " selected" : "" ?>>Divide</option>
                        </select>
                    </td>
                    <td>
                        <select id="enabled" name="enabled">
                            <option value="0"<?php echo ($enabled == 0) ? " selected" : "" ?>>No</option>
                            <option value="1"<?php echo ($enabled == 1) ? " selected" : "" ?>>Yes</option>
                        </select>
                    </td>
                    <td>
                        <select id="strict" name="strict">
                            <option value="0"<?php echo (isset($strict) && $strict == 0) ? " selected" : "" ?>>No
                            </option>
                            <option value="1"<?php echo (isset($strict) && $strict == 1) ? " selected" : "" ?>>Yes
                            </option>
                        </select>
                    </td>
                </tr>
            </table>
            <br><br>

            <div class="center">
                <input type="submit" value="Submit Changes">
            </div>
        </form>
    </div>
</div>