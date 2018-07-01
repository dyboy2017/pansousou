> 盘搜搜项目是小东之前为了讲爬虫基础的一个实战完结项目，之前由于各种原因不能开源出来，现在把数据前后端全部公开出来，仅供学习参考，技术交流！

### 0x00 项目简介：
本项目如题所叙述，简而言之，就是一个搜集网盘数据，并提供在线搜索资源的一个项目，方便了那些苦于资源难寻，其他网站都是广告的朋友，本项目提供简单的关键词搜索，简洁的页面一目了然，同时对于web应用安全有做充分得过滤，保障在线服务的安全稳定。

[![](https://upload-images.jianshu.io/upload_images/6661013-7a5293211b28f80b.png)](https://upload-images.jianshu.io/upload_images/6661013-7a5293211b28f80b.png)
***
### 0x01 环境需求：
1.`PHP version > 5.4`

2.`MYSQL Database`

3.`python version  3.x`

***
### 0x02 使用说明：
在本地搭建PHP环境，比如使用`XAMPP`、`PHPStudy`即可快速搭建，导入下方的`lanzou.sql`（附件下载）到`Mysql数据库`，配置好前端中的`api.php`中的api地址为自己的即可。

前端搜索需要配置后数据库连接，在`data/dblink.php`中填写好数据库连接信息

同理可搭建到在线服务上~

### 0x03 爬虫数据抓取：
这里就直接粘贴爬虫源码，注释也很清楚了，需要注意的是：

之前做爬虫项目爬了蓝走网盘`160w+`的网盘资源，某些原因只能公开部分数据（大约`36w+`）给大家了。

蓝奏网盘在我做网盘爬虫这个项目的时候，恰好关闭了接口，增加了反爬虫机制，以至于大多数的什么网盘扫描器不能使用，包括本爬虫，开源只是为了给大家一个参考，若有独到见解，还望指导一二。

``` python
# 抓取蓝奏网盘资源+链接
# 作者： DYBOY 小东
# 时间：2017-09-15
#verion：1.1
#description：抓取蓝奏网盘的数据并存入数据库，便于数据的查找，后续将开发WEB端，进行网盘资源的搜索！

import requests
import pymysql
import re
import sys

from bs4 import BeautifulSoup
#以上作为基本引用

#连接数据库
try:
    db = pymysql.connect(host = '127.0.0.1',port = 3306,user = 'root',passwd = '',db = 'pan',charset='utf8')
    print('连接数据库成功')
except Exception as e:
    print(e);
cursor = db.cursor()

#基础索引全局变量
id_num = 0
main_url = 'https://pan.lanzou.com/'

#循环获取数据
#for num in range(670000,849604):
for num in range(20630,849604):
    url = main_url + '1' + str(num)
    header = {'User-Agent':'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36'}  
    #尝试获取网页数据
    try:
        res = requests.get(url,headers = header,timeout = 5)
    except Exception as e:
        print('获取网页出错，跳过获取下一个...')
    res.encoding = 'utf-8'#编码转换

    if res.status_code == 200:
        soup = BeautifulSoup(res.text,'html.parser')
        title = soup.select('title')[0].text[:-8]
        if len(title)>0:
            url_now = url
            id_num = id_num + 1
            #正则匹配文件大小
            guize = r'<span class="p7">文件大小：</span>(.*?)<br>'
            try:
                filesize = re.findall(guize,res.text)[0]
            except Exception as e:
                filesize = '未知大小'
                print(e)
                print('erro2')

            #构造sql语句
            sql = "insert into lanzou4(name,link,size) values('%s','%s','%s');" %(title,url_now,filesize)
            #尝试写入数据库
            try:
                cursor.execute(sql)
                db.commit()
            except Exception as e:
                print(e)
            num = num + 1
    #print(id_num)
    if(num%5000 == 0):
        print('已经抓取5000条数据')

print('ok!!!共抓取' + str(id_num) + '个资源')

```
***
### 0x04 开源说明：
本项目开源到Github，遵守开源协议，保留开发者的版权声明，既是对开发者劳动的尊重，也是对开发者开源项目的鼓励。希望国内的开源环境会越来越好！

### 0x05 预览地址：
http://pan.dyboy.cn

### 0x06 开源地址：
https://github.com/dyboy2017/pansousou

### 0x07 附件：
项目所有文件打包：https://www.lanzous.com/b294693/

**原文地址：https://blog.dyboy.cn/develop/47.html
