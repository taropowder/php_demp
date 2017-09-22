<?php
    require_once 'xmlhelper.class.php';
    
    if (!empty($_REQUEST['name'])){
        $name=$_REQUEST['name'];
    }else if(!empty($_COOKIE['name'])){
       $name=$_COOKIE['name'];
    }else {
        header("Location:warning.php");
        exit();
    }
    if ($name=="于洋"){
        header("Location:warning.php?error=2");
        exit();
    }
    
    $xmldoc = new xmlhelper("address.xml");
    $stuname=$xmldoc->process();
    foreach ($stuname as $val){
        if ($name==$val){
            session_start();
            $_SESSION['name']="ok";
            setcookie("name",$name,time()+24*3600);
            header("Location:selsect.php");
            exit();
        }
    }
    
    header("Location:warning.php?error=1");
    exit();
    
    ?>