<?php
require_once 'auth_check.php';
require_once '../inc/config.php';

// Check if ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$post_id = intval($_GET['id']);
$post = null;

// Fetch the post from the database
$sql = "SELECT id, title, content, publish_date, image_url FROM blogs WHERE id = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $post_id);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $post = $result->fetch_assoc();
        } else {
            // No post found with that ID
            header("Location: index.php");
            exit;
        }
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body { display: block; }
        .form-container { max-width: 800px; margin: 30px auto; padding: 30px; background: var(--card); border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
        textarea { min-height: 250px; resize: vertical; }
    </style>
</head>
<body>
    <?php include 'nav.php'; ?>
    <main class="form-container">
        <h1>Edit Post</h1>
        <form action="actions.php" method="post">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" value="<?php echo $post['id']; ?>">

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($post['title']); ?>" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" required><?php echo htmlspecialchars($post['content']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="publish_date">Publish Date</label>
                <input type="date" name="publish_date" id="publish_date" value="<?php echo htmlspecialchars($post['publish_date']); ?>" required>
            </div>
            <div class="form-group">
                <label for="image_url">Image URL</label>
                <input type="url" name="image_url" id="image_url" value="<?php echo htmlspecialchars($post['image_url']); ?>" placeholder="https://example.com/image.jpg">
            </div>
            <div class="form-group">
                <button type="submit" class="btn">Update Post</button>
                <a href="index.php" style="display:inline-block; margin-left: 10px; text-align:center;">Cancel</a>
            </div>
        </form>
    </main>
</body>
</html>
