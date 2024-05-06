/*
Navicat MySQL Data Transfer

Source Server         : koneksi01
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : db_tp4dpbo

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2024-05-06 18:50:32
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `member`
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_name` varchar(255) NOT NULL,
  `member_email` varchar(255) NOT NULL,
  `member_phone` varchar(255) NOT NULL,
  `member_join` date NOT NULL,
  `member_endjoin` date NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of member
-- ----------------------------
INSERT INTO `member` VALUES ('1', 'Ratu Syahirah', 'ratu@gmail.com', '08123456789', '2023-05-04', '2024-05-04');
INSERT INTO `member` VALUES ('4', 'Ica Anisa', 'ica@gmail.com', '08987654346', '2024-05-05', '2024-05-31');
INSERT INTO `member` VALUES ('5', 'Jihan', 'jihan@gmail.com', '08432198765', '2024-04-05', '2024-05-31');
INSERT INTO `member` VALUES ('6', 'Rifanny', 'rifanny@gmail.com', '081244556677', '2024-05-05', '2024-07-26');

-- ----------------------------
-- Table structure for `produk`
-- ----------------------------
DROP TABLE IF EXISTS `produk`;
CREATE TABLE `produk` (
  `produk_id` int(11) NOT NULL AUTO_INCREMENT,
  `produk_name` varchar(255) NOT NULL,
  PRIMARY KEY (`produk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of produk
-- ----------------------------
INSERT INTO `produk` VALUES ('1', 'Eyebrow pomade');
INSERT INTO `produk` VALUES ('2', 'Cushion');
INSERT INTO `produk` VALUES ('3', 'Eyeshadow');
INSERT INTO `produk` VALUES ('4', 'Mascara');
INSERT INTO `produk` VALUES ('5', 'Blush On');
INSERT INTO `produk` VALUES ('6', 'Lipcream');
INSERT INTO `produk` VALUES ('10', 'Lipstick');

-- ----------------------------
-- Table structure for `transaksi`
-- ----------------------------
DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `transaksi_date` date NOT NULL,
  PRIMARY KEY (`transaksi_id`),
  KEY `member_fk` (`member_id`),
  KEY `produk_fk` (`produk_id`),
  CONSTRAINT `member_fk` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `produk_fk` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`produk_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of transaksi
-- ----------------------------
INSERT INTO `transaksi` VALUES ('1', '1', '3', '2024-04-16');
INSERT INTO `transaksi` VALUES ('8', '5', '4', '2024-05-05');
INSERT INTO `transaksi` VALUES ('9', '4', '1', '2024-05-09');
