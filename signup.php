<?php
session_start();
if($_SERVER['REQUEST_METHOD']=="POST"){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	
}
$server="localhost";
$user="root";
$pw="";
$db="blog";
$conn=new mysqli($server,$user,$pw,$db);
if($conn->$connect_error)
{
	die("connection failed:" .$conn->$conn_error);
}
else
{
	$sql="insert into signup(name,email,password) values('$name','$email','$password')";
	$result=$conn->query($sql);
	if($result==TRUE)
	{
		echo '<script>window.alert("Registered successfully")</script>';
		echo '<script>setTimeout(function(){window.location.href="login.html"},100);</script>';
	}
	else{
		echo '<script>window.alert("error occured")</script>';
		echo '<script>setTimeout(function(){window.location.href="signup.html"},100);</script>';
	}
}
$conn->close();
?>