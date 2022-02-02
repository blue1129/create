<?php 
    header("Content-Type: text/html; charset=utf8");

    if(!isset($_POST['submit'])){
        exit("错误执行");
    }//判断是否有submit操作

    $name=$_POST['name'];//post获取表单里的name
    $password=$_POST['password'];//post获取表单里的password
    $sname=$_POST['ssname'];
    $ssex=$_POST['ssex'];
    $sclass=$_POST['sclass'];
    $saca=$_POST['saca'];
    $sma=$_POST['sma'];
    $con=mysqli_connect("localhost","root","","stu",'3306');//链接数据库
    $dbusername=null;

$sql =  "select Qname from student where Qname = '$name'";
$result=mysqli_query($con,$sql);
 while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC)) {//while循环将$result中的结果找出来 
      $dbusername=$row["Qname"]; 
     
    } 
if(!is_null($dbusername)){
   
    
         echo "<script>
         alert('注册失败');
         </script>";//如果sql执行失败输出错误
    }else{
         $q="INSERT INTO `student` VALUE ('$name','$sname','$ssex','$sclass','$saca','$password','$sma')
";//向数据库插入表单传来的值的sql
    $reslut=mysqli_query($con,$q);
        echo "<script>
        alert('注册成功');
        </script>";//成功输出注册成功
        echo "
                    <script>
                            setTimeout(function(){window.location.href='login.html';},1000);
                    </script>

                ";
    }

    

    mysqli_close($con);//关闭数据库

?>