<?php
// Encrypted expiration date
$encryptedDate = "cJiyOpYZ1nUMqwS2zfkoahWXkUXD5xSxz4vsVYsEdt8="; // Replace with the correct encrypted date

// Decryption function
function decryptDate($encrypted)
{
    $encryptionKey = "jrcsrg"; // Encryption key
    $method = "AES-256-CBC"; // Encryption method
    $iv = substr(hash('sha256', 'my_secret_iv'), 0, 16); // Initialization vector (IV)
    return openssl_decrypt($encrypted, $method, $encryptionKey, 0, $iv);
}

// Decrypt the expiration date
$expirationDate = decryptDate($encryptedDate);

// Debugging: Output decrypted date for verification
if (!$expirationDate) {
    die("Decryption failed. Please verify the encryption key and method.");
}
// echo "Decrypted Date: " . $expirationDate . "<br>";

// Get the current date and time
$currentDate = date("Y-m-d H:i:s");

// Debugging: Output current date
// echo "Current Date: " . $currentDate . "<br>";

// Check expiration
if (strtotime($currentDate) > strtotime($expirationDate)) {
    echo base64_encode("expired");
    exit;
}

// Return a success response
echo base64_encode("valid");
?>