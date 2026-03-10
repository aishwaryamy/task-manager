# Laravel Task Manager

A simple **Task Management Web Application** built using **Laravel**.

The application allows users to manage tasks, upload files, create subtasks, and track completion status.

---

# Features

### Task Management

* Create a task
* Edit a task
* Delete a task
* Mark a task as completed or pending

### Attachments

* Upload **multiple files** to a task
* File validation (type and size)
* View uploaded attachments

### Subtasks

* Create subtasks under a main task
* Edit and delete subtasks
* Update subtask status (pending/completed)

### Automatic Task Completion

* When **all subtasks are completed**, the **main task automatically becomes completed**

### Search and Filter

* Search tasks by:

  * Title
  * Description
  * Status
* Filter tasks by:

  * Pending
  * Completed

### UI Improvements

* Clean layout using Blade
* Back to main page button
* Pagination for task list

---

# Tech Stack

* Laravel 11
* PHP
* MySQL
* Blade Templates
* HTML / CSS

---

# Project Structure

```
app/
 ├── Models
 │   ├── Task.php
 │   ├── Subtask.php
 │   └── TaskAttachment.php
 │
 ├── Http
 │   ├── Controllers
 │   │   ├── TaskController.php
 │   │   └── SubtaskController.php
 │   │
 │   └── Requests
 │       ├── StoreTaskRequest.php
 │       └── UpdateTaskRequest.php

database/
 └── migrations
     ├── create_tasks_table.php
     ├── create_subtasks_table.php
     └── create_task_attachments_table.php

resources/
 └── views
     └── tasks
         ├── index.blade.php
         ├── create.blade.php
         └── edit.blade.php

routes/
 └── web.php
```

---

# Installation

### 1. Clone the repository

```
git clone https://github.com/YOUR_USERNAME/task-manager.git
```

### 2. Navigate to the project folder

```
cd task-manager
```

### 3. Install dependencies

```
composer install
```

### 4. Copy environment file

```
cp .env.example .env
```

### 5. Generate application key

```
php artisan key:generate
```

### 6. Configure database

Open `.env` and update:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_manager
DB_USERNAME=root
DB_PASSWORD=
```

Create the database:

```
CREATE DATABASE task_manager;
```

---

### 7. Run migrations

```
php artisan migrate
```

---

### 8. Link storage (for file uploads)

```
php artisan storage:link
```

---

### 9. Start the server

```
php artisan serve
```

---

# Access the Application

Open the browser:

```
http://127.0.0.1:8000
```

You will see the **Task Management dashboard**.

---

# Usage

1. Create a new task
2. Upload attachments
3. Add subtasks
4. Update subtask status
5. When all subtasks are completed, the main task is automatically completed
6. Search tasks using the search bar
7. Edit or delete tasks anytime

---

# Author

Aishwarya Mandya Yogananda