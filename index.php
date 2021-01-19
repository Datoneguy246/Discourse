<?php include "html/header.html" ?>
<div>
    <h1>Log In on Discourse</h1>
    <form action="/index.php" method="POST">
        <input name="username" placeholder="Username" required value="<?php print($_POST["username"]) ?>" />
        <input name="password" placeholder="Password" type="password" required />
        <input type="submit" value="Log In" />
    </form>
    <p>
        If you have not logged in <a href="/register.php">Register Now</a>
    </p>
</div>
<?php include "html/footer.html" ?>