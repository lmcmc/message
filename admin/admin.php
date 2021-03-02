<?php
session_start();
header("content-type:text/html;charset=utf-8");

if ($_SESSION['login']) {
	$conn = @mysqli_connect("localhost", "root", "root", "test");

	$length = 10; //每页显示多少条

	$pagenum = $_GET['page'] ? $_GET['page'] : 1; //当前页码

	$totsql = "select count(*) from cont";
	$totarr = mysqli_fetch_row($totrst = mysqli_query($conn, $totsql)); //总行数

	$pagetot = ceil($totarr[0] / $length); //总共多少页

	if ($pagenum >= $pagetot) {
		$pagenum = $pagetot;
	} //限制最大页数

	$prevpage = $pagenum - 1;
	$nextpage = $pagenum + 1; //上一页和下一页

	$firstset = ($pagenum - 1) * $length; //计算每页的firstset

	$sql = "select user,content,time from cont order by id desc limit {$firstset},{$length}";
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

		table {
			width: 85%;
			word-wrap: break-word;
			word-break: normal;
		}
	</style>
</head>

<body>
	<center>
		<h2>管理留言 | <a href="ad_user.php">管理用户</a></h2>
		<table border="1px">
			<tr>
				<th width="6%">用户</th>
				<th width="67%">留言内容</th>
				<th width="18%">留言时间</th>
				<th width="9%">操作</th>
			</tr>
			<?php
			while ($arr = @mysqli_fetch_assoc($result)) {
				echo "<tr>";
				$edittime = $arr['time'];
				$edituser = $arr['user'];
				$replycont = $arr['content'];
				echo "<td width='6%'>" . $arr['user'] . "</td>";
				echo "<td width='67%'>" . $arr['content'] . "</td>";
				echo "<td width='18%'>" . $arr['time'] . "</td>";
				echo "<td width='9%'><a href='ad_update.php?edituser=$edituser&edittime=$edittime'>编辑 </a>
				|<a href='ad_del.php?edituser=$edituser&edittime=$edittime'> 删除</a></td>";
				echo "</tr>";
			}
			?>
		</table>

		<?php echo "<a href='admin.php?page={$prevpage}'>上一页 </a> <a href='admin.php?page={$nextpage}'> 下一页</a>"; ?>
	</center>

</body>

</html>