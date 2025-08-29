<?php
require_once 'auth_check.php';
require_once '../inc/config.php';

// Fetch all projects
$projects = [];
$sql = "SELECT id, name, language, updated_at FROM projects ORDER BY updated_at DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $projects[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Projects</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'nav.php'; ?>
    <main class="content">
        <div class="content-header">
            <h1>Manage Projects</h1>
        </div>

        <section class="card">
            <a href="add_project.php" class="btn">Add New Project</a>
        </section>

        <section class="card">
            <h2>Existing Projects</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Language</th>
                        <th>Last Updated</th>
                        <th class="actions">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($projects)): ?>
                        <tr>
                            <td colspan="4">No projects found.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($projects as $project): ?>
                            <tr>
                                <td><?= htmlspecialchars($project['name']) ?></td>
                                <td><?= htmlspecialchars($project['language']) ?></td>
                                <td><?= date("M d, Y", strtotime($project['updated_at'])) ?></td>
                                <td class="actions">
                                    <a href="edit_project.php?id=<?= $project['id'] ?>" class="btn">Edit</a>
                                    <a href="actions.php?action=delete_project&id=<?= $project['id'] ?>" class="btn danger" onclick="return confirm('Are you sure you want to delete this project?');">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>
