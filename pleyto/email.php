<?php 
    if(isset($_POST['submit'])){
        $to = "marksegalle121@gmail.com"; // this is your Email address
        $from = $_POST['email']; // this is the sender's Email address
        $name = $_POST['name']
        $subject = "Contact Form Submission";
        $message = $from " wrote the following:" . "\n\n" . $_POST['message'];

        $headers = "From:" . $from;
        $headers2 = "From:" . $to;
        mail($to,$subject,$message,$headers);
        echo "<script>alert('test)</script>";
        // You can also use header('Location: thank_you.php'); to redirect to another page.
        }
?>