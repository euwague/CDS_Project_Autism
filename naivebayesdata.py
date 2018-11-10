#!/usr/bin/env python
import sys
import numpy as np
import scipy.stats as stats
import matplotlib.pyplot as plt
import pandas as pd
from sklearn.naive_bayes import GaussianNB
from sklearn.metrics import accuracy_score

age = 23#int(sys.argv[1])
score = 4#int(sys.argv[2])
classtrue = 'No Autism'#str(sys.argv[3])

if(classtrue == 'No Autism'):
    trueclass = 0
else:
    trueclass = 1


data = pd.read_csv('data/autismtraindata.csv', usecols=[10,17,20])

data['Class/ASD'] = np.where(data['Class/ASD'] == 'NO', 0, 1)

X = data[['age', 'result']].values
Y = data['Class/ASD'].values

XA = data['result'].values
XB = data['age'].values

clf = GaussianNB()
clf.fit(X, Y)
result = clf.predict([[age, score]])
#accuracy = accuracy_score(trueclass, result)

f = open("H:/Study Material/LU Academics/Fall 2018/Advanced Topics in Clinical Decision Support/Project/demofile.txt", "w")

f.write(str(age))
f.write(str(score))
if(result == 0):
    f.write('Class: NO autism')
else:
    f.write('Class: YES autism')

#f.write('Accuracy: ', accuracy)
f.close()
plt.scatter(XA, Y, c='b', marker='o', label='Result')
plt.scatter(XB, Y, c='r', marker='x', label='Age')
plt.legend(loc='upper left')
plt.show()
