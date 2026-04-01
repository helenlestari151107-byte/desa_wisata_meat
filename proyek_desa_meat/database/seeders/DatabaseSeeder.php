<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\ProfilDesa;
use App\Models\Berita;
use App\Models\Pengumuman;
use App\Models\Potensi;
use App\Models\Event;
use App\Models\Layanan;
use App\Models\KontakDesa;
use App\Models\NomorPenting;

class DatabaseSeeder extends Seeder {
    public function run(): void {

        \App\Models\User::firstOrCreate(
            ['email' => 'admin@desameat.id'],
            ['name' => 'Admin Desa Meat', 'password' => Hash::make('admin123')]
        );

        \App\Models\ProfilDesa::firstOrCreate([], [
            'nama_desa'        => 'Desa Wisata Meat',
            'sejarah'          => 'Desa Meat terletak di tepi Danau Toba, Kabupaten Toba, Sumatera Utara.',
            'visi'             => 'Mewujudkan Desa Meat sebagai Desa Wisata Unggulan.',
            'misi'             => "1. Mengembangkan potensi wisata\n2. Memberdayakan masyarakat lokal",
            'luas_wilayah'     => '325 Ha',
            'jumlah_penduduk'  => 1250,
            'jumlah_kk'        => 312,
            'nama_kepala_desa' => 'Parlindungan Simbolon',
            'no_telepon'       => '(0632) 21000',
            'email_desa'       => 'desameat@gmail.com',
            'alamat'           => 'Desa Meat, Kec. Balige, Kab. Toba, Sumatra Utara',
        ]);

        \App\Models\Berita::firstOrCreate(['slug' => 'festival-danau-toba-2024'], [
            'judul'        => 'Festival Danau Toba 2024 Dibuka di Desa Meat',
            'kategori'     => 'berita',
            'isi'          => 'Festival Danau Toba 2024 resmi dibuka dengan atraksi budaya Batak yang memukau.',
            'penulis'      => 'Admin',
            'is_published' => true,
            'published_at' => now(),
            'views'        => 120,
        ]);

        \App\Models\Berita::firstOrCreate(['slug' => 'program-beasiswa-2024'], [
            'judul'        => 'Program Beasiswa Anak Desa Meat 2024',
            'kategori'     => 'pengumuman',
            'isi'          => 'Pemerintah Desa Meat membuka program beasiswa bagi pelajar berprestasi.',
            'penulis'      => 'Admin',
            'is_published' => true,
            'published_at' => now()->subDays(5),
            'views'        => 80,
        ]);

        \App\Models\Berita::firstOrCreate(['slug' => 'wisata-kuliner-batak'], [
            'judul'        => 'Wisata Kuliner Tradisional Batak Semakin Diminati',
            'kategori'     => 'wisata',
            'isi'          => 'Makanan tradisional Batak seperti Saksang dan Arsik semakin banyak diminati wisatawan.',
            'penulis'      => 'Redaksi',
            'is_published' => true,
            'published_at' => now()->subDays(10),
            'views'        => 200,
        ]);

        \App\Models\Pengumuman::create([
            'judul'       => 'Jadwal Posyandu Bulan Juli 2024',
            'isi'         => 'Posyandu akan dilaksanakan setiap Kamis minggu pertama.',
            'tipe'        => 'umum',
            'tanggal'     => '2024-07-05',
            'berakhir_pada' => '2024-07-31',
            'is_aktif'    => true,
        ]);

        \App\Models\Pengumuman::create([
            'judul'       => 'Gotong Royong Desa Setiap Minggu Pagi',
            'isi'         => 'Warga diharapkan hadir setiap Minggu pukul 07.00 WIB.',
            'tipe'        => 'umum',
            'tanggal'     => '2024-07-01',
            'berakhir_pada' => '2024-12-31',
            'is_aktif'    => true,
        ]);

        \App\Models\Pengumuman::create([
            'judul'       => 'Festival Musik Tradisional Batak',
            'isi'         => 'Festival akan diadakan 15-17 Agustus 2024 di Lapangan Desa.',
            'tipe'        => 'event',
            'tanggal'     => '2024-08-15',
            'berakhir_pada' => '2024-08-17',
            'is_aktif'    => true,
        ]);

        \App\Models\Potensi::firstOrCreate(['nama' => 'Pantai Indah Danau Toba'], [
            'kategori'  => 'wisata',
            'deskripsi' => 'Hamparan pasir putih di tepi Danau Toba dengan pemandangan yang memesona.',
            'rating'    => 4.8,
            'lokasi'    => 'Tepi Danau Toba, Desa Meat',
            'tags'      => 'danau,alam,pantai',
            'is_aktif'  => true,
        ]);

        \App\Models\Potensi::firstOrCreate(['nama' => 'Huta Siallagan'], [
            'kategori'  => 'budaya',
            'deskripsi' => 'Kampung adat Batak Toba yang mempertahankan rumah tradisional dan batu persidangan kuno.',
            'rating'    => 4.7,
            'lokasi'    => 'Desa Meat, Balige',
            'tags'      => 'budaya,sejarah,adat',
            'is_aktif'  => true,
        ]);

        \App\Models\Potensi::firstOrCreate(['nama' => 'Air Terjun Sipiso-Piso'], [
            'kategori'  => 'wisata',
            'deskripsi' => 'Air terjun setinggi 120 meter yang menakjubkan, salah satu tertinggi di Sumatera.',
            'rating'    => 4.9,
            'lokasi'    => '5 km dari Desa Meat',
            'tags'      => 'alam,air terjun,petualangan',
            'is_aktif'  => true,
        ]);

        \App\Models\Potensi::firstOrCreate(['nama' => 'Kebun Kopi Arabika'], [
            'kategori'  => 'pertanian',
            'deskripsi' => 'Perkebunan kopi arabika organik dengan pemandangan Danau Toba.',
            'rating'    => 4.6,
            'lokasi'    => 'Perbukitan Desa Meat',
            'tags'      => 'pertanian,kopi,agrowisata',
            'is_aktif'  => true,
        ]);

        \App\Models\Event::insert([
            [
                'nama_event'      => 'Festival Danau Toba 2024',
                'deskripsi'       => 'Festival budaya dan pariwisata tahunan',
                'tanggal_mulai'   => '2024-08-15',
                'tanggal_selesai' => '2024-08-18',
                'lokasi'          => 'Pantai Desa Meat',
                'gambar'          => null,
                'is_aktif'        => true,
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'nama_event'      => 'Lomba Dayung Tradisional',
                'deskripsi'       => 'Lomba dayung perahu tradisional di Danau Toba',
                'tanggal_mulai'   => '2024-10-05',
                'tanggal_selesai' => '2024-10-06',
                'lokasi'          => 'Danau Toba',
                'gambar'          => null,
                'is_aktif'        => true,
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'nama_event'      => 'Panen Raya Kopi Arabika',
                'deskripsi'       => 'Pesta panen kopi arabika bersama wisatawan',
                'tanggal_mulai'   => '2024-11-10',
                'tanggal_selesai' => '2024-11-12',
                'lokasi'          => 'Kebun Kopi Desa Meat',
                'gambar'          => null,
                'is_aktif'        => true,
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
        ]);

        $layanans = [
            ['Surat Keterangan Domisili', 'fas fa-home',         'Penerbitan surat keterangan domisili warga', 'green', 1],
            ['Pengurusan KTP & KK',       'fas fa-id-card',      'Pelayanan administrasi kependudukan',        'teal',  2],
            ['Surat Tidak Mampu',         'fas fa-hand-holding-heart', 'Penerbitan SKTM untuk bantuan sosial', 'amber', 3],
            ['Surat Pengantar SKCK',      'fas fa-shield-alt',   'Surat pengantar untuk pembuatan SKCK',       'slate', 4],
            ['Akta Kelahiran',            'fas fa-baby',         'Penerbitan akta kelahiran warga baru',       'green', 5],
            ['Bantuan Sosial',            'fas fa-hand-holding-usd', 'Info dan pendaftaran program bansos',    'teal',  6],
            ['Izin Usaha Mikro',          'fas fa-store',        'Izin usaha mikro bagi pelaku UMKM',          'amber', 7],
            ['Legalisasi Surat',          'fas fa-stamp',        'Legalisasi berbagai surat dan dokumen',      'slate', 8],
        ];
        foreach ($layanans as [$nm, $ikon, $des, $wrn, $urt]) {
            \App\Models\Layanan::firstOrCreate(['nama' => $nm], [
                'ikon' => $ikon, 'deskripsi' => $des,
                'warna_ikon' => $wrn, 'urutan' => $urt, 'is_aktif' => true,
            ]);
        }

        \App\Models\KontakDesa::insert([
            ['nama'=>'Kantor Kepala Desa',     'jabatan'=>'Pelayanan Umum',  'nomor'=>'(0632) 21000',    'email'=>'desameat@gmail.com',    'ikon'=>'fas fa-landmark',  'created_at'=>now(),'updated_at'=>now()],
            ['nama'=>'Parlindungan Simbolon',  'jabatan'=>'Kepala Desa',     'nomor'=>'+62 813-6000-1234','email'=>'kades.meat@gmail.com',  'ikon'=>'fas fa-user-tie',  'created_at'=>now(),'updated_at'=>now()],
            ['nama'=>'Hotman Sirait',          'jabatan'=>'Sekretaris Desa', 'nomor'=>'+62 812-7000-5678','email'=>'sekdes.meat@gmail.com', 'ikon'=>'fas fa-user',      'created_at'=>now(),'updated_at'=>now()],
        ]);

        \App\Models\NomorPenting::insert([
            ['nama'=>'Ambulans RSUD Balige', 'kategori'=>'medis',     'nomor_telepon'=>'(0632) 21095','warna'=>'red',  'ikon'=>'fas fa-ambulance',        'created_at'=>now(),'updated_at'=>now()],
            ['nama'=>'Polsek Balige',        'kategori'=>'darurat',   'nomor_telepon'=>'(0632) 21110','warna'=>'blue', 'ikon'=>'fas fa-shield-alt',        'created_at'=>now(),'updated_at'=>now()],
            ['nama'=>'Pemadam Kebakaran',    'kategori'=>'darurat',   'nomor_telepon'=>'113',          'warna'=>'red',  'ikon'=>'fas fa-fire-extinguisher', 'created_at'=>now(),'updated_at'=>now()],
            ['nama'=>'PLN Balige',           'kategori'=>'utility',   'nomor_telepon'=>'123',          'warna'=>'amber','ikon'=>'fas fa-bolt',              'created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}