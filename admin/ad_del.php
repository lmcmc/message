<?php
session_start();
header("content-type:text/html;charset=utf-8");

$conn=@mysqli_connect("localhost","root","root","test");

$user=$_GET['edituser'];
$time=$_GET['edittime'];
$id=$_GET['id'];

if($user && $time){
	$sql="delete from cont where user='$user' and time='$time'";
	if(mysqli_query($conn, $sql)){
		echo "<script>location='admin.php'</script>";
	}else{
		echo "<script>alert('删除失败，请返回重试！')</script>";
		echo "<script>location='admin.php'</script>";
	}
}

if($id){
	$sql="delete from user where id=$id";
	if(mysqli_query($conn, $sql)){
		echo "<script>location='ad_user.php'</script>";
	}else{
		echo "<script>alert('删除失败，请返回重试！')</script>";
		echo "<script>location='ad_user.php'</script>";
	}
}



mysqli_close($conn);
 ?>
