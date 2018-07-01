<?php
	error_reporting(0);
	header("Content-Type:text/json;charset:utf8");
	$keyword = isset($_GET['keyword'])?$_GET['keyword']:'';
	$page = intval($_GET['page'],0);
	function curl_get($url)
	{
		$ch=curl_init($url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36');
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		$content=curl_exec($ch);
		curl_close($ch);
		return($content);
	}
        //下方的链接的域名，改为自己的即可，演示站点即将关闭，接口也停止使用
	$url = 'http://pan.dyboy.cn/date/search_api.php?key='.$keyword.'&page='.$page;

	$file=curl_get($url);
	
	echo $file;

?>
