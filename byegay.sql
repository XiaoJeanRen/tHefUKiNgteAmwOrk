-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 
-- 伺服器版本: 10.1.37-MariaDB
-- PHP 版本： 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `byegay`
--

-- --------------------------------------------------------

--
-- 資料表結構 `post_event_confirm_data`
--

CREATE TABLE `post_event_confirm_data` (
  `id` int(20) NOT NULL,
  `title` char(40) NOT NULL,
  `organizer` char(20) NOT NULL DEFAULT '未確認',
  `start_daily` date DEFAULT NULL,
  `end_daily` date DEFAULT NULL,
  `descript` text NOT NULL,
  `original_web` varchar(200) NOT NULL DEFAULT '未確認',
  `post_member` varchar(50) NOT NULL DEFAULT '未確認',
  `post_member_id` int(11) NOT NULL,
  `post_daily` date DEFAULT NULL,
  `is_confirm` tinytext NOT NULL,
  `winner` varchar(50) NOT NULL DEFAULT '未確認'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `post_event_confirm_data`
--

INSERT INTO `post_event_confirm_data` (`id`, `title`, `organizer`, `start_daily`, `end_daily`, `descript`, `original_web`, `post_member`, `post_member_id`, `post_daily`, `is_confirm`, `winner`) VALUES
(1, '[學術] 關於Youtuber網路名人貼文的分享行為', '未確認', NULL, NULL, '標題[學術] 關於Youtuber網路名人貼文的分享行為時間Sun Apr 26 15:25:37 2020<br>學校(包括學生姓名 教授姓名):學生:林子霖 教授:張心馨教授<br>問卷內容簡介(題目數量和條件限制):題目約50題，並且設計有反向題，請仔細填答<br>填答限制:需有追蹤youtuber帳號之經驗<br>問卷網址:https://www.surveycake.com/s/8mmLG<br>問卷獎品:從有效問卷中抽出100元現金(5名) + 7-11一百元禮卷(3名)<br>開獎日期:5/2<br>聯絡方式(mail):[email protected]<br>', 'https://www.ptt.cc/bbs/drawing/M.1587885939.A.D14.html', 'admin_system', 0, NULL, '0', '未確認'),
(2, '[免費] 抽 全家禮卷 line point 折價卷', '未確認', NULL, NULL, '標題[免費] 抽 全家禮卷 line point 折價卷時間Sun Apr 26 20:55:48 2020<br>舉辦廠商：非常勸敗<br>截止日期：4/30<br>抽獎辦法：抽幸運輪盤<br>抽獎網址：https://bit.ly/34Sirhn<br>獎項：<br>前往可以抽獎喔<br>每天皆可抽乙次<br>1.獨家口紅唇膏<br>2.全家商店禮物卡<br>3.line point<br>4.線上商店折價劵<br>5.7-11商店咖啡<br>', 'https://www.ptt.cc/bbs/drawing/M.1587905753.A.DD7.html', 'admin_system', 0, NULL, '0', '未確認'),
(3, '[免費] 金融達人 抽gogoro3 換小米3C', '未確認', NULL, NULL, '標題[免費] 金融達人 抽gogoro3 換小米3C時間Mon Apr 27 05:30:01 2020<br>金融達人 抽gogoro3 換小米3C<br>舉辦廠商：金融達人<br>截止日期：120台抽到完～<br>抽獎辦法：需先下載APP，註冊時輸入邀請【FM533014】，立即註冊成為金融達人！<br>https://st.finmaster.com/home/page/person/5dad766bf0596355d516fb68<br>獎項：最值錢最大獎：Gogoro3<br>小米3C、威秀電影票、饗食天堂餐券....等等，官方陸續增加好康兌換<br>以上的獎品都可以用點數，「免費」兌換！！<br>', 'https://www.ptt.cc/bbs/drawing/M.1587936604.A.FC4.html', 'admin_system', 0, NULL, '0', '未確認'),
(4, '[免費] 飛比價格 網購比價專用APP', '未確認', NULL, NULL, '標題[免費] 飛比價格 網購比價專用APP時間Mon Apr 27 12:57:50 2020<br>舉辦廠商：飛比價格 APP<br>活動辦法：請在\"我的\"->\"輸入朋友給的邀請碼\"輸入推薦碼 HCAEP<br>          1. 首次簽到任務<br>          2. 使用搜尋(比價)功能<br>          3. 邀請新朋友<br>          4. 比價後直接連結至雅虎，friDay，樂天..等商城進行購物。<br>          飛比點數兌換好禮:(選項多)<br>          7-11，全家，萊爾富<br>          85度C，cama cafe，星巴克，肯德基，摩斯，吉野家，福勝亭，翰林茶苑<br>          屈臣氏，LINE POINTS...etc.<br>網址：Android<br>      iOS<br>      皆可下載\"飛比價格APP\"<br>備註：<br>不用註冊身份證字號，連接Google帳號或FB帳號便可登入。<br>請記得先在\"我的\"->\"輸入好友給的邀請碼\"輸入推薦碼 HCAEP 喔，謝謝。<br>', 'https://www.ptt.cc/bbs/drawing/M.1587963472.A.5DB.html', 'admin_system', 0, NULL, '0', '未確認'),
(5, '[免費] foodpanda空腹熊貓 全台最大美食外送APP', '未確認', NULL, NULL, '標題[免費] foodpanda空腹熊貓 全台最大美食外送APP時間Mon Apr 27 13:01:30 2020<br>舉辦廠商：foodpanda APP<br>截止日期：無<br>活動辦法：透過 https://fdpnda.app.link/0C9s1BUhz5 註冊foodpanda帳號，<br>          可獲得新客戶首購$100折扣優惠，訂餐滿$200可直接折抵。<br>          輸入優惠碼:STAYHOME，即可享有外送免運費。<br>          或是使用外帶自取享有88折優惠，折扣上限$150。<br>          其他優惠訊息：<br>          2020/5/5 前訂購指定餐廳美食滿$50並於結帳時輸入【DoritosMini】，<br>          隨單附贈多力多滋迷你脆超濃起司一包，餅片小三倍， 一口大小輕鬆入口<br>          剛剛好， 讓你任性點任性吃，邊滑手機也OK，手邊事情不中斷！<br>          簡便線上訂餐流程：<br>          1. 輸入您想送達的地址，可以是家裡或公司<br>          2. 點擊「搜尋美食」<br>          3. 挑選喜歡的餐廳<br>          4. 瀏覽菜單後，點選餐點加入訂單<br>          5. 按下「結帳」- 可貨到付現or信用卡線上付款<br>          6. 再次確認並填入送達地址細節<br>          7. 付款後等著享用大餐<br>活動網址：https://fdpnda.app.link/0C9s1BUhz5<br>備註：<br>1. 不用身份證字號，僅需手機號碼和Email信箱。<br>2. 請注意$100折扣優惠必須「首購滿$200」才不會失效。<br>', 'https://www.ptt.cc/bbs/drawing/M.1587963692.A.64A.html', 'admin_system', 0, NULL, '0', '未確認'),
(6, '[FB  ] 留言抽 市價$2380 精品雨傘母親節禮盒', '未確認', NULL, NULL, '標題[FB  ] 留言抽 市價$2380 精品雨傘母親節禮盒時間Mon Apr 27 15:55:14 2020<br>舉辦廠商：保羅拉 Prolla<br>截止日期：5/11<br>抽獎辦法：<br>1.Prolla粉絲團按讚+「追蹤」，TAG 3位朋友並公開分享貼文活動<br>2.再貼文底下分享你與媽媽的幸福moment(一起出遊照片)，並留下想對媽媽說的話吧!<br>抽獎網址：<br>https://hi.switchy.io/1FaO<br>獎項：<br>選取前3位朋友留言討論度熱烈的，即可獲得Hikari丹寧傘!(市價$1280元)<br>活動加碼送<br>累積到500則留言數，<br>將隨機抽出2位幸運粉絲，獲得Prolla母親節禮盒(市價$2380元)<br>**若需會員推薦  請利用推文**<br>', 'https://www.ptt.cc/bbs/drawing/M.1587974118.A.2DA.html', 'admin_system', 0, NULL, '0', '未確認'),
(7, '[FB  ] 臺灣國家公園 老照片猜謎活動 答對可抽獎', '未確認', NULL, NULL, '標題[FB  ] 臺灣國家公園 老照片猜謎活動 答對可抽獎時間Mon Apr 27 18:37:52 2020<br>舉辦廠商：臺灣國家公園粉絲團<br>截止日期：2/27 10:00-5/1 20:00<br>抽獎辦法：每天上午10點公布當天一題題目，留言猜謎老照片的所在地點<br>答對者即可獲得一次抽獎機會，答對越多，越容易中獎喔<br>抽獎網址：https://www.facebook.com/parkstaiwan/<br>(請勿在此提供拉票連結  請利用備註)<br>獎項：陽明山國家公園生態便利貼+OK蹦共送出35組<br>https://reurl.cc/b5DlA3<br>備註：(是否需提供身分證字號)<br>**若需會員推薦  請利用推文**<br>', 'https://www.ptt.cc/bbs/drawing/M.1587983874.A.35D.html', 'admin_system', 0, NULL, '0', '未確認'),
(8, '[FB  ] 母親節大餐你煮 送金園5大片厚切排骨組', '未確認', NULL, NULL, '標題[FB  ] 母親節大餐你煮 送金園5大片厚切排骨組時間Mon Apr 27 19:57:49 2020<br>舉辦廠商：金園排骨<br>截止日期：5/24<br>抽獎辦法：<br>1. 煮出金園創意料理<br>2. 拍下美食照、取個菜餚名稱<br>3. 留言po出照片及寫出料理方法<br>4. 分享活動貼文到你的動態牆設為公開<br>抽獎網址：https://hi.switchy.io/1Fb3<br>獎項：<br>金園招牌厚切排骨5片裝禮盒共3名<br>5/25日抽出並公布<br>', 'https://www.ptt.cc/bbs/drawing/M.1587988673.A.933.html', 'admin_system', 0, NULL, '0', '未確認'),
(9, '[免費] 手機號碼首次註冊gomaji送120元可現折', '未確認', NULL, NULL, '標題[免費] 手機號碼首次註冊gomaji送120元可現折時間Tue Apr 28 08:54:16 2020<br>首次下載註冊gomaji app<br>（需簡訊認證）<br>輸入邀請碼 B3MLP，可獲得120點（可折現金120元）<br>可立即折抵使用（沒輸入的話拿不到喔）<br>可買各大餐廳的電子餐券、紙本票券<br>合作的生活市集網購商品也都能折抵<br>第一次註冊完，把120點折抵掉，差不多就可以刪了XD<br>', 'https://www.ptt.cc/bbs/drawing/M.1588035258.A.7C3.html', 'admin_system', 0, NULL, '0', '未確認'),
(10, '[免費] 金融達人app 小米商品 饗食卷 Gogoro3', '未確認', NULL, NULL, '標題[免費] 金融達人app 小米商品 饗食卷 Gogoro3時間Tue Apr 28 10:43:40 2020<br>舉辦廠商：金融達人app<br>截止日期：120台抽完為止<br>抽獎步驟：<br>1.(Play商店app搜尋)   金融達人<br>2.(註冊輸入邀請碼)   FM726831<br>3.(可獲得抽獎序號)<br>抽獎網址：https://bit.ly/359CwxZ<br>獎項：<br>Gogoro 3<br>小米3C產品<br>雞胸肉<br>燒肉片<br>烤地瓜<br>養生毛豆<br>萊爾富咖啡<br>威秀電影票<br>饗食天堂餐卷<br>麵屋武藏拉麵<br>光影體驗展入場卷<br>', 'https://www.ptt.cc/bbs/drawing/M.1588041822.A.23A.html', 'admin_system', 0, NULL, '0', '未確認'),
(11, '[FB  ] 41度c可溶性膠原蛋白母親節抽獎', '未確認', NULL, NULL, '標題[FB  ] 41度c可溶性膠原蛋白母親節抽獎時間Tue Apr 28 11:06:37 2020<br>舉辦廠商：41度c可溶性膠原蛋白<br>截止日期：2020/5/5 12:00直播開獎<br>抽獎辦法：<br>1.按「讚、追蹤並請設定為搶先看」41度c可溶性膠原蛋白粉絲團或<br>珩陞行生物科技股份有限公司<br>2.在臉書公開分享本文<br>3.在文章底下留言想對媽媽、或41度C膠原蛋白(不要copy別人!小編會看喔!!哈哈!)的話<br>並且加上 hashtag<br>#41度c可溶性膠原蛋白 #母親節 #縮毛孔 #嫩白 #幹細胞培養液<br>抽獎網址：<br>https://reurl.cc/R4WbMg<br>(請勿在此提供拉票連結  請利用備註)<br>獎項：<br>1.41℃ NO.1 膠原蛋白滋潤型保養精華液 50ML(市價2500元正貨)X2名<br>2.41℃ NO.1 膠原蛋白滋潤型修護精華液 50ML(市價5000元正貨)X2名<br>備註：(是否需提供身分證字號)否<br>**若需會員推薦  請利用推文**<br>', 'https://www.ptt.cc/bbs/drawing/M.1588043199.A.C11.html', 'admin_system', 0, NULL, '0', '未確認'),
(12, '[免費] 環保集點  綠點揪好康 享抽AirPods 2', '未確認', NULL, NULL, '標題[免費] 環保集點  綠點揪好康 享抽AirPods 2時間Tue Apr 28 11:08:18 2020<br>舉辦廠商：行政院環境保護署。環保集點<br>截止日期：即日起 2020/4/1~2020/6/30<br>抽獎網址：https://reurl.cc/20Lmmm<br>活動辦法：<br>環保集點 x 全國電子 綠點揪好康 享抽AirPods 2<br>https://reurl.cc/d0DWe2<br>炎炎夏日即將到來，精打細算又重視環保的你，記得選用「環保標章」家電，不僅對環<br>境更加友善、更能省下可觀電費喔！現在到全國電子購買「環保標章」家電，還有機會抽到<br>註冊環保集點並綁定全國電子會員後<br>①於全國電子出示會員並選購「環保標章」冷氣，每滿1,000元可獲1次抽獎機會！(例如<br>：?<br>②兌換「全國電子」電子優惠券，消費綠點商品（每100點抵1元)，抽獎機率加倍！(每<br>折抵500元可獲1次抽獎機會、1,000元可獲2次抽獎機會…以此類推)<br>※實體門市限定，每位全國電子或環保集點會員僅可中獎一次。詳情請參考注意事項。<br><br>同場加映<br>聰明的環保集點會員，肯定知道活動可以搭配「Green Weekend綠色週末會員日」與「財政?<br>財政部貨物稅減徵：購買冷氣機、電冰箱、除濕機，可申請最高2,000元補助金！<br>Green Weekend綠色週末會員日：週末消費點數10倍送，最高回饋2,000元購物金！<br>❶? 先到Play商店搜尋「環保集點」下載並註冊會員帳號，也可以至網站直接註冊。<br>❷? 註冊時輸入邀請碼? ⊕：EECA7A<br>     EECA7A      我們都能一起得到 2000綠點，一起環保集點趣吧！！！<br>註冊網址：https://sys.greenpoint.org.tw/GpConsumerApp/Function/Login.aspx<br>https://i.imgur.com/NazhcdL.jpg<br><br>目前有很多商品可以直接兌換<br>超商：美粒果柳橙汁、可口可樂、黑松FIN運動飲料、黑松沙士、黑松茶花綠茶、麥香飲<br>料系列、生活泡沫系列、統一陽光黃金豆豆漿、拿鐵、美式咖啡…飲料<br>https://i.imgur.com/XwmOAc0.jpg<br><br>賣場：愛買、大潤發、全國電子、東森購物網<br>免費票券：小人國、劍湖山、小叮噹科學主題樂園、西湖渡假村、國立科學工藝博物館<br>、國家森林遊樂區、各式飯店、綠色旅宿、惜福餐廳、住宿折價券<br>https://i.imgur.com/I4VEOI4.jpg<br><br>以上獎品、門票都可以用點數「免費」兌換！<br>❶? 先到Play商店搜尋「環保集點」下載並註冊會員帳號，也可以至網站直接註冊。<br>❷? 註冊時輸入邀請碼? ⊕：EECA7A<br>        EECA7A       我們都能一起得到 2000綠點，一起環保集點趣吧！！！<br>註冊網址：https://sys.greenpoint.org.tw/GpConsumerApp/Function/Login.aspx<br>', 'https://www.ptt.cc/bbs/drawing/M.1588043300.A.418.html', 'admin_system', 0, NULL, '0', '未確認'),
(13, '送一堂 Hello World 程式課程', '456', NULL, NULL, '123', '789', '資工人', 7, NULL, '0', '未確認');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` text NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `permission` varchar(10) NOT NULL DEFAULT '一般會員'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`, `email`, `permission`) VALUES
(1, 'x23567821', 'JeanRenP', '7afcf485e31ddb69db38ee165ae8a6bb', 'x1204955@gmail.com', '一般會員'),
(2, 'admin23567821', 'Jean', '7afcf485e31ddb69db38ee165ae8a6bb', 'x1204955@gmail.com', '管理員'),
(7, 's17113234', '資工人', '7afcf485e31ddb69db38ee165ae8a6bb', 's17113234@stu.edu.tw', '一般會員');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `post_event_confirm_data`
--
ALTER TABLE `post_event_confirm_data`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `post_event_confirm_data`
--
ALTER TABLE `post_event_confirm_data`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用資料表 AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
