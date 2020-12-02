from bs4 import BeautifulSoup
import requests

import mysql.connector
maxdb = mysql.connector.connect(
    host = "127.0.0.1",
    user = "root",
    password = "",
    database = "byegay"
)
cursor = maxdb.cursor()

#取得網頁資料(原始碼)
res = requests.get('https://www.ptt.cc/bbs/drawing/index.html')
#獲取網頁正確的編碼格式
res.encoding = res.apparent_encoding
#美湯網頁解析
soup = BeautifulSoup(res.text,'html.parser')
#整頁內容的標籤
tag_name = 'div.title a'
paging = soup.select('div[class=mark]')
number = []
post_member = "admin_system"
is_confirm = "0"
#宣告要取得此類標籤的文字
articles = soup.select(tag_name)

#比對是否有相同文字
def deleteDuplicatedElementFromList3(listA):
    return sorted(set(listA), key = listA.index)

i = 0
for pag in paging:
    if pag.text == 'M':
        number.append(i)
    else:
        number.append(-1)
    
    i+=1

i = -1

sqlStuff = "INSERT INTO post_event_confirm_data(title, original_web, post_member, is_confirm) VALUES (%s, %s, %s, %s, %s)"

for art in articles:
    i += 1
    if number[i] == -1:
        newUrl = 'https://www.ptt.cc' + art['href']
        print(newUrl)
        res = requests.get(newUrl)
        res.encoding = res.apparent_encoding
        soup = BeautifulSoup(res.text, 'html.parser')
        tag_name = '#main-content'
        print("標題：",art.text)
        print("原網址：",'https://www.ptt.cc' + art['href'])
        
        fullhref = 'https://www.ptt.cc' + art['href']
        records = [(art.text, fullhref, post_member, is_confirm)]
        cursor.executemany(sqlStuff, records)
        print("資料庫儲存完畢")
        print()

maxdb.commit