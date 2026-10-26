# Requirements — Website Katalog Parfum UMKM

## 1. Project Overview

Website katalog parfum untuk membantu pelanggan mengenal toko, melihat produk dan harga, serta memperoleh informasi untuk mengunjungi toko fisik.

Website ini berfokus pada branding dan katalog digital, bukan e-commerce.

### Tujuan
- Memperkenalkan identitas dan informasi toko.
- Menampilkan katalog parfum yang mudah dijelajahi.
- Mempermudah pengelola memperbarui informasi produk.
- Menyediakan daftar harga produk dalam format PDF.
- Menjadi media informasi digital yang dapat diakses melalui domain toko.

## 2. Technology Stack

- Backend: Laravel
- Frontend: Blade, Livewire, Tailwind CSS
- Database: Supabase PostgreSQL
- Image Storage: Supabase Storage
- Authentication: Laravel authentication
- Deployment: Hosting aplikasi yang mendukung Laravel
- Domain: Domain milik pemilik toko

Versi framework dan detail deployment ditentukan saat setup proyek.

## 3. Functional Requirements

### FR-01 — Homepage
- Menampilkan identitas toko dan hero/banner.
- Menyediakan CTA "Lihat Produk Kami" menuju katalog.
- Menyediakan CTA "Tentang Kami" menuju informasi toko.
- Menampilkan bagian Produk Terbaru.
- Menampilkan bagian Best Seller.
- Menyediakan akses ke informasi lokasi dan kontak toko.

### FR-02 — Produk Terbaru
- Menampilkan produk yang dibuat dalam 14 hari terakhir.
- Mengurutkan produk dari yang terbaru.
- Hanya menampilkan produk yang masih dijual dan tersedia untuk ditampilkan.
- Menggunakan tanggal pembuatan produk, bukan tanggal terakhir diedit.
- Menyembunyikan seluruh bagian jika tidak ada produk yang memenuhi kriteria.

### FR-03 — Best Seller
- Admin dapat menandai produk sebagai Best Seller.
- Produk ditampilkan selama masih memenuhi aturan publikasi.
- Produk yang tidak lagi dijual tidak ditampilkan, meskipun masih ditandai Best Seller.
- Bagian disembunyikan jika tidak memiliki produk yang memenuhi kriteria.
- Penentuan Best Seller dilakukan secara manual, bukan berdasarkan transaksi.

### FR-04 — Product Catalog
Setiap kartu produk menampilkan informasi yang tersedia:
- Foto produk.
- Nama parfum.
- Merek.
- Ukuran.
- Harga.
- Status ketersediaan.

Fitur katalog:
- Pencarian berdasarkan nama parfum atau merek.
- Filter atau pengurutan jika diperlukan.
- Pagination untuk membatasi jumlah produk per halaman.
- Kartu produk memiliki petunjuk visual yang jelas bahwa produk dapat dibuka.

Pencarian harus memperbarui hasil tanpa reload halaman penuh, menggunakan Livewire.

### FR-05 — Product Detail
- Setiap produk memiliki halaman detail.
- Kartu pada homepage dan katalog mengarah ke halaman detail produk yang sama.
- Detail menampilkan informasi produk yang tersedia.
- Informasi toko dan cara mengunjungi toko mudah ditemukan.
- Produk yang tidak lagi dijual tidak dapat ditampilkan sebagai produk aktif.

### FR-06 — Shop Information
Website menyediakan informasi:
- Nama dan identitas toko.
- Alamat.
- Jam operasional.
- Kontak WhatsApp.
- Media sosial jika tersedia.

Informasi hanya boleh ditampilkan setelah dikonfirmasi oleh pemilik toko.

### FR-07 — Admin Authentication
- Tidak ada registrasi admin publik.
- Akun admin dibuat melalui proses setup atau seeder yang aman.
- Admin dapat login dan logout.
- Halaman pengelolaan hanya dapat diakses setelah autentikasi.
- Password disimpan menggunakan hashing.
- Admin dapat mengganti password melalui mekanisme yang ditentukan.

### FR-08 — Product Management
Admin dapat:
- Menambahkan produk.
- Melihat daftar produk.
- Mengubah informasi produk.
- Mengunggah atau mengganti foto.
- Mengubah harga dan ukuran.
- Mengubah status ketersediaan.
- Menandai atau menghapus tanda Best Seller.

