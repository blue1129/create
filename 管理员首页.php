<?php
 
//连接数据库
$conn=mysqli_connect('localhost', 'root', '','stu');
$conn->query("SET NAMES 'UTF8'");
if(!$conn){
    die('数据库连接失败'.$mysql_error()); 
}
 session_start();
$sql = "select * from xmu";
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
		body{background-image: url(https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1593617789286&di=9a02ef31afec48d06c3d24bb8edc55cc&imgtype=0&src=http%3A%2F%2Fb-ssl.duitang.com%2Fuploads%2Fitem%2F201708%2F02%2F20170802121820_J4LUT.jpeg);}
		h1{color:green;text-align: center;}
		table,th,td{border:solid 1px black;}
		table{width:90%;}
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
	<div class="box">
	<h1>公示项目</h1> 
	<div> <br/> 筛选： <input name="key" type="text" id="key" onkeydown="onSearch(this)" value="" placeholder="根据项目名称筛选"/> <br/> </div><br/>
	<table class="tab"id="store">
	<thead>
	<th>项目名称</th>
	<th>项目组负责人学号</th>
	<th>项目组负责人</th>
    <th>项目组成员</th>
	<th>项目内容</th>
	<th>选项</th>
	</thead>
			
		<tbody>
		
		<?php 
		 foreach($rows as  $key => $v)
		 { 
		 	$x1 = $v["Wname"];
            $x2 = $v["Wno"];
            $x3 = $v["Wna"];
            $x4 = $v["Wsname"]; 	                  
		 	?>
        			<tr>
                        
						<td name="x1"><?php echo $v["Wname"];?></td>
						<td name="x2"><?php echo $v["Wno"];?></td>
						<td name="x3"><?php echo $v["Wna"];?></td>
						<td name="x4"><?php echo $v["Wsname"];?></td>
						<td><a href="<?php echo "yyy.php?id=".$v["Wid"]?>">项目详情</a></td>
						<td><a οnclick="var that = this;setTimeout(function(){that.removeAttribute('href');that.οnclick=that=null;}, 0);return true;"href="<?php echo "xxx.php?id=".$v["Wid"]?>" target="_blank">同意公示</a></td>
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
