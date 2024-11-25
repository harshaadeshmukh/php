<!-- 6. Develop a currency converter application using PHP that allows users to 
 input an amount dollar and convert it to rupees. 
 This problem, you can use a hard-coded exchange rate.  -->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    
    <title>Problem No. 6</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/practice/problem_statement/prob_6.php">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       
        
      </ul>
     
    </div>
  </div>
</nav>  


<?php
  $INDIAN_AMOUNT = 83.15;
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
      $num = $_POST['input1'];

      if(is_numeric($num)&& $num>0)
      {
        $result = $num*$INDIAN_AMOUNT;

        $formatted_result = number_format($result,2);

        echo ' <div class="alert alert-success" role="alert">
<h4 class="alert-heading">The indian rupee is '.$formatted_result.'</h4>
</div>';
      }

      else{
        echo ' <div class="alert alert-warning" role="alert">
  <h4 class="alert-heading">Plz Enter the input</h4>
</div>';
      }
    }
  ?>  


<div class="container d-grid gap-2 col-6 mt-5" style="background:#C9E6F0;border-radius:10px;">
<form method="post">
  <div class="mt-3"><h3>Enter the US dollar to convert into Indian Rupee</h3></div>
  
  <div class="d-grid gap-2 col-4 mx-auto mb-5">
    <label for="input1" class="form-label mt-5" style="font-size:20px;">Enter Number</label>
    <input type="number" class="form-control" id="input1" aria-describedby="input1" name="input1">
    
  </div>
  <div class="d-grid gap-2 col-4 mx-auto mb-4">
  <button class="btn btn-primary" type="submit">Convert</button>
 
</div>
</form>
</div>
  
   
  </body>
</html>