<?php

$itemsize = array(
    0 => "Tiny",
    1 => "Small",
    2 => "Medium",
    3 => "Large",
    4 => "Giant",
    5 => "Giant - No Container"
);

$itembagsize = array(
    0 => "Non-Bag",
    1 => "Small",
    2 => "Medium",
    3 => "Large",
    4 => "Giant",
    5 => "Giant - Assembly Kit"
);

$itembardtype = array(
    0 => "None",
    23 => "Wind",
    24 => "String",
    25 => "Brass",
    26 => "Percussion",
    50 => "Singing",
    51 => "ALL"
);

$itemcasttype = array(
    0 => "None",
    1 => "Click from inventory w/Lvl",
    3 => "Expendable",
    4 => "Must equip to click",
    5 => "Click from inventory w/Lvl/Class/Race"
);

$proccasttype = array(
    0 => "None/Proc"
);

$worncasttype = array(
    0 => "None",
    2 => "Worn"
);

$focuscasttype = array(
    0 => "None",
    6 => "Focus"
);

$scrollcasttype = array(
    0 => "None",
    7 => "Scroll"
);

$gmflagtype = array(
    -1 => "GM",
    0 => "No"
);

$soulboundtype = array(
    1 => "Soulbound",
    0 => "No"
);

switch ($action) {
    case 0: //Default
        check_authorization();
        $body = new Template("templates/items/items.default.tmpl.php");
        break;
    case 1:   // Search items
        check_authorization();
        $body = new Template("templates/items/items.searchresults.tmpl.php");
        if (isset($_GET['id']) && $_GET['id'] != "ID") {
            $results = search_item_by_id();
        } else $results = search_items();
        $body->set("results", $results);
        break;
    case 2: // Edit Item
        check_authorization();
        $javascript = new Template("templates/iframes/js.tmpl.php");
        $body = new Template("templates/items/items.edit.tmpl.php");
        $vars = item_info();
        $body = load_items_template($body, $vars);
        $date_vars = getdate();
        if ($date_vars) {
            foreach ($date_vars as $key => $value) {
                $body->set($key, $value);
            }
        }
        $errors = array();
        if (($vars['stackable'] == 0) && ($vars['stacksize'] > 1)) {
            $errors[] = "<u>Stacking Error</u><br>Item is not stackable but stack size is " . $vars['stacksize'];
        }
        if (($vars['stackable'] == 1) && ($vars['stacksize'] <= 1)) {
            $errors[] = "<u>Stacking Error</u><br>Item is stackable but stack size is " . $vars['stacksize'];
        }
        if (($vars['book'] > 0) && ($vars['filename'] == "")) {
            $errors[] = "<u>Missing Text Error</u><br>Item is marked as a book/message but not assigned any text";
        }
        if ($errors) {
            $body->set("errors", $errors);
        }
        break;
    case 3: // Book Text
        check_authorization();
        $body = new Template("templates/items/items.book.tmpl.php");
        $body->set('id', $_GET['id']);
        $body->set('name', $_GET['name']);
        $vars = book_info();
        if ($vars) {
            foreach ($vars as $key => $value) {
                $body->set($key, $value);
            }
        }
        break;
    case 4: //Update Book Text
        check_authorization();
        $id = $_POST['id'];
        update_book();
        header("Location: index.php?editor=items&id=$id&action=2");
        exit;
    case 5: // Delete Item
        check_authorization();
        delete_item();
        header("Location: index.php?editor=items");
        exit;
    case 6: // Update Item
        check_authorization();
        $id = $_GET['id'];
        update_item();
        header("Location: index.php?editor=items&id=$id&action=2");
        exit;
    case 7: // Copy Item
        check_authorization();
        $id = copy_item();
        header("Location: index.php?editor=items&id=$id&action=2");
        exit;
    case 8: // Add Item
        check_authorization();
        $javascript = new Template("templates/iframes/js.tmpl.php");
        $body = new Template("templates/items/items.add.tmpl.php");
        $vars = getdate();
        $body = load_items_template($body, $vars);
        break;
    case 9: //Add Item
        check_authorization();
        add_item();
        $id = $_POST['id'];
        header("Location: index.php?editor=items&id=$id&action=2");
        exit;
}

function load_items_template($body, $vars): mixed
{
    global $itemsize, $itemmaterial, $itemtypes, $skilltypes, $bodytypes;
    global $races, $itemsaugrestrict, $itembagsize, $world_containers;
    global $itembardtype, $itemcasttype, $proccasttype, $worncasttype;
    global $focuscasttype, $scrollcasttype, $yesno, $gmflagtype, $soulboundtype;
    $body->set("itemsize", $itemsize);
    $body->set("itemmaterial", $itemmaterial);
    $body->set("itemtypes", $itemtypes);
    $body->set("skilltypes", $skilltypes);
    $body->set("bodytypes", $bodytypes);
    $body->set("itemraces", $races);
    $body->set("itemsaugrestrict", $itemsaugrestrict);
    $body->set("itembagsize", $itembagsize);
    $body->set("world_containers", $world_containers);
    $body->set("itembardtype", $itembardtype);
    $body->set("itemcasttype", $itemcasttype);
    $body->set("proccasttype", $proccasttype);
    $body->set("worncasttype", $worncasttype);
    $body->set("focuscasttype", $focuscasttype);
    $body->set("scrollcasttype", $scrollcasttype);
    $body->set("yesno", $yesno);
    $body->set('newid', get_max_id());
    $body->set("factions", factions_array());
    $body->set("gmflagtype", $gmflagtype);
    $body->set("soulboundtype", $soulboundtype);

    if ($vars) {
        foreach ($vars as $key => $value) {
            $body->set($key, $value);
        }
    }

    return $body;
}

