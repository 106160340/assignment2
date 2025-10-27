<?php
// Create or resume session and enable session variables 
session_start();
// check if not $_SESSION['user'], if not redirect to login.php
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

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

<!-- Header include -->
<?php include 'header.inc'; ?>

<!-- navigation include -->
<?php include 'nav.inc'; ?>

<head>
<!-- reference to external CSS (Only for this page) -->
    <link rel="stylesheet" type="text/css" href="styles/managestyles.css">
</head>

<body>
    <div class="page-header">
    <h1>EOI Manager</h1>
    <a href="logout.php" class="logout-button">Logout</a>
    </div>

    <!-- List all EOIs button form -->
    <form method="post">
        <button type="submit" name="filter" value="list_all_eois">List All EOIs</button>
    </form>

    <!-- List by Job Reference -->
    <form method="post">
        <label>Job Reference:</label>
        <input type="text" name="job_ref" required>
        <button type="submit" name="filter" value="list_by_job_ref">Search</button>
    </form>

    <!-- List by Applicant Name -->
    <form method="post">
        <label>First Name:</label>
        <input type="text" name="first_name">
        <label>Last Name:</label>
        <input type="text" name="last_name">
        <button type="submit" name="filter" value="list_by_name">Search</button>
    </form>

    <!-- Delete all EOIs by a given job reference -->
    <form method="post">
        <label>Delete All EOIs Using Job Reference</label>
        <input type="text" name="eoi_delete" required>
        <button type="submit" name="filter" value="delete_eois">Delete</button>
    </form>

    <!-- Sort field for results -->
    <form method="post">
        <label>Sort By:</label>
        <select name="sort_field" required onchange="this.form.submit()">
            <option value="eoi_id" <?php if(isset($_POST['sort_field']) && $_POST['sort_field'] == 'eoi_id') echo 'selected'; ?>>EOI ID (default)</option>
            <option value="job_ref" <?php if(isset($_POST['sort_field']) && $_POST['sort_field'] == 'job_ref') echo 'selected'; ?>>Job Reference</option>
            <option value="first_name" <?php if(isset($_POST['sort_field']) && $_POST['sort_field'] == 'first_name') echo 'selected'; ?>>First Name</option>
            <option value="last_name" <?php if(isset($_POST['sort_field']) && $_POST['sort_field'] == 'last_name') echo 'selected'; ?>>Last Name</option>
            <option value="status" <?php if(isset($_POST['sort_field']) && $_POST['sort_field'] == 'status') echo 'selected'; ?>>Status</option>
            <option value="email" <?php if(isset($_POST['sort_field']) && $_POST['sort_field'] == 'email') echo 'selected'; ?>>Email</option>
            <option value="phone" <?php if(isset($_POST['sort_field']) && $_POST['sort_field'] == 'phone') echo 'selected'; ?>>Phone</option>
            <option value="state" <?php if(isset($_POST['sort_field']) && $_POST['sort_field'] == 'state') echo 'selected'; ?>>State</option>
            <option value="suburb" <?php if(isset($_POST['sort_field']) && $_POST['sort_field'] == 'suburb') echo 'selected'; ?>>Suburb</option>
            <option value="postcode" <?php if(isset($_POST['sort_field']) && $_POST['sort_field'] == 'postcode') echo 'selected'; ?>>Postcode</option>
            <option value="date_of_birth" <?php if(isset($_POST['sort_field']) && $_POST['sort_field'] == 'date_of_birth') echo 'selected'; ?>>Date of Birth</option>
            <option value="gender" <?php if(isset($_POST['sort_field']) && $_POST['sort_field'] == 'gender') echo 'selected'; ?>>Gender</option>
        </select>
        <input type="hidden" name="filter" value="sort_results">
    </form>

    
    <?php
        // List all EOIs upon loading into page
        if (!isset($_POST['filter'])) {
            $_POST['filter'] = "list_all_eois";
        }
        // Check if 'filter' button clicked
        if (isset($_POST['filter'])) {
            $filter = $_POST['filter'];

            // I used a function to store the code that makes the table so I don't have to repeatedly use this long code for each sql query.
            function EOITable($result) {
                echo "<table border='1' cellpadding='10'>";
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

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['eoi_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['job_ref']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['first_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['last_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['date_of_birth']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['street']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['suburb']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['state']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['postcode']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['skills']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['other_skill_text']) . "</td>";
                    echo "<td>
                        <form method='post'>
                            <input type='hidden' name='eoi_number' value='" . htmlspecialchars($row['eoi_id']) . "'>
                            <select name='change_status' onchange='this.form.submit()'>
                                <option value='New' ".($row['status'] == 'New' ? 'selected' : '') . ">New</option>
                                <option value='Current' ".($row['status'] == 'Current' ? 'selected' : '') . ">Current</option>
                                <option value='Final' ".($row['status'] == 'Final' ? 'selected' : '') . ">Final</option>
                            </select>
                            <input type='hidden' name='filter' value='update_status'>
                        </form>
                        </td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            // List all EOIs query
            if ($filter === "list_all_eois") {
                $sql = "SELECT * FROM eoi";
                $result = mysqli_query($dbconn, $sql);

                 if (mysqli_num_rows($result) > 0) {
                    EOITable($result);
                } else {
                    echo "<p>No EOIs found.</p>";
                }
            }
            // List EOIs according to job ref query
            else if ($filter === "list_by_job_ref") {
                $job_ref = trim($_POST['job_ref']);
                $stmt = $dbconn->prepare("SELECT * FROM eoi WHERE job_ref = ?");
                $stmt->bind_param("s", $job_ref);
                $stmt->execute();
                $result = $stmt->get_result();

                if (mysqli_num_rows($result) > 0) {

                    EOITable($result);
                } else {
                    echo "<p>No EOIs found for Job Reference: " . htmlspecialchars($job_ref) . "</p>";
                }
                 $stmt->close();
            }
            // List EOIs according to first name, last name or both query
            else if ($filter === "list_by_name") {
                $first_name = '%' .  trim($_POST['first_name']) . '%';
                $last_name = '%' .  trim($_POST['last_name']) . '%';
                $stmt = $dbconn->prepare("SELECT * FROM eoi WHERE first_name LIKE ? OR last_name LIKE ?");
                $stmt->bind_param("ss", $first_name, $last_name);
                $stmt->execute();
                $result = $stmt->get_result();

                if (mysqli_num_rows($result) > 0) {
                    EOITable($result);
                } else {
                    echo "<p>No EOIs found matching that name.</p>";
                }
                 $stmt->close();
            }
            //  Delete all EOIs by a given job ref query
            else if ($filter === "delete_eois") {
                $eoi_delete = trim($_POST['eoi_delete']);
                $stmt = $dbconn->prepare("DELETE FROM eoi WHERE job_ref = ?");
                $stmt->bind_param("s", $eoi_delete);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    echo "<p>All EOIs for Job Reference " . htmlspecialchars($eoi_delete) . " have been deleted.</p>";
                } else {
                    echo "<p>No EOIs found with Job Reference " . htmlspecialchars($eoi_delete) . "</p>";
                }
                 $stmt->close();
            }
            // Change EOI status query
            else if ($filter === "update_status") {
                $eoi_number = $_POST['eoi_number'];
                $new_status = $_POST['change_status'];
                $stmt = $dbconn->prepare("UPDATE eoi SET status = ? WHERE eoi_id = ?");
                $stmt->bind_param("si", $new_status, $eoi_number);
                $stmt->execute();
                $stmt->close();

                // Refresh page after update
                header("Location: manage.php");
                exit();
            }
            // Sort field for results (Ascending)
            else if ($filter === "sort_results") {
                $field = $_POST['sort_field'];
                // ascending order (A-Z / 0-9)
                $sql = "SELECT * FROM eoi ORDER BY $field ASC";
                $result = mysqli_query($dbconn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    EOITable($result);
                } else {
                    echo "<p>No results found to sort.</p>";
                }
            }
        }

    ?>
<!-- footer -->
 <?php include 'footer.inc' ?>
</body>

</html>

<!-- Used CHAT-GPT and weekly module material to assist me with creating this page -->