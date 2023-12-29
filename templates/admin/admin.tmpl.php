  <div class="center">
    <br /><br /><br />
    <h1>User Management</h1>
    <br /><br />
    <div class="table_container" style="width:350px;">
      <div class="table_header">
        User List
        <div style="float: right">
          <a href="index.php?admin&action=4"><img src="images/add.gif" style="border: 0;" alt="Yellow Plus Icon" title="Add User" /></a>
        </div>
      </div>
      <div class="table_content">
        <table style="width: 100%;">
          <tr>
            <th style="text-align: left;">Username</th>
            <th style="text-align: center;">Status</th>
            <th>&nbsp;</th>
          </tr>
            <?php global $users; foreach($users as $user): extract($user);?>
          <tr>
            <td style="text-align: left"><?=$login?></td>
            <td style="text-align: center"><?php echo ($administrator == 1) ? "Admin" : "User";?></td>
            <td style="text-align: right">
              <a href="index.php?admin&id=<?=$id?>&action=1"><img src="images/edit2.gif" style="border: 0;" alt="Edit Icon" title="Edit User" /></a>&nbsp;
              <a href="index.php?admin&id=<?=$id?>&action=3" onClick="return confirm('Really delete this user?');">
                <img src="images/remove.gif" style="border: 0;" alt="Red X Icon" title="Delete User" />
              </a>
            </td>
          </tr>
            <?php endforeach;?>
        </table>
      </div>
    </div>
  </div>
