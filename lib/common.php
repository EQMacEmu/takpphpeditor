<?php

function getNPCName($npcid)
{
    global $mysql;

    $query = "SELECT name FROM npc_types WHERE id=$npcid";
    $result = $mysql->query_assoc($query);
    if ($result) {
        return $result['name'];
    } else {
        return "N/A";
    }
}

function getZoneLongName($short_name)
{
    global $mysql;

    $query = "SELECT long_name FROM zone WHERE short_name=\"$short_name\"";
    $result = $mysql->query_assoc($query);
    if ($result) {
        return $result['long_name'];
    } else {
        return "N/A";
    }
}

function getZoneID($short_name)
{
    global $mysql;

    $query = "SELECT zoneidnumber AS id FROM zone WHERE short_name=\"$short_name\"";
    $result = $mysql->query_assoc($query);
    if ($result) {
        return $result['id'];
    } else {
        return "N/A";
    }
}

function getZoneIDByName($short_name)
{
    global $mysql;

    $query = "SELECT id FROM zone WHERE short_name=\"$short_name\"";
    $result = $mysql->query_assoc($query);
    if ($result) {
        return $result['id'];
    } else {
        return "N/A";
    }
}

function getZoneName($zoneidnumber)
{
    global $mysql;

    $query = "SELECT short_name FROM zone WHERE zoneidnumber=\"$zoneidnumber\"";
    $result = $mysql->query_assoc($query);
    if ($result) {
        return $result['short_name'];
    } else {
        return "N/A";
    }
}

function searchItems($search): array|string|null
{
    global $mysql;

    $query = "SELECT id, name, lore FROM items WHERE name rlike \"$search\"";
    return $mysql->query_mult_assoc($query);
}

function get_merchant_id()
{
    global $mysql, $npcid;
    $query = "SELECT merchant_id FROM npc_types WHERE id=$npcid";
    $result = $mysql->query_assoc($query);
    if ($result) {
        return $result['merchant_id'];
    } else {
        return "N/A";
    }
}

function get_item_name($id)
{
    global $mysql;
    $query = "SELECT name FROM items WHERE id=$id";
    $result = $mysql->query_assoc($query);
    if ($result) {
        return $result['name'];
    } else {
        return "Item not in DB";
    }
}

function getFactionName($fid)
{
    global $mysql;
    $query = "SELECT name FROM faction_list WHERE id=$fid";
    $result = $mysql->query_assoc($query);
    if ($result) {
        return $result['name'];
    } else {
        return "N/A";
    }
}

function getRecipeName($id)
{
    global $mysql;
    $query = "SELECT name FROM tradeskill_recipe WHERE id=$id";
    $result = $mysql->query_assoc($query);
    if ($result) {
        return $result['name'];
    } else {
        return "N/A";
    }
}

function getSpellName($id)
{
    global $mysql;
    $query = "SELECT name FROM spells_new WHERE id=$id";
    $result = $mysql->query_assoc($query);
    if ($result) {
        return $result['name'];
    } else {
        return "Not Found";
    }
}

function getSpellsetName($id)
{
    global $mysql;
    $query = "SELECT name FROM npc_spells WHERE id=$id";
    $result = $mysql->query_assoc($query);
    if ($result) {
        return $result['name'];
    } else {
        return "Not Found";
    }
}

function check_authorization(): void
{
    global $tmpl;

    if (!session::check_authorization()) {
        $body = "<div class='center'><br><br><br><br><br><h2>Sorry, guests do not have access to this function.<br><br><a href=\"javascript:history.back();\">Go Back</a></h2></div>";
        $tmpl->set('body', $body);
        echo $tmpl->fetch('templates/index.tmpl.php');
        exit;
    }
}

