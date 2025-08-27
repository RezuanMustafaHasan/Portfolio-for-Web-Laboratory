
<?php include __DIR__ . '/inc/head.php'; ?>
<main id="top" class="container">
  <section class="hero card">
    <div class="hero-text">
      <h1><?= htmlspecialchars($PROFILE["name"]) ?></h1>
      <p class="role"><?= htmlspecialchars($PROFILE["role"]) ?></p>
      <p class="tagline"><?= htmlspecialchars($PROFILE["tagline"]) ?></p>
      <div class="cta">
        <a class="btn primary" href="#projects">View Projects</a>
        <a class="btn" href="<?= htmlspecialchars($PROFILE["github_url"]) ?>" target="_blank" rel="noopener">GitHub</a>
        <a class="btn" href="<?= htmlspecialchars($PROFILE["linkedin_url"]) ?>" target="_blank" rel="noopener">LinkedIn</a>
      </div>
    </div>
    <div class="hero-aside">
      <div class="stat">
        <span>400+</span>
        <small>Algorithm problems solved</small>
      </div>
      <div class="stat">
        <span>3.42</span>
        <small>CGPA</small>
      </div>
    </div>
  </section>
</main>
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
    <?php foreach ($SKILLS as $group => $items): ?>
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
    <!-- <?//php foreach ($repos as $r): ?> -->
    <?php foreach ($PROJECT_FALLBACKS as $r): ?>
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
    <p class="muted">This form uses PHP <code>mail()</code>. Configure SMTP or replace with a service like Formspree if needed.</p>
  </form>
  <?php
  // Minimal mail handler (optional; may require server SMTP setup)
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $n = trim($_POST['name'] ?? '');
    $e = trim($_POST['email'] ?? '');
    $m = trim($_POST['message'] ?? '');
    if ($n && $e && $m) {
      $to = $PROFILE['email'];
      $subject = "Portfolio contact from {$n}";
      $headers = "From: {$n} <{$e}>\r\nReply-To: {$e}\r\n";
      @mail($to, $subject, $m, $headers);
      echo '<p class="success">Thanks! Your message was sent (if mail is configured).</p>';
    } else {
      echo '<p class="error">Please fill in all fields.</p>';
    }
  }
  ?>
</section>

<?php include __DIR__ . '/inc/foot.php'; ?>