Input harus divalidasi di server.

### FR-09 — Product Image Management
- Foto produk disimpan di Supabase Storage.
- Database menyimpan path atau referensi foto.
- Penggantian foto menangani file lama dengan benar.
- Penghapusan produk menangani foto terkait sesuai aturan penghapusan.
- Format dan ukuran file dibatasi melalui validasi.

### FR-10 — Product Status
Status produk sekurang-kurangnya mencakup:
- Tersedia.
- Habis.
- Tidak lagi dijual.

Produk yang tidak lagi dijual tidak ditampilkan di katalog publik maupun PDF harga. Produk habis dapat tetap ditampilkan dengan label yang jelas.

### FR-11 — PDF Product List
- Admin dapat menghasilkan PDF daftar produk dan harga.
- Data PDF berasal dari database yang sama dengan katalog.
- Perubahan harga tidak perlu dilakukan secara terpisah pada PDF.
- Produk yang tidak lagi dijual tidak dimasukkan.
- Informasi produk dan harga harus konsisten dengan data terbaru.

## 4. Business Rules

- Website tidak menyediakan keranjang belanja, checkout, pembayaran online, pengiriman, atau pelacakan pesanan.
- Produk Terbaru ditentukan dari `created_at`.
- Best Seller ditentukan secara manual melalui admin.
- Best Seller dan status ketersediaan merupakan dua atribut yang berbeda.
- Produk yang tidak lagi dijual dikecualikan dari tampilan publik dan PDF.
- Seluruh halaman publik menggunakan sumber data produk yang sama.
- Perubahan data produk dilakukan melalui area admin yang terlindungi.

## 5. Non-Functional Requirements

### Security
- Seluruh halaman admin dilindungi autentikasi.
- Kredensial rahasia tidak boleh diekspos ke frontend atau repository publik.
- Akses database dan Storage dibatasi sesuai kebutuhan.
- Input dan unggahan file divalidasi di server.
- Akses database langsung melalui API tidak boleh memungkinkan pengunjung mengubah data tanpa izin.

### Usability
- Tampilan responsif untuk desktop dan perangkat mobile.
- Informasi nama, ukuran, harga, dan status produk mudah dibaca.
- Navigasi katalog dan informasi lokasi mudah ditemukan.
- Tampilan memiliki hierarki visual dan petunjuk interaksi yang jelas.

### Maintainability
- Struktur kode mengikuti pola Laravel yang sesuai dengan kompleksitas proyek.
- Komponen UI yang berulang dapat digunakan kembali.
- Konfigurasi environment dipisahkan dari source code.
- Proses pengelolaan produk mudah dipahami oleh admin.

### Reliability
- Kegagalan penyimpanan atau unggahan ditangani dengan pesan yang jelas.
- Perubahan data tidak boleh menghasilkan informasi katalog dan PDF yang tidak konsisten.
- Data dan gambar memiliki prosedur pencadangan yang sesuai dengan kemampuan layanan yang digunakan.

## 6. Acceptance Criteria

Proyek dianggap memenuhi scope awal apabila:

- Pengunjung dapat membuka homepage, katalog, detail produk, dan informasi toko.
- Pencarian produk bekerja tanpa reload halaman penuh.
- Produk terbaru mengikuti aturan 14 hari.
- Best Seller mengikuti pilihan admin.
- Produk dapat dikelola melalui dashboard admin.
- Foto produk berhasil diunggah dan ditampilkan.
- Produk yang tidak lagi dijual tidak muncul pada katalog publik dan PDF.
- PDF mencerminkan data produk dan harga terbaru.
- Pengunjung tanpa autentikasi tidak dapat mengakses atau menjalankan operasi admin.
- Website dapat diakses melalui domain dan berfungsi pada perangkat mobile.

## 7. Out of Scope

Fitur berikut tidak termasuk dalam versi awal:
- Keranjang belanja.
- Checkout dan pembayaran online.
- Pengelolaan pesanan.
- Pengiriman dan pelacakan pesanan.
- Diskon otomatis.
- Perhitungan Best Seller berdasarkan transaksi.
- Multi-role dan permission kompleks.
- Registrasi pelanggan.
- Integrasi marketplace.

Fitur tambahan memerlukan persetujuan scope dan anggaran terpisah dari pemilik toko.
