<?php
// ---------- Basic Profile Config ----------
$PROFILE = [
  "name" => "Rezuan Mustafa Hasan",
  "role" => "CS Undergrad • Full‑Stack & Problem Solving",
  "tagline" => "I build practical products and love efficient code.",
  "email" => "hasanideal2002@gmail.com",
  "phone" => "(+880) 1748855331",
  "location" => "Bangladesh",
  "github_user" => "RezuanMustafaHasan",
  "github_url" => "https://github.com/RezuanMustafaHasan",
  "linkedin_url" => "https://www.linkedin.com/in/rezuan-mustafa-hasan-ab0ab9242/",
  "resume_path" => "assets/cv.pdf"
];




// ---------- Featured Projects (fallback when GitHub API is unavailable) ----------
$PROJECT_FALLBACKS = [
  [
    "name" => "Airbnb Clone (MERN)",
    "html_url" => "https://github.com/{$PROFILE["github_user"]}",
    "description" => "Backend‑focused clone with Node, Express, MongoDB and REST APIs.",
    "language" => "JavaScript",
    "stargazers_count" => 0,
    "updated_at" => "2025-01-01T00:00:00Z"
  ],
  [
    "name" => "SME Ecommerce Platform (MERN)",
    "html_url" => "https://github.com/{$PROFILE["github_user"]}",
    "description" => "Server‑side features for small business ecommerce; auth, products, orders.",
    "language" => "JavaScript",
    "stargazers_count" => 0,
    "updated_at" => "2025-01-01T00:00:00Z"
  ],
  [
    "name" => "Spotify Landing Page Clone",
    "html_url" => "https://github.com/{$PROFILE["github_user"]}",
    "description" => "Pure HTML/CSS UI clone to practice layout and responsiveness.",
    "language" => "HTML",
    "stargazers_count" => 0,
    "updated_at" => "2025-01-01T00:00:00Z"
  ],
  [
    "name" => "Stock Trading Desktop App (JavaFX)",
    "html_url" => "https://github.com/{$PROFILE["github_user"]}",
    "description" => "Simulated trading with portfolio view; mock live prices.",
    "language" => "Java",
    "stargazers_count" => 0,
    "updated_at" => "2025-01-01T00:00:00Z"
  ]
];

// ---------- Database Config ----------
$DB_HOST = "localhost";
$DB_USER = "root";
$DB_PASS = ""; 
$DB_NAME = "portfolio";

// Create connection
$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>