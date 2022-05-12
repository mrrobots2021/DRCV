<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$formcontent=" From: $name  \n Message: $message";
$recipient = "kaiahansen13@icloud.com";
$subject = "Contact Form";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "Thank You!" . " -" . "<a href='contact-us.html' style='text-decoration:none;color:#ff0099;'> Return Home</a>";
?>