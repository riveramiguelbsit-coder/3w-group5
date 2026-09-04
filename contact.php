<?php

// ========================================
// POST METHOD
// ========================================

$message = "";

$name = "";
$email = "";
$messageText = "";


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Get the submitted information

    $name = htmlspecialchars($_POST["name"] ?? "");

    $email = htmlspecialchars($_POST["email"] ?? "");

    $messageText = htmlspecialchars($_POST["message"] ?? "");


    // Display success message

    $message = "Thank you, " . $name . "! Your message has been submitted.";

}

?>


<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact 3W Group 5</title>

    <link rel="stylesheet" href="style.css">

</head>


<body>


<header>

    <h1>3W Group 5</h1>

    <p>Contact Our Team</p>

</header>


<div class="contact">


    <h2>Send Us a Message</h2>


    <!-- SUCCESS MESSAGE -->

    <?php if ($message != ""): ?>

        <p class="success">

            <?php echo $message; ?>

        </p>

    <?php endif; ?>


    <!-- POST FORM -->

    <form method="POST" action="contact.php">


        <label for="name">
            Name:
        </label>

        <input
            type="text"
            id="name"
            name="name"
            placeholder="Enter your name"
            required
        >


        <label for="email">
            Email:
        </label>

        <input
            type="email"
            id="email"
            name="email"
            placeholder="Enter your email"
            required
        >


        <label for="message">
            Message:
        </label>

        <textarea
            id="message"
            name="message"
            placeholder="Enter your message"
            required
        ></textarea>


        <button type="submit">
            Send Message
        </button>


    </form>


    <br>


    <!-- BACK TO HOME -->

    <a href="index.php" class="btn">
        ← Back to Team
    </a>


</div>


</body>

</html>

