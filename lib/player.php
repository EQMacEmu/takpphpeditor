<?php

$default_page = 1;
$default_size = 200;
$default_sort = 1;

$columns = array(
    1 => 'id',
    2 => 'name',
    3 => 'account_id',
    4 => 'class',
    5 => 'level'
);

switch ($action) {
    case 0:  // View Player Profile
        check_admin_authorization();
        if ($playerid) {
            $body = new Template("templates/player/player.tmpl.php");
            $body->set('playerid', $playerid);
            $body->set('classes', $classes);
            $body->set('genders', $genders);
            $body->set('bodytypes', $bodytypes);
            $body->set('races', $races);
            $body->set('yesno', $yesno);
            $body->set('skilltypes', $skilltypes);
            $body->set('langtypes', $langtypes);
            $body->set('player_name', getPlayerName($playerid));
            $body->set('deities', $deities);
            $body->set('anonymity', $anonymity);
            $vars = player_info();
            if ($vars) {
                foreach ($vars as $key => $value) {
                    $body->set($key, $value);
                }
            }
        } else {
            $curr_page = (isset($_GET['page'])) ? $_GET['page'] : $default_page;
            $curr_size = (isset($_GET['size'])) ? $_GET['size'] : $default_size;
            $curr_sort = (isset($_GET['sort'])) ? $columns[$_GET['sort']] : $columns[$default_sort];
            $sort = $_GET['sort'] ?? 1;
            $body = new Template("templates/player/player.default.tmpl.php");
            $page_stats = getPageInfo("character_data", $curr_page, $curr_size, $sort);
            if ($page_stats['page']) {
                $players = get_players($page_stats['page'], $curr_size, $curr_sort);
            }
            if ($players) {
                $body->set('players', $players);
                $body->set('classes', $classes);
                foreach ($page_stats as $key => $value) {
                    $body->set($key, $value);
                }
            } else {
                $body->set('page', 0);
                $body->set('pages', 0);
            }
        }
        break;
    case 1: // Edit Player Profile
        check_admin_authorization();
        $body = new Template("templates/player/player.edit.tmpl.php");
        $body->set('playerid', $playerid);
        $body->set('classes', $classes);
        $body->set('genders', $genders);
        $body->set('bodytypes', $bodytypes);
        $body->set('races', $races);
        $body->set('yesno', $yesno);
        $body->set('skilltypes', $skilltypes);
        $body->set('player_name', getPlayerName($playerid));
        $vars = player_info();
        if ($vars) {
            foreach ($vars as $key => $value) {
                $body->set($key, $value);
            }
        }
        break;
    case 2:  // Search Players
        check_admin_authorization();
        $body = new Template("templates/player/player.searchresults.tmpl.php");
        if (isset($_POST['playerid']) && $_POST['playerid'] != "Player ID") {
            $results = search_players_by_id();
        } else {
            $results = search_players_by_name();
        }
        $body->set("results", $results);
        break;
    case 3: // Update Player
        check_admin_authorization();
        update_player();
        header("Location: index.php?editor=player&playerid=$playerid");
        exit;
    case 4: // Delete Player
        check_admin_authorization();
        delete_player($playerid);
        if (isset($_GET['acctid'])) {
            header("Location: index.php?editor=account&acctid=$acctid");
        } else {
            header("Location: index.php?editor=player");
        }
        exit;
    case 5: // Edit Player Location
        check_admin_authorization();
        $cur_loc = get_player_location();
        $zonelist = get_zones();
        $body = new Template("templates/player/player.move.tmpl.php");
        $javascript = new Template("templates/player/js.tmpl.php");
        $body->set('playerid', $playerid);
        $body->set('cur_loc', $cur_loc);
        $body->set('zonelist', $zonelist);
        break;
    case 6: // Update Player Location
        check_admin_authorization();
        update_player_location();
        header("Location: index.php?editor=player&playerid=$playerid");
        exit;
}

function get_players($page_number, $results_per_page, $sort_by): array|string|null
{
    global $mysql;
    $limit = ($page_number - 1) * $results_per_page . "," . $results_per_page;

    $query = "SELECT id, account_id, name, level, class FROM character_data ORDER BY $sort_by LIMIT $limit";
    return $mysql->query_mult_assoc($query);
}

