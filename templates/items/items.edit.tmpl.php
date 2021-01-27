<?if($errors != ''):?>
  <?foreach($errors as $error):?>
    <div class='error'>
      <table width="100%">
        <tr>
          <td valign='middle' width="30px">
            <img src='images/caution.gif'>
          </td>
          <td style="padding:0px 5px;">
            <?=$error?>
          </td>
        </tr>
      </table>
    </div>
  <?endforeach;?>
<?endif;?>
  <form name="item_edit" method="post" action="index.php?editor=items&id=<?=$id?>&action=6">
    <div class="edit_form">
      <div class="edit_form_header">
        Edit Item - <?=$id?> (<a href="http://lucy.allakhazam.com/item.html?id=<?=$id?>" target="_blank">Lucy</a>)
        <div style="float:right">
          <a href="index.php?editor=items&action=8"><img src="images/add.gif" border="0" title="Add an Item"></a>
          <a href="index.php?editor=items&id=<?=$id?>&action=7" onClick="return confirm('Really Copy Item <?=$id?>?');"><img src="images/last.gif" border="0" title="Copy this Item"></a>
          <a href="index.php?editor=items&id=<?=$id?>&action=5" onClick="return confirm('Really delete Item <?=$id?>?');"><img src="images/table.gif" border="0" title="Delete this Item"></a>
        </div>
      </div>
      <div class="edit_form_content">
        <fieldset style="text-align: left;">
          <legend><strong><font size="4">General</font></strong></legend>
          <input type="hidden" name="id" value="<?=$id?>">
          <table width="100%" border="0" cellpadding="3" cellspacing="0">
            <tr>
              <td align="left" width="50%">Name:<br/><input type="text" name="itemname" size="45" value="<?=$itemname?>"></td>
              <td align="left" width="50%">Type:<br/>
                <select name="itemtype" style="width:265px;">
<?foreach($itemtypes as $k => $v):?>
                  <option value="<?=$k?>"<? echo ($k == $itemtype) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
