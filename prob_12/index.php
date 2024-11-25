<!-- student_app/
├── index.php          (Listing students and adding form)
├── process.php        (Handles add and delete operations)
├── db.php             (Database connection)
├── styles.css         (Custom styles)
├── validation.js  (Form validation)
└── bootstrap/         (Bootstrap files if not using CDN)
 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Student Management System</h1>

    <!-- Add Student Form -->
    <div class="card mt-4">
        <div class="card-header">Add Student</div>
        <div class="card-body">
            <form action="process.php" method="POST" id="studentForm" onsubmit="return validateForm()">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control">
                </div>
                <button type="submit" name="add" class="btn btn-primary">Add Student</button>
            </form>
        </div>
    </div>

    <!-- List Students -->
    <div class="card mt-4">
        <div class="card-header">Student Records</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'db.php';
                    $result = $conn->query("SELECT * FROM students_db");
                    while ($row = $result->fetch_assoc()):
                    ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['phone'] ?></td>
                        <td>
                            <a href="process.php?delete=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="validation.js"></script>
</body>
</html>
 