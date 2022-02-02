<?php
 
//连接数据库
$conn=mysqli_connect('localhost', 'root', '','stu','3306');
$conn->query("SET NAMES 'UTF8'");
if(!$conn){
    die('数据库连接失败'.$mysql_error()); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color:bisque;
        }
        .box{
            margin: 0 348px;
            text-align: center;

        }
        h2{
            color:cadetblue;

        }
        table{
           text-align: center;
        }
        th,td{
            padding: 0 2px;
        }
        
    </style>
</head>
<body>
<?php 
        session_start();
        // $result1=$conn->query("SELECT Sno,Sname,yuwen,math,eng,major,cre FROM grade WHERE Sno={$_SESSION['Qname']}");
        $result1=$conn->query("SELECT Sno,Sname,yuwen,math,eng,major,cre FROM grade");
        // $row1=$result1->fetch_assoc();   
        $row1=array();
        while($row = mysqli_fetch_assoc($result1)){
            $row1[] = $row;
            }
    ?>
    <div class="box">
        <h2>2021-2022第一学期成绩</h2>
        <table>
            <thead><th>学号</th>
            <th>姓名</th>
            <th>语文</th>
            <th>数学</th>
            <th>英语</th>
            <th>专业课</th>
            <th>创新创业</th></thead>
            <tbody><?php 
		 foreach($row1 as $key => $v)
		 { 
		 	
		 	?>
        			<tr>
        			
						<td><?php echo $v["Sno"]; ?></td>
						<td><?php echo $v["Sname"]; ?></td>
						<td><?php echo $v["yuwen"]; ?></td>
						<td><?php echo $v["math"]; ?></td>
						<td><?php echo $v["eng"]; ?></td>
                        <td><?php echo $v["major"]; ?></td>
                        <td><?php echo $v["cre"]; ?></td>
					
					</tr>
                    <?php 
         }
                    mysqli_close($conn); 
                    ?>
	 </tbody>
        </table>
    </div>
    
</body>
</html>