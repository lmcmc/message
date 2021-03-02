<?php 
session_start();
header("content-type:text/html;charset=utf-8");

$conn=@mysqli_connect("localhost","root","root","test");

$user=$_SESSION['user'];
$time=$_GET['edittime'];
$user2=$_GET['edituser'];

if($user===$user2){
	$sql="delete from cont where user='$user' and time='$time'";
	if(mysqli_query($conn, $sql)){
		// echo "<script>alert('留言成功！')</script>";
		echo "<script>location='../index.php'</script>";
	}else{
		echo "<script>alert('删除失败，请返回重试！')</script>";
		echo "<script>location='../index.php'</script>";
	}
}else{
	echo "<script>alert('不能删除别人的留言！')</script>";
	echo "<script>location='../index.php'</script>";
}

mysqli_close($conn);
 ?>
