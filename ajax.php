<?php

$editor     = (isset($_GET['editor']) ? $_GET['editor'] : '');
$action     = (isset($_GET['action']) ? $_GET['action'] : 0);
$npcid      = (isset($_GET['npcid']) ? $_GET['npcid'] : null);
$z          = (isset($_GET['z']) ? $_GET['z'] : '');
$zoneid     = (isset($_GET['zoneid']) ? $_GET['zoneid'] : '');
$fid        = (isset($_GET['fid']) ? $_GET['fid'] : '');
$tskid      = (isset($_GET['tskid']) ? $_GET['tskid'] : '');
$ts         = (isset($_GET['ts']) ? $_GET['ts'] : '');
$rec        = (isset($_GET['rec']) ? intval($_GET['rec']) : '0');
$spellset   = (isset($_GET['spellset']) ? $_GET['spellset'] : '');
$playerid   = (isset($_GET['playerid']) ? $_GET['playerid'] : null);
$acctid     = (isset($_GET['acctid']) ? $_GET['acctid'] : null);
$guildid    = (isset($_GET['guildid']) ? $_GET['guildid'] : null);
$aaid       = (isset($_GET['aaid']) ? $_GET['aaid'] : null);

?>