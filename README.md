<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

-   **[Vehikl](https://vehikl.com/)**
-   **[Tighten Co.](https://tighten.co)**
-   **[WebReinvent](https://webreinvent.com/)**
-   **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
-   **[64 Robots](https://64robots.com)**
-   **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
-   **[Cyber-Duck](https://cyber-duck.co.uk)**
-   **[DevSquad](https://devsquad.com/hire-laravel-developers)**
-   **[Jump24](https://jump24.co.uk)**
-   **[Redberry](https://redberry.international/laravel/)**
-   **[Active Logic](https://activelogic.com)**
-   **[byte5](https://byte5.de)**
-   **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## 🦠 Akun Google Untuk Debbuging

- **Id:**
```bash
akunweb255@gmail.com
```
- **Password:**
```bash
Password_123
```

## 🛠️ Teknologi yang Digunakan

Samakan terlebih dahulu ini, agar tidak **error**:

-   **Laravel**: 11.28
-   **Tailwind CSS**: 3
-   **PHP**: 8.3.12
-   **Node.js**: 20.18.0
-   **MySQL**: 8.3.0
-   **Laragon**: Terbaru.

### 🤖 Cara cek nya

Cari di google dengan keyword:

```bash
Bagaimana mengecek versi php di laragon
```

```bash
Bagaimana mengecek versi MySql di laragon
```

```bash
Bagaimana mengecek versi Node.Js di laragon
```

### 👾 Untuk cara mengganti versi di atas

cari cara nya di google menngunakan perintah ini:

```bash
laragon how to add another php version
```

```bash
laragon how to add another Node.js version
```

```bash
laragon how to add another MySql version
```

Jika ada versi yang beda, download alat-alat nya di [link Google Drive ini](https://drive.google.com/drive/u/2/folders/1vTMnaYzjjx-OneLvWd6MSWwhzj2SkoRr).

---

## ➕ Sebelum memulai

Pergi ke folder ".../laragon/www", lalu klik kanan, dan klik 'Git Bash Here', dan Masukan Perintah- perintah berikut secara berurutan di terminal Anda.

### 1️⃣ Clone Proyek dari Repository

```bash
git clone https://github.com/M-Ridho-Fauzan/News_website_API.git
```

```bash
cd News_website_API
```

### 2️⃣ Instalasi Dependensi

```bash
composer install
```

```bash
composer dump_autoload
```

```bash
npm install
```

### 3️⃣ Kofigurasi .env

```bash
cp .env.example
```

```bash
php artisan key:generate
```

-   **Ubah/samakan bagian-bagian ini**: di file `.env` lang sung ctrl + v wae.

```bash
APP_NAME='The Guards.'
APP_ENV=local
APP_KEY=base64:ZjH7fUKCdu78ccwivmdSKcUV9CXzVyaIElGz3Bh3/Ww=
APP_DEBUG=true
APP_TIMEZONE=UTC
APP_URL=http://localhost

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file
# APP_MAINTENANCE_STORE=database

PHP_CLI_SERVER_WORKERS=4

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=news_website_app
DB_USERNAME=root
DB_PASSWORD=

# Google Auth Token
GOOGLE_CLIENT_ID=21305654142-tg0e99k2b0qvv98domvjnu1k4uuaqf1c.apps.googleusercontent.com
GOOGLE_CLIENT_SECRET=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
GOOGLE_REDIRECT_URI=http://127.0.0.1:8000/auth/google/callback

# Github Auth Token
GITHUB_CLIENT_ID=Ov23liEtddGrmkPyuCsQ
GITHUB_CLIENT_SECRET=a7b9fb3f75c8aea2d390539ed31bff4b2a3780dd
GITHUB_REDIRECT_URI=http://127.0.0.1:8000/auth/github/callback

GUARDIAN_API_KEY='c3c30a7c-75e9-4a61-989a-e08d2bd1e508'

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_SCHEME=null
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=akunweb255@gmail.com
MAIL_PASSWORD=vvjunyfiwklygiqc
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS="akunweb255@gmail.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME="${APP_NAME}"
```

### 4️⃣ Migrasi Database

```bash
php artisan migrate:fresh --seed
```

-   **Di terminal baru:** Jalankan ini:

```bash
php artisan ser
```

-   **Di terminal baru lagi:** Jalankan ini:

```bash
npm run dev
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
