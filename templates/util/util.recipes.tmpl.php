  <div class="center">
    <table id="CustomCount" style="border: 1px; width: 150px; border-collapse: collapse; border-spacing: 0; display:none;">
      <tr>
        <td style="padding: 3px; text-align: center;">
            <label for="new_count">New Count:</label> <input type="text" id="new_count" size="5" value="<?=$count?>"/><br/><br/>
          <input type="button" value="Submit" onClick="verifyCount();"/>&nbsp;<input type="button" value="Cancel" onClick="toggleCount();"/>
        </td>
      </tr>
    </table>
  </div><br/>
  <div class="table_container" style="width: 500px;">
    <div class="table_header">
      <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">
        <tr>
          <td style="padding: 0; text-align: left; width: 100%;">Recipe Activity - Recipes made <a href="javascript:toggleCount();"><?=$count?></a> or more times</td>
        </tr>
        </table>
      </div>
      <table class="table_content2" style="width: 100%;">
          <?php if (isset($recipes)):?>
        <tr>
          <td style="text-align: center; width: 25%;"><strong>Character</strong></td>
          <td style="text-align: center; width: 50%;"><strong>Recipe</strong></td>
          <td style="text-align: center; width: 20%;"><strong>Count</strong></td>
        </tr>
              <?php $x=0; foreach($recipes as $recipe=> $v):?>
        <tr style="background-color: #<?php echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA";?>">
          <td style="text-align: center; width: 25%;"><a href="index.php?editor=player&playerid=<?=$v['char_id']?>"><?php echo getPlayerName($v['char_id'])?></a></td>
          <td style="text-align: center; width: 50%;"><?php echo getRecipeName($v['recipe_id'])?></td>
          <td style="text-align: center; width: 20%;"><?=$v['madecount']?></td>
        </tr>
                  <?php $x++; endforeach;?>
          <?php endif;?>
          <?php if (!isset($recipes)):?>
        <tr>
          <td style="text-align: left; width: 100px; padding: 10px;">No entries</td>
        </tr>
          <?php endif;?>
      </table>
    </div><br/>
