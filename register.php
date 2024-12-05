<!-- register.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="register-container">
        <h2>Daftar</h2>
        <form action="register_process.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required><br><br>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br><br>

            <label for="confirm_password">Konfirmasi Password:</label>
            <input type="password" name="confirm_password" id="confirm_password" required><br><br>

            <button type="submit" name="register">Daftar</button>
        </form>
        <p>Sudah punya akun? <a href="login.php">Login</a></p>
    </div>
    <script src="scripts.js"></script>
</body>
</html>
