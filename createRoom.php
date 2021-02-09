<?php
    $RoomName = $_POST['input'];
    if($RoomName != null)
    {
        $db = new SQLite3('./backend_php/database.db');

        // Get a unique ID by converting each chracter to an int
        $characters = str_split($RoomName);
        $ID = 0;
        foreach ($characters as $char) {
            $ID = $ID + ord($char);
        }

        // Check if it already exists
        $idExists = true;
        while ($idExists == true):
            $check = "SELECT ID FROM rooms WHERE ID is ".$ID;
            $IDFound = $db->query($check);
            if ($IDFound->fetchArray()) {
                $ID = $ID + 1;
            }else{
                $idExists = false;
            }
        endwhile;

        $insert = "INSERT INTO rooms (ID, Name) VALUES(".$ID.",'".$RoomName."')";
        $db->query($insert);

        // Create the file
        $newFile = fopen('./rooms/server_'.$ID.'.txt', 'w');
        fwrite($newFile, "*START LOG*");
        fclose($newFile);
        echo '<script type="text/JavaScript">  
                window.location.href = "./room.php?rm='.$ID.'"; 
            </script>';
    }
?>

<?php include "html/header.html" ?>
    <h1>Create your room!</h1>
    <form action="./createRoom.php" method="POST">
        Room Name: <input type="text" id="input" name='input'><br>
        <button type="submit">Create</button>
    </form>
    <script src="./js/roomManager.js"></script>
<?php include "html/footer.html" ?>