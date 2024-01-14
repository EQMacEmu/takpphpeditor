<div class="center">
    <iframe id='searchframe' src='templates/iframes/spellsetsearch.php'></iframe>
    <input id="button" type="button" value='Hide Spellset Search' onclick='hideSearch();'
           style='display:none; margin-bottom: 20px;'>
</div>

<div class="edit_form" style="width:150px">
    <div class="edit_form_header">
        Change Spellset
    </div>
    <div class="edit_form_content">
        <form method="post"
              action="index.php?editor=spellset&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&npcid=<?= $npcid ?>&action=13">
            <strong><label for="id">Spellset ID:</label></strong> (<a href="javascript:showSearch();">search</a>)<br>
            <input class="indented" id="id" type="text" size="10" name="id"><br><br>
            <div class="center">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</div>