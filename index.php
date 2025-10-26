<!DOCTYPE html>
<html lang="en">

<!-- Header include -->
<?php include 'header.inc'; ?>

<!-- Navigation include -->
<?php include 'nav.inc'; ?>

<body>
  <!-- ================= Hero Image ================= -->
  <img src="images/university_1.jpg" 
       alt="View of university campus. A tree in front of a building." 
       title="State University" 
       class="theme_image" 
       style="width: 100%; height: auto; display: block; margin-bottom: 2rem;">

  <!-- ================= Main Content ================= -->
  <main id="main-content" role="main" style="max-width: 1200px; margin: 0 auto; padding: 0 1rem;">
    <article id="main">

      <h1 style="text-align: center; margin-bottom: 2rem;">Welcome to State University</h1>

      <!-- Section 1: Introduction -->
      <section class="cards_container" aria-labelledby="welcome" style="margin-bottom: 2rem;">
        <h2 id="welcome" style="margin-bottom: 1rem;">State University</h2>
        <p style="line-height: 1.6;">
          State University is a leading institution dedicated to fostering academic excellence, innovation, and
          community engagement. Our diverse campus community promotes intellectual curiosity and critical thinking,
          preparing students to thrive as leaders in a rapidly evolving world. With a wide range of programs across
          science, technology, business, and the arts, we empower the next generation of change-makers through
          cutting-edge research, hands-on learning, and a commitment to social responsibility.
        </p>
      </section>

      <!-- Section 2: Department -->
      <section class="cards_container" aria-labelledby="department" style="display: grid; grid-template-columns: 1fr 2fr; gap: 2rem; margin-bottom: 2rem;">
        <div class="card_left">
          <h2 id="department">Department of Digital Learning & Research</h2>
        </div>
        <div class="card_right">
          <p style="line-height: 1.6;">
            The Department of Digital Learning & Research at State University is dedicated to advancing education
            through innovation and technology. Our mission is to provide cutting-edge digital platforms, research
            opportunities, and learning tools that enhance the way students learn and teachers teach. We work closely
            with faculty, researchers, and industry partners to integrate modern technologies into academic practice,
            ensuring that education remains relevant and impactful in a rapidly changing world.
          </p>
          <p style="line-height: 1.6;">
            Through our initiatives, we aim to create engaging, accessible, and inclusive learning environments that
            prepare students for success beyond the classroom. By combining academic expertise with practical digital
            solutions, our department serves as a hub for innovation, collaboration, and knowledge-sharing. We are
            committed to shaping the future of education by bridging the gap between research, technology, and learning.
          </p>
        </div>
      </section>

      <!-- Section 3: Achievements -->
      <section class="cards_container" aria-labelledby="achievements" style="display: grid; grid-template-columns: 1fr 2fr; gap: 2rem; margin-bottom: 2rem;">
        <div class="card_left">
          <h2 id="achievements">Achievements</h2>
        </div>
        <div class="card_right">
          <p>So far we've:</p>
          <ol id="achievements_home" style="padding-left: 1.2rem; line-height: 1.6;">
            <li>Launched State University's first digital learning platform.</li>
            <li>Partnered up with industry leaders.</li>
            <li>Secured national and international research programs with grants.</li>
            <li>Pioneered the integration of virtual reality and simulations.</li>
          </ol>
          <p><strong>+ more on their way.</strong></p>
        </div>
      </section>

      <!-- Section 4: Slogan -->
      <section class="cards_container" aria-labelledby="slogan" style="grid-template-columns: 1fr; text-align: center; margin-bottom: 2rem;">
        <h2 id="slogan" style="font-size: 1.5rem;">
          Our Slogan is <em>"Stronger Together"</em>, just as we are!
        </h2>
      </section>

    </article>

    <!-- Closing Image -->
    <img src="images/university.jpg" 
         alt="View of university campus. Blossom trees." 
         title="State University" 
         class="theme_image" 
         style="width: 100%; height: auto; display: block; margin-top: 2rem;">
  </main>

  <!-- Footer include -->
  <?php include 'footer.inc'; ?>
</body>
</html>