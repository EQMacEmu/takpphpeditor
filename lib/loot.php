<?php

$equiptit = array(
    0 => "No",
    1 => "Yes",
    2 => "Force"
);

$normalize_amount = 10;

switch ($action) {
    case 0:  // View Loottable
        if ($npcid || (isset($_GET['npcid']) && $_GET['npcid'] > 0)) {
            $body = new Template("templates/loot/loottable.tmpl.php");
            if (!$npcid) {
                $npcid = $_GET['npcid'];
            }
            $z = get_zone_by_npcid($npcid);
            if ($z) {
                $zoneid = getZoneIDByName($z);
            }

            // Navigation variables in the GET URL
            $body->set('z', $z);
            $body->set('zoneid', $zoneid);
            $body->set('currzone', $z);
            $body->set('currzoneid', $zoneid);
            $body->set('npcid', $npcid);
            $body->set('npc_name', getNPCName($npcid));
            $body->set('normalize_amount', $normalize_amount);
            $body->set('equiptit', $equiptit);

            $vars = loottable_info();

            if ($vars) {
                // NPC has a loottable - set all the loottable variables
                $body->setMultiple($vars);

                // Ensure mobs array exists
                $usage = mobs_using_loottable();
                $body->set('usage', $usage);
            }
        } else {
            $body = new Template("templates/loot/loot.default.tmpl.php");
        }
        break;
    case 1:  //Edit loottable
        check_authorization();
        $body = new Template("templates/loot/loottable.edit.tmpl.php");
        $body->set('currzone', $z);
        $body->set('currzoneid', $zoneid);
        $body->set('npcid', $npcid);
        $body->set('npc_name', getNPCName($npcid));
        $vars = loottable_info();
        foreach ($vars as $key => $value) {
            $body->set($key, $value);
        }
        break;
    case 2:  //Update loottable info
        check_authorization();
        update_loottable();
        header("Location: index.php?editor=loot&z=$z&zoneid=$zoneid&npcid=$npcid");
        exit;
    case 3:  //Edit Lootdrop name
        check_authorization();
        $body = new Template("templates/loot/lootdrop.edit.name.tmpl.php");
        $body->set('currzone', $z);
        $body->set('currzoneid', $zoneid);
        $body->set('npcid', $npcid);
        $body->set('ldid', $_GET['ldid']);
        $body->set('ldname', getLootdropName($_GET['ldid']));
        $vars = loottable_info();
        foreach ($vars as $key => $value) {
            $body->set($key, $value);
        }
        break;
    case 4:  //Update Lootdrop Name
        check_authorization();
        update_lootdrop_name();
        header("Location: index.php?editor=loot&z=$z&zoneid=$zoneid&npcid=$npcid");
        exit;
    case 5:  //Edit Lootdrop Item page
        check_authorization();
        $body = new Template("templates/loot/lootdrop.edit.item.tmpl.php");
        $body->set('currzone', $z);
        $body->set('currzoneid', $zoneid);
        $body->set('npcid', $npcid);
        $body->set('ldid', $_GET['ldid']);
        $body->set('itemid', $_GET['itemid']);
        $body->set('ldname', getLootdropName($_GET['ldid']));
        $vars = lootdrop_info();
        foreach ($vars as $key => $value) {
            $body->set($key, $value);
        }
        break;
    case 6:  // Update lootdrop item
        check_authorization();
        update_lootdrop_item();
        header("Location: index.php?editor=loot&z=$z&zoneid=$zoneid&npcid=$npcid");
        exit;
    case 7:  // Edit loottable entry and lootdrop
        check_authorization();
        $body = new Template("templates/loot/lootdrop.edit.tmpl.php");
        $body->set('currzone', $z);
        $body->set('currzoneid', $zoneid);
        $body->set('npcid', $npcid);
        $body->set('ltid', $_GET['ltid']);
        $body->set('ldid', $_GET['ldid']);
        $body->set('ltname', getLootdropName($_GET['ldid']));
        $vars = loottable_entries_info();
        foreach ($vars as $key => $value) {
            $body->set($key, $value);
        }
        break;
    case 8:  // Update loottable entry
        check_authorization();
        update_loottable_entries();
        header("Location: index.php?editor=loot&z=$z&zoneid=$zoneid&npcid=$npcid");
        exit;
    case 9:  // Add new loottable
        check_authorization();
        $body = new Template("templates/loot/loottable.add.tmpl.php");
        $body->set('currzone', $z);
        $body->set('currzoneid', $zoneid);
        $body->set('npcid', $npcid);
        $vars = suggest_new_loottable();
        foreach ($vars as $key => $value) {
            $body->set($key, $value);
        }
        break;
    case 10: // Insert new loottable
        check_authorization();
        add_loottable();
        header("Location: index.php?editor=loot&z=$z&zoneid=$zoneid&npcid=$npcid");
        exit;
    case 11: // Change loottable
        check_authorization();
        $body = new Template("templates/loot/loottable.change.tmpl.php");
        $body->set('currzone', $z);
        $body->set('currzoneid', $zoneid);
        $body->set('npcid', $npcid);
        break;
    case 12:
        check_authorization();
        $body = new Template("templates/loot/loottable.changebyid.tmpl.php");
        $body->set('currzone', $z);
        $body->set('currzoneid', $zoneid);
        $body->set('npcid', $npcid);
        break;
    case 13:
        check_authorization();
        change_npc_loottable();
        header("Location: index.php?editor=loot&z=$z&zoneid=$zoneid&npcid=$npcid");
        exit;
    case 14:
        check_authorization();
        $body = new Template("templates/loot/loottable.search.tmpl.php");
        $body->set('currzone', $z);
        $body->set('currzoneid', $zoneid);
        $body->set('npcid', $npcid);
        break;
    case 15:
        check_authorization();
        $body = new Template("templates/loot/loottable.searchresults.tmpl.php");
        $body->set('currzone', $z);
        $body->set('currzoneid', $zoneid);
        $body->set('npcid', $npcid);
        $vars = search_loottable_names($_POST['search']);
        $body->set('results', $vars);
        break;
    case 16:
        check_authorization();
        delete_loottable($_GET['ltid']);
        header("Location: index.php?editor=loot&z=$z&zoneid=$zoneid&npcid=$npcid");
        exit;
    case 17:
        check_authorization();
        delete_lootdrop_item();
        header("Location: index.php?editor=loot&z=$z&zoneid=$zoneid&npcid=$npcid");
        exit;
    case 18:
        check_authorization();
        normalize_drops();
        header("Location: index.php?editor=loot&z=$z&zoneid=$zoneid&npcid=$npcid");
        exit;
    case 19:
        check_authorization();
        remove_lootdrop_from_loottable();
        header("Location: index.php?editor=loot&z=$z&zoneid=$zoneid&npcid=$npcid");
        exit;
    case 20:  // Add lootdrop item
        check_authorization();
        $javascript .= file_get_contents("templates/iframes/js.tmpl.php");
        $body = new Template("templates/loot/lootdrop.item.add.tmpl.php");
        $body->set('currzone', $z);
        $body->set('currzoneid', $zoneid);
        $body->set('npcid', $npcid);
        $body->set('ldid', $_GET['ldid']);
        break;
    case 21: // Insert lootdrop item
        check_authorization();
        add_lootdrop_item($_REQUEST['itemid']);
        header("Location: index.php?editor=loot&z=$z&zoneid=$zoneid&npcid=$npcid");
        exit;
    case 22:  // Change lootdrop
        check_authorization();
        $body = new Template("templates/loot/lootdrop.change.tmpl.php");
        $body->set('currzone', $z);
        $body->set('currzoneid', $zoneid);
        $body->set('npcid', $npcid);
        $body->set('ltid', $_GET['ltid']);
        break;
    case 23:  // Add lootdrop by id
        check_authorization();
        $body = new Template("templates/loot/lootdrop.changebyid.tmpl.php");
        $body->set('currzone', $z);
        $body->set('currzoneid', $zoneid);
        $body->set('npcid', $npcid);
        $body->set('ltid', $_GET['ltid']);
        break;
    case 24:
        check_authorization();
        assign_lootdrop();
        header("Location: index.php?editor=loot&z=$z&zoneid=$zoneid&npcid=$npcid");
        exit;
    case 25:
        check_authorization();
        $body = new Template("templates/loot/lootdrop.search.tmpl.php");
        $body->set('currzone', $z);
        $body->set('currzoneid', $zoneid);
        $body->set('npcid', $npcid);
        $body->set('ltid', $_GET['ltid']);
        break;
    case 26:
        check_authorization();
        delete_lootdrop();
        header("Location: index.php?editor=loot&z=$z&zoneid=$zoneid&npcid=$npcid");
        exit;
    case 27:
        check_authorization();
        //search_lootdrops(); <- Incorrect function call?
        header("Location: index.php?editor=loot&z=$z&zoneid=$zoneid&npcid=$npcid");
        exit;
    case 28: // Display Search Results
        check_authorization();
        $body = new Template("templates/loot/lootdrop.searchresults.tmpl.php");
        $body->set('currzone', $z);
        $body->set('currzoneid', $zoneid);
        $body->set('npcid', $npcid);
        $body->set('ltid', $_GET['ltid']);
        $vars = search_lootdrops($_POST['search']);
        $body->set('results', $vars);
        break;
    case 29:  // Add lootdrop by id
        check_authorization();
        $body = new Template("templates/loot/lootdrop.changebysearch.tmpl.php");
        $body->set('currzone', $z);
        $body->set('currzoneid', $zoneid);
        $body->set('npcid', $npcid);
        $body->set('ltid', $_GET['ltid']);
        $body->set('ldid', $_GET['ldid']);
        break;
    case 30:  // Add new lootdrop
        check_authorization();
        $body = new Template("templates/loot/lootdrop.add.tmpl.php");
        $body->set('currzone', $z);
        $body->set('currzoneid', $zoneid);
        $body->set('npcid', $npcid);
        $body->set('ltid', $_GET['ltid']);
        $vars = suggest_new_lootdrop();
        foreach ($vars as $key => $value) {
            $body->set($key, $value);
        }
        break;
    case 31:
        check_authorization();
        create_lootdrop();
        assign_lootdrop();
        header("Location: index.php?editor=loot&z=$z&zoneid=$zoneid&npcid=$npcid");
        exit;
    case 32:  // Search npc by item
        check_authorization();
        $body = new Template("templates/loot/loot.searchresults.tmpl.php");
        $results = search_loot_by_item();
        $body->set("results", $results);
        break;
    case 33:
        check_authorization();
        $body = new Template("templates/loot/loottablebylootdrop.tmpl.php");
        $body->set('currzone', $z);
        $body->set('currzoneid', $zoneid);
        $body->set('npcid', $_GET['npcid']);
        $body->set('ldid', $_GET['ldid']);
        $ldrop = loottables_using_lootdrop();
        $body->set("ldrop", $ldrop);
        break;
    case 34: // Drop loottable
        check_authorization();
        drop_loottable();
        header("Location: index.php?editor=loot&z=$z&zoneid=$zoneid&npcid=$npcid");
        exit;
    case 35: // Copy lootdrop
        check_authorization();
        copy_lootdrop();
        header("Location: index.php?editor=loot&z=$z&zoneid=$zoneid&npcid=$npcid");
        exit;
    case 36: // Mass change loottable
        check_authorization();
        $body = new Template("templates/loot/loottable.masschange.tmpl.php");
        $body->set('currzone', $z);
        $body->set('currzoneid', $zoneid);
        $body->set('npcid', $npcid);
        $body->set('ltid', $_GET['ltid']);
        break;
    case 37:    // Change Loottable by Name
        check_authorization();
        $body = new Template("templates/loot/loottable.changebyname.tmpl.php");
        $body->set('currzone', $z);
        $body->set('currzoneid', $zoneid);
        $body->set('npcid', $npcid);
        $body->set('ltid', $_GET['ltid']);
        break;
    case 38: // Change Loottable by Race
        check_authorization();
        $body = new Template("templates/loot/loottable.changebyrace.tmpl.php");
        $body->set('currzone', $z);
        $body->set('currzoneid', $zoneid);
        $body->set('npcid', $npcid);
        $body->set('races', $races);
        $body->set('ltid', $_GET['ltid']);
        break;
    case 39: // Change loottable by NPC Name
        check_authorization();
        change_loottable_byname();
        header("Location: index.php?editor=loot&z=$z&zoneid=$zoneid&npcid=$npcid");
        exit;
    case 40: // Change loottable by NPC Race
        check_authorization();
        change_loottable_byrace();
        header("Location: index.php?editor=loot&z=$z&zoneid=$zoneid&npcid=$npcid");
        exit;
    case 41: // Merge LootDrop
        check_authorization();
        $body = new Template("templates/loot/lootdrop.merge.tmpl.php");
        $body->set('currzone', $z);
        $body->set('currzoneid', $zoneid);
        $body->set('npcid', $npcid);
        $body->set('ldid', $_GET['ldid']);
        break;
    case 42: // Merge
        check_authorization();
        merge_lootdrop();
        header("Location: index.php?editor=loot&z=$z&zoneid=$zoneid&npcid=$npcid");
        exit;
    case 43: // Move multiplier to items
        check_authorization();
        move_multiplier();
        header("Location: index.php?editor=loot&z=$z&zoneid=$zoneid&npcid=$npcid");
        exit;
    case 44:
        check_authorization();
        disable_lootdrop_item();
        header("Location: index.php?editor=loot&z=$z&zoneid=$zoneid&npcid=$npcid");
        exit;
    case 45:
        check_authorization();
        enable_lootdrop_item();
        header("Location: index.php?editor=loot&z=$z&zoneid=$zoneid&npcid=$npcid");
        exit;
    case 46:  // Magelo import
        check_authorization();
        magelo_import();
        header("Location: index.php?editor=loot&z=$z&zoneid=$zoneid&npcid=$npcid");
        exit;
    case 47:  //Move Lootdrop Item page
        check_authorization();
        $body = new Template("templates/loot/lootdrop.move.item.tmpl.php");
        $body->set('currzone', $z);
        $body->set('currzoneid', $zoneid);
        $body->set('npcid', $npcid);
        $body->set('ldid', $_GET['ldid']);
        $body->set('itemid', $_GET['itemid']);
        $body->set('ldname', getLootdropName($_GET['ldid']));
        $vars = lootdrop_info();
        foreach ($vars as $key => $value) {
            $body->set($key, $value);
        }
        break;
    case 48:  // Move lootdrop item
        check_authorization();
        move_copy_lootdrop_item();
        header("Location: index.php?editor=loot&z=$z&zoneid=$zoneid&npcid=$npcid");
        exit;
    case 49:  // View Global Loot
        $body = new Template("templates/loot/global.loot.view.tmpl.php");
        $breadcrumbs .= " >> Global Loot";
        $global_loot = global_loot_info();
        $body->set('yesno', $yesno);
        if ($global_loot) {
            $body->set('global_loot', $global_loot);
        }
        break;
    case 50:  // Add Global Loot
        check_authorization();
        $body = new Template("templates/loot/global.loot.add.tmpl.php");
        $breadcrumbs .= " >> <a href='index.php?editor=loot&action=49'>Global Loot</a> >> Add Global Loot";
        $loot_ids = suggest_next_global_loot();
        $body->set('new_id', $loot_ids['new_id']);
        $body->set('new_table_id', $loot_ids['new_table_id']);
        $body->set('races', $races);
        $body->set('classes', $classes);
        $body->set('bodytypes', $bodytypes);
        $body->set('zoneids', $zoneids);
        break;
    case 51:  // Insert Global Loot
        check_authorization();
        insert_global_loot();
        $id = $_POST['id'];
        header("Location: index.php?editor=loot&id=$id&action=55");
        exit;
    case 52:  // Edit Global Loot
        check_authorization();
        $body = new Template("templates/loot/global.loot.edit.tmpl.php");
        $breadcrumbs .= " >> <a href='index.php?editor=loot&action=49'>Global Loot</a> >> Edit Global Loot";
        $body->set('races', $races);
        $body->set('classes', $classes);
        $body->set('bodytypes', $bodytypes);
        $body->set('zoneids', $zoneids);
        $global_loot = getGlobalLoot($_GET['id']);
        if ($global_loot) {
            foreach ($global_loot as $key => $value) {
                $body->set($key, $value);
            }
        }
        break;
    case 53:  // Update Global Loot
        check_authorization();
        update_global_loot();
        $id = $_POST['id'];
        header("Location: index.php?editor=loot&id=$id&action=55");
        exit;
    case 54:  // Delete Global Loot
        check_authorization();
        delete_global_loot();
        header("Location: index.php?editor=loot&action=49");
        exit;
    case 55:  // View Global Loottable
        $body = new Template("templates/loot/global.loottable.view.tmpl.php");
        $breadcrumbs .= " >> <a href='index.php?editor=loot&action=49'>Global Loot</a> >> View Global Loottable";
        $body->set('yesno', $yesno);
        $body->set('normalize_amount', $normalize_amount);
        $global_loot = getGlobalLoot($_GET['id']);
        $body->set('global_loot', $global_loot);
        $global_loottable = global_loottable_info($_GET['id']);
        if ($global_loottable) {
            foreach ($global_loottable as $key => $value) {
                $body->set($key, $value);
            }
        }
        break;
    case 56: // Edit Global Loottable
        check_authorization();
        $breadcrumbs .= " >> <a href='index.php?editor=loot&action=49'>Global Loot</a> >> Edit Global Loottable";
        $body = new Template("templates/loot/global.loottable.edit.tmpl.php");
        $body->set('global_loot', $_GET['id']);
        $vars = global_loottable_info($_GET['id']);
        foreach ($vars as $key => $value) {
            $body->set($key, $value);
        }
        break;
    case 57: // Update Global Loottable
        check_authorization();
        update_global_loottable();
        $id = $_POST['global_loot'];
        header("Location: index.php?editor=loot&id=$id&action=55");
        exit;
    case 58: // Delete Global Loottable
        check_authorization();
        $id = $_GET['id'];
        delete_global_loottable($id);
        header("Location: index.php?editor=loot&id=$id&action=55");
        exit;
    case 59: // Create Empty Global Loottable
        check_authorization();
        $id = $_GET['id'];
        create_empty_loottable($id);
        header("Location: index.php?editor=loot&id=$id&action=55");
        exit;
    case 60:  // Add Global Lootdrop
        check_authorization();
        $body = new Template("templates/loot/global.lootdrop.add.tmpl.php");
        $breadcrumbs .= " >> <a href='index.php?editor=loot&action=49'>Global Loot</a> >> Add Global Lootdrop";
        $body->set('global_loot', $_GET['id']);
        $body->set('loottable_id', $_GET['ltid']);
        $lootdrop_id = suggest_next_global_lootdrop();
        $body->set('lootdrop_id', $lootdrop_id);
        break;
    case 61: // Insert Global Lootdrop
        check_authorization();
        insert_global_lootdrop();
        $id = $_POST['global_loot'];
        header("Location: index.php?editor=loot&id=$id&action=55");
        exit;
    case 62: // Edit Global Lootdrop
        check_authorization();
        $breadcrumbs .= " >> <a href='index.php?editor=loot&action=49'>Global Loot</a> >> Edit Global Lootdrop";
        $body = new Template("templates/loot/global.lootdrop.edit.tmpl.php");
        $body->set('global_loot', $_GET['id']);
        $lootdrop = global_lootdrop_info();
        foreach ($lootdrop as $key => $value) {
            $body->set($key, $value);
        }
        break;
    case 63: // Update Global Lootdrop
        check_authorization();
        update_global_lootdrop();
        $id = $_POST['global_loot'];
        header("Location: index.php?editor=loot&id=$id&action=55");
        exit;
    case 64: // Delete Global Lootdrop
        check_authorization();
        delete_global_lootdrop();
        $id = $_GET['id'];
        header("Location: index.php?editor=loot&id=$id&action=55");
        exit;
    case 65:  // Add Global Lootdrop Item
        check_authorization();
        $breadcrumbs .= " >> <a href='index.php?editor=loot&action=49'>Global Loot</a> >> Add Global Lootdrop Item";
        $javascript = new Template("templates/iframes/js.tmpl.php");
        $body = new Template("templates/loot/global.lootdrop.add.item.tmpl.php");
        $body->set('global_loot', $_GET['id']);
        $body->set('ldid', $_GET['ldid']);
        break;
    case 66: // Insert Global Lootdrop Item
        check_authorization();
        insert_global_lootdrop_item();
        $id = $_POST['global_loot'];
        header("Location: index.php?editor=loot&id=$id&action=55");
        exit;
    case 67: // Edit Global Lootdrop Item
        check_authorization();
        $body = new Template("templates/loot/global.lootdrop.edit.item.tmpl.php");
        $body->set('global_loot', $_GET['id']);
        $body->set('ldid', $_GET['ldid']);
        $body->set('itemid', $_GET['itemid']);
        $body->set('ldname', getLootdropName($_GET['ldid']));
        $vars = lootdrop_info();
        foreach ($vars as $key => $value) {
            $body->set($key, $value);
        }
        break;
    case 68: // Update Global Lootdrop Item
        check_authorization();
        update_lootdrop_item();
        $id = $_POST['global_loot'];
        header("Location: index.php?editor=loot&id=$id&action=55");
        exit;
    case 69: // Delete Global Lootdrop Item
        check_authorization();
        delete_lootdrop_item();
        $id = $_GET['id'];
        header("Location: index.php?editor=loot&id=$id&action=55");
        exit;
    case 70:  // Disable Global Lootdrop Item
        check_authorization();
        disable_lootdrop_item();
        $id = $_GET['id'];
        header("Location: index.php?editor=loot&id=$id&action=55");
        exit;
    case 71:  // Enable Global Lootdrop Item
        check_authorization();
        enable_lootdrop_item();
        $id = $_GET['id'];
        header("Location: index.php?editor=loot&id=$id&action=55");
        exit;
    case 72: // Normalize Global Lootdrops
        check_authorization();
        normalize_drops();
        $id = $_GET['id'];
        header("Location: index.php?editor=loot&id=$id&action=55");
        exit;
}

