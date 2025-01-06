<?php
$key = "jrcsrg"; // Encryption key
$method = "AES-256-CBC";
$iv = substr(hash('sha256', 'my_secret_iv'), 0, 16); // Initialization vector (IV)

// Expiration date (set to a future date)
$expirationDate = "2025-01-09 23:59:59";

// Encrypt the expiration date
$encryptedDate = openssl_encrypt($expirationDate, $method, $key, 0, $iv);

// Output the encrypted string
echo $encryptedDate;?>