<html>
<head>
<title>管理用户</title>
</head>
<body>
<form action="admin.php" method="post">
请输入想要修改的人<input type="text" name="name" />
请输入曾经输入的电话号<input type="text" name="call1" />
<input type="submit" value="提交" />
</form>
<?php header("Content-type:text/html;charset=utf-8");?>
</body>
</html>