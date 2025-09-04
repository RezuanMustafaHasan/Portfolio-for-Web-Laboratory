<?php include __DIR__ . '/inc/head.php'; ?>
<main id="top" class="container">
  <section class="card">
    <h1>Blog</h1>
    <p>A collection of my thoughts, tutorials, and project showcases.</p>
  </section>

  <?php
  // Helper: truncate text by words
  function truncate_words($text, $limit = 60) {
    $text = trim((string)$text);
    if ($text === '') return '';
    $words = preg_split('/\s+/', $text);
    if (count($words) <= $limit) return $text;
    return implode(' ', array_slice($words, 0, $limit));
  }

  // Fetch blogs from the database
  $sql = "SELECT id, title, content, publish_date, image_url FROM blogs ORDER BY publish_date DESC";
  $result = $conn->query($sql);

  if ($result->num_rows > 0):
    while($row = $result->fetch_assoc()):
      $fullText = nl2br(htmlspecialchars($row["content"]));
      $excerptRaw = truncate_words($row["content"], 60);
      $excerptText = nl2br(htmlspecialchars($excerptRaw));
      $isTruncated = str_word_count($row["content"]) > 60;
  ?>
  <article class="blog-card" data-expanded="false">
    <?php if (!empty($row["image_url"])): ?>
      <img src="<?= $row["image_url"] ?>" alt="<?= htmlspecialchars($row["title"]) ?> post image" class="blog-card-img">
    <?php endif; ?>
    <div class="blog-card-content">
      <h3><a href="#"><?= htmlspecialchars($row["title"]) ?></a></h3>
      <p class="muted">Published on: <?= date("M d, Y", strtotime($row["publish_date"])) ?></p>
      <div class="excerpt"><p><?= $excerptText ?><?= $isTruncated ? '...' : '' ?></p></div>
      <div class="full" hidden><p><?= $fullText ?></p></div>
      <a href="#" class="btn read-toggle" aria-expanded="false">Read more</a>
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
