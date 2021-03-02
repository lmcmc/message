<!DOCTYPE html>
<html>
<head>
	<title>用户注册</title>
	<meta charset="utf-8">
	<style>
 	  body{
 	  	/*background-color:#FCE4EC;*/
 	  	background: url('img/back4.jpg');
 	  	background-size: cover;
 	  }
 	</style>
</head>
<body>
	<center>
 		<h2>用户注册</h2>
	 	<form action="input.php" method="post">
	 			&nbsp;&nbsp;&nbsp;用户名： <input type="text" name="username" placeholder="请输入用户名">
	 		<br/><br>
	 			登陆密码： <input type="password" name="password" placeholder="请输入密码">
	 		}
	 		<br><br>
	 			确认密码： <input type="password" name="repassword" placeholder="请重复输入密码">
	 		<br><br>
	 			电子邮箱：  <input type="text" name="userEmail" placeholder="请输入您的邮箱地址" />
	 		<br><br>
				<input type="checkbox" name="agree"/>
           		<span style="font-size:13px;">我已阅读并同意<a href="#" id="look">《用户注册协议》</a></span>
            <br/><br/>
	 			<input type="submit" name="" value="注册">
	 			<input type="reset" name="" value="重置">
	 		<br><br>
	 		 	<span style="font-size:15px;">已有账号？<a href="login.php">去登陆</a></span>
	 	</form>
 	</center>
</body>
	<script type="text/javascript">
 		var look = document.getElementById('look');
 		look.onclick = function(){
 			alert('欢迎留言，但请不要恶意攻击噢~');
 		}
 	</script>
</html>