<?php
    // Get user data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if ($password !== $_POST["confirm-password"]) {
            print("Password fields do not match");
        }else{
            // Send new user to the server by...
            $db = new SQLite3('users.db');
            // Get a unique ID by converting each chracter to an int
            $characters = str_split($username);
            $ID = 0;
            foreach ($characters as $char) {
                $ID = $ID + ord($char);
            }

            // Check if it already exists
            $idExists = true;
            while ($idExists == true):
                $check = "SELECT ID FROM users WHERE ID is ".$ID;
                $IDFound = $db->query($check);
                if ($IDFound->fetchArray()) {
                    $ID = $ID + 1;
                }else{
                    $idExists = false;
                }
            endwhile;

            // And sending it to the DB
            $query = "INSERT INTO users (ID, Username, Password, Email, FirstName, LastName) 
            VALUES(".$ID.",'".$username."','".$password."','".$email."','".$firstName."','".$lastName."')";
            $db->query($query);

            // And go to the chat room (there's got to be a better way to do this, but my code is already full of weird shortcuts, so who cares!)
            echo '<script type="text/JavaScript">  
                    sessionStorage.setItem("user",'.$ID.');
                    window.location.href = "./room.php"; 
                </script>';
            exit;
        }
    }
?>

<?php include "html/header.html" ?>
<div>
    <h1>Register Page</h1>
    <form action="/register.php" method="POST">
        <input name="first-name" placeholder="First Name" required value="<?php print($_POST["first-name"]); ?>" />
        <input name="last-name" placeholder="Last Name" required value="<?php print($_POST["last-name"]); ?>" />
        <input name="username" placeholder="Username" required value="<?php print($_POST["username"]) ?>" />
        <input name="email" type="email" placeholder="Email" required value="<?php print($_POST["email"]) ?>" />
        <input name="password" type="password" minlength="8" placeholder="Password" required />
        <input name="confirm-password" type="password" minlength="8" placeholder="Confirm Password" required />
        <input type="submit" value="Register" />
    </form>
</div>
<?php include "html/footer.html" ?>