function item_info(): array|string|null
{
    global $mysql;

    $id = $_GET['id'];

    $query = "SELECT Name AS itemname FROM items WHERE id=$id";
    $result = $mysql->query_assoc($query);

    $query = "SELECT * FROM items WHERE id=$id";
    $result2 = $mysql->query_assoc($query);

    return $result + $result2;
}

function book_info(): bool|array|string|null
{
    global $mysql;

    $name = $_GET['name'];

    $query = "SELECT * FROM books WHERE name=\"$name\"";

    return $mysql->query_assoc($query);
}

function update_book(): void
{
    global $mysql;

    $name = $_POST['name'];
    $txtfile = $_POST['txtfile'];

    $query = "REPLACE INTO books SET txtfile=\"$txtfile\", name=\"$name\"";
    $mysql->query_no_result($query);
}

function delete_item(): void
{
    global $mysql;

    $id = $_GET['id'];

    $query = "DELETE FROM items WHERE id=$id";
    $mysql->query_no_result($query);
}

function set_slots_bitmask(): int
{
    $slots = 0;
    if (isset($_POST['slot_Cursor'])) $slots = $slots + 1;
    if (isset($_POST['slot_Ear01'])) $slots = $slots + 2;
    if (isset($_POST['slot_Head'])) $slots = $slots + 4;
    if (isset($_POST['slot_Face'])) $slots = $slots + 8;
    if (isset($_POST['slot_Ear02'])) $slots = $slots + 16;
    if (isset($_POST['slot_Neck'])) $slots = $slots + 32;
    if (isset($_POST['slot_Shoulder'])) $slots = $slots + 64;
    if (isset($_POST['slot_Arms'])) $slots = $slots + 128;
    if (isset($_POST['slot_Back'])) $slots = $slots + 256;
    if (isset($_POST['slot_Bracer01'])) $slots = $slots + 512;
    if (isset($_POST['slot_Bracer02'])) $slots = $slots + 1024;
    if (isset($_POST['slot_Range'])) $slots = $slots + 2048;
    if (isset($_POST['slot_Hands'])) $slots = $slots + 4096;
    if (isset($_POST['slot_Primary'])) $slots = $slots + 8192;
    if (isset($_POST['slot_Secondary'])) $slots = $slots + 16384;
    if (isset($_POST['slot_Ring01'])) $slots = $slots + 32768;
    if (isset($_POST['slot_Ring02'])) $slots = $slots + 65536;
    if (isset($_POST['slot_Chest'])) $slots = $slots + 131072;
    if (isset($_POST['slot_Legs'])) $slots = $slots + 262144;
    if (isset($_POST['slot_Feet'])) $slots = $slots + 524288;
    if (isset($_POST['slot_Waist'])) $slots = $slots + 1048576;
    if (isset($_POST['slot_Ammo'])) $slots = $slots + 2097152;
    return $slots;
}

function set_races_bitmask(): int
{
    $races = 0;
    if (isset($_POST['race_Human'])) $races = $races + 1;
    if (isset($_POST['race_Barbarian'])) $races = $races + 2;
    if (isset($_POST['race_Erudite'])) $races = $races + 4;
    if (isset($_POST['race_Wood_Elf'])) $races = $races + 8;
    if (isset($_POST['race_High_Elf'])) $races = $races + 16;
    if (isset($_POST['race_Dark_Elf'])) $races = $races + 32;
    if (isset($_POST['race_Half_Elf'])) $races = $races + 64;
    if (isset($_POST['race_Dwarf'])) $races = $races + 128;
    if (isset($_POST['race_Troll'])) $races = $races + 256;
    if (isset($_POST['race_Ogre'])) $races = $races + 512;
    if (isset($_POST['race_Halfling'])) $races = $races + 1024;
    if (isset($_POST['race_Gnome'])) $races = $races + 2048;
    if (isset($_POST['race_Iksar'])) $races = $races + 4096;
    if (isset($_POST['race_Vah_Shir'])) $races = $races + 8192;
    return $races;
}

function set_classes_bitmask(): int
{
    $classes = 0;
    if (isset($_POST['class_Warrior'])) $classes = $classes + 1;
    if (isset($_POST['class_Cleric'])) $classes = $classes + 2;
    if (isset($_POST['class_Paladin'])) $classes = $classes + 4;
    if (isset($_POST['class_Ranger'])) $classes = $classes + 8;
    if (isset($_POST['class_Shadowknight'])) $classes = $classes + 16;
    if (isset($_POST['class_Druid'])) $classes = $classes + 32;
    if (isset($_POST['class_Monk'])) $classes = $classes + 64;
    if (isset($_POST['class_Bard'])) $classes = $classes + 128;
    if (isset($_POST['class_Rogue'])) $classes = $classes + 256;
    if (isset($_POST['class_Shaman'])) $classes = $classes + 512;
    if (isset($_POST['class_Necromancer'])) $classes = $classes + 1024;
    if (isset($_POST['class_Wizard'])) $classes = $classes + 2048;
    if (isset($_POST['class_Magician'])) $classes = $classes + 4096;
    if (isset($_POST['class_Enchanter'])) $classes = $classes + 8192;
    if (isset($_POST['class_Beastlord'])) $classes = $classes + 16384;
    return $classes;
}

