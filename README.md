
# Task Management System

## 📌 Overview  
The Task Management System is a web-based application built with **Laravel 12**. It helps users organize, manage and monitor tasks in a secure environment. The system supports task creation, assignment, categorization, prioritization, status tracking and deadline management. Role-based access control ensures that administrators, team members and guests each have the appropriate permissions.

---

## ✨ Features  
- 🔐 **User Authentication**: Registration, login, logout, and password reset via Laravel Breeze.  
- ✅ **Task Management**: Create, edit, delete and assign tasks with deadlines, priorities and categories.  
- 📂 **Categories**: Group tasks by purpose
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

## ⚙️ Installation  
1. Clone the repository:  
   ```bash
   git clone https://github.com/Abulele75/task-management-system-project.git
   ```
2. Navigate to the project directory:  
   ```bash
   cd task-management-system-project
   ```
3. Install dependencies:  
   ```bash
   composer install
   ```
4. Copy `.env.example` to `.env` and configure your database settings.  
5. Run migrations:  
   ```bash
   php artisan migrate
   ```
6. Start the development server:  
   ```bash
   php artisan serve
   ```
7. Open the app in your browser at `http://localhost:8000`.  

---

## 📖 Usage Guide  
1. Register a new account or log in with existing credentials.  
2. Select your role (Admin, Team Member, Guest).  
3. Create tasks by providing:  
   - Title  
   - Description  
   - Category  
   - Priority  
   - Deadline  
   - Assigned user (Admin only)  
4. View tasks on the dashboard.  
5. Edit or delete tasks as needed.  
6. Update task status to track progress.  

---

## 🏗 System Architecture  
- **Models**: User, Task, Category, Role  
- **Controllers**: TaskController, CategoryController, AAUserController, AdminController  
- **Views**: Authentication, Dashboard, Task Management, Category Management, User Management, Profile Management  

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

---

