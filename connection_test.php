<?php
include 'settings.php';

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

if ($conn) {
    echo "<h2 style='color:green;'>✅ Connection successful to $sql_db</h2>";
} else {
    echo "<h2 style='color:red;'>❌ Connection failed</h2>";
    echo "<p>" . mysqli_connect_error() . "</p>";
}
?>
