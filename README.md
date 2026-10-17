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
- PHP 5.6+ / compatible environment
- Apache or Nginx web server
- MySQL database
- CodeIgniter environment configured correctly

## Setup Instructions
1. Clone or download the project into your local web server directory.
2. Configure your database settings in `application/config/database.php`.
3. Create the required tables such as `tblUser`, `tbldoctor`, and `tblGallery`.
4. Set the base URL in `application/config/config.php` according to your local server.
5. Place the project in the server root (for example, `htdocs/AssignmentSteetech` for XAMPP).
6. Start the server and open the project in your browser.

## Run the Application
Open the following URL in your browser:

`http://localhost/AssignmentSteetech`

If the project is configured in a virtual host, use that URL instead.

## Notes
This application demonstrates a simple CRUD-style workflow for managing doctor information along with user authentication and file uploads.

## Author
Navneet Tyagi
