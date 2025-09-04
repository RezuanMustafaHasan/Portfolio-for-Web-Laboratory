
<?php include __DIR__ . '/inc/head.php'; ?>
<main id="top" class="container">
  <section class="hero card">
    <div class="hero-content">
      <div class="hero-text">
        <h1><?= htmlspecialchars($PROFILE["name"]) ?></h1>
        <p class="role"><?= htmlspecialchars($PROFILE["role"]) ?></p>
        <p class="tagline"><?= htmlspecialchars($PROFILE["tagline"]) ?></p>
        <div class="cta">
          <a class="btn primary" href="#projects">View Projects</a>
          <a class="btn" href="<?= htmlspecialchars($PROFILE["github_url"]) ?>" target="_blank" rel="noopener">GitHub</a>
          <a class="btn" href="<?= htmlspecialchars($PROFILE["linkedin_url"]) ?>" target="_blank" rel="noopener">LinkedIn</a>
        </div>
        <div class="stats-container">
          <div class="stat">
            <span>400+</span>
            <small>Algorithm problems solved</small>
          </div>
          <div class="stat">
            <span>3.42</span>
            <small>CGPA</small>
          </div>
        </div>
      </div>
    </div>
    <div class="hero-image">
      <img src="image.jpg" alt="Profile Picture" class="circular-image">
    </div>
  </section>

<section id="about" class="grid two card">
  <div>
    <h2>About</h2>
    <p>I’m a Computer Science undergrad at KUET, focusing on building reliable, useful software. I enjoy full‑stack development (Node/Express/Mongo) and keep sharpening my problem‑solving skills through competitive programming.</p>
    <p>Currently exploring React on the frontend and improving at system design and testing. I like to ship simple, maintainable solutions.</p>
  </div>
  <div class="meta">
    <ul class="list">
      <li><strong>Location:</strong> <?= htmlspecialchars($PROFILE["location"]) ?></li>
      <li><strong>Email:</strong> <a href="mailto:<?= htmlspecialchars($PROFILE["email"]) ?>"><?= htmlspecialchars($PROFILE["email"]) ?></a></li>
      <li><strong>Phone:</strong> <?= htmlspecialchars($PROFILE["phone"]) ?></li>
      <li><strong>GitHub:</strong> <a target="_blank" rel="noopener" href="<?= htmlspecialchars($PROFILE["github_url"]) ?>"><?= htmlspecialchars($PROFILE["github_user"]) ?></a></li>
      <li><strong>LinkedIn:</strong> <a target="_blank" rel="noopener" href="<?= htmlspecialchars($PROFILE["linkedin_url"]) ?>">Profile</a></li>
    </ul>
  </div>
</section>

<section id="skills" class="card">
  <h2>Skills</h2>
  <div class="chips">
    <?php
    // Fetch skills from the database
    $skills_from_db = [];
    $sql = "SELECT name, category FROM skills ORDER BY category, id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $skills_from_db[$row['category']][] = $row['name'];
      }
    }

    foreach ($skills_from_db as $group => $items):
    ?>
      <div class="skill-group">
        <h3><?= htmlspecialchars($group) ?></h3>
        <div class="chip-row">
          <?php foreach ($items as $skill): ?>
            <span class="chip"><?= htmlspecialchars($skill) ?></span>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<section id="projects" class="card">
  <h2>Projects</h2>
  <div class="projects">
    <?php
    $sql_projects = "SELECT * FROM projects ORDER BY updated_at DESC";
    $result_projects = $conn->query($sql_projects);
    $projects = [];
    if ($result_projects->num_rows > 0) {
      while($row = $result_projects->fetch_assoc()) {
        $projects[] = $row;
      }
    }

    foreach ($projects as $r):
    ?>
      <a class="project" href="<?= htmlspecialchars($r["html_url"]) ?>" target="_blank" rel="noopener">
        <div class="project-head">
          <h3><?= htmlspecialchars($r["name"]) ?></h3>
          <span class="lang"><?= htmlspecialchars($r["language"] ?: "Tech") ?></span>
        </div>
        <p class="desc"><?= htmlspecialchars($r["description"] ?: "No description yet.") ?></p>
        <div class="meta">
          <span>★ <?= (int)($r["stargazers_count"] ?? 0) ?></span>
          <span><?= date("M d, Y", strtotime($r["updated_at"] ?? "now")) ?></span>
        </div>
      </a>
    <?php endforeach; ?>
  </div>
  <p class="more"><a class="btn" target="_blank" rel="noopener" href="<?= htmlspecialchars($PROFILE["github_url"]) ?>">See all on GitHub →</a></p>
</section>

<section id="resume" class="card">
  <h2>Resume</h2>
  <p>Download my latest CV or preview it below.</p>
  <div class="resume-actions">
    <a class="btn primary" href="<?= htmlspecialchars($PROFILE["resume_path"]) ?>" download>Download CV</a>
    <a class="btn" href="<?= htmlspecialchars($PROFILE["resume_path"]) ?>" target="_blank" rel="noopener">Open in new tab</a>
  </div>
  <div class="resume-embed">
    <?php if (file_exists($PROFILE["resume_path"])): ?>
      <object data="<?= htmlspecialchars($PROFILE["resume_path"]) ?>" type="application/pdf" width="100%" height="600">
        <p>PDF preview unavailable. <a href="<?= htmlspecialchars($PROFILE["resume_path"]) ?>">Download CV</a></p>
      </object>
    <?php else: ?>
      <p class="muted">Resume file not found. Place your PDF at <code><?= htmlspecialchars($PROFILE["resume_path"]) ?></code>.</p>
    <?php endif; ?>
  </div>
</section>

<section id="contact" class="card">
  <h2>Contact</h2>
  <form class="contact" method="post" action="#contact">
    <div class="grid two">
      <label> Name
        <input required name="name" placeholder="Your name"/>
      </label>
      <label> Email
        <input required type="email" name="email" placeholder="you@example.com"/>
      </label>
    </div>
    <label> Message
      <textarea required name="message" placeholder="How can I help?"></textarea>
    </label>
    <button class="btn primary">Send</button>
    </form>
</section>
</main>
<?php include __DIR__ . '/inc/foot.php'; ?>