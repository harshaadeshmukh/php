<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>String Transformations</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

  <div class="container mt-5">
    <h1 class="text-center mb-4">String Transformation in PHP</h1>

    <!-- Form for user input -->
    <form method="post">
      <div class="mb-3">
        <label for="inputString" class="form-label">Enter a string:</label>
        <input type="text" class="form-control" id="inputString" name="inputString" value="" required>
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Transform</button>
    </form>

    <?php
      if (isset($_POST['submit'])) {
        $inputString = $_POST['inputString'];

        // a) Transform string to uppercase
        $upperCase = strtoupper($inputString);

        // b) Transform string to lowercase
        $lowerCase = strtolower($inputString);

        // c) Make the first character uppercase
        $firstCharUpper = ucfirst($inputString);

        // d) Make the first character of all words uppercase
        $firstCharAllWordsUpper = ucwords($inputString);

        echo "<div class='mt-4'>
                <h5>Transformations:</h5>
                <ul class='list-group'>
                  <li class='list-group-item'><strong>Uppercase:</strong> $upperCase</li>
                  <br>
                  <li class='list-group-item'><strong>Lowercase:</strong> $lowerCase</li>
                  <br>
                  <li class='list-group-item'><strong>First Character Uppercase:</strong> $firstCharUpper</li>
                  <br>
                  <li class='list-group-item'><strong>First Character of Each Word Uppercase:</strong> $firstCharAllWordsUpper</li>
                </ul>
              </div>";
      }
    ?>

  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>
