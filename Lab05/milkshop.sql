-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2021 at 12:52 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `milkshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `chi-tiet-don-hang`
--

CREATE TABLE `chi-tiet-don-hang` (
  `id` int(11) NOT NULL,
  `don_hang` int(11) NOT NULL,
  `san_pham` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `gia_mua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chi-tiet-don-hang`
--

INSERT INTO `chi-tiet-don-hang` (`id`, `don_hang`, `san_pham`, `so_luong`, `gia_mua`) VALUES
(14, 11, 12, 1, 11000),
(15, 11, 15, 1, 120000),
(16, 12, 13, 10, 7500),
(17, 12, 15, 1, 120000),
(20, 13, 12, 1, 11000);

-- --------------------------------------------------------

--
-- Table structure for table `don-hang`
--

CREATE TABLE `don-hang` (
  `id` int(11) NOT NULL,
  `khach_hang` int(11) NOT NULL,
  `ngay_mua` datetime NOT NULL DEFAULT current_timestamp(),
  `tong_tien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `don-hang`
--

INSERT INTO `don-hang` (`id`, `khach_hang`, `ngay_mua`, `tong_tien`) VALUES
(11, 7, '2021-10-23 15:01:49', 131000),
(12, 7, '2021-10-23 15:32:42', 195000),
(13, 1, '2021-10-23 17:44:51', 11000);

-- --------------------------------------------------------

--
-- Table structure for table `hang-sua`
--

CREATE TABLE `hang-sua` (
  `id` int(11) NOT NULL,
  `sku` varchar(10) NOT NULL,
  `ten_hang` varchar(100) NOT NULL,
  `dia_chi` text NOT NULL,
  `dien_thoai` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hang-sua`
--

INSERT INTO `hang-sua` (`id`, `sku`, `ten_hang`, `dia_chi`, `dien_thoai`, `email`) VALUES
(1, 'VNM', 'Vinamilk', '123 Nguyễn Du - Quận 1 - TP.HCM', '08794561', 'vinamilk@vnm.com'),
(2, 'NTF', 'Nutifood', 'Khu công nghiệp Sóng Thần Bình Dương', '07895632', 'nutifood@ntf.com'),
(3, 'AB', 'Abbott', 'Công ty nhập khẩu Việt Nam', '08741258', 'abbott@ab.com'),
(4, 'DS', 'Daisy', 'Khu công nghiệp Sóng Thần Bình Dương', '05789321', 'daisy@ds.com'),
(5, 'DL', 'Dutch Lady', 'Khu công nghiệp Biên Hòa - Đồng Nai', '07826451', 'dutchlady@dl.com'),
(6, 'DM', 'Dumex', 'Khu công nghiệp Sóng Thần Bình Dương', '06258943', 'dumex@dm.com'),
(7, 'MJ', 'Mead Johnson', 'Công ty nhập khẩu Việt Nam', '08741258', 'meadjohn@mj.com'),
(9, 'TH', 'TH True Milk', 'Khu công nghiệp Sóng Thần Bình Dương', '0123123123', 'truemilk@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id` int(11) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `gioi_tinh` varchar(10) NOT NULL,
  `dia_chi` text NOT NULL,
  `dien_thoai` varchar(11) NOT NULL,
  `ten_dang_nhap` varchar(50) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `kieu` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`id`, `ten`, `gioi_tinh`, `dia_chi`, `dien_thoai`, `ten_dang_nhap`, `mat_khau`, `email`, `kieu`) VALUES
