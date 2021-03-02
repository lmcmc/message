<?php
header("content-type:text/html;charset=utf-8");
require_once('phpass-05/PasswordHash.php');
require_once('token.php');
session_start();

$conn=@mysqli_connect("localhost","root","root","test");

$username=$_POST['username'];
$password=$_POST['password'];
$vcode=strtolower($_POST['vcode']);

$sql="select password,id from user where username='{$username}'";
$result=mysqli_query($conn, $sql);
$arr=mysqli_fetch_assoc($result);

if($arr){
	if (strtolower($_SESSION['vstr']) === $vcode) {
		$hasher = new PasswordHash(8, false);
		if ($hasher->CheckPassword($password, $arr['password'])) {

			$user_token = myToken($username);
			$_SESSION['user'] = $username;
			$_SESSION['login'] = 1;
			$_SESSION['id'] = $arr['id'];

			echo "<script>location='../index.php'</script>";
		} else {
			echo "<script>alert('密码错误！')</script>";
			echo "<script>location='login.php'</script>";
		}
	} else {
		echo "<script>alert('验证码输入错误！')</script>";
		echo "<script>location='login.php'</script>";
	}
}else{
	echo "<script>alert('该用户不存在！')</script>";
	echo "<script>location='login.php'</script>";
}

mysqli_close($conn);

 ?>