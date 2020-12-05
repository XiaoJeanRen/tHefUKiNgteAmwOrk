-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-12-05 19:05:45
-- 伺服器版本： 10.4.14-MariaDB
-- PHP 版本： 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `descript` varchar(500) DEFAULT NULL,
  `organizer` char(20) NOT NULL DEFAULT '未確認',
  `start_daily` char(20) DEFAULT NULL,
  `end_daily` char(20) DEFAULT NULL,
  `original_web` varchar(200) NOT NULL DEFAULT '未確認',
  `post_member` varchar(50) NOT NULL DEFAULT '未確認',
  `post_member_id` int(11) NOT NULL,
  `post_daily` date DEFAULT NULL,
  `is_confirm` tinytext NOT NULL,
  `winner` varchar(50) NOT NULL DEFAULT '未確認'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `post_event_confirm_data`
--

INSERT INTO `post_event_confirm_data` (`id`, `title`, `descript`, `organizer`, `start_daily`, `end_daily`, `original_web`, `post_member`, `post_member_id`, `post_daily`, `is_confirm`, `winner`) VALUES
(1, '123', '555', '未確認', '2020-12-04T15:43', '2020-12-26T15:43', 'https://www.ptt.cc/bbs/drawing/M.1587885939.A.D14.html', 'Jean', 2, NULL, '1', '未確認'),
(2, '[免費] 抽 全家禮卷 line point 折價卷', NULL, '未確認', NULL, NULL, 'https://www.ptt.cc/bbs/drawing/M.1587905753.A.DD7.html', 'admin_system', 0, NULL, '0', '未確認'),
(3, '[免費] 金融達人 抽gogoro3 換小米3C', NULL, '未確認', NULL, NULL, 'https://www.ptt.cc/bbs/drawing/M.1587936604.A.FC4.html', 'admin_system', 0, NULL, '0', '未確認'),
(4, '[免費] 飛比價格 網購比價專用APP', NULL, '未確認', NULL, NULL, 'https://www.ptt.cc/bbs/drawing/M.1587963472.A.5DB.html', 'admin_system', 0, NULL, '0', '未確認'),
(5, '[免費] foodpanda空腹熊貓 全台最大美食外送APP', NULL, '未確認', NULL, NULL, 'https://www.ptt.cc/bbs/drawing/M.1587963692.A.64A.html', 'admin_system', 0, NULL, '0', '未確認'),
(6, '[FB  ] 留言抽 市價$2380 精品雨傘母親節禮盒', NULL, '未確認', NULL, NULL, 'https://www.ptt.cc/bbs/drawing/M.1587974118.A.2DA.html', 'admin_system', 0, NULL, '0', '未確認'),
(7, '[FB  ] 臺灣國家公園 老照片猜謎活動 答對可抽獎', NULL, '未確認', NULL, NULL, 'https://www.ptt.cc/bbs/drawing/M.1587983874.A.35D.html', 'admin_system', 0, NULL, '0', '未確認'),
(8, '[FB  ] 母親節大餐你煮 送金園5大片厚切排骨組', NULL, '未確認', NULL, NULL, 'https://www.ptt.cc/bbs/drawing/M.1587988673.A.933.html', 'admin_system', 0, NULL, '0', '未確認'),
(9, '[免費] 手機號碼首次註冊gomaji送120元可現折', NULL, '未確認', NULL, NULL, 'https://www.ptt.cc/bbs/drawing/M.1588035258.A.7C3.html', 'admin_system', 0, NULL, '0', '未確認'),
(10, '[免費] 金融達人app 小米商品 饗食卷 Gogoro3', NULL, '未確認', NULL, NULL, 'https://www.ptt.cc/bbs/drawing/M.1588041822.A.23A.html', 'admin_system', 0, NULL, '0', '未確認'),
(11, '[FB  ] 41度c可溶性膠原蛋白母親節抽獎', NULL, '未確認', NULL, NULL, 'https://www.ptt.cc/bbs/drawing/M.1588043199.A.C11.html', 'admin_system', 0, NULL, '0', '未確認'),
(12, '[免費] 環保集點  綠點揪好康 享抽AirPods 2', NULL, '未確認', NULL, NULL, 'https://www.ptt.cc/bbs/drawing/M.1588043300.A.418.html', 'admin_system', 0, NULL, '0', '未確認'),
(14, '555', '5555', '555555', '2020-12-02T15:22', '2020-12-02T21:28', '5555555', 'Jean', 2, NULL, '0', '未確認');

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
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`, `email`, `permission`) VALUES
(1, 'x23567821', 'JeanRenP', '7afcf485e31ddb69db38ee165ae8a6bb', 'x1204955@gmail.com', '一般會員'),
(2, 'admin23567821', 'Jean', '7afcf485e31ddb69db38ee165ae8a6bb', 'x1204955@gmail.com', '管理員'),
(7, 's17113234', '資工人', '7afcf485e31ddb69db38ee165ae8a6bb', 's17113234@stu.edu.tw', '一般會員');

--
-- 已傾印資料表的索引
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
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `post_event_confirm_data`
--
ALTER TABLE `post_event_confirm_data`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
