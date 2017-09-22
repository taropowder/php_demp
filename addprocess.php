<html>
<head>
<title>增加界面</title>
</head>
<?php
    include 'xmlhelper.class.php';
    require_once 'other.class.php';
    header("Content-type:text/html;charset=utf-8");
    checkempty($_REQUEST['name'], $name);
    checkempty($_REQUEST['where'], $where);
    checkempty($_REQUEST['call1'], $call1);
    checkempty($_REQUEST['call2'], $call2);
    checkempty($_REQUEST['qq'], $qq);
    
    if (empty($name)){
        header("Location:index.html");
        exit();
    }
    
    
    $xmldoc = new xmlhelper("address.xml");
    $stuname=$xmldoc->process();
    foreach ($stuname as $val){
        if ($name==$val){
            header("Location:warning.php?error=4");
            exit();
        }
    }
    $xmldoc = new xmlhelper("address.xml");
    $xmldoc->getname($name, $where, $call1, $call2, $qq);
    
    echo    "等待更多功能吧，没日没夜添加ing<br/>";
    
    ?>
<body>
<audio src="1.mp3" loop="loop" autoplay>
</body>
</html>

    