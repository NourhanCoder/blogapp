<?php
session_start(); //يضمن تشغيل الجلسات ($_SESSION) في كل صفحة
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

require_once("config/db_connection.php"); //لمنع تحميله اكتر من مره( يستدعي ملف الاتصال بقاعدة البيانات))
include("helper/helper.php"); //استدعاء ملف عرض الاخطاء و الرسائل

include('./inc/header.php');
include('./inc/nav.php');

$page = isset($_GET['page']) ? $_GET['page'] : "home"; //نظام توجيه الصفحات

//نظام لاختيار الصفحه المناسبه
switch ($page) {
    case 'home':
        include "./view/home.php";
        break;
    case 'register':
        include "./view/auth/register.php";
        break;
    case 'sign-up':
        include "./controllers/auth/sign-up.php";
        break;
    case 'logout':
        include "./controllers/auth/logout.php";
        break;
    case 'login':
        include "./view/auth/login.php";
        break;
    case 'auth-login':
        include "./controllers/auth/auth-login.php";
        break;
    case 'add-blog':
        include "./view/blog/add-blog.php";
        break;
    case 'store-blog':
        include "./controllers/blog/add_blog.php";
        break;
    case 'delete-blog':
        include "./controllers/blog/delete-blog.php";
        break;
    case 'single-blog':
        include "./view/blog/single-blog.php";
        break;
    case 'contact':
        include "./view/contact.php";
        break;
    case 'about':
        include "./view/about.php";
        break;
    case 'profile':
        include "./view/blog/profile.php";
        break;      
    default:
        echo "<h1> 404 - page not found </h1>"; //لو القيمه مش معروفه هيعرض رسالة الخطأ
}

include('./inc/footer.php');
