# Laravel Task Manager

A simple **Task Management web application** built with **Laravel**.

## Features

* Create Task
* Edit Task
* Delete Task
* Mark Task as Completed
* Filter Tasks (Completed / Pending)
* Validation for form inputs

---

# Requirements

Make sure you have the following installed:

* PHP 8.2+
* Composer
* MySQL
* Git

---

# Installation

### 1. Clone the repository

```bash
git clone https://github.com/aishwaryamy/task-manager.git
```

### 2. Navigate to the project folder

```bash
cd task-manager
```

---

### 3. Install dependencies

```bash
composer install
```

---

### 4. Copy the environment file

```bash
cp .env.example .env
```

---

### 5. Generate application key

```bash
php artisan key:generate
```

---

### 6. Configure database

Open `.env` and update database credentials:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_manager
DB_USERNAME=root
DB_PASSWORD=
```

Create the database in MySQL:

```sql
CREATE DATABASE task_manager;
```

---

### 7. Run migrations

```bash
php artisan migrate
```

This will create the required database tables.

---

### 8. Start the Laravel server

```bash
php artisan serve
```

---

# Access the Application

Open your browser and go to:

```
http://127.0.0.1:8000/tasks
```

You will see the **Task Management dashboard**.

---

# Application Structure

```
app/
 ├── Models/Task.php
 ├── Http/
 │    ├── Controllers/TaskController.php
 │    └── Requests/
 │         ├── StoreTaskRequest.php
 │         └── UpdateTaskRequest.php

database/
 └── migrations/create_tasks_table.php

resources/
 └── views/tasks/
      ├── index.blade.php
      ├── create.blade.php
      └── edit.blade.php

routes/
 └── web.php
```

---

# Author

Aishwarya Mandya Yogananda
