<?php
 
 try{
   //لإنشاء اتصال بقاعدة البيانات
    $conn= mysqli_connect("localhost", "root", "", "blogs");
    if (!$conn){
        header("Location: ./view/maintenance.php");
        exit;
    }
 }catch (Exception $ex){
    header("Location: ./view/maintenance.php");
    exit;
 }