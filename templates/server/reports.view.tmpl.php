<form name="reports">
    <div class="table_container" style="width: 750px;">
        <div class="table_header">
            <table style="width: 100%; border-collapse: collapse; border-spacing: 0; ">
                <tr>
                    <td style="padding: 0;">View Report <?= $rid ?? "" ?></td>
                </tr>
            </table>
        </div>
        <div class="edit_form_content">
            <div class="center">
                <fieldset style="text-align: left;">
                    <table style="width: 100%;">
                        <tr>
                            <td style="text-align: center; width: 5%"><strong>ID</strong></td>
                            <td style="text-align: center; width: 15%"><strong>Name</strong></td>
                            <td style="text-align: center; width: 80%"><strong>Reported</strong></td>
                        </tr>
                        <tr>
                            <td style="text-align: center; width: 5%"><?= $rid ?? "" ?></td>
                            <td style="text-align: center; width: 15%"><?= $name ?? "" ?></td>
                            <td style="text-align: center; width: 80%"><?= $reportedi ?? "" ?></td>
                        </tr>
                    </table>
                </fieldset>
                <br>
                <fieldset>
                    <legend><strong>Text</strong></legend>
                    <table style="width: 100%;">
                        <tr>
                            <td>
                                <label for="text"></label>
                                <textarea id="text" name="text" rows="20"
                                          cols="86"><?= $reported_text ?? "" ?></textarea>
                            </td>
                        </tr>
                    </table>
                </fieldset>
                <br>
            </div>
        </div>
    </div>
</form>
