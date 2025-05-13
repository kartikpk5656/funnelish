
<?php
require_once "config.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['username'] === $adminUsername && $_POST['password'] === $adminPassword) {
        $_SESSION['logged_in'] = true;
    } else {
        $error = "Invalid login.";
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: panel.php");
    exit;
}

if (!isset($_SESSION['logged_in'])):
?>
<!DOCTYPE html>
<html><head><title>Login</title></head><body>
<h2>Login to Dashboard</h2>
<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
<form method="post">
    Username: <input type="text" name="username" /><br/>
    Password: <input type="password" name="password" /><br/>
    <input type="submit" value="Login" />
</form>
</body></html>
<?php else: ?>
<!DOCTYPE html>
<html>
<head><title>Redirect Logs</title>
<style>table{border-collapse: collapse;} td,th{border:1px solid #ccc; padding:4px;}</style>
</head><body>
<h2>Redirect Log Viewer</h2>
<p><a href="?logout=1">Logout</a></p>
<p><a href="logs/raj.csv" download>📥 Download Full CSV</a></p>
<table>
<tr>
    <th>Type</th><th>Time</th><th>IP</th><th>Campaign ID</th>
    <th>Ad ID</th><th>Adset ID</th><th>fbclid</th><th>User Agent</th>
</tr>
<?php
if (file_exists($logFile)) {
    $rows = array_reverse(file($logFile));
    unset($rows[0]);
    foreach ($rows as $line) {
        echo "<tr>";
        $cols = str_getcsv(trim($line));
        foreach ($cols as $col) echo "<td>".htmlspecialchars($col)."</td>";
        echo "</tr>";
    }
}
?>
</table>
</body></html>
<?php endif; ?>
