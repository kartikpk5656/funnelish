
<?php
// === REDIRECT SETTINGS ===
$allowedCampaignID = "1234567890";  // ✅ Your campaign ID
$landingURL = "https://your-landing-page.com";
$fallbackURL = "https://your-fallback-page.com";

// === LOG SETTINGS ===
$logFile = __DIR__ . "/logs/raj.csv";
$ipClickLimit = 2;
$adminEmail = "your@email.com";  // ✅ Change this to your email
$blockedAlertThreshold = 10;

// === DASHBOARD LOGIN ===
$adminUsername = "admin";
$adminPassword = "admin123"; // 🔐 Change this after first login

// === FILE PATHS ===
$bannedIPFile = __DIR__ . "/banned.txt";
?>
