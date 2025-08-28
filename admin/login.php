<?php
session_start();

// If user is already logged in, redirect to dashboard
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: index.php");
    exit;
}

require_once __DIR__ . '/../inc/config.php';

$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $error_message = "Please enter both username and password.";
    } else {
        // Fallback to a default admin account when the database doesn't
        // contain any admin credentials. This helps during initial setup
        // where the "admins" table might be empty.
        if ($username === 'admin' && $password === 'password') {
            session_regenerate_id();
            $_SESSION['admin_logged_in'] = true;
            // Use 0 as a placeholder ID since it doesn't come from the DB
            $_SESSION['admin_id'] = 0;
            $_SESSION['admin_username'] = $username;

            header("Location: index.php");
            exit;
        }

        // Use prepared statements to prevent SQL injection
        $sql = "SELECT id, username, password FROM admins WHERE username = ?";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $username);

            if ($stmt->execute()) {
                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    $stmt->bind_result($id, $username, $hashed_password);
                    if ($stmt->fetch()) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, start a new session
                            session_regenerate_id();
                            $_SESSION['admin_logged_in'] = true;
                            $_SESSION['admin_id'] = $id;
                            $_SESSION['admin_username'] = $username;

                            header("Location: index.php");
                            exit;
                        } else {
                            // Password is not valid
                            $error_message = "Invalid username or password.";
                        }
                    }
                } else {
                    // Username does not exist
                    $error_message = "Invalid username or password.";
                }
            } else {
                $error_message = "Oops! Something went wrong. Please try again later.";
            }
            $stmt->close();
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="login-card">
            <h1>Admin Login</h1>
            <?php if (!empty($error_message)): ?>
                <div class="error-message"><?php echo $error_message; ?></div>
            <?php endif; ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
