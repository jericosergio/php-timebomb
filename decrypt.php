<?php

$expirationDate = "2025-01-01 00:00:00"; // Set your desired expiration date
$encryptionKey = "jrcsrg"; // Your encryption key
$method = "AES-256-CBC"; // Encryption method
$iv = substr(hash('sha256', 'my_secret_iv'), 0, 16); // Initialization vector (IV)

// Encrypt the expiration date
$encryptedDate = openssl_encrypt($expirationDate, $method, $encryptionKey, 0, $iv);
echo "Encrypted Date: " . $encryptedDate;

?>
