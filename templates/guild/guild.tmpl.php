<div class="table_container">
  <div class="table_header">
    <div style="float:right">
      <a onClick="alert('Not yet!');"><img src="images/c_table.gif" style="border: 0;" alt="Edit Table Icon" title="Edit this Guild" /></a>
      <a onClick="alert('Not yet!');"><img src="images/table.gif" style="border: 0;" alt="Red X'd Table Icon" title="Delete this Guild" /></a>
    </div>
    <?=$id ?? "Unknown ID"?> - <?php echo trim($name ?? "")?>
  </div>
  <div class="table_content">
    <table style="border-collapse: collapse; border-spacing: 0; border: 0; width: 100%;">
      <tr>
        <td>
          <table style="border-collapse: collapse; border-spacing: 0; border: 0; width: 100%;">
            <tr>
              <td style="width: 35%;">
                <fieldset>
                  <legend><strong>Guild Info</strong></legend>
                  Name: <?=$name ?? "Undefined"?><br/>
                  Guild ID: <?=$id ?? "Undefined"?><br/>
                  Leader: <?=getPlayerName($leader ?? 0)?><br/>
                  Min Status: <?=$minstatus ?? "Undefined"?><br/>
                  URL: <?=$url ?? "Undefined"?><br/>
                  Tribute: <?=$tribute ?? "Undefined"?><br/>
                  Channel: <?=$channel ?? "Undefined"?><br/>
                </fieldset>
              </td>
              <td style="width: 65%;">
                <fieldset>
                  <legend><strong>Message of the Day</strong></legend>
                  Set By: <?=$motd_setter ?? "Undefined"?><br/>
                  Message: <?=$motd ?? "Undefined"?><br/>
                </fieldset>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td>
          <fieldset>
            <legend><strong>Guild Ranks</strong></legend>
            <table style="border-collapse: collapse; border-spacing: 0; border: 0; width: 100%;">
              <tr>
                <td style="text-align: center;">Rank</td>
                <td>Title</td>
                <td style="text-align: center;">Hear</td>
                <td style="text-align: center;">Speak</td>
                <td style="text-align: center;">Invite</td>
                <td style="text-align: center;">Remove</td>
                <td style="text-align: center;">Promote</td>
                <td style="text-align: center;">Demote</td>
                <td style="text-align: center;">MOTD</td>
                <td style="text-align: center;">War/Peace</td>
              </tr>
                <?php
                $guild_ranks = $guild_ranks ?? array();
                $yesno = $yesno ?? array(0 => "No", 1 => "Yes");
  foreach ($guild_ranks as $guild_rank) {
    echo '<tr>';
    echo '<td style="text-align: center;">' . $guild_rank['rank'] . '</td>';
    echo '<td>' . $guild_rank['title'] . '</td>';
    echo '<td style="text-align: center;">' . $yesno[$guild_rank['can_hear']] . '</td>';
    echo '<td style="text-align: center;">' . $yesno[$guild_rank['can_speak']] . '</td>';
    echo '<td style="text-align: center;">' . $yesno[$guild_rank['can_invite']] . '</td>';
    echo '<td style="text-align: center;">' . $yesno[$guild_rank['can_remove']] . '</td>';
    echo '<td style="text-align: center;">' . $yesno[$guild_rank['can_promote']] . '</td>';
    echo '<td style="text-align: center;">' . $yesno[$guild_rank['can_demote']] . '</td>';
    echo '<td style="text-align: center;">' . $yesno[$guild_rank['can_motd']] . '</td>';
    echo '<td style="text-align: center;">' . $yesno[$guild_rank['can_warpeace']] . '</td>';
    echo '</tr>';
  }
?>
            </table>
          </fieldset>
        </td>
      </tr>
      <tr>
        <td>
          <fieldset>
            <legend><strong>Guild Members</strong></legend>
            <table style="border-collapse: collapse; border-spacing: 0; border: 0; width: 100%;">
              <tr>
                <td style="text-align: center;">Rank</td>
                <td>Name</td>
                <td style="text-align: center;">Total Tribute</td>
                <td style="text-align: center;">Last Donation</td>
                <td style="text-align: center;">Tribute Active</td>
                <td style="text-align: center;">Banker</td>
                <td style="text-align: center;">Alt</td>
                <td style="text-align: center;">Public Note</td>
              </tr>
                <?php
                $guild_members = $guild_members ?? array();
  foreach ($guild_members as $guild_member) {
    echo '<tr>';
    echo '<td style="text-align: center;">' . $guild_member['rank'] . '</td>';
    echo '<td><a href="index.php?editor=player&playerid=' . $guild_member['char_id'] . '">' . getPlayerName($guild_member['char_id']) . '</a></td>';
    echo '<td style="text-align: center;">' . $guild_member['total_tribute'] . '</td>';
    echo '<td style="text-align: center;">' . $guild_member['last_tribute'] . '</td>';
    echo '<td style="text-align: center;">' . $yesno[$guild_member['tribute_enable']] . '</td>';
    echo '<td style="text-align: center;">' . $yesno[$guild_member['banker']] . '</td>';
    echo '<td style="text-align: center;">' . $yesno[$guild_member['alt']] . '</td>';
    echo '<td style="text-align: center;"><img src="images\note.gif" alt="Notebook Icon" title="' . (($guild_member['public_note'] != '') ? $guild_member['public_note'] : 'No Public Note') . '"/></td>';
    echo '</tr>';
  }
?>
            </table>
          </fieldset>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <fieldset>
            <legend><strong>Guild Bank</strong></legend>
            <table style="border-collapse: collapse; border-spacing: 0; border: 0; width: 100%;">
                <?php
  if (!empty($guild_items)) {
?>
              <tr>
                <td style="text-align: center;">Area</td>
                <td style="text-align: center;">Slot</td>
                <td style="text-align: center;">Item</td>
                <td style="text-align: center;">Qty</td>
                <td style="text-align: center;">Permissions</td>
                <td style="text-align: center;">Donated By</td>
                <td style="text-align: center;">Intended For</td>
              </tr>
      <?php
    foreach ($guild_items as $guild_item) {
      echo '<tr>';
      echo '<td style="text-align: center;">' . (($guild_item['area'] == 0) ? 'Deposit' : 'Bank') . '</td>';
      echo '<td style="text-align: center;">' . $guild_item['slot'] . '</td>';
      echo '<td style="text-align: center;">' . $guild_item['itemname'] . ' <a href="index.php?editor=items&id=' . $guild_item['itemid'] . '&action=2">' . $guild_item['itemid'] . '</a> [<a href="https://lucy.allakhazam.com/item.html?id=' . $guild_item['itemid'] . '" target="_new">lucy</a>]</td>';
      echo '<td style="text-align: center;">' . $guild_item['qty'] . '</td>';
      echo '<td style="text-align: center;">' . $permissions[$guild_item['permissions']] . '</td>';
      echo '<td style="text-align: center;">' . $guild_item['donator'] . '</td>';
      echo '<td style="text-align: center;">' . $guild_item['whofor'] . '</td>';
      echo '</tr>';
    }
  }
  else {
    echo '<tr>';
    echo '<td colspan="7" style="text-align: center;">No items in this guild bank</td>';
    echo '</tr>';
  }
?>
            </table>
          </fieldset>
        </td>
      </tr>
    </table>
  </div>
</div>
