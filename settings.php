<?php
// settings.php
$host = "localhost";
$user = "root";
$pwd  = "";

// multiple databases
$db_names = [
  'jobs' => 'university_db',
  'about'   => 'about_db',
  'eoi'  => 'create_eoi.db',
//   'login' => 'assignment2_db',
//   'signup' => 'assignment2_db',
];

function db_connect(string $key = 'default') {
    global $host, $user, $pwd, $db_names;
    if (!isset($db_names[$key])) {
        throw new Exception("Unknown DB key: {$key}");
    }
    $conn = mysqli_connect($host, $user, $pwd, $db_names[$key]);
    if (!$conn) {
        throw new Exception("DB connect failed: " . mysqli_connect_error());
    }
    mysqli_set_charset($conn, 'utf8mb4');
    return $conn;
}
