-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 11, 2024 lúc 11:01 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlvc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employees`
--

CREATE TABLE `employees` (
  `E_ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `birth` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `employees`
--

INSERT INTO `employees` (`E_ID`, `Name`, `birth`, `email`, `phone`, `gender`, `address`) VALUES
(1, 'Nguyễn Văn A', '1990-05-20', 'nguyenvana@example.com', '0123456789', 'Nam', '123 Đường ABC, Thành phố HCM'),
(2, 'Trần Thị B', '1985-10-15', 'tranthib@example.com', '0987654321', 'Nữ', '456 Phố XYZ, Hà Nội'),
(3, 'Lê Văn C', '1993-03-08', 'levanc@example.com', '0369852147', 'Nam', '789 Ngõ KLM, Đà Nẵng'),
(4, 'Phạm Thị D', '1988-12-25', 'phamthid@example.com', '0912345678', 'Nữ', '1011 Lô 1, Tây Ninh'),
(5, 'Hoàng Văn E', '1997-08-03', 'hoangvane@example.com', '0765432198', 'Nam', '1213 Làng Mới, Hải Phòng'),
(6, 'Vũ Thị F', '1991-06-30', 'vuthif@example.com', '0845612379', 'Nữ', '1415 Hẻm ABCD, Cần Thơ'),
(7, 'Đặng Văn G', '1983-02-17', 'dangvang@example.com', '0958712346', 'Nam', '1617 Đường XYZ, Vũng Tàu'),
(8, 'Nguyễn Thị H', '1995-09-12', 'nguyenthih@example.com', '0639871245', 'Nữ', '1819 Ngách KLMN, Nha Trang'),
(9, 'Trần Văn I', '1980-11-05', 'tranvani@example.com', '0523698741', 'Nam', '2021 Phố EFGH, Quảng Ninh'),
(10, 'Lê Thị K', '1998-04-18', 'lethik@example.com', '0325871963', 'Nữ', '2223 Ngõ IJKL, Huế'),
(11, 'Trịnh Thị Mai', '1995-03-20', 'trinhthimai@example.com', '0123456789', 'Nữ', '123 Đường ABC, Thành phố HCM'),
(12, 'Lương Văn Nam', '1990-08-15', 'luongvannam@example.com', '0987654321', 'Nam', '456 Phố XYZ, Hà Nội'),
(13, 'Đinh Thị Anh', '1993-05-28', 'dinhthianh@example.com', '0369852147', 'Nữ', '789 Ngõ KLM, Đà Nẵng'),
(14, 'Phan Văn Tú', '1988-11-12', 'phanvantu@example.com', '0912345678', 'Nam', '1011 Lô 1, Tây Ninh'),
(15, 'Trương Thị Hương', '1997-04-03', 'truongthihuong@example.com', '0765432198', 'Nữ', '1213 Làng Mới, Hải Phòng'),
(16, 'Lê Văn Minh', '1992-09-30', 'levanminh@example.com', '0845612379', 'Nam', '1415 Hẻm ABCD, Cần Thơ'),
(17, 'Nguyễn Thị Lan Anh', '1991-12-17', 'nguyenthilananh@example.com', '0958712346', 'Nữ', '1617 Đường XYZ, Vũng Tàu'),
(18, 'Bùi Văn Hải', '1985-02-08', 'buivanhai@example.com', '0639871245', 'Nam', '1819 Ngách KLMN, Nha Trang'),
(19, 'Hoàng Thị Ngọc', '1998-07-23', 'hoangthingoc@example.com', '0523698741', 'Nữ', '2021 Phố EFGH, Quảng Ninh'),
(20, 'Đặng Văn Thành', '1982-10-18', 'dangvanthanh@example.com', '0325871963', 'Nam', '2223 Ngõ IJKL, Huế');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `O_ID` int(11) NOT NULL,
  `E_ID` int(11) DEFAULT NULL,
  `R_ID` int(11) DEFAULT NULL,
  `S_ID` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `infor` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`O_ID`, `E_ID`, `R_ID`, `S_ID`, `status`, `Date`, `address`, `infor`) VALUES