function player_info(): array|string
{
    global $mysql, $playerid;
    $skills = array();
    $languages = array();

    //Load from character_data
    $query = "SELECT * FROM character_data WHERE id=$playerid";
    $player_array = $mysql->query_assoc($query);

    //Load from character_skills
    $query = "SELECT * FROM character_skills WHERE id = $playerid";
    $results = $mysql->query_mult_assoc($query);
    if ($results) {
        foreach ($results as $result) {
            $skill_id = $result['skill_id'];
            $value = $result['value'];
            $skills[$skill_id] = $value;
        }
    }
    $player_array['skills'] = $skills;

    //Load from character_languages
    $query = "SELECT * FROM character_languages WHERE id = $playerid";
    $results = $mysql->query_mult_assoc($query);
    if ($results) {
        foreach ($results as $result) {
            $lang_id = $result['lang_id'];
            $value = $result['value'];
            $languages[$lang_id] = $value;
        }
    }
    $player_array['languages'] = $languages;

    //Load from character_bind
    $query = "SELECT * FROM character_bind WHERE id = $playerid";
    $result = $mysql->query_mult_assoc($query);
    $player_array['bind'] = $result;

    //Load from character_alternate_abilities
    $query = "SELECT * FROM character_alternate_abilities WHERE id = $playerid";
    $result = $mysql->query_mult_assoc($query);
    $player_array['alternate_abilities'] = $result;

    //Load from character_currency
    $query = "SELECT * FROM character_currency WHERE id = $playerid";
    $result = $mysql->query_assoc($query);
    $player_array['currency'] = $result;

    //Load from character_spells
    $query = "SELECT * FROM character_spells WHERE id = $playerid";
    $result = $mysql->query_mult_assoc($query);
    $player_array['spells'] = $result;

    //Load from character_memmed_spells
    $query = "SELECT * FROM character_memmed_spells WHERE id = $playerid";
    $result = $mysql->query_mult_assoc($query);
    $player_array['memmed_spells'] = $result;

    //Load from character_inspect_messages
    $query = "SELECT * FROM character_inspect_messages WHERE id = $playerid";
    $result = $mysql->query_assoc($query);
    if ($result) {
        $player_array['inspect_message'] = $result['inspect_message'];
    }

    //Load account details
    $accountid = $player_array['account_id'];
    $query = "SELECT name, lsaccount_id, status FROM account WHERE id = $accountid";
    $result = $mysql->query_assoc($query);
    $player_array['lsname'] = $result['name'];
    $player_array['lsaccount'] = $result['lsaccount_id'];
    $player_array['status'] = $result['status'];

    //Load guild details
    $query = "SELECT `guild_id`, `rank` FROM guild_members WHERE char_id = $playerid";
    $result = $mysql->query_assoc($query);
    if (!empty($result)) {
        $player_array['guild_id'] = $result['guild_id'];
        $player_array['guild_rank'] = $result['rank'];
    }

    return $player_array;
}

function update_player(): void
{
    global $mysql, $playerid;

    $oldstats = player_info();
    extract($oldstats);

    $fields = '';
    //Set fields here
    $fields = rtrim($fields, ", ");

    if ($fields != '') {
        $query = "UPDATE character_data SET $fields WHERE id=$playerid";
        $mysql->query_no_result($query);
    }
}

function get_player_location(): bool|array|string|null
{
    global $mysql, $playerid;

    $query = "SELECT zone_id, x, y, z FROM character_data WHERE id=$playerid";
    return $mysql->query_assoc($query);
}

function update_player_location(): void
{
    global $mysql;
    $playerid = $_POST['playerid'];
    $zoneid_token = strtok($_POST['zoneid'], ".");
    $zoneid = $zoneid_token;
    $safe = $_POST['safe'];
    $new_x = $_POST['x'];
    $new_y = $_POST['y'];
    $new_z = $_POST['z'];

    if ($safe) {
        $query = "SELECT safe_x, safe_y, safe_z FROM zone WHERE zoneidnumber=$zoneid";
        $result = $mysql->query_assoc($query);
        $new_x = $result['safe_x'];
        $new_y = $result['safe_y'];
        $new_z = $result['safe_z'];
    }

    $query = "UPDATE character_data SET zone_id=$zoneid, x=$new_x, y=$new_y, z=$new_z WHERE id=$playerid";
    $mysql->query_no_result($query);
}

function get_zones(): array|string|null
{
    global $mysql;

    $query = "SELECT zoneidnumber, short_name FROM zone ORDER BY short_name";
    return $mysql->query_mult_assoc($query);
}

?>