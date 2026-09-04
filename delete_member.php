<?php


// CHECK MEMBER INDEX


if (!isset($_GET["member"]) || !is_numeric($_GET["member"])) {
    die("Invalid member.");
}

$memberIndex = (int) $_GET["member"];



// READ MEMBERS


$teamMembers = json_decode(
    file_get_contents("members.json"),
    true
);



// CHECK MEMBER EXISTS


if (!isset($teamMembers[$memberIndex])) {
    die("Team member not found.");
}

$member = $teamMembers[$memberIndex];



// PROTECTED ORIGINAL MEMBERS


$protectedMembers = [
    "Miguel Rivera",
    "Annaliza",
    "Maria Madonna",
    "Margie",
    "Nikka Joy",
    "Amerie",
    "Yanilyn"
];


// Check if this member is one of the original 7

if (in_array($member["name"], $protectedMembers)) {

    die("This original team member is protected and cannot be deleted.");

}



// CHECK DELETABLE PROPERTY


if (
    !isset($member["deletable"]) ||
    $member["deletable"] !== true
) {

    die("This member cannot be deleted.");

}





if (
    isset($member["image"]) &&
    strpos($member["image"], "uploads/") === 0
) {

    if (file_exists($member["image"])) {

        unlink($member["image"]);

    }

}



// REMOVE MEMBER


array_splice(
    $teamMembers,
    $memberIndex,
    1
);



// SAVE UPDATED MEMBERS


file_put_contents(
    "members.json",
    json_encode(
        $teamMembers,
        JSON_PRETTY_PRINT
    )
);



// RETURN TO TEAM PAGE


header("Location: index.php");

exit;

?>