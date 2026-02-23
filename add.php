<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    // SQL Injection  Prepared Statements 
    $sql = "INSERT INTO students (name, email, phone, course) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $email, $phone, $course]);

    header("Location: index.php");
    } //  index 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <div class="card shadow p-4">
        <h3>Add New Student</h3>
        <form method="POST">
            <div class="mb-3">
                <label>Full Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control">
            </div>
            <div class="mb-3">
                <label>Course</label>
                <input type="text" name="course" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Save Student</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>