<?php
include("./core/functions.php");
include("./core/validation.php");
$errors = [];

if (checkRequestMethod("POST") && checkPostInput('username')){

    foreach($_POST as $key => $value){
        $$key = sanitizeInput($value);
    }

    if(!requiredVal($username)){
        $errors[]= "Username is required";
    }elseif(!minVal($username, 3)){
        $errors[]= "Username must be more than 3 chars";
    }elseif(!maxVal($username, 25)){
        $errors[]= "Username must be less than 25 chars";
    }

    if(!requiredVal($email)){
        $errors[]= "Email is required";
    }elseif(!emailVal($email)){
        $errors[]= "Please entire a valid email";
    }

    if(!requiredVal($password)){
        $errors[]= "Password is required";
    }elseif(!minVal($password, 6)){
        $errors[]= "Password must be more than 6 chars";
    }elseif(!maxVal($password, 15)){
        $errors[]= "Password must be less than 15 chars";
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("location: " . $_SERVER["HTTP_REFERER"]);
        exit;
    }

    $hashedPassword= password_hash($password, PASSWORD_DEFAULT);

    $sql= "INSERT INTO users(`name`, `email`, `password`) VALUES('$username', '$email', '$hashedPassword')";

    try{
        $res= mysqli_query($conn, $sql);

        if($res){
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = mysqli_insert_id($conn); // للحصول على رقم المعرف (ID) للمستخدم الذي تم إدخاله حديثًا في قاعدة البيانات

            header("location: ./index.php");
            exit;
        }else{
            $_SESSION['errors'] = "Failed to register";
            header("location: " . $_SERVER["HTTP_REFERER"]);
            exit;
        }
    }catch(Exception $ex){
        $_SESSION['errors'] = "Failed to register";
        header("location: " . $_SERVER["HTTP_REFERER"]);
        exit;
    }
}