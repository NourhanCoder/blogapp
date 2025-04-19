<?php
// session_start();

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

// die("End of script");
include('./core/functions.php');
include('./core/validation.php');
$errors= [];

// تأكد أن المستخدم مسجل دخول
if (!isset($_SESSION['user_id'])) {
    $_SESSION['errors'] = "You must be logged in to add a post";
    header("location: ./index.php?page=login"); // توجيه إلى صفحة تسجيل الدخول
    exit;
}


$user_id = $_SESSION['user_id']; // ✅ جلب user_id للمستخدم الحالي
//التأكد من أن المستخدم يملك المنشور عند التعديل
if (isset($_GET['id']) && !empty($_GET['id'])) { 
    $id = $_GET['id'];

    $sql = "SELECT * FROM `posts` WHERE id = $id AND user_id = $user_id";
    $res = mysqli_query($conn, $sql); 
    $blogUpdate = mysqli_fetch_assoc($res);

    // ❌ إذا لم يتم العثور على البوست أو لا ينتمي للمستخدم، نمنعه
    if (!$blogUpdate) {
        $_SESSION['errors'] = "You are not allowed to edit this post";
        header("location: ./index.php?page=add-blog"); 
        exit;
    }
}


if (checkRequestMethod('POST') && checkPostInput('title')){
    foreach($_POST as $key => $value){
        $$key = sanitizeInput($value);
    }

    if(!requiredVal($title)){
        $errors[]= "Please insert the title";
    // }elseif(!minVal($title, 5)){
    //     $errors[]= "Title must be more than 5 chars";
    }elseif(!maxVal($title, 35)){
        $errors[]= "Title must be less than 35 chars";
    }

    if(!requiredVal($content)){
        $errors[]= "Please insert the content";
    // }elseif(!minVal($content,10)){
    //     $errors[]= "Content must be more than 10 chars";
    }elseif(!maxVal($content, 255)){
        $errors[]= "Content must be less than 255 chars";
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("location: " . $_SERVER["HTTP_REFERER"]);
        exit;
    }

    if(isset($_GET['id']) && isset($_FILES['image']) && $_FILES['image']['error'] == 0){
        if(isset($blogUpdate['image'])  && !empty($blogUpdate['image'])){
            $image= $blogUpdate['image'];
            if(file_exists($image)){
                unlink($image);
            }
        }
        $pathName= './assets/upload/' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $pathName);
    }else{
        $pathName= isset($blogUpdate['image']) ? $blogUpdate['image'] : null;
    }
    


    try {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $sql = "UPDATE posts SET title = '$title', content = '$content', image = '$pathName' WHERE id = " . $_GET['id'] . " AND user_id = " . $_SESSION['user_id'];
        } else {
             // ✅ إضافة الـ user_id عند إدراج بوست جديد
            $user_id = $_SESSION['user_id'];
            $sql = "INSERT INTO posts (`title`, `content`, `image`, `created_at`, `user_id`) VALUES ('$title', '$content', '$pathName', NOW(), '$user_id')";
        }
        
    
        $res = mysqli_query($conn, $sql);
    
        if ($res) {
            $_SESSION['success'] = "Operation completed successfully";
            header("location: " . $_SERVER["HTTP_REFERER"]);
            exit;
        } else {
            $_SESSION['errors'] = "Operation Failed ";
            header("location: " . $_SERVER["HTTP_REFERER"]);
            exit;
        }
    } catch (Exception $ex) {
        $_SESSION['errors'] = "An Unexpected error occurred";
        header("location: " . $_SERVER["HTTP_REFERER"]);
        exit;
    }
}
