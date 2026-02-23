<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS - Modern Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #689be7 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        .navbar {
            background: rgba(35, 44, 45, 0.9) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0,0,0,0.1);
        }
        .card {
            border: none;
            border-radius: 15px;
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .btn-add {
            background: #4e73df;
            border-radius: 8px;
            padding: 8px 20px;
            transition: all 0.3s;
        }
        .btn-add:hover {
            background: #224abe;
            box-shadow: 0 4px 15px rgba(78, 115, 223, 0.4);
        }
        .table thead {
            background: #4e73df;
            color: white;
        }
        .badge-course {
            background: rgba(78, 115, 223, 0.1);
            color: #4e73df;
            border: 1px solid #4e73df;
            padding: 5px 12px;
            border-radius: 20px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-light sticky-top shadow-sm py-3">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="#">
            <i class="bi bi-rocket-takeoff-fill me-2"></i> SMS PORTAL
        </a>
    </div>
</nav>

<div class="container mt-5 px-4">
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h3 class="fw-bold text-dark mb-0">Student Management</h3>
            <p class="text-muted small">Manage your students data efficiently</p>
        </div>
        <div class="col-auto">
            <a href="add.php" class="btn btn-primary btn-add shadow-sm border-0">
                <i class="bi bi-plus-circle me-2"></i>New Registration
            </a>
        </div>
    </div>

    <div class="card shadow-lg border-0">
        <div class="card-body p-0">
            <table class="table table-borderless table-hover mb-0">
                <thead>
                    <tr>
                        <th class="py-3 ps-4">STUDENT NAME</th>
                        <th class="py-3">EMAIL ADDRESS</th>
                        <th class="py-3">ENROLLED COURSE</th>
                        <th class="py-3 text-center">ACTION</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <?php
                    $stmt = $pdo->query("SELECT * FROM students ORDER BY id DESC");
                    while ($row = $stmt->fetch()) {
                        echo "<tr class='align-middle border-bottom'>
                            <td class='ps-4 py-3 fw-semibold'>{$row['name']}</td>
                            <td class='text-muted'>{$row['email']}</td>
                            <td><span class='badge-course'>{$row['course']}</span></td>
                            <td class='text-center'>
                                <a href='edit.php?id={$row['id']}' class='text-warning me-3'><i class='bi bi-pencil-fill'></i></a>
                                <a href='delete.php?id={$row['id']}' class='text-danger' onclick='return confirm(\"Are you sure to delete this?\")'><i class='bi bi-trash3-fill'></i></a>
                            </td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>