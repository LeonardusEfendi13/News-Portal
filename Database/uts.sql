-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Okt 2021 pada 15.23
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'Admin1', '827ccb0eea8a706c4c34a16891f84e7b', 'Maxine Fishcer'),
(4, 'Admin2', '01cfcd4f6b8770febfb40cb906715822', 'Chloe Felicity');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(5) NOT NULL,
  `id_admin` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `id_admin`, `nama`, `email`, `password`, `tgl_lahir`, `status`, `image_url`, `gender`) VALUES
(33, 0, 'Faye Bosconovitch', 'faye.bosconovitch@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2003-07-19', 'Aktif', 'IMG-6162cbce10c5c3.34492211.jpg', 'Pria'),
(35, 0, 'Hatsune Miku', 'mikutella@gmail.com', 'ab56b4d92b40713acc5af89985d4b786', '2007-08-31', 'Aktif', 'IMG-6162cc68b86392.41019670.jpg', 'Wanita'),
(39, 0, 'Kizuna AI', 'ai@gmail.com', 'e684b7d87e24e163ca6d63f44cb2b1e2', '2016-12-31', 'Aktif', 'IMG-61642c60b67249.30098648.jpg', 'Wanita');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `id_admin` int(5) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `tgl_posting` datetime NOT NULL,
  `text_berita` longtext NOT NULL,
  `dilihat` int(11) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `id_kategori`, `id_admin`, `judul`, `tgl_posting`, `text_berita`, `dilihat`, `gambar`) VALUES
