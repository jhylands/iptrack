import urllib2
#This is a module whih checkes if a record has been updated
#It does this by calling a php function on the server (recordUpdated.php)
def isUpdated(machine):
   state = urllib2.urlopen("http://ip.timep.co.uk/recordUpdated.php").read() 
   return state

