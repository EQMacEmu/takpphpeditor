<?php

$list_limit = 500;

switch ($action) {
    case 0:
        check_admin_authorization();
        if (isset($_GET['playerid']) && ($_GET['playerid'] > 0)) {
            $playerid = $_GET['playerid'];
            header("Location: index.php?editor=keys&playerid=$playerid&action=1");
            exit;
        } else {
            $body = new Template("templates/keys/keys.default.tmpl.php");
        }
        break;
    case 1:  //View Player Keys
        check_admin_authorization();
        if (isset($_GET['playerid']) && ($_GET['playerid'] > 0)) {
            $keys = player_keys($_GET['playerid']);
        }
        $body = new Template("templates/keys/keys.player.tmpl.php");
        $body->set("playerid", $_GET['playerid']);
        if ($keys) {
            $body->set("keys", $keys);
        }
        break;
    case 2: //Search by Player ID or Player Name
        check_admin_authorization();
        $search_results = set_search_results();
        $body = new Template("templates/keys/keys.searchresults.tmpl.php");
        $body->set('search_results', $search_results);
        $body->set("list_limit", $list_limit);
        break;
    case 3: //Search by Item ID
        check_admin_authorization();
        $search_results = "";
        if (isset($_GET['item_id']) && ($_GET['item_id'] != "") && ($_GET['item_id'] != "Item ID")) {
            $search_results = search_by_itemid($_GET['item_id'], $list_limit);
        }
        $body = new Template("templates/keys/keys.searchresults.tmpl.php");
        $body->set("search_results", $search_results);
        $body->set("item_id", $_GET['item_id']);
        $body->set("list_limit", $list_limit);
        break;
    case 4: //Add item to keyring
        check_admin_authorization();
        $playerid = $_GET['playerid'];
        $body = new Template("templates/keys/keys.add.tmpl.php");
        $body->set("playerid", $playerid);
        break;
    case 5: //Insert item into keyring
        check_admin_authorization();
        $playerid = $_POST['id'];
        insert_key_item();
        header("Location: index.php?editor=keys&playerid=$playerid&action=1");
        exit;
    case 6: //Edit item in keyring
        check_admin_authorization();
        $key_item = key_item_details($_GET['playerid'], $_GET['item_id']);
        $body = new Template("templates/keys/keys.edit.tmpl.php");
        $body->set("key_item", $key_item);
        break;
    case 7: //Update item in keyring
        check_admin_authorization();
        $playerid = $_POST['id'];
        update_key_item();
        header("Location: index.php?editor=keys&playerid=$playerid&action=1");
        exit;
    case 8: //Delete item from keyring
        check_admin_authorization();
        $playerid = $_GET['playerid'];
        delete_key_item($playerid, $_GET['item_id']);
        header("Location: index.php?editor=keys&playerid=$playerid&action=1");
        exit;
}

function player_keys($id): array|string|null
{
    global $mysql;

    $query = "SELECT id, item_id FROM character_keyring WHERE id=$id";
    return $mysql->query_mult_assoc($query);
}

function key_item_details($id, $item_id): bool|array|string|null
{
    global $mysql;

    $query = "SELECT * FROM character_keyring WHERE id=$id AND item_id=$item_id";
    return $mysql->query_assoc($query);
}

function search_by_playerid($id): array|string|null
{
    global $mysql;

    $query = "SELECT DISTINCT(id) FROM character_keyring WHERE id=$id";
    return $mysql->query_mult_assoc($query);
}

function search_by_playername($player_name, $list_limit): array|string|null
{
    global $mysql;

    $query = "SELECT id FROM character_data WHERE `name` RLIKE \"$player_name\" LIMIT $list_limit";
    return $mysql->query_mult_assoc($query);
}

function search_by_itemid($item_id, $list_limit): array|string|null
{
    global $mysql;

    $query = "SELECT DISTINCT(id) FROM character_keyring WHERE item_id=$item_id LIMIT $list_limit";
    return $mysql->query_mult_assoc($query);
}

function delete_key_item($id, $item_id): void
{
    global $mysql;

    $query = "DELETE FROM character_keyring WHERE id=$id AND item_id=$item_id";
    $mysql->query_no_result($query);
}

function update_key_item(): void
{
    global $mysql;

    $id = $_POST['id'];
    $item_id = $_POST['item_id'];
    $old_item = $_POST['old_item'];

    $query = "UPDATE character_keyring SET item_id=$item_id WHERE id=$id AND item_id=$old_item";
    $mysql->query_no_result($query);
}

function insert_key_item(): void
{
    global $mysql;

    $id = $_POST['id'];
    $item_id = $_POST['item_id'];

    $query = "INSERT INTO character_keyring SET id=$id, item_id=$item_id";
    $mysql->query_no_result($query);
}

?>