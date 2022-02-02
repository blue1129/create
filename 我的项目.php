<?php
 
//连接数据库
$conn=mysqli_connect('localhost', 'root', '','stu');
$conn->query("SET NAMES 'UTF8'");
if(!$conn){
    die('数据库连接失败'.$mysql_error()); 
}
 session_start();
$sql = "select * from xmu where Wno='{$_SESSION['Qname']}'";
$result = mysqli_query($conn,$sql);
$rows = array();
while($row = mysqli_fetch_assoc($result)){
$rows[] = $row;
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
	<style>
		body{background-image: url(images/10.jpeg);}
		h1{color:green;text-align: center;}
		table,th,td{border:solid 1px black;}
		th,td{width:300px;}
		div{width:100%;}
		#key{width:300px;height:30px;text-align: center;}
	</style>
	<script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
<script type="text/javascript">
function onSearch(obj){//js函数开始
  setTimeout(function(){//因为是即时查询，需要用setTimeout进行延迟，让值写入到input内，再读取
    var storeId = document.getElementById('store');//获取table的id标识
    var rowsLength = storeId.rows.length;//表格总共有多少行
    var key = obj.value;//获取输入框的值
    var searchCol = 0;//要搜索的哪一列，这里是第一列，从0开始数起
    for(var i=1;i<rowsLength;i++){//按表的行数进行循环，本例第一行是标题，所以i=1，从第二行开始筛选（从0数起）
      var searchText = storeId.rows[i].cells[searchCol].innerHTML;//取得table行，列的值
      if(searchText.match(key)){//用match函数进行筛选，如果input的值，即变量 key的值为空，返回的是ture，
        storeId.rows[i].style.display='';//显示行操作，
      }else{
        storeId.rows[i].style.display='none';//隐藏行操作
      }
    }
  },200);//200为延时时间
}
</script>
</head>

<body>
	<h1>我的项目</h1>
	  <div> <br/> 筛选： <input name="key" type="text" id="key" onkeydown="onSearch(this)" value="" placeholder="根据项目名称筛选"/> <br/> </div><br/>
	<table class="tab"id="store">
	<thead>
	<th>项目名称</th>
	<th>项目组负责人</th>
    <th>项目组成员</th>
		<th>项目内容</th>
	</thead>
		<tbody>
		 <?php 
		 foreach($rows as $key => $val)
		 { 
		 	?>
        			<tr>
						
						<td><?php echo $val["Wname"]; ?></td>
						<td><?php echo $val["Wna"]; ?></td>
						<td><?php echo $val["Wsname"]; ?></td>
						<td><a href="<?php echo "yyy.php?id=".$val["Wid"]?>">项目详情</a></td>
					</tr>
		<?php 
		}
		 mysqli_close($conn); 
		?>
		</tbody>
	</table>
</body>
</html>
