<?php
header("content-type:text/html;charset=utf-8");
require_once('phpass-05/PasswordHash.php');
session_start();

$conn=@mysqli_connect("localhost","root","root","test");

$username=$_POST['username'];
$password=$_POST['password'];
$repassword=$_POST['repassword'];
$email = $_POST['userEmail'];

//判断用户名是否为2-10位大小写字母或数字
if (!preg_match('/^[a-zA-Z0-9]{2,10}$/', $username)) {
	echo "<script>alert('用户名格式不符合要求')</script>";
	echo "<script>location='sign.php'</script>";
}

//判断邮箱格式是否正确
if(!preg_match('/^[a-z0-9]+@([a-z0-9]+\.)+[a-z]{2,4}$/', $email)){
	echo "<script>alert('邮箱格式不符合要求')</script>";
	echo "<script>location='sign.php'</script>";
}

if($username!=''){
	if($password!=''){
		if($repassword===$password){
			if (filter_var($email, FILTER_VALIDATE_EMAIL)){

				// 初始化散列器为不可移植(这样更安全)
				$hasher = new PasswordHash(8, false);

				// 计算密码的哈希值。$hashedPassword 是一个长度为 60 个字符的字符串.
				$hashedPassword = $hasher->HashPassword($password);

				$sql="insert into user(username,password,userEmail) values('$username','$hashedPassword','$email')";

				if(mysqli_query($conn, $sql)){
					echo "<script>alert('注册成功！')</script>";
					echo "<script>location='login.php'</script>";
				}else{
					if(mysqli_query($conn, "select * from user where username='$username'")){
						echo "<script>alert('该用户已存在！')</script>";
						echo "<script>location='sign.php'</script>";
					}else{
						echo "<script>alert('注册失败，请返回重新注册！')</script>";
						echo "<script>location='sign.php'</script>";
					}
				}
			}else{
			 	echo "<script>alert('请输入有效的电子邮箱！')</script>";
				echo "<script>location='sign.php'</script>";
			}
		}else{
			echo "<script>alert('两次密码不一致！')</script>";
			echo "<script>location='sign.php'</script>";
		}
	}else{
		echo "<script>alert('请输入密码！')</script>";
		echo "<script>location='sign.php'</script>";
	}
}else{
	echo "<script>alert('请输入用户名！')</script>";
	echo "<script>location='sign.php'</script>";
}

mysqli_close($conn);

 ?>