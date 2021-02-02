<?php
    ini_set("SMTP", "fatherluca.club");
    ini_set("smtp_port", 21);

    $hash = md5( rand(0,1000) ); // Generate random 32 character hash
    $to = "dscott23@newmanstudents.org"; // Send email to our user
    $subject = "Signup | Verification"; // Give the email a subject 
    $message = "Signup successful, click this link to activate account: /n link goes here"; // Our message above including the link
                      
    $headers = 'From: noreply@Discourse.com' . "\r\n"; // Set from headers
    if(mail($to, $subject, $message, $headers))
    {
        // Send our email
        echo "Sent email to: ".$to;
    }else{
        echo "Failed to send email";
    }
?>