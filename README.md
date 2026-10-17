# Steetech Assignment

A CodeIgniter-based web application for user authentication and doctor management.

## Project Overview
This project is built using PHP and CodeIgniter and includes a basic user system with login, registration, session management, and doctor record operations. It is designed as an assignment/project for managing doctor information and related gallery images.

## Features
- User signup and login
- Session-based authentication
- Doctor listing and management
- Edit and delete doctor records
- Doctor gallery with image upload support
- Bootstrap-based responsive UI

## Tech Stack
- PHP
- CodeIgniter
- MySQL
- Bootstrap

## Project Structure
- `application/controllers/` – controllers for user and app logic
- `application/models/` – database interaction layer
- `application/views/` – frontend templates for user and doctor pages
- `application/config/` – CodeIgniter configuration files
- `system/` – CodeIgniter framework core files
- `uploads/` – uploaded gallery images

## Prerequisites
- PHP 7.4 or newer
- A web browser
- MySQL and PHP's `mysqli` extension to use login, registration, and doctor/gallery features

## Setup Instructions
1. Install PHP. To use the database-backed features, also install MySQL and enable the PHP `mysqli` extension.
2. From the project directory, start the built-in PHP web server:

   ```sh
   php -S 127.0.0.1:8000 router.php
   ```

3. Open [http://127.0.0.1:8000](http://127.0.0.1:8000) in your browser.
4. To enable login, registration, and doctor/gallery features, create the `steetech` database and required tables/stored procedure, then update `application/config/database.php` with your MySQL credentials.

## Run the Application
The login screen can be viewed without a database. Database-backed actions require a configured MySQL database, including `tblUser`, `tbldoctor`, `tblGallery`, and the `GetAllDoctor()` stored procedure.

## Notes
This application demonstrates a simple CRUD-style workflow for managing doctor information along with user authentication and file uploads.

## Author
Navneet Tyagi
