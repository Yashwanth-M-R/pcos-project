import numpy as np
import pandas as pd
import matplotlib.pyplot as plt
import seaborn as sns
import pickle

import os

dataset = pd.read_csv("pcos_2023_form.csv")
# print(dataset)

# print(type(dataset))

# print(dataset.shape)

# print(dataset.head(5))

# print(dataset.sample(5))
# print(dataset.describe())
# print(dataset.info())
# print(dataset["status"].describe())
# print(dataset["pregnant"].unique())
# print(dataset["excesshair"].unique())
# print(dataset["weightgain"].unique())
# print(dataset["thinhair"].unique())
# print(dataset["skinacne"].unique())
# print(dataset["breathminute"].unique())
# print(dataset["excerciseregular"].unique())
# print(dataset["bmi"].unique())
from sklearn.model_selection import train_test_split

predictors = dataset.drop("status",axis=1)
target = dataset["status"]

X_train,X_test,Y_train,Y_test = train_test_split(predictors,target,test_size=0.20,random_state=0)
# print(X_train.shape)
# print(X_test.shape)
# print(Y_train.shape)
# print(Y_test.shape)
# from sklearn.metrics import accuracy_score
# from sklearn import svm

# sv = svm.SVC(kernel='linear')
# print("on to training")

# sv.fit(X_train, Y_train)
# print("trained completely")

filename = "pcos_svm_model.pickel"
sv = pickle.load(open(filename, "rb"))

Y_pred_svm = sv.predict(X_test)
print(Y_pred_svm.shape) 
print("predicted completely")