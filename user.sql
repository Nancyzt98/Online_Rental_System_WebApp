/*
 Navicat Premium Data Transfer

 Source Server         : group
 Source Server Type    : MySQL
 Source Server Version : 50734
 Source Host           : 127.0.0.1:3306
 Source Schema         : 101_43_108_14

 Target Server Type    : MySQL
 Target Server Version : 50734
 File Encoding         : 65001

 Date: 17/02/2022 17:16:03
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  id int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phonenumber` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (id) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin', 'admin123', 'Admin', '6135849962', 'adminuser@gmail.com');
INSERT INTO `user` VALUES (2, 'luciferkai', '123456', 'luciferkai', '18014808580', 'luciferkaiyue@sina.com');
INSERT INTO `user` VALUES (3, 'nancy', 'nancy123', 'Nancy', '3435685577', 'nancy@gmail.com');

SET FOREIGN_KEY_CHECKS = 1;
