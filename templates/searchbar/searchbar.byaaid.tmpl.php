      <div id="searchbar">
        <table style="width: 100%;">
          <tr>
            <td>
                <strong>1.</strong>
                <label for="select_aa"></label>
              <select id="select_aa" OnChange="gotosite(this.options[this.selectedIndex].value)">
                <option value="">Select an AA</option>
<?php if(!empty($aas)) { foreach ($aas as $aa): extract($aa); ?>
                <option value="index.php?editor=<?=$curreditor?>&aaid=<?=$aa['skill_id']?>"<?php if ($curraa == $aa['skill_id']): ?> selected<?php endif;?>><?=$aa['name']?></option>
<?php endforeach; }?>
              </select>
            </td>
              <td style="text-align: right;"> or <strong>&nbsp;2.</strong>
                  <label for="aaid"></label>
              <form action="index.php" method="GET">
                <input type="hidden" name="editor" value="aa">
                <input type="hidden" name="action" value="1">
                <input type="text" id="aaid" name="aaid" size="5" value="ID" onFocus="clearField(document.forms[0].aaid);document.forms[0].search.value='AA Name';"> or
                  <label for="search"></label><input type="text" id="search" name="search" size="12" value="AA Name" onFocus="clearField(document.forms[0].search);document.forms[0].aaid.value='ID';">
                <input type="submit" value=" GO ">
              </form>
            </td>
          </tr>
        </table>
        <table style="width: 100%;">
          <tr>
              <td style="text-align: right;"> or <strong>&nbsp;3.</strong> Limit by
            <form action="index.php" method="GET">
              <input type="hidden" name="editor" value="aa">
              <input type="hidden" name="action" value="28">
                <label for="expansion"></label>
              <select id="expansion" name="exp">
                <option value="-1">All Expansions</option>
                  <?php for ($i=0; isset($eqexpansions[$i+1]); $i++) {?>
                <option value="<?=$i?>"<?php echo (isset($_GET['exp']) && ($_GET['exp'] == $i)) ? " selected" : ""?>><?=$eqexpansions[$i+1]?></option>
                  <?php } ?>
              </select>
                <?php $cls = $_GET['cls'] ?? -1; ?>
                <label for="cls"></label>
              <select id="cls" name="cls">
                <option value="-1"<?php echo ($cls == -1) ? " selected" : ""?>>All Classes</option>
                <option value="8"<?php echo ($cls == 8) ? " selected" : ""?>>Bard</option>
                <option value="15"<?php echo ($cls == 15) ? " selected" : ""?>>Beastlord</option>
                <option value="16"<?php echo ($cls == 16) ? " selected" : ""?>>Berserker</option>
                <option value="2"<?php echo ($cls == 2) ? " selected" : ""?>>Cleric</option>
                <option value="6"<?php echo ($cls == 6) ? " selected" : ""?>>Druid</option>
                <option value="14"<?php echo ($cls == 14) ? " selected" : ""?>>Enchanter</option>
                <option value="11"<?php echo ($cls == 11) ? " selected" : ""?>>Necromancer</option>
                <option value="13"<?php echo ($cls == 13) ? " selected" : ""?>>Magician</option>
                <option value="7"<?php echo ($cls == 7) ? " selected" : ""?>>Monk</option>
                <option value="3"<?php echo ($cls == 3) ? " selected" : ""?>>Paladin</option>
                <option value="4"<?php echo ($cls == 4) ? " selected" : ""?>>Ranger</option>
                <option value="9"<?php echo ($cls == 9) ? " selected" : ""?>>Rogue</option>
                <option value="5"<?php echo ($cls == 5) ? " selected" : ""?>>Shadowknight</option>
                <option value="10"<?php echo ($cls == 10) ? " selected" : ""?>>Shaman</option>
                <option value="1"<?php echo ($cls == 1) ? " selected" : ""?>>Warrior</option>
                <option value="12"<?php echo ($cls == 12) ? " selected" : ""?>>Wizard</option>
              </select>
              <input type="submit" value=" GO ">
            </form>
          </tr>
        </table>
      </div>
