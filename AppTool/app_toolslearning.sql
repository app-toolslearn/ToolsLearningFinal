/*
 Navicat Premium Data Transfer

 Source Server         : ToolsLearning
 Source Server Type    : MySQL
 Source Server Version : 100137
 Source Host           : localhost:3306
 Source Schema         : app_toolslearning

 Target Server Type    : MySQL
 Target Server Version : 100137
 File Encoding         : 65001

 Date: 27/01/2019 13:35:13
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `admin_password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`admin_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for course
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course`  (
  `corse_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ชื่อ course',
  `course_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'รายละเอียด course',
  PRIMARY KEY (`corse_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for do_test
-- ----------------------------
DROP TABLE IF EXISTS `do_test`;
CREATE TABLE `do_test`  (
  `dt_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `les_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `dt_start_at` datetime(0) NOT NULL,
  `dt_finish_at` datetime(0) NOT NULL,
  `dt_total_score` int(11) NOT NULL COMMENT 'คะแนนเต็มของคำถามทั้งหมดในข้อสอบชุดนี้',
  `dt_result_score` int(11) NOT NULL COMMENT 'คะแนนที่ user ทำได้',
  PRIMARY KEY (`dt_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for do_test_choice
-- ----------------------------
DROP TABLE IF EXISTS `do_test_choice`;
CREATE TABLE `do_test_choice`  (
  `dt_id` int(11) NOT NULL,
  `dt_c_id` int(11) NOT NULL,
  `dt_c_ans` int(11) NOT NULL,
  `dt_c_score` int(11) NOT NULL COMMENT 'ถ้าตอบผิด score = 0, ถ้าตอบถูกจะได้ตามคะแนนที่ตั้งไว้ใน test_choice',
  PRIMARY KEY (`dt_c_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for do_test_dialog
-- ----------------------------
DROP TABLE IF EXISTS `do_test_dialog`;
CREATE TABLE `do_test_dialog`  (
  `dt_id` int(11) NOT NULL,
  `dt_d_id` int(11) NOT NULL,
  `dt_d_ans` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `dt_d_score` int(11) NOT NULL COMMENT 'ถ้าตอบผิด score = 0, ถ้าตอบถูกจะได้ตามคะแนนที่ตั้งไว้ใน test_dialog ',
  PRIMARY KEY (`dt_d_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for enroll
-- ----------------------------
DROP TABLE IF EXISTS `enroll`;
CREATE TABLE `enroll`  (
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`, `course_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for lesson
-- ----------------------------
DROP TABLE IF EXISTS `lesson`;
CREATE TABLE `lesson`  (
  `les_id` int(11) NOT NULL AUTO_INCREMENT,
  `les_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ชื่อบทเรียน',
  `les_description` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'รายละเอียดบทเรียน',
  `course_id` int(11) NOT NULL DEFAULT 1,
  `les_no` int(11) NOT NULL COMMENT 'เลขของบทเรียน',
  PRIMARY KEY (`les_id`) USING BTREE,
  UNIQUE INDEX `course_id`(`course_id`) USING BTREE,
  UNIQUE INDEX `lesson_no`(`les_no`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for message
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message`  (
  `mes_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `mes_description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `mes_check` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `mes_at` datetime(0) NOT NULL,
  PRIMARY KEY (`mes_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for question
-- ----------------------------
DROP TABLE IF EXISTS `question`;
CREATE TABLE `question`  (
  `qs_id` int(11) NOT NULL AUTO_INCREMENT,
  `qs_title` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`qs_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for study_log
-- ----------------------------
DROP TABLE IF EXISTS `study_log`;
CREATE TABLE `study_log`  (
  `user_id` int(11) NOT NULL,
  `les_id` int(11) NOT NULL,
  `sl_finish_at` datetime(0) NOT NULL COMMENT 'เวลาที่ user อ่านเนื้อหาในบทเรียนเสร็จแล้ว',
  PRIMARY KEY (`user_id`, `les_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for test
-- ----------------------------
DROP TABLE IF EXISTS `test`;
CREATE TABLE `test`  (
  `test_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `les_id` int(11) NOT NULL,
  `test_type` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'l = lesson , p = pretest, a1, a2, a3 = after test',
  PRIMARY KEY (`test_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for test_choice
-- ----------------------------
DROP TABLE IF EXISTS `test_choice`;
CREATE TABLE `test_choice`  (
  `test_c_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `qs_id` int(11) NOT NULL,
  `test_c_no` int(11) NOT NULL COMMENT 'เป็นคำถามข้อที่เท่าไหร่',
  `test_c_c1` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `test_c_c2` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `test_c_c3` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `test_c_c4` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `test_c_ans` int(11) NOT NULL COMMENT '1,2,3,4',
  `test_c_score` int(11) NOT NULL COMMENT 'คะแนนของข้อนี้',
  PRIMARY KEY (`test_c_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for test_dialog
-- ----------------------------
DROP TABLE IF EXISTS `test_dialog`;
CREATE TABLE `test_dialog`  (
  `test_d_id` int(11) NOT NULL AUTO_INCREMENT,
  `qs_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `test_d_no` int(11) NOT NULL,
  `test_ans` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'เซตของคำตอบที่เป็นไปได้ เช่น \'a\' , \'b\'',
  `test_score` int(11) NOT NULL DEFAULT 1 COMMENT 'คะแนนของข้อนี้',
  PRIMARY KEY (`test_d_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_pic` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
