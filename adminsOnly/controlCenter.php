<h1>SQL Control Center</h1>
<p>If you got here without our permission, may god have mercy on us all...</p>
<hr>
<form name="form" action="./controlCenter.php" method="POST">
  Query: <input type="text" name="query" id="query"><br>
  Password: <input type="text" name="password" id="password">
  <button type="submit">Query</button>
  <p>There is no undoing these commands, be careful</p>
</form>
<hr>

<?php
    $password = $_POST['password'];
    if($password != "Py6qHmwp9H9abKap7vHLE4ZVnJAMRzw4bVeabSgjCDreKCVf3z3tWPCYRnpGWcmnHDY72mE5bWRB4NDrQCE2t2CTDCemqZwC3jcZacTxsCGxwuZmgCyXYK3536KtZkUwKJurRvuGJVuhFeDjX2rzwJRKBneVtC82YBswyUXzcZZ2mgDWvxFHeE74HWEzLc5tvuZBAhs77z2bY6q9u3rmcTVeTjQQmUdd8ftBhwXbK6yLGnEykNN4Yd6JLLjk6k3z")
    {
        die("ACCESS DENIED");
    }
    $db = new SQLite3("../backend_php/database.db");

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