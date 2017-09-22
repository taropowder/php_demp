<html>
<head>
<title>错误警告</title>
</head>
<?php
header("Content-type:text/html;charset=utf-8");
$error=$_GET['error'];
if ($error==2){
    echo "老哥老哥老哥，除了我以外！！！";
}
if ($error==1){
 echo "换一个老哥输入试试，hiahiahia";
}
if ($error==3){
    echo "老哥别玩敲，我跟你港！！！";
}
if ($error==4){
    echo "老哥老哥你输入过了！要是输入错了你就跟我说一声！";
}
if ($error==5){
    echo "只能修改自己的 - -！";
}
if ($error==6){
    echo "请通过正当途径进入";
}

?>
<body>
<br>
<a href="index.html">返回主页</a></body>
</html>