function set_deity_bitmask(): int
{
    $deity = 0;
    if (isset($_POST['deity_Agnostic'])) $deity = $deity + 1;
    if (isset($_POST['deity_Bertox'])) $deity = $deity + 2;
    if (isset($_POST['deity_Brell'])) $deity = $deity + 4;
    if (isset($_POST['deity_Cazic'])) $deity = $deity + 8;
    if (isset($_POST['deity_Erollsi'])) $deity = $deity + 16;
    if (isset($_POST['deity_Bristlebane'])) $deity = $deity + 32;
    if (isset($_POST['deity_Innoruuk'])) $deity = $deity + 64;
    if (isset($_POST['deity_Karana'])) $deity = $deity + 128;
    if (isset($_POST['deity_Mithaniel_Marr'])) $deity = $deity + 256;
    if (isset($_POST['deity_Prexus'])) $deity = $deity + 512;
    if (isset($_POST['deity_Quellious'])) $deity = $deity + 1024;
    if (isset($_POST['deity_Rallos_Zek'])) $deity = $deity + 2048;
    if (isset($_POST['deity_Rodcet_Nife'])) $deity = $deity + 4096;
    if (isset($_POST['deity_Solusek_Ro'])) $deity = $deity + 8192;
    if (isset($_POST['deity_The_Tribunal'])) $deity = $deity + 16384;
    if (isset($_POST['deity_Tunare'])) $deity = $deity + 32768;
    if (isset($_POST['deity_Veeshan'])) $deity = $deity + 65536;
    return $deity;
}

