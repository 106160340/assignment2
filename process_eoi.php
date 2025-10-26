<?php

// database connection ----->
$host = "localhost";
$user = "root";
$pwd = "";
$sql_db = "job_applications";

// sql connection ------->
$conn = @mysqli_connect($host, $user, $pwd);

if (!$conn) {
    die("<p>Database connection failure</p>");
}

// create database if it doesnt exist -------->

mysqli_query($conn, "Create Database if not Exists $sql_db");
mysqli_select_db($conn, $sql_db);

// table creation if it doesnt exist ------->

$create_table = "
Create Table if not Exist eoi (
    eoi_id INT AUTO_INCREMENT PRIMARY KEY,
    job_ref VARCHAR(5) NOT NULL,
    first_name VARCHAR(20) NOT NULL,
    last_name VARCHAR(20) NOT NULL,
    date_of_birth DATE NOT NULL,
    gender ENUM('male','female','other') NOT NULL,
    street VARCHAR(40) NOT NULL,
    suburb VARCHAR(40) NOT NULL,
    state ENUM('VIC','NSW','QLD','TAS','ACT','NT','WA','SA') NOT NULL,
    postcode CHAR(4) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(12) NOT NULL,
    skills TEXT,
    other_skill_text VARCHAR(100),
    status ENUM('New','Current','Final') DEFAULT 'New'
)";
mysqli_query($conn, $create_table);

// block direct url access ---------->

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['job_ref'])) {
    header("Location: apply.php");
    exit();
}

// sanitisation function ----------> 

function sanitise_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// read and validate inputs -------->

$job_ref = sanitise_input($_POST['job_ref']);
$first_name = sanitise_input($_POST['first_name']);
$last_name = sanitise_input($_POST['last_name']);
$date_of_birth = sanitise_input($_POST['date_of_birth']);
$gender = sanitise_input($_POST['gender']);
$street = sanitise_input($_POST['street']);
$suburb = sanitise_input($_POST['suburb']);
$state = sanitise_input($_POST['state']);
$postcode = sanitise_input($_POST['postcode']);
$email = sanitise_input($_POST['email']);
$phone = sanitise_input($_POST['phone']);
$skills = isset($_POST['skills']) ? implode(", ", $_POST['skills']) : "";
$other_skill_text = sanitise_input($_POST['other_skill_text'] ?? "");

// server-side validaiton ----------- >

$errors = [];

// job ref has to be 5 alphanumeric
if (!preg_match("/^[A-Za-z0-9]{5}$/", $job_ref)) {
    $errors[] = "Invalid Job Reference (5 Alphanumeric characters required)";
}

// name length ----------->
if (empty($first_name) || strlen($first_name) > 20) $errors[] = "First name requires maximum 20 characters.";
if (empty($last_name) || strlen($last_name) > 20) $errors[] = "Last name requires maximum 20 characters.";

// gender ---------->
if (!in_array($gender, ['male', 'female', 'other'])) $errors[] = "Invalid Gender";

// address section ----------->
if (empty($street) || strlen($street) > 40) $errors[] = "Street requires max 40 characters.";
if (empty($suburb) || strlen($suburb) > 40) $errors[] = "Suburb requires max 40 characters.";
if (!preg_match("/^\d{4}$/", $postcode)) $errors[] = "Postcode must be 4 digits.";

// email and phone section --------->
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email format.";
if (!preg_match("/^\d{8,12}$/", $phone)) {
    $errors[] = "Phone must be 8-12 digits.";
}

// skillss section ------------->
if (empty($skills)) $errors[] = "At least one Skill must be selected";

// errors display or insert ------------>
if (count($errors) > 0) {
    echo "<h2> Submission Failed </h2>";
    foreach ($errors as $err) echo "<li>$err</li>";
    echo "</ul><p><a href='apply.php'> Go Back </a></p>";
    exit();
}


// data info databse -------------->
$query = "
INSERT INTO eoi
(job_ref, first_name, last_name, date_of_birth, gender, street, suburb, state, postcode, email, phone, skills, other_skill_text)
VALUES
('$job_ref', '$first_name', '$last_name', '$date_of_birth', '$gender', '$street', '$suburb', '$state', '$postcode', '$email', '$phone', '$skills', '$other_skill_text')
";

$result = mysqli_query($conn, $query);

if ($result) {
    $eoi_id = mysqli_insert_id($conn);
    echo "<h2 style='color:green;'>Application Received Successfully!</h2>";
    echo "<p>Your Expression of Interest Number is: <strong>$eoi_id</strong></p>";
    echo "<p> Status: <strong>New</strong></p>";
} else {
    echo "<h2 style='color:red;'> Error: Unable to save your application.</h2>";
    echo "<p><strong>MySQL Error:</strong> " . mysqli_error($conn) . "</p>";
    echo "<p><strong> Query:</strong> $query</p>";
}

// connection close ------------- >
mysqli_close($conn);
