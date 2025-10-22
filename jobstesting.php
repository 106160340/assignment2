<?php
require_once "settings.php";
$dbconn = @mysqli_connect($host, $username, $password, $dbname);
if ($dbconn) {
    $query = "SELECT * FROM jobs";
    $result = mysqli_query($dbconn, $query);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            // echo "<p>". $row['title'] . "</p>";
            $title = $row['title'];
            $ref_num = $row['ref_num'];
            echo "<section aria-labelledby='$title'><h2 id='$title'>" . $title . "</h2>";
            echo "<p><strong>Reference Number: </strong>" . $row['ref_num'] . "</p>";
            echo "<p><strong>Salary: </strong>" . $row['salary'] . "per year plus Super</p>";
            echo "<p><strong>Reporting Line: </strong>" . $row['report_line'] . "</p>";
            echo "<h3>Description</h3>";
            echo "<p>" . $row['description'] . "</p>";
            echo "<h3>Key Responsibilities</h3>";
            $resp_query = "SELECT resp_item FROM responsibility WHERE ref_num='$ref_num';";
            $resp_result = mysqli_query($dbconn,$resp_query);
            echo "<ul>";
            while ($item = mysqli_fetch_assoc($resp_result)) {
              echo "<li>" . $item . "</li>";
            }
            echo "</ul>";
            echo "</section>";
        }
    } else {
        echo "<p>There are no jobs to display.</p>";
    }
    mysqli_close($dbconn);
} else {
    echo "<p>Unable to connect to the database.</p>";
}
?>
