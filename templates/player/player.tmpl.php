<div class="table_container">
  <div class="table_header">
    <div style="float:right">
      <a href="index.php?editor=inv&playerid=<?=$playerid?>&action=1"><img src="images/contents.png" border="0" title="View Inventory"></a>&nbsp;
      <a href="index.php?editor=keys&playerid=<?=$playerid?>&action=1"><img src="images/key.png" border="0" title="View Keyring"></a>&nbsp;
      <a onClick="javascript:alert('Not yet!');"><img src="images/c_table.gif" border="0" title="Edit this Player" /></a>&nbsp;
      <a onClick="return confirm('Really delete player <?=trim($name)?> (<?=$playerid?>)?');" href="index.php?editor=player&playerid=<?=$playerid?>&action=4"><img src="images/table.gif" border="0" title="Delete this Player" /></a>
    </div>
    <?=$id?> - <?echo trim($title) . " " . trim($name) . " " . trim($last_name) . " " . trim($suffix);?>
  </div>
  <div class="table_content">
    <?if ($online) echo "<h2><center><font color='red'>WARNING! THIS PLAYER IS ONLINE... (" . $entityid . ")</font></center></h2>";?>
    <table cellspacing="0" border="0" width="100%">
      <tr>
        <td width="30%">
          <table cellspacing="0" border="0" width="100%">
            <tr>
              <td>
                <fieldset>
                  <legend><strong>Character Name</strong></legend>
                  First Name: <?=trim($name)?><br/>
                  Last Name: <?=trim($last_name)?><br/>
                  Title: <?=trim($title)?><br/>
                  Suffix: <?=trim($suffix)?><br/>
                </fieldset>
                <fieldset>
                  <legend><strong>Account Info</strong></legend>
                  Account ID: <a href="index.php?editor=account&acctid=<?=$account_id?>"><?=$account_id?></a><br/>
                  Character ID: <?=$id?><br/>
                  LS Name: <a href="index.php?editor=account&acctid=<?=$account_id?>"><?=$lsname?></a><br/>
                  LS ID: <?=$lsaccount?><br/>
                  Last On: <?=get_real_time($last_login)?><br/>
                  Time Played: <?=$time_played?> minutes<br/>
                  GM: <?=$yesno[$gm]?><br/>
                  Status: <?=$status?><br/>
                </fieldset>
                <fieldset>
                  <legend><strong>Location Info</strong></legend>
                  Zone: <?=getZoneName($zone_id)?> (<?=$zone_id?>)<br/>
                  Instance: <?echo ($zone_instance > 0) ? $zone_instance : "None";?><br/>
                  X: <?=$x?><br/>
                  Y: <?=$y?><br/>
                  Z: <?=$z?><br/>
                  Heading: <?=$heading?><br/>
                  <center>[<a href="index.php?editor=player&playerid=<?=$id?>&action=5">Move Player</a>]</center>
                </fieldset>
                <fieldset>
                  <legend><strong>Guild Info</strong></legend>
                  Guild: <?echo ($guild_id > 0) ? '<a href="index.php?editor=guild&guildid=' . $guild_id . '">' . getGuildName($guild_id) . '</a>' : "None";?><br/>
                  Guild Rank: <?echo ($guild_id > 0) ? $guild_rank : "N/A";?><br/>
                </fieldset>
                <fieldset>
                  <legend><strong>Vitals</strong></legend>
                  HP: <?=$cur_hp?><br/>
                  Mana: <?=$mana?><br/>
                  Endurance: <?=$endurance?><br/>
                  Air: <?=$air_remaining?><br/>
                  Hunger: <?=$hunger_level?><br/>
                  Thirst: <?=$thirst_level?><br/>
                </fieldset>
                <fieldset>
                  <legend><strong>Consent Info</strong></legend>
                  Group Consent: <?=$yesno[$group_auto_consent]?><br/>
                  Raid Consent: <?=$yesno[$raid_auto_consent]?><br/>
                  Guild Consent: <?=$yesno[$guild_auto_consent]?><br/>
                </fieldset>
                <fieldset>
                  <legend><strong>Other Info</strong></legend>
                  Birth: <?=get_real_time($birthday)?><br/>
                  Anonymous: <?=$anonymity[$anon]?><br/>
                  Drunkness: <?=$intoxication?><br/>
                  Autosplit: <?=$yesno[$autosplit_enabled]?>
                </fieldset>
              </td>
            </tr>
          </table>
        </td>
        <td>
          <table cellspacing="0" border="0" width="100%">
            <tr>
              <td>
                <fieldset>
                  <legend><strong>Basic Info</strong></legend>
                  <table width="100%" border="0" cellpadding="3" cellspacing="0">
                    <tr>
                      <td align="left">Level: <?=$level?></td>
                      <td align="left">Class: <?=$classes[$class]?></td>
                    </tr>
                    <tr>
                      <td align="left">Race: <?=$races[$race]?></td>
                      <td align="left">Deity: <?=$deities[$deity]?></td>
                    </tr>
                    <tr>
                      <td>Experience: <?=$exp?><br/></td>
                      <td>Practice Points: <?=$points?></td>
                    </tr>
                  </table>
                </fieldset>
              </td>
              <td>
                <fieldset>
                  <legend><strong>Stats</strong></legend>
                  <table width="100%" border="0" cellpadding="3" cellspacing="0">
                      <tr>
                        <td align="left" width="33%">STR: <?=$str?></td>
                        <td align="left" width="33%">STA: <?=$sta?></td>
                        <td align="left" width="34%">DEX: <?=$dex?></td>
                      </tr>
                      <tr>
                        <td align="left" width="33%">AGI: <?=$agi?></td>
                        <td align="left" width="33%">INT: <?=$int?></td>
                        <td align="left" width="34%">WIS: <?=$wis?></td>
                      </tr>
                      <tr>
                        <td align="left" width="33%">CHA: <?=$cha?></td>
                        <td align="left" width="33%">&nbsp;</td>
                        <td align="left" width="34%">&nbsp;</td>
                      </tr>
                    </table>
                </fieldset>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <fieldset>
                  <legend><strong>Appearance</strong></legend>
                  <table width="100%" border="0" cellpadding="3" cellspacing="0">
                    <tr>
                      <td align="left" width="33%">Gender: <?=$genders[$gender]?></td>
                      <td align="left" width="33%">Hair Style: <?=$hair_style?></td>
                      <td align="left" width="34%">Hair Color: <?=$hair_color?></td> 
                    </tr>
                    <tr>
                      <td align="left" width="33%">Face: <?=$face?></td>
                      <td align="left" width="33%">Left Eye Color: <?=$eye_color_1?></td>
                      <td align="left" width="34%">Right Eye Color: <?=$eye_color_2?></td>
                    </tr>
                    <tr>
                      <td align="left" width="33%">Beard: <?=$beard?></td>
                      <td align="left" width="33%">Beard Color: <?=$beard_color?></td>
                      <td align="left" width="34%">&nbsp;</td>
                    </tr>
                  </table>
                </fieldset>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <fieldset>
                  <legend><strong>Cash</strong></legend>
                  <table width="100%" border="0" cellpadding="3" cellspacing="0">
                    <tr>
                      <td width="33%"><u>Body</u></td>
                      <td width="33%"><u>Cursor</u></td>
                      <td width="34%"><u>Bank</u></td>
                    <tr>
                      <td>Platinum: <?=$currency['platinum']?></td>
                      <td>Platinum: <?=$currency['platinum_cursor']?></td>
                      <td>Platinum: <?=$currency['platinum_bank']?></td>
                    </tr>
                    <tr>
                      <td>Gold: <?=$currency['gold']?></td>
                      <td>Gold: <?=$currency['gold_cursor']?></td>
                      <td>Gold: <?=$currency['gold_bank']?></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>Silver: <?=$currency['silver']?></td>
                      <td>Silver: <?=$currency['silver_cursor']?></td>
                      <td>Silver: <?=$currency['silver_bank']?></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>Copper: <?=$currency['copper']?></td>
                      <td>Copper: <?=$currency['copper_cursor']?></td>
                      <td>Copper: <?=$currency['copper_bank']?></td>
                      <td>&nbsp;</td>
                    </tr>
                  </table>
                </fieldset>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <fieldset>
                  <legend><strong>PVP Info</strong></legend>
                  <table width="100%" border="0" cellpadding="3" cellspacing="0">
                    <tr>
                      <td>PVP: <?=$yesno[$pvp_status]?></td>
                      <td>PVP2: <?=$yesno[$pvp2]?></td>
                      <td>PVP Kills: <?=$pvp_kills?></td>
                      <td>PVP Deaths: <?=$pvp_deaths?></td>
                    </tr>
                    <tr>
                      <td colspan="2">PVP Type: <?=$pvp_type?></td>
                      <td>Kill Streak: <?=$pvp_best_kill_streak?></td>
                      <td>Death Streak: <?=$pvp_worst_death_streak?></td>
                    </tr>
                    <tr>
                      <td colspan="2">Available PVP Points: <?=$pvp_current_points?></td>
                      <td colspan="2">Current Kill Streak: <?=$pvp_current_kill_streak?></td>
                    </tr>
                    <tr>
                      <td colspan="2">Total PVP Points: <?=$pvp_career_points?></td>
                      <td colspan="2">&nbsp;</td>
                    </tr>
                  </table>
                </fieldset>
              </td>
            </tr>
            <tr>
              <td>
                <fieldset>
                  <legend><strong>Alternate Advancement</strong></legend>
                  <table width="100%" border="0" cellpadding="3" cellspacing="0">
                    <tr>
                      <td>AA Exp: <?=$aa_exp?></td>
                    </tr>
                    <tr>
                      <td>AA Points: <?=$aa_points?></td>
                    </tr>
                    <tr>
                      <td>AA Spent: <?=$aa_points_spent?></td>
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
            <?echo ($inspect_message) ? $inspect_message : "None";?>
          </fieldset>
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <fieldset>
            <legend><strong>Skills</strong></legend>
            <table width="100%">
              <tr>
                <td width="60%">
                  <fieldset>
                    <legend><strong>Abilities</strong></legend>
                    <table width="100%">
                      <tr>
                        <td width="50%">
