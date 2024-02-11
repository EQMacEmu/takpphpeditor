<div class="edit_form" style="width: 300px">
      <div class="edit_form_header">
        Change Loottable
               </div>
        <div class="edit_form_content">
        <form method="post" action="index.php?editor=loot&z=<?=$currzone ?? ""?>&zoneid=<?=$currzoneid ?? ""?>&npcid=<?=$npcid?>&ltid=<?=$ltid ?? ""?>&action=39">
              <table style="width: 100%;">
          <tr>
              <th>npc name</th>
              <th>update all</th>
           </tr>
           <tr>
               <td><label for="npcname"></label><input type="text" size="25" id="npcname" name="npcname" value=""></td>
               <td><label for="updateall"></label>
               <select id="updateall" name="updateall">
                   <option value="0"<?php echo (isset($updateall) && $updateall == 0) ? " selected" : ""?>>No</option>
                   <option value="1"<?php echo (isset($updateall) && $updateall == 1) ? " selected" : ""?>>Yes</option>
                 </select>
               </td>
             </tr>
                 </table><br><br>
               <div class="center">
                 <input type="submit">
               </div>
             </form>
         </div>
      </div>
  
