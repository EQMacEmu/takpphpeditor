<div class="table_container">
    <div class="table_header">
        <div style="float:right">
            <a href="index.php?editor=zone&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=8"><img
                        src="images/add.gif" style="border: 0;" alt="Add Icon" title="Add a graveyard to <?= $short_name ?? "" ?>"></a>
            <a href="index.php?editor=zone&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=2"><img
                        src="images/c_table.gif" style="border: 0;" alt="Edit Icon" title="Edit this Zone"></a>
            <a onClick="return confirm('Really Copy Zone <?= $currzone ?? "" ?>?');"
               href="index.php?editor=zone&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&action=24"><img
                        src="images/next.gif" style="border: 0;" alt="Copy Icon" title="Copy this Zone"></a>
        </div>
        <?= $zoneidnumber ?? "" ?> - <?= $long_name ?? "" ?> <?php echo(!empty($short_name) ? "($short_name)" : ''); ?>
    </div>
    <div class="table_content">
        <table style="border-collapse: collapse; border-spacing: 0; border: 0; width: 100%;">
            <tr>
                <td>
                    <div class="center">
                        <h1>
                            <?= $long_name ?? "Error: Undefined" ?><br>
                            (<?php echo(!empty($short_name) ? "$short_name" : 'no title'); ?>)
                        </h1>
                        <table style="font-size: 12px; margin-bottom: 80px;">
                            <tr>
                                <td style="text-align: left;">
                                    <div class="center">
                                        <strong><?= isset($expansion) ? $eqexpansions[$expansion] : "Undefined" ?></strong><br>
                                        <strong><?= isset($type) ? $zonetype[$type] : "Undefined" ?></strong><br><br>
                                    </div>
                                    <strong>Map:</strong> <?= $map_file_name ?? "N/A" ?><br>
                                    <strong>File:</strong> <?= $file_name ?? "N/A" ?><br>
                                    <strong>Safe X:</strong> <?= $safe_x ?? "N/A" ?><br>
                                    <strong>Safe Y:</strong> <?= $safe_y ?? "N/A" ?><br>
                                    <strong>Safe Z:</strong> <?= $safe_z ?? "N/A" ?><br>
                                    <strong>Safe Heading:</strong> <?= $safe_heading ?? "N/A" ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td>
                    <fieldset>
                        <legend><strong>General</strong></legend>
                        <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
                            <tr>
                                <?php if ($graveyard_id > 0): ?>
                                    <td style="padding: 3px; text-align: left; width: 33%">Graveyard: <a
                                                href="index.php?editor=zone&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&graveyard_id=<?= $graveyard_id ?>&action=4"> <?= $graveyard_id ?>
                                    </td>
                                <?php endif; ?>
                                <?php if ($graveyard_id < 1): ?>
                                    <td style="padding: 3px; text-align: left; width: 33%">Graveyard: <?= $graveyard_id ?></td>
                                <?php endif; ?>
                                <td style="padding: 3px; text-align: left; width: 33%">Timezone: <?= $timezone ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 34%">Time Type: <?= $time_type ?? "N/A" ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 3px; text-align: left; width: 33%">Graveyard
                                    Time: <?= $graveyard_time ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 33%">Shutdown: <?= $shutdowndelay ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 34%">Underworld: <?= $underworld ?? "N/A" ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 3px; text-align: left; width: 33%">Zone Type: <?= $ztype ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 33%">Exp: <?= $zone_exp_multiplier ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 34%">Max Z: <?= $max_z ?? "N/A" ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 3px; text-align: left; width: 33%">Ruleset: <a
                                            href="index.php?editor=server&z=<?= $currzone ?? "" ?>&zoneid=<?= $currzoneid ?? "" ?>&ruleset_id=<?= $ruleset ?>&action=28"> <?= $ruleset ?>
                                </td>
                                <td style="padding: 3px; text-align: left; width: 34%">Skip LoS: <?= isset($skip_los) ? $yesno[$skip_los] : "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 34%">Gravity: <?= $gravity ?? "N/A" ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 3px; text-align: left; width: 33%">Note: <?= $note ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 34%">Drag Aggro: <?= isset($dragaggro) ? $yesno[$dragaggro] : "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 34%">Never Idle: <?= isset($never_idle) ? $yesno[$never_idle] : "N/A" ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 3px; text-align: left; width: 33%">Music: <?= $music ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 33%">RandomLoc: <?= $random_loc ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 33%">Hotzone: <?= isset($hotzone) ? $yesno[$hotzone] : "N/A" ?></td>
                            </tr>
                        </table>
                    </fieldset>
                    <fieldset>
                        <legend><strong>Restrictions</strong></legend>
                        <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
                            <tr>
                                <td style="padding: 3px; text-align: left; width: 33%">Level: <?= $min_level ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 33%">Status: <?= $min_status ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 34%">Clients: <?= $maxclients ?? "N/A" ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 3px; text-align: left; width: 33%">
                                    Flag: <?php echo !empty($flag_needed) ? $flag_needed : "No"; ?></td>
                                <td style="padding: 3px; text-align: left; width: 33%">Bind: <?= isset($canbind) ? $bindallowed[$canbind] : "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 34%">Levitate: <?= isset($canlevitate) ? $yesno[$canlevitate] : "N/A" ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 3px; text-align: left; width: 33%">Outdoor: <?= isset($castoutdoor) ? $yesno[$castoutdoor] : "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 33%">Combat: <?= isset($cancombat) ? $yesno[$cancombat] : "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 34%">PEQZone: <?= isset($peqzone) ? $yesno[$peqzone] : "N/A" ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 3px; text-align: left; width: 33%">Pull Limit: <?= $pull_limit ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 33%">Suspend
                                    Buffs: <?= isset($suspendbuffs) ? $yesno[$suspendbuffs] : "N/A" ?></td>
                                <td style="padding: 3px; width: 34%;">&nbsp;</td>
                            </tr>
                        </table>
                    </fieldset>
                    <fieldset>
                        <legend><strong>Sky</strong></legend>
                        <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
                            <tr>
                                <td style="padding: 3px; text-align: left; width: 33%">Sky: <?= $sky ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 33%">Min Clip: <?= $minclip ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 34%">Max Clip: <?= $maxclip ?? "N/A" ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 3px; text-align: left; width: 33%">Fog Maxclip: <?= $fog_maxclip ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 33%">Fog Minclip: <?= $fog_minclip ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 34%">Fog Blue: <?= $fog_blue ?? "N/A" ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 3px; text-align: left; width: 33%">Fog Red: <?= $fog_red ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 33%">Fog Green: <?= $fog_green ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 34%">Fog
                                    Maxclip1: <?= $fog_maxclip1 ?? "N/A" ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 3px; text-align: left; width: 33%">Fog
                                    Minclip1: <?= $fog_minclip1 ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 33%">Fog Blue1: <?= $fog_blue1 ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 34%">Fog Red1: <?= $fog_red1 ?? "N/A" ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 3px; text-align: left; width: 33%">Fog Green1: <?= $fog_green1 ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 33%">Fog
                                    Maxclip2: <?= $fog_maxclip2 ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 34%">Fog
                                    Minclip2: <?= $fog_minclip1 ?? "N/A" ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 3px; text-align: left; width: 33%">Fog Blue2: <?= $fog_blue2 ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 33%">Fog Red2: <?= $fog_red2 ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 34%">Fog Green: <?= $fog_green2 ?? "N/A" ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 3px; text-align: left; width: 33%">Fog
                                    Maxclip3: <?= $fog_maxclip3 ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 33%">Fog
                                    Minclip3: <?= $fog_minclip3 ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 34%">Fog Blue3: <?= $fog_blue3 ?? "N/A" ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 3px; text-align: left; width: 33%">Fog Red3: <?= $fog_red3 ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 33%">Fog Green3: <?= $fog_green3 ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 34%">Fog Maclip4: <?= $fog_maxclip4 ?? "N/A" ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 3px; text-align: left; width: 33%">Fog
                                    Minclip4: <?= $fog_minclip4 ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 33%">Fog Blue4: <?= $fog_blue4 ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 34%">Fog Red4: <?= $fog_red4 ?? "N/A" ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 3px; text-align: left; width: 33%">Fog Green4: <?= $fog_green4 ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 33%">Fog Density: <?= $fog_density ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 34%">Skylock: <?= $skylock ?? "N/A" ?></td>
                            </tr>
                        </table>
                    </fieldset>
                    <fieldset>
                        <legend><strong>Weather</strong></legend>
                        <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
                            <tr>
                                <td style="padding: 3px; text-align: left; width: 25%">Rain C1: <?= $rain_chance1 ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 25%">Rain C2: <?= $rain_chance2 ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 25%">Rain C3: <?= $rain_chance3 ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 25%">Rain C4: <?= $rain_chance4 ?? "N/A" ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 3px; text-align: left; width: 25%">Rain D1: <?= $rain_duration1 ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 25%">Rain D2: <?= $rain_duration2 ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 25%">Rain D3: <?= $rain_duration3 ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 25%">Rain D4: <?= $rain_duration4 ?? "N/A" ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 3px; text-align: left; width: 25%">Snow C1: <?= $snow_chance1 ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 25%">Snow C2: <?= $snow_chance2 ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 25%">Snow C3: <?= $snow_chance3 ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 25%">Snow C4: <?= $snow_chance4 ?? "N/A" ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 3px; text-align: left; width: 25%">Snow D1: <?= $snow_duration1 ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 25%">Snow D2: <?= $snow_duration2 ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 25%">Snow D3: <?= $snow_duration3 ?? "N/A" ?></td>
                                <td style="padding: 3px; text-align: left; width: 25%">Snow D4: <?= $snow_duration4 ?? "N/A" ?></td>
                            </tr>
                        </table>
                    </fieldset>
                </td>
            </tr>
        </table>
    </div>
</div>
