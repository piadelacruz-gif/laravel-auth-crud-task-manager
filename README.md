# StudyFlow — Laravel Authentication & CRUD

Project for the Web Programming Lab Activity, using Laravel 12, Laravel Breeze (development dependency), Blade views, SQLite, and an Eloquent Task model.

## Included features

- Register, log in, log out and reset passwords
- Add, list, view, edit and delete tasks
- Mark tasks complete and filter by Pending or Completed
- Restrict task routes to authenticated users
- Ensure users can only view and edit their own tasks
- Validate task forms and use CSRF protection

## Run on Windows with Laravel Herd

Requirements: PHP 8.2+ with SQLite extension, Composer, Node and npm.

1. Download or clone this repository.
2. Open the project folder.
3. Double-click RUN_ON_WINDOWS.bat. It installs PHP and JS dependencies, generates the app key, runs migrations and starts the development server.
4. Open http://127.0.0.1:8000.
5. Register a user and try adding, editing and deleting tasks.

### Manual setup

```bat
composer install
copy .env.example .env
php artisan key:generate
type nul > database\database.sqlite
php artisan migrate
npm install
npm run build
php artisan serve
```

## Tests

After dependencies are installed, run:

```bat
php artisan route:list
php artisan test
```

The project contains tests for authentication, CRUD, validation and task ownership.

## Core files

- app/Http/Controllers/TaskController.php — CRUD controller
- app/Models/Task.php — Eloquent model
- app/Models/User.php — relationship between accounts and tasks
- routes/web.php — authenticated resource routes
- routes/auth.php — registration, login and password reset routes
- database/migrations/ — database schemas
- resources/views/tasks/ — task interface
- resources/views/auth/ — authentication interface
- tests/Feature/TaskCrudTest.php — feature tests

## Notes

Do not run breeze:install again: customized Blade pages and authentication handlers are already included. Never publish .env or your local database. The uploaded PHP source was syntax-reviewed, but a fully running application and automated test suite have not been verified in a runtime with Composer and SQLite support.