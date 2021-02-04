<?php
    $email = $_GET['email'];
    $code = rand(1000, 9999);
    echo "<p id='rmId'>".$email.';'.$code."</p>";
?>

<?php include "html/header.html" ?>
<main>
    <h1>You're almost done!</h1>
    <hr>
    <p>We've just sent an email to you containing a code you need to register your account</p>
    <input type='number' id="code">
    <button onclick="Check()">Enter</button>
</main> 
<script src="js/emailVerification.js"></script>
<?php include "html/footer.html" ?>