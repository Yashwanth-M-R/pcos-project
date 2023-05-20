from sklearn import svm
import pickle
import pandas as pd
from sklearn.model_selection import train_test_split

dataset = pd.read_csv("pcos_2023_form.csv")

predictors = dataset.drop(["id", "status"],axis=1)
target = dataset["status"]
X_train,X_test,Y_train,Y_test = train_test_split(predictors,target,test_size=0.20,random_state=0)

sv = svm.SVC(kernel='linear')
print("on to training")

sv.fit(X_train.values, Y_train.values)
print("trained completely")

filename = "pcos_svm_model.pickle"
pickle.dump(sv, open(filename, "wb"))
print("lesssgooo")