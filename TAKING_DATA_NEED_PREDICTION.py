# -*- coding: utf-8 -*-
"""
Created on Wed May  5 09:22:42 2021

@author: evara
"""

import pandas as pd
import pymysql

conn = pymysql.connect(db='EV', user='root', passwd='Admin@123', host='localhost')
cursor = conn.cursor()
query = 'SELECT no_of_visitors,working_time,no_of_ports,power_consumption,parking_slots FROM day_base_visitor_predict ORDER BY id DESC LIMIT 1'

results = pd.read_sql_query(query, conn)
results.to_csv("check_data.csv", index=False)

conn.commit()
cursor.close()
conn.close()