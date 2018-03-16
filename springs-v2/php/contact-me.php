<?php
if (isset($_POST['submit'])) {
    $to = "email@example.com"; // this is your Email address
    $from = $_POST['email-address']; // this is the sender's Email address
    $name = $_POST['name'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $name . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    // Secure
    define(
    'EMAIL_MATCHER',
    '/^[^@\s]+\@(\[?)([-\w]+\.)+([a-zA-Z]{2,6}|[0-9]{1,3})(\]?)$/'
);
    if (!preg_match(EMAIL_MATCHER, $to)) {
        $message = "The address you entered for your friend does not ".
    "appear  to be valid. You entered $to.";
        $errors[] = $message;
    }
    if (!preg_match(EMAIL_MATCHER, $from)) {
        $message = "The address you entered for yourself does not ".
    "appear to be valid. You entered $from.";
        $errors[] = $message;
    }
    if ($name == '') {
        $errors[] = "Please enter your name.";
    }
    if (!preg_match("/^[a-zA-Z ']$/", $name)) {
        $message = "Your name can only contain letters, spaces and ".
    " apostrophes.";
        $errors[] = $message;
    }
    if (strlen($name) > 25) {
        $errors[] = "Your name must be less than 25 characters.";
    }
    if (strlen($brief_note) > 200) {
        $message = "You can only enter 200 characters for your note. " .
    "Sorry - this restriction is to prevent spammers from ".
    "abusing this form!";
        $errors[] = $message;
    }
    if (count($errors) > 0) {
        echo "Thanks for your submission, however, we encountered the ";
        echo "following errors! Please hit back on your browser and try ";
        echo "again.";
        echo implode('&lt;br&gt;', $errors);
    } else {
        $headers = "From:" . $from;
        $headers2 = "From:" . $to;
        mail($to, $subject, $message, $headers);
        mail($from, $subject2, $message2, $headers2); // sends a copy of the message to the sender
        echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
        // You can also use header('Location: thank_you.php'); to redirect to another page.
      // You cannot use header and echo together. It's one or the other.
    }
}
