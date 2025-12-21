# 🏆 Score-Board Website

## 📖 Tentang Score-Board

Score-Board adalah aplikasi web untuk mengelola dan menampilkan papan skor pertandingan atau kompetisi secara real-time. Website ini dirancang untuk memudahkan pengelolaan event, tim, stage kompetisi, serta menampilkan informasi sponsor dan media partner. Aplikasi ini cocok digunakan untuk berbagai jenis event seperti turnamen olahraga, kompetisi esports, atau event-event lainnya yang membutuhkan sistem scoring.

### Fitur Utama

-   ✅ Manajemen Event dan Kompetisi
-   ✅ Manajemen Tim dan Peserta
-   ✅ Sistem Stage Kompetisi
-   ✅ Pengelolaan Sponsor dan Media Partner
-   ✅ Tampilan Score Board Real-time
-   ✅ Dashboard Admin yang User-Friendly

## 🛠️ Tech Stack

Aplikasi ini dibangun menggunakan teknologi modern dengan stack sebagai berikut:

### Backend

-   **Laravel 10.x** - PHP Framework
-   **PHP 8.1+** - Programming Language
-   **MySQL** - Database Management System

### Frontend

-   **Vite** - Frontend Build Tool
-   **Tailwind CSS** - CSS Framework
-   **JavaScript** - Programming Language

### Tools & Libraries

-   **Composer** - PHP Dependency Manager
-   **NPM** - Node Package Manager
-   **Laravel Sanctum** - API Authentication
-   **Laravel Mix/Vite** - Asset Compilation

## 📋 Requirements

Pastikan sistem Anda memiliki:

-   PHP >= 8.1
-   Composer
-   Node.js & NPM
-   MySQL/MariaDB
-   Git

## 🚀 Tutorial Setup Project

### 1. Clone Repository

```bash
git clone <repository-url> score_board
cd score_board
```

### 2. Install Dependencies

Install PHP dependencies menggunakan Composer:

```bash
composer install
```

Install Node.js dependencies:

```bash
npm install
```

### 3. Konfigurasi Environment

Copy file `.env.example` menjadi `.env`:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

### 4. Konfigurasi Database

Buka file `.env` dan sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=score_board
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Buat Database

Buat database baru dengan nama `score_board` melalui phpMyAdmin atau MySQL CLI:

```bash
mysql -u root -p
CREATE DATABASE score_board;
exit;
```

Atau import file SQL yang sudah disediakan:

```bash
mysql -u root -p score_board < score_board.sql
```

### 6. Jalankan Migration (Jika belum import SQL)

```bash
php artisan migrate
```

Jika ingin dengan dummy data:

```bash
php artisan migrate --seed
```

### 7. Link Storage

Buat symbolic link untuk storage:

```bash
php artisan storage:link
```

### 8. Build Assets

Development mode:

```bash
npm run dev
```

Production mode:

```bash
npm run build
```

### 9. Jalankan Development Server

```bash
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`

### 10. Login ke Dashboard

Gunakan kredensial default (jika menggunakan seeder):

-   Email: admin@scoreboard.com
-   Password: password

## 📱 Penggunaan

Setelah berhasil setup, Anda dapat:

1. Login ke dashboard admin
2. Membuat event baru
3. Menambahkan tim peserta
4. Mengatur stage kompetisi
5. Mengelola sponsor dan media partner
6. Menampilkan score board ke layar publik

## 🔧 Commands Berguna

```bash
# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Optimize application
php artisan optimize

# Run tests
php artisan test
```

## 📝 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

<p align="center">
Made with ❤️ by <strong>@wahyunurs</strong>
</p>
