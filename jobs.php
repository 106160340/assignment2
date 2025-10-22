<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial scale=1.0">
  <meta name="description" content="State University job ads" />
  <meta name="keywords"
    content="University, jobs, research, digital, computer science, technology, position, IT, application, salary package" />
  <meta name="author" content="State University HR team" />
  <!-- Update title field to your page accordingly, this title will be displayed on the browser tab -->
  <title>Jobs</title>
  <!-- References to external CSS files-->
  <link rel="stylesheet" type="text/css" href="styles/style.css" />
  <!-- References to external responsive CSS file -->
  <link href="styles/responsive.css" rel="stylesheet" media="screen and (max-width: 3840px)" />
  <style>
    /* Aside Styling */
    aside {
      border: 3px solid #8b4946;
      border-radius: 14px;
      margin: 3em;
      padding: 1em;
      width: 25%;
      float: right;
      box-shadow: 10px 10px 5px #aaaaaa;
      font-weight: bold;
    }

    /* Hovering effect for aside */
    aside:hover {
      transition: transform 0.5s;
      transform: translateY(-10px);
    }
  </style>
</head>

<body>
  <div class="heaader">
    <img src="images/logo.png" alt="State University logo" title="Logo" class="logo">

    <nav role="navigation">
      <ul id="nav_list">
        <li><a href="about.html">About</a></li>
        <li><a href="apply.html">Apply</a></li>
        <li><a href="jobs.html" aria-current="page">Jobs</a></li>
        <li><a href="index.html">Home</a></li>
      </ul>
    </nav>
  </div>

  <img src="images/university_1.jpg" alt="view of university campus. A tree in front of a building."
    title="State University" class="theme_image">
  <!-- main heading of the page -->
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

          echo "<section aria-labelledby='$title'>";
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

    <!-- Image (e-learning) -->
    <figure><img src="images/tinyelearn.jpg"
        alt="Photo of Digital Learning - a laptop displays e-learning on its screen."
        title="e-learning" id="deco-img"></figure>
  </article>
  <!-- Footer at end of page -->
  <footer>
    <p id="page_title">Job Listing Page</p>
    <p id="copyright">&#169; State University</p>
    <p id="slogan">Stronger Together</p>
  </footer>
</body>

</html>