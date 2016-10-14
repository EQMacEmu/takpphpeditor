     <center>
       <table style="border: 1px solid black; background-color: #CCC;">
        <tr><td colspan=2><b>Reminders:</b></td></tr>

         <tr><td align=center>Abilities 1,2,3,4,5,29,32,33,37,40,49 accept paramaters. For multiple parameters, please seperate with commas. <br>
                             The special ability number should not be put in the parameter box.<br>
                             If no WHERE values are filled out, the current NPC will be the only one affected.<br>
                             CUSTOM will allow you to edit the raw database column. It does not provide any error checking!<br></td></tr>

       </table><br><br>
       </center>
<div class="edit_form" style="width: 750px">
      <div class="edit_form_header">
        Change NPC Special Abilities
               </div>
        <div class="edit_form_content">
        <form method="post" action="index.php?editor=npc&z=<?=$currzone?>&zoneid=<?=$currzoneid?>&npcid=<?=$npcid?>&action=89">
<center><B>SET:<B><br><br></center>
          <table width="100%">
           <tr>
<td align="center">
Type:<br>
<select name="sa_type">
<?foreach($satype as $key=>$value):?>
                   <option value="<?=$key?>"<?echo ($key == $sa_type)? " selected" : "";?>><?=$value?></option>
<?endforeach;?>
                 </select><br><br>  
</td> 

<td align="center">
Special Ability:<br>
<select name="special_ability">
<?foreach($specialattacks as $key=>$value):?>
                   <option value="<?=$key?>"<?echo ($key == $special_ability)? " selected" : "";?>><?=$key?>: <?=$value?></option>
<?endforeach;?>
                 </select><br><br>  
</td> 

<td align="center">  
Parameter:<br>
<input type="text" size="5" name="parameter" value="1"></td> 
   </tr>
 </table>  
<table width="100%">
   <tr>
   <td align="center">  
Custom:<br>
<input type="text" size="75" name="custom" value=<?=$custom?>></td> 
   </tr>
    </table><br/>

<center><B>WHERE:<B><br><br></center>

<table width="100%">
           <tr>
<td align="center">  
Name:<br>
<input type="text" size="25" name="npcname" value=""></td> 
<td align="center">  
Race:<br>       
<select name="race_selected">
<?foreach($races as $key=>$value):?>
                   <option value="<?=$key?>"<?echo ($key == $race_selected)? " selected" : "";?>><?=$key?>: <?=$value?></option>
<?endforeach;?>
                 </select>               
            </td>
<td align="center">  
Class:<br>       
<select name="class_selected">
<?foreach($classes as $key=>$value):?>
                   <option value="<?=$key?>"<?echo ($key == $class_selected)? " selected" : "";?>><?=$key?>: <?=$value?></option>
<?endforeach;?>
                 </select>               
            </td>
            </tr>
</table><br>

<table width="100%">            
<td align="center"> 
Bodytype:<br>       
<select name="body_selected">
<?foreach($bodytypes as $key=>$value):?>
                   <option value="<?=$key?>"<?echo ($key == $body_selected)? " selected" : "";?>><?=$key?>: <?=$value?></option>
<?endforeach;?>
                 </select>               
            </td>
             </tr>
                 </table><br><br>

<table width="100%">
<tr>
<td align="center">  
Level:<br>       
<select name="level_value">
<?foreach($valueadjust as $key=>$value):?>
                   <option value="<?=$key?>"<?echo ($key == $level_value)? " selected" : "";?>><?=$value?></option>
<?endforeach;?>
                 </select>               
            </td>
<td align="center"> 
<input type="text" size="10" name="npclevel" value=""></td> 

<td align="center">  
HP:<br>       
<select name="hp_value">
<?foreach($valueadjust as $key=>$value):?>
                   <option value="<?=$key?>"<?echo ($key == $hp_value)? " selected" : "";?>><?=$value?></option>
<?endforeach;?>
                 </select>               
            </td>
<td align="center"> 
<input type="text" size="10" name="npchp" value=""></td> 
</tr>             
                 </table><br><br>

<center><B>OR:<B><br><br></center>

<table width="100%">
           <tr>
<td align="center">  
Change ALL in zone:<br>
<input type="checkbox" name="change_all" value="1"<?echo ($change_all == 1) ? " checked" : "";?>><br/>
            </td>
             </tr>
             </table><br><br>
               <center>
               
                 <input type="submit">
               </center>
             </form>
         </div>
      </div>
  