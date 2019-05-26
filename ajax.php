<?php

$editor = (isset($_GET['editor'])) ? $_GET['editor'] : null;
$action = (isset($_GET['action'])) ? intval($_GET['action']) : 0;
$npcid = (isset($_GET['npcid'])) ? intval($_GET['npcid']) : 0;
$z = (isset($_GET['z'])) ? $_GET['z'] : null;
$zoneid = (isset($_GET['zoneid'])) ? intval($_GET['zoneid']) : 0;
$fid = (isset($_GET['fid'])) ? intval($_GET['fid']) : 0;
$tskid = (isset($_GET['tskid'])) ? intval($_GET['tskid']) : 0;
$ts = (isset($_GET['ts'])) ? intval($_GET['ts']) : 0;
$rec = (isset($_GET['rec'])) ? intval($_GET['rec']) : 0;
$spellset = (isset($_GET['spellset'])) ? intval($_GET['spellset']) : 0;
$playerid = (isset($_GET['playerid'])) ? intval($_GET['playerid']) : 0;
$acctid = (isset($_GET['acctid'])) ? intval($_GET['acctid']) : 0;
$guildid = (isset($_GET['guildid'])) ? intval($_GET['guildid']) : 0;
$aaid = (isset($_GET['aaid'])) ? intval($_GET['aaid']) : 0;

?>