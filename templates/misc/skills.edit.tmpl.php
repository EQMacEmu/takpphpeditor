
        <form name="skills" method="post" action=index.php?editor=misc&z=<?=$currzone?>&zoneid=<?=$currzoneid?>&action=65">
         <div class="edit_form" style="width: 250px;">
        <div class="edit_form_header">
          Edit Skill: <?=$name?> (<?=$skillid?>)
        </div>
         <div class="edit_form_content">
         <center>
          <strong>difficulty</strong><br>
            <input class="indented" id="id" type="text" name="difficulty" size="7" value="<?=$difficulty?>"><br><br>
        </center>
        <center>
          <input type="hidden" name="skillid" value="<?=$skillid?>">
          <input type="submit" value="Submit Changes">
        </center>
      </form>
      </div>
      </div>