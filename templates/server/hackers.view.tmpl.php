<form name="hacker">
    <div class="table_container" style="width: 750px;">
        <div class="table_header">
            <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
                <tr>
                    <td style="padding: 0;">View Hacker <?= $hid ?? "" ?></td>
                </tr>
            </table>
        </div>
        <div class="edit_form_content">
            <div class="center">
                <fieldset style="text-align: left;">
                    <table style="width: 100%;">
                        <tr>
                            <td style="text-align: center; width: 5%"><strong>ID</strong></td>
                            <td style="text-align: center; width: 5%"><strong>Account</strong></td>
                            <td style="text-align: center; width: 5%"><strong>Name</strong></td>
                            <td style="text-align: center; width: 5%"><strong>Zone</strong></td>
                            <td style="text-align: center; width: 15%"><strong>Date</strong></td>
                        </tr>
                        <tr>
                            <td style="text-align: center; width: 5%"><?= $hid ?? "" ?></td>
                            <td style="text-align: center; width: 5%"><?= $account ?? "" ?></td>
                            <td style="text-align: center; width: 5%"><?= $name ?? "" ?></td>
                            <td style="text-align: center; width: 5%"><?= $zone ?></td>
                            <td style="text-align: center; width: 15%"><?= $date ?? "" ?></td>
                        </tr>
                    </table>
                </fieldset>
                <br>
                <fieldset>
                    <legend><strong>Text</strong></legend>
                    <table style="width: 100%;">
                        <tr>
                            <td style="text-align: center; width: 100%"><?= $hacked ?? "" ?></td>
                        </tr>
                    </table>
                </fieldset>
                <br>
            </div>
        </div>
    </div>
</form>
