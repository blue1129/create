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

//获取用户名密码
session_start();
// 存储 session 数据

    $name = $_POST['gname'];//post获得用户名表单值
    $passowrd = $_POST['gpassword'];//post获得用户密码单值

    if ($name && $passowrd){//如果用户名和密码都不为空
             $sql = "select gd,pass from guanli where gd = '$name' and pass='$passowrd'";//检测数据库是否有对应的username和password的sql
             $result=mysqli_query($conn,$sql);
              while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC)) {//while循环将$result中的结果找出来 
      $dbusername=$row["gd"]; 
      $dbpassword=$row["pass"]; 
    } //返回一个数值
             if( $dbusername  && $dbpassword){//0 false 1 true
              $_SESSION['gd']= $name;
             
                echo "
                    <script>
                            setTimeout(function(){window.location.href='管理员首页.php';},1000);
                    </script>

                ";//如果错误使用js 1秒后跳转到登录页面重试;
             }else{
                echo "<script>
                alert('用户名或密码错误');
                </script>";
                echo "
                    <script>
                            setTimeout(function(){window.location.href='管理员登录.html';},1000);
                    </script>

                ";//如果错误使用js 1秒后跳转到登录页面重试;
             }
             

    }else{//如果用户名或密码有空
                echo "<script>
                alert('表单填写不完整');
                </script>";
                echo "
                      <script>
                            setTimeout(function(){window.location.href='login.html';},1000);
                      </script>";

                        //如果错误使用js 1秒后跳转到登录页面重试;
    }

    mysqli_close($conn);//关闭数据库
?>
