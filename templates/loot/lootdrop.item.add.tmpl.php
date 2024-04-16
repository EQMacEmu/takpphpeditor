  <center>
    <iframe id='searchframe' src='templates/iframes/itemsearch.php'></iframe>
    <input id="button" type="button" value='Hide Item Search' onclick='hideSearch("searchframe");' style='display:none; margin-bottom: 20px;'>
  </center>

  <form name="lootdrop_item" method="POST" action="index.php?editor=loot&z=<?=$currzone?>&zoneid=<?=$currzoneid?>&npcid=<?=$npcid?>&ldid=<?=$ldid?>&action=21">
    <div class="edit_form" style="width: 400px;">
      <div class="edit_form_header">Add Lootdrop Item</div>
      <div class="edit_form_content">
        <table width="100%" cellpadding="3" cellspacing="3">
          <tr>
            <td>
              <strong>Lootdrop ID:</strong><br>
              <input type="text" size="7" value="<?=$ldid?>" disabled>
            </td>
            <td>
              <strong>Item ID:</strong> (<a href="javascript:showSearch('searchframe');">search</a>)<br>
              <input id="id" type="text" size="7" name="itemid">
            </td>
            <td>
              <strong>Charges:</strong><br>
              <input type="text" size="5" name="item_charges" id="item_charges" value="1">&nbsp;
            </td>
          </tr>		  
		</table><br>
		<table width="100%" cellpadding="3" cellspacing="3">
		  <tr>
            <td>
              <strong>&nbsp;<br>Chance:</strong><br>
              <input type="text" size="5" name="chance" value="100">%
            </td>
            <td>
              <strong>Disabled<br>Chance:</strong><br>
              <input type="text" size="5" name="disabled_chance" value="0">
            </td>
            <td>
              <strong>&nbsp;<br>Multiplier:</strong><br>
              <input type="text" size="5" name="multiplier" value="1">
            </td>
          </tr>		
            <td>
              <strong>&nbsp;<br>Min Level:</strong><br>
              <input type="text" size="5" name="minlevel" value="0">
            </td>
            <td>
              <strong>&nbsp;<br>Max Level:</strong><br>
              <input type="text" size="5" name="maxlevel" value="127">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <strong>Min Expansion:</strong><br>
              <input type="text" size="18" name="min_expansion" value="-1">
            </td>
            <td colspan="2">
              <strong>Max Expansion:</strong><br>
              <input type="text" size="18" name="max_expansion" value="-1">
            </td>
          </tr>
          <tr>
            <td colspan="4">
              <strong>Content Flags:</strong><br>
              <input type="text" size="51" name="content_flags" value="">
            </td>
          </tr>
          <tr>
            <td colspan="4">
              <strong>Content Flags Disabled:</strong><br>
              <input type="text" size="51" name="content_flags_disabled" value="">
            </td>
          </tr>
        </table><br><br>
        <center>
          <input type="hidden" name="ldid" value="<?=$ldid?>">
          <input type="submit" name="submit" value="Add Item">&nbsp;&nbsp;
          <input type="button" value="Cancel" onClick="history.back();">
        </center>
      </div>
    </div>
  </form>