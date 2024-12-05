<?php
include 'db.php';

$id = $_GET['id'];
$query = $conn->prepare("SELECT * FROM patients WHERE id = ?");
$query->execute([$id]);
$patient = $query->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $stmt = $conn->prepare("UPDATE patients SET name = ?, age = ?, gender = ?, address = ?, phone = ? WHERE id = ?");
    $stmt->execute([$name, $age, $gender, $address, $phone, $id]);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Patient</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Edit Patient</h1>
    <form method="POST">
        <label>Name:</label><br>
        <input type="text" name="name" value="<?= $patient['name']; ?>" required><br>
        <label>Age:</label><br>
        <input type="number" name="age" value="<?= $patient['age']; ?>" required><br>
        <label>Gender:</label><br>
        <select name="gender" required>
            <option value="Male" <?= $patient['gender'] == 'Male' ? 'selected' : ''; ?>>Male</option>
            <option value="Female" <?= $patient['gender'] == 'Female' ? 'selected' : ''; ?>>Female</option>
        </select><br>
        <label>Address:</label><br>
        <textarea name="address" required><?= $patient['address']; ?></textarea><br>
        <label>Phone:</label><br>
        <input type="text" name="phone" value="<?= $patient['phone']; ?>" required><br>
        <button type="submit">Update</button>
    </form>
    <script src="scripts.js"></script>
</body>
</html>
