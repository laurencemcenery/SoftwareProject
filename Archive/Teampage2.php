<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Senior Team</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <style>
	.container {margin-top: 4em;}
</style>
</head>


<body>
    
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="homepage.html">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
       
      </ul>
     <ul class="navbar-nav ">
       <li class="nav-item d-flex">
          <a class="nav-link" href="#">Sign Up</a>
          <a class="nav-link" href="test.html">Login</a>
        </li>
    </ul>
    </div>
  </div>
</nav>


<div class="container text-center">




<h1 class = "display-2">Senior Team - Player List</h1>


<table class="table table-striped">
  <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Date of Birth</th>
    <th>Action</th>
  </tr>


<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gaa";


$conn = mysqli_connect($servername, $username, $password, $dbname);

$sql = "SELECT fname, lname, email, phone, dateOfBirth FROM player_list";
$result = $conn->query($sql);


 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["fname"]."</td>
                <td>".$row["lname"]."</td>
                <td>".$row["email"]."</td>
                <td>".$row["phone"]."</td>
                <td>".$row["dateOfBirth"]."</td>
                <td>Edit Del</td>
               
              
          </tr>";
        }
        echo "</table>";
      }
      else {
      echo "0 Result";
    }

$conn->close();

?>

</table>


<a href="form.html"> <button type="submit" name="submit" class="btn btn-secondary">Add Player</button></a>
<button type="submit" name="submit" class="btn btn-secondary">Edit Player</button>  
<button type="submit" name="submit" class="btn btn-secondary">Remove Player</button>   
    


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>