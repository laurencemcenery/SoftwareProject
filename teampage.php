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

<body>
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
            <a class="nav-link" href="teampage.php">Login</a>
            <a class="nav-link" href="registration.html">Register</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid">

    <!-- Top heading and SESSION Alert -->
    <div class="row justify-content-center">
      <div class="col-md-10">
        <h3 class="text-center text-dark mt-4">Senior Team</h3>
        <hr>
        <?php if (isset($_SESSION['response'])) {   ?>
          <div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?= $_SESSION['response']; ?>
          </div>
        <?php }
        unset($_SESSION['response']); ?>
      </div>
    </div>


    <!-- Player List -->
    <div class="row justify-content-center">
      <div class="col-md-10">
        <?php
        $query = "SELECT * FROM players";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        ?>
        <h3 class="text-center text-info">Current Squad</h3>
        <table class="table table-hover text-center">
          <thead>
            <tr>
              <th>Image</th>
              <th>Name</th>
              <th>Position</th>
              <th>Trainings Attended</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
              <tr>


                <td><img src="<?= $row['photo']; ?>" width="25"></td>

                <td><?= $row['name']; ?></td>

                <td><?= $row['position']; ?></td>

                <td><?= $row['attendance']; ?></td>

                <td>
                  <a href="details.php?details=<?= $row['id']; ?>" class="badge badge-info p-2">Details</a> |
                  <a href="teampage.php?edit=<?= $row['id']; ?>" class="badge badge-warning p-2">Edit Stats</a> |
                  <a href="action.php?delete=<?= $row['id']; ?>" class="badge badge-dark p-2" onclick="return confirm('Do you want to remove this player?')">Remove</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="row justify-content-center">

               <div class="col-md-6">
        <h3 class="text-center text-info">Search Player</h3>
        <form action="action.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $id; ?>">

          <div class="form-group">
            <input type="text" name="name" class="form-control" value="<?= $name; ?>" placeholder="Enter Name" required>
          </div>

          <div class="form-group">
            <input type="email" name="email" class="form-control" value="<?= $email; ?>" placeholder="Enter Email" required>
          </div>

          <div class="form-group">
            <input type="tel" name="phone" class="form-control" value="<?= $phone; ?>" placeholder="Enter Phone" required>
          </div>

          <div class="form-group">
            <input type="text" name="position" class="form-control" value="<?= $position; ?>" placeholder="Enter Position" required>
          </div>





          <div class="form-group">
            <input type="hidden" name="oldimage" value="<?= $photo; ?>">
            <input type="file" name="image" class="custom-file">
            <img src="<?= $photo; ?>" width="120" class="img-thumbnail">
          </div>

          <div class="form-group">

            <?php if ($update == true) { ?>
              <input type="submit" name="update" class="btn btn-success btn-block" value="Update Player">
            <?php } else { ?>
              <input type="submit" name="add" class="btn btn-secondary btn-block" value="Add Player">
            <?php } ?>


          </div>
      </div> 
      </form>
      </div>












  </div>


</body>

</html>