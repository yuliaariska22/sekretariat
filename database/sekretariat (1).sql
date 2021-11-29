-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Nov 2021 pada 18.19
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekretariat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bidang_opd`
--

CREATE TABLE `tbl_bidang_opd` (
  `id_bidang_opd` int(11) NOT NULL,
  `nama_bidang` varchar(128) NOT NULL,
  `id_opd` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_bidang_opd`
--

INSERT INTO `tbl_bidang_opd` (`id_bidang_opd`, `nama_bidang`, `id_opd`) VALUES
(1, 'Bidang Pendapatan', '035'),
(2, 'Bidang Akuntansi', '035'),
(3, 'Bidang Perbendaharaan', '035'),
(4, 'Bidang Anggaran', '035'),
(5, 'Bidang Pengelolaan Barang Milik Daerah', '035'),
(6, 'Sekretariat', '035');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detailpegawai`
--

CREATE TABLE `tbl_detailpegawai` (
  `nip` varchar(128) NOT NULL,
  `tempat_lahir` varchar(350) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(350) DEFAULT NULL,
  `agama` varchar(350) DEFAULT NULL,
  `status_perkawinan` varchar(350) DEFAULT NULL,
  `alamatrumah_jalan` varchar(350) DEFAULT NULL,
  `alamatrumah_kelurahan` varchar(200) DEFAULT NULL,
  `alamatrumah_kecamatan` varchar(200) DEFAULT NULL,
  `alamatrumah_kota` varchar(100) DEFAULT NULL,
  `alamatrumah_provinsi` varchar(250) DEFAULT NULL,
  `keteranganbadan_tinggi` varchar(350) DEFAULT NULL,
  `keteranganbadan_berat` varchar(350) DEFAULT NULL,
  `keteranganbadan_rambut` varchar(128) DEFAULT NULL,
  `keteranganbadan_bentukmuka` varchar(250) DEFAULT NULL,
  `keteranganbadan_warnakulit` varchar(250) DEFAULT NULL,
  `keteranganbadan_ciricirikhas` varchar(250) DEFAULT NULL,
  `keteranganbadan_cacattubuh` varchar(250) DEFAULT NULL,
  `hobby` varchar(250) DEFAULT NULL,
  `jeniskepegawaian` varchar(200) DEFAULT NULL,
  `nama_berkas` varchar(350) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_detailpegawai`
--

