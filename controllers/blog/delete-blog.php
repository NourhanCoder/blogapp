<?php

if (isset($_GET['id'])){
    $id = $_GET['id'];

    $sql= "SELECT * FROM `posts` WHERE id ='$id'";
    $res= mysqli_query($conn, $sql);
    $blogUpdate= mysqli_fetch_assoc($res);

    if($blogUpdate && isset($blogUpdate['image']) && file_exists($blogUpdate['image'])){
        unlink($blogUpdate['image']);
    }

    $sql = "DELETE FROM `posts` WHERE id = $id";
    mysqli_query($conn, $sql);
    $_SESSION['success'] = "Blog Deleted";
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}