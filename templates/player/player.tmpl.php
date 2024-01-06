<div class="table_container">
  <div class="table_header">
    <div style="float:right">
      <a href="index.php?editor=inv&playerid=<?=$playerid?>&action=1"><img src="images/contents.png" style="border: 0;" alt="Contents" title="View Inventory"></a>&nbsp;
      <a href="index.php?editor=keys&playerid=<?=$playerid?>&action=1"><img src="images/key.png" style="border: 0;" alt="Key" title="View Keyring"></a>&nbsp;
      <a onClick="alert('Not yet!');"><img src="images/c_table.gif" style="border: 0;" alt="Edit Table" title="Edit this Player" /></a>&nbsp;
      <a onClick="return confirm('Really delete player <?=trim($name ?? "")?> (<?=$playerid?>)?');" href="index.php?editor=player&playerid=<?=$playerid?>&action=4"><img src="images/table.gif" style="border: 0;" alt="Edit Table" title="Delete this Player" /></a>
    </div>
    <?=$id?> - <?php echo trim($title ?? "") . " " . trim($name ?? "") . " " . trim($last_name ?? "") . " " . trim($suffix ?? "");?>
  </div>
  <div class="table_content">
      <?php if (!empty($online)) echo "<h2><div class='center'><span style='color: #FF0000'>WARNING! THIS PLAYER IS ONLINE... (" . ($entityid ?? "Undefined") . ")</span></div></h2>";?>
    <table style="border-collapse: collapse; border-spacing: 0; border: 0; width: 100%;">
      <tr>
        <td style="width: 100%;">
          <table style="border-collapse: collapse; border-spacing: 0; border: 0; width: 100%;">
            <tr>
              <td>
                <fieldset>
                  <legend><strong>Character Name</strong></legend>
                  First Name: <?=trim($name ?? "")?><br/>
                  Last Name: <?=trim($last_name ?? "")?><br/>
                  Title: <?=trim($title ?? "N/A")?><br/>
                  Suffix: <?=trim($suffix ?? "N/A")?><br/>
                </fieldset>
                <fieldset>
                  <legend><strong>Account Info</strong></legend>
                  Account ID: <a href="index.php?editor=account&acctid=<?=$account_id ?? ""?>"><?=$account_id ?? ""?></a><br/>
                  Character ID: <?=$id?><br/>
                  LS Name: <a href="index.php?editor=account&acctid=<?=$account_id ?? ""?>"><?=$lsname ?? ""?></a><br/>
                  LS ID: <?=$lsaccount ?? ""?><br/>
                  Last On: <?=get_real_time($last_login ?? "")?><br/>
                  Time Played: <?=$time_played ?? ""?> minutes<br/>
                  GM: <?php $gm = $gm ?? 0; echo $yesno[$gm]?><br/>
                  Status: <?=$status ?? ""?><br/>
                </fieldset>
                <fieldset>
                  <legend><strong>Location Info</strong></legend>
                  Zone: <?=getZoneName($zone_id ?? "")?> (<?=$zone_id ?? ""?>)<br/>
                  X: <?=$x?><br/>
                  Y: <?=$y ?? ""?><br/>
                  Z: <?=$z?><br/>
                  Heading: <?=$heading ?? ""?><br/>
                  <div class="center">[<a href="index.php?editor=player&playerid=<?=$id?>&action=5">Move Player</a>]</div>
                </fieldset>
                <fieldset>
                  <legend><strong>Guild Info</strong></legend>
                  Guild: <?php echo (($guild_id ?? 0) > 0) ? '<a href="index.php?editor=guild&guildid=' . ($guild_id ?? "") . '">' . getGuildName($guild_id ?? "") . '</a>' : "None";?><br/>
                  Guild Rank: <?php echo (($guild_id ?? 0) > 0) ? ($guild_rank ?? "N/A") : "N/A";?><br/>
                </fieldset>
                <fieldset>
                  <legend><strong>Vitals</strong></legend>
                  HP: <?=$cur_hp ?? ""?><br/>
                  Mana: <?=$mana ?? ""?><br/>
                  Endurance: <?=$endurance ?? ""?><br/>
                  Air: <?=$air_remaining ?? ""?><br/>
                  Hunger: <?=$hunger_level ?? ""?><br/>
                  Thirst: <?=$thirst_level ?? ""?><br/>
                </fieldset>
                <fieldset>
                  <legend><strong>Consent Info</strong></legend>
                  Group Consent: <?php $group_auto_consent = $group_auto_consent ?? 0; echo $yesno[$group_auto_consent]?><br/>
                  Raid Consent: <?php $raid_auto_consent = $raid_auto_consent ?? 0; echo $yesno[$raid_auto_consent]?><br/>
                  Guild Consent: <?php $guild_auto_consent = $guild_auto_consent ?? 0; echo $yesno[$guild_auto_consent]?><br/>
                </fieldset>
                <fieldset>
                  <legend><strong>Other Info</strong></legend>
                  Birth: <?=get_real_time($birthday ?? "")?><br/>
                  Anonymous: <?php $anon = $anon ?? 0; echo $anonymity[$anon]?><br/>
                  Drunkenness: <?=$intoxication ?? ""?><br/>
                  Autosplit: <?php $autosplit_enabled = $autosplit_enabled ?? 0; echo$yesno[$autosplit_enabled]?>
                </fieldset>
              </td>
            </tr>
          </table>
        </td>
        <td>
          <table style="border-collapse: collapse: border-spacing: 0; border: 0; width: 100%;">
            <tr>
              <td>
                <fieldset>
                  <legend><strong>Basic Info</strong></legend>
                  <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
                    <tr>
                      <td style="padding: 3px; text-align: left;">Level: <?=$level?></td>
                      <td style="padding: 3px; text-align: left;">Class: <?php echo (!empty($class) ? $classes[$class] : "");?></td>
                    </tr>
                    <tr>
                      <td style="padding: 3px; text-align: left;">Race: <?php echo (!empty($race) ? $races[$race] : "");?></td>
                      <td style="padding: 3px; text-align: left;">Deity: <?=$deities[$deity]?></td>
                    </tr>
                    <tr>
                      <td style="padding: 3px;">Experience: <?=$exp?><br/></td>
                      <td style="padding: 3px;">Practice Points: <?=$points ?? ""?></td>
                    </tr>
                  </table>
                </fieldset>
              </td>
              <td>
                <fieldset>
                  <legend><strong>Stats</strong></legend>
                  <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
                      <tr>
                        <td style="padding: 3px; text-align: left; width: 33%;">STR: <?=$str ?? ""?></td>
                        <td style="padding: 3px; text-align: left; width: 33%;">STA: <?=$sta ?? ""?></td>
                        <td style="padding: 3px; text-align: left; width: 34%;">DEX: <?=$dex ?? ""?></td>
                      </tr>
                      <tr>
                        <td style="padding: 3px; text-align: left; width: 33%;">AGI: <?=$agi ?? ""?></td>
                        <td style="padding: 3px; text-align: left; width: 33%">INT: <?=$int ?? ""?></td>
                        <td style="padding: 3px; text-align: left; width: 34%">WIS: <?=$wis ?? ""?></td>
                      </tr>
                      <tr>
                        <td style="padding: 3px; text-align: left; width: 33%">CHA: <?=$cha ?? ""?></td>
                        <td style="padding: 3px; text-align: left; width: 33%">&nbsp;</td>
                        <td style="padding: 3px; text-align: left; width: 34%">&nbsp;</td>
                      </tr>
                    </table>
                </fieldset>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <fieldset>
                  <legend><strong>Appearance</strong></legend>
                  <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
                    <tr>
                      <td style="padding: 3px; text-align: left; width: 33%">Gender: <?php echo (!empty($gender) ? $genders[$gender] : "Undefined");?></td>
                      <td style="padding: 3px; text-align: left; width: 33%">Hair Style: <?=$hair_style ?? ""?></td>
                      <td style="padding: 3px; text-align: left; width: 34%">Hair Color: <?=$hair_color ?? ""?></td>
                    </tr>
                    <tr>
                      <td style="padding: 3px; text-align: left; width: 33%">Face: <?=$face ?? ""?></td>
                      <td style="padding: 3px; text-align: left; width: 33%">Left Eye Color: <?=$eye_color_1 ?? ""?></td>
                      <td style="padding: 3px; text-align: left; width: 34%">Right Eye Color: <?=$eye_color_2 ?? ""?></td>
                    </tr>
                    <tr>
                      <td style="padding: 3px; text-align: left; width: 33%">Beard: <?=$beard ?? ""?></td>
                      <td style="padding: 3px; text-align: left; width: 33%">Beard Color: <?=$beard_color ?? ""?></td>
                      <td style="padding: 3px; text-align: left; width: 34%">&nbsp;</td>
                    </tr>
                  </table>
                </fieldset>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <fieldset>
                  <legend><strong>Cash</strong></legend>
                  <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
                    <tr>
                      <td style="padding: 3px; width: 33%;"><u>Body</u></td>
                      <td style="padding: 3px; width: 33%;"><u>Cursor</u></td>
                      <td style="padding: 3px; width: 34%;"><u>Bank</u></td>
                    <tr>
                      <td style="padding: 3px;">Platinum: <?=$currency['platinum'] ?? "0"?></td>
                      <td style="padding: 3px;">Platinum: <?=$currency['platinum_cursor'] ?? "0"?></td>
                      <td style="padding: 3px;">Platinum: <?=$currency['platinum_bank'] ?? "0"?></td>
                    </tr>
                    <tr>
                      <td style="padding: 3px;">Gold: <?=$currency['gold'] ?? "0"?></td>
                      <td style="padding: 3px;">Gold: <?=$currency['gold_cursor'] ?? "0"?></td>
                      <td style="padding: 3px;">Gold: <?=$currency['gold_bank'] ?? "0"?></td>
                      <td style="padding: 3px;">&nbsp;</td>
                    </tr>
                    <tr>
                      <td style="padding: 3px;">Silver: <?=$currency['silver'] ?? "0"?></td>
                      <td style="padding: 3px;">Silver: <?=$currency['silver_cursor'] ?? "0"?></td>
                      <td style="padding: 3px;">Silver: <?=$currency['silver_bank'] ?? "0"?></td>
                      <td style="padding: 3px;">&nbsp;</td>
                    </tr>
                    <tr>
                      <td style="padding: 3px;">Copper: <?=$currency['copper'] ?? "0"?></td>
                      <td style="padding: 3px;">Copper: <?=$currency['copper_cursor'] ?? "0"?></td>
                      <td style="padding: 3px;">Copper: <?=$currency['copper_bank'] ?? "0"?></td>
                      <td style="padding: 3px;">&nbsp;</td>
                    </tr>
                  </table>
                </fieldset>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <fieldset>
                  <legend><strong>PVP Info</strong></legend>
                  <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
                    <tr>
                      <td style="padding: 3px;">PVP: <?php $pvp_status = $pvp_status ?? "0"; echo $yesno[$pvp_status]?></td>
                      <td style="padding: 3px;">PVP2: <?php $pvp2 = $pvp2 ?? "0"; echo $yesno[$pvp2]?></td>
                      <td style="padding: 3px;">PVP Kills: <?=$pvp_kills ?? "0"?></td>
                      <td style="padding: 3px;">PVP Deaths: <?=$pvp_deaths ?? "0"?></td>
                    </tr>
                    <tr>
                      <td style="padding: 3px;" colspan="2">PVP Type: <?=$pvp_type ?? "UND"?></td>
                      <td style="padding: 3px;">Kill Streak: <?=$pvp_best_kill_streak ?? "0"?></td>
                      <td style="padding: 3px;">Death Streak: <?=$pvp_worst_death_streak ?? "0"?></td>
                    </tr>
                    <tr>
                      <td style="padding: 3px;" colspan="2">Available PVP Points: <?=$pvp_current_points ?? "0"?></td>
                      <td style="padding: 3px;" colspan="2">Current Kill Streak: <?=$pvp_current_kill_streak ?? "0"?></td>
                    </tr>
                    <tr>
                      <td style="padding: 3px;" colspan="2">Total PVP Points: <?=$pvp_career_points ?? "0"?></td>
                      <td style="padding: 3px;" colspan="2">&nbsp;</td>
                    </tr>
                  </table>
                </fieldset>
              </td>
            </tr>
            <tr>
              <td>
                <fieldset>
                  <legend><strong>Alternate Advancement</strong></legend>
                  <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
                    <tr>
                      <td style="padding: 3px;">AA Exp: <?=$aa_exp ?? "0"?></td>
                    </tr>
                    <tr>
                      <td style="padding: 3px;">AA Points: <?=$aa_points ?? "0"?></td>
                    </tr>
                    <tr>
                      <td style="padding: 3px;">AA Spent: <?=$aa_points_spent ?? "0"?></td>
                    </tr>
                  </table>
                </fieldset>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <fieldset>
            <legend><strong>Inspect Message</strong></legend>
              <?php echo !empty($inspect_message) ? $inspect_message : "None";?>
          </fieldset>
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <fieldset>
            <legend><strong>Skills</strong></legend>
            <table style="width: 100%;">
              <tr>
                <td style="width: 60%;">
                  <fieldset>
                    <legend><strong>Abilities</strong></legend>
                    <table style="width: 100%;">
                      <tr>
                        <td style="width: 50%;">
                            <?php
                              for ($x = 0; $x <= 3; $x++) {
                                echo $x . " - " . $skilltypes[$x] . ": " . ($skills[$x] ?? "0") . "<br/>";
                              }
                              for ($x = 6; $x <= 11; $x++) {
                                echo $x . " - " . $skilltypes[$x] . ": " . ($skills[$x] ?? "0") . "<br/>";
                              }
                              for ($x = 15; $x <= 17; $x++) {
                                echo $x . " - " . $skilltypes[$x] . ": " . ($skills[$x] ?? "0") . "<br/>";
                              }
                              for ($x = 19; $x <= 23; $x++) {
                                echo $x . " - " . $skilltypes[$x] . ": " . ($skills[$x] ?? "0") . "<br/>";
                              }
                              for ($x = 25; $x <= 30; $x++) {
                                echo $x . " - " . $skilltypes[$x] . ": " . ($skills[$x] ?? "0"). "<br/>";
                              }
                            ?>
                        </td>
                        <td style="width: 50%; vertical-align: top;">
                            <?php
                              for ($x = 32; $x <= 40; $x++) {
                                echo $x . " - " . $skilltypes[$x] . ": " . ($skills[$x] ?? "0") . "<br/>";
                              }
                              echo "48 - " . $skilltypes[48] . ": " . ($skills[48] ?? "0") . "<br/>";
                              for ($x = 50; $x <= 53; $x++) {
                                echo $x . " - " . $skilltypes[$x] . ": " . ($skills[$x] ?? "0") . "<br/>";
                              }
                              echo "55 - " . $skilltypes[55] . ": " . ($skills[55] ?? "0") . "<br/>";
                              echo "62 - " . $skilltypes[62] . ": " . ($skills[62] ?? "0") . "<br/>";
                              for ($x = 66; $x <= 67; $x++) {
                                echo $x . " - " . $skilltypes[$x] . ": " . ($skills[$x] ?? "0") . "<br/>";
                              }
                              for ($x = 71; $x <= 74; $x++) {
                                echo $x . " - " . $skilltypes[$x] . ": " . ($skills[$x] ?? "0") . "<br/>";
                              }
                            ?>
                        </td>
                      </tr>
                    </table>
                  </fieldset><br/>
                  <fieldset>
                    <legend><strong>Magic/Music</strong></legend>
                    <table style="width: 100%;">
                      <tr>
                        <td style="width: 50%;">
                            <?php
                              echo "4 - " . $skilltypes[4] . ": " . ($skills[4] ?? "0") . "<br/>";
                              echo "5 - " . $skilltypes[5] . ": " . ($skills[5] ?? "0") . "<br/>";
                              echo "13 - " . $skilltypes[13] . ": " . ($skills[13] ?? "0") . "<br/>";
                              echo "14 - " . $skilltypes[14] . ": " . ($skills[14] ?? "0") . "<br/>";
                              echo "18 - " . $skilltypes[18] . ": " . ($skills[18] ?? "0") . "<br/>";
                              echo "24 - " . $skilltypes[24] . ": " . ($skills[24] ?? "0") . "<br/>";
                              echo "31 - " . $skilltypes[31] . ": " . ($skills[31] ?? "0") . "<br/>";
                              for ($x = 43; $x <= 47; $x++) {
                                echo $x . " - " . $skilltypes[$x] . ": " . ($skills[$x] ?? "0") . "<br/>";
                              }
                            ?>
                        </td>
                        <td style="width: 50%; vertical-align: top;">
                            <?php
                              echo "12 - " . $skilltypes[12] . ": " . ($skills[12] ?? "0") . "<br/>";
                              echo "41 - " . $skilltypes[41] . ": " . ($skills[41] ?? "0") . "<br/>";
                              echo "49 - " . $skilltypes[49] . ": " . ($skills[49] ?? "0") . "<br/>";
                              echo "54 - " . $skilltypes[54] . ": " . ($skills[54] ?? "0") . "<br/>";
                              echo "70 - " . $skilltypes[70] . ": " . ($skills[70] ?? "0") . "<br/>";
                            ?>
                        </td>
                      </tr>
                    </table>
                  </fieldset>
                </td>
                <td style="width: 40%;">
                  <fieldset>
                    <legend><strong>Languages</strong></legend>
                      <?php
                          $languages = $languages ?? array();
                          for ($x = 0; $x <= 27; $x++) {
                            echo $x . " - " . $langtypes[$x] . ": " . ($languages[$x] ?? "0") . "<br/>";
                          }
                      ?>
                  </fieldset><br/>
                  <fieldset>
                    <legend><strong>Tradeskills</strong></legend>
                      <?php
                          for ($x = 56; $x <= 61; $x++) {
                            echo $x . " - " . $skilltypes[$x] . ": " . ($skills[$x] ?? "0") . "<br/>";
                          }
                          for ($x = 63; $x <= 65; $x++) {
                            echo $x . " - " . $skilltypes[$x] . ": " . ($skills[$x] ?? "0") . "<br/>";
                          }
                          for ($x = 68; $x <= 69; $x++) {
                            echo $x . " - " . $skilltypes[$x] . ": " . ($skills[$x] ?? "0") . "<br/>";
                          }
                    ?>
                  </fieldset>
                </td>
              </tr>
            </table>
          </fieldset>
        </td>
      </tr>
    </table>
  </div>
</div>