function loottable_info(): bool|array
{
    global $database, $npcid;
    $count = 0;

    $result = $database->fetchAssoc(
        "SELECT loottable_id FROM npc_types WHERE id = ?",
        [$npcid],
        'i',
    );

    if (!$result || $result['loottable_id'] == 0) {
        return false;
    } else {
        $result = $database->fetchAssoc(
            "SELECT npc_types.id AS npcid, npc_types.name AS npc_name,
                     npc_types.loottable_id, loottable.name AS loottable_name,
                     loottable.mincash, loottable.maxcash, loottable.avgcoin,
                    loottable.min_expansion, loottable.max_expansion,
                     loottable.content_flags, loottable.content_flags_disabled
                 FROM npc_types LEFT JOIN loottable
                 ON loottable.id=npc_types.loottable_id
                 WHERE npc_types.id = ?",
            [$npcid],
            'i'
        );
        $loottable = $result['loottable_id'];
        $array = $result;

        $result2 = $database->fetchAll(
            "SELECT *
                   FROM loottable_entries, lootdrop
                   WHERE loottable_entries.loottable_id = ?
                       AND loottable_entries.lootdrop_id=lootdrop.id",
            [$loottable],
            'i'
        );
        if (!$result2) {
            $array['lootdrop_count'] = 0;
            $array['lootdrops'] = '';
            return $array;
        }
        $array2 = array();
        foreach ($result2 as $row2) {
            $count++;
            $lootdrop = $row2['lootdrop_id'];
            $result3 = $database->fetchAll(
                "SELECT * FROM lootdrop_entries WHERE lootdrop_id = ?",
                [$lootdrop],
                'i'
            );
            if ($result3) {
                foreach ($result3 as $row3) {
                    $row2['items'][] = $row3;
                }
            }
            $array2[] = $row2;
        }

        $array['lootdrop_count'] = $count;
        $array['lootdrops'] = $array2;

        return $array;
    }
}

