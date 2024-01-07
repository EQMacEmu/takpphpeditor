       <table class="edit_form">
         <tr>
           <td class="edit_form_header">
             Search Results
           </td>
         </tr>
         <tr>
           <td class="edit_form_content">
               <?php if ($results != ''):?>
             <ul>
                 <?php foreach($results as $result):?>
             <li><a href="index.php?editor=loot&z=<?=$currzone ?? ""?>&zoneid=<?=$currzoneid ?? ""?>&npcid=<?=$npcid?>&ldid=<?=$ldid ?? ""?>&action=21&itemid=<?=$result['id']?>"><?=$result['name']?><br>
             &nbsp;&nbsp; (Lore: <?=$result['lore']?>)</a></li>
                 <?php endforeach;?>
             </ul>
               <?php endif;?>
               <?php if ($results == ''):?>
            <div class="center">
              Your search produced no results!<br><br>
              <a href="index.php?editor=loot&z=<?=$currzone ?? ""?>&zoneid=<?=$currzoneid ?? ""?>&npcid=<?=$npcid?>&ldid=<?=$ldid ?? ""?>&action=20">Try again</a>
            </div>
               <?php endif;?>
           </td>
         </tr>
       </table>
