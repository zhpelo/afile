-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2021-04-11 21:02:42
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
(1, 'long', '14e1b600b1fd579f47433b88e8d85291', 1617197933);

-- --------------------------------------------------------

--
-- 表的结构 `zpl_file`
--

CREATE TABLE `zpl_file` (
  `file_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `parent_id` int(10) NOT NULL DEFAULT '0',
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

INSERT INTO `zpl_file` (`file_id`, `user_id`, `parent_id`, `name`, `md5`, `alias`, `url`, `size`, `suffix`, `is_lan`, `upload_ip`, `is_only`, `create_time`, `expire_time`) VALUES
(12, 3, 0, '科学的隐忧.azw3', 'ae7f4b2a23f035257e3edf7599a6810b', 'c7xHiK', 'upload/ae/ae7f4b2a23f035257e3edf7599a6810b', 4208603, 'azw3', 0, '127.0.0.1', 0, 1618130587, NULL),
(13, 3, 0, '万历朝鲜战争全史.epub', 'ca5dcba2d246ea7d7714a5d448a422ca', 'NJPqnB', 'upload/ca/ca5dcba2d246ea7d7714a5d448a422ca', 4811666, 'epub', 0, '127.0.0.1', 0, 1618130587, NULL),
(11, 3, 0, '科学的隐忧.epub', '4cf208046cd764584bf8a49a25f0f357', 'mrZh0g', 'upload/4c/4cf208046cd764584bf8a49a25f0f357', 3295034, 'epub', 0, '127.0.0.1', 0, 1618130587, NULL),
(14, 3, 0, '万历朝鲜战争全史.azw3', 'de9c9147352da043b13375724251d22e', 'Ry1RS3', 'upload/de/de9c9147352da043b13375724251d22e', 7080311, 'azw3', 0, '127.0.0.1', 0, 1618130587, NULL),
(15, 3, 0, '万历朝鲜战争全史.mobi', '8035e186240f831e1ea879b35f08bab9', '1EiujQ', 'upload/80/8035e186240f831e1ea879b35f08bab9', 7085133, 'mobi', 0, '127.0.0.1', 0, 1618130587, NULL),
(16, 3, 0, '三岛由纪夫典藏作品九部（两次入围诺贝尔奖的文学大师三岛由纪夫代表作；日本文学翻译家陈德文先生译本；人民文学重磅出品）.epub', '8f48e1a92dc5c1af90622c274519522e', 'XxqO00', 'upload/8f/8f48e1a92dc5c1af90622c274519522e', 2696707, 'epub', 0, '127.0.0.1', 0, 1618130587, NULL),
(17, 3, 0, '三岛由纪夫典藏作品九部（两次入围诺贝尔奖的文学大师三岛由纪夫代表作；日本文学翻译家陈德文先生译本；人民文学重磅出品）.mobi', 'fd967226a025b6da0d86acc81cb2953e', '2DPvAp', 'upload/fd/fd967226a025b6da0d86acc81cb2953e', 6169179, 'mobi', 0, '127.0.0.1', 0, 1618130587, NULL),
(18, 3, 0, '三岛由纪夫典藏作品九部（两次入围诺贝尔奖的文学大师三岛由纪夫代表作；日本文学翻译家陈德文先生译本；人民文学重磅出品）.azw3', '62ea153b3c92e88916abc2a066a103fd', '8NR3it', 'upload/62/62ea153b3c92e88916abc2a066a103fd', 5218762, 'azw3', 0, '127.0.0.1', 0, 1618130587, NULL),
(19, 3, 0, '优秀到不能被忽视系列套装5册.epub', '78732b0c699e665361df46b17d246b60', 'yfVdFj', 'upload/78/78732b0c699e665361df46b17d246b60', 16399178, 'epub', 0, '127.0.0.1', 0, 1618130587, NULL),
(20, 3, 0, '优秀到不能被忽视系列套装5册.mobi', '5876620129b0d68c58c3b884352673e0', 'gYsBIJ', 'upload/58/5876620129b0d68c58c3b884352673e0', 24712722, 'mobi', 0, '127.0.0.1', 0, 1618130587, NULL),
(21, 3, 0, '优秀到不能被忽视系列套装5册.azw3', 'a4d913b69eab4dd229e54faf9216e83d', 'ZBY9hm', 'upload/a4/a4d913b69eab4dd229e54faf9216e83d', 35645563, 'azw3', 0, '127.0.0.1', 0, 1618130587, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `zpl_file_folder`
--

CREATE TABLE `zpl_file_folder` (
  `folder_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `folder_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `alias` varchar(6) DEFAULT NULL,
  `total_size` bigint(15) DEFAULT '0',
  `is_public` int(1) NOT NULL DEFAULT '0',
  `access_password` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `status` enum('active','trash','deleted') CHARACTER SET utf8 DEFAULT 'active',
  `create_time` int(10) DEFAULT NULL,
  `update_time` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `zpl_file_folder`
--

INSERT INTO `zpl_file_folder` (`folder_id`, `user_id`, `parent_id`, `folder_name`, `alias`, `total_size`, `is_public`, `access_password`, `status`, `create_time`, `update_time`) VALUES
(1, 3, 0, '内部目录', NULL, 0, 0, NULL, 'active', 1618120954, 1618120954),
(2, 3, 0, '电子书', 'UR4zKS', 0, 1, NULL, 'active', 1618121063, 1618121063);

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
(4, 'description', '站点描述', '站点描述', 'yes'),
(5, 'copyright', 'Copyright&nbsp;©&nbsp;2021 Powered by <code>SSS.MS</code>', '版权信息', 'yes');

-- --------------------------------------------------------

--
-- 表的结构 `zpl_page`
--

CREATE TABLE `zpl_page` (
  `page_id` int(10) NOT NULL,
  `page_url` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `create_time` int(10) NOT NULL,
  `update_time` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `zpl_page`
--

INSERT INTO `zpl_page` (`page_id`, `page_url`, `title`, `content`, `create_time`, `update_time`) VALUES
(2, 'about', '关于我们', '<p>XX于2004年正式涉足电商领域。2014年5月，XX集团在美国纳斯达克证券交易所正式挂牌上市，是中国第一个成功赴美上市的综合型电商平台。</p><p>2020年6月，XX集团在香港联交所二次上市，募集资金约345.58亿港元，用于投资以供应链为基础的关键技术创新，以进一步提升用户体验及提高运营效率。</p><p>\r\n\r\n2017年初，XX全面向技术转型，迄今XX体系已经投入了近600亿元用于技术研发。\r\n</p><p>\r\nXX集团定位于“以供应链为基础的技术与服务企业”，目前业务已涉及零售、科技、物流、健康、保险、产发和海外等领域。\r\n</p><p>\r\nXX集团奉行客户为先、诚信、协作、感恩、拼搏、担当的价值观，以“技术为本，致力于更高效和可持续的世界”为使命，目标是成为全球最值得信赖的企业。</p>', 1618143384, 1618144249);

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

--
-- 转存表中的数据 `zpl_text`
--

INSERT INTO `zpl_text` (`text_id`, `user_id`, `content`, `is_only`, `alias`, `is_lan`, `upload_ip`, `create_time`, `expire_time`) VALUES
(1, 3, '&lt;p&gt;123123123&lt;/p&gt;', 1, 'ALmJu5', 1, '127.0.0.1', 1617972606, NULL),
(2, 3, '&lt;p&gt;顶顶顶顶&lt;/p&gt;', 1, '4GzGuJ', 1, '127.0.0.1', 1617973557, NULL),
(3, 0, '&lt;div class=&quot;index-module_textWrap_3ygOc&quot; style=&quot;color: rgb(0, 0, 0); font-family: arial; font-size: 12px;&quot;&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 16px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify;&quot;&gt;&lt;span class=&quot;bjh-p&quot;&gt;云转播、智能测温、无人混采，这些听起来科技范十足的科技项目在本次&ldquo;相约北京&rdquo;冬奥测试活动上也是集中亮相，究竟这些科技项目有多厉害，记者带您一探究竟。&lt;span class=&quot;bjh-br&quot;&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;/div&gt;&lt;div class=&quot;index-module_textWrap_3ygOc&quot; style=&quot;margin-top: 22px; color: rgb(0, 0, 0); font-family: arial; font-size: 12px;&quot;&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 16px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify;&quot;&gt;&lt;span class=&quot;bjh-p&quot;&gt;总台记者 王丰：那现在你看到的是在五棵松体育中心指挥室里的一套云转播系统，这套系统提供了12个机位，那老百姓要怎么看到、享受到这个云转播？您可以到网页上看，同步的这些机位的通道也会在网上来呈现。那么老百姓可以根据自己的喜好，比如说机位一这个角度我比较喜欢，我可以切换到机位一，再给大家展示一下，比如说机位二&hellip;&hellip;就是说可以随时根据自己的喜好来调整自己观看的角度和机位。&lt;/span&gt;&lt;/p&gt;&lt;/div&gt;&lt;div class=&quot;index-module_mediaWrap_213jB&quot; style=&quot;display: flex; margin-top: 36px; color: rgb(0, 0, 0); font-family: arial; font-size: 12px;&quot;&gt;&lt;div class=&quot;index-module_contentImg_JmmC0&quot; style=&quot;display: flex; -webkit-box-orient: vertical; -webkit-box-direction: normal; flex-direction: column; -webkit-box-align: center; align-items: center; width: 599px;&quot;&gt;&lt;img src=&quot;https://pics0.baidu.com/feed/d52a2834349b033b9ba2571eb33e67dbd739bdc1.jpeg?token=1cc2e0fd6501d8d25a787c5b36a56e8c&quot; width=&quot;640&quot; class=&quot;index-module_large_1mscr&quot; style=&quot;border: 0px; width: 599px; border-radius: 13px;&quot;&gt;&lt;/div&gt;&lt;/div&gt;&lt;div class=&quot;index-module_textWrap_3ygOc&quot; style=&quot;margin-top: 36px; color: rgb(0, 0, 0); font-family: arial; font-size: 12px;&quot;&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 16px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify;&quot;&gt;&lt;span class=&quot;bjh-p&quot;&gt;五棵松体育中心场馆运行团队媒体副主任 王湘宏：这次我们测试的云转播是将不同的信号上传到云，这样把那个被动的接收变成一个主动的选择的过程。就像炒菜以前是主厨做好了端到你面前，你去品尝，现在是把各种料都备好了，你根据自己的喜好想怎么炒怎么炒，做出自己最喜欢的风格。&lt;/span&gt;&lt;/p&gt;&lt;/div&gt;&lt;div class=&quot;index-module_textWrap_3ygOc&quot; style=&quot;margin-top: 22px; color: rgb(0, 0, 0); font-family: arial; font-size: 12px;&quot;&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 16px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify;&quot;&gt;&lt;span class=&quot;bjh-p&quot;&gt;赛后的混合区是记者和运动员扎堆的地方，为了兼顾防疫和新闻采访的需求，一套采访设备吸引了我们的目光。&lt;/span&gt;&lt;/p&gt;&lt;/div&gt;&lt;div class=&quot;index-module_mediaWrap_213jB&quot; style=&quot;display: flex; margin-top: 36px; color: rgb(0, 0, 0); font-family: arial; font-size: 12px;&quot;&gt;&lt;div class=&quot;index-module_contentImg_JmmC0&quot; style=&quot;display: flex; -webkit-box-orient: vertical; -webkit-box-direction: normal; flex-direction: column; -webkit-box-align: center; align-items: center; width: 599px;&quot;&gt;&lt;img src=&quot;https://pics2.baidu.com/feed/377adab44aed2e7364439aea20f1f08385d6fa43.jpeg?token=84244528897df6fb784ed76a3abe785d&quot; width=&quot;640&quot; class=&quot;index-module_large_1mscr&quot; style=&quot;border: 0px; width: 599px; border-radius: 13px;&quot;&gt;&lt;/div&gt;&lt;/div&gt;&lt;div class=&quot;index-module_textWrap_3ygOc&quot; style=&quot;margin-top: 36px; color: rgb(0, 0, 0); font-family: arial; font-size: 12px;&quot;&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 16px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify;&quot;&gt;&lt;span class=&quot;bjh-p&quot;&gt;总台记者 王丰：记者工作区域的记者间我们发现了一套这个无人混采的系统，这个系统其实也是为了疫情防控的需要，就是记者无须去到碰头采访区和运动员交叉就可以完成采访，那么现在我们来模拟无人混采的场景，你好能听到我声音吗？&lt;/span&gt;&lt;/p&gt;&lt;/div&gt;&lt;div class=&quot;index-module_textWrap_3ygOc&quot; style=&quot;margin-top: 22px; color: rgb(0, 0, 0); font-family: arial; font-size: 12px;&quot;&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 16px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify;&quot;&gt;&lt;span class=&quot;bjh-p&quot;&gt;工作人员：你好，我可以听到。&lt;/span&gt;&lt;/p&gt;&lt;/div&gt;&lt;div class=&quot;index-module_textWrap_3ygOc&quot; style=&quot;margin-top: 22px; color: rgb(0, 0, 0); font-family: arial; font-size: 12px;&quot;&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 16px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify;&quot;&gt;&lt;span class=&quot;bjh-p&quot;&gt;记者：小周比赛得第一名什么感受？&lt;/span&gt;&lt;/p&gt;&lt;/div&gt;&lt;div class=&quot;index-module_textWrap_3ygOc&quot; style=&quot;margin-top: 22px; color: rgb(0, 0, 0); font-family: arial; font-size: 12px;&quot;&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 16px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify;&quot;&gt;&lt;span class=&quot;bjh-p&quot;&gt;工作人员：还不错，很兴奋。&lt;/span&gt;&lt;/p&gt;&lt;/div&gt;&lt;div class=&quot;index-module_textWrap_3ygOc&quot; style=&quot;margin-top: 22px; color: rgb(0, 0, 0); font-family: arial; font-size: 12px;&quot;&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 16px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify;&quot;&gt;&lt;span class=&quot;bjh-p&quot;&gt;从4月1日到4月5日，在五棵松体育中心，相约北京测试赛冰球项目的比赛在这里举行，很多科技项目的应用，让五棵松体育中心科技范十足。&lt;/span&gt;&lt;/p&gt;&lt;/div&gt;&lt;div class=&quot;index-module_textWrap_3ygOc&quot; style=&quot;margin-top: 22px; color: rgb(0, 0, 0); font-family: arial; font-size: 12px;&quot;&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 16px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify;&quot;&gt;&lt;span class=&quot;bjh-p&quot;&gt;五棵松体育中心：科技冬奥保障场馆运行&lt;/span&gt;&lt;/p&gt;&lt;/div&gt;&lt;div class=&quot;index-module_textWrap_3ygOc&quot; style=&quot;margin-top: 22px; color: rgb(0, 0, 0); font-family: arial; font-size: 12px;&quot;&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 16px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify;&quot;&gt;&lt;span class=&quot;bjh-p&quot;&gt;除了这些服务转播、采访和赛事相关的高科技项目以外，在疫情防控、场馆运行保障方面也是充满了科技含量。&lt;/span&gt;&lt;/p&gt;&lt;/div&gt;&lt;div class=&quot;index-module_textWrap_3ygOc&quot; style=&quot;margin-top: 22px; color: rgb(0, 0, 0); font-family: arial; font-size: 12px;&quot;&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 16px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify;&quot;&gt;&lt;span class=&quot;bjh-p&quot;&gt;疫情防控工作是本次相约北京测试赛的重点工作之一，在五棵松场馆内，这套智能体温监测系统让防疫工作更加精准可控。&lt;/span&gt;&lt;/p&gt;&lt;/div&gt;&lt;div class=&quot;index-module_mediaWrap_213jB&quot; style=&quot;display: flex; margin-top: 36px; color: rgb(0, 0, 0); font-family: arial; font-size: 12px;&quot;&gt;&lt;div class=&quot;index-module_contentImg_JmmC0&quot; style=&quot;display: flex; -webkit-box-orient: vertical; -webkit-box-direction: normal; flex-direction: column; -webkit-box-align: center; align-items: center; width: 599px;&quot;&gt;&lt;img src=&quot;https://pics2.baidu.com/feed/48540923dd54564e1aabcde81d2ecd8ad3584f09.jpeg?token=fbb1bd0037c6d873f365b894075452f4&quot; width=&quot;640&quot; class=&quot;index-module_large_1mscr&quot; style=&quot;border: 0px; width: 599px; border-radius: 13px;&quot;&gt;&lt;/div&gt;&lt;/div&gt;&lt;div class=&quot;index-module_textWrap_3ygOc&quot; style=&quot;margin-top: 36px; color: rgb(0, 0, 0); font-family: arial; font-size: 12px;&quot;&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 16px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify;&quot;&gt;&lt;span class=&quot;bjh-p&quot;&gt;总台记者 王丰：那我刚才戴的智能体温计是通过里面植入的芯片，实现了对我的体温的监测，在APP上显示。由于时间短，它可能体温会比较低，现在显示的是34.9摄氏度，智能体温计覆盖了整个五棵松体育中心场馆的所有的工作人员，大概有600人左右，那么这些工作人员他们的体温是实时的，在后台进行24小时连续的监测，一旦有任何一个人体温出现异常，就会报警，那么场馆的防疫的工作人员会精准找到这个人来采取下一步的措施。&lt;/span&gt;&lt;/p&gt;&lt;/div&gt;&lt;div class=&quot;index-module_mediaWrap_213jB&quot; style=&quot;display: flex; margin-top: 36px; color: rgb(0, 0, 0); font-family: arial; font-size: 12px;&quot;&gt;&lt;div class=&quot;index-module_contentImg_JmmC0&quot; style=&quot;display: flex; -webkit-box-orient: vertical; -webkit-box-direction: normal; flex-direction: column; -webkit-box-align: center; align-items: center; width: 599px;&quot;&gt;&lt;img src=&quot;https://pics0.baidu.com/feed/7aec54e736d12f2e367f6f24e132846a84356871.jpeg?token=510c60132f98a7391033c3f696e81505&quot; width=&quot;640&quot; class=&quot;index-module_large_1mscr&quot; style=&quot;border: 0px; width: 599px; border-radius: 13px;&quot;&gt;&lt;/div&gt;&lt;/div&gt;&lt;div class=&quot;index-module_textWrap_3ygOc&quot; style=&quot;margin-top: 36px; color: rgb(0, 0, 0); font-family: arial; font-size: 12px;&quot;&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 16px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify;&quot;&gt;&lt;span class=&quot;bjh-p&quot;&gt;五棵松体育中心场馆运行团队防疫经理 史冯琳：如果说这个人是持续体温升高，然后联系到他本人确实是出现身体异常的情况下我们就会联系医疗，联系999转运把它就是就近送到医院来进一步排查诊治。&lt;/span&gt;&lt;/p&gt;&lt;/div&gt;&lt;div class=&quot;index-module_mediaWrap_213jB&quot; style=&quot;display: flex; margin-top: 36px; color: rgb(0, 0, 0); font-family: arial; font-size: 12px;&quot;&gt;&lt;div class=&quot;index-module_contentImg_JmmC0&quot; style=&quot;display: flex; -webkit-box-orient: vertical; -webkit-box-direction: normal; flex-direction: column; -webkit-box-align: center; align-items: center; width: 599px;&quot;&gt;&lt;img src=&quot;https://pics4.baidu.com/feed/730e0cf3d7ca7bcb229cd01519f93a6bf724a819.jpeg?token=7f9b95a226454b7594d307118eb0ec38&quot; width=&quot;640&quot; class=&quot;index-module_large_1mscr&quot; style=&quot;border: 0px; width: 599px; border-radius: 13px;&quot;&gt;&lt;/div&gt;&lt;/div&gt;&lt;div class=&quot;index-module_textWrap_3ygOc&quot; style=&quot;margin-top: 36px; color: rgb(0, 0, 0); font-family: arial; font-size: 12px;&quot;&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 16px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify;&quot;&gt;&lt;span class=&quot;bjh-p&quot;&gt;总台记者 王丰：发现了一个好东西，这个智能跟随机器人，这也是一个科技应用的一个落地，在五棵松体育场馆。它现在正在进行一个人脸的识别，就相当于它识别上谁，它就是谁就是它的老大，它就会跟谁一块走，我们现在让它来识别一下吧。好，它现在已经识别上我了，跟着我走，那么现在我就瞬间变身为一个场馆的工作人员，那么我现在要完成的任务是把这几箱水送到食堂，来，我们一起来感受一下。跟得还挺紧的。&lt;/span&gt;&lt;/p&gt;&lt;/div&gt;&lt;div class=&quot;index-module_textWrap_3ygOc&quot; style=&quot;margin-top: 22px; color: rgb(0, 0, 0); font-family: arial; font-size: 12px;&quot;&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 16px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify;&quot;&gt;&lt;span class=&quot;bjh-p&quot;&gt;而在安保方面，场馆也引用了大型活动科技安保综合管理平台，用科技手段加强安保力量。&lt;/span&gt;&lt;/p&gt;&lt;/div&gt;&lt;div class=&quot;index-module_mediaWrap_213jB&quot; style=&quot;display: flex; margin-top: 36px; color: rgb(0, 0, 0); font-family: arial; font-size: 12px;&quot;&gt;&lt;div class=&quot;index-module_contentImg_JmmC0&quot; style=&quot;display: flex; -webkit-box-orient: vertical; -webkit-box-direction: normal; flex-direction: column; -webkit-box-align: center; align-items: center; width: 599px;&quot;&gt;&lt;img src=&quot;https://pics5.baidu.com/feed/f703738da9773912a1674d4b50e9d710377ae254.jpeg?token=07c08d10305f984c8f56589f7defb141&quot; width=&quot;640&quot; class=&quot;index-module_large_1mscr&quot; style=&quot;border: 0px; width: 599px; border-radius: 13px;&quot;&gt;&lt;/div&gt;&lt;/div&gt;&lt;div class=&quot;index-module_textWrap_3ygOc&quot; style=&quot;margin-top: 36px; color: rgb(0, 0, 0); font-family: arial; font-size: 12px;&quot;&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 16px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify;&quot;&gt;&lt;span class=&quot;bjh-p&quot;&gt;五棵松体育中心场馆运行团队安保副主任 毕波：比如说电子巡更，大家看，利用场内所有的这些探头和技术设备，人在群众清场之后，我们要对场内进行一次安检和检查，所有的全部是自动的，所有都是自动的。&lt;/span&gt;&lt;/p&gt;&lt;/div&gt;&lt;div class=&quot;index-module_mediaWrap_213jB&quot; style=&quot;display: flex; margin-top: 36px; color: rgb(0, 0, 0); font-family: arial; font-size: 12px;&quot;&gt;&lt;div class=&quot;index-module_contentImg_JmmC0&quot; style=&quot;display: flex; -webkit-box-orient: vertical; -webkit-box-direction: normal; flex-direction: column; -webkit-box-align: center; align-items: center; width: 599px;&quot;&gt;&lt;img src=&quot;https://pics4.baidu.com/feed/d8f9d72a6059252d8a87deb1986b523359b5b9e8.jpeg?token=b2e53e73414722381f500e591e48cc69&quot; width=&quot;640&quot; class=&quot;index-module_large_1mscr&quot; style=&quot;border: 0px; width: 599px; border-radius: 13px;&quot;&gt;&lt;/div&gt;&lt;/div&gt;&lt;div class=&quot;index-module_textWrap_3ygOc&quot; style=&quot;margin-top: 36px; color: rgb(0, 0, 0); font-family: arial; font-size: 12px;&quot;&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 16px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify;&quot;&gt;&lt;span class=&quot;bjh-p&quot;&gt;据五棵松体育中心场馆运行团队主任陈双介绍，五棵松体育中心所属的北京市海淀区科研机构高度集中，而测试活动的举办，也为这些新产品新技术提供了一个难得的落地应用场景。&lt;/span&gt;&lt;/p&gt;&lt;/div&gt;&lt;div class=&quot;index-module_mediaWrap_213jB&quot; style=&quot;display: flex; margin-top: 36px; color: rgb(0, 0, 0); font-family: arial; font-size: 12px;&quot;&gt;&lt;div class=&quot;index-module_contentImg_JmmC0&quot; style=&quot;display: flex; -webkit-box-orient: vertical; -webkit-box-direction: normal; flex-direction: column; -webkit-box-align: center; align-items: center; width: 599px;&quot;&gt;&lt;img src=&quot;https://pics3.baidu.com/feed/ca1349540923dd541888c94979f9e2d69d824814.jpeg?token=c53ccd3cce1b26d57a176df37545f5eb&quot; width=&quot;640&quot; class=&quot;index-module_large_1mscr&quot; style=&quot;border: 0px; width: 599px; border-radius: 13px;&quot;&gt;&lt;/div&gt;&lt;/div&gt;&lt;div class=&quot;index-module_textWrap_3ygOc&quot; style=&quot;margin-top: 36px; color: rgb(0, 0, 0); font-family: arial; font-size: 12px;&quot;&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 16px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify;&quot;&gt;&lt;span class=&quot;bjh-p&quot;&gt;五棵松体育中心场馆运行团队主任 陈双：科技场景应用无处不在，奥运就是一个很好的窗口，所以我们要在这里头优选去展示，那么我们未来还要征集一批项目，来不断地纳入我们的科技奥运的内容里头。&lt;/span&gt;&lt;/p&gt;&lt;/div&gt;&lt;div class=&quot;index-module_textWrap_3ygOc&quot; style=&quot;margin-top: 22px; color: rgb(0, 0, 0); font-family: arial; font-size: 12px;&quot;&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 16px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify;&quot;&gt;&lt;span class=&quot;bjh-p&quot;&gt;来源：央视新闻客户端&lt;/span&gt;&lt;/p&gt;&lt;/div&gt;&lt;div class=&quot;index-module_textWrap_3ygOc&quot; style=&quot;margin-top: 22px; color: rgb(0, 0, 0); font-family: arial; font-size: 12px;&quot;&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 16px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify;&quot;&gt;&lt;span class=&quot;bjh-p&quot;&gt;编辑：高晨晨&lt;/span&gt;&lt;/p&gt;&lt;/div&gt;&lt;div class=&quot;index-module_textWrap_3ygOc&quot; style=&quot;margin-top: 22px; color: rgb(0, 0, 0); font-family: arial; font-size: 12px;&quot;&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 16px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify;&quot;&gt;&lt;span class=&quot;bjh-p&quot;&gt;流程编辑：郭丹&lt;/span&gt;&lt;/p&gt;&lt;/div&gt;', 0, '8AlpVu', 1, '127.0.0.1', 1617985122, NULL),
(4, 0, '&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;table class=&quot;table table-bordered&quot;&gt;&lt;tbody&gt;&lt;tr&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', 1, 'wnrCqe', 1, '127.0.0.1', 1617985183, NULL);

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
-- 表的索引 `zpl_file_folder`
--
ALTER TABLE `zpl_file_folder`
  ADD PRIMARY KEY (`folder_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `total_size` (`total_size`),
  ADD KEY `is_public` (`is_public`),
  ADD KEY `folder_name` (`folder_name`),
  ADD KEY `status` (`status`);

--
-- 表的索引 `zpl_options`
--
ALTER TABLE `zpl_options`
  ADD PRIMARY KEY (`option_id`),
  ADD UNIQUE KEY `option_name` (`option_name`),
  ADD KEY `autoload` (`autoload`);

--
-- 表的索引 `zpl_page`
--
ALTER TABLE `zpl_page`
  ADD PRIMARY KEY (`page_id`);

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
  MODIFY `file_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- 使用表AUTO_INCREMENT `zpl_file_folder`
--
ALTER TABLE `zpl_file_folder`
  MODIFY `folder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `zpl_options`
--
ALTER TABLE `zpl_options`
  MODIFY `option_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用表AUTO_INCREMENT `zpl_page`
--
ALTER TABLE `zpl_page`
  MODIFY `page_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `zpl_text`
--
ALTER TABLE `zpl_text`
  MODIFY `text_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `zpl_user`
--
ALTER TABLE `zpl_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
