<?php
session_start();
header("content-type:text/html;charset=utf-8");

if ($_SESSION['login']) {
	$conn = @mysqli_connect("localhost", "root", "root", "test");

	$length = 10; //每页显示多少条

	$pagenum = $_GET['page'] ? $_GET['page'] : 1; //当前页码

	$totsql = "select count(*) from user";
	$totarr = mysqli_fetch_row($totrst = mysqli_query($conn, $totsql)); //总行数

	$pagetot = ceil($totarr[0] / $length); //总共多少页

	if ($pagenum >= $pagetot) {
		$pagenum = $pagetot;
	} //限制最大页数

	$prevpage = $pagenum - 1;
	$nextpage = $pagenum + 1; //上一页和下一页

	$firstset = ($pagenum - 1) * $length; //计算每页的firstset

	$sql = "select id,username,password,userEmail from user order by id desc limit {$firstset},{$length}";
	$result = mysqli_query($conn, $sql);

	// //获取$arr数组中的用户名，留言内容和留言时间
	// $user=$arr['user'];
	// $content=$arr['content'];
	// $time=$arr['time'];
} else {
	echo "<script>location='ad_login.php'</script>";
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>管理员界面</title>
	<style>
		body {
			background-color: #FCE4EC;
		}
	</style>
</head>

<body>
	<center>
		<h2>管理用户| <a href="admin.php">管理留言</a></h2>
		<table border="1px" width="85%">
			<tr>
				<th width="5%">ID</th>
				<th width="10%">用户</th>
				<th width="35%">密码</th>
				<th width="28%">邮箱</th>
				<th width="22%">操作</th>
			</tr>
			<?php
			while ($arr = @mysqli_fetch_assoc($result)) {
				echo "<tr>";
				$id = $arr['id'];
				echo "<td width='5%'>" . $arr['id'] . "</td>";
				echo "<td width='10%'>" . $arr['username'] . "</td>";
				echo "<td width='35%'>" . $arr['password'] . "</td>";
				echo "<td width='30%'>" . $arr['userEmail'] . "</td>";
				echo "<td width='20%'><a href='#'>编辑 </a>|<a href='ad_del.php?id=$id'> 删除</a></td>";
				echo "</tr>";
			}
			?>
		</table>

		<?php echo "<a href='ad_user.php?page={$prevpage}'>上一页 </a> <a href='ad_user.php?page={$nextpage}'> 下一页</a>"; ?>
	</center>
</body>

</html>