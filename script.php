<?php
$key = "OnqxS2DPM87O1RKGEESgx5eXjLFuXm3YpROUF/kf8n4="; 
$encryptionKey = "jrcsrg";
$method = "AES-256-CBC";
$iv = substr(hash('sha256', 'my_secret_iv'), 0, 16); // Initialization vector (IV)

function decryptDate($encrypted, $method, $encryptionKey, $iv)
{
    return openssl_decrypt($encrypted, $method, $encryptionKey, 0, $iv);
}

$expirationDate = decryptDate($key, $method, $encryptionKey, $iv);

if (!$expirationDate) {
    die("Decryption failed. Please verify the encryption key and method.");
}

$currentDate = date("Y-m-d H:i:s");

if (strtotime($currentDate) > strtotime($expirationDate)) {
    echo base64_encode("false");
    exit;
}

echo base64_encode("true");
?>
