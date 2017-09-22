<?php
    
    require_once 'xmlhelper.class.php';
    $name=$_REQUEST['name'];
    $call1=$_REQUEST['call1'];
    
    $xmldoc = new xmlhelper("address.xml");
    $stuname=$xmldoc->process();
    foreach ($stuname as $val){
        if ($name==$val){
               $call=$xmldoc->processcall($name);
               if ($call==$call1){
                   header("Location:update.php?name=$name");
                   exit();
               }
        }
    }
    
    header("Location:warning.php?error=5");
    exit();
    
    ?>