<?php
session_start();
if (!isset($_SESSION['student_id'])) {
    header("Location: student_login.php");
    exit();
}

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'college_complaints';

$conn = new mysqli($host, $user, $pass, $db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $complaint = $_POST['complaint'];
    $student_id = $_SESSION['student_id'];
    
    $stmt = $conn->prepare("INSERT INTO complaints (student_id, complaint) VALUES (?, ?)");
    $stmt->bind_param("is", $student_id, $complaint);
    $stmt->execute();
    echo "<div class='alert alert-success'>Complaint registered successfully</div>";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h3 class="mt-5">Submit Your Complaint</h3>
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="complaint" class="form-label">Complaint</label>
                        <textarea name="complaint" class="form-control" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Complaint</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
