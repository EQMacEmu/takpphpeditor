<div class="table_container" style="width: 700px;">
 <div class="table_header">
  <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
   <tr>
    <td style="padding: 0;">Quest Script for NPC: <?=getNPCName($npcid)?> (<?=$npcid?>)</td>
   <td style="padding: 0; text-align: right;">
    <a href="index.php?editor=npc&z=<?=$currzone ?? ""?>&zoneid=<?=$currzoneid ?? ""?>&npcid=<?=$npcid?>">Go back to current NPC</a>
    </td>
   </tr>
  </table>
 </div>
  <div class="edit_form_content">
   <table style="width: 100%;">
<tr><td><label for="text"></label><textarea id="text" name="text" rows=82 cols=82>
<?php
	if (!empty($filename) && file_exists($filename))
	{
		@readfile("$filename");
	}
	else
	{
  		echo "Quest for this NPC not found.";
	}
?>
        </textarea></td></tr>
    </table>
   </div>
</div>