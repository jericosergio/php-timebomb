<?php
$cdnUrl = baseurl("/script.php"); // CDN URL

$response = @file_get_contents($cdnUrl);

if ($response === false) {
    die("Unable to verify the application. Please contact support.");
}

$result = base64_decode($response);

if ($result === "expired") {
    die("This application has expired. Please contact support for assistance.");
}

// continue if valid
?>
