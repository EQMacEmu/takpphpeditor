<?php

switch ($action) {
  case 0:
    $body = new Template("templates/spellops/spellops.default.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
	$body->set('mysql_class', $mysql_class ?? ""); /* TODO Fix: this variable is not defined anywhere */
    break;
  default:
    break;
}

?>
