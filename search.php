<?php
session_start();
if($_SERVER['REQUEST_METHOD']=="POST"){
	$name=$_POST['name'];
}
$server="localhost";
$user="root";
$pw="";
$db="blog";
$conn=new mysqli($server,$user,$pw,$db);
if($conn->connect_error)
{
	die("connection failed:" .$conn->connect_error);
}
else
{
	$sql="select * from bloginfo where name='$name'";
	$result=$conn->query($sql);
	if($result->num_rows > 0)
	{
		while($row=$result->fetch_assoc())
		{
			echo '<table>';
			echo '<tr><td>Name:'.$row['name'].'</td></tr>';
			echo '<tr><td>Course:'.$row['course'].'</td></tr>';
			echo '<tr><td>Department:'.$row['dept'].'</td></tr>';
                        echo '<tr><td>College Name:'.$row['colname'].'</td></tr>';
			echo '<tr><td>Description:'.$row['desc'].'</td></tr>';
		}
		echo '</table>';
	}
	else{
		echo 'The student has no posts to display';
	}
	echo '<br>';
	echo '<br>';
	echo "<button onclick='func();'>'EXIT'</button>";
	echo '<script>
	function func()
	{
		window.location.href="login.html";
	}
	</script>';
}
$conn->close()
?>
	