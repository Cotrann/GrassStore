-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2022 at 06:38 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cosmetics`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `parent_id`, `description`, `content`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Đồng Hồ', 0, 'Chúng ta cần phải đi ngang với thời gian chứ không phải để thời gian đi ngang qua.', '<p>Thời gian rất công bằng. Một ngày ai cũng có 24 giờ để sống nhưng cách sử dụng của mỗi người lại khác nhau. Người biết làm chủ thời gian là người đi ngang với thời gian. Người trì hoãn, lãng phí, do dự là người để thời gian đi ngang qua.</p>', 1, '2022-07-02 22:27:31', '2022-07-02 22:27:31'),
(2, 'Đồng Hồ Nữ', 1, 'Đồng hồ nữ sang trọng, trẻ trung, đa dạng', '<p>Một chiếc đồng hồ trông có vẻ bình thường thôi nhưng khi được kết hợp với những trang phục thì đó lại là một điểm nhấn cho bộ trang phục. Vừa có công dụng giúp bạn quản lý thời gian mà còn toát lên một phong cách rất riêng cho bản thân.</p>', 1, '2022-07-02 22:29:36', '2022-07-02 22:29:36'),
(3, 'Đồng Hồ Nam', 1, 'Đồng hồ là một món phụ kiện tuyệt vời dành cho phái mạnh.', '<p>Đồng hồ là một phụ kiện làm cho người đối diện cảm thấy bạn là một người tinh tế, biết quý trọng thời gian. Hơn hết, đồng hồ còn thể hiện đẳng cấp của mỗi người sơ hữu nó.</p>', 1, '2022-07-06 06:37:54', '2022-07-06 06:46:05'),
(4, 'Trang Sức', 0, 'Không giống như quần áo hay giày dép, túi xách, trang sức thu hút tình yêu của chúng ta theo kiểu khác. Bền bỉ với thời gian, món phụ kiện tinh xảo này có thể truyền từ thế hệ này đến thế hệ khác', '<p>Đồ trang sức thường được xem như một phụ kiện thời trang để hoàn thiện một bộ trang phục. Đối với nhiều người, một cái nhìn sẽ không hoàn chỉnh cho đến khi các phụ kiện phù hợp được thêm vào. Ví dụ, một kiểu dáng \"cổ điển\" cần có ngọc trai và kim cương để hoàn thiện.</p><p>Đồ trang sức đã đóng một vai trò quan trọng trong cuộc sống của con người trong hàng ngàn năm. Chúng ta học được từ lịch sử rằng các nền văn minh cổ đại đánh giá cao đồ trang sức và nó được sử dụng để làm nổi bật vẻ đẹp tự nhiên của người đeo nó. Các mảnh khác nhau được đeo để tượng trưng cho các thông điệp khác nhau như an ninh, trí tuệ, sang trọng và thịnh vượng.</p><p>Nhiều phụ nữ thích đeo đồ trang sức như một biểu tượng của nữ tính hoặc để thể hiện địa vị xã hội. Đồ trang sức cũng có thể làm cho một người phụ nữ cảm thấy tự tin và xinh đẹp.</p>', 1, '2022-07-06 07:29:47', '2022-07-06 07:29:47'),
(5, 'Dây Chuyền', 4, 'Dây chuyền được xem như một vật sang trọng và chỉ những người cao quý mới được đeo. Theo quan niệm xưa vua chúa mới được đeo dây chuyền. Nhưng hiện nay, ngày càng nhiều người đeo dây chuyền bạc hơn để điểm tô cho nhan sắc của mình.', '<p>Dây chuyền được xem như một vật sang trọng và chỉ những người cao quý mới được đeo. Theo quan niệm xưa vua chúa mới được đeo dây chuyền. Nhưng hiện nay, ngày càng nhiều người đeo dây chuyền bạc hơn để điểm tô cho nhan sắc của mình.&nbsp;</p>', 1, '2022-07-06 07:35:20', '2022-07-06 07:35:20'),
(6, 'Vòng tay', 4, 'Trang sức vòng tay đẹp, tinh tế đến từ nhiều thương hiệu uy tín khác nhau', '<p>Trang sức vòng tay đẹp, tinh tế đến từ nhiều thương hiệu uy tín khác nhau</p>', 1, '2022-07-06 07:39:15', '2022-07-06 07:39:15');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(12, '2022_06_21_173148_create_menus_table', 1),
(13, '2022_06_27_155636_create_products_table', 1),
(14, '2022_07_01_111710_create_sliders_table', 1),
(15, '2022_07_12_105552_add_size_to_product_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `price_sale` int(11) DEFAULT NULL,
  `menu_id` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `thumb` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `content`, `price`, `price_sale`, `menu_id`, `active`, `thumb`, `created_at`, `updated_at`, `size`) VALUES
(1, 'ICONIC LINK MINT', 'Iconic Link Mint nổi bật với mặt số màu xanh hồ trăn.', '<p>Lấy cảm hứng từ phong cách Bãi biển những năm 80, kiệt tác cổ điển hiện đại này tạo phong cách tươi mới cho vẻ ngoài của bạn. Được chế tác bằng thép không gỉ, có sẵn lớp mạ bạc. Hãy để chiếc đồng hồ này tô điểm cho phong cách hàng ngày của bạn khi bạn cần một thứ màu sắc tinh tế.<br>Iconic Link Mint không chỉ là một chiếc đồng hồ sang trọng với mặt đồng hồ màu xanh lá cây tươi mới. Thay vào đó, đó là một cái gật đầu với Bãi biển Miami những năm 80 và phong cách đã tạo nên vô số sự trở lại. Với lớp hoàn thiện màu bạc, dây đeo đồng hồ bằng thép không gỉ tương phản với mặt số bán mờ để tạo ra một viên ngọc quý thực sự cho cổ tay của bạn.</p>', 6360000, 5088000, 2, 1, '/storage/upload/2022/07/03/DW00100537_Iconic_Li-8GGwC8Nf.png', '2022-07-02 22:32:26', '2022-07-02 22:32:43', ''),
(2, 'ICONIC LINK CERAMIC', 'Iconic Link Ceramic là mẫu đồng hồ đầu tiên được hoàn thiện từ chất liệu gốm sứ cao cấp của chúng tôi.', '<p>Chiếc đồng hồ với những điểm nhấn bạc kim trên nền gốm đen sang trọng và thu hút. Sự bổ sung mới nhất của bộ sưu tập Iconic Link nổi bật với thiết kế cá tính đầy ấn tượng. Đây là mẫu đồng hồ màu đen mà ai trong chúng ta cũng cần phải có. Vui lòng lưu ý rằng dưới những tác động cực mạnh có thể dẫn đến hiện tượng rạn nứt hoặc vỡ gốm tuy rằng hiện tượng này không phổ biến và rất khó xảy ra.</p>', 7950000, NULL, 2, 1, '/storage/upload/2022/07/03/DW00100415_Iconic_Li-WYiLBFVp.png', '2022-07-02 22:34:17', '2022-07-02 22:34:17', ''),
(6, 'ICONIC LINK ARCTIC', 'The Iconic Link Arctic với mặt đồng hồ xanh dương sẫm. Màu sắc của bầu trời mênh mông và mặt biển băng điềm đạm tĩnh lặng. Kết hợp hoàn hảo cùng sắc bạc cho tổng thể hoàn chỉnh. Một điểm nhấn mang tính biểu tượng cho phong cách của bạn.', '<figure class=\"table\"><table><tbody><tr><td>SKU</td><td>DW00100457</td></tr><tr><td>Case thickness</td><td>8mm</td></tr><tr><td>Dial color</td><td>Blue</td></tr><tr><td>Movement</td><td>Động cơ chuyển động Quartz</td></tr><tr><td>Material</td><td>Thép không gỉ 316L đã tinh chế và đánh bóng</td></tr><tr><td>Strap width</td><td>14mm</td></tr><tr><td>Adjustable length</td><td>130-187mm</td></tr><tr><td>Strap</td><td>Dây Link</td></tr><tr><td>Strap colour</td><td>Bạc</td></tr><tr><td>Interchangeable straps</td><td>No</td></tr><tr><td>Water resistant</td><td>Tối thiểu 3ATM ( chống nước mưa)</td></tr></tbody></table></figure>', 6360000, NULL, 2, 1, '/storage/upload/2022/07/06/DW00100457_Iconic_Li-zzNpjWHV.png\r\n/storage/upload/2022/07/06/DW00100458_Iconic_Li-3XJOTgbm.png\r\n/storage/upload/2022/07/06/DW00100457_Iconic_Li-9BZiw3-a.png', '2022-07-06 06:25:09', '2022-07-06 06:25:09', ''),
(7, 'PETITE YORK', 'Thiết kế tinh tế', '<p>Với những đặc điểm cổ điển như da Ý dập nổi croc màu nâu đậm trong dây đeo York và mặt số màu trắng vỏ trứng gọn gàng, chiếc đồng hồ này sẽ đứng vững trước thử thách của thời gian.</p>', 4530000, NULL, 2, 1, '/storage/upload/2022/07/06/dw_petite_32rg_close-T6gLEvh1.png\r\n/storage/upload/2022/07/06/box-classic-petite-y-b14UQaeA.png\r\n/storage/upload/2022/07/06/petite-32-york-rg_1-MTCnNle_.png\r\n/storage/upload/2022/07/06/dw-petite-york-rg-wh-t7s11VN9.png', '2022-07-06 06:30:57', '2022-07-06 06:30:57', ''),
(8, 'ICONIC LINK AUTOMATIC', 'The Iconic Link Automatic là mẫu đồng hồ với cải tiến tối ưu nhất của chúng tôi cho đến nay với bộ chuyển động tự lên dây cót chuyển động trên cổ tay của bạn. Mặt đồng hồ dạ quang có kim và vạch chỉ phút phát sáng trong bóng tối, với màn hình hiển thị ngày trên mặt đồng hồ và có khả năng chống nước tới 100m. Tinh thể sapphire chống xước ở mặt trước cùng mặt sau hiển thị rõ nét động cơ máy tự động bên trong, sự lựa chọn đồng hồ tối ưu nhất dành cho bạn.', '<ul><li>SKU: DW00100482</li><li>Case thickness: 11,5mm</li><li>Dial color: Đen</li><li>Movement: Động cơ máy tự động Nhật Bản</li><li>Material: Thép không gỉ 316L đã tinh chế và đánh bóng</li><li>Strap width: 20mm</li><li>Adjustable length: 142-208mm</li><li>Strap: Dây Link</li><li>Strap colour: Bạc</li><li>Interchangeable straps: No</li><li>Water resistant: Chống nước tới 10 ATM</li></ul>', 10460000, NULL, 3, 1, '/storage/upload/2022/07/06/DW00100482_Iconic_Li-x7_-9ONy.png\r\n/storage/upload/2022/07/06/DW00100482_Iconic_Li-qNgYloE5.png\r\n/storage/upload/2022/07/06/DW00100482_Iconic_Li-5sIkHIbW.png\r\n/storage/upload/2022/07/06/DW00100482_Iconic_Li-gTM2-XaQ.png', '2022-07-06 06:45:45', '2022-07-06 06:45:45', ''),
(9, 'PETITE ASHFIELD', 'Vượt thời gian bước vào mùa giải mới với Petite Ashfield. Chiếc đồng hồ siêu mỏng này có dây đeo lưới màu đen mờ kiểu dáng đẹp và mặt số màu đen hiện đại. Có sẵn với các chi tiết bằng vàng hồng hoặc bạc.\r\nDây đai của bộ sưu tập Classic 36 không thể hoán đổi cho nhau với Petite 36', '<ul><li>SKU: DW00100307 ·</li><li>Độ dày vỏ: 6mm</li><li>Màu mặt số: Đen</li><li>Phong trào: Động cơ chuyển động Quartz</li><li>Vật liệu: Thép không gỉ 316L đã tinh chế và đánh bóng</li><li>Chiều rộng dây đeo: 16mm</li><li>Đai: Mắt lưới</li><li>Màu dây đeo: Đen</li><li>Dây đai có thể hoán đổi cho nhau: Có</li><li>Chống nước: Tối thiểu 3ATM ( chống nước mưa)</li></ul>', 5220000, NULL, 3, 1, '/storage/upload/2022/07/06/petite_ashfield_rg_3-suksgRU7.png\r\n/storage/upload/2022/07/06/dw00100307_petite_as-WISt8Twc.png\r\n/storage/upload/2022/07/06/dw_petite_b32rg_clos-pS4loMUR.png\r\n/storage/upload/2022/07/06/dw00100307_classic_p-cYUwFAlt.png', '2022-07-06 06:51:45', '2022-07-06 06:51:45', ''),
(10, 'CLASSIC READING', 'Classic Reading có dây đeo bằng da dập nổi croc màu đen, mặt số màu đen và vỏ siêu mỏng 6mm. Cho dù bạn đang tham dự một sự kiện trang trọng, chơi quần vợt hay tận hưởng một ngày nắng đẹp tại câu lạc bộ đồng quê, chiếc đồng hồ này là một lựa chọn tuyệt vời và sẽ bổ sung cho mọi trang phục của bạn.', '<ul><li>SKU: DW00100129&nbsp;</li><li>Độ dày vỏ: 6mm</li><li>Màu mặt số: Đen</li><li>Phong trào: Động cơ chuyển động Quartz</li><li>Vật liệu: Thép không gỉ mạ hai lớp (316L)</li><li>Chiều rộng dây đeo: 20mm</li><li>Chiều dài có thể điều chỉnh: 165-215mm</li><li>Đai: Dây da</li><li>Màu dây đeo: Đen</li><li>Dây đai có thể hoán đổi cho nhau: Có</li><li>Chống nước: Tối thiểu 3ATM ( chống nước mưa)</li></ul>', 6360000, NULL, 3, 1, '/storage/upload/2022/07/06/box-classic-black-re-rT7q98sN.png\r\n/storage/upload/2022/07/06/clbl40rg02_5-lLtSXQoY.png\r\n/storage/upload/2022/07/06/classic_reading_rg_4-ddbnBR9q.png\r\n/storage/upload/2022/07/06/dw-classic-black-rea-fgq8X_-I.png', '2022-07-06 06:54:35', '2022-07-06 06:54:35', ''),
(11, 'PETITE AMBER', 'The Petite Amber sở hữu một sắc nâu ấm áp nổi bật với thiết kế và màu sắc mới lạ vô cùng tinh tế. Sự độc đáo và ấn tượng với tone màu hoàn toàn mới kết hợp với màu vàng hồng thanh lịch chắc chắn sẽ là điểm nhấn tuyệt vời tôn vinh phong cách của bạn.', '<ul><li>SKU: DW00100478&nbsp;</li><li>Độ dày vỏ: 6mm</li><li>Màu mặt số: Nâu</li><li>Phong trào: Động cơ chuyển động Quartz</li><li>Vật liệu: Thép không gỉ mạ hai lớp (316L)</li><li>Chiều rộng dây đeo: 16mm</li><li>Chiều dài có thể điều chỉnh: 150-205mm</li><li>Đai: Mắt lưới</li><li>Màu dây đeo: Vàng hồng</li><li>Dây đai có thể hoán đổi cho nhau: Có</li><li>Chống nước: Tối thiểu 3ATM ( chống nước mưa)</li></ul>', 5670000, NULL, 3, 1, '/storage/upload/2022/07/06/DW00100471_Petite_Un-TTsbtYDv.png\r\n/storage/upload/2022/07/06/DW00100478_Petite_Am-Qhae3IrH.png\r\n/storage/upload/2022/07/06/DW00100477_Petite_Am-hsMh3CdV.png\r\n/storage/upload/2022/07/06/DW00100478_Petite_Am-wPd6d3X9.png', '2022-07-06 06:57:08', '2022-07-06 06:57:08', ''),
(12, 'PETITE STERLING', 'Petite Sterling 36 với mặt số màu đen là sự kết hợp đặc biệt giữa phong cách và tính cách. Đó là một tuyên bố thiết kế thực sự và là chiếc đồng hồ hoàn hảo cho bất kỳ dịp nào.\r\nDây đai của bộ sưu tập Classic 36 không thể hoán đổi cho nhau với Petite 36.', '<ul><li>SKU: DW00100304 ·</li><li>Độ dày vỏ: 6mm</li><li>Màu mặt số: Đen</li><li>Phong trào: Động cơ chuyển động Quartz</li><li>Vật liệu: Thép không gỉ 316L đã tinh chế và đánh bóng</li><li>Chiều rộng dây đeo: 16mm</li><li>Đai: Mắt lưới</li><li>Màu dây đeo: Bạc</li><li>Dây đai có thể hoán đổi cho nhau: Có</li><li>Chống nước: Tối thiểu 3ATM ( chống nước mưa)</li></ul>', 5220000, NULL, 3, 1, '/storage/upload/2022/07/06/DW00100468_Petite_Un-HRQbG8OG.png\r\n/storage/upload/2022/07/06/dw00100304_petite_st-ZpGiXZ3E.png\r\n/storage/upload/2022/07/06/dw_petite_b32s_close-phY6ObxG.png\r\n/storage/upload/2022/07/06/dw00100304_classic_p-tg07icrr.png', '2022-07-06 07:25:20', '2022-07-06 07:25:20', ''),
(13, 'PETITE MELROSE', 'Petite Melrose 36 có mặt số màu trắng vỏ trứng và dây đeo lưới vàng hồng sang trọng không thể phủ nhận. Chiếc đồng hồ này nâng tầm trang phục hàng ngày, tâm trạng và tinh thần của bạn.\r\nDây đai của bộ sưu tập Classic 36 không thể hoán đổi cho nhau với Petite 36.', '<ul><li>SKU: DW00100305 ·</li><li>Độ dày vỏ: 6mm</li><li>Màu mặt số: Trắng sữa</li><li>Phong trào: Động cơ chuyển động Quartz</li><li>Vật liệu: Thép không gỉ mạ hai lớp (316L)</li><li>Chiều rộng dây đeo: 16mm</li><li>Đai: Mắt lưới</li><li>Màu dây đeo: Vàng hồng</li><li>Dây đai có thể hoán đổi cho nhau: Có</li><li>Chống nước: Tối thiểu 3ATM ( chống nước mưa)</li></ul>', 5220000, NULL, 3, 1, '/storage/upload/2022/07/06/dw00100305_petite_me-4bn0V-NJ.png\r\n/storage/upload/2022/07/06/DW00100471_Petite_Un-Opa1MmRf.png\r\n/storage/upload/2022/07/06/dw00100305_petite_me-_t615x48.png\r\n/storage/upload/2022/07/06/dw00100305_classic_p-cgoXjD-S.png', '2022-07-06 07:27:26', '2022-07-06 07:41:02', ''),
(14, 'ASPIRATION NECKLACE', 'Dây Chuyền Aspiration là lời ngợi ca chân thành vẻ đẹp thanh lịch vĩnh cửu. Được thiết kế để phối với Khuyên Tai Aspiration tinh tế, chiếc dây chuyền này là một món trang sức không thể thiếu hàng ngày. Phần thân được làm từ gốm, với móc cài bằng inox và mạ vàng hồng được khắc lên mình logo đặc trưng của chúng tôi.\r\nDây chuyền chỉ có một kích thước, nhưng có thể dùng các chốt điều chỉnh để căn chỉnh chiều dài từ 45cm đến 49cm.', '<ul><li>SKU: DW00400156 ·</li><li>Màu: Đen</li><li>Chiều dài dây chuyền: 45-49 cm</li><li>Vật liệu: Thép không gỉ (316L) với sắc vàng hồng và hoạ tiết gốm sứ</li></ul>', 3400000, 2720000, 5, 1, '/storage/upload/2022/07/07/dw00400156_aspiratio-gcmw7e7Z.png\r\n/storage/upload/2022/07/07/dw00400156_aspiratio-NLS21TU-.png\r\n/storage/upload/2022/07/07/aspiration_necklace_-dM66_jbw.png\r\n/storage/upload/2022/07/07/dw00400156_aspiratio-pKgaLLuH.png', '2022-07-07 08:10:04', '2022-07-07 11:40:48', ''),
(15, 'ELEVATION NECKLACE', 'Được lấy cảm hứng từ những khối hình học mang hơi hướng của sự hiện đại trên một sợi dây mảnh tạo sự liên kết đồng bồ với nhẫn Elevation. Đây chắc chắn sẽ là món phụ kiện hàng ngày tuyệt vời giúp nâng tầm phong cách của bạn. Với hai sự lựa chọn vàng hồng và bạc.', '<ul><li>SKU: DW00400194 ·</li><li>Màu: hồng vàng</li><li>Chiều dài dây chuyền: 45-49 cm</li><li>Vật liệu: Thép không gỉ (316L) và mạ vàng hồng</li></ul>', 2480000, 1984000, 5, 1, '/storage/upload/2022/07/07/DW00400194_Elevation-Ocq8oYQd.png\r\n/storage/upload/2022/07/07/DW00400194_Elevation-x8BelwRq.png\r\n/storage/upload/2022/07/07/DW00400194_Elevation-5xsD1ky7.png', '2022-07-07 08:11:45', '2022-07-07 11:40:48', ''),
(16, 'EMALIE NECKLACE', 'Vòng cổ Emalie với thiết kế thanh lịch và trang nhã phù hợp với mọi phong cách hàng ngày. Được truyền cảm hứng từ Nhẫn Emalie trắng, mẫu phụ kiện này chính là cái hồn của sự thu hút trong Emalie Collection ấn tượng với nét hoàn thiện tinh tế.', '<ul><li>SKU: DW00400153 ·</li><li>Màu: Satin trắng</li><li>Chiều dài dây chuyền: 45-49 cm</li><li>Vật liệu: Thép không gỉ mạ hai lớp (316L) và tráng men</li></ul>', 2480000, 1984000, 5, 1, '/storage/upload/2022/07/07/dw00400153_emalie_ne-GLMRTCZc.png\r\n/storage/upload/2022/07/07/dw00400153_emalie_ne-52_ocCZK.png\r\n/storage/upload/2022/07/07/dw00400153_emalie_ne-ypeWHoQc.png\r\n/storage/upload/2022/07/07/dw00400153_emalie_ne-ZjI4nZ4n.png', '2022-07-07 08:13:44', '2022-07-07 11:40:48', ''),
(17, 'CLASSIC BRACELET', 'The Classic Bracelet được thiết kế để phản ánh vẻ đẹp quyến rũ của những chiếc đồng hồ tối giản của chúng tôi. Với sức hấp dẫn giản dị nhưng trang nhã, tính thẩm mỹ của chiếc vòng tay là một sự tôn vinh thực sự cho sự khéo léo hoàn hảo đằng sau tất cả các thiết kế vượt thời gian của Daniel Wellington.', '<ul><li>SKU: DW00400003 ·</li><li>Chu vi: 155mm / 6 inch</li><li>Màu: hồng vàng</li><li>Vật liệu: Thép không gỉ mạ hai lớp (316L)</li></ul>', 1570000, NULL, 6, 1, '/storage/upload/2022/07/07/classic-bracelet-ros-ZqINgnOt.png\r\n/storage/upload/2022/07/07/dw00400003_classic_c-fy8R_Pc5.png\r\n/storage/upload/2022/07/07/dw_rg_bangle_detail-tXjZ1LpP.png\r\n/storage/upload/2022/07/07/dw00400003_classic_c-ovlGg6wn.png', '2022-07-07 08:29:17', '2022-07-07 08:29:17', ''),
(18, 'EMALIE BRACELET SATIN WHITE SMALL', 'Vòng tay Emalie tuyệt tác từ sự giao thoa của thép và sứ mềm mại mảnh ghép không thể thiếu từ Emalie Collection. Tô điểm và nâng tầm phong cách từ những chi tiết nhỏ nhất với điểm nhấn phụ kiện tinh tế và thanh lịch.', '<ul><li>SKU: DW00400007 ·</li><li>Chu vi: 155mm / 6 inch</li><li>Màu: Vàng hồng &amp;trắng</li><li>Vật liệu: Thép không gỉ mạ hai lớp (316L) và tráng men</li></ul>', 2030000, NULL, 6, 1, '/storage/upload/2022/07/07/dw00400007_classic_b-hUvuHD7n.png\r\n/storage/upload/2022/07/07/dw00400005_classic_b-8YPGjvEj.png\r\n/storage/upload/2022/07/07/classic-bracelet-sat-TyHCK_KM.png\r\n/storage/upload/2022/07/07/dw00400007_classic_b-M4fponAc.png', '2022-07-07 08:31:48', '2022-07-07 08:31:48', ''),
(19, 'ELAN LUMINE NECKLACE', 'Vòng cổ Elan Lumine có mặt dây chuyền tinh tế, được trang trí bằng các tinh thể lấp lánh ở mỗi bên, được buộc qua một chuỗi cáp kiểu dáng đẹp. Được chế tác bằng thép không gỉ và có sẵn bằng bạc hoặc vàng hồng. Vòng cổ Elan Lumine định nghĩa lại sự đơn giản theo tất cả các cách phù hợp.', '<ul><li>SKU: DW00400212 ·</li><li>Màu: hồng vàng</li><li>Chiều dài dây chuyền: 45-49 cm</li><li>Vật liệu: Thép không gỉ (316L) và mạ vàng hồng</li></ul>', 3170000, 2536000, 5, 1, '/storage/upload/2022/07/07/DW00400212_Elan_Lumi-9zQ_F2Lk.png\r\n/storage/upload/2022/07/07/DW00400212_Elan_Lumi-FaJDFTdU.png\r\n/storage/upload/2022/07/07/DW00400212_Elan_Lumi-7doo29ie.png\r\n/storage/upload/2022/07/07/DW00400212_Elan_Lumi-e5393YyE.png', '2022-07-07 09:00:39', '2022-07-07 11:40:48', ''),
(20, 'PETITE PRESSED SHEFFIELD', 'Đồng hồ Petite Sheffield thanh lịch sang trọng và vô cùng tinh tế với đa dạng mặt size và dây da cá tính. Với những điểm nhấn màu bạc và hồng trên hai sự lựa chọn mặt số trắng đen đây chắc chắn sẽ là người bạn đồng hành hoàn hảo cho phong cách hàng ngày của bạn.', '<ul><li>SKU: DW00100443 ·</li><li>Độ dày vỏ: 6mm</li><li>Màu mặt số: Trắng sữa</li><li>Vật liệu: Thép không gỉ mạ hai lớp (316L)</li><li>Chiều rộng dây đeo: 10mm</li><li>Chiều dài có thể điều chỉnh: (Tối thiểu - Tối đa) 135-180mm</li><li>Đai: Dây da</li><li>Màu dây đeo: Đen</li><li>Dây đai có thể hoán đổi cho nhau: Có</li><li>Chống nước: Tối thiểu 3ATM ( chống nước mưa)</li></ul>', 4080000, NULL, 2, 1, '/storage/upload/2022/07/08/dw00100443_petite_24-HFuF4dk8.png\r\n/storage/upload/2022/07/08/dw00100443_petite_24-BbnZE4yF.png\r\n/storage/upload/2022/07/08/dw00200280_petite_24-BYWrYiKL.png\r\n/storage/upload/2022/07/08/dw00100443_petite_24-zRKAfjxo.png', '2022-07-08 07:49:36', '2022-07-08 07:49:36', ''),
(21, 'PETITE UNITONE', 'The Petite Unitone với sự kết hợp hoàn hảo hài hòa về màu sắc vàng hồng tinh tế trên cả mặt và dây đồng hồ. Chất liệu thanh thoát bền bỉ giúp bạn nổi bật phong cách và tạo nét thu hút vô cùng thanh lịch.', '<ul><li>SKU: DW00100470 ·</li><li>Độ dày vỏ: 6mm</li><li>Màu mặt số: Vàng hồng</li><li>Phong trào: Động cơ chuyển động Quartz</li><li>Vật liệu: Thép không gỉ mạ hai lớp (316L)</li><li>Chiều rộng dây đeo: 12mm</li><li>Chiều dài có thể điều chỉnh: 150-205mm</li><li>Đai: Mắt lưới</li><li>Màu dây đeo: Vàng hồng</li><li>Dây đai có thể hoán đổi cho nhau: Có</li><li>Chống nước: Tối thiểu 3ATM ( chống nước mưa)</li></ul>', 4990000, NULL, 2, 1, '/storage/upload/2022/07/08/DW00100471_Petite_Un-_qdz_Ixd.png\r\n/storage/upload/2022/07/08/DW00100470_Petite_Un-8TiJLG5p.png\r\n/storage/upload/2022/07/08/DW00100471_Petite_Un-qbK38egQ.png\r\n/storage/upload/2022/07/08/DW00100470_Petite_Un-1ThXRoTD.png', '2022-07-08 07:52:12', '2022-07-08 07:52:12', ''),
(22, 'ICONIC LINK MINT', 'Iconic Link Mint nổi bật với mặt số màu xanh hồ trăn.', '<p>Lấy cảm hứng từ phong cách Bãi biển những năm 80, kiệt tác cổ điển hiện đại này tạo phong cách tươi mới cho vẻ ngoài của bạn. Được chế tác bằng thép không gỉ, có sẵn lớp mạ bạc. Hãy để chiếc đồng hồ này tô điểm cho phong cách hàng ngày của bạn khi bạn cần một thứ màu sắc tinh tế.<br>Iconic Link Mint không chỉ là một chiếc đồng hồ sang trọng với mặt đồng hồ màu xanh lá cây tươi mới. Thay vào đó, đó là một cái gật đầu với Bãi biển Miami những năm 80 và phong cách đã tạo nên vô số sự trở lại. Với lớp hoàn thiện màu bạc, dây đeo đồng hồ bằng thép không gỉ tương phản với mặt số bán mờ để tạo ra một viên ngọc quý thực sự cho cổ tay của bạn.</p>', 6360000, 5088000, 2, 1, '/storage/upload/2022/07/03/DW00100537_Iconic_Li-8GGwC8Nf.png', '2022-07-02 22:32:26', '2022-07-02 22:32:43', ''),
(23, 'ICONIC LINK CERAMIC', 'Iconic Link Ceramic là mẫu đồng hồ đầu tiên được hoàn thiện từ chất liệu gốm sứ cao cấp của chúng tôi.', '<p>Chiếc đồng hồ với những điểm nhấn bạc kim trên nền gốm đen sang trọng và thu hút. Sự bổ sung mới nhất của bộ sưu tập Iconic Link nổi bật với thiết kế cá tính đầy ấn tượng. Đây là mẫu đồng hồ màu đen mà ai trong chúng ta cũng cần phải có. Vui lòng lưu ý rằng dưới những tác động cực mạnh có thể dẫn đến hiện tượng rạn nứt hoặc vỡ gốm tuy rằng hiện tượng này không phổ biến và rất khó xảy ra.</p>', 7950000, NULL, 2, 1, '/storage/upload/2022/07/03/DW00100415_Iconic_Li-WYiLBFVp.png', '2022-07-02 22:34:17', '2022-07-02 22:34:17', ''),
(24, 'ICONIC LINK ARCTIC', 'The Iconic Link Arctic với mặt đồng hồ xanh dương sẫm. Màu sắc của bầu trời mênh mông và mặt biển băng điềm đạm tĩnh lặng. Kết hợp hoàn hảo cùng sắc bạc cho tổng thể hoàn chỉnh. Một điểm nhấn mang tính biểu tượng cho phong cách của bạn.', '<figure class=\"table\"><table><tbody><tr><td>SKU</td><td>DW00100457</td></tr><tr><td>Case thickness</td><td>8mm</td></tr><tr><td>Dial color</td><td>Blue</td></tr><tr><td>Movement</td><td>Động cơ chuyển động Quartz</td></tr><tr><td>Material</td><td>Thép không gỉ 316L đã tinh chế và đánh bóng</td></tr><tr><td>Strap width</td><td>14mm</td></tr><tr><td>Adjustable length</td><td>130-187mm</td></tr><tr><td>Strap</td><td>Dây Link</td></tr><tr><td>Strap colour</td><td>Bạc</td></tr><tr><td>Interchangeable straps</td><td>No</td></tr><tr><td>Water resistant</td><td>Tối thiểu 3ATM ( chống nước mưa)</td></tr></tbody></table></figure>', 6360000, NULL, 2, 1, '/storage/upload/2022/07/06/DW00100457_Iconic_Li-zzNpjWHV.png\r\n/storage/upload/2022/07/06/DW00100458_Iconic_Li-3XJOTgbm.png\r\n/storage/upload/2022/07/06/DW00100457_Iconic_Li-9BZiw3-a.png', '2022-07-06 06:25:09', '2022-07-06 06:25:09', ''),
(25, 'PETITE YORK', 'Thiết kế tinh tế', '<p>Với những đặc điểm cổ điển như da Ý dập nổi croc màu nâu đậm trong dây đeo York và mặt số màu trắng vỏ trứng gọn gàng, chiếc đồng hồ này sẽ đứng vững trước thử thách của thời gian.</p>', 4530000, NULL, 2, 1, '/storage/upload/2022/07/06/dw_petite_32rg_close-T6gLEvh1.png\r\n/storage/upload/2022/07/06/box-classic-petite-y-b14UQaeA.png\r\n/storage/upload/2022/07/06/petite-32-york-rg_1-MTCnNle_.png\r\n/storage/upload/2022/07/06/dw-petite-york-rg-wh-t7s11VN9.png', '2022-07-06 06:30:57', '2022-07-06 06:30:57', ''),
(26, 'ICONIC LINK AUTOMATIC', 'The Iconic Link Automatic là mẫu đồng hồ với cải tiến tối ưu nhất của chúng tôi cho đến nay với bộ chuyển động tự lên dây cót chuyển động trên cổ tay của bạn. Mặt đồng hồ dạ quang có kim và vạch chỉ phút phát sáng trong bóng tối, với màn hình hiển thị ngày trên mặt đồng hồ và có khả năng chống nước tới 100m. Tinh thể sapphire chống xước ở mặt trước cùng mặt sau hiển thị rõ nét động cơ máy tự động bên trong, sự lựa chọn đồng hồ tối ưu nhất dành cho bạn.', '<ul><li>SKU: DW00100482</li><li>Case thickness: 11,5mm</li><li>Dial color: Đen</li><li>Movement: Động cơ máy tự động Nhật Bản</li><li>Material: Thép không gỉ 316L đã tinh chế và đánh bóng</li><li>Strap width: 20mm</li><li>Adjustable length: 142-208mm</li><li>Strap: Dây Link</li><li>Strap colour: Bạc</li><li>Interchangeable straps: No</li><li>Water resistant: Chống nước tới 10 ATM</li></ul>', 10460000, NULL, 3, 1, '/storage/upload/2022/07/06/DW00100482_Iconic_Li-x7_-9ONy.png\r\n/storage/upload/2022/07/06/DW00100482_Iconic_Li-qNgYloE5.png\r\n/storage/upload/2022/07/06/DW00100482_Iconic_Li-5sIkHIbW.png\r\n/storage/upload/2022/07/06/DW00100482_Iconic_Li-gTM2-XaQ.png', '2022-07-06 06:45:45', '2022-07-06 06:45:45', ''),
(27, 'PETITE ASHFIELD', 'Vượt thời gian bước vào mùa giải mới với Petite Ashfield. Chiếc đồng hồ siêu mỏng này có dây đeo lưới màu đen mờ kiểu dáng đẹp và mặt số màu đen hiện đại. Có sẵn với các chi tiết bằng vàng hồng hoặc bạc.\r\nDây đai của bộ sưu tập Classic 36 không thể hoán đổi cho nhau với Petite 36', '<ul><li>SKU: DW00100307 ·</li><li>Độ dày vỏ: 6mm</li><li>Màu mặt số: Đen</li><li>Phong trào: Động cơ chuyển động Quartz</li><li>Vật liệu: Thép không gỉ 316L đã tinh chế và đánh bóng</li><li>Chiều rộng dây đeo: 16mm</li><li>Đai: Mắt lưới</li><li>Màu dây đeo: Đen</li><li>Dây đai có thể hoán đổi cho nhau: Có</li><li>Chống nước: Tối thiểu 3ATM ( chống nước mưa)</li></ul>', 5220000, NULL, 3, 1, '/storage/upload/2022/07/06/petite_ashfield_rg_3-suksgRU7.png\r\n/storage/upload/2022/07/06/dw00100307_petite_as-WISt8Twc.png\r\n/storage/upload/2022/07/06/dw_petite_b32rg_clos-pS4loMUR.png\r\n/storage/upload/2022/07/06/dw00100307_classic_p-cYUwFAlt.png', '2022-07-06 06:51:45', '2022-07-06 06:51:45', ''),
(28, 'CLASSIC READING', 'Classic Reading có dây đeo bằng da dập nổi croc màu đen, mặt số màu đen và vỏ siêu mỏng 6mm. Cho dù bạn đang tham dự một sự kiện trang trọng, chơi quần vợt hay tận hưởng một ngày nắng đẹp tại câu lạc bộ đồng quê, chiếc đồng hồ này là một lựa chọn tuyệt vời và sẽ bổ sung cho mọi trang phục của bạn.', '<ul><li>SKU: DW00100129&nbsp;</li><li>Độ dày vỏ: 6mm</li><li>Màu mặt số: Đen</li><li>Phong trào: Động cơ chuyển động Quartz</li><li>Vật liệu: Thép không gỉ mạ hai lớp (316L)</li><li>Chiều rộng dây đeo: 20mm</li><li>Chiều dài có thể điều chỉnh: 165-215mm</li><li>Đai: Dây da</li><li>Màu dây đeo: Đen</li><li>Dây đai có thể hoán đổi cho nhau: Có</li><li>Chống nước: Tối thiểu 3ATM ( chống nước mưa)</li></ul>', 6360000, NULL, 3, 1, '/storage/upload/2022/07/06/box-classic-black-re-rT7q98sN.png\r\n/storage/upload/2022/07/06/clbl40rg02_5-lLtSXQoY.png\r\n/storage/upload/2022/07/06/classic_reading_rg_4-ddbnBR9q.png\r\n/storage/upload/2022/07/06/dw-classic-black-rea-fgq8X_-I.png', '2022-07-06 06:54:35', '2022-07-06 06:54:35', ''),
(29, 'PETITE AMBER', 'The Petite Amber sở hữu một sắc nâu ấm áp nổi bật với thiết kế và màu sắc mới lạ vô cùng tinh tế. Sự độc đáo và ấn tượng với tone màu hoàn toàn mới kết hợp với màu vàng hồng thanh lịch chắc chắn sẽ là điểm nhấn tuyệt vời tôn vinh phong cách của bạn.', '<ul><li>SKU: DW00100478&nbsp;</li><li>Độ dày vỏ: 6mm</li><li>Màu mặt số: Nâu</li><li>Phong trào: Động cơ chuyển động Quartz</li><li>Vật liệu: Thép không gỉ mạ hai lớp (316L)</li><li>Chiều rộng dây đeo: 16mm</li><li>Chiều dài có thể điều chỉnh: 150-205mm</li><li>Đai: Mắt lưới</li><li>Màu dây đeo: Vàng hồng</li><li>Dây đai có thể hoán đổi cho nhau: Có</li><li>Chống nước: Tối thiểu 3ATM ( chống nước mưa)</li></ul>', 5670000, NULL, 3, 1, '/storage/upload/2022/07/06/DW00100471_Petite_Un-TTsbtYDv.png\r\n/storage/upload/2022/07/06/DW00100478_Petite_Am-Qhae3IrH.png\r\n/storage/upload/2022/07/06/DW00100477_Petite_Am-hsMh3CdV.png\r\n/storage/upload/2022/07/06/DW00100478_Petite_Am-wPd6d3X9.png', '2022-07-06 06:57:08', '2022-07-06 06:57:08', ''),
(30, 'PETITE STERLING', 'Petite Sterling 36 với mặt số màu đen là sự kết hợp đặc biệt giữa phong cách và tính cách. Đó là một tuyên bố thiết kế thực sự và là chiếc đồng hồ hoàn hảo cho bất kỳ dịp nào.\r\nDây đai của bộ sưu tập Classic 36 không thể hoán đổi cho nhau với Petite 36.', '<ul><li>SKU: DW00100304 ·</li><li>Độ dày vỏ: 6mm</li><li>Màu mặt số: Đen</li><li>Phong trào: Động cơ chuyển động Quartz</li><li>Vật liệu: Thép không gỉ 316L đã tinh chế và đánh bóng</li><li>Chiều rộng dây đeo: 16mm</li><li>Đai: Mắt lưới</li><li>Màu dây đeo: Bạc</li><li>Dây đai có thể hoán đổi cho nhau: Có</li><li>Chống nước: Tối thiểu 3ATM ( chống nước mưa)</li></ul>', 5220000, NULL, 3, 1, '/storage/upload/2022/07/06/DW00100468_Petite_Un-HRQbG8OG.png\r\n/storage/upload/2022/07/06/dw00100304_petite_st-ZpGiXZ3E.png\r\n/storage/upload/2022/07/06/dw_petite_b32s_close-phY6ObxG.png\r\n/storage/upload/2022/07/06/dw00100304_classic_p-tg07icrr.png', '2022-07-06 07:25:20', '2022-07-06 07:25:20', ''),
(31, 'PETITE MELROSE', 'Petite Melrose 36 có mặt số màu trắng vỏ trứng và dây đeo lưới vàng hồng sang trọng không thể phủ nhận. Chiếc đồng hồ này nâng tầm trang phục hàng ngày, tâm trạng và tinh thần của bạn.\r\nDây đai của bộ sưu tập Classic 36 không thể hoán đổi cho nhau với Petite 36.', '<ul><li>SKU: DW00100305 ·</li><li>Độ dày vỏ: 6mm</li><li>Màu mặt số: Trắng sữa</li><li>Phong trào: Động cơ chuyển động Quartz</li><li>Vật liệu: Thép không gỉ mạ hai lớp (316L)</li><li>Chiều rộng dây đeo: 16mm</li><li>Đai: Mắt lưới</li><li>Màu dây đeo: Vàng hồng</li><li>Dây đai có thể hoán đổi cho nhau: Có</li><li>Chống nước: Tối thiểu 3ATM ( chống nước mưa)</li></ul>', 5220000, NULL, 3, 1, '/storage/upload/2022/07/06/dw00100305_petite_me-4bn0V-NJ.png\r\n/storage/upload/2022/07/06/DW00100471_Petite_Un-Opa1MmRf.png\r\n/storage/upload/2022/07/06/dw00100305_petite_me-_t615x48.png\r\n/storage/upload/2022/07/06/dw00100305_classic_p-cgoXjD-S.png', '2022-07-06 07:27:26', '2022-07-06 07:41:02', ''),
(32, 'ASPIRATION NECKLACE', 'Dây Chuyền Aspiration là lời ngợi ca chân thành vẻ đẹp thanh lịch vĩnh cửu. Được thiết kế để phối với Khuyên Tai Aspiration tinh tế, chiếc dây chuyền này là một món trang sức không thể thiếu hàng ngày. Phần thân được làm từ gốm, với móc cài bằng inox và mạ vàng hồng được khắc lên mình logo đặc trưng của chúng tôi.\r\nDây chuyền chỉ có một kích thước, nhưng có thể dùng các chốt điều chỉnh để căn chỉnh chiều dài từ 45cm đến 49cm.', '<ul><li>SKU: DW00400156 ·</li><li>Màu: Đen</li><li>Chiều dài dây chuyền: 45-49 cm</li><li>Vật liệu: Thép không gỉ (316L) với sắc vàng hồng và hoạ tiết gốm sứ</li></ul>', 3400000, 2720000, 5, 1, '/storage/upload/2022/07/07/dw00400156_aspiratio-gcmw7e7Z.png\r\n/storage/upload/2022/07/07/dw00400156_aspiratio-NLS21TU-.png\r\n/storage/upload/2022/07/07/aspiration_necklace_-dM66_jbw.png\r\n/storage/upload/2022/07/07/dw00400156_aspiratio-pKgaLLuH.png', '2022-07-07 08:10:04', '2022-07-07 11:40:48', ''),
(33, 'ELEVATION NECKLACE', 'Được lấy cảm hứng từ những khối hình học mang hơi hướng của sự hiện đại trên một sợi dây mảnh tạo sự liên kết đồng bồ với nhẫn Elevation. Đây chắc chắn sẽ là món phụ kiện hàng ngày tuyệt vời giúp nâng tầm phong cách của bạn. Với hai sự lựa chọn vàng hồng và bạc.', '<ul><li>SKU: DW00400194 ·</li><li>Màu: hồng vàng</li><li>Chiều dài dây chuyền: 45-49 cm</li><li>Vật liệu: Thép không gỉ (316L) và mạ vàng hồng</li></ul>', 2480000, 1984000, 5, 1, '/storage/upload/2022/07/07/DW00400194_Elevation-Ocq8oYQd.png\r\n/storage/upload/2022/07/07/DW00400194_Elevation-x8BelwRq.png\r\n/storage/upload/2022/07/07/DW00400194_Elevation-5xsD1ky7.png', '2022-07-07 08:11:45', '2022-07-07 11:40:48', ''),
(34, 'EMALIE NECKLACE', 'Vòng cổ Emalie với thiết kế thanh lịch và trang nhã phù hợp với mọi phong cách hàng ngày. Được truyền cảm hứng từ Nhẫn Emalie trắng, mẫu phụ kiện này chính là cái hồn của sự thu hút trong Emalie Collection ấn tượng với nét hoàn thiện tinh tế.', '<ul><li>SKU: DW00400153 ·</li><li>Màu: Satin trắng</li><li>Chiều dài dây chuyền: 45-49 cm</li><li>Vật liệu: Thép không gỉ mạ hai lớp (316L) và tráng men</li></ul>', 2480000, 1984000, 5, 1, '/storage/upload/2022/07/07/dw00400153_emalie_ne-GLMRTCZc.png\r\n/storage/upload/2022/07/07/dw00400153_emalie_ne-52_ocCZK.png\r\n/storage/upload/2022/07/07/dw00400153_emalie_ne-ypeWHoQc.png\r\n/storage/upload/2022/07/07/dw00400153_emalie_ne-ZjI4nZ4n.png', '2022-07-07 08:13:44', '2022-07-07 11:40:48', ''),
(35, 'CLASSIC BRACELET', 'The Classic Bracelet được thiết kế để phản ánh vẻ đẹp quyến rũ của những chiếc đồng hồ tối giản của chúng tôi. Với sức hấp dẫn giản dị nhưng trang nhã, tính thẩm mỹ của chiếc vòng tay là một sự tôn vinh thực sự cho sự khéo léo hoàn hảo đằng sau tất cả các thiết kế vượt thời gian của Daniel Wellington.', '<ul><li>SKU: DW00400003 ·</li><li>Chu vi: 155mm / 6 inch</li><li>Màu: hồng vàng</li><li>Vật liệu: Thép không gỉ mạ hai lớp (316L)</li></ul>', 1570000, NULL, 6, 1, '/storage/upload/2022/07/07/classic-bracelet-ros-ZqINgnOt.png\r\n/storage/upload/2022/07/07/dw00400003_classic_c-fy8R_Pc5.png\r\n/storage/upload/2022/07/07/dw_rg_bangle_detail-tXjZ1LpP.png\r\n/storage/upload/2022/07/07/dw00400003_classic_c-ovlGg6wn.png', '2022-07-07 08:29:17', '2022-07-07 08:29:17', ''),
(36, 'ICONIC LINK MINT', 'Iconic Link Mint nổi bật với mặt số màu xanh hồ trăn.', '<p>Lấy cảm hứng từ phong cách Bãi biển những năm 80, kiệt tác cổ điển hiện đại này tạo phong cách tươi mới cho vẻ ngoài của bạn. Được chế tác bằng thép không gỉ, có sẵn lớp mạ bạc. Hãy để chiếc đồng hồ này tô điểm cho phong cách hàng ngày của bạn khi bạn cần một thứ màu sắc tinh tế.<br>Iconic Link Mint không chỉ là một chiếc đồng hồ sang trọng với mặt đồng hồ màu xanh lá cây tươi mới. Thay vào đó, đó là một cái gật đầu với Bãi biển Miami những năm 80 và phong cách đã tạo nên vô số sự trở lại. Với lớp hoàn thiện màu bạc, dây đeo đồng hồ bằng thép không gỉ tương phản với mặt số bán mờ để tạo ra một viên ngọc quý thực sự cho cổ tay của bạn.</p>', 6360000, 5088000, 2, 1, '/storage/upload/2022/07/03/DW00100537_Iconic_Li-8GGwC8Nf.png', '2022-07-02 22:32:26', '2022-07-02 22:32:43', ''),
(37, 'CLASSIC BRISTOL', 'Với mặt số màu đen sang trọng và dây da màu nâu sẫm hoàn hảo, Classic Bristol mang đến sự sang trọng dễ dàng cho tâm trí. Mặc quần áo lên hoặc xuống, chiếc đồng hồ tinh tế này sẽ nổi bật trong bất kỳ đám đông nào.', '<ul><li>SKU: DW00100125 ·</li><li>Độ dày vỏ: 6mm</li><li>Màu mặt số: Đen</li><li>Phong trào: Động cơ chuyển động Quartz</li><li>Vật liệu: Thép không gỉ mạ hai lớp (316L)</li><li>Chiều rộng dây đeo: 20mm</li><li>Chiều dài có thể điều chỉnh: 165-215mm</li><li>Đai: Dây da</li><li>Màu dây đeo: màu nâu sậm</li><li>Dây đai có thể hoán đổi cho nhau: Có</li><li>Chống nước: Tối thiểu 3ATM ( chống nước mưa)</li></ul>', 6360000, NULL, 3, 1, '/storage/upload/2022/07/09/clbl40rg03_1-mLBslx7l.png\r\n/storage/upload/2022/07/09/cl-40-bristol-rg_4-UHG1x8ob.png\r\n/storage/upload/2022/07/09/box-classic-black-br-uxdNN1C7.png\r\n/storage/upload/2022/07/09/dw-classic-black-bri-PdbidBr3.png', '2022-07-09 02:09:08', '2022-07-12 11:29:12', '36,40'),
(46, 'SEDTRUHJ', 'RYTJ', '<p>DFTRYJKR</p>', 45878567, NULL, 4, 1, '/storage/upload/2022/07/12/DW00400212_Elan_Lumi-FaJDFTdU.png', '2022-07-12 09:27:19', '2022-07-12 10:33:25', '26,40,S'),
(47, 'qưreư', 'asd', '<p>ad</p>', 121, 1, 1, 1, '/storage/upload/2022/07/12/DW00400212_Elan_Lumi-7doo29ie.png', '2022-07-12 10:35:39', '2022-07-12 10:41:29', '0'),
(48, 'adadad', 'asd', '<p>ad</p>', 123123, 1, 1, 1, '/storage/upload/2022/07/12/dw-classic-black-bri-PdbidBr3.png', '2022-07-12 10:38:37', '2022-07-12 10:38:37', '0');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_by` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `url`, `thumb`, `sort_by`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Đồng Hồ DW', 'danh_muc/1-dong-ho.html', '/storage/upload/2022/07/07/dong-ho-DW-cua-nuoc-nao.jpg', 1, 1, '2022-07-07 03:34:18', '2022-07-07 04:04:09'),
(2, 'Trang Sức', 'danh_muc/4-trang-suc.html', '/storage/upload/2022/07/07/bo-trang-suc-bac-snowball_1_.jfif', 2, 1, '2022-07-07 03:42:14', '2022-07-07 04:14:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'tthao3333@gmail.com', NULL, '$2y$10$M9kOjiwul7Av/zCKmAPFj.S//KeTsCKhpR1jLb2YJ7WjMccCP756e', '2c6tGe38TOxUzgcMQ0Km1NcCHxvXOZtksGS3pIv3QozRu76Fd40jEkibLeE5', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
