<?php
include('db.php');

// Fetch all employees
$sql = "SELECT * FROM employee";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Ensure header and footer stay fixed and the layout does not overlap */
        header, footer {
            background-color: #333;
            color: white;
            padding: 0.5rem;
            text-align: center;
            width: 100%;
            position: fixed;
            
        }

        header {
            top: 0; /* Attach the header to the top */
        }

        footer {
            bottom: 0; /* Attach the footer to the bottom */
        }

        body {
            margin-top: 6rem; /* Ensure content does not overlap the header */
            margin-bottom: 7rem; /* Ensure content does not overlap the footer */
        }
    </style>
</head>
<body>
    <header>
        <h1>Employee Management System</h1>
    </header>

    <div class="container mt-5">
        <?php if (isset($_GET['success']) && $_GET['success'] == 1) { ?>
            <div class="alert alert-success">Employee added successfully!</div>
        <?php } ?>

        <!-- Add Employee Form -->
        <h2>Add Employee</h2>
        <form action="add_employee.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="department" class="form-label">Department</label>
                <input type="text" id="department" name="department" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="date_of_joining" class="form-label">Date of Joining</label>
                <input type="date" id="date_of_joining" name="date_of_joining" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Employee</button>
        </form>

        <!-- Employee List -->
        <h2 class="mt-5">Employee List</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Date of Joining</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['department']; ?></td>
                        <td><?php echo $row['date_of_joining']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <footer>
        <p class="mt-2">© Harshad Deshmukh. All rights reserved.</p>
    </footer>
</body>
</html>
