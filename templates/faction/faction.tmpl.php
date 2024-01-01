  <div class="center">
    <table style="border: 1px solid black; background-color: #CCC;">
      <tr><td colspan="3"><b>Legend:</b></td></tr>
      <tr><td style="text-align: right;">1100 to 2000</td><td>&nbsp;</td><td style="text-align: left;">Ally</td></tr>
      <tr><td style="text-align: right;">750 to 1099</td><td>&nbsp;</td><td style="text-align: left;">Warmly</td></tr>
      <tr><td style="text-align: right;">500 to 749</td><td>&nbsp;</td><td style="text-align: left;">Kindly</td></tr>
      <tr><td style="text-align: right;">100 to 499</td><td>&nbsp;</td><td style="text-align: left;">Amiably</td></tr>
      <tr><td style="text-align: right;">0 to 99</td><td>&nbsp;</td><td style="text-align: left;">Indifferently</td></tr>
      <tr><td style="text-align: right;">-100 to -1</td><td>&nbsp;</td><td style="text-align: left;">Apprehensively</td></tr>
      <tr><td style="text-align: right;">-500 to -101</td><td>&nbsp;</td><td style="text-align: left;">Dubiously</td></tr>
      <tr><td style="text-align: right;">-750 to -501</td><td>&nbsp;</td><td style="text-align: left;">Threateningly</td></tr>
      <tr><td style="text-align: right;">-751 to -2000</td><td>&nbsp;</td><td style="text-align: left;">Ready to attack</td></tr>
    </table><br/><br/>
  </div>
  <div style="border: 1px solid black; width: 600px; margin: auto;">
    <div class="edit_form_header" style="height: 16px; line-height: 16px;">
      <div style="float: right;">
	    <a href="index.php?editor=faction&fid=<?=$faction_info['id'] ?? ""?>&action=16"><img src="images/view_all.gif" alt="Eye Icon" title="Search for NPCs using this faction" style="border: 0;" /></a>
      </div>
      Faction Data for <?=$faction_info['name'] ?? "Unknown Name"?> (<?=$faction_info['id'] ?? "Unknown ID"?>)
    </div>
    <div class="edit_form_content">
      <fieldset style="width: 550px; margin: auto;">
        <legend><strong>Faction Info</strong></legend>
        <table style="width: 100%;">
          <tr>
            <th style="width: 10%;">ID</th>
            <th style="width: 35%;">Name</th>
            <th style="width: 15%;">Base</th>
            <th style="width: 10%;">See Illusion</th>
            <th style="width: 10%;">MinCap</th>
            <th style="width: 10%;">MaxCap</th>
          </tr>
          <tr>
            <td style="width: 10%; text-align: center;"><?=$faction_info['id'] ?? "Unknown"?></td>
            <td style="width: 35%; text-align: center;"><?=$faction_info['name'] ?? "Unknown"?></td>
            <td style="width: 15%; text-align: center;"><?=$faction_info['base'] ?? "Unknown"?></td>
            <td style="width: 10%; text-align: center;"><?=$yesno[$faction_info['see_illusion']] ?? "Unknown"?></td>
            <td style="width: 10%; text-align: center;"><?=$faction_info['min_cap'] ?? "Unknown"?></td>
            <td style="width: 10%; text-align: center;"><?=$faction_info['max_cap'] ?? "Unknown"?></td>
            <td style="width: 10%; text-align: right;"><a href="index.php?editor=faction&fid=<?=$faction_info['id'] ?? ""?>&action=1"><img src="images/c_table.gif" alt="Edit Table Icon" title="Edit this Faction" style="border: 0;"></a>&nbsp;<a onClick="return confirm('Really delete faction <?=$faction_info['id'] ?? "UNKNOWN"?>? This will also remove all faction mods.');" href="index.php?editor=faction&fid=<?=$faction_info['id'] ?? ""?>&action=6"><img src="images/remove3.gif" alt="Red X Icon" title="Delete this Faction" style="border: 0;"></a></td>
          </tr>
        </table>
      </fieldset>
      <fieldset style="width: 550px; margin: auto;">
        <legend><strong>Faction Mods</strong></legend>
          <?php
  if (isset($faction_mods)) {
?>
        <table style="width: 100%;">
          <tr>
            <th style="width: 15%;">ID</th>
            <th style="width: 15%;">Type</th>
            <th style="width: 30%;">Name</th>
            <th style="width: 10%;">Model</th>
            <th style="width: 10%;">Mod</th>
            <th style="width: 10%;">Effective<br/>Faction</th>
            <th style="width: 10%;"><a href="index.php?editor=faction&fid=<?=$faction_info['id'] ?? ""?>&action=20"><img src="images/add.gif" style="border: 0;" alt="Yellow Plus Icon" title="Create a new faction mod" /></a><br/></th>
          </tr>
            <?php
    foreach ($faction_mods as $mod) {
      $base = $faction_info['base'] ?? 0;
      $mod_type = deconstruct_mod($mod['mod_name']);
      $name = $mod_type['name'];
      $modval = $mod['mod'];
      if($faction_info['see_illusion'] == 0 && ($mod['mod_name'] == "r142" || $mod['mod_name'] == "r143"))
      {
        $base = 0;
      }
      else if($faction_info['see_illusion'] == 1 && ($mod['mod_name'] == "r142" || $mod['mod_name'] == "r143"))
      {
        $name = "Base Race";
        $base = 0;
        $modval = 0;
      }
?>
          <tr>
            <td style="width: 15%; text-align: center;"><?=$mod['id']?></td>
            <td style="width: 15%; text-align: center;"><?=$mod_type['category']?></td>
            <td style="width: 30%; text-align: center;"><?=$name?></td>
            <td style="width: 10%; text-align: center;"><?=$mod_type['model']?></td>
            <td style="width: 10%; text-align: center;"><?=$modval?></td>
            <td style="width: 10%; text-align: center;"><?php echo $base + $modval?></td>
            <td style="width: 10%; text-align: center;"><a href="index.php?editor=faction&fid=<?=$faction_info['id']?>&fmid=<?=$mod['id']?>&action=22"><img src="images/c_table.gif" alt="Edit Table Icon" title="Edit this Faction Mod" style="border: 0;"></a>&nbsp;<a onClick="return confirm('Really delete faction mod <?=$mod['id']?>?');" href="index.php?editor=faction&fid=<?=$faction_info['id']?>&fmid=<?=$mod['id']?>&action=24"><img src="images/remove3.gif" alt="Red X Icon" title="Delete this Faction Mod" style="border: 0;"></a></td>
          </tr>
        <?php
    }
?>
        </table>
      <?php
  }
  else {
?>
        <table style="width: 100%;">
          <tr>
            <td style="width: 90%; text-align: left;">No faction mods</td>
            <td style="width: 10%; text-align: right;"><a href="index.php?editor=faction&fid=<?=$faction_info['id'] ?? ""?>&action=20"><img src="images/add.gif" style="border: 0;" alt="Yellow Plus Icon" title="Create a new faction mod" /></a></td>
          </tr>
        </table>
      <?php
  }
?>
      </fieldset>
    </div>
  </div>
