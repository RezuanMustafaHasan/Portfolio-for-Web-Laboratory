<?php
require_once 'auth_check.php';
require_once '../inc/config.php';

$action = $_REQUEST['action'] ?? null;

switch ($action) {
    case 'add_skill':
        $name = trim($_POST['name'] ?? '');
        $category = trim($_POST['category'] ?? '');
        if ($name && $category) {
            $stmt = $conn->prepare("INSERT INTO skills (name, category) VALUES (?, ?)");
            $stmt->bind_param("ss", $name, $category);
            $stmt->execute();
        }
        header('Location: edit_skills.php');
        exit;

    case 'delete_skill':
        $id = (int)($_GET['id'] ?? 0);
        if ($id) {
            $stmt = $conn->prepare("DELETE FROM skills WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
        }
        header('Location: edit_skills.php');
        exit;

    case 'update_skill':
        $id = (int)($_POST['id'] ?? 0);
        $name = trim($_POST['name'] ?? '');
        $category = trim($_POST['category'] ?? '');
        if ($id && $name && $category) {
            $stmt = $conn->prepare("UPDATE skills SET name = ?, category = ? WHERE id = ?");
            $stmt->bind_param("ssi", $name, $category, $id);
            $stmt->execute();
        }
        header('Location: edit_skills.php');
        exit;
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
    case 'update':
        $id = (int)($_POST['id'] ?? 0);
        $title = trim($_POST['title'] ?? '');
        $content = trim($_POST['content'] ?? '');
        $publish_date = trim($_POST['publish_date'] ?? '');
        $image_url = trim($_POST['image_url'] ?? '');

        if ($id && $title && $content && $publish_date) {
            $stmt = $conn->prepare("UPDATE blogs SET title = ?, content = ?, publish_date = ?, image_url = ? WHERE id = ?");
            $stmt->bind_param("ssssi", $title, $content, $publish_date, $image_url, $id);
            $stmt->execute();
        }
        header('Location: index.php');
        exit;

    default:
        header('Location: index.php');
        exit;
}
?>