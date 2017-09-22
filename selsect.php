<html xmlns="http://www.w3.org/1999/xhtml" onclick="start(event)">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style type="text/css">
    img{
      position:absolute;
      top:100px;
      left:100px;
    }
  </style>
    <title>bingo 点击有彩蛋呦</title>
  <script type="text/javascript">

      function start(e) {
          var obj = document.createElement("img");

 	      var obj1 = document.getElementById("h1");
 	      var number = obj1.value;
 	      var  name=Math.floor(Math.random()*number-1);
// 		  var path="./photo/1 "+"("+name+")"+".jpg";
// 		  alert(path);

//           obj.src=path;
          obj.src="./photo/"+name+".jpg";
	//	  alert(obj.src);
          var w =Math.floor(Math.random()*81+100);

          obj.width=w;
          var x= e.clientX;
          var y=e.clientY;

          obj.style.position="absolute";
          obj.style.top=y+"px";
          obj.style.left=x+"px";
          document.body.appendChild(obj);
      }
//       function on(){
//     	  var obj2 = document.getElementById("h2");
//     	  var zhi = obj2.value;
//     	  var dian= zhi.lastIndexOf(".");
//     	  var houzhui=zhi.substr(dian+1);
//     	  houzhui=houzhui.toLowerCase();
//     	  if(houzhui=="jpg"){
//         	  alert("恭喜你格式没得问题");
//           }else{
// 				alert("目前只接受jpg格式结尾的，换一个吧");
//               }
      
  </script>
  </head>

<body>
<?php 

header("Content-type:text/html;charset=utf-8");

require_once 'xmlhelper.class.php';
    session_start();
    if ($_SESSION['name']!="ok"){
        header("Location:warning.php?error=3");
        exit();
    }


    $xmldoc=new xmlhelper("address.xml");
    $xmldoc->secxml();


?>

    <a href="download.php">下载目前的xml文档</a><br>
    	<a href="index.html">返回主页</a><br>
    <form action="uploadprocess.php"  enctype="multipart/form-data" method="post" >
    <h1> 提交您的图片(目前只接受jpg格式的图片- -)</h1>
    <p>目前共有
    <?php
$dir    = "./photo";
$files1 = scandir($dir);
$files2 = scandir($dir, 1);
$count=count($files1)-2;
echo $count;
// print_r($files1);
// print_r($files2)
?>张</p>
	<input type="file" name="myfile" id="h2"/>
	<input type="hidden" name="hidden" id="h1" value="<?php echo $count-1; ?>">
	<input type="submit" value="提交"  />



</form>
	<audio src="7.mp3" loop="loop"  controls >

</body>
</html>