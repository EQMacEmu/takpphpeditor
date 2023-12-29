<div class="center">
    <br><br><br>
    <h1>User Management</h1>
    <br><br>
</div>

<form method="post" action="index.php?admin&action=5">
    <div class="edit_form" style="width:200px;">
        <div class="edit_form_header">
            User List
        </div>
        <div class="edit_form_content">
            <label for="login"><strong>Username</strong></label><br>
            <input class="indented" type="text" id="login" name="login" value=""><br><br>

            <label for="password"><strong>Password</strong><br></label>
            <input class="indented" type="text" id="password" name="password" value=""><br><br>

            <label for="administrator"><strong>Status</strong><br></label>
            <select class="indented" id="administrator" name="administrator">
                <option value="0">User</option>
                <option value="1">Administrator</option>
            </select><br><br><br>
            <div class="center">
                <input type="submit" value="Add User">
            </div>
        </div>
    </div>
</form>