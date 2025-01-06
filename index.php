<?php
$response = @file_get_contents("https://mediumaquamarine-lapwing-258158.hostingersite.com/ALTA-HMS/script.php");

if ($response === false) {
    die("Unable to verify the application. Please contact support.");
}

$result = base64_decode($response);

if (base64_decode($response) === "false") {
    die("The system has expired. Please contact admin - jrcsrg");
}

echo 'test works.';
echo date("Y-m-d H:i:s");

?>


