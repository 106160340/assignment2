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
    <!-- Job Listing 1-->
    <section id="section_one" aria-labelledby="section_one_heading">
      <h2 id="section_one_heading">Digital Learning Support Officer</h2>
      <p><strong>Reference Number:</strong> DLS15</p>
      <p><strong>Salary:</strong> $70,000 per year plus Super</p>
      <p><strong>Reporting Line:</strong> Head of Digital Learning</p>
      <h3>Description</h3>
      <p>Provide support for online learning platforms. You are tasked with ensuring staff and students have constant
        access to digital tool, resources and effective training to ensure the teaching and learning experience is
        optimal.</p>
      <h3>Key Responsilbities</h3>
      <ul>
        <li>Assist University staff with creation and delivery of digital learning content</li>
        <li>Maintain and update online learning platforms</li>
        <li>Provide training to academic staff and students in learning online platforms</li>
      </ul>
      <h3>Essential requirements</h3>
      <ol>
        <li>Certificate IV in School Based Education Support or Certificate IV in Information Technology</li>
        <li>Experience with handling digital learning platforms like a Learning Management System</li>
        <li>Strong Communications skills paired with problem-solving skills</li>
      </ol>
      <h3>Preferable requirements</h3>
      <ul>
        <li>Coding skills using Python, HTML/CSS, Javascript and or in API</li>
        <li>Driver's Licence</li>
        <li>Microsoft Office Skills</li>
      </ul>
    </section>
    <!-- JOB Listing 2 -->
    <hr>
    <section id="section_two" aria-labelledby="section_two_heading">
      <h2 id="section_two_heading">Research Assistant</h2>
      <p><strong>Reference Number:</strong> RA025</p>
      <p><strong>Salary:</strong> $60,000 - $70,000 per year</p>
      <p><strong>Reporting Line:</strong> Senior Lecturer in Digital Education</p>
      <h3>Description</h3>
      <p id="description">Assist academic staff with any research projects relating to digital learning.<br>This involes
        gathering and analysing data, reviewing online learning content,<br>and providing support for preperation of
        digital learning content with research for needed material.</p>
      <h3>Key Responsilbities</h3>
      <ul>
        <li>Support academic staff with research activites</li>
        <li>Support with qualitative and quantitative data analysis</li>
        <li>Collect, filter and organize research data from various sources</li>
        <li>Assist with academic staff with creating and finalizing research reports</li>
      </ul>
      <h3>Essential requirements</h3>
      <ol>
        <li>Certificate IV in School Based Education Support or Certificate IV in Information Technology</li>
        <li>Experience with handling digital learning platforms like a Learning Management System</li>
        <li>Strong Communications skills paired with problem-solving skills</li>
        <li>Strong research methology knowledge</li>
      </ol>
      <h3>Preferable requirements</h3>
      <ul>
        <li>Bachelor's degree in Education, Information Technology or any other related fields</li>
        <li>Coding skills using Python, HTML/CSS, Javascript and or in API</li>
        <li>Driver's Licence</li>
        <li>Microsoft Office Skills</li>
        <li>Experience with data analysis software (SPSS Or R)</li>
      </ul>
    </section>
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