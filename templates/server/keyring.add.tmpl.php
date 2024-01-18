<div class="center">
    <iframe id='searchframe' src='templates/iframes/itemsearch.php'></iframe>
    <input id="button" type="button" value='Hide Item Search' onclick='hideSearch("searchframe");'
           style='display:none; margin-bottom: 20px;'>
</div>

<div class="edit_form" style="width: 400px">
    <div class="edit_form_header">Add Keyring</div>
    <div class="edit_form_content">
        <form name="keyring_add" method="post" action="index.php?editor=server&action=59">
            <strong><label for="key_item">Enter a Key Item:</label></strong> (<a
                    href="javascript:showSearch('searchframe');">search</a>)<br>
            <input class="indented" type="text" size="5" id="key_item" name="key_item"><br><br>
            <table style="width: 100%;">
                <tr>
                    <th style="padding-left: 20px;"><label for="key_name">Name</label></th>
                </tr>
                <tr>
                    <td style="padding-left: 20px; padding-bottom: 20px;"><input type="text" size="30" id="key_name" name="key_name" value=""></td>
                </tr>
                <tr>
                    <th style="padding-left: 20px;"><label for="zoneid">ZoneID</label></th>
                    <th><label for="stage">Stage</label></th>
                </tr>
                <tr>
                    <td style="padding-left: 20px;"><input type="text" size="5" id="zoneid" name="zoneid" value=""></td>
                    <td style="padding-right: 20px;"><input type="text" size="5" id="stage" name="stage" value="0"></td>
                </tr>
            </table>
            <br><br>
            <div class="center"><input type="submit" value="Submit Changes"></div>
        </form>
    </div>
</div>