function check_admin_authorization(): void
{
    global $tmpl;

    if (!session::is_admin()) {
        $body = "<div class='center'><br><br><br><br><br><h2>Sorry, only admins have access to this function.<br><br><a href=\"javascript:history.back();\">Go Back</a></h2></div>";
        $tmpl->set('body', $body);
        echo $tmpl->fetch('templates/index.tmpl.php');
        exit;
    }
}

function search_npc_by_id(): array|string|null
{
    global $mysql;
    $npcid = $_GET['npc_id'];

    $query = "SELECT id,name FROM npc_types WHERE id=\"$npcid\"";
    return $mysql->query_mult_assoc($query);
}

function search_npcs(): array|string|null
{
    global $mysql;
    $search = $_GET['search'];

    $query = "SELECT id,name FROM npc_types WHERE name rlike \"$search\"";
    return $mysql->query_mult_assoc($query);
}

function search_item_by_id(): array|string|null
{
    global $mysql;
    $id = $_GET['id'];

    $query = "SELECT id, name FROM items WHERE id=\"$id\"";
    return $mysql->query_mult_assoc($query);
}

function search_items(): array|string|null
{
    global $mysql;
    $search = $_GET['search'];

    $query = "SELECT id, name FROM items WHERE name rlike \"$search\"";
    return $mysql->query_mult_assoc($query);
}

function get_zone_by_npcid($npcid)
{
    global $mysql;
    $npczone = substr($npcid, 0, -3);

    $query = "SELECT short_name FROM zone WHERE zoneidnumber=\"$npczone\"";
    $result = $mysql->query_assoc($query);
    return $result['short_name'] ?? null;
}

function get_zoneid_by_npcid($npcid)
{
    global $mysql;
    $npczone = substr($npcid, 0, -3);

    $query = "SELECT id FROM zone WHERE zoneidnumber=\"$npczone\"";
    $result = $mysql->query_assoc($query);
    if ($result) {
        return $result['id'];
    } else {
        return "N/A";
    }
}

function get_npcid_by_emoteid($emoteid)
{
    global $mysql;

    $query = "SELECT id FROM npc_types WHERE emoteid=\"$emoteid\" limit 1";
    $result = $mysql->query_assoc($query);
    if ($result) {
        return $result['id'];
    } else {
        return "N/A";
    }
}

function getPlayerName($playerid)
{
    global $mysql;

    if ($playerid > 0) {
        $query = "SELECT name FROM character_data WHERE id=$playerid";
        $result = $mysql->query_assoc($query);
        return $result['name'];
    } else {
        return "";
    }
}

function getPlayerID($playername)
{
    global $mysql;

    $query = "SELECT id FROM character_data WHERE name=\"$playername\"";
    $result = $mysql->query_assoc($query);
    if ($result) {
        return $result['id'];
    } else {
        return "N/A";
    }
}

function search_players_by_name(): array|string|null
{
    global $mysql;
    $playername = $_POST['playername'];

    $query = "SELECT id, name FROM character_data WHERE name rlike \"$playername\"";
    return $mysql->query_mult_assoc($query);
}

function search_players_by_id(): array|string|null
{
    global $mysql;
    $playerid = $_POST['playerid'];

    $query = "SELECT id, name FROM character_data WHERE id rlike \"$playerid\"";
    return $mysql->query_mult_assoc($query);
}

function getGuildName($guildid)
{
    global $mysql;

    $query = "SELECT name FROM guilds WHERE id = $guildid";
    $result = $mysql->query_assoc($query);
    if ($result) {
        return $result['name'];
    } else {
        return "Not Found";
    }
}

function search_spell_by_id(): array|string|null
{
    global $mysql;
    $id = $_GET['id'];

    $query = "SELECT id, name FROM spells_new WHERE id = \"$id\"";
    return $mysql->query_mult_assoc($query);
}

function search_spells_by_name(): array|string|null
{
    global $mysql;
    $search = $_GET['search'];

    $query = "SELECT id, name FROM spells_new WHERE name rlike \"$search\"";
    return $mysql->query_mult_assoc($query);
}