(1, 'Nguyễn Trọng Hiếu', 'Nam', '21/1B Trần Khánh Dư, F8, Đà Lạt, Lâm Đồng', '0374408253', 'tronghieu', 'tronghieu', 'hieuntctk42@gmail.com', 'admin'),
(2, 'Nguyễn Thị Hà', 'Nữ', '1B Phù Đổng Thiên Vương, F8, Đà Lạt, Lâm Đồng', '0123456789', 'thiha', 'thiha', 'hantctk42@gmail.com', 'admin'),
(4, 'Nguyễn Trọng Hiếu', 'Nam', '21/1B Trần Khánh Dư, P8, Đà Lạt, Lâm Đồng', '0374408253', 'tronghieu', 'tronghieu', 'hieuntctk42@gmail.com', 'user'),
(5, 'Customer 01', 'Nam', '1B Phù Đổng Thiên Vương, P8, TP Đà Lạt, Lâm Đồng', '0123321456', 'customer01', 'customer01', 'customer01@gmail.com', 'user'),
(6, 'Customer 02', 'Nữ', '1B Phù Đổng Thiên Vương, P8, Đà Lạt', '0411242515', 'customer02', 'customer02', 'customer02@gmail.com', 'user'),
(7, 'Customer 03', 'Nam', '2B Trần Khánh Dư, P8, Thành phố Đà Lạt', '0131425151', 'customer03', 'customer03', 'customer03@gmail.com', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `loai-sua`
--

CREATE TABLE `loai-sua` (
  `id` int(11) NOT NULL,
  `ten_loai` varchar(100) NOT NULL,
  `mo_ta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loai-sua`
--

INSERT INTO `loai-sua` (`id`, `ten_loai`, `mo_ta`) VALUES
(1, 'Sữa bột', 'Mô tả sữa bột haha'),
(2, 'Sữa chua', 'Sữa được lên men có vị chua'),
(3, 'Sữa có đường', 'Như tên gọi'),
(4, 'Sữa không đường', 'Như tên gọi'),
(6, 'Sữa tươi', 'Sữa tươi từ bò'),
(7, 'Sữa đặc', 'Sữa đặc nha');

-- --------------------------------------------------------

--
-- Table structure for table `san-pham-sua`
--

CREATE TABLE `san-pham-sua` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `hang_sua` int(11) NOT NULL,
  `loai_sua` int(11) NOT NULL,
  `trong_luong` float NOT NULL,
  `don_gia` int(11) NOT NULL,
  `thanh_phan` text NOT NULL,
  `loi_ich` text NOT NULL,
  `ten_hinh_anh_goc` varchar(255) NOT NULL,
  `ten_hinh_anh_server` varchar(255) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `sku` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `san-pham-sua`
--

INSERT INTO `san-pham-sua` (`id`, `ten`, `hang_sua`, `loai_sua`, `trong_luong`, `don_gia`, `thanh_phan`, `loi_ich`, `ten_hinh_anh_goc`, `ten_hinh_anh_server`, `unit`, `sku`) VALUES
(7, 'Sữa tươi tiệt trùng', 9, 6, 1000, 38000, 'Thành phần tự nhiên, nhiều dưỡng chất Đóng gói tiện lợi, dễ sử dụng Sản xuất theo dây chuyền công nghệ hiện đại Tốt cho sức khỏe người sử dụng\r\nSữa Tươi Tiệt Trùng Nguyên Chất TH True Milk (1L) sử dụng hoàn toàn sữa tươi sạch nguyên chất của trang trại TH.\r\nĐạt tiêu chuẩn về hệ thống quản lý vệ sinh an toàn thực phẩm ISO 22000:2005 do tổ chức quốc tế BUREAU- VERITAS cấp.\r\nĐạt Chứng Nhận Sản Phẩm Phù Hợp Quy Chuẩn Kỹ Thuật do Viện kiểm nghiệm an toàn vệ sinh thực phẩm quốc gia- Bộ Y Tế, số 06/GCN-VKNQG cấp.\r\nGiấy chứng nhận tiêu chuẩn sản phẩm số: 15805/2010/YT-CNTC.\r\nHoàn toàn không sử dụng hương liệu. Được làm từ 100% sữa bò tươi cho bạn tận hưởng trọn vẹn tinh túy thiên nhiên trong từng giọt sữa. \r\nHãy cảm nhận sự khác biệt với những giọt sữa tươi nguyên chất đến từ trang trại bò sữa đẳng cấp quốc tế.\r\nGiá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....', 'Tốt cho sức khỏe', 'thmilk.jpg', 'admin/uploads/617351554bf3fthmilk.jpg', 'ml', 'TH001'),
(8, 'Sữa tươi không đường', 5, 4, 220, 15000, 'Sữa 98% (nước, sữa tươi, bột sữa gầy, chất béo sữa), dầu thực vật, lactose, chất nhũ hóa (471), chất ổn định (407)', 'Sữa bịch tiệt trùng Cô Gái Hà Lan với can-xi, phốt pho, vitamin B2 và vitamin B12 giúp giải phóng năng lượng từ các dưỡng chất trong sữa vào cơ thể. Sữa còn chứa hàm lượng đạm sữa chất lượng cao giúp xây dựng hệ cơ và can-xi giúp xương chắc khỏe. 3 bịch sữa tiệt trùng hiệu Cô Gái Hà Lan mỗi ngày giúp gia đình bạn luôn khỏe mạnh và năng động', 'tiettrungkhongduong.jpg', 'admin/uploads/61735128ba914tiettrungkhongduong.jpg', 'ml', 'DU001'),
(9, 'Sữa tươi tiệt trùng (bịch)', 9, 6, 220, 7500, 'Cung cấp đầy đủ vitamin và các chất dinh dưỡng Đảm bảo an toàn vệ sinh thực phẩm Sản xuất theo quy trình hiện đại\r\nThùng Sữa Tươi Tiệt Trùng Nguyên Chất TH True Milk (220ml x 48 Bịch)', 'Tăng cường mật độ xương và giúp răng chắc khỏe: Sữa là một nguồn giàu canxi. Khoáng chất này rất cần thiết để giúp cho xương và răng khỏe mạnh. Trẻ em rất thích đồ ngọt, do đó, sâu răng là một vấn đề phổ biến. Sữa sẽ là giải pháp giúp giải quyết vấn đề đó.', 'thbich.jpg', 'admin/uploads/617352082be07thbich.jpg', 'ml', 'TH002'),
(10, 'Sữa tươi socola', 5, 3, 220, 6500, 'Sữa 98% (nước, sữa tươi, bột sữa gầy, chất béo sữa), dầu thực vật, lactose, chất nhũ hóa (471), chất ổn định (407)', 'Là nguồn bổ sung Protein, Canxi và các dưỡng chất cần thiết khác', 'suatuoisocola.jpg', 'admin/uploads/61735281c3811suatuoisocola.jpg', 'ml', 'DU002'),
(11, 'Sữa tươi có đường', 5, 3, 100, 7000, 'NĂNG LƯỢNG\r\n79 kcal\r\nCHẤT BÉO\r\n3.8 g\r\nCHẤT BÉO BÃO HÒA\r\n2.3 g\r\nCARBONHYDRAT\r\n8.2 g\r\nĐƯỜNG\r\n7.2 g\r\nCHẤT ĐẠM\r\n3.0 g', 'Ngon bổ khỏe', 'dutchladycoduong.png', 'admin/uploads/6173531684320dutchladycoduong.png', 'ml', 'DU003'),
(12, 'Sữa bột dinh dưỡng ngũ cốc', 5, 1, 25, 11000, 'NĂNG LƯỢNG\r\n98 kcal (8%)*\r\nCHẤT BÉO\r\n1.8 g (5%)*\r\nCHẤT BÉO BÃO HÒA\r\n1.7 g\r\nCARBONHYDRAT\r\n17.4 g (9%)*\r\nĐƯỜNG\r\n10 g\r\nCHẤT ĐẠM\r\n3 g (12%)*', '- Sữa BỘT dinh dưỡng ngũ cốc đảm bảo bữa sáng đủ chất cho gia đình\r\n\r\n+ Dinh dưỡng tương đương 2 ly sữa, thêm 10 vitamin, 4 khoáng chất.\r\n\r\n+ Được sản xuất theo Tiêu chuẩn Hà Lan nghiêm ngặt, chuẩn quốc tế\r\n+ Được nhập khẩu 100% từ nước ngoài', 'suabotductch.png', 'admin/uploads/6173538c4b554suabotductch.png', 'gram', 'DU004'),
(13, 'Sữa bịch có đường', 5, 3, 220, 7500, 'NĂNG LƯỢNG\r\n74.0 kcal\r\nCARBONHYDRAT\r\n8.3 g\r\nCHẤT BÉO\r\n3.3 g\r\nCHẤT ĐẠM\r\n2.8 g', 'Tốt cho mọi nhà', 'bichcoduong.png', 'admin/uploads/617353e9898e7bichcoduong.png', 'ml', 'DU005'),
(14, 'Sữa đặc có đường', 5, 7, 380, 50000, 'NĂNG LƯỢNG\r\n124 kcal\r\nCHẤT BÉO\r\n3.2 g\r\nCHẤT BÉO BÃO HÒA\r\n1.7 g\r\nCARBONHYDRAT\r\n22.3 g\r\nĐƯỜNG\r\n22 g\r\nCHẤT ĐẠM\r\n2.8 g', 'Sữa đặc có đường Dutch Lady chứa nhiều vitamin B2, B12, Canxi và nhiều chất đạm hơn sẽ mang đến cho bạn và gia đình những món ăn thơm béo, vị hài hòa từ các món mặn đến món ngọt. Đặc biệt sản phẩm trang bị thêm nắp giật dễ dàng sử dụng.', 'suadac.png', 'admin/uploads/6173544a07edasuadac.png', 'gram', 'DU006'),
(15, 'Sữa đặc có đường cao cấp', 5, 7, 380, 120000, 'NĂNG LƯỢNG\r\n326.33 kcal\r\nCHẤT BÉO\r\n8.05 g\r\nCHẤT BÉO BÃO HOÀ\r\n5.40 g\r\nCARBONHYDRAT\r\n56.50 g\r\nĐƯỜNG\r\n54.20 g\r\nCHẤT ĐẠM\r\n6.97 g', 'Sữa đặc có đường nguyên kem Dutch Lady Cao Cấp có hàm lượng kem sữa cao, chứa nhiều vitamin B2, B12, Canxi và nhiều chất đạm hơn sẽ mang đến cho bạn và gia đình những món ăn thơm béo, vị hài hòa từ các món mặn đến món ngọt.', 'lon_gold_380g.png', 'admin/uploads/6173568dcd6edlon_gold_380g.png', 'gram', 'DH007');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chi-tiet-don-hang`
--
ALTER TABLE `chi-tiet-don-hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ctdonghang_sanpham` (`don_hang`),
  ADD KEY `fk_ctdonghang_sanpham1` (`san_pham`);

--
-- Indexes for table `don-hang`
--
ALTER TABLE `don-hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_donhang_khachhang` (`khach_hang`);

--
-- Indexes for table `hang-sua`
--
ALTER TABLE `hang-sua`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loai-sua`
--
ALTER TABLE `loai-sua`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten_loai` (`ten_loai`);

--
-- Indexes for table `san-pham-sua`
--
ALTER TABLE `san-pham-sua`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sua_loaisua` (`loai_sua`),
  ADD KEY `fk_sua_hangsua` (`hang_sua`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chi-tiet-don-hang`
--
ALTER TABLE `chi-tiet-don-hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `don-hang`
--
ALTER TABLE `don-hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `hang-sua`
--
ALTER TABLE `hang-sua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `loai-sua`
--
ALTER TABLE `loai-sua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `san-pham-sua`
--
ALTER TABLE `san-pham-sua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chi-tiet-don-hang`
--
ALTER TABLE `chi-tiet-don-hang`
  ADD CONSTRAINT `fk_ctdonghang_sanpham1` FOREIGN KEY (`san_pham`) REFERENCES `san-pham-sua` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ctdonhang_donhang` FOREIGN KEY (`don_hang`) REFERENCES `don-hang` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `don-hang`
--
ALTER TABLE `don-hang`
  ADD CONSTRAINT `fk_donhang_khachhang` FOREIGN KEY (`khach_hang`) REFERENCES `khach_hang` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `san-pham-sua`
--
ALTER TABLE `san-pham-sua`
  ADD CONSTRAINT `fk_sua_hangsua` FOREIGN KEY (`hang_sua`) REFERENCES `hang-sua` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sua_loaisua` FOREIGN KEY (`loai_sua`) REFERENCES `loai-sua` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
