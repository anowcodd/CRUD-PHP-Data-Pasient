<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $stmt = $conn->prepare("INSERT INTO patients (name, age, gender, address, phone) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$name, $age, $gender, $address, $phone]);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Add New Patient</h1>
    <form method="POST">
        <label>Name:</label><br>
        <input type="text" name="name" required><br>
        <label>Age:</label><br>
        <input type="number" name="age" required><br>
        <label>Gender:</label><br>
        <select name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select><br>
        <label>Address:</label><br>
        <textarea name="address" required></textarea><br>
        <label>Phone:</label><br>
        <input type="text" name="phone" required><br>
        <button type="submit">Add</button>
    </form>
    <script src="scripts.js"></script>
</body>
</html>
