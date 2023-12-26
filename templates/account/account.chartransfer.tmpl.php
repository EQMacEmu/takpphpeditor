<?php
  $acctid = $acctid ?? 0;
  $from_acct = getAccountName($acctid);
?>
  <div id="searchblock" style="display:none;">
    <div class="center">
      <iframe src="templates/iframes/accountsearch.php" style="display:block;"></iframe>
      <input type="button" value="Hide Search" onclick="hideSearch();">
    </div><br/>
  </div>
  <div class="table_container" style="width:250px;">
    <div class="table_header">
      Character Transfer
    </div>
    <div class="table_content">
      <form id="transfer" method="post" action="index.php?editor=account&acctid=<?=$acctid?>&playerid=<?=$_GET['playerid']?>&action=6">
        <div class="center">
          Transfer <span style="font-weight:bold;color: green"><?=getPlayerName($_GET['playerid'])?></span> from<br/><br/>
          <strong><?=$from_acct?></strong><br/><br/>
            <label for="to_text">to</label><br/><br/>
          <input type="text" size="20" value="Select account" readonly="readonly" id="to_text" name="tacct" onClick="showSearch();">
          <input type="hidden" id="from_acct" value="<?=$from_acct?>">
          <div id="submitblock" style="display:none;">
            <br/><br/><input type="button" value="GO" onClick="validateTransfer();">&nbsp;<input type="button" onClick="history.go(-2);" value="Cancel">
          </div>
        </div>
      </form>
    </div>
  </div>
