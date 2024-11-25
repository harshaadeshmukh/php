<?php
require_once 'config.php';
session_start();

$message = "";

// Verify teacher is logged in (Dummy Login Check)
if (!isset($_SESSION['teacher_name'])) {
    $_SESSION['teacher_name'] = 'Default Teacher'; // Replace with actual teacher login system.
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date = $_POST['date'];
    $marked_by = $_SESSION['teacher_name'];

    if (isset($_POST['attendance']) && is_array($_POST['attendance'])) {
        foreach ($_POST['attendance'] as $student_id => $status) {
            $stmt = $conn->prepare("INSERT INTO attendance (student_id, date, status, marked_by) 
                                    VALUES (?, ?, ?, ?) 
                                    ON DUPLICATE KEY UPDATE status = ?");
            $stmt->bind_param("issss", $student_id, $date, $status, $marked_by, $status);
            if ($stmt->execute()) {
                $message = "Attendance marked successfully!";
            } else {
                $message = "Error: " . $stmt->error;
            }
            $stmt->close(); // Ensure $stmt is always defined before calling close().
        }
    } else {
        $message = "No attendance data provided.";
    }
}

// Fetch all students
$result = $conn->query("SELECT id, roll_no, name FROM students ORDER BY roll_no");
$students = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mark Attendance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Mark Attendance</h2>
    <?php if (!empty($message)): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $message; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <form method="POST">
        <div class="mb-3">
            <label>Date:</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Roll No</th>
                    <th>Name</th>
                    <th>Attendance</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                <tr>
                    <td><?php echo htmlspecialchars($student['roll_no']); ?></td>
                    <td><?php echo htmlspecialchars($student['name']); ?></td>
                    <td>
                        <select name="attendance[<?php echo $student['id']; ?>]" class="form-control">
                            <option value="present">Present</option>
                            <option value="absent">Absent</option>
                        </select>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Submit Attendance</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
