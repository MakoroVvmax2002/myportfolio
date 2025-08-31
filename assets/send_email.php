<?php
// Check if the form was submitted using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // IMPORTANT: REPLACE THIS EMAIL ADDRESS WITH YOUR OWN
    $to_email = "vishmikarasanjana20020726@gmail.com";
    
    // Sanitize and get the data from the form
    $full_name = htmlspecialchars($_POST['full_name']);
    $email_address = htmlspecialchars($_POST['email_address']);
    $message = htmlspecialchars($_POST['message']);

    // Set a subject for your email
    $subject = "New Contact from Your Portfolio: " . $full_name;

    // Create the email body with the user's details
    $body = "
        <h2>New Message from Your Portfolio Website</h2>
        <p><strong>Full Name:</strong> {$full_name}</p>
        <p><strong>Email Address:</strong> {$email_address}</p>
        <p><strong>Message:</strong><br>{$message}</p>
    ";

    // Create the email headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: " . $email_address . "\r\n";
    $headers .= "Reply-To: " . $email_address . "\r\n";

    // Attempt to send the email and show a message to the user
    if (mail($to_email, $subject, $body, $headers)) {
        echo "Thank you for your message! Your email has been sent successfully.";
    } else {
        echo "Sorry, something went wrong and your email could not be sent. Please try again later.";
    }
} else {
    // If someone tries to access this page directly, redirect them
    header("Location: index.html");
    exit();
}
?>