<h1>SQL Control Center</h1>
<p>If you got here without our permission, may god have mercy on us all...</p>
<hr>
<form name="form" action="./controlCenter.php" method="POST">
  <input type="text" name="query" id="query">
  <button type="submit">Query</button>
  <p>There is no undoing these commands, be careful</p>
</form>
<hr>

<?php
    $db = new SQLite3("users.db");

    if ($_SERVER["REQUEST_METHOD"] === "POST")
    {
        $results = $db->query($_POST['query']);
        while ($row = $results->fetchArray()) {
            for ($i = 0; $i <= ceil(count($row) / 2); $i++) {
                echo $row[$i]."<br>";
            }
        }
    }
?>