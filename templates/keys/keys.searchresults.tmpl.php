<div class="table_container" style="width:250px;">
    <div class="table_header">Search Results</div>
    <div class="table_content">
        <?php
        if (!empty($search_results)):
            $x = 0;
            foreach ($search_results as $result):
                extract($result);
                ?>
                <a href="index.php?editor=keys&action=1&playerid=<?= $result['id'] ?>"><?= getPlayerName($result['id']) ?>
                    - (<?= $result['id'] ?>)</a><br/>
                <?php
                $x++;
            endforeach;
            if ($x == $list_limit) {
                echo "<br/>List limited to " . $list_limit . " results.";
            }
            ?>
        <?php else: ?>
            Your search produced no results!
        <?php endif; ?>
    </div>
</div>
