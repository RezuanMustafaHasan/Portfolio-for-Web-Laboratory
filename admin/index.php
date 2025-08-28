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
    
</body>
</html>
