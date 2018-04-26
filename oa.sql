/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : oa

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-04-26 15:50:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for oa_article
-- ----------------------------
DROP TABLE IF EXISTS `oa_article`;
CREATE TABLE `oa_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `autor` varchar(25) COLLATE utf8_bin DEFAULT NULL COMMENT '文章来源',
  `title` varchar(50) COLLATE utf8_bin DEFAULT NULL COMMENT '文章标题',
  `descr` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT '文章简介',
  `content` text COLLATE utf8_bin COMMENT '文章内容',
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '文章封面图',
  `time` int(11) DEFAULT NULL COMMENT '文章时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of oa_article
-- ----------------------------
INSERT INTO `oa_article` VALUES ('4', '是的卖家发货', '，出校门是合计扣除吃', '速度快放寒假对方即可', 0x3C703EE8A686E79B96E99DA2E7BB93E59088E79C8BE9A38EE699AFE79A84E58A9FE883BDE79C8BE9A38EE699AFE79A84E5908EE69E9CE79C8BE9A38EE699AFE79A84E58A9EE585ACE5AEA4E7AD89E696B9E99DA2E8AEA1E588926966E6A0B9E69CACE4B88DE4BC9AE59CA3E8AF9EE88A82E6B395E8A7843C2F703E, '/image/20180425/f3aef5eb85d2ca3d281813870305ac59.jpg', '1524623941');
INSERT INTO `oa_article` VALUES ('5', '开始奋斗过后是的房价回归1', '接口都是废话接口对方过后1', '的反馈结果互看见对方过后1', 0x3C703EE4BB8BE7BB8DE79A84E5A48DE59088E5BC93E5B0B1E698AFE5A4A7E6B395E5AE98E7BB9DE5AFB9E698AFE6B395E59BBDE587A0E4B98EE983BDE698AFE8A784E88C83E998BFE890A8E5BEB7E7A7AFE58886E5BC80E585B3313C2F703E, '/image/20180425/2e059ad187e2eea3d30c72d91e92de44.jpg', '1524624158');

-- ----------------------------
-- Table structure for oa_aside
-- ----------------------------
DROP TABLE IF EXISTS `oa_aside`;
CREATE TABLE `oa_aside` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '菜单名称',
  `pid` int(10) NOT NULL COMMENT 'pid',
  `path` varchar(255) COLLATE utf8_bin NOT NULL COMMENT 'path',
  `mname` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '控制器',
  `aname` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '方法',
  `icon` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '图标',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of oa_aside
-- ----------------------------
INSERT INTO `oa_aside` VALUES ('1', '权限管理', '0', '0', 'Index', 'index', '&#xe6d5;');
INSERT INTO `oa_aside` VALUES ('2', '我的日志', '0', '0', 'Index', 'index', '&#xe6d5;');
INSERT INTO `oa_aside` VALUES ('3', '我的任务', '0', '0', 'Index', 'index', '&#xe6d5;');
INSERT INTO `oa_aside` VALUES ('4', '项目管理', '0', '0', 'Index', 'index', '&#xe6d5;');
INSERT INTO `oa_aside` VALUES ('5', '我的邮件', '0', '0', 'Index', 'index', null);
INSERT INTO `oa_aside` VALUES ('6', '我的文档', '0', '0', 'Index', 'index', null);
INSERT INTO `oa_aside` VALUES ('7', '客户管理', '0', '0', 'Index', 'index', null);
INSERT INTO `oa_aside` VALUES ('8', '我的联系人', '0', '0', 'Index', 'index', null);
INSERT INTO `oa_aside` VALUES ('10', '角色列表', '1', '0,1', 'Role', 'index', null);
INSERT INTO `oa_aside` VALUES ('11', '节点列表', '1', '0,1', 'Node', 'index', null);
INSERT INTO `oa_aside` VALUES ('49', '项目列表', '4', '0,4', 'Project', 'index', null);
INSERT INTO `oa_aside` VALUES ('13', '日志列表', '2', '0,2', 'Log', 'index', null);
INSERT INTO `oa_aside` VALUES ('17', '任务列表', '3', '0,3', 'Task', 'index', null);
INSERT INTO `oa_aside` VALUES ('19', '任务添加', '3', '0,3', 'Task', 'add', null);
INSERT INTO `oa_aside` VALUES ('48', '会员列表', '1', '0,1', 'User', 'index', null);
INSERT INTO `oa_aside` VALUES ('50', '测试', '0', '0', 'Test', 'test', null);
INSERT INTO `oa_aside` VALUES ('51', '收件箱', '5', '0,5', 'Email', 'index', null);
INSERT INTO `oa_aside` VALUES ('52', '已发送', '5', '0,5', 'Email', 'send', null);
INSERT INTO `oa_aside` VALUES ('53', '发邮件', '5', '0,5', 'Email', 'add', null);
INSERT INTO `oa_aside` VALUES ('54', '我的客户', '7', '0,7', 'Customer', 'index', null);
INSERT INTO `oa_aside` VALUES ('55', '一键转发', '0', '0', 'Index', 'index', null);
INSERT INTO `oa_aside` VALUES ('56', '文章列表', '55', '0,55', 'Article', 'index', null);
INSERT INTO `oa_aside` VALUES ('57', '网站类别', '55', '0,55', 'Webcate', 'index', null);
INSERT INTO `oa_aside` VALUES ('58', '网址信息', '55', '0,55', 'Message', 'index', null);
INSERT INTO `oa_aside` VALUES ('59', '一键转发', '55', '0,55', 'Webtransmit', 'index', null);

-- ----------------------------
-- Table structure for oa_customer
-- ----------------------------
DROP TABLE IF EXISTS `oa_customer`;
CREATE TABLE `oa_customer` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) DEFAULT NULL COMMENT '顾客负责人',
  `name` varchar(25) COLLATE utf8_bin DEFAULT NULL COMMENT '顾客姓名',
  `email` varchar(25) COLLATE utf8_bin DEFAULT NULL COMMENT '顾客邮箱',
  `phone` varchar(25) COLLATE utf8_bin DEFAULT NULL COMMENT '顾客电话',
  `contact` int(11) DEFAULT NULL COMMENT '接触记录',
  `sex` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `address` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `descr` text COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of oa_customer
-- ----------------------------
INSERT INTO `oa_customer` VALUES ('1', '1', '菲菲', '123123@qq.com', '18569948716', '2', 'm', '河南省驻马店市', '1524450297', null);
INSERT INTO `oa_customer` VALUES ('2', '1', '菲菲s', '123123@qq.com', '18569948716', '2', 'w', '河南省郑州市', '1524450297', null);
INSERT INTO `oa_customer` VALUES ('3', '2', '的反馈', '123123@qq.com', '18569948716', '2', 'w', '河南省郑州市', '1524450297', null);

-- ----------------------------
-- Table structure for oa_email
-- ----------------------------
DROP TABLE IF EXISTS `oa_email`;
CREATE TABLE `oa_email` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `send` varchar(25) COLLATE utf8_bin DEFAULT NULL COMMENT '发送方',
  `receive` varchar(25) COLLATE utf8_bin DEFAULT NULL COMMENT '接收方',
  `status` int(3) DEFAULT NULL COMMENT '接收状态',
  `time` int(11) DEFAULT NULL COMMENT '时间',
  `title` varchar(30) COLLATE utf8_bin DEFAULT NULL COMMENT '邮件标题',
  `content` text COLLATE utf8_bin COMMENT '邮件内容',
  `state` int(3) DEFAULT '0' COMMENT '读取状态',
  `send_id` int(11) DEFAULT NULL,
  `receive_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of oa_email
