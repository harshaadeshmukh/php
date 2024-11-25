<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="refresh" content="1"> <!-- Refresh page every second -->
  <title>Digital Clock</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      justify-content: center;
      height: 100vh;
      background-color: #212529;
    }

    header, footer {
      background-color: #333;
      color: white;
      padding: 1rem;
      text-align: center;
      width: 100%;
    }

    .card {
      background-color: rgba(255, 255, 255, 0.1);
      border: none;
      border-radius: 15px;
      padding: 20px 30px;
    }

    #clock {
      color: #f8f9fa;
      text-shadow: 0px 4px 10px rgba(255, 255, 255, 0.3);
      font-size: 3rem;
    }

    .clock-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100%;
    }
  </style>
</head>
<body>
  <!-- Header Section -->
  <header>
    <h1>Digital Clock</h1>
  </header>

  <!-- Clock Container Section -->
  <div class="clock-container">
    <div class="card text-center shadow-lg p-4">
      <div id="clock" class="display-1 fw-bold">
        <?php
          // Set the timezone (optional, depending on your location)
          date_default_timezone_set('Asia/Kolkata'); // Change to your preferred timezone

          // Get the current time in 12-hour format
          echo date('h:i:s A');  // Format: Hours:Minutes:Seconds AM/PM
        ?>
      </div>
    </div>
  </div>

  <!-- Footer Section -->
  <footer>
    <p>&copy; 2024 Your Company</p>
  </footer>

  <!-- Bootstrap JS (optional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
