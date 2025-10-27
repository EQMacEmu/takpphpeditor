<?php

$max_special_ability = 53;

$factions = faction_list();
$faction_values = array(
 -1 => "Aggressive",
  0 => "Passive",
  1 => "Assist"
);

$npctier = array(
  1 => "Normal",
  2 => "Dungeon",
  3 => "Velious High",
  4 => "Luclin High",
  5 => "PoP Tier 1",
  6 => "PoP Tier 2",
  7 => "PoP Tier 3",
  8 => "PoP Elem",
  9 => "PoP Time"
);

$npctype = array(
  1 => "Normal",
  2 => "Named",
  3 => "Boss",
  4 => "Raid Boss"
);

$npcchange = array(
  1 => "Current",
  2 => "Same Name",
  3 => "Same Race",
  4 => "Same Class",
  5 => "Same Level",
  6 => "Custom"
);

$npcclass = array(
  1   => "Tank",
  2   => "Knight",
  3   => "Hybrid",
  4   => "Caster"
);

$npcstatchange = array(
  1   => "AC",
  2   => "Resists",
  3   => "All"
);

$pet_naming = array(
  0 => "`s pet",
  1 => "`s familiar",
  2 => "`s Warder",
  3 => "Random pet name",
  4 => "Keep DB name"
);

$pet_control = array(
  0 => "Familiar",
  1 => "Animation",
  2 => "Normal",
  3 => "Charmed",
  4 => "NPC Follow",
  5 => "Hate List"
);

$tmpfaction = array(
  0 => "Permanent",
  1 => "Temp No Msg",
  2 => "Perm No Msg",
  3 => "Temporary"
);

$tmpfacshort = array(
  0 => "Perm",
  1 => "Temp/NoMsg",
  2 => "Perm/NoMsg",
  3 => "Temp"
);

$eventtype = array(
  0 => "LEAVECOMBAT",
  1 => "ENTERCOMBAT",
  2 => "ONDEATH",
  3 => "AFTERDEATH",
  4 => "HAILED",
  5 => "KILLEDPC",
  6 => "KILLEDNPC",
  7 => "ONSPAWN",
  8 => "ONDESPAWN",
  9 => "KILLED"
);

$emotetype = array(
  0 => "Say",
  1 => "Emote",
  2 => "Shout",
  3 => "Message"
);

$default_page = 1;
$default_size = 50;
$default_sort = 1;

$columns = array(
  1 => 'emoteid',
  2 => 'type',
  3 => 'event_',
  4 => 'text'
);

$satype = array(
  0 => 'Choose an option',
  1 => 'ADD',
  2 => 'REMOVE',
  3 => 'CUSTOM'
);

$valueadjust = array (
  0 => '=',
  1 => '>',
  2 => '<'
);

