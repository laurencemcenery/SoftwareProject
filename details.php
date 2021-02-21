<?php

	include 'action.php';
  
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Players</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body class="bg-secondary">
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.html">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
       
      </ul>
     <ul class="navbar-nav ">
     	 <li class="nav-item d-flex">
          <a class="nav-link" href="teampage2.php">Login</a>
          <a class="nav-link" href="registration.html">Register</a>
        </li>
    </ul>
    </div>
  </div>
</nav>

<div class="container">
<div class="row justify-content-center">

<div class="col-md-6 mt-3 bg-light p-2 rounded">
<h2 class="bg-info p-2 rounded text-center text-light"><?=$vname;?></h2>

<div class="text-center">
<img src="<?= $vphoto;?>" width="300" class="img-thumbnail">
</div>

<h3 class = "text-center">Contact Details:</h3>
<h4>Email : <?=$vemail;?> </h4>
<h4>Phone : <?=$vphone;?> </h4>


<a href="teampage.php" class="btn btn-secondary mt-3 text-center">Return to Teampage</a>

</div>



</div>
</div>



</body>
</html>