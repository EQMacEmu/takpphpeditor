      <div class="table_container" style="width:250px;">
        <div class="table_header">
          Item Search Results
        </div>
        <div class="table_content">
            <?php if(!empty($results)):?>
                <?php foreach($results as $result): extract($result);?>
          <a href="index.php?editor=items&id=<?=$id?>&action=2"><?=$id?> - <?=$name?></a><br>
                <?php endforeach;?>
            <?php endif;?>
            <?php if(empty($results)):?>
          Your search produced no results!
            <?php endif;?>
        </div>
      </div>