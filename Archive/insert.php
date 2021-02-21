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


echo "Details Entered:<br>";
echo "First Name: ".$_POST['fname']."<br>";
echo "Last Name: ".$_POST['lname']."<br>";
echo "E-mail: ".$_POST['email']."<br>";
echo "Phone: ".$_POST['phone']."<br>";
echo "Date of Birth: ".$_POST['dateOfBirth']."<br><br>";



    
    
 //Adding Data From form

    
if(isset($_POST['submit'])){
    
    if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['phone'])&& !empty($_POST['dateOfBirth'])){
        
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $dateOfBirth = $_POST['dateOfBirth'];
        
        $query = "INSERT INTO player_list(fname,lname,email,phone,dateOfBirth) VALUES ('$fname','$lname','$email','$phone','$dateOfBirth')";
        
        $run = mysqli_query($conn,$query) or die (mysqli_error());
        
        if ($run){
            echo "Form submitted successfully";
        }
        else {
            echo "Form not submitted!";
        }
    }
    else{
        echo "Error!!! - all fields required";
    }
    
} 


?>


