-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 
-- 服务器版本: 5.7.26
-- PHP 版本: 7.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `test`
--

-- --------------------------------------------------------

--
-- 表的结构 `cont`
--

CREATE TABLE IF NOT EXISTS `cont` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(6000) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=91 ;

--
-- 转存表中的数据 `cont`
--

INSERT INTO `cont` (`id`, `user`, `content`, `time`) VALUES
(52, 'wxmwxm', '回复“啦啦啦”：enen', '2020-02-07 16:28:14'),
(54, 'lmc', '欢迎 lmc 来到美豆的留言屋', '2020-07-03 10:11:55'),
(61, 'admin', '哦吼吼吼吼吼', '2020-07-06 16:55:56'),
(62, 'admin', '测试1', '2020-07-06 16:56:12'),
(63, 'admin', '  nihao', '2020-07-06 16:56:20'),
(50, 'test', '回复“hi~哥哥好~”：你好', '2020-02-06 21:55:28'),
(49, 'test', '啦啦啦', '2020-02-06 21:55:04'),
(48, 'admin', 'hi~哥哥好~', '2020-02-06 21:51:48');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `userEmail` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=63 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `userEmail`) VALUES
(43, 'admin', '$2a$08$Ufb7qDffTSVkCKvOHezZOOInQytBm3.1CrkUDBM9DDO0MaMA4mobq', 'admin666@qq.com'),
(44, 'test', '$2a$08$Djx3uguIWpNko6Im0oa9UOPB9LWmbvXPfMS2Nt/bNsowIKw4khDVq', 'test@qq.com'),
(38, 'home', '449336a4c69e4ebf8aff5b90a047138e', 'lmc@qq.com'),
(39, '7787', '$2a$08$Is8KSUnwr0qtQuHyzV6w9OJC8FtaDD2oRDk.bh4UC1A3aGf88evUi', 'a@qq.com'),
(40, '测试', '$2a$08$OLWu.ainZoTUbdxqXmYRNOvVWZzuYz/uJzjAFcPSYvaYPrBfGDKTO', 'a@qq.com'),
(41, '测试2', '$2a$08$Si5sosTzFY5RAA8nfek5UO8.RfydrD3fATBOngeLFziqdL.7iqYw2', 'a@qq.com'),
(45, '001', '$2a$08$9TacLN/J7TqSmocHp2LB6eKYV0jg46ydAGFSaC2uUmNKOMy6ObF72', 'a@qq.com'),
(46, '002', '$2a$08$.O0hf94TsNZyiHblhCIcU.bc3TpeuF.1FfWjvyKjEzvutXMhRSfLu', 'a@qq.com'),
(47, '003', '$2a$08$rOFw1hSVhdbq4TN2ptCPdOxxHBvUSRej5euC91bcrOr/CugXYBApO', 'a@qq.com'),
(48, '004', '$2a$08$OYlX3nvlSPsEJ18X0pBY7.TdQVdPgJg.57gMIEk3DPqL7O627kxMm', 'a@qq.com'),
(49, '005', '$2a$08$a1n/EPjxPd7Mnmhpw8wI7ezcPjVTNliBQSKmflmuwMWoKCAlQONCe', 'a@qq.com'),
(50, '111', '$2a$08$z/GT36s0406Jt0T2JKJsG.MJvT5pUfddIC3GFt5D.HLp198pe5Nwa', 'a@qq.com'),
(51, '1111', '$2a$08$RhEsHAdanPrQhLnOF4bO0OE5RI9ZeJQZmaPmZAfm8QQ5AUxFulkvW', 'a@qq.com'),
(52, 'qqq', '$2a$08$VeG5qChbTZAtdc0QvUddSOrb2.HI74q/YWMwLEtbTv4eNcFB3H0ka', 'a@qq.com'),
(53, 'wq', '$2a$08$iaL03rajl5lBRWuE.Me/CeMzMwPpoSbj/ZvXlWAXO99EPOnGp6mru', 'a@qq.com'),
(54, 'ceshi', '$2a$08$780J0lciTB5kjXwhsy/fbexENszV99SdUF7gI7ENq.jwyOH9lcATi', 'a@qq.com'),
(55, 'sss', '$2a$08$9UUpiH795VDSPv1QghWzVuA4IYVGsx5MiiDnWDO2hTalS1lNILnaW', 'a@qq.com'),
(56, 'ddd', '$2a$08$IYlxfHMKps91ICO4gL6pZuWD9C9.k3Z5vkf88.yzwlw5MGIpynYqK', 'a@qq.com'),
(57, 'test2', '$2a$08$RSa6qvbyaP9xMekrV/SjbOCse1IYTM97Jg7Uy7y0mVZU2Bnnlo7V2', 'a@qq.com'),
(58, 'test1', '$2a$08$tT.BxfJvBCGcqRgw0UvCnu3rPgKbzbfwE/GmuUBpP44IBsZ2xclcS', 'a@qq.com'),
(59, 'test3', '$2a$08$u3bGbJiw6LkK2.PKCohv7.KaErn1K8cL9eDFQ63TVT6WoqDqDn0MC', 'a@qq.com'),
(60, 'aazz', '$2a$08$E/EuXYqzFxj5VP/FPVDPNO//pZejutB33YSrAIQi2pvRsw3BdHxa2', 'a@qq.com'),
(61, 'test6', '$2a$08$ow/FnRqL2wmvsdMIKy.wjO1PqRHYQkbADQSSFJb0roMfeCwSy1Gma', 'a@qq.com'),
(62, 'ccc', '$2a$08$6kL.f35DMTUmCiSj5uplyeCQ8SWaIzWv/kX2KqhnSuIFSyWjPkV2O', 'a@qq.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
