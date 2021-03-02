<?php
session_start();
if ($_POST) {
	if (!empty($_FILES['pic'])) {
		//获取文件信息
		$info = $_FILES['pic'];
		//判断错误信息
		if ($info['error'] > 0) {
			$error_msg = '';
			switch ($info['error']) {
				case 1:
					$error_msg .= '文件超过了php.ini的upload_max_filesize的指定值';
					break;
				case 2:
					$error_msg .= '文件超过了表单中的max_file_size的指定值';
					break;
				case 3:
					$error_msg .= '文件只有部分被上传';
					break;
				case 4:
					$error_msg .= '没有文件被上传';
					break;
				case 6:
					$error_msg .= '找不到临时文件夹';
					break;
				case 7:
					$error_msg .= '文件写入失败';
					break;
				default:
					$error_msg .= '未知错误！';
					break;
			}
			echo "<script>alert('$error_msg')</script>";
			echo "<script>location='index.php'</script>";
			return false;
		}

		//限定文件类型,为了方便测试，仅指定jpg\jpeg类型
		// $type = array('image/png','image/jpg','image/jpeg','image/gif');
		$type = array('image/jpg', 'image/jpeg');

		if (!in_array($info['type'], $type)) {
			echo "<script>alert('只允许上传jpg类型的图片')</script>";
			echo "<script>location='index.php'</script>";
			return false;
		}

		//生成缩略图
		//获取原图像的大小
		$size = getimagesize($info['tmp_name']);
		list($src_width, $src_height) = $size;
		//计算缩略图大小
		if ($src_width > $src_height) {
			$new_width = 100;
			$new_height = round($new_width / $src_width * $src_height);
		} else {
			$new_height = 100;
			$new_width = round($new_height / $src_height * $src_width);
		}
		//创建画布
		$from_fun = array(
			'image/gif' => 'imagecreatefromgif',
			'image/png' => 'imagecreatefrompng',
			'image/jpeg' => 'imagecreatefromjpeg'
		);
		$thumb = imagecreatetruecolor($new_width, $new_height);
		$source = $from_fun[$info['type']]($info['tmp_name']);
		//生成缩略图
		imagecopyresampled($thumb, $source, 0, 0, 0, 0, $new_width, $new_height, $src_width, $src_height);
		//设置缩略图保存路径
		$ext = strrchr($info['name'], '.');
		$new_file = './operate/img/'.$_SESSION['id'].$ext;
		//保存缩略图到指定目录
		$image_func = array(
			'image/gif' => 'imagegif',
			'image/png' => 'imagepng',
			'image/jpeg' => 'imagejpeg'
		);
		if (!$image_func[$info['type']]($thumb, $new_file)) {
			echo "<script>alert('头像上传失败')</script>";
			echo "<script>location='index.php'</script>";
			return false;
		} else {
			chmod($new_file, 700);
			echo "<script>location='index.php'</script>";
		}
	}
}
?>



	<!DOCTYPE html>
	<html>

	<head>
		<title>
			用户头像
		</title>
		<style type="text/css">
			body {
				background-color: #FCE4EC;
			}
		</style>
	</head>

	<body>
		<center>
			<h2>用户头像显示</h2>
			<form method="post" enctype="multipart/form-data">
				<table>
					<tr>
						<td>用户姓名：</td>
						<td><?php echo $_SESSION['user']; ?></td>
					</tr>
					<tr>
						<td>当前头像: </td>
						<td><img src="<?php echo './operate/img/'.$_SESSION['id'].'.jpg'; ?>" onerror="this.src='./operate/img/default.jpg'"></td>
					</tr>
					<tr>
						<td><input type="hidden" name="MAX_FILE_SIZE" value="500000">
							上传头像：</td>
						<td><input type="file" name="pic"></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" value="点击上传"></td>
					</tr>
				</table>
			</form>
		</center>
	</body>

	</html>