switch ($action) {
  case 0:
    if ($npcid) {  // View NPC
      $body = new Template("templates/npc/npc.tmpl.php");
      $body->set('currzone', $z);
      $body->set('currzoneid', $zoneid);
      $body->set('npcid', $npcid);
      $body->set('classes', $classes);
      $body->set('genders', $genders);
      $body->set('bodytypes', $bodytypes);
      $body->set('races', $races);
      $body->set('yesno', $yesno);
      $body->set('skilltypes', $skilltypes);
      $body->set('suggestedid', (isset($_POST['selected_id']) && $_POST['selected_id'] > 0) ? $_POST['selected_id'] : suggest_npcid());
      $body->set('npc_name', getNPCName($npcid));
      $body->set('factions', $factions);
      $body->set('faction_values', $faction_values);
      $body->set('tmpfacshort', $tmpfacshort);
      $body->set('pet', get_ispet());
      $body->set('max_special_ability', $max_special_ability);
      $body->set('specialattacks', $specialattacks);
	  
      $vars = npc_info();
      if ($vars) {
        foreach ($vars as $key=>$value) {
          $body->set($key, $value);
        }
      }
	  
	  $body->set('see_invis_text', get_see_invis_text($vars['see_invis']));
	  $body->set('see_invis_undead_text', get_see_invis_text($vars['see_invis_undead']));
	  $body->set('see_sneak_text', get_see_invis_text($vars['see_sneak']));
	  $body->set('see_improved_hide_text', get_see_invis_text($vars['see_improved_hide']));
    }
    else if ($z) {
      $body = new Template("templates/npc/npc.zdefault.tmpl.php");
      $body->set('currzone', $z);
      $body->set('currzoneid', $zoneid);
    }
    else {
      $body = new Template("templates/npc/npc.default.tmpl.php");
    }
    break;
  case 1: // Edit NPC
    check_authorization();
    $javascript = new Template("templates/npc/js.tmpl.php");
    $body = new Template("templates/npc/npc.edit.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    $body->set('npc_name', getNPCName($npcid));
    $body->set('genders', $genders);
    $body->set('factions', $factions);
    $body->set('yesno', $yesno);
    $body->set('skilltypes', $skilltypes);
    $body->set('bodytypes', $bodytypes);
    $body->set('races', $races);
    $body->set('classes', $classes);
    $body->set('specialattacks', $specialattacks);
    $body->set('faction_values', $faction_values);
    $body->set('pet', get_ispet());
    $body->set('max_special_ability', $max_special_ability);
    $vars = npc_info();
    if ($vars) {
      foreach ($vars as $key=>$value) {
        $body->set($key, $value);
      }
    }
    break;
  case 2:
    check_authorization();
    update_npc();
    if (isset($_POST['pet']) && $_POST['pet'] == 1) {
      update_pet();
    }
    else {
      delete_pet();
    }
    header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid");
    exit;
  case 3: // Change npc_faction_id
    check_authorization();
    $body = new Template("templates/npc/factionid.change.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    $body->set('npc_faction_id', get_npc_faction_id());
    break;
  case 4: // Change npc_faction_id by ID
    check_authorization();
    $body = new Template("templates/npc/factionid.changebyid.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    $body->set('npc_faction_id', get_npc_faction_id());
    break;
  case 5:  // Update npc_faction_id
    check_authorization();
    update_npc_faction_id($_REQUEST['npc_faction_id']);
    header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid");
    exit;
  case 6: // Search npc_faction_ids
    check_authorization();
    $body = new Template("templates/npc/factionid.search.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    $body->set('npc_faction_id', get_npc_faction_id());
    break;
  case 7: // Search results for npc_faction_ids
    check_authorization();
    $body = new Template("templates/npc/factionid.searchresults.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    $body->set('results', search_npc_faction_ids($_POST['search']));
    $body->set('npc_faction_id', get_npc_faction_id());
    break;
  case 8: // Create new npc_faction_id
    check_authorization();
    $body = new Template("templates/npc/factionid.add.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    $body->set('id', suggest_npc_faction_id());
    $body->set('npc_name', getNPCName($npcid));
    break;
  case 9: // Create npc_faction_id
    check_authorization();
    create_npc_faction_id();
    update_npc_faction_id($_POST['id']);
    header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid");
    exit;
  case 10: // Create new npc_faction_id
    check_authorization();
    $body = new Template("templates/npc/factionid.edit.name.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    $vars = get_npc_faction_id_name();
    if ($vars) {
      foreach ($vars as $key=>$value) {
        $body->set($key, $value);
      }
    }
    break;
  case 11: // Update npc_faction_id name
    check_authorization();
    update_npc_faction_id_name();
    header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid");
    exit;
  case 12: // Search for primary faction
    check_authorization();
    $body = new Template("templates/npc/primaryfaction.search.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    break;
  case 13: // Primary faction search results
    check_authorization();
    $body = new Template("templates/npc/primaryfaction.searchresults.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    $body->set('results', search_factions($_POST['search']));
    break;
  case 14: // Update primary faction
    check_authorization();
    update_primary_faction();
    header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid");
    exit;
  case 15: // Add faction hit search
    check_authorization();
    $body = new Template("templates/npc/factionhit.search.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    break;
  case 16: // Faction hit search results
    check_authorization();
    $body = new Template("templates/npc/factionhit.searchresults.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    $body->set('results', search_factions($_POST['search']));
    break;
  case 17: // Add faction hit
    check_authorization();
    $body = new Template("templates/npc/factionhit.add.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    $body->set('fid', $_GET['fid']);
    $body->set('name', get_faction_name($_GET['fid']));
    $body->set('tmpfaction', $tmpfaction);
    break;
  case 18: // Insert faction hit
    check_authorization();
    add_faction_hit();
    header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid");
    exit;
  case 19: // Edit faction hit
    check_authorization();
    $body = new Template("templates/npc/factionhit.edit.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    $body->set('tmpfaction', $tmpfaction);
    $vars = get_factionhit_info();
    if ($vars) {
      foreach ($vars as $key=>$value) {
        $body->set($key, $value);
      }
    }
    break;
  case 20: // Update faction hit
    check_authorization();
    update_factionhit();
    header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid");
    exit;
  case 21: // Delete faction hit
    check_authorization();
    delete_factionhit();
    header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid");
    exit;
  case 22: // Edit merchant id
    check_authorization();
    $body = new Template("templates/npc/merchantid.edit.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    $body->set('merchant_id', get_merchant_id());
    $body->set('suggested_id', suggest_merchant_id());
    break;
  case 23: // Update merchant id
    check_authorization();
    update_merchant_id();
    header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid");
    exit;
  case 24: // Delete npc
    check_authorization();
    delete_npc();
    header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid");
    exit;
  case 25: // Add npc
    check_authorization();
    $javascript = new Template("templates/npc/js.tmpl.php");
    $body = new Template("templates/npc/npc.add.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('suggestedid', suggest_npcid());
    $body->set('genders', $genders);
    $body->set('factions', $factions);
    $body->set('yesno', $yesno);
    $body->set('skilltypes', $skilltypes);
    $body->set('bodytypes', $bodytypes);
    $body->set('races', $races);
    $body->set('classes', $classes);
    $body->set('specialattacks', $specialattacks);
    $body->set('max_special_ability', $max_special_ability);
    $vars = get_stats();
	
    if ($vars) {
      foreach ($vars as $key=>$value) {
        $body->set($key, $value);
      }
    }
    break;
  case 26: // Insert npc
    check_authorization();
    add_npc();
    if (isset($_POST['pet']) && $_POST['pet'] == 1) {
      add_pet();
    }
    $npcid = $_POST['id'];
    header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid");
    exit;
  case 27: // Search npcs
    //check_authorization();
    $body = new Template("templates/npc/npc.searchresults.tmpl.php");
    if (isset($_GET['npc_id']) && $_GET['npc_id'] != "ID") {
      $results = search_npc_by_id();
    }
    else {
      $results = search_npcs();
    }
    $body->set("results", $results);
    break;
  case 28: // Copy npc
    check_authorization();
    copy_npc();
    $npcid = $_POST['id'];
    header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid");
    exit;
  case 33: // Edit Tint id
    check_authorization();
    $body = new Template("templates/npc/dyetemplate.edit.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    $tint = tint_info();
    if ($tint) {
      foreach ($tint as $key=>$value) {
        $body->set($key, $value);
      }
    }
    break;
  case 34: // Update Tint id
    check_authorization();
    update_tint();
    header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid");
    exit;
  case 35: // Add Tint id
    check_authorization();
    $body = new Template("templates/npc/dyetemplate.add.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    $body->set('suggested_id', suggest_dye_template());
    break;
  case 36: // Update Tint id
    check_authorization();
    add_dye_template();
    header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid");
    exit;
  case 37: // Delete Tint
    check_authorization();
    delete_tint();
    header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid");
    exit;
  case 38: // Search npc_faction_ids
    check_authorization();
    $body = new Template("templates/npc/factionprimary.search.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    $body->set('npc_faction_id', get_npc_faction_id());
    break;
  case 39: // Search results for npc_faction_ids
    check_authorization();
    $body = new Template("templates/npc/factionprimary.searchresults.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    $body->set('results', search_npc_faction_ids_primary($_POST['search']));
    $body->set('npc_faction_id', get_npc_faction_id());
    break;
  case 40: // Get next ID
    check_authorization();
    $body = new Template("templates/npc/nextid.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    $body->set('zoneids', $zoneids);
    $body->set('zoneid', getZoneID($z));
    break;
  case 41: // Get next ID
    check_authorization();
    $body = new Template("templates/npc/nextid.result.tmpl.php");
    $body->set('next_npcid', next_npcid());
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    break;
   case 42: // Add npc by level
    check_authorization();
    $body = new Template("templates/npc/npc.addbylevel.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    break;
  case 43: // Change NPC level
    check_authorization();
    $body = new Template("templates/npc/npc.changelevel.tmpl.php");
    $body->set('npcid', $npcid);
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    break;
  case 44: // Edit NPC Level
    check_authorization();
    $body = new Template("templates/npc/npc.editlevel.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    $body->set('npc_name', getNPCName($npcid));
    $body->set('genders', $genders);
    $body->set('factions', $factions);
    $body->set('yesno', $yesno);
    $body->set('skilltypes', $skilltypes);
    $body->set('bodytypes', $bodytypes);
    $body->set('races', $races);
    $body->set('classes', $classes);
    $body->set('specialattacks', $specialattacks);
    $body->set('faction_values', $faction_values);
    $body->set('pet', get_ispet());
    $body->set('max_special_ability', $max_special_ability);
    $vars = npc_info();
    if ($vars) {
      foreach ($vars as $key=>$value) {
        $body->set($key, $value);
      }
    }
    $vars_ = get_stats();
    if ($vars_) {
      foreach ($vars_ as $key=>$value) {
        $body->set($key, $value);
      }
    }
    break;
 case 45: // Change NPC level
    check_authorization();
    $body = new Template("templates/npc/npc.changelevelver.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    break;
  case 46: // Change NPC level
    check_authorization();
    change_npc_level_ver();
    header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid");
    exit;
  case 47: // Mass change faction
    check_authorization();
    $body = new Template("templates/npc/npc.factionchange.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    $body->set('npcfid', $_GET['npcfid']);
    break;
  case 48:
    check_authorization();
    $body = new Template("templates/npc/factionid.changebyname.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    $body->set('npcfid', $_GET['npcfid']);
    break;
  case 49:
    check_authorization();
    $body = new Template("templates/npc/factionid.changebyrace.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    $body->set('races', $races);
    $body->set('npcfid', $_GET['npcfid']);
    break;
  case 50: // Change faction by NPC Name
    check_authorization();
    change_faction_byname();
    header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid");
    exit;
  case 51: // Change faction by NPC Race
    check_authorization();
    change_faction_byrace();
    header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid");
    exit;
  case 52:
    check_authorization();
    $body = new Template("templates/npc/npc.changestats.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    $body->set('races', $races);
    $body->set('classes', $classes);
    $body->set('npctier', $npctier);
    $body->set('npctype', $npctype);
    $body->set('npcclass', $npcclass);
    $body->set('npcchange', $npcchange);
    $body->set('npcstatchange', $npcstatchange);
    break;
  case 53: // Change NPC by tier
    check_authorization();
    update_npc_bytier();
    header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid");
    exit;
  case 54: // Add a new pet
    check_authorization();
    $body = new Template("templates/npc/npc.add.pet.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    $body->set('pet_naming', $pet_naming);
    $body->set('pet_control', $pet_control);
    break;
  case 55: // Add new pet
    check_authorization();
    add_new_pet();
    header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid");
    exit;
  case 56: // Get pet data
     $body = new Template("templates/npc/npc.pet.tmpl.php");
     $body->set('currzone', $z);
     $body->set('currzoneid', $zoneid);
     $body->set('npcid', $npcid);
     $body->set('pet_naming', $pet_naming);
     $body->set('pet_control', $pet_control);
     $body->set('yesno', $yesno);
     $pet = get_pet();
     $equipment = get_pets_equipmentset_entries();
     if ($pet) {
        foreach ($pet as $key=>$value) {
          $body->set($key, $value);
        }
      }
      if ($equipment) {
        foreach ($equipment as $key=>$value) {
          $body->set($key, $value);
        }
      }
     break;
   case 57: // Delete pet
    check_authorization();
    delete_pet();
    header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid");
    exit;
  case 58: // Edit pet data
     check_authorization();
     $body = new Template("templates/npc/npc.edit.pet.tmpl.php");
     $body->set('currzone', $z);
     $body->set('currzoneid', $zoneid);
     $body->set('npcid', $npcid);
     $body->set('pet_naming', $pet_naming);
     $body->set('pet_control', $pet_control);
     $body->set('yesno', $yesno);
     $pet = get_pet_entry();
     if ($pet) {
        foreach ($pet as $key=>$value) {
          $body->set($key, $value);
        }
     }
     break;
  case 59: // Update Pet
    check_authorization();
    edit_pet();
    header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid&action=56");
    exit;
  case 60: // Add equipmentset
     check_authorization();
     $body = new Template("templates/npc/npc.add.equipmentset.tmpl.php");
     $body->set('currzone', $z);
     $body->set('currzoneid', $zoneid);
     $body->set('npcid', $npcid);
     $body->set('suggested_id', suggest_equipmentset_id());
     break;
  case 61: // Add equipmentset
    check_authorization();
    add_equipmentset();
    header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid&action=56");
    exit;
  case 62: // Delete equipmentset
    check_authorization();
    delete_equipmentset();
    header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid&action=56");
    exit;
  case 63: // Remove equipmentset
    check_authorization();
    remove_equipmentset();
    header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid&action=56");
    exit;
  case 64: // Edit equipmentset
     check_authorization();
     $body = new Template("templates/npc/npc.edit.equipmentset.tmpl.php");
     $body->set('currzone', $z);
     $body->set('currzoneid', $zoneid);
     $body->set('npcid', $npcid);
     $equipmentset = get_equipmentset();
     if ($equipmentset) {
        foreach ($equipmentset as $key=>$value) {
          $body->set($key, $value);
        }
      }
     break;
  case 65: // Edit equipmentset
    check_authorization();
    edit_equipmentset();
    header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid&action=56");
    exit;
  case 66: // Add equipmentset entry
     check_authorization();
     $body = new Template("templates/npc/npc.add.equipmentset_entry.tmpl.php");
     $javascript = new Template("templates/iframes/js.tmpl.php");
     $body->set('currzone', $z);
     $body->set('currzoneid', $zoneid);
     $body->set('npcid', $npcid);
     $body->set('suggested_id', suggest_equipmentset_slot_id());
     $body->set('set_id', $set_id = $_GET['set_id']);
     break;
  case 67: // Add equipmentset entry
    check_authorization();
    add_equipmentset_entry();
    header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid&action=56");
    exit;
  case 68: // Remove equipmentset entry
    check_authorization();
    delete_equipmentset_entry();
    header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid&action=56");
    exit;
  case 69: // Edit equipmentset entry
     check_authorization();
     $body = new Template("templates/npc/npc.edit.equipmentset_entry.tmpl.php");
     $javascript = new Template("templates/iframes/js.tmpl.php");
     $body->set('currzone', $z);
     $body->set('currzoneid', $zoneid);
     $body->set('npcid', $npcid);
     $equipmentset = get_equipmentset_entry();
     if ($equipmentset) {
        foreach ($equipmentset as $key=>$value) {
          $body->set($key, $value);
        }
      }
     break;
  case 70: // Edit equipmentset entry
    check_authorization();
    edit_equipmentset_entry();
    header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid&action=56");
    exit;
  case 71: // Quest redirect
    check_authorization();
    header("Location: index.php?editor=quest&z=$z&zoneid=$zoneid&npcid=$npcid");
    exit;
  case 72: // View emote set
    $breadcrumbs .= " >> Emote Set (" . $_GET['emoteid'] . ")";
	$pagetitle .= " - Emote Set (" . $_GET['emoteid'] . ")";
    $body = new Template("templates/npc/emotes.set.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    $body->set('eventtype', $eventtype);
    $body->set('emotetype', $emotetype);
    $body->set('emoteid', $_GET['emoteid']);
    $emotes = get_emotes();
    if ($emotes) {
      foreach ($emotes as $key=>$value) {
        $body->set($key, $value);
      }
    }
    break;
  case 73: // Delete emote
    check_authorization();
    $count = delete_emote();
    $emoteid = $_GET['emoteid'];
    if($count > 0) {
      header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid&emoteid=$count&action=72");
    }
    else {
      header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid&action=78");
    }
    exit;
  case 74: // Edit emote
    check_authorization();
    $breadcrumbs .= " >> <a href='index.php?editor=npc&action=78'>Emotes</a>" . " >> Edit Emote (" . $_GET['id'] . ")";
	$pagetitle .= " - Emotes - Edit Emote (" . $_GET['id'] . ")";
    $body = new Template("templates/npc/emotes.edit.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    $body->set('eventtype', $eventtype);
    $body->set('emotetype', $emotetype);
    $emote_info = emote_info();
    if ($emote_info) {
      foreach ($emote_info as $key=>$value) {
        $body->set($key, $value);
      }
    }
    break;
  case 75: // Update emote
    check_authorization();
    $emoteid = update_emote();
    $nnpcid = get_npcid_from_emote($emoteid);
    if($nnpcid == 0){
      $nnpcid = $npcid;
    }
    header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$nnpcid&emoteid=$emoteid&action=72");
    exit;
  case 76: // Add emote
    check_authorization();
    $breadcrumbs .= " >> <a href='index.php?editor=npc&action=78'>Emotes</a>" . " >> Add Emote";
	$pagetitle .= " - Emotes - Add Emote";
    if ($npcid) {
      $body = new Template("templates/npc/emotes.add.tmpl.php");
    }
    else {
      $body = new Template("templates/npc/emotes.addentry.tmpl.php");
    }
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    $body->set('eventtype', $eventtype);
    $body->set('emotetype', $emotetype);
    $emoteid = 0;
    if($_GET['emoteid'] != 0) {
      $emoteid = $_GET['emoteid'];
    }
    else {
      $emoteid = suggest_emoteid();
    }
    $body->set('emoteid', $emoteid);
    break;
  case 77: // Insert emote
    check_authorization();
    add_emote();
    $emoteid = $_POST['emoteid'];
    header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid&emoteid=$emoteid&action=72");
    exit;
  case 78: // View emote list
    $breadcrumbs .= " >> <a href='index.php?editor=npc&action=78'>Emotes</a>";
	$pagetitle .= " - Emotes";
    $curr_page = (isset($_GET['page'])) ? $_GET['page'] : $default_page;
    $curr_size = (isset($_GET['size'])) ? $_GET['size'] : $default_size;
    $curr_sort = (isset($_GET['sort'])) ? $columns[$_GET['sort']] : $columns[$default_sort];
    if ($_GET['filter'] == 'on') {
      $filter = build_filter();
    }
    $body = new Template("templates/npc/emotes.list.tmpl.php");
    $page_stats = getPageInfo("npc_emotes", $curr_page, $curr_size, $_GET['sort'], $filter['sql']);
    if ($filter) {
      $body->set('filter', $filter);
    }
    if ($page_stats['page']) {
      $emotes = list_emotes($page_stats['page'], $curr_size, $curr_sort, $filter['sql']);
    }
    if ($emotes) {
      $body->set('emotes', $emotes);
      foreach ($page_stats as $key=>$value) {
        $body->set($key, $value);
      }
    }
    else {
      $body->set('page', 0);
      $body->set('pages', 0);
    }
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    $body->set('eventtype', $eventtype);
    $body->set('emotetype', $emotetype);
    break;
  case 79: //View NPCs using emote set
    $breadcrumbs .= " >> <a href='index.php?editor=npc&action=78'>Emotes</a>" . " >> NPC List";
	$pagetitle .= " - Emotes - NPC List";
    $body = new Template("templates/npc/emotes.npcsbyemote.tmpl.php");
    $body->set('emoteid', $_GET['emoteid']);
    $npclist = getNPCsByEmote();
    if ($npclist) {
      $body->set('npclist', $npclist);
    }
    break;
  case 80: // Add emote method
    check_authorization();
    if ($_POST['method'] == 1) {
      header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid&emoteid=0&action=81");
    }
    if ($_POST['method'] == 2) {
      $emoteid = $_POST['emoteid'];
      setExistingEmote($npcid, $emoteid);
      header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid&emoteid=$emoteid&action=72");
    }
    exit;
  case 81: // Create new emote
    check_authorization();
    $breadcrumbs .= " >> <a href='index.php?editor=npc&action=78'>Emotes</a>" . " >> Add Emote";
	$pagetitle .= " - Emotes - Add Emote";
    $body = new Template("templates/npc/emotes.addentry.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    $body->set('eventtype', $eventtype);
    $body->set('emotetype', $emotetype);
    $emoteid = 0;
    if($_GET['emoteid'] != 0) {
      $emoteid = $_GET['emoteid'];
    }
    else {
      $emoteid = suggest_emoteid();
    }
    $body->set('emoteid', $emoteid);
    break;
  case 82: // Drop emote set from NPC
    check_authorization();
    setExistingEmote($npcid, 0);
    header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid");
    exit;
   case 83: // Change faction order
    check_authorization();
    move_factionhit();
    header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid");
    exit;
   case 84: // Change faction order down
    check_authorization();
    move_down_factionhit();
    header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid");
    exit;
   case 85: // Mess edit options
    check_authorization();
    $body = new Template("templates/npc/npc.stats.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    break;
   case 86:
    check_authorization();
    $body = new Template("templates/npc/npc.massstats.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    $body->set('races', $races);
    $body->set('classes', $classes);
    $body->set('bodytypes', $bodytypes);
    $body->set('npcfields', $npcfields);
    $body->set('valueadjust', $valueadjust);
    break;
    case 87: // Mass update NPCs
    check_authorization();
    mass_update_npcs();
    header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid");
    exit;
    case 88: // Change Special Abilites
    check_authorization();
    $body = new Template("templates/npc/npc.specialabilities.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    $body->set('races', $races);
    $body->set('classes', $classes);
    $body->set('bodytypes', $bodytypes);
    $body->set('specialattacks', $specialattacks);
    $body->set('satype', $satype);
    $body->set('custom', get_special_ability());
    $body->set('valueadjust', $valueadjust);
    break;
  case 89:  // Special Ability script
    check_authorization();
    change_special_abilitities();
    header("Location: index.php?editor=npc&z=$z&zoneid=$zoneid&npcid=$npcid");
    exit;
  case 90: // Add emote entry
    check_authorization();
    $breadcrumbs .= " >> <a href='index.php?editor=npc&action=78'>Emotes</a>" . " >> Add Emote";
	$pagetitle .= " - Emotes - Add Emote";
    $body = new Template("templates/npc/emotes.addentry.tmpl.php");
    $body->set('currzone', $z);
    $body->set('currzoneid', $zoneid);
    $body->set('npcid', $npcid);
    $body->set('eventtype', $eventtype);
    $body->set('emotetype', $emotetype);
    $emoteid = 0;
    if($_GET['emoteid'] != 0) {
      $emoteid = $_GET['emoteid'];
    }
    else {
      $emoteid = suggest_emoteid();
    }
    $body->set('emoteid', $emoteid);
    break;
}

function npc_info (): array {
  global $database, $npcid;

  $result = $database->fetchAssoc("SELECT * FROM npc_types WHERE id = ?", [$npcid], 'i');
  
  // to prevent some 'Notice' warnings; all variables need initialization, really
  if (!$result) {
      $result = array(
          "notfound" => true,
          "id" => '',
          "name" => '',
          "lastname" => '',
          "npc_faction_id" => 0,
          "see_invis" => 0,
          "see_invis_undead" => 0,
          "see_sneak" => 0,
          "see_improved_hide" => 0
      );
  }
  
  $factionid = $result['npc_faction_id'];

  $result['factionname'] = '';
  $result['primaryfaction'] = '';
  $result['primaryfactionname'] = '';
  $result['faction_hits'] = '';


  if ($factionid != 0) {
    $result2 = $database->fetchAssoc("SELECT * FROM npc_faction WHERE id = ?", [$factionid], 'i');

    $result['factionname'] = $result2['name'];
    $result['primaryfaction'] = $result2['primaryfaction'];
    $result['primaryfactionname'] = get_faction_name($result2['primaryfaction']);

    $result3 = $database->fetchAll(
        "SELECT * FROM npc_faction_entries WHERE npc_faction_id = ? ORDER BY sort_order", [$factionid], 'i'
    );

    $result['faction_hits'] = $result3;
  }

  return $result;
}

function get_ispet () {
  global $database, $npcid;

  $result = $database->fetchAssoc("SELECT COUNT(*) FROM pets WHERE npcID = ?", [$npcid], 'i');

  return $result['count(*)'];
}

function get_pet (): array {
  global $database, $npcid;

  $result = $database->fetchAssoc("SELECT * FROM pets WHERE npcID = ?", [$npcid], 'i');

  $equipmentset = $result['equipmentset'];

  $result2 = $database->fetchAssoc("SELECT * FROM pets_equipmentset WHERE set_id = ?", [$equipmentset], 'i');

  $result['set_id'] = $result2['set_id'];
  $result['setname'] = $result2['setname'];
  $result['nested_set'] = $result2['nested_set'];

  return $result;
}

function get_pets_equipmentset_entries(): array {
  global $database, $npcid;
  $array = array();

  $result = $database->fetchAssoc("SELECT equipmentset FROM pets WHERE npcID = ?", [$npcid], 'i');

  $equipmentset = $result['equipmentset'];

  $result = $database->fetchAll(
      "SELECT * FROM pets_equipmentset_entries WHERE set_id = ?", [$equipmentset], 'i'
  );

  if ($result) {
    foreach ($result as $result) {
        $array['equipment'][$result['slot']] = array("slot"=>$result['slot'], "item_id"=>$result['item_id']);
    }
  }
  return $array;
}

function get_equipmentset(): ?array {
  global $database, $npcid;

  $result = $database->fetchAssoc("SELECT equipmentset FROM pets WHERE npcID = ?", [$npcid], 'i');

  $equipmentset = $result['equipmentset'];

  return $database->fetchAssoc("SELECT * FROM pets_equipmentset WHERE set_id = ?", [$equipmentset], 'i');
}

function get_equipmentset_entry(): ?array {
  global $database;

  $set_id = $_GET['set_id'];
  $slot = $_GET['slot'];

  return $database->fetchAssoc(
      "SELECT * FROM pets_equipmentset_entries WHERE set_id = ? AND slot = ?", [$set_id, $slot], 'ii'
  );
}

function get_pet_entry(): ?array {
  global $database, $npcid;

  return $database->fetchAssoc("SELECT * FROM pets WHERE npcID = ?", [$npcid], 'i');
}

function update_pet(): void {
  check_authorization();
  global $database, $npcid;

  $name = $_POST['name'];

  $result = $database->fetchAssoc("SELECT count(*) FROM pets WHERE npcID = ?", [$npcid], 'i');

  $count = $result['count(*)'];

  if($count == 0)
  {
      $database->executeQuery("REPLACE INTO pets SET npcID = ?, type = ?", [$npcid, $name], 'is');
  }
}

function add_pet(): void {
  check_authorization();
  global $database;

  $name = $_POST['name'];
  $npcid = $_POST['id'];

  $database->executeQuery(
      "INSERT INTO pets SET npcID = ?, type = ?, petcontrol = 2, petnaming = 3", [$npcid, $name], 'is'
  );
}

function add_new_pet(): void {
  check_authorization();
  global $database;

  $npcid = $_POST['id'];
  $type = $_POST['type'];
  $petcontrol = $_POST['petcontrol'];
  $petnaming = $_POST['petnaming'];
  $petpower = $_POST['petpower'];
  $equipmentset = $_POST['equipmentset'];
  $monsterflag = $_POST['monsterflag'];
  $temp = $_POST['temp'];

  $database->executeQuery(
      "INSERT INTO pets SET npcID = ?, type = ?, petcontrol = ?, petnaming = ?, petpower = ?, equipmentset = ?, monsterflag = ?, temp = ?",
      [$npcid, $type, $petcontrol, $petnaming, $petpower, $equipmentset, $monsterflag, $temp],
      'isiiiiii'
  );
}

function edit_pet(): void {
  check_authorization();
  global $database, $npcid;

  $type = $_POST['type'];
  $petpower = $_POST['petpower'];
  $petcontrol = $_POST['petcontrol'];
  $petnaming = $_POST['petnaming'];
  $equipmentset = $_POST['equipmentset'];
  $monsterflag = $_POST['monsterflag'];
  $temp = $_POST['temp'];

  $database->executeQuery(
      "UPDATE pets SET type = ?, petcontrol = ?, petnaming = ?, petpower = ?, equipmentset = ?, monsterflag = ?, temp = ? WHERE npcID = ?",
      [$type, $petcontrol, $petnaming, $petpower, $equipmentset, $monsterflag, $temp, $npcid],
    'siiiiiii'
  );
}

function delete_pet(): void {
  check_authorization();
  global $database, $npcid;

  $database->executeQuery("DELETE FROM pets WHERE npcID = ?", [$npcid], 'i');
}

function add_equipmentset(): void {
  check_authorization();
  global $database, $npcid;

  $set_id = $_POST['set_id'];
  $setname = $_POST['setname'];
  $nested_set = $_POST['nested_set'];

  $database->executeQuery(
      "INSERT INTO pets_equipmentset SET set_id = ?, setname = ?, nested_set = ?",
      [$set_id, $setname, $nested_set],
      'isi'
  );

  $database->executeQuery(
      "UPDATE pets SET equipmentset = ? WHERE npcID = ?",
      [$set_id, $npcid],
      'ii');
}

function add_equipmentset_entry(): void {
  check_authorization();
  global $database;

  $set_id = $_POST['set_id'];
  $slot = $_POST['slot'];
  $item_id = $_POST['item_id'];

  $database->executeQuery(
      "INSERT INTO pets_equipmentset_entries SET set_id = ?, slot = ?, item_id = ?",
      [$set_id, $slot, $item_id],
    'iii'
  );
}

function edit_equipmentset(): void {
  check_authorization();
  global $database, $npcid;

  $set_id = $_POST['set_id'];
  $setname = $_POST['setname'];
  $nested_set = $_POST['nested_set'];

  $database->executeQuery(
      "UPDATE pets_equipmentset SET set_id = ?, setname = ?, nested_set = ?",
      [$set_id, $setname, $nested_set],
      'isi'
  );

  $database->executeQuery(
      "UPDATE pets SET equipmentset = ? WHERE npcID = ?",
      [$set_id, $npcid],
      'ii'
  );
}

function edit_equipmentset_entry(): void {
  check_authorization();
  global $database;

  $set_id = $_POST['set_id'];
  $slot = $_POST['slot'];
  $item_id = $_POST['item_id'];

  $database->executeQuery(
      "UPDATE pets_equipmentset_entries SET slot = ?, item_id = ? WHERE set_id = ?",
      [$slot, $item_id, $set_id],
      'iii'
  );
}

function suggest_equipmentset_id() {
  global $database;
  $result = $database->fetchAssoc("SELECT MAX(set_id) as id FROM pets_equipmentset", [], '');
  return ($result['id'] + 1);
}

function suggest_equipmentset_slot_id() {
 global $database;

  $set_id = $_GET['set_id'];

  $result = $database->fetchAssoc(
      "SELECT MAX(slot) as id FROM pets_equipmentset_entries WHERE set_id = ?",
      [$set_id],
      'i'
  );
  return ($result['id'] + 1);
}

function delete_equipmentset(): void {
  check_authorization();
  global $database, $npcid;

  $set_id = $_GET['set_id'];

  $database->executeQuery(
      "DELETE FROM pets_equipmentset WHERE set_id = ?",
      [$set_id],
      'i'
  );

  $database->executeQuery(
      "DELETE FROM pets_equipmentset_entries WHERE set_id = ?",
      [$set_id],
      'i'
  );

  $database->executeQuery(
      "UPDATE pets SET equipmentset = 0 WHERE npcID = ?",
      [$npcid],
      'i'
  );
}

function delete_equipmentset_entry(): void {
  check_authorization();
  global $database;

  $set_id = $_GET['set_id'];
  $slot = $_GET['slot'];

  $database->executeQuery(
      "DELETE FROM pets_equipmentset_entries WHERE set_id = ? AND slot = ?",
      [$set_id, $slot],
      'ii'
  );
}

function remove_equipmentset(): void {
  check_authorization();
  global $database, $npcid;

  $database->executeQuery(
      "UPDATE pets SET equipmentset = 0 WHERE npcID = ?",
      [$npcid],
      'i'
  );
}

function update_npc(): void {
  check_authorization();
  global $database, $npcid, $specialattacks;

  $oldstats = npc_info();
  extract($oldstats);

  // Define checkbox fields:
  if (!isset($_POST['qglobal'])) $_POST['qglobal'] = 0;
  if (!isset($_POST['npc_aggro'])) $_POST['npc_aggro'] = 0;
  if (!isset($_POST['pet'])) $_POST['pet'] = 0;
  if (!isset($_POST['private_corpse'])) $_POST['private_corpse'] = 0;
  if (!isset($_POST['unique_spawn_by_name'])) $_POST['unique_spawn_by_name'] = 0;
  if (!isset($_POST['underwater'])) $_POST['underwater'] = 0;
  if (!isset($_POST['isquest'])) $_POST['isquest'] = 0;
  if (!isset($_POST['ignore_despawn'])) $_POST['ignore_despawn'] = 0;
  if (!isset($_POST['aggro_pc'])) $_POST['aggro_pc'] = 0;
  if (!isset($_POST['raid_target'])) $_POST['raid_target'] = 0;
  if (!isset($_POST['skip_global_loot'])) $_POST['skip_global_loot'] = 0;
  if (!isset($_POST['rare_spawn'])) $_POST['rare_spawn'] = 0;

  // Check for special attacks change
  $new_specialattks = '';
  $flag = 0;
  foreach ($specialattacks as $k=>$v) {
    if (isset($_POST["$k"])) {
      if(SUBSTR($_POST["$k"], -1) != '^' && $_POST["$k"] != ''){$_POST["$k"].= '^';}
      $new_specialattks .= $_POST["$k"];
    }
  }
  if ($special_abilities != $new_specialattks) {
    $flag = 1;
  }

  $fields = '';
  if ($id != $_POST['id']) $fields .= "id=\"" . $_POST['id']. "\", ";
  if ($name != $_POST['name']) $fields .= "name=\"" . $_POST['name'] . "\", ";
  if ($lastname != $_POST['lastname']) $fields .= "lastname=\"" . $_POST['lastname'] . "\", ";
  if ($level != $_POST['level']) $fields .= "level=\"" . $_POST['level'] . "\", ";
  if ($race != $_POST['race']) $fields .= "race=\"" . $_POST['race'] . "\", ";
  if ($class != $_POST['class']) $fields .= "class=\"" . $_POST['class'] . "\", ";
  if ($bodytype != $_POST['bodytype']) $fields .= "bodytype=\"" . $_POST['bodytype'] . "\", ";
  if ($hp != $_POST['hp']) $fields .= "hp=\"" . $_POST['hp'] . "\", ";
  if ($mana != $_POST['mana']) $fields .= "mana=\"" . $_POST['mana'] . "\", ";
  if ($gender != $_POST['gender']) $fields .= "gender=\"" . $_POST['gender'] . "\", ";
  if ($texture != $_POST['texture']) $fields .= "texture=\"" . $_POST['texture'] . "\", ";
  if ($helmtexture != $_POST['helmtexture']) $fields .= "helmtexture=\"" . $_POST['helmtexture'] . "\", ";
  if ($armtexture != $_POST['armtexture']) $fields .= "armtexture=\"" . $_POST['armtexture'] . "\", ";
  if ($bracertexture != $_POST['bracertexture']) $fields .= "bracertexture=\"" . $_POST['bracertexture'] . "\", ";
  if ($handtexture != $_POST['handtexture']) $fields .= "handtexture=\"" . $_POST['handtexture'] . "\", ";
  if ($legtexture != $_POST['legtexture']) $fields .= "legtexture=\"" . $_POST['legtexture'] . "\", ";
  if ($feettexture != $_POST['feettexture']) $fields .= "feettexture=\"" . $_POST['feettexture'] . "\", ";
  if ($chesttexture != $_POST['chesttexture']) $fields .= "chesttexture=\"" . $_POST['chesttexture'] . "\", ";

  if ($size != $_POST['size']) $fields .= "size=\"" . $_POST['size'] . "\", ";
  if ($hp_regen_rate != $_POST['hp_regen_rate']) $fields .= "hp_regen_rate=\"" . $_POST['hp_regen_rate'] . "\", ";
  if ($mana_regen_rate != $_POST['mana_regen_rate']) $fields .= "mana_regen_rate=\"" . $_POST['mana_regen_rate'] . "\", ";
  if ($combat_hp_regen != $_POST['combat_hp_regen']) $fields .= "combat_hp_regen=\"" . $_POST['combat_hp_regen'] . "\", ";
  if ($combat_mana_regen != $_POST['combat_mana_regen']) $fields .= "combat_mana_regen=\"" . $_POST['combat_mana_regen'] . "\", ";

  if ($loottable_id != $_POST['loottable_id']) $fields .= "loottable_id=\"" . $_POST['loottable_id'] . "\", ";
  //merchant_id
  if ($npc_spells_id != $_POST['npc_spells_id']) $fields .= "npc_spells_id=\"" . $_POST['npc_spells_id'] . "\", ";
  if ($npc_spells_id != $_POST['npc_spells_effects_id']) $fields .= "npc_spells_effects_id=\"" . $_POST['npc_spells_effects_id'] . "\", ";
  if ($npc_faction_id != $_POST['npc_faction_id']) $fields .= "npc_faction_id=\"" . $_POST['npc_faction_id'] . "\", ";
  if ($mindmg != $_POST['mindmg']) $fields .= "mindmg=\"" . $_POST['mindmg'] . "\", ";
  if ($maxdmg != $_POST['maxdmg']) $fields .= "maxdmg=\"" . $_POST['maxdmg'] . "\", ";
  if ($attack_count != $_POST['attack_count']) $fields .= "attack_count=\"" . $_POST['attack_count'] . "\", ";
  if ($flag == 1) $fields .= "special_abilities=\"$new_specialattks\", ";
  if ($aggroradius != $_POST['aggroradius']) $fields .= "aggroradius=\"" . $_POST['aggroradius'] . "\", ";
  if ($assistradius != $_POST['assistradius']) $fields .= "assistradius=\"" . $_POST['assistradius'] . "\", ";
  if ($face != $_POST['face']) $fields .= "face=\"" . $_POST['face'] . "\", ";
  if ($luclin_hairstyle != $_POST['luclin_hairstyle']) $fields .= "luclin_hairstyle=\"" . $_POST['luclin_hairstyle'] . "\", ";
  if ($luclin_haircolor != $_POST['luclin_haircolor']) $fields .= "luclin_haircolor=\"" . $_POST['luclin_haircolor'] . "\", ";
  if ($luclin_eyecolor != $_POST['luclin_eyecolor']) $fields .= "luclin_eyecolor=\"" . $_POST['luclin_eyecolor'] . "\", ";
  if ($luclin_eyecolor2 != $_POST['luclin_eyecolor2']) $fields .= "luclin_eyecolor2=\"" . $_POST['luclin_eyecolor2'] . "\", ";
  if ($luclin_beardcolor != $_POST['luclin_beardcolor']) $fields .= "luclin_beardcolor=\"" . $_POST['luclin_beardcolor'] . "\", ";
  if ($luclin_beard != $_POST['luclin_beard']) $fields .= "luclin_beard=\"" . $_POST['luclin_beard'] . "\", ";
  //armortint_id
  if ($armortint_red != $_POST['armortint_red']) $fields .= "armortint_red=\"" . $_POST['armortint_red'] . "\", ";
  if ($armortint_green != $_POST['armortint_green']) $fields .= "armortint_green=\"" . $_POST['armortint_green'] . "\", ";
  if ($armortint_blue != $_POST['armortint_blue']) $fields .= "armortint_blue=\"" . $_POST['armortint_blue'] . "\", ";
  if ($d_melee_texture1 != $_POST['d_melee_texture1']) $fields .= "d_melee_texture1=\"" . $_POST['d_melee_texture1'] . "\", ";
  if ($d_melee_texture2 != $_POST['d_melee_texture2']) $fields .= "d_melee_texture2=\"" . $_POST['d_melee_texture2'] . "\", ";
  if ($prim_melee_type != $_POST['prim_melee_type']) $fields .= "prim_melee_type=\"" . $_POST['prim_melee_type'] . "\", ";
  if ($sec_melee_type != $_POST['sec_melee_type']) $fields .= "sec_melee_type=\"" . $_POST['sec_melee_type'] . "\", ";
  if ($ranged_type != $_POST['ranged_type']) $fields .= "ranged_type=\"" . $_POST['ranged_type'] . "\", ";
  if ($runspeed != $_POST['runspeed']) $fields .= "runspeed=\"" . $_POST['runspeed'] . "\", ";
  if ($walkspeed != $_POST['walkspeed']) $fields .= "walkspeed=\"" . $_POST['walkspeed'] . "\", ";
  if ($exp_pct != $_POST['exp_pct']) $fields .= "exp_pct=\"" . $_POST['exp_pct'] . "\", ";
  if ($MR != $_POST['MR']) $fields .= "MR=\"" . $_POST['MR'] . "\", ";
  if ($CR != $_POST['CR']) $fields .= "CR=\"" . $_POST['CR'] . "\", ";
  if ($DR != $_POST['DR']) $fields .= "DR=\"" . $_POST['DR'] . "\", ";
  if ($FR != $_POST['FR']) $fields .= "FR=\"" . $_POST['FR'] . "\", ";
  if ($PR != $_POST['PR']) $fields .= "PR=\"" . $_POST['PR'] . "\", ";
  if ($see_invis != $_POST['see_invis']) $fields .= "see_invis=\"" . $_POST['see_invis'] . "\", ";
  if ($see_invis_undead != $_POST['see_invis_undead']) $fields .= "see_invis_undead=\"" . $_POST['see_invis_undead'] . "\", ";
  if ($qglobal != $_POST['qglobal']) $fields .= "qglobal=\"" . $_POST['qglobal'] . "\", ";
  if ($AC != $_POST['AC']) $fields .= "AC=\"" . $_POST['AC'] . "\", ";
  if ($npc_aggro != $_POST['npc_aggro']) $fields .= "npc_aggro=\"" . $_POST['npc_aggro'] . "\", ";
  if ($spawn_limit != $_POST['spawn_limit']) $fields .= "spawn_limit=\"" . $_POST['spawn_limit'] . "\", ";
  if ($attack_delay != $_POST['attack_delay']) $fields .= "attack_delay=\"" . $_POST['attack_delay'] . "\", ";
  if ($STR != $_POST['STR']) $fields .= "STR=\"" . $_POST['STR'] . "\", ";
  if ($STA != $_POST['STA']) $fields .= "STA=\"" . $_POST['STA'] . "\", ";
  if ($DEX != $_POST['DEX']) $fields .= "DEX=\"" . $_POST['DEX'] . "\", ";
  if ($AGI != $_POST['AGI']) $fields .= "AGI=\"" . $_POST['AGI'] . "\", ";
  if ($_INT != $_POST['_INT']) $fields .= "_INT=\"" . $_POST['_INT'] . "\", ";
  if ($WIS != $_POST['WIS']) $fields .= "WIS=\"" . $_POST['WIS'] . "\", ";
  if ($CHA != $_POST['CHA']) $fields .= "CHA=\"" . $_POST['CHA'] . "\", ";
  if ($see_sneak != $_POST['see_sneak']) $fields .= "see_sneak=\"" . $_POST['see_sneak'] . "\", ";
  if ($see_improved_hide != $_POST['see_improved_hide']) $fields .= "see_improved_hide=\"" . $_POST['see_improved_hide'] . "\", ";
  if ($ATK != $_POST['ATK']) $fields .= "ATK=\"" . $_POST['ATK'] . "\", ";
  if ($Accuracy != $_POST['Accuracy']) $fields .= "Accuracy=\"" . $_POST['Accuracy'] . "\", ";
  if ($avoidance != $_POST['avoidance']) $fields .= "avoidance=\"" . $_POST['avoidance'] . "\", ";
  if ($slow_mitigation != $_POST['slow_mitigation']) $fields .= "slow_mitigation=\"" . $_POST['slow_mitigation'] . "\", ";
  if ($maxlevel != $_POST['maxlevel']) $fields .= "maxlevel=\"" . $_POST['maxlevel'] . "\", ";
  if ($scalerate != $_POST['scalerate']) $fields .= "scalerate=\"" . $_POST['scalerate'] . "\", ";
  if ($private_corpse != $_POST['private_corpse']) $fields .= "private_corpse=\"" . $_POST['private_corpse'] . "\", ";
  if ($unique_spawn_by_name != $_POST['unique_spawn_by_name']) $fields .= "unique_spawn_by_name=\"" . $_POST['unique_spawn_by_name'] . "\", ";
  if ($underwater != $_POST['underwater']) $fields .= "underwater=\"" . $_POST['underwater'] . "\", ";
  if ($isquest != $_POST['isquest']) $fields .= "isquest=\"" . $_POST['isquest'] . "\", ";
  if ($emoteid != $_POST['emoteid']) $fields .= "emoteid=\"" . $_POST['emoteid'] . "\", ";
  if ($spellscale != $_POST['spellscale']) $fields .= "spellscale=\"" . $_POST['spellscale'] . "\", ";
  if ($healscale != $_POST['healscale']) $fields .= "healscale=\"" . $_POST['healscale'] . "\", ";
  if ($raid_target != $_POST['raid_target']) $fields .= "raid_target=\"" . $_POST['raid_target'] . "\", ";
  if ($light != $_POST['light']) $fields .= "light=\"" . $_POST['light'] . "\", ";
  if ($ignore_distance != $_POST['ignore_distance']) $fields .= "ignore_distance=\"" . $_POST['ignore_distance'] . "\", ";
  if ($ignore_despawn != $_POST['ignore_despawn']) $fields .= "ignore_despawn=\"" . $_POST['ignore_despawn'] . "\", ";
  if ($aggro_pc != $_POST['aggro_pc']) $fields .= "aggro_pc=\"" . $_POST['aggro_pc'] . "\", ";
  if ($greed != $_POST['greed']) $fields .= "greed=\"" . $_POST['greed'] . "\", ";
  if ($skip_global_loot != $_POST['skip_global_loot']) $fields .= "skip_global_loot=\"" . $_POST['skip_global_loot'] . "\", ";
  if ($rare_spawn != $_POST['rare_spawn']) $fields .= "rare_spawn=\"" . $_POST['rare_spawn'] . "\", ";

  $fields =  rtrim($fields, ", ");

  if ($fields != '') {
    $query = "UPDATE npc_types SET $fields WHERE id=$npcid";
     $mysql->query_no_result($query);
     $database->executeQuery(
         "UPDATE npc_types SET special_abilities = TRIM(TRAILING '^' FROM special_abilities)", [], ''
     );
  }
}

function add_npc () {
  check_authorization();
  global $mysql, $specialattacks;

  if (!isset($_POST['name']) || $_POST['name'] == '')
	  return;
  
  // Define checkbox fields:
  if ($_POST['qglobal'] != 1) $_POST['qglobal'] = 0;
  if ($_POST['npc_aggro'] != 1) $_POST['npc_aggro'] = 0;
  if ($_POST['private_corpse'] != 1) $_POST['private_corpse'] = 0;
  if ($_POST['unique_spawn_by_name'] != 1) $_POST['unique_spawn_by_name'] = 0;
  if ($_POST['underwater'] != 1) $_POST['underwater'] = 0;
  if ($_POST['isquest'] != 1) $_POST['isquest'] = 0;
  if ($_POST['ignore_despawn'] != 1) $_POST['ignore_despawn'] = 0;
  if ($_POST['aggro_pc'] != 1) $_POST['aggro_pc'] = 0;
  if ($_POST['pet'] != 1) $_POST['pet'] = 0;
  if ($_POST['raid_target'] != 1) $_POST['raid_target'] = 0;
  if (!isset($_POST['avoidance'])) $_POST['avoidance'] = 0;		// this needs a form entry
  if ($_POST['skip_global_loot'] != 1) $_POST['skip_global_loot'] = 0;
  if ($_POST['rare_spawn'] != 1) $_POST['rare_spawn'] = 0;

  foreach ($specialattacks as $k => $v) {
    if (isset($_POST["$k"])) {
    if(SUBSTR($_POST["$k"], -1) != '^' && $_POST["$k"] != ''){$_POST["$k"].= '^';}
      $special_abilities .= $_POST["$k"];
    }
  }

  $fields = "id=\"" . $_POST['id']. "\", ";
  $fields .= "name=\"" . $_POST['name'] . "\", ";
  $fields .= "lastname=\"" . $_POST['lastname'] . "\", ";
  $fields .= "level=\"" . $_POST['level'] . "\", ";
  $fields .= "race=\"" . $_POST['race'] . "\", ";
  $fields .= "class=\"" . $_POST['class'] . "\", ";
  $fields .= "bodytype=\"" . $_POST['bodytype'] . "\", ";
  $fields .= "hp=\"" . $_POST['hp'] . "\", ";
  $fields .= "mana=\"" . $_POST['mana'] . "\", ";
  $fields .= "gender=\"" . $_POST['gender'] . "\", ";
  $fields .= "texture=\"" . $_POST['texture'] . "\", ";
  $fields .= "helmtexture=\"" . $_POST['helmtexture'] . "\", ";
  $fields .= "armtexture=\"" . $_POST['armtexture'] . "\", ";
  $fields .= "bracertexture=\"" . $_POST['bracertexture'] . "\", ";
  $fields .= "handtexture=\"" . $_POST['handtexture'] . "\", ";
  $fields .= "legtexture=\"" . $_POST['legtexture'] . "\", ";
  $fields .= "feettexture=\"" . $_POST['feettexture'] . "\", ";
  $fields .= "chesttexture=\"" . $_POST['chesttexture'] . "\", ";

  $fields .= "size=\"" . $_POST['size'] . "\", ";
  $fields .= "hp_regen_rate=\"" . $_POST['hp_regen_rate'] . "\", ";
  $fields .= "mana_regen_rate=\"" . $_POST['mana_regen_rate'] . "\", ";
  $fields .= "combat_hp_regen=\"" . $_POST['combat_hp_regen'] . "\", ";
  $fields .= "combat_mana_regen=\"" . $_POST['combat_mana_regen'] . "\", ";
  $fields .= "loottable_id=\"" . $_POST['loottable_id'] . "\", ";
  //merchant_id
  $fields .= "npc_spells_id=\"" . $_POST['npc_spells_id'] . "\", ";
  $fields .= "npc_spells_effects_id=\"" . $_POST['npc_spells_effects_id'] . "\", ";
  $fields .= "npc_faction_id=\"" . $_POST['npc_faction_id'] . "\", ";
  $fields .= "mindmg=\"" . $_POST['mindmg'] . "\", ";
  $fields .= "maxdmg=\"" . $_POST['maxdmg'] . "\", ";
  $fields .= "attack_count=\"" . $_POST['attack_count'] . "\", ";
  $fields .= "special_abilities=\"$special_abilities\", ";
  $fields .= "aggroradius=\"" . $_POST['aggroradius'] . "\", ";
  $fields .= "assistradius=\"" . $_POST['assistradius'] . "\", ";
  $fields .= "face=\"" . $_POST['face'] . "\", ";
  $fields .= "luclin_hairstyle=\"" . $_POST['luclin_hairstyle'] . "\", ";
  $fields .= "luclin_haircolor=\"" . $_POST['luclin_haircolor'] . "\", ";
  $fields .= "luclin_eyecolor=\"" . $_POST['luclin_eyecolor'] . "\", ";
  $fields .= "luclin_eyecolor2=\"" . $_POST['luclin_eyecolor2'] . "\", ";
  $fields .= "luclin_beardcolor=\"" . $_POST['luclin_beardcolor'] . "\", ";
  $fields .= "luclin_beard=\"" . $_POST['luclin_beard'] . "\", ";
  //armortint_id
  $fields .= "armortint_red=\"" . $_POST['armortint_red'] . "\", ";
  $fields .= "armortint_green=\"" . $_POST['armortint_green'] . "\", ";
  $fields .= "armortint_blue=\"" . $_POST['armortint_blue'] . "\", ";
  $fields .= "d_melee_texture1=\"" . $_POST['d_melee_texture1'] . "\", ";
  $fields .= "d_melee_texture2=\"" . $_POST['d_melee_texture2'] . "\", ";
  $fields .= "prim_melee_type=\"" . $_POST['prim_melee_type'] . "\", ";
  $fields .= "sec_melee_type=\"" . $_POST['sec_melee_type'] . "\", ";
  $fields .= "ranged_type=\"" . $_POST['ranged_type'] . "\", ";
  $fields .= "runspeed=\"" . $_POST['runspeed'] . "\", ";
  $fields .= "walkspeed=\"" . $_POST['walkspeed'] . "\", ";
  $fields .= "exp_pct=\"" . $_POST['exp_pct'] . "\", ";
  $fields .= "MR=\"" . $_POST['MR'] . "\", ";
  $fields .= "CR=\"" . $_POST['CR'] . "\", ";
  $fields .= "DR=\"" . $_POST['DR'] . "\", ";
  $fields .= "FR=\"" . $_POST['FR'] . "\", ";
  $fields .= "PR=\"" . $_POST['PR'] . "\", ";
  $fields .= "see_invis=\"" . $_POST['see_invis'] . "\", ";
  $fields .= "see_invis_undead=\"" . $_POST['see_invis_undead'] . "\", ";
  $fields .= "qglobal=\"" . $_POST['qglobal'] . "\", ";
  $fields .= "AC=\"" . $_POST['AC'] . "\", ";
  $fields .= "npc_aggro=\"" . $_POST['npc_aggro'] . "\", ";
  $fields .= "spawn_limit=\"" . $_POST['spawn_limit'] . "\", ";
  $fields .= "attack_delay=\"" . $_POST['attack_delay'] . "\", ";
  $fields .= "STR=\"" . $_POST['STR'] . "\", ";
  $fields .= "STA=\"" . $_POST['STA'] . "\", ";
  $fields .= "DEX=\"" . $_POST['DEX'] . "\", ";
  $fields .= "AGI=\"" . $_POST['AGI'] . "\", ";
  $fields .= "_INT=\"" . $_POST['_INT'] . "\", ";
  $fields .= "WIS=\"" . $_POST['WIS'] . "\", ";
  $fields .= "CHA=\"" . $_POST['CHA'] . "\", ";
  $fields .= "see_sneak=\"" . $_POST['see_sneak'] . "\", ";
  $fields .= "see_improved_hide=\"" . $_POST['see_improved_hide'] . "\", ";
  $fields .= "ATK=\"" . $_POST['ATK'] . "\", ";
  $fields .= "Accuracy=\"" . $_POST['Accuracy'] . "\", ";
  $fields .= "avoidance=\"" . $_POST['avoidance'] . "\", ";
  $fields .= "slow_mitigation=\"" . $_POST['slow_mitigation'] . "\", ";
  $fields .= "maxlevel=\"" . $_POST['maxlevel'] . "\", ";
  $fields .= "scalerate=\"" . $_POST['scalerate'] . "\", ";
  $fields .= "private_corpse=\"" . $_POST['private_corpse'] . "\", ";
  $fields .= "unique_spawn_by_name=\"" . $_POST['unique_spawn_by_name'] . "\", ";
  $fields .= "underwater=\"" . $_POST['underwater'] . "\", ";
  $fields .= "isquest=\"" . $_POST['isquest'] . "\", ";
  $fields .= "emoteid=\"" . $_POST['emoteid'] . "\", ";
  $fields .= "spellscale=\"" . $_POST['spellscale'] . "\", ";
  $fields .= "healscale=\"" . $_POST['healscale'] . "\", ";
  $fields .= "raid_target=\"" . $_POST['raid_target'] . "\", ";
  $fields .= "light=\"" . $_POST['light'] . "\", ";
  $fields .= "ignore_distance=\"" . $_POST['ignore_distance'] . "\", ";
  $fields .= "ignore_despawn=\"" . $_POST['ignore_despawn'] . "\", ";
  $fields .= "aggro_pc=\"" . $_POST['aggro_pc'] . "\", ";
  $fields .= "greed=\"" . $_POST['greed'] . "\", ";
  $fields .= "skip_global_loot=\"" . $_POST['skip_global_loot'] . "\", ";
  $fields .= "rare_spawn=\"" .$_POST['rare_spawn'] . "\"";

  if ($fields != '') {
    $query = "INSERT INTO npc_types SET $fields";
    $query2 = "UPDATE npc_types SET special_abilities = TRIM(TRAILING '^' FROM special_abilities)";
     $mysql->query_no_result($query);
     $mysql->query_no_result($query2);
  }
}

function copy_npc () {
  check_authorization();
  global $mysql;

  $fields = '';
  $fields .= "id=\"" . $_POST['id']. "\", ";
  $fields .= "name=\"" . $_POST['name'] . " - Copy\", ";
  $fields .= "lastname=\"" . $_POST['lastname'] . "\", ";
  $fields .= "level=\"" . $_POST['level'] . "\", ";
  $fields .= "race=\"" . $_POST['race'] . "\", ";
  $fields .= "class=\"" . $_POST['class'] . "\", ";
  $fields .= "bodytype=\"" . $_POST['bodytype'] . "\", ";
  $fields .= "hp=\"" . $_POST['hp'] . "\", ";
  $fields .= "mana=\"" . $_POST['mana'] . "\", ";
  $fields .= "gender=\"" . $_POST['gender'] . "\", ";
  $fields .= "texture=\"" . $_POST['texture'] . "\", ";
  $fields .= "helmtexture=\"" . $_POST['helmtexture'] . "\", ";
  $fields .= "armtexture=\"" . $_POST['armtexture'] . "\", ";
  $fields .= "bracertexture=\"" . $_POST['bracertexture'] . "\", ";
  $fields .= "handtexture=\"" . $_POST['handtexture'] . "\", ";
  $fields .= "legtexture=\"" . $_POST['legtexture'] . "\", ";
  $fields .= "feettexture=\"" . $_POST['feettexture'] . "\", ";
  $fields .= "chesttexture=\"" . $_POST['chesttexture'] . "\", ";
  $fields .= "size=\"" . $_POST['size'] . "\", ";
  $fields .= "hp_regen_rate=\"" . $_POST['hp_regen_rate'] . "\", ";
  $fields .= "mana_regen_rate=\"" . $_POST['mana_regen_rate'] . "\", ";
  $fields .= "combat_hp_regen=\"" . $_POST['combat_hp_regen'] . "\", ";
  $fields .= "combat_mana_regen=\"" . $_POST['combat_mana_regen'] . "\", ";
  $fields .= "loottable_id=\"" . $_POST['loottable_id'] . "\", ";
  $fields .= "merchant_id=\"" . $_POST['merchant_id'] . "\", ";
  $fields .= "npc_spells_id=\"" . $_POST['npc_spells_id'] . "\", ";
  $fields .= "npc_spells_effects_id=\"" . $_POST['npc_spells_effects_id'] . "\", ";
  $fields .= "npc_faction_id=\"" . $_POST['npc_faction_id'] . "\", ";
  $fields .= "mindmg=\"" . $_POST['mindmg'] . "\", ";
  $fields .= "maxdmg=\"" . $_POST['maxdmg'] . "\", ";
  $fields .= "attack_count=\"" . $_POST['attack_count'] . "\", ";
  $fields .= "special_abilities=\"" . $_POST['special_abilities'] . "\", ";
  $fields .= "aggroradius=\"" . $_POST['aggroradius'] . "\", ";
  $fields .= "assistradius=\"" . $_POST['assistradius'] . "\", ";
  $fields .= "face=\"" . $_POST['face'] . "\", ";
  $fields .= "luclin_hairstyle=\"" . $_POST['luclin_hairstyle'] . "\", ";
  $fields .= "luclin_haircolor=\"" . $_POST['luclin_haircolor'] . "\", ";
  $fields .= "luclin_eyecolor=\"" . $_POST['luclin_eyecolor'] . "\", ";
  $fields .= "luclin_eyecolor2=\"" . $_POST['luclin_eyecolor2'] . "\", ";
  $fields .= "luclin_beardcolor=\"" . $_POST['luclin_beardcolor'] . "\", ";
  $fields .= "luclin_beard=\"" . $_POST['luclin_beard'] . "\", ";
  $fields .= "armortint_id=\"" . $_POST['armortint_id'] . "\", ";
  $fields .= "armortint_red=\"" . $_POST['armortint_red'] . "\", ";
  $fields .= "armortint_green=\"" . $_POST['armortint_green'] . "\", ";
  $fields .= "armortint_blue=\"" . $_POST['armortint_blue'] . "\", ";
  $fields .= "d_melee_texture1=\"" . $_POST['d_melee_texture1'] . "\", ";
  $fields .= "d_melee_texture2=\"" . $_POST['d_melee_texture2'] . "\", ";
  $fields .= "prim_melee_type=\"" . $_POST['prim_melee_type'] . "\", ";
  $fields .= "sec_melee_type=\"" . $_POST['sec_melee_type'] . "\", ";
  $fields .= "ranged_type=\"" . $_POST['ranged_type'] . "\", ";
  $fields .= "runspeed=\"" . $_POST['runspeed'] . "\", ";
  $fields .= "walkspeed=\"" . $_POST['walkspeed'] . "\", ";
  $fields .= "exp_pct=\"" . $_POST['exp_pct'] . "\", ";
  $fields .= "MR=\"" . $_POST['MR'] . "\", ";
  $fields .= "CR=\"" . $_POST['CR'] . "\", ";
  $fields .= "DR=\"" . $_POST['DR'] . "\", ";
  $fields .= "FR=\"" . $_POST['FR'] . "\", ";
  $fields .= "PR=\"" . $_POST['PR'] . "\", ";
  $fields .= "see_invis=\"" . $_POST['see_invis'] . "\", ";
  $fields .= "see_invis_undead=\"" . $_POST['see_invis_undead'] . "\", ";
  $fields .= "qglobal=\"" . $_POST['qglobal'] . "\", ";
  $fields .= "AC=\"" . $_POST['AC'] . "\", ";
  $fields .= "npc_aggro=\"" . $_POST['npc_aggro'] . "\", ";
  $fields .= "spawn_limit=\"" . $_POST['spawn_limit'] . "\", ";
  $fields .= "attack_delay=\"" . $_POST['attack_delay'] . "\", ";
  $fields .= "STR=\"" . $_POST['STR'] . "\", ";
  $fields .= "STA=\"" . $_POST['STA'] . "\", ";
  $fields .= "DEX=\"" . $_POST['DEX'] . "\", ";
  $fields .= "AGI=\"" . $_POST['AGI'] . "\", ";
  $fields .= "_INT=\"" . $_POST['_INT'] . "\", ";
  $fields .= "WIS=\"" . $_POST['WIS'] . "\", ";
  $fields .= "CHA=\"" . $_POST['CHA'] . "\", ";
  $fields .= "see_sneak=\"" . $_POST['see_sneak'] . "\", ";
  $fields .= "see_improved_hide=\"" . $_POST['see_improved_hide'] . "\", ";
  $fields .= "ATK=\"" . $_POST['ATK'] . "\", ";
  $fields .= "Accuracy=\"" . $_POST['Accuracy'] . "\", ";
  $fields .= "avoidance=\"" . $_POST['avoidance'] . "\", ";
  $fields .= "slow_mitigation=\"" . $_POST['slow_mitigation'] . "\", ";
  $fields .= "maxlevel=\"" . $_POST['maxlevel'] . "\", ";
  $fields .= "scalerate=\"" . $_POST['scalerate'] . "\", ";
  $fields .= "private_corpse=\"" . $_POST['private_corpse'] . "\", ";
  $fields .= "unique_spawn_by_name=\"" . $_POST['unique_spawn_by_name'] . "\", ";
  $fields .= "underwater=\"" . $_POST['underwater'] . "\", ";
  $fields .= "isquest=\"" . $_POST['isquest'] . "\", ";
  $fields .= "emoteid=\"" . $_POST['emoteid'] . "\", ";
  $fields .= "spellscale=\"" . $_POST['spellscale'] . "\", ";
  $fields .= "healscale=\"" . $_POST['healscale'] . "\", ";
  $fields .= "raid_target=\"" . $_POST['raid_target'] . "\", ";
  $fields .= "light=\"" . $_POST['light'] . "\", ";
  $fields .= "ignore_distance=\"" . $_POST['ignore_distance'] . "\", ";
  $fields .= "ignore_despawn=\"" . $_POST['ignore_despawn'] . "\", ";
  $fields .= "aggro_pc=\"" . $_POST['aggro_pc'] . "\", ";
  $fields .= "greed=\"" . $_POST['greed'] . "\", ";
  $fields .= "skip_global_loot=\"" . $_POST['skip_global_loot'] . "\", ";
  $fields .= "rare_spawn=\"" . $_POST['rare_spawn'] . "\"";
  $fields =  rtrim($fields, ", ");

  if ($fields != '') {
    $query = "INSERT INTO npc_types SET $fields";
    $query2 = "UPDATE npc_types SET special_abilities = TRIM(TRAILING '^' FROM special_abilities)";
     $mysql->query_no_result($query);
     $mysql->query_no_result($query2);
  }
}

function update_npc_bytier() {
  global $mysql, $z, $npcid;

  $zid = getZoneID($z);
  $min_id = $zid*1000-1;
  $max_id = $zid*1000+1000;
  $class = $_POST['class_selected'];
  $race = $_POST['race_selected'];
  $type = $_POST['npcchange_selected'];
  $name = $_POST['npcname'];
  $level = $_POST['npclevel'];
  $stat = $_POST['npcstatchange_selected'];

  if($race == 0){ $nrace = "race"; }
  if($race > 0){ $nrace = $race; }
  if($class == 0){ $nclass = "class"; }
  if($class > 0){ $nclass = $class; }
  if($name == ''){ $nname = "name"; }
  if($name != ''){ $nname = $name; }
  if($level == '' || $level == 0){ $nlevel = "level"; }
  if($level > 0){ $nlevel = $level; }

  $npctype = 0;
  if ($_POST['npctype_selected'] == 1) $npctype = 1.0;
  if ($_POST['npctype_selected'] == 2) $npctype = 1.1;
  if ($_POST['npctype_selected'] == 3) $npctype = 1.2;
  if ($_POST['npctype_selected'] == 4) $npctype = 1.35;

  $npcclass = 0;
  if ($_POST['npcclass_selected'] == 1) $npcclass = 1.0;
  if ($_POST['npcclass_selected'] == 2) $npcclass = 1.1;
  if ($_POST['npcclass_selected'] == 3) $npcclass = 1.2;
  if ($_POST['npcclass_selected'] == 4) $npcclass = 1.35;

  $npctier = 0;
  if ($_POST['npctier_selected'] == 1) $npctier = 1.0;
  if ($_POST['npctier_selected'] == 2) $npctier = 1.25;
  if ($_POST['npctier_selected'] == 3) $npctier = 1.75;
  if ($_POST['npctier_selected'] == 4) $npctier = 1.9;
  if ($_POST['npctier_selected'] == 5) $npctier = 2.0;
  if ($_POST['npctier_selected'] == 6) $npctier = 2.5;
  if ($_POST['npctier_selected'] == 7) $npctier = 2.75;
  if ($_POST['npctier_selected'] == 8) $npctier = 3.0;
  if ($_POST['npctier_selected'] == 9) $npctier = 3.15;

  if($stat == 1) {
    $ac_ = "((((level - 1) / 10.0) * 65.0) + 25.0) * ($npctier * $npctype)";
    $mresist = "MR";
    $cresist = "CR";
    $dresist = "DR";
    $presist = "PR";
    $fresist = "FR";
  }

  if($stat == 2) {
    $resist = "(80*0.4) * ($npctier * $npctype * $npcclass)";
    $mresist = $resist;
    $cresist = $resist;
    $dresist = $resist;
    $presist = $resist;
    $fresist = $resist;
    $ac_ = "AC";
  }

  if($stat == 3) {
    $ac_ = "((((level - 1) / 10.0) * 65.0) + 25.0) * ($npctier * $npctype)";
    $resist = "(80*0.4) * ($npctier * $npctype * $npcclass)";
    $mresist = $resist;
    $cresist = $resist;
    $dresist = $resist;
    $presist = $resist;
    $fresist = $resist;
  }

  if($type == 1) {
    $query = "UPDATE npc_types SET ac = $ac_, mr = $mresist, cr = $cresist, dr = $dresist, pr = $presist, fr = $fresist WHERE id=$npcid";
    $mysql->query_no_result($query);
  }

  if($type == 2) {
    $query = "SELECT name FROM npc_types WHERE id=$npcid";
    $result = $mysql->query_assoc($query);
    $nname = $result['name'];

    $query = "UPDATE npc_types SET ac = $ac_, mr = $mresist, cr = $cresist, dr = $dresist, pr = $presist, fr = $fresist WHERE name=\"$nname\" AND id > $min_id AND id < $max_id";
    $mysql->query_no_result($query);
  }

  if($type == 3) {
    $query = "SELECT race FROM npc_types WHERE id=$npcid";
    $result = $mysql->query_assoc($query);
    $nrace = $result['race'];

    $query = "UPDATE npc_types SET ac = $ac_, mr = $mresist, cr = $cresist, dr = $dresist, pr = $presist, fr = $fresist WHERE race=$nrace AND id > $min_id AND id < $max_id";
    $mysql->query_no_result($query);
  }

  if($type == 4) {
    $query = "SELECT class FROM npc_types WHERE id=$npcid";
    $result = $mysql->query_assoc($query);
    $nclass = $result['class'];

    $query = "UPDATE npc_types SET ac = $ac_, mr = $mresist, cr = $cresist, dr = $dresist, pr = $presist, fr = $fresist WHERE class=$nclass AND id > $min_id AND id < $max_id";
    $mysql->query_no_result($query);
  }

  if($type == 5) {
    $query = "SELECT level FROM npc_types WHERE id=$npcid";
    $result = $mysql->query_assoc($query);
    $nlevel = $result['level'];

    $query = "UPDATE npc_types SET ac = $ac_, mr = $mresist, cr = $cresist, dr = $dresist, pr = $presist, fr = $fresist WHERE level=$nlevel AND id > $min_id AND id < $max_id";
    $mysql->query_no_result($query);
  }

  if($type == 6) {
    if($name == '' && $class == 0 && $race == 0 && ($level == '' || $level == 0)) {
      $query = "UPDATE npc_types SET ac = $ac_, mr = $mresist, cr = $cresist, dr = $dresist, pr = $presist, fr = $fresist WHERE id=$npcid";
      $mysql->query_no_result($query);
    }
    if($name == '' && ($class > 0 || $race > 0 || $level > 0)) {
      $query = "UPDATE npc_types SET ac = $ac_, mr = $mresist, cr = $cresist, dr = $dresist, pr = $presist, fr = $fresist WHERE name=$nname AND level=$nlevel AND class=$nclass AND race=$nrace AND id > $min_id AND id < $max_id";
      $mysql->query_no_result($query);
    }
    else {
      $query = "UPDATE npc_types SET ac = $ac_, mr = $mresist, cr = $cresist, dr = $dresist, pr = $presist, fr = $fresist WHERE name like \"$nname\" AND level=$nlevel AND class=$nclass AND race=$nrace AND id > $min_id AND id < $max_id";
      $mysql->query_no_result($query);
    }
  }
}

function get_faction_name($id): mixed {
  global $database;

  if($id == '')
  	$id = 0;

  $result = $database->fetchAssoc("SELECT name FROM faction_list WHERE id = ?", [$id], 'i');

  return $result['name'];
}

function faction_list(): array {
  global $database;

  $results = $database->fetchAll("SELECT id, name FROM faction_list");

  foreach ($results as $result) {
    $array[$result['id']] = $result['name'];
  }

  return $array;
}

function get_npc_faction_id(): mixed {
  global $database, $npcid;

  $result = $database->fetchAssoc("SELECT npc_faction_id FROM npc_types WHERE id = ?", [$npcid], 'i');

  return $result['npc_faction_id'];
}

function update_npc_faction_id($fid): void {
  check_authorization();
  global $database, $npcid;

  $database->executeQuery("UPDATE npc_types SET npc_faction_id = ? WHERE id = ?", [$fid, $npcid], 'ii');
}

function change_faction_byname(): void {
  check_authorization();
  global $database, $npcid, $z;
  $zid = getZoneID($z);
  $min_id = $zid*1000-1;
  $max_id = $zid*1000+1000;
  $npcfid = $_GET['npcfid'];
  $npcname = $_POST['npcname'];
  $updateall = $_POST['updateall'];

  if($updateall == 0){
      $database->executeQuery(
          "UPDATE npc_types SET npc_faction_id = ? WHERE name LIKE ? AND id > ? AND id < ? AND npc_faction_id = 0",
          [$npcfid, $npcname, $min_id, $max_id],
          'isii'
      );
  }

  if($updateall == 1){
      $database->executeQuery(
          "UPDATE npc_types SET npc_faction_id = ? WHERE name LIKE ? AND id > ? AND id < ?",
          [$npcfid, $npcname, $min_id, $max_id],
          'isii'

      );
  }
}

function change_faction_byrace(): void {
  check_authorization();
  global $database, $npcid, $z;
  $zid = getZoneID($z);
  $min_id = $zid*1000-1;
  $max_id = $zid*1000+1000;
  $npcfid = $_GET['npcfid'];
  $npcrace = $_POST['npcrace'];
  $updateall = $_POST['updateall'];

  if($updateall == 0){
      $database->executeQuery(
          "UPDATE npc_types SET npc_faction_id = ? WHERE race = ? AND id > ? AND id < ? AND npc_faction_id = 0",
          [$npcfid, $npcrace, $min_id, $max_id],
          'iiii'
      );
  }

  if($updateall == 1){
      $database->executeQuery(
          "UPDATE npc_types SET npc_faction_id = ? WHERE race = ? AND id > ? AND id < ?",
          [$npcfid, $npcrace, $min_id, $max_id],
          'iiii'
      );
  }
}

function create_npc_faction_id(): void {
  check_authorization();
  global $database;
  $id = $_POST['id'];
  $name = $_POST['name'];
  $ipa = $_POST['ipa'];

  $database->executeQuery(
      "INSERT INTO npc_faction SET id = ?, name = ?, ignore_primary_assist = ?",
      [$id, $name, $ipa],
      'iss'
  );
}

function search_npc_faction_ids($search): array {
  global $database;
  return $database->fetchAll("SELECT id, name FROM npc_faction WHERE name rlike ?", [$search], 's');
}

function search_npc_faction_ids_primary($search): array {
  global $database;
  return $database->fetchAll(
      "SELECT nf.id, nf.name, fl.name AS primaryfaction FROM npc_faction nf
             INNER JOIN faction_list fl ON fl.id = nf.primaryfaction
             WHERE fl.name rlike ?;",
      [$search],
      's'
  );
}

function suggest_npc_faction_id(): mixed {
  global $database;
  $result = $database->fetchAssoc("SELECT MAX(id) as id FROM npc_faction", [], '');
  return ($result['id'] + 1);
}

function get_npc_faction_id_name(): ?array {
  global $database;
  $id = get_npc_faction_id();
  return $database->fetchAssoc(
      "SELECT * FROM npc_faction WHERE id = ?",
      [$id],
      'i'
  );
}

function update_npc_faction_id_name(): void {
  check_authorization();
  global $database;

  $name = $_POST['name'];
  $ipa = $_POST['ipa'];
  $id = get_npc_faction_id();
  $database->executeQuery(
      "UPDATE npc_faction SET name = ?, ignore_primary_assist = ? WHERE id = ?",
      [$name, $ipa, $id],
      'ssi'
  );
}

function search_factions($search): array {
  global $database;
  return $database->fetchAll("SELECT id, name FROM faction_list WHERE name rlike ?", [$search], 's');
}

function update_primary_faction(): void {
  check_authorization();
  global $database;
  $id = get_npc_faction_id();
  $fid = $_GET['fid'];
  $database->executeQuery("UPDATE npc_faction SET primaryfaction = ? WHERE id = ?", [$fid, $id], 'ii');
}

function add_faction_hit(): void {
  check_authorization();
  global $database;

  $npc_faction_id = get_npc_faction_id();
  $fid = $_GET['fid'];
  $value = $_POST['value'];
  $npc_value = $_POST['npc_value'];
  $temp = $_POST['temp'];
  
  $result = $database->fetchAssoc("SELECT max(sort_order) + 1 AS maxorder FROM npc_faction_entries WHERE npc_faction_id = ?", [$npc_faction_id], 'i');
  $order = $result['maxorder'];
  
  if(!$order)
  {
    $order = 1;
  }
  $database->executeQuery(
      "INSERT INTO npc_faction_entries SET npc_faction_id = ?, faction_id = ?, value = ?, npc_value = ?, temp = ?, sort_order = ?",
      [$npc_faction_id, $fid, $value, $npc_value, $temp, $order],
      'iiiiii'
  );
}

function get_factionhit_info(): array {
  global $database, $npcid;

  $npc_faction_id = $_GET['npc_faction_id'];
  $fid = $_GET['faction_id'];
  $result = $database->fetchAssoc(
      "SELECT * FROM npc_faction_entries WHERE npc_faction_id = ? AND faction_id = ?",
      [$npc_faction_id, $fid],
      'ii'
  );
  $result['name'] = get_faction_name($fid);
  return $result;
}

function update_factionhit(): void {
  check_authorization();
  global $database;

  $npc_faction_id = $_GET['npc_faction_id'];
  $fid = $_GET['faction_id'];
  $value = $_POST['value'];
  $npc_value = $_POST['npc_value'];
  $temp = $_POST['temp'];
  $database->executeQuery(
      "UPDATE npc_faction_entries SET value = ?, npc_value = ?, temp = ? WHERE npc_faction_id = ? AND faction_id = ?",
      [$value, $npc_value, $temp, $npc_faction_id, $fid],
      'iiiii'
  );
}

function delete_factionhit(): void {
  check_authorization();
  global $database;

  $npc_faction_id = $_GET['npc_faction_id'];
  $fid = $_GET['faction_id'];

  $database->executeQuery("DELETE FROM npc_faction_entries WHERE npc_faction_id = ? AND faction_id = ?",
      [$npc_faction_id, $fid],
      'ii'
  );
}

function suggest_merchant_id(): mixed {
  global $database;
  $result = $database->fetchAssoc("SELECT MAX(merchantid) AS id FROM merchantlist", [], '');

  $result2 = $database->fetchAssoc("SELECT MAX(merchant_id) AS npc_mid FROM npc_types", [], '');

  if($result['id'] > $result2['npc_mid']){
    $result = $result['id'] + 1;
  }
  else {
    $result = $result2['npc_mid'] + 1;
  }

  return $result;
}

function suggest_dye_template(): mixed {
  global $database;
  $result = $database->fetchAssoc("SELECT MAX(armortint_id) as id FROM npc_types", [], '');
  return ($result['id'] + 1);
}

function update_merchant_id(): void {
  check_authorization();
  global $database, $npcid;
  $merchant_id = $_REQUEST['merchant_id'];
  $database->executeQuery("UPDATE npc_types SET merchant_id = ? WHERE id = ?", [$merchant_id, $npcid], 'ii');
}

function update_tint(): void {
  global $database;

  $color_slots = ['1h', '2c', '3a', '4b', '5g', '6l', '7f', '8x', '9x'];
  $params = [];

  foreach ($color_slots as $slot) {
      $params[] = intval($_POST["red$slot"] ?? 0);
      $params[] = intval($_POST["grn$slot"] ?? 0);
      $params[] = intval($_POST["blu$slot"] ?? 0);
  }

  $params[] = intval($_POST['id']);

  // Generate type string (27 colors + 1 id = 28 integers)
  $types = str_repeat('i', count($params));

  $database->executeQuery(
      "UPDATE npc_types_tint 
      SET red1h = ?, grn1h = ?, blu1h = ?, 
          red2c = ?, grn2c = ?, blu2c = ?, 
          red3a = ?, grn3a = ?, blu3a = ?, 
          red4b = ?, grn4b = ?, blu4b = ?, 
          red5g = ?, grn5g = ?, blu5g = ?, 
          red6l = ?, grn6l = ?, blu6l = ?, 
          red7f = ?, grn7f = ?, blu7f = ?, 
          red8x = ?, grn8x = ?, blu8x = ?, 
          red9x = ?, grn9x = ?, blu9x = ? 
      WHERE id = ?",
      $params,
      $types
  );
}

function add_dye_template(): void {
  check_authorization();
  global $database, $npcid;
  $armortint_id = $_REQUEST['armortint_id'];
  $database->executeQuery("UPDATE npc_types SET armortint_id = ? WHERE id = ?", [$armortint_id, $npcid], 'ii');

  $database->executeQuery("INSERT INTO npc_types_tint (id) VALUES (?)", [$armortint_id], 'i');

  $database->executeQuery("UPDATE npc_types SET armortint_red = 0, armortint_green = 0, armortint_blue = 0 WHERE id = ?", [$npcid], 'i');
}

function delete_tint(): void {
  check_authorization();
  global $database, $npcid;

  $id = $_GET['tint_id'];
  $database->executeQuery("DELETE FROM npc_types_tint WHERE id = ?", [$id], 'i');

  $database->executeQuery("UPDATE npc_types SET armortint_id = 0 WHERE id = ?", [$npcid], 'i');
}

function delete_npc(): void {
  check_authorization();
  global $database, $npcid;

  $database->executeQuery("DELETE FROM npc_types WHERE id = ?", [$npcid], 'i');

  $database->executeQuery("DELETE FROM spawnentry WHERE npcID = ?", [$npcid], 'i');
}

function suggest_npcid() {
  global $database, $z;

  $result = $database->fetchAssoc("SELECT zoneidnumber FROM zone WHERE short_name = ?", [$z], 's');

  if ($result) { // Associated with a zone
    $npczoneid = $result['zoneidnumber'];

    $result = $database->fetchAssoc("SELECT id FROM npc_types WHERE id = ? * 1000", [$npczoneid], 'i');

    if (!$result) { // Very first id is available
      return $npczoneid * 1000;
    }

    // Find next available id
    $result = $database->fetchAssoc(
        "SELECT MIN(n1.id + 1) AS npcid 
        FROM npc_types n1 LEFT JOIN npc_types n2 ON n1.id + 1 = n2.id 
        WHERE n1.id >= ? * 1000 AND n1.id < ? * 1000 + 1000 AND n2.id IS NULL",
      [$npczoneid, $npczoneid],
      'ii'
    );

    if ($result['npcid'] > 0) {
      return $result['npcid'];
    }
    else {
      return "";
    }
  }
  else { // Not associated with a zone (pet, trigger, chest, etc.)

    $result = $database->fetchAssoc("SELECT id FROM npc_types WHERE id = 1", [], '');

    if (!$result) { // Very first id is available
      return 1;
    }

    // Find next available id
    $result = $database->fetchAssoc(
        "SELECT MIN(n1.id + 1) AS npcid 
        FROM npc_types n1 LEFT JOIN npc_types n2 ON n1.id + 1 = n2.id 
        WHERE n1.id >= 0 AND n1.id < 1000 AND n2.id IS NULL",
        [],
        ''
    );

    if ($result['npcid'] > 0) {
      return $result['npcid'];
    }
    else {
      return "";
    }
  }
}

function tint_info(): ?array {
  global $database;

  $tint_id = $_GET['tint_id'];

  return $database->fetchAssoc("SELECT * FROM npc_types_tint WHERE id = ?", [$tint_id], 'i');
}

function next_npcid() {
  global $database, $z;

  $npczoneid = $_POST['npczoneid'];

  $result = $database->fetchAssoc("SELECT id FROM npc_types WHERE id = ? * 1000", [$npczoneid], 'i');

  if (!$result) { // Very first id is available
    return $npczoneid * 1000;
  }

  // Find next available id
  $result = $database->fetchAssoc(
      "SELECT MIN(n1.id + 1) AS npcid FROM npc_types n1 LEFT JOIN npc_types n2 ON n1.id + 1 = n2.id 
      WHERE n1.id >= ? * 1000 AND n1.id < ? * 1000 + 1000 AND n2.id IS NULL",
      [$npczoneid, $npczoneid],
      'ii'
  );

  if ($result['npcid'] > 0) {
    return $result['npcid'];
  }
  else {
    return "";
  }
}

function get_stats(): array
{
	$npc_level = $_POST['npc_level'];
	if ($npc_level < 1)
		$npc_level = 1;
	
	$results = array("level" => $npc_level);
	
	$results["hp"] = $npc_level * 25;
	$results["mana"] = 35 * $npc_level;
	$results["ac"] = round($npc_level * 4.1 - 15);
	$results["stats"] = 70 + $npc_level;
	$results["resists"] = 35;
	$results["mindmg"] = max(round(($npc_level + 1) / 10), 1);
	$results["maxdmg"] = ($npc_level + 1) * 2;
	$results["attack_delay"] = 30;
	$results["mana_regen"] = 5 + round($npc_level / 2);
	$results["mana_combat_regen"] = 2 + round($npc_level / 5);

	if ($npc_level < 15)
		$results["resists"] = 25;

	if ($npc_level < 15)
		$results["ac"] = $npc_level * 3;	
	if ($npc_level < 3)
		$results["ac"] += 2;
	if ($results["ac"] > 200)
		$results["ac"] = 200;
	
	if ($npc_level > 15)
		$results["hp"] *= 1.25;
	if ($npc_level > 30)
		$results["hp"] *= 1.25;
	if ($npc_level > 35)
		$results["hp"] *= 1.25;
	if ($npc_level > 40)
	{
		$results["hp"] *= 2;
		$results["mindmg"] += 25;
		$results["maxdmg"] += 25;
	}
	if ($npc_level > 49)
	{
		$results["hp"] *= 2;
		$results["hp"] += ($npc_level - 50) * 500;
		$results["mindmg"] = 45;
		$results["maxdmg"] = 115 + $npc_level;
		$results["attack_delay"] = 20;
	}
	if ($npc_level > 58)
	{
		$results["hp"] += ($npc_level - 50) * 500;
		$results["mindmg"] = 50 + $npc_level;
		$results["maxdmg"] = 400 + ($npc_level - 58) * 37;
	}
	
	$results["hp"] = floor($results["hp"]);
	$results["hp_regen"] = round($results["hp"] / 33);
	
	return $results;
}

function export_sql(): array|string
{
  global $database, $npcid;
  $export_array = [];

  $results = $database->fetchAssoc("SELECT * FROM npc_types WHERE id = ?", [$npcid], 'i');
  
  if (!$results)
	  return '';

  $table_string = '';
  $value_string = '';
  $update_string = '';

  foreach ($results as $key => $value) {
      $escaped_value = $database->real_escape_string($value);

    if ($table_string !== '') {
      $table_string .= ", " . $key;
      $value_string .= ", '" . $escaped_value . "'";
      $update_string .= ", " . $key . " = '" . $escaped_value . "'";
    }
    else {
      $table_string = $key;
      $value_string = "'" . $escaped_value . "'";
      $update_string = $key . " = '" . $escaped_value . "'";
    }
  }

  $export_array['insert'] = "INSERT INTO npc_types ($table_string) VALUES ($value_string);";
  $export_array['update'] = "UPDATE npc_types SET $update_string WHERE id = " . intval($npcid) . ";";

  return $export_array;
}

function get_emotes(): array
{
  global $database;
  $emoteid = $_GET['emoteid'];

  $result = $database->fetchAll(
      "SELECT id, emoteid, event_, type, text FROM npc_emotes WHERE emoteid = ? ORDER BY emoteid, event_",
      [$emoteid],
      'i'
  );
  if ($result) {
    foreach ($result as $result) {
     $array['emotes'][$result['id']] = array("id"=>$result['id'], "emoteid"=>$result['emoteid'], "event_"=>$result['event_'], "type"=>$result['type'], "text"=>$result['text']);
    }
  }
  return $array;
}

function delete_emote() {
  check_authorization();
  global $database;
  $id = $_GET['id'];
  $emoteid = $_GET['emoteid'];

  $database->executeQuery("DELETE FROM npc_emotes WHERE id = ?", [$id], 'i');

  $result = $database->fetchAssoc(
      "SELECT count(*) AS emotecount FROM npc_emotes WHERE emoteid = ?", [$emoteid], 'i'
  );
  $count = $result['emotecount'];

  if($count == 0) {
    $database->executeQuery("UPDATE npc_types SET emoteid = 0 WHERE emoteid = ?", [$emoteid], 'i');
  }

  if($count != 0) {
    return $emoteid;
  }
  else {
    return 0;
  }
}

function emote_info(): ?array
{
  global $database;

  $id = $_GET['id'];

  return $database->fetchAssoc("SELECT id, emoteid, event_, type, text FROM npc_emotes WHERE id = ?", [$id], 'i');
}

function update_emote() {
  global $database, $npcid;

  $id = $_POST['id'];
  $emoteid = $_POST['emoteid'];
  $oldemote = $_POST['oldemote'];
  $event_ = $_POST['event_'];
  $type = $_POST['type'];
  $text = $_POST['text'];

  $database->executeQuery(
      "UPDATE npc_emotes SET emoteid = ?, event_ = ?, type = ?, text = ? WHERE id = ?",
      [$emoteid, $event_, $type, $text, $id],
      'iiisi'
  );

  if ($npcid) {
    $database->executeQuery("UPDATE npc_types SET emoteid = ? WHERE id = ?", [$emoteid, $npcid], 'ii');
  }

  $result = $database->fetchAssoc(
      "SELECT COUNT(*) AS emotecount FROM npc_emotes WHERE emoteid = ?", [$oldemote], 'i'
  );
  $count = $result['emotecount'];

  if($count == 0) {
    $database->executeQuery("UPDATE npc_types SET emoteid = 0 WHERE emoteid = ?", [$oldemote], 'i');
  }

  return $emoteid;
}

function add_emote(): void
{
  global $database, $npcid;

  $emoteid = $_POST['emoteid'];
  $event_ = $_POST['event_'];
  $type = $_POST['type'];
  $text = $_POST['text'];

  $database->executeQuery(
      "INSERT INTO npc_emotes SET emoteid = ?, event_ = ?, type = ?, text = ?",
      [$emoteid, $event_, $type, $text],
      'iiis'
  );

  if ($npcid) {
    $database->executeQuery("UPDATE npc_types SET emoteid = ? WHERE id = ?", [$emoteid, $npcid], 'ii');
  }
}

function suggest_emoteid() {
  global $database;

  $result = $database->fetchAssoc("SELECT MAX(emoteid) + 1 AS maxeid FROM npc_emotes", [], '');
  $maxeid = $result['maxeid'];

  return $maxeid;
}

function get_npcid_from_emote($emoteid) {
  global $database;

  $result = $database->fetchAssoc("SELECT id FROM npc_types WHERE emoteid = ? LIMIT 1", [$emoteid], 'i');
  $npcid = $result['id'];

  return $npcid;
}

function getNPCsByEmote(): array
{
  global $database;
  $emoteid = $_GET['emoteid'];

  return $database->fetchAll("SELECT id, name FROM npc_types WHERE emoteid = ? ORDER BY id", [$emoteid], 'i');
}

function setExistingEmote($npcid, $emoteid): void
{
  global $database;

  $database->executeQuery("UPDATE npc_types SET emoteid = ? WHERE id = ?", [$emoteid, $npcid], 'ii');
}

function list_emotes($page_number, $results_per_page, $sort_by, $where = ""): array|string|null
{
  global $mysql;
  $limit = ($page_number - 1) * $results_per_page . "," . $results_per_page;

  $query = "SELECT * FROM npc_emotes";
  if ($where) {
    $query .= " WHERE $where";
  }
  $query .= " ORDER BY $sort_by LIMIT $limit";
  $results = $mysql->query_mult_assoc($query);

  return $results;
}

function build_filter(): array
{
  global $mysql, $npcid, $z;
  $zid = getZoneID($z);
  $filter1 = $_GET['filter1'];
  $filter2 = $_GET['filter2'];
  $filter3 = $_GET['filter3'];
  $filter4 = $_GET['filter4'];
  $filter_final = array();

  if ($filter1) { // Filter by emoteid
    $filter_emoteid = "emoteid = '" . $filter1 . "'";
    $filter_final['sql'] = $filter_emoteid;
  }
  if ($filter2 != '') { // Filter by type
    $filter_type = "type = '" . $filter2 . "'";
    if ($filter_final['sql']) {
      $filter_final['sql'] .= " AND ";
    }
    $filter_final['sql'] .= $filter_type;
  }
  if ($filter3 != '') { // Filter by event
    $filter_event = "event_ = '" . $filter3 . "'";
    if ($filter_final['sql']) {
      $filter_final['sql'] .= " AND ";
    }
    $filter_final['sql'] .= $filter_event;
  }
  if ($filter4) { // Filter by text
    $filter_text = "text LIKE '%" . $filter4 . "%'";

    if ($filter_final['sql']) {
      $filter_final['sql'] .= " AND ";
    }
    $filter_final['sql'] .= $filter_text;
  }

  $filter_final['url'] = "&filter=on&filter1=$filter1&filter2=$filter2&filter3=$filter3&filter4=$filter4";
  $filter_final['status'] = "on";
  $filter_final['filter1'] = $filter1;
  $filter_final['filter2'] = $filter2;
  $filter_final['filter3'] = $filter3;
  $filter_final['filter4'] = $filter4;

  return $filter_final;
}

function move_factionhit(): void
{
  check_authorization();
  global $database;

  $npc_faction_id = $_GET['npc_faction_id'];
  $fid = $_GET['faction_id'];

  $result = $database->fetchAssoc(
      "SELECT sort_order FROM npc_faction_entries WHERE npc_faction_id = ? AND faction_id = ?",
      [$npc_faction_id, $fid],
      'ii'
  );
  $order = $result['sort_order'];
  
  if($order > 1)
  {
    $neworder = $order - 1;
    
    $database->executeQuery(
        "UPDATE npc_faction_entries SET sort_order = sort_order + 1 WHERE npc_faction_id = ? AND sort_order = ?",
        [$npc_faction_id, $neworder],
        'ii'
    );
    
    $database->executeQuery(
        "UPDATE npc_faction_entries SET sort_order = ? WHERE npc_faction_id = ? AND faction_id = ?",
        [$neworder, $npc_faction_id, $fid],
      'iii'
    );
  }
}

function move_down_factionhit(): void
{
  check_authorization();
  global $database;

  $npc_faction_id = $_GET['npc_faction_id'];
  $fid = $_GET['faction_id'];

  $result = $database->fetchAssoc(
      "SELECT max(sort_order) AS maxorder FROM npc_faction_entries WHERE npc_faction_id = ?",
      [$npc_faction_id],
      'i'
  );
  $maxorder = $result['maxorder'];
  
  $result = $database->fetchAssoc(
      "SELECT sort_order FROM npc_faction_entries WHERE npc_faction_id = ? AND faction_id = ?",
      [$npc_faction_id, $fid],
      'ii'
  );
  $order = $result['sort_order'];
  
  if ($maxorder == $order)
  {
    $database->executeQuery(
        "UPDATE npc_faction_entries SET sort_order = ? WHERE npc_faction_id = ? AND sort_order = 1",
        [$maxorder, $npc_faction_id],
        'ii'
    );
    
    $database->executeQuery(
        "UPDATE npc_faction_entries SET sort_order = 1 WHERE npc_faction_id = ? AND faction_id = ?",
        [$npc_faction_id, $fid],
        'ii'
    );
  }
  else
  {
    $neworder = $order + 1;
    
    $database->executeQuery(
        "UPDATE npc_faction_entries SET sort_order = sort_order - 1 WHERE npc_faction_id = ? AND sort_order = ?",
        [$npc_faction_id, $neworder],
        'ii'
    );
    
    $database->executeQuery(
        "UPDATE npc_faction_entries SET sort_order = ? WHERE npc_faction_id = ? AND faction_id = ?",
        [$neworder, $npc_faction_id, $fid],
        'iii'
    );
    
  }
}

function mass_update_npcs(): void
{
  global $mysql, $z, $npcid, $npcfields;

  $zid = getZoneID($z);
  $min_id = $zid*1000-1;
  $max_id = $zid*1000+1000;
  $class = $_POST['class_selected'];
  $race = $_POST['race_selected'];
  $bodytype = $_POST['body_selected'];
  $name = $_POST['npcname'];
  $level = $_POST['npclevel'];
  $hp = $_POST['npchp'];
  $change_all = $_POST['change_all'];
  $hp_value = $_POST['hp_value'];
  $level_value = $_POST['level_value'];

  $raw_stat1 = $_POST['npctype_selected1'];
  $stat1 = $npcfields[$raw_stat1];
  $value1 = $_POST['npcvalue1'];

  $raw_stat2 = $_POST['npctype_selected2'];
  $stat2= $npcfields[$raw_stat2];
  $value2= $_POST['npcvalue2'];

  $raw_stat3 = $_POST['npctype_selected3'];
  $stat3 = $npcfields[$raw_stat3];
  $value3 = $_POST['npcvalue3'];

  $raw_stat4 = $_POST['npctype_selected4'];
  $stat4 = $npcfields[$raw_stat4];
  $value4 = $_POST['npcvalue4'];

  $raw_stat5 = $_POST['npctype_selected5'];
  $stat5 = $npcfields[$raw_stat5];
  $value5 = $_POST['npcvalue5'];

  $raw_stat6 = $_POST['npctype_selected6'];
  $stat6 = $npcfields[$raw_stat6];
  $value6 = $_POST['npcvalue6'];

  $final_string = '';
  if($stat1 && $value1 != '')
  {
    $final_string .= "`$stat1`=\"$value1\"";
  }
  if($stat2 && $value2 != '')
  {
    if($stat1 && $value1 != '')
      $final_string .= ", `$stat2`=\"$value2\"";
    else
      $final_string .= "`$stat2`=\"$value2\"";
  }
  if($stat3 && $value3 != '')
  {
    if(($stat1 && $value1 != '') || ($stat2 && $value2 != ''))
      $final_string .= ", `$stat3`=\"$value3\"";
    else
      $final_string .= "`$stat3`=\"$value3\"";
  }
  if($stat4 && $value4 != '')
  {
    if(($stat1 && $value1 != '') || ($stat2 && $value2 != '') || ($stat3 && $value3 != ''))
     $final_string .= ", `$stat4`=\"$value4\"";
    else
      $final_string .= "`$stat4`=\"$value4\"";
  }
  if($stat5 && $value5 != '')
  {
    if(($stat1 && $value1 != '') || ($stat2 && $value2 != '') || ($stat3 && $value3 != '') || ($stat4 && $value4 != ''))
      $final_string .= ", `$stat5`=\"$value5\"";
    else
      $final_string .= "`$stat5`=\"$value5\"";
  }
  if($stat6 && $value6 != '')
  {
    if(($stat1 && $value1 != '') || ($stat2 && $value2 != '') || ($stat3 && $value3 != '') || ($stat4 && $value4 != '') || ($stat5 && $value5 != ''))
      $final_string .= ", `$stat6`=\"$value6\"";
    else
      $final_string .= "`$stat6`=\"$value6\"";
  }

  if($race == 0){ $nrace = "race"; }
  if($race > 0){ $nrace = $race; }
  if($class == 0){ $nclass = "class"; }
  if($class > 0){ $nclass = $class; }
  if($name == ''){ $nname = "name"; }
  if($name != ''){ $nname = $name; }
  if($bodytype == 0){ $nbodytype = "bodytype"; }
  if($bodytype > 0){ $nbodytype = $bodytype; }

  $where_string = "";
  if($level != '' && $level > 0)
  { 
    $sign = "=";
    if($level_value == 1)
    {
      $sign = ">";
    }
    elseif($level_value == 2)
    {
      $sign = "<";
    }
    $where_string .= " AND level $sign $level";
  }
  if($hp != '')
  { 
    $sign = "=";
    if($hp_value == 1)
    {
      $sign = ">";
    }
    elseif($hp_value == 2)
    {
      $sign = "<";
    }
    $where_string .= " AND hp $sign $hp";
  }

  if($final_string != '')
  {
    if($change_all == 1)
    {
      $query = "UPDATE npc_types SET $final_string WHERE id > $min_id AND id < $max_id";
      $mysql->query_no_result($query);
    }
    elseif($name == '' && $class == 0 && $race == 0 && $bodytype == 0 && ($level == '' || $level == 0) && $hp == '') 
    {
      $query = "UPDATE npc_types SET $final_string WHERE id=$npcid";
      $mysql->query_no_result($query);
    }
    elseif($name == '' && ($class > 0 || $race > 0 || $level > 0 || $bodtype > 0)) 
    {
      $query = "UPDATE npc_types SET $final_string WHERE name=$nname $where_string AND class=$nclass AND race=$nrace AND bodytype=$nbodytype AND id > $min_id AND id < $max_id";
      $mysql->query_no_result($query);
    }
    else 
    {
      $query = "UPDATE npc_types SET $final_string WHERE name like \"$nname\" $where_string AND class=$nclass AND race=$nrace AND bodytype=$nbodytype AND id > $min_id AND id < $max_id";
      $mysql->query_no_result($query);
    }
  }
}

function change_special_abilitities(): void
{
  check_authorization();
  global $mysql, $z, $npcid, $specialattacks, $max_special_ability;

  $zid = getZoneID($z);
  $min_id = $zid*1000-1;
  $max_id = $zid*1000+1000;
  $class = $_POST['class_selected'];
  $race = $_POST['race_selected'];
  $bodytype = $_POST['body_selected'];
  $name = $_POST['npcname'];
  $level = $_POST['npclevel'];
  $hp = $_POST['npchp'];
  $special_ability = $_POST['special_ability'];
  $sa_type = $_POST['sa_type'];
  $parameter = $_POST['parameter'];
  $custom = $_POST['custom'];
  $change_all = $_POST['change_all'];
  $hp_value = $_POST['hp_value'];
  $level_value = $_POST['level_value'];

  if($race == 0){ $nrace = "race"; }
  if($race > 0){ $nrace = $race; }
  if($class == 0){ $nclass = "class"; }
  if($class > 0){ $nclass = $class; }
  if($name == ''){ $nname = "name"; }
  if($name != ''){ $nname = $name; }
  if($bodytype == 0){ $nbodytype = "bodytype"; }
  if($bodytype > 0){ $nbodytype = $bodytype; }
  if($parameter == ''){ $nparameter = "1"; }
  if($parameter != ''){ $nparameter = $parameter; }
  
  $where_string = "";
  if($level != '' && $level > 0)
  { 
    $sign = "=";
    if($level_value == 1)
    {
      $sign = ">";
    }
    elseif($level_value == 2)
    {
      $sign = "<";
    }
    $where_string .= " AND level $sign $level";
  }
  if($hp != '')
  { 
    $sign = "=";
    if($hp_value == 1)
    {
      $sign = ">";
    }
    elseif($hp_value == 2)
    {
      $sign = "<";
    }
    $where_string .= " AND hp $sign $hp";
  }

  if($sa_type > 0 && $sa_type != 3 && $special_ability > 0)
  {
    if($sa_type == 1 || $sa_type == 2)
    {
        if($change_all == 1)
        {
          $query = "SELECT id AS currentid, `special_abilities` from npc_types WHERE id > $min_id AND id < $max_id";
        } 
        elseif($name == '' && $class == 0 && $race == 0 && $bodytype == 0 && ($level == '' || $level == 0) && $hp == '') 
        {
          $query = "SELECT id AS currentid, `special_abilities` from npc_types WHERE id=$npcid";
        }
        elseif($name == '' && ($class > 0 || $race > 0 || $level > 0 || $bodtype > 0)) 
        {
          $query = "SELECT id AS currentid, `special_abilities` from npc_types WHERE name=$nname $where_string AND class=$nclass AND race=$nrace AND bodytype=$nbodytype AND id > $min_id AND id < $max_id";
        }
        else
        {
          $query = "SELECT id AS currentid, `special_abilities` from npc_types WHERE name like \"$nname\" $where_string AND class=$nclass AND race=$nrace AND bodytype=$nbodytype AND id > $min_id AND id < $max_id";
        }
        $result = $mysql->query_mult_assoc($query);
        if ($result) 
        {
          $count = 0;
          foreach ($result as $result) 
          {
            $currentid = $result['currentid'];
            $special_abilities = $result['special_abilities'];
            $new_special_abilities = '';
            $sa = array();
				    for ($i = 1; $i <= $max_special_ability; $i++)
            {
				        if (preg_match("/^$i,/", $special_abilities, $match) == 1 || preg_match("/\^$i,/", $special_abilities, $match) == 1)
                {
				          $match[0] = ltrim($match[0], "^");
				          $new_special_abilities = $match[0];
                  $new_special_abilities = rtrim($new_special_abilities, ",");
                  if($new_special_abilities != '')
                  {
                    $sa[$i] = 1;
                  }
                  else
                  {
                    $sa[$i] = 0;
                  }
				        }
				    }
				    
            if($sa_type == 1)
            {
              if($sa[$special_ability] == 0)
              {
                $special_abilities .= "^$special_ability,$nparameter";
                $query = "UPDATE npc_types SET special_abilities = \"$special_abilities\" WHERE id=$currentid";
                $mysql->query_no_result_no_log($query);
                ++$count;
              }
            }
            if($sa_type == 2)
            {
              if($sa[$special_ability] == 1)
              {
                  $specabil = array();
                  $specabilcont = array();

                  for ($i = 1; $i <= $max_special_ability; $i++) 
                  {
                    if (preg_match("/^$i,/", $special_abilities) == 1) 
                    {
                      $specabil[$i] = 1;
                      // Leading special ability
                      if (preg_match("/^$i,.+?\^/", $special_abilities, $match) == 1)
                      {
                        $specabilcont[$i] = $match[0];
                        $specabilcont[$i] = rtrim($specabilcont[$i], "^");
                      }
                      // Only special ability
                      else 
                      {
                        preg_match("/^$i,.+?\$/", $special_abilities, $match);
                        $specabilcont[$i] = $match[0];
                      }
                    }
                    elseif (preg_match("/\^$i,/", $special_abilities) == 1)
                    {
                      $specabil[$i] = 1;
                      // Middle special ability
                      if (preg_match("/\^$i,.+?\^/", $special_abilities, $match) == 1)
                      {
                        $specabilcont[$i] = $match[0];
                        $specabilcont[$i] = trim($specabilcont[$i], "^");
                      }
                      // Trailing special ability
                      else 
                      {
                        preg_match("/\^$i,.+?\$/", $special_abilities, $match);
                        $specabilcont[$i] = $match[0];
                        $specabilcont[$i] = trim($specabilcont[$i], "^");
                      }
                    }
                    else 
                    {
                      $specabil[$i] = 0;
                    }
                }
                
                $special_abilities = "";
                for ($i = 1; $i <= $max_special_ability; $i++) 
                {
                  if($specabilcont[$i] != '' && $i != $special_ability)
                  {
                    $special_abilities .= "$specabilcont[$i]^";
                  }
                }
                $query = "UPDATE npc_types SET special_abilities = \"$special_abilities\" WHERE id=$currentid";
                $mysql->query_no_result_no_log($query);
                $query2 = "UPDATE npc_types SET special_abilities = TRIM(TRAILING '^' FROM special_abilities)";
                $mysql->query_no_result_no_log($query2);
                ++$count;
             }
            }
        }
        $added = "ADDED";
        if($sa_type == 2)
          $added = "REMOVED";
        $string = "$count NPCs had Special Ability $special_ability $added in zone $zid.";
        logPerl($string);
      }
    }
  }
  if($sa_type == 3)
  {
    if($change_all == 1)
    {
      $query = "UPDATE npc_types SET special_abilities = \"$custom\" WHERE id > $min_id AND id < $max_id";
      $mysql->query_no_result($query);
    }
    elseif($name == '' && $class == 0 && $race == 0 && $bodytype == 0 && ($level == '' || $level == 0) && $hp == '') 
    {
      $query = "UPDATE npc_types SET special_abilities = \"$custom\" WHERE id=$npcid";
      $mysql->query_no_result($query);
    }
    elseif($name == '' && ($class > 0 || $race > 0 || $level > 0 || $bodtype > 0)) 
    {
      $query = "UPDATE npc_types SET special_abilities = \"$custom\" WHERE name=$nname $where_string AND class=$nclass AND race=$nrace AND bodytype=$nbodytype AND id > $min_id AND id < $max_id";
      $mysql->query_no_result($query);
    }
    else 
    {
      $query = "UPDATE npc_types SET special_abilities = \"$custom\" WHERE name like \"$nname\" $where_string AND class=$nclass AND race=$nrace AND bodytype=$nbodytype AND id > $min_id AND id < $max_id";
      $mysql->query_no_result($query);
    }
  }
}

function get_special_ability() {
  global $database, $npcid;

  $result = $database->fetchAssoc(
      "SELECT special_abilities FROM npc_types WHERE id = ?",
      [$npcid],
      'i'
  );
  return $result['special_abilities'];
}

function get_see_invis_text($invis_type_value) {
	if ($invis_type_value == 0)
		return "No";
	elseif ($invis_type_value == 1 || $invis_type_value > 99)
		return "Yes";
	else
		return "random $invis_type_value%";
}

?>