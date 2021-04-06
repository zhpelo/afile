-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2021-04-07 01:50:05
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

-- --------------------------------------------------------

--
-- 表的结构 `zpl_options`
--

CREATE TABLE `zpl_options` (
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `option_value` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `option_explain` varchar(64) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL COMMENT '配置说明',
  `autoload` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 转存表中的数据 `zpl_options`
--

INSERT INTO `zpl_options` (`option_id`, `option_name`, `option_value`, `option_explain`, `autoload`) VALUES
(1, 'siteurl', 'http://sss.com', '站点网址', 'yes'),
(2, 'sitename', '文件传输系统', '站点名称', 'yes'),
(3, 'keywords', '站点关键词', '站点关键词', 'yes'),
(4, 'description', '站点描述', '站点描述', 'yes');

-- --------------------------------------------------------

--
-- 表的结构 `zpl_text`
--

CREATE TABLE `zpl_text` (
  `text_id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `is_only` tinyint(1) NOT NULL,
  `alias` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `is_lan` tinyint(1) NOT NULL,
  `upload_ip` varchar(46) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` int(10) NOT NULL,
  `expire_time` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `zpl_user`
--

CREATE TABLE `zpl_user` (
  `user_id` int(10) NOT NULL,
  `username` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_time` int(10) DEFAULT NULL,
  `login_ip` varchar(46) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_time` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `zpl_user`
--

INSERT INTO `zpl_user` (`user_id`, `username`, `password`, `nickname`, `bio`, `email`, `mobile`, `login_time`, `login_ip`, `create_time`) VALUES
(1, 'ssss', '24071be1d50298ad79e18d861f8f403f', NULL, NULL, NULL, NULL, NULL, NULL, 1616859122),
(2, 'aaaa', '7c3d596ed03ab9116c547b0eb678b247', NULL, NULL, NULL, NULL, NULL, NULL, 1616859564),
(3, 'test', 'b43bed16d5e6a0894102919fa27fbb9b', '我的昵称', '这是什么呀', NULL, NULL, NULL, NULL, 1617197933);

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
-- 表的索引 `zpl_options`
--
ALTER TABLE `zpl_options`
  ADD PRIMARY KEY (`option_id`),
  ADD UNIQUE KEY `option_name` (`option_name`),
  ADD KEY `autoload` (`autoload`);

--
-- 表的索引 `zpl_text`
--
ALTER TABLE `zpl_text`
  ADD PRIMARY KEY (`text_id`);

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
  MODIFY `file_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `zpl_options`
--
ALTER TABLE `zpl_options`
  MODIFY `option_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `zpl_text`
--
ALTER TABLE `zpl_text`
  MODIFY `text_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `zpl_user`
--
ALTER TABLE `zpl_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