-- ----------------------------
INSERT INTO `oa_email` VALUES ('1', '牛富豪', '肖龙飞', '1', '1524100292', '嗯哼哼哼哼哼哼', 0xE79A84E7A9BAE997B4E58886E589B2E5B8A6E59B9EE5AEB6E5BC80E58F914756E5BC80E5B195E696B0E79A84E69CBAE4BC9AE58F8DE9A688E68A80E69CAFE79A84E882A1E4BBBDE7BB93E69E84E79A84E7A7AFE58886E58DA1E890A8E882BAE7BB93E6A0B8E5928CE68A80E69CAFE79A84E882A1E4BBBDE8A789E5BE97E5BE88E58F8DE6849FE8A789E5BE97E5BE88E58F8DE6849FE59FBAE79DA3E69599E69886E5B1B1E688BFE4BBB7E5BFABE9809FE79A84E68C82E58FB7E8B4B955E79BBEE698AFE4B880E4B8AAE5BE8876, '1', '0', '0');
INSERT INTO `oa_email` VALUES ('2', '牛富豪', '肖龙飞', '1', '1524100292', '哼哼哼哼', 0xE79A84E7A9BAE997B4E58886E589B2E5B8A6E59B9EE5AEB6E5BC80E58F914756E5BC80E5B195E696B0E79A84E69CBAE4BC9AE58F8DE9A688E68A80E69CAFE79A84E882A1E4BBBDE7BB93E69E84E79A84E7A7AFE58886E58DA1E890A8E882BAE7BB93E6A0B8E5928CE68A80E69CAFE79A84E882A1E4BBBDE8A789E5BE97E5BE88E58F8DE6849FE8A789E5BE97E5BE88E58F8DE6849FE59FBAE79DA3E69599E69886E5B1B1E688BFE4BBB7E5BFABE9809FE79A84E68C82E58FB7E8B4B955E79BBEE698AFE4B880E4B8AAE5BE8876, '1', '1', '0');
INSERT INTO `oa_email` VALUES ('3', '王永生', '肖龙飞', '1', '1524100292', '哼哼哼哼', 0xE79A84E7A9BAE997B4E58886E589B2E5B8A6E59B9EE5AEB6E5BC80E58F914756E5BC80E5B195E696B0E79A84E69CBAE4BC9AE58F8DE9A688E68A80E69CAFE79A84E882A1E4BBBDE7BB93E69E84E79A84E7A7AFE58886E58DA1E890A8E882BAE7BB93E6A0B8E5928CE68A80E69CAFE79A84E882A1E4BBBDE8A789E5BE97E5BE88E58F8DE6849FE8A789E5BE97E5BE88E58F8DE6849FE59FBAE79DA3E69599E69886E5B1B1E688BFE4BBB7E5BFABE9809FE79A84E68C82E58FB7E8B4B955E79BBEE698AFE4B880E4B8AAE5BE8876, '1', '1', '1');
INSERT INTO `oa_email` VALUES ('5', '肖龙飞', null, '1', '1524136559', null, 0x3C703E313233313233313233313233312EE69FA5E79C8BE7BB93E69E9CE79C8BE69DA5E983BDE694BEE58187E79A84E7A9BAE997B4E58F91E68CA5E4B8AAE4B89CE696B9E581A5E5BAB7E79A84E5A48DE59088E5BC93E794B5E9A5ADE99485E794B5E9A5ADE99485E5A3ABE5A4A7E5A4ABE5A3ABE5A4A7E5A4ABE4BAA4E794B5E8AF9DE8B4B9E5A4A7E5AEB6E698AFE590A6E58C85E590ABE78EAFE5A283E698AFE5A4A7E6B395E5AE983C62722F3E3C2F703E, '1', '3', '1');
INSERT INTO `oa_email` VALUES ('6', '肖龙飞', '王永生', '1', '1524136585', null, 0x3C703EE68EA5E794B5E8AF9DE59B9BE4B8AAE688BFE997B4E59CB0E696B9E79C8BE8BF87E5B0BDE5BFABE58F91E8B4A7E7BB99E68891554BE58E86E58FB2E79A84E7B289E7BAA2E889B2E79A84E58886E5BC80E4B8A4E4B8AAE58FB7203C62722F3E3C2F703E, '1', '0', '1');
INSERT INTO `oa_email` VALUES ('7', '肖龙飞', '王永生', '1', '1524186663', null, 0x3C703EE694B6E588B0E8B4A7E4BDA0E6B2A1E58F91E8BF87E8AEA1E58892E698AFE5A4A7E6B395E5AE98E78EAFE5A283E698AFE590A6E4BBA3E8A1A8E4BDA0E79A84E8BAABE4BBBDE8838CE5908EE5B0B1E698AFE68993E8BF87E69DA5E5BC80E58F91E8AEA1E58892E5928CE68A80E69CAFE79A84E983A8E58886E6A0B9E68DAEE585ACE58FB8E79A84E581A5E5BAB7E5928CE8A784E88C83E5B9B2E983A8E79A84E58F91E68CA5E5B0B1E69A97E7A4BAE8BF873C62722F3E3C2F703E, '1', '0', '1');
INSERT INTO `oa_email` VALUES ('8', '肖龙飞', '王永生', '1', '1524186870', '123123123', 0x3C703EE79A84E5BC80E58F91E8AEA1E58892E9A9ACE4B88AE58F91E79A84E4B8AAE588ABE59CB0E696B9E695B0E68DAEE5B9BFE58F91E58DA1E5B0B1E698AFE4B88DE4BC9AE5B081E58FB7E4BB8BE7BB8DE79A84E882A1E4BBBDE98791E9BB84E889B2E79A84E6A0B9E69CACE5B0B1E59B9EE5A48D763C62722F3E3C2F703E, '1', '1', '1');
INSERT INTO `oa_email` VALUES ('9', '肖龙飞', '王永生', '1', '1524190353', '123123123132123', 0x3C703EE7A7AFE58886E5B7A5E4BC9AE5928CE59FBAE69CACE79A84E9AB98E688BFE4BBB7E5928CE58F91E58AA8E69CBAE68F90E4BE9BE59D9AE5AE9EE79A84E99FA9E59BBDE983A8E58886E4BB8BE7BB8DE79A84E882A1E4BBBDE699AFE8A782E99B95E5A191E8A681E58F91E7BB99E68A80E69CAFE79A84E58D8EE59BBDE9948B3C62722F3E3C2F703E, '1', '1', '1');
INSERT INTO `oa_email` VALUES ('10', '肖龙飞', '美工', '1', '1524274712', '但是开发计划代付款国际化', 0x3C703EE5BC97E585B0E5858BE79A84E69BB4E68DA2E58DB3E58FAFE4BA86E8A7A3E4BDA0E58F91E7BB99E7A9BAE997B4E694BEE5A4A7E58C96E5B7A5E5BA93E58F91E587A0E4B8AAE7A68FE5A4A7E58EA6E58F91E7BB99E6A2B5E89282E58688E58F91E4B8AAE794B5E8AF9DE7B289E889B2E5A4A7E6A682E794B5E9A5ADE99485E99D9EE5B8B8E9AB98E79A84E794B5E9A5ADE994853C2F703E, '0', '1', '1');
INSERT INTO `oa_email` VALUES ('11', '肖龙飞', '美工', '1', '1524274830', '但是开发计划代付款国际化', 0x3C703EE5BC97E585B0E5858BE79A84E69BB4E68DA2E58DB3E58FAFE4BA86E8A7A3E4BDA0E58F91E7BB99E7A9BAE997B4E694BEE5A4A7E58C96E5B7A5E5BA93E58F91E587A0E4B8AAE7A68FE5A4A7E58EA6E58F91E7BB99E6A2B5E89282E58688E58F91E4B8AAE794B5E8AF9DE7B289E889B2E5A4A7E6A682E794B5E9A5ADE99485E99D9EE5B8B8E9AB98E79A84E794B5E9A5ADE99485E58886E4BAABE4B8AAE794B5E9A5ADE994853C2F703E, '1', '1', '1');
INSERT INTO `oa_email` VALUES ('12', '王永生', '肖龙飞', '1', '1524284903', '测试数据', 0x3C703EE597AFE593BCE593BC266E6273703B20E68891E5B0B1E79C8BE79C8BE4B88DE8AFB4E8AF9D20E5928CE598BFE598BF3C62722F3E3C2F703E, '1', '0', '3');

