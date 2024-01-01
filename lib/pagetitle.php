<?php

$pagetitle = "TAKP Database Editor";

switch ($editor ?? '') {
    case '':
        break;
    case 'npc':
        $pagetitle .= " - NPC Editor";
        break;
    case 'npcmultiedit':
        $pagetitle .= " - NPC Multi-Edit";
        break;
    case 'loot':
        $pagetitle .= " - Loot Editor";
        break;
    case 'spawn':
        $pagetitle .= " - Spawn Editor";
        break;
    case 'merchant':
        $pagetitle .= " - Merchant Editor";
        break;
    case 'spellops':
        $pagetitle .= " - Spell Options";
        break;
    case 'spells':
        $pagetitle .= " - Spell Editor";
        break;
    case 'spellset':
        $pagetitle .= " - Spellset Editor";
        break;
    case 'faction':
        $pagetitle .= " - Faction Editor";
        break;
    case 'tradeskill':
        $pagetitle .= " - Tradeskill Editor";
        break;
    case 'zone':
        $pagetitle .= " - Zone Editor";
        break;
    case 'misc':
        $pagetitle .= " - Miscellaneous Editor";
        break;
    case 'server':
        $pagetitle .= " - Server Config";
        break;
    case 'items':
        $pagetitle .= " - Item Editor";
        break;
    case 'player':
        $pagetitle .= " - Players";
        break;
    case 'account':
        $pagetitle .= " - Accounts";
        break;
    case 'guild':
        $pagetitle .= " - Guilds";
        break;
    case 'mail':
        $pagetitle .= " - Mail";
        break;
    case 'aa':
        $pagetitle .= " - AAs";
        break;
    case 'qglobal':
        $pagetitle .= " - Quest Globals";
        break;
    case 'util':
        $pagetitle .= " - Utilities";
        break;
    case 'altcur':
        $pagetitle .= " - Alternate Currency";
        break;
    case 'quest':
        $pagetitle .= " - Quest Editor";
        break;
    case 'inv':
        $pagetitle .= " - Player Inventory";
        break;
    case 'keys':
        $pagetitle .= " - Player Keys";
        break;
}

if (!empty($z)) $pagetitle .= " - " . getZoneLongName($z);
if (!empty($npcid) && $npcid != 'ID' && (isset($editor) && $editor != 'altcur') && $editor != 'qglobal') $pagetitle .= " - " . getNPCName($npcid);
if (!empty($fid)) $pagetitle .= " - " . getFactionName($fid);
if (!empty($ts)) $pagetitle .= " - " . (isset($tradeskills) ? $tradeskills[$ts] : '');
if (!empty($rec)) $pagetitle .= " - " . getRecipeName($rec);
if (!empty($spellset)) $pagetitle .= " - " . getSpellsetName($spellset);
if (!empty($playerid) && ($playerid != 'Player ID')) $pagetitle .= " - " . getPlayerName($playerid);
if (!empty($acctid)) $pagetitle .= " - " . getAccountName($acctid) . " ($acctid)";
if (!empty($guildid)) $pagetitle .= " - " . getGuildName($guildid) . " ($guildid)";
if (!empty($aaid)) $pagetitle .= " - " . getAAName($aaid) . " ($aaid)";

?>
