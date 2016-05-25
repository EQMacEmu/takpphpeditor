   <center>
      <iframe id='searchframe' src='templates/iframes/itemsearch.php'></iframe>
      <input id="button" type="button" value='Hide Item Search' onclick='hideSearch("searchframe");' style='display:none; margin-bottom: 20px;'>
   </center>
  
   <div class="edit_form" style="width: 400px">
          <div class="edit_form_header">Add Keyring</div>
          <div class="edit_form_content">
            <form name="keyring_add" method="post" action="index.php?editor=server&action=59">
              <table width="100%">
                <tr>
                  <th>Name</th>
                  <th>ZoneID</th>
                  <th>Stage</th>
                </tr>
                <tr>
                  <strong>Enter a Key Item:</strong> (<a href="javascript:showSearch('searchframe');">search</a>)<br>
                  <input class="indented" id="id" type="text" size="5" name="key_item"><br><br>
                  <td><input type="text" size="30" name="key_name" value=""></td>
                  <td><input type="text" size="5" name="zoneid" value=""></td>
                  <td><input type="text" size="5" name="stage" value="0"></td>
                </tr>
              </table><br><br>
              <center><input type="submit" value="Submit Changes"></center>
            </form>
          </div>
        </div>
