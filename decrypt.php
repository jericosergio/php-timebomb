<?php
$expirationDate = "2025-01-08 00:00:00"; // Desired expiration date
$encryptionKey = "jrcsrg"; // Encryption key
$method = "AES-256-CBC"; // Encryption method
$iv = substr(hash('sha256', 'my_secret_iv'), 0, 16); // Initialization vector (IV)

// Encrypt the expiration date
$encryptedDate = openssl_encrypt($expirationDate, $method, $encryptionKey, 0, $iv);

// Output the encrypted date
echo "Encrypted Date: " . $encryptedDate;
?>