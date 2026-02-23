<?php
include 'db.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM students WHERE id = ?";
    $pdo->prepare($sql)->execute([$id]);
}
header("Location: index.php");
?>