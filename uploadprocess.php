<?php
    header("Content-type:text/html;charset=utf-8");
//     $text=$_POST['text'];
//     echo "$text";
//     echo "<pre>";
//     print_r($_FILES);
//     echo "</pre>";
    $hidden=$_REQUEST['hidden'];
//     $file_size=$_FILES['myfile']['size'];
//     if ($file_size>2*1024*1024){
//         echo "文件过大不能上传";
//         exit();
//     }
//     echo $_FILES['myfile']['type'];
//     exit();
    $file_type=$_FILES['myfile']['type'];
    if ($file_type!='image/jpg'&&$file_type!='image/jpeg'){
        echo "文件类型错误";
        exit();
    }
    if (is_uploaded_file($_FILES['myfile']['tmp_name'])){
        $uploaded_file=$_FILES['myfile']['tmp_name'];
//         $moce_to_file=$_SERVER['DOCUMENT_ROOT']."./photo/".time().substr($_FILES['myfile']['name'],strrpos($_FILES['myfile']['name'],"."));
        $moce_to_file="./photo/".$hidden.substr($_FILES['myfile']['name'],strrpos($_FILES['myfile']['name'],"."));
//         echo $uploaded_file."------".$moce_to_file;   
//         move_uploaded_file($_FILES['myfile']['tmp_name'],);
            if (move_uploaded_file($uploaded_file,$moce_to_file)){
                echo "上传成功".$moce_to_file;
            }else {
                echo "上传失败";
            }
        
    }else {
        echo "上传失败";
    }
    ?>
    <a href="./selsect.php">返回上一页</a>