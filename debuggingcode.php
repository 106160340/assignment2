<?php
// TEMPORARY DEBUGGING: show all errors while debugging (remove or lower in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Use strict mysqli error reporting so exceptions/errors appear
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

require_once "settings.php"; // make sure this defines $host, $username, $password, $dbname

// Connect (no @ so we see errors)
$dbconn = mysqli_connect($host, $username, $password, $dbname);

if (!$dbconn) {
    die("DB connect failed: " . mysqli_connect_error());
}

// Optional: quick sanity check of provided DB vars
echo "<p>Connected to DB: " . htmlspecialchars($dbname) . " as " . htmlspecialchars($username) . "</p>";

// Primary jobs query using prepared statements
try {
    $jobs_sql = "SELECT * FROM jobs";
    $jobs_stmt = mysqli_prepare($dbconn, $jobs_sql);
    mysqli_stmt_execute($jobs_stmt);
    $jobs_result = mysqli_stmt_get_result($jobs_stmt);

    if (!$jobs_result || mysqli_num_rows($jobs_result) === 0) {
        echo "<p><strong>No jobs returned by query.</strong> Check table 'jobs' contents.</p>";
    } else {
        while ($row = mysqli_fetch_assoc($jobs_result)) {
            // Required columns check (helps detect schema mismatches)
            $required = ['title','ref_num','salary','report_line','description'];
            foreach ($required as $col) {
                if (!array_key_exists($col, $row)) {
                    echo "<p style='color:red;'>Missing column in jobs result: $col — check your DB schema.</p>";
                }
            }

            $title_raw = $row['title'] ?? '';
            $ref_num_raw = $row['ref_num'] ?? '';

            // sanitize for HTML and for id attribute
            $title = htmlspecialchars($title_raw);
            // create a safe id (letters/numbers/-, no spaces)
            $id = preg_replace('/[^a-zA-Z0-9_\-]/', '-', substr($title_raw, 0, 40));

            echo "<section aria-labelledby='$id'>";
            echo "<h2 id='$id'>$title</h2>";
            echo "<p><strong>Reference Number: </strong>" . htmlspecialchars($ref_num_raw) . "</p>";
            echo "<p><strong>Salary: </strong>" . htmlspecialchars($row['salary'] ?? '') . " per year plus Super</p>";
            echo "<p><strong>Reporting Line: </strong>" . htmlspecialchars($row['report_line'] ?? '') . "</p>";
            echo "<h3>Description</h3>";
            echo "<p>" . nl2br(htmlspecialchars($row['description'] ?? '')) . "</p>";
            echo "<h3>Key Responsibilities</h3>";

            // Prepare the responsibilities query (use prepared stmt for safety)
            $resp_sql = "SELECT resp_item FROM responsibility WHERE ref_num = ?";
            $resp_stmt = mysqli_prepare($dbconn, $resp_sql);
            mysqli_stmt_bind_param($resp_stmt, "s", $ref_num_raw);
            mysqli_stmt_execute($resp_stmt);
            $resp_result = mysqli_stmt_get_result($resp_stmt);

            if ($resp_result && mysqli_num_rows($resp_result) > 0) {
                echo "<ul>";
                while ($item = mysqli_fetch_assoc($resp_result)) {
                    // ensure the expected column exists
                    if (!isset($item['resp_item'])) {
                        echo "<li style='color:red;'>Unexpected responsibility row structure.</li>";
                        continue;
                    }
                    echo "<li>" . htmlspecialchars($item['resp_item']) . "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p><em>No responsibilities listed for this role.</em></p>";
            }

            // free resp stmt & result
            mysqli_free_result($resp_result);
            mysqli_stmt_close($resp_stmt);

            echo "</section>";
        }
    }

    // free and close
    mysqli_free_result($jobs_result);
    mysqli_stmt_close($jobs_stmt);

} catch (Exception $e) {
    echo "<p style='color:red;'>Exception: " . htmlspecialchars($e->getMessage()) . "</p>";
}

// Close connection
mysqli_close($dbconn);
?>
