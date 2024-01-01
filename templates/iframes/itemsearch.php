<html lang="en">
  <body style="background-color: #FFCCCC">
<?php
/* TODO: Parameterized Query feature in PHP 8.2 */
if(isset($_GET['name']) && ($_GET['name'] != '')) {
  require("../../config.php");
  require("../../classes/mysqli.php");
  $name = $_GET['name'];
  $query = "SELECT id, name, lore FROM items WHERE name rlike \"$name\" ORDER BY id";
  global $mysql;
  $results = $mysql->query_mult_assoc($query);
  if($results == '') {
    print "No items found!<br>";
  }
  else {
    echo "<ul>";
    foreach($results as $result) {
      extract($result);
      print "<li>$id: <a href=\"javascript:parent.document.getElementById('id').value=$id;parent.hideSearch('search')\">$name ($lore)</a></li>";
    }
    echo "</ul>";
  }
}
?>
    <br>
    <div class="center">
      <table>
        <tr>
          <td>
            <form action="?" method="GET">
                <label for="name">Search item names:</label><br>
              <input type="text" size="30" id="name" name="name"><br><br>
              <div class="center"><input type="submit" value="Search"></div>
            </form>
          </td>
        </tr>
      </table>
    </div>
  </body>
</html>