function mobs_using_loottable(): array
{
    global $database, $npcid;

    $result = $database->fetchAssoc(
        "SELECT loottable_id FROM npc_types WHERE id = ?",
        [$npcid],
        'i'
    );
    $ltid = $result['loottable_id'];

    if ($ltid > 0) {
        $results = $database->fetchAll(
            "SELECT id, name FROM npc_types WHERE loottable_id = ?",
            [$ltid],
            'i'
        );
        $count = count($results);
        return array("count" => $count, "mobs" => $results);
    }

    return ["count" => 0, "mobs" => []];
}

function loottables_using_lootdrop(): array
{
    global $database;
    $ldid = $_GET['ldid'];

    return $database->fetchAll(
        "SELECT loottable_entries.loottable_id AS loottid, loottable.name AS loottname, npc_types.id AS npcid, npc_types.name AS npcname, npc_types.level AS npclevel
            FROM loottable_entries
            INNER JOIN loottable ON loottable.id = loottable_entries.loottable_id
            INNER JOIN npc_types ON npc_types.loottable_id = loottable.id 
            WHERE loottable_entries.lootdrop_id = ?",
        [$ldid],
        'i'
    );
}

function update_loottable(): void
{
    global $database;
    $id = $_POST['loottable_id'];
    $name = $_POST['name'];
    $mincash = $_POST['mincash'];
    $maxcash = $_POST['maxcash'];
    $avgcoin = $_POST['avgcoin'] = (($maxcash - $mincash) / 2) + $mincash;
    //$done = $_POST['done'];
    $min_expansion = $_POST['min_expansion'];
    $max_expansion = $_POST['max_expansion'];
    $content_flags = $_POST['content_flags'];
    $content_flags_disabled = $_POST['content_flags_disabled'];

    $database->executeQuery(
        "UPDATE loottable
        SET name = ?, mincash = ?, maxcash = ?, avgcoin = ?, min_expansion = ?, max_expansion = ?
        WHERE id = ?",
        [$name, $mincash, $maxcash, $avgcoin, $min_expansion, $max_expansion, $id],
        "siiiiii"
    );

    if ($content_flags == "") {
        $database->executeQuery(
            "UPDATE loottable SET content_flags = NULL WHERE id = ?",
            [$id],
            'i'
        );
    } else {
        $database->executeQuery(
            "UPDATE loottable SET content_flags = ? WHERE id = ?",
            [$content_flags, $id],
            'si'
        );
    }

    if ($content_flags_disabled == "") {
        $database->executeQuery(
            "UPDATE loottable SET content_flags_disabled = NULL WHERE id = ?",
            [$id],
            'i'
        );
    } else {
        $database->executeQuery(
            "UPDATE loottable SET content_flags_disabled = ? WHERE id = ?",
            [$content_flags_disabled, $id],
            'si'
        );
    }
}

