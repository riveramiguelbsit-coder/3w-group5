<?php

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Get form data
    $name = trim($_POST["name"] ?? "");
    $role = trim($_POST["role"] ?? "");
    $bio = trim($_POST["bio"] ?? "");
    $skills = trim($_POST["skills"] ?? "");

    // Check required fields
    if ($name === "" || $role === "" || $bio === "" || $skills === "") {

        $message = "Please fill in all fields.";

    } else {

        // Read existing members
        $teamMembers = json_decode(
            file_get_contents("members.json"),
            true
        );

        // Default image
        $imageName = "default.jpg";

        // Handle uploaded image
        if (
            isset($_FILES["image"]) &&
            $_FILES["image"]["error"] === UPLOAD_ERR_OK
        ) {

            $uploadDirectory = "uploads/";

            // Create uploads folder if it doesn't exist
            if (!is_dir($uploadDirectory)) {
                mkdir($uploadDirectory, 0777, true);
            }

            // Get original file extension
            $extension = strtolower(
                pathinfo(
                    $_FILES["image"]["name"],
                    PATHINFO_EXTENSION
                )
            );

            // Allowed image types
            $allowedTypes = ["jpg", "jpeg", "png", "gif", "webp"];

            if (in_array($extension, $allowedTypes)) {

                // Create unique filename
                $imageName =
                    time() . "_" .
                    preg_replace(
                        "/[^a-zA-Z0-9_-]/",
                        "_",
                        $name
                    ) .
                    "." . $extension;

                // Full destination
                $destination =
                    $uploadDirectory . $imageName;

                // Move uploaded image
                move_uploaded_file(
                    $_FILES["image"]["tmp_name"],
                    $destination
                );

            } else {

                $message = "Invalid image type.";

            }
        }


        // Add new member
        if ($message === "") {

            $teamMembers[] = [

                "name" => $name,

                "role" => $role,

                "image" => "uploads/" . $imageName,

                "bio" => $bio,

                "skills" => $skills

            ];


            // Save to JSON
            file_put_contents(
                "members.json",
                json_encode(
                    $teamMembers,
                    JSON_PRETTY_PRINT
                )
            );


            $message =
                "New team member added successfully!";

        }

    }

}

?>


<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Add New Member</title>

    <link rel="stylesheet" href="style.css">

</head>


<body>


<header>

    <h1>3W Group 5</h1>

    <p>Add New Team Member</p>

</header>


<div class="contact">

    <h2>Add New Member</h2>


    <?php if ($message !== ""): ?>

        <p class="success">

            <?php echo htmlspecialchars($message); ?>

        </p>

    <?php endif; ?>


    <form
        method="POST"
        action="add_member.php"
        enctype="multipart/form-data"
    >


        <label for="name">
            Name:
        </label>

        <input
            type="text"
            id="name"
            name="name"
            placeholder="Enter member name"
            required
        >


        <label for="role">
            Role:
        </label>

        <input
            type="text"
            id="role"
            name="role"
            placeholder="Enter member role"
            required
        >


        <label for="image">
            Photo:
        </label>

        <input
            type="file"
            id="image"
            name="image"
            accept="image/*"
        >


        <label for="bio">
            Bio:
        </label>

        <textarea
            id="bio"
            name="bio"
            placeholder="Enter member biography"
            required
        ></textarea>


        <label for="skills">
            Skills:
        </label>

        <textarea
            id="skills"
            name="skills"
            placeholder="Example: PHP, HTML, CSS, JavaScript"
            required
        ></textarea>


        <button type="submit">
            Add Member
        </button>


    </form>


    <br>


    <a
        href="index.php"
        class="btn"
    >
        ← Back to Team
    </a>


</div>


</body>

</html>