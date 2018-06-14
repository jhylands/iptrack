#program to connect to the control pannel 

import requests
from payload import payload
user_agent = "Mozilla/5.0 (X11; CrOS x86_64 10452.99.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.203 Safari/537.36"
session_requests = requests.session()
session_requests.headers.update({'User-Agent':user_agent})
login_url = "http://31.220.21.84:2082/login/"
request = session_requests.post(login_url, data = payload ,allow_redirects=False)
print request.status_code
#print request.headers
location = request.headers['Location']
#print request.content
key =  location[1:17]
print "key:%s"%key
host = "81.151.241.85"
request_url = "http://31.220.21.84:2082/" + key + "/frontend/paper_lantern/sql/addhost.html?host=" + host
response = session_requests.get(request_url)
#print(response.content)
