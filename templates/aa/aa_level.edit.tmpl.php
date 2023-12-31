<div class="edit_form" style="width:250px;">
    <div class="edit_form_header">
        Edit Level and Cost of Rank: <?= $rank ?? "" ?><br/>
    </div>
    <div class="edit_form_content">
        <form name="aa_level" method="post"
              action="index.php?editor=aa&aaid=<?= $aaid ?? "" ?>&rank=<?= $rank ?? "" ?>&action=20">
            <label for="level">Level:</label><br/>
            <input type="text" id="level" name="level" size="5" value="<?= $level ?? "" ?>"><br/><br/>
            <label for="cost">Cost:</label><br/>
            <input type="text" id="cost" name="cost" size="5" value="<?= $cost ?? "" ?>"><br/><br/>
            <label for="description">Description:</label><br/>
            <input type="text" id="description" name="description" size="30"
                   value="<?= $description ?? "" ?>"><br/><br/>
            <div class="center"><input type="submit" value="Submit Changes"></div>
        </form>
    </div>
</div>
