<?php
    // Get the file
    $roomCode = $_GET['rm'];
    if($roomCode == null)
    {
        $roomCode = '1';
    }
    
    $filename = 'rooms/server_'.$roomCode.".txt";
    
    echo file_get_contents('html/header.html');
    echo "<p id='rmID'>".$filename."</p>";
    echo file_get_contents('html/chatroom.html');
    echo file_get_contents('html/footer.html');
?>