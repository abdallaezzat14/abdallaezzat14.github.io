<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $fname = trim($_POST["fname"]);
    $lname = trim($_POST["lname"]);
    $email = trim($_POST["email"]);
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);

    // Check if all fields are filled
    if (!empty($fname) && !empty($lname) && !empty($email) && !empty($subject) && !empty($message)) {
        // Set recipient email address
        $to = "abdallahokely@gmail.com";

        // Set email subject
        $email_subject = "New message from $fname $lname: $subject";

        // Construct email message
        $email_message = "Name: $fname $lname\n";
        $email_message .= "Email: $email\n\n";
        $email_message .= "Message:\n$message";

        // Set headers
        $headers = "From: $email";

        // Send email
        if (mail($to, $email_subject, $email_message, $headers)) {
            echo "Your message has been sent successfully.";
        } else {
            echo "Failed to send your message. Please try again later.";
        }
    } else {
        echo "All fields are required.";
    }
} else {
    // If the form is not submitted, redirect back to the form page
    header("Location: contact.html"); // Change this to the filename of your contact form page
}
?>
