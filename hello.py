from base64 import b64decode
import cv2
import numpy as np
import face_recognition
import sys
import os

def match_faces():
    trained=[]
    ntrained=[]
    img_test=face_recognition.load_image_file('C:/laragon/www/Online_Examination_System/public/uploads/users/wb_img.jpeg')
    img_test= cv2.cvtColor(img_test,cv2.COLOR_BGR2RGB)

    try:
        ntrained = face_recognition.face_locations(img_test)
        faceloc_captured=ntrained[0]
        if(len(ntrained)>1):  #multiple faces detected in Webcam
            sys.exit(2)
            
        
    except IndexError: # Webcam Image not clear
        sys.exit(3)
    
    trained=face_recognition.face_encodings(img_test)
    encode_train=trained[0]
    cv2.rectangle(img_test,(faceloc_captured[3],faceloc_captured[0]),(faceloc_captured[1],faceloc_captured[2]),(255,0,255),2)
    
    
    img_db=face_recognition.load_image_file('C:/laragon/www/Online_Examination_System/public/uploads/users/db_img.jpeg')
    img_db= cv2.cvtColor(img_db,cv2.COLOR_BGR2RGB)

    faceloc = face_recognition.face_locations(img_db)[0]
    encode_test=face_recognition.face_encodings(img_db)[0]
    cv2.rectangle(img_db,(faceloc[3],faceloc[0]),(faceloc[1],faceloc[2]),(255,0,255),2)


    results = face_recognition.compare_faces([encode_train],encode_test)
    facedis=face_recognition.face_distance([encode_train],encode_test)
    if(results[0] == True and facedis>=0.525299999):
        if(facedis-0.525299999<=0.004700001):
            sys.exit(4)
        else:
            results[0] = False    
 
    if(results[0]==True):    
        sys.exit(1)
    else: 
        sys.exit(0)


match_faces()
    


    
    


    
    