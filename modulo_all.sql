/*
Navicat MySQL Data Transfer

Source Server         : global_system
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : global_system

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-10-19 16:44:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for modulo
-- ----------------------------
DROP TABLE IF EXISTS `modulo`;
CREATE TABLE `modulo` (
  `id_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `id_modulo_fk` int(11) NOT NULL,
  `descripcion` varchar(25) NOT NULL,
  `activo` tinyint(10) NOT NULL,
  PRIMARY KEY (`id_modulo`,`id_modulo_fk`),
  KEY `id_modulo` (`id_modulo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of modulo
-- ----------------------------
INSERT INTO `modulo` VALUES ('1', '0', 'operaciones', '1');
INSERT INTO `modulo` VALUES ('2', '0', 'clientes', '1');
INSERT INTO `modulo` VALUES ('3', '0', 'proveedores', '1');
INSERT INTO `modulo` VALUES ('4', '0', 'productos', '1');
INSERT INTO `modulo` VALUES ('5', '1', 'compra', '1');
INSERT INTO `modulo` VALUES ('6', '1', 'ventas', '1');
INSERT INTO `modulo` VALUES ('7', '1', 'movimientos', '1');
INSERT INTO `modulo` VALUES ('8', '4', 'en proceso', '1');
INSERT INTO `modulo` VALUES ('9', '4', 'listos', '1');
INSERT INTO `modulo` VALUES ('10', '2', 'estadisticas', '1');
INSERT INTO `modulo` VALUES ('11', '3', 'pagos', '1');
