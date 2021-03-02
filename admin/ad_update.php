<?php
header("content-type:text/html;charset=utf-8");

session_start();

$conn = @mysqli_connect("localhost", "root", "root", "test");

$user = $_GET['edituser'];
$time = $_GET['edittime'];
$content = $_POST['content'];
if (isset($content)) {
    if ($user && $time) {
        $sql = "update cont set content='$content' where user='$user' and time='$time'";
        if (mysqli_query($conn, $sql)) {
            echo "<script>location='admin.php'</script>";
        } else {
            echo "<script>alert('编辑失败，请返回重试！')</script>";
            echo "<script>location='admin.php'</script>";
        }
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>编辑界面</title>
    <style>
        body {
            background-color: #FCE4EC;
        }
    </style>
</head>

<body>
    <form method="post">
        <center>
            <textarea name='content' rows=6' cols='80'>
           <?php
            $cont_sql = "select content from cont where user='$user' and time='$time'";
            $arr = @mysqli_fetch_assoc(mysqli_query($conn, $cont_sql));
            echo $arr['content'];
            ?>
            </textarea>
            <br>
            <input type='submit' value='提交'>
        </center>
    </form>
</body>

</html>