-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-12-10 15:53:09
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
(14, '555', '5555', '555555', '2020-12-02T15:22', '2020-12-02T21:28', '5555555', 'Jean', 2, NULL, '0', '未確認'),
(15, '4747', '474747', '123', '2020-12-16T12:01', '2021-02-05T12:01', '111', 'xiao', 8, NULL, '0', '未確認'),
(16, '555', 'www', '123', '2020-12-24T14:53', '2020-12-07T14:53', '946', 'Jean', 2, NULL, '0', '未確認'),
(17, '515615', '1215', '1511321', '2020-12-16T14:59', '2020-12-13T14:59', '1516515156', 'Jean', 2, NULL, '0', '未確認'),
(18, '515615', '1215', '1511321', '2020-12-16T14:59', '2020-12-13T14:59', '1516515156', 'Jean', 2, NULL, '0', '未確認'),
(19, '515615', '1215', '1511321', '2020-12-16T14:59', '2020-12-13T14:59', '1516515156', 'Jean', 2, NULL, '0', '未確認'),
(20, '515615', '1215', '1511321', '2020-12-16T14:59', '2020-12-13T14:59', '1516515156', 'Jean', 2, NULL, '0', '未確認'),
(21, '515615', '1215', '1511321', '2020-12-16T14:59', '2020-12-13T14:59', '1516515156', 'Jean', 2, NULL, '0', '未確認'),
(22, '515615', '1215', '1511321', '2020-12-16T14:59', '2020-12-13T14:59', '1516515156', 'Jean', 2, NULL, '0', '未確認'),
(23, 'dwdssad', 'asa', 'asd', '2020-12-31T15:04', '2020-12-04T15:04', 'www', 'Jean', 2, NULL, '0', '未確認'),
(24, 'dwdssad', 'asa', 'asd', '2020-12-31T15:04', '2020-12-04T15:04', 'www', 'Jean', 2, NULL, '0', '未確認'),
(25, 'dwdssad', 'asa', 'asd', '2020-12-31T15:04', '2020-12-04T15:04', 'www', 'Jean', 2, NULL, '0', '未確認'),
(26, 'dwdssad', 'asa', 'asd', '2020-12-31T15:04', '2020-12-04T15:04', 'www', 'Jean', 2, NULL, '0', '未確認'),
(27, 'dwdssad', 'asa', 'asd', '2020-12-31T15:04', '2020-12-04T15:04', 'www', 'Jean', 2, NULL, '0', '未確認'),
(28, 'dwdssad', 'asa', 'asd', '2020-12-31T15:04', '2020-12-04T15:04', 'www', 'Jean', 2, NULL, '0', '未確認'),
(29, 'dwdssad', 'asa', 'asd', '2020-12-31T15:04', '2020-12-04T15:04', 'www', 'Jean', 2, NULL, '0', '未確認'),
(30, 'dwdssad', 'asa', 'asd', '2020-12-31T15:04', '2020-12-04T15:04', 'www', 'Jean', 2, NULL, '0', '未確認'),
(31, 'dwdssad', 'asa', 'asd', '2020-12-31T15:04', '2020-12-04T15:04', 'www', 'Jean', 2, NULL, '0', '未確認'),
(32, 'dwdssad', 'asa', 'asd', '2020-12-31T15:04', '2020-12-04T15:04', 'www', 'Jean', 2, NULL, '0', '未確認'),
(33, 'dwdssad', 'asa', 'asd', '2020-12-31T15:04', '2020-12-04T15:04', 'www', 'Jean', 2, NULL, '0', '未確認'),
(34, 'dwdssad', 'asa', 'asd', '2020-12-31T15:04', '2020-12-04T15:04', 'www', 'Jean', 2, NULL, '0', '未確認'),
(35, 'dwdssad', 'asa', 'asd', '2020-12-31T15:04', '2020-12-04T15:04', 'www', 'Jean', 2, NULL, '0', '未確認'),
(36, 'ASS', 'SD', 'WW', '2020-12-14T15:26', '2021-01-07T15:26', 'CAS', 'Jean', 2, NULL, '0', '未確認'),
(37, 'SASD', 'DSF', 'WAS', '2020-12-02T15:29', '2020-12-23T15:29', 'AAA', 'Jean', 2, NULL, '0', '未確認'),
(38, 'SASD', 'DSF', 'WAS', '2020-12-02T15:29', '2020-12-23T15:29', 'AAA', 'Jean', 2, NULL, '0', '未確認'),
(39, 'ASW', '4748486', 'DWW', '2020-12-20T15:36', '2020-12-31T15:36', 'WWW', 'Jean', 2, NULL, '0', '未確認'),
(40, 'ASD', 'WWW', 'WW', '2020-12-24T15:47', '2021-01-07T15:47', 'as', 'Jean', 2, NULL, '0', '未確認'),
(41, '48484', 'd9a', '151515', '2020-12-23T15:48', '2020-12-31T15:48', '11213', 'Jean', 2, NULL, '0', '未確認'),
(42, 'ASDW', 'WW', 'QQWQW', '2020-12-15T15:49', '2020-12-29T15:49', 'AAAAAAAA', 'Jean', 2, NULL, '0', '未確認');

-- --------------------------------------------------------

--
-- 資料表結構 `post_tag_relation`
--

CREATE TABLE `post_tag_relation` (
  `id` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `tagId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `post_tag_relation`
--

INSERT INTO `post_tag_relation` (`id`, `postId`, `tagId`) VALUES
(13, 40, 11),
(14, 41, 12),
(15, 42, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `tag` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `tags`
--

INSERT INTO `tags` (`id`, `tag`) VALUES
(1, '3C產品'),
(2, '4C'),
(3, 'W3C'),
(4, 'W3Caa'),
(5, 'W3CaaW'),
(6, '8WA'),
(7, 'ASDD'),
(8, 'WAsaSaAS'),
(9, 'WAsaSaASWW'),
(10, '電器'),
(11, '99125'),
(12, '');

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
(7, 's17113234', '資工人', '7afcf485e31ddb69db38ee165ae8a6bb', 's17113234@stu.edu.tw', '一般會員'),
(8, 'xiaojeanren', 'xiao', '7afcf485e31ddb69db38ee165ae8a6bb', 'x1204955@gmail.com', '一般會員');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `post_event_confirm_data`
--
ALTER TABLE `post_event_confirm_data`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `post_tag_relation`
--
ALTER TABLE `post_tag_relation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postId` (`postId`),
  ADD KEY `tagId` (`tagId`);

--
-- 資料表索引 `tags`
--
ALTER TABLE `tags`
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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `post_tag_relation`
--
ALTER TABLE `post_tag_relation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `post_tag_relation`
--
ALTER TABLE `post_tag_relation`
  ADD CONSTRAINT `post_tag_relation_ibfk_1` FOREIGN KEY (`postId`) REFERENCES `post_event_confirm_data` (`id`),
  ADD CONSTRAINT `post_tag_relation_ibfk_2` FOREIGN KEY (`tagId`) REFERENCES `tags` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
