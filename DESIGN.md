# DESIGN.md

# Design System — Perfume Catalog

**Version:** Alpha  
**Status:** Draft  
**Design Direction:** Green Glassmorphism + Modern Fragrance Boutique

## 1. Design Overview

Website ini merupakan katalog digital untuk toko parfum UMKM. Desain berfokus pada identitas toko, eksplorasi produk, kemudahan menemukan parfum, dan informasi untuk mengunjungi toko fisik.

### Design Principles

- **Product First:** Foto, nama, ukuran, harga, dan ketersediaan produk harus mudah ditemukan.
- **Consistent:** Warna, tipografi, spacing, dan komponen digunakan secara konsisten.
- **Readable:** Informasi tetap jelas pada desktop maupun perangkat mobile.
- **Subtle Motion:** Animasi digunakan untuk meningkatkan feedback interaksi, bukan sekadar dekorasi.
- **Maintainable:** Design token dikelola secara terpusat agar perubahan desain tidak memerlukan banyak perubahan kode.

### Visual Direction

Mengadaptasi pendekatan visual NOON dengan penyesuaian untuk katalog parfum:

- Green-based color palette
- Modern editorial typography
- Glassmorphism sebagai aksen visual
- Solid product cards untuk menjaga keterbacaan
- CSS Grid dan Flexbox untuk layout responsif
- Mobile-first responsive design

## 2. Color System

Palet berikut merupakan palet eksplorasi awal. Warna final harus disesuaikan dengan logo, identitas visual, dan kemasan produk toko.

| Token | Hex | Usage |
|---|---|---|
| Primary | `#174D38` | CTA, tombol utama, identitas visual |
| Primary Dark | `#10251C` | Hero gelap, footer, area kontras tinggi |
| Primary Light | `#D5E8D8` | Background aksen dan panel |
| Accent | `#D5AE68` | Detail dekoratif dan highlight |
| Background | `#F6F5EF` | Background halaman |
| Surface | `#FFFFFF` | Kartu produk dan form |
| Text Primary | `#202720` | Judul dan teks utama |
| Text Secondary | `#626B63` | Deskripsi dan metadata |
| Border | `#E2E7E1` | Border kartu dan input |
| Success | `#287A4B` | Status berhasil |
| Warning | `#946200` | Peringatan |
| Danger | `#B42318` | Error dan tindakan berisiko |

### Color Rules

- Primary digunakan untuk aksi utama dan elemen identitas.
- Accent digunakan secara terbatas agar tidak bersaing dengan foto produk.
- Background dan Surface menjaga kontras antara konten dan halaman.
- Status produk tidak hanya dibedakan berdasarkan warna; gunakan label teks.
- Kontras teks dan background harus diuji sebelum deployment.
- Perubahan palet dilakukan melalui design token, bukan warna hardcoded di banyak komponen.

## 3. Typography

### Font Family

- Heading: `system-ui`, weight 700
- Body: `system-ui`, weight 400
- Button and Navigation: `system-ui`, weight 500–600

Font serif untuk heading dapat dieksplorasi apabila identitas toko mengarah ke gaya luxury atau editorial.

### Type Scale

| Element | Desktop | Mobile | Weight |
|---|---:|---:|---:|
| H1 | 40 px | 32 px | 700 |
| H2 | 32 px | 26 px | 700 |
| H3 | 24 px | 21 px | 600 |
| H4 | 20 px | 18 px | 600 |
| Body | 16 px | 16 px | 400 |
| Small | 14 px | 14 px | 400 |
| Caption | 12 px | 12 px | 400 |

### Typography Rules

- Nama produk harus mudah dibaca dan tidak terpotong tanpa alasan.
- Harga harus terlihat jelas pada kartu produk.
- Gunakan panjang baris yang nyaman untuk membaca deskripsi.
- Hindari terlalu banyak variasi ukuran dan weight dalam satu halaman.

## 4. Spacing System

Spacing menggunakan skala berbasis kelipatan 4 px.