-- ----------------------------
-- Table structure for oa_log
-- ----------------------------
DROP TABLE IF EXISTS `oa_log`;
CREATE TABLE `oa_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '日志表',
  `title` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '日志标题',
  `content` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '日志内容',
  `time` int(11) DEFAULT NULL COMMENT '日志时间',
  `user_id` int(11) DEFAULT NULL COMMENT '用户id',
  `status` varchar(255) COLLATE utf8_bin DEFAULT '0' COMMENT '状态',
  `name` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='工作日志';

-- ----------------------------
-- Records of oa_log
-- ----------------------------
INSERT INTO `oa_log` VALUES ('6', '技术部', '王永生s王永生s王永生s王永生s王永生s王永生s王永生s王永生s王永生s王永生s王永生s王永生s王永生s王永生s王永生s王永生s王永生s王永生s王永生s王永生s王永生s王永生s王永生s王永生s王永生s王永生s', '1524013647', '7', '0,', '王永生s');
INSERT INTO `oa_log` VALUES ('5', '技术部s', '王永生王永生王永生王永生王永生王永生王永生王永生王永生王永生王永生王永生王永生王永生王永生王永生王永生王永生王永生王永生王永生王永生', '1524100188', '7', '0', '王永生');
INSERT INTO `oa_log` VALUES ('4', '财政部s', '牛富豪s牛富豪s牛富豪s牛富豪s牛富豪s牛富豪s牛富豪s牛富豪s', '1524100188', '2', '0', '牛富豪');
INSERT INTO `oa_log` VALUES ('3', '财政部', '牛富豪牛富豪牛富豪牛富豪牛富豪牛富豪牛富豪牛富豪牛富豪牛富豪牛富豪牛富豪牛富豪牛富豪牛富豪牛富豪牛富豪牛富豪牛富豪牛富豪', '1524013647', '2', '0', '牛富豪');
INSERT INTO `oa_log` VALUES ('2', '总经办', '肖龙飞s肖龙飞s肖龙飞s肖龙飞s肖龙飞s肖龙飞s肖龙飞s肖龙飞s肖龙飞s肖龙飞s肖龙飞s肖龙飞s肖龙飞s肖龙飞s肖龙飞s肖龙飞s肖龙飞s肖龙飞s肖龙飞s肖龙飞s肖龙飞s肖龙飞s肖龙飞s肖龙飞s肖龙飞s肖龙飞s肖龙飞s肖龙飞s肖龙飞s', '1524013647', '1', '0', '肖龙飞');
INSERT INTO `oa_log` VALUES ('1', '总经办s', '肖龙飞肖龙飞肖龙飞肖龙飞肖龙飞肖龙飞肖龙飞肖龙飞肖龙飞肖龙飞肖龙飞肖龙飞肖龙飞肖龙飞肖龙飞肖龙飞肖龙飞肖龙飞肖龙飞肖龙飞肖龙飞肖龙飞肖龙飞肖龙飞肖龙飞肖龙飞肖龙飞肖龙飞肖龙飞', '1524100188', '1', '0', '肖龙飞');
INSERT INTO `oa_log` VALUES ('7', 'app部', '段文虎段文虎段文虎段文虎段文虎段文虎段文虎段文虎段文虎段文虎段文虎段文虎段文虎段文虎段文虎段文虎', '1524013647', '4', '0,3,1', '段文虎');
INSERT INTO `oa_log` VALUES ('8', 'app部s', '段文虎s段文虎s段文虎s段文虎s段文虎s段文虎s段文虎s段文虎s段文虎s段文虎s段文虎s段文虎s段文虎s段文虎s', '1524100188', '4', '0,0,0', '段文虎');
INSERT INTO `oa_log` VALUES ('9', 'php部门', '吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良吴梦良', '1524013647', '6', '0,3,1', '吴梦良');
INSERT INTO `oa_log` VALUES ('10', 'php部门s', '吴梦良s吴梦良s吴梦良s吴梦良s吴梦良s吴梦良s吴梦良s吴梦良s吴梦良s吴梦良s吴梦良s吴梦良s吴梦良s吴梦良s吴梦良s吴梦良s吴梦良s吴梦良s吴梦良s吴梦良s吴梦良s吴梦良s吴梦良s吴梦良s吴梦良s吴梦良s吴梦良s吴梦良s吴梦良s吴梦良s吴梦良s吴梦良s吴梦良s吴梦良s吴梦良s吴梦良s吴梦良s', '1524100188', '6', '0,0,0', '吴梦梦');
INSERT INTO `oa_log` VALUES ('11', '设计部', '谢青青谢青青谢青青谢青青谢青青谢青青谢青青谢青青谢青青谢青青谢青青谢青青谢青青谢青青谢青青谢青青谢青青谢青青谢青青谢青青谢青青谢青青谢青青谢青青谢青青谢青青谢青青谢青青谢青青谢青青谢青青谢青青谢青青谢青青谢青青谢青青', '1524013647', '3', '0,3,1', '谢青青');
INSERT INTO `oa_log` VALUES ('12', '设计部s', '谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s谢青青s', '1524100188', '3', '0,0,1', '谢青青');
INSERT INTO `oa_log` VALUES ('13', '行政部', '邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍邵亚萍', '1524013647', '5', '0', '邵亚萍');
INSERT INTO `oa_log` VALUES ('14', '行政部s', '邵亚萍s邵亚萍s邵亚萍s邵亚萍s邵亚萍s邵亚萍s邵亚萍s邵亚萍s邵亚萍s邵亚萍s邵亚萍s邵亚萍s邵亚萍s邵亚萍s邵亚萍s邵亚萍s邵亚萍s邵亚萍s邵亚萍s邵亚萍s邵亚萍s邵亚萍s邵亚萍s邵亚萍s邵亚萍s邵亚萍s邵亚萍s邵亚萍s邵亚萍s邵亚萍s邵亚萍s邵亚萍s邵亚萍s', '1524100292', '5', '0', '邵亚萍');
INSERT INTO `oa_log` VALUES ('33', '啊实打实大萨达大所', '爱上大啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊电饭锅过分的话士大夫', '1524049684', '6', '0,3,1', '安达市大');
INSERT INTO `oa_log` VALUES ('35', '都是风景好看', '鲁大师看风景离开的房间打飞机客户谁看见对方过后看见对方是个护士的股份圣诞快乐发和', '1524049788', '6', '6,3,1', '就，吃年饭');
INSERT INTO `oa_log` VALUES ('36', '方面能够', '是的房价回归水电费价格速度快解放后计算逗号鼓风机as空间大富豪可接受的元话费就开始对方过后会计师对符合快递费时间规划', '1524050175', '6', '0,3,1', '无梦良');
INSERT INTO `oa_log` VALUES ('37', 'php部', '小时候的尽快发货收到货接口规范小时候的尽快发货收到货接口规范小时候的尽快发货收到货接口规范小时候的尽快发货收到货接口规范', '1524100292', '6', '0,3,1', '吴梦良');
INSERT INTO `oa_log` VALUES ('38', 'php部门', '这是php部门的日志这是php部门的日志这是php部门的日志这是php部门的日志这是php部门的日志这是php部门的日志这是php部门的日志这是php部门的日志这是php部门的日志这是php部门的日志这是php部门的日志这是php部门的日志这是php部门的日志这是php部门的日志这是php部门的日志这是php部门的日志这是php部门的日志', '1524118699', '6', '0,0,1', '吴梦良');
INSERT INTO `oa_log` VALUES ('39', '总经办', '嗯哼哼  我就看看不说话  \n最少还得输入三个字符', '1524300015', '1', '0', '肖龙飞');
INSERT INTO `oa_log` VALUES ('40', '总经办', 'mhjnbfghjf \niuguigh ju\n和规范合格\n据估计空格我健康韩国黄金国际化工予公布价格变化', '1524539072', '1', '0', '肖龙飞');
INSERT INTO `oa_log` VALUES ('41', 'php部', '这是我的日志 \n嗯哼哼 \n我就随便测试咯', '1524541347', '6', '0,0,0', '吴梦良');
INSERT INTO `oa_log` VALUES ('42', 'php部', '这是我的日志。今天我做了点什么事，嘿嘿 我就看看不说话。。。。', '1524554711', '6', '0,0,0', '吴梦良');

-- ----------------------------
-- Table structure for oa_message
-- ----------------------------
DROP TABLE IF EXISTS `oa_message`;
CREATE TABLE `oa_message` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `username` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `industrys` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of oa_message
-- ----------------------------
INSERT INTO `oa_message` VALUES ('1', 'http://118.190.207.96:9990/forward', '河南福妙堂', null, '1');
INSERT INTO `oa_message` VALUES ('2', '绝对是法国', '送你都很反感', '肖龙飞', '2');
INSERT INTO `oa_message` VALUES ('5', 'http://http://118.190.207.96:9990/forward', '河南福妙堂', null, '1');
INSERT INTO `oa_message` VALUES ('4', 'http://www.baidu.com', '河南野人智能科技', '肖龙飞', '5');

-- ----------------------------
-- Table structure for oa_project
-- ----------------------------
DROP TABLE IF EXISTS `oa_project`;
CREATE TABLE `oa_project` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `descr` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `contenrt` text COLLATE utf8_bin,
  `autor` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of oa_project
-- ----------------------------

-- ----------------------------
-- Table structure for oa_review
-- ----------------------------
DROP TABLE IF EXISTS `oa_review`;
CREATE TABLE `oa_review` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `rid` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of oa_review
-- ----------------------------
INSERT INTO `oa_review` VALUES ('1', '', '1');

-- ----------------------------
-- Table structure for oa_role
-- ----------------------------
DROP TABLE IF EXISTS `oa_role`;
CREATE TABLE `oa_role` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '部门表',
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '部门名称',
  `limit` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '部门权限',
  `descr` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '部门权限描述',
  `time` int(11) DEFAULT NULL COMMENT '创立时间',
  `pid` int(11) DEFAULT NULL COMMENT 'pid',
  `review_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of oa_role
