<?php
include("./core/functions.php");
include("./core/validation.php");
$errors = [];

if (checkRequestMethod("POST") && checkPostInput('email')){
    if(isset($_SESSION['username'])){
        header("location: index.php");
        exit;
    }

    foreach($_POST as $key => $value){
        $$key = sanitizeInput($value);
    }

    if(!requiredVal($email)){
        $errors[] = "Email is required";
    }elseif(!emailVal($email)){
        $errors[] = "Please enter a valid email";
    }

    if(!requiredVal($password)){
        $errors[] = "Password is required";
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("location: " . $_SERVER["HTTP_REFERER"]);
        exit;
    }

    $sql= "SELECT * FROM users WHERE email = '$email'";

    try{
        $res= mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($res);

        if(password_verify($password, trim($user['password']))){
            $_SESSION['username'] = $user['name'];
            $_SESSION['user_id'] = $user['id']; // ➕ حفظ الـ user_id 
            
            header("location: ./index.php");
            exit;
        }else{
            $_SESSION['errors'] = "Failed to login";
            header("location: " . $_SERVER["HTTP_REFERER"]);
            exit;
        }
    }catch(Exception $ex){
        $_SESSION['errors'] = "Failed to login";
        header("location: " . $_SERVER["HTTP_REFERER"]);
        exit;
    }
} 

