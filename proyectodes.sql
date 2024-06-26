/*
Navicat MySQL Data Transfer

Source Server         : db
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : proyectodes

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2024-06-25 19:58:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tbl_adjuntos
-- ----------------------------
DROP TABLE IF EXISTS `tbl_adjuntos`;
CREATE TABLE `tbl_adjuntos` (
  `ID_ADJUNTOS` bigint(20) NOT NULL AUTO_INCREMENT,
  `ID_SOLICITUD` bigint(20) DEFAULT NULL,
  `ID_RELACION` bigint(20) DEFAULT NULL,
  `DOC_ADJUNTOS` longblob DEFAULT NULL,
  PRIMARY KEY (`ID_ADJUNTOS`),
  KEY `ID_SOLICITUD` (`ID_SOLICITUD`),
  KEY `ID_RELACION` (`ID_RELACION`),
  CONSTRAINT `tbl_adjuntos_ibfk_1` FOREIGN KEY (`ID_SOLICITUD`) REFERENCES `tbl_solicitudes` (`ID_SOLICITUD`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_adjuntos_ibfk_2` FOREIGN KEY (`ID_RELACION`) REFERENCES `tbl_documentos_categoria` (`ID_RELACION`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tbl_adjuntos
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_btc_seguridad
-- ----------------------------
DROP TABLE IF EXISTS `tbl_btc_seguridad`;
CREATE TABLE `tbl_btc_seguridad` (
  `ID_BTC_SEGURIDAD` int(11) NOT NULL,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `ID_OBJETO` int(11) DEFAULT NULL,
  `ACCION` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- ----------------------------
-- Records of tbl_btc_seguridad
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_btc_sistema
-- ----------------------------
DROP TABLE IF EXISTS `tbl_btc_sistema`;
CREATE TABLE `tbl_btc_sistema` (
  `ID_BTC_SEGURIDAD` bigint(20) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` bigint(20) DEFAULT NULL,
  `ID_OBJETO` bigint(20) DEFAULT NULL,
  `ACCION` varchar(50) NOT NULL,
  `DESCRIPCION` varchar(100) NOT NULL,
  `FECHA` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`ID_BTC_SEGURIDAD`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  KEY `ID_OBJETO` (`ID_OBJETO`),
  CONSTRAINT `tbl_btc_sistema_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `tbl_ms_usuario` (`ID_USUARIO`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_btc_sistema_ibfk_2` FOREIGN KEY (`ID_OBJETO`) REFERENCES `tbl_ms_objetos` (`ID_OBJETO`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tbl_btc_sistema
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_btc_solicitud
-- ----------------------------
DROP TABLE IF EXISTS `tbl_btc_solicitud`;
CREATE TABLE `tbl_btc_solicitud` (
  `ID_BTC_SOLICITUD` bigint(20) NOT NULL AUTO_INCREMENT,
  `ID_SOLICITUD` bigint(20) DEFAULT NULL,
  `ID_UNIVERSIDAD` bigint(20) DEFAULT NULL,
  `ID_CARRERA` bigint(20) DEFAULT NULL,
  `ID_ESTADO` bigint(20) DEFAULT NULL,
  `FECHA` datetime DEFAULT current_timestamp(),
  `OBSERVACIONES` varchar(100) DEFAULT NULL,
  `ID_USUARIO` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`ID_BTC_SOLICITUD`),
  KEY `ID_SOLICITUD` (`ID_SOLICITUD`),
  KEY `ID_UNIVERSIDAD` (`ID_UNIVERSIDAD`),
  KEY `ID_CARRERA` (`ID_CARRERA`),
  KEY `ID_ESTADO` (`ID_ESTADO`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  CONSTRAINT `tbl_btc_solicitud_ibfk_1` FOREIGN KEY (`ID_SOLICITUD`) REFERENCES `tbl_solicitudes` (`ID_SOLICITUD`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_btc_solicitud_ibfk_2` FOREIGN KEY (`ID_UNIVERSIDAD`) REFERENCES `tbl_universidad_centro` (`ID_UNIVERSIDAD`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_btc_solicitud_ibfk_3` FOREIGN KEY (`ID_CARRERA`) REFERENCES `tbl_carrera` (`ID_CARRERA`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_btc_solicitud_ibfk_4` FOREIGN KEY (`ID_ESTADO`) REFERENCES `tbl_estado_solicitud` (`ID_ESTADO`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_btc_solicitud_ibfk_5` FOREIGN KEY (`ID_USUARIO`) REFERENCES `tbl_ms_usuario` (`ID_USUARIO`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tbl_btc_solicitud
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_carrera
-- ----------------------------
DROP TABLE IF EXISTS `tbl_carrera`;
CREATE TABLE `tbl_carrera` (
  `ID_CARRERA` bigint(20) NOT NULL AUTO_INCREMENT,
  `NOM_CARRERA` varchar(50) DEFAULT NULL,
  `ID_UNIVERSIDAD` bigint(20) DEFAULT NULL,
  `ID_MODALIDAD` bigint(20) DEFAULT NULL,
  `ID_GRADO` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`ID_CARRERA`),
  KEY `ID_UNIVERSIDAD` (`ID_UNIVERSIDAD`),
  KEY `ID_MODALIDAD` (`ID_MODALIDAD`),
  KEY `ID_GRADO` (`ID_GRADO`),
  CONSTRAINT `tbl_carrera_ibfk_1` FOREIGN KEY (`ID_UNIVERSIDAD`) REFERENCES `tbl_universidad_centro` (`ID_UNIVERSIDAD`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_carrera_ibfk_2` FOREIGN KEY (`ID_MODALIDAD`) REFERENCES `tbl_modalidad` (`ID_MODALIDAD`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_carrera_ibfk_3` FOREIGN KEY (`ID_GRADO`) REFERENCES `tbl_grado_academico` (`ID_GRADO`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tbl_carrera
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_categoria
-- ----------------------------
DROP TABLE IF EXISTS `tbl_categoria`;
CREATE TABLE `tbl_categoria` (
  `ID_CATEGORIA` bigint(20) NOT NULL AUTO_INCREMENT,
  `COD_ARBITRIOS` bigint(20) DEFAULT NULL,
  `NOM_CATEGORIA` varchar(50) DEFAULT NULL,
  `ID_TIPO_SOLICITUD` bigint(20) DEFAULT NULL,
  `MONTO` decimal(18,2) DEFAULT NULL,
  PRIMARY KEY (`ID_CATEGORIA`),
  KEY `ID_TIPO_SOLICITUD` (`ID_TIPO_SOLICITUD`),
  CONSTRAINT `tbl_categoria_ibfk_1` FOREIGN KEY (`ID_TIPO_SOLICITUD`) REFERENCES `tbl_tipo_solicitud` (`ID_TIPO_SOLICITUD`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tbl_categoria
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_consejales
-- ----------------------------
DROP TABLE IF EXISTS `tbl_consejales`;
CREATE TABLE `tbl_consejales` (
  `ID_CONSEJAL` bigint(20) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(50) DEFAULT NULL,
  `APELLIDO` varchar(50) DEFAULT NULL,
  `UNIVERSIDAD` varchar(50) DEFAULT NULL,
  `CATEGORIA_CONS` varchar(50) DEFAULT NULL,
  `ESTADO` varchar(50) DEFAULT NULL,
  `CORREO_CONS` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_CONSEJAL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tbl_consejales
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_deptos
-- ----------------------------
DROP TABLE IF EXISTS `tbl_deptos`;
CREATE TABLE `tbl_deptos` (
  `ID_DEPARTAMENTO` bigint(20) NOT NULL AUTO_INCREMENT,
  `NOM_DEPTO` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_DEPARTAMENTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tbl_deptos
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_dictamen_ctc
-- ----------------------------
DROP TABLE IF EXISTS `tbl_dictamen_ctc`;
CREATE TABLE `tbl_dictamen_ctc` (
  `ID_DICTAMEN_CTC` bigint(20) NOT NULL AUTO_INCREMENT,
  `DICTAMEN_CTC` varchar(50) DEFAULT NULL,
  `ADJUNTO_DICTAMEN` longblob DEFAULT NULL,
  `COMISION_CONFORMADA` varchar(100) DEFAULT NULL,
  `ID_UNIVERSIDAD` bigint(20) DEFAULT NULL,
  `ID_SOLICITUD` bigint(20) DEFAULT NULL,
  `ID_CARRERA` bigint(20) DEFAULT NULL,
  `OBSERVACIONES_DICTAMEN` varchar(100) DEFAULT NULL,
  `ID_DEPARTAMENTO` bigint(20) DEFAULT NULL,
  `ID_MUNICIPIO` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`ID_DICTAMEN_CTC`),
  KEY `ID_UNIVERSIDAD` (`ID_UNIVERSIDAD`),
  KEY `ID_SOLICITUD` (`ID_SOLICITUD`),
  KEY `ID_CARRERA` (`ID_CARRERA`),
  KEY `ID_DEPARTAMENTO` (`ID_DEPARTAMENTO`),
  KEY `ID_MUNICIPIO` (`ID_MUNICIPIO`),
  CONSTRAINT `tbl_dictamen_ctc_ibfk_1` FOREIGN KEY (`ID_UNIVERSIDAD`) REFERENCES `tbl_universidad_centro` (`ID_UNIVERSIDAD`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_dictamen_ctc_ibfk_2` FOREIGN KEY (`ID_SOLICITUD`) REFERENCES `tbl_solicitudes` (`ID_SOLICITUD`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_dictamen_ctc_ibfk_3` FOREIGN KEY (`ID_CARRERA`) REFERENCES `tbl_carrera` (`ID_CARRERA`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_dictamen_ctc_ibfk_4` FOREIGN KEY (`ID_DEPARTAMENTO`) REFERENCES `tbl_deptos` (`ID_DEPARTAMENTO`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_dictamen_ctc_ibfk_5` FOREIGN KEY (`ID_MUNICIPIO`) REFERENCES `tbl_municipios` (`ID_MUNICIPIO`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tbl_dictamen_ctc
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_documentos
-- ----------------------------
DROP TABLE IF EXISTS `tbl_documentos`;
CREATE TABLE `tbl_documentos` (
  `ID_DOCUMENTO` bigint(20) NOT NULL AUTO_INCREMENT,
  `NOM_DOCUMENTO` varchar(100) DEFAULT NULL,
  `DESCRIPCION` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_DOCUMENTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tbl_documentos
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_documentos_categoria
-- ----------------------------
DROP TABLE IF EXISTS `tbl_documentos_categoria`;
CREATE TABLE `tbl_documentos_categoria` (
  `ID_RELACION` bigint(20) NOT NULL AUTO_INCREMENT,
  `ID_CATEGORIA` bigint(20) DEFAULT NULL,
  `ID_DOCUMENTO` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`ID_RELACION`),
  KEY `ID_CATEGORIA` (`ID_CATEGORIA`),
  KEY `ID_DOCUMENTO` (`ID_DOCUMENTO`),
  CONSTRAINT `tbl_documentos_categoria_ibfk_1` FOREIGN KEY (`ID_CATEGORIA`) REFERENCES `tbl_categoria` (`ID_CATEGORIA`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_documentos_categoria_ibfk_2` FOREIGN KEY (`ID_DOCUMENTO`) REFERENCES `tbl_documentos` (`ID_DOCUMENTO`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tbl_documentos_categoria
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_estado_solicitud
-- ----------------------------
DROP TABLE IF EXISTS `tbl_estado_solicitud`;
CREATE TABLE `tbl_estado_solicitud` (
  `ID_ESTADO` bigint(20) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_ESTADO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tbl_estado_solicitud
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_estado_usuario
-- ----------------------------
DROP TABLE IF EXISTS `tbl_estado_usuario`;
CREATE TABLE `tbl_estado_usuario` (
  `id_estado` int(11) NOT NULL,
  `nom_estado` varchar(10) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- ----------------------------
-- Records of tbl_estado_usuario
-- ----------------------------
INSERT INTO `tbl_estado_usuario` VALUES ('1', 'Activo');
INSERT INTO `tbl_estado_usuario` VALUES ('2', 'Inactivo');

-- ----------------------------
-- Table structure for tbl_grado_academico
-- ----------------------------
DROP TABLE IF EXISTS `tbl_grado_academico`;
CREATE TABLE `tbl_grado_academico` (
  `ID_GRADO` bigint(20) NOT NULL AUTO_INCREMENT,
  `NOM_GRADO` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`ID_GRADO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tbl_grado_academico
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_modalidad
-- ----------------------------
DROP TABLE IF EXISTS `tbl_modalidad`;
CREATE TABLE `tbl_modalidad` (
  `ID_MODALIDAD` bigint(20) NOT NULL AUTO_INCREMENT,
  `NOM_MODALIDAD` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`ID_MODALIDAD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tbl_modalidad
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_ms_bitacora
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ms_bitacora`;
CREATE TABLE `tbl_ms_bitacora` (
  `id_bitacora` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_hora` datetime NOT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `accion` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  PRIMARY KEY (`id_bitacora`),
  KEY `usuario_id` (`id_usuario`),
  CONSTRAINT `tbl_ms_bitacora_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_ms_usuario` (`ID_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tbl_ms_bitacora
-- ----------------------------
INSERT INTO `tbl_ms_bitacora` VALUES ('69', '2024-06-23 21:19:14', '1', 'Seguridad', 'El usuario ha hecho clic en el botón de Seguridad');
INSERT INTO `tbl_ms_bitacora` VALUES ('70', '2024-06-24 13:39:36', '1', 'Seguridad', 'El usuario ha hecho clic en el botón de Seguridad');
INSERT INTO `tbl_ms_bitacora` VALUES ('71', '2024-06-24 18:14:31', '1', 'Seguridad', 'El usuario ha hecho clic en el botón de Seguridad');
INSERT INTO `tbl_ms_bitacora` VALUES ('72', '2024-06-24 18:46:24', '1', 'Seguridad', 'El usuario ha hecho clic en el botón de Seguridad');
INSERT INTO `tbl_ms_bitacora` VALUES ('73', '2024-06-24 19:29:23', '1', 'Seguridad', 'El usuario ha hecho clic en el botón de Seguridad');
INSERT INTO `tbl_ms_bitacora` VALUES ('74', '2024-06-24 20:45:55', '1', 'Seguridad', 'El usuario ha hecho clic en el botón de Seguridad');
INSERT INTO `tbl_ms_bitacora` VALUES ('75', '2024-06-24 20:45:57', '1', 'Seguridad', 'El usuario ha hecho clic en el botón de Seguridad');
INSERT INTO `tbl_ms_bitacora` VALUES ('76', '2024-06-24 20:46:38', '1', 'Seguridad', 'El usuario ha hecho clic en el botón de Seguridad');
INSERT INTO `tbl_ms_bitacora` VALUES ('77', '2024-06-24 20:46:38', '1', 'Seguridad', 'El usuario ha hecho clic en el botón de Seguridad');
INSERT INTO `tbl_ms_bitacora` VALUES ('78', '2024-06-24 20:47:30', '1', 'Seguridad', 'El usuario ha hecho clic en el botón de Seguridad');
INSERT INTO `tbl_ms_bitacora` VALUES ('79', '2024-06-24 23:34:25', '1', 'Seguridad', 'El usuario ha hecho clic en el botón de Seguridad');
INSERT INTO `tbl_ms_bitacora` VALUES ('80', '2024-06-25 00:14:48', '1', 'Seguridad', 'El usuario ha hecho clic en el botón de Seguridad');
INSERT INTO `tbl_ms_bitacora` VALUES ('81', '2024-06-25 12:49:31', '1', 'Mantenimiento', 'El usuario ha hecho clic en el botón de Mantenimiento');
INSERT INTO `tbl_ms_bitacora` VALUES ('82', '2024-06-25 16:18:44', '1', 'Reportes', 'El usuario ha hecho clic en el botón de Reporteria');
INSERT INTO `tbl_ms_bitacora` VALUES ('83', '2024-06-25 16:45:50', '1', 'Seguridad', 'El usuario ha hecho clic en el botón de Seguridad');
INSERT INTO `tbl_ms_bitacora` VALUES ('84', '2024-06-25 16:49:20', '1', 'Seguridad', 'El usuario ha hecho clic en el botón de Seguridad');
INSERT INTO `tbl_ms_bitacora` VALUES ('85', '2024-06-25 16:49:28', '1', 'Seguridad', 'El usuario ha hecho clic en el botón de Seguridad');
INSERT INTO `tbl_ms_bitacora` VALUES ('86', '2024-06-25 16:49:34', '1', 'Seguridad', 'El usuario ha hecho clic en el botón de Seguridad');
INSERT INTO `tbl_ms_bitacora` VALUES ('87', '2024-06-25 16:49:37', '1', 'Seguridad', 'El usuario ha hecho clic en el botón de Seguridad');
INSERT INTO `tbl_ms_bitacora` VALUES ('88', '2024-06-25 17:13:19', '1', 'Seguridad', 'El usuario ha hecho clic en el botón de Seguridad');
INSERT INTO `tbl_ms_bitacora` VALUES ('89', '2024-06-25 17:13:32', '1', 'Consulta de Solicitudes', 'El usuario ha hecho clic en el botón de Consultar Solicitudes');
INSERT INTO `tbl_ms_bitacora` VALUES ('90', '2024-06-25 19:55:43', '1', 'Seguridad', 'El usuario ha hecho clic en el botón de Seguridad');

-- ----------------------------
-- Table structure for tbl_ms_hist_contraseña
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ms_hist_contraseña`;
CREATE TABLE `tbl_ms_hist_contraseña` (
  `ID_HIST` bigint(20) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` bigint(20) DEFAULT NULL,
  `CONTRASEÑA` varchar(255) DEFAULT NULL,
  `FECHA_CREACION` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`ID_HIST`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  CONSTRAINT `tbl_ms_hist_contraseña_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `tbl_ms_usuario` (`ID_USUARIO`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tbl_ms_hist_contraseña
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_ms_objetos
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ms_objetos`;
CREATE TABLE `tbl_ms_objetos` (
  `ID_OBJETO` bigint(20) NOT NULL AUTO_INCREMENT,
  `OBJETO` varchar(50) NOT NULL,
  `TIPO_OBJETO` varchar(50) DEFAULT '',
  `DESCRIPCION` varchar(255) DEFAULT NULL,
  `FECHA_CREACION` datetime DEFAULT current_timestamp(),
  `CREADO_POR` varchar(50) DEFAULT NULL,
  `FECHA_MODIFICACION` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `MODIFICADO_POR` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_OBJETO`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tbl_ms_objetos
-- ----------------------------
INSERT INTO `tbl_ms_objetos` VALUES ('1', 'LOGIN INGRESAR', 'BOTON', 'CREADO PARA INICIO DE SESIÓN DE USUARIOS', '2024-06-21 19:54:59', '1', '2024-06-24 21:51:56', null);
INSERT INTO `tbl_ms_objetos` VALUES ('2', 'LOGIN OLVIDASTE CONTRASEÑA', 'HREF', 'CREADO PARA RECUPERAR LA CONTRASEÑA OLVIDADA', '2024-06-21 20:00:52', '1', '2024-06-24 21:51:56', null);
INSERT INTO `tbl_ms_objetos` VALUES ('3', 'INGRESO DE SOLICITUDES', 'BOTON', 'CREADO PARA LLENAR EL FORMULARIO INGRESO DE SOLICITUD', '2024-06-21 20:12:02', '1', '2024-06-24 21:51:56', null);
INSERT INTO `tbl_ms_objetos` VALUES ('4', 'CONSULTAR SOLICTUDES', 'BOTON', 'CREADO PARA VER LAS CONSULTAS DE SOLICITUDES POR UNIVERSIDADES', '2024-06-21 20:13:04', '1', '2024-06-24 21:51:56', null);
INSERT INTO `tbl_ms_objetos` VALUES ('5', 'GESTION DE SOLICITUDES', 'BOTON', 'CREADO PARA VER EL FORMULARIO INGRESO DE SOLICITUD EMPLEADO', '2024-06-21 20:15:19', '1', '2024-06-24 21:51:56', null);
INSERT INTO `tbl_ms_objetos` VALUES ('6', 'CONSULTAR SOLICTUDES', 'BOTON', 'CREADO PARA VER LAS CONSULTA DE SOLICITUDES EMPLEDOS DES', '2024-06-21 20:16:11', '1', '2024-06-24 21:51:56', null);
INSERT INTO `tbl_ms_objetos` VALUES ('7', 'SEGUIMIENTO ACADEMICO', 'BOTON', 'CREADO PARA CONSULTAR SOLICITUDES', '2024-06-21 20:57:13', '1', '2024-06-24 21:51:56', null);
INSERT INTO `tbl_ms_objetos` VALUES ('8', 'MANTENIMIENTO SOLICITUDES', 'BOTON', 'CREADO PARA VER REVISION,ACUERDOS,DICTAMEN,ANALIS,ENTREGA DE PLAN DE ESTUDIOS', '2024-06-21 20:59:08', '1', '2024-06-24 21:51:56', null);
INSERT INTO `tbl_ms_objetos` VALUES ('9', 'REPORTES ', 'BOTON', 'CREADO PARA GENERAR REPORTERIA', '2024-06-21 21:00:05', '1', '2024-06-24 21:51:56', null);
INSERT INTO `tbl_ms_objetos` VALUES ('10', 'MANTENIMIENTO', 'BOTON', 'CREADO PARA MANEJAR EL CRUD A DEPARTAMENTOS,MUNICIPIOS,UNIVERSIDADES ETC.', '2024-06-21 21:01:45', '1', '2024-06-24 21:51:56', null);
INSERT INTO `tbl_ms_objetos` VALUES ('11', 'SEGURIDAD', 'BOTON', 'CREADO PARA MANEJAR EL CRUD A USUARIOS,CONSEJALES,PERMISOS,ROLES ETC.', '2024-06-21 21:02:58', '1', '2024-06-24 21:51:56', null);

-- ----------------------------
-- Table structure for tbl_ms_parametros
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ms_parametros`;
CREATE TABLE `tbl_ms_parametros` (
  `ID_PARAMETRO` bigint(20) NOT NULL AUTO_INCREMENT,
  `PARAMETRO` varchar(100) NOT NULL,
  `VALOR` varchar(100) DEFAULT NULL,
  `ID_USUARIO` bigint(20) DEFAULT NULL,
  `FECHA_CREACION` datetime DEFAULT current_timestamp(),
  `CREADO_POR` varchar(50) DEFAULT NULL,
  `FECHA_MODIFICACION` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `MODIFICADO_POR` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_PARAMETRO`),
  UNIQUE KEY `PARAMETRO` (`PARAMETRO`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  CONSTRAINT `tbl_ms_parametros_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `tbl_ms_usuario` (`ID_USUARIO`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tbl_ms_parametros
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_ms_roles
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ms_roles`;
CREATE TABLE `tbl_ms_roles` (
  `ID_ROL` bigint(20) NOT NULL AUTO_INCREMENT,
  `ROL` varchar(50) NOT NULL,
  `DESCRIPCION` varchar(255) DEFAULT NULL,
  `FECHA_CREACION` datetime DEFAULT current_timestamp(),
  `CREADO_POR` varchar(50) DEFAULT NULL,
  `FECHA_MODIFICACION` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `MODIFICADO_POR` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_ROL`),
  KEY `fk_creado` (`CREADO_POR`),
  KEY `fk_roles2` (`ROL`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tbl_ms_roles
-- ----------------------------
INSERT INTO `tbl_ms_roles` VALUES ('1', '1', 'Permiso Absoluto', '2024-06-23 21:27:39', '1', '2024-06-23 21:27:39', null);
INSERT INTO `tbl_ms_roles` VALUES ('2', '2', 'Notificación Mediante Correo De Recibido De Solicitudes', '2024-06-23 21:29:44', '1', '2024-06-23 21:31:04', null);
INSERT INTO `tbl_ms_roles` VALUES ('3', '3', 'Permiso a Módulo De Mantenimiento De Solicitudes', '2024-06-23 21:31:08', '1', '2024-06-23 21:36:54', null);
INSERT INTO `tbl_ms_roles` VALUES ('4', '4', 'Permiso a Módulo De Mantenimiento De Solicitudes,Consultas Y Asiganciones', '2024-06-23 21:32:13', '1', '2024-06-23 21:36:59', null);
INSERT INTO `tbl_ms_roles` VALUES ('5', '5', 'Permiso a Módulo De Seguimiento Académico,Módulo Dictamen CTC', '2024-06-23 21:33:08', '1', '2024-06-23 21:37:04', null);
INSERT INTO `tbl_ms_roles` VALUES ('6', '6', 'Permiso a Módulo De Seguimiento Académico,Módulo Dictamen CTC,Módulo De Mantenimiento De Solicitudes,Modulo Análisis Curricular', '2024-06-23 21:34:54', '1', '2024-06-23 21:37:10', null);
INSERT INTO `tbl_ms_roles` VALUES ('7', '7', 'Permiso a Formulario Ingreso Solicitud,Consulta Solicitudes,Seguimiento Académico,Mantenimiento Solicitudes,Reportes', '2024-06-23 21:36:40', '1', '2024-06-23 21:41:25', null);
INSERT INTO `tbl_ms_roles` VALUES ('8', '1', 'Permiso a Modulo De Mantenimiento De SolicitudesS', '2024-06-23 21:38:17', '1', '2024-06-25 16:46:37', '11');
INSERT INTO `tbl_ms_roles` VALUES ('9', '9', 'Permiso a Menú Vista Universidad,Formulario Ingreso De Solicitud, Consulta Solicitudes Universidad, Subsanación Documentos De La Solicitud,Dictamen CTC,Subir Adjuntos,Análisis Curricular,Emisión De Opinión Razonada,Plan De Estudios Registrado Firmado y Fo', '2024-06-23 21:40:49', '1', '2024-06-23 21:40:49', null);
INSERT INTO `tbl_ms_roles` VALUES ('10', '10', 'Los consejales exclusivamente serán notificados mediante correo', '2024-06-23 21:42:11', '1', '2024-06-23 21:42:11', null);

-- ----------------------------
-- Table structure for tbl_ms_usuario
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ms_usuario`;
CREATE TABLE `tbl_ms_usuario` (
  `ID_USUARIO` bigint(20) NOT NULL AUTO_INCREMENT,
  `NUM_IDENTIDAD` varchar(50) NOT NULL,
  `DIRECCION_1` varchar(255) DEFAULT NULL,
  `usuario` varchar(50) NOT NULL,
  `NOMBRE_USUARIO` varchar(100) DEFAULT NULL,
  `contrasena` varchar(255) NOT NULL,
  `ID_ROL` bigint(20) DEFAULT NULL,
  `FECHA_ULTIMA_CONEXION` datetime DEFAULT NULL,
  `FECHA_CREACION` datetime DEFAULT current_timestamp(),
  `CREADO_POR` varchar(50) DEFAULT NULL,
  `FECHA_MODIFICACION` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `MODIFICADO_POR` varchar(50) DEFAULT NULL,
  `PRIMER_INGRESO` tinyint(1) DEFAULT NULL,
  `FECHA_VENCIMIENTO` datetime DEFAULT NULL,
  `CORREO_ELECTRONICO` varchar(100) DEFAULT NULL,
  `REGISTRO_CLAVE` varchar(255) DEFAULT NULL,
  `ESTADO_USUARIO` int(11) NOT NULL,
  PRIMARY KEY (`ID_USUARIO`),
  UNIQUE KEY `NUM_IDENTIDAD` (`NUM_IDENTIDAD`),
  UNIQUE KEY `USUARIO` (`usuario`),
  KEY `ID_ROL` (`ID_ROL`),
  KEY `fk_estado_usuario` (`ESTADO_USUARIO`),
  KEY `NOMBRE_USUARIO` (`NOMBRE_USUARIO`),
  CONSTRAINT `fk_estado_usuario` FOREIGN KEY (`ESTADO_USUARIO`) REFERENCES `tbl_estado_usuario` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_ms_usuario_ibfk_1` FOREIGN KEY (`ID_ROL`) REFERENCES `tbl_rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tbl_ms_usuario
-- ----------------------------
INSERT INTO `tbl_ms_usuario` VALUES ('1', '0801199920332', 'Col.COA', 'Administrador', 'Admin', '123', '1', '2024-06-23 19:21:57', '2024-06-23 19:22:15', 'Edwin Martinez', '2024-06-23 19:22:15', null, null, null, 'aron.martinez@unah.hn', null, '1');
INSERT INTO `tbl_ms_usuario` VALUES ('2', '0801200020333', 'Col.Loarque', 'Secretaria', 'Secretaria DES', '$2y$10$6qh1xOJsc78mzaRFMrrnzOljCQWSsGgpVm9AkelfCI.6bMkM/Wg5.', '2', null, '2024-06-24 20:51:11', '1', '2024-06-25 16:03:44', null, null, null, 'secretaria@unah.hn', null, '1');
INSERT INTO `tbl_ms_usuario` VALUES ('3', '080119920332', 'Col.Loarque', 'Auxiliar', 'Auxiliar Control', '$2y$10$gnQhSlAK56xDCaFyZuAxpencsQmowrYcubYg.lkyy636.H0nY145S', '3', null, '2024-06-24 20:53:15', '1', '2024-06-24 20:53:26', null, null, null, 'auxiliar@unah.hn', null, '1');
INSERT INTO `tbl_ms_usuario` VALUES ('4', '080119920333', 'Col.Cao', 'CES', 'Encargado CES', '$2y$10$HnPhYLBLTB3QwvAYiyiiK.dgXOZzygKGYx2ku5FXLhjdlgZrhxe3i', '4', null, '2024-06-24 20:54:28', '1', '2024-06-24 20:54:28', null, null, null, 'ces@unah.hn', null, '1');
INSERT INTO `tbl_ms_usuario` VALUES ('5', '080119920334', 'Col.Loarque', 'CTC', 'Encargado CTC', '$2y$10$sLSlVL1U1rRzvZZ1vyDUnuWhZueDyrGjwwgSkgMVk.BC7fT8zQKUC', '5', null, '2024-06-24 20:55:17', '1', '2024-06-24 20:55:17', null, null, null, 'ctc@unah.hn', null, '1');
INSERT INTO `tbl_ms_usuario` VALUES ('6', '080119920335', 'Col.Loarque', 'Curricular', 'Analista', '$2y$10$fpLEG7CpX.vGsvxCzW8qdOsYLr7VmJgHkMUoOdSISaORMm3pkqG8e', '6', null, '2024-06-24 20:58:05', '1', '2024-06-24 20:58:05', null, null, null, 'analistac@unah.hn', null, '1');
INSERT INTO `tbl_ms_usuario` VALUES ('7', '080119920336', 'Col.Cao', 'Jefe', 'Jefe Departamento', '$2y$10$96TtASr/sHHlOvHOlZenn.U6bQ5sOLdM5RNBlx1T9bUlnsPbi9RlK', '7', null, '2024-06-24 20:58:51', '1', '2024-06-24 20:58:51', null, null, null, 'jefe@unah.hn', null, '1');
INSERT INTO `tbl_ms_usuario` VALUES ('8', '080119920337', 'Col.Loarque', 'Digitalización ', 'Encargado Digitalización', '$2y$10$wf0crYjlEIxUJ9jnb0ca5umox8ZBfutwEIXfff8xp5CIeuHepdb9m', '8', null, '2024-06-24 21:00:03', '1', '2024-06-24 21:00:03', null, null, null, 'digitalizacion@unah.hn', null, '1');
INSERT INTO `tbl_ms_usuario` VALUES ('9', '080119920338', 'Col.Cao', 'IDES', 'Universidad IDES', '$2y$10$H/KeZg8.S3xn4OOid9KaBOg2Q.6Pvjo/XGbcwYp2aBCHLGPpjduf.', '9', null, '2024-06-24 21:01:16', '1', '2024-06-24 21:01:16', null, null, null, 'ides@unah.hn', null, '1');
INSERT INTO `tbl_ms_usuario` VALUES ('10', '080119920339', 'Col.Loarque', 'Consejal', 'Consejales ', '$2y$10$kVmpv3oJAdLSuz/vHqnjmup9/i41exGxlfW5DA1zA4I06WH/OGDp6', '10', null, '2024-06-24 21:01:59', '1', '2024-06-24 21:01:59', null, null, null, 'consejales@unah.hn', null, '1');
INSERT INTO `tbl_ms_usuario` VALUES ('11', '080119920323', 'Col.Cao', 'Adminstrador', 'Edwin Martinez', '$2y$10$D8f0RPyz.pVTAkdeH2RE8em8MY01Gg6m4t./fopYlk9TJtwdzW9w2', '1', null, '2024-06-25 00:20:36', '1', '2024-06-25 00:20:56', null, null, null, 'admin@unah.hn', null, '1');

-- ----------------------------
-- Table structure for tbl_municipios
-- ----------------------------
DROP TABLE IF EXISTS `tbl_municipios`;
CREATE TABLE `tbl_municipios` (
  `ID_MUNICIPIO` bigint(20) NOT NULL AUTO_INCREMENT,
  `NOM_MUNICIPIO` varchar(50) DEFAULT NULL,
  `ID_DEPARTAMENTO` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`ID_MUNICIPIO`),
  KEY `ID_DEPARTAMENTO` (`ID_DEPARTAMENTO`),
  CONSTRAINT `tbl_municipios_ibfk_1` FOREIGN KEY (`ID_DEPARTAMENTO`) REFERENCES `tbl_deptos` (`ID_DEPARTAMENTO`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tbl_municipios
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_opinion_consejal
-- ----------------------------
DROP TABLE IF EXISTS `tbl_opinion_consejal`;
CREATE TABLE `tbl_opinion_consejal` (
  `ID_OPINION_CONSEJAL` bigint(20) NOT NULL AUTO_INCREMENT,
  `ID_OPINION_RAZONADA` bigint(20) DEFAULT NULL,
  `ID_CONSEJAL` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`ID_OPINION_CONSEJAL`),
  KEY `ID_OPINION_RAZONADA` (`ID_OPINION_RAZONADA`),
  KEY `ID_CONSEJAL` (`ID_CONSEJAL`),
  CONSTRAINT `tbl_opinion_consejal_ibfk_1` FOREIGN KEY (`ID_OPINION_RAZONADA`) REFERENCES `tbl_opinion_razonada` (`ID_OPINION_RAZONADA`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_opinion_consejal_ibfk_2` FOREIGN KEY (`ID_CONSEJAL`) REFERENCES `tbl_consejales` (`ID_CONSEJAL`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tbl_opinion_consejal
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_opinion_razonada
-- ----------------------------
DROP TABLE IF EXISTS `tbl_opinion_razonada`;
CREATE TABLE `tbl_opinion_razonada` (
  `ID_OPINION_RAZONADA` bigint(20) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION_ADJUNTO` varchar(100) DEFAULT NULL,
  `ADJUNTO_OR_DES` longblob DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `ID_SOLICITUD` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`ID_OPINION_RAZONADA`),
  KEY `ID_SOLICITUD` (`ID_SOLICITUD`),
  CONSTRAINT `tbl_opinion_razonada_ibfk_1` FOREIGN KEY (`ID_SOLICITUD`) REFERENCES `tbl_solicitudes` (`ID_SOLICITUD`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tbl_opinion_razonada
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_permisos
-- ----------------------------
DROP TABLE IF EXISTS `tbl_permisos`;
CREATE TABLE `tbl_permisos` (
  `ID_PERMISO` bigint(20) NOT NULL AUTO_INCREMENT,
  `ID_ROL` bigint(20) DEFAULT NULL,
  `ID_OBJETO` bigint(20) DEFAULT NULL,
  `PERMISO_INSERCION` varchar(5) NOT NULL,
  `PERMISO_ELIMINACION` varchar(5) NOT NULL,
  `PERMISO_ACTUALIZACION` varchar(5) NOT NULL,
  `PERMISO_CONSULTAR` varchar(5) NOT NULL,
  `FECHA_CREACION` datetime DEFAULT current_timestamp(),
  `CREADO_POR` varchar(50) DEFAULT NULL,
  `FECHA_MODIFICACION` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `MODIFICADO_POR` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_PERMISO`),
  KEY `ID_ROL` (`ID_ROL`),
  KEY `ID_OBJETO` (`ID_OBJETO`),
  CONSTRAINT `tbl_permisos_ibfk_1` FOREIGN KEY (`ID_ROL`) REFERENCES `tbl_ms_roles` (`ID_ROL`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_permisos_ibfk_2` FOREIGN KEY (`ID_OBJETO`) REFERENCES `tbl_ms_objetos` (`ID_OBJETO`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tbl_permisos
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_plan_estudio
-- ----------------------------
DROP TABLE IF EXISTS `tbl_plan_estudio`;
CREATE TABLE `tbl_plan_estudio` (
  `ID_PLAN_ESTUDIO` bigint(20) NOT NULL AUTO_INCREMENT,
  `NUM_REGISTRO` varchar(50) DEFAULT NULL,
  `ADJUNTO_PLAN` longblob DEFAULT NULL,
  `ID_UNIVERSIDAD` bigint(20) DEFAULT NULL,
  `ID_CARRERA` bigint(20) DEFAULT NULL,
  `ID_SOLICITUD` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`ID_PLAN_ESTUDIO`),
  KEY `ID_UNIVERSIDAD` (`ID_UNIVERSIDAD`),
  KEY `ID_CARRERA` (`ID_CARRERA`),
  KEY `ID_SOLICITUD` (`ID_SOLICITUD`),
  CONSTRAINT `tbl_plan_estudio_ibfk_1` FOREIGN KEY (`ID_UNIVERSIDAD`) REFERENCES `tbl_universidad_centro` (`ID_UNIVERSIDAD`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_plan_estudio_ibfk_2` FOREIGN KEY (`ID_CARRERA`) REFERENCES `tbl_carrera` (`ID_CARRERA`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_plan_estudio_ibfk_3` FOREIGN KEY (`ID_SOLICITUD`) REFERENCES `tbl_solicitudes` (`ID_SOLICITUD`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tbl_plan_estudio
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_rol
-- ----------------------------
DROP TABLE IF EXISTS `tbl_rol`;
CREATE TABLE `tbl_rol` (
  `id_rol` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(50) NOT NULL,
  PRIMARY KEY (`id_rol`),
  KEY `nombre_rol` (`nombre_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tbl_rol
-- ----------------------------
INSERT INTO `tbl_rol` VALUES ('1', 'Administrador');
INSERT INTO `tbl_rol` VALUES ('6', 'Analista Curricular');
INSERT INTO `tbl_rol` VALUES ('3', 'Auxiliar De Control Documental');
INSERT INTO `tbl_rol` VALUES ('10', 'Consejales');
INSERT INTO `tbl_rol` VALUES ('8', 'Encargado De Digitalización');
INSERT INTO `tbl_rol` VALUES ('4', 'Encargado Del CES');
INSERT INTO `tbl_rol` VALUES ('5', 'Encargado Del CTC');
INSERT INTO `tbl_rol` VALUES ('9', 'Instituto De Educación Superior');
INSERT INTO `tbl_rol` VALUES ('7', 'Jefes Departamento');
INSERT INTO `tbl_rol` VALUES ('2', 'Secretaria');

-- ----------------------------
-- Table structure for tbl_seguimientos
-- ----------------------------
DROP TABLE IF EXISTS `tbl_seguimientos`;
CREATE TABLE `tbl_seguimientos` (
  `ID_SEGUIMIENTO` bigint(20) NOT NULL AUTO_INCREMENT,
  `ID_SOLICITUD` bigint(20) DEFAULT NULL,
  `NUMERO_DE_ACTA` varchar(50) DEFAULT NULL,
  `FECHA_CREACION` datetime DEFAULT current_timestamp(),
  `ID_USUARIO` bigint(20) DEFAULT NULL,
  `ID_ESTADO` bigint(20) DEFAULT NULL,
  `ID_DICTAMEN_CTC` bigint(20) DEFAULT NULL,
  `ID_OPINION_RAZONADA` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`ID_SEGUIMIENTO`),
  KEY `ID_SOLICITUD` (`ID_SOLICITUD`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  KEY `ID_ESTADO` (`ID_ESTADO`),
  KEY `ID_DICTAMEN_CTC` (`ID_DICTAMEN_CTC`),
  KEY `ID_OPINION_RAZONADA` (`ID_OPINION_RAZONADA`),
  CONSTRAINT `tbl_seguimientos_ibfk_1` FOREIGN KEY (`ID_SOLICITUD`) REFERENCES `tbl_solicitudes` (`ID_SOLICITUD`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_seguimientos_ibfk_2` FOREIGN KEY (`ID_USUARIO`) REFERENCES `tbl_ms_usuario` (`ID_USUARIO`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_seguimientos_ibfk_3` FOREIGN KEY (`ID_ESTADO`) REFERENCES `tbl_estado_solicitud` (`ID_ESTADO`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_seguimientos_ibfk_4` FOREIGN KEY (`ID_DICTAMEN_CTC`) REFERENCES `tbl_dictamen_ctc` (`ID_DICTAMEN_CTC`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_seguimientos_ibfk_5` FOREIGN KEY (`ID_OPINION_RAZONADA`) REFERENCES `tbl_opinion_razonada` (`ID_OPINION_RAZONADA`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tbl_seguimientos
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_solicitudes
-- ----------------------------
DROP TABLE IF EXISTS `tbl_solicitudes`;
CREATE TABLE `tbl_solicitudes` (
  `ID_SOLICITUD` bigint(20) NOT NULL AUTO_INCREMENT,
  `ID_TIPO_SOLICITUD` bigint(20) DEFAULT NULL,
  `ID_CATEGORIA` bigint(20) DEFAULT NULL,
  `NOM_SOLICITUD` varchar(255) DEFAULT NULL,
  `ID_CARRERA` bigint(20) DEFAULT NULL,
  `ID_GRADO` bigint(20) DEFAULT NULL,
  `ID_MODALIDAD` bigint(20) DEFAULT NULL,
  `ID_UNIVERSIDAD` bigint(20) DEFAULT NULL,
  `ID_DEPARTAMENTO` bigint(20) DEFAULT NULL,
  `ID_MUNICIPIO` bigint(20) DEFAULT NULL,
  `OBSERVACIONES` varchar(255) DEFAULT NULL,
  `ID_USUARIO` bigint(20) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `TELEFONO_CONTACTO` varchar(40) DEFAULT NULL,
  `FECHA_INGRESO` datetime DEFAULT current_timestamp(),
  `FECHA_MODIFICACION` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ID_ESTADO` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`ID_SOLICITUD`),
  KEY `ID_TIPO_SOLICITUD` (`ID_TIPO_SOLICITUD`),
  KEY `ID_CATEGORIA` (`ID_CATEGORIA`),
  KEY `ID_CARRERA` (`ID_CARRERA`),
  KEY `ID_GRADO` (`ID_GRADO`),
  KEY `ID_MODALIDAD` (`ID_MODALIDAD`),
  KEY `ID_UNIVERSIDAD` (`ID_UNIVERSIDAD`),
  KEY `ID_DEPARTAMENTO` (`ID_DEPARTAMENTO`),
  KEY `ID_MUNICIPIO` (`ID_MUNICIPIO`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  KEY `ID_ESTADO` (`ID_ESTADO`),
  CONSTRAINT `tbl_solicitudes_ibfk_1` FOREIGN KEY (`ID_TIPO_SOLICITUD`) REFERENCES `tbl_tipo_solicitud` (`ID_TIPO_SOLICITUD`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_solicitudes_ibfk_10` FOREIGN KEY (`ID_ESTADO`) REFERENCES `tbl_estado_solicitud` (`ID_ESTADO`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_solicitudes_ibfk_2` FOREIGN KEY (`ID_CATEGORIA`) REFERENCES `tbl_categoria` (`ID_CATEGORIA`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_solicitudes_ibfk_3` FOREIGN KEY (`ID_CARRERA`) REFERENCES `tbl_carrera` (`ID_CARRERA`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_solicitudes_ibfk_4` FOREIGN KEY (`ID_GRADO`) REFERENCES `tbl_grado_academico` (`ID_GRADO`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_solicitudes_ibfk_5` FOREIGN KEY (`ID_MODALIDAD`) REFERENCES `tbl_modalidad` (`ID_MODALIDAD`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_solicitudes_ibfk_6` FOREIGN KEY (`ID_UNIVERSIDAD`) REFERENCES `tbl_universidad_centro` (`ID_UNIVERSIDAD`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_solicitudes_ibfk_7` FOREIGN KEY (`ID_DEPARTAMENTO`) REFERENCES `tbl_deptos` (`ID_DEPARTAMENTO`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_solicitudes_ibfk_8` FOREIGN KEY (`ID_MUNICIPIO`) REFERENCES `tbl_municipios` (`ID_MUNICIPIO`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_solicitudes_ibfk_9` FOREIGN KEY (`ID_USUARIO`) REFERENCES `tbl_ms_usuario` (`ID_USUARIO`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tbl_solicitudes
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_tipo_solicitud
-- ----------------------------
DROP TABLE IF EXISTS `tbl_tipo_solicitud`;
CREATE TABLE `tbl_tipo_solicitud` (
  `ID_TIPO_SOLICITUD` bigint(20) NOT NULL AUTO_INCREMENT,
  `NOM_TIPO` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_TIPO_SOLICITUD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tbl_tipo_solicitud
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_universidad_centro
-- ----------------------------
DROP TABLE IF EXISTS `tbl_universidad_centro`;
CREATE TABLE `tbl_universidad_centro` (
  `ID_UNIVERSIDAD` bigint(20) NOT NULL AUTO_INCREMENT,
  `NOM_UNIVERSIDAD` varchar(50) DEFAULT NULL,
  `ID_DEPARTAMENTO` bigint(20) DEFAULT NULL,
  `ID_MUNICIPIO` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`ID_UNIVERSIDAD`),
  KEY `ID_DEPARTAMENTO` (`ID_DEPARTAMENTO`),
  KEY `ID_MUNICIPIO` (`ID_MUNICIPIO`),
  CONSTRAINT `tbl_universidad_centro_ibfk_1` FOREIGN KEY (`ID_DEPARTAMENTO`) REFERENCES `tbl_deptos` (`ID_DEPARTAMENTO`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_universidad_centro_ibfk_2` FOREIGN KEY (`ID_MUNICIPIO`) REFERENCES `tbl_municipios` (`ID_MUNICIPIO`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tbl_universidad_centro
-- ----------------------------
