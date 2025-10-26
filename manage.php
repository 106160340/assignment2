<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

echo "<h2>Welcome, " . htmlspecialchars($_SESSION['user']) . "!</h2>";

if ($_SESSION['role'] === 'admin') {
    echo "<p>You are logged in as <strong>Admin</strong>. You have full access.</p>";
} else {
    echo "<p>You are logged in as a standard user.</p>";
}
?>
<p><a href="logout.php">Logout</a></p>
