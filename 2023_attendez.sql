-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2023 年 11 朁E20 日 16:29
-- サーバのバージョン： 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `2023_attendez`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `attend`
--

CREATE TABLE IF NOT EXISTS `attend` (
  `student_number` varchar(70) NOT NULL DEFAULT '0',
  `ID` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `attendance` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `calendar`
--

CREATE TABLE IF NOT EXISTS `calendar` (
  `id` int(11) NOT NULL,
  `holiday` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=341 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `calendar`
--

INSERT INTO `calendar` (`id`, `holiday`) VALUES
(329, '2023-11-01'),
(339, '2023-11-07'),
(330, '2023-11-08'),
(337, '2023-11-09'),
(338, '2023-11-10'),
(327, '2023-11-14'),
(326, '2023-11-15'),
(328, '2023-11-16'),
(336, '2023-11-17'),
(324, '2023-12-01');

-- --------------------------------------------------------

--
-- テーブルの構造 `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `student_number` varchar(70) NOT NULL,
  `year` varchar(15) NOT NULL,
  `month` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `situation` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `student_number` varchar(70) CHARACTER SET utf8mb4 NOT NULL,
  `touch_date` date NOT NULL,
  `touch_time` time NOT NULL,
  `touch_status` varchar(30) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `log`
--

INSERT INTO `log` (`name`, `student_number`, `touch_date`, `touch_time`, `touch_status`) VALUES
('Test-1', 'Test-1', '2023-11-17', '00:00:00', 'IN'),
('Test-2', 'Test-2', '2023-11-17', '23:59:59', 'OUT'),
('Test-3', 'Test-3', '2023-11-16', '00:00:00', 'IN'),
('Test-4', 'Test-4', '2023-11-15', '00:00:00', 'IN'),
('Test-5', 'Test-5', '2023-11-14', '00:00:00', 'IN'),
('Test-6', 'Test-6', '2023-11-16', '23:59:59', 'IN'),
('Test-7', 'Test-7', '2023-11-16', '00:00:00', 'OUT'),
('Test-8', 'Test-8', '2023-11-11', '00:00:00', 'IN'),
('Test-8', 'Test-8', '2023-11-09', '00:00:00', 'IN');

-- --------------------------------------------------------

--
-- テーブルの構造 `myapp_admin_info`
--

CREATE TABLE IF NOT EXISTS `myapp_admin_info` (
  `id` int(11) NOT NULL,
  `school_id` varchar(30) NOT NULL,
  `name` varchar(70) NOT NULL,
  `class` varchar(11) NOT NULL,
  `mailadress` varchar(70) NOT NULL,
  `password` varchar(11) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `secret_question1` varchar(50) NOT NULL,
  `secret_question2` varchar(50) NOT NULL,
  `secret_question3` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `myapp_admin_info`
--

INSERT INTO `myapp_admin_info` (`id`, `school_id`, `name`, `class`, `mailadress`, `password`, `phone_number`, `secret_question1`, `secret_question2`, `secret_question3`) VALUES
(1, '1', '名倉', '2-I', 'bpu7692@gmail.com', '1', '0120107243', '松岡', 'ジョー・バイデン', 'ローマの休日'),
(2, '1', '甲村', '1-I', 'N2220097@ngo.ohara.ac.jp', 'ohara', '01204928498', '一', '楽天カード', 'ロカ岬'),
(3, '1', '田中', '2-A', 'n2220056@ngo.ohara.ac.jp', 'N700A', '07056045060', '不知火', 'メンマ', 'ラピュタの城'),
(4, '', '1', '1', '1', '1', '1', '1', '1', '1'),
(5, '1', '和也', '2-I', 'n2220098@ngo.ohara.ac.jp', '12345', '21', 'ささしま', 'ジョー・バイデン', 'ハリーポッター'),
(6, '3', 'ベルマートキヨスク桑名', '2e', '3@p', '1', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- テーブルの構造 `myapp_attendstatus`
--

CREATE TABLE IF NOT EXISTS `myapp_attendstatus` (
  `id` int(11) NOT NULL,
  `student_number` varchar(70) NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  `arrive_time` time DEFAULT NULL,
  `leave_time` time DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `myapp_attendstatus`
--

INSERT INTO `myapp_attendstatus` (`id`, `student_number`, `date`, `status`, `arrive_time`, `leave_time`) VALUES
(14, 'n2220056', '2023-11-20', '出席', NULL, NULL),
(17, 'n2220096', '2023-11-20', '遅刻', NULL, NULL),
(18, 'N2230565', '2023-11-20', '遅刻（遅延）', NULL, NULL),
(19, 'n2220192', '2023-11-20', '遅刻（遅延）', NULL, NULL),
(20, '7', '2023-11-20', '欠席', NULL, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `question_id` int(30) NOT NULL,
  `question` varchar(400) NOT NULL DEFAULT '',
  `question_answer` varchar(400) NOT NULL,
  `answer_1` varchar(400) DEFAULT NULL,
  `answer_2` varchar(400) NOT NULL,
  `answer_3` varchar(400) NOT NULL,
  `answer_4` varchar(400) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `question`
--

INSERT INTO `question` (`question_id`, `question`, `question_answer`, `answer_1`, `answer_2`, `answer_3`, `answer_4`) VALUES
(1, 'テスト用', 'ア', '戦場カメラマン渡部陽', 'アナフィラキシーショック', '愛知県', 'エタノール直飲み'),
(2, '&lt;h1&gt;ITサービスマネジメント&lt;/h1&gt;', 'エ', '表示します。', '&lt;h1&gt;aaaa&lt;/h1&gt;', 'アナリティクス', '誤り'),
(6, '大変申し訳ございません', 'ウ', 'AO入試受付中', 'for', 'それはとてもすばらしい', 'ひょ'),
(8, '稼働率0.9の装置を用いて，稼働率0.999以上の多重化システムを作りたい。この装置を最低何台並列に接続すればよいか。', 'イ', '2', '3', '4', '5'),
(10, 'なんかとてもすごい問題', 'ア', 'gg', 'ff外から失礼します', 'マンガ肉', 'ポッキー');

-- --------------------------------------------------------

--
-- テーブルの構造 `response`
--

CREATE TABLE IF NOT EXISTS `response` (
  `student_number` varchar(11) NOT NULL,
  `day1` varchar(10) DEFAULT NULL,
  `day2` varchar(10) DEFAULT NULL,
  `day3` varchar(10) DEFAULT NULL,
  `day4` varchar(10) DEFAULT NULL,
  `day5` varchar(10) DEFAULT NULL,
  `day6` varchar(10) DEFAULT NULL,
  `day7` varchar(10) DEFAULT NULL,
  `day8` varchar(10) DEFAULT NULL,
  `day9` varchar(10) DEFAULT NULL,
  `day10` varchar(10) DEFAULT NULL,
  `day11` varchar(10) DEFAULT NULL,
  `day12` varchar(10) DEFAULT NULL,
  `day13` varchar(10) DEFAULT NULL,
  `day14` varchar(10) DEFAULT NULL,
  `day15` varchar(10) DEFAULT NULL,
  `day16` varchar(10) DEFAULT NULL,
  `day17` varchar(10) DEFAULT NULL,
  `day18` varchar(10) DEFAULT NULL,
  `day19` varchar(10) DEFAULT NULL,
  `day20` varchar(10) DEFAULT NULL,
  `day21` varchar(10) DEFAULT NULL,
  `day22` varchar(10) DEFAULT NULL,
  `day23` varchar(10) DEFAULT NULL,
  `day24` varchar(10) DEFAULT NULL,
  `day25` varchar(10) DEFAULT NULL,
  `day26` varchar(10) DEFAULT NULL,
  `day27` varchar(10) DEFAULT NULL,
  `day28` varchar(10) DEFAULT NULL,
  `day29` varchar(10) DEFAULT NULL,
  `day30` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `response`
--

INSERT INTO `response` (`student_number`, `day1`, `day2`, `day3`, `day4`, `day5`, `day6`, `day7`, `day8`, `day9`, `day10`, `day11`, `day12`, `day13`, `day14`, `day15`, `day16`, `day17`, `day18`, `day19`, `day20`, `day21`, `day22`, `day23`, `day24`, `day25`, `day26`, `day27`, `day28`, `day29`, `day30`) VALUES
('n2220096', '不正解', '不正解', '無回答', '無回答', '不正解', '不正解', '不正解', '不正解', '正解', '無回答', '不正解', '不正解', '正解', '不正解', '無回答', '無回答', '不正解', '不正解', '無回答', '不正解', '不正解', '正解', '不正解', '不正解', '正解', '不正解', '不正解', '無回答', '不正解', '不正解'),
('n2220192', '正解', '正解', '正解', '正解', '正解', '正解', '正解', '正解', '正解', '正解', '正解', '正解', '正解', '正解', '正解', '正解', '正解', '正解', '正解', '正解', '正解', '正解', '正解', '正解', '正解', '正解', '正解', '正解', '正解', '正解'),
('N22305568', '不正解', '無回答', '正解', '無回答', '正解', '不正解', '不正解', '無回答', '正解', '無回答', '正解', '不正解', '無回答', '正解', '不正解', '無回答', '正解', '不正解', '無回答', '正解', '不正解', '無回答', '正解', '不正解', '無回答', '正解', '不正解', '無回答', '正解', '不正解');

-- --------------------------------------------------------

--
-- テーブルの構造 `students_info`
--

CREATE TABLE IF NOT EXISTS `students_info` (
  `id` int(11) NOT NULL,
  `IDM` varchar(20) NOT NULL DEFAULT '',
  `student_number` varchar(255) NOT NULL,
  `class` varchar(11) NOT NULL,
  `attendance_number` int(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `students_info`
--

INSERT INTO `students_info` (`id`, `IDM`, `student_number`, `class`, `attendance_number`, `name`, `password`) VALUES
(2, '1111', 'n2220056', '2A', 15, '大原一郎', '1'),
(3, '12345678', 'n2220096', '2I', 16, 'ポテチ', 'ohara'),
(4, '34325432', 'n2220192', '2A', 3, 'KINTETSU_ICOCA', '1'),
(7, '10', '20', '2A', 40, '50', '60'),
(14, 'xbf053b53bfbf03f', 'N2220055', '2I', 35, 'ギフトキヨスク伊勢市', '1'),
(15, '3573ghg1h', 'N22305565', '2I', 14, 'ベルマートキヨスク津', '1'),
(16, '24144gfd411241543', 'N22305567', '2I', 74, 'ベルマートキヨスク松阪', '1'),
(17, '24144gfd41124151', 'N22305568', '2I', 57, 'ベルマートキヨスク亀山(閉店)', '1'),
(18, '24144gfd41144151', '1000', '2I', 100, 'グランドキヨスク名古屋', '1'),
(19, '24144gfd41744151', 'N2230561', '2A', 78, 'ギフトパレット京都', '1'),
(20, '24144gfd41744152', 'N2230569', '2B', 73, '株式会社ＪＲ東海リテイリング・プラス', '1'),
(21, '24144gfd417452', 'N2230565', '2I', 73, '近畿日本ツーリスト', '1'),
(22, '786', 'N223051', '2I', 73, 'ＪＲ東海ツアーズ', '1'),
(23, '9', '9', '2B', 9, '9', '9'),
(24, '5', '5', '2B', 5, '5', '5'),
(25, '6', '6', '2B', 6, '6', '6'),
(26, '7', '7', '2A', 7, '7', '7');

-- --------------------------------------------------------

--
-- テーブルの構造 `student_message`
--

CREATE TABLE IF NOT EXISTS `student_message` (
  `id` int(11) NOT NULL,
  `student_number` varchar(30) NOT NULL,
  `datetime` datetime NOT NULL,
  `text` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `student_message`
--

INSERT INTO `student_message` (`id`, `student_number`, `datetime`, `text`) VALUES
(1, 'n2220056', '2023-11-15 00:00:00', '就活が入りました\r\n'),
(2, 'n2220056', '2023-11-16 00:00:00', '就職活動で東京に行ってきます！！！！！！'),
(3, 'n2220096', '2023-11-16 14:45:57', '就活'),
(6, 'n2220097', '2023-11-16 15:10:49', '1234'),
(7, '20', '2023-11-16 15:11:23', '二川原寝坊'),
(8, '1', '2023-11-17 09:30:16', '中部国際空港行き　10分ステルス遅延　東岡崎行き満員'),
(9, 'n2220056', '2023-11-20 09:44:28', '体調不良'),
(10, 'N2220064', '2023-11-20 10:11:48', '諸事情'),
(11, '3', '2023-11-20 11:52:48', '破産のため登校不可'),
(12, 'n2220096', '2023-11-20 14:09:52', '近鉄線人身事故'),
(13, 'N2230565', '2023-11-20 14:10:30', 'インフルエンザ'),
(14, 'n2220192', '2023-11-20 15:04:15', '<h1>ライブに行ってきます！！！！！！！！！！！！！！！！！</h1>'),
(15, '7', '2023-11-20 15:24:04', '&lt;marquee bgcolor=&quot;#000000&quot; width=&quo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attend`
--
ALTER TABLE `attend`
  ADD PRIMARY KEY (`student_number`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `unique_holiday` (`holiday`);

--
-- Indexes for table `myapp_admin_info`
--
ALTER TABLE `myapp_admin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myapp_attendstatus`
--
ALTER TABLE `myapp_attendstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`student_number`);

--
-- Indexes for table `students_info`
--
ALTER TABLE `students_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_message`
--
ALTER TABLE `student_message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=341;
--
-- AUTO_INCREMENT for table `myapp_admin_info`
--
ALTER TABLE `myapp_admin_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `myapp_attendstatus`
--
ALTER TABLE `myapp_attendstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `students_info`
--
ALTER TABLE `students_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `student_message`
--
ALTER TABLE `student_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