function update_item(): void
{
    global $mysql;

    $id = $_POST['id'];

    $query = "SELECT * FROM items WHERE id=$id";
    $item = $mysql->query_assoc($query);

    // Define checkbox fields:
    $slots = set_slots_bitmask();

    $races = set_races_bitmask();

    $classes = set_classes_bitmask();

    $deity = set_deity_bitmask();

    $fields = '';
    if ($item['slots'] != $slots) $fields .= "slots=\"$slots\", ";
    if ($item['races'] != $races) $fields .= "races=\"$races\", ";
    if ($item['classes'] != $classes) $fields .= "classes=\"$classes\", ";
    if ($item['deity'] != $deity) $fields .= "deity=\"$deity\", ";
    if ($item['Name'] != $_POST['itemname']) $fields .= "Name=\"" . $_POST['itemname'] . "\", ";
    if ($item['itemtype'] != $_POST['itemtype']) $fields .= "itemtype=\"" . $_POST['itemtype'] . "\", ";
    if ($item['lore'] != $_POST['lore']) $fields .= "lore=\"" . $_POST['lore'] . "\", ";
    if ($item['itemclass'] != $_POST['itemclass']) $fields .= "itemclass=\"" . $_POST['itemclass'] . "\", ";
    if ($item['stackable'] != $_POST['stackable']) $fields .= "stackable=\"" . $_POST['stackable'] . "\", ";
    if ($item['stacksize'] != $_POST['stacksize']) $fields .= "stacksize=\"" . $_POST['stacksize'] . "\", ";
    if ($item['maxcharges'] != $_POST['maxcharges']) $fields .= "maxcharges=\"" . $_POST['maxcharges'] . "\", ";
    if ($item['filename'] != $_POST['filename']) $fields .= "filename=\"" . $_POST['filename'] . "\", ";
    if ($item['book'] != $_POST['book']) $fields .= "book=\"" . $_POST['book'] . "\", ";
    if ($item['booktype'] != $_POST['booktype']) $fields .= "booktype=\"" . $_POST['booktype'] . "\", ";
    if ($item['bagsize'] != $_POST['bagsize']) $fields .= "bagsize=\"" . $_POST['bagsize'] . "\", ";
    if ($item['bagslots'] != $_POST['bagslots']) $fields .= "bagslots=\"" . $_POST['bagslots'] . "\", ";
    if ($item['bagwr'] != $_POST['bagwr']) $fields .= "bagwr=\"" . $_POST['bagwr'] . "\", ";
    if ($item['bagtype'] != $_POST['bagtype']) $fields .= "bagtype=\"" . $_POST['bagtype'] . "\", ";
    if ($item['nodrop'] != $_POST['nodrop']) $fields .= "nodrop=\"" . $_POST['nodrop'] . "\", ";
    if ($item['norent'] != $_POST['norent']) $fields .= "norent=\"" . $_POST['norent'] . "\", ";
    if ($item['magic'] != $_POST['magic']) $fields .= "magic=\"" . $_POST['magic'] . "\", ";
    if ($item['tradeskills'] != $_POST['tradeskills']) $fields .= "tradeskills=\"" . $_POST['tradeskills'] . "\", ";
    if ($item['questitemflag'] != $_POST['questitemflag']) $fields .= "questitemflag=\"" . $_POST['questitemflag'] . "\", ";
    if ($item['fvnodrop'] != $_POST['fvnodrop']) $fields .= "fvnodrop=\"" . $_POST['fvnodrop'] . "\", ";
    if ($item['reqlevel'] != $_POST['reqlevel']) $fields .= "reqlevel=\"" . $_POST['reqlevel'] . "\", ";
    if ($item['reclevel'] != $_POST['reclevel']) $fields .= "reclevel=\"" . $_POST['reclevel'] . "\", ";
    if ($item['recskill'] != $_POST['recskill']) $fields .= "recskill=\"" . $_POST['recskill'] . "\", ";
    if ($item['damage'] != $_POST['damage']) $fields .= "damage=\"" . $_POST['damage'] . "\", ";
    if ($item['delay'] != $_POST['delay']) $fields .= "delay=\"" . $_POST['delay'] . "\", ";
    if ($item['range'] != $_POST['range']) $fields .= "`range`=\"" . $_POST['range'] . "\", ";
    if ($item['banedmgamt'] != $_POST['banedmgamt']) $fields .= "banedmgamt=\"" . $_POST['banedmgamt'] . "\", ";
    if ($item['banedmgrace'] != $_POST['banedmgrace']) $fields .= "banedmgrace=\"" . $_POST['banedmgrace'] . "\", ";
    if ($item['banedmgbody'] != $_POST['banedmgbody']) $fields .= "banedmgbody=\"" . $_POST['banedmgbody'] . "\", ";
    if ($item['hp'] != $_POST['hp']) $fields .= "hp=\"" . $_POST['hp'] . "\", ";
    if ($item['mana'] != $_POST['mana']) $fields .= "mana=\"" . $_POST['mana'] . "\", ";
    if ($item['endur'] != $_POST['endur']) $fields .= "endur=\"" . $_POST['endur'] . "\", ";
    if ($item['ac'] != $_POST['ac']) $fields .= "ac=\"" . $_POST['ac'] . "\", ";
    if ($item['light'] != $_POST['light']) $fields .= "light=\"" . $_POST['light'] . "\", ";
    if ($item['regen'] != $_POST['regen']) $fields .= "regen=\"" . $_POST['regen'] . "\", ";
    if ($item['aagi'] != $_POST['aagi']) $fields .= "aagi=\"" . $_POST['aagi'] . "\", ";
    if ($item['acha'] != $_POST['acha']) $fields .= "acha=\"" . $_POST['acha'] . "\", ";
    if ($item['adex'] != $_POST['adex']) $fields .= "adex=\"" . $_POST['adex'] . "\", ";
    if ($item['aint'] != $_POST['aint']) $fields .= "aint=\"" . $_POST['aint'] . "\", ";
    if ($item['asta'] != $_POST['asta']) $fields .= "asta=\"" . $_POST['asta'] . "\", ";
    if ($item['astr'] != $_POST['astr']) $fields .= "astr=\"" . $_POST['astr'] . "\", ";
    if ($item['awis'] != $_POST['awis']) $fields .= "awis=\"" . $_POST['awis'] . "\", ";
    if ($item['cr'] != $_POST['cr']) $fields .= "cr=\"" . $_POST['cr'] . "\", ";
    if ($item['dr'] != $_POST['dr']) $fields .= "dr=\"" . $_POST['dr'] . "\", ";
    if ($item['fr'] != $_POST['fr']) $fields .= "fr=\"" . $_POST['fr'] . "\", ";
    if ($item['mr'] != $_POST['mr']) $fields .= "mr=\"" . $_POST['mr'] . "\", ";
    if ($item['pr'] != $_POST['pr']) $fields .= "pr=\"" . $_POST['pr'] . "\", ";
    if ($item['elemdmgtype'] != $_POST['elemdmgtype']) $fields .= "elemdmgtype=\"" . $_POST['elemdmgtype'] . "\", ";
    if ($item['elemdmgamt'] != $_POST['elemdmgamt']) $fields .= "elemdmgamt=\"" . $_POST['elemdmgamt'] . "\", ";
    if ($item['skillmodtype'] != $_POST['skillmodtype']) $fields .= "skillmodtype=\"" . $_POST['skillmodtype'] . "\", ";
    if ($item['skillmodvalue'] != $_POST['skillmodvalue']) $fields .= "skillmodvalue=\"" . $_POST['skillmodvalue'] . "\", ";
    if ($item['bardvalue'] != $_POST['bardvalue']) $fields .= "bardvalue=\"" . $_POST['bardvalue'] . "\", ";
    if ($item['price'] != $_POST['price']) $fields .= "price=\"" . $_POST['price'] . "\", ";
    if ($item['sellrate'] != $_POST['sellrate']) $fields .= "sellrate=\"" . $_POST['sellrate'] . "\", ";
    if ($item['icon'] != $_POST['icon']) $fields .= "icon=\"" . $_POST['icon'] . "\", ";
    if ($item['idfile'] != $_POST['idfile']) $fields .= "idfile=\"" . $_POST['idfile'] . "\", ";
    if ($item['weight'] != $_POST['weight']) $fields .= "weight=\"" . $_POST['weight'] . "\", ";
    if ($item['color'] != $_POST['color']) $fields .= "color=\"" . $_POST['color'] . "\", ";
    if ($item['size'] != $_POST['size']) $fields .= "size=\"" . $_POST['size'] . "\", ";
    if ($item['material'] != $_POST['material']) $fields .= "material=\"" . $_POST['material'] . "\", ";
    if ($item['casttime'] != $_POST['casttime']) $fields .= "casttime=\"" . $_POST['casttime'] . "\", ";
    if ($item['casttime_'] != $_POST['casttime_']) $fields .= "casttime_=\"" . $_POST['casttime_'] . "\", ";
    if ($item['recastdelay'] != $_POST['recastdelay']) $fields .= "recastdelay=\"" . $_POST['recastdelay'] . "\", ";
    if ($item['recasttype'] != $_POST['recasttype']) $fields .= "recasttype=\"" . $_POST['recasttype'] . "\", ";
    if ($item['clicktype'] != $_POST['clicktype']) $fields .= "clicktype=\"" . $_POST['clicktype'] . "\", ";
    if ($item['clickeffect'] != $_POST['clickeffect']) $fields .= "clickeffect=\"" . $_POST['clickeffect'] . "\", ";
    if ($item['clicklevel'] != $_POST['clicklevel']) $fields .= "clicklevel=\"" . $_POST['clicklevel'] . "\", ";
    if ($item['clicklevel2'] != $_POST['clicklevel2']) $fields .= "clicklevel2=\"" . $_POST['clicklevel2'] . "\", ";
    if ($item['proctype'] != $_POST['proctype']) $fields .= "proctype=\"" . $_POST['proctype'] . "\", ";
    if ($item['proceffect'] != $_POST['proceffect']) $fields .= "proceffect=\"" . $_POST['proceffect'] . "\", ";
    if ($item['proclevel'] != $_POST['proclevel']) $fields .= "proclevel=\"" . $_POST['proclevel'] . "\", ";
    if ($item['proclevel2'] != $_POST['proclevel2']) $fields .= "proclevel2=\"" . $_POST['proclevel2'] . "\", ";
    if ($item['procrate'] != $_POST['procrate']) $fields .= "procrate=\"" . $_POST['procrate'] . "\", ";
    if ($item['worntype'] != $_POST['worntype']) $fields .= "worntype=\"" . $_POST['worntype'] . "\", ";
    if ($item['worneffect'] != $_POST['worneffect']) $fields .= "worneffect=\"" . $_POST['worneffect'] . "\", ";
    if ($item['wornlevel'] != $_POST['wornlevel']) $fields .= "wornlevel=\"" . $_POST['wornlevel'] . "\", ";
    if ($item['wornlevel2'] != $_POST['wornlevel2']) $fields .= "wornlevel2=\"" . $_POST['wornlevel2'] . "\", ";
    if ($item['focustype'] != $_POST['focustype']) $fields .= "focustype=\"" . $_POST['focustype'] . "\", ";
    if ($item['focuseffect'] != $_POST['focuseffect']) $fields .= "focuseffect=\"" . $_POST['focuseffect'] . "\", ";
    if ($item['focuslevel'] != $_POST['focuslevel']) $fields .= "focuslevel=\"" . $_POST['focuslevel'] . "\", ";
    if ($item['focuslevel2'] != $_POST['focuslevel2']) $fields .= "focuslevel2=\"" . $_POST['focuslevel2'] . "\", ";
    if ($item['scrolltype'] != $_POST['scrolltype']) $fields .= "scrolltype=\"" . $_POST['scrolltype'] . "\", ";
    if ($item['scrolleffect'] != $_POST['scrolleffect']) $fields .= "scrolleffect=\"" . $_POST['scrolleffect'] . "\", ";
    if ($item['scrolllevel'] != $_POST['scrolllevel']) $fields .= "scrolllevel=\"" . $_POST['scrolllevel'] . "\", ";
    if ($item['scrolllevel2'] != $_POST['scrolllevel2']) $fields .= "scrolllevel2=\"" . $_POST['scrolllevel2'] . "\", ";
    if ($item['bardtype'] != $_POST['bardtype']) $fields .= "bardtype=\"" . $_POST['bardtype'] . "\", ";
    if ($item['bardeffect'] != $_POST['bardeffect']) $fields .= "bardeffect=\"" . $_POST['bardeffect'] . "\", ";
    if ($item['bardlevel'] != $_POST['bardlevel']) $fields .= "bardlevel=\"" . $_POST['bardlevel'] . "\", ";
    if ($item['bardlevel2'] != $_POST['bardlevel2']) $fields .= "bardlevel2=\"" . $_POST['bardlevel2'] . "\", ";
    if ($item['factionmod1'] != $_POST['factionmod1']) $fields .= "factionmod1=\"" . $_POST['factionmod1'] . "\", ";
    if ($item['factionmod2'] != $_POST['factionmod2']) $fields .= "factionmod2=\"" . $_POST['factionmod2'] . "\", ";
    if ($item['factionmod3'] != $_POST['factionmod3']) $fields .= "factionmod3=\"" . $_POST['factionmod3'] . "\", ";
    if ($item['factionmod4'] != $_POST['factionmod4']) $fields .= "factionmod4=\"" . $_POST['factionmod4'] . "\", ";
    if ($item['factionamt1'] != $_POST['factionamt1']) $fields .= "factionamt1=\"" . $_POST['factionamt1'] . "\", ";
    if ($item['factionamt2'] != $_POST['factionamt2']) $fields .= "factionamt2=\"" . $_POST['factionamt2'] . "\", ";
    if ($item['factionamt3'] != $_POST['factionamt3']) $fields .= "factionamt3=\"" . $_POST['factionamt3'] . "\", ";
    if ($item['factionamt4'] != $_POST['factionamt4']) $fields .= "factionamt4=\"" . $_POST['factionamt4'] . "\", ";
    if ($item['created'] != $_POST['created']) $fields .= "created=\"" . $_POST['created'] . "\", ";
    if ($item['verified'] != $_POST['verified']) $fields .= "verified=\"" . $_POST['verified'] . "\", ";
    if ($item['source'] != $_POST['source']) $fields .= "source=\"" . $_POST['source'] . "\", ";
    if ($item['comment'] != $_POST['comment']) $fields .= "comment=\"" . $_POST['comment'] . "\", ";
    if ($item['gmflag'] != $_POST['gmflag']) $fields .= "gmflag=\"" . $_POST['gmflag'] . "\", ";
    if ($item['soulbound'] != $_POST['soulbound']) $fields .= "soulbound=\"" . $_POST['soulbound'] . "\", ";
    if ($fields != '') $fields .= "updated=\"" . $_POST['updated'] . "\", ";
    $fields = rtrim($fields, ", ");

    if (!empty($fields)) {
        $query = "UPDATE items SET $fields WHERE id=$id";
        $mysql->query_no_result($query);
    }
}