function getAccountName($acctid)
{
    global $mysql;

    $query = "SELECT name FROM account WHERE id=$acctid";
    $result = $mysql->query_assoc($query);
    if ($result) {
        return $result['name'];
    } else {
        return "Not Found";
    }
}

function getAccountID($lsname)
{
    global $mysql;

    $query = "SELECT id FROM account WHERE name=\"$lsname\"";
    $result = $mysql->query_assoc($query);
    if ($result) {
        return $result['id'];
    } else {
        return "Not Found";
    }
}

function search_accounts_by_name(): array|string|null
{
    global $mysql;
    $search = $_POST['lsaccount_name'];

    $query = "SELECT id, name, lsaccount_id FROM account WHERE name rlike \"$search\"";
    return $mysql->query_mult_assoc($query);
}

function search_accounts_by_id(): array|string|null
{
    global $mysql;
    $lsacctid = $_POST['lsaccount_id'];

    $query = "SELECT id, name, lsaccount_id FROM account WHERE lsaccount_id rlike \"$lsacctid\"";
    return $mysql->query_mult_assoc($query);
}

function get_real_time($unix_time)
{
    global $mysql;

    $query = "SELECT FROM_UNIXTIME($unix_time) AS real_time";
    $result = $mysql->query_assoc($query);

    if ($result) {
        return $result['real_time'];
    } else {
        return "Not Found";
    }
}

function get_current_time()
{
    global $mysql;

    $query = "SELECT NOW() AS timestamp";
    $result = $mysql->query_assoc($query);

    if ($result) {
        return $result['timestamp'];
    } else {
        return "Not Found";
    }
}

function search_guilds(): array|string|null
{
    global $mysql;
    $search = $_GET['search'];

    $query = "SELECT id, name FROM guilds WHERE name rlike \"$search\"";
    return $mysql->query_mult_assoc($query);
}

function search_guilds_by_id(): array|string|null
{
    global $mysql;
    $guild_id = $_GET['guild_id'];

    $query = "SELECT id, name FROM guilds WHERE id=\"$guild_id\"";
    return $mysql->query_mult_assoc($query);
}

function search_guilds_by_charid(): array|string|null
{
    global $mysql;
    $charid = $_GET['charid'];

    $query = "SELECT char_id, guild_id FROM guild_members WHERE char_id=\"$charid\"";
    return $mysql->query_mult_assoc($query);
}

function search_guilds_by_charname(): array|string|null
{
    global $mysql;
    $charname = $_GET['charname'];

    $query = "SELECT char_id, guild_id FROM guild_members WHERE char_id IN (SELECT id FROM character_data WHERE name RLIKE \"$charname\")";
    return $mysql->query_mult_assoc($query);
}

function search_aas_by_name(): array|string|null
{
    global $mysql;
    $search = $_GET['search'];

    $query = "SELECT skill_id, name FROM altadv_vars WHERE name rlike \"$search\" ORDER BY name, skill_id";
    return $mysql->query_mult_assoc($query);
}

function search_aas_by_id(): array|string|null
{
    global $mysql;
    $aaid = $_GET['aaid'];

    $query = "SELECT skill_id, name FROM altadv_vars WHERE skill_id=\"$aaid\"";
    return $mysql->query_mult_assoc($query);
}

function getAAName($aaid)
{
    global $mysql;

    $query = "SELECT name FROM altadv_vars WHERE skill_id=\"$aaid\"";
    $result = $mysql->query_assoc($query);
    if ($result) {
        return $result['name'];
    } else {
        return "Not Found";
    }
}

