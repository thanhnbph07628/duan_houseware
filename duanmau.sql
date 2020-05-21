-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 21, 2020 lúc 04:43 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duanmau`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `idcm` int(11) NOT NULL,
  `ngaycm` timestamp NOT NULL DEFAULT current_timestamp(),
  `anh` varchar(250) NOT NULL,
  `noidung` text NOT NULL,
  `idsp` int(11) NOT NULL,
  `user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`idcm`, `ngaycm`, `anh`, `noidung`, `idsp`, `user`) VALUES
(6, '2019-10-18 03:01:50', 'null', '<p>haha</p>\r\n', 1, 'bathanh'),
(9, '2019-10-18 03:50:39', 'null', '<p>H&agrave;ng tốt!!!</p>\r\n', 1, 'bathanh'),
(10, '2019-10-18 03:59:07', 'null', '<p>goood</p>\r\n', 1, 'bathanh'),
(11, '2019-10-18 03:59:59', 'null', '<p>&aacute;dsadsa</p>\r\n', 3, 'bathanh'),
(12, '2019-10-19 13:42:05', 'null', '<p>Bếp ga chất lượng tốt!!!</p>\r\n', 8, 'bathanh'),
(13, '2019-10-19 13:56:13', 'null', '<p>good!!!</p>\r\n', 1, 'thuhuyen'),
(14, '2019-10-22 03:02:46', 'null', '<p>Tủ lạnh c&oacute; bảo h&agrave;nh kh&ocirc;ng?</p>\r\n', 13, 'bathanh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `iddm` int(11) NOT NULL,
  `tendm` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`iddm`, `tendm`) VALUES
