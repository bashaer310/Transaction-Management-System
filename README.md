# Transaction Management System

This is a full-stack solution for an internal transaction management system, built with Laravel and MySQL. The system enables organizations to efficiently manage transactions from multiple entities to internal departments, including recording and tracking incoming and outgoing transactions, handling approvals, and automating workflow processes. It includes core features like **user authentication**, **transaction management**, **department and entity management**, and **reporting**.

## Features

- **User Management**:
  - **User Registration** - admin can create user accounts (employee)
  - **Authentication & Authorization** - users can login with role-based access
  - **Profile Management** - users can view and update their profile
 
- **Transaction Management**:
  - **Transaction Management** - admin can create transactions, link them to entities, forward them to departments, and update or delete them
  - **Transaction Browsing** - users can retrieve transactions forwarded to their department with pagination and filtering
  - **Transaction Details** - users can view transaction details
  - **Transaction Status Management** - departments can complete transactions (completed), and admins can review and approve them (approved)

- **Entity Management**:
  - **Entity Management** - admin can create, update, and delete entities
  - **Entity Listing** - admin can retrieve entities with pagination and filtering

- **Department Management**:
  - **Department Management** - admin can create, update, and delete departments
  - **Department Listing** - admin can retrieve departments with pagination and filtering

- **Reporting**:
  - **Reporting printing** - admin can generate and print transaction reports with filtering options 