INSERT INTO `tbl_detailpegawai` (`nip`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `status_perkawinan`, `alamatrumah_jalan`, `alamatrumah_kelurahan`, `alamatrumah_kecamatan`, `alamatrumah_kota`, `alamatrumah_provinsi`, `keteranganbadan_tinggi`, `keteranganbadan_berat`, `keteranganbadan_rambut`, `keteranganbadan_bentukmuka`, `keteranganbadan_warnakulit`, `keteranganbadan_ciricirikhas`, `keteranganbadan_cacattubuh`, `hobby`, `jeniskepegawaian`, `nama_berkas`) VALUES
('00101', 'a', '2021-09-02', 'a', 'a', 'a', 'a', 'a', 'aa', 'a', 'a', 'a', 'a', 'a', 'as', 'a', 'a', 'a', 'a', 'a', NULL),
('00102', 'a', '2021-09-02', 'a', 'a', 'a', 'a', 'a', 'aa', 'a', 'a', 'a', 'a', 'a', 'as', 'a', 'a', 'a', 'a', 'a', NULL),
('00103', 's', '2021-09-15', 'Laki-laki', 's', 'Belum Kawin', 's', 's', 's', 's', 's', 's', 's', 'ss', 's', 's', 's', 's', 's', 's', 'i1.jpg'),
('00104', 'a', '2021-09-02', 'a', 'a', 'a', 'a', 'a', 'aa', 'a', 'a', 'a', 'a', 'a', 'as', 'a', 'a', 'a', 'a', 'a', NULL),
('00105', 'a', '2021-09-02', 'a', 'a', 'a', 'a', 'a', 'aa', 'a', 'a', 'a', 'a', 'a', 'as', 'a', 'a', 'a', 'a', 'a', NULL),
('197903072005021002', 'a', '2021-09-08', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', NULL),
('198510032008012001', 'a', '2021-09-08', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', '1.JPG'),
('198510052010011028', 'a', '2021-09-08', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_disiplin`
--

CREATE TABLE `tbl_disiplin` (
  `id` int(11) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `tahun` varchar(128) NOT NULL,
  `tingkat` varchar(128) NOT NULL,
  `jenis` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_drh_keteranganlain`
--

CREATE TABLE `tbl_drh_keteranganlain` (
  `id` int(11) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `nama_keterangan` varchar(128) NOT NULL,
  `surat_keterangan` varchar(128) NOT NULL,
  `no_surat_keterangan` varchar(128) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_du_kepangkatan`
--

CREATE TABLE `tbl_du_kepangkatan` (
  `id` int(11) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `tahun` varchar(128) NOT NULL,
  `urutan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_karyatulis`
--

CREATE TABLE `tbl_karyatulis` (
  `id` int(11) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `tahun` varchar(128) NOT NULL,
  `judul` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_keluarga`
--

CREATE TABLE `tbl_keluarga` (
  `id` int(11) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `kategori` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(128) NOT NULL,
  `tempat_lahir` varchar(128) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pekerjaan` varchar(128) NOT NULL,
  `ket` varchar(128) NOT NULL,
  `status` varchar(128) NOT NULL,
  `tanggal_nikah` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kursus`
--

CREATE TABLE `tbl_kursus` (
  `id` int(128) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `nama_kursus` varchar(128) NOT NULL,
  `lama_kursus` varchar(128) NOT NULL,
  `ijazah_tahun` date NOT NULL,
  `tempat` varchar(128) NOT NULL,
  `ket` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master`
--

CREATE TABLE `tbl_master` (
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_master`
--

INSERT INTO `tbl_master` (`username`, `password`) VALUES
('bakeudapsp', 'bakeudapsp');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(128) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `nip`, `menu`) VALUES
(8, '196905011993031004', '- Pengaturan - Menu'),
(46, '001', '- Pengaturan - Menu'),
(76, '00106', '- Barang Persediaan - Pengajuan Pengadaan'),
(77, '00104', '- Barang Persediaan - Konfirmasi Pengadaan'),
(78, '00103', '- Barang Persediaan - Pengajuan Pengadaan'),
(79, '00103', '- Barang Persediaan - Laporan Pengadaan'),
(80, '00103', '- Barang Persediaan - Pengajuan Permintaan Bidang'),
(81, '00106', '- Barang Persediaan - Pengajuan Permintaan Bidang'),
(82, '00106', '- Barang Persediaan - Cetak Surat Penyaluran'),
(83, '00103', '- Barang Persediaan - Cetak Surat Penyaluran'),
(84, '00104', '- Barang Persediaan - Konfirmasi Penyaluran'),
(85, '00106', '- Barang Persediaan - Laporan Penyaluran'),
(86, '00103', '- Barang Persediaan - Cetak Surat Pengadaan'),
(87, '196905011993031004', '- Pegawai - Verifikasi Data Pegawai'),
(88, '197604052009011001', '- Aset - KIB A'),
(89, '197604052009011001', '- Aset - KIB B'),
(90, '197604052009011001', '- Aset - Laporan Aset'),
(91, '197604052009011001', '- Pegawai - Verifikasi Data Pegawai'),
(92, '197903072005021002', '- Barang Persediaan - Pengajuan Pengadaan'),
(93, '197903072005021002', '- Barang Persediaan - Cetak Surat Pengadaan'),
(94, '197903072005021002', '- Barang Persediaan - Pengajuan Permintaan Bidang'),
(95, '197903072005021002', '- Barang Persediaan - Cetak Surat Penyaluran'),
(96, '198510032008012001', '- Barang Persediaan - Konfirmasi Pengadaan'),
(97, '198510032008012001', '- Barang Persediaan - Konfirmasi Penyaluran'),
(98, '196905011993031004', '- Pengaturan - Pembebanan Anggaran'),
(99, '196905011993031004', '- Pengaturan - Surat Keputusan'),
(100, '196905011993031004', '- Pengaturan - SSH'),
(101, '196905011993031004', '- Pengaturan - Rekanan'),
(102, '198510032008012001', '- Barang Persediaan - Cetak Surat Pengadaan'),
(103, '196905011993031004', '- Barang Persediaan - Cetak Surat Penyaluran'),
(104, '00103', '- SPPD - Pengajuan SPPD'),
(105, '00103', '- SPPD - Laporan Perjalanan Dinas'),
(106, '00103', '- SPPD - Laporan SPPD'),
(107, '00104', '- SPPD - Laporan Perjalanan Dinas'),
(108, '00102', '- SPPD - Laporan Perjalanan Dinas'),
(109, '00103', '- Pengaturan - Pembebanan Anggaran'),
(110, '00103', '- Pengaturan - Pembebanan Anggaran'),
(111, '196905011993031004', '- SPPD - Pengajuan SPPD'),
(112, '001', '- Aset - KIB A'),
(113, '001', '- Aset - KIB B'),
(114, '00104', '- Aset - Laporan Aset'),
(115, '00104', '- Pegawai - Verifikasi Data Pegawai'),
(116, '001', '- Aset - Laporan Aset'),
(117, '196905011993031004', '- Pegawai - Verifikasi Data Pegawai'),
(118, '196905011993031004', '- Aset - KIB A'),
(119, '196905011993031004', '- Aset - KIB B'),
(120, '196905011993031004', '- Aset - Laporan Aset'),
(121, '196711131994022002', '- Pegawai - Verifikasi Data Pegawai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_opd`
--

CREATE TABLE `tbl_opd` (
  `id_opd` varchar(50) NOT NULL,
  `nama_opd` varchar(50) NOT NULL,
  `alamat_opd` varchar(100) NOT NULL,
  `kecamatan_opd` varchar(50) NOT NULL,
  `alamat_kop_opd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_opd`
--

INSERT INTO `tbl_opd` (`id_opd`, `nama_opd`, `alamat_opd`, `kecamatan_opd`, `alamat_kop_opd`) VALUES
('001', 'Dinas Pendidikan', '-', '-', '-'),
('002', 'Dinas Kesehatan', '-', '-', '-'),
('003', 'Rumah Sakit Umum Daerah', '-', '-', '-'),
('004', 'Dinas Pekerjaan Umum Dan Penataan Ruang', '-', '-', '-'),
('005', 'Dinas Perumahan Rakyat Dan Kawasan Permukiman', '-', '-', '-'),
('006', 'Kantor Kesatuan Bangsa Dan Politik', '-', '-', '-'),
('007', 'Satuan Polisi Pamong Praja', '-', '-', '-'),
('008', 'Dinas Pemadam Kebakaran Dan Penyelamatan', '-', '-', '-'),
('009', 'Dinas Sosial', '-', '-', '-'),
('010', 'Badan Penanggulangan Bencana Daerah', '-', '-', '-'),
('011', 'Dinas Tenaga Kerja', '-', '-', '-'),
('012', 'Dinas Pemberdayaan Perempuan Dan Perlindungan Anak', '-', '-', '-'),
('013', 'Badan Ketahanan Pangan', '-', '-', '-'),
('014', 'Dinas Lingkungan Hidup', '-', '-', '-'),
('015', 'Dinas Administrasi Kependudukan Dan Pencatatan Sip', '-', '-', '-'),
('016', 'Dinas Pemberdayaan Masyarakat Dan Desa', '-', '-', '-'),
('017', 'Dinas Pengendalian Penduduk Dan Keluarga Berencana', '-', '-', '-'),
('018', 'Dinas Perhubungan', '-', '-', '-'),
('019', 'Dinas Komunikasi Dan Informatika', '-', '-', '-'),
('020', 'Dinas Penanaman Modal Dan Pelayanan Satu Pintu', '`-', '-', '-'),
('021', 'Dinas Perpustakaan', '-', '-', '-'),
('022', 'Dinas Pariwisata', '-', '-', '-'),
('023', 'Dinas Pertanian', '-', '-', '-'),
('024', 'Dinas Perdagangan', '-', '-', '-'),
('025', 'Sekretariat Daerah', '-', '-', '-'),
('026', 'Sekretariat Dprd', '-', '-', '-'),
('027', 'Kecamatan Padangsidimpuan Utara', '-', '-', '-'),
('028', 'Kecamatan Padangsidimpuan Selatan', '-', '-', '-'),
('029', 'Kecamatan Padangsidimpuan Tenggara', '-', '-', '-'),
('030', 'Kecamatan Padangsidimpuan Batunadua', '-', '-', '-'),
('031', 'Kecamatan Padangsidimpuan Hutaimbaru', '-', '-', '-'),
('032', 'Kecamatan Padangsidimpuan Angkola Julu', '-', '-', '-'),
('033', 'Inspektorat Daerah', '-', '-', '-'),
('034', 'Badan Perencanaan, Penelitian Dan Pengembangan Dae', '-', '-', '-'),
('035', 'Badan Pengelolaan Keuangan dan Pendapatan Daerah', 'Jln. Jen. Dr. Abd.Haris Nasution Pal - IV Pijorkoling', 'Kec. Padangsidimpuan Tenggara', 'Jln. Jen. Dr. Abd.Haris Nasution Pal - IV Pijorkoling Telp (0634)27075 Fax. (0634) 27075'),
('036', 'Badan Kepegawaian Dan Pengembangan Sumber Daya Man', '-', '-', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_organisasi`
--

CREATE TABLE `tbl_organisasi` (
  `id` int(11) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `masa` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `kedudukan` varchar(128) NOT NULL,
  `tahun` varchar(128) NOT NULL,
  `tempat` varchar(128) NOT NULL,
  `nama_pimpinan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `nip` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `status_verifikasi` varchar(128) NOT NULL DEFAULT 'Belum Diverifikasi',
  `id_opd` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`nip`, `nama`, `password`, `status_verifikasi`, `id_opd`) VALUES
('001', 'PEGAWAI DINAS PENDIDIKAN', '001', '', '001'),
('00101', 'Kepala Dinas Pendidikan', '00101', 'Belum Diverifikasi', '001'),
('00102', 'PPPB Dinas Pendidikan', '00102', 'Sudah Diverifikasi', '001'),
('00103', 'PPTK Dinas Pendidikan', '00103', 'Belum Diverifikasi', '001'),
('00104', 'PBP Dinas Pendidikan', '00104', 'Sudah Diverifikasi', '001'),
('00105', 'Bendahara Dinas Pendidikan', '00105', 'Sudah Diverifikasi', '001'),
('00106', 'Sekretariat Dinas Pendidikan', '00106', 'Sudah Diverifikasi', '001'),
('196305031985031015', 'Sarozatulo Mendrofa', '196305031985031015', 'Belum Diverifikasi', '035'),
('196312181992031002', 'Fahri Hasibuan, A.Md', '196312181992031002', 'Sudah Diverifikasi', '035'),
('196407071985031004', 'Suleman', '196407071985031004', 'Belum Diverifikasi', '035'),
('196709061993031010', 'Palaon Pulungan, S.Sos', '196709061993031010', 'Belum Diverifikasi', '035'),
('196711131994022002', 'Dra. Monalisa Cahaya, M.M', '196711131994022002', 'Belum Diverifikasi', '035'),
('196807272007011006', 'Tugimin Sugiarto, S.H', '196807272007011006', 'Belum Diverifikasi', '035'),
('196812051989092002', 'Elly Suriani Hasibuan', '196812051989092002', 'Belum Diverifikasi', '035'),
('196902031991032002', 'Farida hanum', '196902031991032002', 'Belum Diverifikasi', '035'),
('196905011993031004', 'Sulaiman Lubis, S.E', '1234', 'Sudah Diverifikasi', '035'),
('197001201991032006', 'Mahrani Yanti Gultom, S.E', '197001201991032006', 'Belum Diverifikasi', '035'),
('197005302006042005', 'Meriani Pulungan, S.E', '197005302006042005', 'Belum Diverifikasi', '035'),
('197007022007011002', 'Akhir Martua, A.Md', '197007022007011002', 'Belum Diverifikasi', '035'),
('197104032006041007', 'Aswin Siagian, S.E', '197104032006041007', 'Belum Diverifikasi', '035'),
('197104251993031002', 'Sangkot Martua, S.Sos', '197104251993031002', 'Belum Diverifikasi', '035'),
('197107211994022001', 'Seri Murni Harahap', '197107211994022001', 'Belum Diverifikasi', '035'),
('197112312006042050', 'Lindawaty, S.Kom', '197112312006042050', 'Belum Diverifikasi', '035'),
('197211232007011002', 'Musyakhrul Harahap, S.E', '197211232007011002', 'Belum Diverifikasi', '035'),
('197211251993032004', 'Erliana', '197211251993032004', 'Belum Diverifikasi', '035'),
('197308281993032003', 'Sahdiana Pulungan, S.E', '197308281993032003', 'Belum Diverifikasi', '035'),
('197309242005021003', 'Mhd Kifli Htg, S.E., M.Kom', '197309242005021003', 'Belum Diverifikasi', '035'),
('197309292002122006', 'Erni Kumala, S.E', '197309292002122006', 'Belum Diverifikasi', '035'),
('197309301992032001', 'Hj. Rostimegawati Harahap', '197309301992032001', 'Sudah Diverifikasi', '035'),
('197410122010011010', 'Ardiansyah Daulay, S.T', '197410122010011010', 'Belum Diverifikasi', '035'),
('197511061998031003', 'Dedy Suhada', '197511061998031003', 'Belum Diverifikasi', '035'),
('197511102005021003', 'Ady Supriadi, S.E., M.M', '197511102005021003', 'Belum Diverifikasi', '035'),
('197602072005021002', 'Asir Aryadi, S.E', '197602072005021002', 'Belum Diverifikasi', '035'),
('197604052009011001', 'Soritua Pardamean, S.E', '197604052009011001', 'Belum Diverifikasi', '035'),
('197610082005021001', 'Ade Saputra, S.E., M.Si', '197610082005021001', 'Sudah Diverifikasi', '035'),
('197705042005021004', 'Adi Gunawan, S.E', '197705042005021004', 'Belum Diverifikasi', '035'),
('197706072009011008', 'Benni, A.Md', '197706072009011008', 'Belum Diverifikasi', '035'),
('197707132011012001', 'Lasari Nainggolan, S.E', '197707132011012001', 'Belum Diverifikasi', '035'),
('19770830200712002', 'Irma Chairani Harahap, S.E', '19770830200712002', 'Belum Diverifikasi', '035'),
('197709022007011004', 'Ahmad Faisal Hasibuan', '197709022007011004', 'Belum Diverifikasi', '035'),
('197711022006041005', 'Ahmad Gojali, S.E', '197711022006041005', 'Belum Diverifikasi', '035'),
('197804162007012002', 'Syafrida Harahap, S.T', '197804162007012002', 'Belum Diverifikasi', '035'),
('197806092007011007', 'Nazaruddin Nasution, S.H', '197806092007011007', 'Belum Diverifikasi', '035'),
('197903032009012004', 'Nurhasada Rambe', '197903032009012004', 'Belum Diverifikasi', '035'),
('197903072005021002', 'Henri Afandi, SE. MM.', '197903072005021002', 'Belum Diverifikasi', '035'),
('197903242009011001', 'Nasrun Mulia Sitompul, S.Sos', '197903242009011001', 'Belum Diverifikasi', '035'),
('197906152006041022', 'Hairul saleh, A.Md', '197906152006041022', 'Belum Diverifikasi', '035'),
('197908162008012003', 'Nurhayati, S.Sos', '197908162008012003', 'Belum Diverifikasi', '035'),
('197909292009011006', 'Rahmad Liun Nst, S.E', '197909292009011006', 'Belum Diverifikasi', '035'),
('19791121200502010', 'Rianita Hutasuhut, S.E', '19791121200502010', 'Belum Diverifikasi', '035'),
('197912312010011045', 'Eky Belia Siregar, S.AB.', '197912312010011045', 'Belum Diverifikasi', '035'),
('198002222006041005', 'Mahmud Sholahuddin Latif, S.T', '198002222006041005', 'Belum Diverifikasi', '035'),
('198004272005021003', 'Yudil Heri, S.Sos', '198004272005021003', 'Belum Diverifikasi', '035'),
('198006072010012023', 'Dwi Handayani, S.P', '198006072010012023', 'Belum Diverifikasi', '035'),
('198108182010012034', 'Halimah, S.E', '198108182010012034', 'Belum Diverifikasi', '035'),
('198204062910011018', 'Pausan, S.H', '198204062910011018', 'Belum Diverifikasi', '035'),
('198212182010011016', 'Ery Timbulanta Siregar, S.E', '198212182010011016', 'Belum Diverifikasi', '035'),
('198302132010011008', 'Yoanda Mahiransyah, A.Md', '198302132010011008', 'Belum Diverifikasi', '035'),
('198304262010011018', 'Jurpan Rasoki Sitompul, S.Sos', '198501292006041004', 'Belum Diverifikasi', '035'),
('198309022007011005', 'Incyu Marry, S.Sos', '198309022007011005', 'Belum Diverifikasi', '035'),
('198310012007012002', 'Linda Mora Simamora, S.H', '198310012007012002', 'Belum Diverifikasi', '035'),
('198312012010011025', 'Faisal Reza', '198312012010011025', 'Belum Diverifikasi', '035'),
('198402112010012012', 'Febilautri Hutagaol, S.Kom', '198402112010012012', 'Belum Diverifikasi', '035'),
('198403172007011004', 'Muhammad Ikbal Harahap', '198403172007011004', 'Belum Diverifikasi', '035'),
('198404282010011020', 'Adrian', '198404282010011020', 'Belum Diverifikasi', '035'),
('198406012010012036', 'Nisda Khairani, A.Md', '198406012010012036', 'Belum Diverifikasi', '035'),
('198407272008012002', 'Wiily Fitriana, S.Sos', '198407272008012002', 'Belum Diverifikasi', '035'),
('198410012010011017', 'Junaidi Abdillah, S.E', '198410012010011017', 'Belum Diverifikasi', '035'),
('198503292008011001', 'Indra Yulisman Naution, S.H', '198503292008011001', 'Belum Diverifikasi', '035'),
('198504052010011024', 'Julham Efendi Sitompul, S.E', '198504052010011024', 'Belum Diverifikasi', '035'),
('198507112010012010', 'Emma Sari Siregar, S.kom., M.M', '198507112010012010', 'Belum Diverifikasi', '035'),
('198510032008012001', 'Siti Armida Siregar, S.H.', '198510032008012001', 'Sudah Diverifikasi', '035'),
('198510052010011028', 'Rahmat Hidayat STP, S.E.', '198510052010011028', 'Belum Diverifikasi', '035\r\n'),
('198603062011011004', 'Muhammad Yuniansyah Regen, S.H', '198603062011011004', 'Belum Diverifikasi', '035'),
('198607272010011010', 'Samuel Roy Harjo, A.Md', '198607272010011010', 'Belum Diverifikasi', '035'),
('198610222010012009', 'Lia Sari Harahap, S.E., M.M.', '198610222010012009', 'Belum Diverifikasi', '035'),
('198611202006041003', 'Aswin Ritonga, S.H', '198611202006041003', 'Belum Diverifikasi', '035'),
('199004202010012023', 'Laura, S.H', '199004202010012023', 'Belum Diverifikasi', '035');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pelatihan`
--

CREATE TABLE `tbl_pelatihan` (
  `id` int(11) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `jenis_pelatihan` varchar(128) NOT NULL,
  `nama_diklat` varchar(128) NOT NULL,
  `tempat` varchar(128) NOT NULL,
  `nomor_sk` varchar(128) NOT NULL,
  `tanggal_sk` date NOT NULL,
  `tahun` varchar(128) NOT NULL,
  `tanggal_pendidikan_mulai` date NOT NULL,
  `tanggal_pendidikan_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembebanananggaran`
--

CREATE TABLE `tbl_pembebanananggaran` (
  `id_pembebanananggaran` int(11) NOT NULL,
  `instansi` varchar(128) NOT NULL,
  `mataanggaran` varchar(128) NOT NULL,
  `id_opd` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pembebanananggaran`
--

INSERT INTO `tbl_pembebanananggaran` (`id_pembebanananggaran`, `instansi`, `mataanggaran`, `id_opd`) VALUES
(1, 'Badan Keuangan Daerah', '0.0.1.1', '001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pendidikan`
--

CREATE TABLE `tbl_pendidikan` (
  `id` int(11) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `tingkat` varchar(128) NOT NULL,
  `nama_pendidikan` varchar(128) NOT NULL,
  `jurusan` varchar(128) NOT NULL,
  `tempat` varchar(128) NOT NULL,
  `nama_pimpinan_pendidikan` varchar(128) NOT NULL,
  `no_ijazah` varchar(128) NOT NULL,
  `tanggal_ijazah` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengalaman_luarnegeri`
--

CREATE TABLE `tbl_pengalaman_luarnegeri` (
  `id` int(11) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `negara` varchar(128) NOT NULL,
  `tujuan` varchar(128) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_sampai` date NOT NULL,
  `yang_membiayai` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penghargaan`
--

CREATE TABLE `tbl_penghargaan` (
  `id` int(11) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `nama_penghargaan` varchar(128) NOT NULL,
  `tahun_perolehan` varchar(128) NOT NULL,
  `institusi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penyaji`
--

CREATE TABLE `tbl_penyaji` (
  `id` int(11) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `tempat` varchar(128) NOT NULL,
  `judul_makalah` varchar(128) NOT NULL,
  `tahun` varchar(128) NOT NULL,
  `peran` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_riwayat_jabatan`
--

CREATE TABLE `tbl_riwayat_jabatan` (
  `id` int(11) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `gol` varchar(128) NOT NULL,
  `ruang` varchar(128) NOT NULL,
  `tmt` date NOT NULL,
  `nomor_sk` varchar(128) NOT NULL,
  `tanggal_sk` date NOT NULL,
  `pejabat` varchar(128) NOT NULL,
  `eselon` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_riwayat_jabatan`
--

INSERT INTO `tbl_riwayat_jabatan` (`id`, `nip`, `jabatan`, `gol`, `ruang`, `tmt`, `nomor_sk`, `tanggal_sk`, `pejabat`, `eselon`) VALUES
(1, '00103', 'a', 'IV', 'd', '2021-09-14', 'a', '2021-09-19', 'a', 'IV'),
(3, '197309301992032001', 'aa', 'a', '', '2021-09-28', 'a', '2021-09-21', 'a', 'a'),
(4, '197903072005021002', 'aa', 'a', '', '2021-09-28', 'a', '2021-09-21', 'a', 'a'),
(5, '198510032008012001', 'aa', 'a', '', '2021-09-28', 'a', '2021-09-21', 'a', 'a'),
(6, '198510052010011028', 'aa', 'a', '', '2021-09-28', 'a', '2021-09-21', 'a', 'a'),
(8, '00102', 'a', 'a', '', '2021-10-02', 'a', '2021-09-21', 'a', 'a'),
(9, '196905011993031004', 'a', 'b', '', '2021-09-22', 'a', '2021-11-17', 'a', 'b'),
(10, '196905011993031004', 'n', 'n', '', '2022-02-03', 'n', '2022-01-26', 'n', 'n'),
(11, '00104', 'a', 'I', 'a', '2021-09-22', 'a', '2021-09-13', 'a', '-'),
(12, '00104', 'b', 'II', 'd', '2021-09-22', 'a', '2021-09-30', 'a', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_riwayat_kepangkatan`
--

CREATE TABLE `tbl_riwayat_kepangkatan` (
  `id` int(11) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `pangkat` varchar(128) NOT NULL,
  `gol` varchar(128) NOT NULL,
  `tmt` date NOT NULL,
  `no_sk` varchar(128) NOT NULL,
  `tanggal_sk` date NOT NULL,
  `pejabat` varchar(128) NOT NULL,
  `gaji_pokok` double NOT NULL,
  `peraturan_dasar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_riwayat_kepangkatan`
--

INSERT INTO `tbl_riwayat_kepangkatan` (`id`, `nip`, `pangkat`, `gol`, `tmt`, `no_sk`, `tanggal_sk`, `pejabat`, `gaji_pokok`, `peraturan_dasar`) VALUES
(1, '00103', 's', 's', '2021-10-01', 's', '2021-09-23', 's', 0, 's'),
(2, '196905011993031004', 'a', 'a', '2021-10-09', 'a', '2021-09-22', 'a', 0, 'a'),
(3, '197309301992032001', 'a', 'a', '2021-10-09', 'a', '2021-09-22', 'a', 0, 'a'),
(4, '197903072005021002', 'a', 'a', '2021-10-09', 'a', '2021-09-22', 'a', 0, 'a'),
(5, '198510032008012001', 'a', 'a', '2021-10-09', 'a', '2021-09-22', 'a', 0, 'a'),
(6, '198510052010011028', 'a', 'a', '2021-10-09', 'a', '2021-09-22', 'a', 0, 'a'),
(7, '00104', 'a', 'a', '2021-10-08', 'a', '2021-09-14', 'a', 0, 'a'),
(8, '00102', 'a', 'a', '2021-10-07', 'a', '2021-09-07', 'a', 0, 'a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sk`
--

CREATE TABLE `tbl_sk` (
  `id` int(11) NOT NULL,
  `no_sk` varchar(128) NOT NULL,
  `tanggal_sk` date NOT NULL,
  `tanggal_skberakhir` date NOT NULL,
  `nip` varchar(128) NOT NULL,
  `jabatan_sk` varchar(128) NOT NULL,
  `pangkat_sk` varchar(128) NOT NULL,
  `gol_sk` varchar(128) NOT NULL,
  `id_opd` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_sk`
--

INSERT INTO `tbl_sk` (`id`, `no_sk`, `tanggal_sk`, `tanggal_skberakhir`, `nip`, `jabatan_sk`, `pangkat_sk`, `gol_sk`, `id_opd`) VALUES
(1, 'a', '2021-01-01', '2021-12-31', '00105', 'Bendahara', 'a', 'a', '001'),
(2, 'a', '2021-01-01', '2021-12-31', '00104', 'Pengurus Barang Pengguna', 'a', 'a', '001'),
(3, 'a', '2021-01-01', '2021-12-31', '00102', 'Pejabat Penatausahaan Barang', 'a', 'a', '001'),
(4, 'a', '2021-01-01', '2021-12-31', '00101', 'Pengguna Anggaran', 'a', 'a', '001'),
(5, 'a', '2021-01-01', '2021-12-31', '00101', 'Pejabat Pembuat Komitmen', 'a', 'a', '001'),
(6, '010', '2021-01-01', '2021-12-30', '198510052010011028', 'Bendahara', 'pangkat rahmat', 'golongan rahmat', '035'),
(7, '011', '2021-01-01', '2021-12-30', '198510032008012001', 'Pengurus Barang Pengguna', 'pangkat armida', 'golongan armida', '035'),
(8, '012', '2021-01-01', '2021-12-30', '197309301992032001', 'Pejabat Penatausahaan Barang', 'pangkat rostimegawati', 'golongan rostimegawati', '035'),
(9, '013', '2021-01-01', '2021-12-30', '196905011993031004', 'Pengguna Anggaran', 'pangkat sulaiman', 'golongan sulaiman', '035'),
(10, '014', '2021-01-01', '2021-12-30', '196905011993031004', 'Pejabat Pembuat Komitmen', 'pangkat ppk ', 'golongan ppk', '035');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_skp`
--

CREATE TABLE `tbl_skp` (
  `id` int(11) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `tahun` varchar(128) NOT NULL,
  `pejabat_penilai` varchar(128) NOT NULL,
  `atasan_pejabat_penilai` varchar(128) NOT NULL,
  `nilai` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_verifikasidatapegawai`
--

CREATE TABLE `tbl_verifikasidatapegawai` (
  `nip` varchar(128) NOT NULL,
  `status` varchar(128) DEFAULT NULL,
  `tanggal_diubah` date DEFAULT NULL,
  `tanggal_diverifikasi` date DEFAULT NULL,
  `verifikator` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_bidang_opd`
--
ALTER TABLE `tbl_bidang_opd`
  ADD PRIMARY KEY (`id_bidang_opd`);

--
-- Indeks untuk tabel `tbl_detailpegawai`
--
ALTER TABLE `tbl_detailpegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `tbl_disiplin`
--
ALTER TABLE `tbl_disiplin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_drh_keteranganlain`
--
ALTER TABLE `tbl_drh_keteranganlain`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_du_kepangkatan`
--
ALTER TABLE `tbl_du_kepangkatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_karyatulis`
--
ALTER TABLE `tbl_karyatulis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_keluarga`
--
ALTER TABLE `tbl_keluarga`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_kursus`
--
ALTER TABLE `tbl_kursus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_master`
--
ALTER TABLE `tbl_master`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tbl_opd`
--
ALTER TABLE `tbl_opd`
  ADD PRIMARY KEY (`id_opd`);

--
-- Indeks untuk tabel `tbl_organisasi`
--
ALTER TABLE `tbl_organisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `tbl_pelatihan`
--
ALTER TABLE `tbl_pelatihan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pembebanananggaran`
--
ALTER TABLE `tbl_pembebanananggaran`
  ADD PRIMARY KEY (`id_pembebanananggaran`);

--
-- Indeks untuk tabel `tbl_pendidikan`
--
ALTER TABLE `tbl_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pengalaman_luarnegeri`
--
ALTER TABLE `tbl_pengalaman_luarnegeri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_penghargaan`
--
ALTER TABLE `tbl_penghargaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_penyaji`
--
ALTER TABLE `tbl_penyaji`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_riwayat_jabatan`
--
ALTER TABLE `tbl_riwayat_jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_riwayat_kepangkatan`
--
ALTER TABLE `tbl_riwayat_kepangkatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_sk`
--
ALTER TABLE `tbl_sk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_skp`
--
ALTER TABLE `tbl_skp`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_verifikasidatapegawai`
--
ALTER TABLE `tbl_verifikasidatapegawai`
  ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_bidang_opd`
--
ALTER TABLE `tbl_bidang_opd`
  MODIFY `id_bidang_opd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_disiplin`
--
ALTER TABLE `tbl_disiplin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_drh_keteranganlain`
--
ALTER TABLE `tbl_drh_keteranganlain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_du_kepangkatan`
--
ALTER TABLE `tbl_du_kepangkatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_karyatulis`
--
ALTER TABLE `tbl_karyatulis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_keluarga`
--
ALTER TABLE `tbl_keluarga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_kursus`
--
ALTER TABLE `tbl_kursus`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT untuk tabel `tbl_organisasi`
--
ALTER TABLE `tbl_organisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_pelatihan`
--
ALTER TABLE `tbl_pelatihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_pembebanananggaran`
--
ALTER TABLE `tbl_pembebanananggaran`
  MODIFY `id_pembebanananggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_pendidikan`
--
ALTER TABLE `tbl_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengalaman_luarnegeri`
--
ALTER TABLE `tbl_pengalaman_luarnegeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_penghargaan`
--
ALTER TABLE `tbl_penghargaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_penyaji`
--
ALTER TABLE `tbl_penyaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_riwayat_jabatan`
--
ALTER TABLE `tbl_riwayat_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_riwayat_kepangkatan`
--
ALTER TABLE `tbl_riwayat_kepangkatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_sk`
--
ALTER TABLE `tbl_sk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_skp`
--
ALTER TABLE `tbl_skp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