function add_loottable(): void
{
    global $database;
    $id = $_POST['id'];
    $name = $_POST['name'];
    $mincash = $_POST['mincash'];
    $maxcash = $_POST['maxcash'];
    $avgcoin = $_POST['avgcoin'] = (($maxcash - $mincash) / 2) + $mincash;
    //$done = $_POST['done'];
    $min_expansion = $_POST['min_expansion'];
    $max_expansion = $_POST['max_expansion'];
    $content_flags = $_POST['content_flags'];
    $content_flags_disabled = $_POST['content_flags_disabled'];

    $database->executeQuery(
        "INSERT INTO loottable
        SET id = ?, name = ?, mincash = ?, maxcash = ?, avgcoin = ?, min_expansion = ?, max_expansion = ?, content_flags = NULL, content_flags_disabled = NULL",
        [$id, $name, $mincash, $maxcash, $avgcoin, $min_expansion, $max_expansion],
        "isiiiii"
    );

    if ($content_flags != "") {
        $database->executeQuery(
            "UPDATE loottable SET content_flags = ? WHERE id = ?",
            [$content_flags, $id],
            "si"
        );
    }

    if ($content_flags_disabled != "") {
        $database->executeQuery(
            "UPDATE loottable SET content_flags_disabled = ? WHERE id = ?",
            [$content_flags_disabled, $id],
            "si"
        );
    }

    change_npc_loottable();
}

function change_npc_loottable(): void
{
    global $database, $npcid;
    $id = $_REQUEST['id'];

    $database->executeQuery(
        "UPDATE npc_types SET loottable_id = ? WHERE id = ?",
        [$id, $npcid],
        "ii"
    );
}

function change_loottable_byname(): void
{
    global $database, $z;
    $zid = getZoneID($z);
    $min_id = $zid * 1000 - 1;
    $max_id = $zid * 1000 + 1000;
    $ltid = $_GET['ltid'];
    $npcname = $_POST['npcname'];
    $updateall = $_POST['updateall'];

    if ($updateall == 0) {
        $database->executeQuery(
            "UPDATE npc_types SET loottable_id = ? WHERE name like ? AND id > ? AND id < ? AND loottable_id = 0",
            [$ltid, $npcname, $min_id, $max_id],
            "isii"
        );
    }

    if ($updateall == 1) {
        $database->executeQuery(
            "UPDATE npc_types SET loottable_id = ? WHERE name like ? AND id > ? AND id < ?",
            [$ltid, $npcname, $min_id, $max_id],
            "isii"
        );
    }
}

function change_loottable_byrace(): void
{
    check_authorization();
    global $database, $z;
    $zid = getZoneID($z);
    $min_id = $zid * 1000 - 1;
    $max_id = $zid * 1000 + 1000;
    $ltid = $_GET['ltid'];
    $npcrace = $_POST['npcrace'];
    $updateall = $_POST['updateall'];

    if ($updateall == 0) {
        $database->executeQuery(
            "UPDATE npc_types SET loottable_id = ? WHERE race = ? AND id > ? AND id < ? AND loottable_id = 0",
            [$ltid, $npcrace, $min_id, $max_id],
            "isii"
        );
    }

    if ($updateall == 1) {
        $database->executeQuery(
            "UPDATE npc_types SET loottable_id = ? WHERE race = ? AND id > ? AND id < ?",
            [$ltid, $npcrace, $min_id, $max_id],
            "isii"
        );
    }
}

function suggest_new_loottable(): array
{
    global $database, $npcid;
    $result = $database->fetchAssoc("SELECT MAX(id) AS id FROM loottable");
    $id = $result['id'] + 1;

    $name = getNPCName($npcid);
    return array("id" => $id, "name" => $name);
}

function lootdrop_info(): ?array
{
    global $database;
    $ldid = $_GET['ldid'];
    $itemid = $_GET['itemid'];

    return $database->fetchAssoc(
        "SELECT * FROM lootdrop_entries WHERE lootdrop_id = ? AND item_id = ?",
        [$ldid, $itemid],
        'ii'
    );
}

function update_lootdrop_item(): void
{
    global $database;
    $ldid = $_GET['ldid'];
    $itemid = $_GET['itemid'];
    $equip = $_POST['equip_item'];
    $charges = $_POST['charges'];
    $chance = $_POST['chance'];
    $minlevel = $_POST['minlevel'];
    $maxlevel = $_POST['maxlevel'];
    $multiplier = $_POST['multiplier'];
    $min_expansion = $_POST['min_expansion'];
    $max_expansion = $_POST['max_expansion'];
    $content_flags = $_POST['content_flags'];
    $content_flags_disabled = $_POST['content_flags_disabled'];

    $database->executeQuery(
        "UPDATE lootdrop_entries
        SET equip_item = ?, item_charges = ?, chance = ?, minlevel = ?, maxlevel = ?, multiplier = ?, min_expansion = ?, max_expansion = ?, content_flags = NULL, content_flags_disabled = NULL
        WHERE lootdrop_id = ? AND item_id = ?",
        [$equip, $charges, $chance, $minlevel, $maxlevel, $multiplier, $min_expansion, $max_expansion, $ldid, $itemid],
        'iidiiiiiiii'
    );

    if ($content_flags != "") {
        $database->executeQuery(
            "UPDATE lootdrop_entries SET content_flags = ? WHERE lootdrop_id = ? AND item_id = ?",
            [$content_flags, $ldid, $itemid],
            'sii'
        );
    }

    if ($content_flags_disabled != "") {
        $database->executeQuery(
            "UPDATE lootdrop_entries SET content_flags_disabled = ? WHERE lootdrop_id = ? AND item_id = ?",
            [$content_flags_disabled, $ldid, $itemid],
            'sii'
        );
    }
}

function getLootdropName($id): ?string
{
    global $database;
    $result = $database->fetchAssoc(
        "SELECT name FROM lootdrop WHERE id = ?",
        [$id],
    'i'
    );
    return $result['name'] ?? null;
}

