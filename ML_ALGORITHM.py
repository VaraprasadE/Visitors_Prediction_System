# -*- coding: utf-8 -*-
"""
Created on Sat May  1 15:22:52 2021

@author: evara
"""

import pandas as pd
import pymysql

conn = pymysql.connect(db='EV', user='root', passwd='Admin@123', host='localhost')
cursor = conn.cursor()

dataset = pd.read_csv('stations_dataset.csv')
X = dataset.iloc[:,:-1].values
Y = dataset.iloc[:,5].values

from sklearn.model_selection import train_test_split
X_train, X_test, Y_train, Y_test = train_test_split(X,Y, test_size = 0.2,random_state = 0)

from sklearn.linear_model import LinearRegression
regressor = LinearRegression()
regressor.fit(X_train,Y_train)

p_data = pd.read_csv('check_data.csv')
y_pred = int(regressor.predict(p_data))
print("Predicting Values :",y_pred)

query1 = 'SELECT id FROM day_base_visitor_predict ORDER BY id DESC LIMIT 1'
result = pd.read_sql_query(query1, conn)
result = result.id.tolist()
print(result)
cursor.execute ("""UPDATE day_base_visitor_predict SET accommodable_visitors=%s WHERE id=%s""", (y_pred,result[0]))
cursor.close()
conn.commit()
conn.close()
