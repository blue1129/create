<?php
 
//连接数据库
$conn=mysqli_connect('localhost', 'root', '','stu','3306');
$conn->query("SET NAMES 'UTF8'");
if(!$conn){
    die('数据库连接失败'.$mysql_error()); 
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
	<style>
		body{background-image: url(images/12.jpeg);background-attachment: fixed;
            background-size: cover;
            background-repeat:no-repeat;}
		h1{color:aquamarine;font-size:30px;}
		.box{text-align: center;width:100%;}
		.txt{
			overflow:scroll;
		}
           /* .xx,.yy,.zz{text-align: center;width:500px;height:40px;} */
	</style>
</head>

<body>
	<div class="box">
	<h1>项目详情</h1>
	<?php 
        session_start();
        $result=$conn->query("select Wname,Wna,Wsname,Wcon from xmu where Wid={$_GET['id']}");
        $row=$result->fetch_assoc();
    ?>
		<p class="box1">项目标题:<?php echo $row["Wname"]; ?></p>
        <p class="box2">负&nbsp;责&nbsp;人&nbsp;:<?php echo $row["Wna"];?></p>
	    <p class="box3">小组成员:<?php echo $row["Wsname"]; ?></p>
	    <p>项目内容<br><textarea cols="65"rows="10"class="txt"><?php echo $row["Wcon"]; ?></textarea></p>
</div>
 <?php 
 mysqli_close($conn);
 ?>
</body>
</html>