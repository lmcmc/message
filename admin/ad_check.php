<?php
session_start();
header("content-type:text/html;charset=utf-8");
require_once('../operate/phpass-05/PasswordHash.php');

$conn=@mysqli_connect("localhost","root","root","test");

$username=$_POST['username'];
$password=$_POST['password'];

$sql="select password from user where username='admin'";

$result=mysqli_query($conn, $sql);
$arr=mysqli_fetch_assoc($result);
// echo $arr['password'];//得到数据库中当前用户的密码

if($username=='admin'){
	$hasher = new PasswordHash(8, false);
	if ($hasher->CheckPassword($password, $arr['password'])) {
			$_SESSION['user']=$username;
			$_SESSION['login']=1;
			echo "<script>location='admin.php'</script>";
	}else{
		echo "<script>alert('密码错误！')</script>";
		echo "<script>location='ad_login.php'</script>";
	}
}else{
	echo "<script>alert('用户名错误！')</script>";
	echo "<script>location='ad_login.php'</script>";
}

mysqli_close($conn);
 ?>
