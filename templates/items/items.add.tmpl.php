  <form name="item_edit" method="post" action="index.php?editor=items&id=<?=$id?>&action=9">
    <div class="edit_form">
      <div class="edit_form_header">
        Add Item
      </div>
      <div class="edit_form_content">
        <fieldset style="text-align: left;">
          <legend><strong><font size="4">General</font></strong></legend>
          <input type="hidden" name="id" value="<?=$id?>" />
          <table width="100%" border="0" cellpadding="3" cellspacing="0">
            <tr>
              <td align="left" width="12%">ID:<br/><input type="text" name="id" size="7" value="<?=$newid?>"></td>
              <td align="left" width="33%">Name:<br/><input type="text" name="itemname" size="45" value=""></td>
              <td align="left" width="33%">
                Type:<br/>
                <select name="itemtype" style="width:265px;">
<?foreach($itemtypes as $k => $v):?>
                  <option value="<?=$k?>"><?=$k?>: <?=$v?></option>
<?endforeach;?>
                </select>
              </td>
            </tr>
          </table>
          <table width="100%" border="0" cellpadding="3" cellspacing="0">
            <tr>
              <td align="left" width="50%">Lore Name: (* - Lore # - Artifact)<br/><input type="text" name="lore" size="45" value=""></td>
              <td align="left" width="50%">
                Class:<br/>
                <select name="itemclass">
                  <option value="0">Common Item</option>
                  <option value="1">Container</option>
                  <option value="2">Book</option>
                </select>
              </td>
            </tr>
          </table>
          <table width="100%" border="0" cellpadding="3" cellspacing="0">
            <tr>
              <td align="left" width="34%">Stackable:<br/><input type="text" name="stackable" size="10" value="0"></td>
              <td align="left" width="33%">Stacksize:<br/><input type="text" name="stacksize" size="10" value="1"></td>
              <td align="left" width="33%">Charges:<br/><input type="text" name="maxcharges" size="10" value="0"></td>
            </tr>
          </table>
          <table width="100%" border="0" cellpadding="3" cellspacing="0">
            <tr>
<?if($filename != ''):?>
              <td align="left" width="25%"><a href="index.php?editor=items&id=<?=$id?>&name=<?=$filename?>&action=3">Book Name:<br/><input type="text" name="filename" size="20" value=""></td>
<?endif;?>
<?if($filename == ''):?>
              <td align="left" width="33%">Book Name:<br/><input type="text" name="filename" size="20" value=""></td>
<?endif;?>
              <td align="left" width="33%">
                Book:<br/>
                <select name="book">
                  <option value="0">No</option>
                  <option value="1">Yes</option>
                  <option value="2">Message</option>
                </select>
              </td>
              <td align="left" width="33%">Booktype:<br/><input type="text" name="booktype" size="10" value="0"></td>
            </tr>
          </table>
          <table width="100%" border="0" cellpadding="3" cellspacing="0">
          </table>
          <table width="100%" border="0" cellpadding="3" cellspacing="0">
            <tr>
              <td align="left" width="25%">
                Bag Size:<br/>
                <select class="left" name="bagsize">
<?foreach($itembagsize as $k => $v):?>
                  <option value="<?=$k?>"><?=$v?></option>
<?endforeach;?>
                </select>
              </td>
              <td align="left" width="25%">Bag Slots:<br/><input type="text" name="bagslots" size="10" value="0"></td>
              <td align="left" width="25%">Bag Weight Reduction:<br/><input type="text" name="bagwr" size="10" value="0"></td>
              <td align="left" width="25%">
                Bag Type:<br/>
                <select class="left" name="bagtype">
<?foreach($world_containers as $k => $v):?>
                  <option value="<?=$k?>"><?=$k?>: <?=$v?></option>
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
              <td align="left" width="16%">
                No Drop:<br/>
                <select name="nodrop">
                  <option value="1">No</option>
                  <option value="0">Yes</option>
                </select>
              </td>
              <td align="left" width="16%">
                No Rent:<br/>
                <select name="norent">
                  <option value="1">No</option>
                  <option value="0">Yes</option>
                  <option value="255">255</option>
                </select>
              </td>
              <td align="left" width="16%">
                Magic:<br/>
                <select name="magic">
                  <option value="0">No</option>
                  <option value="1">Yes</option>
                </select>
              </td>
              <td align="left" width="16%">
                Tradeskill:<br/>
                <select name="tradeskills">
                  <option value="0">No</option>
                  <option value="1">Yes</option>
                </select>
              </td>
              <td align="left" width="16%">
                Quest:<br/>
                <select name="questitemflag">
                  <option value="0">No</option>
                  <option value="1">Yes</option>
                </select>
              </td>
            </tr>
            <tr>
              <td align="left" width="16%">
                FV No Drop:<br/>
                <select name="fvnodrop">
                  <option value="0">No</option>
                  <option value="1">Yes</option>
                </select>
              </td>
              <td align="left" width="16%">
			         GM Flag:<br/>
			           <select class="left" name="gmflag">
			           <?foreach($gmflagtype as $k => $v):?>
			             <option value="<?=$k?>"<? echo ($k == 0) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
			           <?endforeach;?>
			           </select>
              </td>
              <td align="left" width="16%">
			         Soulbound:<br/>
			           <select name="soulbound">
                  <option value="0">No</option>
                  <option value="1">Yes</option>
                 </select>
               </td>
            </tr>
            </table>
            <table width="100%" border="0" cellpadding="3" cellspacing="0">
            <tr>
              <td align="left" width="33%">
                Req Level:<br/><input type="text" name="reqlevel" size="5" value="0">
              </td>
              <td align="left" width="33%">
                Rec Level:<br/><input type="text" name="reclevel" size="5" value="0">
              </td>
              <td align="left" width="34%">
                Rec Skill:<br/><input type="text" name="recskill" size="5" value="0">
              </td>
            </tr>
          </table>
          <table cellpadding="20px">
            <tr>
              <td valign="top" align="left">
                Slots:<br/>
                <input type="checkbox" name="slot_Cursor" value="1"> Cursor<br/>
                <input type="checkbox" name="slot_Ear01" value="2"> Ear01<br/>
                <input type="checkbox" name="slot_Head" value="4"> Head<br/>
                <input type="checkbox" name="slot_Face" value="8"> Face<br/>
              </td>
              <td valign="top" align="left">
                <br/>
                <input type="checkbox" name="slot_Ear02" value="16"> Ear02<br/>
                <input type="checkbox" name="slot_Neck" value="32"> Neck<br/>
                <input type="checkbox" name="slot_Shoulder" value="64"> Shoulders<br/>
                <input type="checkbox" name="slot_Arms" value="128"> Arms<br/>
              </td>
              <td valign="top" align="left">
                <br/>
                <input type="checkbox" name="slot_Back" value="256"> Back<br/>
                <input type="checkbox" name="slot_Bracer01" value="512"> Bracer01<br/>
                <input type="checkbox" name="slot_Bracer02" value="1024"> Bracer02<br/>
                <input type="checkbox" name="slot_Range" value="2048"> Range<br/>
              </td>
              <td valign="top" align="left">
                <br/>
                <input type="checkbox" name="slot_Hands" value="4096"> Hands<br/>
                <input type="checkbox" name="slot_Primary" value="8192"> Primary<br/>
                <input type="checkbox" name="slot_Secondary" value="16384"> Secondary<br/>
                <input type="checkbox" name="slot_Ring01" value="32768"> Ring01<br/>
              </td>
              <td valign="top" align="left">
                <br/>
                <input type="checkbox" name="slot_Ring02" value="65536"> Ring02<br/>
                <input type="checkbox" name="slot_Chest" value="131072"> Chest<br/>
                <input type="checkbox" name="slot_Legs" value="262144"> Legs<br/>
                <input type="checkbox" name="slot_Feet" value="524288"> Feet<br/>
              </td>
              <td valign="top" align="left">
                <br/>
                <input type="checkbox" name="slot_Waist" value="1048576"> Waist<br/>
                <input type="checkbox" name="slot_Ammo" value="2097152"> Ammo<br/>
                <input type="checkbox" name="all_none" value="yes" onClick="Check(document.item_edit)"> <b>All/None</b><br/>
              </td>
            </tr>
          </table>
          <table cellpadding="20px">
            <tr>
              <td valign="top" align="left">
                Races:<br/>
                <input type="checkbox" name="race_Human" value="1"> Human<br/>
                <input type="checkbox" name="race_Barbarian" value="2"> Barbarian<br/>
                <input type="checkbox" name="race_Erudite" value="4"> Erudite<br/>
                <input type="checkbox" name="race_Wood_Elf" value="8"> Wood Elf<br/>
              </td>
              <td valign="top" align="left">
                <br/>
                <input type="checkbox" name="race_High_Elf" value="16"> High Elf<br/>
                <input type="checkbox" name="race_Dark_Elf" value="32"> Dark Elf<br/>
                <input type="checkbox" name="race_Half_Elf" value="64"> Half Elf<br/>
                <input type="checkbox" name="race_Dwarf" value="128"> Dwarf<br/>
              </td>
              <td valign="top" align="left">
                <br/>
                <input type="checkbox" name="race_Troll" value="256"> Troll<br/>
                <input type="checkbox" name="race_Ogre" value="512"> Ogre<br/>
                <input type="checkbox" name="race_Halfling" value="1024"> Halfling<br/>
                <input type="checkbox" name="race_Gnome" value="2048"> Gnome<br/>
              </td>
              <td valign="top" align="left">
                <br/>
                <input type="checkbox" name="race_Iksar" value="4096"> Iksar<br/>
                <input type="checkbox" name="race_Vah_Shir" value="8192"> Vah Shir<br/>
                <input type="checkbox" name="all_none2" value="yes" onClick="Check2(document.item_edit)"> <b>All/None</b><br/>
              </td>
            </tr>
          </table>
          <table cellpadding="20px">
            <tr>
              <td valign="top" align="left">
                Classes:<br/>
                <input type="checkbox" name="class_Warrior" value="1"> Warrior<br/>
                <input type="checkbox" name="class_Cleric" value="2"> Cleric<br/>
                <input type="checkbox" name="class_Paladin" value="4"> Paladin<br/>
                <input type="checkbox" name="class_Ranger" value="8"> Ranger<br/>
              </td>
              <td valign="top" align="left">
                <br/>
                <input type="checkbox" name="class_Shadowknight" value="16"> Shadowknight<br/>
                <input type="checkbox" name="class_Druid" value="32"> Druid<br/>
                <input type="checkbox" name="class_Monk" value="64"> Monk<br/>
                <input type="checkbox" name="class_Bard" value="128"> Bard<br/>
              </td>
              <td valign="top" align="left">
                <br/>
                <input type="checkbox" name="class_Rogue" value="256"> Rogue<br/>
                <input type="checkbox" name="class_Shaman" value="512"> Shaman<br/>
                <input type="checkbox" name="class_Necromancer" value="1024"> Necromancer<br/>
                <input type="checkbox" name="class_Wizard" value="2048"> Wizard<br/>
              </td>
              <td valign="top" align="left">
                <br/>
                <input type="checkbox" name="class_Magician" value="4096"> Magician<br/>
                <input type="checkbox" name="class_Enchanter" value="8192"> Enchanter<br/>
                <input type="checkbox" name="class_Beastlord" value="16384"> Beastlord<br/>
                <input type="checkbox" name="all_none3" value="yes" onClick="Check3(document.item_edit)"> <b>All/None</b><br/>
              </td>
            </tr>
          </table>
          <table cellpadding="20px">
            <tr>
              <td valign="top" align="left">
                Deities:<br/>
                <input type="checkbox" name="deity_Agnostic" value="1"> Agnostic<br/>
                <input type="checkbox" name="deity_Bertox" value="2"> Bertoxxulous<br/>
                <input type="checkbox" name="deity_Brell" value="4"> Brell Serilis<br/>
                <input type="checkbox" name="deity_Cazic" value="8"> Cazic-Thule<br/>
              </td>
              <td valign="top" align="left">
                <br/>
                <input type="checkbox" name="deity_Erollsi" value="16"> Erollisi Marr<br/>
                <input type="checkbox" name="deity_Bristlebane" value="32"> Bristlebane<br/>
                <input type="checkbox" name="deity_Innoruuk" value="64"> Innoruuk<br/>
                <input type="checkbox" name="deity_Karana" value="128"> Karana<br/>
              </td>
              <td valign="top" align="left">
                <br/>
                <input type="checkbox" name="deity_Mithaniel_Marr" value="256"> Mithaniel Marr<br/>
                <input type="checkbox" name="deity_Prexus" value="512"> Prexus<br/>
                <input type="checkbox" name="deity_Quellious" value="1024"> Quellious<br/>
                <input type="checkbox" name="deity_Rallos_Zek" value="2048"> Rallos Zek<br/>
              </td>
              <td valign="top" align="left">
                <br/>
                <input type="checkbox" name="deity_Rodcet_Nife" value="4096"> Rodcet Nife<br/>
                <input type="checkbox" name="deity_Solusek_Ro" value="8192"> Solusek Ro<br/>
                <input type="checkbox" name="deity_The_Tribunal" value="16384"> The Tribunal<br/>
                <input type="checkbox" name="deity_Tunare" value="32768"> Tunare<br/>
              </td>
              <td valign="top" align="left">
                <br/>
                <input type="checkbox" name="deity_Veeshan" value="65536"> Veeshan<br/>
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
                <td align="left" width="33%">Damage:<br/><input type="text" name="damage" size="5" value="0"></td>
                <td align="left" width="33%">Delay:<br/><input type="text" name="delay" size="5" value="0"></td>
                <td align="left" width="33%">Range:<br/><input type="text" name="range" size="5" value="0"></td>
              </tr>
            </table>
            <table width="100%" border="0" cellpadding="3" cellspacing="0">
              <tr>
                <td align="left" width="14%">Bane Dmg:<br/><input type="text" name="banedmgamt" size="5" value="0"></td>
                <td align="left" width="14%">
                  Bane Race:<br/>
                  <select class="left" name="banedmgrace">
<?foreach($itemraces as $k => $v):?>
                    <option value="<?=$k?>"><?=$k?>: <?=$v?></option>
<?endforeach;?>
                  </select>
                </td>
                <td align="left" width="14%">
                  Bane Bodytype:<br/>
                  <select class="left" name="banedmgbody">
<?foreach($bodytypes as $k => $v):?>
                    <option value="<?=$k?>"><?=$k?>: <?=$v?></option>
<?endforeach;?>
                  </select>
                </td>
              </tr>
            </table><br/>
              <table width="100%" border="0" cellpadding="3" cellspacing="0">
                <tr>
                  <td align="left" width="50%">Elem Dmg Type:<br/><input type="text" name="elemdmgtype" size="5" value="0"></td>
                  <td align="left" width="50%">Elem Dmg Amt:<br/><input type="text" name="elemdmgamt" size="5" value="0"></td>
                </tr>
              </table>
          </fieldset><br/><br/>
          <fieldset>
            <legend><font size="4">Base Stats</font></legend>
            <table width="100%" border="0" cellpadding="3" cellspacing="0">
              <tr>
                <td align="left" width="25">HP:<br/><input type="text" name="hp" size="5" value="0"></td>
                <td align="left" width="25%">Mana:<br/><input type="text" name="mana" size="5" value="0"></td>
                <td align="left" width="25%">AC:<br/><input type="text" name="ac" size="5" value="0"></td>
                <td align="left" width="25%">Light:<br/><input type="text" name="light" size="5" value="0"></td>
              </tr>
            </table>
          </fieldset><br/><br/>
          <fieldset>
            <legend><font size="4">Stats</font></legend>
            <table width="100%" border="0" cellpadding="3" cellspacing="0">
              <tr>
                <td align="left" width="14%">AGI:<br/><input type="text" name="aagi" size="5" value="0"></td>
                <td align="left" width="14%">CHA:<br/><input type="text" name="acha" size="5" value="0"></td>
                <td align="left" width="14%">DEX:<br/><input type="text" name="adex" size="5" value="0"></td>
                <td align="left" width="14%">INT:<br/><input type="text" name="aint" size="5" value="0"></td>
                <td align="left" width="14%">STA:<br/><input type="text" name="asta" size="5" value="0"></td>
                <td align="left" width="15%">STR:<br/><input type="text" name="astr" size="5" value="0"></td>
                <td align="left" width="15%">WIS:<br/><input type="text" name="awis" size="5" value="0"></td>
              </tr>
              </table>
              <table width="100%" border="0" cellpadding="3" cellspacing="0">
              <tr>
                <td align="left" width="20%">Cold:<br/><input type="text" name="cr" size="5" value="0"></td>
                <td align="left" width="20%">Disease:<br/><input type="text" name="dr" size="5" value="0"></td>
                <td align="left" width="20%">Fire:<br/><input type="text" name="fr" size="5" value="0"></td>
                <td align="left" width="20%">Magic:<br/><input type="text" name="mr" size="5" value="0"></td>
                <td align="left" width="20%">Poison:<br/><input type="text" name="pr" size="5" value="0"></td>
              </tr>
            </table>
          </fieldset><br/><br/>
          <fieldset>
            <legend><font size="4">Skill Stats</font></legend>
            <table width="100%" border="0" cellpadding="3" cellspacing="0">
              <tr>
                <td align="left" width="50%">
                  Skill Mod:<br/>
                  <select class="left" name="skillmodtype">
<?foreach($skilltypes as $k => $v):?>
                    <option value="<?=$k?>"><?=$k?>: <?=$v?></option>
<?endforeach;?>
                  </select>
                </td>
                <td align="left" width="50%">Skill Mod Value:<br/><input type="text" name="skillmodvalue" size="5" value="0"></td>
              </tr>
            </table>
          </fieldset><br/>
        </fieldset><br/>
        <fieldset>
          <legend><strong><font size="4">Costs</font></strong></legend>
          <table width="100%" border="0" cellpadding="3" cellspacing="0">
            <tr>
              <td align="left" width="25%">Price:<br/><input type="text" name="price" size="9" value="0"></td>
              <td align="left" width="25%">Sellrate:<br/><input type="text" name="sellrate" size="9" value="1"></td>
            </tr>
          </table>
        </fieldset><br/>
        <fieldset>
          <legend><strong><font size="4">Appearance</font></strong></legend>
          <table width="100%" border="0" cellpadding="3" cellspacing="0">
            <tr>
              <td align="left" width="25%">Icon:<br/><input type="text" name="icon" size="9" value="0"></td>
              <td align="left" width="25%">IDFile:<br/><input type="text" name="idfile" size="9" value="IT"></td>
              <td align="left" width="25%">Weight:<br/><input type="text" name="weight" size="9" value="1"></td>
              <td align="left" width="25%">Color:<br/><input type="text" name="color" size="9" value="4278190080"></td>
            </tr>
          </table>
          <table width="100%" border="0" cellpadding="3" cellspacing="0">
            <tr>
              <td align="left" width="33%">
                Size:<br/>
                <select class="left" name="size">
<?foreach($itemsize as $k => $v):?>
                  <option value="<?=$k?>"><?=$v?></option>
<?endforeach;?>
                </select>
              </td>
              <td align="left" width="33%">
                Material:<br/>
                <select class="left" name="material">
<?foreach($itemmaterial as $k => $v):?>
                  <option value="<?=$k?>"><?=$k?>: <?=$v?></option>
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
               <td align="left" width="25%">Casttime:<br/><input type="text" name="casttime" size="9" value="0"></td>
               <td align="left" width="25%">Casttime_:<br/><input type="text" name="casttime_" size="9" value="0"></td>
               <td align="left" width="25%">Recast Delay:<br/><input type="text" name="recastdelay" size="9" value="0"></td>
               <td align="left" width="25%">Recast Type:<br/><input type="text" name="recasttype" size="9" value="0"></td>
              </tr>
            </table>
            <table width="100%" border="0" cellpadding="3" cellspacing="0">
              <tr>
                <td align="left" width="14%">
                  Click Type:<br/>
                  <select class="left" name="clicktype">
<?foreach($itemcasttype as $k => $v):?>
                    <option value="<?=$k?>"><?=$k?>: <?=$v?></option>
<?endforeach;?>
                  </select>
                </td>
                <td align="left" width="14%">Click Effect:<br/><input type="text" name="clickeffect" size="5" value="-1"></td>
                <td align="left" width="14%">Click Level:<br/><input type="text" name="clicklevel" size="5" value="0"></td>
                <td align="left" width="14%">Click Level 2:<br/><input type="text" name="clicklevel2" size="5" value="0"></td>
              </tr>
            </table>
            <table width="100%" border="0" cellpadding="3" cellspacing="0">
              <tr>
                <td align="left" width="20%">
                  Proc Type:<br/>
                  <select class="left" name="proctype">
<?foreach($proccasttype as $k => $v):?>
                    <option value="<?=$k?>"><?=$k?>: <?=$v?></option>
<?endforeach;?>
                  </select>
                </td>
                <td align="left" width="16%">Proc Effect:<br/><input type="text" name="proceffect" size="5" value="-1"></td>
                <td align="left" width="16%">Proc Level:<br/><input type="text" name="proclevel" size="5" value="0"></td>
                <td align="left" width="16%">Proc Level 2:<br/><input type="text" name="proclevel2" size="5" value="0"></td>
                <td align="left" width="16%">Proc Rate:<br/><input type="text" name="procrate" size="5" value="0"></td>
              </tr>
            </table>
            <table width="100%" border="0" cellpadding="3" cellspacing="0">
              <tr>
                <td align="left" width="20%">
                  Worn Type:<br/>
                  <select class="left" name="worntype">
<?foreach($worncasttype as $k => $v):?>
                    <option value="<?=$k?>"><?=$k?>: <?=$v?></option>
<?endforeach;?>
                  </select>
                </td>
                <td align="left" width="16%">Worn Effect:<br/><input type="text" name="worneffect" size="5" value="-1"></td>
                <td align="left" width="16%">Worn Level:<br/><input type="text" name="wornlevel" size="5" value="0"></td>
                <td align="left" width="16%">Worn Level 2:<br/><input type="text" name="wornlevel2" size="5" value="0"></td>
                <td align="left" width="16%">&nbsp;</td>
              </tr>
            </table>
            <table width="100%" border="0" cellpadding="3" cellspacing="0">
              <tr>
                <td align="left" width="20%">
                  Focus Type:<br/>
                  <select class="left" name="focustype">
<?foreach($focuscasttype as $k => $v):?>
                    <option value="<?=$k?>"><?=$k?>: <?=$v?></option>
<?endforeach;?>
                  </select>
                </td>
                <td align="left" width="16%">Focus Effect:<br/><input type="text" name="focuseffect" size="5" value="-1"></td>
                <td align="left" width="16%">Focus Level:<br/><input type="text" name="focuslevel" size="5" value="0"></td>
                <td align="left" width="16%">Focus Level 2:<br/><input type="text" name="focuslevel2" size="5" value="0"></td>
                <td align="left" width="16%">&nbsp;</td>
              </tr>
            </table>
            <table width="100%" border="0" cellpadding="3" cellspacing="0">
              <tr>
                <td align="left" width="20%">
                  Scroll Type:<br/>
                  <select class="left" name="scrolltype">
<?foreach($scrollcasttype as $k => $v):?>
                    <option value="<?=$k?>"><?=$k?>: <?=$v?></option>
<?endforeach;?>
                  </select>
                </td>
                <td align="left" width="16%">Scroll Effect:<br/><input type="text" name="scrolleffect" size="5" value="-1"></td>
                <td align="left" width="16%">Scroll Level:<br/><input type="text" name="scrolllevel" size="5" value="0"></td>
                <td align="left" width="16%">Scroll Level 2:<br/><input type="text" name="scrolllevel2" size="5" value="0"></td>
                <td align="left" width="16%">&nbsp;</td>
              </tr>
            </table>
            <table width="100%" border="0" cellpadding="3" cellspacing="0">
              <tr>
                <td align="left" width="20%">
                  Bard Type:<br/>
                  <select class="left" name="bardtype">
<?foreach($itembardtype as $k => $v):?>
                    <option value="<?=$k?>"><?=$k?>: <?=$v?></option>
<?endforeach;?>
                  </select>
                </td>
                <td align="left" width="16%">Bard Effect:<br/><input type="text" name="bardeffect" size="5" value="-1"></td>
                <td align="left" width="16%">Bard Level:<br/><input type="text" name="bardlevel" size="5" value="0"></td>
                <td align="left" width="16%">Bard Level 2:<br/><input type="text" name="bardlevel2" size="5" value="0"></td>
                <td align="left" width="16%">Bard Value:<br/><input type="text" name="bardvalue" size="5" value="0"></td>
              </tr>
            </table>
          </center>
        </fieldset><br/>
        <fieldset>
          <legend><strong><font size="4">Faction</font></strong></legend>
          <center>
            <table width="100%" border="0" cellpadding="3" cellspacing="0">
              <tr>
                <td align="left" width="10%">Faction Mod 1:<br/>
                  <select class="left" name="factionmod1">
<?foreach($factions as $faction): extract($faction);?>
                    <option value="<?=$id?>"><?=$name?></option>
<?endforeach;?>
                  </select>
                </td>
                <td align="left" width="10%">Amt 1:<br/><input type="text" name="factionamt1" size="5" value="0"></td>
                <td align="left" width="10%">Faction Mod 2:<br/>
                  <select class="left" name="factionmod2">
<?foreach($factions as $faction): extract($faction);?>
                  <option value="<?=$id?>"><?=$name?></option>
<?endforeach;?>
                  </select>
                </td>
                <td align="left" width="10%">Amt 2:<br/><input type="text" name="factionamt2" size="5" value="0"></td>
              </tr>
              <tr>
                <td align="left" width="10%">Faction Mod 3:<br/>
                  <select class="left" name="factionmod3">
<?foreach($factions as $faction): extract($faction);?>
                    <option value="<?=$id?>"><?=$name?></option>
<?endforeach;?>
                  </select>
                </td>
                <td align="left" width="10%">Amt 3:<br/><input type="text" name="factionamt3" size="5" value="0"></td>
                <td align="left" width="10%">Faction Mod 4:<br/>
                  <select class="left" name="factionmod4">
<?foreach($factions as $faction): extract($faction);?>
                    <option value="<?=$id?>"><?=$name?></option>
<?endforeach;?>
                  </select>
                </td>
                <td align="left" width="10%">Amt 4:<br/><input type="text" name="factionamt4" size="5" value="0"></td>
              </tr>
            </table>
          </center>
        </fieldset><br/>
        <fieldset>
          <legend><strong><font size="4">Verification</font></strong></legend>
          <center>
            <table width="100%" border="0" cellpadding="3" cellspacing="0">
              <tr>
                <td align="left" width="25%">Created:<br/><input type="text" name="created" size="20" value="<?=$year?><?=$mon?><?=$mday?><?=$hours?><?=$minutes?><?=$seconds?>"></td>
                <td align="left" width="25%">Verified:<br/><input type="text" name="verified" size="20" value="<?=$year?>-<?=$mon?>-<?=$mday?> <?=$hours?>:<?=$minutes?>:<?=$seconds?>"></td>
                <td align="left" width="25%">Updated:<br/><input type="text" name="updated" size="20" value="<?=$year?>-<?=$mon?>-<?=$mday?> <?=$hours?>:<?=$minutes?>:<?=$seconds?>"></td>
                <td align="left" width="25%">Source:<br/><input type="text" name="source" size="20" value="CUSTOM"></td>
              </tr>
              <tr>
                <td align="left" width="25%">Comment:<br/><input type="text" name="comment" size="20" value=""></td>
              </tr>
            </table>
          </center>
        </fieldset><br/>
        <center>
          <input type="submit" value="Submit Changes">
        </center>
      </div>
    </div>
  </form>