function getPageInfo($table, $page, $size, $sort, $where = ""): array
{
    global $mysql;
    $stats = array();

    $query = "SELECT COUNT(*) AS total FROM $table";
    if ($where) {
        $query .= " WHERE $where";
    }
    $count = $mysql->query_assoc($query);
    $pages = ceil($count['total'] / $size);
    if ($page > $pages) {
        $page = $pages;
    }
    $stats['count'] = $count['total'];
    $stats['pages'] = $pages;
    $stats['page'] = $page;
    $stats['sort'] = $sort;

    return $stats;
}

function delete_player($playerid): void
{
    global $mysql;

    $query = "DELETE FROM aa_timers WHERE charid=$playerid";
    $mysql->query_no_result($query);
    $query = "DELETE FROM buyer WHERE charid=$playerid";
    $mysql->query_no_result($query);
    $query = "DELETE FROM character_activities WHERE charid=$playerid";
    $mysql->query_no_result($query);
    $query = "DELETE FROM character_alternate_abilities WHERE id=$playerid";
    $mysql->query_no_result($query);
    $query = "DELETE FROM character_alt_currency WHERE char_id=$playerid";
    $mysql->query_no_result($query);
    $query = "DELETE FROM character_backup WHERE charid=$playerid";
    $mysql->query_no_result($query);
    $query = "DELETE FROM character_bind WHERE id=$playerid";
    $mysql->query_no_result($query);
    $query = "DELETE FROM character_buffs WHERE character_id=$playerid";
    $mysql->query_no_result($query);
    $query = "DELETE FROM character_currency WHERE id=$playerid";
    $mysql->query_no_result($query);
    $query = "DELETE FROM character_data WHERE id=$playerid";
    $mysql->query_no_result($query);
    $query = "DELETE FROM character_disciplines WHERE id=$playerid";
    $mysql->query_no_result($query);
    $query = "DELETE FROM character_inspect_messages WHERE id=$playerid";
    $mysql->query_no_result($query);
    $query = "DELETE FROM character_languages WHERE id=$playerid";
    $mysql->query_no_result($query);
    $query = "DELETE FROM character_leadership_abilities WHERE id=$playerid";
    $mysql->query_no_result($query);
    $query = "DELETE FROM character_lookup WHERE id=$playerid";
    $mysql->query_no_result($query);
    $query = "DELETE FROM character_memmed_spells WHERE id=$playerid";
    $mysql->query_no_result($query);
    $query = "DELETE FROM character_pet_buffs WHERE char_id=$playerid";
    $mysql->query_no_result($query);
    $query = "DELETE FROM character_pet_info WHERE char_id=$playerid";
    $mysql->query_no_result($query);
    $query = "DELETE FROM character_pet_inventory WHERE char_id=$playerid";
    $mysql->query_no_result($query);
    $query = "DELETE FROM character_skills WHERE id=$playerid";
    $mysql->query_no_result($query);
    $query = "DELETE FROM character_spells WHERE id=$playerid";
    $mysql->query_no_result($query);
    $query = "DELETE FROM char_recipe_list WHERE char_id=$playerid";
    $mysql->query_no_result($query);
    $query = "DELETE FROM discovered_items WHERE char_name=(SELECT name FROM character_data WHERE id=$playerid)";
    $mysql->query_no_result($query);
    $query = "DELETE FROM character_faction_values WHERE id=$playerid";
    $mysql->query_no_result($query);
    $query = "DELETE FROM friends WHERE charid=$playerid";
    $mysql->query_no_result($query);
    $query = "DELETE FROM group_id WHERE charid=$playerid";
    $mysql->query_no_result($query);
    $query = "DELETE FROM guild_members WHERE char_id=$playerid";
    $mysql->query_no_result($query);
    //hackers?
    $query = "DELETE FROM inventory WHERE charid=$playerid";
    $mysql->query_no_result($query);
    $query = "DELETE FROM keyring WHERE char_id=$playerid";
    $mysql->query_no_result($query);
    $query = "DELETE FROM mail WHERE charid=$playerid";
    $mysql->query_no_result($query);
    //mercs?
    //petitions?
    $query = "DELETE FROM character_corpses WHERE charid=$playerid";
    $mysql->query_no_result($query);
    $query = "DELETE FROM player_corpses_backup WHERE charid=$playerid";
    $mysql->query_no_result($query);
    $query = "DELETE FROM player_titlesets WHERE char_id=$playerid";
    $mysql->query_no_result($query);
    $query = "DELETE FROM quest_globals WHERE charid=$playerid";
    $mysql->query_no_result($query);
    $query = "DELETE FROM raid_members WHERE charid=$playerid";
    $mysql->query_no_result($query);
    //reports?
    $query = "DELETE FROM timers WHERE char_id=$playerid";
    $mysql->query_no_result($query);
    $query = "DELETE FROM trader WHERE char_id=$playerid";
    $mysql->query_no_result($query);
    //trader_audit?
    $query = "DELETE FROM zone_flags WHERE charID=$playerid";
    $mysql->query_no_result($query);
}

