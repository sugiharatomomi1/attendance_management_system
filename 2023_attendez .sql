-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2023 年 11 朁E15 日 16:43
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
  `password` varchar(11) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `secret_question1` varchar(50) NOT NULL,
  `secret_question2` varchar(50) NOT NULL,
  `secret_question3` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `myapp_admin_info`
--

INSERT INTO `myapp_admin_info` (`id`, `school_id`, `name`, `class`, `mailadress`, `password`, `phone_number`, `secret_question1`, `secret_question2`, `secret_question3`) VALUES
(1, '1', '名倉', '2-I', 'bpu7692@gmail.com', '1', '0120107243', '松岡', 'ジョー・バイデン', 'ローマの休日'),
(2, '1', '甲村', '1-I', 'N2220097@ngo.ohara.ac.jp', 'ohara', '01204928498', '一', '楽天カード', 'ロカ岬'),
(3, '1', '山本', '2-A', 'n2220056@ngo.ohara.ac.jp', '11', '07056045060', '不知火', 'メンマ', 'ラピュタの城'),
(4, '', '1', '1', '1', '1', '1', '1', '1', '1'),
(5, '1', '和也', '2-I', 'n2220098@ngo.ohara.ac.jp', '12345', '21', 'ささしま', 'ジョー・バイデン', 'ハリーポッター');

-- --------------------------------------------------------

--
-- テーブルの構造 `myapp_attendstatus`
--

CREATE TABLE IF NOT EXISTS `myapp_attendstatus` (
  `id` int(11) NOT NULL,
  `student_number` varchar(70) NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  `arrive_time` datetime DEFAULT NULL,
  `leave_time` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `myapp_attendstatus`
--

INSERT INTO `myapp_attendstatus` (`id`, `student_number`, `date`, `status`, `arrive_time`, `leave_time`) VALUES
(1, '0', '2023-11-13', '出席', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'n22200556', '2023-11-13', '遅刻', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'n2220056', '2023-11-13', '欠席', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'n2220064', '2023-11-14', '公欠', '2000-09-20 00:00:00', '0000-00-00 00:00:00'),
(5, 'n2220096', '2023-11-14', '早退', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'n2220097', '2023-11-13', '出席', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'n2220056', '2023-11-15', '公欠', '2023-11-15 14:13:39', '2023-11-15 14:13:39'),
(8, 'N2220064', '2023-11-15', '欠席', NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `question`
--

INSERT INTO `question` (`question_id`, `question`, `question_answer`, `answer_1`, `answer_2`, `answer_3`, `answer_4`) VALUES
(1, 'テスト用', 'ア', '戦場カメラマン渡部陽一', 'アナフィラキシーショック', '愛知県', 'エタノール直飲み'),
(2, '&lt;h1&gt;ITサービスマネジメント&lt;/h1&gt;において，一次サポートグループが二次サポートグループにインシデントの解決を依頼することを何というか。ここで，一次サポートグループは，インシデントの初期症状のデータを収集し，利用者との継続的なコミュニケーションのための，コミュニケーションの役割を果たすグループであり，二次サポートグループは，専門的技能及び経験をもつグループである。', 'エ', '表示します。', '&lt;h1&gt;aaaa&lt;/h1&gt;', 'アナリティクス', '誤り'),
(6, '大変申し訳ございません', 'ウ', 'AO入試受付中', 'for', 'それはとてもすばらしい', 'ひょ'),
(8, '稼働率0.9の装置を用いて，稼働率0.999以上の多重化システムを作りたい。この装置を最低何台並列に接続すればよいか。', 'イ', '2', '3', '4', '5');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `students_info`
--

INSERT INTO `students_info` (`id`, `IDM`, `student_number`, `class`, `attendance_number`, `name`, `password`) VALUES
(1, '01010212311c0334', 'N2220064', '2I', 1, 'Kintestu_ICOCA', '1'),
(2, '1111', 'n2220056', '2I', 15, '大原一郎', '4649'),
(3, '12345678', 'n2220096', '2I', 16, 'ポテチ', 'ohara'),
(4, '14545678', 'n2220097', '2I', 14, '鉄道', 'ohara'),
(5, 'vcvxcv', 'vxcvxc', 'xcvxcvxc', 0, 'vxcvxcvc', 'xcvxcvcxv'),
(7, '10', '20', '30', 40, '50', '60'),
(11, '1', '1', '1', 1, '1', '1');

-- --------------------------------------------------------

--
-- テーブルの構造 `student_message`
--

CREATE TABLE IF NOT EXISTS `student_message` (
  `id` int(11) NOT NULL,
  `student_number` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `text` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `student_message`
--

INSERT INTO `student_message` (`id`, `student_number`, `date`, `text`) VALUES
(1, 'n2220056', '2023-11-15', '就活が入りました\r\n');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `myapp_admin_info`
--
ALTER TABLE `myapp_admin_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `myapp_attendstatus`
--
ALTER TABLE `myapp_attendstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `students_info`
--
ALTER TABLE `students_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `student_message`
--
ALTER TABLE `student_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
