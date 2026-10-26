# Architecture — Website Katalog Parfum UMKM

## 1. Architecture Overview

Website menggunakan arsitektur monolitik Laravel dengan pola MVC dan Livewire untuk interaksi UI yang dinamis.

Laravel menangani routing, autentikasi, validasi, logika bisnis, serta akses database. Livewire mengelola interaksi frontend yang membutuhkan pembaruan tampilan tanpa reload halaman penuh.

Supabase menyediakan PostgreSQL sebagai database dan Storage sebagai penyimpanan gambar produk.

### Technology Stack

- Application framework: Laravel
- UI rendering: Blade
- Dynamic interaction: Livewire
- Styling: Tailwind CSS
- Database: Supabase PostgreSQL
- Image storage: Supabase Storage
- Application hosting: Hosting yang mendukung Laravel
- Domain: Milik pemilik toko

## 2. High-Level Architecture

```text
                    Pengunjung / Admin
                            |
                            v
                      Browser Client
                            |
                            v
                   Laravel Application
                    /        |        \
                   v         v         v
                Routes   Middleware   Views
                            |
                            v
                      Controllers /
                       Livewire
                            |
                            v
                    Eloquent Models
                            |
                  +---------+---------+
                  |                   |
                  v                   v
          Supabase PostgreSQL   Supabase Storage
          Data produk, admin    Foto produk
```

Laravel menjadi pusat logika aplikasi. Browser tidak mengakses kredensial database atau Storage yang bersifat rahasia secara langsung.

## 3. Application Layers

### 3.1 Routes

Lokasi: `routes/web.php`

Tanggung jawab:
- Mendefinisikan halaman publik.
- Mendefinisikan halaman login dan logout admin.
- Mendefinisikan route dashboard dan pengelolaan produk.
- Melindungi route admin menggunakan middleware autentikasi.

Route hanya mengatur pemetaan URL dan tidak menampung logika bisnis yang kompleks.

### 3.2 Middleware

Tanggung jawab:
- Memastikan pengunjung yang belum login tidak dapat mengakses halaman admin.
- Mengarahkan pengguna yang sudah login dari halaman login jika sesuai kebutuhan.
- Memastikan session autentikasi ditangani dengan benar.

Tidak ada sistem multi-role pada versi awal karena pengelolaan dilakukan oleh admin.

### 3.3 Controllers

Tanggung jawab:
- Mengatur alur request dan response untuk halaman publik yang menggunakan controller.
- Menangani proses yang tidak membutuhkan komponen Livewire.
- Menghasilkan atau mengunduh PDF sesuai kebutuhan.

Controller tidak perlu menjadi tempat semua logika aplikasi. Logika sederhana tetap dapat ditempatkan di controller selama strukturnya mudah dipahami dan dirawat.

### 3.4 Livewire Components

Tanggung jawab:
- Menangani pencarian katalog.
- Mengelola filter, pengurutan, dan pagination.
- Menampilkan produk terbaru dan Best Seller jika diimplementasikan sebagai komponen dinamis.
- Menangani interaksi CRUD admin apabila sesuai.
- Memvalidasi input pada server sebelum perubahan data disimpan.

Livewire berkomunikasi dengan server untuk memproses perubahan. Debounce dan pagination digunakan agar pencarian tidak mengirim permintaan berlebihan.

### 3.5 Models

Lokasi utama: `app/Models`

Model `Product` menangani representasi data produk melalui Eloquent.

Tanggung jawab:
- Mengakses data produk.
- Menyimpan dan memperbarui atribut produk.
- Menyediakan query produk terbaru dan Best Seller bila diperlukan.
- Mengelola atribut status dan informasi produk.

Model `User` digunakan untuk akun admin dan autentikasi Laravel.

Tidak diperlukan model atau tabel role tambahan selama kebutuhan akses tetap sederhana.

## 4. Database Architecture

Database menggunakan PostgreSQL yang disediakan Supabase.

### Products

Rancangan kolom utama:

| Kolom | Fungsi |
|---|---|
| `id` | Primary key |
| `name` | Nama parfum |
| `brand` | Merek parfum |
| `size` | Ukuran produk |
| `price` | Harga |
| `image_path` | Referensi file gambar di Storage |
| `status` | Status ketersediaan atau penjualan |
| `is_best_seller` | Penanda Best Seller manual |
| `created_at` | Waktu pembuatan produk |
| `updated_at` | Waktu terakhir diperbarui |

Harga menggunakan tipe numerik yang sesuai, bukan floating point.

### Users

Digunakan untuk akun admin yang terdaftar.

Kolom mengikuti kebutuhan autentikasi Laravel, termasuk identitas login dan password hash.

Tidak tersedia registrasi admin publik. Akun awal dibuat melalui proses setup atau seeder yang aman.

### Shop Information

Informasi toko dapat disimpan melalui konfigurasi sederhana atau tabel tersendiri jika admin perlu mengubahnya dari dashboard. Keputusan ini ditentukan berdasarkan kebutuhan aktual, bukan dibuat sebagai abstraksi sejak awal.

