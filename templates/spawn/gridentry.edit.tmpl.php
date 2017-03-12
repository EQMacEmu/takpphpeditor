      <div class="edit_form" style="width: 530px">
      <div class="edit_form_header">
        Edit Grid Entry: <?=$number?> on Grid <?=$pathgrid?>
      </div>

      <div class="edit_form_content">
        <form name="gridentry" method="post" action="index.php?editor=spawn&z=<?=$currzone?>&zoneid=<?=$currzoneid?>&npcid=<?=$npcid?>&spid=<?=$spid?>&pathgrid=<?=$pathgrid?>&action=25">
        <table width="100%">
          <tr>
            <th>number:</th>
            <th>X:</th>
            <th>Y:</th>
            <th>Z:</th>
            <th>Heading:</th>
            <th>Pause:</th>
            <th>Centerpoint:</th>
          </tr>
          <tr>
            <td><input type="text" size="7" name="number2" value="<?=$number?>"></td>
            <td><input type="text" size="7" name="x_coord" value="<?=$x?>"></td>
            <td><input type="text" size="7" name="y_coord" value="<?=$y?>"></td>
            <td><input type="text" size="7" name="z_coord" value="<?=$z?>"></td>
            <td><input type="text" size="7" name="heading" value="<?=$heading?>"></td>
            <td><input type="text" size="7" name="pause" value="<?=$pause?>"></td>
            <td align="left" width="33%">
            <select name="centerpoint">
<?foreach($yesno as $k => $v):?>
                <option value="<?=$k?>"<? echo ($k == $centerpoint) ? " selected" : ""?>><?=$v?>&nbsp;&nbsp;</option>
<?endforeach;?>
              </select>
            </td>
          </tr>
        </table><br><br>

        <center>
          <input type="hidden" name="number" value="<?=$number?>">
          <input type="hidden" name="pathgrid" value="<?=$pathgrid?>">
          <input type="submit" value="Submit Changes">
        </center>
      </form>
      </div>
      </div>