function copy_item()
{
    global $mysql;

    $id = $_GET['id'];

    $query = "DELETE FROM items where id=0";
    $mysql->query_no_result($query);

    $query2 = "INSERT INTO items (`minstatus`, `Name`, `aagi`, `ac`, `acha`, `adex`, `aint`, `asta`, `astr`, `awis`, `bagsize`, `bagslots`, `bagtype`, `bagwr`, `banedmgamt`, `banedmgbody`, `banedmgrace`, `bardtype`, `bardvalue`, `book`, `casttime`, `casttime_`, `classes`, `color`, `price`, `cr`, `damage`, `deity`, `delay`, `dr`, `clicktype`, `clicklevel2`, `elemdmgtype`, `elemdmgamt`, `factionamt1`, `factionamt2`, `factionamt3`, `factionamt4`, `factionmod1`, `factionmod2`, `factionmod3`, `factionmod4`, `filename`, `focuseffect`, `fr`, `fvnodrop`, `clicklevel`, `hp`, `icon`, `idfile`, `itemclass`, `itemtype`, `light`, `lore`, `magic`, `mana`, `material`, `maxcharges`, `mr`, `nodrop`, `norent`, `pr`, `procrate`, `races`, `range`, `reclevel`, `recskill`, `reqlevel`, `sellrate`, `size`, `skillmodtype`, `skillmodvalue`, `slots`, `clickeffect`, `tradeskills`, `weight`, `booktype`, `recastdelay`, `recasttype`, `updated`, `comment`, `stacksize`, `stackable`, `proceffect`, `proctype`, `proclevel2`, `proclevel`, `worneffect`, `worntype`, `wornlevel2`, `wornlevel`, `focustype`, `focuslevel2`, `focuslevel`, `scrolleffect`, `scrolltype`, `scrolllevel2`, `scrolllevel`, `serialized`, `verified`, `serialization`, `source`, `lorefile`, `questitemflag`, `clickunk5`, `clickunk6`, `clickunk7`, `procunk1`, `procunk2`, `procunk3`, `procunk4`, `procunk6`, `procunk7`, `wornunk1`, `wornunk2`, `wornunk3`, `wornunk4`, `wornunk5`, `wornunk6`, `wornunk7`, `focusunk1`, `focusunk2`, `focusunk3`, `focusunk4`, `focusunk5`, `focusunk6`, `focusunk7`, `scrollunk1`, `scrollunk2`, `scrollunk3`, `scrollunk4`, `scrollunk5`, `scrollunk6`, `scrollunk7`, `clickname`, `procname`, `wornname`, `focusname`, `scrollname`, `created`, `bardeffect`, `bardeffecttype`, `bardlevel2`, `bardlevel`, `bardunk1`, `bardunk2`, `bardunk3`, `bardunk4`, `bardunk5`, `bardname`, `bardunk7`, `gmflag`, `soulbound`)
   SELECT minstatus, concat(Name, ' - Copy'), aagi, ac, acha, adex, aint, asta, astr, awis, bagsize, bagslots, bagtype, bagwr, banedmgamt, banedmgbody, banedmgrace, bardtype, bardvalue, book, casttime, casttime_, classes, color, price, cr, damage, deity, delay, dr, clicktype, clicklevel2, elemdmgtype, elemdmgamt, factionamt1, factionamt2, factionamt3, factionamt4, factionmod1, factionmod2, factionmod3, factionmod4, filename, focuseffect, fr, fvnodrop, clicklevel, hp, icon, idfile, itemclass, itemtype, light, lore, magic, mana, material, maxcharges, mr, nodrop, norent, pr, procrate, races, `range`, reclevel, recskill, reqlevel, sellrate, size, skillmodtype, skillmodvalue, slots, clickeffect, tradeskills, weight, booktype, recastdelay, recasttype, updated, comment, stacksize, stackable, proceffect, proctype, proclevel2, proclevel, worneffect, worntype, wornlevel2, wornlevel, focustype, focuslevel2, focuslevel, scrolleffect, scrolltype, scrolllevel2, scrolllevel, serialized, verified, serialization, source, lorefile, questitemflag, clickunk5, clickunk6, clickunk7, procunk1, procunk2, procunk3, procunk4, procunk6, procunk7, wornunk1, wornunk2, wornunk3, wornunk4, wornunk5, wornunk6, wornunk7, focusunk1, focusunk2, focusunk3, focusunk4, focusunk5, focusunk6, focusunk7, scrollunk1, scrollunk2, scrollunk3, scrollunk4, scrollunk5, scrollunk6, scrollunk7, clickname, procname, wornname, focusname, scrollname, created, bardeffect, bardeffecttype, bardlevel2, bardlevel, bardunk1, bardunk2, bardunk3, bardunk4, bardunk5, bardname, bardunk7, gmflag, soulbound FROM items where id=$id";
    $mysql->query_no_result($query2);

    $query3 = "SELECT max(id) AS iid FROM items";
    $result = $mysql->query_assoc($query3);
    $newid = $result['iid'] + 1;

    $query4 = "UPDATE items set id=$newid WHERE id=0";
    $mysql->query_no_result($query4);

    return $newid;
}