-- ----------------------------
INSERT INTO `oa_role` VALUES ('1', '总经办', '1,10,11,48,2,13,3,17,19,4,49,5,51,52,53,6,7,54,8,55,56,57,58,59', '拥有至高无上的权限', '1523259351', '0', null);
INSERT INTO `oa_role` VALUES ('2', '财政部', '2,13,3,17,19,4,5,51,52,53,6,7,54,8', '部分权限', '1523259351', '1', null);
INSERT INTO `oa_role` VALUES ('3', '技术部', '1,10,11,48,2,13,3,17,19,4,49,5,51,52,6,7,8,50,53', '部分权限', '1523330890', '1', null);
INSERT INTO `oa_role` VALUES ('4', '行政部', '2,13,3,17,19,4,49,5,6,7,8', '部分权限', '1523331325', '2', null);
INSERT INTO `oa_role` VALUES ('5', '设计部', '1,10,11,48,2,13,3,17,19,4,49,5,6,7,8', '拥有至高无上的权限1', '1523344584', '3', '1');
INSERT INTO `oa_role` VALUES ('6', 'php部', '2,13,3,17,19,4,49,5,6,7,8', '部分权限', '1523344584', '3', null);
INSERT INTO `oa_role` VALUES ('7', ' app部门', '2,13,3,17,19,4,49,5,6,7,8', '部分权限', '1523344584', '3', null);

