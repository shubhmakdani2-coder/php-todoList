# 📝 Todo List Application

A simple **Todo List Web Application** built with **PHP**, **MySQL**, and **Bootstrap**.  
This project allows users to **register, log in, and manage their todos**.  

---

## 🚀 Features
- User Registration & Login
- Add, View, Complete, and Delete Todos
- User Roles (Active / Blocked)
- Responsive UI with Bootstrap
- Clean MySQL Database Structure

---

## 📂 Project Structure
│── /code # PHP backend code
│── /views # Frontend UI pages
│── /assets # Frontend UI pages
│── README.md # Project documentation

---

## ⚙️ Installation Guide

1. **Clone the repository**
   ```bash
   git clone https://github.com/your-username/todo-list-app.git
   cd todo-list-app

2. Move project files
Place the files inside your server root directory:

htdocs/ (for XAMPP)

www/ (for WAMP)

/var/www/html/ (for LAMP)

3. Start Apache & MySQL
Launch them from your XAMPP/WAMP/LAMP control panel.

4. Create Database and Tables
Open phpMyAdmin
, select SQL tab, and paste the following script:

-- Create database
CREATE DATABASE todo_list;
USE todo_list;

-- Users Table
CREATE TABLE users (
  uid INT(11) AUTO_INCREMENT PRIMARY KEY,
  uname VARCHAR(50) NOT NULL,
  age INT(11) NOT NULL,
  gender VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL,
  usertype INT(11) NOT NULL COMMENT '1=active, 2=blocked',
  dt DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Todos Table
CREATE TABLE todos (
  tid INT(11) AUTO_INCREMENT PRIMARY KEY,
  uid INT(11) NOT NULL,
  todoname VARCHAR(255) NOT NULL,
  operation INT(11) NOT NULL COMMENT '1=completed, 2=deleted',
  dt DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Projects Table
CREATE TABLE projects (
  pid INT(11) AUTO_INCREMENT PRIMARY KEY,
  pname VARCHAR(100) NOT NULL,
  description TEXT,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

NOTE : 
Email : admin@gmail.com 
Password : admin
To access admin panel
