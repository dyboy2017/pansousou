<!-- 
	作者：DYBOY
	博客：https://blog.dyboy.cn
	Github:https://github.com/dyboy2017
	QQ:1099718640
 -->

<!doctype html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-transform" />

	<title>盘搜搜-pansousou-网盘资源搜索神器</title>
	<meta name="keywords" content="资源网,网站模板,第一资源网,第一资源,福利资源网,大前端美化版,第一资源,手机软件,破解软件,dyboy,站长工具,免费资源,模板资源,源码资源,网站优化,技术教程,建站源码,网络技术,免空免域,模板主题,电脑软件" />
	<meta name="description" content="第一个分享免费福利资源,QQ技术,网站模板,SEO,福利视频,福利软件,黑客技术,活动优惠,购物优惠,编程开发,技术教程,热点新闻,VIP超清影视的全网最大第一资源网!" />
	
	<meta name="apple-mobile-web-app-title" content="极致前端·小东·DYBOY">
	<meta name="generator" content="Pansousou_1.2" />
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" type="text/css" href="./css/main.css">
	<script type="text/javascript" src="./js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="./js/bootstrap.js"></script>
	<script type="text/javascript" src="./js/pagination.min.js"></script>
	
</head>
<body>
	<nav class="navbar navbar-default">
      <div class="container-fluid">
      	<div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="./index.php"><img alt="Brand" width="128px"  src="./images/logo.gif"></a>
	    </div>
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="http://blog.csdn.net/dyboy2017" target="_blank">CSDN</a></li>
	        <li><a href="https://github.com/dyboy2017" target="_blank">Github</a></li>
	        <li><a href="http://www.hackboy.top/weixin.png" target="_blank">赞助小东</a></li>
	        <li><a href="http://wpa.qq.com/msgrd?v=3&uin=1099718640&site=qq&menu=yes" target="_blank">QQ联系</a></li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
      </div>
    </nav>
	<div style="height: 180px" style="clear: both;"></div>

	<div class="container" align="center">
		<div class="header">
			<h1 style="color: #fff">盘搜搜<span style="font-size:14px;">--探索奇妙的世界</span></h1>
		</div>
	    <div class="search_box">
			<div class="row">
			  <div class="col-lg-7" style="float: none;">
			    <div class="input-group">
			      <input type="text" class="form-control" id="input_word" style="height: 50px;" placeholder="搜索发现惊喜...">
			      <span class="input-group-btn">
			        <button class="btn btn-success" id="search_btn" type="button" style="height: 50px;padding: 8px 15px;">搜索一下</button>
			      </span>
			    </div><!-- /input-group -->
			  </div><!-- /.col-lg-7 -->
			</div><!-- /.row -->
	    </div>
	</div>
	
	<div style="height: 25px"></div>
	<div class="container center">
		<div class="result">
			<!-- <div class="panel panel-success"><div class="panel-heading color_green"><h3 class="panel-title">标题：<span>测试标题</span><span style=""><a href="./go/index.php?url=">查看详情</a></span></h3></div><div class="panel-body">大小：<span>100M</span><br/>时间：<span>2017-12-16</span><br/>来源：<span>蓝奏云</span></div></div> -->
		</div>
		<div style="height: 40px"></div>
		<div id="pagination_14"><div class="whj_jqueryPaginationCss-5"><div class="whj_border whj_padding whj_bgc whj_hoverDisable" name="whj_previousPage">上一页</div>&nbsp;第<span class="red_text" id="page_num">1</span>页&nbsp;<div class="whj_border whj_padding whj_bgc whj_hover" name="whj_nextPage">下一页</div><div class="whj_border whj_padding whj_bgc whj_hover" onclick="scrollTo(0,0);">到顶部</div></div></div>
		<div style="height: 250px"></div>
	</div>
	<div class="footer">
		<div class="friend_links">
			<ul>
				<li>友情链接：</li>
				<li><a href="">第一资源网</a></li>
				<li><a href="">蓝奏云</a></li>
				<li><a href="">百度云</a></li>
				<li><a href="">微云</a></li>
			</ul>
		</div>
		<div class="description">
			<p>免责申明：本站仅提供搜索服务，不存储任何资源，所有搜索结果均源于网络，若由用户非法使用造成的后果与本站无关！热爱祖国，为人民服务！--小东QQ:1099718640</p>
		</div>
		<div class="copyright">
			<img src="./images/icon_police.png" width="16px">
			备案号：渝ICP备16008772号
		</div>
	</div>
	
	<script type="text/javascript">

		//初始分页
		function change_page(obj){
			var page_num = $(obj).text();	//点击的页数
			var page_total = $('#total_source').text()/11;	//总的页数
			var page_html = '';
			$(".result").html();
		}
		//plugin
		$("#pagination_14").pagination({
            css: 'css-5',
            totalPage: 18,
            showPageNum: 0,
            isShowFL: false,
            isShowPageSizeOpt: false,
            isShowSkip: false,
            isShowRefresh: true,
            isShowTotalPage: false,
            isResetPage: false,
            callBack: function (currPage) {
                var search_keyword = $("#input_word").val();
                get_data(search_keyword,currPage);
                scrollTo(0,0);
                $("#page_num").text(currPage);
            }

        });

		function get_data(search_keyword,page){
			$.get("./api.php?page="+page+"&keyword="+search_keyword,function(data,status){
				if(status && data.code == 1){
					//获取成功
					var html = "";
					if(data.msg == "") { alert("未找到,换个关键词试试？"); $("#pagination_14").css("display","none"); return; }
					$("#pagination_14").css("display","block");
					$.each(data.msg,function(index,obj){
						html = html + '<div class="panel panel-success"><div class="panel-heading color_green"><h3 class="panel-title">'+(index+1)+'. 标题：<span>'+obj.name+'</span><span style=""><a href="./go/index.php?url='+obj.link+'" target="_blank">查看详情</a></span></h3></div><div class="panel-body">大小：<span class="red_text">'+obj.size+'</span><br/>时间：<span class="red_text">2018-01-03</span><br/>来源：<span class="red_text">蓝奏云</span></div></div>';
					});
					$(".result").html('<div class="red_title">关于'+search_keyword+'的资源共计<span id="total_source">'+data.total+'</span>条</div><div style="height:35px;font-size:16px;"></div>'+html); 
				}
				else{
					console.log('Remote sever error!');
				}
			})
		}

		$(document).ready(function(){
			$("#search_btn").click(function(){
				var search_keyword = $("#input_word").val();
				//判断输入是否完整
				if(search_keyword == ""){
					alert("请输入查询关键词");
					return;
				}
				//过滤不安全字符
				for(var loc = 0;loc<search_keyword.length;loc++){
					if((search_keyword.charAt(loc) == '"')||(search_keyword.charAt(loc) == '&')||(search_keyword.charAt(loc) == ';')||(search_keyword.charAt(loc) == '#')||(search_keyword.charAt(loc) == '%')||(search_keyword.charAt(loc) == '!')||(search_keyword.charAt(loc) == '\'')||(search_keyword.charAt(loc) == '')||(search_keyword.charAt(loc) == '\\')||(search_keyword.charAt(loc) == ';')||(search_keyword.charAt(loc) == '?')||(search_keyword.charAt(loc) == '<')||(search_keyword.charAt(loc) == '>'))
					{
						alert("请不要输入非法参数！");
						return false;
					}
				}
				//调用api查询
				get_data(search_keyword,0);

			})
		})
	</script>
	
</body>
</html>
