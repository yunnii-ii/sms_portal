<?php
include 'db.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM students WHERE id = ?");
$stmt->execute([$id]);
$student = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $sql = "UPDATE students SET name=?, email=?, course=? WHERE id=?";
    $pdo->prepare($sql)->execute([$name, $email, $course, $id]);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0">
                <div class="card-body p-4">
                    <h4 class="mb-4">Edit Student Information</h4>
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="<?= $student['name'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="<?= $student['email'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Course</label>
                            <input type="text" name="course" class="form-control" value="<?= $student['course'] ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Update Now</button>
                        <a href="index.php" class="btn btn-link w-100 mt-2 text-decoration-none text-muted">Back to List</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>