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
import time
	
def do_clawer():   
	output_poj(result_poj)
	output_hdu(result_hdu)
	output_codeforces(result_codeforces)
	output_bestcoder(result_bestcoder)
	
	
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
		print "Error: unable to fecth data"
    
    
	for i in range(len(username_list)):
		vis=[0,0,0,0] #对同一个oj进行判重
		sql = "SELECT ojname,ojusername,sloved,rating FROM clawer WHERE username='"+str(username_list[i]) +"'"
		try:
  		  # 执行SQL语句
			cursor.execute(sql)
 		  # 获取所有记录列表
			results = cursor.fetchall()
			for row in results:
				if row[0] == 'poj':
					if(vis[0]==0):
						score_list[i]=score_list[i]+0.2*10*row[2]
						vis[0]=1
				elif row[0] == 'hdu':
					if(vis[1]==0):
						score_list[i]=score_list[i]+0.12*10*row[2]
						vis[1]=1
				elif row[0] == 'codeforces':
					if(vis[2]==0):
						score_list[i]=score_list[i]+0.5*row[3]
						vis[2]=1
				elif row[0] == 'bestcoder':
					if(vis[3]==0):
						score_list[i]=score_list[i]+0.4*row[3]
						vis[3]=1
		except:
			print "Error: unable to fecth data"
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