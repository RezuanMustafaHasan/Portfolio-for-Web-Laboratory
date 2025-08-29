<?php
require_once 'auth_check.php';
require_once '../inc/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Project</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'nav.php'; ?>
    <main class="content">
        <div class="content-header">
            <h1>Add New Project</h1>
        </div>

        <section class="card">
            <form action="actions.php" method="post">
                <input type="hidden" name="action" value="add_project">

                <label for="name">Project Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="html_url">Project URL:</label>
                <input type="text" id="html_url" name="html_url" required>

                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4"></textarea>

                <label for="language">Language:</label>
                <input type="text" id="language" name="language">

                <label for="stargazers_count">Star Count:</label>
                <input type="number" id="stargazers_count" name="stargazers_count" value="0">

                <label for="updated_at">Last Updated:</label>
                <input type="datetime-local" id="updated_at" name="updated_at" required>

                <button type="submit" class="btn">Add Project</button>
            </form>
        </section>
    </main>
</body>
</html>
