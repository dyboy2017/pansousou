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
