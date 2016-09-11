  <center>
    <table style="border: 1px solid black; background-color: #CCC;">
      <tr><td colspan="3"><b>Legend:</b></td></tr>
      <tr><td align="right">1100 to 2000</td><td>&nbsp;</td><td align="left">Ally</td></tr>
      <tr><td align="right">750 to 1099</td><td>&nbsp;</td><td align="left">Warmly</td></tr>
      <tr><td align="right">500 to 749</td><td>&nbsp;</td><td align="left">Kindly</td></tr>
      <tr><td align="right">100 to 499</td><td>&nbsp;</td><td align="left">Amiably</td></tr>
      <tr><td align="right">0 to 99</td><td>&nbsp;</td><td align="left">Indifferently</td></tr>
      <tr><td align="right">-100 to -1</td><td>&nbsp;</td><td align="left">Apprehensively</td></tr>
      <tr><td align="right">-500 to -101</td><td>&nbsp;</td><td align="left">Dubiously</td></tr>
      <tr><td align="right">-750 to -501</td><td>&nbsp;</td><td align="left">Threateningly</td></tr>
      <tr><td align="right">-751 to -2000</td><td>&nbsp;</td><td align="left">Ready to attack</td></tr>
    </table><br/><br/>
  </center>
  <div style="border: 1px solid black; width: 500px; margin: auto;">
    <div class="edit_form_header" style="height: 16px; line-height: 16px;">
      <div style="float: right;">
	    <a href="index.php?editor=faction&fid=<?=$faction_info['id']?>&action=16"><img src="images/view_all.gif" title="Search for NPCs using this faction" border="0" /></a>
      </div>
      Faction Data for <?=$faction_info['name']?> (<?=$faction_info['id']?>)
    </div>
    <div class="edit_form_content">
      <fieldset style="width: 450px; margin: auto;">
        <legend><strong>Faction Info</strong></legend>
        <table width="100%">
          <tr>
            <th width="15%">ID</th>
            <th width="40%">Name</th>
            <th width="15%">Base</th>
            <th width="10%">See Illusion</th>
          </tr>
          <tr>
            <td width="15%" align="center"><?=$faction_info['id']?></td>
            <td width="40%" align="center"><?=$faction_info['name']?></td>
            <td width="15%" align="center"><?=$faction_info['base']?></td>
            <td width="15%" align="center"><?=$yesno[$faction_info['see_illusion']]?></td>
            <td width="10%" align="right"><a href="index.php?editor=faction&fid=<?=$faction_info['id']?>&action=1"><img src="images/c_table.gif" title="Edit this Faction" border="0"></a>&nbsp;<a onClick="return confirm('Really delete faction <?=$faction_info['id']?>? This will also remove all faction mods.');" href="index.php?editor=faction&fid=<?=$faction_info['id']?>&action=6"><img src="images/remove3.gif" title="Delete this Faction" border="0"></a></td>
          </tr>
        </table>
      </fieldset>
      <fieldset style="width: 450px; margin: auto;">
        <legend><strong>Faction Mods</strong></legend>
<?
  if (isset($faction_mods)) {
?>
        <table width="100%">
          <tr>
            <th width="15%">ID</th>
            <th width="15%">Type</th>
            <th width="30%">Name</th>
            <th width="10%">Model</th>
            <th width="10%">Mod</th>
            <th width="10%">Effective<br/>Faction</th>
            <th width="10%"><a href="index.php?editor=faction&fid=<?=$faction_info['id']?>&action=20"><img src="images/add.gif" border="0" title="Create a new faction mod" /></a><br/></th>
          </tr>
<?
    foreach ($faction_mods as $mod) {
      $base = $faction_info['base'];
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
            <td width="15%" align="center"><?=$mod['id']?></td>
            <td width="15%" align="center"><?=$mod_type['category']?></td>
            <td width="30%" align="center"><?=$name?></td>
            <td width="10%" align="center"><?=$mod_type['model']?></td>
            <td width="10%" align="center"><?=$modval?></td>
            <td width="10%" align="center"><?echo $base + $modval?></td>
            <td width="10%" align="center"><a href="index.php?editor=faction&fid=<?=$faction_info['id']?>&fmid=<?=$mod['id']?>&action=22"><img src="images/c_table.gif" title="Edit this Faction Mod" border="0"></a>&nbsp;<a onClick="return confirm('Really delete faction mod <?=$mod['id']?>?');" href="index.php?editor=faction&fid=<?=$faction_info['id']?>&fmid=<?=$mod['id']?>&action=24"><img src="images/remove3.gif" title="Delete this Faction Mod" border="0"></a></td>
          </tr>
<?
    }
?>
        </table>
<?
  }
  else {
?>
        <table width="100%">
          <tr>
            <td width="90%" align="left">No faction mods</td>
            <td width="10%" align="right"><a href="index.php?editor=faction&fid=<?=$faction_info['id']?>&action=20"><img src="images/add.gif" border="0" title="Create a new faction mod" /></a></td>
          </tr>
        </table>
<?
  }
?>
      </fieldset>
    </div>
  </div>
