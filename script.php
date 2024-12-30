<?php
// Encrypted expiration date (generated using the encryption key `jrcsrg`)
$encryptedDate = "U2FsdGVkX1+E3NcNQZ7OgJWwMvXtJzg14ys6rBHEJc8="; // Replace with your actual encrypted date

// Decryption function
function decryptDate($encrypted) {
    $encryptionKey = "jrcsrg"; // Encryption key
    $method = "AES-256-CBC"; // Encryption method
    $iv = substr(hash('sha256', 'my_secret_iv'), 0, 16); // Initialization vector (IV)
    return openssl_decrypt($encrypted, $method, $encryptionKey, 0, $iv);
}

// Decrypt the expiration date
$expirationDate = decryptDate($encryptedDate);

// Get the current date and time
$currentDate = date("Y-m-d H:i:s");

// Check expiration
if (!$expirationDate || strtotime($currentDate) > strtotime($expirationDate)) {
    echo base64_encode("expired"); // Return an encoded response for expiration
    exit;
}

// Return a success response
echo base64_encode("valid");
?>
