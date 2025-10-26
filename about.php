<?php include 'header.inc'; ?>
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

  <!-- Contributions Section -->
  <section id="contributions" aria-labelledby="contributions-title">
    <h2 id="contributions-title">Group Contributions</h2>
    <dl>
      <dt>Yitian Yuan (106160340)</dt>
      <dd>
        Took responsibility for the job application form on <code>apply.html</code>.
        This included building the form structure, applying HTML5 validation rules
        for each input (like reference numbers, email, and phone numbers), and ensuring
        accessibility with proper labels and fieldsets. Also tested the form thoroughly
        to make sure it integrates with <code>formtest.php</code>. Favourite language:
        Python – "<em lang="zh">编程的艺术</em>" (The art of coding).
      </dd>

      <dt>Ali Jawid, Behzad (106188559)</dt>
      <dd>
        Designed and structured the <code>about.html</code> page, ensuring that semantic
        HTML elements like <code>&lt;dl&gt;</code>, <code>&lt;figure&gt;</code>, and
        <code>&lt;table&gt;</code> were used correctly. Also worked on unifying the
        navigation bar across all pages and assisted in CSS simplification for clarity
        and responsiveness. Favourite language: Java – "<em lang="ps">زبان قوی برای ساختار</em>"
        (A strong language for structure).
      </dd>

      <dt>Yousaff Mohammad (106175315)</dt>
      <dd>
        Led the development of the <code>jobs.html</code> page. Created realistic and
        industry-appropriate job postings, applied semantic HTML with lists and headings,
        and styled the <code>&lt;aside&gt;</code> section as per requirements. Focused on
        clarity and readability of job descriptions. Favourite language: C++ –
        "<em lang="ar">البرمجة عالية الأداء</em>" (High performance programming).
      </dd>

      <dt>Ayon Ahammed (105962794)</dt>
      <dd>
        Built the <code>index.html</code> home page, including the hero image and
        company overview. Developed the main navigation and footer design. Worked on
        deploying the site with GitHub Pages and ensuring the overall branding and
        layout matched the project brief. Favourite language: JavaScript –
        "<em lang="bn">প্রযুক্তির ভাষা</em>" (The language of interactivity).
      </dd>
    </dl>
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
