#import 美湯
from bs4 import BeautifulSoup
import requests

import mysql.connector
maxdb = mysql.connector.connect(
  host = "127.0.0.1",
  user = "root",
  password = "",
  database = "byegay",
)
cursor=maxdb.cursor()

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
#print(len(articles))
for pag in paging:
    #print(pag.text)
    if pag.text == 'M':
        #articles.pop(i)
        number.append(i)
    else:
        number.append(-1)
    #print(number)
    i += 1

i = -1

sqlStuff = "INSERT INTO post_event_confirm_data(title, descript, original_web, post_member, is_confirm) VALUES (%s, %s, %s, %s, %s)"

for art in articles:
    i += 1
    reallyAllContent = ""
    if number[i] == -1:
        newUrl = 'https://www.ptt.cc' + art['href']
        print(newUrl)
        res = requests.get(newUrl)
        res.encoding = res.apparent_encoding
        soup = BeautifulSoup(res.text,'html.parser')
        #由於文章內容沒有被其他小標籤包覆，只能抓取大標籤
        tag_name = '#main-content'
        #content 為全部取得的"文字" String
        content = soup.get_text(tag_name)
        #取得能罪將整篇文章最小化的開頭，此開頭為全ptt文章共通
        startPos = content.find('標題#main-content[')
        #取得能罪將整篇文章最小化的盡頭，此開頭為全ptt文章共通
        endPos = content.find('--')
        
        #將文章內容節錄自最小
        newContent = content[startPos:endPos]
        #將文章內容用List包起來，看段落符號而切割
        updateContent = newContent.split('\n')
        #刪除重複內容
        deleteDuplicatedElementFromList3(updateContent)
        #移除空白
        needToFind = ['',' ','#main-content']
        
        lenUpdateContent = len(updateContent)
        print("標題：",art.text)
        print("原網址：",'https://www.ptt.cc' + art['href'])
                      
        for g in range(lenUpdateContent):
            if updateContent[g] != '':
                #輸出除了空白以外的結果
                allContent = updateContent[g].replace('#main-content','')
                
                reallyAllContent += allContent
                reallyAllContent += '<br>'
        
        print(reallyAllContent)
        
        fullhref = 'https://www.ptt.cc' + art['href']
        records = [(art.text, reallyAllContent, fullhref, post_member, is_confirm)]
        cursor.executemany(sqlStuff, records)
        print("資料庫儲存完畢")
        print()
        
maxdb.commit()