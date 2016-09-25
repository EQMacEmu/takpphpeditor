  <center>
    <table style="border: 1px solid black; background-color: #CCC;">
      <tr><td colspan="3"><b>Legend:</b></td></tr>
      <tr><td align="right"><b>Casting:</b></td><td>&nbsp;</td><td><i>Value1:</i> SpellID</td><td align="left"><i>Value2:</i>  Not Used</td><td>&nbsp;</td></tr>
      <tr><td align="right"><b>Alarm:</b></td><td>&nbsp;</td><td><i>Value1:</i>  Range</td><td align="left"><i>Value2:</i>  0: Aggro All 1: Aggro KOS only</td><td>&nbsp;</td></tr>
      <tr><td align="right"><b>Mystics:</b></td><td>&nbsp;</td><td><i>Value1:</i>  NPCID</td><td align="left"><i>Value2:</i>  Number of NPCs</td><td>&nbsp;</td></tr>
      <tr><td align="right"><b>Bandits:</b></td><td>&nbsp;</td><td><i>Value1:</i>  NPCID</td><td align="left"><i>Value2:</i>  Number of NPCs</td><td>&nbsp;</td></tr>
      <tr><td align="right"><b>Damage:</b></td><td>&nbsp;</td><td><i>Value1:</i>  MinDmg</td><td align="left"><i>Value2:</i>  MaxDmg</td><td>&nbsp;</td></tr>
    </table><br/><br/>
  </center>
<div class="edit_form" style="width: 750px">
      <div class="edit_form_header">
        Add Trap
      </div>

      <div class="edit_form_content">
        <form name="traps" method="post" action=index.php?editor=misc&z=<?=$currzone?>&zoneid=<?=$currzoneid?>&action=24">
        <table width="100%">
          <tr>
            <th>id</th>
            <th>zone</th>
            <th>x</th>
            <th>y</th>
            <th>z</th>
            <th>maxzdiff</th>
            <th>radius</th>
            <th>triggered num</th>
            <th>group</th>
          </tr>
          <tr>
            <td><input type="text" size="7" name="tid" value="<?=$suggesttid?>"></td>
            <td><input type="text" size="10" name="zone" value="<?=$currzone?>"></td>
            <td><input type="text" size="7" name="x_coord" value="0"></td>
            <td><input type="text" size="7" name="y_coord" value="0"></td>
            <td><input type="text" size="7" name="z_coord" value="0"></td>
            <td><input type="text" size="7" name="maxzdiff" value="10"></td>
            <td><input type="text" size="7" name="radius" value="25"></td>
            <td><input type="text" size="7" name="triggered_number" value="0"></td>
            <td><input type="text" size="7" name="group" value="0"></td>
          </tr>
          <tr>
            
            <th>effectvalue</th>
            <th>effectvalue2</th>
            <th>chance</th>
            <th>skill</th>
            <th>level</th>
            <th>respawn</th>
            <th>variance</th>
            <th>effect</th>
            <th>version</th>
          </tr>
          <tr>
            <td><input type="text" size="7" name="effectvalue" value="0"></td>
            <td><input type="text" size="10" name="effectvalue2" value="0"></td>
            <td><input type="text" size="7" name="chance" value="100"></td>
            <td><input type="text" size="7" name="skill" value="1"></td>
            <td><input type="text" size="7" name="level" value="1"></td>
            <td><input type="text" size="7" name="respawn_time" value="600"></td>
            <td><input type="text" size="7" name="respawn_var" value="0"></td>
            <td><select class="left" name="effect">
<?foreach($traptype as $k => $v):?>
              <option value="<?=$k?>"<? echo ($k == $effect) ? " selected" : ""?>><?=$v?></option>
<?$x++; endforeach;?>
           </td> 
            <td><input type="text" size="7" name="version" value="<?=$suggestver?>"></td>
          </tr>    
          </table>
          <table width="100%">   
            <tr>
            <th>message</th>
            <th>despawn when triggered</th>
            <th>undetectable</th>
           </tr>       
          <tr>
             <td><input type="text" size="75" name="message" value=""></td>  
             <td><select class="left" name="despawn_when_triggered">
<?foreach($yesno as $k => $v):?>
              <option value="<?=$k?>"<? echo ($k == $despawn_when_triggered) ? " selected" : ""?>><?=$v?></option>
<?$x++; endforeach;?>
           </td> 
          <td><select class="left" name="undetectable">
<?foreach($yesno as $k => $v):?>
              <option value="<?=$k?>"<? echo ($k == $undetectable) ? " selected" : ""?>><?=$v?></option>
<?$x++; endforeach;?>
           </td> 
          </tr>
           </table><br><br>
        <center>
          <input type="submit" value="Submit Changes">
        </center>
      </form>
      </div>
      </div>