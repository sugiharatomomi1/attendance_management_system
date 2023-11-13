-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2023 年 11 朁E13 日 16:01
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
  `holiday` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `calendar`
--

INSERT INTO `calendar` (`id`, `holiday`) VALUES
(22, '20231122'),
(23, '2023119'),
(35, '2023111'),
(36, '2023111'),
(37, '2023112'),
(38, '2023111');

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
-- テーブルの構造 `myapp_admin_info`
--

CREATE TABLE IF NOT EXISTS `myapp_admin_info` (
  `id` int(11) NOT NULL,
  `school_id` varchar(30) NOT NULL,
  `name` varchar(70) NOT NULL,
  `class` varchar(11) NOT NULL,
  `mailadress` varchar(70) NOT NULL,
  `password` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `myapp_admin_info`
--

INSERT INTO `myapp_admin_info` (`id`, `school_id`, `name`, `class`, `mailadress`, `password`) VALUES
(1, '1', '名倉', '2-I', 'bpu7692@gmail.com', 'nagoya'),
(2, '1', '甲村', '1-I', 'N2220097@ngo.ohara.ac.jp', 'ohara'),
(3, '1', '山本', '2-A', 'n2220056@ngo.ohara.ac.jp', 'N700S');

-- --------------------------------------------------------

--
-- テーブルの構造 `myapp_attendstatus`
--

CREATE TABLE IF NOT EXISTS `myapp_attendstatus` (
  `student_number` varchar(70) NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  `arrive_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `leave_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `myapp_attendstatus`
--

INSERT INTO `myapp_attendstatus` (`student_number`, `date`, `status`, `arrive_time`, `leave_time`) VALUES
('0', '0000-00-00', '出席', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1', '0000-00-00', '出席', '2000-09-20 00:00:00', '0000-00-00 00:00:00'),
('n22200556', '0000-00-00', '出席', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('n2220056', '2023-11-13', '欠席', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('n2220096', '2023-11-10', '出席', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('n2220097', '2023-11-10', '出席', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `question`
--

INSERT INTO `question` (`question_id`, `question`, `question_answer`, `answer_1`, `answer_2`, `answer_3`, `answer_4`) VALUES
(1, 'テスト用', 'ア', '戦場カメラマン渡部陽一', 'アナフィラキシーショック', '愛知県', 'エタノール直飲み'),
(2, '&lt;h1&gt;ITサービスマネジメント&lt;/h1&gt;において，一次サポートグループが二次サポートグループにインシデントの解決を依頼することを何というか。ここで，一次サポートグループは，インシデントの初期症状のデータを収集し，利用者との継続的なコミュニケーションのための，コミュニケーションの役割を果たすグループであり，二次サポートグループは，専門的技能及び経験をもつグループである。', 'エ', '表示します。', '&lt;h1&gt;aaaa&lt;/h1&gt;', 'アナリティクス', '誤り'),
(3, '気が小さくてかわいそうな人', 'イ', 'aaaaaaaaaaaaaaaaaaa', 'for', 'それはとてもすばらしい', 'ちいかわ'),
(5, 'こんにちは', 'イ', 'ほほほほほほほｈ', 'for', 'それはとてもすばらしい', 'ひょ'),
(6, '大変申し訳ございません', 'ウ', 'aaaaaaaaaaaaaaaaaaa', 'for', 'それはとてもすばらしい', 'ひょ'),
(8, '稼働率0.9の装置を用いて，稼働率0.999以上の多重化システムを作りたい。この装置を最低何台並列に接続すればよいか。', 'イ', '2', '3', '4', '5');

-- --------------------------------------------------------

--
-- テーブルの構造 `students_info`
--

CREATE TABLE IF NOT EXISTS `students_info` (
  `id` int(11) NOT NULL,
  `IDM` varchar(20) NOT NULL DEFAULT '',
  `student_number` varchar(11) NOT NULL,
  `class` varchar(11) NOT NULL,
  `attendance_number` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `students_info`
--

INSERT INTO `students_info` (`id`, `IDM`, `student_number`, `class`, `attendance_number`, `name`, `password`) VALUES
(1, '01010212311c0334', 'N2220064', '2I', 1, 'Kintestu_ICOCA', '1'),
(2, '1111', 'n2220056', '2I', 15, '大原一郎', '4649'),
(3, '12345678', 'n2220096', '2I', 16, 'ポテチ', 'ohara'),
(4, '14545678', 'n2220097', '2I', 14, '鉄道', 'ohara');

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myapp_admin_info`
--
ALTER TABLE `myapp_admin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myapp_attendstatus`
--
ALTER TABLE `myapp_attendstatus`
  ADD PRIMARY KEY (`student_number`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `students_info`
--
ALTER TABLE `students_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `myapp_admin_info`
--
ALTER TABLE `myapp_admin_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `students_info`
--
ALTER TABLE `students_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
