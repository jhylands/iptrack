#This program will on loop scan the db server for the changed ip addresses and if the ip address has change then it will update the dns record
from cpannel import updateTo as update
from time import sleep
from recordUpdated import isUpdated 

while True:
    #check the server for if one of the records has been updated
    updatedIP = isUpdated(1)
    if updatedIP!=ip:
        ip = updatedIP
        print update(ip)
    sleep(3600)
