<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gaa";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
    else {
        echo "Connected successfully<br><br>";
    }




$sql = "SELECT fname, lname, email, phone, dateOfBirth FROM player_list";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> First Name: ". $row["fname"]. " Last Name: ". $row["lname"]."<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>