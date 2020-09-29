-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jun 2020 pada 21.59
-- Versi server: 10.3.15-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shopping`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Lip Care', '2020-05-26 20:17:09', '2020-05-26 20:17:09'),
(2, 'Serum', '2020-05-28 09:39:31', '2020-05-28 09:39:31'),
(3, 'Face Wash', '2020-06-05 17:00:00', '2020-06-06 02:29:28'),
(4, 'Toner', NULL, NULL),
(5, 'Sheetmask', NULL, NULL),
(6, 'Moisturizer', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_orders`
--

CREATE TABLE `detail_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `count` int(11) NOT NULL,
  `subtotal` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_orders`
--

INSERT INTO `detail_orders` (`id`, `order_id`, `product_id`, `count`, `subtotal`, `created_at`, `updated_at`) VALUES
(6, 4, 4, 3, 150000, '2020-06-06 11:27:20', '2020-06-06 11:27:20'),
(7, 4, 8, 2, 380000, '2020-06-06 11:27:21', '2020-06-06 11:27:21'),
(8, 5, 5, 1, 45000, '2020-06-06 13:25:11', '2020-06-06 13:25:11'),
(9, 5, 7, 3, 540000, '2020-06-06 13:25:11', '2020-06-06 13:25:11'),
(10, 5, 4, 2, 100000, '2020-06-06 13:25:12', '2020-06-06 13:25:12'),
(11, 6, 15, 1, 45000, '2020-06-06 13:26:05', '2020-06-06 13:26:05'),
(12, 7, 7, 3, 540000, '2020-06-07 11:29:39', '2020-06-07 11:29:39'),
(13, 7, 26, 2, 17000, '2020-06-07 11:29:39', '2020-06-07 11:29:39'),
(14, 8, 11, 1, 45000, '2020-06-07 12:38:02', '2020-06-07 12:38:02'),
(15, 8, 15, 1, 45000, '2020-06-07 12:38:03', '2020-06-07 12:38:03'),
(16, 8, 7, 3, 540000, '2020-06-07 12:38:03', '2020-06-07 12:38:03'),
(17, 8, 8, 3, 570000, '2020-06-07 12:38:03', '2020-06-07 12:38:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2020_05_20_032845_create_categories_table', 3),
(52, '2014_10_12_000000_create_users_table', 4),
(53, '2014_10_12_100000_create_password_resets_table', 4),
(54, '2019_08_19_000000_create_failed_jobs_table', 4),
(55, '2020_05_20_032653_create_categories_table', 4),
(56, '2020_05_20_032655_create_products_table', 4),
(57, '2020_05_20_033652_create_carts_table', 4),
(58, '2020_05_20_033803_create_orders_table', 4),
(59, '2020_05_20_033839_create_detail_orders_table', 4),
(60, '2020_05_20_033853_create_reviews_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'waiting',
  `shipping_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'waiting',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_status`, `shipping_status`, `address`, `note`, `total`, `created_at`, `updated_at`) VALUES