function getLoottableName($id): ?string
{
    global $database;
    $result = $database->fetchAssoc(
        "SELECT name FROM loottable WHERE id = ?",
        [$id],
        'i'
    );
    return $result['name'] ?? null;
}

function update_lootdrop_name(): void
{
    global $database;
    $ldname = $_POST['ldname'];
    $ldid = $_GET['ldid'];

    $database->executeQuery(
        "UPDATE lootdrop SET name = ? WHERE id = ?",
        [$ldname, $ldid],
        'si'
    );
}

function loottable_entries_info(): array
{
    global $database;
    $ltid = $_GET['ltid'];
    $ldid = $_GET['ldid'];

    $result = $database->fetchAssoc(
        "SELECT * FROM loottable_entries WHERE loottable_id = ? AND lootdrop_id = ?",
        [$ltid, $ldid],
        'ii'
    );

    $result2 = $database->fetchAssoc(
        "SELECT * FROM lootdrop WHERE id = ?",
        [$ldid],
        'i'
    );

    return array("loottable_entries" => $result, "lootdrop" => $result2);
}

function update_loottable_entries(): void
{
    global $database;
    $droplimit = $_POST['droplimit'];
    $mindrop = $_POST['mindrop'];
    $multiplier = $_POST['multiplier'];
    $ltid = $_GET['ltid'];
    $ldid = $_GET['ldid'];
    $probability = $_POST['probability'];
    $multiplier_min = $_POST['multiplier_min'];
    $name = $_POST['name'];
    $min_expansion = $_POST['min_expansion'];
    $max_expansion = $_POST['max_expansion'];
    $content_flags = $_POST['content_flags'];
    $content_flags_disabled = $_POST['content_flags_disabled'];

    $database->executeQuery(
        "UPDATE loottable_entries
        SET droplimit = ?, mindrop = ?, multiplier = ?, probability = ?, multiplier_min = ?
        WHERE loottable_id = ? AND lootdrop_id = ?",
        [$droplimit, $mindrop, $multiplier, $probability, $multiplier_min, $ltid, $ldid],
        'iiiiiii'
    );

    $database->executeQuery(
        "UPDATE lootdrop SET name = ?, min_expansion = ?, max_expansion = ? WHERE id = ?",
        [$name, $min_expansion, $max_expansion, $ldid],
        'siii'
    );

    if ($content_flags == "") {
        $database->executeQuery("UPDATE lootdrop SET content_flags = NULL WHERE id = ?", [$ldid], 'i');
    } else {
        $database->executeQuery("UPDATE lootdrop SET content_flags = ? WHERE id = ?", [$content_flags, $ldid], 'si');
    }

    if ($content_flags_disabled == "") {
        $database->executeQuery("UPDATE lootdrop SET content_flags_disabled = NULL WHERE id = ?", [$ldid], 'i');
    } else {
        $database->executeQuery("UPDATE lootdrop SET content_flags_disabled = ? WHERE id = ?", [$content_flags_disabled, $ldid], 'si');
    }
}

function search_loottable_names($search): array
{
    global $database;
    return $database->fetchAll("SELECT * FROM loottable WHERE name rlike ?", [$search], 's');
}

function delete_loottable($id): void
{
    global $database, $npcid;

    $database->executeQuery("DELETE FROM loottable WHERE id = ?", [$id], 'i');

    $database->executeQuery("DELETE FROM loottable_entries WHERE loottable_id = ?", [$id], 'i');

    $database->executeQuery("UPDATE npc_types SET loottable_id = 0 WHERE id = ?", [$npcid], 'i');
}

function delete_lootdrop_item(): void
{
    global $database;
    $ldid = $_GET['ldid'];
    $itemid = $_GET['itemid'];

    $database->executeQuery("DELETE FROM lootdrop_entries WHERE lootdrop_id = ? AND item_id = ?", [$ldid, $itemid], 'ii');
}

function disable_lootdrop_item(): void
{
    global $database;
    $ldid = $_GET['ldid'];
    $itemid = $_GET['itemid'];
    $chance = $_GET['chance'];

    $database->executeQuery(
        "UPDATE lootdrop_entries SET disabled_chance = ?, chance = 0 WHERE lootdrop_id = ? AND item_id = ?",
        [$chance, $ldid, $itemid],
        'dii'
    );
}

function enable_lootdrop_item(): void
{
    global $database;
    $ldid = $_GET['ldid'];
    $itemid = $_GET['itemid'];
    $dchance = $_GET['dchance'];

    $database->executeQuery(
        "UPDATE lootdrop_entries SET disabled_chance = 0, chance = ? WHERE lootdrop_id = ? AND item_id = ?",
        [$dchance, $ldid, $itemid],
        'dii'
    );
}

function normalize_drops(): void
{
    global $database;
    $ldid = $_GET['ldid'];

    $result = $database->fetchAssoc(
        "SELECT count(item_id) AS count FROM lootdrop_entries WHERE lootdrop_id = ?",
        [$ldid],
        'i'
    );

    $count = $result['count'];

    $remainder = 100 % $count;
    $base = floor(100 / $count);
    $x = $count - $remainder;

    $results = $database->fetchAll("SELECT * FROM lootdrop_entries WHERE lootdrop_id = ?", [$ldid], 'i');

    foreach ($results as $result) {
        $itemid = $result['item_id'];
        if ($x > 0) {
            $chance = $base;
            $x--;
        } else {
            $chance = $base + 1;
        }
        $database->executeQuery(
            "UPDATE lootdrop_entries SET chance = ? WHERE lootdrop_id = ? AND item_id = ?",
            [$chance, $ldid, $itemid],
            'dii'
        );
    }
}

function remove_lootdrop_from_loottable(): void
{
    global $database;
    $ltid = $_GET['ltid'];
    $ldid = $_GET['ldid'];

    $database->executeQuery(
        "DELETE FROM loottable_entries WHERE lootdrop_id = ? AND loottable_id = ?",
        [$ldid, $ltid],
        'ii'
    );
}

function add_lootdrop_item($itemid): void
{
    global $mysql;
    $ldid = $_GET['ldid'];
    $item_charges = $_POST['item_charges'];
    $multiplier = $_POST['multiplier'];
    $chance = $_POST['chance'];
    $min_expansion = $_POST['min_expansion'];
    $max_expansion = $_POST['max_expansion'];
    $content_flags = $_POST['content_flags'];
    $content_flags_disabled = $_POST['content_flags_disabled'];
    $eitem = 0;

    $query = "SELECT slots FROM items WHERE id=$itemid";
    $result = $mysql->query_assoc($query);

    $slots = $result['slots'];

    if ($slots) {
        $eitem = 1;
    }

    $query = "INSERT INTO lootdrop_entries SET lootdrop_id=$ldid, item_id=$itemid, equip_item=$eitem, item_charges=$item_charges, multiplier=$multiplier, chance=$chance, min_expansion=$min_expansion, max_expansion=$max_expansion, content_flags=NULL, content_flags_disabled=NULL";
    $mysql->query_no_result($query);

    if ($content_flags != "") {
        $query = "UPDATE lootdrop_entries SET content_flags=\"$content_flags\" WHERE lootdrop_id=$ldid AND item_id=$itemid";
        $mysql->query_no_result($query);
    }

    if ($content_flags_disabled != "") {
        $query = "UPDATE lootdrop_entries SET content_flags_disabled=\"$content_flags_disabled\" WHERE lootdrop_id=$ldid AND item_id=$itemid";
        $mysql->query_no_result($query);
    }
}

function assign_lootdrop(): void
{
    global $mysql;

    $ltid = $_POST['ltid'] ?? 0;
    $ldid = $_POST['ldid'] ?? 0;
    $droplimit = $_POST['droplimit'] ?? 0;
    $mindrop = $_POST['mindrop'] ?? 0;
    $multiplier = $_POST['multiplier'] ?? 1;
    $probability = $_POST['probability'] ?? 100;
    $multiplier_min = $_POST['multiplier_min'] ?? 0;

    if ($ltid == 0 || $ldid == 0) {
        // this should never happen.  need to ensure tables with id 0 do not get drops else it screws up searches and requires SQL sourcing to fix
        die("error: loot table ID and/or loot drop ID is 0");
    }

    $query = "SELECT * FROM lootdrop WHERE id='$ldid'";
    $result = mysqli_query($mysql, $query);
    if (mysqli_num_rows($result) == 0) {
        die("loot drop ID $ldid does not exist");
    }

    $query = "INSERT INTO loottable_entries SET loottable_id='$ltid', lootdrop_id='$ldid', droplimit='$droplimit', mindrop='$mindrop', multiplier='$multiplier', probability='$probability', multiplier_min='$multiplier_min'";
    $mysql->query_no_result($query);
}

