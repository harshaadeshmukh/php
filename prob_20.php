<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Electricity Bill Calculator</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

  <div class="container mt-5">
    <h1 class="text-center mb-4">Electricity Bill Calculator</h1>

    <!-- Form for user input -->
    <form method="post">
      <div class="mb-3">
        <label for="units" class="form-label">Enter Units Consumed:</label>
        <input type="number" class="form-control" id="units" name="units" required>
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Calculate Bill</button>
    </form>

    <?php
      if (isset($_POST['submit'])) {
        // Get the units from the form
        $units = $_POST['units'];

        // Calculate the electricity bill
        $bill = 0;

        if ($units <= 50) {
          $bill = $units * 3.50;
        } elseif ($units <= 150) {
          $bill = (50 * 3.50) + (($units - 50) * 4.00);
        } elseif ($units <= 250) {
          $bill = (50 * 3.50) + (100 * 4.00) + (($units - 150) * 5.20);
        } else {
          $bill = (50 * 3.50) + (100 * 4.00) + (100 * 5.20) + (($units - 250) * 6.50);
        }

        // Display the bill
        echo "<div class='mt-4'>
                <h5>Calculated Bill:</h5>
                <div class='alert alert-success'>
                  <strong>Total Bill: </strong> ₹" . number_format($bill, 2) . "
                </div>
              </div>";
      }
    ?>

  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>