function get_max_id()
{
    global $mysql;

    $query = "SELECT max(id) AS iid FROM items";
    $result = $mysql->query_assoc($query);

    return $result['iid'] + 1; // new id
}

function add_item(): void
{
    global $mysql;

    // Define checkbox fields:
    $slots = set_slots_bitmask();

    $races = set_races_bitmask();

    $classes = set_classes_bitmask();

    $deity = set_deity_bitmask();

    $fields = "slots=\"$slots\", ";
    $fields .= "races=\"$races\", ";
    $fields .= "classes=\"$classes\", ";
    $fields .= "deity=\"$deity\", ";
    $fields .= "id=\"" . $_POST['id'] . "\", ";
    $fields .= "name=\"" . $_POST['itemname'] . "\", ";
    $fields .= "itemtype=\"" . $_POST['itemtype'] . "\", ";
    $fields .= "lore=\"" . $_POST['lore'] . "\", ";
    $fields .= "itemclass=\"" . $_POST['itemclass'] . "\", ";
    $fields .= "stackable=\"" . $_POST['stackable'] . "\", ";
    $fields .= "stacksize=\"" . $_POST['stacksize'] . "\", ";
    $fields .= "maxcharges=\"" . $_POST['maxcharges'] . "\", ";
    $fields .= "filename=\"" . $_POST['filename'] . "\", ";
    $fields .= "book=\"" . $_POST['book'] . "\", ";
    $fields .= "booktype=\"" . $_POST['booktype'] . "\", ";
    $fields .= "bagsize=\"" . $_POST['bagsize'] . "\", ";
    $fields .= "bagslots=\"" . $_POST['bagslots'] . "\", ";
    $fields .= "bagwr=\"" . $_POST['bagwr'] . "\", ";
    $fields .= "bagtype=\"" . $_POST['bagtype'] . "\", ";
    $fields .= "nodrop=\"" . $_POST['nodrop'] . "\", ";
    $fields .= "norent=\"" . $_POST['norent'] . "\", ";
    $fields .= "magic=\"" . $_POST['magic'] . "\", ";
    $fields .= "tradeskills=\"" . $_POST['tradeskills'] . "\", ";
    $fields .= "questitemflag=\"" . $_POST['questitemflag'] . "\", ";
    $fields .= "fvnodrop=\"" . $_POST['fvnodrop'] . "\", ";
    $fields .= "reqlevel=\"" . $_POST['reqlevel'] . "\", ";
    $fields .= "reclevel=\"" . $_POST['reclevel'] . "\", ";
    $fields .= "recskill=\"" . $_POST['recskill'] . "\", ";
    $fields .= "damage=\"" . $_POST['damage'] . "\", ";
    $fields .= "delay=\"" . $_POST['delay'] . "\", ";
    $fields .= "`range`=\"" . $_POST['range'] . "\", ";
    $fields .= "banedmgamt=\"" . $_POST['banedmgamt'] . "\", ";
    $fields .= "banedmgrace=\"" . $_POST['banedmgrace'] . "\", ";
    $fields .= "banedmgbody=\"" . $_POST['banedmgbody'] . "\", ";
    $fields .= "hp=\"" . $_POST['hp'] . "\", ";
    $fields .= "mana=\"" . $_POST['mana'] . "\", ";
    $fields .= "ac=\"" . $_POST['ac'] . "\", ";
    $fields .= "light=\"" . $_POST['light'] . "\", ";
    $fields .= "aagi=\"" . $_POST['aagi'] . "\", ";
    $fields .= "acha=\"" . $_POST['acha'] . "\", ";
    $fields .= "adex=\"" . $_POST['adex'] . "\", ";
    $fields .= "aint=\"" . $_POST['aint'] . "\", ";
    $fields .= "asta=\"" . $_POST['asta'] . "\", ";
    $fields .= "astr=\"" . $_POST['astr'] . "\", ";
    $fields .= "awis=\"" . $_POST['awis'] . "\", ";
    $fields .= "cr=\"" . $_POST['cr'] . "\", ";
    $fields .= "dr=\"" . $_POST['dr'] . "\", ";
    $fields .= "fr=\"" . $_POST['fr'] . "\", ";
    $fields .= "mr=\"" . $_POST['mr'] . "\", ";
    $fields .= "pr=\"" . $_POST['pr'] . "\", ";
    $fields .= "elemdmgtype=\"" . $_POST['elemdmgtype'] . "\", ";
    $fields .= "elemdmgamt=\"" . $_POST['elemdmgamt'] . "\", ";
    $fields .= "skillmodtype=\"" . $_POST['skillmodtype'] . "\", ";
    $fields .= "skillmodvalue=\"" . $_POST['skillmodvalue'] . "\", ";
    $fields .= "bardvalue=\"" . $_POST['bardvalue'] . "\", ";
    $fields .= "price=\"" . $_POST['price'] . "\", ";
    $fields .= "sellrate=\"" . $_POST['sellrate'] . "\", ";
    $fields .= "icon=\"" . $_POST['icon'] . "\", ";
    $fields .= "idfile=\"" . $_POST['idfile'] . "\", ";
    $fields .= "weight=\"" . $_POST['weight'] . "\", ";
    $fields .= "color=\"" . $_POST['color'] . "\", ";
    $fields .= "size=\"" . $_POST['size'] . "\", ";
    $fields .= "material=\"" . $_POST['material'] . "\", ";
    $fields .= "casttime=\"" . $_POST['casttime'] . "\", ";
    $fields .= "casttime_=\"" . $_POST['casttime_'] . "\", ";
    $fields .= "recastdelay=\"" . $_POST['recastdelay'] . "\", ";
    $fields .= "recasttype=\"" . $_POST['recasttype'] . "\", ";
    $fields .= "clicktype=\"" . $_POST['clicktype'] . "\", ";
    $fields .= "clickeffect=\"" . $_POST['clickeffect'] . "\", ";
    $fields .= "clicklevel=\"" . $_POST['clicklevel'] . "\", ";
    $fields .= "clicklevel2=\"" . $_POST['clicklevel2'] . "\", ";
    $fields .= "proctype=\"" . $_POST['proctype'] . "\", ";
    $fields .= "proceffect=\"" . $_POST['proceffect'] . "\", ";
    $fields .= "proclevel=\"" . $_POST['proclevel'] . "\", ";
    $fields .= "proclevel2=\"" . $_POST['proclevel2'] . "\", ";
    $fields .= "procrate=\"" . $_POST['procrate'] . "\", ";
    $fields .= "worntype=\"" . $_POST['worntype'] . "\", ";
    $fields .= "worneffect=\"" . $_POST['worneffect'] . "\", ";
    $fields .= "wornlevel=\"" . $_POST['wornlevel'] . "\", ";
    $fields .= "wornlevel2=\"" . $_POST['wornlevel2'] . "\", ";
    $fields .= "focustype=\"" . $_POST['focustype'] . "\", ";
    $fields .= "focuseffect=\"" . $_POST['focuseffect'] . "\", ";
    $fields .= "focuslevel=\"" . $_POST['focuslevel'] . "\", ";
    $fields .= "focuslevel2=\"" . $_POST['focuslevel2'] . "\", ";
    $fields .= "scrolltype=\"" . $_POST['scrolltype'] . "\", ";
    $fields .= "scrolleffect=\"" . $_POST['scrolleffect'] . "\", ";
    $fields .= "scrolllevel=\"" . $_POST['scrolllevel'] . "\", ";
    $fields .= "scrolllevel2=\"" . $_POST['scrolllevel2'] . "\", ";
    $fields .= "bardtype=\"" . $_POST['bardtype'] . "\", ";
    $fields .= "bardeffect=\"" . $_POST['bardeffect'] . "\", ";
    $fields .= "bardlevel=\"" . $_POST['bardlevel'] . "\", ";
    $fields .= "bardlevel2=\"" . $_POST['bardlevel2'] . "\", ";
    $fields .= "factionmod1=\"" . $_POST['factionmod1'] . "\", ";
    $fields .= "factionmod2=\"" . $_POST['factionmod2'] . "\", ";
    $fields .= "factionmod3=\"" . $_POST['factionmod3'] . "\", ";
    $fields .= "factionmod4=\"" . $_POST['factionmod4'] . "\", ";
    $fields .= "factionamt1=\"" . $_POST['factionamt1'] . "\", ";
    $fields .= "factionamt2=\"" . $_POST['factionamt2'] . "\", ";
    $fields .= "factionamt3=\"" . $_POST['factionamt3'] . "\", ";
    $fields .= "factionamt4=\"" . $_POST['factionamt4'] . "\", ";
    $fields .= "created=\"" . $_POST['created'] . "\", ";
    $fields .= "verified=\"" . $_POST['verified'] . "\", ";
    $fields .= "updated=\"" . $_POST['updated'] . "\", ";
    $fields .= "source=\"" . $_POST['source'] . "\", ";
    $fields .= "comment=\"" . $_POST['comment'] . "\", ";
    $fields .= "gmflag=\"" . $_POST['gmflag'] . "\", ";
    $fields .= "soulbound=\"" . $_POST['soulbound'] . "\"";

    $query = "INSERT INTO items SET $fields";
    $mysql->query_no_result($query);
}

?>
