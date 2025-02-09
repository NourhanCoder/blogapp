<?php
 
 try{
    $conn= mysqli_connect("localhost", "root", "", "blogs");
    if (!$conn){
        header("Location: ./view/maintenance.php");
        exit;
    }
 }catch (Exception $ex){
    header("Location: ./view/maintenance.php");
    exit;
 }