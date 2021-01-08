<?php
session_start();
if($_SERVER['REQUEST_METHOD']=="POST"){
	$email=$_POST['email'];
	$password=$_POST['password'];
}
$server="localhost";
$user="root";
$pw="";
$db="blog";
$conn=new mysqli($server,$user,$pw,$db);

if($conn->connect_error){
	die("connection failed: ".$conn->connect_error);
  }
  else{
  $sql="SELECT * from signup where email='$email' and password = '$password'";
  $result=$conn->query($sql);
  if ($result->num_rows > 0) {
	  while($row = $result->fetch_assoc()) {
		if($email==$row['email'] && $password == $row['password']){
				  $_SESSION['name'] = $row['name'];
				  $_SESSION['email'] = $row['email'];
		  echo '<script>window.alert("Login Successfully '.$row["name"].'!")</script>';
		  echo "<script>setTimeout(function(){window.location.href='blog.html'},100);</script>";
	  }
	}
  }
  else{
		  echo '<script>window.alert("Login Error!")</script>';
		  echo "<script>setTimeout(function(){window.location.href='login.html'},100);</script>";
	  }
  }

$conn->close();
?>