-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 18, 2021 lúc 09:44 AM
-- Phiên bản máy phục vụ: 10.3.16-MariaDB
-- Phiên bản PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `trasua_demo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bophan`
--

CREATE TABLE `bophan` (
  `MABP` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TENBOPHAN` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MANVQL` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bophan`
--

INSERT INTO `bophan` (`MABP`, `TENBOPHAN`, `MANVQL`) VALUES
('BPBANHANG', 'Bộ phận bán hàng', 'NV1'),
('BPKHO', 'Bộ phận kho', 'nv606d6fe4df03e'),
('BPTIEPTAN', 'Bộ phận tiếp tân', 'nv609f4c1d1aa47'),
('BPVESINH', 'Bộ phận vệ sinh', 'NV4');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctcungcap`
--

CREATE TABLE `ctcungcap` (
  `MANHACUNGCAP` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MANGUYENLIEU` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MACTCUNGCAP` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SOLUONG` double NOT NULL,
  `DONGIA` double NOT NULL,
  `NGAY` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ctcungcap`
--

INSERT INTO `ctcungcap` (`MANHACUNGCAP`, `MANGUYENLIEU`, `MACTCUNGCAP`, `SOLUONG`, `DONGIA`, `NGAY`) VALUES
('ncc1', 'nl1', 'ctcc6060552589b8f', 111, 10000, 1616925989),
('ncc1', 'nl1', 'mactcc124223', 10, 50000, 19),
('ncc1', 'nl2', 'ctcc6060552589b8f', 112, 10000, 1616925989),
('ncc1', 'nl2', 'ctcc606a5bed19041', 0.5, 10000, 1617583085),
('ncc1', 'nl2', 'ctcc606a5bf54cb80', 0.5, 10000, 1617583093),
('ncc1', 'nl2', 'ctcc606a5c14dae63', 0.5, 10000, 1617583124),
('ncc1', 'nl2', 'ctcc606a5c1bad6e9', 0.5, 10000, 1617583131),
('ncc1', 'nl2', 'mactcc1g4td', 10, 300000, 18),
('ncc2', 'nl1', 'ctcc6060484790693', 11, 110000, 0),
('ncc2', 'nl1', 'ctcc6060528fecc82', 1, 10000, 1616925327),
('ncc2', 'nl1', 'ctcc6060549bf2cad', 1, 10000, 1616925851),
('ncc2', 'nl1', 'ctcc6069a2b6cfeef', 2, 10000, 1617535670),
('ncc2', 'nl1', 'ctcc6069a304d3b2a', 2, 10000, 1617535748),
('ncc2', 'nl1', 'ctcc6069a38251f52', 2, 10000, 1617535874),
('ncc2', 'nl1', 'ctcc6069a3a2cb752', 2, 10000, 1617535906),
('ncc2', 'nl1', 'ctcc6069a3ba9744e', 2, 10000, 1617535930),
('ncc2', 'nl1', 'ctcc6069a40e0815e', 2, 10000, 1617536014),
('ncc2', 'nl1', 'ctcc6069a41605c57', 2, 10000, 1617536022),
('ncc2', 'nl1', 'ctcc6069a439c70fd', 1, 10000, 1617536057),
('ncc2', 'nl1', 'ctcc6069a463d5c10', 1, 10000, 1617536099),
('ncc2', 'nl1', 'ctcc60993351e155a', 1, 10500, 1620652881),
('ncc2', 'nl2', 'ctcc6060480e85e48', 10, 10000, 0),
('ncc2', 'nl2', 'ctcc6060484790693', 10, 10000, 0),
('ncc2', 'nl2', 'ctcc606052ed1dbce', 8, 10000, 1616925421),
('ncc2', 'nl2', 'ctcc6060549bf2cad', 2, 10000, 1616925851),
('ncc2', 'nl2', 'ctcc6069a439c70fd', 2, 10000, 1617536057),
('ncc2', 'nl2', 'ctcc6069a463d5c10', 1, 10000, 1617536099),
('ncc2', 'nl2', 'ctcc60783c219c24c', 10, 10000, 1618492449),
('ncc2', 'nl2', 'ctcc6094a89e48502', 5, 10000, 1620355230),
('ncc2', 'nl2', 'ctcc609f4ff65ba31', 10, 11000, 1621053430),
('ncc2', 'nl605da771044c1', 'ctcc6094a89e48502', 2, 15000, 1620355230),
('ncc2', 'nl605f103d2a973', 'ctcc60993351e155a', 2, 9500, 1620652881),
('ncc605f1132ab08d', 'nl2', 'ctcc6060492646cc0', 12, 10000, 0),
('ncc605f1132ab08d', 'nl605da771044c1', 'ctcc6060492646cc0', 13, 11000, 0),
('ncc60c9b9a8af509', 'nl60c9b9a8af513', 'ctcc60c9bab80d1f4', 10, 14000, 1623833272),
('ncc60c9b9a8af509', 'nl60c9b9a8af513', 'ctcc60c9bc3335ed9', 10, 14000, 1623833651),
('ncc60c9b9a8af509', 'nl60c9b9a8af514', 'ctcc60c9bab80d1f4', 5, 7000, 1623833272);

--
-- Bẫy `ctcungcap`
--
DELIMITER $$
CREATE TRIGGER `them ngay tao CTCUNGCAP` BEFORE INSERT ON `ctcungcap` FOR EACH ROW BEGIN
	SET NEW.NGAY = UNIX_TIMESTAMP();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctdondathang`
--

CREATE TABLE `ctdondathang` (
  `MADONDATHANG` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MANGUYENLIEU` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SOLUONG` double NOT NULL,
  `DONVI` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GHICHU` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ctdondathang`
--

INSERT INTO `ctdondathang` (`MADONDATHANG`, `MANGUYENLIEU`, `SOLUONG`, `DONVI`, `GHICHU`) VALUES
('ddh605f0f8d1e7c4', 'nl1', 1, 'kg', ''),
('ddh605f0f8d1e7c4', 'nl605f0f8d1e7dc', 2, 'kg', ''),
('ddh605f103d2a970', 'nl1', 1, 'kg', 'nguyenlieu1 matcha'),
('ddh605f103d2a970', 'nl605f103d2a973', 2, 'kg', 'nguyenlieumoi1'),
('ddh605f1132ab0c8', 'nl1', 1, 'kg', 'mc'),
('ddh605f1132ab0c8', 'nl2', 2, 'lít', 'st'),
('ddh605f1132ab0c8', 'nl605da771044c1', 2, 'kg', 'scl'),
('ddh60602f1334a85', 'nl2', 22, 'kg', 'mc'),
('ddh60602f31c3599', 'nl2', 22, 'kg', 'mc'),
('ddh60783b251f38f', 'nl2', 10, 'lít', ''),
('ddh609a49fc49ae6', 'nl2', 3, 'lít', ''),
('ddh609a49fc49ae6', 'nl605f103d2a973', 3, 'kg', ''),
('ddh60c9b9a8af50f', 'nl60c9b9a8af513', 10, 'kg', 'đường loại 1'),
('ddh60c9b9a8af50f', 'nl60c9b9a8af514', 5, 'kg', ''),
('ddh60c9bc077789c', 'nl60c9b9a8af513', 10, 'kg', ''),
('dh2', 'nl2', 10, NULL, '10 lit'),
('dhh1', 'nl1', 2, NULL, 'loại đặt biệt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthoadon`
--

CREATE TABLE `cthoadon` (
  `MAHOADON` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MALOAITRASUA` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TENSIZE` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MASIZE` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SOLUONG` int(11) NOT NULL,
  `NGUYENLIEUBOSUNG` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `GIA` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cthoadon`
--

INSERT INTO `cthoadon` (`MAHOADON`, `MALOAITRASUA`, `TENSIZE`, `MASIZE`, `SOLUONG`, `NGUYENLIEUBOSUNG`, `GIA`) VALUES
('hd607cf567eb74b', 'ts607c43f77825e', 'Size L', 'masize607b6049e4471', 1, 'null', 24000),
('hd607cf567eb74b', 'ts607c43f77825e', 'Size S', 'masize607b5fe2e11a1', 1, 'null', 14000),
('hd607cf5d967078', 'ts607ba482510e2', 'Size S', 'masize607b5fe2e11a1', 1, 'null', 9900),
('hd607cf5d967078', 'ts607c023b73541', 'Size L', 'masize607b6049e4471', 1, 'null', 20400),
('hd607cf5d967078', 'ts607c023b73541', 'Size S', 'masize607b5fe2e11a1', 1, 'null', 11900),
('hd607cfddacf75e', 'ts607ba482510e2', 'Size S', 'masize607b5fe2e11a1', 1, 'null', 9900),
('hd607cfddacf75e', 'ts607cd78d9cfe7', 'Size L', 'masize607b6049e4471', 2, 'null', 50400),
('hd607cff8703f52', 'ts607ba482510e2', 'Size S', 'masize607b5fe2e11a1', 1, 'null', 9900),
('hd607cff8703f52', 'ts607cd78d9cfe7', 'Size L', 'masize607b6049e4471', 2, 'null', 50400),
('hd607d05ecd677f', 'ts607c43f77825e', 'Size L', 'masize607b6049e4471', 1, 'null', 24000),
('hd607d05ecd677f', 'ts607c43f77825e', 'Size S', 'masize607b5fe2e11a1', 2, 'null', 28000),
('hd608f5b3bc1908', 'ts607ba482510e2', 'Size S', 'masize607b5fe2e11a1', 1, 'null', 10497.2),
('hd608f5b3bc1908', 'ts607c43f77825e', 'Size S', 'masize607b5fe2e11a1', 1, 'null', 14000),
('hd6090b99fb1a6e', 'ts6083e39f7f6bb', 'Size L', 'masize607b6049e4471', 1, '[{\"manl\":\"nl605da771044c1\",\"nguyenlieu\":\"socola\",\"soluongthem\":\"0.1\",\"donvi\":\"kg\",\"gia\":1250}]', 26450),
('hd6090ecb2dbfdb', 'ts607ba482510e2', 'Size S', 'masize607b5fe2e11a1', 1, 'null', 10497.2),
('hd6090ed5707dc2', 'ts607ba482510e2', 'Size S', 'masize607b5fe2e11a1', 1, '[{\"manl\":\"nl1\",\"nguyenlieu\":\"B\\u1ed9t matcha\",\"soluongthem\":\"0.1\",\"donvi\":\"kg\",\"gia\":1000},{\"manl\":\"nl2\",\"nguyenlieu\":\"S\\u1eefa t\\u01b0\\u01a1i\",\"soluongthem\":\"0.1\",\"donvi\":\"kg\",\"gia\":1100}]', 12597.2),
('hd6090f1380458b', 'ts6083e2ddb600d', 'Size M', 'masize607b602705fe0', 1, 'null', 14000),
('hd6091f10921b75', 'ts6091ef91c51e9', 'Size L', 'masize607b6049e4471', 1, '[{\"manl\":\"nl605f103d2a973\",\"nguyenlieu\":\"kem t\\u01b0\\u01a1i\",\"soluongthem\":\"0.2\",\"donvi\":\"kg\",\"gia\":1800}]', 23400),
('hd60920fff3a2dc', 'ts6091ef91c51e9', 'Size S', 'masize607b5fe2e11a1', 2, '[{\"manl\":\"nl605da771044c1\",\"nguyenlieu\":\"socola\",\"soluongthem\":\"0.1\",\"donvi\":\"kilogram\",\"gia\":1250}]', 26450),
('hd609268cc46296', 'tsmc1', 'Size S', 'masize607b5fe2e11a1', 1, 'null', 10500),
('hd6093e199dd40c', 'ts607ba482510e2', 'Size S', 'masize607b5fe2e11a1', 2, '[{\"manl\":\"nl2\",\"nguyenlieu\":\"S\\u1eefa t\\u01b0\\u01a1i\",\"soluongthem\":\"0.1\",\"donvi\":\"kilogram\",\"gia\":1100}]', 22094.4),
('hd6094a855ee1c7', 'ts607c023b73541', 'Size S', 'masize607b5fe2e11a1', 1, 'null', 11900),
('hd6094a85607e10', 'ts607c023b73541', 'Size S', 'masize607b5fe2e11a1', 1, 'null', 11900),
('hd6097e5aae309e', 'ts6091ef91c51e9', 'Size L', 'masize607b6049e4471', 1, '[{\"manl\":\"nl605f0f8d1e7dc\",\"nguyenlieu\":\"H\\u1ea1t tr\\u00e2n ch\\u00e2u\",\"soluongthem\":\"0.2\",\"donvi\":\"kg\",\"gia\":2600}]', 24200),
('hd6097e5aae309e', 'tsmc1', 'Size S', 'masize607b5fe2e11a1', 2, '[{\"manl\":\"nl2\",\"nguyenlieu\":\"S\\u1eefa t\\u01b0\\u01a1i\",\"soluongthem\":\"0.1\",\"donvi\":\"lit\",\"gia\":1100}]', 22100),
('hd609965e94a842', 'tsmc1', 'Size L', 'masize607b6049e4471', 1, 'null', 18000),
('hd609965e94a842', 'tsmc1', 'Size S', 'masize607b5fe2e11a1', 1, 'null', 10500),
('hd609b73fc3a17d', 'ts607c023b73541', 'Size S', 'masize607b5fe2e11a1', 1, 'null', 11900),
('hd609c9cf350e16', 'ts607c43f77825e', 'Size L', 'masize607b6049e4471', 2, '[{\"manl\":\"nl2\",\"nguyenlieu\":\"S\\u1eefa t\\u01b0\\u01a1i\",\"soluongthem\":\"0.1\",\"donvi\":\"lit\",\"gia\":1100},{\"manl\":\"nl605da771044c1\",\"nguyenlieu\":\"socola\",\"soluongthem\":\"0.2\",\"donvi\":\"kg\",\"gia\":2500}]', 27600),
('hd60a5d42681081', 'ts6083e39f7f6bb', 'Size L', 'masize607b6049e4471', 2, 'null', 50400),
('hd60a91a442be11', 'ts607c43f77825e', 'Size L', 'masize607b6049e4471', 1, '[{\"manl\":\"nl2\",\"nguyenlieu\":\"S\\u1eefa t\\u01b0\\u01a1i\",\"soluongthem\":\"0.2\",\"donvi\":\"l\\u00edt\",\"gia\":2200},{\"manl\":\"nl605da771044c1\",\"nguyenlieu\":\"socola\",\"soluongthem\":\"0.1\",\"donvi\":\"kg\",\"gia\":1250}]', 64650),
('hd60aa23a4ac121', 'ts607c43f77825e', 'Size M', 'masize607b602705fe0', 1, 'null', 51000),
('hd60aa23a4ac121', 'ts607c43f77825e', 'Size S', 'masize607b5fe2e11a1', 1, 'null', 35700),
('hd60c74631a6482', 'ts607c43f77825e', 'Size L', 'masize607b6049e4471', 1, 'null', 61200),
('hd60c74631a6482', 'ts607c43f77825e', 'Size M', 'masize607b602705fe0', 1, 'null', 51000),
('hd60c74631a6482', 'ts607c43f77825e', 'Size S', 'masize607b5fe2e11a1', 1, 'null', 35700),
('hd60c86e034162f', 'ts607cd78d9cfe7', 'Size S', 'masize607b5fe2e11a1', 1, '[{\"manl\":\"nl605da771044c1\",\"nguyenlieu\":\"socola\",\"soluongthem\":\"0.3\",\"donvi\":\"kg\",\"gia\":3750},{\"manl\":\"nl2\",\"nguyenlieu\":\"S\\u1eefa t\\u01b0\\u01a1i\",\"soluongthem\":\"0.2\",\"donvi\":\"l\\u00edt\",\"gia\":2200}]', 20650),
('hd60c9bfffab9db', 'ts60c9bf7ac9dc7', 'Size M', 'masize607b602705fe0', 1, 'null', 22000),
('hd60c9c0e91682d', 'ts6091ef91c51e9', 'Size L', 'masize607b6049e4471', 1, 'null', 21600),
('hd60c9c0e91682d', 'ts6091ef91c51e9', 'Size S', 'masize607b5fe2e11a1', 1, 'null', 12600),
('hd60c9c1db6dac9', 'ts607c023b73541', 'Size L', 'masize607b6049e4471', 3, 'null', 61200),
('hd60c9c8a6d348c', 'ts607c023b73541', 'Size L', 'masize607b6049e4471', 1, 'null', 20400),
('hd60c9c9986833a', 'ts609f4eca379a0', 'Size M', 'masize607b602705fe0', 2, 'null', 46000),
('hd60c9c9fdaf377', 'ts607cd78d9cfe7', 'Size S', 'masize607b5fe2e11a1', 1, 'null', 14700),
('hd60c9ca7326978', 'ts607ba482510e2', 'Size M', 'masize607b602705fe0', 2, 'null', 30000),
('hd60c9cabef38ef', 'ts607ba482510e2', 'Size M', 'masize607b602705fe0', 2, 'null', 30000),
('hd60c9cb981cd1e', 'ts607c43f77825e', 'Size M', 'masize607b602705fe0', 1, '[{\"manl\":\"nl2\",\"nguyenlieu\":\"S\\u1eefa t\\u01b0\\u01a1i\",\"soluongthem\":\"0.2\",\"donvi\":\"l\\u00edt\",\"gia\":2200},{\"manl\":\"nl605da771044c1\",\"nguyenlieu\":\"socola\",\"soluongthem\":\"0.3\",\"donvi\":\"kg\",\"gia\":3750}]', 56950),
('hd60c9cc3fab3cb', 'ts607ba482510e2', 'Size M', 'masize607b602705fe0', 1, '[{\"manl\":\"nl2\",\"nguyenlieu\":\"S\\u1eefa t\\u01b0\\u01a1i\",\"soluongthem\":\"0.2\",\"donvi\":\"l\\u00edt\",\"gia\":2200},{\"manl\":\"nl605da771044c1\",\"nguyenlieu\":\"socola\",\"soluongthem\":\"0.1\",\"donvi\":\"kg\",\"gia\":1250}]', 18450),
('hd60c9d003eec24', 'ts607ba482510e2', 'Size M', 'masize607b602705fe0', 1, 'null', 15000),
('hd60c9d11fe0d4d', 'ts607ba482510e2', 'Size M', 'masize607b602705fe0', 1, 'null', 15000),
('hd60c9d147062fb', 'ts607ba482510e2', 'Size M', 'masize607b602705fe0', 1, 'null', 15000),
('hd60c9d15c74354', 'ts607ba482510e2', 'Size M', 'masize607b602705fe0', 1, 'null', 15000),
('hd60c9d1ea63b69', 'ts607ba482510e2', 'Size M', 'masize607b602705fe0', 1, 'null', 15000),
('hd60c9d2619f9d3', 'ts607ba482510e2', 'Size M', 'masize607b602705fe0', 1, 'null', 15000),
('hd60c9d3fb1b771', 'ts6091ef91c51e9', 'Size S', 'masize607b5fe2e11a1', 1, 'null', 12600),
('hd60c9d473530e3', 'ts607cd78d9cfe7', 'Size S', 'masize607b5fe2e11a1', 1, 'null', 14700),
('hd60c9d4c31c966', 'ts609f4eca379a0', 'Size M', 'masize607b602705fe0', 1, 'null', 23000),
('hd60c9d4e0e511f', 'tsmc1', 'Size L', 'masize607b6049e4471', 1, 'null', 18000),
('hd60c9d51939373', 'ts60c9bf7ac9dc7', 'Size M', 'masize607b602705fe0', 1, 'null', 22000),
('hd60c9d555aa65a', 'ts609f4eca379a0', 'Size M', 'masize607b602705fe0', 1, 'null', 23000),
('hd60c9d57442c39', 'ts607cd78d9cfe7', 'Size S', 'masize607b5fe2e11a1', 1, 'null', 14700),
('hd60c9d5d7efee3', 'ts60c9bf7ac9dc7', 'Size M', 'masize607b602705fe0', 1, 'null', 22000),
('hd60c9d62fd53a0', 'ts607cd78d9cfe7', 'Size S', 'masize607b5fe2e11a1', 1, 'null', 14700),
('hd60ca9aac5add2', 'ts607cd78d9cfe7', 'Size S', 'masize607b5fe2e11a1', 1, 'null', 14700),
('hd60ca9b009b2e9', 'ts607cd78d9cfe7', 'Size S', 'masize607b5fe2e11a1', 1, 'null', 14700),
('hd60ca9bd7b1de2', 'ts607ba482510e2', 'Size S', 'masize607b5fe2e11a1', 1, 'null', 12000),
('hd60ca9c0ebab9f', 'ts607ba482510e2', 'Size S', 'masize607b5fe2e11a1', 1, 'null', 12000),
('hd60ca9c790fa67', 'ts607ba482510e2', 'Size S', 'masize607b5fe2e11a1', 1, 'null', 12000),
('hd60caa512b0b93', 'ts607cd78d9cfe7', 'Size S', 'masize607b5fe2e11a1', 1, 'null', 14700),
('hd60caa64fe0648', 'ts607ba482510e2', 'Size S', 'masize607b5fe2e11a1', 1, 'null', 10500),
('hd60cabdd00d15a', 'ts607ba482510e2', 'Size S', 'masize607b5fe2e11a1', 1, 'null', 12000),
('hd60cabde9dcd0a', 'ts607ba482510e2', 'Size S', 'masize607b5fe2e11a1', 2, 'null', 24000),
('hd60cc002f9e62b', 'ts6091ef91c51e9', 'Size S', 'masize607b5fe2e11a1', 1, '[{\"manl\":\"nl1\",\"nguyenlieu\":\"B\\u1ed9t matcha\",\"soluongthem\":\"0.1\",\"donvi\":\"kg\",\"gia\":1000},{\"manl\":\"nl2\",\"nguyenlieu\":\"S\\u1eefa t\\u01b0\\u01a1i\",\"soluongthem\":\"0.1\",\"donvi\":\"l\\u00edt\",\"gia\":1100}]', 16500),
('hd60cc05f77034d', 'ts609f4eca379a0', 'Size M', 'masize607b602705fe0', 1, 'null', 23000),
('hd60cc0671d8d45', 'ts60c9bf7ac9dc7', 'Size M', 'masize607b602705fe0', 1, 'null', 22000),
('hd60cc07dc03dda', 'tsmc1', 'Size L', 'masize607b6049e4471', 1, 'null', 18000),
('hd60cc0cd4b1e99', 'ts60c9bf7ac9dc7', 'Size M', 'masize607b602705fe0', 1, 'null', 22000),
('hd60cc0cd4b1e99', 'tsmc1', 'Size S', 'masize607b5fe2e11a1', 1, 'null', 12000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctloaitrasua`
--

CREATE TABLE `ctloaitrasua` (
  `MALOAITRASUA` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MANGUYENLIEU` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `LIEULUONG` double NOT NULL,
  `DONVI` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `GHICHU` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ctloaitrasua`
--

INSERT INTO `ctloaitrasua` (`MALOAITRASUA`, `MANGUYENLIEU`, `LIEULUONG`, `DONVI`, `GHICHU`) VALUES
('ts607ba482510e2', 'nl1', 0.1, 'kg', ''),
('ts607ba482510e2', 'nl2', 0.2, 'lít', ''),
('ts607ba482510e2', 'nl605da771044c1', 0.3, 'kg', ''),
('ts607c023b73541', 'nl1', 0.1, 'kg', ''),
('ts607c023b73541', 'nl2', 0.5, 'lit', ''),
('ts607c023b73541', 'nl605da771044c1', 0.1, 'kg', ''),
('ts607c43f77825e', 'nl1', 0.12, 'kg', 'Ghi chú nl 1'),
('ts607c43f77825e', 'nl2', 0.42, 'lit', ''),
('ts607cd78d9cfe7', 'nl2', 0.5, 'lit', ''),
('ts607cd78d9cfe7', 'nl605f0f8d1e7dc', 0.2, 'kg', ''),
('ts607cd78d9cfe7', 'nl605f103d2a973', 0.1, 'kg', ''),
('ts6083e2ddb600d', 'nl2', 0.4, 'lit', ''),
('ts6083e2ddb600d', 'nl605da771044c1', 0.1, 'kg', ''),
('ts6083e39f7f6bb', 'nl2', 0.5, 'lit', ''),
('ts6083e39f7f6bb', 'nl605da771044c1', 0.1, 'kg', ''),
('ts6083e39f7f6bb', 'nl605f103d2a973', 0.1, 'kg', ''),
('ts60866581d8afb', 'nl1', 0.2, 'kg', ''),
('ts60866581d8afb', 'nl2', 0.5, 'lit', ''),
('ts608dfe717925b', 'nl1', 0.2, 'kg', ''),
('ts6091ef91c51e9', 'nl2', 0.4, 'lit', ''),
('ts6091ef91c51e9', 'nl605f0f8d1e7dc', 0.1, 'kilogram', ''),
('ts6091ef91c51e9', 'nl605f103d2a973', 0.2, 'kilogram', ''),
('ts609f4eca379a0', 'nl2', 0.4, 'lit', ''),
('ts609f4eca379a0', 'nl605f0f8d1e7dc', 0.2, 'kilogram', ''),
('ts609f4eca379a0', 'nl605f103d2a973', 0.2, 'kg', ''),
('ts60c9bf7ac9dc7', 'nl2', 0.4, 'lít', ''),
('ts60c9bf7ac9dc7', 'nl605f103d2a973', 0.2, 'kg', ''),
('ts60c9bf7ac9dc7', 'nl60c9b9a8af513', 0.2, 'kg', ''),
('tsmc1', 'nl1', 0.1, '', ''),
('tsmc1', 'nl2', 0.2, '', ''),
('tstc', 'nl2', 0.3, '', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctphieunhap`
--

CREATE TABLE `ctphieunhap` (
  `MANGUYENLIEU` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MAPHIEUNHAP` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SOLUONG` double NOT NULL,
  `DONGIA` double NOT NULL,
  `DONVI` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `GHICHU` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ctphieunhap`
--

INSERT INTO `ctphieunhap` (`MANGUYENLIEU`, `MAPHIEUNHAP`, `SOLUONG`, `DONGIA`, `DONVI`, `GHICHU`) VALUES
('nl1', 'PN1', 10, 0, '50000', NULL),
('nl1', 'pn6060528fecc84', 1, 0, 'kg', 'ghi chú 1'),
('nl1', 'pn6060549bf2caf', 1, 0, 'kg', ''),
('nl1', 'pn6060552589b90', 111, 0, 'kg', ''),
('nl1', 'pn6069a2b6cfef1', 2, 0, 'gram', ''),
('nl1', 'pn6069a304d3b2b', 2, 0, 'gram', ''),
('nl1', 'pn6069a3a2cb753', 2, 0, 'gram', ''),
('nl1', 'pn6069a3ba97450', 2, 0, 'gram', ''),
('nl1', 'pn6069a40e0815f', 2, 0, 'gram', ''),
('nl1', 'pn6069a41605c59', 2, 0, 'gram', ''),
('nl1', 'pn6069a439c70ff', 1, 0, 'kg', ''),
('nl1', 'pn6069a463d5c11', 1, 0, 'kg', ''),
('nl1', 'pn60993351e155d', 1, 0, 'kg', ''),
('nl2', 'PN2', 10, 0, '300000', NULL),
('nl2', 'pn6060549bf2caf', 2, 0, 'lít', ''),
('nl2', 'pn6060552589b90', 112, 0, 'lít', ''),
('nl2', 'pn6069a439c70ff', 2, 0, 'lít', ''),
('nl2', 'pn6069a463d5c11', 1, 0, 'lít', ''),
('nl2', 'pn606a5bed19043', 0.5, 0, 'lit', ''),
('nl2', 'pn606a5bf54cb82', 0.5, 0, 'lit', ''),
('nl2', 'pn606a5c14dae66', 0.5, 0, 'lit', ''),
('nl2', 'pn606a5c1bad6eb', 0.5, 0, 'lit', ''),
('nl2', 'pn60783c219c24d', 10, 0, 'lit', ''),
('nl2', 'pn6094a89e48504', 5, 0, 'lit', ''),
('nl2', 'pn609f4ff65ba33', 10, 0, 'lít', ''),
('nl605da771044c1', 'pn6094a89e48504', 2, 0, 'kg', ''),
('nl605f103d2a973', 'pn60993351e155d', 2, 0, 'kg', ''),
('nl60c9b9a8af513', 'pn60c9bab80d1f6', 10, 0, 'kg', ''),
('nl60c9b9a8af513', 'pn60c9bc3335edc', 10, 0, 'kg', ''),
('nl60c9b9a8af514', 'pn60c9bab80d1f6', 5, 0, 'kg', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctsize`
--

CREATE TABLE `ctsize` (
  `MALOAITRASUA` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MASIZE` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `KHOILUONGRIENG` double NOT NULL,
  `GIA` double NOT NULL,
  `THANHPHAN` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ctsize`
--

INSERT INTO `ctsize` (`MALOAITRASUA`, `MASIZE`, `KHOILUONGRIENG`, `GIA`, `THANHPHAN`) VALUES
('ts607ba482510e2', 'masize607b5fe2e11a1', 0.8, 12000, '[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":0.06999999999999999,\"DONVI\":\"kg\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":0.13999999999999999,\"DONVI\":\"l\\u00edt\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605da771044c1\",\"LIEULUONG\":0.21,\"DONVI\":\"kg\",\"GHICHU\":\"\"}]'),
('ts607ba482510e2', 'masize607b602705fe0', 1, 15000, '[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.2\",\"DONVI\":\"l\\u00edt\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605da771044c1\",\"LIEULUONG\":\"0.3\",\"DONVI\":\"kg\",\"GHICHU\":\"\"}]'),
('ts607c023b73541', 'masize607b6049e4471', 1.2, 20400, '[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":0.12,\"DONVI\":\"kg\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":0.6,\"DONVI\":\"lit\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605da771044c1\",\"LIEULUONG\":0.12,\"DONVI\":\"kg\",\"GHICHU\":\"\"}]'),
('ts607c43f77825e', 'masize607b5fe2e11a1', 0.8, 40800, '[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":0.08399999999999999,\"DONVI\":\"kg\",\"GHICHU\":\"Ghi ch\\u00fa nl 1\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":0.294,\"DONVI\":\"lit\",\"GHICHU\":\"\"}]'),
('ts607c43f77825e', 'masize607b602705fe0', 1, 51000, '[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.12\",\"DONVI\":\"kg\",\"GHICHU\":\"Ghi ch\\u00fa nl 1\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.42\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}]'),
('ts607c43f77825e', 'masize607b6049e4471', 1.2, 61200, '[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":0.144,\"DONVI\":\"kg\",\"GHICHU\":\"Ghi ch\\u00fa nl 1\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":0.504,\"DONVI\":\"lit\",\"GHICHU\":\"\"}]'),
('ts607cd78d9cfe7', 'masize607b5fe2e11a1', 0.8, 16800, '[{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":0.35,\"DONVI\":\"lit\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605f0f8d1e7dc\",\"LIEULUONG\":0.13999999999999999,\"DONVI\":\"kg\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605f103d2a973\",\"LIEULUONG\":0.06999999999999999,\"DONVI\":\"kg\",\"GHICHU\":\"\"}]'),
('ts6083e2ddb600d', 'masize607b5fe2e11a1', 0.8, 11200, '[{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":0.27999999999999997,\"DONVI\":\"lit\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605da771044c1\",\"LIEULUONG\":0.06999999999999999,\"DONVI\":\"kg\",\"GHICHU\":\"\"}]'),
('ts6083e2ddb600d', 'masize607b602705fe0', 1, 14000, '[{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":0.4,\"DONVI\":\"lit\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605da771044c1\",\"LIEULUONG\":0.1,\"DONVI\":\"kg\",\"GHICHU\":\"\"}]'),
('ts6083e39f7f6bb', 'masize607b5fe2e11a1', 0.8, 16800, '[{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":0.35,\"DONVI\":\"lit\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605da771044c1\",\"LIEULUONG\":0.06999999999999999,\"DONVI\":\"kg\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605f103d2a973\",\"LIEULUONG\":0.06999999999999999,\"DONVI\":\"kg\",\"GHICHU\":\"\"}]'),
('ts6083e39f7f6bb', 'masize607b6049e4471', 1.2, 25200, '[{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":0.6,\"DONVI\":\"lit\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605da771044c1\",\"LIEULUONG\":0.12,\"DONVI\":\"kg\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605f103d2a973\",\"LIEULUONG\":0.12,\"DONVI\":\"kg\",\"GHICHU\":\"\"}]'),
('ts60866581d8afb', 'masize607b5fe2e11a1', 0.8, 9600, '[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":0.13999999999999999,\"DONVI\":\"kg\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":0.35,\"DONVI\":\"lit\",\"GHICHU\":\"\"}]'),
('ts6091ef91c51e9', 'masize607b5fe2e11a1', 0.8, 14400, '[{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":0.27999999999999997,\"DONVI\":\"lit\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605f0f8d1e7dc\",\"LIEULUONG\":0.06999999999999999,\"DONVI\":\"kilogram\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605f103d2a973\",\"LIEULUONG\":0.13999999999999999,\"DONVI\":\"kilogram\",\"GHICHU\":\"\"}]'),
('ts6091ef91c51e9', 'masize607b6049e4471', 1.2, 21600, '[{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":0.48,\"DONVI\":\"lit\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605f0f8d1e7dc\",\"LIEULUONG\":0.12,\"DONVI\":\"kilogram\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605f103d2a973\",\"LIEULUONG\":0.24,\"DONVI\":\"kilogram\",\"GHICHU\":\"\"}]'),
('ts609f4eca379a0', 'masize607b602705fe0', 1, 23000, '[{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":0.48,\"DONVI\":\"lit\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605f0f8d1e7dc\",\"LIEULUONG\":0.24,\"DONVI\":\"kilogram\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605f103d2a973\",\"LIEULUONG\":0.24,\"DONVI\":\"kg\",\"GHICHU\":\"\"}]'),
('ts609f4eca379a0', 'masize607b6049e4471', 1.2, 27600, '[{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":0.48,\"DONVI\":\"lit\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605f0f8d1e7dc\",\"LIEULUONG\":0.24,\"DONVI\":\"kilogram\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605f103d2a973\",\"LIEULUONG\":0.24,\"DONVI\":\"kg\",\"GHICHU\":\"\"}]'),
('ts60c9bf7ac9dc7', 'masize607b602705fe0', 1, 22000, '[{\"MANGUYENLIEU\":\"nl60c9b9a8af513\",\"LIEULUONG\":\"0.2\",\"DONVI\":\"kg\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.4\",\"DONVI\":\"l\\u00edt\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605f103d2a973\",\"LIEULUONG\":\"0.2\",\"DONVI\":\"kg\",\"GHICHU\":\"\"}]'),
('tsmc1', 'masize607b5fe2e11a1', 0.8, 12000, '[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":0.06999999999999999,\"DONVI\":\"\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":0.13999999999999999,\"DONVI\":\"\",\"GHICHU\":\"\"}]'),
('tsmc1', 'masize607b6049e4471', 1.2, 18000, '[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":0.12,\"DONVI\":\"\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":0.24,\"DONVI\":\"\",\"GHICHU\":\"\"}]');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dondh`
--

CREATE TABLE `dondh` (
  `MADONDH` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MANHACUNGCAP` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `NGUOILAP` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TRANGTHAI` int(11) NOT NULL,
  `NGAYLAP` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dondh`
--

INSERT INTO `dondh` (`MADONDH`, `MANHACUNGCAP`, `NGUOILAP`, `TRANGTHAI`, `NGAYLAP`) VALUES
('ddh605f0f8d1e7c4', 'ncc2', 'NV1', 2, 27),
('ddh605f103d2a970', 'ncc2', 'NV1', 1, 27),
('ddh605f1132ab0c8', 'ncc605f1132ab08d', 'NV1', 1, 27),
('ddh60602f1334a85', 'ncc2', 'NV1', 1, 28),
('ddh60602f31c3599', 'ncc2', 'NV1', 1, 28),
('ddh60783b251f38f', 'ncc2', 'NV1', 1, 1618492197),
('ddh609a49fc49ae6', 'ncc1', 'NV1', 3, 1620724220),
('ddh60c9b9a8af50f', 'ncc60c9b9a8af509', 'nv3', 1, 1623833000),
('ddh60c9bc077789c', 'ncc60c9b9a8af509', 'nv3', 1, 1623833607),
('dh2', 'ncc1', 'NV2', 2, 1243523232),
('dhh1', 'ncc1', 'NV1', 1, 241234231);

--
-- Bẫy `dondh`
--
DELIMITER $$
CREATE TRIGGER `them ngay tao DONDH` BEFORE INSERT ON `dondh` FOR EACH ROW BEGIN
	SET NEW.NGAYLAP = UNIX_TIMESTAMP();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `MADONHANG` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MAHOADON` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TRANGTHAIDONHANG` int(11) NOT NULL,
  `NGAYTAO` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`MADONHANG`, `MAHOADON`, `TRANGTHAIDONHANG`, `NGAYTAO`) VALUES
('dh609c6f63860e9', 'hd607cf567eb74b', 1, 1618802023),
('dh609c6fb699ea2', 'hd607cfddacf75e', 4, 1618804186),
('dh609c6fd691011', 'hd607cff8703f52', 4, 1618804615),
('dh609c6fe958266', 'hd607d05ecd677f', 4, 1618806252),
('dh609c70031f460', 'hd608f5b3bc1908', 4, 1620007739),
('dh609c701fc0c4c', 'hd609b73fc3a17d', 4, 1620800508),
('dh609c703c9e4ed', 'hd6090b99fb1a6e', 4, 1620097439),
('dh609c7079bc732', 'hd6090ecb2dbfdb', 4, 1620110514),
('dh609c70997c3f1', 'hd6090ed5707dc2', 5, 1620110679),
('dh609c70bedf7de', 'hd6090f1380458b', 5, 1620111672),
('dh609c7105dd1e7', 'hd6091f10921b75', 5, 1620177161),
('dh609c7116a511a', 'hd6093e199dd40c', 4, 1620304281),
('dh609c714fce3f9', 'hd6094a855ee1c7', 4, 1620355157),
('dh609c71654c1c7', 'hd6094a85607e10', 4, 1620355158),
('dh609c7183f284f', 'hd6097e5aae309e', 4, 1620567466),
('dh609c71a25d48c', 'hd60920fff3a2dc', 4, 1620185087),
('dh609c71bd6bad1', 'hd609268cc46296', 4, 1620207820),
('dh609c71cf84778', 'hd609965e94a842', 4, 1620665833),
('dh609c720111919', 'hd607cf5d967078', 4, 1618802137),
('dh609c9cf350e17', 'hd609c9cf350e16', 4, 1620876531),
('dh60a5d42681082', 'hd60a5d42681081', 4, 1621480486),
('dh60a91a442be12', 'hd60a91a442be11', 4, 1621695044),
('dh60aa23a4ac122', 'hd60aa23a4ac121', 5, 1621762980),
('dh60c74631a6483', 'hd60c74631a6482', 4, 1623672369),
('dh60c86e0341630', 'hd60c86e034162f', 4, 1623748099),
('dh60c9bfffab9dc', 'hd60c9bfffab9db', 4, 1623834623),
('dh60c9c0e91682e', 'hd60c9c0e91682d', 4, 1623834857),
('dh60c9c1db6daca', 'hd60c9c1db6dac9', 4, 1623835099),
('dh60c9c8a6d348d', 'hd60c9c8a6d348c', 5, 1623836838),
('dh60c9c9986833b', 'hd60c9c9986833a', 5, 1623837080),
('dh60c9c9fdaf378', 'hd60c9c9fdaf377', 5, 1623837181),
('dh60c9ca7326979', 'hd60c9ca7326978', 4, 1623837299),
('dh60c9cabef38f0', 'hd60c9cabef38ef', 1, 1623837375),
('dh60c9cb981cd1f', 'hd60c9cb981cd1e', 5, 1623837592),
('dh60c9cc3fab3cc', 'hd60c9cc3fab3cb', 5, 1623837759),
('dh60c9d003eec25', 'hd60c9d003eec24', 4, 1623838723),
('dh60c9d11fe0d4e', 'hd60c9d11fe0d4d', 4, 1623839007),
('dh60c9d147062fc', 'hd60c9d147062fb', 4, 1623839047),
('dh60c9d15c74355', 'hd60c9d15c74354', 4, 1623839068),
('dh60c9d1ea63b6a', 'hd60c9d1ea63b69', 5, 1623839210),
('dh60c9d2619f9d4', 'hd60c9d2619f9d3', 5, 1623839329),
('dh60c9d3fb1b772', 'hd60c9d3fb1b771', 5, 1623839739),
('dh60c9d473530e4', 'hd60c9d473530e3', 5, 1623839859),
('dh60c9d4c31c967', 'hd60c9d4c31c966', 4, 1623839939),
('dh60c9d4e0e5120', 'hd60c9d4e0e511f', 5, 1623839968),
('dh60c9d51939374', 'hd60c9d51939373', 5, 1623840025),
('dh60c9d555aa65b', 'hd60c9d555aa65a', 5, 1623840085),
('dh60c9d57442c3a', 'hd60c9d57442c39', 5, 1623840116),
('dh60c9d5d7efee4', 'hd60c9d5d7efee3', 5, 1623840215),
('dh60c9d62fd53a1', 'hd60c9d62fd53a0', 4, 1623840303),
('dh60ca9aac5add3', 'hd60ca9aac5add2', 4, 1623890604),
('dh60ca9b009b2ea', 'hd60ca9b009b2e9', 5, 1623890688),
('dh60ca9bd7b1de3', 'hd60ca9bd7b1de2', 5, 1623890903),
('dh60ca9c0ebaba0', 'hd60ca9c0ebab9f', 5, 1623890958),
('dh60ca9c790fa68', 'hd60ca9c790fa67', 5, 1623891065),
('dh60caa512b0b94', 'hd60caa512b0b93', 4, 1623893266),
('dh60caa64fe0649', 'hd60caa64fe0648', 4, 1623893583),
('dh60cabdd00d15b', 'hd60cabdd00d15a', 5, 1623899600),
('dh60cabde9dcd0b', 'hd60cabde9dcd0a', 4, 1623899625),
('dh60cc002f9e62c', 'hd60cc002f9e62b', 4, 1623982127),
('dh60cc05f77034e', 'hd60cc05f77034d', 4, 1623983607),
('dh60cc0671d8d46', 'hd60cc0671d8d45', 4, 1623983729),
('dh60cc07dc03ddb', 'hd60cc07dc03dda', 4, 1623984092),
('dh60cc0cd4b1e9a', 'hd60cc0cd4b1e99', 4, 1623985364);

--
-- Bẫy `donhang`
--
DELIMITER $$
CREATE TRIGGER `them ngay tao donhang` BEFORE INSERT ON `donhang` FOR EACH ROW BEGIN
	SET NEW.NGAYTAO = UNIX_TIMESTAMP();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MAHOADON` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MANV` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MAKHACHHANG` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MATRANGTHAI` int(11) NOT NULL,
  `NGAYLAP` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`MAHOADON`, `MANV`, `MAKHACHHANG`, `MATRANGTHAI`, `NGAYLAP`) VALUES
('hd607cf567eb74b', 'NV1', 'kh1', 1, 1618802023),
('hd607cf5d967078', 'NV1', NULL, 1, 1618802137),
('hd607cfddacf75e', 'NV1', 'kh1', 1, 1618804186),
('hd607cff8703f52', 'NV1', 'kh1', 1, 1618804615),
('hd607d05ecd677f', 'NV1', NULL, 1, 1618806252),
('hd608f5b3bc1908', 'NV1', NULL, 1, 1620007739),
('hd6090b99fb1a6e', 'NV1', 'kh1', 1, 1620097439),
('hd6090ecb2dbfdb', 'NV1', 'kh2', 1, 1620110514),
('hd6090ed5707dc2', 'NV1', 'kh2', 2, 1620110679),
('hd6090f1380458b', 'NV1', 'kh1', 2, 1620111672),
('hd6091f10921b75', 'NV1', 'kh607834566fa63', 2, 1620177161),
('hd60920fff3a2dc', 'NV1', 'kh2', 1, 1620185087),
('hd609268cc46296', 'NV1', NULL, 1, 1620207820),
('hd6093e199dd40c', 'NV1', 'kh6093e199dd40a', 1, 1620304281),
('hd6094a855ee1c7', 'nv6094a5f3abc71', 'kh1', 1, 1620355157),
('hd6094a85607e10', 'nv6094a5f3abc71', 'kh1', 1, 1620355158),
('hd6097e5aae309e', 'NV1', 'kh6097e5aae309c', 1, 1620567466),
('hd609965e94a842', 'NV1', 'kh607834566fa63', 1, 1620665833),
('hd609b73fc3a17d', 'nv3', 'kh2', 1, 1620800508),
('hd609c9cf350e16', 'nv3', NULL, 1, 1620876531),
('hd60a5d42681081', 'nv3', NULL, 1, 1621480486),
('hd60a91a442be11', 'nv3', 'kh607834566fa63', 1, 1621695044),
('hd60aa23a4ac121', 'nv3', NULL, 2, 1621762980),
('hd60c74631a6482', 'nv3', NULL, 1, 1623672369),
('hd60c86e034162f', 'nv3', 'kh60c86e034162d', 1, 1623748099),
('hd60c9bfffab9db', 'nv3', 'kh60783a8673b26', 1, 1623834623),
('hd60c9c0e91682d', 'nv3', NULL, 1, 1623834857),
('hd60c9c1db6dac9', 'nv3', NULL, 1, 1623835099),
('hd60c9c8a6d348c', 'nv3', 'kh2', 2, 1623836838),
('hd60c9c9986833a', 'nv3', NULL, 2, 1623837080),
('hd60c9c9fdaf377', 'nv3', NULL, 1, 1623837181),
('hd60c9ca7326978', 'nv3', 'kh60c86e034162d', 1, 1623837299),
('hd60c9cabef38ef', 'nv3', 'kh60c86e034162d', 2, 1623837374),
('hd60c9cb981cd1e', 'nv3', NULL, 2, 1623837592),
('hd60c9cc3fab3cb', 'nv3', NULL, 2, 1623837759),
('hd60c9d003eec24', 'nv3', NULL, 1, 1623838723),
('hd60c9d11fe0d4d', 'nv3', NULL, 1, 1623839007),
('hd60c9d147062fb', 'nv3', NULL, 1, 1623839047),
('hd60c9d15c74354', 'nv3', NULL, 1, 1623839068),
('hd60c9d1ea63b69', 'nv3', NULL, 2, 1623839210),
('hd60c9d2619f9d3', 'nv3', NULL, 2, 1623839329),
('hd60c9d3fb1b771', 'nv3', 'kh607834566fa63', 2, 1623839739),
('hd60c9d473530e3', 'nv3', 'kh60c9d473530de', 2, 1623839859),
('hd60c9d4c31c966', 'nv3', 'kh60c9d473530de', 1, 1623839939),
('hd60c9d4e0e511f', 'nv3', 'kh6093e199dd40a', 2, 1623839968),
('hd60c9d51939373', 'nv3', 'kh2', 2, 1623840025),
('hd60c9d555aa65a', 'nv3', 'kh60783a8673b26', 2, 1623840085),
('hd60c9d57442c39', 'nv3', 'kh1', 2, 1623840116),
('hd60c9d5d7efee3', 'nv3', 'kh1', 2, 1623840215),
('hd60c9d62fd53a0', 'nv3', 'kh607834b61e50b', 1, 1623840303),
('hd60ca9aac5add2', 'nv3', NULL, 1, 1623890604),
('hd60ca9b009b2e9', 'nv3', NULL, 2, 1623890688),
('hd60ca9bd7b1de2', 'nv3', NULL, 2, 1623890903),
('hd60ca9c0ebab9f', 'nv3', NULL, 2, 1623890958),
('hd60ca9c790fa67', 'nv3', NULL, 2, 1623891065),
('hd60caa512b0b93', 'nv3', NULL, 1, 1623893266),
('hd60caa64fe0648', 'nv3', NULL, 1, 1623893583),
('hd60cabdd00d15a', 'nv3', NULL, 2, 1623899600),
('hd60cabde9dcd0a', 'nv3', NULL, 1, 1623899625),
('hd60cc002f9e62b', 'nv3', NULL, 1, 1623982127),
('hd60cc05f77034d', 'nv3', NULL, 1, 1623983607),
('hd60cc0671d8d45', 'nv3', NULL, 1, 1623983729),
('hd60cc07dc03dda', 'nv3', NULL, 1, 1623984092),
('hd60cc0cd4b1e99', 'nv3', NULL, 1, 1623985364);

--
-- Bẫy `hoadon`
--
DELIMITER $$
CREATE TRIGGER `them ngay tao HOADON` BEFORE INSERT ON `hoadon` FOR EACH ROW BEGIN
	SET NEW.NGAYLAP = UNIX_TIMESTAMP();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MAKH` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `HO` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `TEN` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `AVATAR` text COLLATE utf8_unicode_ci NOT NULL DEFAULT 'http://localhost:8080/trasua/milestone/images/avatar.jpg',
  `NGAYTAO` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MAKH`, `HO`, `TEN`, `SDT`, `AVATAR`, `NGAYTAO`) VALUES
('kh1', 'Nguyễn trung', 'nhân', '0329138049', 'http://localhost:8080/trasua/milestone/images/avatar.jpg', 1620354547),
('kh2', 'Lê văn ', 'Luyện', '0897676564', 'http://localhost:8080/trasua/milestone/images/avatar.jpg', 1620354542),
('kh607834566fa63', 'Nguyễn văn', 'test', '0345565534', 'http://localhost:8080/trasua/milestone/images/avatar.jpg', 1620354532),
('kh607834b61e50b', 'Nguyễn văn', 'tester', '1620354547', 'http://localhost:8080/trasua/milestone/images/avatar.jpg', 1620354522),
('kh60783a8673b26', 'Nguyễn văn', 'Bảy', '1620354548', 'http://localhost:8080/trasua/milestone/images/avatar.jpg', 1620354531),
('kh60783c6563e8d', 'Nguyễn văn', 'sáu', '1620354549', 'http://localhost:8080/trasua/milestone/images/avatar.jpg', 1620354538),
('kh6093e199dd40a', 'Nguyễn Thành', 'Thắng', '0968887787', 'http://localhost:8080/trasua/milestone/images/avatar.jpg', 1620354543),
('kh6097e5aae309c', 'Nguyễn hoàng', 'long', '0465534464', 'http://localhost:8080/trasua/milestone/images/avatar.jpg', 1620354542),
('kh60c86e034162d', 'nguyễn văn', 'tèo', '0924123422', 'http://localhost:8080/trasua/milestone/images/avatar.jpg', 1620354533),
('kh60c9d473530de', 'Nguyễn văn', 'Nam', '0945543343', 'http://localhost:8080/trasua/milestone/images/avatar.jpg', 1623839859);

--
-- Bẫy `khachhang`
--
DELIMITER $$
CREATE TRIGGER `them ngay tao khach hang` BEFORE INSERT ON `khachhang` FOR EACH ROW BEGIN
	SET NEW.NGAYTAO = UNIX_TIMESTAMP();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoiluongsize`
--

CREATE TABLE `khoiluongsize` (
  `MAKHOILUONG` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MASIZE` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `KHOILUONGRIENG` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khoiluongsize`
--

INSERT INTO `khoiluongsize` (`MAKHOILUONG`, `MASIZE`, `KHOILUONGRIENG`) VALUES
('6083d18d230cf', 'masize607b5fe2e11a1', 0.8),
('6083d1c6d82a1', 'masize607b602705fe0', 1),
('6083d20308f97', 'masize607b6049e4471', 1.2),
('6083d211e02e8', 'masize607b6063d12ad', 1.5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsuchinhsua`
--

CREATE TABLE `lichsuchinhsua` (
  `MACHINHSUA` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MALOAITRASUA` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `CHITIETCHINHSUA` text COLLATE utf8_unicode_ci NOT NULL,
  `NGAYCHINHSUA` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lichsuchinhsua`
--

INSERT INTO `lichsuchinhsua` (`MACHINHSUA`, `MALOAITRASUA`, `CHITIETCHINHSUA`, `NGAYCHINHSUA`) VALUES
('chinhsua6085201cd0150', 'ts607ba482510e2', '[{\"MALOAITRASUA\":\"ts607ba482510e2\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa Test 1\",\"MOTA\":\"Lo\\u1ea1i n\\u00e0y u\\u1ed1ng ngon c\\u1ef1c!\",\"GIA\":\"14123\",\"HINHANH\":\"http:\\/\\/localhost:8080\\/trasua\\/FileUpload\\/2019-01-27.png\",\"TRANGTHAI\":\"0\",\"NGAYTAO\":\"1618715778\",\"CTLOAITRASUA\":[{\"MALOAITRASUA\":\"ts607ba482510e2\",\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\",\"TENNL\":\"matcha\"},{\"MALOAITRASUA\":\"ts607ba482510e2\",\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.2\",\"DONVI\":\"lit\",\"GHICHU\":\"\",\"TENNL\":\"suatuoi\"}],\"CTSIZE\":[{\"MALOAITRASUA\":\"ts607ba482510e2\",\"MASIZE\":\"masize607b5fe2e11a1\",\"KHOILUONGRIENG\":\"0.7\",\"GIA\":\"7777.7\",\"THANHPHAN\":\"[{\\\"MANGUYENLIEU\\\":\\\"nl1\\\",\\\"LIEULUONG\\\":0.06999999999999999,\\\"DONVI\\\":\\\"kg\\\",\\\"GHICHU\\\":\\\"\\\"},{\\\"MANGUYENLIEU\\\":\\\"nl2\\\",\\\"LIEULUONG\\\":0.13999999999999999,\\\"DONVI\\\":\\\"lit\\\",\\\"GHICHU\\\":\\\"\\\"}]\",\"TENSIZE\":\"Size S\"}]}]', 1619337244),
('chinhsua6085201cd23fe', 'ts607ba482510e2', '{\"MALOAITRASUA\":\"ts607ba482510e2\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa Test 1\",\"MOTA\":\"Lo\\u1ea1i n\\u00e0y u\\u1ed1ng ngon c\\u1ef1c!\",\"GIA\":\"1111\",\"HINHANH\":null,\"TRANGTHAI\":\"0\",\"NGAYCHINHSUA\":\"25\\/04\\/2021 14:54:04pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.2\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeS\",\"MASIZE\":\"masize607b5fe2e11a1\"}]}', 1619337244),
('chinhsua608523697f413', 'ts607ba482510e2', '{\"MALOAITRASUA\":\"ts607ba482510e2\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa Test 1\",\"MOTA\":\"Lo\\u1ea1i n\\u00e0y u\\u1ed1ng ngon c\\u1ef1c!\",\"GIA\":\"1111\",\"HINHANH\":null,\"TRANGTHAI\":\"0\",\"NGAYCHINHSUA\":\"25\\/04\\/2021 15:08:09pm\",\"CTLOAITRASUA\":[],\"CTSIZE\":[{\"TENSIZE\":\"SizeS\",\"MASIZE\":\"masize607b5fe2e11a1\"},{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"}]}', 1619338089),
('chinhsua60852c71e8035', 'ts607ba482510e2', '{\"MALOAITRASUA\":\"ts607ba482510e2\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa Test 1\",\"MOTA\":\"Lo\\u1ea1i n\\u00e0y u\\u1ed1ng ngon c\\u1ef1c!\",\"GIA\":\"1111\",\"HINHANH\":null,\"TRANGTHAI\":\"0\",\"NGAYCHINHSUA\":\"25\\/04\\/2021 15:46:41pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.2\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeS\",\"MASIZE\":\"masize607b5fe2e11a1\"},{\"TENSIZE\":\"SizeM\",\"MASIZE\":\"masize607b602705fe0\"}]}', 1619340401),
('chinhsua60852c9e59ac6', 'ts607ba482510e2', '{\"MALOAITRASUA\":\"ts607ba482510e2\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa Test 1\",\"MOTA\":\"Lo\\u1ea1i n\\u00e0y u\\u1ed1ng ngon c\\u1ef1c!\",\"GIA\":\"1111\",\"HINHANH\":null,\"TRANGTHAI\":\"0\",\"NGAYCHINHSUA\":\"25\\/04\\/2021 15:47:26pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.2\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"},{\"TENSIZE\":\"SizeXL\",\"MASIZE\":\"masize607b6063d12ad\"}]}', 1619340446),
('chinhsua608531255f04e', 'ts607ba482510e2', '{\"MALOAITRASUA\":\"ts607ba482510e2\",\"TENLOAI\":\"phimmoi.net\",\"MOTA\":\"Lo\\u1ea1i n\\u00e0y u\\u1ed1ng ngon c\\u1ef1c!\",\"GIA\":\"1111\",\"HINHANH\":null,\"TRANGTHAI\":\"0\",\"NGAYCHINHSUA\":\"25\\/04\\/2021 16:06:45pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.2\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeS\",\"MASIZE\":\"masize607b5fe2e11a1\"}]}', 1619341605),
('chinhsua608531476c047', 'ts607ba482510e2', '{\"MALOAITRASUA\":\"ts607ba482510e2\",\"TENLOAI\":\"phimmoi.net\",\"MOTA\":\"phim n\\u00e0y hay c\\u1ef1c!\",\"GIA\":\"1111\",\"HINHANH\":null,\"TRANGTHAI\":\"0\",\"NGAYCHINHSUA\":\"25\\/04\\/2021 16:07:19pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.2\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeS\",\"MASIZE\":\"masize607b5fe2e11a1\"}]}', 1619341639),
('chinhsua608531805d39b', 'ts607ba482510e2', '{\"MALOAITRASUA\":\"ts607ba482510e2\",\"TENLOAI\":\"phimmoi.xyz\",\"MOTA\":\"phim n\\u00e0y si\\u00eau hay!\",\"GIA\":\"14997\",\"HINHANH\":null,\"TRANGTHAI\":\"0\",\"NGAYCHINHSUA\":\"25\\/04\\/2021 16:08:16pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.2\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeS\",\"MASIZE\":\"masize607b5fe2e11a1\"},{\"TENSIZE\":\"SizeM\",\"MASIZE\":\"masize607b602705fe0\"},{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"}]}', 1619341696),
('chinhsua6085340f0a2d1', 'ts607ba482510e2', '{\"MALOAITRASUA\":\"ts607ba482510e2\",\"TENLOAI\":\"phimmoi.xyz\",\"MOTA\":\"phim n\\u00e0y si\\u00eau hay!\",\"GIA\":\"14997\",\"HINHANH\":null,\"TRANGTHAI\":\"0\",\"NGAYCHINHSUA\":\"25\\/04\\/2021 16:19:11pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.5\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeS\",\"MASIZE\":\"masize607b5fe2e11a1\"}]}', 1619342351),
('chinhsua60853551337a8', 'ts607ba482510e2', '{\"MALOAITRASUA\":\"ts607ba482510e2\",\"TENLOAI\":\"phimmoi.xyz\",\"MOTA\":\"phim n\\u00e0y si\\u00eau hay!\",\"GIA\":\"14997\",\"HINHANH\":\"\",\"TRANGTHAI\":\"0\",\"NGAYCHINHSUA\":\"25\\/04\\/2021 16:24:33pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.5\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeS\",\"MASIZE\":\"masize607b5fe2e11a1\"}]}', 1619342673),
('chinhsua6086175f0f12b', 'ts607ba482510e2', '{\"MALOAITRASUA\":\"ts607ba482510e2\",\"TENLOAI\":\"phimmoi.xyz\",\"MOTA\":\"phim n\\u00e0y si\\u00eau hay!\",\"GIA\":\"14996\",\"HINHANH\":\"samba_client.png\",\"TRANGTHAI\":\"0\",\"NGAYCHINHSUA\":\"26\\/04\\/2021 08:29:03am\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.5\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeS\",\"MASIZE\":\"masize607b5fe2e11a1\"}]}', 1619400543),
('chinhsua60863bc976272', 'ts607c023b73541', '[{\"MALOAITRASUA\":\"ts607c023b73541\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa Test 2\",\"MOTA\":\"U\\u1ed1ng l\\u00e0 ghi\\u1ec1n\",\"GIA\":\"17000\",\"HINHANH\":\"http:\\/\\/localhost:8080\\/trasua\\/FileUpload\\/dacbiet.jpg\",\"TRANGTHAI\":\"1\",\"NGAYTAO\":\"1618739771\",\"CTLOAITRASUA\":[{\"MALOAITRASUA\":\"ts607c023b73541\",\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\",\"TENNL\":\"matcha\"},{\"MALOAITRASUA\":\"ts607c023b73541\",\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.5\",\"DONVI\":\"lit\",\"GHICHU\":\"\",\"TENNL\":\"suatuoi\"},{\"MALOAITRASUA\":\"ts607c023b73541\",\"MANGUYENLIEU\":\"nl605da771044c1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\",\"TENNL\":\"socola\"}],\"CTSIZE\":[{\"MALOAITRASUA\":\"ts607c023b73541\",\"MASIZE\":\"masize607b5fe2e11a1\",\"KHOILUONGRIENG\":\"0.7\",\"GIA\":\"11900\",\"THANHPHAN\":\"[{\\\"MANGUYENLIEU\\\":\\\"nl1\\\",\\\"LIEULUONG\\\":0.06999999999999999,\\\"DONVI\\\":\\\"kg\\\",\\\"GHICHU\\\":\\\"\\\"},{\\\"MANGUYENLIEU\\\":\\\"nl2\\\",\\\"LIEULUONG\\\":0.35,\\\"DONVI\\\":\\\"lit\\\",\\\"GHICHU\\\":\\\"\\\"},{\\\"MANGUYENLIEU\\\":\\\"nl605da771044c1\\\",\\\"LIEULUONG\\\":0.06999999999999999,\\\"DONVI\\\":\\\"kg\\\",\\\"GHICHU\\\":\\\"\\\"}]\",\"TENSIZE\":\"Size S\"},{\"MALOAITRASUA\":\"ts607c023b73541\",\"MASIZE\":\"masize607b6049e4471\",\"KHOILUONGRIENG\":\"1.2\",\"GIA\":\"20400\",\"THANHPHAN\":\"[{\\\"MANGUYENLIEU\\\":\\\"nl1\\\",\\\"LIEULUONG\\\":0.12,\\\"DONVI\\\":\\\"kg\\\",\\\"GHICHU\\\":\\\"\\\"},{\\\"MANGUYENLIEU\\\":\\\"nl2\\\",\\\"LIEULUONG\\\":0.6,\\\"DONVI\\\":\\\"lit\\\",\\\"GHICHU\\\":\\\"\\\"},{\\\"MANGUYENLIEU\\\":\\\"nl605da771044c1\\\",\\\"LIEULUONG\\\":0.12,\\\"DONVI\\\":\\\"kg\\\",\\\"GHICHU\\\":\\\"\\\"}]\",\"TENSIZE\":\"Size L\"}]}]', 1619409865),
('chinhsua60863bc97878c', 'ts607c023b73541', '{\"MALOAITRASUA\":\"ts607c023b73541\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa vi\\u1ec7t qu\\u1ea5c\",\"MOTA\":\"U\\u1ed1ng l\\u00e0 ghi\\u1ec1n\",\"GIA\":\"17000\",\"HINHANH\":\"\",\"TRANGTHAI\":\"1\",\"NGAYCHINHSUA\":\"26\\/04\\/2021 11:04:25am\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.5\",\"DONVI\":\"lit\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605da771044c1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeS\",\"MASIZE\":\"masize607b5fe2e11a1\"}]}', 1619409865),
('chinhsua6086416ab877c', 'ts607ba482510e2', '{\"MALOAITRASUA\":\"ts607ba482510e2\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa tr\\u00e2n ch\\u00e2u \\u0111\\u01b0\\u1eddng \\u0111en\",\"MOTA\":\"U\\u1ed1ng v\\u00f4 l\\u00e0 ghi\\u1ec1n li\\u1ec1n\",\"GIA\":\"14996\",\"HINHANH\":\"tranchauduongden.jpg\",\"TRANGTHAI\":\"0\",\"NGAYCHINHSUA\":\"26\\/04\\/2021 11:28:26am\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.5\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeS\",\"MASIZE\":\"masize607b5fe2e11a1\"}]}', 1619411306),
('chinhsua6086419b4e2f3', 'ts607ba482510e2', '{\"MALOAITRASUA\":\"ts607ba482510e2\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa tr\\u00e2n ch\\u00e2u \\u0111\\u01b0\\u1eddng \\u0111en\",\"MOTA\":\"U\\u1ed1ng v\\u00f4 l\\u00e0 ghi\\u1ec1n li\\u1ec1n\",\"GIA\":\"14996\",\"HINHANH\":\"\",\"TRANGTHAI\":\"0\",\"NGAYCHINHSUA\":\"26\\/04\\/2021 11:29:15am\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.5\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeS\",\"MASIZE\":\"masize607b5fe2e11a1\"}]}', 1619411355),
('chinhsua608641b6d21f8', 'ts607ba482510e2', '{\"MALOAITRASUA\":\"ts607ba482510e2\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa tr\\u00e2n ch\\u00e2u \\u0111\\u01b0\\u1eddng \\u0111en\",\"MOTA\":\"U\\u1ed1ng v\\u00f4 l\\u00e0 ghi\\u1ec1n li\\u1ec1n\",\"GIA\":\"14996\",\"HINHANH\":\"\",\"TRANGTHAI\":\"0\",\"NGAYCHINHSUA\":\"26\\/04\\/2021 11:29:42am\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.5\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeS\",\"MASIZE\":\"masize607b5fe2e11a1\"}]}', 1619411382),
('chinhsua608641f646f5f', 'ts607c43f77825e', '[{\"MALOAITRASUA\":\"ts607c43f77825e\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa Test 3\",\"MOTA\":\"Th\\u01a1m ngon l\\u1ea1 th\\u01b0\\u1eddng\",\"GIA\":\"20000\",\"HINHANH\":\"http:\\/\\/localhost:8080\\/trasua\\/FileUpload\\/MyTuning.png\",\"TRANGTHAI\":\"1\",\"NGAYTAO\":\"1618756599\",\"CTLOAITRASUA\":[{\"MALOAITRASUA\":\"ts607c43f77825e\",\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\",\"TENNL\":\"matcha\"},{\"MALOAITRASUA\":\"ts607c43f77825e\",\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.4\",\"DONVI\":\"lit\",\"GHICHU\":\"\",\"TENNL\":\"suatuoi\"}],\"CTSIZE\":[{\"MALOAITRASUA\":\"ts607c43f77825e\",\"MASIZE\":\"masize607b5fe2e11a1\",\"KHOILUONGRIENG\":\"0.7\",\"GIA\":\"14000\",\"THANHPHAN\":\"[{\\\"MANGUYENLIEU\\\":\\\"nl1\\\",\\\"LIEULUONG\\\":0.06999999999999999,\\\"DONVI\\\":\\\"kg\\\",\\\"GHICHU\\\":\\\"\\\"},{\\\"MANGUYENLIEU\\\":\\\"nl2\\\",\\\"LIEULUONG\\\":0.27999999999999997,\\\"DONVI\\\":\\\"lit\\\",\\\"GHICHU\\\":\\\"\\\"}]\",\"TENSIZE\":\"Size S\"},{\"MALOAITRASUA\":\"ts607c43f77825e\",\"MASIZE\":\"masize607b6049e4471\",\"KHOILUONGRIENG\":\"1.2\",\"GIA\":\"24000\",\"THANHPHAN\":\"[{\\\"MANGUYENLIEU\\\":\\\"nl1\\\",\\\"LIEULUONG\\\":0.12,\\\"DONVI\\\":\\\"kg\\\",\\\"GHICHU\\\":\\\"\\\"},{\\\"MANGUYENLIEU\\\":\\\"nl2\\\",\\\"LIEULUONG\\\":0.48,\\\"DONVI\\\":\\\"lit\\\",\\\"GHICHU\\\":\\\"\\\"}]\",\"TENSIZE\":\"Size L\"}]}]', 1619411446),
('chinhsua608641f648fc2', 'ts607c43f77825e', '{\"MALOAITRASUA\":\"ts607c43f77825e\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa 3 lo\\u1ea1i tr\\u00e2n ch\\u00e2u\",\"MOTA\":\"Th\\u01a1m ngon l\\u1ea1 th\\u01b0\\u1eddng\",\"GIA\":\"20000\",\"HINHANH\":\"TRA-SAU-3-LOAI-TRAN-CHAU.jpg\",\"TRANGTHAI\":\"1\",\"NGAYCHINHSUA\":\"26\\/04\\/2021 11:30:46am\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.4\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeS\",\"MASIZE\":\"masize607b5fe2e11a1\"}]}', 1619411446),
('chinhsua60865f9bf0097', 'ts607cd78d9cfe7', '[{\"MALOAITRASUA\":\"ts607cd78d9cfe7\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa Test 4\",\"MOTA\":\"Kh\\u00f4ng th\\u1ec3 d\\u1eebng\",\"GIA\":\"21000\",\"HINHANH\":\"http:\\/\\/localhost:8080\\/trasua\\/FileUpload\\/test3.jpg\",\"TRANGTHAI\":\"1\",\"NGAYTAO\":\"1618794381\",\"CTLOAITRASUA\":[{\"MALOAITRASUA\":\"ts607cd78d9cfe7\",\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.5\",\"DONVI\":\"lit\",\"GHICHU\":\"\",\"TENNL\":\"suatuoi\"},{\"MALOAITRASUA\":\"ts607cd78d9cfe7\",\"MANGUYENLIEU\":\"nl605f0f8d1e7dc\",\"LIEULUONG\":\"0.2\",\"DONVI\":\"kg\",\"GHICHU\":\"\",\"TENNL\":\"tranchau\"},{\"MALOAITRASUA\":\"ts607cd78d9cfe7\",\"MANGUYENLIEU\":\"nl605f103d2a973\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\",\"TENNL\":\"kem t\\u01b0\\u01a1i\"}],\"CTSIZE\":[{\"MALOAITRASUA\":\"ts607cd78d9cfe7\",\"MASIZE\":\"masize607b5fe2e11a1\",\"KHOILUONGRIENG\":\"0.7\",\"GIA\":\"14700\",\"THANHPHAN\":\"[{\\\"MANGUYENLIEU\\\":\\\"nl605f0f8d1e7dc\\\",\\\"LIEULUONG\\\":0.13999999999999999,\\\"DONVI\\\":\\\"kg\\\",\\\"GHICHU\\\":\\\"\\\"},{\\\"MANGUYENLIEU\\\":\\\"nl2\\\",\\\"LIEULUONG\\\":0.35,\\\"DONVI\\\":\\\"lit\\\",\\\"GHICHU\\\":\\\"\\\"},{\\\"MANGUYENLIEU\\\":\\\"nl605f103d2a973\\\",\\\"LIEULUONG\\\":0.06999999999999999,\\\"DONVI\\\":\\\"kg\\\",\\\"GHICHU\\\":\\\"\\\"}]\",\"TENSIZE\":\"Size S\"},{\"MALOAITRASUA\":\"ts607cd78d9cfe7\",\"MASIZE\":\"masize607b602705fe0\",\"KHOILUONGRIENG\":\"1\",\"GIA\":\"21000\",\"THANHPHAN\":\"[{\\\"MANGUYENLIEU\\\":\\\"nl605f0f8d1e7dc\\\",\\\"LIEULUONG\\\":0.13999999999999999,\\\"DONVI\\\":\\\"kg\\\",\\\"GHICHU\\\":\\\"\\\"},{\\\"MANGUYENLIEU\\\":\\\"nl2\\\",\\\"LIEULUONG\\\":0.35,\\\"DONVI\\\":\\\"lit\\\",\\\"GHICHU\\\":\\\"\\\"},{\\\"MANGUYENLIEU\\\":\\\"nl605f103d2a973\\\",\\\"LIEULUONG\\\":0.06999999999999999,\\\"DONVI\\\":\\\"kg\\\",\\\"GHICHU\\\":\\\"\\\"}]\",\"TENSIZE\":\"Size M\"},{\"MALOAITRASUA\":\"ts607cd78d9cfe7\",\"MASIZE\":\"masize607b6049e4471\",\"KHOILUONGRIENG\":\"1.2\",\"GIA\":\"25200\",\"THANHPHAN\":\"[{\\\"MANGUYENLIEU\\\":\\\"nl605f0f8d1e7dc\\\",\\\"LIEULUONG\\\":0.24,\\\"DONVI\\\":\\\"kg\\\",\\\"GHICHU\\\":\\\"\\\"},{\\\"MANGUYENLIEU\\\":\\\"nl2\\\",\\\"LIEULUONG\\\":0.6,\\\"DONVI\\\":\\\"lit\\\",\\\"GHICHU\\\":\\\"\\\"},{\\\"MANGUYENLIEU\\\":\\\"nl605f103d2a973\\\",\\\"LIEULUONG\\\":0.12,\\\"DONVI\\\":\\\"kg\\\",\\\"GHICHU\\\":\\\"\\\"}]\",\"TENSIZE\":\"Size L\"}]}]', 1619419036),
('chinhsua60865f9c093a4', 'ts607cd78d9cfe7', '{\"MALOAITRASUA\":\"ts607cd78d9cfe7\",\"TENLOAI\":\"Tr\\u00e2n ch\\u00e2u lo\\u1ea1i 1\",\"MOTA\":\"Kh\\u00f4ng th\\u1ec3 d\\u1eebng\",\"GIA\":\"21000\",\"HINHANH\":\"\",\"TRANGTHAI\":\"1\",\"NGAYCHINHSUA\":\"26\\/04\\/2021 13:37:16pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.5\",\"DONVI\":\"lit\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605f0f8d1e7dc\",\"LIEULUONG\":\"0.2\",\"DONVI\":\"kg\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605f103d2a973\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeS\",\"MASIZE\":\"masize607b5fe2e11a1\"}]}', 1619419036),
('chinhsua6090f2c41986f', 'ts607ba482510e2', '{\"MALOAITRASUA\":\"ts607ba482510e2\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa tr\\u00e2n ch\\u00e2u \\u0111\\u01b0\\u1eddng \\u0111en\",\"MOTA\":\"U\\u1ed1ng v\\u00f4 l\\u00e0 ghi\\u1ec1n li\\u1ec1n\",\"GIA\":\"14996\",\"HINHANH\":\"\",\"TRANGTHAI\":\"0\",\"NGAYCHINHSUA\":\"04\\/05\\/2021 14:07:48pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.5\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeS\",\"MASIZE\":\"masize607b5fe2e11a1\"},{\"TENSIZE\":\"SizeM\",\"MASIZE\":\"masize607b602705fe0\"}]}', 1620112068),
('chinhsua609111fd5fad1', 'ts607c023b73541', '{\"MALOAITRASUA\":\"ts607c023b73541\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa vi\\u1ec7t qu\\u1ea5c\",\"MOTA\":\"U\\u1ed1ng l\\u00e0 ghi\\u1ec1n\",\"GIA\":\"17000\",\"HINHANH\":\"\",\"TRANGTHAI\":\"1\",\"NGAYCHINHSUA\":\"04\\/05\\/2021 16:21:01pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.5\",\"DONVI\":\"lit\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605da771044c1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeS\",\"MASIZE\":\"masize607b5fe2e11a1\"},{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"}]}', 1620120061),
('chinhsua609268a3e4e25', 'tsmc1', '[{\"MALOAITRASUA\":\"tsmc1\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa matcha\",\"MOTA\":null,\"GIA\":\"15000\",\"HINHANH\":\"http:\\/\\/localhost:8080\\/trasua\\/FileUpload\\/tra-sua-matcha.jpg\",\"TRANGTHAI\":\"1\",\"NGAYTAO\":\"124123223\",\"CTLOAITRASUA\":[{\"MALOAITRASUA\":\"tsmc1\",\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"\",\"GHICHU\":null,\"TENNL\":\"B\\u1ed9t matcha\"},{\"MALOAITRASUA\":\"tsmc1\",\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.2\",\"DONVI\":\"\",\"GHICHU\":null,\"TENNL\":\"S\\u1eefa t\\u01b0\\u01a1i\"}],\"CTSIZE\":[]}]', 1620207779),
('chinhsua609268a3eb3a5', 'tsmc1', '{\"MALOAITRASUA\":\"tsmc1\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa matcha\",\"MOTA\":\"\",\"GIA\":\"15000\",\"HINHANH\":\"\",\"TRANGTHAI\":\"1\",\"NGAYCHINHSUA\":\"05\\/05\\/2021 16:42:59pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.2\",\"DONVI\":\"\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeS\",\"MASIZE\":\"masize607b5fe2e11a1\"},{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"}]}', 1620207779),
('chinhsua609663ccee930', 'ts607c43f77825e', '{\"MALOAITRASUA\":\"ts607c43f77825e\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa 3 lo\\u1ea1i tr\\u00e2n ch\\u00e2u\",\"MOTA\":\"Th\\u01a1m ngon l\\u1ea1 th\\u01b0\\u1eddng\",\"GIA\":\"20000\",\"HINHANH\":\"\",\"TRANGTHAI\":\"1\",\"NGAYCHINHSUA\":\"08\\/05\\/2021 17:11:24pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"123123312333\",\"DONVI\":\"kg\",\"GHICHU\":\"Ghi ch\\u00fa nl 1\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.4\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"}]}', 1620468684),
('chinhsua609663e92b29d', 'ts607c43f77825e', '{\"MALOAITRASUA\":\"ts607c43f77825e\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa 3 lo\\u1ea1i tr\\u00e2n ch\\u00e2u\",\"MOTA\":\"Th\\u01a1m ngon l\\u1ea1 th\\u01b0\\u1eddng\",\"GIA\":\"20000\",\"HINHANH\":\"\",\"TRANGTHAI\":\"1\",\"NGAYCHINHSUA\":\"08\\/05\\/2021 17:11:53pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"Ghi ch\\u00fa nl 1\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.4\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"}]}', 1620468713),
('chinhsua60966d7032aef', 'ts607c43f77825e', '{\"MALOAITRASUA\":\"ts607c43f77825e\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa 3 lo\\u1ea1i tr\\u00e2n ch\\u00e2u\",\"MOTA\":\"Th\\u01a1m ngon l\\u1ea1 th\\u01b0\\u1eddng\",\"GIA\":\"20000\",\"HINHANH\":\"\",\"TRANGTHAI\":\"1\",\"NGAYCHINHSUA\":\"08\\/05\\/2021 17:52:32pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"Ghi ch\\u00fa nl 1\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.4\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"}]}', 1620471152),
('chinhsua60966d7bef877', 'ts607c43f77825e', '{\"MALOAITRASUA\":\"ts607c43f77825e\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa 3 lo\\u1ea1i tr\\u00e2n ch\\u00e2u\",\"MOTA\":\"Th\\u01a1m ngon l\\u1ea1 th\\u01b0\\u1eddng\",\"GIA\":\"20000\",\"HINHANH\":\"\",\"TRANGTHAI\":\"0\",\"NGAYCHINHSUA\":\"08\\/05\\/2021 17:52:43pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"Ghi ch\\u00fa nl 1\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.4\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"}]}', 1620471163),
('chinhsua60966dee107b5', 'ts607c43f77825e', '{\"MALOAITRASUA\":\"ts607c43f77825e\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa 3 lo\\u1ea1i tr\\u00e2n ch\\u00e2u\",\"MOTA\":\"Th\\u01a1m ngon l\\u1ea1 th\\u01b0\\u1eddng\",\"GIA\":\"20000\",\"HINHANH\":\"\",\"TRANGTHAI\":\"0\",\"NGAYCHINHSUA\":\"08\\/05\\/2021 17:54:38pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"Ghi ch\\u00fa nl 1\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.4\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"}]}', 1620471278),
('chinhsua609690fcb5079', 'ts6091ef91c51e9', '[{\"MALOAITRASUA\":\"ts6091ef91c51e9\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa hoa \\u0111\\u1eadu bi\\u1ebfc\",\"MOTA\":\"Hoa \\u0111\\u1eadu bi\\u1ebfc l\\u00e0 nguy\\u00ean li\\u1ec7u pha ch\\u1ebf th\\u1ee9c u\\u1ed1ng, n\\u1ea5u \\u0103n, l\\u00e0m b\\u00e1nh \\u0111\\u01b0\\u1ee3c c\\u00e1c n\\u01b0\\u1edbc Ph\\u01b0\\u01a1ng T\\u00e2y \\u01b0a chu\\u1ed9ng. Sau khi ph\\u1ed5 bi\\u1ebfn \\u1edf n\\u01b0\\u1edbc ta, lo\\u1ea1i hoa n\\u00e0y nhanh ch\\u00f3ng \\u0111\\u01b0\\u1ee3c \\u1ee9ng d\\u1ee5ng r\\u1ed9ng r\\u00e3i. Ng\\u01b0\\u1eddi ta \\u0111\\u00e3 t\\u1eadn d\\u1ee5ng h\\u01b0\\u01a1ng th\\u01a1m v\\u00e0 m\\u00e0u s\\u1eafc t\\u1ef1 nhi\\u00ean \\u0111\\u1eb9p m\\u1eaft c\\u1ee7a hoa \\u0111\\u1eadu bi\\u1ebfc \\u0111\\u1ec3 pha ch\\u1ebf nhi\\u1ec1u m\\u00f3n th\\u1ee9c u\\u1ed1ng th\\u01a1m ngon. M\\u00f3n tr\\u00e0 s\\u1eefa hoa \\u0111\\u1eadu bi\\u1ebfc ra \\u0111\\u1eddi t\\u1eeb \\u0111\\u00f3.\",\"GIA\":\"18000\",\"HINHANH\":\"http:\\/\\/localhost:8080\\/trasua\\/FileUpload\\/cach-lam-tra-sua-hoa-dau-biec.jpg\",\"TRANGTHAI\":\"1\",\"NGAYTAO\":\"1620176785\",\"CTLOAITRASUA\":[{\"MALOAITRASUA\":\"ts6091ef91c51e9\",\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.4\",\"DONVI\":\"lit\",\"GHICHU\":\"\",\"TENNL\":\"S\\u1eefa t\\u01b0\\u01a1i\"},{\"MALOAITRASUA\":\"ts6091ef91c51e9\",\"MANGUYENLIEU\":\"nl605f0f8d1e7dc\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kilogram\",\"GHICHU\":\"\",\"TENNL\":\"H\\u1ea1t tr\\u00e2n ch\\u00e2u\"},{\"MALOAITRASUA\":\"ts6091ef91c51e9\",\"MANGUYENLIEU\":\"nl605f103d2a973\",\"LIEULUONG\":\"0.2\",\"DONVI\":\"kilogram\",\"GHICHU\":\"\",\"TENNL\":\"kem t\\u01b0\\u01a1i\"}],\"CTSIZE\":[{\"MALOAITRASUA\":\"ts6091ef91c51e9\",\"MASIZE\":\"masize607b5fe2e11a1\",\"KHOILUONGRIENG\":\"0.7\",\"GIA\":\"12600\",\"THANHPHAN\":\"[{\\\"MANGUYENLIEU\\\":\\\"nl2\\\",\\\"LIEULUONG\\\":0.27999999999999997,\\\"DONVI\\\":\\\"lit\\\",\\\"GHICHU\\\":\\\"\\\"},{\\\"MANGUYENLIEU\\\":\\\"nl605f0f8d1e7dc\\\",\\\"LIEULUONG\\\":0.06999999999999999,\\\"DONVI\\\":\\\"kilogram\\\",\\\"GHICHU\\\":\\\"\\\"},{\\\"MANGUYENLIEU\\\":\\\"nl605f103d2a973\\\",\\\"LIEULUONG\\\":0.13999999999999999,\\\"DONVI\\\":\\\"kilogram\\\",\\\"GHICHU\\\":\\\"\\\"}]\",\"TENSIZE\":\"Size S\"},{\"MALOAITRASUA\":\"ts6091ef91c51e9\",\"MASIZE\":\"masize607b602705fe0\",\"KHOILUONGRIENG\":\"1\",\"GIA\":\"18000\",\"THANHPHAN\":\"[{\\\"MANGUYENLIEU\\\":\\\"nl2\\\",\\\"LIEULUONG\\\":0.27999999999999997,\\\"DONVI\\\":\\\"lit\\\",\\\"GHICHU\\\":\\\"\\\"},{\\\"MANGUYENLIEU\\\":\\\"nl605f0f8d1e7dc\\\",\\\"LIEULUONG\\\":0.06999999999999999,\\\"DONVI\\\":\\\"kilogram\\\",\\\"GHICHU\\\":\\\"\\\"},{\\\"MANGUYENLIEU\\\":\\\"nl605f103d2a973\\\",\\\"LIEULUONG\\\":0.13999999999999999,\\\"DONVI\\\":\\\"kilogram\\\",\\\"GHICHU\\\":\\\"\\\"}]\",\"TENSIZE\":\"Size M\"},{\"MALOAITRASUA\":\"ts6091ef91c51e9\",\"MASIZE\":\"masize607b6049e4471\",\"KHOILUONGRIENG\":\"1.2\",\"GIA\":\"21600\",\"THANHPHAN\":\"[{\\\"MANGUYENLIEU\\\":\\\"nl2\\\",\\\"LIEULUONG\\\":0.48,\\\"DONVI\\\":\\\"lit\\\",\\\"GHICHU\\\":\\\"\\\"},{\\\"MANGUYENLIEU\\\":\\\"nl605f0f8d1e7dc\\\",\\\"LIEULUONG\\\":0.12,\\\"DONVI\\\":\\\"kilogram\\\",\\\"GHICHU\\\":\\\"\\\"},{\\\"MANGUYENLIEU\\\":\\\"nl605f103d2a973\\\",\\\"LIEULUONG\\\":0.24,\\\"DONVI\\\":\\\"kilogram\\\",\\\"GHICHU\\\":\\\"\\\"}]\",\"TENSIZE\":\"Size L\"}]}]', 1620480252),
('chinhsua609690fcb8e83', 'ts6091ef91c51e9', '{\"MALOAITRASUA\":\"ts6091ef91c51e9\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa hoa \\u0111\\u1eadu bi\\u1ebfc\",\"MOTA\":\"Hoa \\u0111\\u1eadu bi\\u1ebfc l\\u00e0 nguy\\u00ean li\\u1ec7u pha ch\\u1ebf th\\u1ee9c u\\u1ed1ng, n\\u1ea5u \\u0103n, l\\u00e0m b\\u00e1nh \\u0111\\u01b0\\u1ee3c c\\u00e1c n\\u01b0\\u1edbc Ph\\u01b0\\u01a1ng T\\u00e2y \\u01b0a chu\\u1ed9ng. Sau khi ph\\u1ed5 bi\\u1ebfn \\u1edf n\\u01b0\\u1edbc ta, lo\\u1ea1i hoa n\\u00e0y nhanh ch\\u00f3ng \\u0111\\u01b0\\u1ee3c \\u1ee9ng d\\u1ee5ng r\\u1ed9ng r\\u00e3i. Ng\\u01b0\\u1eddi ta \\u0111\\u00e3 t\\u1eadn d\\u1ee5ng h\\u01b0\\u01a1ng th\\u01a1m v\\u00e0 m\\u00e0u s\\u1eafc t\\u1ef1 nhi\\u00ean \\u0111\\u1eb9p m\\u1eaft c\\u1ee7a hoa \\u0111\\u1eadu bi\\u1ebfc \\u0111\\u1ec3 pha ch\\u1ebf nhi\\u1ec1u m\\u00f3n th\\u1ee9c u\\u1ed1ng th\\u01a1m ngon. M\\u00f3n tr\\u00e0 s\\u1eefa hoa \\u0111\\u1eadu bi\\u1ebfc ra \\u0111\\u1eddi t\\u1eeb \\u0111\\u00f3.\",\"GIA\":\"19000\",\"HINHANH\":\"\",\"TRANGTHAI\":null,\"NGAYCHINHSUA\":\"08\\/05\\/2021 20:24:12pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.4\",\"DONVI\":\"lit\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605f0f8d1e7dc\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kilogram\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605f103d2a973\",\"LIEULUONG\":\"0.2\",\"DONVI\":\"kilogram\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"}]}', 1620480252),
('chinhsua60969108d4e08', 'ts6091ef91c51e9', '{\"MALOAITRASUA\":\"ts6091ef91c51e9\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa hoa \\u0111\\u1eadu bi\\u1ebfc\",\"MOTA\":\"Hoa \\u0111\\u1eadu bi\\u1ebfc l\\u00e0 nguy\\u00ean li\\u1ec7u pha ch\\u1ebf th\\u1ee9c u\\u1ed1ng, n\\u1ea5u \\u0103n, l\\u00e0m b\\u00e1nh \\u0111\\u01b0\\u1ee3c c\\u00e1c n\\u01b0\\u1edbc Ph\\u01b0\\u01a1ng T\\u00e2y \\u01b0a chu\\u1ed9ng. Sau khi ph\\u1ed5 bi\\u1ebfn \\u1edf n\\u01b0\\u1edbc ta, lo\\u1ea1i hoa n\\u00e0y nhanh ch\\u00f3ng \\u0111\\u01b0\\u1ee3c \\u1ee9ng d\\u1ee5ng r\\u1ed9ng r\\u00e3i. Ng\\u01b0\\u1eddi ta \\u0111\\u00e3 t\\u1eadn d\\u1ee5ng h\\u01b0\\u01a1ng th\\u01a1m v\\u00e0 m\\u00e0u s\\u1eafc t\\u1ef1 nhi\\u00ean \\u0111\\u1eb9p m\\u1eaft c\\u1ee7a hoa \\u0111\\u1eadu bi\\u1ebfc \\u0111\\u1ec3 pha ch\\u1ebf nhi\\u1ec1u m\\u00f3n th\\u1ee9c u\\u1ed1ng th\\u01a1m ngon. M\\u00f3n tr\\u00e0 s\\u1eefa hoa \\u0111\\u1eadu bi\\u1ebfc ra \\u0111\\u1eddi t\\u1eeb \\u0111\\u00f3.\",\"GIA\":\"18000\",\"HINHANH\":\"\",\"TRANGTHAI\":null,\"NGAYCHINHSUA\":\"08\\/05\\/2021 20:24:24pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.4\",\"DONVI\":\"lit\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605f0f8d1e7dc\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kilogram\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605f103d2a973\",\"LIEULUONG\":\"0.2\",\"DONVI\":\"kilogram\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"}]}', 1620480264),
('chinhsua6096949869277', 'ts607c43f77825e', '{\"MALOAITRASUA\":\"ts607c43f77825e\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa 3 lo\\u1ea1i tr\\u00e2n ch\\u00e2u_1\",\"MOTA\":\"Th\\u01a1m ngon l\\u1ea1 th\\u01b0\\u1eddng\",\"GIA\":\"20000\",\"HINHANH\":\"\",\"TRANGTHAI\":null,\"NGAYCHINHSUA\":\"08\\/05\\/2021 20:39:36pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"Ghi ch\\u00fa nl 1\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.4\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"}]}', 1620481176),
('chinhsua609694a578551', 'ts607c43f77825e', '{\"MALOAITRASUA\":\"ts607c43f77825e\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa 3 lo\\u1ea1i tr\\u00e2n \",\"MOTA\":\"Th\\u01a1m ngon l\\u1ea1 th\\u01b0\\u1eddng\",\"GIA\":\"20000\",\"HINHANH\":\"\",\"TRANGTHAI\":null,\"NGAYCHINHSUA\":\"08\\/05\\/2021 20:39:49pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"Ghi ch\\u00fa nl 1\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.4\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"}]}', 1620481189),
('chinhsua609694b0f3604', 'ts607c43f77825e', '{\"MALOAITRASUA\":\"ts607c43f77825e\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa 3 lo\\u1ea1i tr\\u00e2n ch\\u00e2u\",\"MOTA\":\"Th\\u01a1m ngon l\\u1ea1 th\\u01b0\\u1eddng\",\"GIA\":\"20000\",\"HINHANH\":\"\",\"TRANGTHAI\":null,\"NGAYCHINHSUA\":\"08\\/05\\/2021 20:40:00pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"Ghi ch\\u00fa nl 1\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.4\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"}]}', 1620481200),
('chinhsua609694bf26736', 'ts607c43f77825e', '{\"MALOAITRASUA\":\"ts607c43f77825e\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa 3 lo\\u1ea1i tr\\u00e2n ch\\u00e2u\",\"MOTA\":\"Th\\u01a1m ngon l\\u1ea1 th\\u01b0\\u1eddng\",\"GIA\":\"20000\",\"HINHANH\":\"\",\"TRANGTHAI\":null,\"NGAYCHINHSUA\":\"08\\/05\\/2021 20:40:15pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"Ghi ch\\u00fa nl 1\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.4\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"}]}', 1620481215),
('chinhsua609694dc76a85', 'ts607c43f77825e', '{\"MALOAITRASUA\":\"ts607c43f77825e\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa 3 lo\\u1ea1i \",\"MOTA\":\"Th\\u01a1m ngon l\\u1ea1 th\\u01b0\\u1eddng\",\"GIA\":\"20000\",\"HINHANH\":\"\",\"TRANGTHAI\":null,\"NGAYCHINHSUA\":\"08\\/05\\/2021 20:40:44pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"Ghi ch\\u00fa nl 1\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.4\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"}]}', 1620481244),
('chinhsua609694ecd5d01', 'ts607c43f77825e', '{\"MALOAITRASUA\":\"ts607c43f77825e\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa 3 lo\\u1ea1i tr\\u00e2n \",\"MOTA\":\"Th\\u01a1m ngon l\\u1ea1 th\\u01b0\\u1eddng\",\"GIA\":\"20000\",\"HINHANH\":\"\",\"TRANGTHAI\":null,\"NGAYCHINHSUA\":\"08\\/05\\/2021 20:41:00pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"Ghi ch\\u00fa nl 1\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.4\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"}]}', 1620481260),
('chinhsua609694fc46ab3', 'ts607c43f77825e', '{\"MALOAITRASUA\":\"ts607c43f77825e\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa 3 lo\\u1ea1i tr\\u00e2n ch\\u00e2u\",\"MOTA\":\"Th\\u01a1m ngon l\\u1ea1 th\\u01b0\\u1eddng\",\"GIA\":\"20000\",\"HINHANH\":\"\",\"TRANGTHAI\":null,\"NGAYCHINHSUA\":\"08\\/05\\/2021 20:41:16pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"Ghi ch\\u00fa nl 1\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.4\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"}]}', 1620481276),
('chinhsua6096952eebcf6', 'ts607c43f77825e', '{\"MALOAITRASUA\":\"ts607c43f77825e\",\"TENLOAI\":\"S\\u1ea3n ph\\u1ea9m th\\u1eed nghi\\u1ec7m 6\",\"MOTA\":\"Th\\u01a1m ngon l\\u1ea1 th\\u01b0\\u1eddng\",\"GIA\":\"20000\",\"HINHANH\":\"\",\"TRANGTHAI\":null,\"NGAYCHINHSUA\":\"08\\/05\\/2021 20:42:06pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"Ghi ch\\u00fa nl 1\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.4\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"}]}', 1620481326),
('chinhsua6096952f110f5', 'ts607c43f77825e', '{\"MALOAITRASUA\":\"ts607c43f77825e\",\"TENLOAI\":\"S\\u1ea3n ph\\u1ea9m th\\u1eed nghi\\u1ec7m 6\",\"MOTA\":\"Th\\u01a1m ngon l\\u1ea1 th\\u01b0\\u1eddng\",\"GIA\":\"20000\",\"HINHANH\":\"\",\"TRANGTHAI\":null,\"NGAYCHINHSUA\":\"08\\/05\\/2021 20:42:07pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"Ghi ch\\u00fa nl 1\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.4\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"}]}', 1620481327),
('chinhsua609695490df0c', 'ts607c43f77825e', '{\"MALOAITRASUA\":\"ts607c43f77825e\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa 3 lo\\u1ea1i tr\\u00e2n ch\\u00e2u\",\"MOTA\":\"Th\\u01a1m ngon l\\u1ea1 th\\u01b0\\u1eddng\",\"GIA\":\"20000\",\"HINHANH\":\"\",\"TRANGTHAI\":null,\"NGAYCHINHSUA\":\"08\\/05\\/2021 20:42:33pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"Ghi ch\\u00fa nl 1\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.4\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"}]}', 1620481353),
('chinhsua60969998df0aa', 'ts607c43f77825e', '{\"MALOAITRASUA\":\"ts607c43f77825e\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa 3 lo\\u1ea1i tr\\u00e2n ch\\u00e2u_1\",\"MOTA\":\"Th\\u01a1m ngon l\\u1ea1 th\\u01b0\\u1eddng\",\"GIA\":\"20000\",\"HINHANH\":\"\",\"TRANGTHAI\":null,\"NGAYCHINHSUA\":\"08\\/05\\/2021 21:00:56pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"Ghi ch\\u00fa nl 1\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.4\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"}]}', 1620482456),
('chinhsua609699b06a672', 'ts607c43f77825e', '{\"MALOAITRASUA\":\"ts607c43f77825e\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa 3 lo\\u1ea1i tr\\u00e2n ch\\u00e2u\",\"MOTA\":\"Th\\u01a1m ngon l\\u1ea1 th\\u01b0\\u1eddng\",\"GIA\":\"20000\",\"HINHANH\":\"\",\"TRANGTHAI\":null,\"NGAYCHINHSUA\":\"08\\/05\\/2021 21:01:20pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"Ghi ch\\u00fa nl 1\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.4\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"}]}', 1620482480),
('chinhsua60969a9f72b45', 'ts607c43f77825e', '{\"MALOAITRASUA\":\"ts607c43f77825e\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa 3 lo\\u1ea1i tr\\u00e2n \",\"MOTA\":\"Th\\u01a1m ngon l\\u1ea1 th\\u01b0\\u1eddng\",\"GIA\":\"20000\",\"HINHANH\":\"\",\"TRANGTHAI\":null,\"NGAYCHINHSUA\":\"08\\/05\\/2021 21:05:19pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"Ghi ch\\u00fa nl 1\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.4\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"}]}', 1620482719),
('chinhsua60969ab7d8cde', 'ts607c43f77825e', '{\"MALOAITRASUA\":\"ts607c43f77825e\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa 3 lo\\u1ea1i tr\\u00e2n ch\\u00e2u\",\"MOTA\":\"Th\\u01a1m ngon l\\u1ea1 th\\u01b0\\u1eddng\",\"GIA\":\"20000\",\"HINHANH\":\"\",\"TRANGTHAI\":null,\"NGAYCHINHSUA\":\"08\\/05\\/2021 21:05:43pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"Ghi ch\\u00fa nl 1\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.4\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"}]}', 1620482743),
('chinhsua6096b622f341c', 'ts607c43f77825e', '{\"MALOAITRASUA\":\"ts607c43f77825e\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa 3 lo\\u1ea1i tr\\u00e2n ch\\u00e2u\",\"MOTA\":\"Th\\u01a1m ngon l\\u1ea1 th\\u01b0\\u1eddng\",\"GIA\":\"21000\",\"HINHANH\":\"\",\"TRANGTHAI\":null,\"NGAYCHINHSUA\":\"08\\/05\\/2021 23:02:42pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"Ghi ch\\u00fa nl 1\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.4\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"}]}', 1620489762),
('chinhsua6096b64456eb7', 'ts607c43f77825e', '{\"MALOAITRASUA\":\"ts607c43f77825e\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa 3 lo\\u1ea1i tr\\u00e2n ch\\u00e2u.\",\"MOTA\":\"Th\\u01a1m ngon l\\u1ea1 th\\u01b0\\u1eddng ^^\",\"GIA\":\"20000\",\"HINHANH\":\"\",\"TRANGTHAI\":null,\"NGAYCHINHSUA\":\"08\\/05\\/2021 23:03:16pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"Ghi ch\\u00fa nl 1\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.4\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"}]}', 1620489796),
('chinhsua6096b653a94da', 'ts607c43f77825e', '{\"MALOAITRASUA\":\"ts607c43f77825e\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa 3 lo\\u1ea1i tr\\u00e2n ch\\u00e2u.\",\"MOTA\":\"Th\\u01a1m ngon l\\u1ea1 th\\u01b0\\u1eddng ^^\",\"GIA\":\"20000\",\"HINHANH\":\"\",\"TRANGTHAI\":null,\"NGAYCHINHSUA\":\"08\\/05\\/2021 23:03:31pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.12\",\"DONVI\":\"kg\",\"GHICHU\":\"Ghi ch\\u00fa nl 1\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.42\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"}]}', 1620489811),
('chinhsua60976d6add39f', 'ts6091ef91c51e9', '{\"MALOAITRASUA\":\"ts6091ef91c51e9\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa hoa \\u0111\\u1eadu bi\\u1ebfc\",\"MOTA\":\"Hoa \\u0111\\u1eadu bi\\u1ebfc l\\u00e0 nguy\\u00ean li\\u1ec7u pha ch\\u1ebf th\\u1ee9c u\\u1ed1ng, n\\u1ea5u \\u0103n, l\\u00e0m b\\u00e1nh \\u0111\\u01b0\\u1ee3c c\\u00e1c n\\u01b0\\u1edbc Ph\\u01b0\\u01a1ng T\\u00e2y \\u01b0a chu\\u1ed9ng. Sau khi ph\\u1ed5 bi\\u1ebfn \\u1edf n\\u01b0\\u1edbc ta, lo\\u1ea1i hoa n\\u00e0y nhanh ch\\u00f3ng \\u0111\\u01b0\\u1ee3c \\u1ee9ng d\\u1ee5ng r\\u1ed9ng r\\u00e3i. Ng\\u01b0\\u1eddi ta \\u0111\\u00e3 t\\u1eadn d\\u1ee5ng h\\u01b0\\u01a1ng th\\u01a1m v\\u00e0 m\\u00e0u s\\u1eafc t\\u1ef1 nhi\\u00ean \\u0111\\u1eb9p m\\u1eaft c\\u1ee7a hoa \\u0111\\u1eadu bi\\u1ebfc \\u0111\\u1ec3 pha ch\\u1ebf nhi\\u1ec1u m\\u00f3n th\\u1ee9c u\\u1ed1ng th\\u01a1m ngon. M\\u00f3n tr\\u00e0 s\\u1eefa hoa \\u0111\\u1eadu bi\\u1ebfc ra \\u0111\\u1eddi t\\u1eeb \\u0111\\u00f3.\",\"GIA\":\"18000\",\"HINHANH\":\"\",\"TRANGTHAI\":null,\"NGAYCHINHSUA\":\"09\\/05\\/2021 12:04:42pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.4\",\"DONVI\":\"lit\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605f0f8d1e7dc\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kilogram\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605f103d2a973\",\"LIEULUONG\":\"0.2\",\"DONVI\":\"kilogram\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"},{\"TENSIZE\":\"SizeS\",\"MASIZE\":\"masize607b5fe2e11a1\"}]}', 1620536682),
('chinhsua609e35137d879', 'ts607c43f77825e', '{\"MALOAITRASUA\":\"ts607c43f77825e\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa 3 lo\\u1ea1i tr\\u00e2n ch\\u00e2u.\",\"MOTA\":\"Th\\u01a1m ngon l\\u1ea1 th\\u01b0\\u1eddng ^^\",\"GIA\":\"50000\",\"HINHANH\":\"\",\"TRANGTHAI\":null,\"NGAYCHINHSUA\":\"14\\/05\\/2021 15:30:11pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.12\",\"DONVI\":\"kg\",\"GHICHU\":\"Ghi ch\\u00fa nl 1\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.42\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"}]}', 1620981011),
('chinhsua609e361b5de58', 'ts607c43f77825e', '{\"MALOAITRASUA\":\"ts607c43f77825e\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa 3 lo\\u1ea1i tr\\u00e2n ch\\u00e2u.\",\"MOTA\":\"Th\\u01a1m ngon l\\u1ea1 th\\u01b0\\u1eddng ^^\",\"GIA\":\"51000\",\"HINHANH\":\"\",\"TRANGTHAI\":null,\"NGAYCHINHSUA\":\"14\\/05\\/2021 15:34:35pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.12\",\"DONVI\":\"kg\",\"GHICHU\":\"Ghi ch\\u00fa nl 1\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.42\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"}]}', 1620981275),
('chinhsua60a9d57a4b547', 'ts607ba482510e2', '{\"MALOAITRASUA\":\"ts607ba482510e2\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa tr\\u00e2n ch\\u00e2u \\u0111\\u01b0\\u1eddng \\u0111en\",\"MOTA\":\"S\\u1eefa t\\u01b0\\u01a1i tr\\u00e2n ch\\u00e2u l\\u00e0 th\\u1ee9c u\\u1ed1ng y\\u00eau th\\u00edch c\\u1ee7a gi\\u1edbi tr\\u1ebb hi\\u1ec7n nay, v\\u1ecb c\\u1ee7a \\u0111\\u01b0\\u1eddng \\u0111en k\\u1ebft h\\u1ee3p v\\u1edbi n\\u1ec1n s\\u1eefa t\\u01b0\\u01a1i thanh tr\\u00f9ng t\\u1ea1o n\\u00ean h\\u01b0\\u01a1ng v\\u1ecb \\u0111\\u1eadm \\u0111\\u00e0, ng\\u1ecdt thanh v\\u00e0 b\\u00e9o ng\\u1eady h\\u01a1n, tr\\u00e2n ch\\u00e2u d\\u1ebbo th\\u01a1m s\\u1ebd l\\u00e0 \\u0111i\\u1ec3m nh\\u1ea5n cho th\\u1ee9c u\\u1ed1ng n\\u00e0y th\\u00eam ph\\u1ea7n h\\u1ea5p d\\u1eabn.\",\"GIA\":\"14996\",\"HINHANH\":\"tranchauduongden.jpg\",\"TRANGTHAI\":null,\"NGAYCHINHSUA\":\"23\\/05\\/2021 11:09:30am\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.5\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"}]}', 1621742970),
('chinhsua60a9d6fa93fed', 'ts607c023b73541', '{\"MALOAITRASUA\":\"ts607c023b73541\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa vi\\u1ec7t qu\\u1ea5c\",\"MOTA\":\"Vi\\u1ec7t qu\\u1ea5t l\\u00e0 m\\u1ed9t lo\\u1ea1i qu\\u1ea3 m\\u1ecdng v\\u1edbi nhi\\u1ec1u l\\u1ee3i \\u00edch t\\u1ed1t cho s\\u1ee9c kh\\u1ecfe. Trong vi\\u1ec7t qu\\u1ea5t c\\u00f3 ch\\u1ee9a ch\\u1ea5t anthocyanidins, gi\\u00fap t\\u0103ng c\\u01b0\\u1eddng h\\u1ec7 mi\\u1ec5n d\\u1ecbch c\\u0169ng nh\\u01b0 v\\u00f4 hi\\u1ec7u h\\u00f3a c\\u00e1c g\\u1ed1c t\\u1ef1 do li\\u00ean quan \\u0111\\u1ebfn b\\u1ec7nh ung th\\u01b0. Smoothie Blueberry DP Food chi\\u1ebft xu\\u1ea5t t\\u1eeb nh\\u1eefng qu\\u1ea3 vi\\u1ec7t qu\\u1ea5t t\\u01b0\\u01a1i m\\u00e1t nh\\u1ea5t tr\\u00ean d\\u00e2y chuy\\u1ec1n s\\u1ea3n xu\\u1ea5t hi\\u1ec7n \\u0111\\u1ea1i, mang \\u0111\\u1ebfn h\\u01b0\\u01a1ng v\\u1ecb nh\\u1eb9 nh\\u00e0ng, d\\u1ec5 u\\u1ed1ng. V\\u1edbi h\\u00e0m l\\u01b0\\u1ee3ng th\\u00e0nh ph\\u1ea7n tr\\u00e1i c\\u00e2y t\\u01b0\\u01a1i cao, Smoothie Blueberry mang \\u0111\\u1ebfn h\\u01b0\\u01a1ng v\\u1ecb tr\\u00e1i c\\u00e2y \\u0111\\u1eadm \\u0111\\u00e0 t\\u1ef1 nhi\\u00ean cho nhi\\u1ec1u lo\\u1ea1i th\\u1ee9c u\\u1ed1ng kh\\u00e1c nhau. B\\u1ea1n c\\u0169ng ho\\u00e0n to\\u00e0n c\\u00f3 th\\u1ec3 s\\u1eed d\\u1ee5ng Smoothie Blueberry l\\u00e0m tr\\u00e0 s\\u1eefa vi\\u1ec7t qu\\u1ea5t th\\u01a1m ngon \\u0111\\u1ec3 c\\u00f3 th\\u1ec3 tho\\u1ea3i m\\u00e1i u\\u1ed1ng tr\\u00e0 s\\u1eefa m\\u00e0 kh\\u00f4ng s\\u1ee3 \\u1ea3nh h\\u01b0\\u1edfng \\u0111\\u1ebfn s\\u1ee9c kh\\u1ecfe.\",\"GIA\":\"17000\",\"HINHANH\":\"dacbiet.jpg\",\"TRANGTHAI\":null,\"NGAYCHINHSUA\":\"23\\/05\\/2021 11:15:54am\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.5\",\"DONVI\":\"lit\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605da771044c1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"}]}', 1621743354),
('chinhsua60a9d88c2d112', 'ts607c43f77825e', '{\"MALOAITRASUA\":\"ts607c43f77825e\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa 3 lo\\u1ea1i tr\\u00e2n ch\\u00e2u.\",\"MOTA\":\"Trong c\\u00e1c m\\u00f3n best seller t\\u1ea1i Yucha lu\\u00f4n lu\\u00f4n c\\u00f3 m\\u1eb7t \\u201ch\\u1ed9i anh em\\u201d TR\\u00c0 S\\u1eeeA 3J. V\\u1eady 3J l\\u00e0 g\\u00ec ta? C\\u00f3 \\u0111i\\u1ec3m n\\u00e0o \\u0111\\u1eb7c bi\\u1ec7t kh\\u00f4ng?\\r\\n\\r\\n\\u201c3J\\u201d ch\\u00ednh l\\u00e0 vi\\u1ebft t\\u1eaft c\\u1ee7a 3 JELLIES c\\u00f3 trong m\\u1ed7i ly tr\\u00e0 s\\u1eefa \\u0111\\u1ea5y! \\r\\n\\r\\nTrong tr\\u00e0 s\\u1eefa 3J s\\u1ebd \\u0111\\u01b0\\u1ee3c \\u0111\\u00ednh k\\u00e8m lu\\u00f4n 3 lo\\u1ea1i Topping th\\u01a1m ngon \\u0111\\u1ec3 c\\u00e1c b\\u1ea1n tha h\\u1ed3 nh\\u00e2m nhi. C\\u00e1c t\\u00edn \\u0111\\u1ed3 \\u0111am m\\u00ea nh\\u00e2m nhi topping th\\u00ec kh\\u00f4ng th\\u1ec3 b\\u1ecf qua d\\u00f2ng tr\\u00e0 s\\u1eefa 3J v\\u1edbi \\u0111\\u1ee7 th\\u1ee9 topping \\u0111\\u1ea7y \\u1ee5 n\\u00e0y!\",\"GIA\":\"51000\",\"HINHANH\":\"TRA-SAU-3-LOAI-TRAN-CHAU.jpg\",\"TRANGTHAI\":null,\"NGAYCHINHSUA\":\"23\\/05\\/2021 11:22:36am\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.12\",\"DONVI\":\"kg\",\"GHICHU\":\"Ghi ch\\u00fa nl 1\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.42\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"}]}', 1621743756),
('chinhsua60aa237699111', 'ts607c43f77825e', '{\"MALOAITRASUA\":\"ts607c43f77825e\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa 3 lo\\u1ea1i tr\\u00e2n ch\\u00e2u.\",\"MOTA\":\"Trong c\\u00e1c m\\u00f3n best seller t\\u1ea1i Yucha lu\\u00f4n lu\\u00f4n c\\u00f3 m\\u1eb7t \\u201ch\\u1ed9i anh em\\u201d TR\\u00c0 S\\u1eeeA 3J. V\\u1eady 3J l\\u00e0 g\\u00ec ta? C\\u00f3 \\u0111i\\u1ec3m n\\u00e0o \\u0111\\u1eb7c bi\\u1ec7t kh\\u00f4ng?\\r\\n\\r\\n\\u201c3J\\u201d ch\\u00ednh l\\u00e0 vi\\u1ebft t\\u1eaft c\\u1ee7a 3 JELLIES c\\u00f3 trong m\\u1ed7i ly tr\\u00e0 s\\u1eefa \\u0111\\u1ea5y! \\r\\n\\r\\nTrong tr\\u00e0 s\\u1eefa 3J s\\u1ebd \\u0111\\u01b0\\u1ee3c \\u0111\\u00ednh k\\u00e8m lu\\u00f4n 3 lo\\u1ea1i Topping th\\u01a1m ngon \\u0111\\u1ec3 c\\u00e1c b\\u1ea1n tha h\\u1ed3 nh\\u00e2m nhi. C\\u00e1c t\\u00edn \\u0111\\u1ed3 \\u0111am m\\u00ea nh\\u00e2m nhi topping th\\u00ec kh\\u00f4ng th\\u1ec3 b\\u1ecf qua d\\u00f2ng tr\\u00e0 s\\u1eefa 3J v\\u1edbi \\u0111\\u1ee7 th\\u1ee9 topping \\u0111\\u1ea7y \\u1ee5 n\\u00e0y!\",\"GIA\":\"51000\",\"HINHANH\":\"\",\"TRANGTHAI\":null,\"NGAYCHINHSUA\":\"23\\/05\\/2021 16:42:14pm\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.12\",\"DONVI\":\"kg\",\"GHICHU\":\"Ghi ch\\u00fa nl 1\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.42\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"},{\"TENSIZE\":\"SizeS\",\"MASIZE\":\"masize607b5fe2e11a1\"},{\"TENSIZE\":\"SizeM\",\"MASIZE\":\"masize607b602705fe0\"}]}', 1621762934),
('chinhsua60c81c8a3cca9', 'ts607ba482510e2', '{\"MALOAITRASUA\":\"ts607ba482510e2\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa tr\\u00e2n ch\\u00e2u \\u0111\\u01b0\\u1eddng \\u0111en\",\"MOTA\":\"S\\u1eefa t\\u01b0\\u01a1i tr\\u00e2n ch\\u00e2u l\\u00e0 th\\u1ee9c u\\u1ed1ng y\\u00eau th\\u00edch c\\u1ee7a gi\\u1edbi tr\\u1ebb hi\\u1ec7n nay, v\\u1ecb c\\u1ee7a \\u0111\\u01b0\\u1eddng \\u0111en k\\u1ebft h\\u1ee3p v\\u1edbi n\\u1ec1n s\\u1eefa t\\u01b0\\u01a1i thanh tr\\u00f9ng t\\u1ea1o n\\u00ean h\\u01b0\\u01a1ng v\\u1ecb \\u0111\\u1eadm \\u0111\\u00e0, ng\\u1ecdt thanh v\\u00e0 b\\u00e9o ng\\u1eady h\\u01a1n, tr\\u00e2n ch\\u00e2u d\\u1ebbo th\\u01a1m s\\u1ebd l\\u00e0 \\u0111i\\u1ec3m nh\\u1ea5n cho th\\u1ee9c u\\u1ed1ng n\\u00e0y th\\u00eam ph\\u1ea7n h\\u1ea5p d\\u1eabn.\",\"GIA\":\"15000\",\"HINHANH\":\"\",\"TRANGTHAI\":null,\"NGAYCHINHSUA\":\"15\\/06\\/2021 10:20:42am\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.5\",\"DONVI\":\"lit\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"}]}', 1623727242),
('chinhsua60c95f828d190', 'ts607ba482510e2', '{\"MALOAITRASUA\":\"ts607ba482510e2\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa tr\\u00e2n ch\\u00e2u \\u0111\\u01b0\\u1eddng \\u0111en\",\"MOTA\":\"S\\u1eefa t\\u01b0\\u01a1i tr\\u00e2n ch\\u00e2u l\\u00e0 th\\u1ee9c u\\u1ed1ng y\\u00eau th\\u00edch c\\u1ee7a gi\\u1edbi tr\\u1ebb hi\\u1ec7n nay, v\\u1ecb c\\u1ee7a \\u0111\\u01b0\\u1eddng \\u0111en k\\u1ebft h\\u1ee3p v\\u1edbi n\\u1ec1n s\\u1eefa t\\u01b0\\u01a1i thanh tr\\u00f9ng t\\u1ea1o n\\u00ean h\\u01b0\\u01a1ng v\\u1ecb \\u0111\\u1eadm \\u0111\\u00e0, ng\\u1ecdt thanh v\\u00e0 b\\u00e9o ng\\u1eady h\\u01a1n, tr\\u00e2n ch\\u00e2u d\\u1ebbo th\\u01a1m s\\u1ebd l\\u00e0 \\u0111i\\u1ec3m nh\\u1ea5n cho th\\u1ee9c u\\u1ed1ng n\\u00e0y th\\u00eam ph\\u1ea7n h\\u1ea5p d\\u1eabn.\",\"GIA\":\"15000\",\"HINHANH\":\"\",\"TRANGTHAI\":null,\"NGAYCHINHSUA\":\"16\\/06\\/2021 09:18:42am\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.5\",\"DONVI\":\"lit\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605da771044c1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeM\",\"MASIZE\":\"masize607b602705fe0\"},{\"TENSIZE\":\"SizeL\",\"MASIZE\":\"masize607b6049e4471\"}]}', 1623809922);
INSERT INTO `lichsuchinhsua` (`MACHINHSUA`, `MALOAITRASUA`, `CHITIETCHINHSUA`, `NGAYCHINHSUA`) VALUES
('chinhsua60c95fdc64db4', 'ts607ba482510e2', '{\"MALOAITRASUA\":\"ts607ba482510e2\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa tr\\u00e2n ch\\u00e2u \\u0111\\u01b0\\u1eddng \\u0111en\",\"MOTA\":\"S\\u1eefa t\\u01b0\\u01a1i tr\\u00e2n ch\\u00e2u l\\u00e0 th\\u1ee9c u\\u1ed1ng y\\u00eau th\\u00edch c\\u1ee7a gi\\u1edbi tr\\u1ebb hi\\u1ec7n nay, v\\u1ecb c\\u1ee7a \\u0111\\u01b0\\u1eddng \\u0111en k\\u1ebft h\\u1ee3p v\\u1edbi n\\u1ec1n s\\u1eefa t\\u01b0\\u01a1i thanh tr\\u00f9ng t\\u1ea1o n\\u00ean h\\u01b0\\u01a1ng v\\u1ecb \\u0111\\u1eadm \\u0111\\u00e0, ng\\u1ecdt thanh v\\u00e0 b\\u00e9o ng\\u1eady h\\u01a1n, tr\\u00e2n ch\\u00e2u d\\u1ebbo th\\u01a1m s\\u1ebd l\\u00e0 \\u0111i\\u1ec3m nh\\u1ea5n cho th\\u1ee9c u\\u1ed1ng n\\u00e0y th\\u00eam ph\\u1ea7n h\\u1ea5p d\\u1eabn.\",\"GIA\":\"15000\",\"HINHANH\":\"\",\"TRANGTHAI\":null,\"NGAYCHINHSUA\":\"16\\/06\\/2021 09:20:12am\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605f0f8d1e7dc\",\"LIEULUONG\":\"0.5\",\"DONVI\":\"lit\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605da771044c1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeM\",\"MASIZE\":\"masize607b602705fe0\"}]}', 1623810012),
('chinhsua60c95ff68191b', 'ts607ba482510e2', '{\"MALOAITRASUA\":\"ts607ba482510e2\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa tr\\u00e2n ch\\u00e2u \\u0111\\u01b0\\u1eddng \\u0111en\",\"MOTA\":\"S\\u1eefa t\\u01b0\\u01a1i tr\\u00e2n ch\\u00e2u l\\u00e0 th\\u1ee9c u\\u1ed1ng y\\u00eau th\\u00edch c\\u1ee7a gi\\u1edbi tr\\u1ebb hi\\u1ec7n nay, v\\u1ecb c\\u1ee7a \\u0111\\u01b0\\u1eddng \\u0111en k\\u1ebft h\\u1ee3p v\\u1edbi n\\u1ec1n s\\u1eefa t\\u01b0\\u01a1i thanh tr\\u00f9ng t\\u1ea1o n\\u00ean h\\u01b0\\u01a1ng v\\u1ecb \\u0111\\u1eadm \\u0111\\u00e0, ng\\u1ecdt thanh v\\u00e0 b\\u00e9o ng\\u1eady h\\u01a1n, tr\\u00e2n ch\\u00e2u d\\u1ebbo th\\u01a1m s\\u1ebd l\\u00e0 \\u0111i\\u1ec3m nh\\u1ea5n cho th\\u1ee9c u\\u1ed1ng n\\u00e0y th\\u00eam ph\\u1ea7n h\\u1ea5p d\\u1eabn.\",\"GIA\":\"15000\",\"HINHANH\":\"\",\"TRANGTHAI\":null,\"NGAYCHINHSUA\":\"16\\/06\\/2021 09:20:38am\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeM\",\"MASIZE\":\"masize607b602705fe0\"}]}', 1623810038),
('chinhsua60c9614bc53d6', 'ts607ba482510e2', '{\"MALOAITRASUA\":\"ts607ba482510e2\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa tr\\u00e2n ch\\u00e2u \\u0111\\u01b0\\u1eddng \\u0111en\",\"MOTA\":\"S\\u1eefa t\\u01b0\\u01a1i tr\\u00e2n ch\\u00e2u l\\u00e0 th\\u1ee9c u\\u1ed1ng y\\u00eau th\\u00edch c\\u1ee7a gi\\u1edbi tr\\u1ebb hi\\u1ec7n nay, v\\u1ecb c\\u1ee7a \\u0111\\u01b0\\u1eddng \\u0111en k\\u1ebft h\\u1ee3p v\\u1edbi n\\u1ec1n s\\u1eefa t\\u01b0\\u01a1i thanh tr\\u00f9ng t\\u1ea1o n\\u00ean h\\u01b0\\u01a1ng v\\u1ecb \\u0111\\u1eadm \\u0111\\u00e0, ng\\u1ecdt thanh v\\u00e0 b\\u00e9o ng\\u1eady h\\u01a1n, tr\\u00e2n ch\\u00e2u d\\u1ebbo th\\u01a1m s\\u1ebd l\\u00e0 \\u0111i\\u1ec3m nh\\u1ea5n cho th\\u1ee9c u\\u1ed1ng n\\u00e0y th\\u00eam ph\\u1ea7n h\\u1ea5p d\\u1eabn.\",\"GIA\":\"15000\",\"HINHANH\":\"\",\"TRANGTHAI\":null,\"NGAYCHINHSUA\":\"16\\/06\\/2021 09:26:19am\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.2\",\"DONVI\":\"\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeM\",\"MASIZE\":\"masize607b602705fe0\"}]}', 1623810379),
('chinhsua60c9624c4d58e', 'ts607ba482510e2', '{\"MALOAITRASUA\":\"ts607ba482510e2\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa tr\\u00e2n ch\\u00e2u \\u0111\\u01b0\\u1eddng \\u0111en\",\"MOTA\":\"S\\u1eefa t\\u01b0\\u01a1i tr\\u00e2n ch\\u00e2u l\\u00e0 th\\u1ee9c u\\u1ed1ng y\\u00eau th\\u00edch c\\u1ee7a gi\\u1edbi tr\\u1ebb hi\\u1ec7n nay, v\\u1ecb c\\u1ee7a \\u0111\\u01b0\\u1eddng \\u0111en k\\u1ebft h\\u1ee3p v\\u1edbi n\\u1ec1n s\\u1eefa t\\u01b0\\u01a1i thanh tr\\u00f9ng t\\u1ea1o n\\u00ean h\\u01b0\\u01a1ng v\\u1ecb \\u0111\\u1eadm \\u0111\\u00e0, ng\\u1ecdt thanh v\\u00e0 b\\u00e9o ng\\u1eady h\\u01a1n, tr\\u00e2n ch\\u00e2u d\\u1ebbo th\\u01a1m s\\u1ebd l\\u00e0 \\u0111i\\u1ec3m nh\\u1ea5n cho th\\u1ee9c u\\u1ed1ng n\\u00e0y th\\u00eam ph\\u1ea7n h\\u1ea5p d\\u1eabn.\",\"GIA\":\"15000\",\"HINHANH\":\"\",\"TRANGTHAI\":null,\"NGAYCHINHSUA\":\"16\\/06\\/2021 09:30:36am\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.2\",\"DONVI\":\"l\\u00edt\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeM\",\"MASIZE\":\"masize607b602705fe0\"}]}', 1623810636),
('chinhsua60c962aef3954', 'ts607ba482510e2', '{\"MALOAITRASUA\":\"ts607ba482510e2\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa tr\\u00e2n ch\\u00e2u \\u0111\\u01b0\\u1eddng \\u0111en\",\"MOTA\":\"S\\u1eefa t\\u01b0\\u01a1i tr\\u00e2n ch\\u00e2u l\\u00e0 th\\u1ee9c u\\u1ed1ng y\\u00eau th\\u00edch c\\u1ee7a gi\\u1edbi tr\\u1ebb hi\\u1ec7n nay, v\\u1ecb c\\u1ee7a \\u0111\\u01b0\\u1eddng \\u0111en k\\u1ebft h\\u1ee3p v\\u1edbi n\\u1ec1n s\\u1eefa t\\u01b0\\u01a1i thanh tr\\u00f9ng t\\u1ea1o n\\u00ean h\\u01b0\\u01a1ng v\\u1ecb \\u0111\\u1eadm \\u0111\\u00e0, ng\\u1ecdt thanh v\\u00e0 b\\u00e9o ng\\u1eady h\\u01a1n, tr\\u00e2n ch\\u00e2u d\\u1ebbo th\\u01a1m s\\u1ebd l\\u00e0 \\u0111i\\u1ec3m nh\\u1ea5n cho th\\u1ee9c u\\u1ed1ng n\\u00e0y th\\u00eam ph\\u1ea7n h\\u1ea5p d\\u1eabn.\",\"GIA\":\"15000\",\"HINHANH\":\"\",\"TRANGTHAI\":null,\"NGAYCHINHSUA\":\"16\\/06\\/2021 09:32:14am\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605da771044c1\",\"LIEULUONG\":\"0.3\",\"DONVI\":\"kg\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.2\",\"DONVI\":\"l\\u00edt\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeM\",\"MASIZE\":\"masize607b602705fe0\"}]}', 1623810734),
('chinhsua60ca9bbb6a673', 'ts607ba482510e2', '{\"MALOAITRASUA\":\"ts607ba482510e2\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa tr\\u00e2n ch\\u00e2u \\u0111\\u01b0\\u1eddng \\u0111en\",\"MOTA\":\"S\\u1eefa t\\u01b0\\u01a1i tr\\u00e2n ch\\u00e2u l\\u00e0 th\\u1ee9c u\\u1ed1ng y\\u00eau th\\u00edch c\\u1ee7a gi\\u1edbi tr\\u1ebb hi\\u1ec7n nay, v\\u1ecb c\\u1ee7a \\u0111\\u01b0\\u1eddng \\u0111en k\\u1ebft h\\u1ee3p v\\u1edbi n\\u1ec1n s\\u1eefa t\\u01b0\\u01a1i thanh tr\\u00f9ng t\\u1ea1o n\\u00ean h\\u01b0\\u01a1ng v\\u1ecb \\u0111\\u1eadm \\u0111\\u00e0, ng\\u1ecdt thanh v\\u00e0 b\\u00e9o ng\\u1eady h\\u01a1n, tr\\u00e2n ch\\u00e2u d\\u1ebbo th\\u01a1m s\\u1ebd l\\u00e0 \\u0111i\\u1ec3m nh\\u1ea5n cho th\\u1ee9c u\\u1ed1ng n\\u00e0y th\\u00eam ph\\u1ea7n h\\u1ea5p d\\u1eabn.\",\"GIA\":\"15000\",\"HINHANH\":\"\",\"TRANGTHAI\":null,\"NGAYCHINHSUA\":\"17\\/06\\/2021 07:47:55am\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.2\",\"DONVI\":\"l\\u00edt\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605da771044c1\",\"LIEULUONG\":\"0.3\",\"DONVI\":\"kg\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeM\",\"MASIZE\":\"masize607b602705fe0\"},{\"TENSIZE\":\"SizeS\",\"MASIZE\":\"masize607b5fe2e11a1\"}]}', 1623890875),
('chinhsua60ca9d7278169', 'ts607ba482510e2', '{\"MALOAITRASUA\":\"ts607ba482510e2\",\"TENLOAI\":\"Tr\\u00e0 s\\u1eefa tr\\u00e2n ch\\u00e2u \\u0111\\u01b0\\u1eddng \\u0111en\",\"MOTA\":\"S\\u1eefa t\\u01b0\\u01a1i tr\\u00e2n ch\\u00e2u l\\u00e0 th\\u1ee9c u\\u1ed1ng y\\u00eau th\\u00edch c\\u1ee7a gi\\u1edbi tr\\u1ebb hi\\u1ec7n nay, v\\u1ecb c\\u1ee7a \\u0111\\u01b0\\u1eddng \\u0111en k\\u1ebft h\\u1ee3p v\\u1edbi n\\u1ec1n s\\u1eefa t\\u01b0\\u01a1i thanh tr\\u00f9ng t\\u1ea1o n\\u00ean h\\u01b0\\u01a1ng v\\u1ecb \\u0111\\u1eadm \\u0111\\u00e0, ng\\u1ecdt thanh v\\u00e0 b\\u00e9o ng\\u1eady h\\u01a1n, tr\\u00e2n ch\\u00e2u d\\u1ebbo th\\u01a1m s\\u1ebd l\\u00e0 \\u0111i\\u1ec3m nh\\u1ea5n cho th\\u1ee9c u\\u1ed1ng n\\u00e0y th\\u00eam ph\\u1ea7n h\\u1ea5p d\\u1eabn.\",\"GIA\":\"15000\",\"HINHANH\":\"\",\"TRANGTHAI\":null,\"NGAYCHINHSUA\":\"17\\/06\\/2021 07:55:14am\",\"CTLOAITRASUA\":[{\"MANGUYENLIEU\":\"nl1\",\"LIEULUONG\":\"0.1\",\"DONVI\":\"kg\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl2\",\"LIEULUONG\":\"0.2\",\"DONVI\":\"l\\u00edt\",\"GHICHU\":\"\"},{\"MANGUYENLIEU\":\"nl605da771044c1\",\"LIEULUONG\":\"0.3\",\"DONVI\":\"kg\",\"GHICHU\":\"\"}],\"CTSIZE\":[{\"TENSIZE\":\"SizeM\",\"MASIZE\":\"masize607b602705fe0\"},{\"TENSIZE\":\"SizeS\",\"MASIZE\":\"masize607b5fe2e11a1\"}]}', 1623891314);

--
-- Bẫy `lichsuchinhsua`
--
DELIMITER $$
CREATE TRIGGER `ngaychinhsua` BEFORE INSERT ON `lichsuchinhsua` FOR EACH ROW BEGIN
	SET NEW.NGAYCHINHSUA = UNIX_TIMESTAMP();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsuhoatdong`
--

CREATE TABLE `lichsuhoatdong` (
  `MALICHSUHOATDONG` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MATAIKHOAN` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `THOIGIANHOATDONG` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lichsuhoatdong`
--

INSERT INTO `lichsuhoatdong` (`MALICHSUHOATDONG`, `MATAIKHOAN`, `THOIGIANHOATDONG`) VALUES
('lshd6096108ee9959', 'TK2', '08/05/2021 11:16:14am'),
('lshd60961092c2135', 'TK2', '08/05/2021 11:16:18am'),
('lshd60961096393d9', 'TK2', '08/05/2021 11:16:22am'),
('lshd609610adcbc21', 'TK2', '08/05/2021 11:16:45am'),
('lshd60961136becec', 'TK2', '08/05/2021 11:19:02am'),
('lshd609611caa3fc0', 'TK1', '08/05/2021 11:21:30am'),
('lshd609636cb5c6c9', 'TK1', '08/05/2021 13:59:23pm'),
('lshd60964363e623b', 'TK1', '08/05/2021 14:53:07pm'),
('lshd609654a13d532', 'TK1', '08/05/2021 16:06:41pm'),
('lshd609660ce00cab', 'TK1', '08/05/2021 16:58:38pm'),
('lshd60966d517b9bc', 'TK1', '08/05/2021 17:52:01pm'),
('lshd60968fe3571e9', 'TK1', '08/05/2021 20:19:31pm'),
('lshd60969baa40512', 'TK1', '08/05/2021 21:09:46pm'),
('lshd6096b08eae81c', 'TK1', '08/05/2021 22:38:54pm'),
('lshd60974c75131c5', 'TK1', '09/05/2021 09:44:05am'),
('lshd60976b74783de', 'TK1', '09/05/2021 11:56:20am'),
('lshd609791e2910b6', 'TK1', '09/05/2021 14:40:18pm'),
('lshd6097abc499bd3', 'TK1', '09/05/2021 16:30:44pm'),
('lshd6097d58e2b9ce', 'TK1', '09/05/2021 19:29:02pm'),
('lshd6097e1ae867cd', 'TK1', '09/05/2021 20:20:46pm'),
('lshd609809a06a162', 'TK1', '09/05/2021 23:11:12pm'),
('lshd60988d3e6fa3a', 'TK1', '10/05/2021 08:32:46am'),
('lshd60989b851f713', 'TK1', '10/05/2021 09:33:41am'),
('lshd6098a77d8e498', 'TK1', '10/05/2021 10:24:45am'),
('lshd6098bb9f60e97', 'TK1', '10/05/2021 11:50:39am'),
('lshd6098c8d208734', 'TK1', '10/05/2021 12:46:58pm'),
('lshd6098eb9a9bd1f', 'TK1', '10/05/2021 15:15:22pm'),
('lshd6098fd506183f', 'TK1', '10/05/2021 16:30:56pm'),
('lshd60991360648e1', 'TK1', '10/05/2021 18:05:04pm'),
('lshd60992e5959794', 'TK1', '10/05/2021 20:00:09pm'),
('lshd60992ed71e139', 'TK2', '10/05/2021 20:02:15pm'),
('lshd60993ea0cdfc0', 'TK1', '10/05/2021 21:09:36pm'),
('lshd60994a8915b87', 'TK1', '10/05/2021 22:00:25pm'),
('lshd609964d32178b', 'TK1', '10/05/2021 23:52:35pm'),
('lshd6099f92407131', 'TK1', '11/05/2021 10:25:24am'),
('lshd609a275769c3b', 'TK1', '11/05/2021 13:42:31pm'),
('lshd609a331b0bac6', 'TK1', '11/05/2021 14:32:43pm'),
('lshd609a43fd479da', 'TK1', '11/05/2021 15:44:45pm'),
('lshd609aa99228b6c', 'TK1', '11/05/2021 22:58:10pm'),
('lshd609b37f18be53', 'TK1', '12/05/2021 09:05:37am'),
('lshd609b43f4b492d', 'TK1', '12/05/2021 09:56:52am'),
('lshd609b48bee792c', 'TK2', '12/05/2021 10:17:18am'),
('lshd609b4ccfaf132', 'TK2', '12/05/2021 10:34:39am'),
('lshd609b4e497c873', 'TK1', '12/05/2021 10:40:57am'),
('lshd609b4e83a79c9', 'tka1awr4', '12/05/2021 10:41:55am'),
('lshd609b4f3dddb1c', 'TK1', '12/05/2021 10:45:01am'),
('lshd609b50490f7c6', 'tka1awr4', '12/05/2021 10:49:29am'),
('lshd609b514aa5708', 'TK2', '12/05/2021 10:53:46am'),
('lshd609b51f887943', 'tk606d6fe4df03a', '12/05/2021 10:56:40am'),
('lshd609b5e18097f3', 'tka1awr4', '12/05/2021 11:48:24am'),
('lshd609b630b52d5c', 'TK2', '12/05/2021 12:09:31pm'),
('lshd609b729a9b64e', 'tka1awr4', '12/05/2021 13:15:54pm'),
('lshd609bc4fd9790a', 'TK1', '12/05/2021 19:07:25pm'),
('lshd609bd062cab95', 'tk606d6fe4df03a', '12/05/2021 19:56:02pm'),
('lshd609bd1702c94f', 'TK1', '12/05/2021 20:00:32pm'),
('lshd609bda4f5266e', 'tka1awr4', '12/05/2021 20:38:23pm'),
('lshd609be61380ba4', 'tka1awr4', '12/05/2021 21:28:35pm'),
('lshd609c03d7a14bb', 'tka1awr4', '12/05/2021 23:35:35pm'),
('lshd609c6c6970c10', 'tka1awr4', '13/05/2021 07:01:45am'),
('lshd609c785d46ad2', 'tka1awr4', '13/05/2021 07:52:45am'),
('lshd609c8516424f2', 'tka1awr4', '13/05/2021 08:47:02am'),
('lshd609c94f76fff2', 'tka1awr4', '13/05/2021 09:54:47am'),
('lshd609ca958b83b7', 'tka1awr4', '13/05/2021 11:21:44am'),
('lshd609cce3fc688d', 'tka1awr4', '13/05/2021 13:59:11pm'),
('lshd609cd9fc288b0', 'tka1awr4', '13/05/2021 14:49:16pm'),
('lshd609ce62ed3b04', 'tka1awr4', '13/05/2021 15:41:18pm'),
('lshd609cf8dd95e8b', 'tka1awr4', '13/05/2021 17:01:01pm'),
('lshd609d21704f086', 'tka1awr4', '13/05/2021 19:54:08pm'),
('lshd609d2f88ecf0f', 'tka1awr4', '13/05/2021 20:54:16pm'),
('lshd609d3b658425a', 'TK1', '13/05/2021 21:44:53pm'),
('lshd609d3b7d3a9f7', 'tka1awr4', '13/05/2021 21:45:17pm'),
('lshd609e33b5b7d7b', 'tka1awr4', '14/05/2021 15:24:21pm'),
('lshd609e3f8a8db78', 'tka1awr4', '14/05/2021 16:14:50pm'),
('lshd609e5b98216b8', 'tka1awr4', '14/05/2021 18:14:32pm'),
('lshd609e768518bbf', 'tka1awr4', '14/05/2021 20:09:25pm'),
('lshd609ea945256db', 'tka1awr4', '14/05/2021 23:45:57pm'),
('lshd609f0b3a9a419', 'tka1awr4', '15/05/2021 06:43:54am'),
('lshd609f2e3e025d5', 'tka1awr4', '15/05/2021 09:13:18am'),
('lshd609f2eb5d677f', 'TK1', '15/05/2021 09:15:17am'),
('lshd609f3833d4557', 'tka1awr4', '15/05/2021 09:55:47am'),
('lshd609f4a7c0dbb6', 'tka1awr4', '15/05/2021 11:13:48am'),
('lshd609f85b948533', 'tka1awr4', '15/05/2021 15:26:33pm'),
('lshd609f93d6cf742', 'tka1awr4', '15/05/2021 16:26:46pm'),
('lshd609fd37183e26', 'tka1awr4', '15/05/2021 20:58:09pm'),
('lshd609ff1008b619', 'tka1awr4', '15/05/2021 23:04:16pm'),
('lshd609ffeea64864', 'tka1awr4', '16/05/2021 00:03:38am'),
('lshd60a06ab404d6a', 'tka1awr4', '16/05/2021 07:43:32am'),
('lshd60a3428338758', 'tka1awr4', '18/05/2021 11:28:51am'),
('lshd60a366c8b666d', 'tka1awr4', '18/05/2021 14:03:36pm'),
('lshd60a37287eff0e', 'tka1awr4', '18/05/2021 14:53:43pm'),
('lshd60a389810eb62', 'tka1awr4', '18/05/2021 16:31:45pm'),
('lshd60a3d35201f4b', 'tka1awr4', '18/05/2021 21:46:42pm'),
('lshd60a3e1854f18c', 'tka1awr4', '18/05/2021 22:47:17pm'),
('lshd60a3ed541478d', 'tka1awr4', '18/05/2021 23:37:40pm'),
('lshd60a3fa0334776', 'tka1awr4', '19/05/2021 00:31:47am'),
('lshd60a4070f484fa', 'tka1awr4', '19/05/2021 01:27:27am'),
('lshd60a513c4919e4', 'tka1awr4', '19/05/2021 20:33:56pm'),
('lshd60a51fee42a99', 'tka1awr4', '19/05/2021 21:25:50pm'),
('lshd60a52c1626630', 'tka1awr4', '19/05/2021 22:17:42pm'),
('lshd60a537ffc00a6', 'tka1awr4', '19/05/2021 23:08:31pm'),
('lshd60a5d3ccd3969', 'tka1awr4', '20/05/2021 10:13:16am'),
('lshd60a7a4625ac9e', 'tka1awr4', '21/05/2021 19:15:30pm'),
('lshd60a7b2cfeb7a7', 'tka1awr4', '21/05/2021 20:17:03pm'),
('lshd60a7bdfddb91e', 'TK1', '21/05/2021 21:04:45pm'),
('lshd60a7be458136a', 'tka1awr4', '21/05/2021 21:05:57pm'),
('lshd60a7e7dfa5fbf', 'tka1awr4', '22/05/2021 00:03:27am'),
('lshd60a91944e83b8', 'tka1awr4', '22/05/2021 21:46:28pm'),
('lshd60a9b4a9e0b2e', 'tka1awr4', '23/05/2021 08:49:29am'),
('lshd60a9bd5d8dbb4', 'tka1awr4', '23/05/2021 09:26:37am'),
('lshd60a9bec9cccde', 'tka1awr4', '23/05/2021 09:32:41am'),
('lshd60a9bffab9583', 'tka1awr4', '23/05/2021 09:37:46am'),
('lshd60a9cc339f7d4', 'tka1awr4', '23/05/2021 10:29:55am'),
('lshd60a9d85225219', 'tka1awr4', '23/05/2021 11:21:38am'),
('lshd60a9f8aade681', 'tka1awr4', '23/05/2021 13:39:38pm'),
('lshd60aa07254e6ff', 'tka1awr4', '23/05/2021 14:41:25pm'),
('lshd60aa13a364d89', 'tka1awr4', '23/05/2021 15:34:43pm'),
('lshd60aa233581d87', 'tka1awr4', '23/05/2021 16:41:09pm'),
('lshd60ab549a76c45', 'tka1awr4', '24/05/2021 14:24:10pm'),
('lshd60ab5b6c0b556', 'tka1awr4', '24/05/2021 14:53:16pm'),
('lshd60ab5e819e02e', 'tka1awr4', '24/05/2021 15:06:25pm'),
('lshd60ab6a7d55340', 'tka1awr4', '24/05/2021 15:57:33pm'),
('lshd60abb111c8bb1', 'tka1awr4', '24/05/2021 20:58:41pm'),
('lshd60abc03a9e7d1', 'tka1awr4', '24/05/2021 22:03:22pm'),
('lshd60ac6bb802626', 'tka1awr4', '25/05/2021 10:15:04am'),
('lshd60ac788c17d2f', 'tka1awr4', '25/05/2021 11:09:48am'),
('lshd60ac84a103a56', 'tka1awr4', '25/05/2021 12:01:21pm'),
('lshd60ac91b61e356', 'tka1awr4', '25/05/2021 12:57:10pm'),
('lshd60ac9d7abe05c', 'tka1awr4', '25/05/2021 13:47:22pm'),
('lshd60ac9d8a8c131', 'tka1awr4', '25/05/2021 13:47:38pm'),
('lshd60acb24b5a8a8', 'tka1awr4', '25/05/2021 15:16:11pm'),
('lshd60acbe900bd6c', 'tka1awr4', '25/05/2021 16:08:32pm'),
('lshd60acce395898c', 'tka1awr4', '25/05/2021 17:15:21pm'),
('lshd60acfb2611e36', 'tka1awr4', '25/05/2021 20:27:02pm'),
('lshd60ad0724349b7', 'tka1awr4', '25/05/2021 21:18:12pm'),
('lshd60ad14ac8036c', 'tka1awr4', '25/05/2021 22:15:56pm'),
('lshd60b0f24ace686', 'tka1awr4', '28/05/2021 20:38:18pm'),
('lshd60c7040ca7d18', 'TK1', '14/06/2021 14:23:56pm'),
('lshd60c7046343b1e', 'tka1awr4', '14/06/2021 14:25:23pm'),
('lshd60c72cb99ecee', 'tka1awr4', '14/06/2021 17:17:29pm'),
('lshd60c73a464c11d', 'tka1awr4', '14/06/2021 18:15:18pm'),
('lshd60c746158e5e4', 'tka1awr4', '14/06/2021 19:05:41pm'),
('lshd60c8114ac6e8f', 'tka1awr4', '15/06/2021 09:32:42am'),
('lshd60c81f48866b5', 'tka1awr4', '15/06/2021 10:32:24am'),
('lshd60c82b7d202a0', 'tka1awr4', '15/06/2021 11:24:29am'),
('lshd60c86d79969ec', 'tka1awr4', '15/06/2021 16:06:01pm'),
('lshd60c8b381097b5', 'tka1awr4', '15/06/2021 21:04:49pm'),
('lshd60c8bfbe7ed57', 'tka1awr4', '15/06/2021 21:57:02pm'),
('lshd60c8cca762a0c', 'tka1awr4', '15/06/2021 22:52:07pm'),
('lshd60c941cfea817', 'tka1awr4', '16/06/2021 07:11:59am'),
('lshd60c95551cebf3', 'tka1awr4', '16/06/2021 08:35:13am'),
('lshd60c9613b29e59', 'tka1awr4', '16/06/2021 09:26:03am'),
('lshd60c9b6ca6355c', 'tka1awr4', '16/06/2021 15:31:06pm'),
('lshd60c9c342173da', 'tka1awr4', '16/06/2021 16:24:18pm'),
('lshd60c9cff88aeb6', 'tka1awr4', '16/06/2021 17:18:32pm'),
('lshd60ca01e0267f4', 'tka1awr4', '16/06/2021 20:51:28pm'),
('lshd60ca9a0c8e1c8', 'tka1awr4', '17/06/2021 07:40:44am'),
('lshd60caa611d0d0e', 'tka1awr4', '17/06/2021 08:32:01am'),
('lshd60caba1541e26', 'tka1awr4', '17/06/2021 09:57:25am'),
('lshd60cb0e720c6c4', 'tka1awr4', '17/06/2021 15:57:22pm'),
('lshd60cbfcee61882', 'tka1awr4', '18/06/2021 08:54:54am'),
('lshd60cbfda184cb4', 'tka1awr4', '18/06/2021 08:57:53am'),
('lshd60cbfded45a74', 'tka1awr4', '18/06/2021 08:59:09am'),
('lshd60cbfea049bbd', 'tka1awr4', '18/06/2021 09:02:08am'),
('lshd60cbfec62ffa9', 'tka1awr4', '18/06/2021 09:02:46am'),
('lshd60cc0a94a6b95', 'tka1awr4', '18/06/2021 09:53:08am');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaitrasua`
--

CREATE TABLE `loaitrasua` (
  `MALOAITRASUA` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TENLOAI` varchar(30) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `MOTA` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `GIA` double NOT NULL,
  `HINHANH` text COLLATE utf8_unicode_ci NOT NULL,
  `TRANGTHAI` int(11) NOT NULL DEFAULT 1,
  `NGAYTAO` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaitrasua`
--

INSERT INTO `loaitrasua` (`MALOAITRASUA`, `TENLOAI`, `MOTA`, `GIA`, `HINHANH`, `TRANGTHAI`, `NGAYTAO`) VALUES
('ts607ba482510e2', 'Trà sữa trân châu đường đen', 'Sữa tươi trân châu là thức uống yêu thích của giới trẻ hiện nay, vị của đường đen kết hợp với nền sữa tươi thanh trùng tạo nên hương vị đậm đà, ngọt thanh và béo ngậy hơn, trân châu dẻo thơm sẽ là điểm nhấn cho thức uống này thêm phần hấp dẫn.', 15000, 'http://localhost:8080/trasua/FileUpload/tranchauduongden.jpg', 1, 1618715778),
('ts607c023b73541', 'Trà sữa việt quấc', 'Việt quất là một loại quả mọng với nhiều lợi ích tốt cho sức khỏe. Trong việt quất có chứa chất anthocyanidins, giúp tăng cường hệ miễn dịch cũng như vô hiệu hóa các gốc tự do liên quan đến bệnh ung thư. Smoothie Blueberry DP Food chiết xuất từ những quả việt quất tươi mát nhất trên dây chuyền sản xuất hiện đại, mang đến hương vị nhẹ nhàng, dễ uống. Với hàm lượng thành phần trái cây tươi cao, Smoothie Blueberry mang đến hương vị trái cây đậm đà tự nhiên cho nhiều loại thức uống khác nhau. Bạn cũng hoàn toàn có thể sử dụng Smoothie Blueberry làm trà sữa việt quất thơm ngon để có thể thoải mái uống trà sữa mà không sợ ảnh hưởng đến sức khỏe.', 17000, 'http://localhost:8080/trasua/FileUpload/dacbiet.jpg', 1, 1618739771),
('ts607c43f77825e', 'Trà sữa 3 loại trân châu.', 'Trong các món best seller tại Yucha luôn luôn có mặt “hội anh em” TRÀ SỮA 3J. Vậy 3J là gì ta? Có điểm nào đặc biệt không?\r\n\r\n“3J” chính là viết tắt của 3 JELLIES có trong mỗi ly trà sữa đấy! \r\n\r\nTrong trà sữa 3J sẽ được đính kèm luôn 3 loại Topping thơm ngon để các bạn tha hồ nhâm nhi. Các tín đồ đam mê nhâm nhi topping thì không thể bỏ qua dòng trà sữa 3J với đủ thứ topping đầy ụ này!', 51000, 'http://localhost:8080/trasua/FileUpload/TRA-SAU-3-LOAI-TRAN-CHAU.jpg', 1, 1618756599),
('ts607cd78d9cfe7', 'Trân châu loại 1', 'Không thể dừng', 21000, 'http://localhost:8080/trasua/FileUpload/test3.jpg', 1, 1618794381),
('ts6083e2ddb600d', 'Hồng trà', 'uống vô tỉnh liền', 14000, 'http://localhost:8080/trasua/FileUpload/hongtra.jpg', 0, 1619256029),
('ts6083e39f7f6bb', 'Trà sữa socola', 'thơm ngon béo ngậy', 21000, 'http://localhost:8080/trasua/FileUpload/trasuasocola.jpg', 0, 1619256223),
('ts60866581d8afb', 'sản phẩm thử nghiệm 1', 'thử nghiệm', 12000, 'http://localhost:8080/trasua/FileUpload/trasuamatcha.jpg', 0, 1619420545),
('ts608dfe717925b', 'Sản phẩm thử nghiệm 5', 'thử nghiệm 5', 21000, 'http://localhost:8080/trasua/FileUpload/trà-sữa-thái-xanh.jpg', 1, 1619918449),
('ts6091ef91c51e9', 'Trà sữa hoa đậu biếc', 'Hoa đậu biếc là nguyên liệu pha chế thức uống, nấu ăn, làm bánh được các nước Phương Tây ưa chuộng. Sau khi phổ biến ở nước ta, loại hoa này nhanh chóng được ứng dụng rộng rãi. Người ta đã tận dụng hương thơm và màu sắc tự nhiên đẹp mắt của hoa đậu biếc để pha chế nhiều món thức uống thơm ngon. Món trà sữa hoa đậu biếc ra đời từ đó.', 18000, 'http://localhost:8080/trasua/FileUpload/cach-lam-tra-sua-hoa-dau-biec.jpg', 1, 1620176785),
('ts609f4eca379a0', 'Trà sữa Bopapop', 'Trà sữa Bobapop Nguyễn Trãi tưởng chừng như đơn giản nhưng lại rất cầu kỳ. Hương vị trà tươi mát. Vị sữa ngọt êm đềm. Vị của những hạt trân châu dẻo thơm', 23000, 'http://localhost:8080/trasua/FileUpload/trasuabobapop.jpg', 1, 1621053130),
('ts60c9bf7ac9dc7', 'Trà sữa bơ đường', 'Trà sữa trân châu: loại trà sữa được cho thêm trân châu ngọt, dẻo vào. Trân châu này được làm từ đường đen nấu chảy cùng bột năng.\r\nTrà sữa Hồng Kông: trà sữa được giảm độ đắng bằng sữa đặc không đường. Nó có nguồn gốc từ khi Anh xâm chiếm Hồng Công.\r\nSuutei tsai: một loại trà sữa mặn của người Mông Cổ', 22000, 'http://localhost:8080/trasua/FileUpload/hinh-anh-tra-sua-dep-mat-nhat.jpg', 1, 1623834490),
('tsmc1', 'Trà sữa matcha', NULL, 15000, 'http://localhost:8080/trasua/FileUpload/tra-sua-matcha.jpg', 1, 124123223),
('tstc', 'Trà sữa trân châu', NULL, 25000, 'http://localhost:8080/trasua/FileUpload/tra-sua-tran-chau.jpg', 1, 124123243);

--
-- Bẫy `loaitrasua`
--
DELIMITER $$
CREATE TRIGGER `them ngay tao LOAITRASUA` BEFORE INSERT ON `loaitrasua` FOR EACH ROW BEGIN
	SET NEW.NGAYTAO = UNIX_TIMESTAMP();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguyenlieu`
--

CREATE TABLE `nguyenlieu` (
  `MANGUYENLIEU` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TENNL` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `TONKHO` double NOT NULL,
  `DONVI` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `DONGIA` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguyenlieu`
--

INSERT INTO `nguyenlieu` (`MANGUYENLIEU`, `TENNL`, `TONKHO`, `DONVI`, `DONGIA`) VALUES
('nl1', 'Bột matcha', 48.26, 'kg', 10000),
('nl2', 'Sữa tươi', 29.69, 'lít', 11000),
('nl605da771044c1', 'socola', 16.57, 'kg', 12500),
('nl605f0f8d1e7dc', 'Hạt trân châu', 7.99, 'kilogram', 13000),
('nl605f103d2a973', 'kem tươi', 6.66, 'kg', 9000),
('nl60c9b9a8af513', 'Đường cát', 19.6, 'kg', 14000),
('nl60c9b9a8af514', 'Trà thái nguyên', 5, 'kg', 7000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `MANHACUNGCAP` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TEN` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `DIACHI` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`MANHACUNGCAP`, `TEN`, `SDT`, `DIACHI`) VALUES
('ncc1', 'thienlong', '0329138041', '97 man thien'),
('ncc2', 'tuệ minh', '0329138131', '92 man thiện'),
('ncc605da38551938', 'nhacungcapmoi1', '023122324', '93 man thien'),
('ncc605db4c506af1', 'nhacungcapmoi2', '0231223241', '91 man thien'),
('ncc605db7916840c', 'nhacungcapmoi3', '0231221232', '99 man thien'),
('ncc605db7addd007', 'nhacungcapmoi3', '0231221232', '99 man thien'),
('ncc605db7de30b04', 'nhacungcapmoi4', '0399198997', '93 man thien'),
('ncc605db862402a2', 'nhacungcapmoi4', '0333433434', '93 man thien'),
('ncc605f1132ab08d', 'NCC5', '0967898876', '90 man thien'),
('ncc60c9b9a8af509', 'Nhà cung cấp Nam định', '0322424341', '36 đường phú nhuận Tp buôn ma thuộc, daklak');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MANV` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `HO` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TEN` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `AVATAR` text COLLATE utf8_unicode_ci DEFAULT 'http://localhost:8080/trasua/milestone/images/avatar.jpg',
  `MABP` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MATAIKHOAN` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MANV`, `HO`, `TEN`, `SDT`, `AVATAR`, `MABP`, `MATAIKHOAN`) VALUES
('NV1', 'nguyen', 'long', '0329137984', 'http://localhost:8080/trasua/milestone/images/avatar.jpg', 'BPBANHANG', 'TK1'),
('NV2', 'nguyen', 'test2', '0329138048', 'http://localhost:8080/trasua/milestone/images/avatar.jpg', 'BPKHO', 'TK2'),
('nv3', 'Mr', 'John', '0329138048', 'http://localhost:8080/trasua/milestone/images/avatar.jpg', 'BPBANHANG', 'tka1awr4'),
('NV4', 'nguyen', 'tuan', '0329138048', 'http://localhost:8080/trasua/milestone/images/avatar.jpg', 'BPVESINH', 'TK4'),
('nv606d6fe4df03e', 'nguyễn văn', 'A', '0329138048', 'http://localhost:8080/trasua/FileUpload/2019-02-02.png', 'BPKHO', 'tk606d6fe4df03a'),
('nv6094a5f3abc71', 'nguyen', 'nvtest1', '0121232424', 'http://localhost:8080/trasua/FileUpload/117307481_322529425789650_6899801582438490815_n.jpg', 'BPBANHANG', 'tk6094a5f3abc6f'),
('nv6094a60d2ad36', 'nguyen', 'nvtest2', '0212232307', 'http://localhost:8080/trasua/FileUpload/117307481_322529425789650_6899801582438490815_n.jpg', 'BPKHO', 'tk6094a60d2ad33'),
('nv609f4c1d1aa47', 'nguyễn văn', 'C', '0214748364', 'http://localhost:8080/trasua/FileUpload/Thang.jpg', 'BPTIEPTAN', 'tk609f4c1d1aa45'),
('nv60ca032212838', 'Nguyễn văn', 'D', '0322828383', 'http://localhost:8080/trasua/FileUpload/stephenlang.jpg', 'BPVESINH', 'tk60ca032212834');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
--

CREATE TABLE `phieunhap` (
  `MAPHIEUNHAP` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MADONDH` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MANV` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `NGAYLAP` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phieunhap`
--

INSERT INTO `phieunhap` (`MAPHIEUNHAP`, `MADONDH`, `MANV`, `NGAYLAP`) VALUES
('PN1', 'dhh1', 'NV1', 124232323),
('PN2', 'dh2', 'NV1', 124122423253),
('pn6060528fecc84', 'ddh605f103d2a970', 'NV1', 1616925327),
('pn6060549bf2caf', 'ddh605f103d2a970', 'NV1', 1616925851),
('pn6060552589b90', 'dhh1', 'NV1', 1616925989),
('pn6069a2b6cfef1', 'ddh605f103d2a970', 'NV1', 1617535670),
('pn6069a304d3b2b', 'ddh605f103d2a970', 'NV1', 1617535748),
('pn6069a3a2cb753', 'ddh605f103d2a970', 'NV1', 1617535906),
('pn6069a3ba97450', 'ddh605f103d2a970', 'NV1', 1617535930),
('pn6069a40e0815f', 'ddh605f103d2a970', 'NV1', 1617536014),
('pn6069a41605c59', 'ddh605f103d2a970', 'NV1', 1617536022),
('pn6069a439c70ff', 'dhh1', 'NV1', 1617536057),
('pn6069a463d5c11', 'ddh605f103d2a970', 'NV1', 1617536099),
('pn606a5bed19043', 'ddh605f103d2a970', 'NV1', 1617583085),
('pn606a5bf54cb82', 'ddh605f103d2a970', 'NV1', 1617583093),
('pn606a5c14dae66', 'ddh605f103d2a970', 'NV1', 1617583124),
('pn606a5c1bad6eb', 'ddh605f103d2a970', 'NV1', 1617583131),
('pn60783c219c24d', 'ddh60783b251f38f', 'NV1', 1618492449),
('pn6094a89e48504', 'ddh605f0f8d1e7c4', 'nv6094a60d2ad36', 1620355230),
('pn60993351e155d', 'ddh605f103d2a970', 'NV2', 1620652881),
('pn609f4ff65ba33', 'ddh60783b251f38f', 'nv3', 1621053430),
('pn60c9bab80d1f6', 'ddh60c9b9a8af50f', 'nv3', 1623833272),
('pn60c9bc3335edc', 'ddh60c9bc077789c', 'nv3', 1623833651);

--
-- Bẫy `phieunhap`
--
DELIMITER $$
CREATE TRIGGER `them ngay tao` BEFORE INSERT ON `phieunhap` FOR EACH ROW BEGIN
	SET NEW.NGAYLAP = UNIX_TIMESTAMP();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `ROLEID` int(11) NOT NULL,
  `ROLENAME` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`ROLEID`, `ROLENAME`) VALUES
(0, 'boss'),
(1, 'admin'),
(2, 'employee'),
(3, 'customer');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `MASIZE` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TENSIZE` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`MASIZE`, `TENSIZE`) VALUES
('masize607b6049e4471', 'Size L'),
('masize607b602705fe0', 'Size M'),
('masize607b5fe2e11a1', 'Size S'),
('masize607b6063d12ad', 'Size XL');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MATAIKHOAN` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TAIKHOAN` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MATKHAU` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `VAITRO` int(11) NOT NULL,
  `SESSION` text COLLATE utf8_unicode_ci NOT NULL,
  `TRANGTHAI` int(11) NOT NULL DEFAULT 1,
  `NGAYTAO` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`MATAIKHOAN`, `TAIKHOAN`, `MATKHAU`, `VAITRO`, `SESSION`, `TRANGTHAI`, `NGAYTAO`) VALUES
('TK1', 'LONG@GMAIL.COM', 'caf1a3dfb505ffed0d024130f58c5cfa', 1, '', 0, 12412324),
('TK2', 'TEST@GMAIL.COM', 'caf1a3dfb505ffed0d024130f58c5cfa', 2, '[{\"id\":\"01e15df1bb6c2a6a89e13bed79753bd6\",\"username\":\"TEST@GMAIL.COM\",\"ipaddress\":\"::1\",\"useragent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/90.0.4430.93 Safari\\/537.36\",\"manv\":\"NV2\",\"role\":\"Nh\\u00e2n vi\\u00ean\",\"mabophan\":\"BPBANHANG\",\"createdate\":\"12\\/05\\/2021 12:09:31pm\",\"expiredate\":\"12\\/05\\/2021 12:59:31pm\"}]', 0, 12412324234),
('TK4', 'TEST2@GMAIL.COM', 'caf1a3dfb505ffed0d024130f58c5cfa', 1, '[{\"id\":\"b49be470f049b0eacc4128bee4ce0287\",\"username\":\"TEST2@GMAIL.COM\",\"ipaddress\":\"::1\",\"useragent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/91.0.4472.106 Safari\\/537.36\",\"manv\":\"NV4\",\"role\":\"Qu\\u1ea3n l\\u00ed\",\"mabophan\":\"BPVESINH\",\"createdate\":\"18\\/06\\/2021 09:02:29am\",\"expiredate\":\"18\\/06\\/2021 09:52:29am\"}]', 0, 241251232423),
('tk606d6fe4df03a', 'nhanvienA@gmail.com', 'caf1a3dfb505ffed0d024130f58c5cfa', 1, '[{\"id\":\"28368e5bf9d677740a30613ec4fa07aa\",\"username\":\"nhanvienA@gmail.com\",\"ipaddress\":\"::1\",\"useragent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/91.0.4472.106 Safari\\/537.36\",\"manv\":\"nv606d6fe4df03e\",\"role\":\"Qu\\u1ea3n l\\u00ed\",\"mabophan\":\"BPKHO\",\"createdate\":\"18\\/06\\/2021 08:58:50am\",\"expiredate\":\"18\\/06\\/2021 09:48:50am\"}]', 0, 1617784804),
('tk6094a5f3abc6f', 'nvtest1@gmail.com', 'caf1a3dfb505ffed0d024130f58c5cfa', 2, '', 1, 1620354547),
('tk6094a60d2ad33', 'nvtest2@gmail.com', 'caf1a3dfb505ffed0d024130f58c5cfa', 2, '[{\"id\":\"3a04712d089793f9009fd658c4e2c575\",\"username\":\"nvtest2@gmail.com\",\"ipaddress\":\"::1\",\"useragent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/90.0.4430.93 Safari\\/537.36\",\"manv\":\"nv6094a60d2ad36\",\"role\":\"nhanvien\",\"createdate\":\"07\\/05\\/2021 09:39:43am\",\"expiredate\":\"07\\/05\\/2021 10:29:43am\"}]', 1, 1620354573),
('tk609f4c1d1aa45', 'nhanvienC@gmail.com', 'caf1a3dfb505ffed0d024130f58c5cfa', 1, '', 1, 1621052445),
('tk60ca032212834', 'nhanvienD@gmail.com', 'caf1a3dfb505ffed0d024130f58c5cfa', 2, '', 1, 1623851810),
('tka1awr4', 'root@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '[{\"id\":\"ec0adfd46e2930c40f510122c9bd494a\",\"username\":\"root@gmail.com\",\"ipaddress\":\"::1\",\"useragent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/91.0.4472.106 Safari\\/537.36\",\"manv\":\"nv3\",\"role\":\"Boss\",\"mabophan\":\"BPBANHANG\",\"createdate\":\"18\\/06\\/2021 09:53:08am\",\"expiredate\":\"18\\/06\\/2021 10:43:08am\"}]', 1, 0);

--
-- Bẫy `taikhoan`
--
DELIMITER $$
CREATE TRIGGER `them ngay tao TAIKHOAN` BEFORE INSERT ON `taikhoan` FOR EACH ROW BEGIN
	SET NEW.NGAYTAO = UNIX_TIMESTAMP();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangthaidondathang`
--

CREATE TABLE `trangthaidondathang` (
  `MATRANGTHAI` int(11) NOT NULL,
  `TENTRANGTHAI` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `trangthaidondathang`
--

INSERT INTO `trangthaidondathang` (`MATRANGTHAI`, `TENTRANGTHAI`) VALUES
(1, 'Đặt thành công'),
(2, 'Đã hủy'),
(3, 'Đang chờ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangthaidonhang`
--

CREATE TABLE `trangthaidonhang` (
  `MATRANGTHAI` int(11) NOT NULL,
  `TENTRANGTHAI` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `trangthaidonhang`
--

INSERT INTO `trangthaidonhang` (`MATRANGTHAI`, `TENTRANGTHAI`) VALUES
(1, 'Chờ xử lí'),
(2, 'Đang pha chế'),
(3, 'Đang giao'),
(4, 'Đã giao'),
(5, 'Đã hủy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangthaihoadon`
--

CREATE TABLE `trangthaihoadon` (
  `MATRANGTHAI` int(11) NOT NULL,
  `TENTRANGTHAI` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `trangthaihoadon`
--

INSERT INTO `trangthaihoadon` (`MATRANGTHAI`, `TENTRANGTHAI`) VALUES
(1, 'Đã thanh toán'),
(2, 'Chưa thanh toán');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangthaitaikhoan`
--

CREATE TABLE `trangthaitaikhoan` (
  `matrangthai` int(11) NOT NULL,
  `TENTRANGTHAI` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `trangthaitaikhoan`
--

INSERT INTO `trangthaitaikhoan` (`matrangthai`, `TENTRANGTHAI`) VALUES
(0, 'Khóa'),
(1, 'Mở');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bophan`
--
ALTER TABLE `bophan`
  ADD PRIMARY KEY (`MABP`),
  ADD KEY `MANVQL` (`MANVQL`);

--
-- Chỉ mục cho bảng `ctcungcap`
--
ALTER TABLE `ctcungcap`
  ADD PRIMARY KEY (`MANHACUNGCAP`,`MANGUYENLIEU`,`MACTCUNGCAP`),
  ADD KEY `MANHACUNGCAP` (`MANHACUNGCAP`),
  ADD KEY `MANL` (`MANGUYENLIEU`);

--
-- Chỉ mục cho bảng `ctdondathang`
--
ALTER TABLE `ctdondathang`
  ADD PRIMARY KEY (`MADONDATHANG`,`MANGUYENLIEU`),
  ADD KEY `MADDH` (`MADONDATHANG`),
  ADD KEY `MANL` (`MANGUYENLIEU`);

--
-- Chỉ mục cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD PRIMARY KEY (`MAHOADON`,`MALOAITRASUA`,`TENSIZE`),
  ADD KEY `MAHOADON` (`MAHOADON`),
  ADD KEY `MALOAITRASUA` (`MALOAITRASUA`);

--
-- Chỉ mục cho bảng `ctloaitrasua`
--
ALTER TABLE `ctloaitrasua`
  ADD PRIMARY KEY (`MALOAITRASUA`,`MANGUYENLIEU`),
  ADD KEY `MALOAITRASUA` (`MALOAITRASUA`),
  ADD KEY `MANL` (`MANGUYENLIEU`);

--
-- Chỉ mục cho bảng `ctphieunhap`
--
ALTER TABLE `ctphieunhap`
  ADD PRIMARY KEY (`MANGUYENLIEU`,`MAPHIEUNHAP`),
  ADD KEY `MANL` (`MANGUYENLIEU`),
  ADD KEY `MAPHIEUNHAP` (`MAPHIEUNHAP`);

--
-- Chỉ mục cho bảng `ctsize`
--
ALTER TABLE `ctsize`
  ADD PRIMARY KEY (`MALOAITRASUA`,`MASIZE`),
  ADD KEY `MALOAITRASUA` (`MALOAITRASUA`,`MASIZE`),
  ADD KEY `MASIZE` (`MASIZE`);

--
-- Chỉ mục cho bảng `dondh`
--
ALTER TABLE `dondh`
  ADD PRIMARY KEY (`MADONDH`),
  ADD KEY `MANHACUNGCAP` (`MANHACUNGCAP`),
  ADD KEY `NGUOILAP` (`NGUOILAP`),
  ADD KEY `TRANGTHAI` (`TRANGTHAI`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MADONHANG`),
  ADD KEY `MAHOADON` (`MAHOADON`),
  ADD KEY `TRANGTHAIDONHANG` (`TRANGTHAIDONHANG`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MAHOADON`),
  ADD KEY `MANV` (`MANV`),
  ADD KEY `MTKKH` (`MAKHACHHANG`),
  ADD KEY `MAKHACHHANG` (`MAKHACHHANG`),
  ADD KEY `TRANGTHAI` (`MATRANGTHAI`),
  ADD KEY `MATRANGTHAI` (`MATRANGTHAI`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MAKH`),
  ADD UNIQUE KEY `SDT` (`SDT`);

--
-- Chỉ mục cho bảng `khoiluongsize`
--
ALTER TABLE `khoiluongsize`
  ADD PRIMARY KEY (`MAKHOILUONG`),
  ADD KEY `MASIZE` (`MASIZE`);

--
-- Chỉ mục cho bảng `lichsuchinhsua`
--
ALTER TABLE `lichsuchinhsua`
  ADD PRIMARY KEY (`MACHINHSUA`),
  ADD KEY `MALOAITRASUA` (`MALOAITRASUA`);

--
-- Chỉ mục cho bảng `lichsuhoatdong`
--
ALTER TABLE `lichsuhoatdong`
  ADD PRIMARY KEY (`MALICHSUHOATDONG`),
  ADD KEY `MATAIKHOAN` (`MATAIKHOAN`);

--
-- Chỉ mục cho bảng `loaitrasua`
--
ALTER TABLE `loaitrasua`
  ADD PRIMARY KEY (`MALOAITRASUA`),
  ADD UNIQUE KEY `TENLOAI` (`TENLOAI`);

--
-- Chỉ mục cho bảng `nguyenlieu`
--
ALTER TABLE `nguyenlieu`
  ADD PRIMARY KEY (`MANGUYENLIEU`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`MANHACUNGCAP`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MANV`),
  ADD KEY `MABP` (`MABP`),
  ADD KEY `MATAIKHOAN` (`MATAIKHOAN`);

--
-- Chỉ mục cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`MAPHIEUNHAP`),
  ADD KEY `MADONDH` (`MADONDH`),
  ADD KEY `MANV` (`MANV`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ROLEID`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`MASIZE`),
  ADD UNIQUE KEY `TENSIZE` (`TENSIZE`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MATAIKHOAN`),
  ADD UNIQUE KEY `TAIKHOAN` (`TAIKHOAN`),
  ADD KEY `VAITRO` (`VAITRO`),
  ADD KEY `TRANGTHAI` (`TRANGTHAI`);

--
-- Chỉ mục cho bảng `trangthaidondathang`
--
ALTER TABLE `trangthaidondathang`
  ADD PRIMARY KEY (`MATRANGTHAI`);

--
-- Chỉ mục cho bảng `trangthaidonhang`
--
ALTER TABLE `trangthaidonhang`
  ADD PRIMARY KEY (`MATRANGTHAI`);

--
-- Chỉ mục cho bảng `trangthaihoadon`
--
ALTER TABLE `trangthaihoadon`
  ADD PRIMARY KEY (`MATRANGTHAI`);

--
-- Chỉ mục cho bảng `trangthaitaikhoan`
--
ALTER TABLE `trangthaitaikhoan`
  ADD PRIMARY KEY (`matrangthai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `ROLEID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `trangthaidondathang`
--
ALTER TABLE `trangthaidondathang`
  MODIFY `MATRANGTHAI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `trangthaidonhang`
--
ALTER TABLE `trangthaidonhang`
  MODIFY `MATRANGTHAI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `trangthaihoadon`
--
ALTER TABLE `trangthaihoadon`
  MODIFY `MATRANGTHAI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `trangthaitaikhoan`
--
ALTER TABLE `trangthaitaikhoan`
  MODIFY `matrangthai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bophan`
--
ALTER TABLE `bophan`
  ADD CONSTRAINT `bophan_ibfk_1` FOREIGN KEY (`MANVQL`) REFERENCES `nhanvien` (`MANV`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `ctcungcap`
--
ALTER TABLE `ctcungcap`
  ADD CONSTRAINT `ctcungcap_ibfk_2` FOREIGN KEY (`MANHACUNGCAP`) REFERENCES `nhacungcap` (`MANHACUNGCAP`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ctcungcap_ibfk_3` FOREIGN KEY (`MANGUYENLIEU`) REFERENCES `nguyenlieu` (`MANGUYENLIEU`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `ctdondathang`
--
ALTER TABLE `ctdondathang`
  ADD CONSTRAINT `ctdondathang_ibfk_3` FOREIGN KEY (`MADONDATHANG`) REFERENCES `dondh` (`MADONDH`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ctdondathang_ibfk_4` FOREIGN KEY (`MANGUYENLIEU`) REFERENCES `nguyenlieu` (`MANGUYENLIEU`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD CONSTRAINT `cthoadon_ibfk_3` FOREIGN KEY (`MAHOADON`) REFERENCES `hoadon` (`MAHOADON`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `cthoadon_ibfk_4` FOREIGN KEY (`MALOAITRASUA`) REFERENCES `loaitrasua` (`MALOAITRASUA`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `ctloaitrasua`
--
ALTER TABLE `ctloaitrasua`
  ADD CONSTRAINT `ctloaitrasua_ibfk_2` FOREIGN KEY (`MALOAITRASUA`) REFERENCES `loaitrasua` (`MALOAITRASUA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ctloaitrasua_ibfk_3` FOREIGN KEY (`MANGUYENLIEU`) REFERENCES `nguyenlieu` (`MANGUYENLIEU`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `ctphieunhap`
--
ALTER TABLE `ctphieunhap`
  ADD CONSTRAINT `ctphieunhap_ibfk_5` FOREIGN KEY (`MANGUYENLIEU`) REFERENCES `nguyenlieu` (`MANGUYENLIEU`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ctphieunhap_ibfk_6` FOREIGN KEY (`MAPHIEUNHAP`) REFERENCES `phieunhap` (`MAPHIEUNHAP`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `ctsize`
--
ALTER TABLE `ctsize`
  ADD CONSTRAINT `ctsize_ibfk_1` FOREIGN KEY (`MALOAITRASUA`) REFERENCES `loaitrasua` (`MALOAITRASUA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ctsize_ibfk_2` FOREIGN KEY (`MASIZE`) REFERENCES `size` (`MASIZE`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `dondh`
--
ALTER TABLE `dondh`
  ADD CONSTRAINT `dondh_ibfk_2` FOREIGN KEY (`MANHACUNGCAP`) REFERENCES `nhacungcap` (`MANHACUNGCAP`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `dondh_ibfk_3` FOREIGN KEY (`NGUOILAP`) REFERENCES `nhanvien` (`MANV`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `dondh_ibfk_4` FOREIGN KEY (`TRANGTHAI`) REFERENCES `trangthaidondathang` (`MATRANGTHAI`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`MAHOADON`) REFERENCES `hoadon` (`MAHOADON`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`TRANGTHAIDONHANG`) REFERENCES `trangthaidonhang` (`MATRANGTHAI`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`MAKHACHHANG`) REFERENCES `khachhang` (`MAKH`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`MANV`) REFERENCES `nhanvien` (`MANV`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `hoadon_ibfk_3` FOREIGN KEY (`MATRANGTHAI`) REFERENCES `trangthaihoadon` (`MATRANGTHAI`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `khoiluongsize`
--
ALTER TABLE `khoiluongsize`
  ADD CONSTRAINT `khoiluongsize_ibfk_1` FOREIGN KEY (`MASIZE`) REFERENCES `size` (`MASIZE`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `lichsuchinhsua`
--
ALTER TABLE `lichsuchinhsua`
  ADD CONSTRAINT `lichsuchinhsua_ibfk_1` FOREIGN KEY (`MALOAITRASUA`) REFERENCES `loaitrasua` (`MALOAITRASUA`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `lichsuhoatdong`
--
ALTER TABLE `lichsuhoatdong`
  ADD CONSTRAINT `lichsuhoatdong_ibfk_1` FOREIGN KEY (`MATAIKHOAN`) REFERENCES `taikhoan` (`MATAIKHOAN`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_2` FOREIGN KEY (`MATAIKHOAN`) REFERENCES `taikhoan` (`MATAIKHOAN`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `nhanvien_ibfk_3` FOREIGN KEY (`MABP`) REFERENCES `bophan` (`MABP`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `phieunhap_ibfk_2` FOREIGN KEY (`MADONDH`) REFERENCES `dondh` (`MADONDH`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `phieunhap_ibfk_3` FOREIGN KEY (`MANV`) REFERENCES `nhanvien` (`MANV`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`VAITRO`) REFERENCES `role` (`ROLEID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `taikhoan_ibfk_2` FOREIGN KEY (`TRANGTHAI`) REFERENCES `trangthaitaikhoan` (`matrangthai`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
