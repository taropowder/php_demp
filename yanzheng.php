<html>
<head>
</head>
<body>
<form action="Process.php" method="post">
请输入一个同学的姓名（当然除了我之外）<input type="text" name="name">
<input type="submit" value="提交">
<?php 
header("Content-type:text/html;charset=utf-8");
if (!empty($_COOKIE['name'])){
    header("Location:Process.php");
}
?>

</form>
</body>
</html>