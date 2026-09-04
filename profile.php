
<?php


// TEAM MEMBER DATA


$teamMembers = json_decode(
    file_get_contents("members.json"),
    true
);

// GET METHOD

if (isset($_GET["member"])) {

    $memberIndex = $_GET["member"];

    // Check if the selected member is valid

    if (is_numeric($memberIndex) && isset($teamMembers[$memberIndex])) {

        $member = $teamMembers[$memberIndex];

    } else {

        die("Invalid team member.");

    }

} else {

    die("No team member selected.");

}

?>


<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?php echo htmlspecialchars($member["name"]); ?> - Profile
    </title>

    <link rel="stylesheet" href="style.css">

</head>


<body>



     HEADER

<header>

    <h1>3W Group 5</h1>

    <p>Team Member Profile</p>

</header>



     PROFILE


<div class="profile">

    <!-- Member Image -->

    <img
        src="<?php echo htmlspecialchars($member["image"]); ?>"
        alt="<?php echo htmlspecialchars($member["name"]); ?>"
    >


    <!-- Member Name -->

    <h2>
        <?php echo htmlspecialchars($member["name"]); ?>
    </h2>


    <!-- Role -->

    <p>

        <strong>Role:</strong>

        <br>

        <?php echo htmlspecialchars($member["role"]); ?>

    </p>


    <!-- Bio -->

    <p>

        <strong>Bio:</strong>

        <br>

        <?php echo htmlspecialchars($member["bio"]); ?>

    </p>


    <!-- Skills -->

    <p>

        <strong>Skills:</strong>

        <br>

        <?php echo htmlspecialchars($member["skills"]); ?>

    </p>


    <!-- Back Button -->

    <a href="index.php" class="btn">

        ← Back to Team

    </a>

    <a
    href="delete_member.php?member=<?php echo $memberIndex; ?>"
    class="btn"
    onclick="return confirm('Are you sure you want to delete this member?');"
>
    Delete Member
</a>

</div>


</body>

</html>

