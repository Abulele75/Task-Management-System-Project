# Task Management System

## 📌 Overview  
The Task Management System is a web-based application built with **Laravel 12**. It helps users organize, manage, and monitor tasks in a secure environment. The system supports task creation, assignment, categorization, prioritization, status tracking, and deadline management. Role-based access control ensures that administrators, team members, and guests each have the appropriate permissions.

---

## ✨ Features  
- 🔐 **User Authentication**: Registration, login, logout, and password reset via Laravel Breeze.  
- ✅ **Task Management**: Create, edit, delete, and assign tasks with deadlines, priorities, and categories.  
- 📂 **Categories**: Group tasks by purpose (e.g., Development, Testing, Documentation).  
- ⚡ **Priorities**: Mark tasks as Low, Medium, or High urgency.  
- 📊 **Status Tracking**: Monitor tasks as Pending, In Progress, or Completed.  
- ⏰ **Deadline Reminders**: Automated notifications to reduce missed deadlines.  
- 👥 **Role-Based Access**:  
  - **Admin**: Full control over users, tasks, and categories.  
  - **Team Member**: Manage assigned tasks and update statuses.  
  - **Guest**: Limited view-only access.  

---

## 🛠 Technology Stack  
- **Backend**: Laravel 12, PHP  
- **Frontend**: Blade templates, HTML, CSS, Bootstrap  
- **Database**: MySQL / SQLite (via XAMPP)  
- **Tools**: Composer, Visual Studio Code, GitHub  

---

## ⚙️ Setup and Installation  
To ensure the application runs successfully, the following technologies were used:  
- XAMPP (PHP SQLite)  
- Composer  
- Laravel  
- HTML, CSS, Bootstrap  
- Visual Studio Code  
- Web Browser  

**Installation Instructions:**  
1. Create a GitHub repository and clone it locally.  
2. Navigate to the project directory.  
3. Install project dependencies using Composer.  
4. Create a copy of the environment file (`.env`).  
5. Configure database settings in `.env`.  
6. Run database migrations:  
   ```bash
   php artisan migrate
   ```  
7. Start the development server:  
   ```bash
   php artisan serve
   ```  
8. Open the application in your browser via the local server URL.  

---

## 📖 Application User Guide  
1. Open the application.  
2. Register if you are new, or log in if you already have an account.  
3. Select your role (Admin, Team Member, Guest).  
4. Enter email and password to log in.  
5. Use “Forgot Password” if needed.  
6. Once logged in, view your profile.  
7. To create a task:  
   - Click on **Task**  
   - Enter a title and description  
   - Select a category  
   - (Admins only) assign tasks to users  
   - Add a due date  
   - Choose priority (High, Medium, Low)  
   - Choose status (Pending, In Progress, Completed)  
   - Save the task  
8. View tasks on the dashboard.  
9. Edit or delete tasks as needed.  

---

## 🏗 Database Schema  

### Users Table
| Column Name       | Data Type     | Constraint              | Description                          |
|-------------------|--------------|-------------------------|--------------------------------------|
| id                | BIGINT       | PK, Auto Increment      | Unique identifier                     |
| name              | VARCHAR(255) | Not Null                | User’s full name                      |
| email             | VARCHAR(255) | Not Null, Unique        | User’s email address                  |
| email_verified_at | TIMESTAMP    | Nullable                | Verification of email                 |
| password          | VARCHAR(255) | Not Null                | Hashed password                       |
| role              | VARCHAR(255) | Default: Admin          | User role (Admin, Team Member, Guest) |
| created_at        | TIMESTAMP    | Nullable                | Record creation time                  |
| updated_at        | TIMESTAMP    | Nullable                | Record last update                    |

---

### Tasks Table
| Column Name | Data Type     | Constraint                | Description                  |
|-------------|--------------|---------------------------|------------------------------|
| id          | BIGINT       | PK, Auto Increment        | Unique identifier            |
| user_id     | BIGINT       | FK → users.id             | Task creator                 |
| category_id | BIGINT       | FK → categories.id, Null  | Task category                |
| assigned_to | BIGINT       | FK → users.id, Null       | User the task is assigned to |
| title       | VARCHAR(255) | Not Null                  | Task title                   |
| description | TEXT         | Nullable                  | Task description             |
| priority    | ENUM         | Not Null (low/medium/high)| Task priority level          |
| status      | ENUM         | Not Null (pending/in_progress/completed) | Current status |
| deadline    | DATE         | Not Null                  | Task due date                |
| created_at  | TIMESTAMP    | Nullable                  | Record creation time         |
| updated_at  | TIMESTAMP    | Nullable                  | Record last update           |

