<div class="center">
    <iframe id='searchframe' src='templates/iframes/spellsearch.php'></iframe>
    <input id="button" type="button" value='Hide Spell Search' onclick='hideSearch();'
           style='display:none; margin-bottom: 20px;'>
</div>

<div class="table_container" style="width: 225px">
    <div class="edit_form_header">
        Edit Spellset
    </div>
    <div class="edit_form_content">
        <form method="post"
              action="index.php?editor=spellset&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&spellset=<?= $spellset ?>&action=2">
            <strong><label for="name">Spellset Name:</label></strong><br>
            <input class="indented" type="text" id="name" name="name" size="25" value="<?= $name ?? "" ?>"><br><br>
            <fieldset>
                <legend><strong>Attack Proc</strong></legend>
                <strong><label for="id">Spell ID:</label></strong> (<a href="javascript:showSearch();">search</a>)<br>
                <input class="indented" id="id" type="text" name="attack_proc" size="10"
                       value="<?= $attack_proc ?? "" ?>"><br>
                (-1 = No Proc)<br><br>
                <strong><label for="proc_chance">Chance:</label></strong> <br>
                <input class="indented" type="text" id="proc_chance" name="proc_chance" size="2"
                       value="<?= $proc_chance ?? "" ?>">%
            </fieldset>
            <br>

            <strong><label for="parent_list">Parent list:</label></strong><br>
            <input class="indented" type="text" id="parent_list" name="parent_list" size="10"
                   value="<?= $parent_list ?? "" ?>"><br><br>
            <div class="center">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="submit" name="submit" value="Submit">
            </div>
        </form>
    </div>
</div>