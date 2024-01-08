  <form name="purge" method="post" action="index.php?editor=util&action=2">
    <div class="table_container" style="width: 500px;">
      <div class="table_header">
        <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
          <tr>
            <td style="padding: 0; text-align: left; width: 100%;">Character Purge - Not logged in since <?=get_real_time(time() - $datetime)?></td>
          </tr>
        </table>
      </div>
      <table class="table_content2" style="width: 100%;">
          <?php if (isset($characters)):?>
        <tr>
          <td style="text-align: center; width: 5%;"><strong>ID</strong></td>
          <td style="text-align: center; width: 15%;"><strong>Character</strong></td>
          <td style="text-align: center; width: 15%;"><strong>Account</strong></td>
          <td style="text-align: center; width: 15%;"><strong>Last Login</strong></td>
          <td style="text-align: right; width: 5%;"><label for="all"></label><input type="checkbox" id="all" onChange="toggle_all();" /></td>
        </tr>
              <?php $x=0; foreach($characters as $character=> $v):?>
        <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA";?>">
          <td style="text-align: center; width: 5%;"><?=$v['id']?></td>
          <td style="text-align: center; width: 15%;"><a href="index.php?editor=player&playerid=<?=$v['id']?>"><?php echo getPlayerName($v['id'])?></a></td>
          <td style="text-align: center; width: 15%;"><a href="index.php?editor=account&acctid=<?=$v['account_id']?>"><?php echo getAccountName($v['account_id'])?></a></td>
          <td style="text-align: center; width: 15%;"><?php echo ($v['last_login'] > 0) ? get_real_time($v['last_login']) : "Never";?></td>
          <td style="text-align: right;"><label for="id[]"></label><input type="checkbox" id="id[]" name="id[]" value="<?=$v['id']?>" /></td>
        </tr>
                  <?php $x++; endforeach;?>
          <?php endif;?>
          <?php if (!isset($characters)):?>
        <tr>
          <td style="text-align: left; width: 100%; padding: 10px;">No old characters</td>
        </tr>
          <?php endif;?>
      </table>
    </div><br />
      <?php if (isset($characters)):?>
    <div class="center">
      <input type="button" name="delete" value="Delete Marked" onClick="verify();" />&nbsp;<input type="button" name="delete" value="Delete All" onClick="mark_all();verify();" />
    </div>
      <?php endif;?>
  </form>
