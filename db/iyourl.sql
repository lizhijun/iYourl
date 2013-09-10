-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 08 月 28 日 13:56
-- 服务器版本: 5.1.46
-- PHP 版本: 5.2.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `iyourl`
--

-- --------------------------------------------------------

--
-- 表的结构 `link`
--

CREATE TABLE IF NOT EXISTS `link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `picurl` int(255) NOT NULL,
  `domain` varchar(33) NOT NULL COMMENT '域名',
  `category` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  `score` int(6) NOT NULL,
  `rank` int(6) NOT NULL,
  `comments` int(6) NOT NULL COMMENT '评论条数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- 转存表中的数据 `link`
--

INSERT INTO `link` (`id`, `uid`, `title`, `url`, `picurl`, `domain`, `category`, `created`, `score`, `rank`, `comments`) VALUES
(21, 24, 'Paul Graham：如何打动投资人？ | 36氪', 'http://www.36kr.com/p/205342.html', 0, '36kr.com', '人物', 1376209365, 89, 1, 14),
(22, 24, '沙盘谈兵——360“三大战役”战术分析-看点-虎嗅网', 'http://www.huxiu.com/article/18506/1.html', 0, 'huxiu.com', '互联网', 1376209519, 30, 2, 0),
(23, 29, '美团的奥秘：与王兴聊技术的力量 - i黑马', 'http://www.iheima.com/archives/47990.html', 0, 'iheima.com', '人物', 1376632220, 10, 3, 0),
(24, 29, '媒体称马云希望维持阿里控制权 或放弃赴港上市', 'http://stock.caijing.com.cn/2013-08-16/113178206.html', 0, 'com.cn', '人物', 1376634452, 4, 4, 0),
(25, 29, 'WP 版 YouTube 应用命运多舛，再遭谷歌禁用', 'http://www.ifanr.com/news/332366', 0, 'ifanr.com', '互联网', 1376641721, 5, 5, 0),
(26, 29, '给乔布斯树一座自由女神般大的雕像?! 乔布斯一粉丝发起众筹', 'http://www.36kr.com/p/205477.html', 0, '36kr.com', '人物', 1376641906, 14, 6, 0),
(27, 29, '创业在中国死掉了吗？', 'http://lunax.info/archives/3109.html', 0, 'lunax.info', '提问', 1376642193, 5, 7, 0),
(28, 29, '下次我要一个人创业', 'http://www.aqee.net/why-ill-be-a-solo-founder-next-time/', 0, 'aqee.net', '吐槽', 1376642247, 4, 8, 0),
(29, 29, '6 must-have skills of modern web application developers', 'http://www.mrc-productivity.com/blog/2013/08/6-must-have-skills-of-modern-web-application-developers/', 0, 'mrc-productivity.com', '编程', 1376642342, 3, 9, 0),
(30, 29, '微信公众平台：程序员的面试吧', 'http://hawstein.com/posts/ibar-begin.html', 0, 'hawstein.com', '编程', 1376642419, 2, 10, 0),
(31, 29, 'Flickr创始人的新产品Slack上线一天就有8000多公司注册，主打企业内沟通协作 | 36氪', 'http://www.36kr.com/p/205476.html', 0, '36kr.com', '互联网', 1376642919, 2, 11, 0),
(32, 29, '视觉表现出色的Yahoo!天气应用登陆Android：天气数据更丰富，新增锁屏插件 | 36氪', 'http://www.36kr.com/p/205474.html', 0, '36kr.com', '互联网', 1376643044, 1, 12, 0);

-- --------------------------------------------------------

--
-- 表的结构 `reply`
--

CREATE TABLE IF NOT EXISTS `reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `uid` int(6) NOT NULL COMMENT '用户id',
  `rank` int(6) NOT NULL,
  `created` int(11) NOT NULL COMMENT '回复时间',
  `score` int(6) NOT NULL,
  `comments` int(11) NOT NULL COMMENT '子评论条数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='回复表单' AUTO_INCREMENT=194 ;

--
-- 转存表中的数据 `reply`
--

