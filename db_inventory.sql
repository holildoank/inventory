/*
Navicat MySQL Data Transfer

Source Server         : MYSQL Local
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : db_inventory

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-01-14 12:02:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for data_barang
-- ----------------------------
DROP TABLE IF EXISTS `data_barang`;
CREATE TABLE `data_barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(225) DEFAULT NULL,
  `nm_barang` varchar(225) DEFAULT NULL,
  `in` decimal(10,0) DEFAULT '0',
  `harga_jual` varchar(225) DEFAULT NULL,
  `harga_beli` varchar(225) DEFAULT NULL,
  `id_jenis_barang` int(11) DEFAULT NULL,
  `tgl_masuk` datetime DEFAULT NULL,
  `out` decimal(10,0) DEFAULT '0',
  `id_satuan` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `status_barang` int(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data_barang
-- ----------------------------
INSERT INTO `data_barang` VALUES ('1', 'NEW/13012017/BAR/000001', 'jjjj', '10', '383883', '33', '1', null, '6', '2', '', '1', '2017-01-13 12:29:47', '2017-01-14 04:32:11');
INSERT INTO `data_barang` VALUES ('2', 'NEW/13012017/BAR/000002', 'kdsfk', '17', '09999', '7777', '1', null, '2', '3', '', '1', '2017-01-13 12:32:38', '2017-01-14 04:32:11');
INSERT INTO `data_barang` VALUES ('3', 'NEW/13012017/BAR/000003', 'ksafkfj', '8', '9999', '7000', '1', null, '0', '2', '', '1', '2017-01-13 12:34:57', '2017-01-14 01:03:02');
INSERT INTO `data_barang` VALUES ('4', 'NEW/13012017/BAR/000004', 'sdflsdfl', '17', '9999', '9000', '2', null, '909', '4', '', '1', '2017-01-13 12:37:44', '2017-01-14 01:03:02');
INSERT INTO `data_barang` VALUES ('8', 'NEW/13012017/BAR/000005', '50000', '17', '40000', '1000', '1', null, '0', '15', '', '1', '2017-01-13 16:40:19', '2017-01-14 01:03:02');
INSERT INTO `data_barang` VALUES ('9', '14012017/BAR/000006', 'susu', '6', '2000000', '1000', '1', null, '0', '13', '', '1', '2017-01-14 00:15:45', '2017-01-14 00:55:06');
INSERT INTO `data_barang` VALUES ('10', '142017/BAR/000007', 'kk', '7', '900000', '89000', '2', null, '0', '3', '', '1', '2017-01-14 00:25:17', '2017-01-14 00:25:17');

-- ----------------------------
-- Table structure for data_karyawan
-- ----------------------------
DROP TABLE IF EXISTS `data_karyawan`;
CREATE TABLE `data_karyawan` (
  `id_karyawan` int(11) NOT NULL AUTO_INCREMENT,
  `NIK` varchar(100) NOT NULL,
  `nm_depan` varchar(20) DEFAULT NULL,
  `nm_belakang` varchar(100) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `sex` varchar(5) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `jabatan` int(11) NOT NULL DEFAULT '0',
  `alamat` text NOT NULL,
  `agama` int(11) NOT NULL,
  `pendidikan` varchar(20) DEFAULT NULL,
  `id_status` int(11) NOT NULL,
  `tgl_bergabung` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_karyawan`)
) ENGINE=InnoDB AUTO_INCREMENT=860 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data_karyawan
-- ----------------------------
INSERT INTO `data_karyawan` VALUES ('1', '1', 'Superuser ', ' Inventory', '315914855', 'dooaankh@gmail.com', '2', '315914860', 'Krypton', '0000-00-00', '', '0', 'kokop', '0', '', '0', '1995-01-01', '2017-01-14 11:56:53', '2017-01-14 11:56:53');

-- ----------------------------
-- Table structure for data_level
-- ----------------------------
DROP TABLE IF EXISTS `data_level`;
CREATE TABLE `data_level` (
  `id_level` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_level_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data_level
-- ----------------------------

-- ----------------------------
-- Table structure for data_level_user
-- ----------------------------
DROP TABLE IF EXISTS `data_level_user`;
CREATE TABLE `data_level_user` (
  `id_level_user` int(11) NOT NULL AUTO_INCREMENT,
  `nm_level` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_level_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data_level_user
-- ----------------------------

-- ----------------------------
-- Table structure for data_log_barang
-- ----------------------------
DROP TABLE IF EXISTS `data_log_barang`;
CREATE TABLE `data_log_barang` (
  `id_log_barang` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) DEFAULT NULL,
  `qty_masuk` decimal(10,0) DEFAULT '0',
  `qty_keluar` decimal(11,0) DEFAULT NULL,
  `tgl_transaksi` datetime DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tipe` int(1) DEFAULT '1' COMMENT '1:masuk|\r\n2:keluar|3:uppdate',
  `id_karyawan` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_log_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data_log_barang
-- ----------------------------
INSERT INTO `data_log_barang` VALUES ('1', '1', '2', null, '1970-01-01 00:00:00', 'Barang Masuk2', '1', '1', '2017-01-14 01:03:02', '2017-01-14 01:03:02');
INSERT INTO `data_log_barang` VALUES ('2', '2', '10', null, '1970-01-01 00:00:00', 'Barang Masuk10', '1', '1', '2017-01-14 01:03:02', '2017-01-14 01:03:02');
INSERT INTO `data_log_barang` VALUES ('3', '3', '1', null, '1970-01-01 00:00:00', 'Barang Masuk1', '1', '1', '2017-01-14 01:03:02', '2017-01-14 01:03:02');
INSERT INTO `data_log_barang` VALUES ('4', '4', '10', null, '1970-01-01 00:00:00', 'Barang Masuk10', '1', '1', '2017-01-14 01:03:02', '2017-01-14 01:03:02');
INSERT INTO `data_log_barang` VALUES ('5', '8', '10', null, '1970-01-01 00:00:00', 'Barang Masuk10', '1', '1', '2017-01-14 01:03:02', '2017-01-14 01:03:02');
INSERT INTO `data_log_barang` VALUES ('6', '1', '1', null, '1970-01-01 00:00:00', 'Barang Keluar1', '2', '1', '2017-01-14 04:15:01', '2017-01-14 04:15:01');
INSERT INTO `data_log_barang` VALUES ('7', '2', '1', null, '1970-01-01 00:00:00', 'Barang Keluar1', '2', '1', '2017-01-14 04:15:01', '2017-01-14 04:15:01');
INSERT INTO `data_log_barang` VALUES ('8', '3', '1', null, '1970-01-01 00:00:00', 'Barang Keluar1', '2', '1', '2017-01-14 04:15:01', '2017-01-14 04:15:01');
INSERT INTO `data_log_barang` VALUES ('9', '4', '1', null, '1970-01-01 00:00:00', 'Barang Keluar1', '2', '1', '2017-01-14 04:15:01', '2017-01-14 04:15:01');
INSERT INTO `data_log_barang` VALUES ('10', '1', '1', null, '1970-01-01 00:00:00', 'Barang Keluar1', '2', '1', '2017-01-14 04:29:10', '2017-01-14 04:29:10');
INSERT INTO `data_log_barang` VALUES ('11', '3', '1', null, '1970-01-01 00:00:00', 'Barang Keluar1', '2', '1', '2017-01-14 04:29:10', '2017-01-14 04:29:10');
INSERT INTO `data_log_barang` VALUES ('12', '2', '1', null, '1970-01-01 00:00:00', 'Barang Keluar1', '2', '1', '2017-01-14 04:29:10', '2017-01-14 04:29:10');
INSERT INTO `data_log_barang` VALUES ('13', '4', '1', null, '1970-01-01 00:00:00', 'Barang Keluar1', '2', '1', '2017-01-14 04:29:10', '2017-01-14 04:29:10');
INSERT INTO `data_log_barang` VALUES ('14', '8', '1', null, '1970-01-01 00:00:00', 'Barang Keluar1', '2', '1', '2017-01-14 04:29:10', '2017-01-14 04:29:10');
INSERT INTO `data_log_barang` VALUES ('15', '1', '3', null, '1970-01-01 00:00:00', 'Barang Keluar3', '2', '1', '2017-01-14 04:31:41', '2017-01-14 04:31:41');
INSERT INTO `data_log_barang` VALUES ('16', '2', '2', null, '1970-01-01 00:00:00', 'Barang Keluar2', '2', '1', '2017-01-14 04:32:11', '2017-01-14 04:32:11');
INSERT INTO `data_log_barang` VALUES ('17', '1', '3', null, '1970-01-01 00:00:00', 'Barang Keluar3', '2', '1', '2017-01-14 04:32:11', '2017-01-14 04:32:11');

-- ----------------------------
-- Table structure for data_menu
-- ----------------------------
DROP TABLE IF EXISTS `data_menu`;
CREATE TABLE `data_menu` (
  `id_menu` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seri` int(255) NOT NULL DEFAULT '0',
  `ket` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of data_menu
-- ----------------------------

-- ----------------------------
-- Table structure for data_menu_user
-- ----------------------------
DROP TABLE IF EXISTS `data_menu_user`;
CREATE TABLE `data_menu_user` (
  `id_menu_user` int(10) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_menu_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of data_menu_user
-- ----------------------------

-- ----------------------------
-- Table structure for data_transaksi
-- ----------------------------
DROP TABLE IF EXISTS `data_transaksi`;
CREATE TABLE `data_transaksi` (
  `id_transaksi` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nomor_transaksi` varchar(225) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tgl_transaksi` datetime DEFAULT NULL,
  `status_transaksi` int(1) NOT NULL DEFAULT '1' COMMENT '1=baru 2= selesai bayar ',
  `catatan` varchar(255) DEFAULT NULL,
  `wajib_bayar` decimal(10,0) DEFAULT NULL,
  `jumlah_bayar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data_transaksi
-- ----------------------------
INSERT INTO `data_transaksi` VALUES ('1', '', '1', '1970-01-01 00:00:00', '1', '', '413880', '1000000', '2017-01-14 04:15:01', '2017-01-14 04:15:01');
INSERT INTO `data_transaksi` VALUES ('2', 'TR/142017000002', '1', '1970-01-01 00:00:00', '1', '', '453880', '10000000', '2017-01-14 11:29:10', '2017-01-14 04:29:10');
INSERT INTO `data_transaksi` VALUES ('3', 'TR/142017000003', '1', '1970-01-01 00:00:00', '1', '', '1151649', '100000', '2017-01-14 11:31:41', '2017-01-14 04:31:41');
INSERT INTO `data_transaksi` VALUES ('4', 'TR/142017000004', '1', '1970-01-01 00:00:00', '1', '', '1171647', '1000000', '2017-01-14 11:32:11', '2017-01-14 04:32:11');

-- ----------------------------
-- Table structure for data_transaksi_detail
-- ----------------------------
DROP TABLE IF EXISTS `data_transaksi_detail`;
CREATE TABLE `data_transaksi_detail` (
  `id_transaksi_detail` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(11) DEFAULT NULL,
  `id_barang` bigint(20) DEFAULT NULL,
  `jumlah_out` decimal(10,0) DEFAULT NULL,
  `id_satuan` tinyint(4) DEFAULT NULL,
  `harga_jual` decimal(10,2) DEFAULT NULL,
  `dihapus_pada` datetime DEFAULT NULL,
  `total_harga_item` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_transaksi_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data_transaksi_detail
-- ----------------------------
INSERT INTO `data_transaksi_detail` VALUES ('1', '1', '1', '1', '2', '383883.00', null, '383883', '2017-01-14 04:15:01', '2017-01-14 04:15:01');
INSERT INTO `data_transaksi_detail` VALUES ('2', '1', '2', '1', '3', '9999.00', null, '9999', '2017-01-14 04:15:01', '2017-01-14 04:15:01');
INSERT INTO `data_transaksi_detail` VALUES ('3', '1', '3', '1', '2', '9999.00', null, '9999', '2017-01-14 04:15:01', '2017-01-14 04:15:01');
INSERT INTO `data_transaksi_detail` VALUES ('4', '1', '4', '1', '4', '9999.00', null, '9999', '2017-01-14 04:15:01', '2017-01-14 04:15:01');
INSERT INTO `data_transaksi_detail` VALUES ('5', '2', '1', '1', '2', '383883.00', null, '383883', '2017-01-14 04:29:10', '2017-01-14 04:29:10');
INSERT INTO `data_transaksi_detail` VALUES ('6', '2', '3', '1', '2', '9999.00', null, '9999', '2017-01-14 04:29:10', '2017-01-14 04:29:10');
INSERT INTO `data_transaksi_detail` VALUES ('7', '2', '2', '1', '3', '9999.00', null, '9999', '2017-01-14 04:29:10', '2017-01-14 04:29:10');
INSERT INTO `data_transaksi_detail` VALUES ('8', '2', '4', '1', '4', '9999.00', null, '9999', '2017-01-14 04:29:10', '2017-01-14 04:29:10');
INSERT INTO `data_transaksi_detail` VALUES ('9', '2', '8', '1', '15', '40000.00', null, '40000', '2017-01-14 04:29:10', '2017-01-14 04:29:10');
INSERT INTO `data_transaksi_detail` VALUES ('10', '3', '1', '3', '2', '383883.00', null, '1151649', '2017-01-14 04:31:41', '2017-01-14 04:31:41');
INSERT INTO `data_transaksi_detail` VALUES ('11', '4', '2', '2', '3', '9999.00', null, '19998', '2017-01-14 04:32:11', '2017-01-14 04:32:11');
INSERT INTO `data_transaksi_detail` VALUES ('12', '4', '1', '3', '2', '383883.00', null, '1151649', '2017-01-14 04:32:11', '2017-01-14 04:32:11');

-- ----------------------------
-- Table structure for ref_jenis_bar
-- ----------------------------
DROP TABLE IF EXISTS `ref_jenis_bar`;
CREATE TABLE `ref_jenis_bar` (
  `id_jenis_barang` int(11) NOT NULL AUTO_INCREMENT,
  `nm_jenis_bar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_jenis_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ref_jenis_bar
-- ----------------------------
INSERT INTO `ref_jenis_bar` VALUES ('1', 'alat tulis', null, null);
INSERT INTO `ref_jenis_bar` VALUES ('2', 'kebutuhan sehari hari', null, null);
INSERT INTO `ref_jenis_bar` VALUES ('3', null, null, null);

-- ----------------------------
-- Table structure for ref_satuan
-- ----------------------------
DROP TABLE IF EXISTS `ref_satuan`;
CREATE TABLE `ref_satuan` (
  `id_satuan` int(11) NOT NULL AUTO_INCREMENT,
  `nm_satuan` varchar(100) DEFAULT NULL,
  `satuan` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_satuan`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ref_satuan
-- ----------------------------
INSERT INTO `ref_satuan` VALUES ('1', 'Ampul', 'Ampul', '2015-07-25 15:10:54', '2015-07-25 15:10:56');
INSERT INTO `ref_satuan` VALUES ('2', 'Vial', 'Vial', '2015-09-16 11:37:30', '2015-09-16 11:37:30');
INSERT INTO `ref_satuan` VALUES ('3', 'Fls', 'Fls', '2015-09-16 11:37:30', '2015-09-16 11:37:30');
INSERT INTO `ref_satuan` VALUES ('4', 'Lbr', 'Lembar', '2015-10-29 14:25:11', '2015-10-29 14:25:11');
INSERT INTO `ref_satuan` VALUES ('5', 'Tablet', 'Tablet', '2015-10-29 14:25:11', '2015-10-29 14:25:11');
INSERT INTO `ref_satuan` VALUES ('6', 'Btl', 'Botol', '2015-10-29 14:25:11', '2015-10-29 14:25:11');
INSERT INTO `ref_satuan` VALUES ('7', 'Bh', 'Buah', '2015-10-29 14:25:11', '2015-10-29 14:25:11');
INSERT INTO `ref_satuan` VALUES ('8', 'Lt', 'Liter', '2015-10-29 14:25:11', '2015-10-29 14:25:11');
INSERT INTO `ref_satuan` VALUES ('9', 'Galon', 'Galon', '2015-10-29 14:25:11', '2015-10-29 14:25:11');
INSERT INTO `ref_satuan` VALUES ('10', 'Gulung', 'Gulung', '2015-10-29 14:25:11', '2015-10-29 14:25:11');
INSERT INTO `ref_satuan` VALUES ('11', 'Box', 'Box', '2015-10-29 14:25:11', '2015-10-29 14:25:11');
INSERT INTO `ref_satuan` VALUES ('12', 'cm', 'centimeter', '2015-10-29 14:25:11', '2015-10-29 14:25:11');
INSERT INTO `ref_satuan` VALUES ('13', 'cc', 'cc', '2015-10-29 14:25:11', '2015-10-29 14:25:11');
INSERT INTO `ref_satuan` VALUES ('14', 'ml', 'mililiter', '2015-10-29 14:25:11', '2015-10-29 14:25:11');
INSERT INTO `ref_satuan` VALUES ('15', 'Strip', 'Strip', '2015-10-29 14:25:11', '2015-10-29 14:25:11');
INSERT INTO `ref_satuan` VALUES ('16', 'mg', 'miligram', '2015-10-29 14:25:11', '2015-10-29 14:25:11');
INSERT INTO `ref_satuan` VALUES ('17', 'Gr', 'Gram', '2015-10-29 14:25:11', '2015-10-29 14:25:11');
INSERT INTO `ref_satuan` VALUES ('18', 'Potong', 'Potong', '2015-10-29 14:25:11', '2015-10-29 14:25:11');
INSERT INTO `ref_satuan` VALUES ('19', 'Pcs', 'Pcs', '2015-10-29 14:25:11', '2015-10-29 14:25:11');
INSERT INTO `ref_satuan` VALUES ('20', 'Biji', 'Biji', '2015-10-29 14:25:11', '2015-10-29 14:25:11');
INSERT INTO `ref_satuan` VALUES ('21', 'Tube', 'Tube', '2015-10-29 14:25:11', '2015-10-29 14:25:11');
INSERT INTO `ref_satuan` VALUES ('22', 'Pasang', 'Pasang', '2015-10-29 14:25:11', '2015-10-29 14:25:11');
INSERT INTO `ref_satuan` VALUES ('23', 'Kapsul', 'Kapsul', '2015-10-29 14:25:11', '2015-10-29 14:25:11');
INSERT INTO `ref_satuan` VALUES ('24', 'Kaplet', 'Kaplet', '2015-10-29 14:25:11', '2015-10-29 14:25:11');
INSERT INTO `ref_satuan` VALUES ('25', 'pak', 'pak', '2015-10-29 14:25:11', '2015-10-29 14:25:11');
INSERT INTO `ref_satuan` VALUES ('26', 'sch', 'sch', '2015-10-29 14:25:11', '2015-10-29 14:25:11');
INSERT INTO `ref_satuan` VALUES ('27', 'Slice', 'Slice', '2015-10-29 14:25:11', '2015-10-29 14:25:11');
INSERT INTO `ref_satuan` VALUES ('28', 'Kg', 'Kilogram', '2015-10-29 14:25:11', '2015-10-29 14:25:11');
INSERT INTO `ref_satuan` VALUES ('29', 'Rim', 'Rim', '2015-10-29 14:25:11', '2015-10-29 14:25:11');
INSERT INTO `ref_satuan` VALUES ('30', 'Set', 'Set', '2015-10-29 14:25:11', '2015-10-29 14:25:11');
INSERT INTO `ref_satuan` VALUES ('31', 'Unit', 'Unit', '2015-10-29 14:25:11', '2015-10-29 14:25:11');
INSERT INTO `ref_satuan` VALUES ('32', 'Mikron', 'Mikron', '2015-10-29 14:25:11', '2015-10-29 14:25:11');
INSERT INTO `ref_satuan` VALUES ('33', 'Bungkus', 'Bungkus', '2015-10-29 14:25:11', '2015-10-29 14:25:11');
INSERT INTO `ref_satuan` VALUES ('34', 'Can', 'Can', '2015-11-20 11:26:57', '2015-11-20 11:26:57');
INSERT INTO `ref_satuan` VALUES ('35', 'Cyl', 'Cyl', '2015-12-21 16:29:38', '2015-12-21 16:29:38');
INSERT INTO `ref_satuan` VALUES ('36', 'Kaleng', 'Kaleng', '2015-12-21 16:29:49', '2015-12-21 16:29:49');
INSERT INTO `ref_satuan` VALUES ('37', 'Menit', 'Menit', '2015-12-21 16:29:49', '2015-12-21 16:29:49');
INSERT INTO `ref_satuan` VALUES ('38', 'Srynge', 'Srynge', '2015-12-21 16:29:49', '2015-12-21 16:29:49');
INSERT INTO `ref_satuan` VALUES ('39', 'Supp', 'Supp', '2015-12-21 16:29:49', '2015-12-21 16:29:49');
INSERT INTO `ref_satuan` VALUES ('40', 'Tabung', 'Tabung', '2015-12-21 16:29:49', '2015-12-21 16:29:49');
INSERT INTO `ref_satuan` VALUES ('41', 'Buku', 'Buku', '2015-12-21 16:29:49', '2015-12-21 16:29:49');
INSERT INTO `ref_satuan` VALUES ('42', 'Pouch', 'Pouch', '2015-12-21 16:29:49', '2015-12-21 16:29:49');
INSERT INTO `ref_satuan` VALUES ('43', 'meter', 'mtr', '2016-01-26 14:10:49', '2016-01-26 14:10:49');
INSERT INTO `ref_satuan` VALUES ('44', 'Tes', 'Tes', '2016-03-02 15:35:16', '2016-03-02 15:35:16');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_karyawan` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `time_online` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `status_user` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `permission` int(11) NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'avatar1.png',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `users_username_unique` (`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('9', '1', 'Bedes', 'dooaankh@gmail.com', 'astuti', '$2y$10$.bFsj43iFLB/LyxK8KqC5ecszSdmbKD9P6uEpejx9cKC9vywSr9X.', '1483453337', 'Hey You!', '1', '3', 'avatar6.png', 'majpPEKENnYPDcIXhyuc6nzr3wHCZvtqJHqjumpRoHW65bZz7ZSJlOaVWiFy', '2015-07-28 21:11:13', '2017-01-13 16:16:22');

-- ----------------------------
-- View structure for view_barang
-- ----------------------------
DROP VIEW IF EXISTS `view_barang`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `view_barang` AS SELECT
	YEAR (`data_barang`.`created_at`) AS `tahun`,
	count(0) AS `jumlah`
FROM
	`data_barang`
GROUP BY
	YEAR (`data_barang`.`created_at`) ;

-- ----------------------------
-- View structure for view_transaksi
-- ----------------------------
DROP VIEW IF EXISTS `view_transaksi`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `view_transaksi` AS SELECT
	YEAR (`data_transaksi`.`created_at`) AS `tahun`,
	count(0) AS `jumlah`
FROM
	`data_transaksi`
GROUP BY
	YEAR (`data_transaksi`.`created_at`) ;
