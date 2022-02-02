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
    body{background-image: url(images/08.jpeg);color:antiquewhite;}
    .box1{float:left;width:200px;}
    .lli{width:150px;height:150px;}
    .lli img{width:150px;height:150px;}
     ul li{list-style:none;margin:15px;float:left;width:150px;height:20px;}
    
    a{margin:50px;}
      .main{
        float:right;
    width:600px;
    height:600px;
    margin:110px 150px 50px 50px;
  }
  #box1{
    float:left;
    width:496px;
    height:310px;
    border:2px solid #ccc;
  }
  #box2{
    float:left;
    margin-top:2px;
  }
  #box1 img{
    width:496px;
    height:310px;
  }
  .ted{
    width:80px;
    height:63px;
    border:1px solid #fff;
    margin-top:-2px;
    text-align:center;
    line-height:62px;
    background-color:#ccc;
  }
  .imgs{
    height:310px;
    display:none;
  }
  .now{
    display:block;
  }
  </style>

</head>

<body>
  <?php 
        session_start();
        $result1=$conn->query("SELECT Sname FROM student WHERE Qname='{$_SESSION['Qname']}'");
        $row1=$result1->fetch_assoc();
        $result2=$conn->query("SELECT Ssex FROM student WHERE Qname = '{$_SESSION['Qname']}'");
        $row2=$result2->fetch_assoc();
        $result3=$conn->query("SELECT Sclass FROM student WHERE Qname = '{$_SESSION['Qname']}'");
        $row3=$result3->fetch_assoc();
         $result4=$conn->query("SELECT Sacade FROM student WHERE Qname = '{$_SESSION['Qname']}'");
        $row4=$result4->fetch_assoc();
         $result5=$conn->query("SELECT Major FROM student WHERE Qname = '{$_SESSION['Qname']}'");
        $row5=$result5->fetch_assoc();
    ?>
    <div class="box">
      <div class="box1">
  <ul>
    <li class="lli"><img src="https://ss0.bdstatic.com/70cFvHSh_Q1YnxGkpoWK1HF6hhy/it/u=2802961770,1111924548&fm=26&gp=0.jpg"></li>
  <li>姓名：<?php echo $row1["Sname"];?></li>
  <li>性别：<?php echo $row2["Ssex"];?></li>
  <li>学院：<?php echo $row4["Sacade"];?></li>
    <li>专业：<?php echo $row5["Major"];?></li>
  <li>班级：<?php echo $row3["Sclass"];?></li>
  </ul>
    <a href="修改个人信息.html">修改信息</a>
 
  
</div>
<div class="main">
      <div id="box1">
      <img class="imgs now" src="images/01.jpg">
      <img class="imgs" src="images/02.jpeg">
      <img class="imgs" src="images/03.jpeg">
      <img class="imgs" src="images/04.jpg">
      <img class="imgs" src="images/05.jpg">
    </div>
    <div id="box2">
      <div class="ted">1</div>
      <div class="ted">2</div>
      <div class="ted">3</div>
      <div class="ted">4</div>
      <div class="ted">5</div>
    </div>
    </div>
  </div>
      <script>
    var str=document.getElementsByClassName("ted");
    var sth=document.getElementsByClassName("imgs");
    for(var i=0;i<str.length;i++)
    {
      str[i].onmouseover=function()
      {
        for(var j=0;j<str.length;j++)
        {
          if(str[j]==this)
          {
            sth[j].classList.add('now');
          }
          else
            sth[j].classList.remove('now');
        }
      }
    }
  </script>
  <?php mysqli_close($conn); ?>
</body>
</html>