## 5. Storage Architecture

Supabase Storage digunakan untuk menyimpan foto produk.

Alur unggah:
1. Admin memilih foto melalui dashboard.
2. Laravel memvalidasi format dan ukuran file.
3. Laravel mengunggah file ke bucket yang telah dikonfigurasi.
4. Referensi atau path gambar disimpan pada `products.image_path`.
5. Website menggunakan referensi tersebut untuk menampilkan foto.

Saat foto diganti, aplikasi perlu memastikan file baru berhasil disimpan sebelum referensi database diperbarui. Penghapusan file lama dilakukan setelah perubahan berhasil agar tidak menyebabkan gambar produk hilang akibat kegagalan proses.

Bucket publik hanya digunakan untuk gambar yang memang boleh dilihat pengunjung. Operasi unggah, penggantian, dan penghapusan harus dibatasi.

## 6. Main Application Flows

### 6.1 Public Catalog

```text
Pengunjung membuka katalog
          |
          v
Laravel / Livewire menerima request
          |
          v
Query produk melalui Eloquent
          |
          v
Supabase PostgreSQL
          |
          v
Hasil dikirim ke Blade
          |
          v
Produk ditampilkan di browser
```

### 6.2 Live Search

```text
Pengunjung mengetik kata kunci
          |
          v
Livewire mengirim request
setelah jeda debounce
          |
          v
Laravel menjalankan query
nama produk / merek
          |
          v
Supabase PostgreSQL
          |
          v
Livewire memperbarui
bagian hasil katalog
```

Seluruh halaman tidak perlu dimuat ulang. Permintaan tetap diproses server, sehingga query dan validasi tetap harus efisien.

### 6.3 Admin CRUD

```text
Admin login
    |
    v
Session autentikasi
    |
    v
Admin membuka dashboard
    |
    v
Tambah / edit / ubah status / hapus
    |
    v
Validasi server
    |
    v
Database dan/atau Storage
    |
    v
Hasil operasi ditampilkan
```

### 6.4 Product PDF

```text
Admin meminta PDF
        |
        v
Laravel mengambil data produk
        |
        v
Menerapkan aturan status produk
        |
        v
Membuat PDF dari data terbaru
        |
        v
PDF diunduh
```

PDF tidak menjadi sumber data terpisah. Informasi produk dan harga selalu berasal dari database.

## 7. Business Logic Rules

- Produk Terbaru ditentukan menggunakan `created_at`, dengan batas 14 hari.
- Mengubah harga atau informasi produk tidak menjadikan produk lama sebagai produk terbaru.
- Best Seller dipilih secara manual oleh admin.
- Status ketersediaan tidak bergantung pada penanda Best Seller.
- Produk yang tidak lagi dijual tidak muncul pada katalog publik maupun PDF.
- Produk habis dapat tetap ditampilkan dengan label yang jelas.
- Setiap produk menggunakan halaman detail yang konsisten dari homepage dan katalog.
- Data produk tidak perlu diduplikasi untuk kebutuhan homepage, katalog, dan PDF.

## 8. Security Architecture

- Route admin dilindungi autentikasi Laravel.
- Password disimpan menggunakan hashing.
- Input dan unggahan file divalidasi di server.
- Kredensial Supabase yang bersifat rahasia disimpan pada environment server.
- Supabase secret/service-role key tidak boleh dikirim ke browser.
- Kebijakan RLS dan hak akses database disesuaikan dengan metode koneksi aplikasi.
- Operasi Storage dibatasi sesuai kebutuhan aplikasi.
- Session dan logout ditangani dengan benar.
- Pesan error kepada pengguna tidak membocorkan kredensial atau detail internal.

Jika Laravel menjadi satu-satunya jalur akses database, gunakan kredensial server dengan hak minimum yang diperlukan dan jangan membuka akses tulis publik secara tidak sengaja.

## 9. Deployment Architecture

Komponen deployment:
- Domain toko mengarah ke hosting aplikasi Laravel.
- Laravel berjalan di lingkungan yang mendukung versi PHP dan dependensi proyek.
- Laravel mengakses Supabase PostgreSQL melalui koneksi yang sesuai.
- Laravel mengakses Supabase Storage untuk operasi gambar.
- Environment production menggunakan kredensial tersendiri.
- Backup database dan gambar dilakukan sesuai kemampuan layanan.

Sebelum deployment, pastikan konfigurasi koneksi database, SSL, document root, file permission, cache konfigurasi, dan proses build aset telah diuji.

## 10. Architecture Constraints

Versi awal tidak menggunakan:
- Microservices.
- Multi-role dan permission kompleks.
- Repository pattern tanpa kebutuhan yang jelas.
- API backend terpisah hanya untuk menghubungkan frontend.
- Sistem transaksi atau perhitungan Best Seller otomatis.
- Penyimpanan data produk yang terpisah untuk setiap halaman.

Arsitektur dapat berkembang jika kebutuhan bisnis berubah, tetapi perubahan tersebut harus didasarkan pada kebutuhan nyata.
