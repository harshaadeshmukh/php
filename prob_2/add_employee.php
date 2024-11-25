<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $date_of_joining = $_POST['date_of_joining'];

    $sql = "INSERT INTO employee (name, email, department, date_of_joining) 
            VALUES ('$name', '$email', '$department', '$date_of_joining')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        // JavaScript Alert with Redirect
        echo "<script>
                alert('Employee added successfully!');
                window.location.href = 'index.php';
              </script>";
        exit();
    } else {
        $error_message = mysqli_error($conn);
        // Display error in an alert box
        echo "<script>
                alert('Error: $error_message');
                window.location.href = 'index.php';
              </script>";
    }
}
?>
