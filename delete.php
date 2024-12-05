<?php
include 'db.php';

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM patients WHERE id = ?");
$stmt->execute([$id]);

header("Location: index.php");
?>
<link rel="stylesheet" href="styles.css">
<script src="scripts.js"></script>
