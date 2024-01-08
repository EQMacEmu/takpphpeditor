<div id="searchbar">
    <form action="index.php?editor=account&action=2" method="POST">
        <table style="width: 100%;">
            <tr>
                <td>
                    <strong>1.</strong>
                    Search by
                    <label for="lsaccount_id"></label><input type="text" id="lsaccount_id" name="lsaccount_id" size="10"
                                                             value="LS Acct ID"
                                                             onFocus="clearField(document.forms[0].lsaccount_id);document.forms[0].lsaccount_name.value='LS Acct Name';">
                    or
                    <label for="lsaccount_name"></label><input type="text" id="lsaccount_name" name="lsaccount_name"
                                                               size="12" value="LS Acct Name"
                                                               onFocus="clearField(document.forms[0].lsaccount_name);document.forms[0].lsaccount_id.value='LS Acct ID';">&nbsp;
                    <input type="submit" value=" GO ">
                </td>
            </tr>
        </table>
    </form>
</div>
