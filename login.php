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

    $stmt = $dbconn->prepare("SELECT user_id, username, password_hash, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($pass, $row['password_hash'])) {
            $_SESSION['user'] = $row['username'];
            $_SESSION['role'] = $row['role'];
            header("Location: manage.php");
            exit;
        } else {
            echo "<p>Invalid password, please try again. <span><a href='login.php'>log in </a></span>.</p>";
        }
    } else {
        echo "<p>No existing user found, please <span><a href='signup.php'>sign up</a></span>.</p>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($dbconn);
} else {
?>
<h2>Login</h2>
<form method="post" action="">
    <label>Username: <input type="text" name="username" required></label><br>
    <label>Password: <input type="password" name="password" required></label><br>
    <input type="submit" value="Login">
</form>
<p>Don't have an account? <a href="signup.php">Sign up</a></p>
<?php } ?>
