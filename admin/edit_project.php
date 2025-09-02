<?php
require_once 'auth_check.php';
require_once '../inc/config.php';

$project_id = (int)($_GET['id'] ?? 0);
if (!$project_id) {
    header('Location: projects.php');
    exit;
}

// Fetch the project details
$stmt = $conn->prepare("SELECT * FROM projects WHERE id = ?");
$stmt->bind_param("i", $project_id);
$stmt->execute();
$result = $stmt->get_result();
$project = $result->fetch_assoc();

if (!$project) {
    header('Location: projects.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'nav.php'; ?>
    <main class="content">
        <div class="content-header">
            <h1>Edit Project</h1>
        </div>

        <section class="card">
            <form action="actions.php" method="post">
                <input type="hidden" name="action" value="update_project">
                <input type="hidden" name="id" value="<?= $project['id'] ?>">

                <div class="form-group">
                    <label for="name">Project Name:</label>
                    <input type="text" id="name" name="name" value="<?= htmlspecialchars($project['name']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="html_url">Project URL:</label>
                    <input type="text" id="html_url" name="html_url" value="<?= htmlspecialchars($project['html_url']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="4"><?= htmlspecialchars($project['description']) ?></textarea>
                </div>

                <div class="form-group">
                    <label for="language">Language:</label>
                    <input type="text" id="language" name="language" value="<?= htmlspecialchars($project['language']) ?>">
                </div>

                <div class="form-group">
                    <label for="stargazers_count">Star Count:</label>
                    <input type="number" id="stargazers_count" name="stargazers_count" value="<?= (int)$project['stargazers_count'] ?>">
                </div>

                <div class="form-group">
                    <label for="updated_at">Last Updated:</label>
                    <input type="datetime-local" id="updated_at" name="updated_at" value="<?= date('Y-m-d\TH:i', strtotime($project['updated_at'])) ?>" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn">Update Project</button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>
