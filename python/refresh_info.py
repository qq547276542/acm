#! /usr/bin/env python
#encoding:UTF-8
import webbrowser  
import re  
import urllib  
import MySQLdb
import thread
from config import*
from poj_clawer import*
from hdu_clawer import*
from codeforces_clawer import*
from bestcoder_clawer import*
from upc_clawer import*
from vj_clawer import*
import time
    
def do_clawer():   
    try:
    #    output_poj(result_poj)
        pass
    except:
        print "poj似乎连不上哦..."
    try:
        output_hdu(result_hdu)
    except:
        print "hdu似乎连不上哦..."
    try:
        output_codeforces(result_codeforces)
    except:
        print "cf似乎连不上哦..."
    try:
        output_bestcoder(result_bestcoder)
    except:
        print "bc似乎连不上哦..."
    try:
        output_upc(result_upc)
    except:
        print "code.upc似乎连不上哦..."
    try:
        pass
        #output_vj(result_vj)
    except:
        print "virtual judge似乎连不上哦..."
    
def cal_score():
    username_list=[]  #用户名列表
    score_list=[] #用户名对应的积分列表
    db = connect_mysql()
    # 使用cursor()方法获取操作游标 
    cursor = db.cursor()
    
    # SQL 查询语句 
    sql = "SELECT distinct username FROM clawer " 
    try:
        # 执行SQL语句
        cursor.execute(sql)
       # 获取所有记录列表
        results = cursor.fetchall()
        for row in results:
            username_list.append(row[0])
            score_list.append(0.0)
    except:
        print "Error: unable to fecth data~~"
    
    for i in range(len(username_list)):
        maxxSloved=[0,0,0,0,0,0] #对同一个oj记录最大值
        maxxRating=[0,0,0,0,0,0] #对同一个oj记录最大值
        sql = "SELECT ojname,ojusername,sloved,rating FROM clawer WHERE username='"+str(username_list[i]) +"'"
        try:
            # 执行SQL语句
            cursor.execute(sql)
           # 获取所有记录列表
            results = cursor.fetchall()
            for row in results:
                sloved=row[2]
                rating=row[3]
                if sloved == None:
                    sloved=0
                if rating == None:
                    rating=0
                curp=0
                if row[0] == 'poj':
                    curp=0
                elif row[0] == 'hdu':
                    curp=1
                elif row[0] == 'codeforces':
                    curp=2
                elif row[0] == 'bestcoder':
                    curp=3
                elif row[0] == 'upc':
                    curp=4
                elif row[0] == 'vj':
                    curp=5
                if sloved>maxxSloved[curp]:
                    maxxSloved[curp]=sloved
                if rating>maxxRating[curp]:
                    maxxRating[curp]=rating
        except Exception, e:
            print  str(e)
            pass

        score_list[i]=0
        score_list[i]=2*maxxSloved[0]+1.5*maxxSloved[1]+6*maxxSloved[2]+6*maxxSloved[3]+1*maxxSloved[4]+6*maxxSloved[5]
        ratingsum=maxxRating[2]+maxxRating[3]
        if maxxRating[2] > 1400:
        	ratingsum+=(maxxRating[2]-1400)*1
        if maxxRating[2] > 1600:
        	ratingsum+=(maxxRating[2]-1600)*3
        if maxxRating[2] > 1800:
        	ratingsum+=(maxxRating[2]-1800)*5

        if maxxRating[3] > 1600:
        	ratingsum+=(maxxRating[3]-1600)*1
        if maxxRating[3] > 1800:
        	ratingsum+=(maxxRating[3]-1800)*4

        score_list[i]+=ratingsum
        score_list[i]=int(score_list[i])
    
    aver=0
    avernum=0
    for i in range(len(username_list)):
        if score_list[i] > 100:
            aver+=score_list[i]
            avernum+=1
    if avernum < 0:
    	avernum = 1
    aver/=int(avernum)
    for i in range(len(username_list)):
    	if score_list[i] == 0:
    		continue
    	score_list[i]=aver+(score_list[i]-aver)*0.7
    	score_list[i]=int(score_list[i])
    now_date = str(time.strftime("%Y-%m-%d"))
    for i in range(len(username_list)):
        score = str(score_list[i])
        username = str(username_list[i])
        sql = "UPDATE person SET score="+score+"  WHERE username='"+username+"'"
        #print sql
        try:
             # 执行sql语句
            cursor.execute(sql)
            # 提交到数据库执行
            db.commit()
        except:
            # Rollback in case there is any error
            print "sql error"
            db.rollback()    

        flag = 0
        sql = "INSERT INTO score_record VALUES ('"+username+"', '"+now_date+"', "+score+")"
        try:
             # 执行sql语句
            cursor.execute(sql)
            # 提交到数据库执行
            db.commit()
        except:
            # Rollback in case there is any error
            #print "sql error"
            db.rollback()    
            flag = 1

        if flag == 1 : #如果今天已经插入过score，则执行update
            sql = "UPDATE score_record SET score="+score+" WHERE username='"+username+"' AND date='"+now_date+"'"
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


print "正在爬取数据...."
do_clawer()
print "数据爬取完成！"
cal_score()