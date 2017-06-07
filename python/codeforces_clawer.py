#! /usr/bin/env python
#encoding:UTF-8
import webbrowser  
import re  
import urllib  
import MySQLdb
from config import*
#获取poj网页     
def getHtml_codeforces(url):  
    page = urllib.urlopen(url)  
    html = page.read()  
    return html  

#获取poj中用户信息  
def zhenghe_codeforces(str1,userid,imgre):  
    html =getHtml_codeforces( str1+ userid) 
    return re.findall(imgre,html)  

def output_codeforces(result_codeforces):  #result_xoj: xoj用户数据界面的前缀url
    ojname_list = [] #oj帐号列表
    reg_solved = '<a href="/submissions.+?">[\s]*?([\S]*?)[\s]*?</a>'
    imgre_solved = re.compile(reg_solved)  

    reg_recentProblem = '<a href="/contest[\s\S]*?" title="(.+?)">\r\n[\s\S]*?</a>[\s\S]*?</td>'
    imgre_recentProblem = re.compile(reg_recentProblem)
    
    reg_recentID = '<td>\r\n[\s\S]*?<a href="/contest/([0-9]+?)" title=".+?">'  #获取cf的比赛号，生成超链接时使用
    imgre_recentID = re.compile(reg_recentID)

    reg_rating = '</td>\r\n[\s\S]*?<td>\r\n[\s]*?([\S]*?)[\s]*?</td>\r\n[\s\S]*?<td>\r\n[\s\S]*?</td>\r\n[\s\S]*?</tr>'
    imgre_rating = re.compile(reg_rating)

    db = connect_mysql()
    # 使用cursor()方法获取操作游标 
    cursor = db.cursor()

    # SQL 查询语句 
    sql = "SELECT distinct ojusername FROM clawer  WHERE  ojname='codeforces' " 
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
        list_solved = zhenghe_codeforces(result_codeforces,line,imgre_solved)
        number_solved=0   
        if len(list_solved) == 0:  #如果该用户页面不存在
            number_solved = 0  
        else:  
            for i in range(len(list_solved)):
                number_solved = number_solved + int(list_solved[i])

        list_rating = zhenghe_codeforces(result_codeforces,line,imgre_rating)  #爬取rating 数据
        if len(list_rating) == 0: 
            number_rating = 0
        else:
            number_rating = int(list_rating[0])


        list_recentProblem= zhenghe_codeforces(result_codeforces,line,imgre_recentProblem)
        list_recentID = zhenghe_codeforces(result_codeforces,line,imgre_recentID)
        if len(list_recentProblem)>1:
            list_recentProblem[0]=list_recentProblem[0].replace(" ","_")  #用下划线代替空格
            list_recentProblem[0]=list_recentProblem[0].replace("'","_")  #转义
            list_recentProblem[0]=list_recentProblem[0].replace('"','_')  #转义
            list_str=list_recentProblem[0]
            list_str=list_str+" "+list_recentID[0]
        else:
            list_str=""
        for i in range(1,len(list_recentProblem)):
            list_recentProblem[i]=list_recentProblem[i].replace(" ","_")  #用下划线代替空格
            list_recentProblem[i]=list_recentProblem[i].replace("'","_")  #转义
            list_recentProblem[i]=list_recentProblem[i].replace('"','_')  #转义
            list_str=list_str+" "+list_recentProblem[i]
            list_str=list_str+" "+list_recentID[i]
        alist.append(['暂时没用',line,number_solved,list_str,number_rating])  
    
    print "---------------codeforces:-------------------"
    print "username       ojusername          Solved          recentProblem          rating"
    for i in range(len(alist)):
        print alist[i][0],
        print "       ",
        print alist[i][1],
        print "       ",
        print alist[i][2],
        print "       ",
        print "------",
        print "       ",
        print alist[i][4]

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
            sloved= """+str(alist[i][2])+",recent='"+alist[i][3]+"',problemurl='http://codeforces.com/contest/',"+" rating='"+str(alist[i][4])+"""' 
            WHERE ojname='codeforces' AND ojusername='"""+alist[i][1]+"' "
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


result_codeforces = "http://codeforces.com/contests/with/"  
   
#print "正在生成数据......"  
#output_codeforces(result_codeforces)
#print "数据抓取完毕！"