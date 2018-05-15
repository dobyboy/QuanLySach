/*
Navicat MySQL Data Transfer

Source Server         : conn
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : db_quanlysach

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-05-11 09:17:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for binh_luandanh_gia
-- ----------------------------
DROP TABLE IF EXISTS `binh_luandanh_gia`;
CREATE TABLE `binh_luandanh_gia` (
  `id_binh_luan` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thoi_gian` date NOT NULL,
  `id_tk` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_sach` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diem_danh_gia` int(11) NOT NULL,
  PRIMARY KEY (`id_binh_luan`),
  KEY `FK_tk` (`id_tk`) USING BTREE,
  KEY `FK_bl_sach` (`id_sach`) USING BTREE,
  CONSTRAINT `FK_bl_sach` FOREIGN KEY (`id_sach`) REFERENCES `sach` (`id_sach`),
  CONSTRAINT `FK_tk` FOREIGN KEY (`id_tk`) REFERENCES `tai_khoan` (`id_tk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of binh_luandanh_gia
-- ----------------------------
INSERT INTO `binh_luandanh_gia` VALUES ('BL001', 'Tuyệt vời', '2018-05-10', 'TK001', 's0005', '3');
INSERT INTO `binh_luandanh_gia` VALUES ('BL002', 'hay', '2018-05-10', 'TK001', 's0007', '2');
INSERT INTO `binh_luandanh_gia` VALUES ('BL003', 'Cũng hay', '2018-05-10', 'TK001', 's0021', '3');
INSERT INTO `binh_luandanh_gia` VALUES ('BL004', 'Mình rất thích nhé', '2018-05-10', 'TK001', 's0004', '3');
INSERT INTO `binh_luandanh_gia` VALUES ('BL005', '', '2018-05-10', 'TK001', 's0019', '3');
INSERT INTO `binh_luandanh_gia` VALUES ('BL006', '', '2018-05-10', 'TK001', 's0010', '4');
INSERT INTO `binh_luandanh_gia` VALUES ('BL007', 'được', '2018-05-10', 'TK002', 's0008', '3');
INSERT INTO `binh_luandanh_gia` VALUES ('BL008', 'khá hay nên đọc thử', '2018-05-10', 'TK002', 's0006', '3');

-- ----------------------------
-- Table structure for chi_tiet_don_hang
-- ----------------------------
DROP TABLE IF EXISTS `chi_tiet_don_hang`;
CREATE TABLE `chi_tiet_don_hang` (
  `id_don_hang` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_sach` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_luong` int(11) NOT NULL,
  `don_gia` double NOT NULL,
  KEY `FK_ctdh_sach` (`id_sach`) USING BTREE,
  KEY `FK_ctdh_dh` (`id_don_hang`),
  CONSTRAINT `FK_ctdh_dh` FOREIGN KEY (`id_don_hang`) REFERENCES `don_hang` (`id_don_hang`),
  CONSTRAINT `FK_ctdh_sach` FOREIGN KEY (`id_sach`) REFERENCES `sach` (`id_sach`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of chi_tiet_don_hang
-- ----------------------------
INSERT INTO `chi_tiet_don_hang` VALUES ('DH001', 's0007', '1', '43500');
INSERT INTO `chi_tiet_don_hang` VALUES ('DH001', 's0008', '1', '69000');
INSERT INTO `chi_tiet_don_hang` VALUES ('DH001', 's0010', '1', '60000');
INSERT INTO `chi_tiet_don_hang` VALUES ('DH002', 's0010', '1', '60000');
INSERT INTO `chi_tiet_don_hang` VALUES ('DH003', 's0019', '1', '36000');
INSERT INTO `chi_tiet_don_hang` VALUES ('DH004', 's0019', '1', '36000');
INSERT INTO `chi_tiet_don_hang` VALUES ('DH005', 's0020', '1', '16000');
INSERT INTO `chi_tiet_don_hang` VALUES ('DH005', 's0018', '1', '46000');

-- ----------------------------
-- Table structure for chi_tiet_gio_hang
-- ----------------------------
DROP TABLE IF EXISTS `chi_tiet_gio_hang`;
CREATE TABLE `chi_tiet_gio_hang` (
  `id_gio_hang` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_sach` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_luong` int(11) NOT NULL,
  `don_gia` double NOT NULL,
  KEY `FK_ctgh_sach` (`id_sach`) USING BTREE,
  KEY `FK_ctgh` (`id_gio_hang`) USING BTREE,
  CONSTRAINT `FK_ctgh` FOREIGN KEY (`id_gio_hang`) REFERENCES `gio_hang` (`id_gio_hang`),
  CONSTRAINT `FK_ctgh_sach` FOREIGN KEY (`id_sach`) REFERENCES `sach` (`id_sach`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of chi_tiet_gio_hang
-- ----------------------------
INSERT INTO `chi_tiet_gio_hang` VALUES ('GH001', 's0007', '1', '43500');
INSERT INTO `chi_tiet_gio_hang` VALUES ('GH001', 's0008', '1', '69000');
INSERT INTO `chi_tiet_gio_hang` VALUES ('GH001', 's0010', '1', '60000');
INSERT INTO `chi_tiet_gio_hang` VALUES ('GH003', 's0010', '1', '60000');
INSERT INTO `chi_tiet_gio_hang` VALUES ('GH005', 's0019', '1', '36000');
INSERT INTO `chi_tiet_gio_hang` VALUES ('GH006', 's0019', '1', '36000');
INSERT INTO `chi_tiet_gio_hang` VALUES ('GH007', 's0020', '1', '16000');
INSERT INTO `chi_tiet_gio_hang` VALUES ('GH007', 's0018', '1', '46000');

-- ----------------------------
-- Table structure for chi_tiet_phieu_nhap
-- ----------------------------
DROP TABLE IF EXISTS `chi_tiet_phieu_nhap`;
CREATE TABLE `chi_tiet_phieu_nhap` (
  `id_phieu_nhap` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_sach` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_luong` int(11) NOT NULL,
  `don_gia` double NOT NULL,
  KEY `FK_ctpn_pn` (`id_phieu_nhap`) USING BTREE,
  KEY `FK_ctpn_sach` (`id_sach`) USING BTREE,
  CONSTRAINT `FK_ctpn_pn` FOREIGN KEY (`id_phieu_nhap`) REFERENCES `phieu_nhap` (`id_phieu_nhap`),
  CONSTRAINT `FK_ctpn_sach` FOREIGN KEY (`id_sach`) REFERENCES `sach` (`id_sach`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of chi_tiet_phieu_nhap
-- ----------------------------

-- ----------------------------
-- Table structure for dich_gia
-- ----------------------------
DROP TABLE IF EXISTS `dich_gia`;
CREATE TABLE `dich_gia` (
  `id_dichgia` int(5) NOT NULL,
  `ten_dichgia` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_dichgia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of dich_gia
-- ----------------------------
INSERT INTO `dich_gia` VALUES ('0', null);
INSERT INTO `dich_gia` VALUES ('1', 'Lương Trọng Vũ ');
INSERT INTO `dich_gia` VALUES ('2', 'Phương Lan ');
INSERT INTO `dich_gia` VALUES ('3', 'Trinh Lan');
INSERT INTO `dich_gia` VALUES ('4', 'Nguyễn Thị Thu Hiền ');
INSERT INTO `dich_gia` VALUES ('5', ' Phạm Thị Thanh Vân ');
INSERT INTO `dich_gia` VALUES ('6', 'Nhân Văn ');
INSERT INTO `dich_gia` VALUES ('7', ' Lan Hương ');

-- ----------------------------
-- Table structure for don_hang
-- ----------------------------
DROP TABLE IF EXISTS `don_hang`;
CREATE TABLE `don_hang` (
  `id_don_hang` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_tk` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngay_dat_hang` date NOT NULL,
  `ngay_duyet_don_hang` date DEFAULT NULL,
  `ngay_giao_hang` date DEFAULT NULL,
  `ngay_nhan_hang` date DEFAULT NULL,
  `dia_chi_nhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh_thuc_thanh_toan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthai` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_don_hang`),
  KEY `FK_dh_tk` (`id_tk`) USING BTREE,
  CONSTRAINT `FK_dh_tk` FOREIGN KEY (`id_tk`) REFERENCES `tai_khoan` (`id_tk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of don_hang
-- ----------------------------
INSERT INTO `don_hang` VALUES ('DH001', 'TK001', '2018-05-10', null, null, null, 'Tp HCM', 'Thanh toán bằng tiền mặt khi nhận hàng', 'Chưa duyệt');
INSERT INTO `don_hang` VALUES ('DH002', 'TK002', '2018-05-10', null, null, null, 'Ninh kiều Cần Thơ', 'Thanh toán bằng tiền mặt khi nhận hàng', 'Chưa duyệt');
INSERT INTO `don_hang` VALUES ('DH003', 'TK004', '2018-05-11', null, null, null, '', 'Thanh toán bằng tiền mặt khi nhận hàng', 'Đã hủy');
INSERT INTO `don_hang` VALUES ('DH004', 'TK004', '2018-05-11', null, null, null, '', 'Thanh toán bằng tiền mặt khi nhận hàng', 'Đã hủy');
INSERT INTO `don_hang` VALUES ('DH005', 'TK004', '2018-05-11', null, null, null, '', 'Thanh toán bằng tiền mặt khi nhận hàng', 'Đã hủy');

-- ----------------------------
-- Table structure for gia_sach
-- ----------------------------
DROP TABLE IF EXISTS `gia_sach`;
CREATE TABLE `gia_sach` (
  `id_sach` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` double NOT NULL,
  `ngay_cap_nhat` date NOT NULL,
  KEY `fk_sach_giasach` (`id_sach`),
  CONSTRAINT `fk_sach_giasach` FOREIGN KEY (`id_sach`) REFERENCES `sach` (`id_sach`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of gia_sach
-- ----------------------------
INSERT INTO `gia_sach` VALUES ('s0001', '186000', '2018-05-05');
INSERT INTO `gia_sach` VALUES ('s0002', '119000', '2018-05-05');
INSERT INTO `gia_sach` VALUES ('s0003', '517000', '2018-05-05');
INSERT INTO `gia_sach` VALUES ('s0004', '317000', '2018-05-05');
INSERT INTO `gia_sach` VALUES ('s0005', '24000', '2018-05-05');
INSERT INTO `gia_sach` VALUES ('s0006', '151000', '2018-05-05');
INSERT INTO `gia_sach` VALUES ('s0007', '58000', '2018-05-05');
INSERT INTO `gia_sach` VALUES ('s0008', '69000', '2018-05-05');
INSERT INTO `gia_sach` VALUES ('s0009', '66000', '2018-05-05');
INSERT INTO `gia_sach` VALUES ('s0010', '60000', '2018-05-05');
INSERT INTO `gia_sach` VALUES ('s0011', '65000', '2018-05-05');
INSERT INTO `gia_sach` VALUES ('s0012', '23000', '2018-05-05');
INSERT INTO `gia_sach` VALUES ('s0013', '24000', '2018-05-05');
INSERT INTO `gia_sach` VALUES ('s0014', '38000', '2018-05-05');
INSERT INTO `gia_sach` VALUES ('s0015', '76000', '2018-05-05');
INSERT INTO `gia_sach` VALUES ('s0016', '35000', '2018-05-05');
INSERT INTO `gia_sach` VALUES ('s0017', '103000', '2018-05-05');
INSERT INTO `gia_sach` VALUES ('s0018', '46000', '2018-05-05');
INSERT INTO `gia_sach` VALUES ('s0019', '36000', '2018-05-05');
INSERT INTO `gia_sach` VALUES ('s0020', '16000', '2018-05-05');
INSERT INTO `gia_sach` VALUES ('s0021', '187000', '2018-05-05');

-- ----------------------------
-- Table structure for gio_hang
-- ----------------------------
DROP TABLE IF EXISTS `gio_hang`;
CREATE TABLE `gio_hang` (
  `id_gio_hang` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_tk` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trang_thai` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_gio_hang`),
  KEY `FK_gh_tk` (`id_tk`) USING BTREE,
  CONSTRAINT `FK_gh_tk` FOREIGN KEY (`id_tk`) REFERENCES `tai_khoan` (`id_tk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of gio_hang
-- ----------------------------
INSERT INTO `gio_hang` VALUES ('GH001', 'TK001', '1');
INSERT INTO `gio_hang` VALUES ('GH002', 'TK001', '0');
INSERT INTO `gio_hang` VALUES ('GH003', 'TK002', '1');
INSERT INTO `gio_hang` VALUES ('GH004', 'TK002', '0');
INSERT INTO `gio_hang` VALUES ('GH005', 'TK004', '1');
INSERT INTO `gio_hang` VALUES ('GH006', 'TK004', '1');
INSERT INTO `gio_hang` VALUES ('GH007', 'TK004', '1');
INSERT INTO `gio_hang` VALUES ('GH008', 'TK004', '0');

-- ----------------------------
-- Table structure for hinh_anh_km
-- ----------------------------
DROP TABLE IF EXISTS `hinh_anh_km`;
CREATE TABLE `hinh_anh_km` (
  `link_anh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_khuyenmai` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  KEY `fk_tintuc_khuyenmai` (`id_khuyenmai`),
  CONSTRAINT `fk_tintuc_khuyenmai` FOREIGN KEY (`id_khuyenmai`) REFERENCES `khuyen_mai` (`id_km`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of hinh_anh_km
-- ----------------------------

-- ----------------------------
-- Table structure for hinh_anh_sach
-- ----------------------------
DROP TABLE IF EXISTS `hinh_anh_sach`;
CREATE TABLE `hinh_anh_sach` (
  `id_sach` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lienket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  KEY `FK_hinh` (`id_sach`) USING BTREE,
  CONSTRAINT `FK_hinh` FOREIGN KEY (`id_sach`) REFERENCES `sach` (`id_sach`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of hinh_anh_sach
-- ----------------------------
INSERT INTO `hinh_anh_sach` VALUES ('s0001', 'tu-dai-quyen-luc.jpg');
INSERT INTO `hinh_anh_sach` VALUES ('s0002', 'bi-quyet-ty-phu.jpg');
INSERT INTO `hinh_anh_sach` VALUES ('s0003', 'tai-lieu-mat.jpg');
INSERT INTO `hinh_anh_sach` VALUES ('s0004', 'tuoi-tre-dang-gia-bao-nhieu.jpg');
INSERT INTO `hinh_anh_sach` VALUES ('s0005', '8-buoc-dan-den-thanh-cong.jpg');
INSERT INTO `hinh_anh_sach` VALUES ('s0006', 'block-chain.jpg');
INSERT INTO `hinh_anh_sach` VALUES ('s0007', 'xin-chao-nhung-buoi-sang.jpg');
INSERT INTO `hinh_anh_sach` VALUES ('s0008', 'thanh-xuan-cua-chung-ta-dai-bao-lau.jpg');
INSERT INTO `hinh_anh_sach` VALUES ('s0009', 'co-don-de-truong-thanh.jpg');
INSERT INTO `hinh_anh_sach` VALUES ('s0010', 'dau-do-van-co-tinh-yeu.jpg');
INSERT INTO `hinh_anh_sach` VALUES ('s0011', 'nhung-buoc-chan-lang-thang.jpg');
INSERT INTO `hinh_anh_sach` VALUES ('s0012', 'mua-canh-moi.jpg');
INSERT INTO `hinh_anh_sach` VALUES ('s0013', 'bong-dung-thanh-khong-lo.jpg');
INSERT INTO `hinh_anh_sach` VALUES ('s0014', 'truyen-trang-quynh.jpg');
INSERT INTO `hinh_anh_sach` VALUES ('s0015', 'co-tich-the-gioi.jpg');
INSERT INTO `hinh_anh_sach` VALUES ('s0016', 'doi-dep-cao-su.jpg');
INSERT INTO `hinh_anh_sach` VALUES ('s0017', 'cha-me-vo-dieu-kien.jpg');
INSERT INTO `hinh_anh_sach` VALUES ('s0018', 'ky-nang-song.jpg');
INSERT INTO `hinh_anh_sach` VALUES ('s0019', 'bo-me-tung-la-tre-con.jpg');
INSERT INTO `hinh_anh_sach` VALUES ('s0020', 'nhung-bai-hoc-tre-con.jpg');
INSERT INTO `hinh_anh_sach` VALUES ('s0021', 'tha-thinh.jpg');

-- ----------------------------
-- Table structure for kho
-- ----------------------------
DROP TABLE IF EXISTS `kho`;
CREATE TABLE `kho` (
  `id_sach` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_luong_sach` int(3) NOT NULL,
  KEY `fk_kho_sach` (`id_sach`),
  CONSTRAINT `fk_kho_sach` FOREIGN KEY (`id_sach`) REFERENCES `sach` (`id_sach`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kho
-- ----------------------------
INSERT INTO `kho` VALUES ('s0001', '10');
INSERT INTO `kho` VALUES ('s0002', '10');
INSERT INTO `kho` VALUES ('s0003', '15');
INSERT INTO `kho` VALUES ('s0004', '5');
INSERT INTO `kho` VALUES ('s0005', '0');
INSERT INTO `kho` VALUES ('s0006', '11');
INSERT INTO `kho` VALUES ('s0007', '0');
INSERT INTO `kho` VALUES ('s0009', '18');
INSERT INTO `kho` VALUES ('s0010', '13');
INSERT INTO `kho` VALUES ('s0011', '0');
INSERT INTO `kho` VALUES ('s0012', '16');
INSERT INTO `kho` VALUES ('s0013', '5');
INSERT INTO `kho` VALUES ('s0014', '14');
INSERT INTO `kho` VALUES ('s0015', '13');
INSERT INTO `kho` VALUES ('s0016', '17');
INSERT INTO `kho` VALUES ('s0017', '13');
INSERT INTO `kho` VALUES ('s0018', '10');
INSERT INTO `kho` VALUES ('s0019', '4');
INSERT INTO `kho` VALUES ('s0020', '11');
INSERT INTO `kho` VALUES ('s0021', '9');
INSERT INTO `kho` VALUES ('s0008', '0');

-- ----------------------------
-- Table structure for khuyen_mai
-- ----------------------------
DROP TABLE IF EXISTS `khuyen_mai`;
CREATE TABLE `khuyen_mai` (
  `id_km` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_km` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia_tri` double NOT NULL,
  `ngaybatdau` date NOT NULL,
  `ngayketthuc` date NOT NULL,
  `id_sach` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_km`),
  KEY `FK_km_sach` (`id_sach`) USING BTREE,
  CONSTRAINT `FK_km_sach` FOREIGN KEY (`id_sach`) REFERENCES `sach` (`id_sach`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of khuyen_mai
-- ----------------------------
INSERT INTO `khuyen_mai` VALUES ('12', 'khuyến mãi 1/5', '25', '2018-05-09', '2018-05-11', 's0007');
INSERT INTO `khuyen_mai` VALUES ('km001', 'lễ 30/4', '20', '2018-05-01', '2018-05-05', 's0004');

-- ----------------------------
-- Table structure for kich_thuoc
-- ----------------------------
DROP TABLE IF EXISTS `kich_thuoc`;
CREATE TABLE `kich_thuoc` (
  `id_kichthuoc` int(3) NOT NULL,
  `kich_thuoc` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kichthuoc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kich_thuoc
-- ----------------------------
INSERT INTO `kich_thuoc` VALUES ('1', '13x19cm');
INSERT INTO `kich_thuoc` VALUES ('2', '14,5×20,5cm');
INSERT INTO `kich_thuoc` VALUES ('3', '17x24cm ');
INSERT INTO `kich_thuoc` VALUES ('4', '20,5 x28,5cm');
INSERT INTO `kich_thuoc` VALUES ('5', '10 cm x 15 cm ');

-- ----------------------------
-- Table structure for loai_bia
-- ----------------------------
DROP TABLE IF EXISTS `loai_bia`;
CREATE TABLE `loai_bia` (
  `id_loaibia` int(3) NOT NULL,
  `ten_loaibia` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_loaibia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of loai_bia
-- ----------------------------
INSERT INTO `loai_bia` VALUES ('1', 'Bìa cứng');
INSERT INTO `loai_bia` VALUES ('2', 'Bìa Mềm');

-- ----------------------------
-- Table structure for loai_sach
-- ----------------------------
DROP TABLE IF EXISTS `loai_sach`;
CREATE TABLE `loai_sach` (
  `id_loai_sach` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_loai_sach` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_loai_sach`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of loai_sach
-- ----------------------------
INSERT INTO `loai_sach` VALUES ('ls001', 'Sách văn học');
INSERT INTO `loai_sach` VALUES ('ls002', 'Sách kinh tế');
INSERT INTO `loai_sach` VALUES ('ls003', 'Sách thiếu nhi');
INSERT INTO `loai_sach` VALUES ('ls004', 'Sách kỹ năng - sống đẹp');
INSERT INTO `loai_sach` VALUES ('ls005', 'Sách tham khảo');
INSERT INTO `loai_sach` VALUES ('ls006', 'Sách ngoại ngữ');
INSERT INTO `loai_sach` VALUES ('ls007', 'Sách kiến thức tổng hợp');
INSERT INTO `loai_sach` VALUES ('ls008', 'Sách công nghệ thông tin');
INSERT INTO `loai_sach` VALUES ('ls009', 'Sách y học');
INSERT INTO `loai_sach` VALUES ('ls010', 'Sách văn hóa - du lịch');

-- ----------------------------
-- Table structure for loai_tai_khoan
-- ----------------------------
DROP TABLE IF EXISTS `loai_tai_khoan`;
CREATE TABLE `loai_tai_khoan` (
  `id_loai_tk` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_loai_tk` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_loai_tk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of loai_tai_khoan
-- ----------------------------
INSERT INTO `loai_tai_khoan` VALUES ('L001', 'admin', 'quản lý');
INSERT INTO `loai_tai_khoan` VALUES ('L002', 'customer', 'khách hàng');
INSERT INTO `loai_tai_khoan` VALUES ('L003', 'visitor', 'Chưa có tài khoản');

-- ----------------------------
-- Table structure for luong_nv
-- ----------------------------
DROP TABLE IF EXISTS `luong_nv`;
CREATE TABLE `luong_nv` (
  `id_tk` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `luong` double NOT NULL,
  KEY `fk_luong_nv` (`id_tk`),
  CONSTRAINT `fk_luong_nv` FOREIGN KEY (`id_tk`) REFERENCES `tai_khoan` (`id_tk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of luong_nv
-- ----------------------------

-- ----------------------------
-- Table structure for nha_cung_cap
-- ----------------------------
DROP TABLE IF EXISTS `nha_cung_cap`;
CREATE TABLE `nha_cung_cap` (
  `id_nha_cung_cap` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_nha_cung_cap` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_nha_cung_cap`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of nha_cung_cap
-- ----------------------------
INSERT INTO `nha_cung_cap` VALUES ('001', 'Tiki tradding');
INSERT INTO `nha_cung_cap` VALUES ('002', 'Tiki tradding');
INSERT INTO `nha_cung_cap` VALUES ('003', 'Sách Hà Nội');
INSERT INTO `nha_cung_cap` VALUES ('004', 'Nhân văn');
INSERT INTO `nha_cung_cap` VALUES ('005', 'Tân việt');
INSERT INTO `nha_cung_cap` VALUES ('006', 'Nhà sách sao mai');
INSERT INTO `nha_cung_cap` VALUES ('007', 'Văn Lang');
INSERT INTO `nha_cung_cap` VALUES ('008', 'Nhà sách lao động');
INSERT INTO `nha_cung_cap` VALUES ('009', 'Trí việt');
INSERT INTO `nha_cung_cap` VALUES ('010', 'Rbooks Corp');
INSERT INTO `nha_cung_cap` VALUES ('011', ' 1980Books');
INSERT INTO `nha_cung_cap` VALUES ('012', 'Người Trẻ Việt');
INSERT INTO `nha_cung_cap` VALUES ('013', ' NXB Kim Đồng');
INSERT INTO `nha_cung_cap` VALUES ('014', ' Nxb Tổng hợp TP.HCM');
INSERT INTO `nha_cung_cap` VALUES ('015', ' Quảng Văn');
INSERT INTO `nha_cung_cap` VALUES ('016', ' NXB Văn hóa - Văn nghệ');

-- ----------------------------
-- Table structure for nha_xuat_ban
-- ----------------------------
DROP TABLE IF EXISTS `nha_xuat_ban`;
CREATE TABLE `nha_xuat_ban` (
  `id_nxb` int(3) NOT NULL,
  `ten_nxb` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_nxb`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of nha_xuat_ban
-- ----------------------------
INSERT INTO `nha_xuat_ban` VALUES ('1', 'Nhà xuất bản Kim Đồng');
INSERT INTO `nha_xuat_ban` VALUES ('2', 'Nhà xuất bản Trẻ');
INSERT INTO `nha_xuat_ban` VALUES ('3', 'Nhà xuất bản Tổng hợp thành phố Hồ Chí Minh');
INSERT INTO `nha_xuat_ban` VALUES ('4', 'Nhà xuất bản Giáo Dục');
INSERT INTO `nha_xuat_ban` VALUES ('5', 'Nhà xuất bản thông tin và truyền thông');
INSERT INTO `nha_xuat_ban` VALUES ('6', 'Nhà xuất bản lao động');
INSERT INTO `nha_xuat_ban` VALUES ('7', 'Nhà xuất bản giao thông vận tải');
INSERT INTO `nha_xuat_ban` VALUES ('8', 'Nhà xuất bản chính trị quốc gia');
INSERT INTO `nha_xuat_ban` VALUES ('9', 'Nxb Hội Nhà Văn');
INSERT INTO `nha_xuat_ban` VALUES ('10', ' Nxb văn học');
INSERT INTO `nha_xuat_ban` VALUES ('11', ' Nxb Hà Nội');
INSERT INTO `nha_xuat_ban` VALUES ('12', ' Nxb Tổng hợp TP.HCM');
INSERT INTO `nha_xuat_ban` VALUES ('13', ' NXB Dân Trí');
INSERT INTO `nha_xuat_ban` VALUES ('14', ' NXB Phụ Nữ');
INSERT INTO `nha_xuat_ban` VALUES ('15', ' NXB Văn hóa - Văn nghệ');
INSERT INTO `nha_xuat_ban` VALUES ('16', ' Nxb Thế giới');

-- ----------------------------
-- Table structure for phieu_nhap
-- ----------------------------
DROP TABLE IF EXISTS `phieu_nhap`;
CREATE TABLE `phieu_nhap` (
  `id_phieu_nhap` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_nhap` date NOT NULL,
  `id_tk` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_nha_cung_cap` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_phieu_nhap`),
  KEY `FK_pn_ncc` (`id_nha_cung_cap`) USING BTREE,
  KEY `FK_pn_tk` (`id_tk`) USING BTREE,
  CONSTRAINT `FK_pn_ncc` FOREIGN KEY (`id_nha_cung_cap`) REFERENCES `nha_cung_cap` (`id_nha_cung_cap`),
  CONSTRAINT `FK_pn_tk` FOREIGN KEY (`id_tk`) REFERENCES `tai_khoan` (`id_tk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of phieu_nhap
-- ----------------------------

-- ----------------------------
-- Table structure for sach
-- ----------------------------
DROP TABLE IF EXISTS `sach`;
CREATE TABLE `sach` (
  `id_sach` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_sach` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_xuat_ban` date NOT NULL,
  `so_trang` int(11) NOT NULL,
  `ma_sach` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthaikinhdoanh` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_kichthuoc` int(3) NOT NULL,
  `id_tac_gia` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_dichgia` int(5) DEFAULT NULL,
  `id_loai_sach` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_nha_cung_cap` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_loaibia` int(3) NOT NULL,
  `id_nxb` int(3) NOT NULL,
  PRIMARY KEY (`id_sach`),
  KEY `FK_loai_sach` (`id_loai_sach`) USING BTREE,
  KEY `FK_nha_cung_cap` (`id_nha_cung_cap`) USING BTREE,
  KEY `FK_tac_gia` (`id_tac_gia`) USING BTREE,
  KEY `FK_dich_gia` (`id_dichgia`),
  KEY `FK_loai_bia` (`id_loaibia`),
  KEY `FK_kichthuoc` (`id_kichthuoc`),
  KEY `fk_nxb` (`id_nxb`),
  CONSTRAINT `FK_dich_gia` FOREIGN KEY (`id_dichgia`) REFERENCES `dich_gia` (`id_dichgia`),
  CONSTRAINT `FK_kichthuoc` FOREIGN KEY (`id_kichthuoc`) REFERENCES `kich_thuoc` (`id_kichthuoc`),
  CONSTRAINT `FK_loai_bia` FOREIGN KEY (`id_loaibia`) REFERENCES `loai_bia` (`id_loaibia`),
  CONSTRAINT `FK_loai_sach` FOREIGN KEY (`id_loai_sach`) REFERENCES `loai_sach` (`id_loai_sach`),
  CONSTRAINT `FK_nha_cung_cap` FOREIGN KEY (`id_nha_cung_cap`) REFERENCES `nha_cung_cap` (`id_nha_cung_cap`),
  CONSTRAINT `FK_tac_gia` FOREIGN KEY (`id_tac_gia`) REFERENCES `tac_gia` (`id_tac_gia`),
  CONSTRAINT `fk_nxb` FOREIGN KEY (`id_nxb`) REFERENCES `nha_xuat_ban` (`id_nxb`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of sach
-- ----------------------------
INSERT INTO `sach` VALUES ('s0001', 'Tứ Đại Quyền Lực', '“Đây là quái vật của dòng sách kinh tế. Cuốn sách thiết yếu và bao quát này hết sức sắc bén, thú vị và cay nghiệt. Những nhận xét thẳng và thật của Scott Galloway chẳng kiêng dè bất cứ một đại gia công nghệ nào. Thực sự là một cuốn sách đáng đọc”, Chuyên gia tâm lý Adam Alter, giảng viên ngành tâm lý học tại trường kinh doanh Stern thuộc Đại học New York nhận xét như thế khi đọc xong Tứ Đại Quyền Lực. Đây là cuốn sách đầu tay của Scott Galloway, một giáo sư tại khoa Kinh doanh Stern thuộc đại học New York, phụ trách giảng dạy về chiến lược thương hiệu và tiếp thị số cho các học viên MBA năm thứ hai.', '2018-05-05', '272', '8935086844915', 'Ngừng kinh doanh', '1', 'tg011', '1', 'ls002', '009', '1', '3');
INSERT INTO `sach` VALUES ('s0002', 'Bí Quyết Của Các Tỷ Phú Tự Thân Lập Nghiệp', 'Bí quyết của các tỷ phú tự thân lập nghiệp là công trình do hai tác giả John Sviokla và Mitch Cohen thực hiện nhằm giải đáp cho những thắc mắc liên quan đến những tên tuổi đã tạo ra những thương hiệu, sản phẩm mà hầu hết chúng ta đều tin dùng ', '2018-05-05', '360', ' 8935251400359', null, '2', 'tg012', '2', 'ls002', '003', '2', '3');
INSERT INTO `sach` VALUES ('s0003', 'Tài Liệu Mật - Hồi Ký Về Cuộc Chiến Tranh Việt Nam Và Vụ Tiết Lộ Hồ Sơ Lầu Năm Góc', 'Tài Liệu Mật: Hồi Ký Về Chiến Tranh Việt Nam Và Vụ Tiết Lộ Hồ Sơ Lầu Năm Góc là cuốn hồi ký chính trị sâu sắc của Daniel Ellsberg được xuất bản vào năm 2002, trở thành cuốn sách bán chạy nhất, gây xôn xao nước Mỹ. Hồi ký của Ellsberg tường', '2018-05-05', '600', '9786047231089', null, '1', 'tg010', '2', 'ls002', '004', '2', '2');
INSERT INTO `sach` VALUES ('s0004', 'Tuổi Trẻ Đáng Giá Bao Nhiêu?', '“Bạn hối tiếc vì không nắm bắt lấy một cơ hội nào đó, chẳng có ai phải mất ngủ.Bạn trải qua những ngày tháng nhạt nhẽo với công việc bạn căm ghét, người ta chẳng hề bận lòng.Bạn có chết mòn nơi xó tường với những ước mơ dang dở, đó ', '2018-05-05', '292', '8935235210264', null, '2', 'tg007', '0', 'ls004', '006', '1', '9');
INSERT INTO `sach` VALUES ('s0005', '8 Bước Dẫn Đến Thành Công Của Các Nhà Doanh Nghiệp', '\"8 Bước Dẫn Đến Thành Công Của Các Nhà Doanh Nghiệp\" là cuốn sách viết về một vài cá nhân đầu tư như thế nào vào cái ngành vừa đặc thù lại vừa biến động; một ngành vừa là người sản xuất vừa là người tiêu dùng. Nó còn viết về quá trình', '2018-05-05', '280', '', null, '1', 'tg013', '0', 'ls002', '008', '1', '5');
INSERT INTO `sach` VALUES ('s0006', 'The Truth Machine: Blockchain Và Tương Lai Của Tiền Tệ', 'Trong nền kinh tế hiện đại, những kẻ quản lý được sự truyền tải thông tin sẽ kiểm soát cả thế giới. Sự thực này đã được chứng minh bởi vị thế vững vàng và tầm ảnh hưởng ngày càng sâu rộng của Google và Facebook. Hiện nay, quyền lực chỉ', '2018-05-05', '552', ' 1130000082065', null, '2', 'tg014', '3', 'ls002', '011', '1', '9');
INSERT INTO `sach` VALUES ('s0007', 'Xin Chào Những Buổi Sáng (Song Ngữ)', 'Xin chào những buổi sángTiếng chim hot trên đườngHàng cây xanh màu lá Hoa trên cành tỏa hương...Ánh mặt trời ấm ápĐi cùng những bước chânNhẹ nhàng nhưng háo hứcDù quen đến bao lần...Là thầy cô, bè bạnĐợi phía sau cổng trườngCó bao điều học', '2018-05-05', '84', ' 1130000082306', null, '5', 'tg015', '0', 'ls001', '009', '2', '6');
INSERT INTO `sach` VALUES ('s0008', 'Thanh Xuân Của Chúng Ta Sẽ Dài Bao Lâu?', '“Điều đáng tiếc nhất của em, đó là dành hết cả thanh xuân, tình yêu, niềm tin của mình cho một người không xứng đáng.Điều đáng tiếc nhất của anh, đó là chỉ vì những vật chất hào nhoáng, những giây phút giây mù quáng, sa ngã mà đánh mất', '2018-05-05', '232', ' 9786049633096', null, '3', 'tg016', '0', 'ls001', '012', '1', '10');
INSERT INTO `sach` VALUES ('s0009', 'Cô Đơn Để Trưởng Thành', 'Bốn năm du học Mỹ của tôi đọng lại trong những trang văn này, những ghi chép về sự va chạm văn hóa ngay từ tuần đầu tiên, về sự khác biệt giữa các mối quan hệ ở Việt Nam và Mỹ, về cách nói chuyện của sinh viên bản xứ, cách họ ăn uống, tiệc tùng, về những gì tôi được dạy ở trường và cả những điều tôi phải tự học bằng trải nghiệm. Dù phải đối mặt với rất nhiều khó khăn khi sống một mình ở một đất nước xa lạ, tôi vẫn biết ơn vô cùng bốn năm vừa qua. Quãng thời gian ấy có đủ cung bậc của tiếng cười và cũng đủ sắc thái của sự cô đơn. Chính trong sự cô đơn ấy mà tôi thật sự trưởng thành.', '2018-05-05', '192', '1130000082422', null, '2', 'tg017', '0', 'ls001', '010', '2', '11');
INSERT INTO `sach` VALUES ('s0010', 'Đâu Đó Vẫn Có Tình Yêu', '\"Đâu đó vẫn có tình yêu\" là tuyển tập tản văn về tình yêu, tuổi trẻ và những sóng gió trên con đường lập nghiệp, tiến thân của tác giả Hiển Huy (cây viết quen thuộc trên tạp chí 2!Đẹp với bút danh Qy). \r\n\r\nHuy là một chàng trai Xử Nữ điển hình. Nội tâm, tỉ mỉ và hay để ý. Có thể vì thế mà những trang viết của Huy luôn khiến chúng ta phải giật mình, vì Huy luôn nhìn thấy những điều rất nhỏ, nhỏ xíu thôi, nhưng lại có ý nghĩa vô cùng lớn lao và sâu sắc.', '2018-05-05', '186', '8938507000389', null, '2', 'tg018', '0', 'ls001', '009', '1', '5');
INSERT INTO `sach` VALUES ('s0011', 'Những Bước Lang Thang Trên Hè Phố Của Gã Bình Nguyên Lộc', 'Những Bước Lang Thang Trên Hè Phố Của Gã Bình Nguyên Lộc là cuốn sách được xuất bản lần đầu năm 1966, sách in 658 quyển, nhà xuất bản Thịnh Ký (Sài Gòn) ấn hành. Theo như “Mấy lời nói đầu” của nhà xuất bản, Bình Nguyên Lộc viết thiên điều tra dài có tên gọi “Thám hiểm đô thành”, phóng sự này chia làm hai phần: Phần thứ nhất cho đăng báo hằng ngày, kể những chuyện lạ ở Sài Gòn, có tính cách xã hội, “giựt gân” như “Ma Máy đá”, “Người chuột cống”… Phần này tác giả không muốn in thành sách; Phần thứ hai tác giả cho đăng riêng ở các tạp chí: Nhân loại, Thời trân, Sáng tạo, Tiểu thuyết tuần san, Buổi sáng, Nghệ thuật… Những bài tạp bút này sau đó được gom lại để in thành cuốn Những bước lang thang trên hè phố của gã Bình Nguyên Lộc với một lưu ý nhỏ: không bao giờ tái bản', '2018-05-05', '168', ' 8935207001289', null, '4', 'tg019', '0', 'ls001', '004', '2', '7');
INSERT INTO `sach` VALUES ('s0012', 'Mưa Cánh Mối Và Cây Sáo Thiếc', 'Như những khoảng lặng trong một bản nhạc… \r\n\r\nNhư những nốt chậm thánh thót sau rốt vọng vang từ phím dương cầm… \r\n\r\nTập truyện ngắn này rất nhẹ nhàng, êm đềm… như bản tính nhút nhát, sợ đám đông của tác giả … \r\n\r\nNhững năm tháng tuổi trẻ ta đi qua là thế… \r\n\r\nƯớc mơ, lí tưởng, tình bạn, tình yêu gà bông, tình thầy trò nơi chốn quê… \r\n\r\nNhững nốt nhạc của mỗi cuộc đời nhân vật đều đong đầy cảm xúc chực chờ bùng cháy cho đam mê và mơ ước… \r\n\r\nMỗi câu chuyện là một gam màu khác nhau trên tổng thể màu nền xanh indigo khá trầm nhưng vẫn sáng ấm…', '2018-05-05', '88', '9786042099615', null, '2', 'tg020', '0', 'ls003', '013', '1', '1');
INSERT INTO `sach` VALUES ('s0013', 'Bỗng Dưng Thành Khổng Lồ', 'Bỗng dưng thành khổng lồ”! Trong mỗi chúng ta, ắt hẳn từ bé đến khi trưởng thành ai cũng có một kỉ niệm tuổi thơ đáng nhớ, mà khi nhắc đến thì phải nói bao nhiêu cảm xúc dâng trào lại quay về …\r\n\r\n“Bỗng dưng thành khổng lồ” là câu chuyện vui dành cho các bạn trẻ tuổi mới lớn, kể về nhân vật “Xí” với nhiều cảm xúc trong cuộc sống, với tuổi mới lớn của mình.\r\n\r\nCâu chuyện xoay quanh những câu chuyện ngắn của “Xí” lôi cuốn các bạn đọc với nhiều tình tiết vui nhộn, hí hỏm, và hồi hộp, vui buồn lẫn lộn, sự thù hận khi còn bé.\r\n\r\nCâu chuyện đọc xong cũng cho các bạn một kinh nghiệm sống quý giá, các bạn hãy đón đọc nhé!', '2018-05-05', '112', '9786045869642', null, '3', 'tg021', '0', 'ls003', '014', '1', '12');
INSERT INTO `sach` VALUES ('s0014', 'Truyện Trạng Quỳnh Trạng Lợn', 'Có nhiều câu chuyện về một nhân vật xuất chúng được nhân dân truyền tụng suốt từ đời này sang đời khác thành một hình tượng nhân vật văn học dân gian độc đáo. Ấy là Trạng Quỳnh, một đại diện ưu tú của trí tuệ nhân dân, được nhân dân xây dựng, bồi đắp ngày thêm phong phú, hoàn chỉnh tài năng và tính cách, hòa trộn yếu tố hiện thực và những giả tưởng huyền thoại pha chất trần gian. Người ta đồn rằng, Quỳnh hay chữ từ lúc còn là bào thai trong bụng mẹ…', '2018-05-05', '200', '8935095625185', null, '4', 'tg022', '0', 'ls003', '005', '1', '13');
INSERT INTO `sach` VALUES ('s0015', 'Cổ Tích Thế Giới', ':Đôi giày đỏĐại bàng và chim sẻBài học cho thỏBa chú lợn conCô bé bán diêmCô bé lọ lemCô vợ rắnCông chúa mặt trờiChú mèo và gà trống...', '2018-05-05', '372', '8935095617401', null, '5', 'tg023', '0', 'ls003', '006', '1', '13');
INSERT INTO `sach` VALUES ('s0016', 'Cuộc Đời Một Đôi Dép Cao Su', 'Sinh ra từ một chiếc lốp xe ô tô, đôi dép cao su đã theo chân những người lính trên nhiều dặm đường hành quân, dần trở thành người bạn thân thiết của các anh bộ đội. Mỗi bước đi của các anh là trùng trùng lớp lớp khó khăn gian khổ, nhưng trước đôi dép cao su, gai nhọn, đá sắc cũng phải cúi đầu. \r\n\r\nNhà văn Phùng Quán đã tạo nên một thế giới hấp dẫn, sinh động, nơi mà mỗi người chiến sĩ, mỗi em bé, mỗi lão nông đều là một anh hùng kiên cường, dũng cảm. Trong thế giới đó, đôi dép như “đôi hài vạn dặm”, che chở cho bàn chân các anh bộ đội trên mọi nẻo đường.\r\n\r\nTôi là bạn của đường trường gió bụi. Sinh tôi ra để trèo núi lội sông, xéo lên hàng rào thép gai, đạp lên chông nhọn. ', '2018-05-05', '136', '9786042099639', null, '3', 'tg024', '0', 'ls003', '005', '1', '1');
INSERT INTO `sach` VALUES ('s0017', 'Cha Mẹ Vô Điều Kiện', '“Cha mẹ vô điều kiện” là cuốn sách sẽ khiến cha mẹ có cái nhìn hoàn toàn khác về tình yêu thương dành cho con trẻ.\r\n\r\nThực tế, chúng ta có xu hướng yêu quý những đứa trẻ ngoan ngoãn, biết vâng lời hơn là những đứa trẻ nghịch ngợm. Cũng giống như việc chúng ta thường hay thỏa thuận với trẻ rằng nếu con không ngồi yên mẹ sẽ không cho con đi siêu thị nữa, nếu con không trật tự thì con sẽ không được ăn tối... Tất cả những điều đó đã vô tình khiến chúng ta đã đặt điều kiện cho thứ tình yêu vốn thiêng liêng và thuần khiết nhất.', '2018-05-05', '452', '8936056793066', null, '2', 'tg025', '4', 'ls004', '015', '2', '14');
INSERT INTO `sach` VALUES ('s0018', 'Phát Triển Kỹ Năng Sống', 'Bước vào tuổi thiếu niên các em có xu hướng thoát khỏi sự giám sát của bố mẹ, đòi hỏi có được địa vị bình đẳng trong gia đình và bắt đầu bước ra khỏi khuôn khổ gia đình để nếm trải giao tiếp với mọi người trong xã hội với tư cách một cá thể tồn tại độc lập. Các em muốn tự xác định mục tiêu và kế hoạch cuộc đời mình, dùng lý trí phán đoán của cá nhân để xem xét mọi sự việc mà không có bất kỳ sự can thiệp nào, kể cả bố mẹ. Cái tôi và sự trưởng thành của thiếu niên phần lớn được hình thành và phát triển suôn sẻ, nhưng cũng có không ít trường hợp gặp khó khăn, dẫn đến những hệ quả xã hội nhất định.', '2018-05-05', '160', ' 9786046831402', null, '2', 'tg003', '0', 'ls004', '016', '1', '15');
INSERT INTO `sach` VALUES ('s0019', 'Bố Mẹ Cũng Từng Là Trẻ Con - \"Bái Bai\" Những Chiếc Bỉm', 'Bố mẹ cũng từng là trẻ con, từng khóc lóc ăn vạ, từng ăn uống vô độ, không tuân thủ giờ giấc, từng sợ hãi khi xa rời vòng tay của người thân, từng ghét phải đi học hay có những cơn cáu giận vô cớ. Thế nên, nếu bây giờ trẻ có những biểu hiện giống y hệt như chúng ta lúc nhỏ thì bố mẹ cũng đừng tức giận, bởi ai cũng từng là trẻ con.\r\n\r\nLà tác giả của hơn 100 cuốn sách viết cho trẻ em theo cách viết rất mới và là chuyên gia về các trò chơi giáo dục, Madeleine Deny đã quan sát rất tỉ mỉ các mối quan hệ giữa bố mẹ và con cái. Giờ đây, cô viết sách cho các bậc phụ huynh để chia sẻ với họ những kinh nghiệm của mình.\r\n\r\nBộ sách Bố mẹ cũng từng là trẻ con của Madeleine Deny sẽ giải đáp gần như đầy đủ các thắc mắc cơ bản của bố mẹ về tính cách con trẻ, giúp bố mẹ hiểu được những điều con chưa thể nói và là đồng minh tốt nhất cho một cuộc sống gia đình thành công!', '2018-05-05', '96', ' 8935212336680', null, '2', 'tg026', '5', 'ls004', '012', '1', '16');
INSERT INTO `sach` VALUES ('s0020', 'Những Bài Học Từ Con Trẻ', 'Cuốn sách Những Bài Học Từ Con Trẻ cho bạn thấy con trẻ dạy chúng ta những bài học rất quan trọng. Trong cuốn sách này, người đọc sẽ gặp những đứa trẻ đã gây ảnh hưởng đến cuộc sống của người lớn như: cha mẹ, ông bà, thầy cô giáo, dì, chú, cha mẹ kế hay những người bạn của gia đình.... Tuy nhiên tất cả đều hướng về một nội dung: Nói về sự tử tế, lòng can đảm, tình yêu thương, ý chí cao và sự sáng suốt của những đứa trẻ mà họ yêu quý, thậm chí khâm phục...', '2018-05-05', '208', ' 8935072873813', null, '1', 'tg027', '6', 'ls004', '014', '1', '12');
INSERT INTO `sach` VALUES ('s0021', '\"Thả Thính\" Là Phải Dính! - 54 Cách Giúp Bạn Tán Đổ \"Crush\"', 'Ta nên hết lòng yêu,\r\n\r\nHay giữ lại đúng lúc?\r\n\r\nYêu thì rất đơn giản,\r\n\r\nKhó khăn ở phía sau…\r\n\r\n54 câu hỏi, 54 \"tuyệt kế\" - Cuốn sách này sẽ giúp bạn trở thành cao thủ thả thính.', '2018-05-05', '388', ' 8935212335089', null, '3', 'tg002', '7', 'ls004', '006', '1', '2');

-- ----------------------------
-- Table structure for tac_gia
-- ----------------------------
DROP TABLE IF EXISTS `tac_gia`;
CREATE TABLE `tac_gia` (
  `id_tac_gia` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_tac_gia` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_tac_gia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tac_gia
-- ----------------------------
INSERT INTO `tac_gia` VALUES ('tg001', 'Nhóm tác giả');
INSERT INTO `tac_gia` VALUES ('tg002', 'The windy');
INSERT INTO `tac_gia` VALUES ('tg003', 'Nhiều tác giả');
INSERT INTO `tac_gia` VALUES ('tg004', 'Takeshi Furukawa');
INSERT INTO `tac_gia` VALUES ('tg005', 'Xact Studio International');
INSERT INTO `tac_gia` VALUES ('tg006', 'Mai Luân');
INSERT INTO `tac_gia` VALUES ('tg007', 'Rosie Nguyễn');
INSERT INTO `tac_gia` VALUES ('tg008', 'Nhã Nam tuyển chọn');
INSERT INTO `tac_gia` VALUES ('tg009', 'Joel Boggess');
INSERT INTO `tac_gia` VALUES ('tg010', 'Phạm Duy Khiêm');
INSERT INTO `tac_gia` VALUES ('tg011', 'Scott Galloway ');
INSERT INTO `tac_gia` VALUES ('tg012', 'Mitch Cohen, John Sviokla ');
INSERT INTO `tac_gia` VALUES ('tg013', 'Hoàng Mai Việt, Minh Đức (Biên soạn) ');
INSERT INTO `tac_gia` VALUES ('tg014', ' Michael J. Casey , Paul Vigna ');
INSERT INTO `tac_gia` VALUES ('tg015', ' Nguyễn Phong Việt , Hồng Quân ');
INSERT INTO `tac_gia` VALUES ('tg016', 'Thảo Thảo ');
INSERT INTO `tac_gia` VALUES ('tg017', ' Nguyễn Siêu ');
INSERT INTO `tac_gia` VALUES ('tg018', 'Hiển Huy');
INSERT INTO `tac_gia` VALUES ('tg019', ' Bình Nguyên Lộc ');
INSERT INTO `tac_gia` VALUES ('tg020', ' Riv Nguyễn ');
INSERT INTO `tac_gia` VALUES ('tg021', 'Tam Vũ ');
INSERT INTO `tac_gia` VALUES ('tg022', 'Đức Anh ');
INSERT INTO `tac_gia` VALUES ('tg023', 'Ngọc Hà ');
INSERT INTO `tac_gia` VALUES ('tg024', ' Phùng Quán ');
INSERT INTO `tac_gia` VALUES ('tg025', ' Alfie Kohn ');
INSERT INTO `tac_gia` VALUES ('tg026', ' Madeleine Deny ');
INSERT INTO `tac_gia` VALUES ('tg027', 'Joan Aho Ryan ');

-- ----------------------------
-- Table structure for tai_khoan
-- ----------------------------
DROP TABLE IF EXISTS `tai_khoan`;
CREATE TABLE `tai_khoan` (
  `id_tk` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_dang_nhap` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat_khau` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_loai_tk` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_tk`),
  KEY `FK_loai_tk` (`id_loai_tk`) USING BTREE,
  CONSTRAINT `FK_loai_tk` FOREIGN KEY (`id_loai_tk`) REFERENCES `loai_tai_khoan` (`id_loai_tk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tai_khoan
-- ----------------------------
INSERT INTO `tai_khoan` VALUES ('TK001', 'truonggiang', 'truonggiang', 'L002');
INSERT INTO `tai_khoan` VALUES ('TK002', 'dinhtrong', 'dinhtrong', 'L002');
INSERT INTO `tai_khoan` VALUES ('TK003', 'tanphat', 'tanphat', 'L002');
INSERT INTO `tai_khoan` VALUES ('TK004', 'hoaian', 'hoaian', 'L002');

-- ----------------------------
-- Table structure for thong_tin_chu_tai_khoan
-- ----------------------------
DROP TABLE IF EXISTS `thong_tin_chu_tai_khoan`;
CREATE TABLE `thong_tin_chu_tai_khoan` (
  `id_taikhoan` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_chu_tk` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phai` tinyint(1) DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `sdt` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diachi` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  KEY `fk_taikhoan_chutaikhoan` (`id_taikhoan`),
  CONSTRAINT `fk_taikhoan_chutaikhoan` FOREIGN KEY (`id_taikhoan`) REFERENCES `tai_khoan` (`id_tk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of thong_tin_chu_tai_khoan
-- ----------------------------
INSERT INTO `thong_tin_chu_tai_khoan` VALUES ('TK001', 'Lý Trường Giang', null, null, '12345677', 'lytruonggiang2510@gmail.com', 'Tp HCM');
INSERT INTO `thong_tin_chu_tai_khoan` VALUES ('TK002', 'Nguyễn Đình Trọng', null, null, '', 'ndtrong@gmail.com', 'Ninh kiều Cần Thơ');
INSERT INTO `thong_tin_chu_tai_khoan` VALUES ('TK003', 'Nguyễn Tấn Phát', null, null, null, 'ntphat@gmail.com', null);
INSERT INTO `thong_tin_chu_tai_khoan` VALUES ('TK004', 'Phạm Hoài An', null, null, null, 'phan@gmail.com', null);
