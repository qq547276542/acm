#! /usr/bin/env python
#encoding:UTF-8
import webbrowser  
import re  
import urllib  
import MySQLdb
from config import*
#获取poj网页     
def getHtml_poj(url):  
    page = urllib.urlopen(url)  
    html = page.read()  
    return html  

#获取poj中用户信息  
def zhenghe_poj(str1,userid,imgre):  
    html =getHtml_poj( str1+ userid) 
    return re.findall(imgre,html)  

def output_poj(result_poj):  #result_xoj: xoj用户数据界面的前缀url
    # file_object = open("users.txt",'r')  
    ojname_list = [] #oj帐号列表
    reg_solved = '<tr><td width=15% align=left>Solved:</td>[\s\S]*?<td align=center width=25%><a href=.*?>(.+?)</a></td>'  
    imgre_solved = re.compile(reg_solved)  

    reg_recentProblem = "p\((.+?)\)"
    imgre_recentProblem = re.compile(reg_recentProblem)
    
    db = connect_mysql()
    # 使用cursor()方法获取操作游标 
    cursor = db.cursor()

    # SQL 查询语句
    sql = "SELECT distinct ojusername FROM clawer  WHERE  ojname='poj' " 
    try:
        # 执行SQL语句
      cursor.execute(sql)
       # 获取所有记录列表
      results = cursor.fetchall()
      for row in results:
          ojname_list.append(row[0])
    except:
      print "Error: unable to fecth data"

    # 关闭数据库连接
    db.close()

    alist = []  #定义一个列表  
    for line in ojname_list:  #每一行为一个用户名，分别分析
        line=line.strip('\n')    #去掉读取的每行的"\n"  
        list_solved = zhenghe_poj(result_poj,line,imgre_solved)   
        if len(list_solved) == 0:  #如果该用户页面不存在
            number_solved = 0  
        else:  
            number_solved = list_solved[0]

        list_recentProblem= zhenghe_poj(result_poj,line,imgre_recentProblem)
        if len(list_recentProblem)>1:
            list_str=list_recentProblem[1]
        else:
            list_str=""
        for i in range(2,len(list_recentProblem)):
            list_str=list_str+" "+list_recentProblem[i]
        alist.append(['暂时没用',line,number_solved,list_str])  
    
    print "---------------poj:-------------------"
    print "username       ojusername          Solved          recentProblem"
    for i in range(len(alist)):
        print alist[i][0],
        print "       ",
        print alist[i][1],
        print "       ",
        print alist[i][2],
        print "       ",
        print "------"

    # 打开数据库连接
    db = connect_mysql()

    # 使用cursor()方法获取操作游标 
    cursor = db.cursor()
    
    for i in range(len(alist)):
        # SQL 插入语句
        #sql = """INSERT INTO clawer(username,
          #   ojname, ojusername, sloved, recent, problemurl)
          #   VALUES ("""+"'"+alist[i][0]+"', 'poj', '"+alist[i][1]+"', "+alist[i][2]+", '"+alist[i][3]+"','http://poj.org/problem?id=')"
        #try:
          # 执行sql语句
         #  cursor.execute(sql)
           # 提交到数据库执行
         #  db.commit()
    #    except:
           # Rollback in case there is any error
    #      db.rollback()    
        sql = """UPDATE clawer SET
            sloved= """+str(alist[i][2])+",recent='"+alist[i][3]+"""',problemurl='http://poj.org/problem?id=' WHERE
            ojname='poj' AND ojusername='"""+alist[i][1]+"' "
        try:
             # 执行sql语句
            cursor.execute(sql)
            # 提交到数据库执行
            db.commit()
        except:
            # Rollback in case there is any error
            print "sql error"
            db.rollback()    
        # 关闭数据库连接
    db.close()


result_poj = "http://poj.org/userstatus?user_id="  

#print "正在生成数据......"  
#output_poj(result_poj)
#print "数据抓取完毕！"