-- ----------------------------
-- Table structure for oa_roles
-- ----------------------------
DROP TABLE IF EXISTS `oa_roles`;
CREATE TABLE `oa_roles` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '管理id',
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '名称',
  `limits` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `descr` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '描述',
  `time` int(11) DEFAULT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of oa_roles
-- ----------------------------
INSERT INTO `oa_roles` VALUES ('1', '管理者', '2', '公司技术问题', '1523259351');
INSERT INTO `oa_roles` VALUES ('2', '非管理者', null, '敲代码', '1523259351');

-- ----------------------------
-- Table structure for oa_user
-- ----------------------------
DROP TABLE IF EXISTS `oa_user`;
CREATE TABLE `oa_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '用户表',
  `username` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '用户名',
  `password` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '密码',
  `status` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '状态',
  `time` int(11) DEFAULT NULL COMMENT '时间',
  `logip` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '登录ip',
  `number` int(11) DEFAULT '1' COMMENT '登录次数',
  `phone` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '电话',
  `email` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '邮箱',
  `role_id` int(10) DEFAULT NULL COMMENT '部门id',
  `roles_id` int(10) DEFAULT NULL COMMENT '部门管辖人员',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of oa_user
-- ----------------------------
INSERT INTO `oa_user` VALUES ('1', '肖龙飞', '123', '1', '1524716804', '127.0.0.1', '78', '18569948717', '123@qq.com', '1', '1');
INSERT INTO `oa_user` VALUES ('2', '牛富豪', '123', '1', '1524451360', '127.0.0.1', '10', '18569948716', '123@qq.com', '2', '1');
INSERT INTO `oa_user` VALUES ('3', '谢青青', '123', '1', '1524100836', '127.0.0.1', '10', '18569945678', '168@163.com', '5', '1');
INSERT INTO `oa_user` VALUES ('4', '段文虎', '123', '1', '1523362215', '127.0.0.1', '2', '111111111111', '111@qq.com', '7', '2');
INSERT INTO `oa_user` VALUES ('5', '邵亚萍', '123', '1', '1523424889', '127.0.0.1', '2', '111111', '111@qq.com', '4', '2');
INSERT INTO `oa_user` VALUES ('6', '吴梦良', '123', '1', '1524623890', '127.0.0.1', '29', '18569945678', '111@qq.com', '6', '2');
INSERT INTO `oa_user` VALUES ('7', '王永生', '123', '1', '1524618231', '127.0.0.1', '35', '18569945678', '111@qq.com', '3', '1');
INSERT INTO `oa_user` VALUES ('13', 'demo', '123', '1', '1523850473', '127.0.0.1', '1', '18569948716', '521@qq.com', '6', '2');
INSERT INTO `oa_user` VALUES ('14', '美工', '123', '1', '1523964815', '127.0.0.1', '2', '18569948716', '521@qq.com', '5', '2');
INSERT INTO `oa_user` VALUES ('15', '设计', '123', '1', '1523964878', '127.0.0.1', '2', '18569948716', '521@qq.com', '5', '2');

-- ----------------------------
-- Table structure for oa_webcate
-- ----------------------------
DROP TABLE IF EXISTS `oa_webcate`;
CREATE TABLE `oa_webcate` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `industry` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '行业名称',
  `pid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of oa_webcate
-- ----------------------------
INSERT INTO `oa_webcate` VALUES ('1', '医疗行业', '0');
INSERT INTO `oa_webcate` VALUES ('2', '教育行业', '0');
INSERT INTO `oa_webcate` VALUES ('5', '酒店服务', '4');
INSERT INTO `oa_webcate` VALUES ('4', '服务行业', '0');

-- ----------------------------
-- Table structure for oa_webtransmit
-- ----------------------------
DROP TABLE IF EXISTS `oa_webtransmit`;
CREATE TABLE `oa_webtransmit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) DEFAULT NULL,
  `message_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of oa_webtransmit
-- ----------------------------
