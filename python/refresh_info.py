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
	
def do_clawer():   #多线程爬取多个网站数据(有问题，跑的不是多线程，以后调)
	try:
		thread.start_new_thread(output_poj)
		thread.start_new_thread(output_hdu)
		thread.start_new_thread(output_codeforces)
		thread.start_new_thread(output_bestcoder)
	except:
		print "Error: thread have some problem"
	
def cal_score():
	
do_clawer()