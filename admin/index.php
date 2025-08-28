<?php
require_once 'auth_check.php';
require_once '../inc/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body { display: block; }
        .dashboard-container { padding: 30px; }
        .create-btn { display: inline-block; margin-bottom: 20px; padding: 10px 18px; background-color: #28a745; color: white; text-decoration: none; border-radius: 4px; font-weight: 600; }
        .create-btn:hover { background-color: #218838; }
        table { width: 100%; border-collapse: collapse; background: var(--card); box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
        th, td { padding: 12px 15px; border: 1px solid var(--border); text-align: left; }
        th { background-color: #f8f9fa; }
        .actions a { margin-right: 10px; text-decoration: none; }
        .actions a.edit { color: #ffc107; }
        .actions a.delete { color: var(--error); }
    </style>
</head>
<body>
    <?php include 'nav.php'; ?>
    <main class="dashboard-container">
        <h1>Manage Blogs</h1>
        <a href="create.php" class="create-btn">Create New Post</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Publish Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT id, title, publish_date FROM blogs ORDER BY publish_date DESC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0):
                    while($row = $result->fetch_assoc()):
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo date("M d, Y", strtotime($row['publish_date'])); ?></td>
                    <td class="actions">
                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="edit">Edit</a>
                        <a href="actions.php?action=delete&id=<?php echo $row['id']; ?>" class="delete" onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>
                    </td>
                </tr>
                <?php
                    endwhile;
                else:
                ?>
                <tr>
                    <td colspan="4" style="text-align:center;">No posts found.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
</body>
</html>
