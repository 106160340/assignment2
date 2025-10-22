f<?php
// Create or resume session and enable session variables 
session_start();

// Settings file with database conncetion details
require_once("settings.php");




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
        <input type="submit" name="filter" value="List All EOIs">List All EOIs/>
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
        // Check if filter button clicked
        if (isset($_POST['filter'])) {
            $filter = $_POST['filter'];
        }

    ?>

</body>
</html>