| Token | Value |
|---|---:|
| `space-1` | 4 px |
| `space-2` | 8 px |
| `space-3` | 12 px |
| `space-4` | 16 px |
| `space-6` | 24 px |
| `space-8` | 32 px |
| `space-12` | 48 px |
| `space-16` | 64 px |
| `space-20` | 80 px |

### Spacing Rules

- Gunakan spacing token untuk padding dan margin komponen.
- Padding horizontal halaman harus responsif.
- Jarak antar-section lebih besar daripada jarak antar-elemen dalam satu komponen.
- Hindari penggunaan angka spacing acak jika token yang tersedia sudah mencukupi.

## 5. Border Radius and Elevation

### Border Radius

| Token | Value | Usage |
|---|---:|---|
| Small | 4 px | Label dan elemen kecil |
| Medium | 8 px | Input dan tombol |
| Large | 16 px | Kartu dan panel |
| Extra Large | 24 px | Hero panel atau section dekoratif |

### Elevation

- Product card: border halus, shadow minimal.
- Dropdown and floating panel: shadow sedang.
- Glass panel: border transparan dan blur secukupnya.
- Hindari shadow berat pada semua elemen.

## 6. Glassmorphism and Motion

### Glassmorphism

Glass effect digunakan pada elemen tertentu, seperti:

- Navbar transparan di atas hero.
- Panel informasi di atas background dekoratif.
- Elemen visual pendukung.

Glass effect tidak menjadi default untuk seluruh kartu produk, form, atau tabel admin.

### Motion

- Target motion intensity: 3–4/10.
- Hover dan focus feedback harus singkat dan jelas.
- Animasi dekoratif tidak boleh menghambat interaksi.
- Hindari animasi berlebihan pada katalog dan dashboard.
- Hormati preferensi `prefers-reduced-motion`.

Durasi awal:
- Micro-interaction: 150–200 ms.
- Hover transition: 200–300 ms.
- Animasi dekoratif: sesingkat mungkin dan tidak wajib.

## 7. Layout and Responsive Design

### Layout

- Gunakan CSS Grid untuk katalog produk dan layout multi-kolom.
- Gunakan Flexbox untuk navbar, tombol, dan kelompok elemen.
- Gunakan container dengan lebar maksimum yang konsisten.
- Hindari horizontal scrolling pada viewport normal.

### Responsive Breakpoints

Breakpoint awal dapat mengikuti breakpoint Tailwind CSS yang digunakan project:

- Mobile: di bawah 640 px.
- Tablet: 640–1023 px.
- Desktop: 1024 px ke atas.

Breakpoint dapat berubah jika hasil pengujian layout menunjukkan kebutuhan lain.

### Product Grid

- Mobile: 2 kolom jika konten masih terbaca; 1 kolom untuk layout yang membutuhkan kartu lebih lebar.
- Tablet: 2–3 kolom.
- Desktop: 3–4 kolom sesuai lebar container.
- Foto menggunakan rasio yang konsisten.
- Nama, ukuran, harga, dan status tidak boleh tertutup atau sulit dibaca.

## 8. Page Structure

### Homepage

1. Navbar dan identitas toko.
2. Hero section dengan CTA menuju katalog.
3. Produk terbaru.
4. Best Seller.
5. Informasi singkat tentang toko.
6. Alamat, jam operasional, dan kontak.
7. Footer.

Section Produk Terbaru dan Best Seller disembunyikan jika tidak memiliki produk yang memenuhi business rules.

### Product Catalog

1. Page heading.
2. Live search.
3. Filter dan sorting jika diperlukan.
4. Product grid.
5. Pagination.
6. Empty state jika hasil tidak ditemukan.

Live search menggunakan Livewire dengan debounce dan pagination agar perubahan input tidak menghasilkan request yang berlebihan.

### Product Detail

1. Foto produk.
2. Nama dan brand.
3. Ukuran.
4. Harga.
5. Status ketersediaan.
6. Deskripsi jika tersedia.
7. CTA atau informasi untuk menghubungi toko atau berkunjung.

Produk yang sudah tidak dijual tidak ditampilkan sebagai produk aktif. Penanganan direct URL mengikuti business rules pada `REQUIREMENTS.md`.

### Admin Dashboard

