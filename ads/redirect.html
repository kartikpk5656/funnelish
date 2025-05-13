
<?php
require_once "config.php";

$campaignID = $_GET['campaign_id'] ?? '';
$adID       = $_GET['ad_id'] ?? '';
$adsetID    = $_GET['adset_id'] ?? '';
$fbclid     = $_GET['fbclid'] ?? '';
$ip         = $_SERVER['REMOTE_ADDR'];
$userAgent  = $_SERVER['HTTP_USER_AGENT'];
$time       = date('Y-m-d H:i:s');

function logVisit($file, $type, $time, $ip, $cid, $aid, $asid, $fbclid, $ua) {
    if (!file_exists($file)) {
        file_put_contents($file, "\"Type\",\"Time\",\"IP\",\"Campaign ID\",\"Ad ID\",\"Adset ID\",\"fbclid\",\"User Agent\"\n");
    }
    $line = sprintf(
        "\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\"\n",
        $type, $time, $ip, $cid, $aid, $asid, $fbclid, addslashes($ua)
    );
    file_put_contents($file, $line, FILE_APPEND);
}

function countIPToday($file, $ip) {
    if (!file_exists($file)) return 0;
    $lines = file($file);
    $count = 0;
    $today = date('Y-m-d');
    foreach ($lines as $line) {
        if (stripos($line, $ip) !== false && stripos($line, $today) !== false) {
            $count++;
        }
    }
    return $count;
}

function isBanned($ip, $file) {
    if (!file_exists($file)) return false;
    $banned = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    return in_array($ip, $banned);
}

function countBlockedToday($file) {
    if (!file_exists($file)) return 0;
    $lines = file($file);
    $count = 0;
    $today = date('Y-m-d');
    foreach ($lines as $line) {
        if (stripos($line, "BLOCKED") !== false && stripos($line, $today) !== false) {
            $count++;
        }
    }
    return $count;
}

function sendAlertEmail($to, $count) {
    $subject = "⚠️ Alert: $count BLOCKED hits today";
    $message = "Your redirect system has $count blocked hits today.\nPlease review the logs.";
    $headers = "From: redirect@yourdomain.com";
    @mail($to, $subject, $message, $headers);
}

$ipClicksToday = countIPToday($logFile, $ip);
$blockedToday = countBlockedToday($logFile);
$shouldBlock = (
    $campaignID !== $allowedCampaignID ||
    $ipClicksToday >= $ipClickLimit ||
    isBanned($ip, $bannedIPFile)
);

if ($shouldBlock) {
    logVisit($logFile, "BLOCKED", $time, $ip, $campaignID, $adID, $adsetID, $fbclid, $userAgent);
    if ($blockedToday >= $blockedAlertThreshold) {
        sendAlertEmail($adminEmail, $blockedToday);
    }
    header("Location: $fallbackURL", true, 301);
} else {
    logVisit($logFile, "VALID", $time, $ip, $campaignID, $adID, $adsetID, $fbclid, $userAgent);
    header("Location: $landingURL", true, 301);
}
exit;
?>
