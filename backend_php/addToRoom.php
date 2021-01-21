<?php
    $filename = "../".$_GET['rm'];
    $userID = $_GET['u'];

    $db = new SQLite3('../users.db');
    $user = $db->query("SELECT Username FROM users WHERE ID = ".$userID)->fetchArray()[0];

    $time = date('h:i');
    $msg = $_GET['q'];
    $toWrite = $time.';'.$user.';'.$msg;

    $current = file_get_contents($filename);
    file_put_contents($filename, $current."\n".$toWrite);
?>