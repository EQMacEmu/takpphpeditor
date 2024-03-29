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
              action="index.php?editor=spellset&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?? ""?>&action=11">
            <strong><label for="suggested_id">Suggested ID:</label></strong><br>
            <input class="indented" type="text" id="suggested_id" name="suggested_id" size="10" value="<?= $suggested_id ?? "" ?>"><br><br>

            <strong><label for="name">Spellset Name:</label></strong><br>
            <input class="indented" type="text" id="name" name="name" size="25" value="<?= $name ?? "" ?>"><br><br>
            <fieldset>
                <legend><strong>Attack Proc</strong></legend>
                <strong>Spell ID:</strong> (<a href="javascript:showSearch();">search</a>)<br>
                <input class="indented" id="id" type="text" name="attack_proc" size="10" value="-1"><br>
                (-1 = No Proc)<br><br>
                <strong><label for="proc_chance">Chance:</label></strong> <br>
                <input class="indented" type="text" id="proc_chance" name="proc_chance" size="2" value="3">%
            </fieldset>
            <br>

            <strong><label for="parent_list">Parent list:</label></strong><br>
            <input class="indented" type="text" id="parent_list" name="parent_list" size="10" value="0"><br><br>
            <div class="center">
                <input type="submit" name="submit" value="Submit">
            </div>
        </form>
    </div>
</div>