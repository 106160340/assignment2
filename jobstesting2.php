<?php
require_once "settings.php";

$dbconn = @mysqli_connect($host, $username, $password, $dbname);

if ($dbconn) {
    $query = "SELECT * FROM jobs";
    $result = mysqli_query($dbconn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $title = htmlspecialchars($row['title']);
            $ref_num = mysqli_real_escape_string($dbconn, $row['ref_num']);

            echo "<section aria-labelledby='$title'>";
            echo "<h2 id='$title'>$title</h2>";
            echo "<p><strong>Reference Number: </strong>" . htmlspecialchars($row['ref_num']) . "</p>";
            echo "<p><strong>Salary: </strong>" . htmlspecialchars($row['salary']) . " per year plus Super</p>";
            echo "<p><strong>Reporting Line: </strong>" . htmlspecialchars($row['report_line']) . "</p>";
            echo "<h3>Description</h3>";
            echo "<p>" . htmlspecialchars($row['description']) . "</p>";
            echo "<h3>Key Responsibilities</h3>";

            // Fetch related responsibilities
            $resp_query = "SELECT * FROM responsibility WHERE ref_num='$ref_num'";
            $resp_result = mysqli_query($dbconn, $resp_query);

            if ($resp_result && mysqli_num_rows($resp_result) > 0) {
                echo "<ul>";
                while ($item = mysqli_fetch_assoc($resp_result)) {
                    echo "<li>" . htmlspecialchars($item['resp_item']) . "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>No responsibilities listed.</p>";
            }

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
