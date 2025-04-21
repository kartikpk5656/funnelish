<?php
$url = isset($_GET['url']) ? $_GET['url'] : null;

if (!$url || !filter_var($url, FILTER_VALIDATE_URL)) {
    die("Invalid or missing URL");
}

$context = stream_context_create([
    "http" => [
        "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64)"
    ]
]);

echo file_get_contents($url, false, $context);
?>
