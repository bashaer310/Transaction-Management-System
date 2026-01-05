# Transaction Management System

This is a web application for an internal transaction management system, built with Laravel and MySQL. The system enables organizations to efficiently manage transactions from external entities to internal departments, including recording and tracking incoming and outgoing transactions, handling approvals, and automating workflow processes. It includes core features like **user authentication**, **transaction management**, **department and entity management**, and **reporting**.

## Features

- **User Management**:
  - **User Registration** - admin can create user accounts (manager/employee)
  - **Authentication & Authorization** - users can login with role-based access
  - **Profile Management** - users can view and update their profile
 
- **Transaction Management**:
  - **Transaction Management** - admin  or manager can create transactions, link them to entities, forward them to departments, and update or delete them
  - **Transaction Browsing** - users can retrieve transactions forwarded to their department with pagination and filtering
  - **Transaction Details** - users can view transaction details
  - **Note and attachment creation** - users can write notes and upload attachments to transactions forwarded to their departments
  - **Transaction Status Management** - departments can complete transactions (completed), and admin or manager can review and approve them (approved)

- **Entity Management**:
  - **Entity Management** - admin can create, update, and delete entities
  - **Entity Listing** - admin or manager can retrieve entities with pagination and filtering

- **Department Management**:
  - **Department Management** - admin can create, update, and delete departments
  - **Department Listing** - admin or manager can retrieve departments with pagination and filtering

- **Reporting**:
  - **Reporting printing** - admin or manager can generate and print transaction reports with filtering options
 
## Technologies Used

- Languages
    - PHP - Server-side programming language
    - HTML - Page structure and markup
    - CSS - Styling and layout
    - JavaScript - Client-side interactivity

- Frameworks
    - Laravel - Web application framework
    - Bootstrap - CSS framework

- Database
    - MySQL - Relational database 

- Packages
    - Laravel Eloquent ORM - Database interaction and ORM
    - Filament - Admin dashboard and panel management
    - Spatie Laravel Permission - Role and permission management
    - DOMPDF / Laravel Snappy - PDF generation for reports
    - Laravel Authentication (Fortify) - User authentication and authorization

- Package manager
    - Composer - Dependency and package manager for PHP
  
- Tools
    - XAMPP - Local development environment 
    - Laravel Artisan - Command-line tool for Laravel
 
## Getting Started

1. Clone the repository:
```bash
   git clone https://github.com/bashaer310/Transaction-Management-System
```

2. Navigate to the project folder:
```bash
   cd Transaction-Management-System
```

3. Install dependencies:

Make sure Composer is installed, then run:
```bash
   composer install
```
4. Configure Environment

- Copy the environment file:
```bash
   cp .env.example .env
```

- Open the .env file and update the database configuration:
```bash
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=db_name
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
```
Ensure your database server (MySQL) is running and the database exists.

5. Generate application key
```bash
   php artisan key:generate
```

6. Run migrations
```bash
   php artisan migrate --seed
```

7. Run the application
```bash
   php artisan serve
```

8. Test the application
- The application will be available at: http://localhost:8000
- Admin panel URL: http://localhost:8000/dashboard

## Project structure

```bash
Transaction-Management-System/
├── app/
│   ├── Http/             # Controllers, Requests (validation)
│   ├── Models/           # Eloquent models representing database tables
│   ├── Services/         # Business logic layer
│   ├── Repositories/     # Data access layer 
│   ├── Policies/         # Authorization rules
│   ├── Exceptions/       # Custom exception handling
│   └── Filament/         # Admin panel (Resources, Pages, Widgets)
│
├── resources/            # Frontend views (Blade), CSS, JS
├── routes/               # Web and Filament routes
├── database/             # Migrations, Seeders, Factories
├── config/               # Application configuration
├── storage/              # Logs, cache, uploads
├── .env                  # Environment variables
├── artisan               # CLI commands
└── composer.json         # Dependencies
```

## Deployment

The application is deployed and can be accessed at:

## Team Members

- [Bashaer Alhuthali](https://github.com/bashaer310)
- Bashayer Bajaber
- Sarah Numan
- Esraa Alshareef

## License

This project is licensed under the MIT License.
