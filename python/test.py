#! /usr/bin/env python3
#encoding:UTF-8
import webbrowser  
import re  
import urllib  
#获取hdu网页  
def getHtml_hdu(url):  ##根据完整url地址，返回该页面的html文本
    page = urllib.urlopen(url)  
    html = page.read()  
    return html  
#获取poj网页     
def getHtml_poj(url):  
    page = urllib.urlopen(url)  
    html = page.read()  
    return html  


#获取hdu中用户信息  
def zhenghe_hdu(str1,userid,imgre):  
    html=getHtml_hdu( str1+userid )  #用户信息的完整url地址
    return re.findall(imgre,html)    #寻找定位imgre标签段在该html文件中出现位置

  
#获取poj中用户信息  
def zhenghe_poj(str1,userid,imgre):  
    html =getHtml_poj( str1+ userid)  
    return re.findall(imgre,html)  
  
  
#文件读出用户账号进行统计  
def readFile(result_hdu,result_poj):  #result_xoj: xoj用户数据界面的前缀url
    file_object = open("users.txt",'r')  
    
    reg_hdu = r'<tr><td>Problems Solved</td><td align=center>(.*?)</td></tr>'  
    imgre_hdu = re.compile(reg_hdu)  
    reg_poj = '<tr><td width=15% align=left>Solved:</td>[\s\S]*?<td align=center width=25%><a href=.*?>(.+?)</a></td>'  
    imgre_poj = re.compile(reg_poj)  
  
    alist = []  #定义一个列表  
    for line in file_object:  #每一行为一个用户名，分别分析
        line=line.strip('\n')    #去掉读取的每行的"\n"  
  
        list_hdu = zhenghe_hdu(result_hdu,line,imgre_hdu)  
        list_poj = zhenghe_poj(result_poj,line,imgre_poj)  
          
        if len(list_hdu) == 0:  
            number_hdu = 0  
        else:  
            number_hdu = eval(list_hdu[0])  
  
  
        if len(list_poj) == 0:  
            number_poj = 0  
        else:  
            number_poj = eval(list_poj[0])  
  
        alist.append([line,number_hdu,number_poj,number_hdu+number_poj])  
        print "处理完一个用户信息"  
    

    print "username            hdu       poj       sum"
    for i in range(len(alist)):
    	for j in range(len(alist[i])):
    		print alist[i][j],
    		print "      ",
    	print ""
    
  
result_hdu = "http://acm.hdu.edu.cn/userstatus.php?user="  
result_poj = "http://poj.org/userstatus?user_id="  
  
print "正在生成数据......"  
readFile(result_hdu,result_poj)  
print "数据抓取完毕！"

