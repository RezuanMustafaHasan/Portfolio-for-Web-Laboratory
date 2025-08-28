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