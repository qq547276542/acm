#! /usr/bin/env python
#encoding:UTF-8
import MySQLdb
def connect_mysql():  #链接数据库
    return MySQLdb.connect("localhost","upcacm","upcacm","acmdb" )