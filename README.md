# Sistem Informasi Manajemen Inventaris

Aplikasi ini adalah Sistem Informasi Manajemen Inventaris yang komprehensif, dibangun dengan Laravel, Tailwind CSS, dan Alpine.js. Dirancang untuk membantu organisasi dalam mengelola aset dan stok barang secara efisien.

## Fitur Utama

*   **Manajemen Inventaris:**
    *   Melakukan operasi CRUD (Create, Read, Update, Delete) untuk data inventaris.
    *   Fungsionalitas impor dan ekspor data inventaris (Excel).
    *   Pencetakan daftar inventaris (semua atau per item).
    *   Tampilan inventaris yang dikelompokkan berdasarkan nama barang.
*   **Manajemen Akuisisi:** Melacak dan mengelola proses akuisisi barang baru.
*   **Manajemen Ruangan:** Mengelola informasi ruangan tempat inventaris disimpan.
*   **Manajemen Stok Barang Habis Pakai:** Mengelola stok barang yang habis pakai, termasuk jumlah masuk dan keluar.
*   **Manajemen Pengguna & Unit:** Mengelola akun pengguna dan unit organisasi.
*   **Manajemen Transaksi:** Mencatat dan mengelola transaksi keluar-masuk barang.
*   **Manajemen Permintaan:** Mengelola permintaan barang dari pengguna.
*   **Laporan:**
    *   Laporan riwayat item.
    *   Laporan transaksi.
*   **Pengaturan Aplikasi:** Mengelola konfigurasi dan pengaturan aplikasi.
*   **Profil Pengguna:** Mengelola informasi profil pengguna.

## Teknologi yang Digunakan

*   **Backend:**
    *   PHP (>=8.2)
    *   Laravel Framework (v12.x)
    *   Maatwebsite/Excel (untuk impor/ekspor data)
*   **Frontend:**
    *   Blade (Templating Engine Laravel)
    *   Tailwind CSS (Framework CSS)
    *   Alpine.js (JavaScript Framework Ringan)
    *   Vite (Build Tool)
*   **Database:** Database Relasional (misalnya MySQL, PostgreSQL, SQLite)

## Instalasi

Untuk menjalankan proyek ini secara lokal, ikuti langkah-langkah berikut:

### Prasyarat

Pastikan Anda memiliki perangkat lunak berikut terinstal di sistem Anda:

*   PHP >= 8.2
*   Composer
*   Node.js & npm (atau Yarn)
*   Database (misalnya MySQL, PostgreSQL, atau SQLite)

### Langkah-langkah Instalasi

1.  **Clone Repositori:**
    ```bash
    git clone https://github.com/suzuy1/sim-inventaris-3.git
    cd sim-inventaris
    ```

2.  **Instal Dependensi PHP:**
    ```bash
    composer install
    ```

3.  **Instal Dependensi JavaScript:**
    ```bash
    npm install
    # atau yarn install
    ```

4.  **Konfigurasi Lingkungan:**
    Salin file `.env.example` dan buat file `.env`:
    ```bash
    cp .env.example .env
    ```
    Edit file `.env` dan konfigurasikan pengaturan database Anda.

5.  **Generate Application Key:**
    ```bash
    php artisan key:generate
    ```

6.  **Jalankan Migrasi Database:**
    ```bash
    php artisan migrate
    ```

7.  **(Opsional) Jalankan Seeder:**
    Untuk mengisi database dengan data dummy (jika tersedia):
    ```bash
    php artisan db:seed
    ```

8.  **Jalankan Server Pengembangan:**
    Buka dua terminal terpisah dan jalankan perintah berikut:
    *   Untuk backend Laravel:
        ```bash
        php artisan serve
        ```
    *   Untuk frontend Vite:
        ```bash
        npm run dev
        # atau yarn dev
        ```

## Penggunaan

Setelah instalasi berhasil, Anda dapat mengakses aplikasi melalui browser Anda di `http://127.0.0.1:8000` (atau port yang ditentukan oleh `php artisan serve`).

*   **Login:** Gunakan kredensial pengguna yang telah Anda buat atau yang disediakan oleh seeder.
*   **Navigasi:** Jelajahi dashboard dan fitur-fitur manajemen inventaris, akuisisi, ruangan, stok, pengguna, transaksi, permintaan, laporan, pengaturan, dan profil.

## Lisensi

Proyek ini dilisensikan di bawah Lisensi MIT.
