<html lang="en">
<body style="background-color: #FFCCCC">
<?php

if(isset($_GET['name']) && ($_GET['name'] != '')) {
  require("../../config.php");
  require("../../classes/mysqli.php");
  $name = $_GET['name'];
  $query = "SELECT id, name FROM npc_spells WHERE name rlike \"$name\" ORDER BY id";
  global $mysql;
  $results = $mysql->query_mult_assoc($query);
  if($results == '') {
    print "No spellsets found!<br>";
  }
  else {
    foreach($results as $result) {
      extract($result);
      print "<a href=\"javascript:parent.document.getElementById('id').value=$id;parent.hideSearch()\">$id: $name</a><br>";
    }
  }
  echo "<br>";
}
?>

<br>
<div class="center">
<table>
  <tr>
    <td>
      <form action='?' method='GET'>
          <label for="name">Search spellset names:</label><br>
        <input type='text' size='30' id="name" name='name'><br><br>
        <div class="center"><input type='submit' value='Search'></div>
      </form>
    </td>
  </tr>
</table>
</div>
</body>
</html>