function delete_lootdrop(): void
{
    global $mysql;
    $ldid = $_GET['ldid'];

    $query = "DELETE FROM loottable_entries WHERE lootdrop_id=$ldid";
    $mysql->query_no_result($query);

    $query2 = "DELETE FROM lootdrop_entries WHERE lootdrop_id=$ldid";
    $mysql->query_no_result($query2);

    $query3 = "DELETE FROM lootdrop WHERE id=$ldid";
    $mysql->query_no_result($query3);
}

function search_lootdrops($search): array|string|null
{
    global $mysql;
    $query = "SELECT * FROM lootdrop WHERE name RLIKE \"$search\"";
    return $mysql->query_mult_assoc($query);
}

function suggest_new_lootdrop(): array
{
    global $mysql, $npcid;
    $ltid = $_GET['ltid'];

    $query = "SELECT MAX(id) AS id FROM lootdrop";
    $result = $mysql->query_assoc($query);
    $id = $result['id'] + 1;

    $name = getNPCName($npcid);
    $name = $ltid . "_" . $name . "_";

    return array("id" => $id, "name" => $name);
}

function create_lootdrop(): void
{
    global $mysql;
    $ldid = $_POST['ldid'];
    $name = $_POST['name'];
    $min_expansion = $_POST['min_expansion'];
    $max_expansion = $_POST['max_expansion'];
    $content_flags = $_POST['content_flags'];
    $content_flags_disabled = $_POST['content_flags_disabled'];


    $query = "INSERT INTO lootdrop SET id=$ldid, name=\"$name\", min_expansion=$min_expansion, max_expansion=$max_expansion, content_flags=NULL, content_flags_disabled=NULL";
    $mysql->query_no_result($query);

    if ($content_flags != "") {
        $query = "UPDATE lootdrop SET content_flags=\"$content_flags\" WHERE id=$ldid";
        $mysql->query_no_result($query);
    }

    if ($content_flags_disabled != "") {
        $query = "UPDATE lootdrop SET content_flags_disabled=\"$content_flags_disabled\" WHERE id=$ldid";
        $mysql->query_no_result($query);
    }
}

function search_loot_by_item(): array|string|null
{
    global $mysql;
    $search = $_GET['search'];

    $query = "SELECT npc_types.id, npc_types.name, npc_types.level, lootdrop_entries.chance, lootdrop.name AS lootdropname, loottable_entries.probability, items.name AS itemname FROM lootdrop_entries
            INNER JOIN loottable_entries ON lootdrop_entries.lootdrop_id = loottable_entries.lootdrop_id
			INNER JOIN lootdrop ON loottable_entries.lootdrop_id = lootdrop.id
            INNER JOIN npc_types ON npc_types.loottable_id = loottable_entries.loottable_id
            INNER JOIN items ON items.id = lootdrop_entries.item_id
            WHERE items.id=\"$search\" ORDER BY npc_types.id";
    // WHERE items.name rlike \"$search\" limit 50";
    return $mysql->query_mult_assoc($query);
}

function drop_loottable(): void
{
    global $mysql, $npcid;

    $query = "UPDATE npc_types SET loottable_id=0 WHERE id=$npcid";
    $mysql->query_no_result($query);
}

function copy_lootdrop(): void
{
    check_authorization();
    global $mysql;
    $ldid = $_GET['ldid'];
    $name = $_GET['name'];

    $query = "SELECT MAX(id) as lid FROM lootdrop";
    $result = $mysql->query_assoc($query);
    $nlid = $result['lid'] + 1;

    $query = "DELETE FROM loottable_entries WHERE lootdrop_id=0";
    $mysql->query_no_result($query);

    $query = "DELETE FROM lootdrop_entries WHERE lootdrop_id=0";
    $mysql->query_no_result($query);

    $newname = $name . '_' . $nlid;
    $query = "INSERT INTO lootdrop SET id=\"$nlid\", name=\"$newname\"";
    $mysql->query_no_result($query);

    $query = "INSERT INTO loottable_entries (loottable_id,droplimit,mindrop,multiplier,probability,multiplier_min) 
            SELECT loottable_id,droplimit,mindrop,multiplier,probability,multiplier_min FROM loottable_entries where lootdrop_id=$ldid";
    $mysql->query_no_result($query);

    $query = "INSERT INTO lootdrop_entries (item_id,item_charges,equip_item,chance,minlevel,maxlevel,multiplier, min_expansion, max_expansion, content_flags, content_flags_disabled) 
            SELECT item_id,item_charges,equip_item,chance,minlevel,maxlevel,multiplier, min_expansion, max_expansion, content_flags, content_flags_disabled FROM lootdrop_entries where lootdrop_id=$ldid";
    $mysql->query_no_result($query);

    $query = "UPDATE loottable_entries set lootdrop_id=$nlid where lootdrop_id=0";
    $mysql->query_no_result($query);

    $query = "UPDATE lootdrop_entries set lootdrop_id=$nlid where lootdrop_id=0";
    $mysql->query_no_result($query);
}

function merge_lootdrop(): void
{
    global $mysql;

    $ldid = $_GET['ldid'];
    $lootdropid = $_POST['lootdropid'];

    $query = "UPDATE lootdrop_entries SET lootdrop_id = $lootdropid WHERE lootdrop_id = $ldid";
    $mysql->query_no_result($query);

    $query = "DELETE FROM lootdrop WHERE id = $ldid";
    $mysql->query_no_result($query);

    $query = "DELETE FROM loottable_entries WHERE lootdrop_id = $ldid";
    $mysql->query_no_result($query);

    $query = "UPDATE loottable_entries SET droplimit = droplimit+1 WHERE lootdrop_id = $lootdropid";
    $mysql->query_no_result($query);
}

function move_multiplier(): void
{
    global $mysql;

    $ldid = $_GET['ldid'];
    $multiplier = $_GET['multiplier'];

    $query = "UPDATE lootdrop_entries SET multiplier = $multiplier WHERE lootdrop_id = $ldid";
    $mysql->query_no_result($query);

    $query = "UPDATE loottable_entries SET multiplier = 1 WHERE lootdrop_id = $ldid";
    $mysql->query_no_result($query);
}

function magelo_import(): void
{
    global $npcid, $perl_path;

    $output = exec("perl $perl_path/Loot.pl $npcid 2>&1");
    logPerl($output);
}

function move_copy_lootdrop_item(): void
{
    global $mysql;
    $ldid = $_GET['ldid'];
    $itemid = $_GET['itemid'];
    $equip = $_POST['equip_item'];
    $charges = $_POST['charges'];
    $chance = $_POST['chance'];
    $minlevel = $_POST['minlevel'];
    $maxlevel = $_POST['maxlevel'];
    $multiplier = $_POST['multiplier'];
    $min_expansion = $_POST['min_expansion'];
    $max_expansion = $_POST['max_expansion'];
    $content_flags = $_POST['content_flags'];
    $content_flags_disabled = $_POST['content_flags_disabled'];
    $new_ldid = $_POST['movetolootdrop'];
    $move_copy_item = $_POST['move_copy_item'];

    $query = "INSERT INTO lootdrop_entries SET lootdrop_id=$new_ldid, item_id=$itemid, equip_item=$equip, item_charges=$charges, chance=$chance, minlevel=$minlevel, maxlevel=$maxlevel, multiplier=$multiplier, min_expansion=$min_expansion, max_expansion=$max_expansion, content_flags=NULL, content_flags_disabled=NULL";
    $mysql->query_no_result($query);

    if ($content_flags != "") {
        $query = "UPDATE lootdrop_entries SET content_flags=\"$content_flags\" WHERE lootdrop_id=$new_ldid AND item_id=$itemid";
        $mysql->query_no_result($query);
    }

    if ($content_flags_disabled != "") {
        $query = "UPDATE lootdrop_entries SET content_flags_disabled=\"$content_flags_disabled\" WHERE lootdrop_id=$new_ldid AND item_id=$itemid";
        $mysql->query_no_result($query);
    }

    if ($move_copy_item == 0) {
        $query = "DELETE FROM lootdrop_entries WHERE lootdrop_id=$ldid AND item_id=$itemid";
        $mysql_content_db->query_no_result($query);
    }
}

