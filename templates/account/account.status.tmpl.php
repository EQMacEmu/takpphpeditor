<table class="edit_form">
    <tr>
        <td class="edit_form_header">Edit Account Status</td>
    </tr>
    <tr>
        <td class="edit_form_content">
            <form name="account_status" method="post"
                  action="index.php?editor=account&acctid=<?= $acctid ?? "" ?>&action=8">
                <label for="new_acct_status">Account Status:</label><br/>
                <input type="text" id="new_acct_status" name="new_acct_status"
                       value="<?= $cur_acct_status ?? "" ?>"><br/><br/>
                <div class="center"><input type="submit" value="Submit"></div>
            </form>
        </td>
    </tr>
</table>
