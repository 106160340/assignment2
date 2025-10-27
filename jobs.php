<?php include 'header.inc'; ?>
<?php include 'nav.inc'; ?>

<!-- Hero Image -->
<img src="images/university_1.jpg" alt="view of university campus. A tree in front of a building."
    title="State University" class="theme_image">

<!-- main content -->
<main id="main-content" role="main">
    <h1 id="job_page_heading">Jobs</h1>
    <article aria-labelledby="job_page_heading">
        <aside style="font-style: italic;">
            <p>We want your help to elevate the digital learning experience of our students, while also supporting our
                academic staff to achieve this goal. </p>
            <p>Please head to the apply page, so you can help us realize a future where the digital learning and research
                space is transformed for better. </p>
        </aside>
        <hr>
        <!-- Job Listing -->
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

                    echo "<section class='job_section' aria-labelledby='$title'>";
                    echo "<h2 id='$title'>$title</h2>";
                    echo "<p><strong>Reference Number: </strong>" . htmlspecialchars($row['ref_num']) . "</p>";
                    echo "<p><strong>Salary: </strong>" . htmlspecialchars($row['salary']) . " per year plus Super</p>";
                    echo "<p><strong>Reporting Line: </strong>" . htmlspecialchars($row['report_line']) . "</p>";
                    echo "<h3>Description</h3>";
                    echo "<p>" . htmlspecialchars($row['description']) . "</p>";

                    echo "<h3>Key Responsibilities</h3>";
                    // Fetch related responsibilities - unordered list
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

                    echo "<h3>Essential Requirements</h3>";
                    // Fetch related essential requirements - ordered list
                    $esse_query = "SELECT * FROM essential WHERE ref_num='$ref_num'";
                    $esse_result = mysqli_query($dbconn, $esse_query);

                    if ($esse_result && mysqli_num_rows($esse_result) > 0) {
                        echo "<ol>";
                        while ($item = mysqli_fetch_assoc($esse_result)) {
                            echo "<li>" . htmlspecialchars($item['esse_item']) . "</li>";
                        }
                        echo "</ol>";
                    } else {
                        echo "<p>No essential requirements listed.</p>";
                    }

                    echo "<h3>Preferable Requirements</h3>";
                    // Fetch related preferable requirements - unordered list
                    $pref_query = "SELECT * FROM preferable WHERE ref_num='$ref_num'";
                    $pref_result = mysqli_query($dbconn, $pref_query);

                    if ($pref_result && mysqli_num_rows($pref_result) > 0) {
                        echo "<ul>";
                        while ($item = mysqli_fetch_assoc($pref_result)) {
                            echo "<li>" . htmlspecialchars($item['pref_item']) . "</li>";
                        }
                        echo "</ul>";
                    } else {
                        echo "<p>No prefereable requirements listed.</p>";
                    }
                    echo "<div><p class='button' ><a href='apply.php'/ style='color: #fff; text-decoration: none;'>Apply</a></p></div>";
                    echo "</section><br>";
                }
            } else {
                echo "<p>There are no jobs to display.</p>";
            }

            mysqli_close($dbconn);
        } else {
            echo "<p>Unable to connect to the database.</p>";
        }
        ?>
    </article>
</main>

<?php include 'footer.inc'; ?>