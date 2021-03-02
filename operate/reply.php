<!DOCTYPE html>
<html>
<head>
	<title>回复界面</title>
	<meta charset="utf-8">
</head>
<body background="img/bak3.jpg">
<form action="insert.php" method="post">
<center>
 		<textarea name='nowcont' rows=
 		6' cols='80' placeholder='留下你想回复的话吧'></textarea>
 		<br>
		<input type='submit' value='提交'>
		<input type="hidden" name='time' value="<?php echo date("Y-m-d H:i:s",time());?>">
		<input type='hidden' name='beforecont' value='<?php echo $_GET['beforecont']?>'>

 	</form>
</center>
</body>
</html>
