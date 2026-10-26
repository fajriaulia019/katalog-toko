# TASKS.md

# Project Tasks — Perfume Catalog

**Project:** Website Katalog Parfum UMKM  
**Status:** In Progress  
**Development Strategy:** Local-first development

## Phase 1 — Project Setup

**Goal:** Menyiapkan fondasi aplikasi Laravel.

- [x] Membuat project Laravel.
- [x] Menginisialisasi Git repository.
- [x] Membuat repository GitHub.
- [x] Mengatur file `.env` untuk development lokal.
- [x] Memasang dan mengonfigurasi Tailwind CSS.
- [x] Memasang dan mengonfigurasi Livewire.
- [x] Memastikan Laravel dapat dijalankan secara lokal.
- [x] Membuat layout Blade dasar.
- [x] Menguji responsive layout awal.
- [x] Membuat struktur direktori yang diperlukan.

**Acceptance criteria:**
- Aplikasi berjalan tanpa error.
- Tailwind CSS berfungsi.
- Komponen Livewire dapat dirender.
- Perubahan kode dapat dilacak melalui Git.

## Phase 2 — Database and Data Model

**Goal:** Menyiapkan struktur data aplikasi menggunakan koneksi Supabase PostgreSQL yang sudah tersedia.

- [ ] Memverifikasi koneksi Laravel ke Supabase PostgreSQL.
- [ ] Memastikan migration dapat dijalankan pada PostgreSQL.
- [ ] Menentukan struktur tabel produk.
- [ ] Membuat migration tabel produk.
- [ ] Membuat model `Product`.
- [ ] Menentukan status produk dan atribut `is_best_seller`.
- [ ] Membuat factory dan seeder untuk data produk dummy.
- [ ] Menyiapkan akun admin melalui seeder.
- [ ] Menguji operasi CRUD menggunakan Eloquent.
- [ ] Memastikan tipe data dan query kompatibel dengan PostgreSQL.

**Acceptance criteria:**
- Migration berhasil dijalankan pada Supabase PostgreSQL.
- Data produk dapat disimpan, dibaca, diperbarui, dan dihapus melalui Eloquent.
- Data dummy dapat dibuat untuk kebutuhan pengembangan.
- Kredensial koneksi tidak masuk ke repository.

**Notes:**
- Database menggunakan Supabase PostgreSQL sejak awal.
- Gambar produk tetap menggunakan local storage Laravel selama pengembangan lokal.
- Integrasi Supabase Storage dikerjakan pada fase terpisah setelah aplikasi lokal stabil.

## Phase 3 — Authentication and Admin Access

**Goal:** Mengamankan akses dashboard dan fitur pengelolaan produk.

- [ ] Membuat halaman login admin.
- [ ] Mengimplementasikan proses autentikasi.
- [ ] Mengimplementasikan logout.
- [ ] Melindungi route admin menggunakan middleware autentikasi.
- [ ] Mengalihkan pengguna yang sudah login dari halaman login.
- [ ] Memvalidasi input login.
- [ ] Menguji akses halaman admin tanpa autentikasi.
- [ ] Menyiapkan mekanisme pengelolaan akun admin.

**Acceptance criteria:**
- Admin dapat login dan logout.
- Pengunjung yang belum login tidak dapat mengakses dashboard.
- Kredensial tidak disimpan dalam source code.
- Password disimpan menggunakan hashing yang aman.

## Phase 4 — Admin Product Management

**Goal:** Mengimplementasikan pengelolaan produk dari dashboard admin.

- [ ] Membuat halaman daftar produk.
- [ ] Membuat form tambah produk.
- [ ] Membuat form edit produk.
- [ ] Mengimplementasikan penghapusan produk.
- [ ] Menambahkan validasi input produk.
- [ ] Mengimplementasikan upload gambar ke local storage Laravel.
- [ ] Menampilkan preview gambar.
- [ ] Mengimplementasikan penggantian gambar.
- [ ] Menghapus file gambar lama ketika gambar diganti atau produk dihapus permanen.
- [ ] Mengimplementasikan status produk.
- [ ] Mengimplementasikan toggle Best Seller.
- [ ] Menambahkan pagination pada daftar produk jika diperlukan.
- [ ] Menguji validasi file dan ukuran gambar.