<?endforeach;?>
                </select>
              </td>
            </tr>
          </table>
          <table width="100%" border="0" cellpadding="3" cellspacing="0">
            <tr>
              <td align="left" width="50%">Lore Name: (* - Lore # - Artifact)<br/><input type="text" name="lore" size="45" value="<?=$lore?>"></td>
              <td align="left" width="50%">Class:<br/>
                <select name="itemclass">
                  <option value="0"<?echo ($itemclass == 0) ? " selected" : ""?>>Common Item</option>
                  <option value="1"<?echo ($itemclass == 1) ? " selected" : ""?>>Container</option>
                  <option value="2"<?echo ($itemclass == 2) ? " selected" : ""?>>Book</option>
                </select>
              </td>
            </tr>
          </table>
          <table width="100%" border="0" cellpadding="3" cellspacing="0">
            <tr>
              <td align="left" width="34%">Stackable:<br/><input type="text" name="stackable" size="10" value="<?=$stackable?>"></td>
              <td align="left" width="33%">Stacksize:<br/><input type="text" name="stacksize" size="10" value="<?=$stacksize?>"></td>
              <td align="left" width="33%">Charges:<br/><input type="text" name="maxcharges" size="10" value="<?=$maxcharges?>"></td>
            </tr>
          </table>
          <table width="100%" border="0" cellpadding="3" cellspacing="0">
            <tr>
              <td align="left" width="33%"><?echo ($filename != '') ? '<a href="index.php?editor=items&id=' . $id . '&name=' . $filename . '&action=3">Book Name:</a>' : 'Book Name:'?><br/><input type="text" name="filename" size="25" value="<?=$filename?>"/></td>
              <td align="left" width="33%">Book:<br/>
                <select name="book">
                  <option value="0"<?echo ($book == 0) ? " selected" : ""?>>No</option>
                  <option value="1"<?echo ($book == 1) ? " selected" : ""?>>Yes</option>
                  <option value="2"<?echo ($book == 2) ? " selected" : ""?>>Message</option>
                </select>
              </td>
              <td align="left" width="33%">Booktype:<br/><input type="text" name="booktype" size="10" value="<?=$booktype?>"/></td>
            </tr>
          </table>
          <table width="100%" border="0" cellpadding="3" cellspacing="0">
            <tr>
              <td align="left" width="25%">Bag Size:<br/>
                <select class="left" name="bagsize">
<?foreach($itembagsize as $k => $v):?>
                  <option value="<?=$k?>"<? echo ($k == $bagsize) ? " selected" : ""?>><?=$v?></option>
<?endforeach;?>
                </select>
              </td>
              <td align="left" width="25%">Bag Slots:<br/><input type="text" name="bagslots" size="10" value="<?=$bagslots?>"></td>
              <td align="left" width="25%">Bag Weight Reduction:<br/><input type="text" name="bagwr" size="10" value="<?=$bagwr?>"></td>
              <td align="left" width="25%">Bag Type:<br/>
                <select class="left" name="bagtype">
<?foreach($world_containers as $k => $v):?>
                  <option value="<?=$k?>"<? echo ($k == $bagtype) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
<?endforeach;?>
                </select>
              </td>
            </tr>
          </table>
        </fieldset>
        <fieldset>
          <legend><strong><font size="4">Restrictions</font></strong></legend>
          <table width="100%" border="0" cellpadding="3" cellspacing="0">
            <tr>
              <td align="left" width="20%">No Drop:<br/>
                <select name="nodrop">
                  <option value="1"<?echo ($nodrop == 1) ? " selected" : ""?>>No</option>
                  <option value="0"<?echo ($nodrop == 0) ? " selected" : ""?>>Yes</option>
                </select>
              </td>
              <td align="left" width="20%">No Rent:<br/>
                <select name="norent">
                  <option value="1"<?echo ($norent == 1) ? " selected" : ""?>>No</option>
                  <option value="0"<?echo ($norent == 0) ? " selected" : ""?>>Yes</option>
                  <option value="255"<?echo ($norent == 255) ? " selected" : ""?>>255</option>
                </select>
              </td>
              <td align="left" width="20%">Magic:<br/>
                <select name="magic">
                  <option value="0"<?echo ($magic == 0) ? " selected" : ""?>>No</option>
                  <option value="1"<?echo ($magic == 1) ? " selected" : ""?>>Yes</option>
                </select>
              </td>
              <td align="left" width="20%">Tradeskill:<br/>
                <select name="tradeskills">
                  <option value="0"<?echo ($tradeskills == 0) ? " selected" : ""?>>No</option>
                  <option value="1"<?echo ($tradeskills == 1) ? " selected" : ""?>>Yes</option>
                </select>
              <td align="left" width="20%">Quest:<br/>
                <select name="questitemflag">
                  <option value="0"<?echo ($questitemflag == 0) ? " selected" : ""?>>No</option>
                  <option value="1"<?echo ($questitemflag == 1) ? " selected" : ""?>>Yes</option>
                </select>
              </td>
            </tr>
            <tr>
              <td align="left" width="16%">FV No Drop:<br/>
                <select name="fvnodrop">
                  <option value="0"<?echo ($fvnodrop== 0) ? " selected" : ""?>>No</option>
                  <option value="1"<?echo ($fvnodrop == 1) ? " selected" : ""?>>Yes</option>
                </select>
              </td>
              <td align="left" width="16%">GM Flag:<br/>
			         <select class="left" name="gmflag">
			         <?foreach($gmflagtype as $k => $v):?>
			           <option value="<?=$k?>"<? echo ($k == $gmflag) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
			         <?endforeach;?>
			        </select>
              </td>
			       <td align="left" width="16%">Soulbound:<br/>
			         <select class="left" name="soulbound">
			           <option value="0"<?echo ($soulbound == 0) ? " selected" : ""?>>No</option>
                  <option value="1"<?echo ($soulbound == 1) ? " selected" : ""?>>Yes</option>
			         </select>
             </td>
            </tr>
            </table>
            <table width="100%" border="0" cellpadding="3" cellspacing="0">
            <tr>
              <td align="left" width="33%">Req Level:<br/><input type="text" name="reqlevel" size="5" value="<?=$reqlevel?>"></td>
              <td align="left" width="33%">Rec Level:<br/><input type="text" name="reclevel" size="5" value="<?=$reclevel?>"></td>
              <td align="left" width="34%">Rec Skill:<br/><input type="text" name="recskill" size="5" value="<?=$recskill?>"></td>
              
            </tr>
          </table>
          <table cellpadding="20px">
            <tr>
              <td valign="top" align="left">Slots:<br/>
                <input type="checkbox" name="slot_Cursor" value="1" <?echo ($slots & 1) ? "checked" : ""?>> Cursor<br/>
                <input type="checkbox" name="slot_Ear01" value="2" <?echo ($slots & 2) ? "checked" : ""?>> Ear01<br/>
                <input type="checkbox" name="slot_Head" value="4" <?echo ($slots & 4) ? "checked" : ""?>> Head<br/>
                <input type="checkbox" name="slot_Face" value="8" <?echo ($slots & 8) ? "checked" : ""?>> Face<br/>
              </td>
              <td valign="top" align="left"><br/>
                <input type="checkbox" name="slot_Ear02" value="16" <?echo ($slots & 16) ? "checked" : ""?>> Ear02<br/>
                <input type="checkbox" name="slot_Neck" value="32" <?echo ($slots & 32) ? "checked" : ""?>> Neck<br/>
                <input type="checkbox" name="slot_Shoulder" value="64" <?echo ($slots & 64) ? "checked" : ""?>> Shoulders<br/>
                <input type="checkbox" name="slot_Arms" value="128" <?echo ($slots & 128) ? "checked" : ""?>> Arms<br/>
              </td>
              <td valign="top" align="left"><br/>
                <input type="checkbox" name="slot_Back" value="256" <?echo ($slots & 256) ? "checked" : ""?>> Back<br/>
                <input type="checkbox" name="slot_Bracer01" value="512" <?echo ($slots & 512) ? "checked" : ""?>> Bracer01<br/>
                <input type="checkbox" name="slot_Bracer02" value="1024" <?echo ($slots & 1024) ? "checked" : ""?>> Bracer02<br/>
                <input type="checkbox" name="slot_Range" value="2048" <?echo ($slots & 2048) ? "checked" : ""?>> Range<br/>
              </td>
              <td valign="top" align="left"><br/>
                <input type="checkbox" name="slot_Hands" value="4096" <?echo ($slots & 4096) ? "checked" : ""?>> Hands<br/>
                <input type="checkbox" name="slot_Primary" value="8192" <?echo ($slots & 8192) ? "checked" : ""?>> Primary<br/>
                <input type="checkbox" name="slot_Secondary" value="16384" <?echo ($slots & 16384) ? "checked" : ""?>> Secondary<br/>
                <input type="checkbox" name="slot_Ring01" value="32768" <?echo ($slots & 32768) ? "checked" : ""?>> Ring01<br/>
              </td>
              <td valign="top" align="left"><br/>
                <input type="checkbox" name="slot_Ring02" value="65536" <?echo ($slots & 65536) ? "checked" : ""?>> Ring02<br/>
                <input type="checkbox" name="slot_Chest" value="131072" <?echo ($slots & 131072) ? "checked" : ""?>> Chest<br/>
                <input type="checkbox" name="slot_Legs" value="262144" <?echo ($slots & 262144) ? "checked" : ""?>> Legs<br/>
                <input type="checkbox" name="slot_Feet" value="524288" <?echo ($slots & 524288) ? "checked" : ""?>> Feet<br/>
              </td>
              <td valign="top" align="left"><br/>
                <input type="checkbox" name="slot_Waist" value="1048576" <?echo ($slots & 1048576) ? "checked" : ""?>> Waist<br/>
                <input type="checkbox" name="slot_Ammo" value="2097152" <?echo ($slots & 2097152) ? "checked" : ""?>> Ammo<br/>
                <input type="checkbox" name="all_none" value="yes" onClick="Check(document.item_edit)"> <b>All/None</b><br/>
              </td>
            </tr>
          </table>
          <table cellpadding="20px">
            <tr>
              <td valign="top" align="left">Races:<br/>
                <input type="checkbox" name="race_Human" value="1" <?echo ($races & 1) ? "checked" : ""?>> Human<br/>
                <input type="checkbox" name="race_Barbarian" value="2" <?echo ($races & 2) ? "checked" : ""?>> Barbarian<br/>
                <input type="checkbox" name="race_Erudite" value="4" <?echo ($races & 4) ? "checked" : ""?>> Erudite<br/>
                <input type="checkbox" name="race_Wood_Elf" value="8" <?echo ($races & 8) ? "checked" : ""?>> Wood Elf<br/>
              </td>
              <td valign="top" align="left"><br/>
                <input type="checkbox" name="race_High_Elf" value="16" <?echo ($races & 16) ? "checked" : ""?>> High Elf<br/>
                <input type="checkbox" name="race_Dark_Elf" value="32" <?echo ($races & 32) ? "checked" : ""?>> Dark Elf<br/>
                <input type="checkbox" name="race_Half_Elf" value="64" <?echo ($races & 64) ? "checked" : ""?>> Half Elf<br/>
                <input type="checkbox" name="race_Dwarf" value="128" <?echo ($races & 128) ? "checked" : ""?>> Dwarf<br/>
              </td>
              <td valign="top" align="left"><br/>
                <input type="checkbox" name="race_Troll" value="256" <?echo ($races & 256) ? "checked" : ""?>> Troll<br/>
                <input type="checkbox" name="race_Ogre" value="512" <?echo ($races & 512) ? "checked" : ""?>> Ogre<br/>
                <input type="checkbox" name="race_Halfling" value="1024" <?echo ($races & 1024) ? "checked" : ""?>> Halfling<br/>
                <input type="checkbox" name="race_Gnome" value="2048" <?echo ($races & 2048) ? "checked" : ""?>> Gnome<br/>
              </td>
              <td valign="top" align="left"><br/>
                <input type="checkbox" name="race_Iksar" value="4096" <?echo ($races & 4096) ? "checked" : ""?>> Iksar<br/>
                <input type="checkbox" name="race_Vah_Shir" value="8192" <?echo ($races & 8192) ? "checked" : ""?>> Vah Shir<br/>
                <input type="checkbox" name="all_none2" value="yes" onClick="Check2(document.item_edit)"> <b>All/None</b><br/>
              </td>
            </tr>
          </table>
          <table cellpadding="20px">
            <tr>
              <td valign="top" align="left">Classes:<br/>
                <input type="checkbox" name="class_Warrior" value="1" <?echo ($classes & 1) ? "checked" : ""?>> Warrior<br/>
                <input type="checkbox" name="class_Cleric" value="2" <?echo ($classes & 2) ? "checked" : ""?>> Cleric<br/>
                <input type="checkbox" name="class_Paladin" value="4" <?echo ($classes & 4) ? "checked" : ""?>> Paladin<br/>
                <input type="checkbox" name="class_Ranger" value="8" <?echo ($classes & 8) ? "checked" : ""?>> Ranger<br/>
              </td>
              <td valign="top" align="left"><br/>
                <input type="checkbox" name="class_Shadowknight" value="16" <?echo ($classes & 16) ? "checked" : ""?>> Shadowknight<br/>
                <input type="checkbox" name="class_Druid" value="32" <?echo ($classes & 32) ? "checked" : ""?>> Druid<br/>
                <input type="checkbox" name="class_Monk" value="64" <?echo ($classes & 64) ? "checked" : ""?>> Monk<br/>
                <input type="checkbox" name="class_Bard" value="128" <?echo ($classes & 128) ? "checked" : ""?>> Bard<br/>
              </td>
              <td valign="top" align="left"><br/>
                <input type="checkbox" name="class_Rogue" value="256" <?echo ($classes & 256) ? "checked" : ""?>> Rogue<br/>
                <input type="checkbox" name="class_Shaman" value="512" <?echo ($classes & 512) ? "checked" : ""?>> Shaman<br/>
                <input type="checkbox" name="class_Necromancer" value="1024" <?echo ($classes & 1024) ? "checked" : ""?>> Necromancer<br/>
                <input type="checkbox" name="class_Wizard" value="2048" <?echo ($classes & 2048) ? "checked" : ""?>> Wizard<br/>
              </td>
              <td valign="top" align="left"><br/>
                <input type="checkbox" name="class_Magician" value="4096" <?echo ($classes & 4096) ? "checked" : ""?>> Magician<br/>
                <input type="checkbox" name="class_Enchanter" value="8192" <?echo ($classes & 8192) ? "checked" : ""?>> Enchanter<br/>
                <input type="checkbox" name="class_Beastlord" value="16384" <?echo ($classes & 16384) ? "checked" : ""?>> Beastlord<br/>
                <input type="checkbox" name="all_none3" value="yes" onClick="Check3(document.item_edit)"> <b>All/None</b><br/>
              </td>
            </tr>
          </table>
          <table cellpadding="20px">
            <tr>
              <td valign="top" align="left">Deities:<br/>
                <input type="checkbox" name="deity_Agnostic" value="1" <?echo ($deity & 1) ? "checked" : ""?>> Agnostic<br/>
                <input type="checkbox" name="deity_Bertox" value="2" <?echo ($deity & 2) ? "checked" : ""?>> Bertoxxulous<br/>
                <input type="checkbox" name="deity_Brell" value="4" <?echo ($deity & 4) ? "checked" : ""?>> Brell Serilis<br/>
                <input type="checkbox" name="deity_Cazic" value="8" <?echo ($deity & 8) ? "checked" : ""?>> Cazic-Thule<br/>
              </td>
              <td valign="top" align="left"><br/>
                <input type="checkbox" name="deity_Erollsi" value="16" <?echo ($deity & 16) ? "checked" : ""?>> Erollisi Marr<br/>
                <input type="checkbox" name="deity_Bristlebane" value="32" <?echo ($deity & 32) ? "checked" : ""?>> Bristlebane<br/>
                <input type="checkbox" name="deity_Innoruuk" value="64" <?echo ($deity & 64) ? "checked" : ""?>> Innoruuk<br/>
                <input type="checkbox" name="deity_Karana" value="128" <?echo ($deity & 128) ? "checked" : ""?>> Karana<br/>
              </td>
              <td valign="top" align="left"><br/>
                <input type="checkbox" name="deity_Mithaniel_Marr" value="256" <?echo ($deity & 256) ? "checked" : ""?>> Mithaniel Marr<br/>
                <input type="checkbox" name="deity_Prexus" value="512" <?echo ($deity & 512) ? "checked" : ""?>> Prexus<br/>
                <input type="checkbox" name="deity_Quellious" value="1024" <?echo ($deity & 1024) ? "checked" : ""?>> Quellious<br/>
                <input type="checkbox" name="deity_Rallos_Zek" value="2048" <?echo ($deity & 2048) ? "checked" : ""?>> Rallos Zek<br/>
              </td>
              <td valign="top" align="left"><br/>
                <input type="checkbox" name="deity_Rodcet_Nife" value="4096" <?echo ($deity & 4096) ? "checked" : ""?>> Rodcet Nife<br/>
                <input type="checkbox" name="deity_Solusek_Ro" value="8192" <?echo ($deity & 8192) ? "checked" : ""?>> Solusek Ro<br/>
                <input type="checkbox" name="deity_The_Tribunal" value="16384" <?echo ($deity & 16384) ? "checked" : ""?>> The Tribunal<br/>
                <input type="checkbox" name="deity_Tunare" value="32768" <?echo ($deity & 32768) ? "checked" : ""?>> Tunare<br/>
              </td>
              <td valign="top" align="left"><br/>
                <input type="checkbox" name="deity_Veeshan" value="65536" <?echo ($deity & 65536) ? "checked" : ""?>> Veeshan<br/>
                <input type="checkbox" name="all_none4" value="yes" onClick="Check4(document.item_edit)"> <b>All/None</b><br/>
              </td>
            </tr>
          </table>
        </fieldset>
        <fieldset>
          <legend><strong><font size="4">Stats</font></strong></legend><br/>
          <fieldset>
            <legend><font size="4">Damage</font></legend>
            <table width="100%" border="0" cellpadding="3" cellspacing="0">
              <tr>
                <td align="left" width="33%">Damage:<br/><input type="text" name="damage" size="5" value="<?=$damage?>"></td>
                <td align="left" width="33%">Delay:<br/><input type="text" name="delay" size="5" value="<?=$delay?>"></td>
                <td align="left" width="33%">Range:<br/><input type="text" name="range" size="5" value="<?=$range?>"></td>
              </tr>
            </table>
            <table width="100%" border="0" cellpadding="3" cellspacing="0">
              <tr>
                <td align="left" width="33%">Bane Dmg:<br/><input type="text" name="banedmgamt" size="5" value="<?=$banedmgamt?>"></td>
                <td align="left" width="33%">Bane Race:<br/>
                  <select class="left" name="banedmgrace">
<?foreach($itemraces as $k => $v):?>
                    <option value="<?=$k?>"<? echo ($k == $banedmgrace) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
<?endforeach;?>
                  </select>
                </td>
                <td align="left" width="34%">Bane Bodytype:<br/>
                  <select class="left" name="banedmgbody">
<?foreach($bodytypes as $k => $v):?>
                    <option value="<?=$k?>"<? echo ($k == $banedmgbody) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
<?endforeach;?>
                  </select>
                </td>
              </tr>
            </table><br/>
            <table width="100%" border="0" cellpadding="3" cellspacing="0">
              <tr>
                <td align="left" width="50%">Elem Dmg Type:<br/><input type="text" name="elemdmgtype" size="5" value="<?=$elemdmgtype?>"></td>
                <td align="left" width="50"> Elem Dmg Amt:<br/><input type="text" name="elemdmgamt" size="5" value="<?=$elemdmgamt?>"></td>
              </tr>
            </table>
          </fieldset><br/><br/>
          <fieldset>
            <legend><font size="4">Base Stats</font></legend>
            <table width="100%" border="0" cellpadding="3" cellspacing="0">
              <tr>
                <td align="left" width="25%">HP:<br/><input type="text" name="hp" size="5" value="<?=$hp?>"></td>
                <td align="left" width="25%">Mana:<br/><input type="text" name="mana" size="5" value="<?=$mana?>"></td>
                <td align="left" width="25%">AC:<br/><input type="text" name="ac" size="5" value="<?=$ac?>"></td>
                <td align="left" width="25%">Light:<br/><input type="text" name="light" size="5" value="<?=$light?>"></td>
              </tr>
            </table>
          </fieldset><br/><br/>
          <fieldset>
            <legend><font size="4">Stats</font></legend>
            <table width="100%" border="0" cellpadding="3" cellspacing="0">
              <tr>
                <td align="left" width="14%">AGI:<br/><input type="text" name="aagi" size="5" value="<?=$aagi?>"></td>
                <td align="left" width="14%">CHA:<br/><input type="text" name="acha" size="5" value="<?=$acha?>"></td>
                <td align="left" width="14%">DEX:<br/><input type="text" name="adex" size="5" value="<?=$adex?>"></td>
                <td align="left" width="14%">INT:<br/><input type="text" name="aint" size="5" value="<?=$aint?>"></td>
                <td align="left" width="14%">STA:<br/><input type="text" name="asta" size="5" value="<?=$asta?>"></td>
                <td align="left" width="15%">STR:<br/><input type="text" name="astr" size="5" value="<?=$astr?>"></td>
                <td align="left" width="15%">WIS:<br/><input type="text" name="awis" size="5" value="<?=$awis?>"></td>
              </tr>
              </table>
              <table width="100%" border="0" cellpadding="3" cellspacing="0">
              <tr>
                <td align="left" width="20%">Cold:<br/><input type="text" name="cr" size="5" value="<?=$cr?>"></td>
                <td align="left" width="20%">Disease:<br/><input type="text" name="dr" size="5" value="<?=$dr?>"></td>
                <td align="left" width="20%">Fire:<br/><input type="text" name="fr" size="5" value="<?=$fr?>"></td>
                <td align="left" width="20%">Magic:<br/><input type="text" name="mr" size="5" value="<?=$mr?>"></td>
                <td align="left" width="20%">Poison:<br/><input type="text" name="pr" size="5" value="<?=$pr?>"></td>
              </tr>
            </table>
          </fieldset><br/><br/>
          <fieldset>
            <legend><font size="4">Skill Stats</font></legend>
            <table width="100%" border="0" cellpadding="3" cellspacing="0">
              <tr>
                <td align="left" width="50%">Skill Mod:<br/>
                  <select class="left" name="skillmodtype">
<?foreach($skilltypes as $k => $v):?>
                    <option value="<?=$k?>"<? echo ($k == $skillmodtype) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
<?endforeach;?>
                  </select>
                </td>
                <td align="left" width="50%">Skill Mod Value:<br/><input type="text" name="skillmodvalue" size="5" value="<?=$skillmodvalue?>"></td>
              </tr>
            </table>
          </fieldset><br/>
        </fieldset><br/>
        <fieldset>
          <legend><strong><font size="4">Costs</font></strong></legend>
          <table width="100%" border="0" cellpadding="3" cellspacing="0">
            <tr>
              <td align="left" width="50%">Price:<br/><input type="text" name="price" size="9" value="<?=$price?>"></td>
              <td align="left" width="50%">Sellrate:<br/><input type="text" name="sellrate" size="9" value="<?=$sellrate?>"></td>
            </tr>
          </table>
        </fieldset><br/>
        <fieldset>
          <legend><strong><font size="4">Appearance</font></strong></legend>
          <table width="100%" border="0" cellpadding="3" cellspacing="0">
            <tr>
              <td align="left" width="25%">Icon:<br/><input type="text" name="icon" size="9" value="<?=$icon?>"></td>
              <td align="left" width="25%">IDFile:<br/><input type="text" name="idfile" size="9" value="<?=$idfile?>"></td>
              <td align="left" width="25%">Weight:<br/><input type="text" name="weight" size="9" value="<?=$weight?>"></td>
              <td align="left" width="25%">Color:<br/><input type="text" name="color" size="9" value="<?=$color?>"></td>
            </tr>
          </table>
          <table width="100%" border="0" cellpadding="3" cellspacing="0">
            <tr>
              <td align="left" width="33%">Size:<br/>
                <select class="left" name="size">
<?foreach($itemsize as $k => $v):?>
                  <option value="<?=$k?>"<? echo ($k == $size) ? " selected" : ""?>><?=$v?></option>
<?endforeach;?>
                </select>
              </td>
              <td align="left" width="33%">Material:<br/>
                <select class="left" name="material">
<?foreach($itemmaterial as $k => $v):?>
                  <option value="<?=$k?>"<? echo ($k == $material) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
<?endforeach;?>
                </select>
              </td>
            </tr>
          </table>
        </fieldset><br/>
        <fieldset>
          <legend><strong><font size="4">Spells</font></strong></legend>
          (<a href="javascript:showSearch();">Spell Search</a>)<br/><br/>
          <center>
            <iframe id='searchframe' src='templates/iframes/spellsearch.php'></iframe>
            <input id="button" type="button" value='Hide Spell Search' onclick='hideSearch();' style='display:none; margin-bottom: 20px;'>
          </center>
          <center>
            <table width="100%" border="0" cellpadding="3" cellspacing="0">
              <tr>
                <td align="left" width="25%">Casttime:<br/><input type="text" name="casttime" size="9" value="<?=$casttime?>"></td>
                <td align="left" width="25%">Casttime_:<br/><input type="text" name="casttime_" size="9" value="<?=$casttime_?>"></td>
                <td align="left" width="25%">Recast Delay:<br/><input type="text" name="recastdelay" size="9" value="<?=$recastdelay?>"></td>
                <td align="left" width="25%">Recast Type:<br/><input type="text" name="recasttype" size="9" value="<?=$recasttype?>"></td>
              </tr>
            </table>
            <table width="100%" border="0" cellpadding="3" cellspacing="0">
              <tr>
                <td align="left" width="14%">Click Type:<br/>
                  <select class="left" name="clicktype">
<?foreach($itemcasttype as $k => $v):?>
                    <option value="<?=$k?>"<? echo ($k == $clicktype) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
<?endforeach;?>
                  </select>
                </td>
                <td align="left" width="14%">Click Effect:<br/><input type="text" name="clickeffect" size="5" value="<?=$clickeffect?>"></td>
                <td align="left" width="14%">Click Level:<br/><input type="text" name="clicklevel" size="5" value="<?=$clicklevel?>"></td>
                <td align="left" width="14%">Click Level 2:<br/><input type="text" name="clicklevel2" size="5" value="<?=$clicklevel2?>"></td>
              </tr>
            </table>
            <table width="100%" border="0" cellpadding="3" cellspacing="0">
              <tr>
                <td align="left" width="20%">Proc Type:<br/>
                  <select class="left" name="proctype">
<?foreach($proccasttype as $k => $v):?>
                    <option value="<?=$k?>"<? echo ($k == $proctype) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
<?endforeach;?>
                  </select>
                </td>
                <td align="left" width="16%">Proc Effect:<br/><input type="text" name="proceffect" size="5" value="<?=$proceffect?>"></td>
                <td align="left" width="16%">Proc Level:<br/><input type="text" name="proclevel" size="5" value="<?=$proclevel?>"></td>
                <td align="left" width="16%">Proc Level 2:<br/><input type="text" name="proclevel2" size="5" value="<?=$proclevel2?>"></td>
                <td align="left" width="16%">Proc Rate:<br/><input type="text" name="procrate" size="5" value="<?=$procrate?>"></td>
              </tr>
            </table>
            <table width="100%" border="0" cellpadding="3" cellspacing="0">
              <tr>
                <td align="left" width="20%">Worn Type:<br/>
                  <select class="left" name="worntype">
<?foreach($worncasttype as $k => $v):?>
                    <option value="<?=$k?>"<? echo ($k == $worntype) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
<?endforeach;?>
                  </select>
                </td>
                <td align="left" width="16%">Worn Effect:<br/><input type="text" name="worneffect" size="5" value="<?=$worneffect?>"></td>
                <td align="left" width="16%">Worn Level:<br/><input type="text" name="wornlevel" size="5" value="<?=$wornlevel?>"></td>
                <td align="left" width="16%">Worn Level 2:<br/><input type="text" name="wornlevel2" size="5" value="<?=$wornlevel2?>"></td>
                <td align="left" width="16%">&nbsp;</td>
              </tr>
            </table>
            <table width="100%" border="0" cellpadding="3" cellspacing="0">
              <tr>
                <td align="left" width="20%">Focus Type:<br/>
                  <select class="left" name="focustype">
<?foreach($focuscasttype as $k => $v):?>
                    <option value="<?=$k?>"<? echo ($k == $focustype) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
<?endforeach;?>
                  </select>
                </td>
                <td align="left" width="16%">Focus Effect:<br/><input type="text" name="focuseffect" size="5" value="<?=$focuseffect?>"></td>
                <td align="left" width="16%">Focus Level:<br/><input type="text" name="focuslevel" size="5" value="<?=$focuslevel?>"></td>
                <td align="left" width="16%">Focus Level 2:<br/><input type="text" name="focuslevel2" size="5" value="<?=$focuslevel2?>"></td>
                <td align="left" width="16%">&nbsp;</td>
              </tr>
            </table>
            <table width="100%" border="0" cellpadding="3" cellspacing="0">
              <tr>
                <td align="left" width="20%">Scroll Type:<br/>
                  <select class="left" name="scrolltype">
<?foreach($scrollcasttype as $k => $v):?>
                    <option value="<?=$k?>"<? echo ($k == $scrolltype) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
<?endforeach;?>
                  </select>
                </td>
                <td align="left" width="16%">Scroll Effect:<br/><input type="text" name="scrolleffect" size="5" value="<?=$scrolleffect?>"></td>
                <td align="left" width="16%">Scroll Level:<br/><input type="text" name="scrolllevel" size="5" value="<?=$scrolllevel?>"></td>
                <td align="left" width="16%">Scroll Level 2:<br/><input type="text" name="scrolllevel2" size="5" value="<?=$scrolllevel2?>"></td>
                <td align="left" width="16%">&nbsp;</td>
              </tr>
            </table>
            <table width="100%" border="0" cellpadding="3" cellspacing="0">
              <tr>
                <td align="left" width="20%">Bard Type:<br/>
                  <select class="left" name="bardtype">
<?foreach($itembardtype as $k => $v):?>
                    <option value="<?=$k?>"<? echo ($k == $bardtype) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
<?endforeach;?>
                  </select>
                </td>
                <td align="left" width="16%">Bard Effect:<br/><input type="text" name="bardeffect" size="5" value="<?=$bardeffect?>"></td>
                <td align="left" width="16%">Bard Level:<br/><input type="text" name="bardlevel" size="5" value="<?=$bardlevel?>"></td>
                <td align="left" width="16%">Bard Level 2:<br/><input type="text" name="bardlevel2" size="5" value="<?=$bardlevel2?>"></td>
                <td align="left" width="16%">Bard Value:<br/><input type="text" name="bardvalue" size="5" value="<?=$bardvalue?>"></td>
              </tr>
            </table>
          </center>
        </fieldset><br/>
        <fieldset>
          <legend><strong><font size="4">Faction</font></strong></legend>
          <table width="100%" border="0" cellpadding="3" cellspacing="0">
            <center>
              <tr>
                <td align="left" width="10%">Faction Mod 1:<br/>
                <select class="left" name="factionmod1">
<?foreach($factions as $faction): extract($faction);?>
                  <option value="<?=$id?>"<? echo ($id == $factionmod1) ? " selected" : ""?>><?=$name?></option>
<?endforeach;?>
                </select></td>
                <td align="left" width="10%">Amt 1:<br/><input type="text" name="factionamt1" size="5" value="<?=$factionamt1?>"></td>
                <td align="left" width="10%">Faction Mod 2:<br/>
                <select class="left" name="factionmod2">
<?foreach($factions as $faction): extract($faction);?>
               <option value="<?=$id?>"<? echo ($id == $factionmod2) ? " selected" : ""?>><?=$name?></option>
<?endforeach;?>
                </select></td>
                <td align="left" width="10%">Amt 2:<br/><input type="text" name="factionamt2" size="5" value="<?=$factionamt2?>"></td>
              </tr>
              <tr>
                <td align="left" width="10%">Faction Mod 3:<br/>
                <select class="left" name="factionmod3">
<?foreach($factions as $faction): extract($faction);?>
               <option value="<?=$id?>"<? echo ($id == $factionmod3) ? " selected" : ""?>><?=$name?></option>
<?endforeach;?>
                </select></td>
                <td align="left" width="10%">Amt 3:<br/><input type="text" name="factionamt3" size="5" value="<?=$factionamt3?>"></td>
                <td align="left" width="10%">Faction Mod 4:<br/>
                <select class="left" name="factionmod4">
<?foreach($factions as $faction): extract($faction);?>
               <option value="<?=$id?>"<? echo ($id == $factionmod4) ? " selected" : ""?>><?=$name?></option>
<?endforeach;?>
                </select></td>
                <td align="left" width="10%">Amt 4:<br/><input type="text" name="factionamt4" size="5" value="<?=$factionamt4?>"></td>
              </tr>
            </center>
          </table>
        </fieldset><br/>
        <fieldset>
          <legend><strong><font size="4">Verification</font></strong></legend>
          <table width="100%" border="0" cellpadding="3" cellspacing="0">
            <center>
              <tr>
                <td align="left" width="25%">Created:<br/><input type="text" name="created" size="20" value="<?=$created?>"></td>
                <td align="left" width="25%">Verified:<br/><input type="text" name="verified" size="20" value="<?=$verified?>"></td>
                <td align="left" width="25%">Updated:<br/><input type="text" name="updated_read" size="20" value="<?=$updated?>"></td>
                <td align="left" width="25%">Source:<br/><input type="text" name="source" size="20" value="<?=$source?>"></td>
              </tr>
              <tr>
                <td align="left" width="25%">Comment:<br/><input type="text" name="comment" size="20" value="<?=$comment?>"></td>
              </tr>
            </center>
          </table>
        </fieldset><br/>
        <center>
          <input type="hidden" name="updated" value="<?=$year?>-<?=$mon?>-<?=$mday?> <?=$hours?>:<?=$minutes?>:<?=$seconds?>">
          <input type="submit" value="Submit Changes">
        </center>
      </div>
    </div>
  </form>
