<?php if(isset($user)) { extract($user); }?>
<div class="center">
    <br><br><br>
    <h1>User Management</h1>
    <br><br>
</div>

<form method="post" action="index.php?admin&action=2">
    <div class="edit_form" style="width:200px;">
        <div class="edit_form_header">
            User List
        </div>
        <div class="edit_form_content">
            <label for="login"><strong>Username</strong><br></label>
            <input class="indented" type="text" id="login" name="login" value="<?= $login ?? "" ?>"><br><br>

            <label for="password"><strong>Change Password</strong><br></label>
            <input class="indented" type="text" id="password" name="password" value=""><br>
            (leave blank for no change)<br><br>

            <label for="administrator"><strong>Status</strong><br></label>
            <select class="indented" id="administrator" name="administrator">
                <option value="0"<?php echo (($administrator ?? 0) == 0) ? " selected" : ""; ?>>User</option>
                <option value="1"<?php echo (($administrator ?? 0) == 1) ? " selected" : ""; ?>>Administrator</option>
            </select><br><br><br>
            <div class="center">
                <input type="hidden" name="id" value="<?= $id ?? 0 ?>">
                <input type="submit" value="Update User">
            </div>
        </div>
    </div>
</form>