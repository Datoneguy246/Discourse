<?php
    // Get the file
    $roomCode = $_GET['rm'];
    $filename = 'rooms/server_'.$roomCode.".txt";
    
    echo "<p id='rmID'>".$filename."</p>";
    echo file_get_contents('html/chatroom.html');
    echo file_get_contents('html/footer.html');
?>