**Local image storage strategy:**
- File gambar disimpan melalui Laravel Filesystem.
- Gambar publik disimpan pada disk yang sesuai, dengan akses melalui symbolic link `public/storage` jika menggunakan disk `public`.
- Database menyimpan path gambar, bukan isi file gambar.
- Operasi upload dan penghapusan gambar hanya dapat dilakukan oleh admin yang terautentikasi.

**Acceptance criteria:**
- Admin dapat melakukan CRUD produk.
- Gambar dapat ditampilkan dari local storage.
- Validasi mencegah file yang tidak sesuai.
- Penggantian dan penghapusan gambar tidak meninggalkan file yang tidak diperlukan.

## Phase 5 — Public Website

**Goal:** Membangun halaman katalog yang dapat digunakan pengunjung.

- [ ] Membuat layout utama website publik.
- [ ] Membuat navbar dan footer.
- [ ] Membuat homepage.
- [ ] Membuat section Produk Terbaru.
- [ ] Membuat section Best Seller.
- [ ] Membuat halaman katalog.
- [ ] Membuat product card reusable.
- [ ] Membuat halaman detail produk.
- [ ] Menampilkan harga, brand, ukuran, dan status ketersediaan.
- [ ] Menampilkan informasi toko, alamat, jam operasional, dan kontak.
- [ ] Menangani produk yang sudah tidak dijual.
- [ ] Menambahkan empty state ketika produk tidak tersedia.

**Business rules:**
- Produk terbaru menggunakan `created_at` dalam rentang 14 hari.
- Produk terbaru diurutkan dari yang paling baru.
- Best Seller dipilih secara manual oleh admin.
- Produk yang sudah tidak dijual tidak ditampilkan pada katalog publik.
- Produk habis dapat ditampilkan dengan label yang jelas.
- Section Produk Terbaru dan Best Seller disembunyikan jika tidak memiliki produk yang memenuhi syarat.

**Acceptance criteria:**
- Pengunjung dapat menjelajahi katalog tanpa login.
- Setiap produk aktif memiliki halaman detail.
- Status produk ditampilkan dengan jelas.
- Layout berfungsi pada desktop dan mobile.

## Phase 6 — Search, Filter, and Pagination

**Goal:** Mempermudah pengunjung menemukan produk.

- [ ] Membuat Livewire search component.
- [ ] Mengimplementasikan pencarian berdasarkan nama produk.
- [ ] Mengimplementasikan pencarian berdasarkan brand.
- [ ] Menambahkan debounce pada pencarian.
- [ ] Mengimplementasikan filter yang disepakati.
- [ ] Mengimplementasikan pagination.
- [ ] Memastikan pagination kembali ke halaman pertama ketika pencarian berubah.
- [ ] Menangani loading state.
- [ ] Menangani empty state hasil pencarian.
- [ ] Menguji kombinasi pencarian, filter, dan pagination.

**Acceptance criteria:**
- Hasil pencarian diperbarui tanpa full-page reload.
- Pencarian dan pagination menghasilkan data yang konsisten.
- Request pencarian tidak dikirim pada setiap perubahan karakter tanpa jeda.
- Interaksi tetap nyaman pada perangkat mobile.

## Phase 7 — PDF Product and Price List

**Goal:** Menghasilkan dokumen daftar produk dari data yang sama dengan katalog.

- [ ] Memilih library PDF yang kompatibel dengan Laravel.
- [ ] Membuat layout PDF.
- [ ] Mengambil data produk dari database.
- [ ] Menentukan produk dan status yang boleh masuk ke PDF.
- [ ] Mengimplementasikan export PDF untuk admin.
- [ ] Menguji format harga dan informasi produk.
- [ ] Menguji hasil PDF ketika data produk bertambah.

**Acceptance criteria:**
- PDF dibuat berdasarkan data terbaru dari database.
- Data harga dan produk konsisten dengan sistem.
- Produk yang sudah tidak dijual mengikuti aturan bisnis yang disepakati.
- Export hanya dapat diakses admin jika tetap menjadi fitur khusus admin.

## Phase 8 — Supabase Integration

**Goal:** Memindahkan koneksi database ke Supabase PostgreSQL dan mengintegrasikan Supabase Storage setelah aplikasi berjalan dengan baik secara lokal.

