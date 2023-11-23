<div class="center">
    <br><br><br>
    <h1>Project Everquest Database Editing Interface</h1>
    <br><br>

    <?php if (isset($error) && $error == 1): ?>
        <span class="alert-danger">Invalid username/password or logins are disabled.</span><br><br><br>
    <?php endif; ?>

    <form method="post" action="/index.php?login">
        <table style="margin:0 auto; width: 250px">
            <?php if (isset($enable_user_login) && $enable_user_login == 1): ?>
            <tr>
                <td style="text-align: left">
                    <label for="login"><strong>Login:</strong></label>
                </td>
                <td style="text-align: right">
                    <input type="text" id="login" name="login" value="<?= $login ?? ""; ?>">
                </td>
            </tr>
            <tr>
                <td style="text-align: left">
                    <label for="password"><strong>Password:</strong></label>
                </td>
                <td style="text-align: right">
                    <input type="password" id="password" name="password" value="<?= $password ?? ""; ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center">
                    <br><br><input type="submit" value="Login" style="width:60px;"><br><br><br>
                    <?php endif; ?>

                    <?php if (isset($enable_user_login) && $enable_user_login != 1): ?>
                    User logins are disabled.<br><br>
            <tr>
                <td colspan="2" style="text-align: center">
                    <?php endif; ?>

                    <?php if (isset($enable_guest_mode) && $enable_guest_mode == 1): ?>
                        <a href="/index.php?login=guest">Click here to login as a guest.</a>
                    <?php endif; ?>
                    <?php if (isset($enable_guest_mode) && $enable_guest_mode != 1): ?>
                        Guest mode is disabled.
                    <?php endif; ?>
                </td>
            </tr>
        </table>
    </form>
</div>