<?
  for ($x = 0; $x <= 3; $x++) {
    echo $x . " - " . $skilltypes[$x] . ": " . $skills[$x] . "<br/>";
  }
  for ($x = 6; $x <= 11; $x++) {
    echo $x . " - " . $skilltypes[$x] . ": " . $skills[$x] . "<br/>";
  }
  for ($x = 15; $x <= 17; $x++) {
    echo $x . " - " . $skilltypes[$x] . ": " . $skills[$x] . "<br/>";
  }
  for ($x = 19; $x <= 23; $x++) {
    echo $x . " - " . $skilltypes[$x] . ": " . $skills[$x] . "<br/>";
  }
  for ($x = 25; $x <= 30; $x++) {
    echo $x . " - " . $skilltypes[$x] . ": " . $skills[$x] . "<br/>";
  }
?>
                        </td>
                        <td width="50%" valign="top">
<?
  for ($x = 32; $x <= 40; $x++) {
    echo $x . " - " . $skilltypes[$x] . ": " . $skills[$x] . "<br/>";
  }
  echo "48 - " . $skilltypes[48] . ": " . $skills[48] . "<br/>";
  for ($x = 50; $x <= 53; $x++) {
    echo $x . " - " . $skilltypes[$x] . ": " . $skills[$x] . "<br/>";
  }
  echo "55 - " . $skilltypes[55] . ": " . $skills[55] . "<br/>";
  echo "62 - " . $skilltypes[62] . ": " . $skills[62] . "<br/>";
  for ($x = 66; $x <= 67; $x++) {
    echo $x . " - " . $skilltypes[$x] . ": " . $skills[$x] . "<br/>";
  }
  for ($x = 71; $x <= 74; $x++) {
    echo $x . " - " . $skilltypes[$x] . ": " . $skills[$x] . "<br/>";
  }
