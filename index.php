<?php
header("content-type:text/html;charset=utf-8");
error_reporting(0); 
session_start();

require "operate/connect.php";

$count = $db->count("cont"); //得到cont数据表中的数据数

if ($_SESSION['login']) {

	$length = 6; //每页显示多少条

	$pagenum = $_GET['page'] ? $_GET['page'] : 1; //当前页码

	$pagetot = ceil($count / $length); //总共多少页

	if ($pagenum >= $pagetot) {
		$pagenum = $pagetot;
	} //限制最大页数

	$pagenum = ($pagenum < 1) ? 1 : $pagenum; //限制最小页数

	$prevpage = $pagenum - 1;
	$nextpage = $pagenum + 1; //上一页和下一页

	$firstset = ($pagenum - 1) * $length; //计算每页的firstset

	//从数据表中取出数据存放在datas里
	$datas = $db->select(
		"cont",
		[
			"user",
			"content",
			"time"
		],
		[
			"ORDER" => ["id" => "DESC"], 'LIMIT' => [$firstset, $length]
		]
	);
	$num = count($datas);
} else {
	echo "<script>location='operate/login.php'</script>";
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>留言页面</title>
	<style>
		table {
			width: 85%;
			word-wrap: break-word;
			word-break: normal;
		}

		.cent {
			text-align: center;
		}

		div {
			float: left
		}

		.aa {
			width: 100%;
			position: absolute
		}
	</style>
</head>

<body background="operate/img/bak3.jpg">
	<div>
		<img src="<?php echo './operate/img/' . $_SESSION['id'] . '.jpg'; ?>" onerror="this.src='./operate/img/default.jpg'">
	</div>
	<div class="aa">
		<center>
			<h2>欢迎<?php echo $_SESSION['user']; ?> 来到美豆的留言屋~</h2>
			<a href="upload_pic.php">更改头像</a>
			<a href='operate/logout.php'>退出登陆</a>
		</center>




		<hr>
		<form action="operate/insert.php" method="post">
			<center>
				<textarea name='content' rows=6' cols='80' placeholder='留下你想说的话吧'></textarea>
				<br>
				<input type='submit' value='留言'>
				<input type="hidden" name='time' value="<?php echo date("Y-m-d H:i:s", time()); ?>">
				<input type='hidden' name='username' value='<?php echo $_SESSION['user'] ?>'>
		</form>
		<hr>
		<table border="1px">
			<tr>
				<th width="6%">用户</th>
				<th width="67%">留言内容</th>
				<th width="18%" class="cent">留言时间</th>
				<th width="9%" class="cent">操作</th>
			</tr>
			<?php
			for ($i = 0; $i < $num; $i++) {
				echo "<tr>";
				$edittime = $datas[$i][time];
				$edituser = $datas[$i][user];
				$replycont = $datas[$i][content];
				echo "<td width='6%'>" . $datas[$i][user] . "</td>";
				echo "<td width='67%'>" . $datas[$i][content] . "</td>";
				echo "<td class='cent' width='18%'>" . $datas[$i][time] . "</td>";
				echo "<td class='cent' width='9%'><a href='operate/reply.php?beforecont=$replycont'>回复 </a>|<a href='operate/del.php?edituser=$edituser&edittime=$edittime'> 删除</a></td>";
				echo "</tr>";
			}
			?>
		</table>

		<?php echo "<a href='index.php?page={$prevpage}'>上一页 </a> <a href='index.php?page={$nextpage}'> 下一页</a>"; ?>
		</center>
	</div>
</body>

</html>