import urllib2
import time

while True:
        urllib2.urlopen("http://timep.co.uk/task.php?set=1").read()
        time.sleep(3600)