(1, 1, 1, 'Tahun Depan, 43,5 Hektar Ruang Kantor Baru Padati Jakarta', '2021-09-25 16:24:18', 'JAKARTA, PORTAL - Pasokan gedung perkantoran baru di Jakarta akan meningkat pada tahun 2022 bahkan mencapai 435.000 meter persegi atau setara dengan 43,5 hektar.  Hal ini disampaikan Senior Associate Director Research Colliers International Indonesia Ferry Salanto dalam konferensi pers Kondisi Pasar Properti Jakarta dan Bodetabek, Rabu (6/10/2021)\r\n\r\n“Pasokan gedung perkantoran pada tahun 2022 cukup besar karena pembangunan gedung yang tertunda dari tahun sebelumnya akan rampung tahun depan,” jelas Ferry. Menurutnya, total pasokan baru pada tahun depan diperkirakan mencapai 435.000 meter persegi. Sekitar 78 persen di antaranya berada di Central Business District (CBD) atau Kawasan Bisnis Terpadu.\r\n\r\nSetelah tahun 2020, pertumbuhan pasokan kantor baru akan cenderung terbatas pada periode waktu tahun 2024 hingga 2025. “Kalau dilihat dari rata-rata tambahan kantor hingga tahun 2025 sedikit melegakan karena selama ini pasokan gedung kantor yang berlebihan padahal tingkat keterisiannya rendah,” jelas Ferry. Namun Ferry menerangkan kondisi ini bisa berubah berdasarkan kondisi penjualan dan sewa gedung perkantoran pada tahun 2022 hingga 2023.\r\n', 1, 'Berita Nasional di Indonesia.jpg'),
(9, 5, 1, 'Hal yang Perlu Kamu Ketahui di Genshin Impact 2.2 Mendatang', '2021-10-02 06:14:12', 'JAKARTA, PORTAL - Setelah Geshin Impact melakukan update ke versi 2.1 pada 1 September 2021, kini sudah terdapat bocoran untuk update versi 2.2 mendatang. Namun, versi 2.2 kali ini tidak semeriah versi sebelumnya yang membuka Pulau Inazuma dan menghadirkan karakter baru seperti Raiden Shogun.\r\n\r\nMeskipun begitu, kamu juga harus tahu apa saja yang akan hadir pada update versi selanjutnya. Berikut adalah bocoran mengenai Genshin Impact versi 2.2 yang rumornya akan hadir pada 13 Oktober 2021 mendatang.\r\n\r\n1. Pulau Tsurumi (Tsurumi Island) adalah pulau di Inazuma yang diceritakan sebagai pulau yang menyimpan banyak misteri di dalamnya. Pulau ini telah dikelilingi oleh kabut tebal, dan sudah bertahun-tahun tidak ada orang yang berani menjelajah ke sana. Sehingga, Pulau Tsurumi akan menjadi tantangan tersendiri bagi para traveler yang ingin menjelajah.\r\n\r\nSebenarnya Pulau Tsurumi sudah diumumkan saat update versi 1.6 melalui acara spesial yang diselenggarakan oleh pihak miHoYo sebagai bocoran Inazuma. Serta, Pulau Tsurumi juga sebagai pulau terakhir yang akan terbuka di region Inazuma.\r\n\r\n2. Bagi kalian yang sudah menyelesaikan Quest Archon di Pulau Inazuma, pasti kalian tidak asing dengan Thoma. Ya, seorang pelayan yang bekerja untuk klan Kamisato dimana dia sampai harus berurusan dengan Raiden Shogun. Thoma sendiri aslinya berasal dari Mondstadt yang kemudian datang ke Inazuma.\r\n\r\nPerlu diketahui Thoma sendiri adalah karakter 4-bintang (4-star) dengan senjatanya yang berjenis polearm. Elemen yang dikuasainya adalah pyro atau yang mengendalikan api. Rencananya, Thoma akan dijadikan banner pada versi 2.2 mendatang.\r\n\r\nBagi kalian yang sudah menyelesaikan Quest Archon di Pulau Inazuma, pasti kalian tidak asing dengan Thoma. Ya, seorang pelayan yang bekerja untuk klan Kamisato dimana dia sampai harus berurusan dengan Raiden Shogun. Thoma sendiri aslinya berasal dari Mondstadt yang kemudian datang ke Inazuma.\r\n\r\nSeperti itulah bocoran mengenai update versi 2.2 yang direncanakan hadir pada 13 Oktober 2021. Dimana versi tersebut bisa jadi sebagai akhir petualangan traveler di Inazuma dan akan pergi ke region selanjutnya.\r\n\r\nOleh karena itu, kita tunggu saja informasi dan pengumuman resmi dari pihak miHoYo mengenai update versi 2.2 ini.', 1, 'Genshin Impact 2.2.png'),
(29, 11, 4, 'Art is A New Lifestyle', '2021-10-09 06:11:10', 'Pada zaman sekarang sebuah seni sudah menjadi sebuah gaya hidup baru. Baik seni tradisional, seni modern, hingga seni digital. \r\n\r\nDi era serba teknologi sekarang ini, mulai berkembangnya seni digital dalam kehidupan sehari - hari. Seni digital dapat berupa poster, animasi, hingga artwork yang dibuat oleh para seniman digital. Tidak heran, jika seni digital kedepannya akan semakin maju mengalahkan seni tradisional dan seni modern.', 1, 'Art is A New Lifestyle.jpg'),
(36, 11, 4, 'Teralis Tanaman, Apakah Penting?', '2021-10-11 13:36:37', 'Meski awalnya tumbuh “normal,” lama kelamaan tanaman merambat seperti monster atau pothos bisa tumbuh tak beraturan. Jika tanaman sudah tumbuh tak beraturan seperti itu, dibutuhkan sebuah teralis tanaman yang dipasang di penanam, dinding, atau dilampirkan ke kotak penanam. Cara ini berguna demi membuat tanaman rambat tumbuh teratur sembari menampilkan keindahan alami tanaman yang kita rawat.\r\n\r\nTerlepas dari di dalam rumah atau di halaman kita, teralis tanaman akan membantu tanaman untuk tumbuh secara vertikal dan menyediakan dukungan yang dibutuhkan untuk membuatnya berkembang. Tanaman seperti pothos, philodendron, ivy, dan tanaman hias dalam ruangan lainnya akan diuntungkan dari sistem teralis ini.\r\n\r\nBegitu pula dengan tanaman di luar ruangan, seperti hydrangea, clematis, dan ivy yang akan dengan senang hati “memanjat” teralis itu. Lantas, agar tanaman tumbuh lebih baik, pasang teralis tanaman freestanding saat tanaman dalam ruangan masih berusia muda atau baru menyebar. Sebab, tanpa teralis, tanaman merambat seperti pothos akan terkulai dan batang tanaman Swiss cheese akan menyebar.', 1, 'adfasdf.png'),
(42, 6, 4, 'Jaga Tekanan Darah Jadi Kunci Penderita Hipertensi Terhindar Ancaman Gangguan Fungsi Ginjal ', '2021-10-11 13:51:30', 'Tekanan darah tinggi atau hipertensi memiliki hubungan yang erat dengan ginjal. Tekanan darah yang tidak terkontrol dalam jangka waktu lama menyebabkan komplikasi gangguan fungsi ginjal. Sebaliknya, penyakit ginjal kronik dapat menyebabkan peningkatan tekanan darah. Mekanismenya adalah tekanan darah yang tinggi atau tidak terkontrol membuat kerusakan pada pembuluh darah ginjal. Dengan demikian, aliran darah yang membawa nutrisi dan oksigen ke ginjal terganggu. Akibatnya, fungsi ginjal sebagai organ yang membersihkan sampah darah dan mengatur keseimbangan cairan tubuh terganggu. Dokter spesialis penyakit dalam di Mayapada Hospital Tangerang, dr Ratna Juliawati Soewardi, SpPD-KGH menjelaskan bahwa gangguan fungsi ginjal yang disebabkan hipertensi merupakan penyakit ginjal kronis yang tidak dapat disembuhkan. Ia pun mengumpamakan penyakit hipertensi dan ginjal seperti keberadaan ayam dan telur. Sebab, terkadang sulit diketahui penyakit mana yang terlebih dahulu diderita pasien. “Ada pasien yang dari muda telah memiliki gangguan ginjal tanpa disadari kondisi kreatinin-nya naik disertai dengan peningkatan tekanan darah sehingga menjadi hipertensi,” ujar dr Ratna saat dihubungi Kompas.com, Kamis (16/9/2021). Pada gangguan fungsi ginjal ringan sampai sedang tidak memiliki gejala khusus. Dokter Ratna mengatakan banyak pasien yang datang tanpa menyadari bahwa ia memiliki gangguan fungsi ginjal. “Pada umumnya, penyakit ginjal yang disebabkan hipertensi atau penyakit lain memiliki gejala yang sama. Pada stadium ringan sampai sedang, gangguan ginjal tidak memiliki gejala spesifik,” kata dr Ratna. Lebih lanjut, dr Ratna mengatakan bahwa biasanya pasien akan merasakan gejala jika gangguan fungsi ginjal sudah memasuki stadium akhir. Adapun beberapa gejala yang dirasakan, seperti air seni berbusa, kaki kerap bengkak, cepat lelah, tidak nafsu makan, mual, muntah, dan sering sesak napas.', 1, 'qqqq.jpg'),
(43, 19, 4, 'Ekspor Ikan Hias Asal Bandung Tembus ke 33 Negara', '2021-10-11 13:56:40', 'Tren ikan hias berangsur meningkat sejak adanya pandemi Covid-19 di Indonesia. Tak hanya Tanah Air tren ini juga merambah mancanegara sehingga mampu mendorong tingkat ekspor ikan hias dari Indonesia.\r\n\r\nSalah satu yang diuntungkan adalah sektor ikan hias asal Kota Bandung yang mencatatkan perolehan signifikan dengan merambah 33 negara. Diketahui, nilai ekspor tersebut mencapai Rp 9,2 miliar hanya dalam kurun waktu sepanjang September 2021.\r\n\r\nKepala Badan Karantina Ikan, Pengendalian Mutu dan Keamanan Hasil Perikanan (BKIPM) Kementerian Kelautan dan Perikanan (KKP), Rina memaparkan selama periode 1-24 September 2021, hampir 2 juta ekor ikan hias diekspor dari Kota Kembang.\r\n\r\n\"Ekspor ikan hias dari Bandung telah menjangkau 33 negara di dunia, tentu ini prestasi yang patut kita jaga dan tingkatkan,\" kata Rina saat mengurai data Sistem Karantina Ikan (Siskarin) BKIPM, Rabu (6/10/2021).\r\n\r\nRina menambahkan, selama periode 1-24 September, Unit Pelaksana Teknis (UPT) BKIPM di Bandung juga telah menerbitkan 95 health certificate atau sertifikat kesehatan ikan. Nilai ekspor yang dihasilkan dari komoditas ikan hias tersebut mencapai Rp 9,2 miliar.\r\n\r\n\"Ikan-ikan yang diekspor berasal dari unit usaha yang telah tersertifikasi IKI dan CKIB grade A dan B. Jadi bisa dipastikan bahwa ikan-ikannya memang kualitas bagus,\" sambungnya.', 1, 'a1.jpg'),
(44, 19, 1, 'Bursa Saham Asia Tergelincir pada Awal Pekan', '2021-10-11 14:00:43', 'Bursa saham Asia Pasifik melemah pada perdagangan Senin pagi (11/10/2021) seiring investor mencermati reaksi pasar terhadap rilis data tenaga kerja Amerika Serikat (AS) yang belum sesuai harapan.\r\n\r\nDi Jepang, indeks Nikkei 225 turun 0,53 persen, indeks Topix mendatar. Di sisi lain, indeks Australia ASX 200 merosot 0,94 persen.\r\n\r\nIndeks MSCI Asia Pasifik di luar Jepang merosot 0,23 persen. Indeks Korea Selatan Kospi libur pada awal pekan ini. Demikian dikutip dari laman CNBC, Senin (11/10/2021).\r\n\r\nAdapun data nonfarm payrolls AS naik hanya 194.000 pada September, turun tajam dari prediksi ekonom Dow Jones sebesar 500.000, demikian laporan Departemen Tenaga Kerja.\r\n\r\nSementara itu, tingkat pengangguran turun menjadi 4,8 persen dan itu di atas harapan pasar 5,1 persen dan terendah sejak Februari 2020.', 1, 'A2.jpg'),
(45, 8, 1, 'Lomba Debat Siswa Nasional 2021 Asah Kemampuan Kritis Siswa', '2021-10-11 14:03:03', 'Kompetisi debat siswa nasional 2021, Lomba Debat Bahasa Indonesia (LDBI) dan National Schools Debating Championship (NSDC) secara resmi telah dibuka pada 3 Oktober 2021. Mengusung tema \"Speak of Your Mind, Speak for Indonesia\", LDBI dan NSDC yang diadakan Pusat Prestasi Nasional (Puspresnas) Kemendikbud Ristek tahun ini diikuti peserta 3.207 siswa untuk LDBI dan 2.150 siswa untuk NSDC. LDBI dilaksanakan sejak tanggal 3-9 Oktober 2021, sedangkan NSDC dilakukan tanggal 11-17 Oktober 2021 dan diikuti siswa dari 34 provinsi dan 7 SILN (Sekolah Indonesia Luar Negeri). Tahun ini, SILN yang mengikuti LDBI dan NSDC tingkat provinsi yaitu SILN Singapura, Kinabalu dan Kuala Lumpur-Malaysia, Bangkok-Thailand, Cairo serta Riyadh dan Jeddah-Arab Saudi. Plt. Kepala Puspresnas, Asep Sukmayadi menyampaikan (4/10/2021), LDBI dan NSDC ini telah diselenggarakan secara rutin lebih dari satu dekade. \"Kegiatan ini bertujuan melatih kemampuan berpikir kritis, kreatif, analitis, konstruktif, dan responsif terhadap isu-isu aktual yang sedang berkembang, baik nasional maupun internasional,\" ungkap Asep.', 1, 'A3.jpg'),
(46, 2, 1, 'Malaysia Izinkan Warganya ke Luar Negeri Mulai 11 Oktober 2021', '2021-10-11 14:12:57', 'Otoritas Malaysia mengizinkan warganya yang ingin melakukan perjalanan ke luar negeri mulai Senin (11/10/2021). Hal ini dikhususkan pada 90 persen populasi orang dewasanya yang telah disuntik vaksin COVID-19 penuh.\r\n\r\nDikutip dari laman straitstimes, dalam siaran nasional pada Minggu 10 Oktober, telah disebutkan bahwa Malaysia menandai pencapaian target imunisasi. Perdana Menteri Ismail Sabri Yaakob juga berjanji bahwa relaksasi progresif pembatasan pandemi tidak akan dibalik, meskipun ada lonjakan infeksi.\r\n\r\n\"Saya ingin meyakinkan semua orang bahwa bisnis dan mata pencaharian akan berjalan normal. Kalaupun kasusnya naik, kami hanya akan fokus (pembatasan) pada area tertentu,\" katanya.\r\n\r\n\"Pembukaan kembali akan terus dilakukan meskipun ada lonjakan, tetapi kami dapat memastikan tidak ada penutupan sama sekali jika kami mematuhi SOP,\" tambahnya.\r\n\r\nWarga Malaysia yang divaksinasi lengkap, bersama dengan anak-anak mereka, akan diizinkan melakukan perjalanan domestik ke seluruh negeri.\r\n\r\n\"Yang mau jalan-jalan ke luar negeri juga bisa. Namun, karantina wajib 14 hari tetap berlaku bagi siapa pun yang memasuki Malaysia.\"', 1, 'a5.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `iklan`
--

CREATE TABLE `iklan` (
  `id_iklan` int(5) NOT NULL,
  `id_admin` int(5) NOT NULL,
  `nm_perusahaan` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `isi_iklan` text NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `link` text NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `iklan`
--

INSERT INTO `iklan` (`id_iklan`, `id_admin`, `nm_perusahaan`, `gambar`, `isi_iklan`, `tgl_mulai`, `tgl_selesai`, `link`, `status`) VALUES
(1, 1, 'miHoYo Corp.', 'miHoYo Corp..png', 'Mainkan Genshin Impact dan Honkai Impact 3rd sekarang juga!!', '2021-10-04', '2021-10-11', 'https://genshin.mihoyo.com/', 'Tidak Aktif'),
(3, 1, 'CAPCOM', 'CAPCOM.jpg', 'Buy and get Resident Evil VIII just for IDR 100.000', '2021-10-05', '2021-10-12', 'https://capcom.com', 'Aktif'),
(6, 1, 'Ojek Online', 'Ojek Online.jpg', 'Yuk!! Mulai gunakan aplikasi Ojek Online untuk memudahkan keseharianmu setiap hari. Aplikasi dapat didownload di App Store terdekat', '2021-10-09', '2021-10-16', 'https://ojol.com', 'Aktif'),
(7, 1, 'Ayam Goyeng', 'Ayam Goyeng.jpg', 'Belilah ayam goreng di toko Ayam Goyeng!! Ga cuma ayam, masih ada goyengan lain juga', '2021-10-11', '2021-10-18', 'https://goyeng.com', 'Aktif'),
(8, 1, 'MoneyMaker', 'MoneyMaker.jpg', 'Mau dapetin uang cuma lewat HP? Buruan download aplikasi MoneyMaker biar Anda cepat kaya!! Chuakz...', '2021-10-12', '2021-10-20', 'https://money.co.id', 'Aktif'),
(9, 4, 'OnDat', 'OnDat.jpg', 'Masih jomblo? Atau kepengen nikah? Mending cari jodoh online saja....', '2021-10-08', '2021-10-22', 'onlinedating.com', 'Aktif'),
(10, 4, 'Servis AC', 'Servis AC.jpg', 'AC Anda panas? Atau AC Anda sudah rusak? Kami menyediakan jasa servis AC dengan waktu pengerjaan cukup satu hari.\r\nNo Tlp: 021-123-456-789', '2021-10-05', '2021-10-19', '', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Nasional'),
(2, 'Internasional'),
(3, 'Politik'),
(4, 'Teknologi'),
(5, 'Games'),
(6, 'Kesehatan'),
(8, 'Edukasi'),
(9, 'Anak - Anak'),
(11, 'Lifestyle'),
(14, 'Furniture'),
(19, 'Bisnis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_berita` int(5) NOT NULL,
  `id_anggota` int(5) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tgl_komentar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `iklan`
--
ALTER TABLE `iklan`
  ADD PRIMARY KEY (`id_iklan`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_berita` (`id_berita`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_berita_2` (`id_berita`),
  ADD KEY `id_anggota_2` (`id_anggota`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `iklan`
--
ALTER TABLE `iklan`
  MODIFY `id_iklan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berita_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `iklan`
--
ALTER TABLE `iklan`
  ADD CONSTRAINT `iklan_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_berita`) REFERENCES `berita` (`id_berita`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
