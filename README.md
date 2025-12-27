# Transaction Management System

This is a web application for an internal transaction management system, built with Laravel and MySQL. The system enables organizations to efficiently manage transactions from multiple entities to internal departments, including recording and tracking incoming and outgoing transactions, handling approvals, and automating workflow processes. It includes core features like **user authentication**, **transaction management**, **department and entity management**, and **reporting**.

## Features

- **User Management**:
  - **User Registration** - admin can create user accounts (manger/employee)
  - **Authentication & Authorization** - users can login with role-based access
  - **Profile Management** - users can view and update their profile
 
- **Transaction Management**:
  - **Transaction Management** - admin  or manger can create transactions, link them to entities, forward them to departments, and update or delete them
  - **Transaction Browsing** - users can retrieve transactions forwarded to their department with pagination and filtering
  - **Transaction Details** - users can view transaction details
  - **Note and attachment creation** - users can write notes and upload attachments forwarded to their departments
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
    - PHP – Server-side programming language
    - HTML - Page structure and markup
    - CSS - Styling and layout
    - JavaScript - Client-side interactivity

- Frameworks
    - Laravel – Web application framework
    - Bootstrap – CSS framework

- Database
    - MySQL – Relational database 

- Packages
    - Laravel Eloquent ORM – Database interaction and ORM
    - Filament – Admin dashboard and panel management
    - Spatie Laravel Permission – Role and permission management
    - DOMPDF / Laravel Snappy – PDF generation for reports
    - Laravel Authentication (Fortify) – User authentication and authorization

- Package manger
    - Composer – Dependency and package manager for PHP
  
- Tools
    - XAMPP – Local development environment 
    - Laravel Artisan – Command-line tool for Laravel 
