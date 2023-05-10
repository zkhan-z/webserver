<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Get form data
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];

  // Construct the email headers
  $headers = "From: $email" . "\r\n" .
             "Reply-To: $email" . "\r\n" .
             "X-Mailer: PHP/" . phpversion();

  // Send the email
  $to = "YOUR EMAIL HERE"; // Replace with the recipient email address
  $subject = "New Contact Form Submission";
  $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

  if (mail($to, $subject, $body, $headers)) {
    // Email sent successfully, redirect to contact.html
    header("Location: contact.html");
  } else {
    // Failed to send email, redirect to contact.html with error message
    header("Location: contact.html?error=Failed to send email. Please try again.");
  }
}
?>
