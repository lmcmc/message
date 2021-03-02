<?php 
session_start();
header("content-type:text/html;charset=utf-8");

$conn=@mysqli_connect("localhost","root","root","test");

$user=$_SESSION['user'];
$content=$_POST['content'];
$time=$_POST['time'];
$nowcont=$_POST['nowcont'];
$beforecont=$_POST['beforecont'];
$repcont="回复“".$beforecont."”：".$nowcont;

if($content){
	$sql="insert into cont(user,content,time) values('$user','$content','$time')";
	if(mysqli_query($conn, $sql)){
		// echo "<script>alert('留言成功！')</script>";
		echo "<script>location='../index.php'</script>";
	}else{
		echo "<script>alert('留言失败！')</script>";
		echo "<script>location='../index.php'</script>";
	}
}elseif($repcont){
	$sql="insert into cont(user,content,time) values('$user','$repcont','$time')";
	if(mysqli_query($conn, $sql)){	
		echo "<script>alert('回复成功！')</script>";
		echo "<script>location='../index.php'</script>";
	}else{
		echo "<script>alert('回复失败！')</script>";
		echo "<script>location='../index.php'</script>";
	}
}else{
	echo "<script>alert('留言不能为空！')</script>";
	echo "<script>location='../index.php'</script>";
}


mysqli_close($conn);
 ?>
