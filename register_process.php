<?php
// register_process.php
include 'db.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Cek apakah password dan konfirmasi password cocok
    if ($password !== $confirm_password) {
        echo "Password tidak cocok!";
        exit;
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Simpan pengguna baru ke database
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->execute();

    echo "Pendaftaran berhasil! <a href='login.php'>Login</a>";
}
?>
