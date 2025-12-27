# Transaction Management System

This is a full-stack solution for an internal transaction management system, built with Laravel and MySQL. The system enables organizations to efficiently manage transactions from multiple entities to internal departments, including recording and tracking incoming and outgoing transactions, handling approvals, and automating workflow processes. It includes core features like **user authentication**, **transaction management**, **department and entity management**, and **reporting**.

## Features

- **User Management**:
  - **User Registration** - admin can create accounts for users (employee)
  - **Authentication & Authorization** - users can login with role-based access
  - **Profile Management** - users can update their profile
 
- **Transaction Management**:
  - **Transaction Management** - admin can create a transaction and linked with an entity and forward to a department, and update or delete it
  - **Transaction Browsing** - users can retrieve transactions that forwarded to their department with pagination and filtering
  - **Transaction Details** - users can view transaction details
  - **Transaction Status Management** - users can automate the transaction that forwarded to their department (completed), and admin can approve their work (approved)

- **Entity Management**:
  - **Entity Management** - admin can create, update, and delete entities
  - **Entity Listing** - admin can retrieve entities with pagination and filtering

- **Department Management**:
  - **Department Management** - admin can create, update, and delete departments
  - **Department Listing** - admin can retrieve departments with pagination and filtering

- **Reporting**:
  - **Reporting printing** - admin can print a Report for all transactions with filtering 
