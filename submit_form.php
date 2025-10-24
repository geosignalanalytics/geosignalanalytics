<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Validate form data (simple validation)
    if (!empty($name) && !empty($email) && !empty($message)) {

        // Prepare the email
        $to = "your.email@example.com";  // Replace with your email address
        $subject = "New Contact Form Submission from " . $name;
        $body = "
            <h3>New message from website contact form</h3>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Message:</strong></p>
            <p>$message</p>
        ";
        
        // Set email headers
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
        $headers .= "From: no-reply@geosignal.com" . "\r\n"; // Or use a proper sender email address

        // Send the email
        if (mail($to, $subject, $body, $headers)) {
            // Redirect to thank you page or show a success message
            header("Location: thank_you.html");
            exit();
        } else {
            echo "Error: Unable to send the message. Please try again.";
        }
    } else {
        echo "Please fill out all fields.";
    }
}
?>
