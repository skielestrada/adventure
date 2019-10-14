# RGB Adventure

RGB Adventure is a Laravel PHP Application to manage characters.

## Installation

#### Set local configuration

Copy .env file
```bash
cp .env.example .env
```

Set DB properties in .env file
```bash
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

#### Open console in project directory and run these commands

Composer Dependencies
```bash
composer install
```

NPM Dependencies
```bash
npm install
```

App encryption key
```bash
php artisan key:generate
```

Migration
```bash
php artisan migrate
```

Seed
```bash
php artisan db:seed
```
## Usage

Run server
```bash
php artisan serve
```

#### Users

- User
Email: user@mail.com
Password: user1234

- Admin
EmailL admin@mail.com
Password: admin1234
