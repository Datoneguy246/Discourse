<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if ($_POST["password"] !== $_POST["confirm-password"]) {
            print("Password fields do not match");
        }
    }
?>


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