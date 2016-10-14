     <center>
       <table style="border: 1px solid black; background-color: #CCC;">
        <tr><td colspan=2><b>Reminder:</b></td></tr>

         <tr><td align=center>Any unused boxes will be ignored, both in the SET and WHERE statements.</td></tr>

       </table><br><br>
       </center>
<div class="edit_form" style="width: 750px">
      <div class="edit_form_header">
        Change NPC Stats
               </div>
        <div class="edit_form_content">
        <form method="post" action="index.php?editor=npc&z=<?=$currzone?>&zoneid=<?=$currzoneid?>&npcid=<?=$npcid?>&action=87">
<center><B>SET:<B><br><br></center>
          <table width="100%">
           <tr>
<td align="center">
Stat1:<br>
<select name="npctype_selected1">
<?foreach($npcfields as $key=>$value):?>
                   <option value="<?=$key?>"<?echo ($key == $npctype_selected1)? " selected" : "";?>><?=$value?></option>
<?endforeach;?>
                 </select><br><br>  
</td> 
<td align="center">  
Value1:<br>
<input type="text" size="5" name="npcvalue1" value=""></td> 

<td align="center">
Stat2:<br>
<select name="npctype_selected2">
<?foreach($npcfields as $key=>$value):?>
                   <option value="<?=$key?>"<?echo ($key == $npctype_selected2)? " selected" : "";?>><?=$value?></option>
<?endforeach;?>
                 </select><br><br>  
</td> 
<td align="center">  
Value2:<br>
<input type="text" size="5" name="npcvalue2" value=""></td> 


<td align="center">
Stat3:<br>
<select name="npctype_selected3">
<?foreach($npcfields as $key=>$value):?>
                   <option value="<?=$key?>"<?echo ($key == $npctype_selected3)? " selected" : "";?>><?=$value?></option>
<?endforeach;?>
                 </select><br><br>  
</td> 
<td align="center">  
Value3:<br>
<input type="text" size="5" name="npcvalue3" value=""></td> 
   </tr>

   <tr>
   <td align="center">
Stat4:<br>
<select name="npctype_selected4">
<?foreach($npcfields as $key=>$value):?>
                   <option value="<?=$key?>"<?echo ($key == $npctype_selected4)? " selected" : "";?>><?=$value?></option>
<?endforeach;?>
                 </select><br><br>  
</td> 
<td align="center">  
Value4:<br>
<input type="text" size="5" name="npcvalue4" value=""></td> 

<td align="center">
Stat5:<br>
<select name="npctype_selected5">
<?foreach($npcfields as $key=>$value):?>
                   <option value="<?=$key?>"<?echo ($key == $npctype_selected5)? " selected" : "";?>><?=$value?></option>
<?endforeach;?>
                 </select><br><br>  
</td> 
<td align="center">  
Value5:<br>
<input type="text" size="5" name="npcvalue5" value=""></td> 


<td align="center">
Stat6:<br>
<select name="npctype_selected6">
<?foreach($npcfields as $key=>$value):?>
                   <option value="<?=$key?>"<?echo ($key == $npctype_selected6)? " selected" : "";?>><?=$value?></option>
<?endforeach;?>
                 </select><br><br>  
</td> 
<td align="center">  
Value6:<br>
<input type="text" size="5" name="npcvalue6" value=""></td> 
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
<tr>
<td align="center"> 
Bodytype:<br>       
<select name="body_selected">
<?foreach($bodytypes as $key=>$value):?>
                   <option value="<?=$key?>"<?echo ($key == $body_selected)? " selected" : "";?>><?=$key?>: <?=$value?></option>
<?endforeach;?>
                 </select>               
            </td>
             </tr>
</table><br>    

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
  