/*
Navicat MySQL Data Transfer

Source Server         : qq
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : dafen

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2015-06-20 08:53:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for config
-- ----------------------------
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `teacher_weight` float DEFAULT NULL,
  `student_weight` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of config
-- ----------------------------
INSERT INTO `config` VALUES ('1', '0.6', '0.4');

-- ----------------------------
-- Table structure for pro
-- ----------------------------
DROP TABLE IF EXISTS `pro`;
CREATE TABLE `pro` (
  `pro_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `proname` text NOT NULL,
  `grade` char(4) DEFAULT NULL,
  `group` varchar(4) NOT NULL,
  `score` float(5,2) DEFAULT NULL,
  `flag` char(1) DEFAULT '0',
  `count_people` int(4) DEFAULT NULL COMMENT '已评分人数',
  `peoplenums` int(4) DEFAULT NULL COMMENT '评分总人数',
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pro
-- ----------------------------
INSERT INTO `pro` VALUES ('52', 'TCP实现WIndows和Linux文件传输', '2014', '3', '86.12', '0', '39', '54');
INSERT INTO `pro` VALUES ('53', '手机在线购物系统', '2014', '2', '87.73', '1', '40', '54');
INSERT INTO `pro` VALUES ('54', '基于DES的安全通信系统', '2014', '8', '87.75', '0', '41', '54');
INSERT INTO `pro` VALUES ('55', '聊天软件', '2014', '7', '93.61', '0', '41', '54');
INSERT INTO `pro` VALUES ('56', '打分系统', '2014', '4', '91.07', '0', '40', '54');

-- ----------------------------
-- Table structure for score
-- ----------------------------
DROP TABLE IF EXISTS `score`;
CREATE TABLE `score` (
  `user_id` varchar(20) NOT NULL,
  `pro_id` int(10) NOT NULL,
  `varscore` varchar(4) DEFAULT NULL,
  `comment` varchar(2068) DEFAULT NULL,
  `group` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`user_id`,`pro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of score
-- ----------------------------
INSERT INTO `score` VALUES ('201322406003', '52', '86', '', '3');
INSERT INTO `score` VALUES ('201322406003', '53', '92', '', '2');
INSERT INTO `score` VALUES ('201322406003', '54', '99', '跟网络安全课程紧密联系,对课程所学知识充分应用.其中运用DES加密算法,有一定的难度及挑战.并且,该模型在商业等方面有更深的应用.', '8');
INSERT INTO `score` VALUES ('201322406003', '55', '85', '', '7');
INSERT INTO `score` VALUES ('201322406003', '56', '97', '做的很不错，我喜欢', '4');
INSERT INTO `score` VALUES ('201422400000', '0', '100', '哇哇哇啊  分数', '4');
INSERT INTO `score` VALUES ('201422400000', '52', '83', null, '3');
INSERT INTO `score` VALUES ('201422400000', '53', '85', null, '2');
INSERT INTO `score` VALUES ('201422400000', '54', '86', '', '8');
INSERT INTO `score` VALUES ('201422400000', '55', '95', null, '7');
INSERT INTO `score` VALUES ('201422400000', '56', '90', '', '4');
INSERT INTO `score` VALUES ('201422402001', '53', '85', '', '2');
INSERT INTO `score` VALUES ('201422402001', '54', '88.5', '', '8');
INSERT INTO `score` VALUES ('201422402001', '55', '99.5', '纠结啊~要不要打100..做的太好了功能完善，内容充实。', '7');
INSERT INTO `score` VALUES ('201422402001', '56', '94.5', '', '4');
INSERT INTO `score` VALUES ('201422402002', '52', '90', '', '3');
INSERT INTO `score` VALUES ('201422402002', '53', '90', '', '2');
INSERT INTO `score` VALUES ('201422402002', '54', '99', '通信与课程完美结合，既保证了对用户的透明性，又保证了传输过程中数据的安全。', '8');
INSERT INTO `score` VALUES ('201422402002', '55', '88', '', '7');
INSERT INTO `score` VALUES ('201422402002', '56', '96', '做的很好，实用性强', '4');
INSERT INTO `score` VALUES ('201422402003', '52', '91', '', '3');
INSERT INTO `score` VALUES ('201422402003', '53', '91', '', '2');
INSERT INTO `score` VALUES ('201422402003', '54', '85', '', '8');
INSERT INTO `score` VALUES ('201422402003', '55', '90', '', '7');
INSERT INTO `score` VALUES ('201422402003', '56', '98', '功能完善,界面漂亮 ', '4');
INSERT INTO `score` VALUES ('201422402004', '52', '90', '', '3');
INSERT INTO `score` VALUES ('201422402004', '53', '90', '', '2');
INSERT INTO `score` VALUES ('201422402004', '54', '90', '', '8');
INSERT INTO `score` VALUES ('201422402004', '55', '100', '功能全面,准备精心,策划合理.采用高端分布式架构,加密等策略.', '7');
INSERT INTO `score` VALUES ('201422402004', '56', '95', '', '4');
INSERT INTO `score` VALUES ('201422402005', '52', '92', '', '3');
INSERT INTO `score` VALUES ('201422402005', '53', '93', '', '2');
INSERT INTO `score` VALUES ('201422402005', '54', '90', '', '8');
INSERT INTO `score` VALUES ('201422402005', '55', '98', '做到佷不错,用到的知识高大上', '7');
INSERT INTO `score` VALUES ('201422402005', '56', '98', '界面大方,功能完善', '4');
INSERT INTO `score` VALUES ('201422402006', '52', '88', '', '3');
INSERT INTO `score` VALUES ('201422402006', '53', '95', '', '2');
INSERT INTO `score` VALUES ('201422402006', '54', '99', '基于DES加密，与我们的课程结合紧密，界面友好，功能健全， 安全性强。', '8');
INSERT INTO `score` VALUES ('201422402006', '55', '85', '', '7');
INSERT INTO `score` VALUES ('201422402006', '56', '92', '', '4');
INSERT INTO `score` VALUES ('201422402007', '52', '86', '', '3');
INSERT INTO `score` VALUES ('201422402007', '53', '95', '', '2');
INSERT INTO `score` VALUES ('201422402007', '54', '100', '有效的结合了两门课程', '8');
INSERT INTO `score` VALUES ('201422402007', '55', '86', '', '7');
INSERT INTO `score` VALUES ('201422402007', '56', '95', '', '4');
INSERT INTO `score` VALUES ('201422402008', '52', '85', '', '3');
INSERT INTO `score` VALUES ('201422402008', '53', '95', '', '2');
INSERT INTO `score` VALUES ('201422402008', '54', '99', '将加密与聊天系统紧密结合,这是创新之处.', '8');
INSERT INTO `score` VALUES ('201422402008', '55', '80', '', '7');
INSERT INTO `score` VALUES ('201422402008', '56', '95', '', '4');
INSERT INTO `score` VALUES ('201422402009', '52', '80', '', '3');
INSERT INTO `score` VALUES ('201422402009', '53', '85', '', '2');
INSERT INTO `score` VALUES ('201422402009', '54', '85', '', '8');
INSERT INTO `score` VALUES ('201422402009', '55', '99', '服务器架构合理,是主流分布式架构,界面良好.', '7');
INSERT INTO `score` VALUES ('201422402009', '56', '80', '', '4');
INSERT INTO `score` VALUES ('201422402010', '52', '75', '', '3');
INSERT INTO `score` VALUES ('201422402010', '53', '83', '', '2');
INSERT INTO `score` VALUES ('201422402010', '54', '85', '', '8');
INSERT INTO `score` VALUES ('201422402010', '55', '99', '消息推送功能全面而完善；利用分布式构架的服务器，界面友好，可应用性非常强。', '7');
INSERT INTO `score` VALUES ('201422402010', '56', '80', '', '4');
INSERT INTO `score` VALUES ('201422402011', '52', '95', '', '3');
INSERT INTO `score` VALUES ('201422402011', '53', '97', '功能很全，很好！', '2');
INSERT INTO `score` VALUES ('201422402011', '54', '92', '', '8');
INSERT INTO `score` VALUES ('201422402011', '55', '99', '本系统采用了分布式结构，后台采用了大量技术，工作量比较大，功能很齐全，非常好！', '7');
INSERT INTO `score` VALUES ('201422402011', '56', '98', '系统的界面非常漂亮，功能也非常全面。', '4');
INSERT INTO `score` VALUES ('201422403001', '52', '90', '', '3');
INSERT INTO `score` VALUES ('201422403001', '53', '95', '', '2');
INSERT INTO `score` VALUES ('201422403001', '54', '99', '本通讯系统基于DES加密算法,有较高的实用型和商业应用前景.', '8');
INSERT INTO `score` VALUES ('201422403001', '55', '90', '', '7');
INSERT INTO `score` VALUES ('201422403001', '56', '95', '', '4');
INSERT INTO `score` VALUES ('201422403002', '52', '95', '', '3');
INSERT INTO `score` VALUES ('201422403002', '53', '90', '', '2');
INSERT INTO `score` VALUES ('201422403002', '54', '98', '与本门课程联系紧密，但是还有努力的空间', '8');
INSERT INTO `score` VALUES ('201422403002', '55', '88', '', '7');
INSERT INTO `score` VALUES ('201422403002', '56', '95', '', '4');
INSERT INTO `score` VALUES ('201422403003', '52', '92', '', '3');
INSERT INTO `score` VALUES ('201422403003', '54', '82', '', '8');
INSERT INTO `score` VALUES ('201422403003', '55', '99', '功能强大,界面友好,内容丰富.', '7');
INSERT INTO `score` VALUES ('201422403004', '52', '92', '有创新意义.', '3');
INSERT INTO `score` VALUES ('201422403004', '53', '88', '', '2');
INSERT INTO `score` VALUES ('201422403004', '54', '89', '', '8');
INSERT INTO `score` VALUES ('201422403004', '55', '90', '', '7');
INSERT INTO `score` VALUES ('201422403004', '56', '95', '', '4');
INSERT INTO `score` VALUES ('201422403005', '52', '90', '', '3');
INSERT INTO `score` VALUES ('201422403005', '53', '95', '', '2');
INSERT INTO `score` VALUES ('201422403005', '54', '99', '这个系统与网络课程紧密联系,具有挑战性和应用价值,较其他系统有技术含量', '8');
INSERT INTO `score` VALUES ('201422403005', '55', '90', '', '7');
INSERT INTO `score` VALUES ('201422403005', '56', '95', '', '4');
INSERT INTO `score` VALUES ('201422403006', '52', '77', '', '3');
INSERT INTO `score` VALUES ('201422403006', '53', '83', '', '2');
INSERT INTO `score` VALUES ('201422403006', '54', '83', '', '8');
INSERT INTO `score` VALUES ('201422403006', '55', '98', '完善地实现了即时聊天软件的基本功能,并提供了友好的用户界面!', '7');
INSERT INTO `score` VALUES ('201422403006', '56', '82', '', '4');
INSERT INTO `score` VALUES ('201422403007', '52', '99', '功能实用,技术要求高,实现的比较好', '3');
INSERT INTO `score` VALUES ('201422403007', '53', '92', '', '2');
INSERT INTO `score` VALUES ('201422403007', '54', '89', '', '8');
INSERT INTO `score` VALUES ('201422403007', '55', '92', '', '7');
INSERT INTO `score` VALUES ('201422403007', '56', '92', '', '4');
INSERT INTO `score` VALUES ('201422404001', '52', '98', '功能强大,实现简单', '3');
INSERT INTO `score` VALUES ('201422404001', '53', '90', '', '2');
INSERT INTO `score` VALUES ('201422404001', '54', '90', '', '8');
INSERT INTO `score` VALUES ('201422404001', '55', '94', '', '7');
INSERT INTO `score` VALUES ('201422404001', '56', '90', '', '4');
INSERT INTO `score` VALUES ('201422404002', '52', '86', '', '3');
INSERT INTO `score` VALUES ('201422404002', '53', '99', '与时下某著名购物平台齐名,实现基本在线购物功能,分为前台后台两大部分,实现良好,贴近生活.', '2');
INSERT INTO `score` VALUES ('201422404002', '54', '81', '', '8');
INSERT INTO `score` VALUES ('201422404002', '55', '88', '', '7');
INSERT INTO `score` VALUES ('201422404002', '56', '91', '', '4');
INSERT INTO `score` VALUES ('201422404003', '52', '90', '', '3');
INSERT INTO `score` VALUES ('201422404003', '53', '100', '我觉得做的很不错，应该打个高分', '2');
INSERT INTO `score` VALUES ('201422404003', '54', '90', '', '8');
INSERT INTO `score` VALUES ('201422404003', '55', '85', '', '7');
INSERT INTO `score` VALUES ('201422404003', '56', '90', '', '4');
INSERT INTO `score` VALUES ('201422404004', '53', '93', '', '2');
INSERT INTO `score` VALUES ('201422404004', '54', '85', '', '8');
INSERT INTO `score` VALUES ('201422404004', '55', '85', '', '7');
INSERT INTO `score` VALUES ('201422404004', '56', '90', '', '4');
INSERT INTO `score` VALUES ('201422404005', '52', '99', '实现linux和windows的连通很不容易,工作量比较大.', '3');
INSERT INTO `score` VALUES ('201422404005', '53', '94', '', '2');
INSERT INTO `score` VALUES ('201422404005', '54', '95', '', '8');
INSERT INTO `score` VALUES ('201422404005', '55', '95', '', '7');
INSERT INTO `score` VALUES ('201422404005', '56', '94', '', '4');
INSERT INTO `score` VALUES ('201422404006', '52', '99', '有新意，技术要求高', '3');
INSERT INTO `score` VALUES ('201422404006', '53', '90', '', '2');
INSERT INTO `score` VALUES ('201422404006', '54', '92', '', '8');
INSERT INTO `score` VALUES ('201422404006', '55', '93', '', '7');
INSERT INTO `score` VALUES ('201422404006', '56', '90', '', '4');
INSERT INTO `score` VALUES ('201422404007', '52', '80', '', '3');
INSERT INTO `score` VALUES ('201422404007', '53', '85', '', '2');
INSERT INTO `score` VALUES ('201422404007', '54', '85', '', '8');
INSERT INTO `score` VALUES ('201422404007', '55', '99', '使用分布式构架，效果良好', '7');
INSERT INTO `score` VALUES ('201422404007', '56', '88', '', '4');
INSERT INTO `score` VALUES ('201422404008', '52', '95', '  ', '3');
INSERT INTO `score` VALUES ('201422404008', '53', '89.9', '', '2');
INSERT INTO `score` VALUES ('201422404008', '54', '90', '牛，这个系统牛', '8');
INSERT INTO `score` VALUES ('201422404008', '55', '90', '', '7');
INSERT INTO `score` VALUES ('201422404008', '56', '100', '   该系统设计新颖，功能独特，界面流畅，超水平完成了课程设计的任务，给予满分。', '4');
INSERT INTO `score` VALUES ('201422404009', '52', '80', '', '3');
INSERT INTO `score` VALUES ('201422404009', '53', '94', '', '2');
INSERT INTO `score` VALUES ('201422404009', '54', '84', '', '8');
INSERT INTO `score` VALUES ('201422404009', '55', '85', '', '7');
INSERT INTO `score` VALUES ('201422404009', '56', '90', '', '4');
INSERT INTO `score` VALUES ('201422404010', '52', '88', '', '3');
INSERT INTO `score` VALUES ('201422404010', '53', '99', '服务器和客户端功能比较齐全.', '2');
INSERT INTO `score` VALUES ('201422404010', '54', '80', '', '8');
INSERT INTO `score` VALUES ('201422404010', '55', '90', '', '7');
INSERT INTO `score` VALUES ('201422404010', '56', '90', '', '4');
INSERT INTO `score` VALUES ('201422404011', '52', '100', '设计,构思,创意非常好!我特别喜欢!', '3');
INSERT INTO `score` VALUES ('201422404011', '53', '93', '', '2');
INSERT INTO `score` VALUES ('201422404011', '54', '89', '', '8');
INSERT INTO `score` VALUES ('201422404011', '55', '93', '', '7');
INSERT INTO `score` VALUES ('201422404011', '56', '93', '', '4');
INSERT INTO `score` VALUES ('201422404012', '52', '94', '非常好，项目有创新', '3');
INSERT INTO `score` VALUES ('201422404012', '53', '86', '', '2');
INSERT INTO `score` VALUES ('201422404012', '54', '90', '', '8');
INSERT INTO `score` VALUES ('201422404012', '55', '91', '', '7');
INSERT INTO `score` VALUES ('201422404012', '56', '96', '非常好，做的很好', '4');
INSERT INTO `score` VALUES ('201422404013', '52', '100', '功能完善,设计好,有想法', '3');
INSERT INTO `score` VALUES ('201422404013', '53', '90', '', '2');
INSERT INTO `score` VALUES ('201422404013', '54', '90', '', '8');
INSERT INTO `score` VALUES ('201422404013', '55', '90', '', '7');
INSERT INTO `score` VALUES ('201422404013', '56', '90', '', '4');
INSERT INTO `score` VALUES ('201422404015', '52', '99', '与网络通信相关,设计实现都很好,具有实际意义!', '3');
INSERT INTO `score` VALUES ('201422404015', '53', '85', '', '2');
INSERT INTO `score` VALUES ('201422404015', '54', '92', '', '8');
INSERT INTO `score` VALUES ('201422404015', '55', '94', '', '7');
INSERT INTO `score` VALUES ('201422404015', '56', '90', '', '4');
INSERT INTO `score` VALUES ('201422404017', '52', '88', '', '3');
INSERT INTO `score` VALUES ('201422404017', '53', '100', '工作量足够大,技术比较先进.', '2');
INSERT INTO `score` VALUES ('201422404017', '54', '85', '', '8');
INSERT INTO `score` VALUES ('201422404017', '55', '85', '', '7');
INSERT INTO `score` VALUES ('201422404017', '56', '92', '', '4');
INSERT INTO `score` VALUES ('201422404018', '52', '99', '是真的和网络通信有关', '3');
INSERT INTO `score` VALUES ('201422404018', '53', '85', '', '2');
INSERT INTO `score` VALUES ('201422404018', '54', '90', '', '8');
INSERT INTO `score` VALUES ('201422404018', '55', '93', '', '7');
INSERT INTO `score` VALUES ('201422404018', '56', '88', '', '4');
INSERT INTO `score` VALUES ('201422406001', '52', '91', '', '3');
INSERT INTO `score` VALUES ('201422406001', '53', '90', '', '2');
INSERT INTO `score` VALUES ('201422406001', '54', '90', '', '8');
INSERT INTO `score` VALUES ('201422406001', '55', '92', '', '7');
INSERT INTO `score` VALUES ('201422406001', '56', '100', '我觉得做得非常好', '4');
INSERT INTO `score` VALUES ('201422406002', '52', '94', '', '3');
INSERT INTO `score` VALUES ('201422406002', '53', '94', '', '2');
INSERT INTO `score` VALUES ('201422406002', '54', '94', '', '8');
INSERT INTO `score` VALUES ('201422406002', '55', '92', '', '7');
INSERT INTO `score` VALUES ('201422406002', '56', '99', '我统做的挺好的觉得这个系.', '4');
INSERT INTO `score` VALUES ('201422406003', '52', '95', '', '3');
INSERT INTO `score` VALUES ('201422406003', '53', '90', '', '2');
INSERT INTO `score` VALUES ('201422406003', '54', '90', '', '8');
INSERT INTO `score` VALUES ('201422406003', '55', '90', '', '7');
INSERT INTO `score` VALUES ('201422406003', '56', '97', '因为觉得这个系统比较实用', '4');
INSERT INTO `score` VALUES ('201422406004', '52', '92', '', '3');
INSERT INTO `score` VALUES ('201422406004', '53', '100', '有创意,系统功能全面', '2');
INSERT INTO `score` VALUES ('201422406004', '54', '92', '', '8');
INSERT INTO `score` VALUES ('201422406004', '55', '92', '', '7');
INSERT INTO `score` VALUES ('201422406004', '56', '94', '', '4');
INSERT INTO `score` VALUES ('201422406005', '52', '90', '', '3');
INSERT INTO `score` VALUES ('201422406005', '53', '100', '内容充实,完美.', '2');
INSERT INTO `score` VALUES ('201422406005', '54', '90', '', '8');
INSERT INTO `score` VALUES ('201422406005', '55', '90', '', '7');
INSERT INTO `score` VALUES ('201422406005', '56', '90', '', '4');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` varchar(20) NOT NULL,
  `name` varchar(56) DEFAULT NULL,
  `password` char(32) NOT NULL,
  `group` varchar(4) DEFAULT NULL,
  `grade` char(4) DEFAULT NULL,
  `role` varchar(8) NOT NULL DEFAULT '学生',
  `flag` char(1) DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('201322406003', '薛松', 'e10adc3949ba59abbe56e057f20f883e', '8', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422400000', '孙敏', 'd1f11766cabc7f01b0d962f1f937ea33', '4', '2014', '老师', '0');
INSERT INTO `user` VALUES ('201422402001', '段庆龙', 'dea25b0af6cc5ea9da4961dbc5ffeb97', '7', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422402002', '郭少茹', 'c33367701511b4f6020ec61ded352059', '8', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422402003', '胡小康', '6d2f41bb391a914977a5a4a166e85147', '4', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422402004', '李烨斌', 'e10adc3949ba59abbe56e057f20f883e', '7', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422402005', '梁新彦', 'd1f11766cabc7f01b0d962f1f937ea33', '4', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422402006', '马淑晖', 'e6e407b1edb2cca3def82992c8ef32d9', '8', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422402007', '穆俊芳', '3d79c3002d19200b9069635b66667735', '8', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422402008', '史倩玉', 'c33367701511b4f6020ec61ded352059', '8', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422402009', '王健', 'e10adc3949ba59abbe56e057f20f883e', '7', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422402010', '王杰', '9ae2be73b58b565bce3e47493a56e26a', '7', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422402011', '徐树良', '78e5db760096701d87315bff77bcf15c', '7', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422402099', '梁新彦', 'e10adc3949ba59abbe56e057f20f883e', '7', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422403001', '李大宇', 'e10adc3949ba59abbe56e057f20f883e', '8', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422403002', '李婷', 'b6021505950db92ecd01c84d242eea2d', '8', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422403003', '刘杰飞', 'e10adc3949ba59abbe56e057f20f883e', '7', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422403004', '刘姝林', 'd7f86c5bba03edaf17c2f281171439f2', '4', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422403005', '吴晓瑛', 'c33367701511b4f6020ec61ded352059', '8', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422403006', '张少霞', 'f1c54de35770577c1ebb8c536729f0ea', '7', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422403007', '赵红红', 'e10adc3949ba59abbe56e057f20f883e', '3', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422404001', '白晓红', '21218cca77804d2ba1922c33e0151105', '3', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422404002', '郭如健', 'b34ecc4dafe1b2981d9de951d23fae03', '2', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422404003', '韩慧琴', 'e10adc3949ba59abbe56e057f20f883e', '2', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422404004', '何星成', 'e10adc3949ba59abbe56e057f20f883e', '2', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422404005', '焦茜', 'c33367701511b4f6020ec61ded352059', '3', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422404006', '康亚楠', 'e10adc3949ba59abbe56e057f20f883e', '3', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422404007', '李冰', 'e10adc3949ba59abbe56e057f20f883e', '7', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422404008', '李晨强', 'e10adc3949ba59abbe56e057f20f883e', '4', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422404009', '刘国忠', 'e10adc3949ba59abbe56e057f20f883e', '2', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422404010', '孟扬', 'e10adc3949ba59abbe56e057f20f883e', '2', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422404011', '宋鹏飞', 'e10adc3949ba59abbe56e057f20f883e', '3', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422404012', '孙瑞瑞', 'e10adc3949ba59abbe56e057f20f883e', '4', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422404013', '王蓉', '96e79218965eb72c92a549dd5a330112', '3', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422404015', '寻丽娜', 'e10adc3949ba59abbe56e057f20f883e', '3', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422404017', '张鹏', 'e10adc3949ba59abbe56e057f20f883e', '2', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422404018', '赵越', '6d071901727aec1ba6d8e2497ef5b709', '3', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422406001', '郭倩', 'e10adc3949ba59abbe56e057f20f883e', '4', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422406002', '鹿琛', 'e10adc3949ba59abbe56e057f20f883e', '4', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422406003', '张浩杰', 'c33367701511b4f6020ec61ded352059', '4', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422406004', '张文凯', '5cef3a525258366b73978e9503404fb3', '2', '2014', '学生', '0');
INSERT INTO `user` VALUES ('201422406005', '赵宝', 'e35cf7b66449df565f93c607d5a81d09', '2', '2014', '学生', '0');
