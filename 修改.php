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
$sql = "SELECT * FROM student";
$result = mysqli_query($conn, $sql);
if ($result===false) {
    die('执行出错');
};
$arr=array();
//获取用户名密码
session_start();
// 存储 session 数据

    $name = $_POST['sname'];//post获得用户名表单值
        $sex = $_POST['ssex'];
        $class = $_POST['sclass'];
        $saca=$_POST['saca'];
    $sma=$_POST['sma'];
    if ($name && $sex && $class){//如果用户名等信息都不为空
    while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
    $arr[]=$row;
}
$xx = $_SESSION['Qname'];
foreach ($arr as $row) {
    if ($row['Qname'] == $xx) {
            $sql="UPDATE student set Sname='$name',Ssex='$sex',Sclass='$class' ,Sacade='$saca',Major='$sma'
            where Qname= '$xx'";
            $result=mysqli_query($conn, $sql);
        }
    }
}

else{//如果用户名或密码有空
                echo "<script>
                alert('表单填写不完整');
                </script>";
                echo "
                      <script>
                            setTimeout(function(){window.location.href='个人中心.php';},1000);
                      </script>";

                        //如果错误使用js 1秒后跳转到登录页面重试;
    }
    echo "
                      <script>
                            setTimeout(function(){window.location.href='个人中心.php';},1000);
                      </script>";

    mysqli_close($conn);//关闭数据库
    ?>