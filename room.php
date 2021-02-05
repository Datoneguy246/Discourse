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
    
    // Get list of all rooms
    $roomIDQuery = "SELECT ID from rooms";
    $roomNameQuery = "SELECT Name from rooms";
    $roomIDs = $db->query($roomIDQuery)->fetchArray();
    $roomNames = $db->query($roomNameQuery)->fetchArray();
    echo "<div id='rmList'>";
    for ($i = 0; $i <= count($roomIDs); $i++) {
        if($roomIDs[$i] != null)
        {
            echo "<a href='./room.php?rm=".$roomIDs[$i]."'>".$roomNames[$i]."</a>";
        }
    }
    echo "</div>";

    echo file_get_contents('html/header.html');
    echo "<p id='rmID'>".$tag."</p>";
    echo file_get_contents('html/chatroom.html');
    echo file_get_contents('html/footer.html');
?>