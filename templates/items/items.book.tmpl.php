  <div class="table_container" style="width: 750px;">
    <div class="table_header">
      <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
        <tr>
          <td style="padding: 0;">Book text for <?=$name ?? "Undefined"?>:</td>
        </tr>
      </table>
    </div>
    <div class="edit_form_content">
      <form name="booktext" method="post" action="index.php?editor=items&id=<?=$id ?? ""?>&name=<?=$name ?? ""?>&action=4">
        <table style="width: 100%;">
            <tr>
                <td><label for="txtfile"></label><textarea id="txtfile" name="txtfile" rows="20" cols="88"><?=$txtfile ?? ""?></textarea></td>
                <td style="text-align: right;">&nbsp;</td>
            </tr>
        </table><br/>
        <div class="center">
          <input type="hidden" name="name" value="<?=$name ?? ""?>">
          <input type="hidden" name="id" value="<?=$id ?? ""?>">
          <input type="submit" value="Submit Changes">
        </div>
      </form>
    </div>
  </div>
