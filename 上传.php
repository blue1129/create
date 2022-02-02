<?php
    header("Content-Type: text/html; charset=utf8");
    if(!isset($_POST["submit"])){
        exit("错误执行");
    }//检测是否有submit操作 

     error_reporting(E_ALL ^ E_NOTICE); 



//连接数据库
$conn=mysqli_connect('localhost', 'root', '','stu','3306');
$conn->query("SET NAMES 'UTF8'");
if(!$conn){
    die('数据库连接失败'.$mysql_error()); 
}
mysqli_query($conn, "SET names UTF8");
//获取用户名密码
session_start();
// 存储 session 数据

    $nname = $_POST['nname'];//post获得用户名表单值
        $pep = $_POST['pep'];
        $all = $_POST['tatal'];
        $con = $_POST['wen'];
    if ($nname && $pep && $all && $con){
        $xx = $_SESSION['Qname'];
      $q="INSERT INTO xmu(`Wname`,`Wno`,`Wsname`,`Wna`,`Wcon`) VALUES ('$nname','$xx','$all','$pep','$con')";
      $reslut=mysqli_query($conn,$q);
      echo "<script>
      alert('上传成功');
      </script>";
        echo "
                    <script>
                            setTimeout(function(){window.location.href='课设首页.html';},1000);
                    </script>

                ";
}


else{
                echo "<script>
                alert('表单填写不完整');
                </script>";
                echo "
                      <script>
                            setTimeout(function(){window.location.href='上传项目.html';},1000);
                      </script>";

                     }

    mysqli_close($conn);//关闭数据库
    ?>