  <div class="edit_form" style="margin-bottom: 15px;">
    <div class="edit_form_header">
      Add a Spawnpoint:
    </div>
    <div class="edit_form_content">
      <form name="spawnpoint" method="post" action="index.php?editor=spawn&z=<?=$currzone?>&zoneid=<?=$currzoneid?>&npcid=<?=$npcid?>&action=15">
        Suggested ID:<br>
        <input type="text" name="id" value="<?=$suggestedid?>"><br><br>
        <table width="100%" cellspacing="0">
          <tr>
            <td width="33%">
              x:<br>
              <input type="text" name="x" value="">
            </td>
            <td width="33%">
              y:<br>
              <input type="text" name="y" value="">
            </td>
            <td width="34%">
              z:<br>
              <input type="text" name="z" value="">
            </td>
          </tr>
          <tr>
            <td width="33%">
              heading:<br>
              <input type="text" name="heading" value="0">
            </td>
            <td width="33%">
              respawn:<br>
              <input type="text" name="respawntime" value="1200">
            </td>
            <td width="34%">
              variance:<br>
              <input type="text" name="variance" value="0">
            </td>
          </tr>
          <tr>
            <td width="33%">
              pathgrid:<br>
              <input type="text" name="pathgrid" value="0">
            </td>
            <td width="33%">
              condition:<br>
              <input type="text" name="_condition" value="0">
            </td>
            <td width="34%">
              cond_value:<br>
              <input type="text" name="cond_value" value="1">
            </td>
          </tr>
          <tr>
            <td width="33%">
              enabled:<br>
              <input type="text" name="enabled" value="1">
            </td>
            <td align="left" width="33%">
              animation:<br>
              <select name="animation">
<?foreach($animations as $k => $v):?>
                <option value="<?=$k?>"><?=$v?>&nbsp;&nbsp;</option>
<?endforeach;?>
              </select>
            </td>
            <td width="34%">&nbsp;</td>
          </tr>
          <tr>
            <td width="33%">
              boot respawn:<br>
              <input type="text" name="boot_respawntime" value="0">
            </td>
           <td width="33%">
              boot variance:<br>
              <input type="text" name="boot_variance" value="0">
            </td>
              <td width="34%">
              clear on boot:<br>
              <input type="text" name="clear_timer_onboot" value="0">
            </tr>
            <tr>
            <td align="left" width="33%">
              force_z:<br>
              <select name="force_z">
<?foreach($yesno as $k => $v):?>
                <option value="<?=$k?>"><?=$v?>&nbsp;&nbsp;</option>
<?endforeach;?>
              </select>
            </td>
            <td width="33%">&nbsp;</td>
            <td width="34%">&nbsp;</td>
            </tr>
        </table><br><br>
        <center>
          <input type="hidden" name="zone" value="<?=$zone?>">
          <input type="hidden" name="spawngroupID" value="<?=$spawngroupID?>">
          <input type="submit" value="Submit Changes">
        </center>
      </form>
    </div>
  </div>
