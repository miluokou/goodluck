/*
 Navicat Premium Data Transfer

 Source Server         : asdadda
 Source Server Type    : MySQL
 Source Server Version : 50635
 Source Host           : localhost
 Source Database       : zhuguangqian

 Target Server Type    : MySQL
 Target Server Version : 50635
 File Encoding         : utf-8

 Date: 01/30/2018 21:40:20 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `article`
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0',
  `pid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `content` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `article`
-- ----------------------------
BEGIN;
INSERT INTO `article` VALUES ('1', '0', '10', '2018-01-09 15:39:39修复问题', null), ('2', '0', '10', '2018-01-09 15:39:39修复问题', '20180109/2.txt'), ('3', '0', '10', '2018-01-09 15:39:39修复问题', '20180109/3.txt'), ('4', '0', '10', '2018-01-09 15:39:39修复问题', '20180109/4.txt'), ('5', '0', '11', '2018-01-09 16:13:58修复问题', '20180109/5.txt'), ('6', '0', '11', '2018-01-09 16:19:41修复问题', '20180109/6.txt'), ('7', '0', '11', '2018-01-09 16:20:22修复问题', '20180109/7.txt'), ('8', '0', '11', '2018-01-09 16:24:48修复问题', '20180109/8.txt'), ('9', '0', '10', '2018-01-09 17:26:07修复问题', '20180109/9.txt'), ('10', '0', '10', '2018-01-09 17:26:07修复问题', '20180109/10.txt'), ('11', '0', '10', '2018-01-09 17:26:07修复问题', '20180109/11.txt'), ('12', '16', '11', '初始化你的项目为git仓库', '20180109/12.txt'), ('13', '0', '10', '初始化你的项目为git仓库', '20180109/13.txt'), ('14', '0', '11', '2018-01-09 22:35:04修复问题', null), ('16', '0', '11', '2018-01-09 22:35:04修复问题', '20180109/16.txt'), ('17', '0', '11', '2018-01-09 22:35:04修复问题', '20180109/17.txt'), ('18', '0', '11', '2018-01-09 22:45:29修复问题', '20180109/18.txt'), ('19', '0', '11', '2018-01-09 22:45:29修复问题', '20180109/19.txt'), ('20', '0', '10', '2018-01-09 22:48:14修复问题', '20180109/20.txt'), ('21', '0', '11', '2018-01-09 22:48:56修复问题', '20180109/21.txt'), ('22', '0', '11', '2018-01-09 22:49:51修复问题', '20180109/22.txt'), ('23', '0', '11', '测试标题', null), ('24', '16', '10', 'MAMP PRO的mySQL启动失败', '20180112/24.txt'), ('25', '0', '13', '2018-01-12 15:14:19修复问题', '20180112/25.txt'), ('26', '0', '11', '2018-01-12 15:17:29修复问题', '20180112/26.txt'), ('27', '0', '14', 'php的token认证功能', '20180113/27.txt'), ('28', '16', '11', '实现发布文章加米粒功能', '20180117/28.txt');
COMMIT;

-- ----------------------------
--  Table structure for `cate`
-- ----------------------------
DROP TABLE IF EXISTS `cate`;
CREATE TABLE `cate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `path` varchar(255) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `cate`
-- ----------------------------
BEGIN;
INSERT INTO `cate` VALUES ('1', '0', '0', '0', '诗歌'), ('2', '0', '0', '0', '小说'), ('3', '0', '0', '0', '散文'), ('4', '1', '0,1', '0', '现代诗歌'), ('5', '4', '0,1,4', '0', '现代诗歌分类编辑'), ('6', '1', '0,1', '0', '叙事诗'), ('7', '0', '0', '0', '善良者保护协会'), ('8', '0', '0', '0', '完善建议'), ('9', '7', '0,7', '0', '防诈骗攻略'), ('10', '0', '0', '0', '技术'), ('11', '0', '0', '0', '网站开发中'), ('12', '10', '0,10', '0', '开发框架'), ('13', '12', '0,10,12', '0', 'laravel'), ('14', '10', '0,10', '0', 'php');
COMMIT;

-- ----------------------------
--  Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `rand` int(11) DEFAULT NULL,
  `mili` int(11) DEFAULT '0',
  `status` varchar(255) DEFAULT '门客',
  PRIMARY KEY (`id`),
  UNIQUE KEY `rand` (`rand`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `user`
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES ('1', 'admin', 'miluokou', '', null, '0', '门客'), ('2', '123', '123', '', null, '0', '门客'), ('3', '1231', '123', '', null, '0', '门客'), ('4', '12', '123', '', null, '0', '门客'), ('5', 'baocuo', '123', '', null, '0', '门客'), ('6', '123', '12313', '', null, '0', '门客'), ('7', '123123123', '123', '', null, '0', '门客'), ('8', '', '', '', null, '0', '门客'), ('9', '', '', '', null, '0', '门客'), ('10', '123', '', '', null, '0', '门客'), ('11', '12313', '1231', '', null, '0', '门客'), ('12', '米洛口', 'mmbb521', '', null, '0', '门客'), ('13', 'xinde', 'xinde', '', null, '0', '门客'), ('14', '128', '123', '', null, '0', '门客'), ('15', '1215', '1215', '', '0', '0', '门客'), ('16', 'zhujiu', '123', 'xUfD0kDt4ApCsEUWROsP855K0y88kAq8QhBORAzk', '999', '0', '统筹');
COMMIT;

-- ----------------------------
--  Table structure for `user_detail`
-- ----------------------------
DROP TABLE IF EXISTS `user_detail`;
CREATE TABLE `user_detail` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `weixin` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