1. Navigasi admin.
2. Ringkasan data yang memang diperlukan.
3. Daftar produk.
4. Form tambah dan edit produk.
5. Status produk dan Best Seller.
6. Aksi export PDF.

Dashboard admin mengutamakan kejelasan, efisiensi, dan keterbacaan daripada efek dekoratif.

## 9. Component Guidelines

Komponen yang direncanakan:

- Navbar
- Footer
- Primary Button
- Secondary Button
- Product Card
- Product Grid
- Search Input
- Filter Control
- Pagination
- Product Status Badge
- Empty State
- Form Input
- Confirmation Dialog
- Alert / Feedback Message

### Component Rules

- Satu komponen harus memiliki fungsi yang jelas.
- Komponen reusable digunakan ketika pola yang sama muncul berulang.
- State loading, empty, success, dan error harus ditangani sesuai kebutuhan interaksi.
- Interaksi penting harus memiliki keyboard focus yang terlihat.
- Komponen Livewire tidak dibuat hanya untuk elemen statis yang sederhana.

## 10. Product Image Guidelines

- Foto produk harus jelas dan tidak terdistorsi.
- Gunakan rasio gambar yang konsisten pada katalog.
- Hindari crop yang menghilangkan bentuk utama botol.
- Gunakan placeholder ketika gambar tidak tersedia.
- Foto publik hanya dapat dibaca oleh pengunjung sesuai konfigurasi Storage.
- Upload dan penghapusan gambar hanya boleh dilakukan oleh admin terautentikasi dan terotorisasi.

## 11. Accessibility and Usability

- Gunakan semantic HTML sesuai fungsi elemen.
- Tombol dan link harus memiliki tujuan yang jelas.
- Form input memiliki label yang sesuai.
- Semua interaksi penting dapat digunakan melalui keyboard.
- Jangan mengandalkan warna saja untuk menunjukkan status.
- Pastikan teks memiliki kontras yang memadai.
- Sediakan alternatif untuk gambar yang memiliki makna.
- Hormati pengaturan reduced motion pengguna.

## 12. Design Implementation

Implementasi menggunakan:

- Laravel Blade untuk struktur halaman dan template.
- Tailwind CSS untuk styling dan responsive layout.
- Livewire untuk interaksi dinamis yang memerlukan komunikasi dengan server.
- CSS tambahan hanya ketika utility class tidak cukup praktis.

Design token dikelola secara terpusat sesuai konfigurasi Tailwind CSS yang dipakai project.

Hindari menyalin nilai warna, spacing, dan radius secara berulang ke banyak komponen.

## 13. Design Validation Checklist

- [ ] Warna final sudah dikonfirmasi berdasarkan identitas toko.
- [ ] Heading dan body text terbaca di desktop dan mobile.
- [ ] Product card konsisten.
- [ ] Foto produk tidak terdistorsi.
- [ ] Harga dan status produk mudah ditemukan.
- [ ] Navbar dan CTA berfungsi di mobile.
- [ ] Glass effect tidak mengganggu keterbacaan.
- [ ] Live search memiliki loading dan empty state yang sesuai.
- [ ] Form admin memiliki validasi dan feedback.
- [ ] Keyboard focus dan reduced motion sudah diperiksa.
- [ ] Layout diuji pada beberapa ukuran layar.
- [ ] Tidak ada horizontal overflow yang tidak diinginkan.

## 14. Open Decisions

Keputusan berikut harus dikonfirmasi sebelum desain dianggap final:

- Warna hijau resmi toko dan penggunaan logo.
- Karakter visual final: premium, modern, atau fresh.
- Font final berdasarkan kebutuhan visual dan lisensi.
- Rasio foto produk berdasarkan aset yang tersedia.
- Jumlah kolom katalog pada mobile.
- Penempatan CTA kontak dan kunjungan toko.
- Kebutuhan aksesibilitas dan perangkat target.

---

**Note:** Dokumen ini adalah pedoman awal. Perubahan visual diperbolehkan selama tetap konsisten dengan identitas toko, kebutuhan pengguna, dan persyaratan pada `REQUIREMENTS.md`.
