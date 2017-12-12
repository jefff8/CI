/*
Navicat MySQL Data Transfer

Source Server         : hxajxt
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : jmadmin

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2017-12-12 10:55:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for 信息发布
-- ----------------------------
DROP TABLE IF EXISTS `信息发布`;
CREATE TABLE `信息发布` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `发布人` varchar(255) DEFAULT NULL,
  `公告标题` varchar(255) DEFAULT NULL,
  `公告内容` varchar(255) DEFAULT NULL,
  `公告附件` varchar(255) DEFAULT NULL,
  `发布时间` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 信息发布
-- ----------------------------

-- ----------------------------
-- Table structure for 分户验收
-- ----------------------------
DROP TABLE IF EXISTS `分户验收`;
CREATE TABLE `分户验收` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `时间戳` varchar(255) NOT NULL,
  `工程时间戳` varchar(255) NOT NULL,
  `工程名称` varchar(255) NOT NULL,
  `工程单状态` varchar(255) DEFAULT NULL,
  `栋号` varchar(255) DEFAULT NULL,
  `楼层` varchar(255) DEFAULT NULL,
  `户数` varchar(255) DEFAULT NULL,
  `起始层` varchar(255) DEFAULT NULL,
  `验收时间` varchar(255) DEFAULT NULL,
  `整改通知单` varchar(255) DEFAULT NULL,
  `整改通知单说明` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 分户验收
-- ----------------------------
INSERT INTO `分户验收` VALUES ('53', '1512983381354', '1506414368014', '江门市技师学院第二校区~3、4(教学楼)', '审批不通过', 'A', '3', '3', '1', '2017-12-11', '~*^*~151298394801.jpg', '');

-- ----------------------------
-- Table structure for 分部验收
-- ----------------------------
DROP TABLE IF EXISTS `分部验收`;
CREATE TABLE `分部验收` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `时间戳` varchar(255) NOT NULL,
  `工程时间戳` varchar(255) NOT NULL,
  `工程名称` varchar(255) NOT NULL,
  `工程单状态` varchar(255) DEFAULT NULL,
  `分部工程名称` varchar(255) DEFAULT NULL,
  `发起时间` varchar(255) DEFAULT NULL,
  `发起单位` varchar(255) DEFAULT NULL,
  `监理单位` varchar(255) DEFAULT NULL,
  `勘察单位` varchar(255) DEFAULT NULL,
  `设计单位` varchar(255) DEFAULT NULL,
  `验收时间` date DEFAULT NULL,
  `验收通知` varchar(255) DEFAULT NULL,
  `会议照片` varchar(255) DEFAULT NULL,
  `签到记录表` varchar(255) DEFAULT NULL,
  `验收报告` varchar(255) DEFAULT NULL,
  `验收通知说明` varchar(255) DEFAULT NULL,
  `会议照片说明` varchar(255) DEFAULT NULL,
  `签到记录表说明` varchar(255) DEFAULT NULL,
  `验收报告说明` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 分部验收
-- ----------------------------
INSERT INTO `分部验收` VALUES ('49', '1512980558870', '1506414368014', '江门市技师学院第二校区~3、4(教学楼)', '待审批', '装饰工程', '2017-12-11', '广州众磊建筑工程有限公司', '广东海外建设监理有限公司', '好路胡提好', '红红火火', '2017-12-12', '~*^*~151298339601.jpg', '~*^*~151298339602.jpg', '~*^*~151298339603.jpg', '~*^*~151298339604.jpg', '', '', '', '');

-- ----------------------------
-- Table structure for 实体检测
-- ----------------------------
DROP TABLE IF EXISTS `实体检测`;
CREATE TABLE `实体检测` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `时间戳` varchar(255) DEFAULT NULL,
  `工程名称` varchar(255) NOT NULL,
  `工程时间戳` varchar(255) DEFAULT NULL,
  `工程单状态` varchar(255) DEFAULT NULL,
  `检测类型` varchar(255) DEFAULT NULL,
  `检测部位` varchar(255) DEFAULT NULL,
  `数量` varchar(255) DEFAULT NULL,
  `检测人` varchar(255) DEFAULT NULL,
  `检测日期` date DEFAULT NULL,
  `备注` varchar(255) DEFAULT NULL,
  `检测单位` varchar(255) DEFAULT NULL,
  `委托编号` varchar(255) DEFAULT NULL,
  `检测前照片` varchar(255) DEFAULT '0' COMMENT '场景照片',
  `场景照片说明` varchar(255) DEFAULT NULL,
  `检测实施过程照片` varchar(255) DEFAULT '0',
  `检测实施过程照片说明` varchar(1000) DEFAULT NULL,
  `检测设备照片` varchar(255) DEFAULT '0',
  `检测设备照片说明` varchar(255) DEFAULT NULL,
  `送样日期` date DEFAULT NULL,
  `收样日期` date DEFAULT NULL,
  `送样单位` varchar(255) DEFAULT NULL,
  `见证单位` varchar(255) DEFAULT NULL,
  `收样单位` varchar(255) DEFAULT NULL,
  `见证人` varchar(255) DEFAULT NULL,
  `实测照片` varchar(255) DEFAULT '0',
  `实测照片说明` varchar(255) DEFAULT NULL,
  `不合格报告` varchar(255) DEFAULT NULL,
  `不合格报表` varchar(255) DEFAULT '0',
  `报告照片说明` varchar(255) DEFAULT NULL,
  `检测报告编号` varchar(255) DEFAULT NULL,
  `退场记录` varchar(255) DEFAULT NULL,
  `处理照片` varchar(255) DEFAULT '0',
  `处理照片说明` varchar(255) DEFAULT NULL,
  `处理类型` varchar(255) DEFAULT NULL,
  `监理操作单位` varchar(255) DEFAULT NULL,
  `检测操作单位` varchar(255) DEFAULT NULL,
  `拒收理由` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 实体检测
-- ----------------------------
INSERT INTO `实体检测` VALUES ('1', '1508421183363', '五邑大学策文商学院大楼工程', '1506568903657', '拒收', '房建工程—基桩抗压承载力检测', '', '', '管理员', '0000-00-00', '', '江门市建联检测股份有限公司', 'gg123', '~*^*~150842134701.jpg', '', '~*^*~150842134702.jpg', '', '~*^*~15084213470.jpg', '', null, null, null, null, null, null, '0', null, 'qwer', '~*^*~150842199101.jpg', '', 'dfd', null, '0', null, null, '广东海外建设监理有限公司', '江门市建联检测股份有限公司', 'q w er');
INSERT INTO `实体检测` VALUES ('2', '1508552481179', '五邑大学策文商学院大楼工程', '1506568903657', '提交结果', '房建工程—基桩抗压承载力检测', 'xxzz', '123', '管理员', '2017-10-21', '备注', '江门市建设工程检测中心有限公司', '123ac', '~*^*~150855265001.jpg', '', '~*^*~150855265002.jpg', '', '~*^*~15085526500.jpg', '', '2017-10-21', '2017-10-21', '广东新可宇建设工程有限公司', '广州穗科建设管理有限公司', '江门市建设工程检测中心有限公司', '管理员', '~*^*~150855274801.jpg', '', null, '0', null, null, null, '0', null, null, '广州穗科建设管理有限公司', '江门市建设工程检测中心有限公司', null);
INSERT INTO `实体检测` VALUES ('12', '1511491220554', '江门市技师学院第二校区~3、4(教学楼)', '1506414368014', '拒收', '房建工程—基桩抗压承载力检测', '', '', '管理员', '0000-00-00', '', '江门市建设工程检测中心有限公司', null, '~*^*~151149138201.jpg~*^*~151149138211.jpg', '', '~*^*~151149138202.jpg', '', '~*^*~15114913820.jpg', '', null, null, null, null, null, null, '0', null, null, '0', null, null, null, '0', null, null, '广东海外建设监理有限公司', '江门市建设工程检测中心有限公司', '');
INSERT INTO `实体检测` VALUES ('10', '1510463254079', '江门市技师学院第二校区~3、4(教学楼)', '1506414368014', '拒收', '房建工程—基桩抗压承载力检测', '', '', '管理员', '0000-00-00', '', '江门市建设工程检测中心有限公司', null, '~*^*~151046342301.jpg~*^*~151046342311.jpg~*^*~151046342321.jpg', '', '~*^*~151046342302.jpg~*^*~151046342312.jpg~*^*~151046342322.jpg', '', '~*^*~15104634230.jpg~*^*~15104634231.jpg', '', null, null, null, null, null, null, '0', null, null, '0', null, null, null, '0', null, null, '广东海外建设监理有限公司', '江门市建设工程检测中心有限公司', null);
INSERT INTO `实体检测` VALUES ('13', '1511678353545', '江门市技师学院第二校区~3、4(教学楼)', '1506414368014', '拒收', '房建工程—基桩抗压承载力检测', '', '', '管理员', '0000-00-00', '', '江门市建设工程检测中心有限公司', '考虑考虑', '~*^*~151167852901.jpg', '', '~*^*~151167852902.jpg', '', '~*^*~15116785290.jpg', '', null, null, null, null, null, null, '0', null, null, '0', null, null, null, '0', null, null, '广东海外建设监理有限公司', '江门市建设工程检测中心有限公司', '');

-- ----------------------------
-- Table structure for 实体自检
-- ----------------------------
DROP TABLE IF EXISTS `实体自检`;
CREATE TABLE `实体自检` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `时间戳` varchar(255) DEFAULT NULL,
  `工程时间戳` varchar(255) DEFAULT NULL,
  `工程名称` varchar(255) NOT NULL,
  `工程单状态` varchar(255) DEFAULT NULL,
  `自检自测类型` varchar(255) DEFAULT NULL,
  `检测部位` varchar(255) DEFAULT NULL,
  `数量` varchar(255) DEFAULT NULL,
  `检测人` varchar(255) DEFAULT NULL,
  `检测日期` varchar(255) DEFAULT NULL,
  `备注` varchar(255) DEFAULT NULL,
  `检测单位` varchar(255) DEFAULT NULL,
  `检测前照片` varchar(255) DEFAULT '0',
  `场景照片说明` varchar(255) DEFAULT NULL,
  `检测实施过程照片` varchar(255) DEFAULT '0',
  `检测实施过程照片说明` varchar(1000) DEFAULT NULL,
  `检测设备照片` varchar(255) DEFAULT '0',
  `检测设备照片说明` varchar(255) DEFAULT NULL,
  `自测照片` varchar(255) DEFAULT '0',
  `自测照片说明` varchar(255) DEFAULT NULL,
  `处理情况` varchar(255) DEFAULT NULL,
  `送样日期` varchar(255) DEFAULT NULL,
  `收样日期` varchar(255) DEFAULT NULL,
  `送样单位` varchar(255) DEFAULT NULL,
  `见证单位` varchar(255) DEFAULT NULL,
  `收样单位` varchar(255) DEFAULT NULL,
  `见证人` varchar(255) DEFAULT NULL,
  `退场记录` varchar(255) DEFAULT NULL,
  `处理照片` varchar(255) DEFAULT '0',
  `处理照片说明` varchar(255) DEFAULT NULL,
  `监理操作单位` varchar(255) DEFAULT NULL,
  `拒收理由` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 实体自检
-- ----------------------------
INSERT INTO `实体自检` VALUES ('1', '1510281070116', '1506414368014', '江门市技师学院第二校区~3、4(教学楼)', '拒收', '房建工程—基桩抗压承载力检测', 'aaaa', '', '管理员', '', '', null, '~*^*~151028124801.jpg', '', '~*^*~151028124802.jpg', '', '~*^*~15102812480.jpg', '', '0', null, null, null, null, null, null, null, null, null, '0', null, '广东海外建设监理有限公司', 'tyyyy');

-- ----------------------------
-- Table structure for 我的工程
-- ----------------------------
DROP TABLE IF EXISTS `我的工程`;
CREATE TABLE `我的工程` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `时间戳` varchar(255) NOT NULL,
  `工程名称` varchar(255) DEFAULT NULL,
  `地址` varchar(255) DEFAULT NULL,
  `施工单位` varchar(255) DEFAULT NULL,
  `监理单位` varchar(255) DEFAULT NULL,
  `检测单位` varchar(255) DEFAULT NULL,
  `监督机构` varchar(255) DEFAULT NULL,
  `所属公司` varchar(255) DEFAULT NULL,
  `栋数` varchar(255) DEFAULT NULL,
  `层数` varchar(255) DEFAULT NULL,
  `高度` varchar(255) DEFAULT NULL,
  `建筑面积` varchar(255) DEFAULT NULL,
  `基坑深度` varchar(255) DEFAULT NULL,
  `开工日期` varchar(255) DEFAULT NULL,
  `竣工日期` varchar(255) DEFAULT NULL,
  `是否竣工` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id`,`时间戳`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 我的工程
-- ----------------------------
INSERT INTO `我的工程` VALUES ('5', '1506414368014', '江门市技师学院第二校区~3、4(教学楼)', '江门市潮连坦边村嘉和路以东地段', '广州众磊建筑工程有限公司', '广东海外建设监理有限公司', '江门市建设工程检测中心有限公司', '江门市建设工程质量监督站', null, '1', '6', '21.9', '12575.7', '', '2017-07-08', '2018-02-27', '0');
INSERT INTO `我的工程` VALUES ('9', '1506504880993', '江门市迎宾西路建设工程', '江门市蓬江区迎宾西路', '中电建路桥集团有限公司', '广州市穗高工程监理有限公司,江门市建设监理顾问有限公司,江门市新会区冈州工程建设监理有限公司', '江门市建联检测股份有限公司,江门市建设工程检测中心有限公司', '江门市建设工程质量监督站', null, '', '', '', '', '', '2015-03-01', '2016-12-31', '0');
INSERT INTO `我的工程` VALUES ('10', '1506568903657', '五邑大学策文商学院大楼工程', '五邑大学校园内', '广东新可宇建设工程有限公司', '广州穗科建设管理有限公司', '江门市建设工程检测中心有限公司', '江门市建设工程质量监督站', null, '2', '', '', '', '', '2017-01-04', '', '0');
INSERT INTO `我的工程` VALUES ('11', '1506571823868', '白石大道东段（丰乐路—甘棠路）改造工程', '江门市蓬江区白石大道', '中电建路桥集团有限公司', '江门市建设监理顾问有限公司', '江门市建联检测股份有限公司,江门市建设工程检测中心有限公司', '江门市建设工程质量监督站', null, '', '', '', '1795m', '', '2017-07-01', '2019-07-01', '0');
INSERT INTO `我的工程` VALUES ('13', '1508149424951', '测试项目', '', '中电建路桥集团', '广东海外建设监理有限公司', '江门市建联检测股份有限公司', '江门市建设工程质量监督站', null, '', '', '', '', '', '', '', '0');
INSERT INTO `我的工程` VALUES ('14', '1508152806116', '新测试工程', '', '中电建路桥集团有限公司', '广东海外建设监理有限公司', '江门市建设工程检测中心有限公司', '江门市建设工程质量监督站', null, '', '', '', '', '', '', '', '0');
INSERT INTO `我的工程` VALUES ('15', '1509267245545', 'aaaaaaaaaaa', '', 'xxx测试工程88', '广州市穗高工程监理有限公司', '江门市建设工程检测中心有限公司', '江门市建设工程质量监督站', null, '', '', '', '', '', '', '', '0');

-- ----------------------------
-- Table structure for 户号汇总
-- ----------------------------
DROP TABLE IF EXISTS `户号汇总`;
CREATE TABLE `户号汇总` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `项目id` int(11) NOT NULL,
  `户号` varchar(255) DEFAULT NULL,
  `验收记录表` varchar(255) DEFAULT '0',
  `验收照片` varchar(255) DEFAULT '0',
  `验收汇总表` varchar(255) DEFAULT '0',
  `验收记录表说明` varchar(255) DEFAULT NULL,
  `验收照片说明` varchar(255) DEFAULT NULL,
  `验收汇总表说明` varchar(255) DEFAULT NULL,
  `上传状态` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 户号汇总
-- ----------------------------
INSERT INTO `户号汇总` VALUES ('54', '51', 'A101', '~*^*~151263823401.jpg~*^*~151263823411.jpg', '~*^*~151263823402.jpg', '~*^*~151263823403.jpg', '', '', '', '已上传');
INSERT INTO `户号汇总` VALUES ('55', '51', 'A102', '0', '0', '0', null, null, null, null);
INSERT INTO `户号汇总` VALUES ('56', '51', 'A201', '0', '0', '0', null, null, null, null);
INSERT INTO `户号汇总` VALUES ('57', '51', 'A202', '0', '0', '0', null, null, null, null);
INSERT INTO `户号汇总` VALUES ('58', '52', 'B101', '0', '0', '0', null, null, null, null);
INSERT INTO `户号汇总` VALUES ('59', '52', 'B102', '0', '0', '0', null, null, null, null);
INSERT INTO `户号汇总` VALUES ('60', '52', 'B103', '0', '0', '0', null, null, null, null);
INSERT INTO `户号汇总` VALUES ('61', '52', 'B201', '0', '0', '0', null, null, null, null);
INSERT INTO `户号汇总` VALUES ('62', '52', 'B202', '0', '0', '0', null, null, null, null);
INSERT INTO `户号汇总` VALUES ('63', '52', 'B203', '0', '0', '0', null, null, null, null);
INSERT INTO `户号汇总` VALUES ('64', '52', 'B301', '0', '0', '0', null, null, null, null);
INSERT INTO `户号汇总` VALUES ('65', '52', 'B302', '0', '0', '0', null, null, null, null);
INSERT INTO `户号汇总` VALUES ('66', '52', 'B303', '0', '0', '0', null, null, null, null);
INSERT INTO `户号汇总` VALUES ('67', '52', 'B401', '0', '0', '0', null, null, null, null);
INSERT INTO `户号汇总` VALUES ('68', '52', 'B402', '0', '0', '0', null, null, null, null);
INSERT INTO `户号汇总` VALUES ('69', '52', 'B403', '0', '0', '0', null, null, null, null);
INSERT INTO `户号汇总` VALUES ('70', '52', 'B501', '0', '0', '0', null, null, null, null);
INSERT INTO `户号汇总` VALUES ('71', '52', 'B502', '0', '0', '0', null, null, null, null);
INSERT INTO `户号汇总` VALUES ('72', '52', 'B503', '0', '0', '0', null, null, null, null);
INSERT INTO `户号汇总` VALUES ('73', '53', 'A101', '~*^*~151298365101.jpg~*^*~151298365111.jpg', '~*^*~151298365102.jpg', '~*^*~151298365103.jpg', '', '', '', '已上传');
INSERT INTO `户号汇总` VALUES ('74', '53', 'A102', '0', '0', '0', null, null, null, null);
INSERT INTO `户号汇总` VALUES ('75', '53', 'A103', '0', '0', '0', null, null, null, null);
INSERT INTO `户号汇总` VALUES ('76', '53', 'A201', '0', '0', '0', null, null, null, null);
INSERT INTO `户号汇总` VALUES ('77', '53', 'A202', '0', '0', '0', null, null, null, null);
INSERT INTO `户号汇总` VALUES ('78', '53', 'A203', '0', '0', '0', null, null, null, null);
INSERT INTO `户号汇总` VALUES ('79', '53', 'A301', '0', '0', '0', null, null, null, null);
INSERT INTO `户号汇总` VALUES ('80', '53', 'A302', '0', '0', '0', null, null, null, null);
INSERT INTO `户号汇总` VALUES ('81', '53', 'A303', '0', '0', '0', null, null, null, null);

-- ----------------------------
-- Table structure for 材料自检
-- ----------------------------
DROP TABLE IF EXISTS `材料自检`;
CREATE TABLE `材料自检` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `时间戳` varchar(255) DEFAULT NULL,
  `工程时间戳` varchar(255) DEFAULT NULL,
  `工程名称` varchar(255) NOT NULL,
  `工程单状态` varchar(255) DEFAULT NULL,
  `自检自测类型` varchar(255) DEFAULT NULL,
  `数量` varchar(255) DEFAULT NULL,
  `检测人` varchar(255) DEFAULT NULL,
  `检测日期` varchar(255) DEFAULT NULL,
  `检测部位` varchar(255) DEFAULT NULL,
  `备注` varchar(255) DEFAULT NULL,
  `检测前照片` varchar(255) DEFAULT '0',
  `场景照片说明` varchar(255) DEFAULT NULL,
  `检测实施过程照片` varchar(1000) DEFAULT '0',
  `检测实施过程照片说明` varchar(255) DEFAULT NULL,
  `检测设备照片` varchar(255) DEFAULT '0',
  `检测设备照片说明` varchar(255) DEFAULT NULL,
  `自测照片` varchar(255) DEFAULT '0',
  `自测照片说明` varchar(255) DEFAULT NULL,
  `送样单位` varchar(255) DEFAULT NULL,
  `送样日期` varchar(255) DEFAULT NULL,
  `收样日期` varchar(255) DEFAULT NULL,
  `见证单位` varchar(255) DEFAULT NULL,
  `收样单位` varchar(255) DEFAULT NULL,
  `见证人` varchar(255) DEFAULT NULL,
  `处理情况` varchar(255) DEFAULT NULL,
  `处理照片` varchar(255) DEFAULT '0',
  `处理照片说明` varchar(255) DEFAULT NULL,
  `退场记录` varchar(255) DEFAULT NULL,
  `监理操作单位` varchar(255) DEFAULT NULL,
  `拒收理由` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 材料自检
-- ----------------------------
INSERT INTO `材料自检` VALUES ('5', '1509010665888', '1508149424951', '测试项目', '不合格', '电线电缆进场检验', '', '管理员', '', '', '', '~*^*~150901085901.jpg', '', '~*^*~150901085902.jpg', '', '~*^*~15090108590.jpg', '', '0', null, null, null, null, null, null, null, null, '0', null, null, '广东海外建设监理有限公司', null);
INSERT INTO `材料自检` VALUES ('6', '1510281587393', '1506414368014', '江门市技师学院第二校区~3、4(教学楼)', '拒收', '接线盒', '', '管理员', '', '', '', '~*^*~151028177801.jpg', '', '~*^*~151028177802.jpg', '', '~*^*~15102817780.jpg', '', '0', null, null, null, null, null, null, null, null, '0', null, null, '广东海外建设监理有限公司', '在线');

-- ----------------------------
-- Table structure for 材料自检初检表
-- ----------------------------
DROP TABLE IF EXISTS `材料自检初检表`;
CREATE TABLE `材料自检初检表` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `时间戳` varchar(255) DEFAULT NULL,
  `工程时间戳` varchar(255) DEFAULT NULL,
  `工程名称` varchar(255) NOT NULL,
  `工程单状态` varchar(255) DEFAULT NULL,
  `自检自测类型` varchar(255) DEFAULT NULL,
  `数量` varchar(255) DEFAULT NULL,
  `检测人` varchar(255) DEFAULT NULL,
  `检测日期` varchar(255) DEFAULT NULL,
  `检测部位` varchar(255) DEFAULT NULL,
  `备注` varchar(255) DEFAULT NULL,
  `检测前照片` varchar(255) DEFAULT '0',
  `场景照片说明` varchar(255) DEFAULT NULL,
  `检测实施过程照片` varchar(1000) DEFAULT '0',
  `检测实施过程照片说明` varchar(255) DEFAULT NULL,
  `检测设备照片` varchar(255) DEFAULT '0',
  `检测设备照片说明` varchar(255) DEFAULT NULL,
  `自测照片` varchar(255) DEFAULT '0',
  `自测照片说明` varchar(255) DEFAULT NULL,
  `送样单位` varchar(255) DEFAULT NULL,
  `送样日期` varchar(255) DEFAULT NULL,
  `收样日期` varchar(255) DEFAULT NULL,
  `见证单位` varchar(255) DEFAULT NULL,
  `收样单位` varchar(255) DEFAULT NULL,
  `见证人` varchar(255) DEFAULT NULL,
  `处理情况` varchar(255) DEFAULT NULL,
  `处理照片` varchar(255) DEFAULT '0',
  `处理照片说明` varchar(255) DEFAULT NULL,
  `退场记录` varchar(255) DEFAULT NULL,
  `监理操作单位` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 材料自检初检表
-- ----------------------------
INSERT INTO `材料自检初检表` VALUES ('4', '1509010092730', '1508149424951', '测试项目', '不合格', '开关', '', '管理员', '', '', '', '~*^*~150901024701.jpg', '', '~*^*~150901024702.jpg', '', '~*^*~15090102470.jpg', '', '0', null, null, null, null, null, null, null, null, '0', null, null, '广东海外建设监理有限公司');

-- ----------------------------
-- Table structure for 材料送检
-- ----------------------------
DROP TABLE IF EXISTS `材料送检`;
CREATE TABLE `材料送检` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `时间戳` varchar(255) NOT NULL,
  `工程时间戳` varchar(255) DEFAULT NULL,
  `工程名称` varchar(255) NOT NULL,
  `工程单状态` varchar(255) DEFAULT NULL,
  `取样类型` varchar(255) DEFAULT NULL,
  `规格` varchar(255) DEFAULT NULL,
  `数量` varchar(255) DEFAULT NULL,
  `生产厂家` varchar(255) DEFAULT NULL,
  `取样人` varchar(255) DEFAULT NULL,
  `进场日期` date DEFAULT NULL,
  `取样日期` date DEFAULT NULL,
  `合格证编号` varchar(255) DEFAULT NULL,
  `使用部位` varchar(255) DEFAULT NULL,
  `经销商单位` varchar(255) DEFAULT NULL,
  `备注` varchar(255) DEFAULT NULL,
  `检测单位` varchar(255) DEFAULT NULL,
  `场景照片` varchar(255) DEFAULT '0',
  `场景照片说明` varchar(255) DEFAULT NULL,
  `样品照片` varchar(255) DEFAULT '0',
  `样品照片说明` varchar(255) DEFAULT NULL,
  `检测报告编号` varchar(255) DEFAULT NULL,
  `样品编号` varchar(255) DEFAULT NULL,
  `送样日期` date DEFAULT NULL,
  `收样日期` date DEFAULT NULL,
  `送样单位` varchar(255) DEFAULT NULL,
  `见证单位` varchar(255) DEFAULT NULL,
  `收样单位` varchar(255) DEFAULT NULL,
  `送样人` varchar(255) DEFAULT NULL,
  `见证人` varchar(255) DEFAULT NULL,
  `收样照片` varchar(255) DEFAULT '0',
  `收样照片说明` varchar(255) DEFAULT NULL,
  `检测照片` varchar(255) DEFAULT '0' COMMENT '报告照片（结论页）',
  `检测报告照片说明` varchar(255) DEFAULT NULL,
  `处理照片` varchar(255) DEFAULT '0',
  `处理照片说明` varchar(255) DEFAULT NULL,
  `退厂记录` varchar(255) DEFAULT NULL,
  `复检编号` varchar(255) DEFAULT NULL,
  `监理操作单位` varchar(255) DEFAULT NULL,
  `检测操作单位` varchar(255) DEFAULT NULL,
  `拒收理由` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 材料送检
-- ----------------------------
INSERT INTO `材料送检` VALUES ('25', '1510626603124', '1506414368014', '江门市技师学院第二校区~3、4(教学楼)', '收样', '房建工程—水泥', '', '', '', '管理员', '0000-00-00', '2017-11-14', '', '', '', '', '江门市建设工程检测中心有限公司', '~*^*~151062674901.jpg', '', '~*^*~15106267490.jpg', '', null, null, null, null, null, null, null, null, null, '0', null, '0', null, '0', null, null, null, '广东海外建设监理有限公司', null, '啊啊啊了了');
INSERT INTO `材料送检` VALUES ('23', '1510216802816', '1506414368014', '江门市技师学院第二校区~3、4(教学楼)', '不合格', '房建工程—砼抗渗试件', 'xxx', 'xxx', 'xxx', '管理员', '0000-00-00', '2017-11-09', '', '', '', '', '江门市建设工程检测中心有限公司', '~*^*~151021694601.jpg', '', '~*^*~15102169460.jpg', '', null, null, null, null, null, null, null, null, null, '0', null, '0', null, '0', null, null, null, '广东海外建设监理有限公司', null, 'uuuh');
INSERT INTO `材料送检` VALUES ('26', '1510626816162', '1506414368014', '江门市技师学院第二校区~3、4(教学楼)', '拒收', '房建工程—钢绞线', '', '', '', '管理员', '0000-00-00', '2017-11-14', '', '', '', '', '江门市建设工程检测中心有限公司', '~*^*~151062704401.jpg~*^*~151062704411.jpg~*^*~151062704421.jpg~*^*~151062704431.jpg~*^*~151062704441.jpg', '', '~*^*~15106270440.jpg~*^*~15106270441.jpg', '', null, null, null, null, null, null, null, null, null, '0', null, '0', null, '0', null, null, null, '广东海外建设监理有限公司', null, 'iiii');
INSERT INTO `材料送检` VALUES ('3', '1506734289267', '1506568903657', '五邑大学策文商学院大楼工程', '拒收', '房建工程—砼标准养护试件', 'C4O,C4OC4OC4O', '50立方', '江门市政混凝土有限公司', '李丽琴', '2017-09-05', '2017-09-30', '', '后浇带', '江门市政混凝土有限公司', '', '江门市建设工程检测中心有限公司', '~*^*~150673585901.jpg~*^*~150673585911.jpg', '', '~*^*~15067358590.jpg', '', '000000', 'JS-kA17110285、0286', '2017-09-30', '2017-09-30', '广东新可宇建设工程有限公司', '广州穗科建设管理有限公司', '江门市建设工程检测中心有限公司', '李丽琴', '周顺安', '~*^*~150673708901.jpg', '', '~*^*~150866298601.jpg', '', '0', null, null, '5656', '广州穗科建设管理有限公司', '江门市建设工程检测中心有限公司', '是否');
INSERT INTO `材料送检` VALUES ('14', '1509010092730', '1508149424951', '测试项目', '不合格', '开关', null, '', null, '管理员', null, '0000-00-00', null, '', null, '', null, '0', null, '0', null, '叫姐姐', null, null, null, null, null, null, null, null, '0', null, '~*^*~151298439201.jpg', '', '0', null, null, null, null, null, null);
INSERT INTO `材料送检` VALUES ('15', '1510211114795', '1506414368014', '江门市技师学院第二校区~3、4(教学楼)', '拒收', '房建工程—水泥', '', '', '', '管理员', '0000-00-00', '2017-11-09', '', '', '', '', '江门市建设工程检测中心有限公司', '~*^*~151021127301.jpg', '', '~*^*~15102112730.jpg', '', null, null, null, null, null, null, null, null, null, '0', null, '0', null, '0', null, null, null, '广东海外建设监理有限公司', null, '');
INSERT INTO `材料送检` VALUES ('11', '1507524403385', '1506568903657', '五邑大学策文商学院大楼工程', '收样复检', '房建工程—水泥', '', '', '', '管理员', '0000-00-00', '2017-10-09', '', '', '', '', '江门市建设工程检测中心有限公司', '~*^*~150752452101.jpg', '', '~*^*~15075245210.jpg', '', '1472369', null, null, null, null, null, null, null, null, '0', null, '~*^*~150866380701.jpg', '', '0', null, null, '7777777', '广东海外建设监理有限公司', null, null);
INSERT INTO `材料送检` VALUES ('12', '1508029445268', '1508029166032', '测试项目', '已处理', '道路工程—道路稳定土无侧限抗压强度', '123456噢噢噢', '123456咯亏', '给你做哈哈', '管理员和经济', '2017-10-15', '2017-10-15', 'ffj经济界', '默默谁真惬意呀', '咯嘛秋衣秋裤', '搜秀噢', '', '~*^*~150803118001.jpg', '啊啊啊', '~*^*~15080311800.jpg', '呃呃呃额额', '123', '12358', '2017-10-15', '2017-10-15', '凯哥', '和你一样', '好哦是我是', '管理员和经济', '管理员', '~*^*~150803136701.jpg', '123555', '~*^*~150803142101.jpg', 'hi4G', '~*^*~150803148901.jpg', '就咯啦咯啦咯了', '1哈哈', '聚聚', '', '', null);
INSERT INTO `材料送检` VALUES ('13', '1508221134584', '1506504880993', '江门市迎宾西路建设工程', '未见证', '房建工程—水泥', '', '', '', '管理员', '0000-00-00', '2017-10-17', '', '', '', '', '江门市建联检测股份有限公司', '~*^*~150822125901.jpg', '', '~*^*~15082212590.jpg', '', null, null, null, null, null, null, null, null, null, '0', null, '0', null, '0', null, null, null, '广州市穗高工程监理有限公司', null, null);

-- ----------------------------
-- Table structure for 材料送检初检表
-- ----------------------------
DROP TABLE IF EXISTS `材料送检初检表`;
CREATE TABLE `材料送检初检表` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `时间戳` varchar(255) NOT NULL,
  `工程时间戳` varchar(255) DEFAULT NULL,
  `工程名称` varchar(255) NOT NULL,
  `工程单状态` varchar(255) DEFAULT NULL,
  `取样类型` varchar(255) DEFAULT NULL,
  `规格` varchar(255) DEFAULT NULL,
  `数量` varchar(255) DEFAULT NULL,
  `生产厂家` varchar(255) DEFAULT NULL,
  `取样人` varchar(255) DEFAULT NULL,
  `进场日期` date DEFAULT NULL,
  `取样日期` date DEFAULT NULL,
  `合格证编号` varchar(255) DEFAULT NULL,
  `使用部位` varchar(255) DEFAULT NULL,
  `经销商单位` varchar(255) DEFAULT NULL,
  `备注` varchar(255) DEFAULT NULL,
  `检测单位` varchar(255) DEFAULT NULL,
  `场景照片` varchar(255) DEFAULT '0',
  `场景照片说明` varchar(255) DEFAULT NULL,
  `样品照片` varchar(255) DEFAULT '0',
  `样品照片说明` varchar(255) DEFAULT NULL,
  `检测报告编号` varchar(255) DEFAULT NULL,
  `样品编号` varchar(255) DEFAULT NULL,
  `送样日期` date DEFAULT NULL,
  `收样日期` date DEFAULT NULL,
  `送样单位` varchar(255) DEFAULT NULL,
  `见证单位` varchar(255) DEFAULT NULL,
  `收样单位` varchar(255) DEFAULT NULL,
  `送样人` varchar(255) DEFAULT NULL,
  `见证人` varchar(255) DEFAULT NULL,
  `收样照片` varchar(255) DEFAULT '0',
  `收样照片说明` varchar(255) DEFAULT NULL,
  `检测照片` varchar(255) DEFAULT '0' COMMENT '报告照片（结论页）',
  `检测报告照片说明` varchar(255) DEFAULT NULL,
  `处理照片` varchar(255) DEFAULT '0',
  `处理照片说明` varchar(255) DEFAULT NULL,
  `退厂记录` varchar(255) DEFAULT NULL,
  `复检编号` varchar(255) DEFAULT NULL,
  `监理操作单位` varchar(255) DEFAULT NULL,
  `检测操作单位` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 材料送检初检表
-- ----------------------------
INSERT INTO `材料送检初检表` VALUES ('12', '1508029445268', '1508029166032', '测试项目', '不合格', '房建工程—水泥', '123456', '123456', '给你做', '管理员', '2017-10-15', '2017-10-15', 'ffj', '谁真惬意呀', '秋衣秋裤', '搜秀', '', '~*^*~150802962401.jpg', '苏芮哦', '~*^*~15080296240.jpg', '得得', '123', '12345', '2017-10-15', '2017-10-15', '凯哥', '和你一样', '好哦是我是', '管理员', '管理员', '~*^*~150802975801.jpg', '洗衣液', '~*^*~150803037801.jpg', '144', '0', null, null, null, '', '');

-- ----------------------------
-- Table structure for 用户信息
-- ----------------------------
DROP TABLE IF EXISTS `用户信息`;
CREATE TABLE `用户信息` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `账号` varchar(50) NOT NULL,
  `密码` varchar(50) NOT NULL,
  `邮箱` varchar(50) DEFAULT NULL,
  `手机` varchar(20) NOT NULL,
  `姓名` varchar(20) NOT NULL,
  `单位` varchar(50) NOT NULL,
  `单位名称` varchar(50) NOT NULL,
  `cid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 用户信息
-- ----------------------------
INSERT INTO `用户信息` VALUES ('1', 'admin', '123456', '360531371@qq.com', '13048126246', '管理员', '管理员', '管理员', null);
INSERT INTO `用户信息` VALUES ('62', '15088139572', 'k123456789', '543899117@qq.com', '15088139572', '尹盛华', '施工单位', '广州众磊建筑工程有限公司', null);
INSERT INTO `用户信息` VALUES ('61', 'gtf198368', '111111', 'gtf198368@163.com', '13828037175', '关天发', '监督机构', '江门市建设工程质量监督站', null);
INSERT INTO `用户信息` VALUES ('60', 'ligongming', '403632', '254781232@qq.com', '13822403632', '李公明', '监督机构', '江门市建设工程质量监督站', null);
INSERT INTO `用户信息` VALUES ('63', '18718538041', '18718538041', '1759670958@qq.com', '18718538041', '林英活', '监理单位', '广东海外建设监理有限公司', null);
INSERT INTO `用户信息` VALUES ('64', 'jdzwts', '3503326', '32076970@qq.com', '18933183378', '吴统生', '监督机构', '江门市建设工程质量监督站', null);
INSERT INTO `用户信息` VALUES ('65', 'mayuanda', '733455', '408034348@qq.com', '15815733455', '马远大', '监督机构', '江门市建设工程质量监督站', null);
INSERT INTO `用户信息` VALUES ('66', 'chenyaling', '123456', '13686989188@139.com', '13686989188', '陈雅玲', '监督机构', '江门市建设工程质量监督站', null);
INSERT INTO `用户信息` VALUES ('67', '123456789', '123456', '624289306@.qq.com', '13422550741', '李丽琴', '施工单位', '广东新可宇建设工程有限公司', null);
INSERT INTO `用户信息` VALUES ('68', '1234567890', '123456', '458137642@.qq.com', '13360228909', '周顺安', '监理单位', '广州穗科建设管理有限公司', null);
INSERT INTO `用户信息` VALUES ('69', 'glash', 'glash6686', '245044869@qq.com', '15219016686', '陈龙兴', '监理单位', '江门市新会区冈州工程建设监理有限公司', null);
INSERT INTO `用户信息` VALUES ('70', 'bashidadao', 'bashidadao', '41918145@qq.com', '13427407792', '陈德隆', '监理单位', '江门市建设监理顾问有限公司', null);
INSERT INTO `用户信息` VALUES ('71', 'joshpan', 'josh789', '2274431335@qq.com', '18825991296', '潘洪涛', '检测单位', '江门市建设工程检测中心有限公司', null);
INSERT INTO `用户信息` VALUES ('72', '3503339', '3503339', '3076046190@qq', '13500283551', '陈立明', '检测单位', '江门市建设工程检测中心有限公司', null);
INSERT INTO `用户信息` VALUES ('73', 'hspkjj', '8730787', '361713615@qq.com', '13631893884', '任福余', '监理单位', '江门市建设监理顾问有限公司', null);
INSERT INTO `用户信息` VALUES ('74', 'csh1222', '5657303', '2532496304@qq.com', '18629018774', '李月媛', '施工单位', '中电建路桥集团有限公司', null);
INSERT INTO `用户信息` VALUES ('75', 'lyy5657303', '12345678', '530056032@qq.com', '18629018464', '梁丹', '施工单位', '中电建路桥集团有限公司', null);
INSERT INTO `用户信息` VALUES ('76', 'David', '870108', 'davidsleepy@vip.qq.com', '15875030025', '郭建维', '检测单位', '江门市建联检测股份有限公司', null);
INSERT INTO `用户信息` VALUES ('77', 'jmsgjl', '987654321', '332542129@qq.com', '15918558475', '郭维喜', '监理单位', '广州市穗高工程监理有限公司', null);
INSERT INTO `用户信息` VALUES ('78', '1103105710', 'zlb19920130', '1103105710@qq.com', '13422601335', '周乐宾', '施工单位', '江门市迎宾西路建设工程', null);
INSERT INTO `用户信息` VALUES ('79', '1397198216', 'helei321', '1397198216@qq.com', '15639728310', '何超', '施工单位', '中电建路桥集团有限公司', null);
INSERT INTO `用户信息` VALUES ('80', 'gwjllzh', 'jmgwjl', '1071190101@qq.com', '13676182693', '陆振华', '监理单位', '江门市建设监理顾问有限公司', null);
INSERT INTO `用户信息` VALUES ('81', '15639002294', 'guojianpo', '1026056106@qq.com', '15639002294', '郭建坡', '施工单位', '中电建路桥集团', null);
INSERT INTO `用户信息` VALUES ('82', 'PLC196870', '196870', '1203682563@qq.com', '13612254072', '潘丽嫦', '检测单位', '江门市建设工程检测中心有限公司', null);
INSERT INTO `用户信息` VALUES ('83', 'jeff199678', '12345678', '12345678@qq.com', '1234667788', 'jeff', '施工单位', 'xxx测试工程88', null);

-- ----------------------------
-- Table structure for 用户工程关系表
-- ----------------------------
DROP TABLE IF EXISTS `用户工程关系表`;
CREATE TABLE `用户工程关系表` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `用户id` int(11) NOT NULL,
  `工程id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 用户工程关系表
-- ----------------------------
INSERT INTO `用户工程关系表` VALUES ('59', '61', '13');
INSERT INTO `用户工程关系表` VALUES ('20', '60', '5');
INSERT INTO `用户工程关系表` VALUES ('19', '71', '5');
INSERT INTO `用户工程关系表` VALUES ('18', '63', '5');
INSERT INTO `用户工程关系表` VALUES ('17', '62', '5');
INSERT INTO `用户工程关系表` VALUES ('22', '66', '5');
INSERT INTO `用户工程关系表` VALUES ('29', '69', '9');
INSERT INTO `用户工程关系表` VALUES ('30', '76', '9');
INSERT INTO `用户工程关系表` VALUES ('31', '71', '9');
INSERT INTO `用户工程关系表` VALUES ('66', '61', '9');
INSERT INTO `用户工程关系表` VALUES ('33', '66', '9');
INSERT INTO `用户工程关系表` VALUES ('34', '77', '9');
INSERT INTO `用户工程关系表` VALUES ('35', '60', '9');
INSERT INTO `用户工程关系表` VALUES ('43', '65', '10');
INSERT INTO `用户工程关系表` VALUES ('42', '71', '10');
INSERT INTO `用户工程关系表` VALUES ('41', '68', '10');
INSERT INTO `用户工程关系表` VALUES ('40', '67', '10');
INSERT INTO `用户工程关系表` VALUES ('44', '74', '11');
INSERT INTO `用户工程关系表` VALUES ('45', '73', '11');
INSERT INTO `用户工程关系表` VALUES ('46', '70', '11');
INSERT INTO `用户工程关系表` VALUES ('47', '76', '11');
INSERT INTO `用户工程关系表` VALUES ('48', '72', '11');
INSERT INTO `用户工程关系表` VALUES ('49', '71', '11');
INSERT INTO `用户工程关系表` VALUES ('50', '64', '11');
INSERT INTO `用户工程关系表` VALUES ('51', '75', '11');
INSERT INTO `用户工程关系表` VALUES ('52', '75', '13');
INSERT INTO `用户工程关系表` VALUES ('53', '63', '13');
INSERT INTO `用户工程关系表` VALUES ('54', '76', '13');
INSERT INTO `用户工程关系表` VALUES ('55', '65', '13');
INSERT INTO `用户工程关系表` VALUES ('56', '66', '13');
INSERT INTO `用户工程关系表` VALUES ('57', '81', '13');
INSERT INTO `用户工程关系表` VALUES ('58', '64', '13');
INSERT INTO `用户工程关系表` VALUES ('60', '65', '13');
INSERT INTO `用户工程关系表` VALUES ('61', '61', '5');
INSERT INTO `用户工程关系表` VALUES ('62', '75', '14');
INSERT INTO `用户工程关系表` VALUES ('63', '63', '14');
INSERT INTO `用户工程关系表` VALUES ('64', '72', '14');
INSERT INTO `用户工程关系表` VALUES ('65', '66', '14');
INSERT INTO `用户工程关系表` VALUES ('67', '1', '14');
INSERT INTO `用户工程关系表` VALUES ('68', '1', '10');
INSERT INTO `用户工程关系表` VALUES ('69', '1', '5');

-- ----------------------------
-- Table structure for 短信记录
-- ----------------------------
DROP TABLE IF EXISTS `短信记录`;
CREATE TABLE `短信记录` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `工程名称` varchar(255) NOT NULL,
  `子模块` varchar(255) NOT NULL,
  `验证码` int(10) DEFAULT NULL,
  `姓名` varchar(255) DEFAULT NULL,
  `手机号` varchar(255) DEFAULT NULL,
  `时间` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 短信记录
-- ----------------------------
INSERT INTO `短信记录` VALUES ('23', '江门市技师学院第二校区~3、4(教学楼)', '实体检测', '207144', '管理员', '13048126246', 'Fri Nov 10 2017 10:25:56 GMT+0800 (CST)');
INSERT INTO `短信记录` VALUES ('25', '江门市技师学院第二校区~3、4(教学楼)', '实体自检', '159848', '管理员', '13048126246', 'Fri Nov 10 2017 10:34:58 GMT+0800 (CST)');
INSERT INTO `短信记录` VALUES ('26', '江门市技师学院第二校区~3、4(教学楼)', '材料自检', '507812', '管理员', '13048126246', 'Fri Nov 10 2017 10:42:29 GMT+0800 (CST)');
INSERT INTO `短信记录` VALUES ('27', '任务通知', '任务通知', '145401', '管理员', '13048126246', 'Fri Nov 10 2017 10:56:21 GMT+0800 (CST)');

-- ----------------------------
-- Table structure for 项目类型选择
-- ----------------------------
DROP TABLE IF EXISTS `项目类型选择`;
CREATE TABLE `项目类型选择` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `项目模块` varchar(255) DEFAULT NULL,
  `大类` varchar(255) DEFAULT NULL,
  `类型` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=158 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 项目类型选择
-- ----------------------------
INSERT INTO `项目类型选择` VALUES ('8', '材料送检', '房建工程', '水泥');
INSERT INTO `项目类型选择` VALUES ('9', '材料送检', '房建工程', '粉煤灰');
INSERT INTO `项目类型选择` VALUES ('10', '材料送检', '房建工程', '建筑用砂');
INSERT INTO `项目类型选择` VALUES ('11', '材料送检', '房建工程', '钢筋（钢材）原材');
INSERT INTO `项目类型选择` VALUES ('12', '材料送检', '房建工程', '钢筋焊接工艺检验');
INSERT INTO `项目类型选择` VALUES ('19', '材料送检', '房建工程', '砼同条件养护试件');
INSERT INTO `项目类型选择` VALUES ('20', '材料送检', '房建工程', '砼抗渗试件');
INSERT INTO `项目类型选择` VALUES ('14', '材料送检', '房建工程', '钢筋机械连接接头');
INSERT INTO `项目类型选择` VALUES ('15', '材料送检', '房建工程', '钢绞线');
INSERT INTO `项目类型选择` VALUES ('16', '材料送检', '房建工程', '预应力筋用锚具');
INSERT INTO `项目类型选择` VALUES ('17', '材料送检', '房建工程', '夹具和连接器');
INSERT INTO `项目类型选择` VALUES ('18', '材料送检', '房建工程', '砼标准养护试件');
INSERT INTO `项目类型选择` VALUES ('21', '材料送检', '房建工程', '砼抗折试件');
INSERT INTO `项目类型选择` VALUES ('22', '材料送检', '房建工程', '混凝土拌合物氯离子含量');
INSERT INTO `项目类型选择` VALUES ('23', '材料送检', '房建工程', '砌筑砂浆抗压试件');
INSERT INTO `项目类型选择` VALUES ('26', '材料送检', '房建工程', '砖及砌块');
INSERT INTO `项目类型选择` VALUES ('27', '材料送检', '房建工程', '建筑铝合金型材');
INSERT INTO `项目类型选择` VALUES ('28', '材料送检', '房建工程', '防水卷材');
INSERT INTO `项目类型选择` VALUES ('29', '材料送检', '房建工程', '防水涂料');
INSERT INTO `项目类型选择` VALUES ('30', '材料送检', '房建工程', '钢结构用高强螺栓');
INSERT INTO `项目类型选择` VALUES ('31', '材料送检', '房建工程', '高强度螺栓连接磨擦面抗滑移系数检验');
INSERT INTO `项目类型选择` VALUES ('32', '材料送检', '房建工程', '焊接球');
INSERT INTO `项目类型选择` VALUES ('33', '材料送检', '房建工程', '螺栓球节点承载力试验');
INSERT INTO `项目类型选择` VALUES ('34', '材料送检', '房建工程', '机械连接用紧固标准件拉力检验');
INSERT INTO `项目类型选择` VALUES ('35', '材料送检', '房建工程', '给排水管材检验');
INSERT INTO `项目类型选择` VALUES ('36', '材料送检', '房建工程', '给排水管件检验');
INSERT INTO `项目类型选择` VALUES ('37', '材料送检', '房建工程', '幕墙性能检验');
INSERT INTO `项目类型选择` VALUES ('38', '材料送检', '房建工程', '建筑外窗三性检验');
INSERT INTO `项目类型选择` VALUES ('39', '材料送检', '房建工程', '天然饰面石材弯曲强度试验');
INSERT INTO `项目类型选择` VALUES ('40', '材料送检', '房建工程', '硅酮结构密封胶的相容性和粘结性检测');
INSERT INTO `项目类型选择` VALUES ('41', '材料送检', '房建工程', '电线电缆');
INSERT INTO `项目类型选择` VALUES ('42', '材料送检', '房建工程', '外墙传热系数');
INSERT INTO `项目类型选择` VALUES ('43', '材料送检', '房建工程', '保温材料');
INSERT INTO `项目类型选择` VALUES ('44', '材料送检', '房建工程', '均质材料');
INSERT INTO `项目类型选择` VALUES ('45', '材料送检', '房建工程', '玻璃');
INSERT INTO `项目类型选择` VALUES ('46', '材料送检', '房建工程', '增强网');
INSERT INTO `项目类型选择` VALUES ('47', '材料送检', '房建工程', '耐碱玻璃纤维网布');
INSERT INTO `项目类型选择` VALUES ('48', '材料送检', '房建工程', '浅色饰面材料');
INSERT INTO `项目类型选择` VALUES ('49', '材料送检', '房建工程', '防雷装置');
INSERT INTO `项目类型选择` VALUES ('51', '材料送检', '市政工程', '道路稳定土无侧限抗压强度');
INSERT INTO `项目类型选择` VALUES ('52', '材料送检', '市政工程', '沥青');
INSERT INTO `项目类型选择` VALUES ('53', '材料送检', '市政工程', '沥青混凝土配合比');
INSERT INTO `项目类型选择` VALUES ('54', '材料送检', '市政工程', '马歇尔稳定度试验');
INSERT INTO `项目类型选择` VALUES ('55', '材料送检', '市政工程', '混合料成品检验');
INSERT INTO `项目类型选择` VALUES ('56', '材料送检', '市政工程', '土工格栅');
INSERT INTO `项目类型选择` VALUES ('57', '材料送检', '市政工程', '排水板');
INSERT INTO `项目类型选择` VALUES ('58', '材料送检', '市政工程', '土工布');
INSERT INTO `项目类型选择` VALUES ('59', '材料送检', '市政工程', '化学管材');
INSERT INTO `项目类型选择` VALUES ('60', '材料送检', '市政工程', '钢管');
INSERT INTO `项目类型选择` VALUES ('61', '材料送检', '市政工程', '钢筋混凝土（预应力）管');
INSERT INTO `项目类型选择` VALUES ('62', '材料送检', '市政工程', '检查井盖');
INSERT INTO `项目类型选择` VALUES ('63', '材料送检', '市政工程', '路缘石');
INSERT INTO `项目类型选择` VALUES ('64', '材料送检', '市政工程', '路面砖');
INSERT INTO `项目类型选择` VALUES ('65', '材料送检', '市政工程', '金属螺旋管');
INSERT INTO `项目类型选择` VALUES ('66', '材料送检', '市政工程', '预应力筋用锚具夹具和连接器静载试验');
INSERT INTO `项目类型选择` VALUES ('67', '材料送检', '市政工程', '压浆强度试件');
INSERT INTO `项目类型选择` VALUES ('68', '实体检测', '房建工程', '基桩抗压承载力检测');
INSERT INTO `项目类型选择` VALUES ('69', '实体检测', '房建工程', '基桩抗拔承载力检测');
INSERT INTO `项目类型选择` VALUES ('70', '实体检测', '房建工程', '高应变法');
INSERT INTO `项目类型选择` VALUES ('71', '实体检测', '房建工程', '低应变法');
INSERT INTO `项目类型选择` VALUES ('72', '实体检测', '房建工程', '声波透射法');
INSERT INTO `项目类型选择` VALUES ('73', '实体检测', '房建工程', '钻芯法');
INSERT INTO `项目类型选择` VALUES ('74', '实体检测', '房建工程', '平板荷载试验');
INSERT INTO `项目类型选择` VALUES ('75', '实体检测', '房建工程', '锚杆基本试验');
INSERT INTO `项目类型选择` VALUES ('76', '实体检测', '房建工程', '支护锚杆验收试验');
INSERT INTO `项目类型选择` VALUES ('77', '实体检测', '房建工程', '动力触探');
INSERT INTO `项目类型选择` VALUES ('78', '实体检测', '房建工程', '静力触探');
INSERT INTO `项目类型选择` VALUES ('79', '实体检测', '房建工程', '回填土的压实度');
INSERT INTO `项目类型选择` VALUES ('80', '实体检测', '房建工程', '混凝土结构植筋');
INSERT INTO `项目类型选择` VALUES ('81', '实体检测', '房建工程', '植螺杆');
INSERT INTO `项目类型选择` VALUES ('82', '实体检测', '房建工程', '锚栓抗拔力检测');
INSERT INTO `项目类型选择` VALUES ('83', '实体检测', '房建工程', '围护结构植螺杆');
INSERT INTO `项目类型选择` VALUES ('84', '实体检测', '房建工程', '锚栓');
INSERT INTO `项目类型选择` VALUES ('85', '实体检测', '房建工程', '膨胀螺栓抗拔力检测');
INSERT INTO `项目类型选择` VALUES ('86', '实体检测', '房建工程', '砌体拉结植筋检测');
INSERT INTO `项目类型选择` VALUES ('87', '实体检测', '房建工程', '室内空气质量检验');
INSERT INTO `项目类型选择` VALUES ('88', '实体检测', '房建工程', '外墙饰面砖粘结强度检测');
INSERT INTO `项目类型选择` VALUES ('89', '实体检测', '房建工程', '抹灰层的拉伸粘结强度(外墙)');
INSERT INTO `项目类型选择` VALUES ('90', '实体检测', '房建工程', '抹灰层的拉伸粘结强度 (顶棚)');
INSERT INTO `项目类型选择` VALUES ('91', '实体检测', '房建工程', '钢焊缝超声探伤');
INSERT INTO `项目类型选择` VALUES ('92', '实体检测', '房建工程', '钢焊缝射线探伤');
INSERT INTO `项目类型选择` VALUES ('93', '实体检测', '房建工程', '钢结构防腐');
INSERT INTO `项目类型选择` VALUES ('94', '实体检测', '房建工程', '防火涂层厚度检测');
INSERT INTO `项目类型选择` VALUES ('95', '实体检测', '房建工程', '混凝土结构回弹');
INSERT INTO `项目类型选择` VALUES ('96', '实体检测', '房建工程', '混凝土结构抽芯');
INSERT INTO `项目类型选择` VALUES ('97', '实体检测', '房建工程', '砌体砂浆贯入法检测');
INSERT INTO `项目类型选择` VALUES ('98', '实体检测', '房建工程', '混凝土钢筋保护层厚度检测');
INSERT INTO `项目类型选择` VALUES ('99', '实体检测', '房建工程', '楼板厚度检测');
INSERT INTO `项目类型选择` VALUES ('100', '实体检测', '房建工程', '墙体节能构造检测');
INSERT INTO `项目类型选择` VALUES ('101', '实体检测', '房建工程', '通风与空调系统节能性能检测');
INSERT INTO `项目类型选择` VALUES ('102', '实体检测', '房建工程', '配电与照明系统节能性能检测');
INSERT INTO `项目类型选择` VALUES ('103', '实体检测', '市政工程', '路基压实度检测');
INSERT INTO `项目类型选择` VALUES ('104', '实体检测', '市政工程', '路基弯沉检测');
INSERT INTO `项目类型选择` VALUES ('105', '实体检测', '市政工程', '基层的压实度检测');
INSERT INTO `项目类型选择` VALUES ('106', '实体检测', '市政工程', '基层的弯沉检测');
INSERT INTO `项目类型选择` VALUES ('107', '实体检测', '市政工程', '稳定层厚度');
INSERT INTO `项目类型选择` VALUES ('108', '实体检测', '市政工程', '成型质量检测');
INSERT INTO `项目类型选择` VALUES ('109', '实体检测', '市政工程', '沥青混合料面层压实度检测');
INSERT INTO `项目类型选择` VALUES ('110', '实体检测', '市政工程', '沥青混合料面层厚度检测');
INSERT INTO `项目类型选择` VALUES ('111', '实体检测', '市政工程', '沥青混合料面层弯沉检测');
INSERT INTO `项目类型选择` VALUES ('112', '实体检测', '市政工程', '沥青混合料面层抗滑构造深度检测');
INSERT INTO `项目类型选择` VALUES ('113', '实体检测', '市政工程', '沥青混合料面层平整度检测');
INSERT INTO `项目类型选择` VALUES ('114', '实体检测', '市政工程', '沥青混合料面层渗水系数检测');
INSERT INTO `项目类型选择` VALUES ('115', '实体检测', '市政工程', '水泥砼面层厚度检测');
INSERT INTO `项目类型选择` VALUES ('116', '实体检测', '市政工程', '水泥砼面层抗滑构造深度检测');
INSERT INTO `项目类型选择` VALUES ('117', '实体检测', '市政工程', '水泥砼面层平整度检测');
INSERT INTO `项目类型选择` VALUES ('118', '实体检测', '市政工程', '管道回填压实度检测');
INSERT INTO `项目类型选择` VALUES ('119', '实体检测', '市政工程', '排水管道的闭水试验');
INSERT INTO `项目类型选择` VALUES ('120', '实体检测', '市政工程', '给水厂和污水厂水池满水试验');
INSERT INTO `项目类型选择` VALUES ('121', '实体检测', '市政工程', '污泥消化池气密性试验');
INSERT INTO `项目类型选择` VALUES ('122', '实体检测', '市政工程', '预制梁的静载试验');
INSERT INTO `项目类型选择` VALUES ('133', '自检自测', null, '成套灯具');
INSERT INTO `项目类型选择` VALUES ('134', '自检自测', null, '开关');
INSERT INTO `项目类型选择` VALUES ('135', '自检自测', null, '插座');
INSERT INTO `项目类型选择` VALUES ('136', '自检自测', null, '接线盒');
INSERT INTO `项目类型选择` VALUES ('137', '自检自测', null, '电线电缆进场检验');
