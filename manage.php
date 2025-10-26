f<?php
// Create or resume session and enable session variables 
session_start();

// Settings file with database connection details
require_once("settings.php");


// Connect to the database
$dbconn = mysqli_connect($host, $username, $password, $dbname);
// Error for Database connection failure
if (!$dbconn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="State University EOI" />
    <meta name="keywords"
        content="University, jobs, research, digital, computer science, technology, position, IT, application, salary package" />
    <meta name="HR" content="State University HR team" />
    <title>Manage</title>
    <!-- References to external CSS files-->
    <link rel="stylesheet" type="text/css" href="styles/style.css" />
    <!-- References to external responsive CSS file -->
    <link href="styles/responsive.css" rel="stylesheet" media="screen and (max-width: 3840px)" />
</head>

<body>
    <h1?> EOI Manager </h1?>

    <!-- List all EOIs button form -->
    <form method="post">
        <input type="submit" name="filter" value="list_all_eois">List All EOIs/>
    </form>

    <!-- List by Job Reference -->
    <form method="post">
        <label>Job Reference:</label>
        <input type="text" name="job_ref" required>
        <input type="submit" name="filter" value="list_by_job_ref">Search</input>
    </form>

    <!-- List by Applicant Name -->
    <form method="post">
        <label>First Name:</label>
        <input type="text" name="first_name">
        <label>Last Name:</label>
        <input type="text" name="last_name">
        <input type="submit" name="filter" value="list_by_name">Search</input>
    </form>

    <!-- Delete all EOIs by a given job reference -->
    <form method="post">
        <label>Delete All EOIs Using Job Reference</label>
        <input type="text" name="eoi_delete" required>
        <input type="submit" name="filter" value="delete_eois">Delete</input>
    </form>

    <!-- Change EOI Status -->
    <form method="post">
        <label>EOI Number:</label>
        <input type="text" name="eoi_number" required>
        <label>Update Status:</label>
        <select name="change_status">
            <option value="New">New</option>
            <option value="Current">Current</option>
            <option value="Final">Final</option>
        </select>
        <input type="submit" name="filter" value="update_status">Update</input>
    </form>
    
    <?php
        // Check if 'filter' button clicked
        if (isset($_POST['filter'])) {
            $filter = mysqli_real_escape_string($_POST['filter']);

            // I used a function to store the code that makes the table so I don't have to repeatedly use this long code for each sql query.
            function EOITable($result) {
                echo "<table border='1' cellpadding='10'";
                echo "<tr>
                        <th>EOI ID</th>
                        <th>Job Ref</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Street</th>
                        <th>Suburb</th>
                        <th>State</th>
                        <th>Postcode</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Skills</th>
                        <th>Other Skill Text</th>
                        <th>Status</th>
                     </tr>";

                while ($row = mysqli_fetch_assoc($filter)) {
                    echo "<tr>";
                    echo "<td>{$row['eoi_id']}</td>";
                    echo "<td>{$row['job_ref']}</td>";
                    echo "<td>{$row['first_name']}</td>";
                    echo "<td>{$row['last_name']}</td>";
                    echo "<td>{$row['date_of_birth']}</td>";
                    echo "<td>{$row['gender']}</td>";
                    echo "<td>{$row['street']}</td>";
                    echo "<td>{$row['suburb']}</td>";
                    echo "<td>{$row['state']}</td>";
                    echo "<td>{$row['postcode']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td>{$row['phone']}</td>";
                    echo "<td>{$row['skills']}</td>";
                    echo "<td>{$row['other_skill_text']}</td>";
                    echo "<td>{$row['status']}</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }

            // List all EOIs query
            if ($filter === "list_all_eois") {
                $sql = "SELECT * FROM eoi";
                $result = mysqli_query($dbconn, $sql);

                 if (mysqli_num_rows($filter) > 0) {
                    EOITable($result);
                } else {
                    echo "<p>No EOIs found.</p>";
                }
            }
            // List EOIs according to job ref query
            else if ($filter === "list_by_job_ref") {
                $job_ref = trim($_POST['job_ref']);
                $sql = "SELECT * FROM eoi WHERE job_ref = '$job_ref'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    echo "<h2>EOIs for Job Reference: $job_ref</h2>";
                    EOITable($result);
                } else {
                    echo "<p>No EOIs found for Job Reference: $job_ref</p>";
                }
           
            }

        }

    ?>

</body>
</html>

