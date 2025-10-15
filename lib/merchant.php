<?php

switch ($action) {
  case 0:  // View Merchantlist
    if ($npcid) {
      $body = new Template("templates/merchant/merchant.tmpl.php");
      $body->set('currzone', $z);
      $body->set('currzoneid', $zoneid);
      $body->set('npcid', $npcid);
      $vars = get_merchantlist();
      if ($vars) {
        foreach ($vars as $key=>$value) {
          $body->set($key, $value);
        }
      }
    }
    else {
       $body = new Template("templates/merchant/merchant.default.tmpl.php");
    }
    break;
  case 1: // merchant item
    check_authorization();
    $body = new Template("templates/merchant/item.edit.tmpl.php");
    $javascript .= file_get_contents("templates/merchant/js.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    $vars = get_ware();
    if ($vars) {
      foreach ($vars as $key=>$value) {
        $body->set($key, $value);
      }
    }
    break;
  case 2: // Update merchant item
    check_authorization();
    update_merchant_item();
    header("Location: index.php?editor=merchant&z=$z&zoneid=$zoneid&npcid=$npcid");
    exit;
  case 3:  // Delete item from merchant
    check_authorization();
    delete_ware();
    header("Location: index.php?editor=merchant&z=$z&zoneid=$zoneid&npcid=$npcid");
    exit;
  case 4: // Add item to Merchant
    check_authorization();
    $javascript .= file_get_contents("templates/iframes/js.tmpl.php");
	$javascript .= file_get_contents("templates/merchant/js.tmpl.php");
    $body = new Template("templates/merchant/item.add.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    $body->set('mid', $_GET['mid']);
    $slot = next_slot($_GET['mid']);
    if ($slot) {
        $body->set('slot', $slot);
    }
    break;
  case 5: // Add item
    check_authorization();
    add_merchant_item();
    header("Location: index.php?editor=merchant&z=$z&zoneid=$zoneid&npcid=$npcid");
    exit;
  case 6: // Delete Merchantlist
    check_authorization();
    delete_merchantlist();
    header("Location: index.php?editor=merchant&z=$z&zoneid=$zoneid&npcid=$npcid");
    exit;
  case 7:  // Search merchant by item
    check_authorization();
    $body = new Template("templates/merchant/merchant.searchresults.tmpl.php");
    if (isset($_GET['npcid']) && $_GET['npcid'] != "ID") {
      $results = search_npc_by_id();
    }
    if (isset($_GET['search1']) && $_GET['search1'] != "Item ID") {
      $results = search_temp_merchant();
    }	
    if (isset($_GET['search']) && $_GET['search'] != "Enter Item ID") {
      $results = search_merchant_by_item();
    }
	if (isset($results)) {
		$body->set("results", $results);
	}
    break;
  case 8:  // View Temp Merchanlist
    if ($npcid) {
      $body = new Template("templates/merchant/merchant_temp.tmpl.php");
      $body->set('currzone', $z);
      $body->set('currzoneid', $zoneid);
      $body->set('npcid', $npcid);
      $vars = get_merchantlist_temp();
      if ($vars) {
        foreach ($vars as $key=>$value) {
          $body->set($key, $value);
        }
      }
    }
    break;
  case 9: // Edit Temp Merchantlist
    check_authorization();
    $body = new Template("templates/merchant/merchant_temp.edit.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    $vars = get_merchantlist_temp();
    if ($vars) {
      foreach ($vars as $key=>$value) {
        $body->set($key, $value);
      }
    }
    break;
  case 10:
    check_authorization();
    update_merchantlist_temp();
    header("Location: index.php?editor=merchant&z=$z&zoneid=$zoneid&npcid=$npcid&action=8");
    exit;
  case 11:  // Delete temp item from merchant
    check_authorization();
    delete_temp_ware();
    header("Location: index.php?editor=merchant&z=$z&zoneid=$zoneid&npcid=$npcid&action=8");
    exit;
  case 12: // Add temp item to Merchant
    check_authorization();
    $javascript .= file_get_contents("templates/iframes/js.tmpl.php");
    $body = new Template("templates/merchant/item_temp.add.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    break;
  case 13: // Add item
    check_authorization();
    add_merchant_item_temp();
    header("Location: index.php?editor=merchant&z=$z&zoneid=$zoneid&npcid=$npcid&action=8");
    exit;
  case 14: // Delete Temp Merchantlist
    check_authorization();
    delete_merchantlist_temp();
    header("Location: index.php?editor=merchant&z=$z&zoneid=$zoneid&npcid=$npcid");
    exit;
  case 15: // Wipe Temp Merchantlists
    check_authorization();
    wipe_merchantlist_temp();
    header("Location: index.php?editor=merchant");
    exit;
  case 16: // NPCs using merchantlist
    check_authorization(); 
    $body = new Template("templates/merchant/npcsbymerchant.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $_GET['npcid']);
    $body->set('merid', $_GET['merid']);
    $merlist = npcs_using_merchantlist();
    $body->set("merlist", $merlist);
    break;
  case 17: // Drop Merchantlist
    check_authorization();
    drop_merchantlist();
    header("Location: index.php?editor=merchant&z=$z&zoneid=$zoneid&npcid=$npcid");
    exit;
  case 18: // Copy Merchantlist
    check_authorization();
    copy_merchantlist();
    header("Location: index.php?editor=merchant&z=$z&zoneid=$zoneid&npcid=$npcid");
    exit;
  case 19: // Sort Merchantlist
    check_authorization();
    sort_merchantlist();
    header("Location: index.php?editor=merchant&z=$z&zoneid=$zoneid&npcid=$npcid");
    exit; 
  case 20: // Change Merchantlist to match NPCID
    check_authorization();
    merchantlist_npcid();
    header("Location: index.php?editor=merchant&z=$z&zoneid=$zoneid&npcid=$npcid");
    exit; 
}

function get_merchantlist(): array
{
  global $database;
  $mid = get_merchant_id();
  $array = array();

  $array['id'] = $mid;
  $results = $database->fetchAll("SELECT * FROM merchantlist WHERE merchantid = ?", [$mid], 'i');
  if ($results) {
      	foreach ($results as $result) {
  		$result['item_name'] = 'Item not in DB';
        	$array['slots'][$result['slot']] = array("item"=>$result['item'], "item_name"=>$result['item_name'], "faction_required"=>$result['faction_required'], "level_required"=>$result['level_required'], "classes_required"=>$result['classes_required'], "quantity"=>$result['quantity']);
      	}
  }
  $results = $database->fetchAll(
      "SELECT m.merchantid, m.slot, m.item, i.price, i.sellrate, m.faction_required, m.level_required, m.classes_required, m.quantity, m.min_expansion, m.max_expansion, m.content_flags, m.content_flags_disabled
      FROM merchantlist AS m, items AS i 
      WHERE i.id = m.item AND merchantid = ?",
      [$mid],
    'i'
  );
  if ($results) {
    	foreach ($results as $result) {
      		$result['item_name'] = get_item_name($result['item']);
      		$array['slots'][$result['slot']] = array("item"=>$result['item'], "item_name"=>$result['item_name'], "price"=>$result['price'], "sellrate"=>$result['sellrate'], "faction_required"=>$result['faction_required'], "level_required"=>$result['level_required'], "classes_required"=>$result['classes_required'], "quantity"=>$result['quantity'], "min_expansion"=>$result['min_expansion'], "max_expansion"=>$result['max_expansion'], "content_flags"=>$result['content_flags'], "content_flags_disabled"=>$result['content_flags_disabled']);
      	}
  }

  return $array;
}

function get_merchantlist_temp(): array
{
  global $database;
  $array = array();

  $npcid = $_GET['npcid'];

  $results = $database->fetchAll(
      "SELECT npcid, slot, itemid, charges, quantity FROM merchantlist_temp WHERE npcid = ? ORDER BY slot",
      [$npcid],
  'i'
  );

  if ($results) {
      	foreach ($results as $result) {
            $result['item_name'] = 'Item not in DB';
        	$array['slots'][$result['slot']] = array("itemid"=>$result['itemid'], "charges"=>$result['charges'], "quantity"=>$result['quantity'], "item_name"=>$result['item_name']);
      	}
  }

  $results = $database->fetchAll(
      "SELECT m.npcid, m.slot, m.itemid, m.charges, m.quantity, i.price, i.sellrate 
      FROM merchantlist_temp AS m, items AS i 
      WHERE i.id = m.itemid AND npcid = ?",
      [$npcid],
    'i'
  );

  if ($results) {
    	foreach ($results as $result) {
            $result['item_name'] = get_item_name($result['itemid']);
      		$array['slots'][$result['slot']] = array("itemid"=>$result['itemid'], "charges"=>$result['charges'], "quantity"=>$result['quantity'], "item_name"=>$result['item_name'], "price"=>$result['price'], "sellrate"=>$result['sellrate']);
    	}
  }
  
  return $array;
}

function update_merchant_item(): void
{
  check_authorization();
  global $database, $npcid;
  
  $merchantid = $_POST['merchantid'];
  $slot = $_POST['slot'];
  $item = $_POST['item'];
  $faction_required = $_POST['faction_required'];
  $level_required = $_POST['level_required'];
  $classes_required = $_POST['classes_required'];
  $quantity = $_POST['quantity'];
  $min_expansion = $_POST['min_expansion'];
  $max_expansion = $_POST['max_expansion'];
  $content_flags = $_POST['content_flags'];
  $content_flags_disabled = $_POST['content_flags_disabled'];
  $new_slot = $_POST['new_slot'];

  $classes_value = 0;
  foreach ($classes_required as $v) {
    $classes_value = $classes_value ^ $v;
  }
	
  $database->executeQuery(
      "UPDATE merchantlist SET slot = ?, item = ?, faction_required = ?, level_required = ?, classes_required = ?, 
      quantity = ?, min_expansion = ?, max_expansion = ?, content_flags = NULL, content_flags_disabled = NULL 
      WHERE merchantid = ? AND slot = ?",
      [$new_slot, $item, $faction_required, $level_required, $classes_value, $quantity, $min_expansion, $max_expansion, $merchantid, $slot],
      'iiiiiiiiii'
  );
  
    if ($content_flags != "") {
        $database->executeQuery(
            "UPDATE merchantlist SET content_flags = ? WHERE merchantid = ? AND slot = ?",
            [$content_flags, $merchantid, $slot],
            'sii'
        );
  }

  if ($content_flags_disabled != "") {
      $database->executeQuery(
          "UPDATE merchantlist SET content_flags_disabled = ? WHERE merchantid = ? AND slot = ?",
          [$content_flags_disabled, $merchantid, $slot],
          'sii'
      );
  }
}

function update_merchantlist_temp(): void
{
  check_authorization();
  global $database, $npcid;

  $oldstats = get_merchantlist_temp();
  $i = 0;

  foreach ($oldstats['slots'] as $slot => $values) {
    $i++;
    // Check if any field has changed
    if (
        ($slot != $_POST["newslot$i"]) ||
        ($values['itemid'] != $_POST["itemid$i"]) ||
        ($values['charges'] != $_POST["charges$i"]) ||
        ($values['quantity'] != $_POST["quantity$i"])
    ) {
        $query = "UPDATE merchantlist_temp SET itemid = ?, slot = ?, charges = ?, quantity = ? WHERE npcid = ? AND slot = ?";
        $params = [
            $_POST["itemid$i"],
            $_POST["newslot$i"],
            $_POST["charges$i"],
            $_POST["quantity$i"],
            $npcid,
            $_POST["slot$i"]
        ];
        $types = 'iiiiii';

        $database->executeQuery($query, $params, $types);
    }
  }
}

function get_ware(): ?array
{
  global $database;
  $id = $_GET['id'];
  $slot = $_GET['slot'];
  $mid = $_GET['mid'];

  $result = $database->fetchAssoc(
      "SELECT * FROM merchantlist WHERE merchantid = ? AND slot = ? AND item = ?",
      [$mid, $slot, $id],
      'iii'
  );

  if ($result) {
    return $result;
  }
  else {
    return null;
  }
}

function delete_ware(): void
{
  check_authorization();
  global $database;
  $id = $_GET['id'];
  $slot = $_GET['slot'];
  $mid = $_GET['mid'];

  $database->executeQuery(
      "DELETE FROM merchantlist WHERE merchantid = ? AND slot = ? AND item = ?",
      [$mid, $slot, $id],
      'iii'
  );
}

function delete_temp_ware(): void
{
  check_authorization();
  global $database, $npcid;
  $itemid = $_GET['itemid'];
  $slot = $_GET['slot'];

  $database->executeQuery(
      "DELETE FROM merchantlist_temp WHERE npcid = ? AND slot = ? AND itemid = ?",
      [$npcid, $slot, $itemid],
      'iii'
  );
}

function add_merchant_item(): void
{
  check_authorization();
  global $database, $npcid;
  
  $mid = $_POST['mid'];
  $slot = $_POST['slot'];
  $item = $_POST['itemid'];
  $faction_required = $_POST['faction_required'];
  $level_required = $_POST['level_required'];
  $classes_required = $_POST['classes_required'];
  $quantity = $_POST['quantity'];
  $min_expansion = $_POST['min_expansion'];
  $max_expansion = $_POST['max_expansion'];
  $content_flags = $_POST['content_flags'];
  $content_flags_disabled = $_POST['content_flags_disabled'];
  
  $classes_value = 0;
  foreach ($classes_required as $v) {
    $classes_value = $classes_value ^ $v;
  }
 
  $database->executeQuery(
      "INSERT INTO merchantlist SET merchantid = ?, slot = ?, item = ?, faction_required = ?, level_required = ?, 
      classes_required = ?, quantity = ?, min_expansion = ?, max_expansion = ?, content_flags = NULL, content_flags_disabled = NULL",
      [$mid, $slot, $item, $faction_required, $level_required, $classes_value, $quantity, $min_expansion, $max_expansion],
      'iiiiiiiii'
  );
  
  if ($content_flags != "") {
    $database->executeQuery(
        "UPDATE merchantlist SET content_flags = ? WHERE merchantid = ? AND slot = ?",
        [$content_flags, $mid, $slot],
        'sii'
    );
  }

  if ($content_flags_disabled != "") {
    $database->executeQuery(
        "UPDATE merchantlist SET content_flags_disabled = ? WHERE merchantid = ? AND slot = ?",
        [$content_flags_disabled, $mid, $slot],
        'sii'
    );
  }
}

function add_merchant_item_temp(): void
{
  check_authorization();
  global $database, $npcid;
  $charges = $_POST['charges'];
  $itemid = $_POST['itemid'];
  
  $result = $database->fetchAssoc("SELECT merchant_id AS mid FROM npc_types WHERE id = ?", [$npcid], 'i');
  $mid = $result['mid'];

  $result = $database->fetchAssoc("SELECT MAX(slot) AS mslot FROM merchantlist WHERE merchantid = ?", [$mid], 'i');
  $mslot = $result['mslot'] + 1;

  $result = $database->fetchAssoc("SELECT MAX(slot) AS tslot FROM merchantlist_temp WHERE npcid = ?", [$npcid], 'i');
  $tslot = $result['tslot'] + 1;
  
  if ($tslot < $mslot) {
    $database->executeQuery(
        "INSERT INTO merchantlist_temp SET npcid = ?, slot = ?, itemid = ?, charges = ?, quantity = 1",
        [$npcid, $mslot, $itemid, $charges],
        'iiii'
    );
  }
  if ($tslot > $mslot) {
      $database->executeQuery(
          "INSERT INTO merchantlist_temp SET npcid = ?, slot = ?, itemid = ?, charges = ?, quantity = 1",
          [$npcid, $tslot, $itemid, $charges],
          'iiii'
      );
  }
}

function next_slot($merchantid): mixed
{
    global $database;
    $result = $database->fetchAssoc("SELECT MAX(slot) AS slot FROM merchantlist WHERE merchantid = ?", [$merchantid], 'i');

    return $result['slot'] + 1;
}

function delete_merchantlist(): void
{
  check_authorization();
  global $database, $npcid;
  $mid = $_GET['mid'];

  $database->executeQuery("DELETE FROM merchantlist WHERE merchantid = ?", [$mid], 'i');

  $database->executeQuery("UPDATE npc_types SET merchant_id = 0 WHERE id = ?", [$npcid], 'i');
}

function delete_merchantlist_temp(): void
{
  check_authorization();
  global $database, $npcid;

  $database->executeQuery("DELETE FROM merchantlist_temp WHERE npcid = ?", [$npcid], 'i');
}

function wipe_merchantlist_temp(): void
{
  check_authorization();
  global $database;

  $database->executeQuery("DELETE FROM merchantlist_temp");
}

function search_merchant_by_item(): array
{
  global $database;
  $search = $_GET['search'];

  return $database->fetchAll(
      "SELECT npc_types.id, npc_types.name FROM merchantlist
      INNER JOIN npc_types ON npc_types.merchant_id = merchantlist.merchantid
      WHERE merchantlist.item = ?",
      [$search],
      's'
  );
}

function search_temp_merchant(): array
{
  global $database;
  $search = $_GET['search1'];

  return $database->fetchAll(
      "SELECT npc_types.id, npc_types.name
      FROM merchantlist_temp INNER JOIN npc_types ON npc_types.id = merchantlist_temp.npcid
      WHERE merchantlist_temp.slot < 81 and merchantlist_temp.itemid = ?",
      [$search],
    's'
  );
}

function npcs_using_merchantlist (): array|string|null
{
  global $mysql;
  $merid = $_GET['merid'];

  $query = "SELECT id AS npcid, name from npc_types where merchant_id=$merid";
    return $mysql->query_mult_assoc($query);
  }

function drop_merchantlist(): void
{
  check_authorization();
  global $mysql, $npcid;

  $query = "UPDATE npc_types SET merchant_id=0 WHERE id=$npcid";
  $mysql->query_no_result($query);
}

function copy_merchantlist(): void
{
  check_authorization();
  global $mysql, $npcid;
  $mid = $_POST['mid'];
  
  $query = "SELECT MAX(merchantid) as merid FROM merchantlist";
  $result = $mysql->query_assoc($query);
  $nmid = $result['merid'] + 1;
  
  $query = "DELETE FROM merchantlist WHERE merchantid = 0";
  $mysql->query_no_result($query);

  $query = "INSERT INTO merchantlist (slot,item,faction_required,level_required,classes_required,quantity) 
            SELECT slot,item,faction_required,level_required,classes_required,quantity FROM merchantlist where merchantid=$mid";
  $mysql->query_no_result($query);

  $query = "UPDATE merchantlist set merchantid=$nmid where merchantid=0";
  $mysql->query_no_result($query);

  $query = "UPDATE npc_types set merchant_id=$nmid where id=$npcid";
  $mysql->query_no_result($query);
}

function sort_merchantlist(): void
{
  check_authorization();
  global $mysql;
  $merchantid = get_merchant_id();
  $item_id = array();
 
  $query = "SELECT COUNT(slot) AS item_count FROM merchantlist WHERE merchantid=$merchantid";
  $result = $mysql->query_assoc($query);
  $item_count = $result['item_count'];

  $query = "SELECT MAX(slot) AS max_slot FROM merchantlist WHERE merchantid=$merchantid";
  $result = $mysql->query_assoc($query);
  $max_slot = $result['max_slot'];
 
  $query = "SELECT item FROM merchantlist WHERE merchantid=$merchantid";
  $results = $mysql->query_mult_assoc($query);

  foreach ($results as $result) {
    $item_id[] = $result['item'];
  }
 
  for ($i=0; $i<$item_count; $i++) {
    $query = "UPDATE merchantlist SET slot=$max_slot+$i+1 WHERE merchantid=$merchantid AND item=$item_id[$i]";
    $mysql->query_no_result($query);
  }

  for ($i=0; $i<$item_count; $i++) {
    $query = "UPDATE merchantlist SET slot=$i+1 WHERE merchantid=$merchantid AND item=$item_id[$i]";
    $mysql->query_no_result($query);
  }   
}
 
function merchantlist_npcid(): void
{
   check_authorization();
   global $mysql, $npcid;
   $mid = $_GET['mid'];

   $query = "SELECT COUNT(*) AS npc_count FROM npc_types WHERE merchant_id=$mid AND id != $npcid";
   $result = $mysql->query_assoc($query);  
   $count = $result['npc_count'];

   if($count == 0){
    $query = "UPDATE npc_types set merchant_id=$npcid WHERE id=$npcid";
    $mysql->query_no_result($query);

    $query = "UPDATE merchantlist set merchantid=$npcid WHERE merchantid=$mid";
    $mysql->query_no_result($query);
   }	 
}
?>