  <table class="edit_form">
    <tr>
      <td class="edit_form_header">Player Move Tool</td>
    </tr>
    <tr>
      <td class="edit_form_content">
        <form name="move_player" method="post" action="index.php?editor=player&playerid=<?=$playerid?>&action=6">
            <label for="zoneid">New Zone:</label><br/>
          <select id="zoneid" name="zoneid" onChange="clear_coords();">
              <?php foreach ($zonelist as $zone): ?>
            <option value="<?=$zone['zoneidnumber']?>"<?php echo (($cur_loc['zone_id'] == $zone['zoneidnumber'])) ? " selected" : "";?>><?=$zone['short_name']?></option>
              <?php endforeach; ?>
          </select><br/><br/>
            <label for="safe">Use Safe Zone Coords:</label> <input type="checkbox" id="safe" name="safe" onChange="toggle_safe();" checked><br/><br/>
            <label for="x">New X:</label> <input type="text" id="x" name="x" value="<?=$cur_loc['x']?>" size="10" disabled><br/><br/>
            <label for="y">New Y:</label> <input type="text" id="y" name="y" value="<?=$cur_loc['y']?>" size="10" disabled><br/><br/>
            <label for="z">New Z:</label> <input type="text" id="z" name="z" value="<?=$cur_loc['z']?>" size="10" disabled><br/><br/><br/>
          <input type="hidden" name="playerid" value="<?=$playerid?>">
          <div class="center"><input type="submit" value="Move Player">&nbsp;&nbsp;<input type="button" value="Cancel" onClick="history.go(-1);"></div>
        </form>
      </td>
    </tr>
  </table>
