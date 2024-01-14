      <div class="center">
        <iframe id='searchframe' src='templates/iframes/itemsearch.php'></iframe>
        <input id="button" type="button" value='Hide Item Search' onclick='hideSearch();' style='display:none; margin-bottom: 20px;'>
      </div>
      <form name="component" method="post" action="index.php?editor=tradeskill&ts=<?=$ts?>&rec=<?=$rec?>&id=<?=$id?>&action=6">
        <div class="edit_form" style="width: 200px;">
          <div class="edit_form_header">Edit Recipe Component</div>
          <div class="edit_form_content">
              <strong><label for="id">Item ID:</label></strong> (<a href="javascript:showSearch();">search</a>)<br>
            <input class="indented" id="id" type="text" name="item_id" size="7" value="<?=$item_id ?? ""?>"><br><br>
            <fieldset>
              <legend><strong><span style="font-size: 13px;">Containers:</span></strong></legend>
                <label for="iscontainer">Is this the container?</label><br>
              <select class="indented" id="iscontainer" name='iscontainer'>
                <option value="0"<?php echo(isset($iscontainer) && $iscontainer == 0) ? " selected" : ""?>>no</option>
                <option value="1"<?php echo(isset($iscontainer) && $iscontainer == 1) ? " selected" : ""?>>yes</option>
              </select>
            </fieldset><br><br>
            <fieldset>
              <legend><strong><span style="font-size: 13px;">Components:</span></strong></legend>
                <label for="componentcount">Qty Required:</label><br>
              <input class="indented" type="text" id="componentcount" name="componentcount" size="7" value="<?=$componentcount ?? ""?>"><br><br>
                <label for="failcount">Qty Returned on Fail:</label><br>
              <input class="indented" type="text" id="failcount" name="failcount" size="7" value="<?=$failcount ?? ""?>"><br><br>
            </fieldset><br><br>
            <fieldset>
              <legend><strong><span style="font-size: 13px;">Products:</span></strong></legend>
                <label for="successcount">Qty Produced:</label> <br>
              <input class="indented" type="text" id="successcount" name="successcount" size="7" value="<?=$successcount ?? ""?>">
            </fieldset><br>
            <div class="center">
              <input type="hidden" name="id" value="<?=$id?>">
              <input type="hidden" name="recipe_id" value="<?=$recipe_id ?? ""?>">
              <input type="submit" name="submit" value="Submit Changes">
            </div>
          </div>
        </div>
      </form>
