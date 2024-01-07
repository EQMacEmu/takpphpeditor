       <table class="edit_form">
         <tr>
           <td class="edit_form_header">
             Change Loottable
           </td>
         </tr>
         <tr>
           <td class="edit_form_content">
             <form method="post" action="index.php?editor=loot&z=<?=$currzone ?? ""?>&zoneid=<?=$currzoneid ?? ""?>&npcid=<?=$npcid?>&action=13">
                 <label for="id">Enter Loottable ID:</label><br>
               <input type="text" id="id" name="id"><br><br>
               <div class="center">
                 <input type="submit">
               </div>
             </form>
           </td>
         </tr>
       </table>
