-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2021-03-30 01:59:58
-- 服务器版本： 5.7.26
-- PHP 版本： 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `sss`
--

-- --------------------------------------------------------

--
-- 表的结构 `wxr_file`
--

CREATE TABLE `wxr_file` (
  `file_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `md5` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` int(20) NOT NULL,
  `suffix` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `is_lan` tinyint(1) NOT NULL COMMENT '是否内网共享',
  `upload_ip` varchar(46) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '上传者ip',
  `is_only` tinyint(1) NOT NULL COMMENT '阅后即焚',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `expire_time` int(10) DEFAULT NULL COMMENT '过期时间 '
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `wxr_file`
--

INSERT INTO `wxr_file` (`file_id`, `user_id`, `name`, `md5`, `url`, `size`, `suffix`, `is_lan`, `upload_ip`, `is_only`, `create_time`, `expire_time`) VALUES
(1, 1, 'mmqrcode1616765464936.png', 'd404e9fd21a562a55a205563e123f2b0', 'upload/2021/03/30/d404e9fd21a562a55a205563e123f2b0.png', 41602, 'png', 1, NULL, 0, 1617037953, 1617642753),
(2, 1, 'telegram_PNG33.png', '645f565e3accf785cddcdc7263ee2297', 'upload/2021/03/30/645f565e3accf785cddcdc7263ee2297.png', 17244, 'png', 1, NULL, 1, 1617038397, NULL),
(3, 1, 'telegram_PNG33.png', '645f565e3accf785cddcdc7263ee2297', 'upload/2021/03/30/645f565e3accf785cddcdc7263ee2297.png', 17244, 'png', 1, NULL, 1, 1617038494, NULL),
(4, 1, '主图-03.jpg', '4e60930da88b92f39c1eefa467f5b2dd', 'upload/2021/03/30/4e60930da88b92f39c1eefa467f5b2dd.jpg', 238858, 'jpg', 1, NULL, 0, 1617038586, NULL),
(5, 1, '主图-05.jpg', '1d4387aa94777328c604bf0da53cdf24', 'upload/2021/03/30/1d4387aa94777328c604bf0da53cdf24.jpg', 158775, 'jpg', 1, '127.0.0.1', 1, 1617039136, NULL),
(6, 1, '一个村庄的家.azw3', '2aff402970746b13d580a63ff367d145', 'upload/2021/03/30/2aff402970746b13d580a63ff367d145.azw3', 338332, 'azw3', 1, '127.0.0.1', 1, 1617040406, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `wxr_user`
--

CREATE TABLE `wxr_user` (
  `user_id` int(10) NOT NULL,
  `username` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `wxr_user`
--

INSERT INTO `wxr_user` (`user_id`, `username`, `password`, `create_time`) VALUES
(1, 'ssss', '24071be1d50298ad79e18d861f8f403f', 1616859122),
(2, 'aaaa', '7c3d596ed03ab9116c547b0eb678b247', 1616859564);

--
-- 转储表的索引
--

--
-- 表的索引 `wxr_file`
--
ALTER TABLE `wxr_file`
  ADD PRIMARY KEY (`file_id`);

--
-- 表的索引 `wxr_user`
--
ALTER TABLE `wxr_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `wxr_file`
--
ALTER TABLE `wxr_file`
  MODIFY `file_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用表AUTO_INCREMENT `wxr_user`
--
ALTER TABLE `wxr_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
