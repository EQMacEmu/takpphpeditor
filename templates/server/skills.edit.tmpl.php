<form name="skills" method="post" action=index.php?editor=server&action=65">
    <div class="edit_form" style="width: 250px;">
        <div class="edit_form_header">
            Edit Skill: <?= $name ?? "Undefined" ?> (<?= $skillid ?? "-1" ?>)
        </div>
        <div class="edit_form_content">
            <div class="center">
                <strong><label for="difficulty">difficulty</label></strong><br>
                <input class="indented" id="difficulty" type="text" name="difficulty" size="7"
                       value="<?= $difficulty ?? "" ?>"><br><br>
            </div>
            <div class="center">
                <input type="hidden" name="skillid" value="<?= $skillid ?? "" ?>">
                <input type="submit" value="Submit Changes">
            </div>
</form>