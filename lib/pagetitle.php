<?php

$pagetitle = 'TAKP Database Editor';

switch ($editor) {
  case '':
    break;
  case 'npc':
    $pagetitle = "<a href='index.php?editor=" . $editor . "'>NPC Editor</a>";
    break;
  case 'npcmultiedit':
    $pagetitle = "<a href='index.php?editor=" . $editor . "'>NPC Multi-Edit</a>";
    break;
  case 'loot':
    $pagetitle = "<a href='index.php?editor=" . $editor . "'>Loot Editor</a>";
    break;
  case 'spawn':
    $pagetitle = "<a href='index.php?editor=" . $editor . "'>Spawn Editor</a>";
    break;
  case 'merchant':
    $pagetitle = "<a href='index.php?editor=" . $editor . "'>Merchant Editor</a>";
    break;
  case 'spellops':
    $pagetitle = "<a href='index.php?editor=" . $editor . "'>Spell Options</a>";
    break;
  case 'spells':
    $pagetitle = "<a href='index.php?editor=spellops'>Spell Options</a>" . " >> " . "<a href='index.php?editor=" . $editor . "'>Spell Editor</a>";
    break;
  case 'spellset':
    $pagetitle = "<a href='index.php?editor=spellops'>Spell Options</a>" . " >> " . "<a href='index.php?editor=" . $editor . "'>Spellset Editor</a>";
    break;
  case 'faction':
    $pagetitle = "<a href='index.php?editor=" . $editor . "'>Faction Editor</a>";
    break;
  case 'tradeskill':
    $pagetitle = "<a href='index.php?editor=" . $editor . "'>Tradeskill Editor</a>";
    break;
  case 'zone':
    $pagetitle = "<a href='index.php?editor=" . $editor . "'>Zone Editor</a>";
    break;
  case 'misc':
    $pagetitle = "<a href='index.php?editor=" . $editor . "'>Miscellaneous Editor</a>";
    break;
  case 'server':
    $pagetitle = "<a href='index.php?editor=" . $editor . "'>Server Config</a>";
    break;
  case 'items':
    $pagetitle = "<a href='index.php?editor=" . $editor . "'>Item Editor</a>";
    break;
  case 'player':
    $pagetitle = "<a href='index.php?editor=" . $editor . "'>Players</a>";
    break;
  case 'account':
    $pagetitle = "<a href='index.php?editor=" . $editor . "'>Accounts</a>";
    break;
  case 'guild':
    $pagetitle = "<a href='index.php?editor=" . $editor . "'>Guilds</a>";
    break;
  case 'mail':
    $pagetitle = "<a href='index.php?editor=" . $editor . "'>Mail</a>";
    break;
  case 'aa':
    $pagetitle = "<a href='index.php?editor=" . $editor . "'>AAs</a>";
    break;
  case 'qglobal':
    $pagetitle = "<a href='index.php?editor=" . $editor . "'>Quest Globals</a>";
    break;
  case 'util':
    $pagetitle = "<a href='index.php?editor=" . $editor . "'>Utilities</a>";
    break;
  case 'altcur':
    $pagetitle = "<a href='index.php?editor=" . $editor . "'>Alternate Currency</a>";
    break;
  case 'quest':
    $pagetitle = "<a href='index.php?editor=" . $editor . "'>Quest Editor</a>";
    break;
  case 'inv':
    $pagetitle = "<a href='index.php?editor=" . $editor . "'>Player Inventory</a>";
    break;
  case 'keys':
    $pagetitle = "<a href='index.php?editor=" . $editor . "'>Player Keys</a>";
    break;
}

if (isset($z) && $z != '') $pagetitle .= " >> " . "<a href='index.php?editor=" . $editor . "&z=" . $z . "&zoneid=" . getZoneIDByName($z) . "'>" . getZoneLongName($z) . "</a>";
if (isset($npcid) && intval($npcid) > 0 && $editor != 'altcur' && $editor != 'qglobal') $pagetitle .= " >> " . getNPCName($npcid) . " ($npcid)";
if (isset($fid) && intval($fid) > 0) $pagetitle .= " >> " . getFactionName($fid);
if (isset($tskid) && intval($tskid) > 0) $pagetitle .= " >> " . getTaskTitle($tskid);
if (isset($ts) && intval($ts) > 0) $pagetitle .= " >> " . "<a href='index.php?editor=" . $editor . "&ts=" . $ts . "'>" . $tradeskills[$ts] . "</a>";
if (isset($rec) && intval($rec) > 0) $pagetitle .= " >> " . getRecipeName($rec);
if (isset($spellset) && intval($spellset) > 0) $pagetitle .= " >> " . getSpellsetName($spellset);
if (isset($playerid) && intval($playerid) > 0) $pagetitle .= " >> <a href='index.php?editor=" . $editor . "&playerid=" . $playerid . "'>" . getPlayerName($playerid) . " ($playerid)</a>";
if (isset($acctid) && intval($acctid) > 0) $pagetitle .= " >> " . getAccountName($acctid) . " ($acctid)";
if (isset($guildid) && intval($guildid) > 0) $pagetitle .= " >> " . getGuildName($guildid) . " ($guildid)";
if (isset($aaid) && intval($aaid) > 0) $pagetitle .= " >> " . getAAName($aaid) . " ($aaid)";

?>
