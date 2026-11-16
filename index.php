
<?php


$teamMembers = json_decode(
    file_get_contents("members.json"),
    true
);

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>3W Group 5 - Team Profile</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>


<header>

    <h1>3W Group 5</h1>

    <p>Meet the amazing people behind our project</p>

</header>



<div class="team-container">

    <?php foreach ($teamMembers as $index => $member): ?>

        <div class="team-card">

            <img
                src="<?php echo htmlspecialchars($member["image"]); ?>"
                alt="<?php echo htmlspecialchars($member["name"]); ?>"
            >

            <h3>
                <?php echo htmlspecialchars($member["name"]); ?>
            </h3>

            <p class="role">
                <?php echo htmlspecialchars($member["role"]); ?>
            </p>


            <!-- GET METHOD -->

            <a
                href="profile.php?member=<?php echo $index; ?>"
                class="btn"
            >
                View Profile
            </a>

        </div>

    <?php endforeach; ?>

</div>

<div style="margin: 20px;">

    <a href="add_member.php" class="btn">
        + Add New Member
    </a>

</div>

<!-- POST METHOD -->

<div class="contact">

    <h2>Contact Our Team</h2>

    <p>
        Have a question? Send us a message.
    </p>

    <a href="contact.php" class="btn">
        Contact Us
    </a>

</div>


</body>

</html>

