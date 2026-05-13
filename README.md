# MobCars Indonesia — Showroom Website

Website showroom mobil premium berbasis Laravel 12 dengan desain hitam/emas eksklusif.

## Tech Stack

- **Laravel 12** (PHP 8.2)
- **Laravel Breeze** (Blade stack — autentikasi)
- **MySQL** 
- **Tailwind CSS** (CDN)
- **Font Awesome 6** (CDN)

## Setup & Instalasi

```bash
# 1. Clone & install dependencies
composer install
npm install && npm run build

# 2. Konfigurasi environment
cp .env.example .env
php artisan key:generate

# 3. Edit .env — sesuaikan database:
#    DB_DATABASE=mobcars_showroom
#    DB_USERNAME=your_username
#    DB_PASSWORD=your_password

# 4. Buat database & migrate + seed
php artisan migrate --seed

# 5. Link storage untuk upload gambar
php artisan storage:link

# 6. Jalankan server
php artisan serve
```

Buka di browser: **http://localhost:8000**

## Kredensial Admin Default

| Field    | Value              |
|----------|--------------------|
| URL      | `/admin/dashboard` |
| Email    | `admin@mobcars.id` |
| Password | `admin123456`      |

> **Penting:** Ganti password admin setelah instalasi!

## Fitur

### Frontend (Publik)
- **Homepage** — Hero, brand strip, about, featured cars, promo, services, testimonials, gallery, kontak
- **Katalog Mobil** — Filter brand/harga/tahun, sorting, pencarian, pagination
- **Detail Mobil** — Foto, spesifikasi, deskripsi, form inquiry, mobil terkait
- **WhatsApp** — Tombol kontak floating + CTA di halaman detail

### Admin Panel (`/admin`)
- Dashboard statistik (total mobil, tersedia, terjual, inquiry)
- CRUD mobil (tambah/edit/hapus + upload foto)
- Manajemen inquiry masuk
- Autentikasi via Laravel Breeze

## Struktur Penting

```
app/Http/Controllers/
├── HomeController.php
├── CarController.php
├── InquiryController.php
└── Admin/
    ├── AdminController.php
    ├── AdminCarController.php
    └── AdminInquiryController.php

resources/views/
├── layouts/
│   ├── app.blade.php      # Layout frontend
│   └── admin.blade.php    # Layout admin
├── home.blade.php
├── cars/
│   ├── index.blade.php
│   └── show.blade.php
└── admin/
    ├── dashboard.blade.php
    ├── cars/
    │   ├── index.blade.php
    │   ├── create.blade.php
    │   └── edit.blade.php
    └── inquiries/
        └── index.blade.php
```


<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
