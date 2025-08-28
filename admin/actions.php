<?php
require_once 'auth_check.php';
require_once '../inc/config.php';

$action = $_REQUEST['action'] ?? null;

switch ($action) {
    case 'create':
        $title = trim($_POST['title'] ?? '');
        $content = trim($_POST['content'] ?? '');
        $publish_date = trim($_POST['publish_date'] ?? '');
        $image_url = trim($_POST['image_url'] ?? '');

        if ($title && $content && $publish_date) {
            $stmt = $conn->prepare("INSERT INTO blogs (title, content, publish_date, image_url) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $title, $content, $publish_date, $image_url);
            $stmt->execute();
        }
        header('Location: index.php');
        exit;

    default:
        header('Location: index.php');
        exit;
}
?>