#! /usr/bin/python3.5
# encoding=utf8
import requests
import bs4
import sys
# reload(sys)
# sys.setdefaultencoding('utf8')
# sys.setdefaultencoding('utf8')
number='3076'
usename='1607084210'
password='261995'

# for op,value in opts:
#     if op == '-n':
#         usename=value
#     elif op == "-p":
#         password = value
#     elif op == "-l":
#         number=value
#     else:
#         print('test.py -i <inputfile> -o <outputfile>')
#         sys.exit()

usename = sys.argv[1]
password = sys.argv[2]
number = sys.argv[3]

print("You are %s. you are chosing %s Your pwd is %s" % (usename, number, password))
session = requests.Session()
url1 = 'http://202.207.177.23/Account/LogOn'
url2 = 'http://202.207.177.23/Student/Select'

payload = { 'UserName':usename, 'password':password, }
payload2 = {'lession':number,}
header = { 'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:47.0) Gecko/20100101 Firefox/47.0',
           'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
           'Host': '202.207.177.23',
            'Referer': 'http://202.207.177.23/Account/LogOn'
           }
# resp = requests.post(url1,data=payload,headers=header)
r = session.post(url1,data=payload,headers=header)
print("成功登入 ")

# print(r.text)
try:
    r = session.post(url2, data=payload2, headers=header)
    soup=bs4.BeautifulSoup(r.text,"lxml")
    nostart=soup.select('span[style="color: red; font-weight: bold;"]')
    print(nostart[0].getText())
except:
    print("有错误发生或者密码错误")
while nostart[0]:
    r = session.post(url2, data=payload2, headers=header)
    soup = bs4.BeautifulSoup(r.text, "lxml")
    nostart = soup.select('span[style="color: red; font-weight: bold;"]')
    print(nostart[0].getText())
# print (resp.text)
# cookie = resp.cookies
# print(cookie)
# resp = requests.get(url2,cookies=cookie)
# print (resp.text)

