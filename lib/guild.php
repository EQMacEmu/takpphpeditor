<?php
global $action;
global $yesno;
global $permissions;
global $guildid;

switch ($action) {
    case 0:  // View Guild Info
        check_admin_authorization();
        if (!empty($guildid)) {
            $body = new Template("templates/guild/guild.tmpl.php");
            $body->set('guildid', $guildid);
            $body->set('yesno', $yesno);
            $body->set('guildname', getGuildName($guildid));
            $body->set('permissions', $permissions);
            $vars = guild_info();
            if (!empty($vars)) {
                foreach ($vars as $key => $value) {
                    $body->set($key, $value);
                }
            }
        } else {
            $body = new Template("templates/guild/guild.default.tmpl.php");
        }
        break;
    case 1: // Edit Guild Info
        check_admin_authorization();
        $body = new Template("templates/guild/guild.edit.tmpl.php");
        $body->set('guildid', $guildid);
        $body->set('yesno', $yesno);
        $body->set('guildname', getGuildName($guildid));
        $vars = guild_info();
        if ($vars) {
            foreach ($vars as $key => $value) {
                $body->set($key, $value);
            }
        }
        break;
    case 2:  // Search Guilds
        check_admin_authorization();
        $body = new Template("templates/guild/guild.searchresults.byguild.tmpl.php");
        if (isset($_GET['guild_id']) && $_GET['guild_id'] != "Guild ID") {
            $results = search_guilds_by_id();
        } elseif (isset($_GET['search']) && $_GET['search'] != "Guild Name" && $_GET['search'] != '') {
            $results = search_guilds();
        } else {
            $results = '';
        }
        $body->set("results", $results);
        break;
    case 3: //Search Guilds by Character
        check_admin_authorization();
        $body = new Template("templates/guild/guild.searchresults.bychar.tmpl.php");
        if (isset($_GET['charid']) && $_GET['charid'] != "Char ID") {
            $results = search_guilds_by_charid();
        } elseif (isset($_GET['charname']) && $_GET['charname'] != "Character Name" && $_GET['charname'] != '') {
            $results = search_guilds_by_charname();
        } else {
            $results = '';
        }
        $body->set("results", $results);
        break;
    case 4: // Update Guild Info
        check_admin_authorization();
        update_guild();
        header("Location: index.php?editor=guild&guildid=$guildid");
        exit;
    case 5: // Delete Guild
        check_admin_authorization();
        delete_guild();
        header("Location: index.php?editor=guild");
        exit;
}

function guild_info(): array|string
{
    global $mysql, $guildid;

    //Load Guild Info
    $query = "SELECT * FROM guilds WHERE id = $guildid";
    $guild_array = $mysql->query_assoc($query);

    //Load Guild Ranks
    $query = "SELECT * FROM guild_ranks WHERE guild_id = $guildid";
    $guild_ranks_array = $mysql->query_mult_assoc($query);
    $guild_array['guild_ranks'] = $guild_ranks_array;

    //Load Guild Members
    $query = "SELECT * FROM guild_members WHERE guild_id = $guildid ORDER BY `rank` DESC";
    $guild_members_array = $mysql->query_mult_assoc($query);
    $guild_array['guild_members'] = $guild_members_array;

    return $guild_array;
}

function update_guild(): void
{
//  global $mysql, $playerid;
    //Update guild info here
}

function delete_guild(): void
{
//  global $mysql, $playerid;
    //Delete guild info here
}

?>