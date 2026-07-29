# Laravel Inventory Dashboard API

A client-safe Laravel 13 backend sample for inventory operations. The API manages products, tracks stock levels, and surfaces a low-stock summary for a dashboard or operations portal.

## Technical highlights

- Laravel 13, PHP 8.3, Eloquent, migrations, and pagination
- RESTful product API with server-side validation
- Low-stock reporting using a database-level column comparison
- Clear, frontend-ready JSON response shape

## Quick start

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate
php artisan serve
```

Request `GET /api/products?low_stock=1` to retrieve items at or below their reorder level.

## Scope note

Original, client-safe showcase code only; no confidential client assets or credentials are included.
