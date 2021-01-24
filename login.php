<?php
    // Get input
    $username = $_POST['username'];
    $passwordIn = $_POST['password'];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Get DB
        $db = new SQLite3('users.db');

        // Check if user exists
        $query = "SELECT Password FROM users WHERE Username = '".$username."'";
        $possibleUsers = $db->query($query);
        if ($passwords = $possibleUsers->fetchArray())
        {
            foreach($passwords as $password)
            {
                if($password == $passwordIn)
                {
                    $IDQ = "SELECT ID FROM users WHERE Username = '".$username."' AND Password = '".$password."'";
                    $ID = $db->query($IDQ)->fetchArray()[0];
                    

                    echo '<script type="text/JavaScript">  
                            sessionStorage.setItem("user",'.$ID.');
                            window.location.href = "./room.php"; 
                        </script>';
                    exit;
                }
            }
            print("Incorrect Password");
        }else{
            print("There is no user with that username");
        }
    }
?>

<?php include "html/header.html" ?>
<div class="wrapper">
    <div class="content">
        <h1>Log In on Discourse</h1>
        <form action="./login.php" method="POST">
            <div>
                <input name="username" placeholder="Username" required value="<?php print($_POST["username"]) ?>" />
            </div>
            <div>
                <input name="password" placeholder="Password" type="password" required />
            </div>
            <div>
                <input type="submit" value="Log In" />
            </div>
        </form>
        <p>
            If you have not logged in <a href="/register.php">Register Now</a>
        </p>
    </div>
</div>
<?php include "html/footer.html" ?>
