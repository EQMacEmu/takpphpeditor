<?php

class session {

	public static function start(): void
    {
		global $SessionTimeout;
		ini_set('session.gc_maxlifetime', $SessionTimeout);
		ini_set('session.gc_probability', 1);
		session_set_cookie_params($SessionTimeout ?? 0);
		session_start();
	}
  
  public static function login($login, $pw): void
  {
    global $mysql, $password;
    
    $query = "SELECT password FROM peq_admin WHERE login = ?";
    $result = $mysql->execute_query($query, [$login]);

    if ($result->num_rows < 0) {
      $_SESSION['error'] = 1;
      logSQL("Invalid login attempt. Bad username from IP: '" . getIP() . "'. Username: '$login' Password: '$pw'.");
      return;
    }

    $row = $result->fetch_assoc();
    extract($row);
    
    if ($password == md5($pw)) {
      $_SESSION['login'] = $login;
      $_SESSION['password'] = md5($pw);
    }
    else {
      $_SESSION['error'] = 1;
      logSQL("Invalid login attempt. Bad password from IP: '" . getIP() . "'. Username: '$login' Password: '$pw'.");
    }
  }
  
  public static function logged_in(): bool
  {
    global $mysql, $password;

    if (isset($_SESSION['guest']) && $_SESSION['guest'] == 1) return true;

    if (!isset($_SESSION['login']) || !isset($_SESSION['password'])) return false;

    $login = $_SESSION['login'];
    $pw = $_SESSION['password'];

    $query = "SELECT password FROM peq_admin WHERE login = ?";
    $result = $mysql->execute_query($query, [$login]);

    if ($result->num_rows < 0) {
      return false;
    }

    $row = $result->fetch_assoc();
    extract($row);

    if ($password == $pw) {
      return true;
    }
    else return false;
  }

  public static function check_authorization(): bool
  {
    global $mysql, $password;
    
    if (isset($_SESSION['guest']) && $_SESSION['guest'] == 1) return false;

    if (!isset($_SESSION['login']) || !isset($_SESSION['password'])) return false;

    $login = $_SESSION['login'];
    $pw = $_SESSION['password'];

    $query = "SELECT password FROM peq_admin WHERE login = ?";
    $result = $mysql->execute_query($query, [$login]);

    if ($result->num_rows < 0) {
      return false;
    }

    $row = $result->fetch_assoc();
    extract($row);

    if ($password == $pw) {
      return true;
    }
    else return false;
  }

  public static function is_admin(): bool
  {
    global $mysql, $administrator;
    
    if (isset($_SESSION['guest']) && $_SESSION['guest'] == 1) return false;

    if (!isset($_SESSION['login']) || !isset($_SESSION['password'])) return false;

    $login = $_SESSION['login'];

    $query = "SELECT administrator FROM peq_admin WHERE login = ?";
    $result = $mysql->execute_query($query, [$login]);

    $row = $result->fetch_assoc();
    extract($row);

    if ($administrator == 1) {
      return true;
    }
    else return false;
  }

  public static function stop(): void
  {
    session_unset();
    session_destroy();
  }
}

session::start();

// Handle logouts
if (isset($_GET['logout'])) {
  session::stop();
  header('Location: index.php');
  exit;
}

// Handle logins
if (isset($_GET['login'])) {
  if ($_GET['login'] == "guest" && (isset($enable_guest_mode) && $enable_guest_mode == 1)) {
    $_SESSION['guest'] = 1;
  }
  if ($_GET['login'] == "guest" && (isset($enable_guest_mode) && $enable_guest_mode != 1)) {
    $_SESSION['guest'] = 0;
  }
  if (isset($enable_user_login) && $enable_user_login != 1) {
  $login = $_POST['login'];
  $password = $_POST['password'];
   logSQL("POSSIBLE HACK ATTEMPT. Person was from IP: '" . getIP() . "'. and used Username: '$login' Password: '$password'.");
   $_SESSION['error'] = 1;
  }
  else {
    session::login($_POST['login'], $_POST['password']);
  }
  header('Location: index.php');
  exit;
}

// Verify user is logged in
if (!session::logged_in()) {
  $body = new Template("templates/login.tmpl.php");
  $error = isset($_SESSION['error']) ? 1 : 0;
  $body->set('enable_guest_mode', $enable_guest_mode ?? false);
  $body->set('enable_user_login', $enable_user_login ?? false);
  $body->set('error', $error);
  $body->set('login', $login ?? '');
  $body->set('password', $password ?? '');
  if(isset($tmpl)) {
    $tmpl->set('body', $body);
    echo $tmpl->fetch('templates/index.tmpl.php');
  }
  unset($_SESSION['error']);
  exit;
}

// Get IP address
function getIP() {
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  }
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }

  return $ip;
}
?>
