<?php
session_start();
require_once "settings.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dbconn = mysqli_connect($host, $username, $password, $dbname);
    if (!$dbconn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $user = trim($_POST['username'] ?? '');
    $pass = trim($_POST['password'] ?? '');
    $pass2 = trim($_POST['password2'] ?? '');

    if ($user === '' || $pass === '') {
        echo "<p>Please enter both username and password.</p>";
    } else {
        // Check if username already exists
        $stmt = $dbconn->prepare("SELECT username FROM users WHERE username = ?");
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();

        if (mysqli_num_rows($result) > 0) {
            echo "<p>Username already exists. Please choose another.</p>";
        } elseif ($pass !== $pass2) {
        echo "<p>Please check the spelling of your password. Re-entered password must be exactly the same as the password.</p>"; 
        } else {
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $insert = $dbconn->prepare("INSERT INTO users (username, password_hash) VALUES (?, ?)");
            $insert->bind_param("ss", $user, $hash);
            $insert->execute();
            $result = $insert->get_result();

            echo "<p>Account created successfully. <a href='login.php'>Login now</a>.</p>";
        }

        mysqli_stmt_close($stmt);
        mysqli_close($dbconn);
    }
} else {
?>
<h2>Sign Up</h2>
<form method="post" action="">
    <label>Username: <input type="text" name="username" required></label><br>
    <label>Password: <input type="password" name="password" required></label><br>
    <label>Re-enter Password: <input type="password" name="password2" required></label><br>
    <input type="submit" value="Sign Up">
</form>
<p>Already have an account? <a href="login.php">Login</a></p>
<?php } ?>