function global_loot_info()
{
    global $mysql;

    $query = "SELECT * FROM global_loot";
    $results = $mysql->query_mult_assoc($query);

    if ($results) {
        return $results;
    } else {
        return null;
    }
}

function insert_global_loot()
{
    global $mysql;

    $id = $_POST['id'];
    $description = $_POST['description'];
    $loottable_id = $_POST['loottable_id'];
    $enabled = $_POST['enabled'];
    $min_level = $_POST['min_level'];
    $max_level = $_POST['max_level'];
    $rare = $_POST['rare'];
    $raid = $_POST['raid'];
    $race = $_POST['race'];
    $class = $_POST['class'];
    $bodytype = $_POST['bodytype'];
    $zone = $_POST['zone'];
    $min_expansion = $_POST['min_expansion'];
    $max_expansion = $_POST['max_expansion'];
    $content_flags = $_POST['content_flags'];
    $content_flags_disabled = $_POST['content_flags_disabled'];

    $query = "INSERT INTO global_loot SET id=$id, description=\"$description\", loottable_id=$loottable_id, enabled=$enabled, min_level=$min_level, max_level=$max_level, rare=NULL, raid=NULL, race=NULL, class=NULL, bodytype=NULL, zone=NULL, min_expansion=$min_expansion, max_expansion=$max_expansion, content_flags=NULL, content_flags_disabled=NULL";
    $mysql->query_no_result($query);

    if ($rare != "") {
        $query = "UPDATE global_loot SET rare=$rare WHERE id=$id";
        $mysql->query_no_result($query);
    }

    if ($raid != "") {
        $query = "UPDATE global_loot SET raid=$raid WHERE id=$id";
        $mysql->query_no_result($query);
    }

    if ($race != "") {
        $query = "UPDATE global_loot SET race=\"$race\" WHERE id=$id";
        $mysql->query_no_result($query);
    }

    if ($class != "") {
        $query = "UPDATE global_loot SET class=\"$class\" WHERE id=$id";
        $mysql->query_no_result($query);
    }

    if ($bodytype != "") {
        $query = "UPDATE global_loot SET bodytype=\"$bodytype\" WHERE id=$id";
        $mysql->query_no_result($query);
    }

    if ($zone != "") {
        $query = "UPDATE global_loot SET zone=\"$zone\" WHERE id=$id";
        $mysql->query_no_result($query);
    }

    if ($content_flags != "") {
        $query = "UPDATE global_loot SET content_flags=\"$content_flags\" WHERE id=$id";
        $mysql->query_no_result($query);
    }

    if ($content_flags_disabled != "") {
        $query = "UPDATE global_loot SET content_flags_disabled=\"$content_flags_disabled\" WHERE id=$id";
        $mysql->query_no_result($query);
    }

    create_empty_loottable($id);
}

function update_global_loot()
{
    global $mysql;

    $id = $_POST['id'];
    $description = $_POST['description'];
    $loottable_id = $_POST['loottable_id'];
    $enabled = $_POST['enabled'];
    $min_level = $_POST['min_level'];
    $max_level = $_POST['max_level'];
    $rare = $_POST['rare'];
    $raid = $_POST['raid'];
    $race = $_POST['race'];
    $class = $_POST['class'];
    $bodytype = $_POST['bodytype'];
    $zone = $_POST['zone'];
    $min_expansion = $_POST['min_expansion'];
    $max_expansion = $_POST['max_expansion'];
    $content_flags = $_POST['content_flags'];
    $content_flags_disabled = $_POST['content_flags_disabled'];

    $query = "UPDATE global_loot SET description=\"$description\", loottable_id=$loottable_id, enabled=$enabled, min_level=$min_level, max_level=$max_level, rare=NULL, raid=NULL, race=NULL, class=NULL, bodytype=NULL, zone=NULL, min_expansion=$min_expansion, max_expansion=$max_expansion, content_flags=NULL, content_flags_disabled=NULL WHERE id=$id";
    $mysql->query_no_result($query);

    $query = "UPDATE loottable SET min_expansion=$min_expansion, max_expansion=$max_expansion, content_flags=NULL, content_flags_disabled=NULL WHERE id=$loottable_id";
    $mysql->query_no_result($query);

    if ($rare != "") {
        $query = "UPDATE global_loot SET rare=$rare WHERE id=$id";
        $mysql->query_no_result($query);
    }

    if ($raid != "") {
        $query = "UPDATE global_loot SET raid=$raid WHERE id=$id";
        $mysql->query_no_result($query);
    }

    if ($race != "") {
        $query = "UPDATE global_loot SET race=\"$race\" WHERE id=$id";
        $mysql->query_no_result($query);
    }

    if ($class != "") {
        $query = "UPDATE global_loot SET class=\"$class\" WHERE id=$id";
        $mysql->query_no_result($query);
    }

    if ($bodytype != "") {
        $query = "UPDATE global_loot SET bodytype=\"$bodytype\" WHERE id=$id";
        $mysql->query_no_result($query);
    }

    if ($zone != "") {
        $query = "UPDATE global_loot SET zone=\"$zone\" WHERE id=$id";
        $mysql->query_no_result($query);
    }

    if ($content_flags != "") {
        $query = "UPDATE global_loot SET content_flags=\"$content_flags\" WHERE id=$id";
        $mysql->query_no_result($query);

        $query = "UPDATE loottable SET content_flags=\"$content_flags\" WHERE id=$loottable_id";
        $mysql->query_no_result($query);
    }

    if ($content_flags_disabled != "") {
        $query = "UPDATE global_loot SET content_flags_disabled=\"$content_flags_disabled\" WHERE id=$id";
        $mysql->query_no_result($query);

        $query = "UPDATE loottable SET content_flags_disabled=\"$content_flags_disabled\" WHERE id=$loottable_id";
        $mysql->query_no_result($query);
    }
}

function delete_global_loot()
{
    global $mysql;
    $id = $_GET['id'];

    $query = "DELETE FROM global_loot WHERE id=$id";
    $mysql->query_no_result($query);
}

function suggest_next_global_loot()
{
    global $mysql;

    $query = "SELECT MAX(id) AS id FROM global_loot";
    $result = $mysql->query_assoc($query);
    $loot_ids['new_id'] = $result['id'] + 1;

    $query = "SELECT MAX(id) AS id FROM loottable";
    $result = $mysql->query_assoc($query);
    $loot_ids['new_table_id'] = $result['id'] + 1;

    return $loot_ids;
}

function suggest_next_global_lootdrop()
{
    global $mysql;

    $query = "SELECT MAX(id) AS id FROM lootdrop";
    $result = $mysql->query_assoc($query);

    return $result['id'] + 1;
}

function getGlobalLoot($id)
{
    global $mysql;

    $query = "SELECT * FROM global_loot WHERE id=$id";
    $result = $mysql->query_assoc($query);

    if ($result) {
        return $result;
    } else {
        return null;
    }
}

function getGlobalLoottableID($id)
{
    global $mysql;

    $query = "SELECT loottable_id FROM global_loot WHERE id=$id";
    $result = $mysql->query_assoc($query);

    if ($result) {
        return $result['loottable_id'];
    } else {
        return null;
    }
}

