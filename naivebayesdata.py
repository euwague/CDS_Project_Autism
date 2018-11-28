#!/usr/bin/env python
import sys
import numpy as np
import scipy.stats as stats
import matplotlib.pyplot as plt
import pandas as pd
from sklearn.naive_bayes import GaussianNB
from sklearn.metrics import accuracy_score

with open('demoage.txt') as f:
    age = f.readlines()
age = [int(x.strip()) for x in age]

with open('demoscore.txt') as f:
    res = f.readlines()
res = [int(x.strip()) for x in res]

with open('demogen.txt') as f:
    gen = f.readlines()
gen = [int(x.strip()) for x in gen]

with open('demopre.txt') as f:
    preautism = f.readlines()
preautism = [int(x.strip()) for x in preautism]

with open('demores.txt') as f:
    classtrue = f.readlines()
classtrue = [int(x.strip()) for x in classtrue]

#print(age)
#print(res)
#print(gen)
#print(preautism)
#print(classtrue)


data = pd.read_csv('data/autismtraindata.csv')

data['Class/ASD'] = np.where(data['Class/ASD'] == 'NO', 0, 1)
data['gender'] = np.where(data['gender'] == 'f', 0, 1)
data['austim'] = np.where(data['austim'] == 'no', 0, 1)

X = data[['age', 'result', 'gender', 'austim']].values
Y = data['Class/ASD'].values

clf = GaussianNB()
clf.fit(X, Y)
result = clf.predict([[age[len(age)-1], res[len(res)-1], gen[len(gen)-1], preautism[len(preautism)-1]]])

test_points = []
for idx in range(len(age)):
    test_points.append([age[idx], res[idx], gen[idx], preautism[idx]])

#print("test points: ", test_points)

test_labels = []
for idx in range(len(classtrue)):
    test_labels.append(classtrue[idx])

#print("test labels: ", test_labels)

predicts = clf.predict(test_points)
#print("predicts: ", predicts)
accuracy = accuracy_score(test_labels, predicts)

f = open("output/output.txt", "w")

f.write('Age: '+str(age[len(age)-1])+ '\n')
print('Age: ', age[len(age)-1])
f.write('Score: '+str(res[len(res)-1])+ '\n')
print('Score: ', res[len(res)-1])
if(gen[len(gen)-1] == 0):
    f.write('Gender: f'+ '\n')
    print('Gender: f')
else:
    f.write('Gender: m'+ '\n')
    print('Gender: m')

if(preautism[len(preautism)-1] == 0):
    f.write('Family Autism: no'+ '\n')
    print('Family Autism: no')
else:
    f.write('Family Autism: yes'+ '\n')
    print('Family Autism: yes')

if(result == 0):
    f.write('Class: NO autism'+ '\n')
    print('Class: NO autism')
else:
    f.write('Class: YES autism'+ '\n')
    print('Class: YES autism')

#f.write('Accuracy: '+ str(accuracy))
print('Accuracy: ', accuracy)
f.close()
