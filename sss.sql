-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2021-03-31 22:13:08
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
-- 表的结构 `zpl_admin`
--

CREATE TABLE `zpl_admin` (
  `admin_id` int(10) NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `zpl_admin`
--

INSERT INTO `zpl_admin` (`admin_id`, `username`, `password`, `create_time`) VALUES
(1, 'admin', '14e1b600b1fd579f47433b88e8d85291', 1617197933);

-- --------------------------------------------------------

--
-- 表的结构 `zpl_file`
--

CREATE TABLE `zpl_file` (
  `file_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `md5` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
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
-- 转存表中的数据 `zpl_file`
--

INSERT INTO `zpl_file` (`file_id`, `user_id`, `name`, `md5`, `alias`, `url`, `size`, `suffix`, `is_lan`, `upload_ip`, `is_only`, `create_time`, `expire_time`) VALUES
(1, 1, 'mmqrcode1616765464936.png', 'd404e9fd21a562a55a205563e123f2b0', NULL, 'upload/2021/03/30/d404e9fd21a562a55a205563e123f2b0.png', 41602, 'png', 1, NULL, 0, 1617037953, 1617642753),
(2, 1, 'telegram_PNG33.png', '645f565e3accf785cddcdc7263ee2297', NULL, 'upload/2021/03/30/645f565e3accf785cddcdc7263ee2297.png', 17244, 'png', 1, NULL, 1, 1617038397, NULL),
(3, 1, 'telegram_PNG33.png', '645f565e3accf785cddcdc7263ee2297', NULL, 'upload/2021/03/30/645f565e3accf785cddcdc7263ee2297.png', 17244, 'png', 1, NULL, 1, 1617038494, NULL),
(4, 1, '主图-03.jpg', '4e60930da88b92f39c1eefa467f5b2dd', NULL, 'upload/2021/03/30/4e60930da88b92f39c1eefa467f5b2dd.jpg', 238858, 'jpg', 1, NULL, 0, 1617038586, NULL),
(5, 1, '主图-05.jpg', '1d4387aa94777328c604bf0da53cdf24', NULL, 'upload/2021/03/30/1d4387aa94777328c604bf0da53cdf24.jpg', 158775, 'jpg', 1, '127.0.0.1', 1, 1617039136, NULL),
(6, 1, '一个村庄的家.azw3', '2aff402970746b13d580a63ff367d145', NULL, 'upload/2021/03/30/2aff402970746b13d580a63ff367d145.azw3', 338332, 'azw3', 1, '127.0.0.1', 1, 1617040406, NULL),
(7, 1, 'telegram_PNG33.png', '645f565e3accf785cddcdc7263ee2297', NULL, 'upload/2021/03/31/645f565e3accf785cddcdc7263ee2297.png', 17244, 'png', 1, '127.0.0.1', 1, 1617183824, NULL),
(8, 1, 'telegram_PNG33.png', '645f565e3accf785cddcdc7263ee2297', 'eQlfSe', 'upload/2021/03/31/645f565e3accf785cddcdc7263ee2297.png', 17244, 'png', 1, '127.0.0.1', 1, 1617184421, NULL),
(9, 1, 'telegram_PNG33.png', '645f565e3accf785cddcdc7263ee2297', 'Od8RdC', 'upload/2021/03/31/645f565e3accf785cddcdc7263ee2297.png', 17244, 'png', 1, '127.0.0.1', 1, 1617184469, NULL),
(10, 1, 'telegram_PNG33.png', '645f565e3accf785cddcdc7263ee2297', 'cZ4yH3', 'upload/2021/03/31/645f565e3accf785cddcdc7263ee2297.png', 17244, 'png', 1, '127.0.0.1', 1, 1617184519, NULL),
(11, 1, 'telegram_PNG33.png', '645f565e3accf785cddcdc7263ee2297', 'EVnvXc', 'upload/2021/03/31/645f565e3accf785cddcdc7263ee2297.png', 17244, 'png', 1, '127.0.0.1', 1, 1617184539, NULL),
(12, 1, 'telegram_PNG33.png', '645f565e3accf785cddcdc7263ee2297', 'T8rOr3', 'upload/2021/03/31/645f565e3accf785cddcdc7263ee2297.png', 17244, 'png', 1, '127.0.0.1', 1, 1617184578, NULL),
(13, 1, 'telegram_PNG33.png', '645f565e3accf785cddcdc7263ee2297', 'WO52fv', 'upload/2021/03/31/645f565e3accf785cddcdc7263ee2297.png', 17244, 'png', 1, '127.0.0.1', 1, 1617184651, NULL),
(14, 1, 'telegram_PNG33.png', '645f565e3accf785cddcdc7263ee2297', '5tz8CQ', 'upload/2021/03/31/645f565e3accf785cddcdc7263ee2297.png', 17244, 'png', 1, '127.0.0.1', 1, 1617184666, NULL),
(15, 1, 'telegram_PNG33.png', '645f565e3accf785cddcdc7263ee2297', 'gIVUI0', 'upload/2021/03/31/645f565e3accf785cddcdc7263ee2297.png', 17244, 'png', 1, '127.0.0.1', 1, 1617184731, NULL),
(16, 0, 'telegram_PNG33.png', '645f565e3accf785cddcdc7263ee2297', 'uWpKFz', 'upload/2021/03/31/645f565e3accf785cddcdc7263ee2297.png', 17244, 'png', 1, '127.0.0.1', 1, 1617194191, NULL),
(17, 0, 'telegram_PNG33.png', '645f565e3accf785cddcdc7263ee2297', 'Dot6MH', 'upload/2021/03/31/645f565e3accf785cddcdc7263ee2297.png', 17244, 'png', 1, '127.0.0.1', 1, 1617194234, NULL),
(18, 0, 'telegram_PNG33.png', '645f565e3accf785cddcdc7263ee2297', '1NKjAy', 'upload/2021/03/31/645f565e3accf785cddcdc7263ee2297.png', 17244, 'png', 1, '127.0.0.1', 1, 1617194237, NULL),
(19, 0, 'telegram_PNG33.png', '645f565e3accf785cddcdc7263ee2297', 'SDO3Tw', 'upload/2021/03/31/645f565e3accf785cddcdc7263ee2297.png', 17244, 'png', 1, '127.0.0.1', 1, 1617194370, NULL),
(20, 0, 'telegram_PNG33.png', '645f565e3accf785cddcdc7263ee2297', 'rNSQR3', 'upload/2021/03/31/645f565e3accf785cddcdc7263ee2297.png', 17244, 'png', 1, '127.0.0.1', 1, 1617194454, NULL),
(21, 0, '人偶的复活.mobi', '0b05219f84f496746875915130d4abe6', '5tKZEv', 'upload/2021/03/31/0b05219f84f496746875915130d4abe6.mobi', 505205, 'mobi', 1, '127.0.0.1', 0, 1617196313, 1617801113),
(22, 0, '认知行为疗法入门.mobi', '704639ec886ddaea5963a0260353a23c', 'jRNDLE', 'upload/2021/03/31/704639ec886ddaea5963a0260353a23c.mobi', 3487217, 'mobi', 1, '127.0.0.1', 1, 1617196682, 1617197088);

-- --------------------------------------------------------

--
-- 表的结构 `zpl_user`
--

CREATE TABLE `zpl_user` (
  `user_id` int(10) NOT NULL,
  `username` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `zpl_user`
--

INSERT INTO `zpl_user` (`user_id`, `username`, `password`, `create_time`) VALUES
(1, 'ssss', '24071be1d50298ad79e18d861f8f403f', 1616859122),
(2, 'aaaa', '7c3d596ed03ab9116c547b0eb678b247', 1616859564),
(3, 'test', '14e1b600b1fd579f47433b88e8d85291', 1617197933);

--
-- 转储表的索引
--

--
-- 表的索引 `zpl_admin`
--
ALTER TABLE `zpl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- 表的索引 `zpl_file`
--
ALTER TABLE `zpl_file`
  ADD PRIMARY KEY (`file_id`);

--
-- 表的索引 `zpl_user`
--
ALTER TABLE `zpl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `zpl_admin`
--
ALTER TABLE `zpl_admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `zpl_file`
--
ALTER TABLE `zpl_file`
  MODIFY `file_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- 使用表AUTO_INCREMENT `zpl_user`
--
ALTER TABLE `zpl_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
