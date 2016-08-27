  <div class="edit_form">
    <div class="edit_form_header">
      Spawnpoint ID: <?=$id?>
    </div>
    <div class="edit_form_content">
      <form name="spawnpoint" method="post" action="index.php?editor=spawn&z=<?=$currzone?>&zoneid=<?=$currzoneid?>&npcid=<?=$npcid?>&action=12">
        <table width="100%" cellspacing="0">
          <tr>
            <td width="33%">
              x:<br/>
              <input type="text" name="x" value="<?=$x?>">
            </td>
            <td width="33%">
              y:<br/>
              <input type="text" name="y" value="<?=$y?>">
            </td>
            <td width="34%">
              z:<br/>
              <input type="text" name="z" value="<?=$z?>">
            </td>
          </tr>
          <tr>
            <td width="33%">
              heading:<br/>
              <input type="text" name="heading" value="<?=$heading?>">
            </td>
            <td width="33%">
              respawn:<br/>
              <input type="text" name="respawntime" value="<?=$respawntime?>">
            </td>
            <td width="34%">
              variance:<br/>
              <input type="text" name="variance" value="<?=$variance?>">
            </td>
          </tr>
          <tr>
            <td width="33%">
              pathgrid:<br/>
              <input type="text" name="pathgrid" value="<?=$pathgrid?>">
            </td>
            <td width="33%">
              condition:<br/>
              <input type="text" name="_condition" value="<?=$_condition?>">
            </td>
            <td width="34%">
              cond_value:<br/>
              <input type="text" name="cond_value" value="<?=$cond_value?>">
            </td>
          </tr>
          <tr>
            <td width="33%">
              version:<br/>
             <input type="text" name="version" value="<?=$version?>">
            </td>
            <td width="33%">
              enabled:<br/>
             <input type="text" name="enabled" value="<?=$enabled?>">
            </td>
            <td align="left" width="34%">
              animation:<br/>
              <select name="animation">
<?foreach($animations as $k => $v):?>
                <option value="<?=$k?>"<? echo ($k == $animation) ? " selected" : ""?>><?=$v?>&nbsp;&nbsp;</option>
<?endforeach;?>
              </select>
            </td>
          </tr>
          <tr>
            <td width="33%">
              boot respawn:<br/>
              <input type="text" name="boot_respawntime" value="<?=$boot_respawntime?>">
            </td>
            <td width="33%">
              boot variance:<br/>
              <input type="text" name="boot_variance" value="<?=$boot_variance?>">
            </td>
              <td width="34%">
              clear on boot:<br/>
              <input type="text" name="clear_timer_onboot" value="<?=$clear_timer_onboot?>">
            </td>
            </tr>
           <tr>
            <td align="left" width="33%">
              force_z:<br/>
              <select name="force_z">
<?foreach($yesno as $k => $v):?>
                <option value="<?=$k?>"<? echo ($k == $force_z) ? " selected" : ""?>><?=$v?>&nbsp;&nbsp;</option>
<?endforeach;?>
              </select>
            </td>
            <td width="33%">&nbsp;</td>
            <td width="34%">&nbsp;</td>
            </tr>
        </table><br/><br/>
        <center>
          <input type="hidden" name="zone" value="<?=$zone?>">
          <input type="hidden" name="id" value="<?=$id?>">
          <input type="hidden" name="spawngroupID" value="<?=$spawngroupID?>">
          <input type="submit" value="Submit Changes">
        </center>
      </form>
    </div>
  </div>
