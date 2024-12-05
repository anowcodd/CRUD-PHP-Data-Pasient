<?php
session_start(); // Mulai sesi untuk login

include 'db.php'; // Koneksi ke database

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek apakah pengguna ada di database
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Verifikasi password menggunakan password_hash
        if (password_verify($password, $user['password'])) {
            // Set session untuk menyimpan informasi pengguna
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role']; // Menyimpan role (admin, user, dll.)

            // Arahkan pengguna ke halaman utama setelah login berhasil
            header("Location: index.php");
            exit;
        } else {
            echo "Password salah!";
        }
    } else {
        echo "Pengguna tidak ditemukan!";
    }
}
?>
