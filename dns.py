#This program will on loop scan the db server for the changed ip addresses and if the ip address has change then it will update the dns record
from cpannel import updateTo as update
from time import sleep
from recordUpdated import isUpdated 
ip=''
while True:
    #check the server for if one of the records has been updated
    updatedIP = isUpdated(1)
    print "Checking for changed ip:" + updatedIP
    if updatedIP!=ip:
        print "Change Detected!"
        ip = updatedIP
        print update(ip)
    sleep(3600)
