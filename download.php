<?php
function down_file($file_name,$file_sub_path)
{
    $file_name = "address.xml";
    $file_path = $file_sub_path.$file_name;
    if (!file_exists($file_path)) {
        echo "文件不存在" . $_SERVER['DOCUMENT_ROOT'];
        return;
    }
    $fp = fopen($file_path, "r");   
    $file_size = filesize($file_path);
    header("Content-type: application/octet-stream");
    header("Accept-Ranges:bytes");
    header("Accept-Length: $file_size");
    header("Content-Disposition: attachment; filename=" . $file_name);
    //向客户端回送数据

    $buffer = 1024;
    $file_cont = 0;
    while (!feof($fp) && ($file_size - $file_cont > 0)) {
        $file_data = fread($fp, $buffer);
        $file_cont_ = $buffer;
        echo $file_data;
    }
    fclose($fp);
}
down_file("address.xml","./");
?>