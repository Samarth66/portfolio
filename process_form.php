<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "your_email@example.com"; // Replace with your email address
    $subject = $_POST["contact-subject"];
    $name = $_POST["contact-name"];
    $email = $_POST["contact-email"];
    $message = $_POST["contact-message"];

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $email_body = "
        <html>
        <body>
            <h2>Contact Form Submission</h2>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Subject:</strong> $subject</p>
            <p><strong>Message:</strong></p>
            <p>$message</p>
        </body>
        </html>
    ";

    // Send the email
    if (mail($to, $subject, $email_body, $headers)) {
        echo "Email sent successfully. Thank you for contacting us!";
    } else {
        echo "Email sending failed. Please try again later.";
    }
} else {
    echo "Invalid request.";
}
?>
