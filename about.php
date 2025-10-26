<!DOCTYPE html>
<html lang="en">

<!-- Header include -->
<?php include 'header.inc'; ?>

<!-- navigation include -->
<?php include 'nav.inc'; ?>

<!-- ================= Hero Image ================= -->
<img src="images/university_1.jpg" 
     alt="view of university campus. A tree in front of a building." 
     title="State University" 
     class="theme_image">

<!-- ================= Main Content ================= -->
<main id="main-content" role="main">

  <!-- Group Info Section -->
  <section id="group-info" aria-labelledby="group-title">
    <h1 id="group-title">Group Khichuri</h1>
    <p>Class Day/Time: Wednesday 12:30 pm</p>
  </section>

  <!-- Contributions Section (DYNAMIC) -->
  <section id="contributions" aria-labelledby="contributions-title">
    <h2 id="contributions-title">Group Contributions</h2>

    <?php
      // Connect to database
      include 'settingsabout.php';
      $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

      if (!$conn) {
          echo "<p>Database connection failed. Please check your settings.php.</p>";
      } else {
          $query = "SELECT * FROM about";
          $result = mysqli_query($conn, $query);

          if ($result && mysqli_num_rows($result) > 0) {
              echo "<dl>";
              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<dt>" . htmlspecialchars($row['full_name']) . " (" . htmlspecialchars($row['student_id']) . ")</dt>";
                  echo "<dd>" . htmlspecialchars($row['contribution']) . " Favourite language: " . htmlspecialchars($row['favourite_language']) . ".</dd>";
              }
              echo "</dl>";
          } else {
              echo "<p>No team data found in the database.</p>";
          }

          mysqli_close($conn);
      }
    ?>
  </section>

  <!-- Group Photo Section -->
  <section id="group-photo" aria-labelledby="team-title">
    <h2 id="team-title">Our Team</h2>
    <figure>
      <img src="images/groupimg.png" 
           alt="Group Khichuri team members collaborating on the Web Technology Project"
           loading="lazy">
      <figcaption>Team Khichuri collaborating on the Web Technology Project.</figcaption>
    </figure>
  </section>

  <!-- Fun Facts Section -->
  <section id="fun-facts" aria-labelledby="funfacts-title">
    <h2 id="funfacts-title">Fun Facts</h2>
    <table>
      <caption>Fun Facts About Team Khichuri</caption>
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Dream Job</th>
          <th scope="col">Favourite Coding Snack</th>
          <th scope="col">Hometown</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td scope="row">Yitian Yuan</td>
          <td>AI Research Scientist</td>
          <td>Green tea & biscuits</td>
          <td>Shanghai, China</td>
        </tr>
        <tr>
          <td scope="row">Ali Jawid, Behzad</td>
          <td>Cybersecurity Analyst</td>
          <td>Hot chips</td>
          <td>Kabul, Afghanistan</td>
        </tr>
        <tr>
          <td scope="row">Yousaff Mohammad</td>
          <td>Software Architect</td>
          <td>Pizza slices</td>
          <td>Dhaka, Bangladesh</td>
        </tr>
        <tr>
          <td scope="row">Ayon Ahammed</td>
          <td>Cloud Engineer</td>
          <td>Chocolate bars</td>
          <td>Sydney, Australia</td>
        </tr>
      </tbody>
    </table>
  </section>
</main>

<?php include 'footer.inc'; ?>
