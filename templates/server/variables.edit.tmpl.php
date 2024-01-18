<div class="edit_form" style="width: 750px">
    <div class="edit_form_header">Edit Variable</div>
    <div class="edit_form_content">
        <form name="variables" method="post" action="index.php?editor=server&action=45">
            <b><label for="varname">Variable Name:</label></b><br/>
            <input type="text" size="30" id="varname" name="varname" value="<?= $varname ?>"><br/><br/>
            <b><label for="value">Value:</label></b><br/>
            <textarea cols="87" rows="3" id="value" name="value"><?= $value ?? "" ?></textarea><br/><br/>
            <b><label for="information">Information:</label></b><br/>
            <textarea cols="87" rows="3" id="information"
                      name="information"><?= $information ?? "" ?></textarea><br/><br/>
            <b><label for="ts">Timestamp:</label></b><br/>
            <input type="text" size="25" id="ts" name="ts" value="<?= $ts ?>"><br/><br/>
            <div class="center">
                <input type="submit" value="Submit Changes">&nbsp;<input type="button" value="Cancel Changes"
                                                                         onClick="history.back();">
            </div>
        </form>
    </div>
</div>
