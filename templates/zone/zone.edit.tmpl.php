    <form name="zone_edit" method="post" action="index.php?editor=zone&z=<?=$currzone ?? ""?>&zoneid=<?=$currzoneid ?? ""?>&action=3">
      <div class="edit_form">
        <div class="edit_form_header">
          Edit Zone: <?=$zoneidnumber ?? "#"?> (<?=$short_name ?? "Error: Undefined"?>)
        </div>
        <div class="edit_form_content">
          <div class="center">
            <fieldset>
              <legend><strong><span style="font-size: 16px">General</span></strong></legend>
              <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
                <tr>
                    <td style="padding: 3px; text-align: left; width: 28%"><label for="long_name">Long Name:</label><br><input type="text" id="long_name" name="long_name" size="20" value="<?=$long_name ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 18%"><label for="safe_x">Safe X:</label><br><input type="text" id="safe_x" name="safe_x" size="4" value="<?=$safe_x ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 18%"><label for="safe_y">Safe Y:</label><br><input type="text" id="safe_y" name="safe_y" size="4" value="<?=$safe_y ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 18%"><label for="safe_z">Safe Z:</label><br><input type="text" id="safe_z" name="safe_z" size="4" value="<?=$safe_z ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 18%"><label for="safe_heading">Safe Heading:</label><br><input type="text" id="safe_heading" name="safe_heading" size="7" value="<?=$safe_heading ?? ""?>"></td>
				</tr>
                <tr>
                    <td style="padding: 3px; text-align: left; width: 30%"><label for="file_name">File Name:</label><br><input type="text" id="file_name" name="file_name" size="20" value="<?=$file_name ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 23%"><label for="underworld">Underworld:</label><br><input type="text" id="underworld" name="underworld" size="7" value="<?=$underworld ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 23%"><label for="timezone">Timezone:</label><br><input type="text" id="timezone" name="timezone" size="7" value="<?=$timezone ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 24%"><label for="time_type">Time Type:</label><br><input type="text" id="time_type" name="time_type" size="7" value="<?=$time_type ?? ""?>"></td>
                </tr> 
                <tr>
                    <td style="padding: 3px; text-align: left; width: 30%"><label for="note">Note:</label><br><input type="text" id="note" name="note" size="20" value="<?=$note ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 23%"><label for="max_z">Max Z:</label><br><input type="text" id="max_z" name="max_z" size="7" value="<?=$max_z ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 23%"><label for="graveyard_id">Graveyard:</label><br><input type="text" id="graveyard_id" name="graveyard_id" size="7" value="<?=$graveyard_id?>"></td>
                    <td style="padding: 3px; text-align: left; width: 24%"><label for="graveyard_time">Graveyard Time:</label><br><input type="text" id="graveyard_time" name="graveyard_time" size="7" value="<?=$graveyard_time ?? ""?>"></td>
                </tr>
                <tr>
                    <td style="padding: 3px; text-align: left; width: 30%"><label for="map_file_name">Map:</label><br><input type="text" id="map_file_name" name="map_file_name" size="20" value="<?=$map_file_name ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 23%"><label for="ruleset">Ruleset:</label><br><input type="text" id="ruleset" name="ruleset" size="7" value="<?=$ruleset?>"></td>
                    <td style="padding: 3px; text-align: left; width: 23%"><label for="zone_exp_multiplier">Exp Multiplier:</label><br><input type="text" id="zone_exp_multiplier" name="zone_exp_multiplier" size="7" value="<?=$zone_exp_multiplier ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 24%"><label for="gravity">Gravity:</label><br><input type="text" id="gravity" name="gravity" size="7" value="<?=$gravity ?? ""?>"></td>
                </tr>
                <tr>
                    <td style="padding: 3px; text-align: left; width: 30%"><label for="music">Music:</label><br><input type="text" id="music" name="music" size="7" value="<?=$music ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 23%"><label for="random_loc">RandomLoc:</label><br><input type="text" id="random_loc" name="random_loc" size="7" value="<?=$random_loc ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 23%"><label for="ztype">Zone Type:</label><br><input type="text" id="ztype" name="ztype" size="7" value="<?=$ztype ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 24%"><label for="shutdowndelay">Shutdown:</label><br><input type="text" id="shutdowndelay" name="shutdowndelay" size="7" value="<?=$shutdowndelay ?? ""?>"></td>
                </tr>
                <tr>
                  <td style="padding: 3px; text-align: left; width: 25%">
                      <label for="hotzone">Hotzone:</label><br>
                    <select id="hotzone" name="hotzone">
                      <option value="0"<?php echo (isset($hotzone) && $hotzone == 0) ? " selected" : ""?>>No</option>
                      <option value="1"<?php echo (isset($hotzone) && $hotzone == 1) ? " selected" : ""?>>Yes</option>
                    </select>
                  </td>
                 <td style="padding: 3px; text-align: left; width: 25%">
                     <label for="skip_los">Skip LoS:</label><br>
                    <select id="skip_los" name="skip_los">
                      <option value="0"<?php echo (isset($skip_los) && $skip_los == 0) ? " selected" : ""?>>No</option>
                      <option value="1"<?php echo (isset($skip_los) && $skip_los == 1) ? " selected" : ""?>>Yes</option>
                    </select>
                  </td>			 
                  <td style="padding: 3px; text-align: left; width: 25%">
                      <label for="never_idle">Never Idle:</label><br>
                    <select id="never_idle" name="never_idle">
                      <option value="0"<?php echo (isset($never_idle) && $never_idle == 0) ? " selected" : ""?>>No</option>
                      <option value="1"<?php echo (isset($never_idle) && $never_idle == 1) ? " selected" : ""?>>Yes</option>
                    </select>
                  </td> 
                  <td style="padding: 3px; text-align: left; width: 25%">
                      <label for="dragaggro">Drag Aggro:</label><br>
                    <select id="dragaggro" name="dragaggro">
                      <option value="0"<?php echo (isset($dragaggro) && $dragaggro == 0) ? " selected" : ""?>>No</option>
                      <option value="1"<?php echo (isset($dragaggro) && $dragaggro == 1) ? " selected" : ""?>>Yes</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td style="padding: 3px; text-align: left; width: 25%">
                      <label for="suspendbuffs">Suspend Buffs:</label><br>
                    <select id="suspendbuffs" name="suspendbuffs">
                      <option value="0"<?php echo (isset($suspendbuffs) && $suspendbuffs == 0) ? " selected" : ""?>>No</option>
                      <option value="1"<?php echo (isset($suspendbuffs) && $suspendbuffs == 1) ? " selected" : ""?>>Yes</option>
                    </select>
                  </td>
                  <td style="padding: 3px; text-align: left; width: 25%">
                      <label for="type">Type:</label><br>
                    <select id="type" name="type">
                        <?php foreach($zonetype as $key=> $value):?>
                      <option value="<?=$key?>"<?php echo (isset($type) && $key == $type)? " selected" : "";?>> <?=$value?></option>
                        <?php endforeach;?>
                    </select>
                  </td>
                  <td style="padding: 3px; text-align: left; width: 25%">
                      <label for="expansion">Expansion:</label><br>
                    <select id="expansion" name="expansion">
                        <?php foreach($eqexpansions as $key=> $value):?>
                      <option value="<?=$key?>"<?php echo (isset($expansion) && $key == $expansion)? " selected" : "";?>> <?=$value?></option>
                        <?php endforeach;?>
                    </select>
                  </td>
                </tr>
              </table>
            </fieldset><br>
            <fieldset>
              <legend><strong><span style="font-size: 16px;">Restrictions</span></strong></legend>
              <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
                <tr>
                    <td style="padding: 3px; text-align: left; width: 20%"><label for="min_level">Level:</label><br><input type="text" id="min_level" name="min_level" size="7" value="<?=$min_level ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 20%"><label for="min_status">Status:</label><br><input type="text" id="min_status" name="min_status" size="7" value="<?=$min_status ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 20%"><label for="maxclients">Max Clients:</label><br><input type="text" id="maxclients" name="maxclients" size="7" value="<?=$maxclients ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 20%"><label for="flag_needed">Flag:</label><br><input type="text" id="flag_needed" name="flag_needed" size="15" value="<?=$flag_needed ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 20%"><label for="pull_limit">Pull Limit:</label><br><input type="text" id="pull_limit" name="pull_limit" size="7" value="<?=$pull_limit ?? ""?>"></td>
                </tr>
                <tr>
                  <td style="padding: 3px; text-align: left; width: 20%">
                      <label for="canlevitate">Can Levitate:</label><br>
                    <select id="canlevitate" name="canlevitate">
                      <option value="0"<?php echo (isset($canlevitate) && $canlevitate == 0) ? " selected" : ""?>>No</option>
                      <option value="1"<?php echo (isset($canlevitate) && $canlevitate == 1) ? " selected" : ""?>>Yes</option>
                    </select>
                  </td>
                  <td style="padding: 3px; text-align: left; width: 20%">
                      <label for="castoutdoor">Outdoor:</label><br>
                    <select id="castoutdoor" name="castoutdoor">
                      <option value="0"<?php echo (isset($castoutdoor) && $castoutdoor == 0) ? " selected" : ""?>>No</option>
                      <option value="1"<?php echo (isset($castoutdoor) && $castoutdoor == 1) ? " selected" : ""?>>Yes</option>
                    </select>
                  </td>
                  <td style="padding: 3px; text-align: left; width: 20%">
                      <label for="cancombat">Can Combat:</label><br>
                    <select id="cancombat" name="cancombat">
                      <option value="0"<?php echo (isset($cancombat) && $cancombat == 0) ? " selected" : ""?>>No</option>
                      <option value="1"<?php echo (isset($cancombat) && $cancombat == 1) ? " selected" : ""?>>Yes</option>
                    </select>
                  </td>
                  <td style="padding: 3px; text-align: left; width: 20%">
                      <label for="peqzone">PEQ Zone:</label><br>
                    <select id="peqzone" name="peqzone">
                      <option value="0"<?php echo (isset($peqzone) && $peqzone == 0) ? " selected" : ""?>>No</option>
                      <option value="1"<?php echo (isset($peqzone) && $peqzone == 1) ? " selected" : ""?>>Yes</option>
                    </select>
                  </td>
                  <td style="padding: 3px; text-align: left; width: 20%">
                      <label for="canbind">Can Bind:</label><br>
                    <select id="canbind" name="canbind">
                      <option value="0"<?php echo (isset($canbind) && $canbind == 0) ? " selected" : ""?>>No</option>
                      <option value="1"<?php echo (isset($canbind) && $canbind == 1) ? " selected" : ""?>>Self</option>
                      <option value="2"<?php echo (isset($canbind) && $canbind == 2) ? " selected" : ""?>>Others</option>
                      <option value="3"<?php echo (isset($canbind) && $canbind == 3) ? " selected" : ""?>>Area</option>
                    </select>
                  </td>
                </tr>
              </table>
            </fieldset><br>
            <fieldset>
              <legend><strong><span style="font-size: 16px;">Sky</span></strong></legend>
              <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
                <tr>
                    <td style="padding: 3px; text-align: left; width: 14%"><label for="sky">Sky:</label><br><input type="text" id="sky" name="sky" size="5" value="<?=$sky ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 14%"><label for="minclip">Min Clip:</label><br><input type="text" id="minclip" name="minclip" size="5" value="<?=$minclip ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 14%"><label for="maxclip">Max Clip:</label><br><input type="text" id="maxclip" name="maxclip" size="5" value="<?=$maxclip ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 14%"><label for="fog_minclip">Fog Minclip:</label><br><input type="text" id="fog_minclip" name="fog_minclip" size="5" value="<?=$fog_minclip ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 14%"><label for="fog_maxclip">Fog Maxclip:</label><br><input type="text" id="fog_maxclip" name="fog_maxclip" size="5" value="<?=$fog_maxclip ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 15%"><label for="fog_blue">Fog Blue:</label><br><input type="text" id="fog_blue" name="fog_blue" size="5" value="<?=$fog_blue ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 15%"><label for="fog_red">Fog Red:</label><br><input type="text" id="fog_red" name="fog_red" size="5" value="<?=$fog_red ?? ""?>"></td>
                </tr>
                <tr>
                    <td style="padding: 3px; text-align: left; width: 14%"><label for="fog_green">Fog Green:</label><br><input type="text" id="fog_green" name="fog_green" size="5" value="<?=$fog_green ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 14%"><label for="fog_minclip1">Fog Minclip1:</label><br><input type="text" id="fog_minclip1" name="fog_minclip1" size="5" value="<?=$fog_minclip1 ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 14%"><label for="fog_maxclip1">Fog Maxclip1:</label><br><input type="text" id="fog_maxclip1" name="fog_maxclip1" size="5" value="<?=$fog_maxclip1 ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 14%"><label for="fog_blue1">Fog Blue1:</label><br><input type="text" id="fog_blue1" name="fog_blue1" size="5" value="<?=$fog_blue1 ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 14%"><label for="fog_red1">Fog Red1:</label><br><input type="text" id="fog_red1" name="fog_red1" size="5" value="<?=$fog_red1 ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 15%"><label for="fog_green1">Fog Green1:</label><br><input type="text" id="fog_green1" name="fog_green1" size="5" value="<?=$fog_green1 ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 15%"><label for="fog_minclip2">Fog Minclip2:</label><br><input type="text" id="fog_minclip2" name="fog_minclip2" size="5" value="<?=$fog_minclip2 ?? ""?>"></td>
                </tr>
                <tr>
                    <td style="padding: 3px; text-align: left; width: 14%"><label for="fog_maxclip2">Fog Maxclip2:</label><br><input type="text" id="fog_maxclip2" name="fog_maxclip2" size="5" value="<?=$fog_maxclip2 ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 14%"><label for="fog_blue2">Fog Blue2:</label><br><input type="text" id="fog_blue2" name="fog_blue2" size="5" value="<?=$fog_blue2 ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 14%"><label for="fog_red2">Fog Red2:</label><br><input type="text" id="fog_red2" name="fog_red2" size="5" value="<?=$fog_red2 ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 14%"><label for="fog_green2">Fog Green2:</label><br><input type="text" id="fog_green2" name="fog_green2" size="5" value="<?=$fog_green2 ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 14%"><label for="fog_minclip3">Fog Minclip3:</label><br><input type="text" id="fog_minclip3" name="fog_minclip3" size="5" value="<?=$fog_minclip3 ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 15%"><label for="fog_maxclip3">Fog Maxclip3:</label><br><input type="text" id="fog_maxclip3" name="fog_maxclip3" size="5" value="<?=$fog_maxclip3 ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 15%"><label for="fog_blue3">Fog Blue3:</label><br><input type="text" id="fog_blue3" name="fog_blue3" size="5" value="<?=$fog_blue3 ?? ""?>"></td>
                </tr>
                <tr>
                    <td style="padding: 3px; text-align: left; width: 14%"><label for="fog_red3">Fog Red3:</label><br><input type="text" id="fog_red3" name="fog_red3" size="5" value="<?=$fog_red3 ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 14%"><label for="fog_green3">Fog Green3:</label><br><input type="text" id="fog_green3" name="fog_green3" size="5" value="<?=$fog_green3 ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 14%"><label for="fog_minclip4">Fog Minclip4:</label><br><input type="text" id="fog_minclip4" name="fog_minclip4" size="5" value="<?=$fog_minclip4 ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 14%"><label for="fog_maxclip4">Fog Maxclip4:</label><br><input type="text" id="fog_maxclip4" name="fog_maxclip4" size="5" value="<?=$fog_maxclip4 ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 14%"><label for="fog_blue4">Fog Blue4:</label><br><input type="text" id="fog_blue4" name="fog_blue4" size="5" value="<?=$fog_blue4 ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 15%"><label for="fog_red4">Fog Red4:</label><br><input type="text" id="fog_red4" name="fog_red4" size="5" value="<?=$fog_red4 ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 15%"><label for="fog_green4">Fog Green4:</label><br><input type="text" id="fog_green4" name="fog_green4" size="5" value="<?=$fog_green4 ?? ""?>"></td>
                </tr>
                <tr>
                    <td style="padding: 3px; text-align: left; width: 14%"><label for="fog_density">Fog Density:</label><br><input type="text" id="fog_density" name="fog_density" size="5" value="<?=$fog_density ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 14%"><label for="skylock">SkyLock:</label><br><input type="text" id="skylock" name="skylock" size="5" value="<?=$skylock ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 14%">&nbsp;</td>
                  <td style="padding: 3px; text-align: left; width: 14%">&nbsp;</td>
                  <td style="padding: 3px; text-align: left; width: 14%">&nbsp;</td>
                  <td style="padding: 3px; text-align: left; width: 15%">&nbsp;</td>
                  <td style="padding: 3px; text-align: left; width: 15%">&nbsp;</td>
                </tr>
              </table>
            </fieldset><br>
            <fieldset>
              <legend><strong><span style="font-size: 16px;">Weather</span></strong></legend>
              <table style="width: 100%; border: 0; border-collapse: collapse: border-spacing: 0;">
                <tr>
                    <td style="padding: 3px; text-align: left; width: 12%"><label for="rain_chance1">Rain C1:</label><br><input type="text" id="rain_chance1" name="rain_chance1" size="4" value="<?=$rain_chance1 ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 12%"><label for="rain_chance2">Rain C2:</label><br><input type="text" id="rain_chance2" name="rain_chance2" size="4" value="<?=$rain_chance2 ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 12%"><label for="rain_chance3">Rain C3:</label><br><input type="text" id="rain_chance3" name="rain_chance3" size="4" value="<?=$rain_chance3 ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 12%"><label for="rain_chance4">Rain C4:</label><br><input type="text" id="rain_chance4" name="rain_chance4" size="4" value="<?=$rain_chance4 ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 13%"><label for="rain_duration1">Rain D1:</label><br><input type="text" id="rain_duration1" name="rain_duration1" size="4" value="<?=$rain_duration1 ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 13%"><label for="rain_duration2">Rain D2:</label><br><input type="text" id="rain_duration2" name="rain_duration2" size="4" value="<?=$rain_duration2 ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 13%"><label for="rain_duration3">Rain D3:</label><br><input type="text" id="rain_duration3" name="rain_duration3" size="4" value="<?=$rain_duration3 ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 13%"><label for="rain_duration4">Rain D4:</label><br><input type="text" id="rain_duration4" name="rain_duration4" size="4" value="<?=$rain_duration4 ?? ""?>"></td>
                </tr>
                <tr>
                    <td style="padding: 3px; text-align: left; width: 12%"><label for="snow_chance1">Snow C1:</label><br><input type="text" id="snow_chance1" name="snow_chance1" size="4" value="<?=$snow_chance1 ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 12%"><label for="snow_chance2">Snow C2:</label><br><input type="text" id="snow_chance2" name="snow_chance2" size="4" value="<?=$snow_chance2 ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 12%"><label for="snow_chance3">Snow C3:</label><br><input type="text" id="snow_chance3" name="snow_chance3" size="4" value="<?=$snow_chance3 ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 12%"><label for="snow_chance4">Snow C4:</label><br><input type="text" id="snow_chance4" name="snow_chance4" size="4" value="<?=$snow_chance4 ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 13%"><label for="snow_duration1">Snow D1:</label><br><input type="text" id="snow_duration1" name="snow_duration1" size="4" value="<?=$snow_duration1 ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 13%"><label for="snow_duration2">Snow D2:</label><br><input type="text" id="snow_duration2" name="snow_duration2" size="4" value="<?=$snow_duration2 ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 13%"><label for="snow_duration3">Snow D3:</label><br><input type="text" id="snow_duration3" name="snow_duration3" size="4" value="<?=$snow_duration3 ?? ""?>"></td>
                    <td style="padding: 3px; text-align: left; width: 13%"><label for="snow_duration4">Snow D4:</label><br><input type="text" id="snow_duration4" name="snow_duration4" size="4" value="<?=$snow_duration4 ?? ""?>"></td>
                </tr>
              </table>
            </fieldset><br>
            <input type="hidden" name="zoneidnumber" value="<?=$zoneidnumber ?? ""?>">
            <input type="hidden" name="short_name" value="<?=$short_name ?? ""?>">
            <input type="submit" value="Submit Changes">
          </div>
        </div>
      </div>
    </form>
