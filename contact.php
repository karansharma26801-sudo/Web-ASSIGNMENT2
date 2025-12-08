<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Save message in a file
    $file = "messages.txt";
    $data = "-----------------------------\n";
    $data .= "Name: $name\n";
    $data .= "Email: $email\n";
    $data .= "Subject: $subject\n";
    $data .= "Message: $message\n";
    $data .= "Date: " . date("Y-m-d H:i:s") . "\n";
    $data .= "-----------------------------\n\n";

    file_put_contents($file, $data, FILE_APPEND);

    echo "
    <html>
    <head>
        <title>Message Sent</title>
        <link rel='stylesheet' href='styles.css'>
    </head>
    <body>
        <main class='container'>
            <section class='hero'>
                <h2>Thank You, $name!</h2>
                <p>Your message has been sent successfully.</p>
                <a href='contact.html' class='button'>Go Back</a>
            </section>
        </main>
    </body>
    </html>
    ";

} else {
    header("Location: contact.html");
    exit();
}
?>
