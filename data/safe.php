<?php
/*
 *  title:  过滤用户参数，防止SQL注入，当时写的很暴力...黑名单方式其实是不建议的
 *	author: DYBOY
 *	Blog:   https://blog.dyboy.cn
 */
	//对用户输入的字符进行检查，并过滤
	//虽然已经在前端对输入参数进行了判断，但是为了避免黑客使用浏览器禁止js脚本可绕过，所以后端php再次过滤
	function strFilter($str){
	    $str = str_replace('`', '', $str);
	    $str = str_replace('~', '', $str);
	    $str = str_replace('!', '', $str);
	    $str = str_replace('！', '', $str);
	    $str = str_replace('@', '', $str);
	    $str = str_replace('#', '', $str);
	    $str = str_replace('$', '', $str);
	    $str = str_replace('￥', '', $str);
	    $str = str_replace('%', '', $str);
	    $str = str_replace('^', '', $str);
	    $str = str_replace('……', '', $str);
	    $str = str_replace('&', '', $str);
	    $str = str_replace('*', '', $str);
	    $str = str_replace('(', '', $str);
	    $str = str_replace(')', '', $str);
	    $str = str_replace('（', '', $str);
	    $str = str_replace('）', '', $str);
	    $str = str_replace('-', '', $str);
	    $str = str_replace('_', '', $str);
	    $str = str_replace('——', '', $str);
	    $str = str_replace('+', '', $str);
	    $str = str_replace('=', '', $str);
	    $str = str_replace('|', '', $str);
	    $str = str_replace('\\', '', $str);
	    $str = str_replace('[', '', $str);
	    $str = str_replace(']', '', $str);
	    $str = str_replace('【', '', $str);
	    $str = str_replace('】', '', $str);
	    $str = str_replace('{', '', $str);
	    $str = str_replace('}', '', $str);
	    $str = str_replace(';', '', $str);
	    $str = str_replace('；', '', $str);
	    $str = str_replace(':', '', $str);
	    $str = str_replace('：', '', $str);
	    $str = str_replace('\'', '', $str);
	    $str = str_replace('"', '', $str);
	    $str = str_replace('“', '', $str);
	    $str = str_replace('”', '', $str);
	    $str = str_replace(',', '', $str);
	    $str = str_replace('，', '', $str);
	    $str = str_replace('<', '', $str);
	    $str = str_replace('>', '', $str);
	    $str = str_replace('《', '', $str);
	    $str = str_replace('》', '', $str);
	    $str = str_replace('.', '', $str);
	    $str = str_replace('。', '', $str);
	    $str = str_replace('/', '', $str);
	    $str = str_replace('、', '', $str);
	    $str = str_replace('?', '', $str);
	    $str = str_replace('？', '', $str);
	    return trim($str);
	}
?>