function global_loottable_info($id)
{
    global $mysql;
    $array = array();
    $count = 0;

    $loottable_id = getGlobalLoottableID($id);

    if (!$loottable_id) {
        return null;
    }

    $query = "SELECT * FROM loottable WHERE id=$loottable_id";
    $result = $mysql->query_assoc($query);

    if ($result) {
        $array = $result;
    } else {
        $array['id'] = $loottable_id;
        $array['lootdrop_count'] = 0;
        $array['lootdrops'] = '';
        return $array;
    }

    $query2 = "SELECT * FROM loottable_entries, lootdrop WHERE loottable_entries.loottable_id=$loottable_id AND loottable_entries.lootdrop_id=lootdrop.id";
    $result2 = $mysql->query_mult_assoc($query2);
    if (!$result2) {
        $array['lootdrop_count'] = 0;
        $array['lootdrops'] = '';
        return $array;
    }

    foreach ($result2 as $row2) {
        $count++;
        $lootdrop = $row2['lootdrop_id'];

        $query3 = "SELECT * FROM lootdrop_entries WHERE lootdrop_id=$lootdrop";
        $result3 = $mysql->query_mult_assoc($query3);

        if ($result3) {
            foreach ($result3 as $row3) {
                $row2['items'][] = $row3;
            }
        }
        $array2[] = $row2;
    }

    $array['lootdrop_count'] = $count;
    $array['lootdrops'] = $array2;

    $query4 = "SELECT min_expansion, max_expansion, content_flags, content_flags_disabled FROM global_loot WHERE id=$id";
    $result4 = $mysql->query_assoc($query4);

    if ($result4) {
        $array['min_expansion'] = $result4['min_expansion'];
        $array['max_expansion'] = $result4['max_expansion'];
        $array['content_flags'] = $result4['content_flags'];
        $array['content_flags_disabled'] = $result4['content_flags_disabled'];
    }

    return $array;
}

function update_global_loottable()
{
    global $mysql;

    $id = $_POST['id'];
    $name = $_POST['name'];
    $mincash = $_POST['mincash'];
    $maxcash = $_POST['maxcash'];
    $avgcoin = $_POST['avgcoin'] = (($maxcash - $mincash) / 2) + $mincash;
    //$done = $_POST['done'];
    $min_expansion = $_POST['min_expansion'];
    $max_expansion = $_POST['max_expansion'];
    $content_flags = $_POST['content_flags'];
    $content_flags_disabled = $_POST['content_flags_disabled'];

    $query = "UPDATE loottable SET name=\"$name\", mincash=$mincash, maxcash=$maxcash, avgcoin=$avgcoin, min_expansion=$min_expansion, max_expansion=$max_expansion, content_flags=NULL, content_flags_disabled=NULL WHERE id=$id";
    $mysql->query_no_result($query);

    if ($content_flags != "") {
        $query = "UPDATE loottable SET content_flags=\"$content_flags\" WHERE id=$id";
        $mysql->query_no_result($query);
    }

    if ($content_flags_disabled != "") {
        $query = "UPDATE loottable SET content_flags_disabled=\"$content_flags_disabled\" WHERE id=$id";
        $mysql->query_no_result($query);
    }
}

function create_empty_loottable($id)
{
    global $mysql;
    $loottable_id = getGlobalLoottableID($id);
    $min_expansion = 0;
    $max_expansion = 0;
    $content_flags = "";
    $content_flags_disabled = "";

    $query = "SELECT min_expansion, max_expansion, content_flags, content_flags_disabled FROM global_loot WHERE id=$id";
    $result = $mysql->query_assoc($query);

    if ($result) {
        $min_expansion = $result['min_expansion'];
        $max_expansion = $result['max_expansion'];
        $content_flags = $result['content_flags'];
        $content_flags_disabled = $result['content_flags_disabled'];
    }


    if ($loottable_id) {
        $query = "INSERT INTO loottable SET id=$loottable_id, name=\"\", mincash=0, maxcash=0, avgcoin=0";
        $mysql->query_no_result($query);
    } else {
        $suggest = suggest_next_global_loot();
        $loottable_id = $suggest['new_table_id'];

        $query = "INSERT INTO loottable SET id=$loottable_id, name=\"\", mincash=0, maxcash=0, avgcoin=0";
        $mysql->query_no_result($query);

        $query = "UPDATE global_loot SET loottable_id=$loottable_id WHERE id=$id";
        $mysql->query_no_result($query);
    }

    if ($content_flags != "") {
        $query = "UPDATE loottable SET content_flags=\"$content_flags\" WHERE id=$loottable_id";
        $mysql->query_no_result($query);
    }

    if ($content_flags_disabled != "") {
        $query = "UPDATE loottable SET content_flags_disabled=\"$content_flags_disabled\" WHERE id=$loottable_id";
        $mysql->query_no_result($query);
    }
}

function delete_global_loottable($id)
{
    global $mysql;
    $loottable_id = getGlobalLoottableID($id);

    if ($loottable_id) {
        $query = "UPDATE global_loot SET loottable_id=0 WHERE id=$id";
        $mysql->query_no_result($query);

        $query = "DELETE FROM loottable WHERE id=$loottable_id";
        $mysql->query_no_result($query);
    }
}

function global_lootdrop_info()
{
    global $mysql;
    $loottable_id = $_GET['ltid'];
    $lootdrop_id = $_GET['ldid'];

    $query = "SELECT * FROM loottable_entries INNER JOIN lootdrop WHERE loottable_entries.lootdrop_id=lootdrop.id AND loottable_entries.loottable_id=$loottable_id AND lootdrop.id=$lootdrop_id";
    $result = $mysql->query_assoc($query);

    return $result;
}

function insert_global_lootdrop()
{
    global $mysql;
    $loottable_id = $_POST['loottable_id'];
    $lootdrop_id = $_POST['id'];
    $name = $_POST['name'];
    $multiplier = $_POST['multiplier'];
    $droplimit = $_POST['droplimit'];
    $mindrop = $_POST['mindrop'];
    $probability = $_POST['probability'];

    $query = "INSERT INTO lootdrop SET id=$lootdrop_id, name=\"$name\"";
    $mysql->query_no_result($query);

    $query = "INSERT INTO loottable_entries SET loottable_id=$loottable_id, lootdrop_id=$lootdrop_id, multiplier=$multiplier, droplimit=$droplimit, mindrop=$mindrop, probability=$probability";
    $mysql->query_no_result($query);
}

function update_global_lootdrop()
{
    global $mysql;
    $loottable_id = $_POST['loottable_id'];
    $lootdrop_id = $_POST['id'];
    $name = $_POST['name'];
    $multiplier = $_POST['multiplier'];
    $multiplier_min = $_POST['multiplier_min'];
    $droplimit = $_POST['droplimit'];
    $mindrop = $_POST['mindrop'];
    $probability = $_POST['probability'];

    $query = "UPDATE lootdrop SET name=\"$name\" WHERE id=$lootdrop_id";
    $mysql->query_no_result($query);

    $query = "UPDATE loottable_entries SET multiplier=$multiplier, droplimit=$droplimit, mindrop=$mindrop, multiplier_min=$multiplier_min, probability=$probability WHERE loottable_id=$loottable_id AND lootdrop_id=$lootdrop_id";
    $mysql->query_no_result($query);
}

function delete_global_lootdrop()
{
    global $mysql;
    $loottable_id = $_GET['ltid'];
    $lootdrop_id = $_GET['ldid'];

    $query = "DELETE FROM lootdrop_entries WHERE lootdrop_id=$lootdrop_id";
    $mysql->query_no_result($query);

    $query = "DELETE FROM lootdrop WHERE id=$lootdrop_id";
    $mysql->query_no_result($query);

    $query = "DELETE FROM loottable_entries WHERE loottable_id=$loottable_id AND lootdrop_id=$lootdrop_id";
    $mysql->query_no_result($query);
}

function insert_global_lootdrop_item()
{
    global $mysql;

    $ldid = $_POST['ldid'];
    $itemid = $_POST['itemid'];
    $item_charges = (isset($_POST['item_charges']) ? $_POST['item_charges'] : "1");
    $multiplier = $_POST['multiplier'];
    $chance = $_POST['chance'];
    $equip_item = $_POST['equip_item'];

    if (isset($_POST['max_charges'])) {
        $query = "SELECT maxcharges FROM items WHERE id=$itemid";
        $result = $mysql_content_db->query_assoc($query);

        if ($result && $result['maxcharges'] >= 0) {
            $item_charges = $result['maxcharges'];
        }
    }

    $query = "INSERT INTO lootdrop_entries SET lootdrop_id=$ldid, item_id=$itemid, equip_item=$equip_item, item_charges=$item_charges, multiplier=$multiplier, chance=$chance";
    $mysql->query_no_result($query);
}

?>