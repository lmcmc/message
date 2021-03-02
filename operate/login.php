 <!DOCTYPE html>
 <html>

 <head>
 	<title>登陆页面</title>
 	<meta charset="utf-8">
 	<style>
 		body {
 			background: url('img/back8.jpg');
 			background-size: cover;
 		}

 		form {
 			margin: 0px;
 			padding: 0px;
 		}

 		table {
 			padding: 0px;
 			margin: 0px;
 		}
 	</style>
 </head>

 <body>
 	<center>
 		<h2>欢迎来到美豆的留言小屋</h2>
 		<form action="check.php" method="post">
 			<a href="../admin/admin.php">管理员登陆</a>
 			<table>
 				<tr>
 					<td colspan="2">
 						用户名：<input type="text" name="username">
 					</td>
 				</tr><br>

 				<tr>
 					<td colspan="2">
 						密&nbsp;&nbsp;&nbsp;码：<input type="password" name="password">
 					</td>
 				</tr><br>

 				<tr>
 					<td>
 						验证码：<input type="codetxt" name="vcode" type="text" maxlength="4">
 					</td>
 					<td>
 						<a href="#" id="change"><img src="vcode.php" id="img"></a>
 					</td>
				 </tr>

 			</table>
 			<input type="submit" name="" value="登陆">
 			<input type="reset" name="" value="重置">
 		</form>
 		<br>
 		还没有账号？<a href="sign.php">立即注册</a>
 	</center>
 </body>
 <script type="text/javascript">
 	var change = document.getElementById('change');
 	var img = document.getElementById('img');
 	change.onclick = function() {
 		img.src = './vcode.php?a=' + new Date();
 	}
 </script>

 </html>