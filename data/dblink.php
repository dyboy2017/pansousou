<?php
	$mysqli = new mysqli('xxxx','xxx','xxx','xxxx');//连接数据库--改成自己的
	if($mysqli->connect_errno > 0){
		echo "#202-数据库异常！<br/><a href='../index.php'>返回登陆</a>";
		exit;
	}
	$mysqli->query("SET NAMES UTF8");
?>
