<?php require_once __DIR__ . '/config.php'; ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title><?= htmlspecialchars($PROFILE["name"]) ?> — Portfolio</title>
  <meta name="description" content="Portfolio of <?= htmlspecialchars($PROFILE["name"]) ?>: projects, skills, resume, and contact."/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/style.css"/>
  <script defer src="assets/script.js"></script>
</head>
<body>
<header class="site-header">
  <nav class="nav container">
    <a class="brand" href="/portfolio-for-web-laboratory/"><?= htmlspecialchars($PROFILE["name"]) ?></a>
    <button class="nav-toggle" aria-label="Toggle menu">☰</button>
    <ul class="menu">
      <li><a href="#about">About</a></li>
      <li><a href="#skills">Skills</a></li>
      <li><a href="#projects">Projects</a></li>
      <li><a href="#resume">Resume</a></li>
      <li><a href="/portfolio-for-web-laboratory/blog.php">Blog</a></li>
      <li><a href="#contact">Contact</a></li>
      <li><button id="themeToggle" class="theme-toggle" title="Toggle dark mode">🌓</button></li>
    </ul>
  </nav>
</header>


