<?php
/*
 *  title:  开放API服务，返回json数据
 *	author: DYBOY
 *	Blog:   https://blog.dyboy.cn
 */
	error_reporting(0);
	header("Content-Type:text/json;charset:utf8");
	$keyword = isset($_GET['key'])?addslashes(trim($_GET['key'])):'';
	include('safe.php');
	$keyword = strFilter($keyword);
	if($keyword == ''){
		$response = [
			"code"=>0,
			"msg"=> "输入内容为空或存在非法字符",
			"key"=>$keyword
		];
		echo json_encode($response);
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
	$mysqli_result = $mysqli->query($sql) or(
		$response = [
			'code'=>0,
			'msg'=>'数据库查询失败'
		]
		and die(json_encode($response))
	);
	
	$results = [];
	while($row=mysqli_fetch_assoc($mysqli_result)){
		array_push($results,$row);
	}
	
	if($results == null){
		$response = [
			'code'=>0,
			'msg'=>"抱歉，未找到"
		];
		echo json_encode($response);
	}
	else{
		$response = [
			'code'=>1,
			'total'=>$pagecount,
			'msg'=>$results
		];
		echo json_encode($response);
	}
	
	exit();
	
	
?>