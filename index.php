<?php
session_start();

// Proteksi halaman, cek apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include 'db.php';

// Ambil data pasien dari database
$query = $conn->query("SELECT * FROM patients");
$patients = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Selamat datang, <?= $_SESSION['username']; ?></h1>
    <a href="logout.php" style="background-color: red; color: white;">Logout</a>
    <h1>Patients List</h1>
    <a href="create.php">Add New Patient</a>
    <a href="export_excel.php" style="background-color: blue; color: white;">Download Excel</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($patients as $patient): ?>
                <tr>
                    <td><?= $patient['id']; ?></td>
                    <td><?= $patient['name']; ?></td>
                    <td><?= $patient['age']; ?></td>
                    <td><?= $patient['gender']; ?></td>
                    <td><?= $patient['address']; ?></td>
                    <td><?= $patient['phone']; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $patient['id']; ?>">Edit</a>
                        <a href="delete.php?id=<?= $patient['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script src="scripts.js"></script>
</body>
</html>