(1, 1, 1, 1, 'Đang giao hàng', '2024-05-23', 'Từ Sơn - Bắc Ninh', 'Hàng cấm'),
(2, 5, 3, 3, 'Hoàn thành', '2024-05-09', 'PTIT', 'Bút'),
(3, 1, 1, 3, 'Đã hủy', '2024-05-21', 'Từ Sơn - Bắc Ninh', 'Quần'),
(4, 19, 11, 3, 'Đang xử lý', '2024-05-16', '1750 Morton Drive', 'Hàng cấm'),
(5, 3, 8, 20, 'Đang xử lý', '2024-05-30', 'Hồ chí minh', 'hàng nặng'),
(6, 17, 6, 19, 'Hoàn thành', '2024-05-01', 'hà đông - Hà nội', 'chảo'),
(7, 14, 20, 20, 'Đang xử lý', '2024-05-01', 'Từ Sơn - Bắc Ninh', 'Bút'),
(8, 2, 3, 5, 'Đã hủy', '2024-04-30', 'Trung văn', 'nồi'),
(9, 19, 15, 18, 'Hoàn thành', '2024-04-29', 'Học viện an ninh', 'chảo'),
(10, 15, 4, 2, 'Đang giao hàng', '2024-05-07', 'Từ Sơn - Bắc Ninh', 'hàng nặng'),
(11, 1, 3, 6, 'Đang xử lý', '2024-05-11', '123 Đường ABC, Thành phố HCM', 'Chất cấm'),
(12, 2, 8, 4, 'Đang giao hàng', '2024-05-10', '456 Phố XYZ, Hà Nội', 'Nước tinh khiết'),
(13, 3, 5, 10, 'Hoàn thành', '2024-05-09', '789 Ngõ KLM, Đà Nẵng', 'Laptop'),
(14, 4, 9, 7, 'Đang xử lý', '2024-05-08', '1011 Lô 1, Tây Ninh', 'Điện thoại'),
(15, 5, 2, 12, 'Đang giao hàng', '2024-05-07', '1213 Làng Mới, Hải Phòng', 'Quần áo cũ'),
(16, 6, 4, 15, 'Hoàn thành', '2024-05-06', '1415 Hẻm ABCD, Cần Thơ', 'Chuột máy tính'),
(17, 7, 11, 18, 'Đang xử lý', '2024-05-05', '1617 Đường XYZ, Vũng Tàu', 'Bàn phím máy tính'),
(18, 8, 19, 17, 'Đang giao hàng', '2024-05-04', '1819 Ngách KLMN, Nha Trang', 'Đèn học'),
(19, 9, 13, 14, 'Hoàn thành', '2024-05-03', '2021 Phố EFGH, Quảng Ninh', 'Gấu bông'),
(20, 10, 16, 20, 'Đã hủy', '2024-05-02', '2223 Ngõ IJKL, Huế', 'Hoa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `receiver`
--

CREATE TABLE `receiver` (
  `R_ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `receiver`
--

INSERT INTO `receiver` (`R_ID`, `name`, `address`, `email`, `phone`) VALUES
(1, 'Trương Minh L', '2325 Đường LMN, Bình Dương', 'truongminhl@example.com', '0123456789'),
(2, 'Phan Thanh M', '2427 Ngõ KLM, Đồng Tháp', 'phanthanhm@example.com', '0987654321'),
(3, 'Hoàng Thị Nga', '2529 Lô MNOP, Vĩnh Long', 'hoangthingga@example.com', '0369852147'),
(4, 'Nguyễn Văn Thành', '2631 Phố XYZ, Bắc Ninh', 'nguyenvanthanh@example.com', '0912345678'),
(5, 'Lê Thị Phượng', '2733 Làng Mới, Bà Rịa - Vũng Tàu', 'lethiphuong@example.com', '0765432198'),
(6, 'Trần Văn Quân', '2835 Đường ABC, Thái Bình', 'tranvanquan@example.com', '0845612379'),
(7, 'Phạm Thị Lan', '2937 Ngõ DEF, Đắk Lắk', 'phamthilan@example.com', '0958712346'),
(8, 'Hoàng Văn Nam', '3039 Phố XYZ, Quảng Nam', 'hoangvannam@example.com', '0639871245'),
(9, 'Lê Thị Hương', '3141 Làng Mới, Bình Thuận', 'lethihuong@example.com', '0523698741'),
(10, 'Trần Văn Hải', '3243 Lô GHIJ, Thanh Hóa', 'tranvanhai@example.com', '0325871963'),
(11, 'Nguyễn Văn An', '1 Đường ABC, Thành phố HCM', 'nguyenvanan@example.com', '0123456789'),
(12, 'Trần Thị Bình', '2 Phố XYZ, Hà Nội', 'tranthibinh@example.com', '0987654321'),
(13, 'Lê Văn Cường', '3 Ngõ KLM, Đà Nẵng', 'levancuong@example.com', '0369852147'),
(14, 'Phạm Thị Dung', '4 Lô 1, Tây Ninh', 'phamthidung@example.com', '0912345678'),
(15, 'Hoàng Văn Đức', '5 Làng Mới, Hải Phòng', 'hoangvanduc@example.com', '0765432198'),
(16, 'Vũ Thị Hoa', '6 Hẻm ABCD, Cần Thơ', 'vuthihoa@example.com', '0845612379'),
(17, 'Đặng Văn Hùng', '7 Đường XYZ, Vũng Tàu', 'dangvanhung@example.com', '0958712346'),
(18, 'Nguyễn Thị Kim', '8 Ngách KLMN, Nha Trang', 'nguyenthikim@example.com', '0639871245'),
(19, 'Trần Văn Long', '9 Phố EFGH, Quảng Ninh', 'tranvanlong@example.com', '0523698741'),
(20, 'Lê Thị Mơ', '10 Ngõ IJKL, Huế', 'lethimo@example.com', '0325871963');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sender`
--

CREATE TABLE `sender` (
  `S_ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sender`
--

INSERT INTO `sender` (`S_ID`, `name`, `address`, `email`, `phone`) VALUES
(1, 'Trịnh Anh Quân', '123 Đường ABC, Thành phố HCM', 'trinhanhquan@example.com', '0123456789'),
(2, 'Lương Thị Ngọc', '456 Phố XYZ, Hà Nội', 'luongthingoc@example.com', '0987654321'),
(3, 'Đinh Văn Tuấn', '789 Ngõ KLM, Đà Nẵng', 'dinhvantuan@example.com', '0369852147'),
(4, 'Phan Thị Hương', '1011 Lô 1, Tây Ninh', 'phanthihuong@example.com', '0912345678'),
(5, 'Trương Văn Lợi', '1213 Làng Mới, Hải Phòng', 'truongvanloi@example.com', '0765432198'),
(6, 'Lê Thị Thanh', '1415 Hẻm ABCD, Cần Thơ', 'lethithanh@example.com', '0845612379'),
(7, 'Nguyễn Văn Dương', '1617 Đường XYZ, Vũng Tàu', 'nguyenvanduong@example.com', '0958712346'),
(8, 'Bùi Thị Thảo', '1819 Ngách KLMN, Nha Trang', 'buithithao@example.com', '0639871245'),
(9, 'Hoàng Văn Bình', '2021 Phố EFGH, Quảng Ninh', 'hoangvanbinh@example.com', '0523698741'),
(10, 'Đặng Thị Hà', '2223 Ngõ IJKL, Huế', 'dangthiha@example.com', '0325871963'),
(11, 'Phạm Văn Hùng', '2325 Đường LMN, Bình Dương', 'phamvanhung@example.com', '0123456789'),
(12, 'Nguyễn Thị Ngọc', '2427 Ngõ KLM, Đồng Tháp', 'nguyenthingoc@example.com', '0987654321'),
(13, 'Lê Văn Quốc', '2529 Lô MNOP, Vĩnh Long', 'lequan@example.com', '0369852147'),
(14, 'Trần Thị Thu', '2631 Phố XYZ, Bắc Ninh', 'tranthithu@example.com', '0912345678'),
(15, 'Hoàng Văn Toàn', '2733 Làng Mới, Bà Rịa - Vũng Tàu', 'hoangvantoan@example.com', '0765432198'),
(16, 'Nguyễn Thị Lan', '2835 Đường ABC, Thái Bình', 'nguyenthilan@example.com', '0845612379'),
(17, 'Phan Văn Hải', '2937 Ngõ DEF, Đắk Lắk', 'phanvanhai@example.com', '0958712346'),
(18, 'Bùi Thị Hạnh', '3039 Phố XYZ, Quảng Nam', 'buithihanh@example.com', '0639871245'),
(19, 'Vũ Thị Kim', '3141 Làng Mới, Bình Thuận', 'vuthikim@example.com', '0523698741'),
(20, 'Lê Văn Huy', '3243 Lô GHIJ, Thanh Hóa', 'levanhuy@example.com', '0325871963');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`E_ID`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`O_ID`),
  ADD KEY `E_ID` (`E_ID`),
  ADD KEY `R_ID` (`R_ID`),
  ADD KEY `S_ID` (`S_ID`);

--
-- Chỉ mục cho bảng `receiver`
--
ALTER TABLE `receiver`
  ADD PRIMARY KEY (`R_ID`);

--
-- Chỉ mục cho bảng `sender`
--
ALTER TABLE `sender`
  ADD PRIMARY KEY (`S_ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `employees`
--
ALTER TABLE `employees`
  MODIFY `E_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `O_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `receiver`
--
ALTER TABLE `receiver`
  MODIFY `R_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `sender`
--
ALTER TABLE `sender`
  MODIFY `S_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`E_ID`) REFERENCES `employees` (`E_ID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`R_ID`) REFERENCES `receiver` (`R_ID`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`S_ID`) REFERENCES `sender` (`S_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


CREATE TABLE `qlvc`.`users` (
  `U_ID` INT NOT NULL AUTO_INCREMENT , 
  `username` VARCHAR(100) NOT NULL , 
  `password` VARCHAR(100) NOT NULL , 
  `auth` INT NOT NULL DEFAULT '1' , PRIMARY KEY (`U_ID`)
) ENGINE = InnoDB;

INSERT INTO `users` (`U_ID`, `username`, `password`, `auth`) VALUES 
  (NULL, 'admin', 'admin', '2'), 
  (NULL, 'user', 'user', '1');