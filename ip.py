import urllib2
import time

def getIPList():#<- this involves sql
    pass

def ping(ip):
    pass

#function which goes throught the list of IPs to decide if they have gone down yet
def checkPeople():
    ip_list = getIPList()
    for ip in ip_list:
        ping_status = ping(ip)
        if ping_status==False:
            report(ip)
        else:
            #test passed 
            pass
    #do something with the report?
    



while True:
        urllib2.urlopen("http://timep.co.uk/task.php?set=1").read()
        time.sleep(3600)

