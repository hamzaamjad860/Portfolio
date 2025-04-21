<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);


    // Replace with your email settings
    $to = "hamzaamjad104@gmail.com";
    $subject = "New Contact Form Submission";
    $message = "Name: " . $_POST["name"] . "\n";
    $message .= "Email: " . $_POST["email"] . "\n";
    $message .= "Phone: " . $_POST["phone"] . "\n";
    $message .= "Message: " . $_POST["message"];
    $headers = "From: $email"; 
    

    if (mail($to, $subject, $body, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Email sending failed.";
    }
} else {
    echo "Invalid request.";
}
?>