### PostgreSQL
- [ ] Membuat dan mengonfigurasi project Supabase.
- [ ] Mengatur koneksi PostgreSQL pada environment Laravel.
- [ ] Memastikan kredensial database tidak masuk ke repository.
- [ ] Menguji koneksi dari Laravel.
- [ ] Menguji migration pada PostgreSQL.
- [ ] Menguji operasi CRUD menggunakan Eloquent.
- [ ] Memeriksa kompatibilitas tipe data dan query.
- [ ] Menyiapkan strategi pemindahan data jika diperlukan.

### Supabase Storage
- [ ] Menentukan bucket untuk gambar produk.
- [ ] Menentukan kebijakan akses baca dan tulis.
- [ ] Mengintegrasikan upload gambar dari Laravel.
- [ ] Mengintegrasikan penggantian dan penghapusan gambar.
- [ ] Memindahkan atau mengunggah ulang gambar yang diperlukan.
- [ ] Memastikan database menyimpan path atau key gambar yang benar.
- [ ] Menguji tampilan gambar dari Supabase Storage.
- [ ] Menguji error handling jika upload gagal.

**Acceptance criteria:**
- Laravel dapat membaca dan menulis data ke PostgreSQL Supabase.
- Upload, penggantian, dan penghapusan gambar berjalan sesuai kebijakan akses.
- Tidak ada secret key yang terekspos di browser atau repository.
- Data produk dan referensi gambar tetap konsisten.

**Important:** Integrasi Supabase Storage tidak harus dilakukan bersamaan dengan integrasi PostgreSQL. Keduanya dapat diuji secara terpisah.

## Phase 9 — Testing and Security

**Goal:** Memastikan fitur berjalan dengan benar dan akses terlindungi.

- [ ] Menguji autentikasi dan logout.
- [ ] Menguji proteksi route admin.
- [ ] Menguji validasi form produk.
- [ ] Menguji upload file yang valid dan tidak valid.
- [ ] Menguji operasi CRUD.
- [ ] Menguji pencarian, filter, dan pagination.
- [ ] Menguji aturan Produk Terbaru dan Best Seller.
- [ ] Menguji export PDF.
- [ ] Menguji responsive layout.
- [ ] Memeriksa konfigurasi environment.
- [ ] Memeriksa penanganan error dan logging.
- [ ] Menguji alur utama dari pengelolaan produk hingga tampil di katalog.

**Acceptance criteria:**
- Tidak ada bug kritis pada alur utama.
- Pengunjung tidak dapat mengubah data produk.
- Data input divalidasi di server.
- File upload dibatasi berdasarkan tipe dan ukuran.
- Error internal tidak ditampilkan kepada pengunjung production.

## Phase 10 — Deployment and Handover

**Goal:** Menjalankan website pada hosting dan menyerahkannya kepada pemilik toko.

- [ ] Memilih hosting yang mendukung kebutuhan Laravel.
- [ ] Mengonfigurasi domain.
- [ ] Menyiapkan environment production.
- [ ] Menjalankan migration pada database production.
- [ ] Mengonfigurasi penyimpanan gambar sesuai tahap integrasi terakhir.
- [ ] Mengonfigurasi build asset production.
- [ ] Menguji website setelah deployment.
- [ ] Menguji login admin dan CRUD pada production.
- [ ] Menyiapkan backup database dan file yang diperlukan.
- [ ] Menulis README penggunaan dan setup.
- [ ] Membuat panduan admin sederhana.
- [ ] Melatih admin mengelola produk.
- [ ] Menyerahkan akses dan informasi pemeliharaan kepada pemilik.

**Acceptance criteria:**
- Website dapat diakses melalui domain.
- Fitur utama berjalan di production.
- Pemilik memiliki kendali atas akun domain dan layanan terkait.
- Admin memahami cara mengelola katalog.
- Batas dukungan dan pemeliharaan disepakati.

## Development Notes

- Kerjakan fase secara berurutan, tetapi boleh kembali ke fase sebelumnya jika ditemukan masalah.
- Uji setiap fitur sebelum melanjutkan ke fitur berikutnya.
- Jangan menambahkan fitur di luar scope tanpa meninjau kebutuhan dan dampaknya.
- Dokumentasi boleh diperbarui selama implementasi.
- Gunakan Git untuk mencatat perubahan secara bertahap.
- Supabase Storage sengaja ditunda sampai implementasi lokal stabil.
