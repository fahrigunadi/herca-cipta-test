# HERCA TEST

## Tech Stack
- Laravel
- Inertia.js
- React.js
- TailwindCSS

## Postman Collection
https://documenter.getpostman.com/view/18718286/2sAXjGcZTe

## Domain
https://herca-test.fahrigunadi.dev

## Instalation
#### Clone this repo
```sh
git clone https://github.com/fahrigunadi/herca-cipta-test.git
```
#### change to project dir
```sh
cd herca-cipta-test
```
#### install deps
```sh
composer update
```
#### copy .env.example to .env
```sh
cp .env.example .env
```

#### generate app key
```sh
php artisan key:generate
```
#### create database and configure database in .env

#### run migration and seeder
```sh
php artisan migrate --seed
```

#### install npm deps
```sh
npm install
```

#### build npm deps
```sh
npm run build
```

#### run serve
```sh
php artisan serve
```

## Usage
- path: /komisi-penjualan merupakan halaman list komisi penjualan
- path: /marketing halaman crud marketing
- path: /penjualan merupakan halaman penjualan dan pembayaran

