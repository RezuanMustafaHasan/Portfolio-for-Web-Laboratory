<?php
require_once 'auth_check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Post</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'nav.php'; ?>
    <main class="form-container">
        <h1>Create New Post</h1>
        <form action="actions.php" method="post">
            <input type="hidden" name="action" value="create">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" required></textarea>
            </div>
            <div class="form-group">
                <label for="publish_date">Publish Date</label>
                <input type="date" name="publish_date" id="publish_date" value="<?php echo date('Y-m-d'); ?>" required>
            </div>
            <div class="form-group">
                <label for="image_url">Image URL</label>
                <input type="url" name="image_url" id="image_url" placeholder="https://example.com/image.jpg">
            </div>
            <div class="form-group">
                <button type="submit" class="btn">Create Post</button>
                <a href="index.php" class="btn">Cancel</a>
            </div>
        </form>
    </main>
</body>
</html>
