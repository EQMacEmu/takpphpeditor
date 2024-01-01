<html lang="en">
  <body style="background-color: #FFCCCC">
<?php

if(isset($_GET['name']) && ($_GET['name'] != '')) {
  require("../../config.php");
  require("../../classes/mysqli.php");
  $name = $_GET['name'];
  global $mysql;
  $query = "SELECT name FROM character_data WHERE name rlike \"$name\" LIMIT 50";
  $results = $mysql->query_mult_assoc($query);
  if($results == '') {
    echo "No players found!<br />";
  }
  else {
    echo (count($results) == 50) ? "<i>Results limited to 50. Narrow your search to improve search results.</i>" : "";
    echo "<ul>";
    foreach($results as $result) {
      extract($result);
      echo "<li><a href=\"javascript:parent.document.getElementById('to_text').value='$name';parent.hideSearch();\">$name</a></li>";
    }
    echo "</ul>";
  }
}
?>

<br />
    <div class="center">
      <table style="border-collapse: collapse; border-spacing: 0;">
        <tr>
          <td style="padding: 0;">
            <form action="?" method="GET">
                <label for="name">Search player names:</label><br />
              <input type="text" size="30" id="name" name="name"><br /><br />
              <div class="center"><input type="submit" value="Search"></div>
            </form>
          </td>
        </tr>
      </table>
    </div>
  </body>
</html>