# Task Manager

A task management web app built with Laravel. Users register an account, log in, and manage their own to-do list: create tasks with a due date, edit them, mark them completed or pending, and delete them. Every user can only see and change their own tasks.

## Features

- Register, log in and log out (Laravel Breeze)
- Create, view, edit and delete tasks
- Each task has a title, description, due date and status (pending or completed)
- Mark a task as completed or pending with one click
- Form validation with clear error messages
- Each user sees only their own tasks
- Opening, editing or deleting another user's task is blocked (403 Forbidden)
- Automated feature tests (Pest)

## Built With

- Laravel 13 (MVC, Eloquent ORM, migrations)
- Blade templates
- Tailwind CSS (via Vite)
- SQLite
- Laravel Breeze (authentication)
- Pest (testing)

## Requirements

- PHP (the version required by Laravel 13) and Composer
- Node.js and npm

## Setup

```bash
git clone https://github.com/Mhubzy/task-management.git
cd task-management
composer install
npm install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate
npm run build
```

## Running the App

Start the Laravel server:

```bash
php artisan serve
```

Then open http://localhost:8000 in your browser. Register an account to start adding tasks.

While developing, run `npm run dev` in a second terminal so Tailwind styles update as you edit. If you use Laravel Herd, the app is served automatically at `task-management.test`.

## Running the Tests

```bash
php artisan test
```

The tests use an in-memory database, so they never touch your real data. They cover creating a task, validation, per-user task lists, access control (403), updating, toggling status, deleting, and redirecting guests to the login page.

## Project Structure

| Part | File |
|---|---|
| Model | `app/Models/Task.php` |
| Controller | `app/Http/Controllers/TaskController.php` |
| Routes | `routes/web.php` |
| Task views | `resources/views/tasks/` |
| Layout | `resources/views/layouts/tasks.blade.php` |
| Tests | `tests/Feature/TaskTest.php` |

## How Task Privacy Works

Each task stores the id of the user who owns it in a `user_id` column, which links to the `users` table. The task list only loads tasks that belong to the logged-in user, using `$request->user()->tasks()`. If a user opens the URL of someone else's task, the controller stops the request with a 403 Forbidden error, using `abort_if($task->user_id !== auth()->id(), 403)`.

## Author

Adeshina Mubarak (Mhubzy)
