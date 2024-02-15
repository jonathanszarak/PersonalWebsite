<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Set recipient email address
    $to = "jszarak11@gmail.com";

    // Set email subject
    $subject = "New Contact Message from $name";

    // Build email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message";

    // Set email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Attempt to send email
    if (mail($to, $subject, $email_content, $headers)) {
        // Email sent successfully
        echo "Thank you for your message. We will get back to you soon!";
    } else {
        // Failed to send email
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
} else {
    // If the form was not submitted, redirect to the contact page
    header("Location: contact.html");
}
?>
