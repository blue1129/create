<?php
 
//连接数据库
$conn=mysqli_connect('localhost', 'root', '','stu','3306');
$conn->query("SET NAMES 'UTF8'");
if(!$conn){
    die('数据库连接失败'.$mysql_error()); 
}
        session_start();
        $result=$conn->query("select Wname,Wna,Wsname,Wno from xmu where Wid={$_GET['id']}");
        
        $row=$result->fetch_assoc();
        $x1 = $row["Wname"];
        $x2 = $row["Wno"];
        $x3 = $row["Wna"];
        $x4 = $row["Wsname"];
      $reslut1=$conn->query("INSERT INTO xxx (Wname,Wno,Wsname,Wna) VALUES ('$x1','$x2','$x4','$x3')");
        echo "<script>
        alert('公示成功');
        </script>";
      
                echo "
                    <script>
                            setTimeout(function(){window.location.href='管理员首页.php';},1000);
                    </script>

                ";
mysqli_close($conn);
?>

