<?php

require_once("revision.php");
require_once(dirname(__FILE__) . '/config.php');
require_once(dirname(__FILE__) . '/defines.php');
require_once(dirname(__FILE__) . '/lib/logging.php');
if ($mysql_class == 'mysqli') {
	require_once(dirname(__FILE__) . '/classes/mysqli.php');
}
else {
	require_once(dirname(__FILE__) . '/classes/mysql.php');
}
require_once(dirname(__FILE__) . '/classes/template.php');
require_once(dirname(__FILE__) . '/classes/session.php');
require_once(dirname(__FILE__) . '/lib/common.php');
require_once(dirname(__FILE__) . '/lib/data.php');
require_once(dirname(__FILE__) . '/ajax.php');
require_once(dirname(__FILE__) . '/lib/headbars.php');
require_once(dirname(__FILE__) . '/lib/breadcrumbs.php');
require_once(dirname(__FILE__) . '/lib/pagetitle.php');

if (isset($_GET['admin'])) {
	if (session::is_admin()) {
		require_once(dirname(__FILE__) . '/lib/admin.php');
	}
}

switch ($editor) {
	case '':
		$body = new Template("templates/intro.tmpl.php");
		$body->set('current_revision', $current_revision);
		break;
	case 'loot':
		require_once(dirname(__FILE__) . '/lib/loot.php');
		break;
	case 'npc':
		require_once(dirname(__FILE__) . '/lib/npc.php');
		break;
	case 'npcmultiedit':
		require_once(dirname(__FILE__) . '/lib/npcmultiedit.php');
		break;
	case 'spawn':
		require_once(dirname(__FILE__) . '/lib/spawn.php');
		break;
	case 'merchant':
		require_once(dirname(__FILE__) . '/lib/merchant.php');
		break;
	case 'faction':
		require_once(dirname(__FILE__) . '/lib/faction.php');
		break;
	case 'spellset':
		require_once(dirname(__FILE__) . '/lib/spellset.php');
		break;
	case 'tradeskill':
		require_once(dirname(__FILE__) . '/lib/tradeskill.php');
		break;
	case 'zone':
		require_once(dirname(__FILE__) . '/lib/zone.php');
		break;
	case 'misc':
		require_once(dirname(__FILE__) . '/lib/misc.php');
 		break;
	case 'server':
		require_once(dirname(__FILE__) . '/lib/server.php');
		break;
	case 'items':
		require_once(dirname(__FILE__) . '/lib/items.php');
		break;
	case 'player':
		require_once(dirname(__FILE__) . '/lib/player.php');
		break;
	case 'spells':
		require_once(dirname(__FILE__) . '/lib/spellenums.php');
		require_once(dirname(__FILE__) . '/lib/spells.php');
		break;
	case 'spellops':
		require_once(dirname(__FILE__) . '/lib/spellops.php');
		break;
	case 'account':
		require_once(dirname(__FILE__) . '/lib/account.php');
		break;
	case 'guild':
		require_once(dirname(__FILE__) . '/lib/guild.php');
		break;
	case 'aa':
		require_once(dirname(__FILE__) . '/lib/spellenums.php');
		require_once(dirname(__FILE__) . '/lib/aa.php');
		break;
	case 'qglobal':
		require_once(dirname(__FILE__) . '/lib/qglobal.php');
		break;
	case 'util':
		require_once(dirname(__FILE__) . '/lib/util.php');
		break;
	case 'quest':
		require_once(dirname(__FILE__) . '/lib/quest.php');
		break;
	case 'inv':
		require_once(dirname(__FILE__) . '/lib/inventory.php');
		break;
	case 'keys':
		require_once(dirname(__FILE__) . '/lib/keys.php');
		break;
}

$tmpl->set('javascript', $javascript);
$tmpl->set('headbar', $headbar);
$tmpl->set('searchbar', $searchbar);
$tmpl->set('breadcrumbs', $breadcrumbs);
$tmpl->set('pagetitle', $pagetitle);
$tmpl->set('body', $body);

echo $tmpl->fetch('templates/index.tmpl.php');

?>