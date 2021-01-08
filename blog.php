<?php
session_start();
if($_SERVER['REQUEST_METHOD']=="POST"){
	$name=$_POST['name'];
$course=$_POST['course'];
$dept=$_POST['dept'];
$colname=$_POST['colname'];
$desc=$_POST['desc'];
	
	
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
	$sql="insert into bloginfo(name,course,dept,colname,desc) values('$name','$course','$dept','$colname','$desc')";
	$result=$conn->query($sql);
	if($result==TRUE)
	{
		echo '<script>window.alert("created successfully")</script>';
		echo '<script>setTimeout(function(){window.location.href="search.html"},100);</script>';
	}
	else{
		echo '<script>window.alert("error occured")</script>';
		echo '<script>setTimeout(function(){window.location.href="blog.html"},100);</script>';
	}
}
$conn->close();
?>