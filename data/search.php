<?php
/*
 *  title:  函数处理 V1.0版本的
 *	author: DYBOY
 *	Blog:   https://blog.dyboy.cn
 */
	error_reporting(0);
	header("Content-Type:text/html;charset-utf-8");
	$keyword = $_GET['key'];
	include('safe.php');
	$keyword = strFilter($keyword);
	if($keyword == ''){
		echo "您的输入有误，请重新输入<br/><a href='../index.html'>点击返回</a>";
		exit;
	}
	include('dblink.php');//链接数据库
	//页数处理
	$sql_num = "SELECT COUNT(*) as total FROM lanzou WHERE name like '%" . $keyword . "%'";
	$page_result = $mysqli->query($sql_num);
	$pagecount = mysqli_fetch_array($page_result);
//	var_dump($pagecount);
	if($pagecount){
		$pagecount = $pagecount['total'];//得到查询结果的数据总数
		mysqli_free_result($page_result);
		//	var_dump($pagecount);
		//获取页数,判断是否符合要求  
		//从客户端获取当前请求的页数
		$page = intval($_GET['page'],0); 
		if($page <=0) {$page= 1;}  
		elseif($page > $pagecount){ $page = $pagecount; }
		//定义每页显示的个数：  
		$pageshow = 11;  
		$pagesize = ($page-1) * $pageshow;  
		//计算总页数:  
		$numpages = ceil($pagecount/$pageshow);   //向上取整；
	}
	
	//数据库查询关键词
	$sql = "SELECT * FROM lanzou WHERE name like '%" . $keyword . "%' limit $pagesize,$pageshow";
	$mysqli_result = $mysqli->query($sql) or die("抱歉没有找到哦！<br/><a href='../index.html'>点击返回</a>");
	if(($row = (mysqli_fetch_array($mysqli_result))) == false){
		echo "抱歉没有找到哦！<br/><a href='../index.html'>点击返回</a>";
		exit;
	}
	else{
		$rows[] = $row;
		while(true){
			$row = $mysqli_result->fetch_array(MYSQLI_ASSOC);
			if($row){
				$rows[] = $row;
			}
			else{
				break;
			}
		}
	}
	
	
?>


<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>蓝奏网盘搜索 - 惊喜从搜索开始 -DYBOY</title>
	<link rel="stylesheet" href="../css/search_result.css" />
</head>
<body>
	<div class="header">
		关于“<?php echo $keyword; ?>”的搜索结果共有<?php echo $pagecount; ?>个
	</div>
	
	<div class="list">
		<?php
			foreach ($rows as $row ) {
		?>
		<div class="list-box">
			<div class="list-up">
				<a target="_blank" href="http://pan.dyboy.cn/go/?url=<?php echo $row['link']; ?>"><h2><?php echo $row['name']; ?></h2></a>
			</div>
			<div class="list-down">
				<p>文件大小：<?php echo $row['size']; ?> M</p>
				<p>文件来源：蓝奏网盘</p>
				<p><?php echo $row['link']; ?></p>
			</div>
		</div>
		<?php
			}
			$prevpage = $page - 1;
			$nextpage = $page + 1;  
		?>
		<!--显示首页和上一页的条件-->  
		<div class="page">
			<a href="../index.html">返回搜索</a>
		<?php if($page > 1)  {?> 
		    <a href="?page=1&key=<?php echo $keyword; ?>">列表首页</a>
		    <a href="?page=<?php echo $prevpage;?>&key=<?php echo $keyword; ?>">上一页</a> 
		    
		<?php  }  ?>  
		  
		<!--显示下一页和尾页的条件-->  
		<?php if($page < $numpages)  {?> 
			
			<a href="?page=<?php echo $nextpage; ?>&key=<?php echo $keyword; ?>">下一页</a>  
	    	<a href="?page=<?php echo $numpages;?>&key=<?php echo $keyword; ?>">列表尾页 </a>

		<?php  }  ?>
		</div> 
		  
	</div>
	
</body>
</html>

