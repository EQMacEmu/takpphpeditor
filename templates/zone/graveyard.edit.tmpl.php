  <div class="edit_form" style="width: 450px">
    <div class="edit_form_header">Edit Graveyard: <?=$id?></div>
    <div class="edit_form_content">
      <form name="graveyard" method="post" action="index.php?editor=zone&z=<?=$currzone ?? ""?>&zoneid=<?=$currzoneid ?? ""?>&graveyard_id=<?=$id?>&action=6">
        <table style="width: 100%;">
          <tr>
              <th><label for="zone_id">Zone</label></th>
              <th><label for="x">X</label></th>
              <th><label for="y">Y</label></th>
              <th><label for="z_coord">Z</label></th>
              <th><label for="heading">Heading</label></th>
          </tr>
          <tr>
            <td><input type="text" size="7" id="zone_id" name="zone_id" value="<?=$zone_id ?? ""?>"></td>
            <td><input type="text" size="7" id="x" name="x" value="<?=$x?>"></td>
            <td><input type="text" size="7" id="y" name="y" value="<?=$y ?? ""?>"></td>
            <td><input type="text" size="7" id="z_coord" name="z_coord" value="<?=$z?>"></td>
            <td><input type="text" size="7" id="heading" name="heading" value="<?=$heading ?? ""?>"></td>
          </tr>
        </table><br><br>
        <div class="center">
          <input type="hidden" name="graveyard_id" value="<?=$id?>">
          <input type="submit" value="Submit Changes">
        </div>
      </form>
    </div>
  </div>
