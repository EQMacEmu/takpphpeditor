<?php if(!empty($errors)):?>
    <?php foreach($errors as $error):?>
    <div class='error'>
      <table style="width: 100%;">
        <tr>
          <td style="vertical-align: middle; width: 30px;">
            <img alt="Caution Icon" src='images/caution.gif'>
          </td>
          <td style="padding:0 5px;">
            <?=$error?>
          </td>
        </tr>
      </table>
    </div>
    <?php endforeach;?>
<?php endif;?>
  <form name="item_edit" method="post" action="index.php?editor=items&id=<?=$id ?? ""?>&action=6">
    <div class="edit_form">
      <div class="edit_form_header">
        Edit Item - <?=$id ?? ""?> (<a href="https://lucy.allakhazam.com/item.html?id=<?=$id ?? ""?>" target="_blank">Lucy</a>)
        <div style="float:right">
          <a href="index.php?editor=items&action=8"><img src="images/add.gif" style="border: 0;" alt="Yellow Plus Icon" title="Add an Item"></a>
          <a href="index.php?editor=items&id=<?=$id ?? ""?>&action=7" onClick="return confirm('Really Copy Item <?=$id ?? ""?>?');"><img src="images/last.gif" style="border: 0;" alt="Copy" title="Copy this Item"></a>
          <a href="index.php?editor=items&id=<?=$id ?? ""?>&action=5" onClick="return confirm('Really delete Item <?=$id ?? ""?>?');"><img src="images/table.gif" style="border: 0;" alt="Delete" title="Delete this Item"></a>
        </div>
      </div>
      <div class="edit_form_content">
        <fieldset style="text-align: left;">
          <legend><strong><span style="font-size: 18px;">General</span></strong></legend>
          <input type="hidden" name="id" value="<?=$id ?? ""?>">
          <table style="width: 100%; border: 0; border-collapse; collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 3px; text-align: left; width: 50%"><label for="itemname">Name:</label><br/><input type="text" id="itemname" name="itemname" size="45" value="<?=$itemname ?? ""?>"></td>
                <td style="padding: 3px; text-align: left; width: 50%"><label for="itemtype">Type:</label><br/>
                <select id="itemtype" name="itemtype" style="width:265px;">
                    <?php $itemtypes = $itemtypes ?? array(); ?>
                    <?php foreach($itemtypes as $k => $v):?>
                  <option value="<?=$k?>"<?php echo (isset($itemtype) && $k == $itemtype) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                    <?php endforeach;?>
                </select>
              </td>
            </tr>
          </table>
          <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 3px; text-align: left; width: 50%"><label for="lore">Lore Name: (* - Lore # - Artifact)</label><br/><input type="text" id="lore" name="lore" size="45" value="<?=$lore ?? ""?>"></td>
                <td style="padding: 3px; text-align: left; width: 50%"><label for="itemclass">Class:</label><br/>
                <select id="itemclass" name="itemclass">
                  <option value="0"<?php echo (isset($itemclass) && $itemclass == 0) ? " selected" : ""?>>Common Item</option>
                  <option value="1"<?php echo (isset($itemclass) && $itemclass == 1) ? " selected" : ""?>>Container</option>
                  <option value="2"<?php echo (isset($itemclass) && $itemclass == 2) ? " selected" : ""?>>Book</option>
                </select>
              </td>
            </tr>
          </table>
          <table style="width: 100%; border-collapse: collapse: border-spacing: 0;">
            <tr>
                <td style="padding: 3px; text-align: left; width: 34%;">
                    <label for="stackable">Stackable:</label>
                    <div class="tooltip">(?)
                        <span class="tooltiptext">0: Non-Stackable<br />1: Stackable<br />2: Unused<br />3: Spell Effect<br /></span>
                    </div><br/>
                    <select id="stackable" name="stackable">
                        <option value="0"<?php echo (isset($stackable) && $stackable == 0) ? " selected" : ""?>>0: Non-Stackable</option>
                        <option value="1"<?php echo (isset($stackable) && $stackable == 1) ? " selected" : ""?>>1: Stackable</option>
                        <option value="3"<?php echo (isset($stackable) && $stackable == 3) ? " selected" : ""?>>3: Spell Effect</option>
                    </select>
                </td>
                <td style="padding: 3px; text-align: left; width: 33%;"><label for="stacksize">Stacksize:</label><br/><input type="text" id="stacksize" name="stacksize" size="10" value="<?=$stacksize ?? ""?>"></td>
                <td style="padding: 3px; text-align: left; width: 33%;"><label for="maxcharges">Charges:</label><br/><input type="text" id="maxcharges" name="maxcharges" size="10" value="<?=$maxcharges ?? ""?>"></td>
            </tr>
          </table>
          <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
            <tr>
              <td style="padding: 3px; text-align: left; width: 33%;"><?php echo !empty($filename) ? '<a href="index.php?editor=items&id=' . ($id ?? "") . '&name=' . $filename . '&action=3"><label for="filename">Book Name:</label></a>' : 'Book Name:'?><br/><input type="text" id="filename" name="filename" size="25" value="<?=($filename ?? "")?>"/></td>
                <td style="padding: 3px; text-align: left; width: 33%;"><label for="book">Book:</label><br/>
                <select id="book" name="book">
                  <option value="0"<?php echo (isset($book) && $book == 0) ? " selected" : ""?>>No</option>
                  <option value="1"<?php echo (isset($book) && $book == 1) ? " selected" : ""?>>Yes</option>
                  <option value="2"<?php echo (isset($book) && $book == 2) ? " selected" : ""?>>Message</option>
                </select>
              </td>
                <td style="padding: 3px; text-align: left; width: 33%;"><label for="booktype">Booktype:</label><br/><input type="text" id="booktype" name="booktype" size="10" value="<?=$booktype ?? ""?>"/></td>
            </tr>
          </table>
          <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 3px; text-align: left; width: 25%"><label for="bagsize">Bag Size:</label><br/>
                <select class="left" id="bagsize" name="bagsize">
                    <?php
                    $itembagsize = $itembagsize ?? array();
                    foreach($itembagsize as $k => $v):?>
                  <option value="<?=$k?>"<?php echo (isset($bagsize) && $k == $bagsize) ? " selected" : ""?>><?=$v?></option>
                    <?php endforeach;?>
                </select>
              </td>
                <td style="padding: 3px; text-align: left; width: 25%"><label for="bagslots">Bag Slots:</label><br/><input type="text" id="bagslots" name="bagslots" size="10" value="<?=$bagslots ?? ""?>"></td>
                <td style="padding: 3px; text-align: left; width: 25%"><label for="bagwr">Bag Weight Reduction:</label><br/><input type="text" id="bagwr" name="bagwr" size="10" value="<?=$bagwr ?? ""?>"></td>
                <td style="padding: 3px; text-align: left; width: 25%"><label for="bagtype">Bag Type:</label><br/>
                <select class="left" id="bagtype" name="bagtype">
                    <?php
                    $world_containers = $world_containers ?? array();
                    foreach($world_containers as $k => $v):?>
                  <option value="<?=$k?>"<?php echo (isset($bagtype) && $k == $bagtype) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                    <?php endforeach;?>
                </select>
              </td>
            </tr>
          </table>
        </fieldset>
        <fieldset>
          <legend><strong><span style="font-size: 18px;">Restrictions</span></strong></legend>
          <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 3px; text-align: left; width: 20%"><label for="nodrop">No Drop:</label><br/>
                <select id="nodrop" name="nodrop">
                  <option value="1"<?php echo (isset($nodrop) && $nodrop == 1) ? " selected" : ""?>>No</option>
                  <option value="0"<?php echo (isset($nodrop) && $nodrop == 0) ? " selected" : ""?>>Yes</option>
                </select>
              </td>
                <td style="padding: 3px; text-align: left; width: 20%"><label for="norent">No Rent:</label><br/>
                <select id="norent" name="norent">
                  <option value="1"<?php echo (isset($norent) && $norent == 1) ? " selected" : ""?>>No</option>
                  <option value="0"<?php echo (isset($norent) && $norent == 0) ? " selected" : ""?>>Yes</option>
                  <option value="255"<?php echo (isset($norent) && $norent == 255) ? " selected" : ""?>>255</option>
                </select>
              </td>
                <td style="padding: 3px; text-align: left; width: 20%"><label for="magic">Magic:</label><br/>
                <select id="magic" name="magic">
                  <option value="0"<?php echo (isset($magic) && $magic == 0) ? " selected" : ""?>>No</option>
                  <option value="1"<?php echo (isset($magic) && $magic == 1) ? " selected" : ""?>>Yes</option>
                </select>
              </td>
                <td style="padding: 3px; text-align: left; width: 20%"><label for="tradeskills">Tradeskill:</label><br/>
                <select id="tradeskills" name="tradeskills">
                  <option value="0"<?php echo (isset($tradeskills) && $tradeskills == 0) ? " selected" : ""?>>No</option>
                  <option value="1"<?php echo (isset($tradeskills) && $tradeskills == 1) ? " selected" : ""?>>Yes</option>
                </select>
                <td style="padding: 3px; text-align: left; width: 20%"><label for="questitemflag">Quest:</label><br/>
                <select id="questitemflag" name="questitemflag">
                  <option value="0"<?php echo (isset($questitemflag) && $questitemflag == 0) ? " selected" : ""?>>No</option>
                  <option value="1"<?php echo (isset($questitemflag) && $questitemflag == 1) ? " selected" : ""?>>Yes</option>
                </select>
              </td>
            </tr>
            <tr>
                <td style="padding: 3px; text-align: left; width: 16%"><label for="fvnodrop">FV No Drop:</label><br/>
                <select id="fvnodrop" name="fvnodrop">
                  <option value="0"<?php echo (isset($fvnodrop) && $fvnodrop== 0) ? " selected" : ""?>>No</option>
                  <option value="1"<?php echo (isset($fvnodrop) && $fvnodrop == 1) ? " selected" : ""?>>Yes</option>
                </select>
              </td>
                <td style="padding: 3px; text-align: left; width: 16%"><label for="gmflag">GM Flag:</label><br/>
			         <select class="left" id="gmflag" name="gmflag">
                         <?php
                         $gmflagtype = $gmflagtype ?? array();
                         foreach($gmflagtype as $k => $v):?>
			           <option value="<?=$k?>"<?php echo (isset($gmflag) && $k == $gmflag) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                         <?php endforeach;?>
			        </select>
              </td>
                <td style="padding: 3px; text-align: left; width: 16%"><label for="soulbound">Soulbound:</label><br/>
			         <select class="left" id="soulbound" name="soulbound">
			           <option value="0"<?php echo (isset($soulbound) && $soulbound == 0) ? " selected" : ""?>>No</option>
                  <option value="1"<?php echo (isset($soulbound) && $soulbound == 1) ? " selected" : ""?>>Yes</option>
			         </select>
             </td>
            </tr>
            </table>
            <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 3px; text-align: left; width: 33%;"><label for="reqlevel">Req Level:</label><br/><input type="text" id="reqlevel" name="reqlevel" size="5" value="<?=$reqlevel ?? ""?>"></td>
                <td style="padding: 3px; text-align: left; width: 33%;"><label for="reclevel">Rec Level:</label><br/><input type="text" id="reclevel" name="reclevel" size="5" value="<?=$reclevel ?? ""?>"></td>
                <td style="padding: 3px; text-align: left; width: 34%;"><label for="recskill">Rec Skill:</label><br/><input type="text" id="recskill" name="recskill" size="5" value="<?=$recskill ?? ""?>"></td>
              
            </tr>
          </table>
          <table>
            <tr>
              <td style="padding: 20px; vertical-align: top; text-align: left;">Slots:<br/>
                  <?php $slots = $slots ?? 0; ?>
                  <input type="checkbox" id="slot_Cursor" name="slot_Cursor" value="1" <?php echo ($slots & 1) ? "checked" : ""?>> <label for="slot_Cursor">Cursor</label><br/>
                  <input type="checkbox" id="slot_Ear01" name="slot_Ear01" value="2" <?php echo ($slots & 2) ? "checked" : ""?>> <label for="slot_Ear01">Ear01</label><br/>
                  <input type="checkbox" id="slot_Head" name="slot_Head" value="4" <?php echo ($slots & 4) ? "checked" : ""?>> <label for="slot_Head">Head</label><br/>
                  <input type="checkbox" id="slot_Face" name="slot_Face" value="8" <?php echo ($slots & 8) ? "checked" : ""?>> <label for="slot_Face">Face</label><br/>
              </td>
              <td style="padding: 20px; vertical-align: top; text-align: left;"><br/>
                  <input type="checkbox" id="slot_Ear02" name="slot_Ear02" value="16" <?php echo ($slots & 16) ? "checked" : ""?>> <label for="slot_Ear02">Ear02</label><br/>
                  <input type="checkbox" id="slot_Neck" name="slot_Neck" value="32" <?php echo ($slots & 32) ? "checked" : ""?>> <label for="slot_Neck">Neck</label><br/>
                  <input type="checkbox" id="slot_Shoulder" name="slot_Shoulder" value="64" <?php echo ($slots & 64) ? "checked" : ""?>> <label for="slot_Shoulder">Shoulders</label><br/>
                  <input type="checkbox" id="slot_Arms" name="slot_Arms" value="128" <?php echo ($slots & 128) ? "checked" : ""?>> <label for="slot_Arms">Arms</label><br/>
              </td>
              <td style="padding: 20px; vertical-align: top; text-align: left;"><br/>
                  <input type="checkbox" id="slot_Back" name="slot_Back" value="256" <?php echo ($slots & 256) ? "checked" : ""?>> <label for="slot_Back">Back</label><br/>
                  <input type="checkbox" id="slot_Bracer01" name="slot_Bracer01" value="512" <?php echo ($slots & 512) ? "checked" : ""?>> <label for="slot_Bracer01">Bracer01</label><br/>
                  <input type="checkbox" id="slot_Bracer02" name="slot_Bracer02" value="1024" <?php echo ($slots & 1024) ? "checked" : ""?>> <label for="slot_Bracer02">Bracer02</label><br/>
                  <input type="checkbox" id="slot_Range" name="slot_Range" value="2048" <?php echo ($slots & 2048) ? "checked" : ""?>> <label for="slot_Range">Range</label><br/>
              </td>
              <td style="padding: 20px; vertical-align: top; text-align: left;"><br/>
                  <input type="checkbox" id="slot_Hands" name="slot_Hands" value="4096" <?php echo ($slots & 4096) ? "checked" : ""?>> <label for="slot_Hands">Hands</label><br/>
                  <input type="checkbox" id ="slot_Primary" name="slot_Primary" value="8192" <?php echo ($slots & 8192) ? "checked" : ""?>> <label for="slot_Primary">Primary</label><br/>
                  <input type="checkbox" id="slot_Secondary" name="slot_Secondary" value="16384" <?php echo ($slots & 16384) ? "checked" : ""?>> <label for="slot_Secondary">Secondary</label><br/>
                  <input type="checkbox" id="slot_Ring01" name="slot_Ring01" value="32768" <?php echo ($slots & 32768) ? "checked" : ""?>> <label for="slot_Ring01">Ring01</label><br/>
              </td>
              <td style="padding: 20px; vertical-align: top; text-align: left;"><br/>
                  <input type="checkbox" id="slot_Ring02" name="slot_Ring02" value="65536" <?php echo ($slots & 65536) ? "checked" : ""?>> <label for="slot_Ring02">Ring02</label><br/>
                  <input type="checkbox" id="slot_Chest" name="slot_Chest" value="131072" <?php echo ($slots & 131072) ? "checked" : ""?>> <label for="slot_Chest">Chest</label><br/>
                  <input type="checkbox" id="slot_Legs" name="slot_Legs" value="262144" <?php echo ($slots & 262144) ? "checked" : ""?>> <label for="slot_Legs">Legs</label><br/>
                  <input type="checkbox" id="slot_Feet" name="slot_Feet" value="524288" <?php echo ($slots & 524288) ? "checked" : ""?>> <label for="slot_Feet">Feet</label><br/>
              </td>
              <td style="padding: 20px; vertical-align: top; text-align: left;"><br/>
                  <input type="checkbox" id="slot_Waist" name="slot_Waist" value="1048576" <?php echo ($slots & 1048576) ? "checked" : ""?>> <label for="slot_Waist">Waist</label><br/>
                  <input type="checkbox" id="slot_Ammo" name="slot_Ammo" value="2097152" <?php echo ($slots & 2097152) ? "checked" : ""?>> <label for="slot_Ammo">Ammo</label><br/>
                  <input type="checkbox" id="all_none" name="all_none" value="yes" onClick="Check(document.item_edit)"> <b><label for="all_none">All/None</label></b><br/>
              </td>
            </tr>
          </table>
          <table>
            <tr>
              <td style="padding: 20px; vertical-align: top; text-align: left;">Races:<br/>
                  <?php $races = $races ?? 0; ?>
                  <input type="checkbox" id="race_Human" name="race_Human" value="1" <?php echo ($races & 1) ? "checked" : ""?>> <label for="race_Human">Human</label><br/>
                  <input type="checkbox" id="race_Barbarian" name="race_Barbarian" value="2" <?php echo ($races & 2) ? "checked" : ""?>> <label for="race_Barbarian">Barbarian</label><br/>
                  <input type="checkbox" id="race_Erudite" name="race_Erudite" value="4" <?php echo ($races & 4) ? "checked" : ""?>> <label for="race_Erudite">Erudite</label><br/>
                  <input type="checkbox" id="race_Wood_Elf" name="race_Wood_Elf" value="8" <?php echo ($races & 8) ? "checked" : ""?>> <label for="race_Wood_Elf">Wood Elf</label><br/>
              </td>
              <td style="padding: 20px; vertical-align: top; text-align: left;"><br/>
                  <input type="checkbox" id="race_High_Elf" name="race_High_Elf" value="16" <?php echo ($races & 16) ? "checked" : ""?>> <label for="race_High_Elf">High Elf</label><br/>
                  <input type="checkbox" id="race_Dark_Elf" name="race_Dark_Elf" value="32" <?php echo ($races & 32) ? "checked" : ""?>> <label for="race_Dark_Elf">Dark Elf</label><br/>
                  <input type="checkbox" id="race_Half_Elf" name="race_Half_Elf" value="64" <?php echo ($races & 64) ? "checked" : ""?>> <label for="race_Half_Elf">Half Elf</label><br/>
                  <input type="checkbox" id="race_Dwarf" name="race_Dwarf" value="128" <?php echo ($races & 128) ? "checked" : ""?>> <label for="race_Dwarf">Dwarf</label><br/>
              </td>
              <td style="padding: 20px; vertical-align: top; text-align: left;"><br/>
                  <input type="checkbox" id="race_Troll" name="race_Troll" value="256" <?php echo ($races & 256) ? "checked" : ""?>> <label for="race_Troll">Troll</label><br/>
                  <input type="checkbox" id="race_Ogre" name="race_Ogre" value="512" <?php echo ($races & 512) ? "checked" : ""?>> <label for="race_Ogre">Ogre</label><br/>
                  <input type="checkbox" id="race_Halfling" name="race_Halfling" value="1024" <?php echo ($races & 1024) ? "checked" : ""?>> <label for="race_Halfling">Halfling</label><br/>
                  <input type="checkbox" id="race_Gnome" name="race_Gnome" value="2048" <?php echo ($races & 2048) ? "checked" : ""?>> <label for="race_Gnome">Gnome</label><br/>
              </td>
              <td style="padding: 20px; vertical-align: top; text-align: left;"><br/>
                  <input type="checkbox" id="race_Iksar" name="race_Iksar" value="4096" <?php echo ($races & 4096) ? "checked" : ""?>> <label for="race_Iksar">Iksar</label><br/>
                  <input type="checkbox" id="race_Vah_Shir" name="race_Vah_Shir" value="8192" <?php echo ($races & 8192) ? "checked" : ""?>> <label for="race_Vah_Shir">Vah Shir</label><br/>
                  <input type="checkbox" id="all_none2" name="all_none2" value="yes" onClick="Check2(document.item_edit)"> <b><label for="all_none2">All/None</label></b><br/>
              </td>
            </tr>
          </table>
          <table>
            <tr>
              <td style="padding: 20px; vertical-align: top; text-align: left;">Classes:<br/>
                  <?php $classes = $classes ?? 0; ?>
                  <input type="checkbox" id="class_Warrior" name="class_Warrior" value="1" <?php echo ($classes & 1) ? "checked" : ""?>> <label for="class_Warrior">Warrior</label><br/>
                  <input type="checkbox" id="class_Cleric" name="class_Cleric" value="2" <?php echo ($classes & 2) ? "checked" : ""?>> <label for="class_Cleric">Cleric</label><br/>
                  <input type="checkbox" id="class_Paladin" name="class_Paladin" value="4" <?php echo ($classes & 4) ? "checked" : ""?>> <label for="class_Paladin">Paladin</label><br/>
                  <input type="checkbox" id="class_Ranger" name="class_Ranger" value="8" <?php echo ($classes & 8) ? "checked" : ""?>> <label for="class_Ranger">Ranger</label><br/>
              </td>
              <td style="padding: 20px; vertical-align: top; text-align: left;"><br/>
                  <input type="checkbox" id="class_Shadowknight" name="class_Shadowknight" value="16" <?php echo ($classes & 16) ? "checked" : ""?>> <label for="class_Shadowknight">Shadowknight</label><br/>
                  <input type="checkbox" id="class_Druid" name="class_Druid" value="32" <?php echo ($classes & 32) ? "checked" : ""?>> <label for="class_Druid">Druid</label><br/>
                  <input type="checkbox" id="class_Monk" name="class_Monk" value="64" <?php echo ($classes & 64) ? "checked" : ""?>> <label for="class_Monk">Monk</label><br/>
                  <input type="checkbox" id="class_Bard" name="class_Bard" value="128" <?php echo ($classes & 128) ? "checked" : ""?>> <label for="class_Bard">Bard</label><br/>
              </td>
              <td style="padding: 20px; vertical-align: top; text-align: left;"><br/>
                  <input type="checkbox" id="class_Rogue" name="class_Rogue" value="256" <?php echo ($classes & 256) ? "checked" : ""?>> <label for="class_Rogue">Rogue</label><br/>
                  <input type="checkbox" id="class_Shaman" name="class_Shaman" value="512" <?php echo ($classes & 512) ? "checked" : ""?>> <label for="class_Shaman">Shaman</label><br/>
                  <input type="checkbox" id="class_Necromancer" name="class_Necromancer" value="1024" <?php echo ($classes & 1024) ? "checked" : ""?>> <label for="class_Necromancer">Necromancer</label><br/>
                  <input type="checkbox" id="class_Wizard" name="class_Wizard" value="2048" <?php echo ($classes & 2048) ? "checked" : ""?>> <label for="class_Wizard">Wizard</label><br/>
              </td>
              <td style="padding: 20px; vertical-align: top; text-align: left;"><br/>
                  <input type="checkbox" id="class_Magician" name="class_Magician" value="4096" <?php echo ($classes & 4096) ? "checked" : ""?>> <label for="class_Magician">Magician</label><br/>
                  <input type="checkbox" id="class_Enchanter" name="class_Enchanter" value="8192" <?php echo ($classes & 8192) ? "checked" : ""?>> <label for="class_Enchanter">Enchanter</label><br/>
                  <input type="checkbox" id="class_Beastlord" name="class_Beastlord" value="16384" <?php echo ($classes & 16384) ? "checked" : ""?>> <label for="class_Beastlord">Beastlord</label><br/>
                  <input type="checkbox" id="all_none3" name="all_none3" value="yes" onClick="Check3(document.item_edit)"> <b><label for="all_none3">All/None</label></b><br/>
              </td>
            </tr>
          </table>
          <table>
            <tr>
              <td style="padding: 20px; vertical-align: top; text-align: left;">Deities:<br/>
                  <?php $deity = $deity ?? 0; ?>
                  <input type="checkbox" id="deity_Agnostic" name="deity_Agnostic" value="1" <?php echo ($deity & 1) ? "checked" : ""?>> <label for="deity_Agnostic">Agnostic</label><br/>
                  <input type="checkbox" id="deity_Bertox" name="deity_Bertox" value="2" <?php echo ($deity & 2) ? "checked" : ""?>> <label for="deity_Bertox">Bertoxxulous</label><br/>
                  <input type="checkbox" id="deity_Brell" name="deity_Brell" value="4" <?php echo ($deity & 4) ? "checked" : ""?>> <label for="deity_Brell">Brell Serilis</label><br/>
                  <input type="checkbox" id="deity_Cazic" name="deity_Cazic" value="8" <?php echo ($deity & 8) ? "checked" : ""?>> <label for="deity_Cazic">Cazic-Thule</label><br/>
              </td>
              <td style="padding: 20px; vertical-align: top; text-align: left;"><br/>
                  <input type="checkbox" id="deity_Erollsi" name="deity_Erollsi" value="16" <?php echo ($deity & 16) ? "checked" : ""?>> <label for="deity_Erollsi">Erollisi Marr</label><br/>
                  <input type="checkbox" id="deity_Bristlebane" name="deity_Bristlebane" value="32" <?php echo ($deity & 32) ? "checked" : ""?>> <label for="deity_Bristlebane">Bristlebane</label><br/>
                  <input type="checkbox" id="deity_Innoruuk" name="deity_Innoruuk" value="64" <?php echo ($deity & 64) ? "checked" : ""?>> <label for="deity_Innoruuk">Innoruuk</label><br/>
                  <input type="checkbox" id="deity_Karana" name="deity_Karana" value="128" <?php echo ($deity & 128) ? "checked" : ""?>> <label for="deity_Karana">Karana</label><br/>
              </td>
              <td style="padding: 20px; vertical-align: top; text-align: left;"><br/>
                  <input type="checkbox" id="deity_Mithaniel_Marr" name="deity_Mithaniel_Marr" value="256" <?php echo ($deity & 256) ? "checked" : ""?>> <label for="deity_Mithaniel_Marr">Mithaniel Marr</label><br/>
                  <input type="checkbox" id="deity_Prexus" name="deity_Prexus" value="512" <?php echo ($deity & 512) ? "checked" : ""?>> <label for="deity_Prexus">Prexus</label><br/>
                  <input type="checkbox" id="deity_Quellious" name="deity_Quellious" value="1024" <?php echo ($deity & 1024) ? "checked" : ""?>> <label for="deity_Quellious">Quellious</label><br/>
                  <input type="checkbox" id="deity_Rallos_Zek" name="deity_Rallos_Zek" value="2048" <?php echo ($deity & 2048) ? "checked" : ""?>> <label for="deity_Rallos_Zek">Rallos Zek</label><br/>
              </td>
              <td style="padding: 20px; vertical-align: top; text-align: left;"><br/>
                  <input type="checkbox" id="deity_Rodcet_Nife" name="deity_Rodcet_Nife" value="4096" <?php echo ($deity & 4096) ? "checked" : ""?>> <label for="deity_Rodcet_Nife">Rodcet Nife</label><br/>
                  <input type="checkbox" id="deity_Solusek_Ro" name="deity_Solusek_Ro" value="8192" <?php echo ($deity & 8192) ? "checked" : ""?>> <label for="deity_Solusek_Ro">Solusek Ro</label><br/>
                  <input type="checkbox" id="deity_The_Tribunal" name="deity_The_Tribunal" value="16384" <?php echo ($deity & 16384) ? "checked" : ""?>> <label for="deity_The_Tribunal">The Tribunal</label><br/>
                  <input type="checkbox" id="deity_Tunare" name="deity_Tunare" value="32768" <?php echo ($deity & 32768) ? "checked" : ""?>> <label for="deity_Tunare">Tunare</label><br/>
              </td>
              <td style="padding: 20px; vertical-align: top; text-align: left;"><br/>
                  <input type="checkbox" id="deity_Veeshan" name="deity_Veeshan" value="65536" <?php echo ($deity & 65536) ? "checked" : ""?>> <label for="deity_Veeshan">Veeshan</label><br/>
                  <input type="checkbox" id="all_none4" name="all_none4" value="yes" onClick="Check4(document.item_edit)"> <b><label for="all_none4">All/None</label></b><br/>
              </td>
            </tr>
          </table>
        </fieldset>
        <fieldset>
          <legend><strong><span style="font-size: 18px;">Stats</span></strong></legend><br/>
          <fieldset>
            <legend><span style="font-size: 18px;">Damage</span></legend>
            <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
              <tr>
                  <td style="padding: 3px; text-align: left; width: 33%;"><label for="damage">Damage:</label><br/><input type="text" id="damage" name="damage" size="5" value="<?=$damage ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 33%;"><label for="delay">Delay:</label><br/><input type="text" id="delay" name="delay" size="5" value="<?=$delay ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 33%;"><label for="range">Range:</label><br/><input type="text" id="range" name="range" size="5" value="<?=$range ?? ""?>"></td>
              </tr>
            </table>
            <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
              <tr>
                  <td style="padding: 3px; text-align: left; width: 33%;"><label for="banedmgamt">Bane Dmg:</label><br/><input type="text" id="banedmgamt" name="banedmgamt" size="5" value="<?=$banedmgamt ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 33%;"><label for="banedmgrace">Bane Race:</label><br/>
                  <select class="left" id="banedmgrace" name="banedmgrace">
                      <?php $itemraces = $itemraces ?? array(); ?>
                      <?php foreach($itemraces as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($banedmgrace) && $k == $banedmgrace) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td style="padding: 3px; text-align: left; width: 34%;"><label for="banedmgbody">Bane Bodytype:</label><br/>
                  <select class="left" id="banedmgbody" name="banedmgbody">
                      <?php $bodytypes = $bodytypes ?? array(); ?>
                      <?php foreach($bodytypes as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($banedmgbody) && $k == $banedmgbody) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
              </tr>
            </table><br/>
            <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
              <tr>
                  <td style="padding: 3px; text-align: left; width: 50%"><label for="elemdmgtype">Elem Dmg Type:</label><br/><input type="text" id="elemdmgtype" name="elemdmgtype" size="5" value="<?=$elemdmgtype ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 50%"> <label for="elemdmgamt">Elem Dmg Amt:</label><br/><input type="text" id="elemdmgamt" name="elemdmgamt" size="5" value="<?=$elemdmgamt ?? ""?>"></td>
              </tr>
            </table>
          </fieldset><br/><br/>
          <fieldset>
            <legend><span style="font-size: 18px;">Base Stats</span></legend>
            <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
              <tr>
                  <td style="padding: 3px; text-align: left; width: 25%"><label for="hp">HP:</label><br/><input type="text" id="hp" name="hp" size="5" value="<?=$hp ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 25%"><label for="mana">Mana:</label><br/><input type="text" id="mana" name="mana" size="5" value="<?=$mana ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 25%"><label for="ac">AC:</label><br/><input type="text" id="ac" name="ac" size="5" value="<?=$ac ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 25%"><label for="light">Light:</label><br/><input type="text" id="light" name="light" size="5" value="<?=$light ?? ""?>"></td>
              </tr>
            </table>
          </fieldset><br/><br/>
          <fieldset>
            <legend><span style="font-size: 18px;">Stats</span></legend>
            <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
              <tr>
                  <td style="padding: 3px; text-align: left; width: 14%"><label for="aagi">AGI:</label><br/><input type="text" id="aagi" name="aagi" size="5" value="<?=$aagi ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 14%"><label for="acha">CHA:</label><br/><input type="text" id="acha" name="acha" size="5" value="<?=$acha ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 14%"><label for="adex">DEX:</label><br/><input type="text" id="adex" name="adex" size="5" value="<?=$adex ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 14%"><label for="aint">INT:</label><br/><input type="text" id="aint" name="aint" size="5" value="<?=$aint ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 14%"><label for="asta">STA:</label><br/><input type="text" id="asta" name="asta" size="5" value="<?=$asta ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 15%"><label for="astr">STR:</label><br/><input type="text" id="astr" name="astr" size="5" value="<?=$astr ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 15%"><label for="awis">WIS:</label><br/><input type="text" id="awis" name="awis" size="5" value="<?=$awis ?? ""?>"></td>
              </tr>
              </table>
              <table style="width: 100%; border: 0; border-collapse: collapse: border-spacing: 0;">
              <tr>
                  <td style="padding: 3px; text-align: left; width: 20%"><label for="cr">Cold:</label><br/><input type="text" id="cr" name="cr" size="5" value="<?=$cr ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 20%"><label for="dr">Disease:</label><br/><input type="text" id="dr" name="dr" size="5" value="<?=$dr ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 20%"><label for="fr">Fire:</label><br/><input type="text" id="fr" name="fr" size="5" value="<?=$fr ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 20%"><label for="mr">Magic:</label><br/><input type="text" id="mr" name="mr" size="5" value="<?=$mr ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 20%"><label for="pr">Poison:</label><br/><input type="text" id="pr" name="pr" size="5" value="<?=$pr ?? ""?>"></td>
              </tr>
            </table>
          </fieldset><br/><br/>
          <fieldset>
            <legend><span style="font-size: 18px;">Skill Stats</span></legend>
            <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
              <tr>
                  <td style="padding: 3px; text-align: left; width: 50%"><label for="skillmodtype">Skill Mod:</label><br/>
                  <select class="left" id="skillmodtype" name="skillmodtype">
                      <?php $skilltypes = $skilltypes ?? array(); ?>
                      <?php foreach($skilltypes as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($skillmodtype) && $k == $skillmodtype) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td style="padding: 3px; text-align: left; width: 50%"><label for="skillmodvalue">Skill Mod Value:</label><br/><input type="text" id="skillmodvalue" name="skillmodvalue" size="5" value="<?=$skillmodvalue ?? ""?>"></td>
              </tr>
            </table>
          </fieldset><br/>
        </fieldset><br/>
        <fieldset>
          <legend><strong><span style="font-size: 18px">Costs</span></strong></legend>
          <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 3px; text-align: left; width: 50%"><label for="price">Price:</label><br/><input type="text" id="price" name="price" size="9" value="<?=$price ?? ""?>"></td>
                <td style="padding: 3px; text-align: left; width: 50%"><label for="sellrate">Sellrate:</label><br/><input type="text" id="sellrate" name="sellrate" size="9" value="<?=$sellrate ?? ""?>"></td>
            </tr>
          </table>
        </fieldset><br/>
        <fieldset>
          <legend><strong><span style="font-size: 18px">Appearance</span></strong></legend>
          <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 3px; text-align: left; width: 25%"><label for="icon">Icon:</label><br/><input type="text" id="icon" name="icon" size="9" value="<?=$icon ?? ""?>"></td>
                <td style="padding: 3px; text-align: left; width: 25%"><label for="idfile">IDFile:</label><br/><input type="text" id="idfile" name="idfile" size="9" value="<?=$idfile ?? ""?>"></td>
                <td style="padding: 3px; text-align: left; width: 25%"><label for="weight">Weight:</label><br/><input type="text" id="weight" name="weight" size="9" value="<?=$weight ?? ""?>"></td>
                <td style="padding: 3px; text-align: left; width: 25%"><label for="color">Color:</label><br/><input type="text" id="color" name="color" size="9" value="<?=$color ?? ""?>"></td>
            </tr>
          </table>
          <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
            <tr>
                <td style="padding: 3px; text-align: left; width: 33%;"><label for="size">Size:</label><br/>
                <select class="left" id="size" name="size">
                    <?php
                    $itemsize = $itemsize ?? array();
                    foreach($itemsize as $k => $v):?>
                  <option value="<?=$k?>"<?php echo (isset($size) && $k == $size) ? " selected" : ""?>><?=$v?></option>
                    <?php endforeach;?>
                </select>
              </td>
                <td style="padding: 3px; text-align: left; width: 33%;"><label for="material">Material:</label><br/>
                <select class="left" id="material" name="material">
                    <?php
                    $itemmaterial = $itemmaterial ?? array();
                    foreach($itemmaterial as $k => $v):?>
                  <option value="<?=$k?>"<?php echo (isset($material) && $k == $material) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                    <?php endforeach;?>
                </select>
              </td>
            </tr>
          </table>
        </fieldset><br/>
        <fieldset>
          <legend><strong><span style="font-size: 18px;">Spells</span></strong></legend>
          (<a href="javascript:showSearch();">Spell Search</a>)<br/><br/>
          <div class="center">
            <iframe id='searchframe' src='templates/iframes/spellsearch.php'></iframe>
            <input id="button" type="button" value='Hide Spell Search' onclick='hideSearch();' style='display:none; margin-bottom: 20px;'>
          </div>
          <div class="center">
            <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
              <tr>
                  <td style="padding: 3px; text-align: left; width: 25%"><label for="casttime">Casttime:</label><br/><input type="text" id="casttime" name="casttime" size="9" value="<?=$casttime ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 25%"><label for="casttime_">Casttime_:</label><br/><input type="text" id="casttime_" name="casttime_" size="9" value="<?=$casttime_ ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 25%"><label for="recastdelay">Recast Delay:</label><br/><input type="text" id="recastdelay" name="recastdelay" size="9" value="<?=$recastdelay ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 25%"><label for="recasttype">Recast Type:</label><br/><input type="text" id="recasttype" name="recasttype" size="9" value="<?=$recasttype ?? ""?>"></td>
              </tr>
            </table>
            <table style="width:100%; border: 0; border-collapse: collapse; border-spacing: 0;">
              <tr>
                  <td style="padding: 3px; text-align: left; width: 14%"><label for="clicktype">Click Type:</label><br/>
                  <select class="left" id="clicktype" name="clicktype">
                      <?php
                      $itemcasttype = $itemcasttype ?? array();
                      foreach($itemcasttype as $k => $v):?>
                        <option value="<?=$k?>"<?php echo (isset($clicktype) && $k == $clicktype) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td style="padding: 3px; text-align: left; width: 14%"><label for="clickeffect">Click Effect:</label><br/><input type="text" id="clickeffect" name="clickeffect" size="5" value="<?=$clickeffect ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 14%"><label for="clicklevel">Click Level:</label><br/><input type="text" id="clicklevel" name="clicklevel" size="5" value="<?=$clicklevel ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 14%"><label for="clicklevel2">Click Level 2:</label><br/><input type="text" id="clicklevel2" name="clicklevel2" size="5" value="<?=$clicklevel2 ?? ""?>"></td>
              </tr>
            </table>
            <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
              <tr>
                  <td style="padding: 3px; text-align: left; width: 20%"><label for="proctype">Proc Type:</label><br/>
                  <select class="left" id="proctype" name="proctype">
                      <?php
                      $proccasttype = $proccasttype ?? array();
                      foreach($proccasttype as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($proctype) && $k == $proctype) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td style="padding: 3px; text-align: left; width: 16%"><label for="proceffect">Proc Effect:</label><br/><input type="text" id="proceffect" name="proceffect" size="5" value="<?=$proceffect ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 16%"><label for="proclevel">Proc Level:</label><br/><input type="text" id="proclevel" name="proclevel" size="5" value="<?=$proclevel ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 16%"><label for="proclevel2">Proc Level 2:</label><br/><input type="text" id="proclevel2" name="proclevel2" size="5" value="<?=$proclevel2 ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 16%"><label for="procrate">Proc Rate:</label><br/><input type="text" id="procrate" name="procrate" size="5" value="<?=$procrate ?? ""?>"></td>
              </tr>
            </table>
            <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
              <tr>
                  <td style="padding: 3px; text-align: left; width: 20%"><label for="worntype">Worn Type:</label><br/>
                  <select class="left" id="worntype" name="worntype">
                      <?php
                      $worncasttype = $worncasttype ?? array();
                      foreach($worncasttype as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($worntype) && $k == $worntype) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td style="padding: 3px; text-align: left; width: 16%">
                      <label for="worneffect">Worn Effect:</label>
                      <div class="tooltip">(?)
                          <span class="tooltiptext">Set Stackable to 3</span>
                      </div><br/>
                      <input type="text" id="worneffect" name="worneffect" size="5" value="<?=$worneffect ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 16%"><label for="wornlevel">Worn Level:</label><br/><input type="text" id="wornlevel" name="wornlevel" size="5" value="<?=$wornlevel ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 16%"><label for="wornlevel2">Worn Level 2:</label><br/><input type="text" id="wornlevel2" name="wornlevel2" size="5" value="<?=$wornlevel2 ?? ""?>"></td>
                <td style="padding: 3px; text-align: left; width: 16%">&nbsp;</td>
              </tr>
            </table>
            <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
              <tr>
                  <td style="padding: 3px; text-align: left; width: 20%"><label for="focustype">Focus Type:</label><br/>
                  <select class="left" id="focustype" name="focustype">
                      <?php
                      $focuscasttype = $focuscasttype ?? array();
                      foreach($focuscasttype as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($focustype) && $k == $focustype) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td style="padding: 3px; text-align: left; width: 16%"><label for="focuseffect">Focus Effect:</label><br/><input type="text" id="focuseffect" name="focuseffect" size="5" value="<?=$focuseffect ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 16%"><label for="focuslevel">Focus Level:</label><br/><input type="text" id="focuslevel" name="focuslevel" size="5" value="<?=$focuslevel ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 16%"><label for="focuslevel2">Focus Level 2:</label><br/><input type="text" id="focuslevel2" name="focuslevel2" size="5" value="<?=$focuslevel2 ?? ""?>"></td>
                <td style="padding: 3px; text-align: left; width: 16%">&nbsp;</td>
              </tr>
            </table>
            <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
              <tr>
                  <td style="padding: 3px; text-align: left; width: 20%"><label for="scrolltype">Scroll Type:</label><br/>
                  <select class="left" id="scrolltype" name="scrolltype">
                      <?php
                      $scrollcasttype = $scrollcasttype ?? array();
                      foreach($scrollcasttype as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($scrolltype) && $k == $scrolltype) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td style="padding: 3px; text-align: left; width: 16%"><label for="scrolleffect">Scroll Effect:</label><br/><input type="text" id="scrolleffect" name="scrolleffect" size="5" value="<?=$scrolleffect ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 16%"><label for="scrolllevel">Scroll Level:</label><br/><input type="text" id="scrolllevel" name="scrolllevel" size="5" value="<?=$scrolllevel ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 16%"><label for="scrolllevel2">Scroll Level 2:</label><br/><input type="text" id="scrolllevel2" name="scrolllevel2" size="5" value="<?=$scrolllevel2 ?? ""?>"></td>
                <td style="padding: 3px; text-align: left; width: 16%">&nbsp;</td>
              </tr>
            </table>
            <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
              <tr>
                  <td style="padding: 3px; text-align: left; width: 20%"><label for="bardtype">Bard Type:</label><br/>
                  <select class="left" id="bardtype" name="bardtype">
                      <?php
                      $itembardtype = $itembardtype ?? array();
                      foreach($itembardtype as $k => $v):?>
                    <option value="<?=$k?>"<?php echo (isset($bardtype) && $k == $bardtype) ? " selected" : ""?>><?=$k?>: <?=$v?></option>
                      <?php endforeach;?>
                  </select>
                </td>
                  <td style="padding: 3px; text-align: left; width: 16%"><label for="bardeffect">Bard Effect:</label><br/><input type="text" id="bardeffect" name="bardeffect" size="5" value="<?=$bardeffect ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 16%"><label for="bardlevel">Bard Level:</label><br/><input type="text" id="bardlevel" name="bardlevel" size="5" value="<?=$bardlevel ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 16%"><label for="bardlevel2">Bard Level 2:</label><br/><input type="text" id="bardlevel2" name="bardlevel2" size="5" value="<?=$bardlevel2 ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 16%"><label for="bardvalue">Bard Value:</label><br/><input type="text" id="bardvalue" name="bardvalue" size="5" value="<?=$bardvalue ?? ""?>"></td>
              </tr>
            </table>
          </div>
        </fieldset><br/>
        <fieldset>
          <legend><strong><span style="font-size: 18px;">Faction</span></strong></legend>
          <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
              <tr>
                  <td style="padding: 3px; text-align: left; width: 10%"><label for="factionmod1">Faction Mod 1:</label><br/>
                <select class="left" id="factionmod1" name="factionmod1">
                    <?php
                    $factions = $factions ?? array();
                    foreach($factions as $faction): extract($faction);?>
                  <option value="<?=$id?>"<?php echo ($id == $factionmod1) ? " selected" : ""?>><?=$name?></option>
                    <?php endforeach;?>
                </select></td>
                  <td style="padding: 3px; text-align: left; width: 10%"><label for="factionamt1">Amt 1:</label><br/><input type="text" id="factionamt1" name="factionamt1" size="5" value="<?=$factionamt1 ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 10%"><label for="factionmod2">Faction Mod 2:</label><br/>
                <select class="left" id="factionmod2" name="factionmod2">
                    <?php foreach($factions as $faction): extract($faction);?>
               <option value="<?=$id?>"<?php echo ($id == $factionmod2) ? " selected" : ""?>><?=$name?></option>
                    <?php endforeach;?>
                </select></td>
                  <td style="padding: 3px; text-align: left; width: 10%"><label for="factionamt2">Amt 2:</label><br/><input type="text" id="factionamt2" name="factionamt2" size="5" value="<?=$factionamt2 ?? ""?>"></td>
              </tr>
              <tr>
                  <td style="padding: 3px; text-align: left; width: 10%"><label for="factionmod3">Faction Mod 3:</label><br/>
                <select class="left" id="factionmod3" name="factionmod3">
                    <?php foreach($factions as $faction): extract($faction);?>
               <option value="<?=$id?>"<?php echo ($id == $factionmod3) ? " selected" : ""?>><?=$name?></option>
                    <?php endforeach;?>
                </select></td>
                  <td style="padding: 3px; text-align: left; width: 10%"><label for="factionamt3">Amt 3:</label><br/><input type="text" id="factionamt3" name="factionamt3" size="5" value="<?=$factionamt3 ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 10%"><label for="factionmod4">Faction Mod 4:</label><br/>
                <select class="left" id="factionmod4" name="factionmod4">
                    <?php foreach($factions as $faction): extract($faction);?>
               <option value="<?=$id?>"<?php echo ($id == $factionmod4) ? " selected" : ""?>><?=$name?></option>
                    <?php endforeach;?>
                </select></td>
                  <td style="padding: 3px; text-align: left; width: 10%"><label for="factionamt4">Amt 4:</label><br/><input type="text" id="factionamt4" name="factionamt4" size="5" value="<?=$factionamt4 ?? ""?>"></td>
              </tr>
          </table>
        </fieldset><br/>
        <fieldset>
          <legend><strong><span style="font-size: 18px;">Verification</span></strong></legend>
          <table style="width: 100%; border: 0; border-collapse: collapse; border-spacing: 0;">
              <tr>
                  <td style="padding: 3px; text-align: left; width: 25%"><label for="created">Created:</label><br/><input type="text" id="created" name="created" size="20" value="<?=$created ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 25%"><label for="verified">Verified:</label><br/><input type="text" id="verified" name="verified" size="20" value="<?=$verified ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 25%"><label for="updated_read">Updated:</label><br/><input type="text" id="updated_read" name="updated_read" size="20" value="<?=$updated ?? ""?>"></td>
              </tr>
              <tr>
                  <td style="padding: 3px; text-align: left; width: 25%"><label for="source">Source:</label><br/><input type="text" id="source" name="source" size="20" value="<?=$source ?? ""?>"></td>
                  <td style="padding: 3px; text-align: left; width: 25%"><label for="comment">Comment:</label><br/><input type="text" id="comment" name="comment" size="20" value="<?=$comment ?? ""?>"></td>
              </tr>
          </table>
        </fieldset><br/>
        <div class="center">
          <input type="hidden" name="updated" value="<?=$year ?? ""?>-<?=$mon ?? ""?>-<?=$mday ?? ""?> <?=$hours ?? ""?>:<?=$minutes ?? ""?>:<?=$seconds ?? ""?>">
          <input type="submit" value="Submit Changes">
        </div>
      </div>
    </div>
  </form>
