<?php

if (!isset($_GET["member"]) || !is_numeric($_GET["member"])) {
    die("Invalid member.");
}

$memberIndex = (int) $_GET["member"];

// Read members
$teamMembers = json_decode(
    file_get_contents("members.json"),
    true
);

// Check if member exists
if (!isset($teamMembers[$memberIndex])) {
    die("Team member not found.");
}

// Get member information
$member = $teamMembers[$memberIndex];

// Delete uploaded image if it is inside uploads/
if (
    isset($member["image"]) &&
    strpos($member["image"], "uploads/") === 0
) {
    if (file_exists($member["image"])) {
        unlink($member["image"]);
    }
}

// Remove member from array
array_splice($teamMembers, $memberIndex, 1);

// Save updated members
file_put_contents(
    "members.json",
    json_encode($teamMembers, JSON_PRETTY_PRINT)
);

// Return to team page
header("Location: index.php");
exit;

?>