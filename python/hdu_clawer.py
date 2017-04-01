#! /usr/bin/env python
#encoding:UTF-8
import webbrowser  
import re  
import urllib  
import MySQLdb
from config import*
#获取hdu网页  
def getHtml_hdu(url):  ##根据完整url地址，返回该页面的html文本(包括js的完整代码)
    page = urllib.urlopen(url)  
    html = page.read()  
    return html  

#获取hdu中用户信息  
def zhenghe_hdu(str1,userid,imgre):  
    html=getHtml_hdu( str1+userid )  #由用户信息的完整url地址，获取html文本串
    return re.findall(imgre,html)    #匹配正则表达式imgre在html串中出现的部分
                                     #当imgre有()的时候，只以列表的形式返回()内的内容

#文件读出用户账号进行统计  
def output_hdu(result_hdu):  #result_xoj: xoj用户数据界面的前缀url
    file_object = open("users.txt",'r')  
    
    reg_solved = r'<tr><td>Problems Solved</td><td align=center>(.*?)</td></tr>'  
    imgre_solved = re.compile(reg_solved)   #编译生成正则表达式
    
    alist = []  #定义一个列表  
    for line in file_object:  #每一行为一个用户名，分别分析
        line=line.strip('\n')    #去掉读取的每行的"\n"  
        list_solved = zhenghe_hdu(result_hdu,line,imgre_solved)  
        if len(list_solved) == 0:  
            number_solved = 0  
        else:  
            number_solved = list_solved[0]     
  
        alist.append([line,number_solved])  
    
    print "----------------hdu :----------------- "
    print "username              Solved       "
    for i in range(len(alist)):
    	for j in range(len(alist[i])):
    		print alist[i][j],
    		print "         ",
    	print ""

result_hdu = "http://acm.hdu.edu.cn/userstatus.php?user="  
print "正在生成数据......"  
output_hdu(result_hdu)
print "数据抓取完毕！"