<?php
    echo file_get_contents('html/header.html');

    // Get the file
    $roomCode = $_GET['rm'];
    if($roomCode == null)
    {
        $roomCode = '1';
    }
    
    $db = new SQLite3('backend_php/database.db');
    $roomQuery = "SELECT Name from rooms WHERE ID = ".$roomCode;
    $passQuery = "SELECT Password from rooms WHERE ID = ".$roomCode;
    $rmName = $db->query($roomQuery)->fetchArray()[0];
    $rmPass = $db->query($passQuery)->fetchArray()[0];

    $tag = 'rooms/server_'.$roomCode.".txt;".$rmName;

    echo "<p id='rmID'>".$tag."</p>";
    echo file_get_contents('html/chatroom.html');

    if($rmPass != null)
    {
        echo "<p id='pass'>".$rmPass."</p>";
        echo file_get_contents("html/password.html");
    }

    // Get list of all rooms
    $allRoomQuery = "SELECT * from rooms";
    $rooms = $db->query($allRoomQuery);
    echo "<div id='rmList'>";
    while ($row = $rooms->fetchArray()) {
        echo "<a href='./room.php?rm=".$row['ID']."'>".$row['Name']."</a><br>";
    }
    echo "</div>";

    echo file_get_contents('html/footer.html');
?>