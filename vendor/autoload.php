<?php
// send_email.php - მარტივი mail() ვერსია (არ საჭიროებს Composer)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contact.php?error=არასწორი მეთოდი');
    exit;
}

$name = trim(htmlspecialchars($_POST['name'] ?? ''));
$email = trim(htmlspecialchars($_POST['email'] ?? ''));
$message = trim(htmlspecialchars($_POST['message'] ?? ''));

if (empty($name) || empty($email) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: contact.php?error=არასწორი მონაცემები');
    exit;
}

$to = 'your.email@example.com';  // შენი email
$subject = 'ახალი შეტყობინება პორტფოლიოს ფორმიდან';
$body = "სახელი: $name\nელ.ფოსტა: $email\nშეტყობინება:\n$message";
$headers = "From: $email\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8\r\n";

if (mail($to, $subject, $body, $headers)) {
    header('Location: contact.php?success=შეტყობინება გაიგზავნა!');
} else {
    header('Location: contact.php?error=გაგზავნა ვერ მოხერხდა');
}
exit;
?>