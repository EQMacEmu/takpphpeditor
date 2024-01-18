<div class="edit_form" style="width: 750px">
    <div class="edit_form_header">Add Variable</div>
    <div class="edit_form_content">
        <form name="variables" method="post" action="index.php?editor=server&action=47">
            <b><label for="varname">Variable Name:</label></b><br/>
            <input type="text" size="30" id="varname" name="varname" value=""><br/><br/>
            <b><label for="value">Value:</label></b><br/>
            <textarea cols="87" rows="3" id="value" name="value"></textarea><br/><br/>
            <b><label for="information">Information:</label></b><br/>
            <textarea cols="87" rows="3" id="information" name="information"></textarea><br/><br/>
            <b><label for="ts">Timestamp:</label></b><br/>
            <input type="text" size="25" id="ts" name="ts" value="<?= get_current_time(); ?>"><br/><br/>
            <span class="center">
            <input type="submit" value="Create Variable">&nbsp;<input type="button" value="Cancel"
                                                                      onClick="history.back();">
          </span>
        </form>
    </div>
</div>