---

### Categories Table
| Column Name | Data Type     | Constraint         | Description            |
|-------------|--------------|--------------------|------------------------|
| id          | BIGINT       | PK, Auto Increment | Unique identifier      |
| name        | VARCHAR(255) | Not Null           | Category name          |
| created_at  | TIMESTAMP    | Nullable           | Record creation time   |
| updated_at  | TIMESTAMP    | Nullable           | Record last update     |

---

### Events Table
| Column Name | Data Type  | Constraint         | Description            |
|-------------|-----------|--------------------|------------------------|
| id          | BIGINT    | PK, Auto Increment | Unique identifier      |
| created_at  | TIMESTAMP | Nullable           | Record creation time   |
| updated_at  | TIMESTAMP | Nullable           | Record last update     |

---

### Registrations Table
| Column Name | Data Type  | Constraint         | Description            |
|-------------|-----------|--------------------|------------------------|
| id          | BIGINT    | PK, Auto Increment | Unique identifier      |
| created_at  | TIMESTAMP | Nullable           | Record creation time   |
| updated_at  | TIMESTAMP | Nullable           | Record last update     |

---

### Sessions Table
| Column Name   | Data Type   | Constraint         | Description                  |
|---------------|------------|--------------------|------------------------------|
| id            | VARCHAR    | PK                 | Session identifier           |
| user_id       | BIGINT     | FK → users.id, Null| Associated user              |
| ip_address    | VARCHAR(45)| Nullable           | Client IP address            |
| user_agent    | TEXT       | Nullable           | Client user agent string     |
| payload       | LONGTEXT   | Not Null           | Session payload              |
| last_activity | INTEGER    | Not Null, Indexed  | Last activity timestamp      |

---

### Password Reset Tokens Table
| Column Name | Data Type     | Constraint | Description          |
|-------------|--------------|------------|----------------------|
| email       | VARCHAR(255) | PK         | User email address   |
| token       | VARCHAR(255) | Not Null   | Reset token          |
| created_at  | TIMESTAMP    | Nullable   | Token creation time  |

---

### Cache Table
| Column Name | Data Type     | Constraint | Description         |
|-------------|--------------|------------|---------------------|
| key         | VARCHAR(255) | PK         | Cache key           |
| value       | MEDIUMTEXT   | Not Null   | Cached value        |
| expiration  | INTEGER      | Not Null   | Expiration timestamp|

---

## 📂 Migration File List  
- `0001_01_01_000000_create_users_table.php`  
- `0001_01_01_000001_create_cache_table.php`  
- `2026_05_17_163924_create_events_table.php`  
- `2026_05_17_163925_create_registrations_table.php`  
- `2026_06_05_085023_create_categories_table.php`  
- `2026_06_05_085023_create_tasks_table.php`  
- `2026_06_06_102346_add_category_id_to_tasks_table.php`  
- `2026_06_06_124901_add_assigned_to_tasks_table.php`  
- `2026_06_06_223711_add_role_to_users_table.php`  

---

## 🔒 Security  
- Password hashing  
- CSRF protection  
- SQL injection prevention via Eloquent ORM  
- XSS protection through Blade escaping  

---

## ✅ Testing  
Manual testing confirmed the following:  
- User registration and login  
- Task creation, editing, deletion, and assignment  
- Category management  
- Status updates  
- Deadline reminders  
- Role-based access enforcement  

---

## 🚀 Future Enhancements  
- Real-time notifications  
- Mobile app support  
- Advanced reporting dashboards  
- File attachments for tasks  
- Team collaboration tools  
- Calendar integration  
- Analytics and productivity tracking  

---

## 📄 License  
This project is licensed under the MIT License. See the LICENSE file for details.  
```
