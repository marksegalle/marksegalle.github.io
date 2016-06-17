<?php 
    
    $email = isset($_POST['contactEmail']) ? $_POST['contactMessage'] : false;

    if($email != false)
    {
        $yourEmail = $_POST['contactEmail'];.
        $subject = "PLEYTO Website Contact Message from - " + $_POST['contactName'];
        $message = $_POST['contactMessage'];
        $success = sendMail($email, $yourEmail, $subject, $message);
    } else {
        return false;
    }
    
    function spamcheck($field)
    {
        //filter_var() sanitizes the e-mail
        //address using FILTER_SANITIZE_EMAIL
        $field=filter_var($field, FILTER_SANITIZE_EMAIL);

        //filter_var() validates the e-mail
        //address using FILTER_VALIDATE_EMAIL
        if(filter_var($field, FILTER_VALIDATE_EMAIL))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function sendMail($toEmail, $fromEmail, $subject, $message)
    {
        $validFromEmail = spamcheck($fromEmail);
        if($validFromEmail)
        {
            mail($toEmail, $subject, $message, "From: $fromEmail");
        }
    }


?>