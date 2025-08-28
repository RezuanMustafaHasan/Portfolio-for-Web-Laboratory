<nav class="admin-nav">
    <div class="nav-left">
        <a href="index.php" class="brand">Admin Panel</a>
        <ul class="nav-menu">
            <li><a href="index.php">Manage Blogs</a></li>
            <li><a href="edit_skills.php">Edit Skills</a></li>
            <li><a href="edit_projects.php">Edit Projects</a></li>
        </ul>
    </div>
    <div class="nav-right">
        <span class="welcome">Welcome, <strong><?= htmlspecialchars($_SESSION["admin_username"]); ?></strong></span>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</nav>
<div class="admin-container">
    <div class="admin-content">