(4, 4, 'paid', 'reviewed', 'Jalan ykkk', 'halo', 535000, '2020-06-06 11:27:20', '2020-06-06 11:31:16'),
(5, 4, 'waiting', 'waiting', 'Jalan', 'ha', 690000, '2020-06-06 13:25:11', '2020-06-06 13:25:11'),
(6, 4, 'paid', 'reviewed', 'as', 'as', 50000, '2020-06-06 13:26:04', '2020-06-06 13:30:53'),
(7, 4, 'paid', 'reviewed', 'Jalan', 'Ayo', 562000, '2020-06-07 11:29:38', '2020-06-07 11:35:09'),
(8, 4, 'waiting', 'waiting', 'as', 'as', 1205000, '2020-06-07 12:38:02', '2020-06-07 12:38:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `category_id`, `image`, `detail`, `created_at`, `updated_at`) VALUES
(3, 'Liplapin Tinted Balm', 50000, 1, '1591468998.png', 'Liplapin Tinted Balm \r\n(shade: Red Rose, Strawberry Kiss, Cocoa Butter) \r\nNetto 10gr \r\n✨Liplapin Lip Balm terbuat dari 100 % bahan alami yang bermanfaat melembabkan dan menutrisi bibir kamu di antaranya shea butter, jojoba oil, vitamin E oil dan coconut oil. \r\n✨Sangat melembabkan bibir yang kering dan pecah-pecah dengan tekstur yg ringan (tanpa rasa lengket atau berat di bibir) \r\n✨Memberikan warna yg cantik dan natural (ga norak sama sekali😍) di bibir sekaligus tahan lama sehingga sering dijadikan pengganti lipstick/lipmatte agar bibir lebih sehat juga sebagai lip sleeping balm di malam hari \r\n✨Bisa dijadikan CREAM BLUSH😍 warnanya tetep cantik dan ga norak sama sekali, membuat pipi merona natural dan warnanya tahan lama di pipi \r\n🍃All Liplapin products are made with natural ingredients with NO petroleum jelly/preservatives products', '2020-05-27 00:01:50', '2020-06-06 11:43:18'),
(4, 'Liplapin Lipscrub', 50000, 1, '1591445000.png', 'Homemade Lip Scrub by Liplapin, netto 15gr Expired / Kadaluwarsa = 4 bulan terhitung sejak kemasan dalam dibuka 1. Strawberry 2. Original 3. Banana 4. Bubble gum 5. Marshmallow 6. Caramel 7. Green Tea 8. Cotton Candy Ampuh sekali mengangkat sel kulit mati di bibir yang kering dan pecah-pecah, di bibir yang hitam/kusam akibat terlalu sering menggunakan lipstick/lipmatte/liptint berkimia. Dengan terangkatnya sel kulit mati, bibir kembali halus, lembut, dan cerah merona kembali seperti bibir sehat yang kamu inginkan. 🍃 Semua produk Liplapin pakai bahan natural tanpa kimia/pengawet/petroleum jelly sehingga aman dan ga buat bibir jadi hitam 🍃 Fungsi : - Mengangkat sel kulit mati pada bibir yang pecah-pecah - Membuat bibir mejjadi lebih halus dan lembab - Membantu mencerahkan/ mengembalikan warna cerah pada bibir yang kusam 🍃 INFO : - Jika tidak digunakan simpanlah di tempat sejuk / suhu ruangan agar scrub lebih tahan lama - Jika lembek karena kepanasan, diamkan di kulkas/ tempat sejuk, maka akan padat kembali - Jika lipscrub dikirim ke kamu, dan terasa minyakan di packingannya, itu tidak apa-apa, itu hanya bocor sedikit dari segelnya, bukan berarti lipscrubnya lumer / rusak, tapi karena memang lipscrub itu sendiri mengandung coconut oil', '2020-05-27 03:48:19', '2020-06-06 05:03:20'),
(5, 'Laneige Sleeping Mask', 45000, 1, '1591445061.png', 'LANEIGE Lip Sleeping Mask Manfaat : 1. Berry Mix Complex Kaya akan vitamin C dan kandungan anti oksidannya bisa membuat bibir yang kering & terkelupas menjadi halus & kenyal 2. Moisture Wrap Kaya akan Hyaluronic acid mineral yang terus meresap dalam bibir selama tertidur 3. Aroma Berry yang segar Aroma yang menyenangkan dapat membantu tidur yang pulas', '2020-05-27 03:48:46', '2020-06-06 05:04:21'),
(6, 'SOME BY MI Yuja Vita Moisture Lip Balm', 185000, 1, '1591445086.png', 'SOME BY MI Yuja Vita Moisture Lip Balm 10gr 1. Melembabkan bibir dengan Yuja Peel Oil dan menyehatkannya dengan Vitamin E. 2. Membuat bibir lembab dengan ceramide tanpa rasa lengket 3. Memberikan perawatan sel kulit mati dengan Minyak Biji Jojoba dengan aroma Yuja. Cara Penggunaan: Oleskan di sepanjang bibir dalam dan luar setiap kali Anda merasa kering baik pagi dan malam hari.', '2020-05-28 09:40:56', '2020-06-06 05:04:46'),
(7, 'Some By Mi Snail Truecica Serum', 180000, 2, '1591447671.png', '🌼 Some By Mi Snail Truecica Miracle Repair Serum (50ml) Exp Jun 2022 Fungsi : * Memiliki 2 fungsi ganda : mencerahkan + Anti Keriput * Mengandung 890.000ppm Snail Truecica yang terdiri dari Black Snail Extract dan Truecica . * Membantu regenerasi kulit untuk memperbaiki kerusakan kulit dengan Black Snail Extract. * Menenangkan kulit dan memperkuat ketahanan kulit dengan Truecica . * Menghilangkan noda dan bekas luka dengan hasil akhir yang tidak lengket. * Bebas dari 20 bahan berbahaya. Lulus tes iritasi kulit.', NULL, '2020-06-06 05:47:51'),
(8, 'Some By Mi Yuja Niacin Serum', 190000, 2, '1591445194.png', 'Mengandung goheung yuja 90%, niacinamide 5%, glutsthione,arbutin dan 12 jenis vitamin lainnya yang berfungsi sebagai berikut : \r\n1. melembabkan wajah \r\n2. menutrisi kulit wajah agar terlihat awer muda \r\n3. membantu kulit lebih bersih dan bercahaya \r\n4. menenangkan kulit sensitive \r\n5. mencerahkan wajah yang kusam', NULL, '2020-06-06 05:06:34'),
(9, 'Some By Mi AHA BHA PHA 30 Days Miracle Serum', 190000, 2, '1591445253.png', 'Some By Mi AHA BHA PHA 30 Days Miracle Serum (50ml) 2 layers component serum (oil+water) \r\n\r\nFungsi : \r\n\r\n* Menghilangkan jerawat dan bekasnya \r\n\r\n* Mengecilkan pori-pori \r\n\r\n* Mencerahkan \r\n\r\n* Anti Keriput \r\n\r\n* Melembabkan', NULL, '2020-06-06 05:07:33'),
(10, 'Laneige Glowy Make Up Serum 5 ml', 62000, 2, '1591445340.png', 'Laneige Glowy Makeup Serum 5ml Exp Date 2022. Travel Size (simple, ringan, sangat praktis utk dibawa kemana2. Apalagi utk yg mau coba dulu apakah cocok utk dipakai) Untuk semua jenis kulit Glowy Makeup Serum, produk terbaru dari Laneige yang berfungsi sebagai primer dengan sistem \'Skin Fit\' yang membuat make up menempel dan tahan lama. Kandungan ekstrak diamond alami menjadikan kulit tampak halus dan Glowing Tekstur gel serum berbasis Ceramide air yang lembut, ringan, sangat nyaman di kulit. Menyeimbangkan keseimbangan minyak untuk membantu melembabkan kulit. Gampang menyerap kedalam kulit tanpa rasa lengket dan berminyak.', NULL, '2020-06-06 05:09:00'),
(11, 'Laneige Water Bank Moisture Essence', 45000, 2, '1591445371.png', 'Stok 100 Dikirim Dari KAB. SIDOARJO - WARU, JAWA TIMUR, ID Deskripsi Produk Laneige Water Bank Moisture Essence Laneige Water Bank Moisture Essence : Untuk kulit normal / kering. Laneige Water Bank Hydro Essence : Untuk kulit berminyak / kombinasi. Manfaat Laneige Water Bank Moisture Essence (10ml) : - Green Mineral Water Moisture Green mineral Water diekstrak dari kale, dari Brussel spourts, artichocke, dan lima beans mengisi ulang kulit dengan kelembaban sepanjang hari - Diekstrak dengan metode proses Blue Ocean Ekstraksi dengan metode proses Blue Ocean yang telah dipatenkan (15℃/5jam) memberikan kelembaban yang mendalam - Bahan Garden Cress Bahan Garden Cress membuat kulit tampak cerah dan berseri dari fungsi anti-oxidant - Fungsi Water Zipper Mengunci kelembababan dari fungsi Green Mineral Water agar kulit tetap lembab dalam jangka waktu yang lama Cara pakai : Pakai setelah mengaplikasikan toner atau lotion. Pompa sebanyak 2-3 kali dan aplikasikan di pipi, dahi, dan dagu di hari berikutnya Untuk dipakai setiap hari pagi dan malam, tahap penggunaan : Water Bank Moisture Essence ~ Water Bank Eye Gel ~ Water Bank Moisture Cream Barang yang kami jual 100% ORIGINAL.', NULL, '2020-06-06 05:09:31'),
(12, 'Laneige Water Bank Hydro Essence', 45000, 2, '1591445643.png', 'Laneige Water Bank Hydro Essence : untuk kulit berminyak / kombinasi\r\nLaneige Water Bank Moisture Essence : untuk kulit normal / kering\r\nLaneige Water Bank Hydro Essence (10ml)\r\nManfaat :\r\nSeries terbaru dari waterbank essence ex khusus untuk kulit berminyak / kombinasi.\r\nSerum yang mampu menjaga kulit tetap terhidrasi dengan baik hingga 24 jam.\r\nUruta Pemakaian :\r\nEssence - Eye Gel - Cream\r\nBarang yang kami jual 100% ORIGINAL.', NULL, '2020-06-06 05:14:03'),
(13, 'COSRX Low pH Good Morning Gel Cleanser 150ml', 127000, 3, '1591445681.png', 'COSRX Low pH Good Morning Cleanser adalah produk asal Korea Selatan yang menggunakan bahan-bahan alami.\r\nPembersih wajah dengan formula lembut yang bagus digunakan pada pagi hari.\r\n\r\nKEGUNAAN :\r\nMampu membersihkan kulit sensitif sekalipun dengan lembut berkat kandungannya yang memiliki kadar acid yang mirip dengan kadar pH kulit. \r\nGel cleanser ini mampu menenangkan, mengeksfoliasi, melembapkan sekaligus membersihkan kulit wajah. \r\nPembersih wajah ini juga mampu mengangkat sel-sel kulit mati dan minyak berlebih yang muncul selama tidur sehingga wajah menjadi bersih dan segar.\r\n\r\nCARA PAKAI:\r\n- Pijat wajah dengan lembut menggunakan Low pH Good Morning Gel Cleanser secukupnya pada kulit wajah yang telah dibasahi.\r\n- Bilas dengan air hangat\r\n- Tepuk-tepuk wajah hingga kering, dan lanjutkan ke perawatan wajah selanjutnya.', NULL, '2020-06-06 05:14:41'),
(14, 'COSRX Salicylic Acid Daily Gentle Cleanser 150ml', 127000, 1, '1591445838.png', 'Kini COSRX Salicylic Acid Exfoliating Cleanser namanya telah dirubah menjadi COSRX Salicylic Acid Daily Gentle Cleanser serta upgrade bahan-bahan yang terkandung didalamnya. \r\nNamun packagingnya tetap sama\r\n\r\nPembersih kulit wajah dengan kandungan bahan botanical dan salicylic acid untuk\r\n1. Mengangkat sel kulit mati bertumpuk penyebab kulit kusam dan sarang kuman penyebab jerawat.\r\n2. Mengangkat komedo hitam / putih sekaligus membersihkan pori-pori yang tersumbat dari sebum berlebih cikal bakal komedo.\r\n3. Mengontrol sebum/minyak berlebih\r\n4. Kandungan alami tea tree leaf oil untuk melawan bakteri penyebab jerawat dan menenangkan kulit iritasi akibat jerawat.\r\n\r\nCocok untuk kulit berminyak / berjerawat', NULL, '2020-06-06 13:05:16'),
(15, 'LANEIGE MOIST CREAM AND MULTI DEEP CLEANSER 30 ML TRAVEL SIZE', 45000, 3, '1591445856.png', 'Laneige Cleansing Multi Deep Clean Cleanser (Biru) -> Untuk kulit berminyak / kombinasi.\r\nLaneige Moist Cream Cleanser (Pink) -> Untuk kulit normal / kering\r\n\r\n❤️❤️❤️❤️❤️❤️❤️  \r\n\r\nLaneige Cleansing Multi Deep Clean Cleanser (Biru) - 30ml\r\nSabun muka yang berfungsi untuk menghilangkan kulit mati, membersihkan make up, sun cream dan debu sekaligus tanpa membuat kulit iritasi.\r\n\r\nTerdiri dari :\r\n- Papain Enzyme. Di ekstrak dari pepaya, berfungsi untuk menghilangkan kulit mati yang bandel, membersihkan sebum dan kotoran di dalam pori.\r\n- Blueberry Extract\r\nMemberikan rasa segar, cerah dan lembab setelah cuci muka.\r\n\r\n❤️❤️❤️❤️❤️❤️❤️  \r\n\r\nLaneige Moist Cream Cleanser (Pink) - 30ml\r\nFoam cleansing dengan kelembapan yang tinggi, mengandung minyak yang berasal dari tumbuhan, membantu kulit menyerap produk perawatan kulit. Dengan mengisi kulit dengan kelembapan, dimulai dari langkah cleansing\r\n\r\nMerekomendasikan Moist Cream Cleanser untuk:\r\n- Customer yang mengalami kulit terasa kencang, keringan dari dalam, dan kulit sangat kering\r\n- Customer yang ingin mengurangi kulit stress dengan cara membersihkan muka\r\n- Customer yang ingin mempunyai kulit yang lembab bahkan setelah mencuci muka\r\n\r\nCara penggunaan:\r\n- Keluarkan produk sekitar 2 cm ke telapak tangan Anda dan busakan dengan air. Pijatkan pada wajah Anda dan bilas sampai bersih dengan air.\r\n- Pakailah setiap hari di pagi dan malam hari.', NULL, '2020-06-06 05:17:36'),
(16, 'Some by Mi Snail Truecica Miracle Repair Low pH Gel', 163000, 3, '1591445876.png', '🌼 Some By Mi Snail Truecica Miracle Repair Low pH Gel (100ml)\r\nExp Nov 2022\r\nFungsi :\r\n* Membersihkan wajah secara total\r\n* Menenangkan kulit baik sensitive, normal maupun yang bermasalah. \r\n* Memperkuat skin barrier\r\n* Busa lembut tidak merusak kulit.\r\n* Tidak membuat kulit kering', NULL, '2020-06-06 05:17:56'),
(17, 'COSRX Advance Snail 96 Mucin Power Essence 100ml', 200000, 4, '1591445965.png', 'Advanced Snail 96 Mucin Power Essence untuk kelembaban Intense, terbuat dari 96% secresi filtrat siput domestik dan alami.\r\nTerbuat dari Mucin Siput natural, Melembabkan kulit sampai pada tahap sel kulit, membuat kulit wajah semakin sehat tanpa meninggalkan rasa berat, berminyak dan iritasi. Memberikan nutrisi dan elastisitas yang di butuhkan kulit sehingga tampak lebih muda!\r\nAdvanced Snail 96 Mucin Power Essence adalah essence sesungguhnya yang merubah kulit dengan menyimpan kelembaban alaminya dan mendorong kulit menjadi lebih sehat serta memberikan nutrisi dan elastisitas yang di butuhkan kulit.\r\n\r\nKelebihan / Kegunaan: \r\n+ Tekstur gel  cream \r\n+ Cocok untuk semua jenis kulit, termasuk sensitif, berminyak & berjerawat\r\n+ Pelembab dengan 92% Snail secretion filtrate (lendir siput) \r\n+ Memperbaiki kulit rusak\r\n+ Memudarkan bekas jerawat\r\n+ Meningkatkan regenerasi sel kulit\r\n+ Melawan penuaan dini\r\n+ Mengurangi penampilan keriput\r\n\r\nCara Pakai\r\n1) Hanya usapkan sedikit pada daerah hidung dan dahi\r\n2) Usapkan dalam jumlah cukup banyak dan pijat lembut pada daerah pipi sampai terserap seluruhnya\r\n3) Untuk area mata,tepuk lembut', NULL, '2020-06-06 05:19:25'),
(18, 'COSRX AHA/BHA Clarifying Treatment Toner 150ml', 170000, 1, '1591445987.png', 'Cosrx AHA/BHA Clarifying Treatment Toner merupakan toner dengan kandungan bahan-bahan natural dan air mineral. Produk ini lebih dari sekedar toner biasa, karena memiliki kandungan AHA/BHA organik yang dapat berfungsi sebagai exfoliating toner.\r\nToner ini membantu menghidrasi dan meremajakan kulit sehingga dapat menjadikan kulit sehat dan flawless. \r\n\r\nKelebihan / Kegunaan:\r\n+ pH Level 3.9 sesuai untuk AHA & BHA untuk bekerja dengan efektif\r\n+ Eksfoliasi yang dapat digunakan sehari-hari, mencegah komedo \r\n+ Membuat kulit menjadi halus dan warna lebih merata\r\n+ Diformulasikan dengan ekstrak botanical, air mineral dan vitamins untuk meyehatkan kulit\r\n+ Membersihkan pori-pori dan menyeimbangkan kulit\r\n+ Menyerap dengan sangat baik, melembabkan dan tidak lengket\r\n\r\nCara Pemakaian :\r\nAplikasikan pada wajah yang sudah dibersihkan setiap pagi dan malam hari dengan menggunakan kapas.\r\n\r\nWAJIB : Selalu pakai sunblock utk aktivitas di siang hari setelah memakai produk ini', NULL, '2020-06-07 12:09:04'),
(19, 'Some By Mi Yuja Niacin Brightening Toner', 180000, 4, '1591446009.png', 'Mengandung goheung yuja 90%, niacinamide 5%, glutsthione,arbutin dan 12 jenis vitamin lainnya yang berfungsi sebagai berikut :\r\n^ melembabkan wajah \r\n^ menutrisi kulit wajah agar terlihat awer muda \r\n^ membantu kulit lebih bersih dan bercahaya\r\n^ menenangkan kulit sensitive \r\n^ mencerahkan wajah yang kusam', NULL, '2020-06-06 05:20:09'),
(20, 'Some By Mi Snail Truecica Toner', 189000, 4, '1591446055.png', '🌼 Some By Mi Snail Truecica Miracle Repair Toner (135ml)\r\nExp Nov 2022\r\nFungsi :\r\n* Memperkuat lapisan kulit kita\r\n* Menenangkan kulit sensitif/kemerahan/jerawatan\r\n* Toner ini menjaga kelembaban kulit tanpa meninggalkan rasa lengket\r\n* Meratakan kulit dan Mencerahkan kulit kusam', NULL, '2020-06-06 05:20:55'),
(21, 'Some By Mi AHA BHA PHA 30 Days Miracle Toner (150ml)', 172000, 4, '1591446072.png', 'Some By Mi AHA BHA PHA 30 Days Miracle Toner (150ml)\r\nExpired : 15 Juli 2022\r\nManfaat utama:\r\n1. Menghilangkan jerawat\r\n2. Menghaluskan kulit wajah\r\n3. Menjaga kulit tetap lembab\r\n4. Mencerahkan wajah\r\nKarena toner digunakan setiap hari, maka toner pada umumnya dapat menyebabkan iritasi ringan jika digunakan berulang kali. \r\nTETAPI Miracle Toner tidak demikian karena toner ini tidak menggunakan bahan yang dapat menimbulkan iritasi. Dan hanya menggunakan bahan-bahan yang ramah terhadap kulit.\r\n\r\nSome By Mi AHA BHA PHA 30 Days Miracle Toner (106gr)\r\nHanya dalam 30 hari saja Anda akan mendapatkan semua manfaatnya. Digunakan secara rutin setiap pagi dan malam.', NULL, '2020-06-06 05:21:12'),
(22, 'NATURE REPUBLIC SHEETMASK NATURE MASKER KOREA', 8500, 5, '1591446088.png', 'Nature Republic Real Nature Sheet Mask\r\nExp Date : 2022-08\r\n\r\nVarian :\r\nGREEN TEA : memberi nutrisi dan membantu kulit tetap lembab\r\nROSE  : merevitalisasi dan melembabkan kulit \r\nROYAL JELLY  : menutrisi dan mengurangi keriput \r\nCUCUMBER  : melembabkan dan membuat kulit menjadi lembut\r\nORANGE  : mencerahkan kulit kusam \r\nOLIVE   : menghaluskan kulit\r\nTOMATO  : melembabkan dan mencerahkan kulit\r\nALOE   : menenangkan kulit yg teriritasi dan menghaluskan\r\nSHEA BUTTER  : mencerahkan dan menutrisi kulit\r\nCHAMOMILE   : moisturise & membuat kulit segar\r\nBAMBOO  : menenangkan dan mencerahkan\r\nAVOCADO  : melembabkan kulit kering\r\nACAI BERRY : mengurangi keriput dan melembabkan\r\nTEA TREE   : memberi nutrisi pada kulit  \r\n\r\nCara pakai:\r\n- Cuci wajah dengan bersih\r\n- Tempelkan masker di wajah\r\n- Diamkan 15-20 menit\r\n- Gunakan seminggu 1-3x untuk hasil maksimal\r\n\r\nNB : Tidak dianjurkan untuk terlalu lama memakai masker, karena akan membuat nutrisi yang seharusnya di serap kulit akan kembali terserap ke dalam masker.', NULL, '2020-06-06 05:21:28'),
(23, 'Mediheal Essential Mask / Mediheal Tea Tree Collagen Vita Lightbeam Masker Original Korea 100%', 15000, 5, '1591446110.png', 'Mediheal Essential Mask\r\nREADY STOCK\r\n\r\nExp Date :\r\nCollagen ~ 2022-07-03\r\nLightbeam ~ 2022-03-24\r\nTea Tree ~ 2022-08-29\r\n\r\nVarian :\r\n- Tea Tree Healing Solution Essential Mask : menyejukkan kulit iritasi penyebab jerawat tanpa rasa lengket pada kulit.\r\n\r\n- Vita Lightbeam Essential Mask : tak hanya membuat kulit cerah, namun juga mengurangi garis halus akibat kerutan pada wajah Anda.\r\n\r\n- Collagen Impact Essential Mask : cocok digunakan untuk kulit iritasi dan kering, melembapkan dan menenangkan kulit. Wajah lebih segar, kencang, dan mulus.\r\n\r\nBarang yang kami jual 100% ORIGINAL.', '0000-00-00 00:00:00', '2020-06-06 05:21:50'),
(24, 'MEDIHEAL NMF Aquaring Ampoule / HDP Pore Stamping / WHP White Hydrating / Mediheal Sheetmask', 18000, 5, '1591446129.png', 'Exp Date :\r\nNMF ~ 2022-08-25\r\nHDP ~ 2022-08-26\r\nWHP ~ 2022-08-29\r\n\r\nManfaat  :\r\n- N.M.F Aquaring Ampoule Mask EX :\r\nMengencangkan kulit, mengecilkan pori, dan melembabkan kulit dengan kandungan hyaluronic dan ceramide. \r\n\r\n- W.H.P White Hydrating Black Mask EX :\r\nMengandung niacinamide untuk memutihkan wajah, dan arang untuk menarik kotoran keluar sehingga wajah menjadi cerah dan glowing.\r\n\r\n- H.D.P Pore Stamping Black Mask :\r\nMasker dengan base charcoal yang berfungsi mengontrol minyak & mengencangkan pori-pori.\r\n\r\nCara pemakaian :\r\n- Bersihkan wajah dengan facial wash\r\n- Gunakan masker selama 20 menit\r\n- Lepaskan masker lalu tunggu sampai kering\r\n- Tidak usah di bilas\r\n\r\nBarang yang kami jual 100% ORIGINAL.', NULL, '2020-06-06 05:22:09'),
(25, 'NATUREBY ESSENCE MASK SHEETMASK MASKER KOREA', 8500, 5, '1591446147.png', 'Natureby Essence Mask Sheet \r\nExp Date 2022-07-01\r\n\r\nManfaat :\r\n#Cucumber - mengecilkan pori-pori, melembutkan dan melembabkan kulit\r\n#Aloe - mencegah infeksi kulit dan melembabkan\r\n#Potato - kaya akan anti-oksidan, melindungi kulit dari radikal bebas\r\n#Collagen - melembutkan dan melembabkan kulit \r\n#Blueberry - kaya akan anti-oksidan, melindungi kulit dari radikal bebas\r\n#GreenTea - kaya akan anti-oksidan, melindungi kulit dari radikal bebas\r\n#RoyalJelly - kaya akan anti-oksidan, melindungi kulit dari radikal bebas\r\n#Pomegranate - melembutkan dan melembabkan kulit \r\n\r\nCara penggunaan :\r\n1. Cuci wajah dengan pembersih wajah terlebih dahulu lalu keringkan.\r\n2. Aplikasikan mask sheet di wajah, dan untuk cairan yg tersisa di kemasan bisa dioleskan di leher.\r\n3. Lepaskan mask sheet setelah 10~20 menit pemakaian.\r\n4. Usap cairan yang tersisa di wajah sambil di tekan halus sampai semua cairan meresap ke kulit.\r\n\r\nBarang yang kami jual 100% ORIGINAL.', NULL, '2020-06-06 05:22:27'),
(26, 'EUNYUL NATURAL MOISTURE MASK PACK MASKER SHEETMASK KOREA', 8500, 5, '1591446201.png', 'Eunyul Natural Moisture Mask Pack \r\nExp Date 2022-05-12\r\n\r\n🌵 Aloe: \r\n- Melembutkan dan menghidrasi kulit\r\n- Membuat kulit lebih lembab dan sehat\r\n- Paraben-free, Artificial color-free, Benzophenone-free, Mineral oil-free product.\r\n\r\n💛Collagen:\r\n- Menyegarkan kulit dan anti keriput\r\n- Paraben-free, Artificial color-free, Benzophenone-free, Mineral oil-free product.\r\n\r\n🥒Cucumber:\r\n- Menyeimbangkan pH kulit\r\n- Memberikan kelembaban instan pada kulit\r\n- Paraben-free, Artificial color-free, Benzophenone-free, Mineral oil-free product.\r\n\r\n🍵 Green Tea:\r\n- Melembutkan kulit yang teriritasi\r\n- Paraben-free, Artificial color-free, Benzophenone-free, Mineral oil-free product.\r\n\r\n🍯 Honey:\r\n- Mencerahkan dan membuat kulit lebih sehat\r\n- Memberikan nutrisi lebih untuk melembabkan kulit\r\n- Paraben-free, Artificial color-free, Benzophenone-free, Mineral oil-free product.\r\n\r\n⚪️ Pearl:\r\n- Menjadikan kulit cerah dan bersinar\r\n- Paraben-free, Artificial color-free, Benzophenone-free, Mineral oil-free product.\r\n\r\n💛 Coenzyme Q10:\r\n- Membuat kulit menjadi lembab, cerah dan bercahaya\r\n- Paraben-free, Artificial color-free, Benzophenone-free, Mineral oil-free product.\r\n\r\n🍋 Vitamin:\r\n- Memberikan ekstra vitamin untuk melembabkan kulit\r\n- Paraben-free, Artificial color-free, Benzophenone-free, Mineral oil-free product.\r\n\r\nBarang yang kami jual 100% ORIGINAL.', NULL, '2020-06-06 05:23:21'),
(27, 'LANEIGE WATER BANK GEL CREAM', 24000, 6, '1591446218.png', 'LANEIGE Water Bank Gel Cream\r\n- Untuk kulit kombinasi / berminyak\r\n- Merupakan pelembab yang bertekstur gel (lebih ringan dibanding cream)\r\n- Kandungan pelembab yang kuat mampu melembabkan wajah meresap hingga ke lapisan dalam dengan hasil yang tidak sticky\r\n- Produk ini dapat memberikan kelembaban bebas kilap minyak yang ringan dan menyegarkan\r\n- Menyehatkan, kulit menjadi halus lembab dan kenyal\r\n- Dapat digunakan sebagai base makeup, makeup jadi lebih tahan lama dan flawless\r\n\r\nUrutan Pakai :\r\nHydro Essence -> Eye Gel -> Gel Cream\r\n\r\nTidak diuji pada hewan, dan tidak mengandung parabens dan phtalates.\r\n\r\nBarang yang kami jual 100% ORIGINAL.', NULL, '2020-06-06 05:23:38'),
(28, 'COSRX Oil-Free Ultra-Moisturizing Lotion (with Birch Sap) 20ml', 72000, 6, '1591446236.png', '100% Original dan BPOM\r\nBukan kemasan share in jar, dijamin steril.\r\n\r\nCosrx OIL-FREE Ultra-Moisturizing Lotion (with Birch Sap) merupakan pelembap all-in-one yang dirancang untuk menghidrasi dengan teksturnya yang mudah merata dan menyerap ke dalam kulit sehingga memberikan kelembutan dan silky finish pada kulit.\r\n\r\nCosrx OIL-FREE Ultra-Moisturizing memperbaiki warna dan tekstur kulit serta membuat masalah-masalah kulitmu hilang.\r\n\r\nHow to Use:\r\nTuang produk ke telapak tangan secukupnya, kemudian usap ke seluruh wajah. Tepuk wajah perlahan agar produk dapat menyerap secara sempurna\r\n\r\nCocok untuk segala jenis kulit.', NULL, '2020-06-06 05:23:56'),
(29, 'Some By Mi Yuja Niacin Brightening Sleeping Mask 60 gr Somebymi Full Size and Travel Size 15 gr', 200000, 6, '1591446283.png', 'Some By Mi Yuja Niacin Brightening Sleeping Mask\r\nExpired : AGUSTUS 2022\r\n\r\n🌜 Cukup oleskan ke kulit dan tidurlah 🌛\r\nPerawatan kulit cerah Intensif hanya semalam!\r\n\r\nKandungan dalam Yuja Niacin Sleeping Mask :\r\n ✔️Goheung Yuja (citron) ekstrak 70% : Kaya akan nutrisi dan kelembaban, ekstrak Citron meningkatkan tingkat kelembaban dan menghaluskan kulit\r\n ✔️Niacinamide 5% : Mengandung 5% bahan pencerah kulit untuk meningkatkan efek cerah\r\n ✔️Glutathione / Arbutin : Membantu merancang kulit bercahaya dan halus\r\n ✔️10 jenis vitamin : Atasi kulit Anda yang stres dari stimulus eksternal\r\n ✔️Yuja (sitron)\r\n\r\n\r\n ✨ Manfaat Yuja Niacin Sleeping Mask ✨\r\n 1. Perawatan Pencerah Khusus\r\n Mengandung Niacinamide, bahan untuk memberikan efek mencerahkan dan Ekstrak Yuja (citrus Junos Fruit) dari Goheung, bahan yang efektif untuk memberi nutrisi dan menghidrasi\r\n\r\n 2. Mencerahkan dan Melembabkan (2 in 1)\r\n Mengandung bahan-bahan cerah yang dilengkapi dengan bahan pelembab yang dipatenkan yang membantu kulit bersinar dan melembabkan\r\n\r\n 3. Aroma alami dari serai manis dan segar\r\n Aroma kulit Yuja (sitron) asli 100% membantu Anda tidur nyenyak\r\n\r\n 4. Perawatan tidur segar\r\n Tekstur yang ringan dan formula yang menyerap cepat tidak akan meninggalkan noda pada bantal Anda', NULL, '2020-06-06 05:24:43'),
(30, 'Some By Mi AHA BHA PHA Cream', 156000, 6, '1591446433.png', 'Some By Mi AHA BHA PHA 30 Days Miracle Toner (106gr)\r\nHanya dalam 30 hari saja Anda akan mendapatkan semua manfaatnya. Digunakan secara rutin setiap pagi dan malam.\r\n\r\nMengandung AHA, BHA, dan PHA\r\n- AHA berguna untuk menghilangkan kotoran dan serpihan kering dari permukaan wajah.\r\n- BHA berguna untuk kotoran tersumbat dan sebum (minyak) pada pori-pori wajah.\r\n- PHA berguna untuk mencegah kulit kering dan menghancurkan sel kulit mati.\r\n\r\nMengandung 10,000 ppm ekstrak natural pohon teh yang memperbaiki kesehatan kulit wajah secara signifikan.\r\n\r\nSangat dianjurkan untuk Anda yang :\r\n- Menginginkan kehalusan kulit wajah tanpa iritasi\r\n- Makeup yang tidak rata akibat permukaan wajah yang kasar\r\n- Tidak pede akibat kulit wajah yang kusam dan pori-pori yang besar\r\n- Kesal akibat komedo\r\n- Tidak puas akibat kulit wajah yang berminyak\r\n- Menginginkan kulit wajah yang segar tanpa lengket\r\n- Frustasi akibat produk skincare yang mahal tanpa efek', NULL, '2020-06-06 05:27:13'),
(31, 'Some By Mi Snail Truecica Cream', 180000, 1, '1591446496.png', '🌼 Some By Mi Snail Truecica Miracle Repair Cream (60gr)\r\nExp Des 2022\r\nCream pagi dan malam, whitening dan anti keriput untuk kulit berjerawat dan bopeng\r\nFungsi :\r\n* Mengikat sel-sel kulit menjadi satu\r\n* Membentuk lapisan pelindung yang menahan kelembapan kulit\r\n* Membuat kulit menjadi kenyal\r\n* Menjaga kulit dari bakteri dan ancaman-ancaman kulit lainnya\r\n* Menenangkan kulit (secara cepat menenangkan kulit iritasi atau sensitif)\r\n* Lendir \"Black snail\" memberikan nutrisi dan menguatkan kulit secara natural\r\n* Marine Collagen + 5 types of Ceramide + Vegetable Peptides meningkatkan skin barrier', NULL, '2020-06-06 13:07:11'),
(32, 'Nature Republic Aloe Vera Soothing Gel', 75000, 6, '1591447719.png', 'Nature Republic Aloe Vera 92% Soothing Gel 300ml - Orignal Korea 100%\r\nMengandung 92% ekstrak lidah buaya. Formula yang bebas dari paraben, mineral dan pewarna buatan. Gel yang menyerap cepat dan memberi kesan menyegarkan pada kulit. Efek menenangkan dan melembabkan ke kulit sensitif. \r\n\r\nDapat di gunakan untuk :\r\nRambut / wajah / tubuh.\r\n\r\nManfaat terbaik : \r\n- Moisturizing cream & Mask pack\r\n- Base make up\r\n- Krim setelah dicukur\r\n- Perawatan Rambut \r\n- Meredakan Mata bengkak\r\n- Essence kuku\r\n- Perawatan Tubuh (pelembab tubuh)\r\n- Masker untuk meredakan pembakaran krn sinar matahari Tidak memberi rasa lengket tapi relaxed', NULL, '2020-06-06 05:48:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `text`, `created_at`, `updated_at`) VALUES
(8, 4, 4, 'Mangstap bebii\r\naw', '2020-06-06 11:31:16', '2020-06-06 11:31:16'),
(9, 4, 8, 'Mangstap bebii\r\naw', '2020-06-06 11:31:16', '2020-06-06 11:31:16'),
(10, 4, 15, 'mantap', '2020-06-06 13:30:53', '2020-06-06 13:30:53'),
(11, 4, 7, 'mantap', '2020-06-07 11:35:08', '2020-06-07 11:35:08'),
(12, 4, 26, 'mantap', '2020-06-07 11:35:09', '2020-06-07 11:35:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `address`, `state_id`, `email`, `email_verified_at`, `role`, `password`, `status_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'adminn', '12345678900', NULL, NULL, 'adminn@example.com', NULL, 'admin', '$2y$10$BnccO4aZbTPn/L8EsAok.u/n07bAhm2nul2gMICuGZ479SROawQoi', NULL, NULL, '2020-06-06 04:50:04', '2020-06-06 04:50:04'),
(2, 'customer', '12345678910', 'Jl Ahmad Yani, 57, Surabaya', NULL, 'cutomer@example.com', NULL, 'customer', 'customer', NULL, NULL, NULL, NULL),
(4, 'Rochimatus Sa\'diyah', '085785068842', NULL, NULL, 'rochimatus@example.com', NULL, 'customer', '$2y$10$XjBDHUVR5vsGkR13n2JWJu43zg27ygsOiHPKEyDJRXxay0WQjdX5a', NULL, NULL, '2020-06-06 11:17:55', '2020-06-06 11:17:55'),
(5, 'Customer', '086173594211', NULL, NULL, 'customer@example.com', NULL, 'customer', '$2y$10$bA7HpdVTDvKeZmVzewAxh.ybY9zliQIo67p/DcTiA3tmg7os821Ii', NULL, NULL, '2020-06-07 12:59:10', '2020-06-07 12:59:10');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_orders_order_id_foreign` (`order_id`),
  ADD KEY `detail_orders_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `detail_orders`
--
ALTER TABLE `detail_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD CONSTRAINT `detail_orders_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
