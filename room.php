<?php
    // Get the file
    $roomCode = $_GET['rm'];
    if($roomCode == null)
    {
        $roomCode = '1';
    }
    
    $db = new SQLite3('backend_php/database.db');
    $roomQuery = "SELECT Name from rooms WHERE ID = ".$roomCode;
    $rmName = $db->query($roomQuery)->fetchArray()[0];

    $tag = 'rooms/server_'.$roomCode.".txt;".$rmName;
    
    echo file_get_contents('html/header.html');
    echo "<p id='rmID'>".$tag."</p>";
    echo file_get_contents('html/chatroom.html');
    echo file_get_contents('html/footer.html');
?>