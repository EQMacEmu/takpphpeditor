<?php

$current_revision = "28 January 2024";

require_once("config.php");
require_once("lib/logging.php");
require_once("classes/mysqli.php");
require_once("classes/template.php");
require_once("classes/session.php");
require_once("lib/common.php");
require_once("lib/data.php");


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

$searchbar = '';
$body = '';
$javascript = '';
$breadcrumbs = '';
$pagetitle = 'TAKP Database Editor';
$headbar = '';
$SessionTimeout = 604800;

require_once("lib/headbars.php");
require_once("lib/breadcrumbs.php");
require_once("lib/pagetitle.php");

if (isset($_GET['admin'])) {
	if (session::is_admin()) {
		require_once("lib/admin.php");
	}
}

switch ($editor) {
	case '':
		$body = new Template("templates/intro.tmpl.php");
		$body->set('current_revision', $current_revision);
		break;
	case 'loot':
		require_once("lib/loot.php");
		break;
	case 'npc':
		require_once("lib/npc.php");
		break;
	case 'npcmultiedit':
		require_once("lib/npcmultiedit.php");
		break;
	case 'spawn':
		require_once("lib/spawn.php");
		break;
	case 'merchant':
		require_once("lib/merchant.php");
		break;
	case 'faction':
		require_once("lib/faction.php");
		break;
	case 'spellset':
		require_once("lib/spellset.php");
		break;
	case 'tradeskill':
		require_once("lib/tradeskill.php");
		break;
	case 'zone':
		require_once("lib/zone.php");
		break;
	case 'misc':
		require_once("lib/misc.php");
 		break;
	case 'server':
		require_once("lib/server.php");
		break;
	case 'items':
		require_once("lib/items.php");
		break;
	case 'player':
		require_once("lib/player.php");
		break;
	case 'spells':
		require_once("lib/spellenums.php");
		require_once("lib/spells.php");
		break;
	case 'spellops':
		require_once("lib/spellops.php");
		break;
	case 'account':
		require_once("lib/account.php");
		break;
	case 'guild':
		require_once("lib/guild.php");
		break;
	case 'aa':
		require_once("lib/spellenums.php");
		require_once("lib/aa.php");
		break;
	case 'qglobal':
		require_once("lib/qglobal.php");
		break;
	case 'util':
		require_once("lib/util.php");
		break;
	case 'quest':
		require_once("lib/quest.php");
		break;
	case 'inv':
		require_once("lib/inventory.php");
		break;
	case 'keys':
		require_once("lib/keys.php");
		break;
}

global $tmpl;
$tmpl->set('javascript', $javascript);
$tmpl->set('headbar', $headbar);
$tmpl->set('searchbar', $searchbar);
$tmpl->set('breadcrumbs', $breadcrumbs);
$tmpl->set('pagetitle', $pagetitle);
$tmpl->set('body', $body);

echo $tmpl->fetch('templates/index.tmpl.php');

?>