?>
                        </td>
                      </tr>
                    </table>
                  </fieldset><br/>
                  <fieldset>
                    <legend><strong>Magic/Music</strong></legend>
                    <table width="100%">
                      <tr>
                        <td width="50%">
<?
  echo "4 - " . $skilltypes[4] . ": " . $skills[4] . "<br/>";
  echo "5 - " . $skilltypes[5] . ": " . $skills[5] . "<br/>";
  echo "13 - " . $skilltypes[13] . ": " . $skills[13] . "<br/>";
  echo "14 - " . $skilltypes[14] . ": " . $skills[14] . "<br/>";
  echo "18 - " . $skilltypes[18] . ": " . $skills[18] . "<br/>";
  echo "24 - " . $skilltypes[24] . ": " . $skills[24] . "<br/>";
  echo "31 - " . $skilltypes[31] . ": " . $skills[31] . "<br/>";
  for ($x = 43; $x <= 47; $x++) {
    echo $x . " - " . $skilltypes[$x] . ": " . $skills[$x] . "<br/>";
  }
?>
                        </td>
                        <td width="50%" valign="top">
<?
  echo "12 - " . $skilltypes[12] . ": " . $skills[12] . "<br/>";
  echo "41 - " . $skilltypes[41] . ": " . $skills[41] . "<br/>";
  echo "49 - " . $skilltypes[49] . ": " . $skills[49] . "<br/>";
  echo "54 - " . $skilltypes[54] . ": " . $skills[54] . "<br/>";
  echo "70 - " . $skilltypes[70] . ": " . $skills[70] . "<br/>";
?>
                        </td>
                      </tr>
                    </table>
                  </fieldset>
                </td>
                <td width="40%">
                  <fieldset>
                    <legend><strong>Languages</strong></legend>
<?
  for ($x = 0; $x <= 27; $x++) {
    echo $x . " - " . $langtypes[$x] . ": " . $languages[$x] . "<br/>";
  }
?>
                  </fieldset><br/>
                  <fieldset>
                    <legend><strong>Tradeskills</strong></legend>
<?
  for ($x = 56; $x <= 61; $x++) {
    echo $x . " - " . $skilltypes[$x] . ": " . $skills[$x] . "<br/>";
  }
  for ($x = 63; $x <= 65; $x++) {
    echo $x . " - " . $skilltypes[$x] . ": " . $skills[$x] . "<br/>";
  }
  for ($x = 68; $x <= 69; $x++) {
    echo $x . " - " . $skilltypes[$x] . ": " . $skills[$x] . "<br/>";
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