function delete_account($acctid): void
{
    global $mysql;

    $query = "DELETE FROM account WHERE id=$acctid";
    $mysql->query_no_result($query);
    $query = "DELETE FROM account_ip WHERE accid=$acctid";
    $mysql->query_no_result($query);
    $query = "DELETE FROM account_rewards WHERE account_id=$acctid";
    $mysql->query_no_result($query);
    $query = "DELETE FROM eventlog WHERE accountid=$acctid";
    $mysql->query_no_result($query);
    $query = "DELETE FROM gm_ips WHERE account_id=$acctid";
    $mysql->query_no_result($query);
    //hackers table not associated with $acctid
    //petitions table not associated with $acctid
    $query = "DELETE FROM sharedbank WHERE acctid=$acctid";
    $mysql->query_no_result($query);
}

function get_currency_name($curr_id)
{
    global $mysql;

    $query = "SELECT a.item_id, i.name FROM alternate_currency a, items i WHERE a.item_id = i.id AND a.id = $curr_id";
    $result = $mysql->query_assoc($query);

    if ($result) {
        return $result['name'];
    } else {
        return "Not Found";
    }
}

function factions_array(): array|string|null
{
    global $mysql;

    $query = "SELECT id, name FROM faction_list ORDER BY name";
    $results = $mysql->query_mult_assoc($query);

    $arr[] = array("id" => 0, "name" => "None");
    return $arr + $results;
}

function html_replace($text): array|string
{
    return str_replace("<", "&lt;", $text);
}

function item_isNoRent($item_id): bool
{
    global $mysql;

    $query = "SELECT norent FROM items WHERE id=$item_id";
    $result = $mysql->query_assoc($query);

    if ($result['norent'] == 0) {
        return true;
    } else {
        return false;
    }
}

function set_search_results(): array|string|null
{
    global $list_limit;

    if (isset($_GET['playerid']) && ($_GET['playerid'] != "") && ($_GET['playerid'] != "Player ID")) {
        $search_results = search_by_playerid($_GET['playerid']);
    }
    elseif (isset($_GET['player_name']) && ($_GET['player_name'] != "") && ($_GET['player_name'] != "Player Name")) {
        $search_results = search_by_playername($_GET['player_name'], $list_limit);
    }
    else {
        $search_results = "";
    }
    return $search_results;
}

function isGlobalLoot($loottable_id) {
  global $mysql;

  $query = "SELECT id FROM global_loot WHERE loottable_id=$loottable_id LIMIT 1";
  $result = $mysql->query_assoc($query);

  if ($result && $result['id'] > 0) {
    return true;
  }
  else {
    return false;
  }
}

function isValidLoot($loottable_id) {
  global $mysql;

  $query = "SELECT id FROM loottable WHERE id=$loottable_id LIMIT 1";
  $result = $mysql->query_assoc($query);

  if ($result && $result['id'] > 0) {
    return true;
  }
  else {
    return false;
  }
}

?>