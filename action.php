<?php
	session_start();
	include 'config.php';


$update =false;
$id="";
$name="";
$email="";
$phone="";
$photo="";
$position="";

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$position = $_POST['position'];
		$photo = $_FILES['image']['name'];

		$upload="uploads/".$photo;

		$query = "INSERT INTO players(name,email,phone,position,photo) VALUES(?,?,?,?,?)";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("sssss",$name,$email,$phone,$position,$upload);
		$stmt->execute();
		move_uploaded_file($_FILES['image']['tmp_name'],$upload);
		header ('location:teampage.php');
		$_SESSION['response'] = "Player Successfully added to team!";
		$_SESSION['res_type'] = "success";
	}
	
if(isset($_GET['delete'])) {
		$id=$_GET['delete'];

		$sql = "SELECT photo FROM players WHERE id=?";
		$stmt2 = $conn->prepare($sql);
		$stmt2->bind_param("i",$id);
		$stmt2->execute();
		$result2 = $stmt2->get_result();
		$row=$result2->fetch_assoc();
		$imagepath = $row['photo'];
		unlink($imagepath);

		$query = "DELETE FROM players WHERE id=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		header ('location:teampage.php');
		$_SESSION['response'] = "Player removed from team!";
		$_SESSION['res_type'] = "danger";
}


if(isset($_GET['edit'])){
	$id = $_GET['edit'];

	$query="SELECT * FROM players WHERE id=?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("i",$id);
	$stmt->execute();
	$result = $stmt->get_result();
	$row =$result->fetch_assoc();
$id=$row['id'];
$name=$row['name'];
$email=$row['email'];
$phone=$row['phone'];
$position=$row['position'];
$photo=$row['photo'];

$update =true;

}


if(isset($_POST['update'])){
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$position = $_POST['position'];
	$oldimage = $_POST['oldimage'];

		if(isset($_FILES['image']['name']) && ($_FILES['image']['name'] !="")) {

			$newimage="uploads/".$_FILES['image']['name'];
			unlink($oldimage);
			move_uploaded_file($_FILES['image']['tmp_name'],$newimage);
		}
		else {
			$newimage= 	$oldimage;
		}

		$query="UPDATE players SET name=?,email=?,phone=?, position=?, photo=? WHERE id=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("ssssi",$name,$email,$phone,$position,$newimage,$id);
		$stmt->execute();

		header ('location:teampage.php');
		$_SESSION['response'] = "Player updated!";
		$_SESSION['res_type'] = "primary";
	}

if(isset($_GET['details'])){
	$id = $_GET['details'];
	$query="SELECT * FROM players WHERE id=?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("i",$id);
	$stmt->execute();
	$result = $stmt->get_result();
	$row =$result->fetch_assoc();

$vid=$row['id'];
$vname=$row['name'];
$vemail=$row['email'];
$vphone=$row['phone'];
$vposition=$row['position'];
$vphoto=$row['photo'];
}



?>

