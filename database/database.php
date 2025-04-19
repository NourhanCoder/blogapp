<?php
// تعريف ثوابت للاتصال بقاعدة البيانات
const SERVER_NAME = "localhost";  // اسم السيرفر
const USER_NAME = "root";  // اسم المستخدم
const PASSWORD = "";   // كلمة المرور (فارغة في حالة XAMPP/MAMP)
const DATABASE_NAME = "blogs";  // اسم قاعدة البيانات

// إنشاء اتصال بقاعدة البيانات
$con = mysqli_connect(SERVER_NAME, USER_NAME, PASSWORD);

// التحقق من نجاح الاتصال
if (!$con) {
    return "Connection Failed:" . mysqli_connect_error();  // إذا فشل الاتصال، يتم إرجاع رسالة خطأ
}

// إنشاء قاعدة بيانات إذا لم تكن موجودة مسبقًا
$sql = "CREATE DATABASE IF NOT EXISTS `blogs`";

if (!mysqli_query($con, $sql)){
    return "Created Failed:" . mysqli_error($con);
}

// اختيار قاعدة البيانات بعد إنشائها أو التأكد من وجودها
mysqli_select_db($con, DATABASE_NAME);

// إنشاء جدول المستخدمين إذا لم يكن موجودًا
$table_sql_user = "CREATE TABLE IF NOT EXISTS `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255),
  `email` VARCHAR(255),
  `password` VARCHAR(255)
)";

// تنفيذ أمر إنشاء الجدول والتحقق من نجاح العملية
if (!mysqli_query($con, $table_sql_user)){
    return "Created Failed:" . mysqli_error($con); // إذا فشل الإنشاء، يتم إرجاع رسالة خطأ
}

$table_sql_post = "CREATE TABLE IF NOT EXISTS `posts` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(255),
    `content` TEXT,
    `created_at` TIMESTAMP,
    `user_id` INT
)";

if (!mysqli_query($con, $table_sql_post)){
    return "Created Failed:" . mysqli_error($con);
}

$table_sql_comment = "CREATE TABLE IF NOT EXISTS `comments` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `content` TEXT,
    `created_at` TIMESTAMP,
    `post_id` INT,
    `user_id` INT
)";

if (!mysqli_query($con, $table_sql_comment)){
    return "Created Failed:" . mysqli_error($con);
}

$table_sql_comment = "CREATE TABLE IF NOT EXISTS `contact` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255),
  `email` VARCHAR(255),
    `phone` INT,
    `message` TEXT
)";

if (!mysqli_query($con, $table_sql_comment)){
    return "Created Failed:" . mysqli_error($con);
}