(1, 'Bếp nướng'),
(2, 'Tủ lạnh'),
(3, 'Bếp ga'),
(4, 'Nồi cơm'),
(50, 'Lò vi sóng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `footer`
--

CREATE TABLE `footer` (
  `sodienthoai` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `diachi` text NOT NULL,
  `logo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `idsp` int(11) NOT NULL,
  `tensp` varchar(100) NOT NULL,
  `anhsp` varchar(250) NOT NULL,
  `giasp` int(11) NOT NULL,
  `giakm` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `chitietsp` text NOT NULL,
  `soluong` int(11) NOT NULL,
  `iddm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`idsp`, `tensp`, `anhsp`, `giasp`, `giakm`, `view`, `chitietsp`, `soluong`, `iddm`) VALUES
(1, 'bếp nướng thịt 2019', 'sp2.jpg', 88888, 500000, 182, '<p>Chưa c&oacute;djskdalkdfkjfgsfla;kfjglsadsfdgfjhgfdsgsdhfdgdfgdfgdfgfdgfdgdfgfdgdgdgfdgfdfdgfdgfdgdfgdfgfdgfdgdfChưa&nbsp;Chưa&nbsp;Chưa&nbsp;Chưa c&oacute;djskdalkdfkjfgsfla;kfjglsadsfdgfjhgfdsgsdhfdgdfgdfgdfgfdgfdgdfgfdgdgdgfdgfdfdgfdgfdgdfgdfgfdgfdgdfChưa&nbsp;ChưaChưa c&oacute;djskdalkdfkjfgsfla;kfjglsadsfdgfjhgfdsgsdhfdgdfgdfgdfgfdgfdgdfgfdgdgdgfdgfdfdgfdgfdgdfgdfgfdgfdgdfChưa&nbsp;Chưac&oacute;djskdalkdfkjfgsfla;kfjglsadsfdgfjhgfdsgsdhfdgdfgdfgdfgfdgfdgdfgfdgdgdgfdgfdfdgfdgfdgdfgdfgfdgfdgdfChưa&nbsp;Chưa</p>\r\n', 55, 1),
(3, 'Tủ lạnh năm 2019', 'tulanh.jpg', 36500, 600000, 65, '<p><strong>Tủ lạnh</strong>&nbsp;Inverter l&agrave; d&ograve;ng&nbsp;<strong>tủ lạnh</strong>&nbsp;sử dụng c&ocirc;ng nghệ biến tần Inverter c&oacute; khả năng điều chỉnh v&ograve;ng quay của m&aacute;y n&eacute;n, duy tr&igrave; nhiệt độ hoạt động ổn định, gi&uacute;p&nbsp;<strong>tủ</strong>&nbsp;vận h&agrave;nh v&ocirc; c&ugrave;ng &ecirc;m &aacute;i v&agrave; tiết kiệm điện năng hiệu quả.</p>\r\n\r\n<p><strong>Tủ lạnh</strong>&nbsp;Inverter l&agrave; d&ograve;ng&nbsp;<strong>tủ lạnh</strong>&nbsp;sử dụng c&ocirc;ng nghệ biến tần Inverter c&oacute; khả năng điều chỉnh v&ograve;ng quay của m&aacute;y n&eacute;n, duy tr&igrave; nhiệt độ hoạt động ổn định, gi&uacute;p&nbsp;<strong>tủ</strong>&nbsp;vận h&agrave;nh v&ocirc; c&ugrave;ng &ecirc;m &aacute;i v&agrave; tiết kiệm điện năng hiệu quả.</p>\r\n\r\n<p><strong>Tủ lạnh</strong>&nbsp;Inverter l&agrave; d&ograve;ng&nbsp;<strong>tủ lạnh</strong>&nbsp;sử dụng c&ocirc;ng nghệ biến tần Inverter c&oacute; khả năng điều chỉnh v&ograve;ng quay của m&aacute;y n&eacute;n, duy tr&igrave; nhiệt độ hoạt động ổn định, gi&uacute;p&nbsp;<strong>tủ</strong>&nbsp;vận h&agrave;nh v&ocirc; c&ugrave;ng &ecirc;m &aacute;i v&agrave; tiết kiệm điện năng hiệu quả.</p>\r\n', 10, 2),
(8, 'Bếp ga ', '0314078bep-gas-duong-mat-kinh-2.jpg', 2300000, 500000, 35, '<p>Chưa c&oacute;</p>\r\n', 5, 3),
(13, 'Tủ lạnh inverter', 'th (1).jpg', 999999, 88888, 17, '<p>Tủ lạnh inverterTủ lạnh invertervvvvTủ lạnh inverterTủ lạnh inverterTủ lạnh inverterTủ lạnh inverterTủ lạnh inverterTủ lạnh inverterTủ lạnh inverterTủ lạnh inverterTủ lạnh inverterTủ lạnh inverterTủ lạnh inverterTủ lạnh inverterTủ lạnh inverterTủ lạnh inverterTủ lạnh inverterTủ lạnh inverterTủ lạnh inverterTủ lạnh inverterTủ lạnh inverterTủ lạnh inverterTủ lạnh inverterTủ lạnh inverterTủ lạnh inverterTủ lạnh inverterTủ lạnh inverterTủ lạnh inverterTủ lạnh inverterTủ lạnh inverterTủ lạnh inverter</p>\r\n', 100, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `idslide` int(11) NOT NULL,
  `anh` varchar(250) NOT NULL,
  `tieude` varchar(100) NOT NULL,
  `trangthai` int(11) NOT NULL,
  `ngaytao` timestamp NOT NULL DEFAULT current_timestamp(),
  `link` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`idslide`, `anh`, `tieude`, `trangthai`, `ngaytao`, `link`) VALUES
(1, 'banner6.png', 'slide11', 0, '2019-10-10 10:42:37', 'http://localhost/duanmau/chuyende/sanpham_ct.php?ma=1'),
(2, 'banner8.jpg', 'New 2020', 1, '2019-10-10 10:42:37', 'http://localhost/duanmau/chuyende/sanpham_ct.php?ma=1'),
(4, 'banner5.jpg', 'Đồ nội chợ', 1, '2019-10-10 10:42:37', 'http://localhost/duanmau/chuyende/sanpham_ct.php?ma=1'),
(6, 'banner4.jpg', 'Siêu giảm giá 2019', 0, '0000-00-00 00:00:00', 'http://localhost/duanmau/chuyende/sanpham_ct.php?ma=1'),
(9, 'banner9.jpg', 'giải trí', 1, '0000-00-00 00:00:00', 'http://localhost/duanmau/chuyende/sanpham_ct.php?ma=1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `user` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `anh` varchar(250) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ngaytao` timestamp NOT NULL DEFAULT current_timestamp(),
  `roles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`user`, `password`, `anh`, `ten`, `email`, `ngaytao`, `roles`) VALUES
('bathanh', 'nbtnh2000', '2.jpg', 'bá thành', 'bathanh17750@icloud.com', '2019-10-16 02:58:22', 0),
('bathanh922000', '008eda08cbba52a9b787b8a888974a30', '29792051_715275712194952_6569530668019485215_n.jpg', 'Bá Thành', 'thanh@gmail.com', '2020-03-02 15:41:15', 1),
('thuhuyen', '81dc9bdb52d04dc20036dbd8313ed055', '3-9.jpg', 'Huyền anh', 'nguyenbathanh.922000@gmail.com', '2019-10-19 13:55:37', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idcm`),
  ADD KEY `idsp` (`idsp`),
  ADD KEY `idsp_2` (`idsp`),
  ADD KEY `user` (`user`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`iddm`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`idsp`),
  ADD KEY `iddm` (`iddm`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`idslide`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `idcm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `iddm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `idsp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `idslide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`idsp`) REFERENCES `sanpham` (`idsp`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user`) REFERENCES `taikhoan` (`user`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`iddm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
