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
    $xmldoc->update($name, $where, $call1, $call2, $qq);
    echo "修改成功";
    ?>
     <a href="index.html">返回主页</a>