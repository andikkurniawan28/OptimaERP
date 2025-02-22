<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Bank;
use App\Models\Agama;
use App\Models\Seksi;
use App\Models\Jabatan;
use App\Models\Jurusan;
use App\Models\Wilayah;
use App\Models\Keahlian;
use App\Models\Departemen;
use App\Models\BidangUsaha;
use App\Models\JenisKontak;
use App\Models\StatusKaryawan;
use App\Models\JenisOrganisasi;
use Illuminate\Database\Seeder;
use App\Models\JenisPihakKetiga;
use App\Models\StatusPerkawinan;
use App\Models\PendidikanTerakhir;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        JenisKontak::insert([
            ['nama' => 'Karyawan', 'master' => 1],
            ['nama' => 'Pihak Ketiga', 'master' => 1],
        ]);

        JenisPihakKetiga::insert([
            ['nama' => 'Supplier', 'master' => 1],
            ['nama' => 'Customer', 'master' => 1],
            ['nama' => 'Vendor', 'master' => 1],
            ['nama' => 'Outsourcing', 'master' => 1],
            ['nama' => 'Tenant', 'master' => 1],
            ['nama' => 'Pemerintah', 'master' => 1],
            ['nama' => 'Professional', 'master' => 1],
            ['nama' => 'Peserta Rekrutmen', 'master' => 1],
        ]);

        Departemen::insert([
            ['nama' => 'Keuangan', 'master' => 1],
            ['nama' => 'Sumber Daya Manusia', 'master' => 1],
            ['nama' => 'Produksi', 'master' => 1],
            ['nama' => 'Pemasaran', 'master' => 1],
            ['nama' => 'Teknologi Informasi', 'master' => 1],
            ['nama' => 'Logistik', 'master' => 1],
            ['nama' => 'Riset dan Pengembangan', 'master' => 1],
            ['nama' => 'Layanan Pelanggan', 'master' => 1],
            ['nama' => 'Legal', 'master' => 1],
            ['nama' => 'Pengadaan', 'master' => 1],
            ['nama' => 'Kesehatan dan Keselamatan Kerja', 'master' => 1],
            ['nama' => 'Administrasi', 'master' => 1],
            ['nama' => 'Operasional', 'master' => 1],
            ['nama' => 'Quality Assurance', 'master' => 1],
            ['nama' => 'Hubungan Masyarakat', 'master' => 1],
        ]);

        Seksi::insert([
            ['departemen_id' => 1, 'nama' => 'Akuntansi', 'master' => 1],
            ['departemen_id' => 1, 'nama' => 'Perpajakan', 'master' => 1],
            ['departemen_id' => 2, 'nama' => 'Rekrutmen', 'master' => 1],
            ['departemen_id' => 2, 'nama' => 'Pelatihan dan Pengembangan', 'master' => 1],
            ['departemen_id' => 3, 'nama' => 'Perencanaan Produksi', 'master' => 1],
            ['departemen_id' => 3, 'nama' => 'Kontrol Kualitas', 'master' => 1],
            ['departemen_id' => 4, 'nama' => 'Strategi Pemasaran', 'master' => 1],
            ['departemen_id' => 4, 'nama' => 'Penjualan', 'master' => 1],
            ['departemen_id' => 5, 'nama' => 'Infrastruktur IT', 'master' => 1],
            ['departemen_id' => 5, 'nama' => 'Keamanan Informasi', 'master' => 1],
            ['departemen_id' => 6, 'nama' => 'Manajemen Inventaris', 'master' => 1],
            ['departemen_id' => 6, 'nama' => 'Distribusi', 'master' => 1],
            ['departemen_id' => 7, 'nama' => 'Pengembangan Produk', 'master' => 1],
            ['departemen_id' => 7, 'nama' => 'Riset Pasar', 'master' => 1],
            ['departemen_id' => 8, 'nama' => 'Layanan Teknis', 'master' => 1],
            ['departemen_id' => 8, 'nama' => 'Customer Care', 'master' => 1],
            ['departemen_id' => 9, 'nama' => 'Kepatuhan Hukum', 'master' => 1],
            ['departemen_id' => 9, 'nama' => 'Litigasi', 'master' => 1],
            ['departemen_id' => 10, 'nama' => 'Pembelian', 'master' => 1],
            ['departemen_id' => 10, 'nama' => 'Vendor Management', 'master' => 1],
            ['departemen_id' => 11, 'nama' => 'Keselamatan Kerja', 'master' => 1],
            ['departemen_id' => 11, 'nama' => 'Kesehatan Karyawan', 'master' => 1],
            ['departemen_id' => 12, 'nama' => 'Administrasi Umum', 'master' => 1],
            ['departemen_id' => 12, 'nama' => 'Pengarsipan', 'master' => 1],
            ['departemen_id' => 13, 'nama' => 'Manajemen Operasional', 'master' => 1],
            ['departemen_id' => 13, 'nama' => 'Pemeliharaan', 'master' => 1],
            ['departemen_id' => 14, 'nama' => 'Pengujian Kualitas', 'master' => 1],
            ['departemen_id' => 14, 'nama' => 'Audit Mutu', 'master' => 1],
            ['departemen_id' => 15, 'nama' => 'Komunikasi Eksternal', 'master' => 1],
            ['departemen_id' => 15, 'nama' => 'Media Sosial', 'master' => 1],
        ]);

        Jabatan::insert([
            ['seksi_id' => 1, 'nama' => 'Kepala Akuntansi'],
            ['seksi_id' => 1, 'nama' => 'Staf Akuntansi'],
            ['seksi_id' => 2, 'nama' => 'Kepala Perpajakan'],
            ['seksi_id' => 2, 'nama' => 'Staf Perpajakan'],
            ['seksi_id' => 3, 'nama' => 'Kepala Rekrutmen'],
            ['seksi_id' => 3, 'nama' => 'Staf Rekrutmen'],
            ['seksi_id' => 4, 'nama' => 'Kepala Pelatihan dan Pengembangan'],
            ['seksi_id' => 4, 'nama' => 'Staf Pelatihan dan Pengembangan'],
            ['seksi_id' => 5, 'nama' => 'Kepala Perencanaan Produksi'],
            ['seksi_id' => 5, 'nama' => 'Staf Perencanaan Produksi'],
            ['seksi_id' => 6, 'nama' => 'Kepala Kontrol Kualitas'],
            ['seksi_id' => 6, 'nama' => 'Staf Kontrol Kualitas'],
            ['seksi_id' => 7, 'nama' => 'Kepala Strategi Pemasaran'],
            ['seksi_id' => 7, 'nama' => 'Staf Strategi Pemasaran'],
            ['seksi_id' => 8, 'nama' => 'Kepala Penjualan'],
            ['seksi_id' => 8, 'nama' => 'Staf Penjualan'],
            ['seksi_id' => 9, 'nama' => 'Kepala Infrastruktur IT'],
            ['seksi_id' => 9, 'nama' => 'Staf Infrastruktur IT'],
            ['seksi_id' => 10, 'nama' => 'Kepala Keamanan Informasi'],
            ['seksi_id' => 10, 'nama' => 'Staf Keamanan Informasi'],
            ['seksi_id' => 11, 'nama' => 'Kepala Manajemen Inventaris'],
            ['seksi_id' => 11, 'nama' => 'Staf Manajemen Inventaris'],
            ['seksi_id' => 12, 'nama' => 'Kepala Distribusi'],
            ['seksi_id' => 12, 'nama' => 'Staf Distribusi'],
            ['seksi_id' => 13, 'nama' => 'Kepala Pengembangan Produk'],
            ['seksi_id' => 13, 'nama' => 'Staf Pengembangan Produk'],
            ['seksi_id' => 14, 'nama' => 'Kepala Riset Pasar'],
            ['seksi_id' => 14, 'nama' => 'Staf Riset Pasar'],
            ['seksi_id' => 15, 'nama' => 'Kepala Layanan Teknis'],
            ['seksi_id' => 15, 'nama' => 'Staf Layanan Teknis'],
            ['seksi_id' => 16, 'nama' => 'Kepala Customer Care'],
            ['seksi_id' => 16, 'nama' => 'Staf Customer Care'],
            ['seksi_id' => 17, 'nama' => 'Kepala Kepatuhan Hukum'],
            ['seksi_id' => 17, 'nama' => 'Staf Kepatuhan Hukum'],
            ['seksi_id' => 18, 'nama' => 'Kepala Litigasi'],
            ['seksi_id' => 18, 'nama' => 'Staf Litigasi'],
            ['seksi_id' => 19, 'nama' => 'Kepala Pembelian'],
            ['seksi_id' => 19, 'nama' => 'Staf Pembelian'],
            ['seksi_id' => 20, 'nama' => 'Kepala Vendor Management'],
            ['seksi_id' => 20, 'nama' => 'Staf Vendor Management'],
            ['seksi_id' => 21, 'nama' => 'Kepala Keselamatan Kerja'],
            ['seksi_id' => 21, 'nama' => 'Staf Keselamatan Kerja'],
            ['seksi_id' => 22, 'nama' => 'Kepala Kesehatan Karyawan'],
            ['seksi_id' => 22, 'nama' => 'Staf Kesehatan Karyawan'],
            ['seksi_id' => 23, 'nama' => 'Kepala Administrasi Umum'],
            ['seksi_id' => 23, 'nama' => 'Staf Administrasi Umum'],
            ['seksi_id' => 24, 'nama' => 'Kepala Pengarsipan'],
            ['seksi_id' => 24, 'nama' => 'Staf Pengarsipan'],
            ['seksi_id' => 25, 'nama' => 'Kepala Manajemen Operasional'],
            ['seksi_id' => 25, 'nama' => 'Staf Manajemen Operasional'],
            ['seksi_id' => 26, 'nama' => 'Kepala Pemeliharaan'],
            ['seksi_id' => 26, 'nama' => 'Staf Pemeliharaan'],
            ['seksi_id' => 27, 'nama' => 'Kepala Pengujian Kualitas'],
            ['seksi_id' => 27, 'nama' => 'Staf Pengujian Kualitas'],
            ['seksi_id' => 28, 'nama' => 'Kepala Audit Mutu'],
            ['seksi_id' => 28, 'nama' => 'Staf Audit Mutu'],
            ['seksi_id' => 29, 'nama' => 'Kepala Komunikasi Eksternal'],
            ['seksi_id' => 29, 'nama' => 'Staf Komunikasi Eksternal'],
            ['seksi_id' => 30, 'nama' => 'Kepala Media Sosial'],
            ['seksi_id' => 30, 'nama' => 'Staf Media Sosial'],
        ]);

        StatusKaryawan::insert([
            ['nama' => 'PKWT', 'master' => 1],
            ['nama' => 'PKWTT', 'master' => 1],
            ['nama' => 'Outsourcing', 'master' => 1],
        ]);

        Agama::insert([
            ['nama' => 'Islam', 'master' => 1],
            ['nama' => 'Kristen Protestan', 'master' => 1],
            ['nama' => 'Kristen Katholik', 'master' => 1],
            ['nama' => 'Hindu', 'master' => 1],
            ['nama' => 'Buddha', 'master' => 1],
            ['nama' => 'Konghucu', 'master' => 1],
        ]);

        StatusPerkawinan::insert([
            ['nama' => 'Lajang', 'master' => 1],
            ['nama' => 'Menikah', 'master' => 1],
            ['nama' => 'Cerai', 'master' => 1],
        ]);

        PendidikanTerakhir::insert([
            ['nama' => 'SD', 'master' => 1],
            ['nama' => 'SMP', 'master' => 1],
            ['nama' => 'SMA', 'master' => 1],
            ['nama' => 'SMK', 'master' => 1],
            ['nama' => 'D1', 'master' => 1],
            ['nama' => 'D2', 'master' => 1],
            ['nama' => 'D3', 'master' => 1],
            ['nama' => 'D4', 'master' => 1],
            ['nama' => 'S1', 'master' => 1],
            ['nama' => 'S2', 'master' => 1],
            ['nama' => 'S3', 'master' => 1],
        ]);

        Jurusan::insert([
            ['kode' => 'TI', 'nama' => 'Teknik Informatika'],
            ['kode' => 'SI', 'nama' => 'Sistem Informasi'],
            ['kode' => 'TK', 'nama' => 'Teknik Komputer'],
            ['kode' => 'TE', 'nama' => 'Teknik Elektro'],
            ['kode' => 'TM', 'nama' => 'Teknik Mesin'],
            ['kode' => 'TS', 'nama' => 'Teknik Sipil'],
            ['kode' => 'TG', 'nama' => 'Teknik Geodesi'],
            ['kode' => 'TA', 'nama' => 'Teknik Arsitektur'],
            ['kode' => 'TKK', 'nama' => 'Teknik Kimia'],
            ['kode' => 'TInd', 'nama' => 'Teknik Industri'],
            ['kode' => 'TF', 'nama' => 'Teknik Fisika'],
            ['kode' => 'TGeol', 'nama' => 'Teknik Geologi'],
            ['kode' => 'TR', 'nama' => 'Teknik Robotika'],
            ['kode' => 'TEnv', 'nama' => 'Teknik Lingkungan'],
            ['kode' => 'AK', 'nama' => 'Akuntansi'],
            ['kode' => 'MN', 'nama' => 'Manajemen'],
            ['kode' => 'EK', 'nama' => 'Ekonomi'],
            ['kode' => 'HUK', 'nama' => 'Ilmu Hukum'],
            ['kode' => 'PSI', 'nama' => 'Psikologi'],
            ['kode' => 'KOM', 'nama' => 'Ilmu Komunikasi'],
            ['kode' => 'FIS', 'nama' => 'Fisika'],
            ['kode' => 'BIO', 'nama' => 'Biologi'],
            ['kode' => 'MAT', 'nama' => 'Matematika'],
            ['kode' => 'ST', 'nama' => 'Statistika'],
            ['kode' => 'FARM', 'nama' => 'Farmasi'],
            ['kode' => 'KES', 'nama' => 'Kesehatan Masyarakat'],
            ['kode' => 'GIZ', 'nama' => 'Ilmu Gizi'],
            ['kode' => 'PGSD', 'nama' => 'Pendidikan Guru Sekolah Dasar'],
            ['kode' => 'PAUD', 'nama' => 'Pendidikan Anak Usia Dini'],
            ['kode' => 'SAS', 'nama' => 'Sastra Indonesia'],
            ['kode' => 'ING', 'nama' => 'Sastra Inggris'],
        ]);

        JenisOrganisasi::insert([
            ['nama' => 'PT', 'master' => 1],
            ['nama' => 'PT Perorangan', 'master' => 1],
            ['nama' => 'CV', 'master' => 1],
            ['nama' => 'Firma', 'master' => 1],
            ['nama' => 'Koperasi', 'master' => 1],
            ['nama' => 'Yayasan', 'master' => 1],
            ['nama' => 'Badan Usaha Milik Negara (BUMN)', 'master' => 1],
            ['nama' => 'Badan Usaha Milik Daerah (BUMD)', 'master' => 1],
            ['nama' => 'Persekutuan Perdata', 'master' => 1],
            ['nama' => 'Perusahaan Dagang (PD)', 'master' => 1],
            ['nama' => 'Usaha Dagang (UD)', 'master' => 1],
        ]);

        Bank::insert([
            ['kode' => 'BRI', 'nama' => 'Bank Rakyat Indonesia (BRI)'],
            ['kode' => 'MANDIRI', 'nama' => 'Bank Mandiri'],
            ['kode' => 'BNI', 'nama' => 'Bank Negara Indonesia (BNI)'],
            ['kode' => 'DANAMON', 'nama' => 'Bank Danamon'],
            ['kode' => 'PERMATA', 'nama' => 'Bank Permata'],
            ['kode' => 'BCA', 'nama' => 'Bank Central Asia (BCA)'],
            ['kode' => 'MAYBANK', 'nama' => 'Bank Maybank Indonesia'],
            ['kode' => 'PANIN', 'nama' => 'Bank Panin'],
            ['kode' => 'CIMB', 'nama' => 'Bank CIMB Niaga'],
            ['kode' => 'UOB', 'nama' => 'Bank UOB Indonesia'],
            ['kode' => 'OCBC', 'nama' => 'Bank OCBC NISP'],
            ['kode' => 'DBS', 'nama' => 'Bank DBS Indonesia'],
            ['kode' => 'CITIBANK', 'nama' => 'Citibank'],
            ['kode' => 'ARTHA', 'nama' => 'Bank Artha Graha Internasional'],
            ['kode' => 'BUKOPIN', 'nama' => 'Bank Bukopin'],
            ['kode' => 'BSI', 'nama' => 'Bank Syariah Indonesia (BSI)'],
            ['kode' => 'BJB', 'nama' => 'Bank Jabar Banten (BJB)'],
            ['kode' => 'DKI', 'nama' => 'Bank DKI'],
            ['kode' => 'JATENG', 'nama' => 'Bank Jateng'],
            ['kode' => 'JATIM', 'nama' => 'Bank Jatim'],
            ['kode' => 'DIY', 'nama' => 'Bank DIY'],
            ['kode' => 'SUMUT', 'nama' => 'Bank Sumut'],
            ['kode' => 'NAGARI', 'nama' => 'Bank Nagari (Sumbar)'],
            ['kode' => 'RIAUKEPRI', 'nama' => 'Bank Riau Kepri'],
            ['kode' => 'SUMSELBABEL', 'nama' => 'Bank Sumsel Babel'],
            ['kode' => 'LAMPUNG', 'nama' => 'Bank Lampung'],
            ['kode' => 'KALSEL', 'nama' => 'Bank Kalsel'],
            ['kode' => 'KALBAR', 'nama' => 'Bank Kalbar'],
            ['kode' => 'KALTIMTARA', 'nama' => 'Bank Kaltimtara'],
            ['kode' => 'KALTENG', 'nama' => 'Bank Kalteng'],
            ['kode' => 'SULSELBAR', 'nama' => 'Bank Sulselbar'],
            ['kode' => 'SULUTGO', 'nama' => 'Bank SulutGo'],
            ['kode' => 'NTB', 'nama' => 'Bank NTB'],
            ['kode' => 'NTT', 'nama' => 'Bank NTT'],
            ['kode' => 'MALUKU', 'nama' => 'Bank Maluku Malut'],
            ['kode' => 'PAPUA', 'nama' => 'Bank Papua'],
        ]);

        Keahlian::insert([
            // KEAHLIAN TEKNIK & MANUFAKTUR
            ['kode' => 'WLD', 'nama' => 'Pengelasan (Welding)'],
            ['kode' => 'CNC', 'nama' => 'Pemrograman Mesin CNC'],
            ['kode' => 'MTN', 'nama' => 'Perawatan Mesin (Maintenance)'],
            ['kode' => 'QCT', 'nama' => 'Quality Control & Testing'],
            ['kode' => 'FAB', 'nama' => 'Fabrikasi Logam'],
            ['kode' => 'HVAC', 'nama' => 'Instalasi & Perawatan HVAC'],
            ['kode' => 'PLMB', 'nama' => 'Pemasangan & Perawatan Plumbing'],
            ['kode' => 'AUT', 'nama' => 'Otomasi Industri'],
            ['kode' => 'MFG', 'nama' => 'Manufaktur & Produksi'],
            ['kode' => 'RBT', 'nama' => 'Robotika'],

            // KEAHLIAN OTOMOTIF & LISTRIK
            ['kode' => 'ENG', 'nama' => 'Perbaikan Mesin Kendaraan'],
            ['kode' => 'ELC', 'nama' => 'Instalasi Listrik'],
            ['kode' => 'EVH', 'nama' => 'Perawatan Kendaraan Listrik'],
            ['kode' => 'BAT', 'nama' => 'Pembuatan & Perawatan Baterai'],
            ['kode' => 'TBO', 'nama' => 'Perbaikan Body & Cat Mobil'],

            // KEAHLIAN PRODUKSI & LOGISTIK
            ['kode' => 'SCM', 'nama' => 'Manajemen Rantai Pasok'],
            ['kode' => 'LOG', 'nama' => 'Logistik & Pergudangan'],
            ['kode' => 'PKG', 'nama' => 'Pengemasan Produk'],
            ['kode' => 'PLN', 'nama' => 'Perencanaan Produksi'],

            // KEAHLIAN PERAWATAN & KONSTRUKSI
            ['kode' => 'CARP', 'nama' => 'Pertukangan Kayu'],
            ['kode' => 'MAS', 'nama' => 'Pekerjaan Konstruksi & Beton'],
            ['kode' => 'PNT', 'nama' => 'Pengecatan & Finishing'],
            ['kode' => 'INS', 'nama' => 'Inspeksi & Pemeliharaan Bangunan'],

            // KEAHLIAN ADMINISTRASI & BISNIS
            ['kode' => 'MGT', 'nama' => 'Manajemen Operasional'],
            ['kode' => 'HRD', 'nama' => 'Pengelolaan Sumber Daya Manusia'],
            ['kode' => 'MK', 'nama' => 'Pemasaran & Sales'],
            ['kode' => 'FNC', 'nama' => 'Akuntansi & Keuangan'],
            ['kode' => 'CS', 'nama' => 'Layanan Pelanggan'],
            ['kode' => 'PUR', 'nama' => 'Pengadaan & Pembelian'],

            // KEAHLIAN TEKNOLOGI & DIGITAL
            ['kode' => 'PRG', 'nama' => 'Pemrograman'],
            ['kode' => 'ITN', 'nama' => 'Jaringan & Infrastruktur IT'],
            ['kode' => 'AUTD', 'nama' => 'Desain Otomasi'],
            ['kode' => 'CAD', 'nama' => 'Desain CAD & CAM'],
            ['kode' => 'IOT', 'nama' => 'Internet of Things (IoT)'],
        ]);

        BidangUsaha::insert([
            // BIDANG INDUSTRI & MANUFAKTUR
            ['kode' => 'MNF', 'nama' => 'Manufaktur', 'master' => 1],
            ['kode' => 'AUT', 'nama' => 'Otomotif', 'master' => 1],
            ['kode' => 'ELC', 'nama' => 'Elektronik', 'master' => 1],
            ['kode' => 'TEX', 'nama' => 'Tekstil & Garmen', 'master' => 1],
            ['kode' => 'FNB', 'nama' => 'Makanan & Minuman', 'master' => 1],
            ['kode' => 'CHM', 'nama' => 'Kimia & Farmasi', 'master' => 1],
            ['kode' => 'MCH', 'nama' => 'Mesin & Peralatan', 'master' => 1],

            // BIDANG KONSTRUKSI & INFRASTRUKTUR
            ['kode' => 'CNST', 'nama' => 'Konstruksi', 'master' => 1],
            ['kode' => 'RLT', 'nama' => 'Real Estate & Properti', 'master' => 1],
            ['kode' => 'ARC', 'nama' => 'Arsitektur & Desain', 'master' => 1],

            // BIDANG TRANSPORTASI & LOGISTIK
            ['kode' => 'LOG', 'nama' => 'Logistik & Pergudangan', 'master' => 1],
            ['kode' => 'TRP', 'nama' => 'Transportasi & Ekspedisi', 'master' => 1],
            ['kode' => 'MAR', 'nama' => 'Maritim & Pelayaran', 'master' => 1],

            // BIDANG TEKNOLOGI & KOMUNIKASI
            ['kode' => 'IT', 'nama' => 'Teknologi Informasi', 'master' => 1],
            ['kode' => 'TEL', 'nama' => 'Telekomunikasi', 'master' => 1],
            ['kode' => 'IOT', 'nama' => 'Internet of Things', 'master' => 1],

            // BIDANG KEUANGAN & BISNIS
            ['kode' => 'BNK', 'nama' => 'Perbankan', 'master' => 1],
            ['kode' => 'INS', 'nama' => 'Asuransi', 'master' => 1],
            ['kode' => 'INV', 'nama' => 'Investasi & Pasar Modal', 'master' => 1],
            ['kode' => 'FIN', 'nama' => 'Keuangan & Akuntansi', 'master' => 1],

            // BIDANG PERTANIAN, ENERGI & SUMBER DAYA
            ['kode' => 'AGRI', 'nama' => 'Pertanian & Perkebunan', 'master' => 1],
            ['kode' => 'FISH', 'nama' => 'Perikanan & Kelautan', 'master' => 1],
            ['kode' => 'OILG', 'nama' => 'Minyak & Gas', 'master' => 1],
            ['kode' => 'ENE', 'nama' => 'Energi Terbarukan', 'master' => 1],
            ['kode' => 'MIN', 'nama' => 'Pertambangan', 'master' => 1],

            // BIDANG JASA & PELAYANAN
            ['kode' => 'EDU', 'nama' => 'Pendidikan & Pelatihan', 'master' => 1],
            ['kode' => 'HSP', 'nama' => 'Rumah Sakit & Kesehatan', 'master' => 1],
            ['kode' => 'HOS', 'nama' => 'Perhotelan & Pariwisata', 'master' => 1],
            ['kode' => 'MKT', 'nama' => 'Pemasaran & Periklanan', 'master' => 1],
            ['kode' => 'CONS', 'nama' => 'Konsultan & Jasa Profesional', 'master' => 1],
        ]);

        Wilayah::insert([
            ['kode' => 'JKT', 'nama' => 'Jakarta', 'master' => 1],
            ['kode' => 'BDG', 'nama' => 'Bandung', 'master' => 1],
            ['kode' => 'SBY', 'nama' => 'Surabaya', 'master' => 1],
            ['kode' => 'SMG', 'nama' => 'Semarang', 'master' => 1],
            ['kode' => 'MDN', 'nama' => 'Medan', 'master' => 1],
            ['kode' => 'MAK', 'nama' => 'Makassar', 'master' => 1],
            ['kode' => 'PLM', 'nama' => 'Palembang', 'master' => 1],
            ['kode' => 'DPS', 'nama' => 'Denpasar', 'master' => 1],
            ['kode' => 'YOG', 'nama' => 'Yogyakarta', 'master' => 1],
            ['kode' => 'BKS', 'nama' => 'Bekasi', 'master' => 1],
            ['kode' => 'TNG', 'nama' => 'Tangerang', 'master' => 1],
            ['kode' => 'DPK', 'nama' => 'Depok', 'master' => 1],
            ['kode' => 'BGR', 'nama' => 'Bogor', 'master' => 1],
            ['kode' => 'MLG', 'nama' => 'Malang', 'master' => 1],
            ['kode' => 'PKL', 'nama' => 'Pekanbaru', 'master' => 1],
            ['kode' => 'BTM', 'nama' => 'Batam', 'master' => 1],
            ['kode' => 'BDJ', 'nama' => 'Banjarmasin', 'master' => 1],
            ['kode' => 'SMD', 'nama' => 'Samarinda', 'master' => 1],
            ['kode' => 'PTK', 'nama' => 'Pontianak', 'master' => 1],
            ['kode' => 'MKS', 'nama' => 'Manado', 'master' => 1],
            ['kode' => 'JMB', 'nama' => 'Jambi', 'master' => 1],
            ['kode' => 'PLU', 'nama' => 'Palangkaraya', 'master' => 1],
            ['kode' => 'KDI', 'nama' => 'Kendari', 'master' => 1],
            ['kode' => 'GTO', 'nama' => 'Gorontalo', 'master' => 1],
            ['kode' => 'AMB', 'nama' => 'Ambon', 'master' => 1],
            ['kode' => 'TTE', 'nama' => 'Ternate', 'master' => 1],
            ['kode' => 'JYP', 'nama' => 'Jayapura', 'master' => 1],
        ]);

    }
}
