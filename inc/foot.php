</main>
<footer class="site-footer">
  <div class="container footer-inner">
    <div>&copy; <span id="year"></span> <?= htmlspecialchars($PROFILE["name"]) ?>. All rights reserved.</div>
    <div class="links">
      <a href="<?= htmlspecialchars($PROFILE["github_url"]) ?>" target="_blank" rel="noopener" aria-label="GitHub">GitHub</a>
      <a href="<?= htmlspecialchars($PROFILE["linkedin_url"]) ?>" target="_blank" rel="noopener" aria-label="LinkedIn">LinkedIn</a>
      <a href="mailto:<?= htmlspecialchars($PROFILE["email"]) ?>" aria-label="Email">Email</a>
    </div>
  </div>
</footer>
</body>
</html>
