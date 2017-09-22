<html>
<head>
<title>更新自己的数据</title>
</head>
<?php 
header("Content-type:text/html;charset=utf-8");

    require_once 'xmlhelper.class.php';
    
    
    if (empty($_REQUEST['name'])){
        header("Location:warning.php?error=6");
        exit();
    }
    
    $name=$_REQUEST['name'];
    $xmldoc = new xmlhelper("address.xml");
    $array=$xmldoc->processarray($name);
    
?>


<body>
<form action="updateprocess.php">
<table width="764" height="352" border="0">
  <tr>
    <td width="238" height="62">姓名</td>
    <td width="516">&nbsp;&nbsp;&nbsp;&nbsp;<input name="name" type="text" class="table_table_input" size="20" value="<?php echo $array[0];?>"/></td>
  </tr>
  <tr>
    <td height="57">所在地</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;<input name="where" type="text" class="table_table_input" size="20" value="<?php echo $array[1];?>"/></td>
  </tr>
  <tr>
    <td height="57">常用联系方式1</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;<input name="call1" type="text" class="table_table_input" size="20" value="<?php echo $array[2];?>"/></td>
  </tr>
  <tr>
    <td height="57">常用联系方式2</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;<input name="call2" type="text" class="table_table_input" size="20" value="<?php echo $array[3];?>"/></td>
  </tr>
  <tr>
    <td>QQ</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;<input name="qq" type="text" class="table_table_input" size="20" value="<?php echo $array[4];?>"/></td>
  </tr>
</table>
<input name="submit" type="submit" value="提交"/>
</form>
</body>
</html>