INSERT INTO `reply` (`id`, `content`, `pid`, `uid`, `rank`, `created`, `score`, `comments`) VALUES
(184, '第一条回复', 21, 22, 0, 1376621246, 21, 0),
(185, '回复“第一条回复”', 184, 22, 0, 1376621340, 2, 0),
(186, '再次回复“第一条回复”', 184, 22, 0, 1376621375, 0, 0),
(187, '回复“再次回复“第一条回复””', 186, 22, 0, 1376621503, 0, 0),
(188, '再次再次回复', 187, 22, 0, 1376621946, 0, 0),
(189, '好吧 我必须再试一次', 188, 22, 0, 1376621997, 0, 0),
(190, '再试试看', 189, 22, 0, 1376622032, 0, 0),
(191, '第二条回复', 21, 22, 0, 1376622469, 43, 0),
(192, '回复“第二条回复”', 0, 22, 0, 1376622484, 0, 0),
(193, 'ok 哈哈哈', 21, 22, 0, 1376807962, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '提交用户的id',
  `rank` int(6) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `score` int(6) NOT NULL,
  `created` int(11) NOT NULL,
  `up` int(11) NOT NULL COMMENT '支持',
  `down` int(11) NOT NULL COMMENT '反对',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `status`
--

INSERT INTO `status` (`id`, `uid`, `rank`, `title`, `url`, `category`, `score`, `created`, `up`, `down`) VALUES
(1, 0, 1, '', '', '', 3331, 1375078343, 0, 0),
(2, 0, 2, '', '', '', 2780, 1375078343, 0, 0),
(3, 0, 3, '', '', '', 2500, 1375078343, 0, 0),
(4, 0, 4, '', '', '', 2000, 1375078343, 0, 0),
(5, 0, 10, '', '', '', 0, 0, 0, 0),
(6, 0, 5, '', '', '', 1800, 1375078343, 0, 0),
(7, 0, 6, '', '', '', 1600, 1375079694, 0, 0),
(8, 0, 7, '', '', '', 900, 1375080103, 0, 0),
(9, 0, 8, '', '', '', 500, 1375147081, 0, 0),
(10, 0, 0, '', '', '', 0, 1375152409, 0, 0),
(11, 0, 0, '', '', '', 0, 1375152518, 0, 0),
(12, 0, 0, '', '', '', 0, 1375153176, 0, 0),
(13, 0, 0, '', '', '', 0, 1375162266, 0, 0),
(14, 0, 0, '', '', '', 0, 1375240751, 0, 0),
(15, 0, 0, '', '', '', 0, 1375240847, 0, 0),
(16, 0, 0, '', '', '', 0, 1375240875, 0, 0),
(17, 0, 0, '', '', '', 0, 1375240882, 0, 0),
(18, 0, 0, '', '', '', 0, 1375240899, 0, 0),
(19, 0, 0, '', '', '', 0, 1375241231, 0, 0),
(20, 0, 0, '', '', '', 0, 1375241255, 0, 0),
(21, 0, 0, '', '', '', 0, 1375247793, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(33) NOT NULL,
  `email` varchar(33) NOT NULL,
  `credit` int(6) NOT NULL COMMENT '积分',
  `created` int(11) NOT NULL COMMENT '注册时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `credit`, `created`) VALUES
(22, '大王叫我叫我', 'e10adc3949ba59abbe56e057f20f883e', 'dawang@126.com', 1, 1375581732),
(23, '叫我大王大王', 'e10adc3949ba59abbe56e057f20f883e', 'dawang@dw.com', 1, 1375583496),
(24, 'lizhijun', 'e10adc3949ba59abbe56e057f20f883e', 'lizhijun20@126.com', 1, 1375583567),
(25, 'lizhijun20', 'e10adc3949ba59abbe56e057f20f883e', 'lizhijunx@126.com', 1, 1375583763),
(26, 'lizhijunx', 'e10adc3949ba59abbe56e057f20f883e', 'lizhijunxx@126.com', 1, 1375583823),
(27, 'lizhijunxxx', 'e10adc3949ba59abbe56e057f20f883e', 'lizhijunxxx@126.com', 1, 1375584226),
(28, 'lizhijunxxxx', 'e10adc3949ba59abbe56e057f20f883e', 'lizhijunxxxx@126.com', 1, 1375584270),
(29, '123456', 'e10adc3949ba59abbe56e057f20f883e', '123456@126.com', 9, 1375584471),
(30, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@iyourl.com', 1, 1375684872),
(31, 'lizhijunn', 'e10adc3949ba59abbe56e057f20f883e', 'lizhijnu@127.com', 1, 1375760531),
(32, 'lizhijunn', 'e10adc3949ba59abbe56e057f20f883e', 'lizhijnu@127.com', 1, 1375760531),
(33, 'helloworld', '24f7d73ffc9a55258a1f5766923eefbe', 'hello@world.com', 1, 1375761612),
(34, 'hahaha', '4ba449f39af2de99517e5e6d9840580b', 'haha@ha.com', 1, 1375761908),
(35, 'wawowawo', '8c0f8e00e392f2e30077ad4883ff8d21', 'wo@wa.com', 1, 1375762041),
(36, 'haowubai', '113035048d5e87ee1c0a10142a545544', 'haiwu@bai.com', 1, 1375762639),
(37, 'haowubaii', '113035048d5e87ee1c0a10142a545544', 'haiwu@baii.com', 1, 1375762717),
(38, 'haowubaiii', '113035048d5e87ee1c0a10142a545544', 'haiwu@baiii.com', 1, 1375762759),
(39, 'fsfsf', 'e10adc3949ba59abbe56e057f20f883e', 'afsaf@ada.com', 1, 1375762880),
(40, 'fsfsffg', 'e10adc3949ba59abbe56e057f20f883e', 'afsaf@adfa.com', 1, 1375762916);
