<?php include __DIR__ . '/inc/head.php'; ?>
<main id="top" class="container">
  <section class="card">
    <h1>Blog</h1>
    <p>A collection of my thoughts, tutorials, and project showcases.</p>
  </section>

  <?php
  // Fetch blogs from the database
  $sql = "SELECT id, title, content, publish_date, image_url FROM blogs ORDER BY publish_date DESC";
  $result = $conn->query($sql);

  if ($result->num_rows > 0):
    while($row = $result->fetch_assoc()):
  ?>
  <article class="blog-card">
    <?php if (!empty($row["image_url"])): ?>
      <img src="<?= $row["image_url"] ?>" alt="<?= htmlspecialchars($row["title"]) ?> post image" class="blog-card-img">
    <?php endif; ?>
    <div class="blog-card-content">
      <h3><a href="#"><?= htmlspecialchars($row["title"]) ?></a></h3>
      <p class="muted">Published on: <?= date("M d, Y", strtotime($row["publish_date"])) ?></p>
      <p><?= nl2br(htmlspecialchars(substr($row["content"], 0, 150))) ?>...</p>
      <a href="#" class="btn">Read more</a>
    </div>
  </article>
  <?php
    endwhile;
  else:
  ?>
  <section class="card">
    <p>No posts found.</p>
  </section>
  <?php endif; $conn->close(); ?>
</main>
<?php include __DIR__ . '/inc/foot.php'; ?>